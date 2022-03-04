$(function(){
    $('body').on('click', 'a.--openfilter', function() {
        $($(this).attr('href')).show();
        return false;
    }).on('click', '.--closefilter', function() {
        $(this).closest('.mainfilter').hide();
        return false;
    }).on('click', '.mainfilter__tab-item', function() {
        var T = $(this).attr('data-tab');
        var W = $(this).parent().siblings('.mainfilter__tabs:first');
        $(this).addClass('active').siblings('.mainfilter__tab-item').removeClass('active');
        W.find('[data-tab="' + T + '"]').addClass('active').siblings().removeClass('active');
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
    });
});