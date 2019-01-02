<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMovimientoActivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movimiento_activos', function (Blueprint $table) {
            $table->increments('MovimientoActivoId');
            $table->integer('ActivoId')->unsigned();
            $table->text('Descripcion');
            $table->date('Fecha');
            $table->integer('Cantidad');
            $table->double('Monto');
            $table->integer('ProveedorId')->unsigned()->nullable();
            $table->integer('MovimientoConceptoId')->unsigned();
            $table->enum('TipoMovimiento',['Entrada','Salida']);
            $table->timestamps();

            $table->foreign('ActivoId')->references('ActivoId')->on('activos')->onDelete('cascade');
            $table->foreign('MovimientoConceptoId')->references('MovimientoConceptoId')->on('movimiento_conceptos')->onDelete('cascade');
            $table->foreign('ProveedorId')->references('EmpresaId')->on('empresas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movimiento_activos');
    }
}
