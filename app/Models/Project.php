<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
	use SoftDeletes;

    protected $table = 'project';
   	protected $primaryKey = "id";
    public $timestamps = true;

    protected $dates = ['deleted_at'];
}
