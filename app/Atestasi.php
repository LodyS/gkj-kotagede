<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Atestasi extends Model
{
    protected $table = 'atestasi';
    public $timestamps = true;
    protected $primaryKey = 'id';
    protected $fillable = ['id_jemaat', 'no_surat', 'tanggal', 'alasan', 'user_input', 'user_update'];
    public static $validasi = ['id_jemaat' => 'required|integer', 'no_surat' => 'required|string', 'tanggal'=>'required|date', 'alasan'=>'required|string'];
}
