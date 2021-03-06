<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTercerosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('terceros', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nit',50)->unique();
            $table->string('nombre');
            $table->enum('rol',['cliente','proveedor','admin']);
            $table->string('direccion');
            $table->string('telefono',20);
            $table->string('email')->unique()->nullable();
            $table->string('notas',1000)->nullable();
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
        Schema::dropIfExists('terceros');
    }
}
