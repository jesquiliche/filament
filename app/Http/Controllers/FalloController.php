<?php

namespace App\Http\Controllers;

use App\Models\Fallo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class FalloController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    // Cargar los fallos con la relación de pregunta utilizando eager loading
    $fallos = Fallo::with('preguntaAsociada')->paginate(10); // 10 fallos por página

    return view('fallos.index', compact('fallos'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Fallo $fallo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fallo $fallo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Fallo $fallo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fallo $fallo)
    {
        //
    }



    public function guardarFallos(Request $request)
    {
        // Obtenemos los fallos enviados desde el formulario
        $fallos = $request->input('fallos');

        // Recorremos cada fallo y guardamos en la base de datos o procesamos como sea necesario
        foreach ($fallos as $fallo) {
            // Extraer los datos del fallo
            $preguntaId = $fallo['pregunta_id'];
            $pregunta = $fallo['pregunta'];
            $seleccionada = $fallo['seleccionada'];
            $correcta = $fallo['correcta'];
            $opcionA = $fallo['a'];
            $opcionB = $fallo['b'];
            $opcionC = $fallo['c'];
            $imagen = $fallo['image'] ?? null; // La imagen es opcional
            $categoriaId = $fallo['categoria_id'];
            $explicacion = $fallo['explicacion'];

            // Usar updateOrInsert para actualizar o insertar el fallo en la base de datos
            DB::table('fallos')->updateOrInsert(
                ['pregunta_id' => $preguntaId], // Condición para buscar
                [
                    'pregunta' => $pregunta,
                    'seleccionada' => $seleccionada,
                    'correcta' => $correcta,
                    'a' => $opcionA,
                    'b' => $opcionB,
                    'c' => $opcionC,
                    'image' => $imagen,
                    'categoria_id' => $categoriaId,
                    'Explicacion'=>$explicacion,
                    'updated_at' => now(), // Solo actualiza la fecha de modificación
                ]
            );
        }
        
        $this->mantenerUltimosCincuenta();
        

        // Redirigir a la página principal con un mensaje de éxito
        return redirect('/')->with('success', 'Fallos guardados correctamente.');
    }

    /**
     * Mantiene solo las últimas 50 entradas en la tabla fallos.
     */
    private function mantenerUltimosCincuenta()
    {
        // Obtener los IDs de las últimas 50 entradas
        $ultimosFallos = DB::table('fallos')
            ->orderBy('created_at', 'desc') // Ordenar por fecha de creación
            ->limit(50)
            ->pluck('id'); // Obtener solo los IDs

        // Eliminar todos los fallos que no están en la lista de las últimas 50
        DB::table('fallos')
            ->whereNotIn('id', $ultimosFallos)
            ->delete();
    }
}
