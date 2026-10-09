<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Peminjaman; 

class Anggota extends Model
{
    protected $fillable = ['kode_anggota', 'nama', 'alamat', 'telepon']; // Tambahkan fillable agar bisa mass assignment

    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class);
    }
}