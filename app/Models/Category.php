<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Astrotomic\Translatable\Translatable;

use App\Helpers\ImageUploaderTrait;

/**
 * Class category
 * @package App\Models
 * @version May 11, 2020, 11:33 am UTC
 *
 * @property string name
 * @property string photo
 * @property integer status
 */
class Category extends Model
{
    use SoftDeletes, Translatable, ImageUploaderTrait;

    public $table = 'categories';


    protected $dates = ['deleted_at'];

    /**
     * Translated attributes.
     *
     * @var array
     */
    public $translatedAttributes =  ['name'];

    public $fillable = [
        // 'parent_id',
        'photo',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'photo' => 'string',
        'status' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static function rules()
    {
        $languages = array_keys(config('langs'));

        foreach ($languages as $language) {
            $rules[$language . '.name'] = 'required|string|min:3|max:191';
        }

        $rules['status'] = 'required|in:0,1';
        $rules['photo'] = 'required|image|mimes:jpeg,jpg,png';

        return $rules;
    }


    #################################################################################
    ################################### Appends #####################################
    #################################################################################


    protected $appends = ['photo_path'];

    public function getPhotoPathAttribute()
    {
        return $this->photo ? asset('uploads/images/original/' . $this->photo) : null;
    }




    #################################################################################
    ################################# Functions #####################################
    #################################################################################

    public function setPhotoAttribute($file)
    {

        if ($file) {
            if (is_array($file)) {
                foreach ($file as $f) {
                    $fileName = $this->createFileName($f);

                    $this->originalImage($f, $fileName);

                    $this->thumbImage($f, $fileName, 182, 182);

                    $this->attributes['photo'] = $fileName;
                }
            } else {
                $fileName = $this->createFileName($file);

                $this->originalImage($file, $fileName);

                $this->thumbImage($file, $fileName, 182, 182);

                $this->attributes['photo'] = $fileName;
            }
        }
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
        return $this->hasMany('App\Models\Category', 'parent_id', 'id');
    }
}
