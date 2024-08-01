<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Karyawan;

class Departemen extends Model
{
    use HasFactory;
    protected $fillable = ['name'];
    protected $table = 'departemens';
    
    public function karyawans()
    {
        return $this->hasMany(Karyawan::class);
    }
}
