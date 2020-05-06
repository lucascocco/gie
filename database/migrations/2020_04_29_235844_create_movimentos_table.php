<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovimentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movimentos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('quantidade');
            $table->string('tipo', 1);
            $table->bigInteger('users_id')->unsigned();
            $table->bigInteger('produtoestoque_id')->unsigned();
            $table->foreign('users_id')->references('id')->on('users');
            $table->foreign('produtoestoque_id')->references('id')->on('produto_estoques');
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
        Schema::dropIfExists('movimentos');
    }
}
