<?php

namespace App\Http\Requests\AdminPanel;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Ads;

class UpdateAdsRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = Ads::$rules;
        
        $rules['photo'] = 'image|mimes:jpeg,jpg,png';
        $rules['width'] = '';
        $rules['height'] = '';
        $rules['page'] = '';

        return $rules;
    }
}
