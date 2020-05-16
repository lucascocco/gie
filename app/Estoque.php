<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estoque extends Model {
    protected $table = "estoques";
    protected $fillable = ["nome", "endereco", "cidade_id"];

    public function cidade() {
        return $this->belongsTo("App\Cidade");
    }

    public function produto_estoques() {
        return $this->hasMany("App\ProdutoEstoque");
    }

}
