<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\WorkRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Work;
use File;

class WorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listWork = Work::all();
        return view('backend.work.index', ['listWork' => $listWork]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.work.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WorkRequest $request)
    {
        if(Auth::user()->role == 1){
            $request->session()->flash('success', 'Đã thêm thành công');
            return redirect()->route('backend.work.index');
        }

        $work = new Work;

        $work->name = trim($request->name);
        $work->time = trim($request->time);
        $work->description = trim($request->description);
        $work->image = '';

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

            $work->image = $input['imagename'];
        }
        
        $result = $work->save();

        if($result){
            $request->session()->flash('success', 'Thêm thành công');
            return redirect()->route('backend.work.index');
        }else{
            $request->session()->flash('danger', 'Có lỗi khi thêm');
            return redirect()->route('backend.work.index');
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

        $work = Work::find($id);
        if($work == null){
            $request->session()->flash('danger', 'Không tồn tại');
            return redirect()->route('backend.work.index');
        }

        return view('backend.work.show', ['work' => $work]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $work = Work::find($id);
        if($work == null){
            $request->session()->flash('danger', 'Không tồn tại');
            return redirect()->route('backend.work.index');
        }

        return view('backend.work.edit', ['work' => $work]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(WorkRequest $request, $id)
    {
        $work = Work::find($id);

        if($work == null){
            $request->session()->flash('danger', 'Không tồn tại');
            return redirect()->route('backend.work.index');
        }

        if(Auth::user()->role == 1){
            $request->session()->flash('success', 'Đã sửa thành công');
            return redirect()->route('backend.work.index');
        }

        $oldPic = $work->image;
        
        $work->name = trim($request->name);
        $work->time = trim($request->time);
        $work->description = trim($request->description);

        if($request->image != '')
        {
            $this->validate($request, [
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $image = $request->file('image');
            $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('upload');
            $image->move($destinationPath, $input['imagename']);

            $work->image = $input['imagename'];

            /*Delete photo*/
            $file_path = public_path("upload/".$oldPic);
            if(File::exists($file_path)) {
                File::delete($file_path);
            }
        }elseif($request->delete_picture)
        {
            $work->image = '';
            /*Delete photo*/
            $file_path = public_path("upload/".$oldPic);
            if(File::exists($file_path)) {
                File::delete($file_path);
            }
        }
        
        $result = $work->save();

        if($result){
            $request->session()->flash('success', 'Sửa thành công');
            return redirect()->route('backend.work.index');
        }else{
            $request->session()->flash('danger', 'Có lỗi khi sửa');
            return redirect()->route('backend.work.index');
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
        $work = Work::find($id);
        if($work == null){
            $request->session()->flash('danger', 'Không tồn tại');
            return redirect()->route('backend.work.index');
        }

        if(Auth::user()->role == 1){
            $request->session()->flash('success', 'Đã xóa thành công');
            return redirect()->route('backend.work.index');
        }

        $oldPic = $work->image;

        /*Delete photo*/
        $file_path = public_path("upload/".$oldPic);
        if(File::exists($file_path)) {
            File::delete($file_path);
        }

        $result = $work->delete();

        if($result){
            $request->session()->flash('success', 'Xóa thành công');
            return redirect()->route('backend.work.index');
        }else{
            $request->session()->flash('danger', 'Có lỗi khi xóa');
            return redirect()->route('backend.work.index');
        }
    }
}
