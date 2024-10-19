<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIndexToPreguntaIdInFallosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fallos', function (Blueprint $table) {
            // Añadir el índice al campo pregunta_id
            $table->index('pregunta_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fallos', function (Blueprint $table) {
            // Eliminar el índice en caso de revertir la migración
            $table->dropIndex(['pregunta_id']);
        });
    }
}
