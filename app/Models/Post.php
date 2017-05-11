<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Category;
use App\User;

class Post extends Model
{
	use SoftDeletes;

    protected $table = 'post';
   	protected $primaryKey = "id";
    public $timestamps = true;

    protected $dates = ['deleted_at'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
