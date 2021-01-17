<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ChatContact
 * @package App\Models
 * @version January 13, 2021, 4:10 pm EET
 *
 * @property integer $chat_id
 * @property integer $user_id
 * @property integer $other_user_id
 */
class ChatContact extends Model
{
    use SoftDeletes;

    public $table = 'chat_contacts';


    protected $dates = ['deleted_at'];

    public $timestamps = false;

    public $fillable = [
        'chat_id',
        'user_id',
        'other_user_id',
        'unseen_count',
    ];


    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [];


    // Relations

    public function chat()
    {
        return $this->belongsTo(\App\Models\Chat::class);
    }

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function otherUser()
    {
        return $this->belongsTo(\App\Models\User::class, 'other_user_id', 'id');
    }
}
