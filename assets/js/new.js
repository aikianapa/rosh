$(function() {

    if ($(".header__logo-red").length > 0 && $('main.page').attr('data-barba-namespace') == 'lnd') {
        setTimeout(function() { $('.header__logo-red').addClass('active'); }, 1000);
    }

    $('.data-tab-link').on('click', function() {
        if ($('main.page').attr('data-barba-namespace') == 'problems') {
            if ($(this).attr('data-tab') == 'gyn')
                $('.problems-filter').css('display', 'none');
            else
                $('.problems-filter').css('display', 'block');
        }
    });


    //start DELETE ALL
    //service__header
    $('.mainfilter__left .mainfilter__checkbox input').on('click', function() {
        $(this).toggleClass('act');

        function getRandomInt(max) {
            return Math.floor(Math.random() * max);
        }

        var attr = $(this).parents('.mainfilter__checkbox').attr('data-name'),
            name = $(this).parents('.checkbox').find('.checbox__name').text(),
            letter = $(this).parents('.accardeon').find('.accardeon__name').text().substr(0, 1),
            rand = getRandomInt(30000);

        if ($(this).hasClass('act') && attr == undefined) {
            //console.log('1');
            var color = $(this).parents('.accardeon').find('.accardeon__name').attr('class').replace(/accardeon__name /g, '');
            $(this).attr('data-rand', rand);
            $('.mainfilter__choice-main .mainfilter__tags').append("<div class='mainfilter-tag' id='" + rand + "'><div class='mainfilter-tag__name'><div class='mainfilter-tag__delete'><svg class='svgsprite _delete'><use xlink:href='assets/img/sprites/svgsprites.svg#delete'></use></svg></div><a class='mainfilter-tag__link' href='/landing.html'>" + name + "</a></div><div class='mainfilter-tag__group " + color + " --yellow'>" + letter + "</div></div>");
        } else if (!$(this).hasClass('act') && attr == undefined) {
            //console.log('2');
            $("#" + $(this).attr('data-rand')).remove();
            $(this).removeAttr("data-rand");
        } else if ($(this).hasClass('act') && $(this).parents('.mainfilter__checkbox').attr('data-name')) {
            //console.log('3');
            for (var i = 0; i < $('.' + attr).length; i++) {
                var atts = $('.' + attr).eq(i).attr('class').replace(/checkbox mainfilter__checkbox /g, ''),
                    att = $(this).parents('.checkbox').attr('data-name'),
                    tt = $('.' + attr).eq(i).find('.checbox__name').text(),
                    ll = $('.' + attr).eq(i).parents('.accardeon').find('.accardeon__name').text().substr(0, 1),
                    cc = $('.' + attr).eq(i).parents('.accardeon').find('.accardeon__name').attr('class').replace(/accardeon__name /g, '');

                if (!$('.' + attr).eq(i).attr('data-sp') > 0) {
                    rand = getRandomInt(30000);
                    $('.' + attr).eq(i).attr('data-sp', rand);
                    $(this).attr('data-kt2', rand);
                    $('.mainfilter__symptoms .mainfilter__tags').append("<div class='mainfilter-tag " + att + "' data-fof='" + atts + " 'data-kt='" + rand + "'><div class='mainfilter-tag__name'><div class='mainfilter-tag__delete'><svg class='svgsprite _delete'><use xlink:href='assets/img/sprites/svgsprites.svg#delete'></use></svg></div><a class='mainfilter-tag__link' href='/landing.html'>" + tt + "</a></div><div class='mainfilter-tag__group " + cc + " --yellow'>" + ll + "</div></div>");
                } else {
                    if ($('.mainfilter__symptoms .mainfilter__tags').find('.mainfilter-tag').eq(i).attr('data-fof').indexOf(att) > 0) {
                        //console.log('==1');
                        $('.mainfilter__symptoms .mainfilter__tags').find('.mainfilter-tag').eq(i).addClass($(this).parents('.checkbox').attr('data-name'));
                    } else {
                        //console.log('==2');
                        //$('.mainfilter__symptoms .mainfilter__tags').append("<div class='mainfilter-tag "+att+"' data-fof='" + atts + "'><div class='mainfilter-tag__name'><div class='mainfilter-tag__delete'><svg class='svgsprite _delete'><use xlink:href='assets/img/sprites/svgsprites.svg#delete'></use></svg></div><a class='mainfilter-tag__link' href='/landing.html'>" + tt + "</a></div><div class='mainfilter-tag__group " + cc + " --yellow'>" + ll + "</div></div>");
                    }
                }
            }
        } else if (!$(this).hasClass('act') && $(this).parents('.mainfilter__checkbox').attr('data-name')) {
            console.log('4');
            for (var i = 0; i < $('.mainfilter__tags .mainfilter-tag').length; i++) {
                if ($('.mainfilter__symptoms').find('.mainfilter-tag').eq(i).hasClass(attr)) {
                    $('.mainfilter__symptoms').find('.mainfilter-tag').eq(i).removeClass(attr);
                    if ($('.mainfilter__symptoms').find('.mainfilter-tag').eq(i).attr('class').length == 14) {
                        $('.' + attr).eq(i).removeAttr("data-sp");
                        $('.mainfilter__symptoms').find('.mainfilter-tag').eq(i).addClass('del');
                    }
                }
            }
            setTimeout(function() {
                $('.del').remove();
            }, 10);
        }

    });

    $('.mainfilter__choice-main .mainfilter__tags').on('click', 'svg', function() {
        $('[data-rand = "' + $(this).parents('.mainfilter-tag').attr('id') + '"]').removeClass('act').removeAttr('data-rand').removeAttr("checked");
        $(this).parents('.mainfilter-tag').remove();
    });

    $('.mainfilter__symptoms .mainfilter__tags').on('click', 'svg', function() {
        //console.log('sd');
        //$('[data-rand = "' + $(this).parents('.mainfilter-tag').attr('id') + '"]').removeClass('act').removeAttr('data-rand').removeAttr("checked");
        $(this).parents('.mainfilter-tag').remove();
    });
    //end DELETE ALL


    //service__item
    $('.service__item input').on('click', function() {

        function getRandomInt(max) {
            return Math.floor(Math.random() * max);
        }

        $(this).toggleClass('act');

        var attrNum = getRandomInt(30000),
            text = $(this).parents('.service__item').find('.service__name').text(),
            price = $(this).parents('.service__item').find('.service__price').text(),
            block = "<div class='all-form__service' data-name='" + attrNum + "'>" +
                    '<input type="hidden" name="services['+ $(this).attr('data-category') +']" value="'+ $(this).attr('data-category')+'">'+
                    '<input type="hidden" name="service_prices['+$(this).attr('data-service_price')+'][service_id]" ' +
                    'value="'+ $(this).attr('data-category')+'">'+
                    '<input type="hidden" name="service_prices['+$(this).attr('data-service_price')+'][price_id]" ' +
                    'value="' + $(this).attr('data-id') +'">'+
                    '<input type="hidden" name="service_prices['+$(this).attr('data-service_price')+'][name]" '+
                    'value="' + $(this).attr('data-name') + '">' +
                    '<input type="hidden" name="service_prices['+$(this).attr('data-service_price')+'][price]" '+
                    'value="' + $(this).attr('data-price') + '">' +
                    "<div class='all-form__service-name'><div class='all-form__service-delete'><svg class='svgsprite _delete'><use xlink:href='assets/img/sprites/svgsprites.svg#delete'></use></svg></div><p>" + text + "</p></div><div class='all-form__service__summ'>" + price + "</div></div>",
            summBlock = $(this).parents('.all-tab').find('.all-form__summ p').eq(1),
            total_price = $(this).parents('.all-tab').find('.all-form__main input.total_price'),
            summ = $(summBlock).text().replace(/[^0-9]/gi, ''),
            price2 = price.replace(/[^0-9]/gi, '');


        if ($(this).hasClass('act')) {
            $(this).attr('data-servNum', attrNum);
            $('.all-form__services').append(block);
            total_price.val(parseInt(+summ + +price2));
            $(summBlock).text((+summ + +price2).toLocaleString('ru') + " ₽");
        } else {
            $(this).removeAttr('data-servNum');
            $(this).parents('.all-tab').find(".all-form__service:contains('" + text + "')").remove();
            total_price.val(parseInt(+summ - +price2));
            $(summBlock).text((+summ - +price2).toLocaleString('ru') + " ₽");
        }

        $('.input-sv').val($('.all-form .all-form__service').text().replace(/₽/gi, '₽\n'));
    });

    $('.all-form__services').on('click', 'svg', function() {
        var summ1 = $('.all-form__summ p').eq(1).text().replace(/[^0-9]/gi, ''),
            total_price = $(this).parents('.all-tab').find('.all-form__main input.total_price'),
            summ2 = $(this).parents('.all-form__service').find('.all-form__service__summ').text().replace(/[^0-9]/gi, ''),
            summ3 = +summ1 - +summ2;

        $('.all-form__summ').find('p').eq(1).text((summ3).toLocaleString('ru') + " ₽");
        total_price.val(parseInt(summ3));

        $('.checkbox [data-servnum="' + $(this).parents('.all-form__service').attr('data-name') + '"]').removeClass('act')
            .removeAttr('data-servnum').prop('checked', false);
        $(this).parents('.all-form__service').remove();

        $('.input-sv').val($('.all-form .all-form__service').text().replace(/₽/gi, '₽\n'));
    });


    $(":input").inputmask();

    //header and filter
    $('.--openfilter').on('click', function() {
        if ($('.header').hasClass('header-fix')) {
            $('.header').removeClass('header-fix');
            setTimeout(function() { $('#mainfilter').css('display', 'none'); }, 10);
        } else {
            $('.header').addClass('header-fix');
            $('#mainfilter').css('display', 'block');
        }
    });
    $('.mainfilter .mainfilter__close').on('click', function() {
        $('.header').removeClass('header-fix');
        $('#mainfilter').css('display', 'none');
    });

    $('.mainfilter-mob').on('click', function(e) {
        e.preventDefault();

        $('.mainfilter').animate({ scrollTop: $('.mainfilter__choice').offset().top }, 400);
    });
});

