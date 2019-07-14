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
//        $pessoa= new Pessoa();
//        $pessoa->nome=$request->nome;
//        $pessoa->email=$request->nome;
//        $pessoa->fone=$request->nome;
        //$pessoa->contas=$request->contas;


        $pessoa = $repository->create(
            $request->nome,
            $request->email,
            $request->fone);

//        $pessoa = $repository->create($pessoa);

        $request->session()
            ->flash(
                'mensagem',
                "Registro salvo com sucesso");

        return redirect()->route('listar_pessoas');
    }

    public function  destroy(Request $request,RemovedorSerie $removedor):string{
        //Removendo manualmente os registros viculados a serie
        //Retornando a serie
        $nomeSerie=$removedor->removerSerie($request->id);
        $request->session()
            ->flash(
                'mensagem',
                "Série {$request->id} - {$nomeSerie} removida com sucesso ");
        return redirect()->route('listar_series');
    }
    public function editaNome(int $pessoaId,Request $request)
    {
        $novoNome=$request->nome;
        $pessoa=Pessoa::find($pessoaId);
        $pessoa->nome=$novoNome;
        $pessoa->save();
    }
}
