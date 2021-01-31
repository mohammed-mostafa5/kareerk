<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobProposal extends Model
{
    public $table = 'job_proposals';

    public $fillable = [
        'job_id',
        'freelancer_id',
        'expected_time',
        'cover_letter',
    ];

    // Relations

    public function milestones()
    {
        return $this->hasMany('App\Models\ProposalMilestone', 'proposal_id', 'id');
    }

    public function files()
    {
        return $this->hasMany('App\Models\Proposalfiles', 'proposal_id', 'id');
    }

    public function job()
    {
        return $this->belongsTo(Job::class);
    }
}
