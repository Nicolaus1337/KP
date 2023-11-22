<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class tagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tag')->insert([
            'name' => 'Petunjuk Umum', 
        ]);

        DB::table('tag')->insert([
            'name' => 'Dept It',
        ]);
    }
}
