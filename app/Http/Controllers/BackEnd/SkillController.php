<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SkillRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Skill;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listSkill = Skill::all();
        return view('backend.skill.index', ['listSkill' => $listSkill]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.skill.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SkillRequest $request)
    {
        if(Auth::user()->role == 1){
            $request->session()->flash('success', 'Đã thêm thành công');
            return redirect()->route('backend.skill.index');
        }

        $skill = new Skill;

        $skill->name = trim($request->name);
        $skill->percent = trim($request->percent);

        $result = $skill->save();

        if($result){
            $request->session()->flash('success', 'Thêm thành công');
            return redirect()->route('backend.skill.index');
        }else{
            $request->session()->flash('danger', 'Có lỗi khi thêm');
            return redirect()->route('backend.skill.index');
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

        $skill = Skill::find($id);
        if($skill == null){
            $request->session()->flash('danger', 'Không tồn tại');
            return redirect()->route('backend.skill.index');
        }

        return view('backend.skill.show', ['skill' => $skill]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $skill = Skill::find($id);
        if($skill == null){
            $request->session()->flash('danger', 'Không tồn tại');
            return redirect()->route('backend.skill.index');
        }

        return view('backend.skill.edit', ['skill' => $skill]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SkillRequest $request, $id)
    {
        $skill = Skill::find($id);
        if($skill == null){
            $request->session()->flash('danger', 'Không tồn tại');
            return redirect()->route('backend.skill.index');
        }

        if(Auth::user()->role == 1){
            $request->session()->flash('success', 'Đã sửa thành công');
            return redirect()->route('backend.skill.index');
        }

        $skill->name = trim($request->name);
        $skill->percent = trim($request->percent);
        
        $result = $skill->save();

        if($result){
            $request->session()->flash('success', 'Sửa thành công');
            return redirect()->route('backend.skill.index');
        }else{
            $request->session()->flash('danger', 'Có lỗi khi sửa');
            return redirect()->route('backend.skill.index');
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
        $skill = Skill::find($id);
        if($skill == null){
            $request->session()->flash('danger', 'Không tồn tại');
            return redirect()->route('backend.skill.index');
        }

        if(Auth::user()->role == 1){
            $request->session()->flash('success', 'Đã xóa thành công');
            return redirect()->route('backend.skill.index');
        }

        $result = $skill->delete();

        if($result){
            $request->session()->flash('success', 'Xóa thành công');
            return redirect()->route('backend.skill.index');
        }else{
            $request->session()->flash('danger', 'Có lỗi khi xóa');
            return redirect()->route('backend.skill.index');
        }
    }
}
