<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;


class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listContact = Contact::orderBy('id', 'desc')->paginate(10);
        return view('backend.contact.index', ['listContact' => $listContact]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {

        $contact = Contact::find($id);
        if($contact == null){
            $request->session()->flash('danger', 'Không tồn tại');
            return redirect()->route('backend.contact.index');
        }

        return view('backend.contact.show', ['contact' => $contact]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function destroy(Request $request, $id)
    {
        $contact = Contact::find($id);
        if($contact == null){
            $request->session()->flash('danger', 'Không tồn tại');
            return redirect()->route('backend.contact.index');
        }

        if(Auth::user()->role == 1){
            $request->session()->flash('success', 'Đã xóa thành công');
            return redirect()->route('backend.contact.index');
        }

        $result = $contact->delete();

        if($result){
            $request->session()->flash('success', 'Xóa thành công');
            return redirect()->route('backend.contact.index');
        }else{
            $request->session()->flash('danger', 'Có lỗi khi xóa');
            return redirect()->route('backend.contact.index');
        }
    }
}
