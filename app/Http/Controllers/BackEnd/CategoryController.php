<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CategoryRequest;
use App\Models\Post;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listCategory = Category::all();
        return view('backend.category.index', ['listCategory' => $listCategory]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $checkSlug = Category::where('slug_name', str_slug(trim($request->name)))->get()->toArray();

        if(count($checkSlug) != 0){
            $request->session()->flash('danger', 'Đã trùng, vui lòng chọn tên khác');
            return redirect()->route('backend.category.index');
        }

        if(Auth::user()->role == 1){
            $request->session()->flash('success', 'Đã thêm thành công');
            return redirect()->route('backend.category.index');
        }

        $category = new Category;

        $category->name = trim($request->name);
        $category->slug_name = str_slug(trim($request->name));
        $result = $category->save();

        if($result){
            $request->session()->flash('success', 'Thêm thành công');
            return redirect()->route('backend.category.index');
        }else{
            $request->session()->flash('danger', 'Có lỗi khi thêm');
            return redirect()->route('backend.category.index');
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

        $category = Category::find($id);
        if($category == null){
            $request->session()->flash('danger', 'Không tồn tại');
            return redirect()->route('backend.category.index');
        }

        return view('backend.category.show', ['category' => $category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $category = Category::find($id);
        if($category == null){
            $request->session()->flash('danger', 'Không tồn tại');
            return redirect()->route('backend.category.index');
        }

        return view('backend.category.edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $checkSlug = Category::where('slug_name', str_slug(trim($request->name)))->where('id', '!=', $id)->get()->toArray();

        if(count($checkSlug) != 0){
            $request->session()->flash('danger', 'Đã trùng, vui lòng chọn tên khác');
            return redirect()->route('backend.category.index');
        }

        $category = Category::find($id);
        if($category == null){
            $request->session()->flash('danger', 'Không tồn tại');
            return redirect()->route('backend.category.index');
        }

        if(Auth::user()->role == 1){
            $request->session()->flash('success', 'Đã sửa thành công');
            return redirect()->route('backend.category.index');
        }

        $category->name = trim($request->name);
        $category->slug_name = str_slug(trim($request->name));
        $result = $category->save();

        if($result){
            $request->session()->flash('success', 'Sửa thành công');
            return redirect()->route('backend.category.index');
        }else{
            $request->session()->flash('danger', 'Có lỗi khi sửa');
            return redirect()->route('backend.category.index');
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
        $category = Category::find($id);
        if($category == null){
            $request->session()->flash('danger', 'Không tồn tại');
            return redirect()->route('backend.category.index');
        }

        if(Auth::user()->role == 1){
            $request->session()->flash('success', 'Đã xóa thành công');
            return redirect()->route('backend.category.index');
        }

        //Xóa bài viết
        $arrayPost = Post::where('category_id', $id)->delete();

        $result = $category->delete();

        if($result){
            $request->session()->flash('success', 'Xóa thành công');
            return redirect()->route('backend.category.index');
        }else{
            $request->session()->flash('danger', 'Có lỗi khi xóa');
            return redirect()->route('backend.category.index');
        }
    }
}
