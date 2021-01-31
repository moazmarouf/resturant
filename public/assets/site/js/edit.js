// global $ 

(function($) {
    'use strict';

    $(window).on('load', function () {
        $('.loader').fadeOut(500, function () {
            $(this).remove();
        });      
    });

    $('.nav-btn').click(function(){
        $('.side-menu').addClass('show-menue');
        $('.menu-overlay').addClass('show-overlay');
    });

    $('.menu-overlay , .menu-btn').click(function(){
        $('.side-menu').removeClass('show-menue');
        $('.menu-overlay').removeClass('show-overlay');
    });
    

    $('.home-owl').owlCarousel({
        margin:8,
        // loop:true,
        rtl: true,
        autoWidth:true
    });

    $('.description .text-box p').text($('.home-slider .owl-item.firstActiveItem.active .info .text').text());

    var owl = $('.owl-carousel');
    owl.owlCarousel();  
    checkClasses();
    owl.on('changed.owl.carousel', function(event) {
        checkClasses();
        var oldTxt = $('.home-slider .owl-item.firstActiveItem.active .info .text').text();
                $('.description .text-box p').text(oldTxt);
    });
    owl.on('translated.owl.carousel', function(event) {
        checkClasses();
    });

    function checkClasses(){
        var total = $('.home-slider .owl-item.active').length;  
        $('.home-slider .owl-stage .owl-item').removeClass('firstActiveItem');
        $('.home-slider .owl-stage .owl-item.active').each(function(index){
            if (index === 0) {
                $(this).addClass('firstActiveItem');
            }
            if (index === total - 1 && total>1) {
                $(this).removeClass('firstActiveItem');
            }
        });
    }


    $('.web-owl').owlCarousel({
        rtl: true,
        margin: 0,
        // autoplay: true,
        loop: true,
        nav: true,
        dots:true,
        autoplaySpeed: 2000,
        navText: ["<i class='icofont-thin-right'></i>", "<i class='icofont-thin-left'></i>"],
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    });

    $('.filter-btn').on('click',function(e){
        e.stopPropagation();
        $('.filter-optons').toggleClass('show-filter');
    });

    $(document).on('click',function(){
        $('.filter-optons').removeClass('show-filter');
    });

    $('.categories .wrapper').masonry({
        itemSelector: '.category-box'
    });

    $('.show-modal').on('click',function(){
        $('.my-modal').toggleClass('modal-show');
    });

    $('.my-modal .close-btn').on('click',function(){
        $('.my-modal').removeClass('modal-show');
    });

    $('.my-modal .overlay').on('click',function(){
        $('.my-modal').removeClass('modal-show');
    });

    
    $(document).on('click','.count .bttn',function (event) {
        var count = $(this).parent(),
        num = $(this).siblings(".num"),
        i = parseInt(num.text(), 10);
        
        if ($(this).hasClass("plus")) {
            if (i === 0) {
                i = i + 1;
                count.removeClass("shrink");
                num.fadeIn();
                num.text(i);
                $('.product_num').val(1);
            } else {
                i = i + 1;
                num.text(i);
                $('.product_num').val(i);
            }
        } else {
            if (i === 1) {
                i = i - 1;
                count.addClass("shrink");
                num.fadeOut();
                num.text(i);
                $('.product_num').val(0);
            } else if (i > 1) {
                i = i - 1;
                num.text(i);
                $('.product_num').val(i);
            }
        }
    });

    // $('.related-owl').owlCarousel({
    //     margin:0,
    //     loop:true,
    //     autoWidth:true,
    //     // items:4
    // })

    $('.input-file').change(function () {
        var input = (this);
        var image = $(this).siblings('.input-image');
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                image.attr('src', e.target.result);
                console.log(this);
            }
            reader.readAsDataURL(input.files[0]);
        }
    });

    $('.tabs-list a').click(function (e) {
        e.preventDefault();   
        var itemId = $(this).attr("href");
        
        $('.tabs-wrapper .single-tab').removeClass('active-content'); 
        $(itemId).addClass('active-content');
        
        $('.tabs-list a').removeClass('active');
        $(this).addClass('active')
    });

    $('.order-item .delete_btn').on('click',function(){
        $(this).parents('.order-item').remove();
    });
    

})(jQuery);


function goBack() {
    window.history.back()
}
