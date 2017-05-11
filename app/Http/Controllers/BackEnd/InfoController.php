<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Info;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\InfoRequest;

class InfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listInfo = Info::all();
        return view('backend.info.index', ['listInfo' => $listInfo]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function show(Request $request, $id)
    {

        $info = Info::find($id);
        if($info == null){
            $request->session()->flash('danger', 'Không tồn tại');
            return redirect()->route('backend.info.index');
        }

        return view('backend.info.show', ['info' => $info]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $info = Info::find($id);
        if($info == null){
            $request->session()->flash('danger', 'Không tồn tại');
            return redirect()->route('backend.info.index');
        }

        return view('backend.info.edit', ['info' => $info]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(InfoRequest $request, $id)
    {
        $info = Info::find($id);
        if($info == null){
            $request->session()->flash('danger', 'Không tồn tại');
            return redirect()->route('backend.info.index');
        }

        if(Auth::user()->role == 1){
            $request->session()->flash('success', 'Đã sửa thành công');
            return redirect()->route('backend.info.index');
        }

        $info->name = trim($request->name);
        $info->value = trim($request->value);
        
        $result = $info->save();

        if($result){
            $request->session()->flash('success', 'Sửa thành công');
            return redirect()->route('backend.info.index');
        }else{
            $request->session()->flash('danger', 'Có lỗi khi sửa');
            return redirect()->route('backend.info.index');
        }
    }
}
