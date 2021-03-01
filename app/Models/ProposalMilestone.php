<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProposalMilestone extends Model
{
    use SoftDeletes;
    public $table = 'proposal_milestones';

    public $fillable = [
        'proposal_id',
        'status',
        'admin_status',
        'title',
        'description',
        'duration',
        'duration_type',
        'amount',
        'problem_description',
        'expected_start',
        'payment_at',
        'finished_at',
    ];



    // Relations

    /**
     * Get the prpposal that owns the ProposalMilestone
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function proposal()
    {
        return $this->belongsTo(JobProposal::class, 'proposal_id', 'id');
    }
}
