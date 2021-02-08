@extends('layouts.master-site')
@section('title')
    تغيير كلمه المرور
@endsection
@section('style')

@endsection
@section('content')
    <div class="login-page">
        <div class="logo">
            <img src="{{URL::to('assets/site/images/LOGO.png')}}" alt="img" class="img-fluid">
        </div>
        <form id="resetForm">
            {{csrf_field()}}
            <div class="field">
                <input name="v_code" type="number" class="form-control" placeholder="كود التأكيد">
            </div>
            <div class="field">
                <input name="password" type="password" class="form-control" placeholder="كلمة المرور">
            </div>
            <div class="field">
                <input name="password_confirmation" type="password" class="form-control" placeholder="تاكيد كلمة المرور">
            </div>
            <button class="resetBtn btn-def btn-brown" type="submit"> تغيير </button>
        </form>
    </div>
@endsection
@section('script')
    <script>
        $(".resetBtn").on('click',function(e){
            e.preventDefault();


            var form = $('#resetForm').get(0);
            var formData = new FormData(form);

            var oldText = $(this).text();
            $(this).prop('disabled', true).css({
                opacity:'0.5'
            }).text('جار التحميل ...');

            $.ajax({
                url:"{{route('password.reset.post')}}",
                type:"POST",
                data: formData,
                dataType: "json",
                processData: false,
                contentType: false,
                cache: false,
                success:function(data){
                    $('.resetBtn').removeAttr("disabled").css({
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
