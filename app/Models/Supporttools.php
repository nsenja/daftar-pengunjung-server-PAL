<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supporttools extends Model
{
    use HasFactory;
    protected $fillable = [
        'support_options',
    ];

    public static function index()
    {
        return Supporttools::all();
    }
}
