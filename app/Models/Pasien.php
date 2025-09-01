<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

    protected $table = 'pasien'; // Nama tabel di database

    protected $fillable = [
        'nama',
        'ttl',
        'jenis_kelamin',
    ];

    // Nonaktifkan timestamps jika tabel tidak punya created_at & updated_at
    public $timestamps = false;
}
