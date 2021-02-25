<?php

namespace App\Models;

use App\Helpers\ImageUploaderTrait;
use Astrotomic\Translatable\Translatable;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Blog
 * @package App\Models
 * @version February 25, 2021, 12:16 pm EET
 *
 * @property string $photo
 */
class Blog extends Model
{
    use SoftDeletes, Translatable, ImageUploaderTrait;

    public $table = 'blogs';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'photo'
    ];


    public $translatedAttributes =  ['title', 'description'];

    public static function rules()
    {
        $languages = array_keys(config('langs'));

        foreach ($languages as $language) {
            $rules[$language . '.title'] = 'required|string|max:191';
            $rules[$language . '.description'] = 'required|string';
        }

        $rules['photo'] = 'required';

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
}
