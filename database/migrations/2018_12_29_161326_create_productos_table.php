<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->increments('ProductoId');
            $table->string('ProductoNombre',100);
            $table->string('ProductoDescripcion');
            $table->integer('TipoBebidaId')->unsigned();
            $table->timestamps();

            $table->foreign('TipoBebidaId')->references('TipoBebidaId')->on('tipo_bebidas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
