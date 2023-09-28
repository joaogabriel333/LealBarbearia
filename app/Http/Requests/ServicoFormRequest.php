<?php

namespace App\Http\Requests;

use Dotenv\Validator;
use Illuminate\Contracts\Validation\Validator as ValidationValidator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ServicoFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'nome' => 'required|max:80|min:5|unique:servicos,nome',
            'descricao' => 'required|max:200|min:10',
            'duracao' => 'required|integer',
            'preco' => 'required|decimal:2'
        ];
    }
    public function failedValidation(ValidationValidator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'error' => $validator->errors()
        ]));
    }
    public function messages()
    {
        return[
            'nome.required' => 'O campo nome é obrigatorio',
            'nome.max' => 'O campo nome deve conter no maximo 80 caracteres',
            'nome.min' => 'O campo nome deve conter no minimo 5 caracteres',
            'nome.unique' => "O nome desse serviço ja foi registrado",
            'descricao.required' => 'O campo descrição é obrigatorio',
            'descricao.max' => 'O campo descrição deve conter no maximo 200 caracteres',
            'descricao.min' => 'O campo descrição deve conter no minimo 10 caracteres',
            'duracao.required' => 'O tempo de duração é obrigatorio',
            'duracao.integer' => 'O formato de duração é invalido',
            'preco.required' => 'preço obrigatoria',
            'preco.decimal' => 'O formato de preço é invalido'

            
        ];
    }
}
