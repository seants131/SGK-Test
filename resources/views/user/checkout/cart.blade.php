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
      <div id="cart" class="card-block show p-0 col-12">
         <div class="row align-items-center">
            <div class="col-lg-8">
               <div class="iq-card">
                  <div class="iq-card-header d-flex justify-content-between iq-border-bottom mb-0">
                     <div class="iq-header-title">
                        <h4 class="card-title">Giỏ hàng</h4>
                     </div>
                  </div>
                  <div class="iq-card-body">
                     <ul class="list-inline p-0 m-0">
                        <li class="checkout-product">
                           <div class="row align-items-center">
                              <div class="col-sm-2">
                                 <span class="checkout-product-img">
                                 <a href="javascript:void();"><img class="img-fluid rounded" src="images/book-dec/tienganh.png" alt=""></a>
                                 </span>
                              </div>
                              <div class="col-sm-4">
                                 <div class="checkout-product-details">
                                    <h5>Tiếng Anh 7 - Global Success - Sách Bài học (2023)</h5>
                                    <p class="text-success">Còn hàng</p>
                                    <div class="price">
                                       <h5>99.900 ₫</h5>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-sm-6">
                                 <div class="row">
                                    <div class="col-sm-10">
                                       <div class="row align-items-center mt-2">
                                          <div class="col-sm-7 col-md-6">
                                             <button type="button" class="fa fa-minus qty-btn" id="btn-minus"></button>
                                             <input type="text" id="quantity" value="0">
                                             <button type="button" class="fa fa-plus qty-btn" id="btn-plus"></button>
                                          </div>
                                          <div class="col-sm-5 col-md-6">
                                             <span class="product-price">99.900 ₫</span>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-sm-2">
                                       <a href="javascript:void();" class="text-dark font-size-20"><i class="ri-delete-bin-7-fill"></i></a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </body>
</html>