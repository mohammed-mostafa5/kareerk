<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Helpers\ImageUploaderTrait;

class File extends Model
{
    use SoftDeletes;

    use ImageUploaderTrait;

    public $table = 'files';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'fileable_id',
        'fileable_type',
        'file'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'fileable_id' => 'integer',
        'fileable_type' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    /**
     * Get all of the owning fileable models.
    */
    public function fileable()
    {
        return $this->morphTo();
    }

    public function setFileAttribute($file)
    {
        if ($file)
        {
            if(is_array($file))
            {
                foreach( $file as $f )
                {
                    $fileName = $this->createFileName($f);

                    $this->originalImage($f, $fileName);

                    $this->thumbImage($f, $fileName);

                    $this->attributes['file'] = $fileName;
                }
            }
            else{
                $fileName = $this->createFileName($file);

                $this->originalImage($file, $fileName);

                $this->thumbImage($file, $fileName);

                $this->attributes['file'] = $fileName;
            }
        }
    }
}
