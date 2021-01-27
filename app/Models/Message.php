<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Message
 * @package App\Models
 * @version January 13, 2021, 4:09 pm EET
 *
 * @property integer $chat_id
 * @property integer $user_id
 * @property integer $text
 * @property integer $seen
 */
class Message extends Model
{
    use SoftDeletes;

    public $table = 'messages';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'chat_id',
        'user_id',
        'text',
        'seen'
    ];

    public static $rules = [];


    public function getCreatedAtAttribute()
    {
        if (isset($this->attributes['created_at'])) {
            return \Carbon\Carbon::parse($this->attributes['created_at'])->diffForHumans();
        }
    }

    // Relations

    public function chat()
    {
        return $this->belongsTo(\App\Models\Chat::class);
    }

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function files()
    {
        return $this->hasMany(MessageFiles::class);
    }
}
