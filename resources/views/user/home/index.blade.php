 <!doctype html>
 <html lang="en">

 <head>
     <!-- Required meta tags -->
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <title>Trang chủ</title>
     @include('user.layout.link_chung')
 </head>

 <body>
     <!-- Wrapper Start -->
     <div class="wrapper">
         {{-- header của trang --}}
         @include('user.layout.header', ['trang' => 'Trang chủ'])
         {{-- end header --}}
         <!-- Page Content  -->
         <div id="content-page" class="content-page">
             <div class="container-fluid">
                 <div class="row">
                     <div class="col-lg-12">
                         <div class="iq-card-transparent iq-card-block iq-card-stretch iq-card-height rounded">
                             <div class="newrealease-contens">
                                 <ul id="newrealease-slider" class="list-inline p-0 m-0 d-flex align-items-center">
                                     @if (isset($newReleaseSlides) && $newReleaseSlides->count() > 0)
                                         @foreach ($newReleaseSlides as $slideBook)
                                             <li class="item">
                                                 {{-- 1. Slider sách mới --}}
                                                 <a href="{{ route('user.books.detail', $slideBook->slug) }}">
                                                     <img src="{{ $slideBook->HinhAnh ? asset('uploads/books/' . $slideBook->HinhAnh) : asset('images/default-book-placeholder.jpg') }}"
                                                         class="img-fluid w-100 rounded"
                                                         alt="{{ $slideBook->TenSach }}">
                                                 </a>
                                             </li>
                                         @endforeach
                                     @else
                                         {{-- Fallback static images if $newReleaseSlides is empty or not set --}}
                                         <li class="item"><a href="javascript:void(0);"><img
                                                     src="{{ asset('images/new_realeases/img01.jpg') }}"
                                                     class="img-fluid w-100 rounded" alt=""></a></li>
                                         <li class="item"><a href="javascript:void(0);"><img
                                                     src="{{ asset('images/new_realeases/07.jpg') }}"
                                                     class="img-fluid w-100 rounded" alt=""></a></li>
                                         <li class="item"><a href="javascript:void(0);"><img
                                                     src="{{ asset('images/new_realeases/img05.jpg') }}"
                                                     class="img-fluid w-100 rounded" alt=""></a></li>
                                     @endif
                                 </ul>
                             </div>
                         </div>
                     </div>
                     <div class="col-lg-12">
                         <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                             <div
                                 class="iq-card-header d-flex justify-content-between align-items-center position-relative">
                                 <div class="iq-header-title">
                                     <h4 class="card-title mb-0">Gợi ý cho bạn</h4>
                                 </div>
                                 <div class="iq-card-header-toolbar d-flex align-items-center">
                                     {{-- Dự định tạo 1 trang hiển thị danh sách sản phẩm (sau này)                           --}}
                                     <a href="#" class="btn btn-sm btn-primary view-more">Xem Thêm</a>
                                 </div>
                             </div>
                             <div class="iq-card-body">
                                 <div class="row">
                                     @if (isset($suggestedBooks) && $suggestedBooks->count() > 0)
                                         @foreach ($suggestedBooks as $book)
                                             <div class="col-sm-6 col-md-4 col-lg-3">
                                                 <div
                                                     class="iq-card iq-card-block iq-card-stretch iq-card-height browse-bookcontent">
                                                     <div class="iq-card-body p-0">
                                                         <div class="d-flex align-items-center">
                                                             <div
                                                                 class="col-6 p-0 position-relative image-overlap-shadow">
                                                                 <a
                                                                     href="{{ route('user.books.detail', $book->slug) }}">
                                                                     <img class="img-fluid rounded w-100"
                                                                         src="{{ $book->HinhAnh ? asset('uploads/books/' . $book->HinhAnh) : asset('images/default-book-placeholder.jpg') }}"
                                                                         alt="{{ $book->TenSach }}">
                                                                 </a>
                                                                 <div class="view-book">
                                                                     <a href="{{ route('user.books.detail', $book->slug) }}"
                                                                         class="btn btn-sm btn-white">Xem</a>
                                                                 </div>
                                                             </div>
                                                             <div class="col-6">
                                                                 <div class="mb-2">
                                                                     <h6 class="mb-1" title="{{ $book->TenSach }}">
                                                                         {{ Str::limit($book->TenSach, 30) }}</h6>
                                                                     <p class="font-size-13 line-height mb-1">
                                                                         {{ $book->TacGia ?: 'N/A' }}</p>
                                                                 </div>
                                                                 <div class="price d-flex align-items-center">
                                                                     <h6><b>{{ number_format($book->GiaBia, 0, ',', '.') }}
                                                                             đ</b></h6>
                                                                 </div>
                                                                 <div class="iq-product-action">
                                                                     <a href="javascript:void();"
                                                                         title="Thêm vào giỏ hàng"><i
                                                                             class="ri-shopping-cart-2-fill text-primary"></i></a>
                                                                     <a href="javascript:void();" class="ml-2"
                                                                         title="Thêm vào yêu thích"><i
                                                                             class="ri-heart-fill text-danger"></i></a>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
                                         @endforeach
                                     @else
                                         <p class="col-12">Không có sách gợi ý nào để hiển thị.</p>
                                     @endif
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="col-lg-6">
                         <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                             <div class="iq-card-header d-flex justify-content-between mb-0">
                                 <div class="iq-header-title">
                                     <h4 class="card-title">Best Seller</h4>
                                 </div>
                                 <div class="iq-card-header-toolbar d-flex align-items-center">
                                     <div class="dropdown">
                                         <span class="dropdown-toggle p-0 text-body" id="dropdownMenuButton2"
                                             data-toggle="dropdown">
                                             Trong ngày<i class="ri-arrow-down-s-fill"></i>
                                         </span>
                                         <div class="dropdown-menu dropdown-menu-right shadow-none"
                                             aria-labelledby="dropdownMenuButton2">
                                             <a class="dropdown-item" href="#">Ngày</a>
                                             <a class="dropdown-item" href="#">Tuần</a>
                                             <a class="dropdown-item" href="#">Tháng</a>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                             @if (isset($bestSellerBook))
                                 <div class="iq-card-body">
                                     <div class="row align-items-center">
                                         <div class="col-sm-5 pr-0">
                                             {{-- 2. Best Seller --}}
                                             <a href="{{ route('user.books.detail', $bestSellerBook->slug) }}">
                                                 <img class="img-fluid rounded w-100"
                                                     src="{{ $bestSellerBook->HinhAnh ? asset('uploads/books/' . $bestSellerBook->HinhAnh) : asset('images/default-book-placeholder.jpg') }}"
                                                     alt="{{ $bestSellerBook->TenSach }}">
                                             </a>
                                         </div>
                                         <div class="col-sm-7 mt-3 mt-sm-0">
                                             <h4 class="mb-2">{{ $bestSellerBook->TenSach }}</h4>
                                             <p class="mb-2">Tác Giả : {{ $bestSellerBook->TacGia ?: 'N/A' }}</p>
                                             <div class="mb-2 d-block">
                                                 <span class="font-size-12 text-warning">
                                                     <i class="fa fa-star"></i>
                                                     <i class="fa fa-star"></i>
                                                     <i class="fa fa-star"></i>
                                                     <i class="fa fa-star"></i>
                                                     <i class="fa fa-star-half-alt"></i> {{-- Example for 4.5 stars, adjust as needed --}}
                                                 </span>
                                             </div>
                                             <span
                                                 class="text-dark mb-3 d-block">{{ Str::limit($bestSellerBook->MoTa, 100) ?: 'Không có mô tả.' }}</span>
                                             <a href="{{ route('user.books.detail', $bestSellerBook->slug) }}"
                                                 class="btn btn-primary learn-more">Xem thêm</a> {{-- Consider: route('user.books.detail', $bestSellerBook->slug) --}}
                                         </div>
                                     </div>
                                 </div>
                             @else
                                 <div class="iq-card-body">
                                     <p>Không có sách bán chạy nào để hiển thị.</p>
                                 </div>
                             @endif
                         </div>
                     </div>
                     <div class="col-lg-6">
                         <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                             <div class="iq-card-header d-flex justify-content-between mb-0">
                                 <div class="iq-header-title">
                                     <h4 class="card-title">Nhà Sách TV</h4>
                                 </div>
                                 <div class="iq-card-header-toolbar d-flex align-items-center">
                                     <div class="dropdown">
                                         <span class="dropdown-toggle p-0 text-body" id="dropdownMenuButton3"
                                             data-toggle="dropdown">
                                             Ngày<i class="ri-arrow-down-s-fill"></i>
                                         </span>
                                         <div class="dropdown-menu dropdown-menu-right shadow-none"
                                             aria-labelledby="dropdownMenuButton3">
                                             <a class="dropdown-item" href="#">Tuần</a>
                                             <a class="dropdown-item" href="#">Theo Tháng</a>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                             <div class="iq-card-body">
                                 <ul class="list-inline row mb-0 align-items-center iq-scrollable-block">
                                     @if (isset($categoriesWithBookCounts) && $categoriesWithBookCounts->count() > 0)
                                         @foreach ($categoriesWithBookCounts as $category)
                                             <li class="col-sm-6 d-flex mb-3 align-items-center">
                                                 <div class="icon iq-icon-box mr-3">
                                                     {{-- Categories currently don't have images in the model. Using a default. --}}
                                                     <a href="{{ route('user.categories.detail', $category->id) }}"><img
                                                             class="img-fluid avatar-60 rounded-circle"
                                                             src="{{ asset('images/user/category_default.png') }}"
                                                             alt="{{ $category->name }}"></a>
                                                 </div>
                                                 <div class="mt-1">
                                                     <h6>{{ $category->name }}</h6>
                                                     <p class="mb-0 text-primary">Số sách: <span
                                                             class="text-body">{{ $category->books_count }}</span></p>
                                                 </div>
                                             </li>
                                         @endforeach
                                     @else
                                         <p class="col-12">Không có danh mục nào để hiển thị.</p>
                                     @endif
                                 </ul>
                             </div>
                         </div>
                     </div>
                     <div class="col-lg-12">
                         <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                             <div
                                 class="iq-card-header d-flex justify-content-between align-items-center position-relative">
                                 <div class="iq-header-title">
                                     <h4 class="card-title mb-0">Sách yêu thích</h4>
                                 </div>
                                 <div class="iq-card-header-toolbar d-flex align-items-center">
                                     {{-- Dự định tạo 1 trang hiển thị danh sách sản phẩm (sau này) --}}
                                     <a href="#" class="btn btn-sm btn-primary view-more">Xem thêm</a>
                                 </div>
                             </div>
                             <div class="iq-card-body favorites-contens">
                                 <ul id="favorites-slider" class="list-inline p-0 mb-0 row">
                                     @if (isset($favoriteBooks) && $favoriteBooks->count() > 0)
                                         @foreach ($favoriteBooks as $favBook)
                                             <li class="col-md-4">
                                                 <div class="d-flex align-items-center">
                                                     <div class="col-5 p-0 position-relative">
                                                         {{-- 3. Sách yêu thích --}}
                                                         <a href="{{ route('user.books.detail', $favBook->slug) }}">
                                                             <img src="{{ $favBook->HinhAnh ? asset('uploads/books/' . $favBook->HinhAnh) : asset('images/default-book-placeholder.jpg') }}"
                                                                 class="img-fluid rounded w-100"
                                                                 alt="{{ $favBook->TenSach }}">
                                                         </a>
                                                     </div>
                                                     <div class="col-7">
                                                         <h5 class="mb-2"
                                                             style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"
                                                             title="{{ $favBook->TenSach }}">
                                                             {{ Str::limit($favBook->TenSach, 25) }}</h5>
                                                         <p class="mb-2">Tác giả : {{ $favBook->TacGia ?: 'N/A' }}
                                                         </p>
                                                         <div
                                                             class="d-flex justify-content-between align-items-center text-dark font-size-13">
                                                             <span>Đã bán</span>
                                                             <span class="mr-4">{{ $favBook->LuotMua ?: 0 }}</span>
                                                         </div>
                                                         <div class="iq-progress-bar-linear d-inline-block w-100">
                                                             @php
                                                                 $percentage =
                                                                     ($favBook->LuotMua ?: 0) > 0
                                                                         ? min(
                                                                             100,
                                                                             (($favBook->LuotMua ?: 0) / 1000) * 100,
                                                                         )
                                                                         : 5; // Example: max 1000 sales for 100%
                                                                 $bgColor = 'bg-primary';
                                                                 if ($percentage > 75) {
                                                                     $bgColor = 'bg-success';
                                                                 } elseif ($percentage > 50) {
                                                                     $bgColor = 'bg-info';
                                                                 } elseif ($percentage > 25) {
                                                                     $bgColor = 'bg-warning';
                                                                 }
                                                             @endphp
                                                             <div class="iq-progress-bar {{ $bgColor }}">
                                                                 <span class="{{ $bgColor }}"
                                                                     data-percent="{{ round($percentage) }}"></span>
                                                             </div>
                                                         </div>
                                                         <a href="{{ route('user.book.pdf') }}" class="text-dark">Đọc
                                                             ngay<i class="ri-arrow-right-s-line"></i></a>
                                                         {{-- Consider linking to specific PDF if available: route('user.book.pdf', $favBook->slug) --}}
                                                     </div>
                                                 </div>
                                             </li>
                                         @endforeach
                                     @else
                                         <p class="col-12">Không có sách yêu thích nào để hiển thị.</p>
                                     @endif
                                 </ul>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <!-- Wrapper END -->
     <!-- Footer -->
     @include('user.layout.footer')
     <!-- Footer END -->
     <!-- Optional JavaScript -->
     <!-- jQuery first, then Popper.js, then Bootstrap JS -->
     <script src="{{ asset('js/jquery.min.js') }}"></script>
     <script src="{{ asset('js/popper.min.js') }}"></script>
     <script src="{{ asset('js/bootstrap.min.js') }}"></script>
     <!-- Appear JavaScript -->
     <script src="{{ asset('js/jquery.appear.js') }}"></script>
     <!-- Countdown JavaScript -->
     <script src="{{ asset('js/countdown.min.js') }}"></script>
     <!-- Counterup JavaScript -->
     <script src="{{ asset('js/waypoints.min.js') }}"></script>
     <script src="{{ asset('js/jquery.counterup.min.js') }}"></script>
     <!-- Wow JavaScript -->
     <script src="{{ asset('js/wow.min.js') }}"></script>
     <!-- Apexcharts JavaScript -->
     <script src="{{ asset('js/apexcharts.js') }}"></script>
     <!-- Slick JavaScript -->
     <script src="{{ asset('js/slick.min.js') }}"></script>
     <!-- Select2 JavaScript -->
     <script src="{{ asset('js/select2.min.js') }}"></script>
     <!-- Owl Carousel JavaScript -->
     <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
     <!-- Magnific Popup JavaScript -->
     <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
     <!-- Smooth Scrollbar JavaScript -->
     <script src="{{ asset('js/smooth-scrollbar.js') }}"></script>
     <!-- lottie JavaScript -->
     <script src="{{ asset('js/lottie.js') }}"></script>
     <!-- am core JavaScript -->
     <script src="{{ asset('js/core.js') }}"></script>
     <!-- am charts JavaScript -->
     <script src="{{ asset('js/charts.js') }}"></script>
     <!-- am animated JavaScript -->
     <script src="{{ asset('js/animated.js') }}"></script>
     <!-- am kelly JavaScript -->
     <script src="{{ asset('js/kelly.js') }}"></script>
     <!-- am maps JavaScript -->
     <script src="{{ asset('js/maps.js') }}"></script>
     <!-- am worldLow JavaScript -->
     <script src="{{ asset('js/worldLow.js') }}"></script>
     <!-- Raphael-min JavaScript -->
     <script src="{{ asset('js/raphael-min.js') }}"></script>
     <!-- Morris JavaScript -->
     <script src="{{ asset('js/morris.js') }}"></script>
     <!-- Morris min JavaScript -->
     <script src="{{ asset('js/morris.min.js') }}"></script>
     <!-- Flatpicker Js -->
     <script src="{{ asset('js/flatpickr.js') }}"></script>
     <!-- Style Customizer -->
     <script src="{{ asset('js/style-customizer.js') }}"></script>
     <!-- Chart Custom JavaScript -->
     <script src="{{ asset('js/chart-custom.js') }}"></script>
     <!-- Custom JavaScript -->
     <script src="{{ asset('js/custom.js') }}"></script>

 </body>

 </html>
