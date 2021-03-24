<?php

namespace App\Models;

use App\Helpers\ImageUploaderTrait;
use Illuminate\Database\Eloquent\Model;

class FreelancerEducation extends Model
{
    use ImageUploaderTrait;

    public $table = 'freelancer_education';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'freelancer_id',
        'school',
        'study',
        'degree',
        'from_date',
        'to_date',
        'description',
        'file',
        'link',
    ];

    public $timestamps = false;


    ################################# Functions ####################################

    public function setFileAttribute($file)
    {
        if ($file) {

            // $fileName = $this->createFileName($file);
            $fileName = time() . '_' . $this->file;

            $this->saveFile($file, $fileName);

            $this->attributes['file'] = $fileName;
        }
    }

    public function getFileAttribute($val)
    {
        return $val ? asset('uploads/files') . '/' . $val : null;
    }
}
