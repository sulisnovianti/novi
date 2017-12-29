<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BorrowLog extends Model
{
    //
    protected $fillable = ['barang_id', 'user_id','is_returned'];

    public function Barang()
    {
    	return $this->belongsTo('App\Barang');
    }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
