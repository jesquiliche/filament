@extends('layouts.test')

@section('content')
<div class="w-10/12 md:w-10/12 mx-auto py-24">
    <h2 class="text-2xl text-center font-bold">Resultado del test</h2>

    @php
    $data = (object) $preguntas;
    $aciertos = 0;
    $num_preguntas = $data->registros;
    $fallos = []; // Inicializamos un array para los fallos

    @endphp

    @for ($i = 1; $i <= $num_preguntas; $i++)
        <div class="w-8/12 mx-auto">
        <x-pregunta title="{{ $i }}. {{ $data->{'texto' . $i} }}">
            <div class="flex justify-between">

                <div class=" ">
                    <i>a) {{ $data->{'a' . $i} }}</i>
                    @php
                    $seleccionada = $data->{'respuesta' . $i};
                    $respuesta = $data->{'a' . $i};
                    $correcta = $data->{'correcta' . $i};
                    $correctaL = '';
                    $pregunta_id = $data->{'id' . $i};
                    $a=$data->{'a' . $i};
                    $b=$data->{'b' . $i};
                    $a=$data->{'a' . $i};
                    $c=$data->{'c' . $i};
                    $categotegoria_id=$data->{'categoria_id' . $i};
                    $expliacacion=$data->{'explicacion' . $i};

                    @endphp

                    @if ($seleccionada == 'a')
                    <i class="fas fa-arrow-left"></i><b> Seleccionada</b>
                    @endif
                    @if ($correcta == $respuesta)
                    @php
                    $correctaL = 'a';
                    @endphp
                    <b class="bg-green-400 p-1 rounded-md"><i class="fas fa-check"></i> Correcta</b>
                    @endif
                    <br />
                    <i>b) {{ $data->{'b' . $i} }}</i>
                    @php
                    $respuesta = $data->{'b' . $i};
                    $correcta = $data->{'correcta' . $i};
                    @endphp
                    @if ($seleccionada == 'b')
                    <i class="fas fa-arrow-left"></i><b> Seleccionada</b>
                    @endif
                    @if ($correcta == $respuesta)
                    @php
                    $correctaL = 'b';
                    @endphp
                    <b <b class="bg-green-400 p-1 rounded-md"><i class="fas fa-check"></i> Correcta</b>
                    @endif
                    <br />
                    <i>c) {{ $data->{'c' . $i} }}</i>
                    @php
                    $respuesta = $data->{'c' . $i};
                    $correcta = $data->{'correcta' . $i};
                    @endphp
                    @if ($seleccionada == 'c')
                    <i class="fas fa-arrow-left"></i><b> Seleccionada</b>
                    @endif
                    @if ($correcta == $respuesta)
                    @php
                    $correctaL = 'c';
                    @endphp
                    <b <b class="bg-green-400 p-2 rounded-md"><i class="fas fa-check"></i> Correcta</b>
                    @endif
                    <br />

                </div>
                <div>

                    @php
                    $imagen = $data->{'image' . $i} ?? null; // Asignar null si no existe
                    @endphp

                    @if (isset($imagen))

                    <img src={{$imagen}} class="h-44 rounded-md" />

                    @endif

                </div>
            </div>
            @if ($seleccionada == $correctaL)
            @php
            $aciertos++;
            $correctaL = 'X';


            @endphp
            <h2 class="text-center text-2xl font-bold italic text-green-700 p-2 w-4/12 mx-auto">Correcta</h2>
            @else
            <h2 class="text-center text-2xl font-bold italic text-red-700 p-2 w-4/12 mx-auto">Fallo</h2>
            @php
            // Guardamos los fallos con el ID de la pregunta
            $fallos[] = [
            'pregunta_id' => $pregunta_id, // Usamos el ID de la pregunta,
        
            'seleccionada' => $seleccionada,
            
            'image' => $data->{'image' . $i} ?? null, // Asignar null si no existe
            'categoria_id'=>$categotegoria_id,
        
            ];
            @endphp
            @endif

            <div class="m-2 border border-2 p-2 rounded-md bg-gray-200">

                <p class="text-center font-bold text-xl ">Explicación</p>
                @php
                $explicacion=$data->{'explicacion' . $i}
                @endphp
                {{$explicacion}}
            </div>
        </x-pregunta>



</div>
@endfor

<!-- Formulario para enviar los fallos -->
<form action="{{ route('guardarFallos') }}" method="POST">
    @csrf
    @foreach ($fallos as $index => $fallo)
    <!-- Enviar datos del fallo como campos ocultos -->
    <input type="hidden" name="fallos[{{ $index }}][pregunta_id]" value="{{ $fallo['pregunta_id'] }}">
    
    <input type="hidden" name="fallos[{{ $index }}][seleccionada]" value="{{ $fallo['seleccionada'] }}">
      <input type="hidden" name="fallos[{{ $index }}][image]" value="{{ $fallo['image'] }}">
    <input type="hidden" name="fallos[{{ $index }}][categoria_id]" value="{{ $fallo['categoria_id'] }}">
    
    @endforeach
    <div class="w-full flex justify-center">
        <button type="submit" class="btn-primary">Guardar Fallos</button>
    </div>
    </div>
</form>

<div class="card col-lg-6 py-2 mx-auto mt-4 mb-4 text-center">
    <div class="w-1/3 bg-gray-50 mx-auto border-2 rounded-lg shadow-lg m-4 p-4">
        <h2 class="text-center text-xl"><b>Resultado</b></h2>
        <p class="text-lg">Aciertos {{ $aciertos }} de {{ $num_preguntas }}</p>
        @php
        $tantoPorCiento = number_format(($aciertos * 100) / $num_preguntas, 2);
        @endphp
        <h2 class="text-center font-bold text-xl">{{$tantoPorCiento }}% de aciertos</h2>
    </div>
    <div class="">
        <a href="{{ route('test') }}" class="btn-primary">Hacer otro</a>
    </div>
</div>
</div>
@endsection