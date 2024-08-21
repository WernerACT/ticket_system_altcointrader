<?php

namespace App\Models;

use App\Mail\TicketClosedMail;
use App\Services\TicketAssignmentService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Mail;

class Ticket extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'title',
        'email',
        'reference',
        'description',
        'opened_at',
        'department_id',
        'status_id',
        'user_id',
    ];

    protected static function booted(): void
    {
        static::created(function ($ticket) {
            if (empty($ticket->reference)) {
                $ticket->reference = $ticket->generateReference();
                $ticket->save();
            }
        });

        static::updating(function ($ticket) {
            if ($ticket->isDirty('department_id')) {
                $newDepartment = Department::find($ticket->department_id);
                if ($newDepartment) {
                    $ticketAssignmentService = new TicketAssignmentService();
                    $nextAgent = $ticketAssignmentService->assignTicketToNextAgent($newDepartment);
                    $ticket->user_id = $nextAgent->id;
                }
            }

            if ($ticket->isDirty('user_id')) {
                $user = User::find($ticket->user_id);
                if ($user) {
                    $ticket->department_id = $user->department_id;
                }
            }
        });

        static::updated(function (Ticket $ticket) {
            // Check if the status_id was changed
            if ($ticket->isDirty('status_id')) {
                // Load the status relationship if not already loaded
                $ticket->load('status');

                // Check if the new status is "Closed"
                if ($ticket->status->name == 'Closed') {
                    // Send the email
                    Mail::to($ticket->email)->queue(new TicketClosedMail($ticket));
                }
            }
        });
    }

    public function generateReference(): string
    {
        return 'ACT' . str_pad($this->id + 100000, 6, '0', STR_PAD_LEFT);
    }

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function images(): MorphMany
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function documents(): MorphMany
    {
        return $this->morphMany(Document::class, 'documentable');
    }

    public function responses()
    {
        return $this->hasMany(Response::class);
    }

    public function notes()
    {
        return $this->hasMany(Note::class);
    }

    public function ticketHistories()
    {
        return $this->hasMany(TicketHistory::class);
    }

    protected $casts = [
        'opened_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];
}
