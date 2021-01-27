<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Client
 * @package App\Models
 * @version December 30, 2020, 2:38 pm EET
 *
 */
class Client extends Model
{
    use SoftDeletes;

    public $table = 'clients';


    protected $dates = ['deleted_at'];



    public $fillable = [];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [];


    #################################################################################
    ################################### Relations ###################################
    #################################################################################


    public function user()
    {
        return $this->morphOne('App\Models\User', 'userable');
    }

    public function invitations()
    {
        return $this->hasManyThrough(Invitation::class, Job::class);
    }
}
