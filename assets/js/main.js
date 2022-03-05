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
    }).on('click', 'button.burger', function(e){
        e.stopPropagation();
        $(this).toggleClass('active');
        $('#mainmenu').toggleClass('active', $(this).hasClass('active'));
    }).on('click', '#mainmenu', function(e){
        e.stopPropagation();
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
    }).on('click', '.select .select__item', function(e) {
        e.stopPropagation();
        var value = false;
        if ($(this).hasClass('select__item--checkbox')) {
            var ne = false;
            value = [];
            $(this).closest('.select__list').find('.select__item--checkbox').each(function(){
                if ($(this).find('input[type=checkbox]:checked').length) {
                    value.push($(this).find('.select__name:first').text());
                    ne = true;
                }
            });
            value = value.join(', ');
            $(this).closest('.select').toggleClass('has-values', ne).find('.select__values:first').html(value);
        } else {
            value = $(this).html();
            $(this).addClass('active').siblings('.select__item').removeClass('active');
            $(this).closest('.select').removeClass('active').find('.select__main:first').html(value);
            $(this).closest('.select').find('input[type=hidden]').each(function(){
                $(this).val(value);
            });
        }
    }).on('click', '.admin-editor button.user__edit', function(){
        $(this).closest('.admin-editor').find('form.profile-edit:first').addClass('active');
        return false;
    }).on('click', '.account button.user__edit', function(){
        $(this).closest('.account').find('form.profile-edit:first').addClass('active');
        return false;
    }).on('click', '.popup__overlay', function(){
        $(this).closest('.popup').hide();
    }).on('click', '.profile-menu', function(){
        $(this).addClass('active');
    }).on('click', 'button.flag-date__ico', function(){
        $(this).toggleClass('checked');
    }).on('click', '.hider-checkbox', function(){
        var I = $(this).attr('data-hide-input');
        $('[data-hide="' + I + '"]').toggle($(this).find('input[type=checkbox]:first').is(':checked'));
    });

    $('html').on('click', 'body', function() {
        $('.select').removeClass('active');
        $('button.burger').removeClass('active');
        $('#mainmenu').removeClass('active');
    }).on('click', 'header', function(){
        $('#mainfilter').hide();
    });

    new Swiper('.gallery__slider', {
        loop: true, slidesPerView: 1, speed: 1000, spaceBetween: 30,
        navigation: {nextEl: '.gallery__nav .next', prevEl: '.gallery__nav .prev'},
    });

    $('.datetimepickr').each(function(){
        new AirDatepicker(this, {timepicker: true, autoClose : true, minutesStep: 10});
    });

    $('.datebirthdaypickr').each(function(){
        new AirDatepicker(this, {autoClose : true});
    });

    $('.datepickr').each(function(){
        new AirDatepicker(this, {autoClose : true});
    });

    $('.daterangepickr').each(function(){
        new AirDatepicker(this, {autoClose : true, range: true});
    });

    $('input[data-inputmask]').each(function() {
        $(this).inputmask();
    });
});