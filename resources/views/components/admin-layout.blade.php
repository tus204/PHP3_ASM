<!DOCTYPE html>
<html lang="en">

<head>
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <title>{{ $title ?? 'admin' }}</title>

   <!-- Favicon -->
   <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" />

   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

   <!-- Typography CSS -->
   <link rel="stylesheet" href="{{ asset('css/typography.css') }}">

   <!-- Style CSS -->
   <link rel="stylesheet" href="{{ asset('css/style.css') }}">

   <!-- Responsive CSS -->
   <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">

   <!-- Slide Banner CSS -->
   <link rel="stylesheet" href="{{ asset('css/slick_image_banner.css') }}">

   <!-- Custom CSS -->
   <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
   <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
   <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
   <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>

</head>

<body>
   <!-- Session xuất hiện khi người dùng thường cố gắng truy cập vào trang Admin -->

   <!-- TOP Nav Bar -->
   <div class="iq-top-navbar">
      <div class="iq-navbar-custom">
         <nav class="navbar navbar-expand-lg navbar-light p-0">
            <div class="iq-menu-bt d-flex align-items-center">
               <div class="wrapper-menu">
                  <div class="main-circle"><i class="las la-bars"></i></div>
               </div>
               <div class="iq-navbar-logo d-flex justify-content-between">
                  <a href="index.html" class="header-logo">
                     <img src="{{ asset('images/logo.png') }}" class="img-fluid rounded-normal" alt="">
                     <div class="logo-title">
                        <span class="text-primary text-uppercase">img01</span>
                     </div>
                  </a>
               </div>
            </div>
            @auth
            @if (auth()->user()->role === 'admin')
            <!-- <div class="navbar-breadcrumb">
            <a href="{{ route('books.index') }}" class="search-toggle iq-waves-effect text-gray rounded">
                  <i class="ri-profile-line"></i> Quản lý sách
               </a>
            </div>
            <div class="navbar-breadcrumb">
            <a href="{{ route('categories.index') }}" class="search-toggle iq-waves-effect text-gray rounded">
                  <i class="ri-profile-line"></i> Quản lý danh mục
               </a>
            </div>
            <div class="navbar-breadcrumb">
            <a href="{{ route('users.index') }}" class="search-toggle iq-waves-effect text-gray rounded">
                  <i class="ri-profile-line"></i> Quản lý người dùng
               </a>
            </div>
            <div class="navbar-breadcrumb">
            <a href="{{ route('vouchers.index') }}" class="search-toggle iq-waves-effect text-gray rounded">
                  <i class="ri-profile-line"></i> Quản lý mã khuyến mãi
               </a>
            </div>
            <div class="navbar-breadcrumb">
            <a href="{{ route('admin.orders.index') }}" class="search-toggle iq-waves-effect text-gray rounded">
                  <i class="ri-profile-line"></i> Quản lý đơn thanh toán
               </a>
            </div>
            <div class="navbar-breadcrumb">
            <a href="{{ route('admin.noti.index') }}" class="search-toggle iq-waves-effect text-gray rounded">
                  <i class="ri-profile-line"></i> Gửi Thông Báo
               </a>
            </div> -->
            <div class="navbar-breadcrumb">
               <a href="{{ route('books.index') }}" class="search-toggle iq-waves-effect text-gray rounded">
                  <i class="ri-profile-line"></i> Quản lý sách
               </a>

               <a href="{{ route('categories.index') }}" class="search-toggle iq-waves-effect text-gray rounded">
                  <i class="ri-profile-line"></i> Quản lý danh mục
               </a>

               <a href="{{ route('users.index') }}" class="search-toggle iq-waves-effect text-gray rounded">
                  <i class="ri-profile-line"></i> Quản lý người dùng
               </a>


               <a href="{{ route('vouchers.index') }}" class="search-toggle iq-waves-effect text-gray rounded">
                  <i class="ri-profile-line"></i> Quản lý mã khuyến mãi
               </a>


               <a href="{{ route('admin.orders.index') }}" class="search-toggle iq-waves-effect text-gray rounded">
                  <i class="ri-profile-line"></i> Quản lý đơn thanh toán
               </a>


               <a href="{{ route('admin.noti.index') }}" class="search-toggle iq-waves-effect text-gray rounded">
                  <i class="ri-profile-line"></i> Gửi Thông Báo
               </a>
            </div>
            @else
            <!-- Không có gì ở đây -->
            @endif
            @endauth
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-label="Toggle navigation">
               <i class="ri-menu-3-line"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
               <ul class="navbar-nav ml-auto navbar-list">
                  <li class="nav-item nav-icon search-content">
                     <a href="#" class="search-toggle iq-waves-effect text-gray rounded">
                        <i class="ri-search-line"></i>
                     </a>
                     <form action="#" method="GET" class="search-box p-0">
                        @csrf
                        <input type="text" class="text search-input" placeholder="Type here to search..." name="keyWords">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                     </form>
                  </li>


                  <!-- Nếu là admin thì layout không hiện ra icon thông báo và giỏ hàng -->
                  @auth
                  @if (auth()->user()->role === 'admin')
                  <!-- Không có gì ở đây -->
                  @elseif(auth()->user()->role === 'user')
                  <li class="nav-item nav-icon">
                     <a href="#" class="search-toggle iq-waves-effect text-gray rounded">
                        <i class="ri-notification-2-line"></i>
                        <span class="bg-primary dots"></span>
                     </a>
                     <div class="iq-sub-dropdown">
                        <div class="iq-card shadow-none m-0">
                           <div class="iq-card-body p-0 toggle-cart-info">
                              <div class="bg-primary p-3">
                                 <h5 class="mb-0 text-white">Thông Báo</h5>
                              </div>
                              <div class="notifications-list">
                                 @foreach(auth()->user()->unreadNotifications as $notification)
                                 <a href="#" class="iq-sub-card">
                                    <div class="media align-items-center">
                                       <div class="">
                                          <img class="avatar-40 rounded" src="{{ asset('https://ttdt.benhvienphusanhanoi.vn/wp-content/uploads/2021/10/17_Jun_2021_070316_GMTTHONGBAO-ICON.png') }}" alt="">
                                       </div>
                                       <div class="media-body ml-3">
                                          <h6 class="mb-0">{{ $notification->data['title'] }}</h6>
                                          <small class="float-right font-size-12">{{ $notification->created_at->diffForHumans() }}</small>
                                          <p class="mb-0">{{ $notification->data['message'] }}</p>
                                       </div>
                                    </div>
                                 </a>
                                 @endforeach
                              </div>
                           </div>
                        </div>
                     </div>
                  </li>
                  <li class="nav-item nav-icon dropdown">
                     <a href="#" class="search-toggle iq-waves-effect text-gray rounded">
                        <i class="ri-mail-line"></i>
                        <span class="bg-primary dots"></span>
                     </a>
                     <div class="iq-sub-dropdown">
                        <div class="iq-card shadow-none m-0">
                           <div class="iq-card-body p-0">
                              <div class="bg-primary p-3">
                                 <h5 class="mb-0 text-white">Tin Nhắn<small class="badge badge-light float-right pt-1">0</small></h5>
                              </div>

                           </div>
                        </div>
                     </div>
                  </li>
                  <li class="nav-item nav-icon dropdown">
                     <a href="#" class="search-toggle iq-waves-effect text-gray rounded cart-icon">
                        <i class="ri-shopping-cart-2-line"></i>
                        <span class="badge badge-danger count-cart rounded-circle">0</span>
                     </a>
                     <div class="iq-sub-dropdown">
                        <div class="iq-card shadow-none m-0">
                           <div class="iq-card-body p-0 toggle-cart-info">
                              <div class="bg-primary p-3">
                                 <h5 class="mb-0 text-white">Giỏ Hàng<small class="badge badge-light float-right pt-1">0</small></h5>
                              </div>
                              <div class="cart-items">
                                 <!--Ajax list cart vao đây -->
                              </div>
                              <div class="d-flex align-items-center text-center p-3">
                                 <a class="btn btn-primary mr-2 iq-sign-btn" href="{{route('cart.index')}}" role="button">Giỏ Hàng</a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </li>
                  @endif
                  @endauth


                  <li class="nav-item nav-icon dropdown">
                     <a href="#" class="search-toggle iq-waves-effect text-gray rounded">
                        <i class="fa fa-user" aria-hidden="true"></i>
                     </a>
                     <div class="iq-sub-dropdown iq-user-dropdown">
                        <div class="iq-card shadow-none m-0">
                           <div class="iq-card-body p-0">
                              @auth
                              <div class="bg-primary p-3">
                                 <h5 class="mb-0 text-white line-height">Xin chào
                                    {{ auth()->user()->username }}
                                 </h5>
                              </div>
                              @if (auth()->user()->role === 'admin')
                              @else
                              @endif
                              <div class="caption">
                                 <h6 class="mb-1 line-height"></h6>
                              </div>
                              </a>
                              @if(auth()->user()->role === 'admin')
                              <!-- Nothing here -->
                              @else
                              <a href="{{ route('account.edit') }}" class="iq-sub-card iq-bg-primary-hover">
                                 <div class="media align-items-center">
                                    <div class="rounded iq-card-icon iq-bg-primary">
                                       <i class="fa fa-user-o" aria-hidden="true"></i>
                                    </div>
                                    <div class="media-body ml-3">
                                       <h6 class="mb-0">Sửa thông tin tài khoản</h6>
                                    </div>
                                 </div>
                              </a>
                              <a href="{{ route('orders.index') }}" class="iq-sub-card iq-bg-primary-hover">
                                 <div class="media align-items-center">
                                    <div class="rounded iq-card-icon iq-bg-primary">
                                       <i class="fa fa-user-o" aria-hidden="true"></i>
                                    </div>
                                    <div class="media-body ml-3">
                                       <h6 class="mb-0">Đơn Hàng Của Tôi</h6>
                                    </div>
                                 </div>
                              </a>
                              <a href="#" class="iq-sub-card iq-bg-primary-hover">
                                 <div class="media align-items-center">
                                    <div class="rounded iq-card-icon iq-bg-primary">
                                       <i class="fa fa-heart-o" aria-hidden="true"></i>
                                    </div>
                                    <div class="media-body ml-3">
                                       <h6 class="mb-0">Sản phẩm yêu thích</h6>
                                    </div>
                                 </div>
                              </a>
                              <a href="#" class="iq-sub-card iq-bg-primary-hover">
                                 <div class="media align-items-center">
                                    <div class="rounded iq-card-icon iq-bg-primary">
                                       <i class="fa fa-history" aria-hidden="true"></i>
                                    </div>
                                    <div class="media-body ml-3">
                                       <h6 class="mb-0">Lịch sử xem</h6>
                                    </div>
                                 </div>
                              </a>
                              @endif
                              @else
                              <div class="bg-primary p-3">
                                 <h5 class="mb-0 text-white line-height">Tài Khoản</h5>
                              </div>
                              <a href="{{ route('login') }}" class="iq-sub-card iq-bg-primary-hover">
                                 <div class="media align-items-center">
                                    <div class="rounded iq-card-icon iq-bg-primary">
                                       <i class="ri-file-user-line"></i>
                                    </div>
                                    <div class="media-body ml-3">
                                       <h6 class="mb-0">Đăng nhập</h6>
                                    </div>
                                 </div>
                              </a>
                              <a href="{{ route('register') }}" class="iq-sub-card iq-bg-primary-hover">
                                 <div class="media align-items-center">
                                    <div class="rounded iq-card-icon iq-bg-primary">
                                       <i class="ri-profile-line"></i>
                                    </div>
                                    <div class="media-body ml-3">
                                       <h6 class="mb-0">Đăng ký</h6>
                                    </div>
                                 </div>
                              </a>
                              @endauth
                              <!-- <a href="account-setting.html" class="iq-sub-card iq-bg-primary-hover">
                                    <div class="media align-items-center">
                                        <div class="rounded iq-card-icon iq-bg-primary">
                                            <i class="ri-account-box-line"></i>
                                        </div>
                                        <div class="media-body ml-3">
                                            <h6 class="mb-0">Đơn hàng của tôi</h6>
                                        </div>
                                    </div>
                                </a>
                                <a href="wishlist.html" class="iq-sub-card iq-bg-primary-hover">
                                    <div class="media align-items-center">
                                        <div class="rounded iq-card-icon iq-bg-primary">
                                            <i class="ri-heart-line"></i>
                                        </div>
                                        <div class="media-body ml-3">
                                            <h6 class="mb-0">Yêu Thích</h6>
                                        </div>
                                    </div>
                                </a> -->
                              <div class="d-inline-block w-100 text-center p-3">
                                 @auth
                                 <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button class="bg-primary iq-sign-btn" type="submit">Sign Out <i class="ri-login-box-line ml-2"></i></button>
                                 </form>
                                 @else
                                 <!-- <div class="alert alert-danger">
                                            Bạn chưa đăng nhập. Vui lòng đăng nhập để sử dụng chức năng này.
                                        </div> -->
                                 @endauth
                                 @if (@session('success_cart'))
                                 <div class="alert alert-success" style="display: flex">
                                    Thêm Card Thành Công ...
                                 </div>
                                 @endif
                              </div>
                           </div>
                        </div>
                     </div>
                  </li>
               </ul>
            </div>
         </nav>

      </div>

   </div>

   {{ $slot }}

   <!-- Link to Bootstrap 5 JavaScript Bundle (includes Popper.js)
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    {{ $script ?? '' }} -->


   <!-- Footer END -->
   <!-- Optional JavaScript -->
   <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
   </script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
   <script src="{{ asset('js/new-custom.js') }}"></script>
   <script>
      @if(session('error'))
      alert("{{ session('error') }}");
      @endif

      @if(session('success'))
      alert("{{ session('success') }}");
      @endif
   </script>

</body>

</html>