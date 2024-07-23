<?php

namespace App\Models;

use App\Models\Nilaikps;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Dosen extends Model
{
    
    protected $fillable= [
        'nama_dosen',
        'prodi_id',
        'nip',
        'no_wa',
        'id_user',
    ];

    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class);
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

   

}

