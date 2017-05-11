<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Info extends Model
{
	use SoftDeletes;

    protected $table = 'info';
   	protected $primaryKey = "id";
    public $timestamps = true;

    protected $dates = ['deleted_at'];
}
