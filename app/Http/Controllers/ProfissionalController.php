<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfissionalFormRequest;
use App\Models\Profissional;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfissionalController extends Controller
{
    public function criarProfissional(ProfissionalFormRequest $request)
    {
        $profissionals = Profissional::create([
            'nome' => $request->nome,
            'celular' => $request->celular,
            'email' => $request->email,
            'cpf' => $request->cpf,
            'dataNacimento' => $request->dataNacimento,
            'cidade' => $request->cidade,
            "estado" => $request->estado,
            "pais" => $request->pais,
            "rua" => $request->rua,
            "numero" => $request->numero,
            "bairro" => $request->bairro,
            "cep" => $request->cep,
            "complemeto" => $request->complemeto,
            "password"  => Hash::make($request->password),
            'salario' => $request->salario
        ]);
        return response()->json([
            "success" => true,
            "message" => "Profissional cadastrado com sucesso",
            "data" => $profissionals
        ], 200);
    }

public function procurarPorNomeProfissional(Request $request)
    {

        $profissionals = Profissional::where('nome', 'like', '%' . $request->nome . '%')->get();
        if (count($profissionals) > 0) {
            return response()->json([
                'status' => true,
                'data' => $profissionals
            ]);
        }


        return response()->json([
            'status' => false,
            'message' => "Não há resultados para pesquisar"
        ]);
    }
    public function procurarPorCpfProfissional(Request $request)
    {

        $profissionals = Profissional::where('cpf', 'like', '%' . $request->cpf . '%')->get();
        if (count($profissionals) > 0) {
            return response()->json([
                'status' => true,
                'data' => $profissionals
            ]);
        }


        return response()->json([
            'status' => false,
            'message' => "Não há resultados para pesquisar"
        ]);
    }
    public function procurarPorCelularProfissional(Request $request)
    {

        $profissionals = Profissional::where('celular', 'like', '%' . $request->celular . '%')->get();
        if (count($profissionals) > 0) {
            return response()->json([
                'status' => true,
                'data' => $profissionals
            ]);
        }


        return response()->json([
            'status' => false,
            'message' => "Não há resultados para pesquisar"
        ]);
    }
    public function procurarPorEmailProfissional(Request $request)
    {

        $profissionals = Profissional::where('email', 'like', '%' . $request->email . '%')->get();
        if (count($profissionals) > 0) {
            return response()->json([
                'status' => true,
                'data' => $profissionals
            ]);
        }


        return response()->json([
            'status' => false,
            'message' => "Não há resultados para pesquisar"
        ]);
    }
    public function exibirTodosProfissional()
    {
        $profissionals = Profissional::all();
        return response()->json([
            'status' => true,
            'data' => $profissionals
        ]);
    }
    public function editarprofissional(Request $request)
    {
        $profissionals = Profissional::find($request->id);

        if (!isset($profissionals)) {
            return response()->json([
                'status' => false,
                'massage' => "Cliente não encontrado"
            ]);
        }
        if (isset($request->nome)) {
            $profissionals->nome = $request->nome;
        }
        if (isset($request->celular)) {
            $profissionals->celular = $request->celular;
        }
        if (isset($request->email)) {
            $profissionals->email = $request->email;
        }
        if (isset($request->cpf)) {
            $profissionals->cpf = $request->cpf;
        }
        if (isset($request->dataNacimento)) {
            $profissionals->dataNacimento = $request->dataNacimento;
        }
        if (isset($request->cidade)) {
            $profissionals->cidade = $request->cidade;
        }
        if (isset($request->estado)) {
            $profissionals->estado = $request->estado;
        }
        if (isset($request->pais)) {
            $profissionals->pais = $request->pais;
        }
        if (isset($request->rua)) {
            $profissionals->rua = $request->rua;
        }
        if (isset($request->numero)) {
            $profissionals->numero = $request->numero;
        }
        if (isset($request->bairro)) {
            $profissionals->bairro = $request->bairro;
        }
        if (isset($request->cep)) {
            $profissionals->cep = $request->cep;
        }
        if (isset($request->complemeto)) {
            $profissionals->complemeto = $request->complemeto;
        }
        if (isset($request->password)) {
            $profissionals->password = $request->password;
        }
        if (isset($request->salario)) {
            $profissionals->salario = $request->salario;
        }

        $profissionals->update();
        return response()->json([
            'status' => true,
            'message' => "profissional atualizado"
        ]);
    }
    public function excluirprofissional($id)
    {
        $profissionals = Profissional::find($id);

        if (!isset($profissionals)) {
            return response()->json([
                'status' => false,
                'massage' => "Profissional não encontrado"
            ]);
        }
        $profissionals->delete();

        return response()->json([
            'status' => true,
            'message' => "Profissional excluido com sucesso"
        ]);
    }
    public function pesquisarPorId($id){
        $profissionals = Profissional::find($id);
        if($profissionals == null){
            return response()->json([
                'status'=>false,
                'message'=> "profissional não encontrado"
            ]);
        }
        return response()->json([
            'status'=>true,
            'data'=> $profissionals
        ]);

        } 
}
