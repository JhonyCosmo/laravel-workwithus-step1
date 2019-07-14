<?php


namespace App\Repository;
use App\Pessoa;
use Illuminate\Support\Facades\DB;


class PessoaRepository implements iRepository
{
    public function create(string $nomeSerie,string $email,string $fone,$contas):Pessoa{

        $pessoa=null;
        DB::beginTransaction();
        $pessoa=Pessoa::create([
            'nome'=>$nomeSerie,
            'email'=>$email,
            'fone'=>$fone
        ]);


        //'contas'=>$contas
        DB::commit();
        return $pessoa;
    }
}
