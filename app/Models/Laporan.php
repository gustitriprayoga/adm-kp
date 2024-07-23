<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;

    protected $fillable= [
        'bimbingan_id',
        'tgl',
        'catatan',
        'laporankp',
    ];

    public function bimbingan()
    {
        return $this->belongsTo(Bimbingan::class);
    }

    
}
