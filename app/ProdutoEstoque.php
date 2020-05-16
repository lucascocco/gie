<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProdutoEstoque extends Model {

    protected $table = "produto_estoques";
    protected $fillable = ['quantidade', 'quantidade_min', 'valor', 'produto_id', 'estoque_id'];

    public function estoque() {
        return $this->belongsTo("App\Estoque");
    }

    public function produto() {
        return $this->belongsTo("App\Produto");
    }
}
