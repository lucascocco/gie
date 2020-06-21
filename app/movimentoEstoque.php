<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class movimentoEstoque extends Model {
    protected $table = "movimento_estoques";
    protected $fillable = ['quantidade', 'movimento_id', 'produto_id'];

    public function produto() {
        return $this->belongsTo("App\Produto");
    }

}


