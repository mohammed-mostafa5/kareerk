<?php

namespace App\Models;

use App\Helpers\ImageUploaderTrait;
use Eloquent as Model;
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
                return 'Take Deposit';
                break;
            case 3:
                return 'Return Deposit';
                break;

            default:
                return 'Unknown Transaction';
                break;
        }
    }
}
