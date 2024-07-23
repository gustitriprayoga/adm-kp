<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilaikps extends Model
{
    use HasFactory;

    protected $fillable=[
        'nilai_presentasi',
        'nilai_ppt',
        'nilai_project',
        'nilai_laporankp',
        'dosen_id',
        'mhs_id',
        'huruf',
        'rata2',
    ];

    public function dosen()
    {
        return $this->belongsTo(Dosen::class); 
    }

    public function mhs()
    {
        return $this->belongsTo(Mahasiswa::class); 
    }

    public function viewprodi($id)
    {
        $bimbingan=Dosen::where('id',$id)
        ->where('prodi_id', auth()->user()->prodi_id)
        ->first();
        return $bimbingan;
    }
}
