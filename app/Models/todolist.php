<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class todolist extends Model
{
    use HasFactory;
    protected $fillable = [
    'id',
    'judul',
    'deskripsi',
    'proritas',
    'status',
    'deadline',
    ];
}
