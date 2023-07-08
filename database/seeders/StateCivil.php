<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StateCivil extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Estados civiles
        DB::table('state_civils')->insert(
            [
                'name' => 'Soltero'
            ]
        );
        DB::table('state_civils')->insert(
            [
                'name' => 'Casado'
            ]
        );
        DB::table('state_civils')->insert(
            [
                'name' => 'Unión Libre'
            ]
        );
        DB::table('state_civils')->insert(
            [
                'name' => 'Viudo'
            ]
        );
    }
}
