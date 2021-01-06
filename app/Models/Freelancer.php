<?php

namespace App\Models;

use App\Helpers\ImageUploaderTrait;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Freelancer
 * @package App\Models
 * @version December 30, 2020, 2:49 pm EET
 *
 * @property integer $main_service_id
 * @property integer $expertise_level
 * @property integer $hourly_rate
 * @property string $title
 * @property string $overview
 * @property string $photo
 * @property string $city
 * @property string $address
 */
class Freelancer extends Model
{
    use SoftDeletes, ImageUploaderTrait;

    public $table = 'freelancers';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'main_service_id',
        'expertise_level',
        'hourly_rate',
        'title',
        'overview',
        'photo',
        'city',
        'address',
        'step',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'main_service_id' => 'integer',
        'expertise_level' => 'integer',
        'hourly_rate' => 'integer',
        'title' => 'string',
        'overview' => 'string',
        'photo' => 'string',
        'city' => 'string',
        'address' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
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
    ################################### Relations ###################################
    #################################################################################


    public function user()
    {
        return $this->morphOne('App\Models\User', 'userable');
    }

    public function services()
    {
        return $this->belongsToMany('App\Models\Service', 'freelancer_services', 'freelancer_id', 'service_id');
    }

    public function skills()
    {
        return $this->belongsToMany('App\Models\Skill', 'freelancer_skills', 'freelancer_id', 'skill_id');
    }

    public function languages()
    {
        return $this->belongsToMany('App\Models\Language', 'freelancer_languages', 'freelancer_id', 'language_id')->withPivot('level');
    }

    public function education()
    {
        return $this->hasMany('App\Models\FreelancerEducation', 'freelancer_id', 'id');
    }

    public function employment()
    {
        return $this->hasMany('App\Models\FreelancerEmployment', 'freelancer_id', 'id');
    }
}
