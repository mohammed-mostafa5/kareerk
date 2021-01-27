<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{
    public $table = 'job_invitations';

    public $fillable = [
        'job_id',
        'freelancer_id',
    ];

    // Relations
    public function job()
    {
        return $this->belongsTo(Job::class, 'job_id', 'id');
    }

    public function freelancer()
    {
        return $this->belongsTo(Freelancer::class, 'freelancer_id', 'id');
    }
}
