@extends('layouts.test')

@section('css')
<style>
    #portada {
        position: relative;
        text-align: center;
        width: 100%;
    }

    .overlay {
        position: absolute;
        top: 55px;
        left: 0;
        width: 100%;
        height: 90%;
        background-color: rgba(0, 0, 0, 0.5);

        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        color: white;
        z-index: 2;
    }

    img {
        width: 120%;
        height: 60%;
        margin: 0;
        padding: 0;

    }
</style>
@endsection

@section('content')
<div id="portada" class="hidden md:w-full md:block">
    <img src="/autoescuela.jpg" alt="portada1" class="h-[550px]">
    <div class="overlay">
        <h1 class="text-7xl font-bold">Tests de Autoescuela</h1>
        <p class="w-3/5 text-xl mt-4 font-bold italic">Personaliza tu preparación. Podrás hacer test por temas y materias sin límites. </p>
        <h2 class="text-xl mt-1 font-bold italic">Haz
            los test que quieras, cuando quieras!</h2>
    </div>
</div>
<div class="w-10/12 mx-auto p-4 text-center  my-5">
    <x-card title="TestAuto">
        <div class=" flex space-x-8 items-center ">


            <div class="mx-auto">
                <section class=" py-16">
                    <div class="max-w-7xl mx-auto text-center px-4">
                   
                        <div class="grid md:grid-cols-2 gap-8">
                            <div class="bg-white rounded-lg border-2 shadow-lg p-6">
                                <h2 class="text-2xl font-semibold text-black mb-4">🔑 ¿Qué te ofrecemos?</h2>
                                <ul class="text-left list-disc pl-6 text-lg text-black space-y-2">
                                    <li><strong>Tests actualizados</strong>: Preguntas basadas en los últimos exámenes oficiales.</li>
                                    <li><strong>Corrección instantánea</strong>: Descubre al momento si has acertado o fallado, con explicaciones detalladas.</li>
                                    <li><strong>Seguimiento de tu progreso</strong>: Revisa tus estadísticas, identifica tus puntos débiles y mejora cada día.</li>
                                    <li><strong>Tests por categorías</strong>: Practica temas específicos como señales de tráfico, normativa o seguridad vial.</li>
                                    <li><strong>Modos de examen real</strong>: Simula condiciones reales de examen con tiempo limitado y experiencia oficial.</li>
                                </ul>
                            </div>

                            <div class="bg-white rounded-lg shadow-lg p-6">
                                <h2 class="text-2xl font-semibold text-black mb-4">📊 Analiza tus errores y mejora</h2>
                                <p class="text-lg text-black">La app agrupa tus fallos por categorías para que puedas repasar y aprender de tus errores. Además, te ofrecemos un seguimiento continuo para mejorar en cada sesión.</p>
                                <h3 class="text-xl font-semibold text-black mt-6">🖥️ Disponible en todos tus dispositivos</h3>
                                <p class="text-lg text-black">Practica donde quieras, ya sea en casa o de camino al trabajo, con nuestra app multi-dispositivo.</p>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
    </x-card>

</div>

<div class="grid cols-1 md:grid-cols-3 md:gap-10 w-12/12  mx-auto  mt-20 md:mt-2">
    <x-card title="Fácil y cómodo de seguir">
        <img src="/tablet.jpg" class="rounded-lg" alt="portada1" class="h-44">
        <div class="card-content m-4">
            Accesible desde cualquier dispositivo y con una interfaz intuitiva. ¡Regístrate ahora y alcanza el éxito en tu examen de oposición!
        </div>
    </x-card>
    <x-card title="Temario actualizado">
        <img src="/portada2.jpg" class="rounded-lg" alt="portada2" class="h-[120px]">
        <div class="m-4">
            Preguntas actualizadas al temario de la última convocatoria de 2022 y anteriores en nuestra plataforma en línea. ¡Regístrate ahora y obtén una preparación efectiva!
        </div>
    </x-card>
    <x-card title="Tests aleatorios">
        <img src="/portada3.jpeg" class="rounded-lg w-full mx-auto" alt="portada3">
        <div class="m-4 font-semibold">
            Tests aleatorios por temas y tipo de carné.
            ¡Obtén una preparación efectiva y alcanza el éxito en tu examen de oposición!
        </div>
    </x-card>
    <x-card title="Seguimiento de errores historico">
        <img src="/errores.jpeg" class="rounded-lg w-full mx-auto" alt="portada3">
        <div class="m-4 font-semibold">
            Para revisar tus preguntas falladas en los test y así revisar tus errores más comunes.
        </div>
    </x-card>
    <x-card title="Estadisticas">
        <img src="/estadistica.jpg" class="rounded-lg w-full mx-auto" alt="portada3">
        <div class="m-4 font-semibold">
            Para revisar tus preguntas falladas en los test y así revisar tus errores más comunes.
        </div>
    </x-card>
    <x-card title="Todos los carnes">
        <img src="carnes.jpeg" class="rounded-lg w-full mx-auto" alt="portada3">
        <div class="m-4 font-semibold">
            Para revisar tus preguntas falladas en los test y así revisar tus errores más comunes.
        </div>
    </x-card>
</div>

@endsection