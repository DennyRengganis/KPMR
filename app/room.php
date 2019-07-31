<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class room extends Model
{
    protected $fillable = ['id', 'nomor','gedung','lantai','status_now',];
    protected $hidden = [
    ];
}
