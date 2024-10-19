@extends('layouts.test')

@section('content')
<div class=" md:w-12/12 mx-auto py-24">
    <h2 class="text-center text-2xl font-bold">{{ $titulo }}</h2>

    @php
    $x = 0;
    @endphp
    @if(count($preguntas) > 0)
    <form action="{{ route('corrector') }}" method="POST">
        @csrf
        @foreach ($preguntas as $pregunta)
        @php
        $x++;
        @endphp
        <div class="w-10/12 mx-auto">
            <div class="w-8/12 mx-auto">
                <x-pregunta title="{{ $x }}. {{ $pregunta->pregunta }}">
                    @if ($pregunta->image)

                    @php
                    $imagePath = asset('storage/' . $pregunta->image);
                    @endphp

                    <!-- Verificar que el path no sea nulo antes de pasar al input -->
                    <input type="hidden" name="image{{ $x }}" value="{{ $imagePath }}">


                    @endif





                    <div class="flex justify-between mx-auto">
                        <div>
                        <input type="hidden" name="id{{ $x }}" value="{{ $pregunta->id }}">
                            <input type="hidden" name="texto{{ $x }}" value="{{ $pregunta->pregunta }}">
                            <input type="hidden" name="pregunta{{ $x }}" value="{{ $pregunta->id }}">
                            <input type="hidden" name="respuesta{{ $x }}" value="x">
                            <input type="hidden" name="explicacion{{ $x }}" value="{{ $pregunta->Explicacion}}">
                            <input type="hidden" name="categoria_id{{ $x }}" value="{{ $pregunta->categoria_id}}">

                            <label class="inline-flex items-center">
                                <input type="radio" name="respuesta{{ $x }}" value="a" class="mr-1" required>
                                a) <i>{{ $pregunta->a }}</i>
                            </label>
                            <input type="hidden" name="a{{ $x }}" value="{{ $pregunta->a }}">
                            <input type="hidden" name="b{{ $x }}" value="{{ $pregunta->b }}">
                            <input type="hidden" name="c{{ $x }}" value="{{ $pregunta->c }}">

                            @if ($pregunta->respuesta == 'a')
                            <input type="hidden" name="correcta{{ $x }}" value="{{ $pregunta->a }}">
                            @endif

                            <br />

                            <label class="inline-flex items-center">
                                <input type="radio" name="respuesta{{ $x }}" value="b" class="mr-1" required>
                                b) <i>{{ $pregunta->b }}</i>
                            </label>
                            @if ($pregunta->respuesta == 'b')
                            <input type="hidden" name="correcta{{ $x }}" value="{{ $pregunta->b }}">
                            @endif

                            <br />

                            <label class="inline-flex items-center">
                                <input type="radio" name="respuesta{{ $x }}" value="c" class="mr-1" required>
                                c) <i>{{ $pregunta->c }}</i>
                            </label>
                            @if ($pregunta->respuesta == 'c')
                            <input type="hidden" name="correcta{{ $x }}" value="{{ $pregunta->c }}">
                            @endif
                        </div>

                        <div lass="ml-auto">


                            @if ($pregunta->image)

                            <img src="{{ asset('storage/' . $pregunta->image) }}" class="h-44 rounded-md" alt="Imagen de la pregunta" />
                            @endif
                        </div>
                    </div>
                    
                </x-pregunta>
            </div>
        </div>
        @endforeach
        <input type="hidden" name="registros" value="{{ $x }}">
        <div class="container col-lg-8 text-center py-2 mt-3 mx-auto">
            <input type="submit" class="btn-primary"
                value="Corregir">
        </div>
    </form>
    @else
    <div class="card text-center col-md-6 mx-auto py-4 mt-4 w-8/12">
        <h5>No se encontraron preguntas sobre este tema/bloque</h5>
        <a href="{{ route('test') }}"
            class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Ok</a>
    </div>
    @endif

</div>
@endsection