<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Chat
 * @package App\Models
 * @version January 13, 2021, 4:07 pm EET
 *
 * @property string $name
 * @property integer $created_by
 * @property integer $latest_message
 */
class Chat extends Model
{
    use SoftDeletes;

    public $table = 'chats';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'name',
        'created_by',
        'latest_message'
    ];

    public static $rules = [];


    // Relations
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function contacts()
    {
        return $this->hasMany(ChatContact::class);
    }
}
