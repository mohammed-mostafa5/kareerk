<?php

namespace App\Models;

use App\Helpers\ImageUploaderTrait;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class MessageFiles extends Model
{
    use ImageUploaderTrait;

    public $table = 'message_files';

    public $fillable = [
        'message_id',
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
}
