<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Departemen;

class Karyawan  extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $fillable = ['nik', 'name','email', 'departemen_id', 'jabatan_id', 'tanggal_bergabung', 'alamat', 'no_telepon',  'status_keanggotaan', ];


    public function departemen()
    {
        return $this->belongsTo(Departemen::class);
    }
}