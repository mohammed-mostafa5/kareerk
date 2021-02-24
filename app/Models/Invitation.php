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


    // Relations
    public function job()
    {
        return $this->belongsTo(Job::class, 'job_id', 'id');
    }

    public function freelancer()
    {
        return $this->belongsTo(Freelancer::class, 'freelancer_id', 'id');
    }


    #############################################


    public function getCreatedAtAttribute()
    {
        if (isset($this->attributes['created_at'])) {
            return \Carbon\Carbon::parse($this->attributes['created_at'])->diffForHumans();
        }
    }
}
