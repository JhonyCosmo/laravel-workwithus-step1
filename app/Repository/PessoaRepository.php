<?php


namespace App\Repository;
use App\Pessoa;
use Illuminate\Support\Facades\DB;


class PessoaRepository 
{
    public function create(string $nome,string $email,string $fone):Pessoa
    {
        $pessoa=null;
        DB::beginTransaction();
        $pessoa=Pessoa::create([
            'nome'=>$nome,
            'email'=>$email,
            'fone'=>$fone
        ]);
        DB::commit();
        return $pessoa;
    }
}
