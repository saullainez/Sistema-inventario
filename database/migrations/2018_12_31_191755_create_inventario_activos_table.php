<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventarioActivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventario_activos', function (Blueprint $table) {
            $table->integer('ActivoId')->unsigned()->primary();
            $table->integer('Cantidad');
            $table->timestamps();

            $table->foreign('ActivoId')->references('ActivoId')->on('Activo')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventario_activos');
    }
}
