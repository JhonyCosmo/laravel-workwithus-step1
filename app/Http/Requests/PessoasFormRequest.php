<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PessoasFormRequest extends FormRequest
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
        return[
            'nome'=>'required|min:3',
            'fone'=>'required|numeric|min:6',
            'email'=>'required|min:3',
        ];
    }
    public function messages()
    {
        return [
            'required'=>'O :attribute é obrigatorio',
            'numeric'=>'O :attribute tem que ser um número',
            'nome.min'=>'O :attribute está com a quantidade de caracteres inválida!'
        ];
    }
}
