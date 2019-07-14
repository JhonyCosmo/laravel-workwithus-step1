<?php


namespace App\Repository;


use App\Pessoa;
use Illuminate\Support\Facades\DB;

class ContaRepository implements iRepository
{
    public function create(Pessoa $pessoa):Pessoa{
        DB::beginTransaction();
        $pessoa=Pessoa::create($pessoa);
        DB::commit();
        return $pessoa;
    }
    public function delete(int $id){
        DB::transaction(function () use($id){
            $serie=Serie::find($id);
            //$this->removerTemporadas($serie);
            $serie->delete();
        });
    }
}
