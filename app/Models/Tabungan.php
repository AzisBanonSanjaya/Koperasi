<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tabungan extends Model
{
    use HasFactory;
    protected $fillable = ['nik', 'nama', 'jenis_transaksi', 'jumlah_transaksi', 'tanggal_transaksi', 'saldo'];
}
