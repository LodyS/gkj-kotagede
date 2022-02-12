<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pendidikan extends Model
{
    protected $table = 'pendidikan';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = ['id_jemaat', 'jenjang_pendidikan', 'nama_sekolah', 'tahun_lulus', 'tempat', 'gelar', 'pendidikan_khusus', 'user_input', 'user_update'];
    public static $validasi = ['id_jemaat' => 'required', 'jenjang_pendidikan' => 'required', 'nama_sekolah'=>'required'];
}