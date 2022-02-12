<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usaha extends Model
{
    protected $table = 'usaha';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = ['id_jemaat', 'usaha', 'user_input', 'user_update'];
    public static $validasi = ['id_jemaat' => 'required|integer','usaha' => 'required',];
}