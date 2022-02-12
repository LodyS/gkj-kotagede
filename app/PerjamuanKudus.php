<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PerjamuanKudus extends Model
{
    protected $table = 'perjamuan_kudus';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = ['id_jemaat','tanggal', 'jam_ibadah', 'keterangan', 'user_input', 'user_update'];
    public static $validasi = ['id_jemaat' => 'required', 'tanggal'=> 'required', 'jam_ibadah' => 'required'];
}