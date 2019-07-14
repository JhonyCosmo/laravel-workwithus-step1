<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    protected $table = 'series';
    public $timestamps=false;
    protected $fillable=['nome'];
    public function contas(){
        return $this->hasMany(Conta::class);
    }
}
