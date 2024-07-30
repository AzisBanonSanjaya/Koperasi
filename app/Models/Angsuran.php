<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Angsuran extends Model
{
    use HasFactory;
    protected $fillable = ['nik','nama','jumlah_angsuran', 'tanggal_jatuh_tempo', 'tanggal_bayar', 'metode_pembayaran', 'bukti_pembayaran'];
}
