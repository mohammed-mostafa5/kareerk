<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProposalMilestone extends Model
{
    public $table = 'proposal_milestones';

    public $fillable = [
        'proposal_id',
        'description',
        'due_date',
        'amount',
    ];
}
