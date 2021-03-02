<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class FeaturedFreelancer
 * @package App\Models
 * @version March 2, 2021, 10:22 am EET
 *
 * @property integer $freelancer_id
 * @property string $start_at
 * @property string $end_at
 * @property integer $value
 */
class FeaturedFreelancer extends Model
{

    public $table = 'featured_freelancers';


    public $timestamps = false;

    public $fillable = [
        'freelancer_id',
        'start_at',
        'end_at',
        'value'
    ];

    // Relations

    public function freelancer()
    {
        return $this->belongsTo(Freelancer::class);
    }
}
