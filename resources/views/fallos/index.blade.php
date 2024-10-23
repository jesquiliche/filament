@extends('layouts.test') <!-- Asegúrate de que este sea el layout correcto -->

@section('content')
<div class="py-20 w-8/12 mx-auto">
    <h1 class="text-2xl text-center font-bold">Fallos</h1>
    @foreach ($fallos as $fallo)
    @php
    $imagePath='';
    $correcta=$fallo->preguntaAsociada->respuesta;
    $seleccionada=$fallo->seleccionada;
    @endphp
    @if ($fallo->preguntaAsociada->image)
    @php
    $imagePath =asset('storage/'. $fallo->preguntaAsociada->image);
    @endphp
    @else
    @php
    $imagePath ='/llave.jpg';
    @endphp
    @endif
    <div class="">

        <x-pregunta title="{{$fallo->preguntaAsociada->pregunta}}">
            <div class="flex justify-between">
                <div>
                    <p class="font-bold">{{$fallo->preguntaAsociada->categoria->nombre}}</p>
                    @if($correcta=='a')
                    <p class="p-1 text-green-700 font-bold italic">a) {{$fallo->preguntaAsociada->a}}</p>
                    @else
                    @if($seleccionada=='a')
                    <p class="p-1 text-red-700 font-bold italic">a) {{$fallo->preguntaAsociada->a}}</p>
                    @else
                    <p class="p-1 ">a) {{$fallo->preguntaAsociada->a}}</p>
                    @endif
                    @endif

                    @if($correcta=='b')
                    <p class="p-1 text-green-700 font-bold italic">b) {{$fallo->preguntaAsociada->b}}</p>
                    @else
                    @if($seleccionada=='b')
                    <p class="p-1 text-red-700 font-bold italic">b) {{$fallo->preguntaAsociada->b}}</p>
                    @else
                    <p class="p-1 ">a) {{$fallo->preguntaAsociada->b}}</p>
                    @endif
                    @endif

                    @if($correcta=='c')
                    <p class="p-1 text-green-700 font-bold italic">c) {{$fallo->preguntaAsociada->c}}</p>
                    @else
                    @if($seleccionada=='c')
                    <p class="p-1 text-red-700 font-bold italic">c) {{$fallo->preguntaAsociada->c}}</p>
                    @else
                    <p class="p-1 ">a) {{$fallo->preguntaAsociada->c}}</p>
                    @endif
                    @endif


                </div>
                <div>

                    <img src="{{$imagePath}}" class="h-44 rounded-md" />
                </div>

            </div>
            <div class="bg-gray-200 rounded-md p-2">
                <p class="font-bold text-lg text-center"> Explicación</p>
                <p>{{$fallo->preguntaAsociada->Explicacion}}</p>
            </div>
        </x-pregunta>

    </div>
    @endforeach

    {{ $fallos->links() }}
</div>
</div>

</div>
@endsection