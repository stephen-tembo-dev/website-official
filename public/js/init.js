(function($){

    $(function(){
  
      M.AutoInit();

      $('.slider').slider();


      $('.carousel.carousel-slider').carousel({
        fullWidth: true,
        indicators: true,
      });
      
    }); // end of document ready
  })(jQuery);

  autoplay();
function autoplay() {
    $('.carousel').carousel('next');
    setTimeout(autoplay, 5000);
}


new WOW().init();

