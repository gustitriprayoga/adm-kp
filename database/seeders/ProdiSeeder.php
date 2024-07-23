<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ProdiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('prodis')->insert([
            
            'prodi' => 'Teknik Informatika',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('prodis')->insert([
            
            'prodi' => 'Teknik Idustri',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('prodis')->insert([
            
            'prodi' => 'Teknik Sipil',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
