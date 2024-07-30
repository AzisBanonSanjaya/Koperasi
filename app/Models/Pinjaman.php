<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pinjaman extends Model
{
    use HasFactory;
    protected $table = 'pinjaman';
    protected $fillable = ['nik', 'nama', 'jumlah_pinjaman', 'tanggal_pinjam', 'jangka_waktu', 'bunga_persen', 'total_bunga', 'total_angsuran'];
}
