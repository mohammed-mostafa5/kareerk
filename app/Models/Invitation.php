<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Invitation extends Model
{
    public $table = 'job_invitations';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'job_id',
        'freelancer_id',
        'proposaled',
    ];

    // protected $casts = [
    //     'id' => 'integer',
    //     'freelancer_id' => 'integer',
    // ];

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
