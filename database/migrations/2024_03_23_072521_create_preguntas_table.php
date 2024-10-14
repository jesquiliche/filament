<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preguntas', function (Blueprint $table) {
            $table->id();

            $table->text('pregunta');
            $table->string('a');
            $table->string('b');
            $table->string('c');
            $table->string('respuesta');
            $table->unsignedBigInteger('categoria_id');
            $table->text('Explicacion')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();

            $table->foreign('categoria_id')
                ->references('id')->on('categorias')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('preguntas');
    }
};
