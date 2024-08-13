<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    protected function lastAssignedUser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'last_assigned_user_id');
    }

    public function tickets(): HasMany
    {
        return $this->hasMany(Ticket::class);
    }

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    public function statuses($startDate = null, $endDate = null, $allTickets = true, $userId = null)
    {
        $departmentId = $this->id;

        return Status::select('statuses.id', 'statuses.name')
            ->join('tickets', function ($join) use ($departmentId) {
                $join->on('tickets.status_id', '=', 'statuses.id')
                    ->where('tickets.department_id', '=', $departmentId);
            })
            ->groupBy('statuses.id', 'statuses.name')
            ->withCount(['tickets' => function ($query) use ($departmentId, $startDate, $endDate, $allTickets, $userId) {
                $query->where('department_id', $departmentId);

                // Apply date filtering if provided
                if ($startDate && $endDate) {
                    $query->whereBetween('created_at', [$startDate, $endDate]);
                }

                // Filter by user if $allTickets is false
                if (!$allTickets && $userId) {
                    $query->where('user_id', $userId);
                }
            }]);
    }


    public function cannedResponses(){
        return $this->hasMany(CannedResponse::class);
    }

    public function categories(): HasMany
    {
        return $this->hasMany(Category::class);
    }

}
