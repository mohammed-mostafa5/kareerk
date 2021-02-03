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
        'description',
        'duration',
        'duration_type',
        'amount',
        'expected_start',
        'payment_at',
        'finished_at',
    ];
}
