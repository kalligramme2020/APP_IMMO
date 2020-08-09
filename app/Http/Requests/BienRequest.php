<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BienRequest extends FormRequest
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
        return [
            'name' => ['required', 'string', 'max:255'],
            'pays' => ['required', 'string', 'max:255'],
            'ville' => ['required', 'string', 'max:255'],
            'region' => ['required', 'string', 'max:255'],
            'surface' => [ 'int', 'max:255'],
            'addresse' => ['required', 'string', 'max:255'],
            'description' => ['string', 'max:255'],

            'file' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2000',
        ];
    }
}
