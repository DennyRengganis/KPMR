<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class config extends Model
{
	public $timestamps = false;
    protected $fillable = ['booklists_timeout',];
    protected $hidden = [
    ];
}