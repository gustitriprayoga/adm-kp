<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([


            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
            'role'=>'Admin',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('users')->insert([


            'email' => 'staf1@gmail.com',
            'password' => Hash::make('staf123'),
            'prodi_id'=>'1',
            'role'=>'Staf',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('users')->insert([


            'email' => 'staf2@gmail.com',
            'password' => Hash::make('staf123'),
            'prodi_id'=>'2',
            'role'=>'Staf',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('users')->insert([


            'email' => 'staf3@gmail.com',
            'password' => Hash::make('staf123'),
            'prodi_id'=>'3',
            'role'=>'Staf',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('users')->insert([


            'email' => 'joko@gmail.com',
            'password' => Hash::make('joko123'),
            'prodi_id'=>'1',
            'role'=>'Dospem',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('users')->insert([


            'email' => 'Deddy@gmail.com',
            'password' => Hash::make('deddy123'),
            'prodi_id'=>'1',
            'role'=>'Ketua Prodi',
            'created_at' => now(),
            'updated_at' => now()
        ]);


    }
}
