<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $fillable= [
        
        'dosen_id',
        'mhs_id',
        'chat','user'
    ];

    public function user($id){
        $user = User::find($id);
        return $user;
    }
}
