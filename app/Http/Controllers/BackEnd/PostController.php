<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Category;
use App\Http\Requests\PostRequest;
use File;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listPost = Post::orderBy('id', 'desc')->paginate(10);
        return view('backend.post.index', ['listPost' => $listPost]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listCategory = Category::all();
        return view('backend.post.create', ['listCategory' => $listCategory]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $checkSlug = Category::where('id', $request->category_id)->get()->toArray();

        if(count($checkSlug) == 0){
            $request->session()->flash('danger', 'Không tồn tại chuyên mục');
            return redirect()->route('backend.post.index');
        }

        if(Auth::user()->role == 1){
            $request->session()->flash('success', 'Đã thêm thành công');
            return redirect()->route('backend.post.index');
        }

        $post = new Post;

        $post->title = trim($request->title);
        $post->description = trim($request->description);
        $post->content = trim($request->content);
        $post->read_count = 1;
        $post->category_id = trim($request->category_id);
        $post->user_id = Auth::id();
        $post->image = '';

        if($request->image != '')
        {
            /*Upload Photos*/
            $this->validate($request, [
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $image = $request->file('image');
            $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/upload');
            $image->move($destinationPath, $input['imagename']);

            $post->image = $input['imagename'];
        }
        
        $result = $post->save();

        if($result){
            $request->session()->flash('success', 'Thêm thành công');
            return redirect()->route('backend.post.index');
        }else{
            $request->session()->flash('danger', 'Có lỗi khi thêm');
            return redirect()->route('backend.post.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {

        $post = Post::find($id);
        if($post == null){
            $request->session()->flash('danger', 'Không tồn tại');
            return redirect()->route('backend.post.index');
        }

        return view('backend.post.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $post = Post::find($id);

        if($post == null){
            $request->session()->flash('danger', 'Không tồn tại');
            return redirect()->route('backend.post.index');
        }

        $listCategory = Category::all();

        return view('backend.post.edit', ['post' => $post, 'listCategory' => $listCategory]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        $checkSlug = Category::where('id', $request->category_id)->get()->toArray();

        if(count($checkSlug) == 0){
            $request->session()->flash('danger', 'Không tồn tại chuyên mục');
            return redirect()->route('backend.post.index');
        }
        
        $post = Post::find($id);

        if($post == null){
            $request->session()->flash('danger', 'Không tồn tại');
            return redirect()->route('backend.post.index');
        }

        if(Auth::user()->role == 1){
            $request->session()->flash('success', 'Đã sửa thành công');
            return redirect()->route('backend.post.index');
        }

        $oldPic = $post->image;
        
        $post->title = trim($request->title);
        $post->description = trim($request->description);
        $post->content = trim($request->content);
        $post->category_id = trim($request->category_id);

        if($request->image != '')
        {
            $this->validate($request, [
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $image = $request->file('image');
            $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('upload');
            $image->move($destinationPath, $input['imagename']);

            $post->image = $input['imagename'];

            /*Delete photo*/
            $file_path = public_path("upload/".$oldPic);
            if(File::exists($file_path)) {
                File::delete($file_path);
            }
        }elseif($request->delete_picture)
        {
            $post->image = '';
            /*Delete photo*/
            $file_path = public_path("upload/".$oldPic);
            if(File::exists($file_path)) {
                File::delete($file_path);
            }
        }
        
        $result = $post->save();

        if($result){
            $request->session()->flash('success', 'Sửa thành công');
            return redirect()->route('backend.post.index');
        }else{
            $request->session()->flash('danger', 'Có lỗi khi sửa');
            return redirect()->route('backend.post.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $post = Post::find($id);
        if($post == null){
            $request->session()->flash('danger', 'Không tồn tại');
            return redirect()->route('backend.post.index');
        }

        if(Auth::user()->role == 1){
            $request->session()->flash('success', 'Đã xóa thành công');
            return redirect()->route('backend.post.index');
        }

        $oldPic = $post->image;

        /*Delete photo*/
        $file_path = public_path("upload/".$oldPic);
        if(File::exists($file_path)) {
            File::delete($file_path);
        }

        $result = $post->delete();

        if($result){
            $request->session()->flash('success', 'Xóa thành công');
            return redirect()->route('backend.post.index');
        }else{
            $request->session()->flash('danger', 'Có lỗi khi xóa');
            return redirect()->route('backend.post.index');
        }
    }
}
