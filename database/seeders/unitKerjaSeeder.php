<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class unitKerjaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('unit_kerja')->insert([
            'kode_unit_kerja' => 'D002830000',
            'nama_unit_kerja' => 'Departemen IT Service & Business Partner PKT'  
        ]);

        DB::table('unit_kerja')->insert([
            'kode_unit_kerja' => 'D002840000',
            'nama_unit_kerja' => 'Tim Transformasi Digital'  
        ]);
    }
}
