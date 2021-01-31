<div class="fixed-tabs">
    <a href="" class="tab-box {{Request::is('home')?'active':''}}"> <img src="{{URL::to('assets/site/images/home.png')}}" alt="img" class="img-fluid"> </a>

    <a href="" class="tab-box {{Request::is('offers')?'active':''}}"> <img src="{{URL::to('assets/site/images/bookmark.png')}}" alt="img" class="img-fluid"> </a>

    <a href="" class="tab-box {{Request::is('likes')?'active':''}}"> <img src="{{URL::to('assets/site/images/heart.png')}}" alt="img" class="img-fluid"> </a>

    <a href="" class="tab-box {{Request::is('cart')?'active':''}}"> <img src="{{URL::to('assets/site/images/cart.png')}}" alt="img" class="img-fluid">
        @if(Auth::user()->orders()->where('status',0)->orderBy('created_at','desc')->first())
            <span></span>
        @endif
    </a>
</div>
