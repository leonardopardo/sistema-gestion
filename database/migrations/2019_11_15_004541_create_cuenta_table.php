<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuentaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuentas', function (Blueprint $table) {
            $table->id();
            $table->string('razon_social');
            $table->string('documento')->comment('Puede ser DNI, CUIT, CUIL, cualquier documento');
            $table->string('actividad')->nullable();
            $table->unsignedInteger('provincia_id')->nullable();
            $table->unsignedInteger('localidad_id')->nullable();
            $table->string('direccion', 250)->nullable();
            $table->string('codigo_postal', 10)->nullable();
            $table->string('telefono', 20)->nullable();
            $table->string('email')->nullable();
            $table->string('contacto_nombre')->nullable();
            $table->string('contacto_cargo')->nullable();
            $table->text('observaciones')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('cuentas');
    }
}
