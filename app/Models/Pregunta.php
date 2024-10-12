<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    use HasFactory;

    protected $fillable = [
        'pregunta', 
        'a', 
        'b', 
        'c', 
        'd', 
        'respuesta', 
        'explicacion',
        'image',
        'categoria_id'
    ];
    
    public function categoria(){
        return $this->belongsTo('App\Models\Categoria');
    }
}
