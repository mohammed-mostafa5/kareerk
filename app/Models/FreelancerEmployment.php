<?php

namespace App\Models;

use App\Helpers\ImageUploaderTrait;
use Illuminate\Database\Eloquent\Model;

class FreelancerEmployment extends Model
{
    use ImageUploaderTrait;

    public $table = 'freelancer_employment';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'freelancer_id',
        'country_id',
        'city',
        'company',
        'title',
        'from_date',
        'to_date',
        'description',
        'still_working',
        'file',
        'link',
    ];


    public $timestamps = false;

    // Relations

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    ################################# Functions ####################################

    public function setFileAttribute($file)
    {
        if ($file) {

            $fileName = $this->createFileName($file);

            $this->saveFile($file, $fileName);

            $this->attributes['file'] = $fileName;
        }
    }

    public function getFileAttribute($val)
    {
        return $val ? asset('uploads/files') . '/' . $val : null;
    }
}
