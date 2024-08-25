<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penugasan extends Model
{
    use HasFactory;

    protected $table = 'penugasan';

    protected $fillable = [
        'nama_penugas',
        'tertugas',
        'file',
        'keterangan',
        'status',
        'catatan'
    ];

    protected $casts = [
        'tertugas' => 'array',
    ];
}