$(function() {
    // Shopping cart
    let cart = wbapp.storage("shop.cart");
    if (cart == undefined) {
        cart = {
            'list': {},
            'total': {}
        }
        wbapp.storage("shop.cart", cart)
    }
    $.each(cart.list, function(key, item) {
        $('#Shop').find(`[data-id=${item.id}]`).addClass('active')
    })

    let cartCalc = function() {
        let cart = wbapp.storage("shop.cart")
        cart.total = { sum: 0, qty: 0 }
        $.each(cart.list, function(key, item) {
            cart.total.sum = cart.total.sum + item.price * 1 * item.qty
            cart.total.qty = cart.total.qty + item.qty * 1
        })
        wbapp.storage("shop.cart", cart)
        $(document).find('.cart-total-qty').text(cart.total.qty)
        $(document).find('.cart-total-sum').text(cart.total.sum)
    }
    $('#Shop').delegate('.cart-add', wbapp.evClick, function(e) {
        let cart = wbapp.storage("shop.cart");
        $(this).parents('.card-bottom').toggleClass('active');
        let pid = $(this).parents('[data-id]').data('id')
        let name = $(this).parents('[data-id]').find('.card-name').text()
        cart.list[pid] = $(this).parents('[data-id]').data()
        cart.list[pid].qty = 1
        cart.list[pid].name = name
        wbapp.storage("shop.cart", cart)
        cartCalc()
    })

    $('#Shop').delegate('.cart-inc', wbapp.evClick, function(e) {
        let cart = wbapp.storage("shop.cart");
        let pid = $(this).parents('[data-id]').data('id')
        let price = $(this).parents('[data-id]').data('price')
        cart.list[pid].qty++
            cart.list[pid].price = price
        $(this).parents('.amount').find('.amount-qty').text(cart.list[pid].qty)
        wbapp.storage("shop.cart", cart)
        cartCalc()
    })

    $('#Shop').delegate('.cart-dec', wbapp.evClick, function(e) {
        let cart = wbapp.storage("shop.cart");
        let pid = $(this).parents('[data-id]').data('id')
        let price = $(this).parents('[data-id]').data('price')
        if (cart.list[pid].qty > 1) {
            cart.list[pid].qty--
                cart.list[pid].price = price
            $(this).parents('.amount').find('.amount-qty').text(cart.list[pid].qty)
            wbapp.storage("shop.cart", cart)
        } else {
            delete cart.list[pid]
            $(this).parents('.card-bottom').toggleClass('active');
        }
        cartCalc()
    })
    cartCalc()
})