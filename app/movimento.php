<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class movimento extends Model
{
    protected $table = "movimentos";
    protected $fillable = ['tipo', 'estoque_id', 'users_id'];


    public function estoque() {
        return $this->belongsTo("App\Estoque");
    }

    public function movimentoestoque() {
        return $this->hasmany("App\movimentoEstoque");
    }

}
