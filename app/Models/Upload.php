<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    use HasFactory;

    protected $fillable=[
        'mhs_id',
        's_kp',
        's_kp_balas',
    ];

    public function pengajuan()
    {
        return $this->hasMany(Pengajuankp::class);
    }
}
