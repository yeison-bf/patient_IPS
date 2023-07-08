<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Country extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Country
        DB::table('countries')->insert(
            [
                'name' => 'Colombia'
            ]
        );
        DB::table('countries')->insert(
            [
                'name' => 'Venezuela'
            ]
        );
        DB::table('countries')->insert(
            [
                'name' => 'Chile'
            ]
        );
        DB::table('countries')->insert(
            [
                'name' => 'Panamá'
            ]
        );
    }
}
