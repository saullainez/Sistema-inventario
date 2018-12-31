<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePresentacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presentaciones', function (Blueprint $table) {
            $table->integer('PresentacionId')->primary()->unique();
            $table->integer('ActivoId')->unsigned();
            $table->integer('ProductoId')->unsigned();

           
            $table->timestamps();
         
            $table->foreign('ProductoId')->references('ProductoId')->on('productos')->onDelete('cascade');
            $table->foreign('ActivoId')->references('ActivoId')->on('activos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('presentacions');
    }
}
