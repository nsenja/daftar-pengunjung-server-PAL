<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class DaftarPengunjung extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_lengkap',
        'nik',
        'instansi',
        'no_hp',
        'keperluan',
        'alat_pendukung',
        'pendamping',
        'waktu_masuk',
    ];

    public static function index()
    {
        return DaftarPengunjung::all();
    }

    public static function store(Request $request)
    {
        DaftarPengunjung::create($request->all());
    }

}
