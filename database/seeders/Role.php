<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Role extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       DB::table('roles')->insert(
            [
                'name' => 'ADMINISTRADOR',
                'guard_name' => 'web'
            ]
        );
        DB::table('roles')->insert(
            [
                'name' => 'RECEPCION',
                'guard_name' => 'web'
            ]
        );
        DB::table('roles')->insert(
            [
                'name' => 'ESPECIALISTA',
                'guard_name' => 'web'
            ]
        );
    }
}
