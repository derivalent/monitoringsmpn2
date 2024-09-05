<?php

// namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

// class Penugasan extends Model
// {
//     use HasFactory;

//     protected $table = 'penugasan';

//     protected $fillable = [
//         'nama_penugas',
//         'tertugas',
//         'file',
//         'keterangan',
//         'status',
//         'catatan'
//     ];

//     protected $casts = [
//         'tertugas' => 'array',
//     ];
// }

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
        'kegiatan',
        'status',
        'catatan',
        'deadline',
        'pengumpulan',
    ];

    protected $casts = [
        'tertugas' => 'array', // Convert tertugas from JSON to array
        'deadline' =>'date',
    ];

   // Penugasan.php
public function kategoriKegiatan()
{
    return $this->belongsTo(KategoriKegiatan::class, 'kegiatan', 'id'); // Adjust 'id' if necessary
}

// public function user()
//     {
//         return $this->belongsTo(User::class);
//     }
}
