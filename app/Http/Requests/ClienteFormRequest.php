<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ClienteFormRequest extends FormRequest
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
            'nome' => 'required|max:120|min:5',
            'celular' => 'required|max:11|min:10',
            'email' => 'required|max:120|email|unique:clientes,email',
            'cpf' => 'required|max:11|min:11|unique:clientes,cpf',
            'dataNacimento' => 'required',
            'cidade' => 'required|max:120',
            'estado' => "required|max:2|min:2",
            'pais' => 'required|max:80',
            'rua' => 'required|max:120',
            'numero' => 'required|max:10',
            'bairro' => 'required|max:100',
            'cep' => 'required|max:8|min:8',
            'complemeto' => 'required|max:150',
            'password' => 'required'
        ];
    }
    public function failedValidation(Validator $validator){
        throw new HttpResponseException(response()->json([
            'success' => false,
            'error' => $validator->errors()
        ]));
    }
    public function messages()
    {
        return[
            'nome.required' => 'O campo nome é obrigatorio',
            'nome.max' => 'O campo nome deve conter no maximo 120 caracteres',
            'nome.min' => 'O campo nome deve conter no minimo 5 caracteres',
            'celular.required' => 'O campo celular é obrigatorio',
            'celular.max' => 'O campo celular deve conter no maximo 11 caracteres',
            'celular.min' => 'O campo celular deve conter no minimo 10 caracteres',
            'email.required' => 'O campo email é obrigatorio',
            'email.max' => 'o campo email deve conter bo maximo 120 caracteres',
            'email.email' => 'formato de email invalido',
            'email.unique' => 'Email ja cadastrado no sistema',
            'cpf.required' => 'O campo CPF é obrigatorio',
            'cpf.max' => 'O campo CPF deve conter no maximo 11 caracteres',
            'cpf.min' => 'O campo CPF deve conter no minimo 11 caracteres',
            'cpf.unique' => 'Esse CPF ja foi cadastrado',
            'dataNacimento.required' => 'Data de nacimento obrigatorio',
            'dataNacimento.date' => 'Formato de data de nacimento invalido',
            'cidade.required' => 'O campo cidade é obrigatorio',
            'cidade.max' => 'O campo cidade deve conter no maximo 120 caracteres',
            'estado.required' => 'O campo estado é obrigatorio',
            'estado.max'=> 'O campo estado deve conter no maximo 2 caracteres',
            'estado.min' => 'O campo estado deve conter no minimo 2 caractesres',
            'pais.required' => 'O campo pais é obrigatorio',
            'pais.max' => 'o campo pais deve conter no maximo 80 caracteres',
            'rua.required'=>'O campo rua é obrigatorio',
            'rua.max' => 'O campo rua deve conter no maximo 120 caracteres',
            'numero.required' => 'O campo numero é obrigatorio',
            'numero.max' => 'O campo numero deve conter no maximo 10 caracteres',
            'bairro.required' => 'O campo bairro é obrigatorio',
            'bairro.max'=> 'o campo bairro deve conter no maximo 100 caracteres',
            'cep.required'=> 'O campo CEP é obrigatorio',
            'cep.max' => 'O campo CEp deve conter no maximo 8 caracteres',
            'cep.min' => 'O campo CEP deve conter no maximo 8 caracteres',
            'complemeto.required'=> 'complemeto é obrigatorio',
            'complemeto.max' => 'O campo complemeto deve conter 150 caracteres',
            'password.required'=> 'password é obrigatorio'

        ];
    }
}
