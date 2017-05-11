<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserEditRequest;
use File;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->role == 2){
            return redirect()->route('backend.home.index');
        }
        $listUser = User::all();
        return view('backend.user.index', ['listUser' => $listUser]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->role == 2){
            return redirect()->route('backend.home.index');
        }
        return view('backend.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        if(Auth::user()->role == 2){
            return redirect()->route('backend.home.index');
        }
        $checkUsername = User::where('username', trim($request->username))->get()->toArray();
        $checkEmail = User::where('email', trim($request->email))->get()->toArray();
        
        if(count($checkUsername) != 0){
            $request->session()->flash('danger', 'Đã trùng, vui lòng chọn username khác');
            return redirect()->route('backend.user.index');
        }

        if(count($checkEmail) != 0){
            $request->session()->flash('danger', 'Đã trùng, vui lòng chọn email khác');
            return redirect()->route('backend.user.index');
        }

        if(Auth::user()->role == 1){
            $request->session()->flash('success', 'Đã thêm thành công');
            return redirect()->route('backend.user.index');
        }

        $user = new User;

        $user->username = trim($request->username);
        $user->fullname = trim($request->fullname);
        $user->email = trim($request->email);
        $user->password = bcrypt(trim($request->password));
        $user->role = trim($request->role);

        $user->image = '';

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

            $user->image = $input['imagename'];
        }

        $result = $user->save();

        if($result){
            $request->session()->flash('success', 'Thêm thành công');
            return redirect()->route('backend.user.index');
        }else{
            $request->session()->flash('danger', 'Có lỗi khi thêm');
            return redirect()->route('backend.user.index');
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
        if(Auth::user()->role == 2){
            return redirect()->route('backend.home.index');
        }

        $user = User::find($id);
        if($user == null){
            $request->session()->flash('danger', 'Không tồn tại');
            return redirect()->route('backend.user.index');
        }

        return view('backend.user.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $user = User::find($id);
        if($user == null){
            $request->session()->flash('danger', 'Không tồn tại');
            return redirect()->route('backend.user.index');
        }

        if(Auth::user()->role == 2 && Auth::user()->id != $id){
            return redirect()->route('backend.user.index');
        }

        return view('backend.user.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserEditRequest $request, $id)
    {
        $checkUsername = User::where('username', trim($request->username))->where('id', '!=', $id)->get()->toArray();
        $checkEmail = User::where('email', trim($request->email))->where('id', '!=', $id)->get()->toArray();
        
        if(count($checkUsername) != 0){
            $request->session()->flash('danger', 'Đã trùng, vui lòng chọn username khác');
            return redirect()->route('backend.user.index');
        }

        if(count($checkEmail) != 0){
            $request->session()->flash('danger', 'Đã trùng, vui lòng chọn email khác');
            return redirect()->route('backend.user.index');
        }

        $user = User::find($id);
        if($user == null){
            $request->session()->flash('danger', 'Không tồn tại');
            return redirect()->route('backend.user.index');
        }

        if(Auth::user()->role == 1){
            $request->session()->flash('success', 'Đã sửa thành công');
            return redirect()->route('backend.user.index');
        }

        $oldPic = $user->image;

        if(Auth::user()->role == 3){
            $user->username = trim($request->username);
        }
        $user->fullname = trim($request->fullname);
        $user->email = trim($request->email);
        if(Auth::user()->role == 3){
            $user->role = trim($request->role);
        }
        if(trim($request->password) != ''){
            $user->password = bcrypt(trim($request->password));
        }

        if($request->image != '')
        {
            $this->validate($request, [
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $image = $request->file('image');
            $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('upload');
            $image->move($destinationPath, $input['imagename']);

            $user->image = $input['imagename'];

            /*Delete photo*/
            $file_path = public_path("upload/".$oldPic);
            if(File::exists($file_path)) {
                File::delete($file_path);
            }
        }elseif($request->delete_picture)
        {
            $user->image = '';
            /*Delete photo*/
            $file_path = public_path("upload/".$oldPic);
            if(File::exists($file_path)) {
                File::delete($file_path);
            }
        }
        
        $result = $user->save();

        if($result){
            $request->session()->flash('success', 'Sửa thành công');
            return redirect()->route('backend.user.index');
        }else{
            $request->session()->flash('danger', 'Có lỗi khi sửa');
            return redirect()->route('backend.user.index');
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
        if(Auth::user()->role == 2){
            return redirect()->route('backend.home.index');
        }

        $user = User::find($id);
        if($user == null){
            $request->session()->flash('danger', 'Không tồn tại');
            return redirect()->route('backend.user.index');
        }

        if(Auth::user()->role == 1){
            $request->session()->flash('success', 'Đã xóa thành công');
            return redirect()->route('backend.user.index');
        }

        //Xóa bài viết
        $arrayPost = Post::where('user_id', $id)->delete();

        $oldPic = $user->image;

        /*Delete photo*/
        $file_path = public_path("upload/".$oldPic);
        if(File::exists($file_path)) {
            File::delete($file_path);
        }

        $result = $user->delete();

        if($result){
            $request->session()->flash('success', 'Xóa thành công');
            return redirect()->route('backend.user.index');
        }else{
            $request->session()->flash('danger', 'Có lỗi khi xóa');
            return redirect()->route('backend.user.index');
        }
    }
}
