<?php

namespace App\Http\Requests\painel;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Foundation\Providers\FoundationServiceProvider;

class ProductFormRequest extends FormRequest
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
        'name' => 'required|min:3|max:40',
        'number' => 'required|numeric',
        'categoria' => 'required',
        'desc' => 'min:3|max:1000'
    ];

    }

    public function messages(){
        return [
            'name.required' => 'Campo nome obrigatório!',
            'number.required' => 'Campo número obrigatório!',
            'number.numeric' => 'Campo deve obter somente números!',
            'categoria.required' => 'Obrigatório escolher categoria!',
            'desc.min:3|max:1000' => 'Descrição com mais de 3 caracteres obrigatória!'//mensagem desc não funciona.
        ];

    }

}