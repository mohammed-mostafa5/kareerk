<?php

namespace App\Models;

use App\Helpers\ImageUploaderTrait;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class ProposalFiles extends Model
{
    use ImageUploaderTrait;

    public $table = 'proposal_files';


    public $fillable = [
        'proposal_id',
        'file',
    ];

    public $timestamps = false;

    public static $rules = [];


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
