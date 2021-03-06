(function($){
  $(document).ready(function() {
    // Flex Slider Configuration
    var flexslider = { vars:{} } ;

    function getItemWidth() {
      //return (window.innerWidth < 420) ? 420 : 320;
      if (window.innerWidth < 768) {
        return 510;
      }else if (window.innerWidth < 576) {
        return 440;
      }else {
        return 320;
      }
    }

    $('.products-slider-wrapper').flexslider({
      selector: ".products-slider-container > .product",
      animation: "slide",
      animationSpeed: 700,
      slideshowSpeed: 3000,
      controlNav: false,
      prevText: "",
      nextText: "",
      itemWidth: getItemWidth(),
      touch: true,
      itemMargin: 30,
      minItems: 1,
      maxItems: 3,
      direction: "horizontal",
    });

    // The slider being synced must be initialized first
    $('#product-gallery').flexslider({
      animation: "slide",
      controlNav: false,
      prevText: "",
      nextText: "",
      animationLoop: true,
      slideshow: true,
      itemWidth: 100,
      itemMargin: 5,
      asNavFor: '#product-slider'
    });
    $('#product-slider').flexslider({
      animation: "slide",
      controlNav: false,
      animationLoop: false,
      slideshow: false,
      sync: "#product-gallery"
    });
    // set timeout to hide a element
    setTimeout(function(){
      $(".loader").fadeOut("slow");
    }, 1000);


    //Mobile menu
    var isMenuOpen = false;

    $('#mobile-toggle-open').click(function () {
      if (isMenuOpen == false) {
        $('.mobile-navigation-wrapper').clearQueue().animate({
          right: '0px'
        })
        $('#mobile-grey-back').fadeIn('fast');
        //$(this).fadeOut(200);
        //$('.close').fadeIn(300);
        isMenuOpen = true;
      }
    });

    $('#mobile-grey-back, #mobile-toggle-close').click(function () {
      if (isMenuOpen == true) {
        $('.mobile-navigation-wrapper').clearQueue().animate({
          right: '-380px'
        })
        //$('#page').clearQueue().animate({
        //  'margin-right' : '0px'
        //})
        $('#mobile-grey-back').fadeOut('fast');
        //$(this).fadeOut(200);
        //$('.mobile-nav-toggle').fadeIn(300);
        isMenuOpen = false;
      }
    });
  });
})(jQuery);
