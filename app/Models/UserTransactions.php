<?php

namespace App\Models;

use Eloquent as Model;
use App\Helpers\ImageUploaderTrait;
use Illuminate\Database\Eloquent\SoftDeletes;



class UserTransactions extends Model
{
    use ImageUploaderTrait;

    public $table = 'user_transactions';


    public $fillable = [
        'user_id',
        'value',
        'action',
    ];

    protected $casts = [
        'user_id' => 'integer',
        'value' => 'integer',
        'action' => 'string',
    ];

    public static $rules = [];


    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    #################################################################################
    ############################## Accessors & Mutators #############################
    #################################################################################

    public function getActionAttribute()
    {

        switch ($this->attributes['action']) {

            case 1:
                return 'Charge Balance';
                break;
            case 2:
                return 'Job Fee';
                break;
            case 3:
                return 'Milestone Fee';
                break;
            case 4:
                return 'Milestone Amount';
                break;
            case 5:
                return 'Featured Fee';
                break;

            default:
                return 'Unknown Transaction';
                break;
        }
    }

    public function getCreatedAtAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['created_at'])->diffForHumans();
    }
}
