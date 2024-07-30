<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Simpanan extends Model
{
    use HasFactory;
    protected $table = 'simpanans';
    protected $fillable = ['nik', 'nama', 'jenis_simpanan', 'jumlah', 'keterangan', 'tanggal_simpanan'];
}
