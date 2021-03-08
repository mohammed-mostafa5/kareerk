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
        'available',
        'freelancers_count',
        'payment_type',
        'budget',
        'expected_time',
        'step',
        'status',
        'progress_status',
        'completed_at',
    ];

    public static $rules = [];

    ################################### Relations ###################################

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

    ################################### Scopes #####################################

    public function scopeOpen($query)
    {
        return $query->where('available', 1);
    }

    public function scopePublic($query)
    {
        return $query->where('visibility', 1);
    }

    ################################### Appends #####################################

    protected $appends = ['complete_availability'];

    public function getCompleteAvailabilityAttribute()
    {
        $proposals = $this->proposals;
        $milestones = null;

        foreach ($proposals as $proposal) {
            $milestones = $proposal->milestones()->where('payment_at', '!=', null)->whereNotIn('status', [3, 4])->get();
        }
        if ($milestones && $milestones->count() < 1) {
            return true;
        }
        return false;
    }
}
