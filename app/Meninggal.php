<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meninggal extends Model
{
    protected $table = 'meninggal';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = ['id_jemaat', 'tanggal', 'sebab', 'user_input', 'user_update'];
    public static $validasi = ['id_jemaat' => 'required', 'tanggal' => 'required', 'sebab'=>'required'];
}
