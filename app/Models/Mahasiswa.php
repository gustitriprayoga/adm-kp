<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    
    protected $fillable= [
        'nama_mhs',
        'nim',
        'prodi_id',
        'no_wa',
        'user_id',
        'status'
    ];

    public function user()
    {
        return $this->hasMany(User::class);
    }

    
    public function pengajuan()
    {
        return $this->hasMany(Pengajuankp::class);
    }

    public function bimbingan()
    {
        return $this->hasMany(Bimbingan::class);
    }

    public function prodi()
    {
        return $this->belongsTo(Prodi::class);
    }

    public function nilaikps()
    {
        return $this->hasMany(Nilaikps::class);
    }

    public function laporan($id)
    {
        $bimbingan = Bimbingan::where('mhs_id', $id)->get();
        foreach ($bimbingan as $item)
        
        $item = Laporan::where('bimbingan_id', $item->id)->latest()->get();
        foreach ($item as $laporan)
        // dd($item);
        return $laporan;

    }
}

