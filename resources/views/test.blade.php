@extends('layouts.test')

@section('content')
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 py-24 mx-auto w-10/12 text-center ">
        <div class="col-span-1 lg:col-span-3 text-center text-2xl font-bold">
            Selecione tipo de test
        </div>
        <div class="h-full">
            <x-card title="Test por Carné">
                <img src="/bloque.jpg"/ class="rounded-md h-66">
                <form action="{{ route('preguntastema') }}" method="POST" class="mt-5">
                    @csrf

                    <div class="form-group font-bold">
                        <label>Carné</label>
                        <select class="form-control mt-2 rounded-md" name="bloque_id">
                            @foreach ($bloques as $bloque)
                                <option value="{{ $bloque->id }}">{{ strip_tags($bloque->nombre) }}
                                </option>
                            @endforeach

                        </select>
                        <div class="form-group">
                            <label class="mt-2">Nº preguntas:</label>
                            <select class="form-control mt-2 rounded-lg" id="myListbox" name="num_registros">
                                <option value="10">10</option>
                                <option value="20">20</option>
                                <option value="30">30</option>
                                <option value="40">40</option>
                            </select>
                        </div>

                        <br />
                        <input type="submit" class="btn-primary" value="Hacer test">
                    </div>
                </form>
            </x-card>
        </div>
        <div class="h-full">
            <x-card title="Test por Temas">
                <img src="/categorias.jpg" class="rounded-md h-[250px] w-full"/>
                <form action="{{ route('preguntas') }}" method="POST" class="mt-5">
                    @csrf

                    <div class="mt-2 font-bold">
                        <label>Tema</label>
                        <select class="form-control mt-2 rounded-md" id="bloque_id" name="categoria_id">
                            @foreach ($bloques as $bloque)
                                <optgroup label="{{ $bloque->nombre }}">
                                    @foreach ($bloque->categorias as $categoria)
                                        @if ($categoria->preguntas->count() > 0)
                                            <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                                        @endif
                                    @endforeach
                                </optgroup>
                            @endforeach

                        </select>
                        <div class="mt-2">
                            <label class="mt-2">Nº preguntas:</label>
                            <select class="form-control mt-2 rounded-md" id="myListbox" name="num_registros">
                                <option value="10">10</option>
                                <option value="20">20</option>
                                <option value="30">30</option>
                                <option value="40">40</option>
                            </select>
                        </div>

                        <input type="submit" class="mt-5 btn-primary" value="Hacer test">
                    </div>
                </form>
            </x-card>
        </div>
        <div class="h-full">
            <x-card title="Test general">
                <img src="/general.jpg" class="rounded-md hidden md:block h-[250px] w-full"}/>
            <form action="{{ route('preguntasgeneral') }}" method="POST">
                @csrf
              
                <div class="mt-5 font-bold">
                    <label>Nº preguntas:</label>
                    <select class="form-control mt-2 rounded-md" id="myListbox" name="num_preguntas">
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="30">30</option>
                        <option value="40">40</option>
                        <option value="50">50</option>
                        <option value="60">60</option>
                        <option value="70">70</option>
                        <option value="80">80</option>

                    </select>
                </div>

               <div class="mt-24">
                <input type="submit" class="mt-2 btn-primary" value="Hacer test">
               </div>
            </form>
            
        </x-card>
    </div>
    </div>
@endsection
