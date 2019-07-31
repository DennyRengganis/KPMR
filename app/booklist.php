<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class booklist extends Model
{
    protected $fillable = ['id', 'id_Ruangan','nama','NPK','email','PIN','waktu_Pinjam_Mulai','waktu_Pinjam_Selesai','keperluan',];
    protected $hidden = [
    ];
}
