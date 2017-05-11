<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
	use SoftDeletes;

    protected $table = 'contact';
   	protected $primaryKey = "id";
    public $timestamps = true;

    protected $dates = ['deleted_at'];
}
