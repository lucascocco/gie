<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutoEstoquesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produto_estoques', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('quantidade');
            $table->integer('quantidade_min');
            $table->decimal('valor');
            $table->bigInteger('produto_id')->unsigned();
            $table->foreign('produto_id')->references('id')->on('produtos');
            $table->bigInteger('estoque_id')->unsigned();
            $table->foreign('estoque_id')->references('id')->on('estoques');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produto_estoques');
    }
}
