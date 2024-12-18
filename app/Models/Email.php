<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    protected $fillable = ['user_id', 'recipient_email', 'subject', 'message', 'status'];

    protected static function booted(): void
    {
        static::saving(function ($email) {
            // Convert standard line breaks to #ACTLINEBREAK#
            $email->message = preg_replace('/\r\n|\r|\n/', '#ACTLINEBREAK##ACTLINEBREAK#', $email->message);
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
