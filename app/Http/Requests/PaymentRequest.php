<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'location' => ['required', 'string', 'max:255'],
            'locataire' => ['required', 'string', 'email', 'max:255', 'unique:locataire'],
            'bien' => ['', 'string', 'max:255'],
            'debut' => [ 'date','required', 'max:255'],
            'fin' => [ 'date','required', 'max:255'],
            'date' => [ 'string', 'max:255'],
            'reste' => [ 'int', 'max:255'],
            'avance' => [ 'int', 'max:255'],
            'montant' => [ 'int', 'max:255'],

        ];
    }
}
