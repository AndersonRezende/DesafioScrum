<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientStoreRequest extends FormRequest
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
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'name' => 'nome',
            'email' => 'email',
            'password' => 'senha',
            'address' => 'bairro',
            'street' => 'rua',
            'number' => 'número',
            'city' => 'cidade',
            'state' => 'estado',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:3|max:255',
            'email' => 'required|email:rfc|max:255|unique:clients,email',
            'password' => 'required',
            'address' => 'required',
            'street' => 'required',
            'number' => 'required',
            'city' => 'required',
            'state' => 'required',
        ];
    }
}
