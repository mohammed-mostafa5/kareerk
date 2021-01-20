<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FreelancerEmployment extends Model
{
    public $table = 'freelancer_employment';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'freelancer_id',
        'country_id',
        'city',
        'company',
        'title',
        'from_date',
        'to_date',
        'description',
        'still_working',
    ];


    public $timestamps = false;

    // Relations

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
