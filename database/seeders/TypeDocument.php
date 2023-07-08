<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeDocument extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Tipos de documentos
        DB::table('type_documents')->insert(
            [
                'name' => 'Registro Civil',
                'abbreviation' => 'RC'
            ]
        );
        DB::table('type_documents')->insert(
            [
                'name' => 'Cedula Ciudadanía',
                'abbreviation' => 'CC '
            ]
        );
        DB::table('type_documents')->insert(
            [
                'name' => 'Tarjeta de Identidad',
                'abbreviation' => 'TI'
            ]
        );
        DB::table('type_documents')->insert(
            [
                'name' => 'Pasaporte',
                'abbreviation' => 'PA'
            ]
        );

    }
}
