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


    public static $rules = [];



    protected $appends = ['is_featured', 'photo_path', 'thumbnail_path'];

    public function setPhotoAttribute($file)
    {
        if ($file) {

            $fileName = $this->createFileName($file);

            $this->originalImage($file, $fileName);

            $this->thumbImage($file, $fileName, 180, 180);

            $this->attributes['photo'] = $fileName;
        }
    }

    public function getPhotoPathAttribute()
    {
        return $this->photo ? asset('uploads/images/original/' . $this->photo) : null;
    }

    public function getThumbnailPathAttribute()
    {
        return $this->photo ? asset('uploads/images/thumbnail/' . $this->photo) : null;
    }



    #################################################################################
    ################################### Relations ###################################
    #################################################################################


    public function user()
    {
        return $this->morphOne(User::class, 'userable');
    }

    public function services()
    {
        return $this->belongsToMany('App\Models\Service', 'freelancer_services', 'freelancer_id', 'service_id');
    }

    public function mainService()
    {
        return $this->belongsTo(Service::class, 'main_service_id', 'id');
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

    public function invitations()
    {
        return $this->hasMany(Invitation::class, 'freelancer_id', 'id');
    }


    ######################################################################



    public function getIsFeaturedAttribute()
    {
        if (in_array($this->attributes['id'], FeaturedFreelancer::get()->pluck('freelancer_id')->toArray())) {
            return $this->attributes['is_featured'] = 1;
        }
        return $this->attributes['is_featured'] = 0;
    }
}
