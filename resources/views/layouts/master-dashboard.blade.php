<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    <!-- Global stylesheets --> <link
        href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900"
        rel="stylesheet" type="text/css"> <link href="{{
	asset('assets/css/icons/icomoon/styles.css') }}" rel="stylesheet"
                                                type="text/css"> <link href="{{
	asset('assets/css/icons/fontawesome/styles.min.css') }}" rel="stylesheet"
                                                                       type="text/css"> <link href="{{ asset('assets/css/bootstrap.min.css') }}"
                                                                                              rel="stylesheet" type="text/css"> <link href="{{ asset('assets/css/core.css')
	}}" rel="stylesheet" type="text/css"> <link href="{{
	asset('assets/css/style.css') }}" rel="stylesheet" type="text/css"> <link
        href="{{ asset('assets/css/components.min.css') }}" rel="stylesheet"
        type="text/css"> <link href="{{ asset('assets/css/colors.min.css') }}"
                               rel="stylesheet" type="text/css"> <link href="{{ asset('assets/css/mine.css')
	}}" rel="stylesheet" type="text/css"> <link
        href="https://fonts.googleapis.com/css?family=Cairo|El+Messiri|Reem+Kufi"
        rel="stylesheet"> <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script type="text/javascript" src="{{ asset('assets/js/plugins/loaders/pace.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/core/libraries/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/core/libraries/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/plugins/loaders/blockui.min.js') }}"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script type="text/javascript" src="{{ asset('assets/js/plugins/visualization/d3/d3.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/plugins/visualization/d3/d3_tooltip.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/plugins/forms/styling/switchery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/plugins/forms/styling/uniform.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/plugins/forms/selects/bootstrap_multiselect.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/plugins/ui/moment/moment.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/plugins/pickers/daterangepicker.js') }}"></script>

    <script type="text/javascript" src="{{ asset('assets/js/core/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/plugin.js') }}"></script>
    <script src="{{asset('assets/js/plugins/jquery-confirm/jquery.confirm.min.js')}}"></script>
    <script src="{!!asset('assets/js/plugins/sweetalert-master/dist/sweetalert.min.js')!!}"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <!-- /theme JS files -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Start Header Layout -->
    @yield('style')

</head>

<body>

<!-- Start header -->
@include('dashboard.includes.header')
<!-- End /header -->

<!-- Page container -->
<div class="page-container">

    <!-- Page content -->
    <div class="page-content">

        <!-- Start sidebar -->
    @include('dashboard.includes.sidebar')
    <!-- End /sidebar -->

        <!-- Start validations -->
    @include('dashboard.includes.validation')
    <!-- End /validations -->

        <!-- Main content -->
        <div class="content-wrapper">
            <div class="page-header">
                <div class="page-header-content">

                    <!-- company logo -->
                    <div class="page-title">
                        <h4><img src="{{URL::to('assets/images/logo_new.png')}}" style="width: 290px ;height: 60px"></h4>
                    </div>
                    <!-- /company logo -->

                    <!-- speed access -->
                    <div class="heading-elements">
                        <div class="heading-btn-group">
                            <a href="#" target="blank" class="btn btn-link btn-float has-text"><i class="icon-home4 text-primary"></i> <span>الموقع</span></a>
                            <a href="" class="btn btn-link btn-float has-text"><i class="icon-cog text-primary"></i> <span>الاعدادات</span></a>
                            <a href="" class="btn btn-link btn-float has-text"><i class="icon-switch text-primary"></i><span>خروج</span></a>
                        </div>
                    </div>
                    <!-- /speed access -->
                    <a class="heading-elements-toggle"><i class="icon-menu"></i></a></div>

                <div class="breadcrumb-line">
                    <ul class="breadcrumb">
                        <li><a href=""><i class="icon-home2 position-left"></i> الرئيسيه / </a> </li>
                    </ul>

                    <ul class="breadcrumb-elements">
                        <li class="dropdown">
                            <a href="">
                                <i class="icon-gear position-left"></i>حسابى</a>
                        </li>
                    </ul>

                    <a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a></div>
            </div>

            <!-- Content area -->
            <div class="content">

                <div  id="loader-wrapper">
                    <div id="loader">
                    </div>
                </div>

                <!-- Start .Content Layout -->
            @yield('content')
            <!-- End /.Content Layout -->


                <!-- Footer -->
            <!-- /footer -->

            </div>
            <!-- /content area -->

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->

</div>
<!-- /page container -->

<script type="text/javascript">
    jQuery(document).ready(function($) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $(".alert").delay(3000).fadeOut(800);
    });
</script>
@yield('script')
<script>
    $(document).ready( function () {
        $('#dtable').DataTable({
            "oLanguage": {
                "sSearch": "بحث: "
            },
            aaSorting: [[1, 'desc']]
        });
    } );
    $(function() {
        var number = $(".pagination li.active span").html();
        $(".pagination li.active span").replaceWith(function(){
            return $('<a class="page-link" href="'+window.location.href+'">'+number+'</a>');
        });
        $(document).on('click', '.pagination li a', function(e) {
            e.preventDefault();
            var url = $(this).attr('href');
            var number = $(this).html();

            go(url);
            window.history.pushState("", "",'?page='+number);
        });
        function go(url) {
            $.ajax({
                url : url,
            }).done(function (data) {
                $('#tableBody').html(data.html).fadeIn();
            }).fail(function () {
                alert('Page could not be loaded.');
            });
        }
    });
</script>
</body>
</html>
