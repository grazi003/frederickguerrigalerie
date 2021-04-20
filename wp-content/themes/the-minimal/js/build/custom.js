jQuery(document).ready(function ($) {
    
    /** Variables from Customizer for Slider settings */
    var slider_auto, slider_loop, slider_control, slider_thumb, animation;
    
    if( the_minimal_data.auto == '1' ){
        slider_auto = true;
    }else{
        slider_auto = false;
    }
    
    if( the_minimal_data.loop == '1' ){
        slider_loop = true;
    }else{
        slider_loop = false;
    }
    
    if( the_minimal_data.control == '1' ){
        slider_control = true;
    }else{
        slider_control = false;
    }
    
    if( the_minimal_data.thumbnail == '1' ){
        slider_thumb = "thumbnails";
    }else{
        slider_thumb = false;
    }
    
    if( the_minimal_data.mode == 'slide' ){
        animation = '';
    }else{
        animation = 'fadeOut';
    }
    
    /** Home Page Slider */
    $('.flexslider .slides').owlCarousel({
        items           : 1,
        autoplay        : slider_auto,
        loop            : slider_loop,
        nav             : slider_control,
        animateOut      : animation,
        dots            : false,
        thumbs          : true,
        thumbImage      : true,
        thumbContainerClass     : 'owl-thumbs',
        thumbItemClass  : 'owl-thumb-item',
        smartSpeed      : the_minimal_data.speed,
    });

    //mobile-menu
    $('.btn-menu-opener').click(function(){
        $('body').addClass('menu-open');
        $('.mobile-main-navigation').addClass('toggled');

        // $('.btn-close-menu').click(function(){
        //     $('body').removeClass('menu-open');
        // });

    });

    $('.mobile-menu .close-main-nav-toggle').click(function(){
        $('body').removeClass('menu-open'); 
        $('.mobile-main-navigation').removeClass('toggled');
    });

    $('.overlay').click(function(){
        $('body').removeClass('menu-open');
        $('.mobile-main-navigation').removeClass('toggled');
    });

    // $('.mobile-menu').prepend('<div class="btn-close-menu"></div>');

    // $('.mobile-main-navigation ul .menu-item-has-children').append('<div class="angle-down"></div>');

    // $('.mobile-secondary-menu ul .menu-item-has-children').append('<div class="angle-down"></div>');

    // $('.mobile-main-navigation ul li .angle-down').click(function(){
    //     $(this).prev().slideToggle();
    //     $(this).toggleClass('active');
    // });

    // $('.mobile-secondary-menu ul li .angle-down').click(function(){
    //     $(this).prev().slideToggle();
    //     $(this).toggleClass('active');
    // });

    $('<button class="angle-down"></button>').insertAfter($('.mobile-main-navigation ul .menu-item-has-children > a'));
    $('.mobile-main-navigation ul li .angle-down').click(function() {
        $(this).next().slideToggle();
        $(this).toggleClass('active');
    });

    $('<button class="angle-down"></button>').insertAfter($('.mobile-secondary-menu  ul .menu-item-has-children > a'));
    $('.mobile-secondary-menu  ul li .angle-down').click(function() {
        $(this).next().slideToggle();
        $(this).toggleClass('active');
    });

     $("#secondary-navigation ul li a").focus(function(){
         $(this).parents("li").addClass("focus");
     }).blur(function(){
         $(this).parents("li").removeClass("focus");
    });

     $("#site-navigation ul li a").focus(function(){
         $(this).parents("li").addClass("focus");
     }).blur(function(){
         $(this).parents("li").removeClass("focus");
    });
        
});
