<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <!-- CSS -->
    <link rel="stylesheet" href="{{URL::to('assets/site/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{URL::to('assets/site/css/my-plugins.css')}}">
    <link rel="stylesheet" href="{{URL::to('assets/site/css/style.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.css">
    @yield('style')
    <link rel="icon" href="{{URL::to('assets/site/images/ico.png')}}" type="image/x-icon" />
    <title> دريم كافيه -  @yield('title')  </title>
</head>

<body>

<div class="loader">
    <img src="{{URL::to('assets/site/images/loader.gif')}}" alt="loader" class="img-fluid">
</div>

<div class="page-content menu-page">
    @if(Auth::check())
        <div class="page-header">
            <h3> @yield('title') </h3>
            <div class="menu-btn">
                <span></span>
                <span></span>
                <span></span>
            </div>
            @if(!Request::is('home'))
                <div class="back-btn" onclick="goBack()"> <i class="icofont-long-arrow-left"></i> </div>
            @endif
        </div>
    @endif

    @yield('content')

    @if(Auth::check())
        @include('site.includes.footer')
    @endif

</div>
@if(Auth::check())
    @include('site.includes.menu')
@endif

</body>

<!-- JS -->
<script src="{{URL::to('assets/site/js/jquery-3.2.1.min.js')}}"></script>
<script src="{{URL::to('assets/site/js/popper.min.js')}}"></script>
<script src="{{URL::to('assets/site/js/bootstrap.min.js')}}"></script>
<script src="{{URL::to('assets/site/js/my-plugins.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>
<script src="{{URL::to('assets/site/js/edit.js')}}"></script>
@if(Auth::check())
    <script>

        $('.menu-btn').on('click', function(){
            $('.side-menu').toggleClass('show-sidemenu');
            $('.page-content').toggleClass('translated');
            $('body').toggleClass('fixed-body');
        });

        // $('.menu-page').swipeleft(function(e) {
        //     $('.side-menu').addClass('show-sidemenu');
        //     $('.page-content').addClass('translated');
        //     $('body').addClass('fixed-body');
        // });
        //
        // $('.menu-page').swiperight(function(e) {
        //     $('.side-menu').removeClass('show-sidemenu');
        //     $('.page-content').removeClass('translated');
        //     $('body').removeClass('fixed-body');
        // });
    </script>
@endif
@yield('script')
</html>
