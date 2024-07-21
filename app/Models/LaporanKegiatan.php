<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanKegiatan extends Model
{
    use HasFactory;

    protected $table = 'laporan_kegiatan';
    protected $fillable = ['nama', 'kategori_id', 'gambar', 'keterangan','semester'];

    public function kategori()
    {
        return $this->belongsTo(KategoriKegiatan::class, 'kategori_id');
    }
}
