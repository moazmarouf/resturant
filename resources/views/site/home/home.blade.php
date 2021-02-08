@extends('layouts.master-site')
@section('title')
    الرئيسيه
@endsection
@section('style')

@endsection
@section('content')

    <div class="home-slider">
        <div class="owl-carousel owl-theme home-owl">
                <a href="" class="item">
                    <div class="info">
                        <h4></h4>
                        <p> </p>
                        <p class="text"> </p>
                    </div>
                </a>
        </div>

        <div class="description">
            <div class="text-box">
                <p> !! </p>
            </div>
        </div>
    </div>

    <div class="direct-links">
        <div class="title"> <h6> روابط سريعة </h6> </div>
        <div class="content">
            <a class="link-block active" href="">
                <div class="img-box">
                    <img src="{{URL::to('assets/site/images/link-icon-1.png')}}" alt="img" class="img-fluid">
                </div>
                <p> حجز جلسات بجرين زون </p>
            </a>
            <a class="link-block" href="">
                <div class="img-box">
                    <img src="{{URL::to('assets/site/images/link-icon-2.png')}}" alt="img" class="img-fluid">
                </div>
                <p> حجز غرف للعوائل </p>
            </a>
            <a class="link-block" href="">
                <div class="img-box">
                    <img src="{{URL::to('assets/site/images/link-icon-3.png')}}" alt="img" class="img-fluid">
                </div>
                <p> حجز الحفلات </p>
            </a>
            <a class="link-block" href="">
                <div class="img-box">
                    <img src="{{URL::to('assets/site/images/link-icon-4.png')}}" alt="img" class="img-fluid">
                </div>
                <p> الطلبات الخارجية </p>
            </a>
            <a class="link-block" href="">
                <div class="img-box">
                    <img src="{{URL::to('assets/site/images/link-icon-5.png')}}" alt="img" class="img-fluid">
                </div>
                <p> الشكاوي والمقترحات</p>
            </a>
        </div>
    </div>

    <div class="about-app">
        <h4>  عن التطبيق</h4>
        <div class="text-box">
            <p></p>
        </div>
    </div>

@endsection
@section('script')

@endsection
