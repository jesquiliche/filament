@extends('layouts.test')

@section('content')
<div class="w-10/12 md:w-10/12 mx-auto py-24">
    <h2 class="text-2xl text-center font-bold">Resultado del test</h2>

    @php
        $data = (object) $preguntas;
        $aciertos = 0;
        $num_preguntas = $data->registros;
    @endphp

    @for ($i = 1; $i <= $num_preguntas; $i++)
        <div class="w-11/12 mx-auto">
            <x-pregunta title="{{ $i }}. {{ $data->{'texto' . $i} }}">
                <div class="flex justify-between">
                    <div>
                    <i>a) {{ $data->{'a' . $i} }}</i>
                    @php
                        $seleccionada = $data->{'respuesta' . $i};
                        $respuesta = $data->{'a' . $i};
                        $correcta = $data->{'correcta' . $i};
                        $correctaL = '';
                    @endphp

                    @if ($seleccionada == 'a')
                        <i class="fas fa-arrow-left"></i><b> Seleccionada</b>
                    @endif
                    @if ($correcta == $respuesta)
                        @php
                            $correctaL = 'a';
                        @endphp
                        <b><i class="fas fa-check"></i> Correcta</b>
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
                        <b><i class="fas fa-check"></i> Correcta</b>
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
                        <b><i class="fas fa-check"></i> Correcta</b>
                    @endif
                    <br />

                    @if ($seleccionada == $correctaL)
                        @php
                            $aciertos++;
                            $correctaL = 'X';
                        @endphp
                    @endif
                    </div>
                    <div>

                    @php
                        $imagen = $data->{'image' . $i} ?? null; // Asignar null si no existe
                    @endphp

                    @if (isset($imagen))
                        
                        <img src={{$imagen}} class="h-44 rounded-md"/>
                   
                    @endif
                    </div>
                </div>
            </x-pregunta>
        </div>
    @endfor

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
