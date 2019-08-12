<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class booklist extends Model
{
	public $timestamps = false;
    protected $fillable = ['id_Ruangan','nama','NPK','email','PIN','waktu_Pinjam_Mulai','waktu_Pinjam_Selesai','keperluan','status','waktu_Pinjam_Timeout',];
    protected $hidden = [
    ];
}
