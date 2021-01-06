<?php

namespace App\Models;

use App\Helpers\ImageUploaderTrait;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class JobFiles extends Model
{
    use ImageUploaderTrait;

    public $table = 'job_files';


    public $fillable = [
        'job_id',
        'file',
    ];

    public $timestamps = false;

    public static $rules = [];



    public function setFileAttribute($file)
    {
        if ($file) {

            $fileName = $this->createFileName($file);

            $this->originalImage($file, $fileName);

            $this->thumbImage($file, $fileName);

            $this->attributes['file'] = $fileName;
        }
    }



    public function getFileAttribute($val)
    {

        return $val ? asset('uploads/images/original') . '/' . $val : null;
    }

    #################################################################################
    ################################# Relations #####################################
    #################################################################################

    public function job()
    {
        return $this->belongsTo('App\Models\Job', 'job_id', 'id');
    }
}
