<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logbook extends Model
{
    use HasFactory;

    protected $fillable= [
        'bimbingan_id',
        'kegiatan',
        'deskripsi',
        'tgl',
        'dokumentasi',
        'dokumentasi2',
        'paraf',
    ];

    public function bimbingan()
    {
        return $this->belongsTo(Bimbingan::class);
    }
}
