<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->increments('EmpresaId');
            $table->string('EmpresaNombre',100);
            $table->string('EmpresaDireccion',1000);
            $table->string('EmpresaTelefono',40);
            $table->string('EmpresaCorreo',40)->nullable();
            $table->string('Contacto',200)->nullable();
            $table->string('ContactoTelefono',40)->nullable();
            $table->string('ContactoCorreo',40)->nullable();
            $table->string('FechaPago',100)->nullable();
            $table->enum('Tipo',['Cliente','Proveedor','Cliente-Proveedor']);

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
        Schema::dropIfExists('empresas');
    }
}
