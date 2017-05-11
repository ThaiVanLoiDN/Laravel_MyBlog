<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function contact()
    {
    	return view('frontend.contact.contact', ['title' => 'Liên hệ']);
    }

    public function postContact(ContactRequest $request)
    {

        $contact = new Contact;

        $contact->fullname = trim($request->fullname);
        $contact->email = trim($request->email);
        $contact->phone = trim($request->phone);
        $contact->message = trim($request->message);
        
        $result = $contact->save();

        if($result){
            $request->session()->flash('success', 'Cảm ơn bạn đã gửi liên hệ đến tôi! Tôi sẽ liên lạc với bạn trong thời gian sớm nhất có thể');
            return redirect()->route('frontend.contact.contact');
        }else{
            $request->session()->flash('danger', 'Xin lỗi! Có lỗi trong quá trình gửi thông điệp của bạn');
            return redirect()->route('frontend.contact.contact');
        }
    }

    public function aboutme()
    {
    	return view('frontend.contact.aboutme');
    }
}
