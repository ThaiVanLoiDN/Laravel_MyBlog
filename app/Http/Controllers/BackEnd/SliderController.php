<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\SliderRequest;
use File;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listSlider = Slider::all();
        return view('backend.slider.index', ['listSlider' => $listSlider]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SliderRequest $request)
    {
        if(Auth::user()->role == 1){
            $request->session()->flash('success', 'Đã thêm thành công');
            return redirect()->route('backend.slider.index');
        }

        $slider = new Slider;

        $slider->name = trim($request->name);
        $slider->link = trim($request->link);
        $slider->description = trim($request->description);
        $slider->image = '';

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

            $slider->image = $input['imagename'];
        }
        
        $result = $slider->save();

        if($result){
            $request->session()->flash('success', 'Thêm thành công');
            return redirect()->route('backend.slider.index');
        }else{
            $request->session()->flash('danger', 'Có lỗi khi thêm');
            return redirect()->route('backend.slider.index');
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

        $slider = Slider::find($id);
        if($slider == null){
            $request->session()->flash('danger', 'Không tồn tại');
            return redirect()->route('backend.slider.index');
        }

        return view('backend.slider.show', ['slider' => $slider]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $slider = Slider::find($id);
        if($slider == null){
            $request->session()->flash('danger', 'Không tồn tại');
            return redirect()->route('backend.slider.index');
        }

        return view('backend.slider.edit', ['slider' => $slider]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SliderRequest $request, $id)
    {
        $slider = Slider::find($id);

        if($slider == null){
            $request->session()->flash('danger', 'Không tồn tại');
            return redirect()->route('backend.slider.index');
        }

        if(Auth::user()->role == 1){
            $request->session()->flash('success', 'Đã sửa thành công');
            return redirect()->route('backend.slider.index');
        }

        $oldPic = $slider->image;
        
        $slider->name = trim($request->name);
        $slider->link = trim($request->link);
        $slider->description = trim($request->description);

        if($request->image != '')
        {
            $this->validate($request, [
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $image = $request->file('image');
            $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('upload');
            $image->move($destinationPath, $input['imagename']);

            $slider->image = $input['imagename'];

            /*Delete photo*/
            $file_path = public_path("upload/".$oldPic);
            if(File::exists($file_path)) {
                File::delete($file_path);
            }
        }elseif($request->delete_picture)
        {
            $slider->image = '';
            /*Delete photo*/
            $file_path = public_path("upload/".$oldPic);
            if(File::exists($file_path)) {
                File::delete($file_path);
            }
        }
        
        $result = $slider->save();

        if($result){
            $request->session()->flash('success', 'Sửa thành công');
            return redirect()->route('backend.slider.index');
        }else{
            $request->session()->flash('danger', 'Có lỗi khi sửa');
            return redirect()->route('backend.slider.index');
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
        $slider = Slider::find($id);
        if($slider == null){
            $request->session()->flash('danger', 'Không tồn tại');
            return redirect()->route('backend.slider.index');
        }

        if(Auth::user()->role == 1){
            $request->session()->flash('success', 'Đã xóa thành công');
            return redirect()->route('backend.slider.index');
        }

        $oldPic = $slider->image;

        /*Delete photo*/
        $file_path = public_path("upload/".$oldPic);
        if(File::exists($file_path)) {
            File::delete($file_path);
        }

        $result = $slider->delete();

        if($result){
            $request->session()->flash('success', 'Xóa thành công');
            return redirect()->route('backend.slider.index');
        }else{
            $request->session()->flash('danger', 'Có lỗi khi xóa');
            return redirect()->route('backend.slider.index');
        }
    }
}
