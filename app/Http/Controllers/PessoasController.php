<?php

namespace App\Http\Controllers;

use App\Http\Requests\PessoasFormRequest;
use App\Pessoa;
use App\Repository\PessoaRepository;
use Illuminate\Http\Request;

class PessoasController extends Controller
{
    public function index(Request $request)
    {
        $pessoas=Pessoa::query()->orderBy('nome')->get();
        $mensagem= $request->session()->get('mensagem');
        return view('pessoas.index', compact('pessoas','mensagem'));
    }

    public function create()
    {
        return view('pessoas.create');
    }

    public function store(PessoasFormRequest $request,PessoaRepository $repository)
    {
       $repository->create(
            $request->nome,
            $request->email,
            $request->fone);

        $request->session()
            ->flash(
                'mensagem',
                "Registro salvo com sucesso");

        return redirect()->route('listar_pessoas');
    }

    public function  destroy(int $pessoaId,PessoaRepository $repository,Request $request):string
    {
        $repository->delete($pessoaId);
        $request->session()
            ->flash(
                'mensagem',
                "Registro deletado com sucesso");
        return $this->index($request);
    }

    public function editaNome(int $pessoaId,Request $request)
    {
        $novoNome=$request->nome;
        $pessoa=Pessoa::find($pessoaId);
        $pessoa->nome=$novoNome;
        $pessoa->save();
    }
}
