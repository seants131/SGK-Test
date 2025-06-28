<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>WebBanSach - Đăng nhập</title>
      <link rel="shortcut icon" href="images/favicon.ico" />
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <link rel="stylesheet" href="css/typography.css">
      <link rel="stylesheet" href="css/style.css">
      <link rel="stylesheet" href="css/responsive.css">

      <style>
         .sign-in-from {
            color: black !important;
         }

         .sign-in-from label,
         .sign-in-from p,
         .sign-in-from h3,
         .sign-in-from span,
         .sign-in-from a {
            color: black !important;
         }

         .sign-in-from input,
         .sign-in-from input::placeholder,
         .sign-in-from button {
            color: black !important;
         }

         .sign-in-from input {
            background-color: white !important;
            border: 1px solid #ced4da;
         }

         .sign-in-from button {
            background-color: #f8f9fa;
            border: 1px solid #ced4da;
         }

         .sign-in-from button:hover {
            background-color: #e2e6ea;
         }
      </style>
   </head>
   <body>
      <!-- loader Start -->
      <div id="loading">
         <div id="loading-center"></div>
      </div>
      <!-- loader END -->

      <!-- Sign in Start -->
      <section class="sign-in-page">
         <div class="container p-0">
            <div class="row no-gutters height-self-center">
               <div class="col-sm-12 align-self-center page-content rounded">
                  <div class="row m-0">
                     <div class="col-sm-12 sign-in-page-data">
                        <div class="sign-in-from bg-primary rounded">
                           <h3 class="mb-0 text-center">Đăng nhập</h3>
                           <p class="text-center">Hãy nhập thông tin đăng nhập</p>
                           <form class="mt-4 form-text" method="POST" action="{{ route('user.sign-in') }}">
                              @csrf
                              <div class="form-group">
                                 <label for="username">Tên đăng nhập</label>
                                 <input type="text" class="form-control mb-0" id="username" name="username" placeholder="Tên đăng nhập" value="{{ old('username') }}">
                                 @error('username') <span class="text-danger">{{ $message }}</span> @enderror
                              </div>
                              <div class="form-group">
                                 <label for="password">Mật khẩu</label>
                                 <input type="password" class="form-control mb-0" id="password" name="password" placeholder="Password">
                                 @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                              </div>
                              <div class="sign-info text-center">
                                 <button type="submit" class="btn d-block w-100 mb-2">Đăng nhập</button>
                                 <span class="d-inline-block line-height-2">Không có tài khoản?
                                    <a href="{{ route('user.sign-up') }}">Đăng ký</a>
                                 </span>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- Sign in END -->

      <!-- Scripts -->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/jquery.appear.js"></script>
      <script src="js/countdown.min.js"></script>
      <script src="js/waypoints.min.js"></script>
      <script src="js/jquery.counterup.min.js"></script>
      <script src="js/wow.min.js"></script>
      <script src="js/apexcharts.js"></script>
      <script src="js/lottie.js"></script>
      <script src="js/slick.min.js"></script>
      <script src="js/select2.min.js"></script>
      <script src="js/owl.carousel.min.js"></script>
      <script src="js/jquery.magnific-popup.min.js"></script>
      <script src="js/smooth-scrollbar.js"></script>
      <script src="js/style-customizer.js"></script>
      <script src="js/chart-custom.js"></script>
      <script src="js/custom.js"></script>
   </body>
</html>
