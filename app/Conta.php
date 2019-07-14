<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conta extends Model
{
    protected $table = 'contas';
    public $timestamps=false;
    protected $fillable=['pessoa_id','titulo','resumo','valor','vencimento'];
    public function pessoa(){
        return $this->belongsTo(Pessoa::class);
    }
}
