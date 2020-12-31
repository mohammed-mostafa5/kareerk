<?php

namespace App\Models;

use App\Helpers\ImageUploaderTrait;
use Astrotomic\Translatable\Translatable;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Service
 * @package App\Models
 * @version December 29, 2020, 6:38 pm EET
 *
 * @property integer $parent_id
 * @property string $photo
 * @property integer $status
 */
class Service extends Model
{
    use SoftDeletes, Translatable, ImageUploaderTrait;

    public $table = 'services';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'parent_id',
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
        'parent_id' => 'integer',
        'photo' => 'string',
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
        $rules['photo'] = '';

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
    ################################# Relations #####################################
    #################################################################################

    public function mainService()
    {
        return $this->belongsTo('App\Models\Service', 'parent_id', 'id');
    }

    #################################################################################
    ################################# Functions #####################################
    #################################################################################

    public function setPhotoAttribute($file)
    {

        try {
            if ($file) {

                if ($file) {

                    $fileName = $this->createFileName($file);

                    $this->originalImage($file, $fileName);

                    $this->thumbImage($file, $fileName, 182, 182);

                    $this->attributes['photo'] = $fileName;
                }
            }
        } catch (\Throwable $th) {
            $this->attributes['photo'] = $file;
        }
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