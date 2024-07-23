<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuankp extends Model
{
    use HasFactory;

    protected $fillable= [
        'mhs_id',
        'tmpt',
        'tgl',
        'status',
        'kondisi',
    ];

    
    public function mhs()
    {
        return $this->belongsTo(Mahasiswa::class);
    }

    public function upload($id)
    {
        $upload = Upload::where('pengajuan_id',$id )->first();
        return $upload;
        
    }

    public function bimbingan($id)
    {
        $bimbingan = Bimbingan::where('mhs_id',$id )->first();
        return $bimbingan;
        
    }

    public function viewprodi($id)
    {
        $mhs=Mahasiswa::where('id',$id)
        ->where('prodi_id', auth()->user()->prodi_id)
        ->first();
        return $mhs;
    }
}
