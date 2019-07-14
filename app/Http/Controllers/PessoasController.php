<?php

namespace App\Http\Controllers;

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

    public function store(SeriesFormRequest $request,CriadorDeSerie $criadorDeSerie)
    {
        $serie=$criadorDeSerie->criarSerie(
            $request->nome,
            $request->qtd_temporadas,
            $request->ep_por_temporada);

        $request->session()
            ->flash(
                'mensagem',
                "Série {$serie->id} criada com sucesso {$serie->nome} e suas temporadas e episodios foram criadas");

        return redirect()->route('listar_series');
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
}
