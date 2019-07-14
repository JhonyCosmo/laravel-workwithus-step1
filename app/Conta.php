<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conta extends Model
{
    public $timestamps=false;

    public function pessoa(){
        return $this->belongsTo(Pessoa::class);
    }
}
