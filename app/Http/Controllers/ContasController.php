<?php

namespace App\Http\Controllers;

use App\Conta;
use App\Http\Requests\ContasFormRequest;
use App\Pessoa;
use App\Repository\ContaRepository;
use Illuminate\Http\Request;

class ContasController extends Controller
{

    public function index(int $id,Request $request)
    {
        $pessoa=Pessoa::find($id);
        $contas=$pessoa->contas;
        $mensagem= $request->session()->get('mensagem');
        return view('contas.index', compact('contas','pessoa','mensagem'));
    }

    public function create(Pessoa $pessoa)
    {
        return view('contas.create',compact('pessoa'));
    }

    public function  destroy(Request $request, Conta $conta ,ContaRepository $repository):string
    {
        $repository->delete($conta->id);
        $request->session()
            ->flash(
                'mensagem',
                "Registro deletado com sucesso");
        return $this->index($conta->pessoa_id,$request);
    }

    public function store(Pessoa $pessoa,ContasFormRequest $request,ContaRepository $repository)
    {
        $repository->create(
            $pessoa->id,
            $request->titulo,
            $request->resumo,
            $request->valor,
            $request->vencimento
            );

        $request->session()
            ->flash(
                'mensagem',
                "Registro salvo com sucesso");

        return redirect()->route('listar_contas',$pessoa->id);
    }
}
