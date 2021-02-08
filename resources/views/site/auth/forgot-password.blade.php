@extends('layouts.master-site')
@section('title')
    نسيت كلمه المرور
@endsection
@section('style')

@endsection
@section('content')
    <div class="login-page">
        <div class="logo">
            <img src="{{URL::to('assets/site/images/LOGO.png')}}" alt="img" class="img-fluid">
        </div>
        <form id="forgotForm">
            {{csrf_field()}}
            <div class="field isosContainer">
                <select class="isos" name="iso_id">
                    @foreach($isos as $iso)
                        <option value="{{$iso->id}}">{{$iso->name}}</option>
                    @endforeach
                </select>
                <input name="phone" type="number" class="form-control" placeholder="رقم الجوال">
            </div>
            <button class="forgotBtn btn-def btn-brown" type="submit"> ارسال كود التأكيد </button>
        </form>
    </div>
@endsection
@section('script')
    <script>
        $(".forgotBtn").on('click',function(e){
            e.preventDefault();


            var form = $('#forgotForm').get(0);
            var formData = new FormData(form);

            var oldText = $(this).text();
            $(this).prop('disabled', true).css({
                opacity:'0.5'
            }).text('جار التحميل ...');

            $.ajax({
                url:"{{route('password.forgot.post')}}",
                type:"POST",
                data: formData,
                dataType: "json",
                processData: false,
                contentType: false,
                cache: false,
                success:function(data){
                    $('.forgotBtn').removeAttr("disabled").css({
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
