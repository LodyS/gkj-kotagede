<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jemaat extends Model
{
    protected $table = 'jemaat';
    public $timestamps = true;
    protected $primaryKey = 'id';
    protected $fillable = ['id_jemaat','foto','status', 'nama_orangtua', 'nama_jemaat', 'ttl','tanggal','jkel','gol_darah','alamat',
    'no_hp','email', 'pernikahan', 'asal_gereja','ket','no_kk', 'user_input', 'user_update'];
    public static $validasi =
    [
        'id_jemaat'=>'required',
        'nama_jemaat'=>'required',
        'status'=>'required',
        'ket'=>'required',
        'tanggal'=>'required'
    ];

    public function Gereja ()
    {
        return $this->belongTo('App\Gereja');
    }
}
