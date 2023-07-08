<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegimenEPS extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         //Regimen EPS
         DB::table('regimen_e_p_s')->insert(
            [
                'name' => 'Subsidiado'
            ]
        );
        DB::table('regimen_e_p_s')->insert(
            [
                'name' => 'Contributivo'
            ]
        );
    }
}
