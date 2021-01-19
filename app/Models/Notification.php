<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    public $fillable = [
        'user_id',
        'other_user_id',
        'text',
        'type',
        'notifable_id',
        'notifable_type',
        'seen',
    ];

    // Relations

    public function notifable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function otherUser()
    {
        return $this->belongsTo(User::class, 'other_user_id', 'id');
    }
}
