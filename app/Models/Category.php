<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Post;

class Category extends Model
{
	use SoftDeletes;

    protected $table = 'category';
   	protected $primaryKey = "id";
    public $timestamps = true;

    protected $dates = ['deleted_at'];

    public function post()
    {
        return $this->hasMany(Post::class);
    }
}
