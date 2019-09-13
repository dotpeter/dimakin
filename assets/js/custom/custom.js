(function($){

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
