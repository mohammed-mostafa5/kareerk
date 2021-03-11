<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Boolean;

class JobProposal extends Model
{
    public $table = 'job_proposals';

    public $fillable = [
        'job_id',
        'freelancer_id',
        'expected_time',
        'cover_letter',
    ];

    ################################### Relations #####################################

    public function milestones()
    {
        return $this->hasMany('App\Models\ProposalMilestone', 'proposal_id', 'id');
    }

    public function files()
    {
        return $this->hasMany('App\Models\ProposalFiles', 'proposal_id', 'id');
    }

    public function job()
    {
        return $this->belongsTo(Job::class);
    }

    public function freelancer()
    {
        return $this->belongsTo(Freelancer::class);
    }

    ################################### Appends #####################################

    protected $appends = ['rate_availability'];

    public function getRateAvailabilityAttribute()
    {
        $milestone = $this->milestones->whereIn('status', [3, 4])->first();
        if ($milestone) {
            return true;
        }
        return false;
    }

    // public function getIsAuthorizedAttribute()
    // {
    //     return in_array(auth('api')->id(), [$this->freelancer->user->id, $this->job->client->user->id]);
    // }
}
