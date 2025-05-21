<!doctype html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Thêm địa chỉ mới</title>
      @include('user.layout.link_chung')
   </head>
   <body>
      <div class="wrapper">
         <div class="container-fluid checkout-content">
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
      <!-- Optional JavaScript -->
      <script src="js/jquery.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
   </body>
</html>