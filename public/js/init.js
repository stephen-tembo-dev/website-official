(function($){

    $(function(){
  
      M.AutoInit();

      $('.slider').slider();

      $('.carousel.carousel-slider').carousel({
        fullWidth: true,
        indicators: true,
      });

      $('.sidenav').sidenav();
      $('#sidenav-1').sidenav({ edge: 'left' });
      
    }); 
  })(jQuery);

  autoplay();

function autoplay() {
    $('.carousel').carousel('next');
    setTimeout(autoplay, 5000);
}


new WOW().init();

