<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMovimientoProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movimiento_productos', function (Blueprint $table) {
            $table->increments('MovimientoProductoId');
            $table->integer('PresentacionId')->unsigned();
            $table->text('Descripcion');
            $table->date('Fecha');
            $table->integer('AnioCosecha');
            $table->integer('Cantidad');
            $table->integer('ClienteId')->unsigned()->nullable();
            $table->integer('MovimientoConceptoId')->unsigned()->nullable();
            $table->double('Monto')->nullable();
            $table->timestamps();

            $table->foreign('PresentacionId')->references('PresentacionId')->on('presentaciones')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('MovimientoConceptoId')->references('MovimientoConceptoId')->on('movimiento_conceptos')->onDelete('cascade');
            $table->foreign('ClienteId')->references('EmpresaId')->on('empresas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movimiento_productos');
    }
}
