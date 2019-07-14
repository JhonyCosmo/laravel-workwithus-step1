<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContasFormRequest extends FormRequest
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
            'titulo'=>'required',
            'resumo'=>'required',
            'valor'=>'required',
            'vencimento'=>'required'
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
