<!doctype html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Giỏ hàng</title>
      @include('user.layout.link_chung')
   </head>
   <body>
      <!-- loader Start -->
      <div id="loading">
         <div id="loading-center">
         </div>
      </div>
      <!-- loader END -->
      <!-- Wrapper Start -->
      <div class="wrapper">
         @include('user.layout.header', ['trang' => 'Địa chỉ giao hàng'])
         <!-- Page Content  -->
         <div id="content-page" class="content-page">
            <div class="container-fluid checkout-content">
               <div class="row">
                  <div id="address" class="card-block p-0 col-12">
                     <div class="row align-item-center">
                        <div class="col-lg-8">
                           <div class="iq-card">
                              <div class="iq-card-header d-flex justify-content-between">
                                 <div class="iq-header-title">
                                    <h4 class="card-title">Thêm địa chỉ mới</h4>
                                 </div>
                              </div>
                              <div class="iq-card-body">
                                 <form onsubmit="required()">
                                    <div class="row mt-3">
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label>Họ và tên: *</label> 
                                             <input type="text" class="form-control" name="fname" required="">
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group"> 
                                             <label>Số điện thoại: *</label> 
                                             <input type="text" class="form-control" name="mno" required="">
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group"> 
                                             <label>Địa chỉ: *</label> 
                                             <input type="text" class="form-control" name="houseno" required="">
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group"> 
                                             <label>Tỉnh/thành phố: *</label> 
                                             <input type="text" class="form-control" name="city" required="">
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group"> 
                                             <label>Phường: *</label> 
                                             <input type="text" class="form-control" name="state" required="">
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label for="addtype">Loại địa chỉ</label>
                                             <select class="form-control" id="addtype">
                                                <option>Nhà riêng</option>
                                                <option>Công ty</option>
                                             </select>
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <button id="savenddeliver" type="submit" class="btn btn-primary">Lưu và giao tại đây</button>
                                       </div>
                                    </div>
                                 </form>
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-4">
                           <div class="iq-card">
                              <div class="iq-card-body">
                                 <h4 class="mb-2">Nguyễn Văn A</h4>
                                 <div class="shipping-address">
                                    <p class="mb-0">11 Thành Thái</p>
                                    <p>Thành phố Đà Nẵng</p>
                                    <p>0789-999-999</p>
                                 </div>
                                 <hr>
                                 <a id="deliver-address" href="javascript:void();" class="btn btn-primary d-block mt-1 next">Tiếp tục</a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Wrapper END -->
      <!-- Footer -->
      <footer class="iq-footer">
         <div class="container-fluid">
            <div class="row">
               <div class="col-lg-6">
                  <ul class="list-inline mb-0">
                     <li class="list-inline-item"><a href="privacy-policy.html">Chính sách bảo mật</a></li>
                     <li class="list-inline-item"><a href="terms-of-service.html">Điều khoản sử dụng</a></li>
                  </ul>
               </div>
               <div class="col-lg-6 text-right">
                  Copyright 2020 <a href="#">TVteam</a> Đã đăng kí
               </div>
            </div>
         </div>
      </footer>
      <!-- Footer END -->
      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="{{ asset('js/jquery.min.js') }}"></script>
      <script src="{{ asset('js/popper.min.js') }}"></script>
      <script src="{{ asset('js/bootstrap.min.js') }}"></script>
      <script src="{{ asset('js/jquery.appear.js') }}"></script>
      <script src="{{ asset('js/countdown.min.js') }}"></script>
      <script src="{{ asset('js/waypoints.min.js') }}"></script>
      <script src="{{ asset('js/jquery.counterup.min.js') }}"></script>
      <script src="{{ asset('js/wow.min.js') }}"></script>
      <script src="{{ asset('js/apexcharts.js') }}"></script>
      <script src="{{ asset('js/slick.min.js') }}"></script>
      <script src="{{ asset('js/select2.min.js') }}"></script>
      <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
      <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
      <script src="{{ asset('js/smooth-scrollbar.js') }}"></script>
      <script src="{{ asset('js/lottie.js') }}"></script>
      <script src="{{ asset('js/core.js') }}"></script>
      <script src="{{ asset('js/charts.js') }}"></script>
      <script src="{{ asset('js/animated.js') }}"></script>
      <script src="{{ asset('js/kelly.js') }}"></script>
      <script src="{{ asset('js/maps.js') }}"></script>
      <script src="{{ asset('js/worldLow.js') }}"></script>
      <script src="{{ asset('js/raphael-min.js') }}"></script>
      <script src="{{ asset('js/morris.js') }}"></script>
      <script src="{{ asset('js/morris.min.js') }}"></script>
      <script src="{{ asset('js/flatpickr.js') }}"></script>
      <script src="{{ asset('js/style-customizer.js') }}"></script>
      <script src="{{ asset('js/chart-custom.js') }}"></script>
      <script src="{{ asset('js/custom.js') }}"></script>
   </body>
</html>