@extends('layouts.test') <!-- Asegúrate de que este sea el layout correcto -->

@section('content')
<div class="py-20 w-8/12 mx-auto">
    @foreach ($fallos as $fallo)
    @php
    $imagePath =  $fallo->image;
    @endphp
    <div class="">
        
            <x-pregunta title="{{$fallo->pregunta}}">
            <div class="flex justify-between">
            <div>
            <p class="p-1">a) {{$fallo->a}}</p>
                <p class="p-1">b) {{$fallo->b}}</p>
                <p class="p-1">c) {{$fallo->c}}</p>
                <p class="mt-2">Correcta: {{$fallo->correcta}}</p>
                <p>{{$fallo->explicacion}}</p>
                </div>
                <div>
                
                <img src="{{$imagePath}}" class="h-44 rounded-md"/>
                </div>
            </div>
            </x-pregunta>
        
    </div>
    @endforeach
    
    {{ $fallos->links() }}
</div>
</div>

</div>
@endsection