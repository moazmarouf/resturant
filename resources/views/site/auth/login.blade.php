@extends('layouts.master-site')
@section('title')
    تسجيل الدخول
@endsection
@section('style')

@endsection
@section('content')
    <div class="login-page">
        <div class="logo">
            <img src="{{URL::to('assets/site/images/LOGO.png')}}" alt="img" class="img-fluid">
        </div>
        <form id="loginForm">
            @csrf
            <div class="field isosContainer">
                <select class="isos" name="iso_id">
                    @foreach($isos as $iso)
                        <option value="{{$iso->id}}">{{$iso->name}}</option>
                    @endforeach
                </select>
                <input name="phone" type="number" class="form-control" placeholder="رقم الجوال">
            </div>
            <div class="field">
                <input name="password" type="password" class="form-control" placeholder="كلمة المرور">
            </div>
            <button class="loginBtn btn-def btn-brown" type="submit">   تسجيل دخول </button>
            <a class="btn-def btn-grey" href="{{route('site.register')}}"> تسجيل جديد  </a>
            <a href="{{route('password.forgot')}}" class="link">  نسيت كلمة المرور </a>
        </form>
    </div>
@endsection
@section('script')
    <script>
        $(".loginBtn").on('click',function(e){
            e.preventDefault();
            var form = $('#loginForm').get(0);
            var formData = new FormData(form);
            var oldText = $(this).text();
            $(this).prop('disabled', true).css({
                opacity:'0.5'
            }).text('جار التحميل ...');

            $.ajax({
                url:"{{route('site.login.post')}}",
                type:"POST", // type or method
                data: formData,
                dataType: "json",
                processData: false,
                contentType: false,
                cache: false,
                success:function(data){
                    $('.loginBtn').removeAttr("disabled").css({ //
                        opacity:'1'
                    }).text(oldText);
                    if(data.key =='success'){
                        location.assign(data.msg);
                    }else{
                        Swal.fire({ //
                            title: data.msg,
                            position:'top',
                            timer: 3000,
                            type:'error',
                            showCloseButton: false,
                            showConfirmButton:false,
                            animation: true
                        })
                    }
                }
            });
        });
    </script>
@endsection
