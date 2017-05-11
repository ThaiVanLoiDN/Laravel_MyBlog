@include('frontend.layouts.header')
  
 
  <!-- End banner area -->
  <!-- start image editing  -->
  <section id="blogArchive" style="padding-top: 105px;">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-12">
         @yield('content')
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
           <div class="blog_sidebar">
           @widget('recent_post')
           @widget('popular_post')
           @widget('category')
         </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End image editing  -->
      
  @include('frontend.layouts.footer')  