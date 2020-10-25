<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ProductFileUpload;

class ProductStoreRequest extends FormRequest
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
            'description' => 'descrição',
            'value' => 'valor',
            'amount' => 'estoque',
            'fileitems' => 'arquivos'
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
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'min:1', 'max:255'],
            'value' => ['required', 'numeric'],
            'amount' => ['required', 'numeric'],
            'fileitems' => ['required', new ProductFileUpload]
        ];
    }
}
