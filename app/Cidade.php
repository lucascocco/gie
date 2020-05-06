<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cidade extends Model {
    protected $table = "cidades";
    protected $fillable = ["id", "nome"];

    public function estoques() {
        return $this->hasMany("App\Estoque");
    }

}
