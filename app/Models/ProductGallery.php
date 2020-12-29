<?php

namespace App\Models;

use App\Helpers\ImageUploaderTrait;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class ProductGallery extends Model
{
    use ImageUploaderTrait;

    public $table = 'product_gallery';


    public $fillable = [
        'product_id',
        'photo',
    ];


    protected $casts = [
        'product_id' => 'integer',
        'photo' => 'string'
    ];

    public $timestamps = false;

    public static $rules = [];



    public function setPhotoAttribute($file)
    {
        if ($file) {


            $fileName = $this->createFileName($file);

            $this->originalImage($file, $fileName);

            $this->thumbImage($file, $fileName);

            $this->attributes['photo'] = $fileName;
        }
    }



    public function getPhotoAttribute($val)
    {

        return $val ? asset('uploads/images/original') . '/' . $val : null;
    }

    #################################################################################
    ################################# Relations #####################################
    #################################################################################

    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'product_id', 'id');
    }
}
