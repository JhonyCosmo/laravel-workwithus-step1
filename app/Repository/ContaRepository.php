<?php


namespace App\Repository;


use App\Conta;
use App\Pessoa;
use Illuminate\Support\Facades\DB;

class ContaRepository
{
    public function create(
        int $pessoa_id,
        string $titulo,
        string $resumo,
        float $valor,
        string $vencimento):Conta
    {
        $conta=null;
        DB::beginTransaction();
        $conta=Conta::create([
            'pessoa_id'=>$pessoa_id,
            'titulo'=>$titulo,
            'resumo'=>$resumo,
            'valor'=>$valor,
            'vencimento'=>$vencimento
        ]);
        DB::commit();
        return $conta;
    }
    public function delete(int $id){
        DB::transaction(function () use($id){
            $serie=Serie::find($id);
            //$this->removerTemporadas($serie);
            $serie->delete();
        });
    }
}
