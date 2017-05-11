<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Quotes extends Model
{
	use SoftDeletes;

    protected $table = 'quotes';
   	protected $primaryKey = "id";
    public $timestamps = true;

    protected $dates = ['deleted_at'];
}
