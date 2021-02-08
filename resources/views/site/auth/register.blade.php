@extends('layouts.master-site')
@section('title')
    تسجيل جديد
@endsection
@section('style')

@endsection
@section('content')
    <div class="login-page">
        <div class="logo">
            <img src="{{URL::to('assets/site/images/LOGO.png')}}" alt="img" class="img-fluid">
        </div>

        <form id="registerForm">
            @csrf
            <div class="field">
                <input name="name" type="text" class="form-control" placeholder="اسم المستخدم">
            </div>

            <div class="field isosContainer">
                <select class="isos" name="iso_id">
                    @foreach($isos as $iso)
                        <option value="{{$iso->id}}">{{$iso->name}}</option>
                    @endforeach
                </select>
                <input name="phone" type="number" class="form-control" placeholder="رقم الجوال">
            </div>
            <div class="field">
                <input name="email" type="email" class="form-control" placeholder="البريد الالكترونى">
            </div>
            <div class="field">
                <input name="password" type="password" class="form-control" placeholder="كلمة المرور">
            </div>
            <div class="field">
                <input name="password_confirmation" type="password" class="form-control" placeholder="تاكيد كلمة المرور">
            </div>

            <button class="registerBtn btn-def btn-brown" type="submit">   تسجيل جديد </button>
            <p>    بالاستمرار فأنت توافق على  <a class="link" href="">  الشروط والاحكام </a> </p>
            <p>   لدي حساب بالفعل  <a class="link" href="{{route('site.login')}}">    تسجيل دخول  </a> </p>
        </form>
    </div>
@endsection
@section('script')
    <script>
        $(".registerBtn").on('click',function(e){
            e.preventDefault();
            var form = $('#registerForm').get(0);
            var formData = new FormData(form);
            var oldText = $(this).text();
            $(this).prop('disabled', true).css({
                opacity:'0.5'
            }).text('جار التحميل ...');

            $.ajax({
                url:"{{route('site.register.post')}}",
                type:"POST",
                data: formData,
                dataType: "json",
                processData: false,
                contentType: false,
                cache: false,
                success:function(data){
                    $('.registerBtn').removeAttr("disabled").css({
                        opacity:'1'
                    }).text(oldText);
                    if(data.key =='success'){
                        location.assign(data.msg);
                    }else{
                        Swal.fire({
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
