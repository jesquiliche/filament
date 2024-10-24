<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fallo extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pregunta_id',
        'seleccionada',
        'categoria_id',
    ];

    /**
     * La relación con la tabla de preguntas, si tienes un modelo de Pregunta.
     * Puedes definir una relación belongsTo si las preguntas están en otra tabla.
     */
    public function preguntaAsociada()
    {
        return $this->belongsTo(Pregunta::class, 'pregunta_id');
    }

    /**
     * La relación con la categoría de la pregunta.
     */
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }
}
