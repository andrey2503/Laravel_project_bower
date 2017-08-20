<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCilindrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cilindros', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo',100)->unique();
            $table->string('tipo',100);
            //sin signo
            $table->integer('tercero_id')->unsigned();
            // emun da valores aceptados
            $table->enum('estado',['vacio','prestado','llenado','lleno']);
            $table->timestamps();

            //nombre que sera llave
            //references especifica el otra capo al que hace referencia
            // on especifica cual tabla esta
            //onUpdate actualiza si un id en terceros se actualiza
            //onDelete eliminar cilintros si se elimina de terceros
            $table->foreign('tercero_id')
                    ->references('id')->on('terceros')
                    ->onUpdate('CASCADE')
                    ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cilindros');
    }
}
