<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Helpers\ImageUploaderTrait;

/**
 * Class Ads
 * @package App\Models
 * @version June 4, 2020, 11:59 am UTC
 *
 * @property string $photo
 * @property integer $width
 * @property integer $height
 * @property string $page
 * @property string $link
 */
class Ads extends Model
{
    use SoftDeletes, ImageUploaderTrait;

    public $table = 'ads';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'photo',
        'width',
        'height',
        'page',
        'link'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'photo' => 'string',
        'width' => 'integer',
        'height' => 'integer',
        'page' => 'string',
        'link' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'photo' => 'required|image',
        'width' => 'required',
        'height' => 'required',
        'page' => 'required|string',
        'link' => 'required|string'
    ];

    /**
     * Timestamps.
     * 
     * @var boolean
     */
    public $timestamps = false;

    public function setPhotoAttribute($file)
    {
        if ($file)
        {
            if(is_array($file))
            {
                foreach( $file as $f )
                {
                    $fileName = $this->createFileName($f);

                    // $this->originalImage($f, $fileName);

                    $this->thumbImage($f, $fileName, $this->attributes['width'], $this->attributes['height']);

                    $this->attributes['photo'] = $fileName;
                }
            }
            else{
                $fileName = $this->createFileName($file);

                // $this->originalImage($file, $fileName);

                $this->thumbImage($file, $fileName, $this->attributes['width'], $this->attributes['height']);

                $this->attributes['photo'] = $fileName;
            }
        }
    }

}
