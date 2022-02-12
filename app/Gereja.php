<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gereja extends Model
{
    protected $table = 'gereja';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = ['nama', 'alamat', 'id_provinsi', 'id_kabupaten', 'id_kecamatan', 'id_kelurahan', 'user_input', 'user_update'];
    public static $validasi = ['nama' => 'required', 'alamat' => 'required'];

}