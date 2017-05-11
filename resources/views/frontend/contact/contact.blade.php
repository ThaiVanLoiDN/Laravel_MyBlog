@extends('frontend.layouts.app')
@section('content')
  <!-- start Contact section -->
  <section id="contact" style="padding-top: 50px;">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
         <div class="contact_area">
           <div class="client_title">
              <hr>
              <h2>Gửi liên hệ của bạn đến tôi tại đây nhé!</h2>
            </div>

            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="contact_left wow fadeInLeft">
                @if (count($errors) > 0)
                    <ul class="alert alert-danger" style="list-style-type: none">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
                @if (Session::has('success'))
                    <div class="alert alert-success"><p><strong>{{ Session::get('success') }}</strong></p></div>
                @endif
                @if (Session::has('danger'))
                    <div class="alert alert-danger"><p><strong>{{ Session::get('danger') }}</strong></p></div>
                @endif
                  <form class="submitphoto_form" action="{{ route('frontend.contact.contact') }}" method="post">
                  {{ csrf_field() }}
                    <input type="text" name="fullname" class="form-control wpcf7-text" placeholder="Tên của bạn">
                    <input type="email" name="email" class="form-control wpcf7-email" placeholder="Email của bạn">          
                    <input type="text" name="phone" class="form-control wpcf7-text" placeholder="Số điện thoại">
                    <textarea name="message" class="form-control wpcf7-textarea" cols="30" rows="10" placeholder="Lời bạn muốn nói"></textarea>
                    <input type="submit" value="Submit" class="wpcf7-submit photo-submit">                     
                  </form>
                </div>                  
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="contact_right wow fadeInRight">
                  <img src="{{ url('img/phone_icon.png') }}" alt="img">
                  <p>Chào bạn, rất vui khi bạn ghé thăm website của tôi. Tôi là Thái Văn Lợi, sinh năm 1995 tại TP. Đà Nẵng</p>
                  <address>
                    <p><a> thaivanloidn@gmail.com</a></p>
                    <p>Số điện thoại: 0169.8995.895</p>
                  </address>
                </div>
              </div>
            </div>              
         </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Contact section -->
  @stop