@extends('layouts.master-site')
@section('title')
    تأكيد الجوال
@endsection
@section('style')

@endsection
@section('content')
    <div class="login-page">
        <div class="logo">
            <img src="{{URL::to('assets/site/images/LOGO.png')}}" alt="img" class="img-fluid">
        </div>
        <form id="confirmationForm">
            {{csrf_field()}}
            <div class="field">
                <input name="v_code" type="number" class="form-control" placeholder="كود التأكيد">
            </div>
            <button class="confirmationBtn btn-def btn-brown" type="submit"> تأكيد </button>
        </form>
    </div>
@endsection
@section('script')
    <script>
        $(".confirmationBtn").on('click',function(e){
            e.preventDefault();


            var form = $('#confirmationForm').get(0);
            var formData = new FormData(form);

            var oldText = $(this).text();
            $(this).prop('disabled', true).css({
                opacity:'0.5'
            }).text('جار التحميل ...');

            $.ajax({
                url:"{{route('confirmation.post')}}",
                type:"POST",
                data: formData,
                dataType: "json",
                processData: false,
                contentType: false,
                cache: false,
                success:function(data){
                    $('.confirmationBtn').removeAttr("disabled").css({
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
