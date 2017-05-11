<!-- start footer -->
  <footer id="footer">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
          <div class="footer_top">
            <div class="row">
              <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="single_footer_top">
                  <h2>Welcome</h2>
                  <div>
                    <p>Chào bạn,</p>
                    <p>Rất vui khi bạn ghé thăm website của tôi. Tôi là Thái Văn Lợi, sinh năm 1995 tại TP. Đà Nẵng</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="single_footer_top">
                  <h2>Chuyên mục </h2>
                  @widget('category_footer')
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="single_footer_top">
                  <h2>Social Links </h2>
                  @widget('social_net_work')
                </div>
              </div>
            </div>
          </div>
        </div>      
        <div class="col-lg-12 col-md-12 col-sm-12" style="">
          <div class="footer_bottom">
            <div class="copyright">
              <p>Thực hiện: Thái Văn Lợi</p>
            </div>
            <div class="developer">
              <p>thaivanloidn@gmail.com</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- End footer -->

  <!-- jQuery Library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

  <!-- For content animatin  -->
  <script src="{{ url('js/wow.min.js') }}"></script>
  <!-- bootstrap js file -->
  <script src="{{ url('js/bootstrap.min.js') }}"></script> 

  <!-- superslides slider -->
  <script src="{{ url('js/jquery.easing.1.3.js') }}"></script>
  <script src="{{ url('js/jquery.animate-enhanced.min.js') }}"></script>
  <script src="{{ url('js/jquery.superslides.min.js') }}" type="text/javascript" charset="utf-8"></script>
  <!-- slick slider js file -->
  <script src="{{ url('js/slick.min.js') }}"></script>
  


  <!-- custom js file include -->
  <script src="{{ url('js/custom.js') }}"></script>   
      
  </body>
</html>