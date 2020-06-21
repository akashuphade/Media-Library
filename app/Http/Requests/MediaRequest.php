<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImageRequest extends FormRequest
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
        $validateArr = ['description' => 'required'];

        if ($this->method() === 'POST') {
            $validateArr = array_merge($validateArr, ['image' => 'required|image|mimes:jpeg,jpg,png']);
        }

        return $validateArr;
    }
}
