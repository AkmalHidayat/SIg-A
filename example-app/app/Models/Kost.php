<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kost extends Model
{
    //use HasFactory;
    protected $table = "kost";
    protected $primaryKey = "id_kost";
    protected $fillable = [
        'nama', 'foto_path', 'cordinat_x', 'cordinat_y', 'fasilitas', 'harga',
    ];
}
