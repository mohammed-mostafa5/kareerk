<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Job
 * @package App\Models
 * @version January 3, 2021, 10:26 am EET
 *
 * @property integer $service_id
 * @property string $name
 * @property string $description
 * @property integer $expertise_level
 * @property integer $visibility
 * @property integer $freelancers_count
 * @property integer $payment_type
 * @property integer $budget
 * @property string $expected_time
 * @property integer $step
 * @property integer $status
 */
class Job extends Model
{
    use SoftDeletes;

    public $table = 'jobs';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'service_id',
        'client_id',
        'title',
        'description',
        'expertise_level',
        'visibility',
        'freelancers_count',
        'payment_type',
        'budget',
        'expected_time',
        'step',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'service_id' => 'integer',
        'title' => 'string',
        'description' => 'string',
        'expertise_level' => 'integer',
        'visibility' => 'integer',
        'freelancers_count' => 'integer',
        'payment_type' => 'integer',
        'budget' => 'integer',
        'expected_time' => 'string',
        'step' => 'integer',
        'status' => 'integer'
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

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id', 'id');
    }
    public function skills()
    {
        return $this->belongsToMany('App\Models\Skill', 'job_skills', 'job_id', 'skill_id');
    }

    public function invitations()
    {
        return $this->belongsToMany('App\Models\Freelancer', 'job_invitations', 'job_id', 'freelancer_id')->withPivot('proposaled')->withTimestamps();
    }

    public function files()
    {
        return $this->hasMany('App\Models\JobFiles', 'job_id', 'id');
    }

    public function proposals()
    {
        return $this->hasMany('App\Models\JobProposal', 'job_id', 'id');
    }

    public function service()
    {
        return $this->belongsTo('App\Models\Service', 'service_id', 'id');
    }

    public function notification()
    {
        return $this->morphOne(Notification::class, 'notifable');
    }


    #################################################################################
    ################################### Scopes #####################################
    #################################################################################

    public function scopeOpen($query)
    {
        return $query->where('available', 1);
    }

    public function scopePublic($query)
    {
        return $query->where('visibility', 1);
    }
}
