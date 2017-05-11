<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Skill extends Model
{
	use SoftDeletes;

    protected $table = 'skill';
   	protected $primaryKey = "id";
    public $timestamps = true;

    protected $dates = ['deleted_at'];
}
