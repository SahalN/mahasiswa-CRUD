<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mahasiswa extends Model
{
    use HasFactory;
    protected $fillable = ['npm', 'nama','kelas', 'jurusan','nohp'];
    protected $table = "mahasiswa";
    public $timestamps = false;

}
