<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMovimentacaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movimentacao', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tipo')->nullable($value = true);
            $table->bigInteger('item_id')->unsigned();
            $table->foreign('item_id')->references('id')->on('itens');
            $table->bigInteger('local_saida_id')->unsigned();
            $table->foreign('local_saida_id')->references('id')->on('locais');
            $table->bigInteger('local_entrada_id')->unsigned();
            $table->foreign('local_entrada_id')->references('id')->on('locais');
            $table->bigInteger('responsavel_id')->unsigned();
            $table->foreign('responsavel_id')->references('id')->on('users');
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
        Schema::dropIfExists('movimentacao');
    }
}
