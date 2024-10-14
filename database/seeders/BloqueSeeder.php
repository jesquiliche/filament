<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class BloqueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                "nombre" => "Carnet AM",
                "descripcion" => "Ciclomotores de dos o tres ruedas y cuadriciclos ligeros. Edad mínima: 15 años."
            ],
            [
                "nombre" => "Carnet A1",
                "descripcion" => "Motocicletas con cilindrada máxima de 125 cc, potencia máxima de 11 kW (15 CV). Edad mínima: 16 años."
            ],
            [
                "nombre" => "Carnet A2",
                "descripcion" => "Motocicletas con una potencia máxima de 35 kW (47 CV). Edad mínima: 18 años."
            ],
            [
                "nombre" => "Carnet A",
                "descripcion" => "Todas las motocicletas y triciclos de motor. Requisitos: 20 años y 2 años de experiencia con el A2."
            ],
            [
                "nombre" => "Carnet B",
                "descripcion" => "Automóviles de hasta 3.500 kg y 9 plazas. Edad mínima: 18 años."
            ],
            [
                "nombre" => "Carnet B+E",
                "descripcion" => "Vehículos con remolques que excedan los 750 kg, con peso total de hasta 7.000 kg."
            ],
            [
                "nombre" => "Carnet C1",
                "descripcion" => "Vehículos entre 3.500 kg y 7.500 kg. Edad mínima: 18 años."
            ],
            [
                "nombre" => "Carnet C1+E",
                "descripcion" => "Vehículos de la categoría C1 con remolques, hasta un máximo de 12.000 kg."
            ],
            [
                "nombre" => "Carnet C",
                "descripcion" => "Vehículos de más de 3.500 kg (camiones). Edad mínima: 21 años."
            ],
            [
                "nombre" => "Carnet C+E",
                "descripcion" => "Camiones con remolques que excedan los 750 kg."
            ],
            [
                "nombre" => "Carnet D1",
                "descripcion" => "Microbuses con un máximo de 16 pasajeros. Edad mínima: 21 años."
            ],
            [
                "nombre" => "Carnet D1+E",
                "descripcion" => "Microbuses con remolques que superen los 750 kg."
            ],
            [
                "nombre" => "Carnet D",
                "descripcion" => "Autobuses con más de 9 plazas. Edad mínima: 24 años."
            ],
            [
                "nombre" => "Carnet D+E",
                "descripcion" => "Autobuses con remolques que excedan los 750 kg."
            ]
        ];
        DB::table('bloques')->insert($data);
    }
}
