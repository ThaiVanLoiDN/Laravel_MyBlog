<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Models\Post;
use App\Models\Category;

class PostController extends Controller
{
    public function show($slug, $id)
    {
    	$post = Post::find($id);
    	if($post == null){
    		return redirect()->route('frontend.home.index');
    	}
        $dateEdit = $post->updated_at;
        $read_count = $post->read_count;

        $blogKey = 'blog_' . $id;

        if (!Session::has($blogKey)) {
            $post->read_count = $read_count + 1;
            Session::put($blogKey, 1);
        }
        $post->updated_at = $dateEdit;
        $post->save();

    	$listOtherPost = Post::where('category_id', $post->category_id)->where('id', '!=', $id)->orderBy('id', 'desc')->limit(2)->get();
    	return view('frontend.post.show', ['post' => $post, 'title' => $post->title, 'description' => str_limit($post->description, 255), 'listOtherPost' => $listOtherPost]);
    }

    public function category($slug, $id)
    {
    	$category = Category::find($id);
    	if($category == null){
    		return redirect()->route('frontend.home.index');
    	}
    	$postCategory = Post::where('category_id', $id)->orderBy('id', 'desc')->paginate(5);
    	return view('frontend.post.category', ['postCategory' => $postCategory, 'title' => $category->name]);
    }
}
