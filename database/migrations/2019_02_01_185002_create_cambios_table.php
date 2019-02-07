<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCambiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cambios', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha');
            $table->string('monto_antiguo');
            $table->string('monto_nuevo');
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
        Schema::dropIfExists('cambios');
    }
}
