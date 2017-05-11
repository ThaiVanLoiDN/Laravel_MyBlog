@include('frontend.layouts.header')
  
 
  <!-- End banner area -->
  <!-- start image editing  -->
  <section id="blogArchive" style="padding-top: 105px;">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
         @yield('content')
        </div>
      </div>
    </div>
  </section>
  <!-- End image editing  -->
      
  @include('frontend.layouts.footer')  