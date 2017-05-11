<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Ads;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AdsRequest;
use File;

class AdsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listads = Ads::all();
        return view('backend.ads.index', ['listads' => $listads]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.ads.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdsRequest $request)
    {
        if(Auth::user()->role == 1){
            $request->session()->flash('success', 'Đã thêm thành công');
            return redirect()->route('backend.ads.index');
        }
        $ads = new Ads;

        $ads->name = trim($request->name);
        $ads->link = trim($request->link);
        $ads->image = '';

        if($request->image != '')
        {
            /*Upload Photos*/
            $this->validate($request, [
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $image = $request->file('image');
            $input['imagename'] =str_random(40).'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/upload');
            $image->move($destinationPath, $input['imagename']);

            $ads->image = $input['imagename'];
        }
        
        $result = $ads->save();

        if($result){
            $request->session()->flash('success', 'Thêm thành công');
            return redirect()->route('backend.ads.index');
        }else{
            $request->session()->flash('danger', 'Có lỗi khi thêm');
            return redirect()->route('backend.ads.index');
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

        $ads = Ads::find($id);
        if($ads == null){
            $request->session()->flash('danger', 'Không tồn tại');
            return redirect()->route('backend.ads.index');
        }

        return view('backend.ads.show', ['ads' => $ads]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $ads = Ads::find($id);
        if($ads == null){
            $request->session()->flash('danger', 'Không tồn tại');
            return redirect()->route('backend.ads.index');
        }

        return view('backend.ads.edit', ['ads' => $ads]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdsRequest $request, $id)
    {
        $ads = Ads::find($id);

        if($ads == null){
            $request->session()->flash('danger', 'Không tồn tại');
            return redirect()->route('backend.ads.index');
        }

        if(Auth::user()->role == 1){
            $request->session()->flash('success', 'Đã sửa thành công');
            return redirect()->route('backend.ads.index');
        }

        $oldPic = $ads->image;
        
        $ads->name = trim($request->name);
        $ads->link = trim($request->link);

        if($request->image != '')
        {
            $this->validate($request, [
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $image = $request->file('image');
            $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('upload');
            $image->move($destinationPath, $input['imagename']);

            $ads->image = $input['imagename'];

            /*Delete photo*/
            $file_path = public_path("upload/".$oldPic);
            if(File::exists($file_path)) {
                File::delete($file_path);
            }
        }elseif($request->delete_picture)
        {
            $ads->image = '';
            /*Delete photo*/
            $file_path = public_path("upload/".$oldPic);
            if(File::exists($file_path)) {
                File::delete($file_path);
            }
        }
        
        $result = $ads->save();

        if($result){
            $request->session()->flash('success', 'Sửa thành công');
            return redirect()->route('backend.ads.index');
        }else{
            $request->session()->flash('danger', 'Có lỗi khi sửa');
            return redirect()->route('backend.ads.index');
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
        $ads = Ads::find($id);
        if($ads == null){
            $request->session()->flash('danger', 'Không tồn tại');
            return redirect()->route('backend.ads.index');
        }

        if(Auth::user()->role == 1){
            $request->session()->flash('success', 'Đã xóa thành công');
            return redirect()->route('backend.ads.index');
        }

        $oldPic = $ads->image;

        /*Delete photo*/
        $file_path = public_path("upload/".$oldPic);
        if(File::exists($file_path)) {
            File::delete($file_path);
        }

        $result = $ads->delete();

        if($result){
            $request->session()->flash('success', 'Xóa thành công');
            return redirect()->route('backend.ads.index');
        }else{
            $request->session()->flash('danger', 'Có lỗi khi xóa');
            return redirect()->route('backend.ads.index');
        }
    }
}
