<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Babtis extends Model
{
    protected $table = 'babtis';
    public $timestamps = true;
    protected $primaryKey = 'id';
    protected $fillable = ['id_jemaat', 'tanggal_babtis', 'no_surat_babtis', 'pendeta_babtis', 'gereja_atestasi', 'tanggal_atestasi', 'no_surat',
    'gereja_sidi','tanggal_sidi','pendeta_sidi','no_surat_sidi','gereja_penyerahan','tanggal_penyerahan','pendeta_penyerahan',
    'user_input', 'user_update'];
}
