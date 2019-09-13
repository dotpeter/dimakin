(function($){

  // Flex Slider Configuration
  var flexslider = { vars:{} } ;

  $(window).load(function() {


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
      slideshow: false,
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

    // Initialize the Lightbox for any links with the 'fancybox' class
    $(".fancybox").fancybox();

    $("[data-fancybox]").fancybox({
    // Options will go here
     });

    // Initialize the Lightbox automatically for any links to images with extensions .jpg, .jpeg, .png or .gif
    $("a[href$='.jpg'], a[href$='.png'], a[href$='.jpeg'], a[href$='.gif']").fancybox();

    // Initialize the Lightbox and add rel="gallery" to all gallery images when the gallery is set up using [gallery link="file"] so that a Lightbox Gallery exists
    $(".gallery a[href$='.jpg'], .gallery a[href$='.png'], .gallery a[href$='.jpeg'], .gallery a[href$='.gif']").attr('data-fancybox','group').fancybox();

    // Initalize the Lightbox for any links with the 'video' class and provide improved video embed support
    $(".video").fancybox({
        maxWidth        : 800,
        maxHeight       : 600,
        fitToView       : false,
        width           : '70%',
        height          : '70%',
        autoSize        : false,
        closeClick      : false,
        openEffect      : 'none',
        closeEffect     : 'none'
    });

  $(".loader").fadeOut("slow");
  console.log('alo?');

  });

})(jQuery);
