<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jenis extends Model
{
	protected $fillable = ['nama'];
    public function barang()
    {
    	return $this->hasMany('App\Barang');
    }
}
