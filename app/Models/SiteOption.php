<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class SiteOption
 * @package App\Models
 * @version January 11, 2021, 12:22 pm EET
 *
 * @property integer $product_duration
 * @property integer $deposit_percentage
 */
class SiteOption extends Model
{

    public $table = 'site_options';




    public $fillable = [
        'job_fees',
        'featured_fees',
        'milestone_percentage'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'job_fees' => 'required',
        'featured_fees' => 'required',
        'milestone_percentage' => 'required',
    ];
}
