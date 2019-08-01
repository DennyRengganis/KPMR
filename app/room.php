<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class room extends Model
{
	public $timestamps = false;
    protected $fillable = ['nama_ruangan','id_gedung','lantai','status_now',];
    protected $hidden = [
    ];
}
