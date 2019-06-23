(function($){

  // Flex Slider Configuration

  var $window = $(window);
  var flexslider = { vars:{} } ;


  function getItemWidth() {
    return (window.innerWidth < 520) ? 300 : 356;
  }
  function getItemMargin() {
    return (window.innerWidth < 520) ? 55 : 30;
  }
  function getItemsNumber(){
    return (window.innerWidth < 520) ? 1 : 3;
  }

  $window.load(function() {

    $('.products-slider-wrapper').flexslider({
      selector: ".products-slider-container > .product",
      animation: "slide",
      slideshow: false,
      controlNav: true,
      prevText: "",
      nextText: "",
      itemWidth: getItemWidth(),
      touch: true,
      itemMargin: getItemMargin(),
      minItems: 1,
      maxItems: getItemsNumber(),
      direction: "horizontal",
    });


  });

  // check grid size on resize event
  $window.resize(function() {
    var itemWidth = getItemWidth();
    var itemMargin = getItemMargin();
    var itemsNumber = getItemsNumber();

    flexslider.vars.itemWidth = itemWidth;
    flexslider.vars.itemMargin = itemMargin;
    flexslider.vars.maxItems = itemsNumber;

    console.log(getItemWidth(), getItemMargin(), getItemsNumber());
  });

  // Searchbar toggle
  $( document ).ready(function() {

    $(".searchform-toggle").click(function(e){
      e.preventDefault();
      $(".header-search-form-wrapper").slideToggle("300", "swing");
      $( ".searchform-toggle > .fa" ).toggleClass( "fa-times" );
    });

  });

  // Button Scroll to top
  $(window).scroll(function(){
    /*if ($(this).scrollTop() >= 200) {        // If page is scrolled more than 50px
      $('#btn-return-to-top').fadeIn(200);    // Fade in the arrow
    } else {
        $('#btn-return-to-top').fadeOut(200);   // Else fade out the arrow
    }*/
  });
  $('#btn-return-to-top').click(function() {      // When arrow is clicked
    $('body,html').animate({
        scrollTop : 0                       // Scroll to top of body
    }, 700);
  });

})(jQuery);
