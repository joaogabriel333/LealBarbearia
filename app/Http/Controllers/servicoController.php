<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServicoFormRequest;
use App\Models\Servico;
use Illuminate\Http\Request;

class ServicoController extends Controller
{
    public function servicoCreate(ServicoFormRequest $request)
    {


        $usuario = Servico::create([
            'nome' => $request->nome,
            'descricao' => $request->descricao,
            'duracao' => $request->duracao,
            'preco' => $request->preco
        ]);
        return response()->json([
            "success" => true,
            "message" => "usuario cadastrado com sucesso",
            "data" => $usuario
        ], 200);
    }
    public function pesquisarPorNome(Request $request)
    {
        $usuario = Servico::where('nome', 'like', '%' . $request->nome . '%')->get();
        if (count($usuario) > 0) {
            return response()->json([
                'status' => true,
                'data' => $usuario
            ]);
        }


        return response()->json([
            'status' => false,
            'message' => "Não há resultados para pesquisar"
        ]);
    }
    public function exibirTodosServico()
    {
        $usuario = Servico::all();
        return response()->json([
            'status' => true,
            'data' => $usuario
        ]);
    }
    public function editarServiço(Request $request)
    {
        $usuario = Servico::find($request->id);

        if (!isset($usuario)) {
            return response()->json([
                'status' => false,
                'massage' => "Serviço não encontrado"
            ]);
        }
        if (isset($request->nome)) {
            $usuario->nome = $request->nome;
        }
        if (isset($request->descricao)) {
            $usuario->descricao = $request->descricao;
        }

        if (isset($request->duracao)) {
            $usuario->duracao = $request->duracao;
        }

        if (isset($request->preco)) {
            $usuario->preco = $request->preco;
        }

        $usuario->update();
        return response()->json([
            'status' => true,
            'message' => "Serviço atualizado"
        ]);
    }

    public function excluir($id)
    {
        $usuario = Servico::find($id);

        if (!isset($usuario)) {
            return response()->json([
                'status' => false,
                'massage' => "serviço não encontrado"
            ]);
        }
        $usuario->delete();

        return response()->json([
            'status' => true,
            'message' => "Serviço excluido com sucesso"
        ]);
    }
}
