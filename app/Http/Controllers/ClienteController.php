<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClienteFormRequest;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClienteController extends Controller
{
    public function clienteCreate(ClienteFormRequest $request)
    {
        $clientes = Cliente::create([
            'nome' => $request->nome,
            "celular"=> $request->celular,
            "email"=> $request->email,
            "cpf"=> $request->cpf,
            "dataNacimento"=> $request->dataNacimento,
            "cidade"=> $request->cidade,
            "estado"=> $request->estado,
            "pais"=> $request->pais,
            "rua"=> $request->rua,
            "numero"=> $request->numero,
            "bairro"=> $request->bairro,
            "cep"=> $request->cep,
            "complemeto"=> $request->complemeto,
            "password"  => Hash::make($request->password)

        ]);
        return response()->json([
            "success" => true,
            "message" => "cliente cadastrado com sucesso",
            "data" => $clientes
        ], 200);
    }
    public function procurarPorNome(Request $request){
        
        $clientes = Cliente::where('nome', 'like', '%' . $request->nome . '%')->get();
        if (count($clientes) > 0) {
            return response()->json([
                'status' => true,
                'data' => $clientes
            ]);
        }


        return response()->json([
            'status' => false,
            'message' => "Não há resultados para pesquisar"
        ]);
    }
    public function exibirTodosClientes()
    {
        $clientes = Cliente::all();
        return response()->json([
            'status' => true,
            'data' => $clientes
        ]);
    }
    public function editarCliente(Request $request)
    {
        $clientes = Cliente::find($request->id);

        if (!isset($clientes)) {
            return response()->json([
                'status' => false,
                'massage' => "Cliente não encontrado"
            ]);
        }
        if (isset($request->nome)) {
            $clientes->nome = $request->nome;
        }
        if (isset($request->celular)){
            $clientes->celular = $request->celular;
        }
        if (isset($request->email)){
            $clientes->email = $request->email;
        }
        if (isset($request->cpf)){
            $clientes->cpf = $request->cpf;
        }
        if (isset($request->dataNacimento)){
            $clientes->dataNacimento = $request->dataNacimento;
        }
        if (isset($request->cidade)){
            $clientes->cidade = $request->cidade;
        }
        if (isset($request->estado)){
            $clientes->estado = $request->estado;
        }
        if (isset($request->pais)){
            $clientes->pais = $request->pais;
        }
        if (isset($request->rua)){
            $clientes->rua = $request->rua;
        }
        if (isset($request->numero)){
            $clientes->numero = $request->numero;
        }
        if (isset($request->bairro)){
            $clientes->bairro = $request->bairro;
        }
        if (isset($request->cep)){
            $clientes->cep = $request->cep;
        }
        if (isset($request->complemeto)){
            $clientes->complemeto = $request->complemeto;
        }
        if (isset($request->password)){
            $clientes->password = $request->password;
        }

        $clientes->update();
        return response()->json([
            'status' => true,
            'message' => "Cliente atualizado"
        ]);
    }
    public function excluirCliente($id)
    {
        $clientes = Cliente::find($id);

        if (!isset($clientes)) {
            return response()->json([
                'status' => false,
                'massage' => "Cliente não encontrado"
            ]);
        }
        $clientes->delete();

        return response()->json([
            'status' => true,
            'message' => "Cliente excluido com sucesso"
        ]);
    }
    public function procurarPorCpf(Request $request){
        
        $clientes = Cliente::where('cpf', 'like', '%' . $request->cpf . '%')->get();
        if (count($clientes) > 0) {
            return response()->json([
                'status' => true,
                'data' => $clientes
            ]);
        }


        return response()->json([
            'status' => false,
            'message' => "Não há resultados para pesquisar"
        ]);
    }
    public function procurarPorCelular(Request $request){
        
        $clientes = Cliente::where('celular', 'like', '%' . $request->celular . '%')->get();
        if (count($clientes) > 0) {
            return response()->json([
                'status' => true,
                'data' => $clientes
            ]);
        }


        return response()->json([
            'status' => false,
            'message' => "Não há resultados para pesquisar"
        ]);
    }
    public function procurarPorEmail(Request $request){
        
        $clientes = Cliente::where('email', 'like', '%' . $request->email . '%')->get();
        if (count($clientes) > 0) {
            return response()->json([
                'status' => true,
                'data' => $clientes
            ]);
        }


        return response()->json([
            'status' => false,
            'message' => "Não há resultados para pesquisar"
        ]);
    }
    public function recuperarSenha(Request $request){
        $clientes = Cliente::where('cpf', 'like', '%' . $request->cpf . '%')->get();

        if (!isset($clientes)) {
            return response()->json([
                'status' => false,
                'massage' => "Cliente não encontrado"
            ]);
        }
        if (isset($request->password)){
            $clientes->password = $request->password;
        }

        $clientes->update();
        return response()->json([
            'status' => true,
            'message' => "Senha atualizado"
        ]);
    }
}
