<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FreelancerEducation extends Model
{
    public $table = 'freelancer_education';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'freelancer_id',
        'school',
        'study',
        'degree',
        'from_date',
        'to_date',
        'description',
    ];

    public $timestamps = false;
}
