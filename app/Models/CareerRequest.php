<?php

namespace App\Models;

use App\Helpers\ImageUploaderTrait;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class CareerRequest
 * @package App\Models
 * @version February 25, 2021, 3:26 pm EET
 *
 * @property integer $career_id
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $cover_letter
 * @property string $cv
 */
class CareerRequest extends Model
{
    use SoftDeletes, ImageUploaderTrait;

    public $table = 'career_requests';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'career_id',
        'name',
        'email',
        'phone',
        'cover_letter',
        'cv'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'career_id' => 'integer',
        'name' => 'string',
        'email' => 'string',
        'phone' => 'string',
        'cover_letter' => 'string',
        'cv' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [];


    // Relations

    public function career()
    {
        return $this->belongsTo(Career::class, 'career_id', 'id');
    }


    // Functions

    public function setCvAttribute($file)
    {
        if ($file) {

            $fileName = $this->createFileName($file);

            $this->saveFile($file, $fileName);

            $this->attributes['cv'] = $fileName;
        }
    }


    public function getCvAttribute($val)
    {

        return $val ? asset('uploads/files') . '/' . $val : null;
    }
}
