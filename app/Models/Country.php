<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Country
 * @package App\Models
 * @version December 30, 2020, 2:56 pm EET
 *
 */
class Country extends Model
{
    use SoftDeletes, Translatable;

    public $table = 'countries';


    protected $dates = ['deleted_at'];



    public $fillable = ['status'];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer'
    ];

    public $translatedAttributes =  ['name'];

    public static function rules()
    {
        $languages = array_keys(config('langs'));

        foreach ($languages as $language) {
            $rules[$language . '.name'] = 'required|string|min:3|max:191';
        }

        $rules['status'] = 'required|in:0,1';

        return $rules;
    }



    #################################################################################
    ############################## Accessors & Mutators #############################
    #################################################################################

    public function getStatusAttribute()
    {
        return $this->attributes['status'] ? 'Active' : 'Inactive';
    }

    #################################################################################
    ################################### Scopes #####################################
    #################################################################################

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
