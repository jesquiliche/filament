<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $fillable=['nombre','descripcion','bloque_id'];
    
    public function bloque(){
        return $this->belongsTo('App\Models\Bloque');
    }

    public function preguntas(){
        return $this->hasMany('App\Models\Pregunta');
    }
}
