<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bimbingan extends Model
{
    use HasFactory;

    protected $fillable= [
        'dosen_id',
        'mhs_id',
    ];

    public function dosen()
    {
        return $this->belongsTo(Dosen::class);
    }

    public function mhs()
    {
        return $this->belongsTo(Mahasiswa::class);
    }

    public function logbook()
    {
        return $this->hasMany(Logbook::class);
    }

    public function laporan()
    {
        return $this->hasMany(Laporan::class);
    }

    public function viewprodi($id)
    {
        $bimbingan=Dosen::where('id',$id)
        ->where('prodi_id', auth()->user()->prodi_id)
        ->first();
        return $bimbingan;
    }
 
}
