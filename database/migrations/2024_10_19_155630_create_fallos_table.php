<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFallosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fallos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('pregunta_id'); // ID de la pregunta fallada
            $table->string('pregunta'); // Texto de la pregunta
            $table->string('seleccionada'); // Respuesta seleccionada por el usuario
            $table->string('correcta'); // Respuesta correcta
            $table->string('a'); // Opción A
            $table->string('b'); // Opción B
            $table->string('c'); // Opción C
            $table->string('image')->nullable(); // Imagen relacionada con la pregunta, si aplica
            $table->bigInteger('categoria_id'); // Categoría de la pregunta
            $table->timestamps(); // Para almacenar cuándo fue creado y actualizado el fallo
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fallos');
    }
}
