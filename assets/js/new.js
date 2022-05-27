$(document).ready(function(){

  //header
  var header = $('.header'),
    scrollPrev = 0;

  $(window).scroll(function() {
    var scrolled = $(window).scrollTop();
   
    if ( scrolled > 10 && scrolled > scrollPrev ) {
      header.addClass('out');
    } else {
      header.removeClass('out');
    }
    scrollPrev = scrolled;
  });

  //header flip
  if($('.header__logo').hasClass('header__logo-red')){
    setTimeout(function(){
      $('.header__logo-red').addClass('active');
    }, 2000);
  }

  //sliders
  var swiper = new Swiper('.product-slider', {
    slidesPerView: 1,
    watchSlidesVisibility: true,
    watchOverflow: true,
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
  });
  var swiper = new Swiper('.post-slider', {
    slidesPerView: 1,
    watchOverflow: true,
    spaceBetween: 30,
  });

  //card
  $('.card-bottom .btn').on('click', function(e){
      e.preventDefault();
      $(this).parents('.card-bottom').toggleClass('active');
  });
});