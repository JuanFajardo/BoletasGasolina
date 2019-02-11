<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBoletasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boletas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('boleta');
            $table->date('fecha');
            $table->string('tipo');
            $table->string('ffof');
            $table->string('litros');
            $table->float('costo', 10,2);
            $table->float('monto', 10,2);
            $table->string('unidad');
            $table->text('observacion');
            $table->integer('id_user');
            $table->integer('id_proyecto');
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
        Schema::dropIfExists('boletas');
    }
}
