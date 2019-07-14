<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    protected $table = 'pessoas';
    public $timestamps=false;
    protected $fillable=['nome','fone','email'];
    public function contas(){
        return $this->hasMany(Conta::class);
    }
}
