<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LocataireRequest extends FormRequest
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
            'nom' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:locataire'],
            'ville' => ['required', 'string', 'max:255'],
            'phone' => [ 'int','required', 'max:255','unique:locataire'],
            'cni' => [ 'int','required', 'max:255','unique:locataire'],
            'prenom' => [ 'string', 'max:255'],
            'pays' => ['required', 'string', 'max:255'],
            'proff' => [ 'string', 'max:255'],

            'file' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2000',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Email  est obligatoire!',
            'name.required' => 'Name is required!',
            'password.required' => 'ce champ est obligatoire!',
            'cni.required' => 'ce champ est obligatoire!',
        ];
    }
}
