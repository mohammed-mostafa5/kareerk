<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Skill
 * @package App\Models
 * @version December 30, 2020, 1:28 pm EET
 *
 * @property integer $service_id
 * @property integer $status
 */
class Skill extends Model
{
    use SoftDeletes, Translatable;

    public $table = 'skills';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'service_id',
        'parent_id',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'service_id' => 'integer',
        'status' => 'integer'
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
    ################################# Relations #####################################
    #################################################################################

    public function service()
    {
        return $this->belongsTo('App\Models\Service', 'service_id', 'id');
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

    public function scopeParent($query)
    {
        return $query->where('parent_id', null);
    }

    public function scopeChild($query)
    {
        return $query->where('parent_id', '!=', null);
    }

    public function children()
    {
        return $this->hasMany('App\Models\Service', 'parent_id', 'id');
    }
}
