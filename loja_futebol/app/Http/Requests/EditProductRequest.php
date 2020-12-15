<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditProductRequest extends FormRequest
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
           'name' => 'required',
           'url' => 'required|image|mimes:jpeg,jpg,png,gif|max:2048'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O nome do Produto é Obrigatorio.',
            'url.required' => 'A imagme é Obrigatoria.',
            'url.image' => 'A imagme deve ser imagem.',
            'url.mimes' => 'A imagem pode ser jpeg,jpg,png,gif.',
            'url.max' => 'A imagem nao pode exceder 2MB.',
        ];
    }
}
