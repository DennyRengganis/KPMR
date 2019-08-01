<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class building extends Model
{
	public $timestamps = false;
    protected $fillable = ['nama_gedung','jumlah_lantai',];
    protected $hidden = [
    ];
}
