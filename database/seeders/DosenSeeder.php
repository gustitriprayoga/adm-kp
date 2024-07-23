<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Dosen;
use Illuminate\Database\Seeder;

class DosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Dosen::create([
            'nama_dosen' => 'Safni Marwa S.Kom., M.Kom.',
            'nip' => '1234567890',
            'prodi_id' => 1,
            'no_wa' => '081234567890',
            'id_user' => 2,
        ]);

        Dosen::create([
            'nama_dosen' => 'Joko Musrido S.Kom., M.Kom.',
            'nip' => '0987654321',
            'prodi_id' => 1,
            'no_wa' => '089876543210',
            'id_user' => 5,
        ]);

        Dosen::create([
            'nama_dosen' => 'Deddy Gusman S.Kom., M.Kom.',
            'nip' => '0987654321',
            'prodi_id' => 1,
            'no_wa' => '089876543210',
            'id_user' => 6,
        ]);
    }
}
