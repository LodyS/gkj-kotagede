<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pekerjaan extends Model
{
    protected $table = 'pekerjaan';
    public $timestamps = true;
    protected $primaryKey = 'id';
    protected $fillable = ['id_jemaat', 'jenis_pekerjaan', 'tempat_kerja', 'alamat_kerja', 'jabatan', 'no_telp', 'user_input', 'user_update'];
    public static $validasi = ['id_jemaat'=>'required', 'jenis_pekerjaan'=>'required', 'tempat_kerja'=>'required', 'alamat_kerja'=>'required',
    'jabatan'=>'required'];
}
