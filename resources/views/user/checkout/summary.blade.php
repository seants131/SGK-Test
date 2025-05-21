<!doctype html>
<html lang="en">
   <head>
      <title>Tóm tắt đơn hàng</title>
      @include('user.layout.link_chung')
      @include('checkout.styles')
   </head>
   <body>
      <div class="wrapper">
         @include('user.layout.header', ['trang' => 'Tóm tắt đơn hàng'])
         <div id="content-page" class="content-page">
            <div class="container-fluid checkout-content">
               <div class="row">
                  <div id="summary" class="card-block show p-0 col-12">
                     <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title">Tóm tắt đơn hàng</h4>
                           </div>
                        </div>
                        <div class="iq-card-body">
                           <div class="d-flex justify-content-between">
                              <span>Tổng giá trị sản phẩm</span>
                              <span><strong>329.900đ</strong></span>
                           </div>
                           <div class="d-flex justify-content-between">
                              <span>Giảm giá</span>
                              <span class="text-success">19.000đ</span>
                           </div>
                           <div class="d-flex justify-content-between">
                              <span>Thuế VAT</span>
                              <span>9.900đ</span>
                           </div>
                           <div class="d-flex justify-content-between">
                              <span>Phí vận chuyển</span>
                              <span class="text-success">Miễn phí</span>
                           </div>
                           <hr>
                           <div class="d-flex justify-content-between">
                              <span class="text-dark"><strong>Tổng cộng</strong></span>
                              <span class="text-dark"><strong>108.900 đ</strong></span>
                           </div>
                           <a id="confirm-order" href="javascript:void();" class="btn btn-primary d-block mt-3">Xác nhận đơn hàng</a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      @include('checkout.scripts')
   </body>
</html>