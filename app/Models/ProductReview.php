<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ProductReview
 * @package App\Models
 * @version May 7, 2020, 11:24 am UTC
 *
 * @property integer pharmacy_id
 * @property integer product_id
 * @property integer rate
 */
class ProductReview extends Model
{
    use SoftDeletes;

    public $table = 'product_reviews';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'user_id',
        'user_type',
        'product_id',
        'comment',
        'in_home',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'product_id' => 'integer',
        'rate' => 'integer'
    ];

    public $timestamps = false;

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [];


    // Relations

    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'product_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
}
