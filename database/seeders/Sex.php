<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Sex extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // sexos
       DB::table('sexes')->insert(
            [
                'name' => 'M'
            ]
        );
       DB::table('sexes')->insert(
            [
                'name' => 'F'
            ]
        );

    }
}
