<?php

namespace App\Models;

use Eloquent as Model;
use App\Helpers\ImageUploaderTrait;

class Setting extends Model
{
    use ImageUploaderTrait;

    public $table = 'settings';

    public $fillable = [
        'key',
        'value'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'key' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'key' => 'required|min:3|max:191',
        'value' => 'required|min:3'
    ];

    /**
     * Timestamps.
     *
     * @var boolean
     */
    public $timestamps = false;


    /**
     * Scope a query to order data.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $type    ['asc', 'desc']
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSorted($query, $type='asc')
    {
        return $query->orderBy('settings.id', $type);
    }

    /**
     * Data Setter for value attribute
     */
    public function setValueAttribute($file)
    {
        if($this->id == '2' || $this->id == '3')
        {
            if ($file)
            {
                $fileName = $this->createFileName($file);

                $this->originalImage($file, $fileName);

                $this->thumbImage($file, $fileName);

                $this->attributes['value'] = $fileName;
            }
        }else{
            $this->attributes['value'] = $file;
        }
    }

    public function getOriginalImageAttribute()
    {
        return 'uploads/images/original/' . $this->value;
    }

    public function getThumbnailAttribute()
    {
        return 'uploads/images/thumbnail/' . $this->value;
    }

}
