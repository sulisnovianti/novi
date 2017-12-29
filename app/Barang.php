<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    //
    protected $fillable = ['id_jenis','nama_barang','amount'];
    public function jenis()
    {
    	return $this->belongsTo('App\Jenis');
    }
}
