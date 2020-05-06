<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estoque extends Model {
    protected $table = "atores";
    protected $fillable = ["nome", "endereco", "id_cidade"];

    public function cidade() {
        return $this->belongsTo("App\Cidade");
    }

}
