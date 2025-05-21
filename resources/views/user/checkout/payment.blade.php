<!doctype html>
<html lang="en">
   <head>
      <title>Lựa chọn thanh toán</title>
      @include('user.layout.link_chung')
   </head>
   <body>
      <div class="iq-card">
         <div class="iq-card-header d-flex justify-content-between">
            <div class="iq-header-title">
               <h4 class="card-title">Lựa chọn thanh toán</h4>
            </div>
         </div>
         <div class="iq-card-body">
            <div class="card-lists">
               <div class="form-group">
                  <div class="custom-control custom-radio">
                     <input type="radio" id="credit" name="customRadio" class="custom-control-input">
                     <label class="custom-control-label" for="credit"> Thẻ Tín dụng / Ghi nợ / ATM</label>
                  </div>
                  <div class="custom-control custom-radio">
                     <input type="radio" id="netbaking" name="customRadio" class="custom-control-input">
                     <label class="custom-control-label" for="netbaking"> Momo/ZaloPay</label>
                  </div>
                  <div class="custom-control custom-radio">
                     <input type="radio" id="emi" name="emi" class="custom-control-input">
                     <label class="custom-control-label" for="emi"> Trả góp</label>
                  </div>
                  <div class="custom-control custom-radio">
                     <input type="radio" id="cod" name="cod" class="custom-control-input">
                     <label class="custom-control-label" for="cod"> Thanh toán khi giao hàng</label>
                  </div>
               </div>
            </div>
            <hr>
            <a id="deliver-address" href="javascript:void();" class="btn btn-primary d-block mt-1 next">Thanh toán</a>
         </div>
      </div>
   </body>
</html>