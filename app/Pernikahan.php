<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pernikahan extends Model
{
    protected $table = 'pernikahan';
    public $timestamps = true;
    protected $primaryKey = 'id';
    protected $fillable = ['suami', 'istri', 'tanggal', 'id_gereja', 'pendeta', 'catatan_sipil', 'no_surat', 'user_input', 'user_update'];
    public static $validasi = ['suami' => 'required', 'istri' => 'required', 'id_gereja|required', 'pendeta|required', 
    'catatan_sipil|required', 'no_surat|required'];
}
