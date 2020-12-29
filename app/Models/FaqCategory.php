<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class FaqCategory
 * @package App\Models
 * @version December 8, 2020, 3:09 pm UTC
 *
 * @property integer $name
 */
class FaqCategory extends Model
{
    use Translatable, SoftDeletes;

    public $table = 'faq_categories';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'name'
    ];

    protected $casts = [
        'id' => 'integer',
        'name' => 'integer'
    ];

    public $translatedAttributes =  ['name'];

    public static function rules()
    {
        $languages = array_keys(config('langs'));

        foreach ($languages as $language) {
            $rules[$language . '.name'] = 'required|string|min:3|max:191';
        }

        return $rules;
    }
}
