<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Career
 * @package App\Models
 * @version February 25, 2021, 3:14 pm EET
 *
 */
class Career extends Model
{
    use SoftDeletes, Translatable;

    public $table = 'careers';


    protected $dates = ['deleted_at'];



    public $fillable = ['id'];

    public $translatedAttributes =  ['title', 'description'];

    public static function rules()
    {
        $languages = array_keys(config('langs'));

        foreach ($languages as $language) {
            $rules[$language . '.title'] = 'required|string|max:191';
            $rules[$language . '.description'] = 'required|string';
        }

        return $rules;
    }
}
