<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MediaRequest extends FormRequest
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
        if(stripos(url()->current(), 'embed') !== false) {
            $validateArr = [
                "description" => "required",
                "link" => "required"
            ];
        } else {

            $validateArr = ["description" => "required"];

            if ($this->method() === "POST") {
                $validateArr = array_merge($validateArr, ["media" => "required|mimes:jpeg,jpg,png,pdf,audio/mpeg,mpga,mp3,wav,mp4"]);
            }
        }
        return $validateArr;
    }
}
