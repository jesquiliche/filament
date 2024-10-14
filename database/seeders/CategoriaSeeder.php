<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [
            [
                "bloque_id" => 5,
                "nombre" => "Normas generales",
                "descripcion" => "Regulación general de la conducción y normas básicas de circulación en vías urbanas e interurbanas."
            ],
            [
                "bloque_id" => 5,
                "nombre" => "El conductor",
                "descripcion" => "Aptitudes, comportamientos y responsabilidades del conductor. Factores que influyen en la conducción."
            ],
            [
                "bloque_id" => 5,
                "nombre" => "El vehículo",
                "descripcion" => "Tipos de vehículos, clasificación, mantenimiento y revisiones. Obligaciones relacionadas con el vehículo."
            ],
            [
                "bloque_id" => 5,
                "nombre" => "Velocidades",
                "descripcion" => "Límites de velocidad en vías urbanas, interurbanas y carreteras convencionales. Normativa de velocidad máxima y mínima."
            ],
            [
                "bloque_id" => 5,
                "nombre" => "Prioridad de paso",
                "descripcion" => "Normas de prioridad en intersecciones, glorietas, pasos de peatones y otras situaciones de tráfico."
            ],
            [
                "bloque_id" => 5,
                "nombre" => "Adelantamientos",
                "descripcion" => "Normativa para adelantamientos seguros, condiciones y prohibiciones."
            ],
            [
                "bloque_id" => 5,
                "nombre" => "Parada y estacionamiento",
                "descripcion" => "Reglas de parada, estacionamiento y prohibiciones en diferentes tipos de vías y situaciones."
            ],
            [
                "bloque_id" => 5,
                "nombre" => "Señalización",
                "descripcion" => "Tipos de señales de tráfico: verticales, horizontales, luminosas y acústicas. Señales de los agentes."
            ],
            [
                "bloque_id" => 5,
                "nombre" => "Seguridad vial",
                "descripcion" => "Medidas de seguridad para reducir accidentes, uso del cinturón de seguridad, sistemas de retención infantil."
            ],
            [
                "bloque_id" => 5,
                "nombre" => "Alcohol y drogas",
                "descripcion" => "Efectos del alcohol y drogas en la conducción, normativa y sanciones por su uso."
            ],
            [
                "bloque_id" => 5,
                "nombre" => "Primeros auxilios",
                "descripcion" => "Normas básicas de primeros auxilios en accidentes de tráfico y cómo actuar en caso de emergencia."
            ],
            [
                "bloque_id" => 5,
                "nombre" => "Documentación del vehículo",
                "descripcion" => "Documentación obligatoria del vehículo y del conductor, permisos y autorizaciones."
            ],
            [
                "bloque_id" => 5,
                "nombre" => "Mecánica básica",
                "descripcion" => "Conceptos básicos de mecánica que deben conocer los conductores para el mantenimiento adecuado del vehículo."
            ],
            [
                "bloque_id" => 5,
                "nombre" => "Condiciones meteorológicas adversas",
                "descripcion" => "Normas de conducción y precauciones en situaciones de lluvia, nieve, niebla y hielo."
            ],
            [
                "bloque_id" => 5,
                "nombre" => "Comportamiento con otros usuarios",
                "descripcion" => "Conducción segura en relación con peatones, ciclistas, motociclistas y vehículos de transporte público."
            ]
        ];
        $data = [
            [
                "bloque_id" => 5,
                "nombre" => "Normas generales",
                "descripcion" => "Regulación general de la conducción y normas básicas de circulación en vías urbanas e interurbanas."
            ],
            [
                "bloque_id" => 5,
                "nombre" => "El conductor",
                "descripcion" => "Aptitudes, comportamientos y responsabilidades del conductor. Factores que influyen en la conducción."
            ],
            [
                "bloque_id" => 5,
                "nombre" => "El vehículo",
                "descripcion" => "Tipos de vehículos, clasificación, mantenimiento y revisiones. Obligaciones relacionadas con el vehículo."
            ],
            [
                "bloque_id" => 5,
                "nombre" => "Velocidades",
                "descripcion" => "Límites de velocidad en vías urbanas, interurbanas y carreteras convencionales. Normativa de velocidad máxima y mínima."
            ],
            [
                "bloque_id" => 5,
                "nombre" => "Prioridad de paso",
                "descripcion" => "Normas de prioridad en intersecciones, glorietas, pasos de peatones y otras situaciones de tráfico."
            ],
            [
                "bloque_id" => 5,
                "nombre" => "Adelantamientos",
                "descripcion" => "Normativa para adelantamientos seguros, condiciones y prohibiciones."
            ],
            [
                "bloque_id" => 5,
                "nombre" => "Parada y estacionamiento",
                "descripcion" => "Reglas de parada, estacionamiento y prohibiciones en diferentes tipos de vías y situaciones."
            ],
            [
                "bloque_id" => 5,
                "nombre" => "Señalización",
                "descripcion" => "Tipos de señales de tráfico: verticales, horizontales, luminosas y acústicas. Señales de los agentes."
            ],
            [
                "bloque_id" => 5,
                "nombre" => "Seguridad vial",
                "descripcion" => "Medidas de seguridad para reducir accidentes, uso del cinturón de seguridad, sistemas de retención infantil."
            ],
            [
                "bloque_id" => 5,
                "nombre" => "Alcohol y drogas",
                "descripcion" => "Efectos del alcohol y drogas en la conducción, normativa y sanciones por su uso."
            ],
            [
                "bloque_id" => 5,
                "nombre" => "Primeros auxilios",
                "descripcion" => "Normas básicas de primeros auxilios en accidentes de tráfico y cómo actuar en caso de emergencia."
            ],
            [
                "bloque_id" => 5,
                "nombre" => "Documentación del vehículo",
                "descripcion" => "Documentación obligatoria del vehículo y del conductor, permisos y autorizaciones."
            ],
            [
                "bloque_id" => 5,
                "nombre" => "Mecánica básica",
                "descripcion" => "Conceptos básicos de mecánica que deben conocer los conductores para el mantenimiento adecuado del vehículo."
            ],
            [
                "bloque_id" => 5,
                "nombre" => "Condiciones meteorológicas adversas",
                "descripcion" => "Normas de conducción y precauciones en situaciones de lluvia, nieve, niebla y hielo."
            ],
            [
                "bloque_id" => 5,
                "nombre" => "Comportamiento con otros usuarios",
                "descripcion" => "Conducción segura en relación con peatones, ciclistas, motociclistas y vehículos de transporte público."
            ]
        ];
        DB::table('categorias')->insert($data);
    }
}
