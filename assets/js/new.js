$(document).ready(function(){
    var swiper = new Swiper('.product-slider', {
      slidesPerView: 1,
      watchSlidesVisibility: true,
      watchOverflow: true,
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });
    //card
    $('.card-bottom .btn').on('click', function(e){
        e.preventDefault();
        $(this).parents('.card-bottom').toggleClass('active');
    });
});