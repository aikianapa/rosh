$(function(){
    $('body').on('click', 'a.--openfilter', function() {
        $($(this).attr('href')).show();
        return false;
    }).on('click', '.--closefilter', function() {
        $(this).closest('.mainfilter').hide();
        return false;
    }).on('click', '.data-tab-link', function() {
        var W = $('.data-tab-wrapper[data-tabs="' + $(this).attr('data-tabs') + '"]:first');
        var T = W.find('.data-tab-item[data-tab="' + $(this).attr('data-tab') + '"]:first');
        $(this).addClass('active').siblings('.data-tab-link').removeClass('active');
        T.addClass('active').siblings('.data-tab-item').removeClass('active');
        return false;
    }).on('click', '.--openpopup', function() {
        var P = $(this).attr('data-popup');
        $('body').find('div.' + P + ':first').show();
        return false;
    }).on('click', '.popup__close', function(){
        $(this).closest('.popup').hide();
        return false;
    }).on('click', 'button.burger', function(){
        $(this).toggleClass('active');
        if ($(this).hasClass('active')) {
            $('#mainmenu').addClass('active');
        } else {
            $('#mainmenu').removeClass('active');
        }
    }).on('click', '.accardeon .accardeon__click', function(){
        $(this).closest('.accardeon').addClass('active').siblings('.accardeon').removeClass('active');
        return false;
    }).on('click', '.select .select__main', function() {
        if ($(this).parent().hasClass('active')) {
            $(this).parent().removeClass('active');
        } else {
            $('.select').each(function() {
                $(this).removeClass('active');
            });
            $(this).parent().addClass('active');
        }
        return false;
    }).on('click', '.select .select__item', function() {
        var value = $(this).html();
        $(this).addClass('active').siblings('.select__item').removeClass('active');
        $(this).closest('.select').removeClass('active').find('.select__main:first').html(value);
        return false;
    }).on('click', 'button.user__edit', function(){
        $(this).closest('.admin-editor').find('form.profile-edit:first').addClass('active');
        return false;
    });

    new Swiper('.main-slider', {
        loop: true, slidesPerView: 1, speed: 1000,
        pagination: {el: '.swiper-pagination', clickable: true}
    });

    new Swiper('.gallery__slider', {
        loop: true, slidesPerView: 1, speed: 1000, spaceBetween: 30,
        navigation: {nextEl: '.gallery__nav .next', prevEl: '.gallery__nav .prev'},
    });

    new Swiper('.slider-content__wrap', {
        loop: false, slidesPerView: 1, speed: 1000, spaceBetween: 30
    });

    new Swiper('.problems__slider', {
        loop: true, slidesPerView: 1, speed: 1000, spaceBetween: 30,
        navigation: {nextEl: '.problems .next', prevEl: '.problems .prev'},
        breakpoints: {
            768: {slidesPerView: 2}
        }
    });

    new Swiper('.reports-slider', {
        loop: false, slidesPerView: 1, speed: 1000, spaceBetween: 30,
        navigation: {nextEl: '.report__next', prevEl: '.report__prev'}
    });

    $('.datetimepickr').each(function(){
        new AirDatepicker(this, {
            timepicker: true,
            autoClose : true
        });
    });

    $('input[data-inputmask]').each(function() {
        $(this).inputmask();
    });
});