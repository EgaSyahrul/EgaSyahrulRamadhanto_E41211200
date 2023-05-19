<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Budaya extends Model
{
    use HasFactory;
    protected $table = 'budayas'; // Ubah nama tabel sesuai dengan migrasi ('budayas')
    protected $primaryKey = 'id'; // Ubah primary key jika perlu
    protected $fillable = [
        'nama', 'alamat', 'tanggal_lahir', 'jenis_kelamin' // Tambahkan kolom 'tahun_ditemukan'
    ];
}
