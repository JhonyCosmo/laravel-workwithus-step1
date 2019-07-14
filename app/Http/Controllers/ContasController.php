<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContasFormRequest;
use App\Pessoa;
use App\Repository\ContaRepository;
use Illuminate\Http\Request;

class ContasController extends Controller
{

    public function index(int $id)
    {
        $pessoa=Pessoa::find($id);

        $contas=$pessoa->contas;

        return view('contas.index',compact('contas','pessoa'));
    }

    public function create(Pessoa $pessoa)
    {

        return view('contas.create',compact('pessoa'));
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

        return redirect()->route('listar_pessoas');
    }
}
