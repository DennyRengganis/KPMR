<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mastertime extends Model
{
	public $timestamps = false;
    protected $fillable = ['minute',];
    protected $hidden = [
    ];
}
