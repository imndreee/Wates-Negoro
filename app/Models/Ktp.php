<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ktp extends Model
{
    protected $table = "data_ktp";
    protected $guarded = [];
    protected $fillable = ['nama', 'tanggal_lahir', 'tempat_lahir' ,'alamat', 'agama', 'status', 'pekerjaan', 'kewarganegaraan', 'created_at', 'updated_at'];
    // use HasFactory;
}
