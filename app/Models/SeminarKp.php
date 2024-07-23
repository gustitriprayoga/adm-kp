<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeminarKp extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function mahasiswas()
    {
        return $this->belongsTo(Mahasiswa::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function dosen()
    {
        return $this->belongsTo(Dosen::class);
    }

}


