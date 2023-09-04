$(function() {
    window.toast         = function (text, head, icon) {
        var bgColor   = '#616161';
        var textColor = '#FEFEFE';
        switch (icon) {
            case 'error':
                bgColor = '#DC3545';
                break;
            case 'success':
                bgColor = '#198754';
                break;
            case 'warning':
                bgColor = '#BB9107';
                break;
            case 'info':
                bgColor = '#0A6BB9';
                break;
            default:
                bgColor = '#616161';
        }

        $.toast({
            text: text, // Text that is to be shown in the toast
            heading: head || '', // Optional heading to be shown on the toast
            showHideTransition: 'slide', // fade, slide or plain
            allowToastClose: true, // Boolean value true or false
            hideAfter: 6500,
            stack: 5,
            position: 'top-right',
            bgColor: bgColor, // Background color of the toast
            textColor: textColor, // Text color of the toast
            textAlign: 'left', // Text alignment i.e. left, right or center
            loader: false, // Whether to show loader or not. True by default
            icon: false,
            beforeShow: function() {}, // will be triggered before the toast is shown
            afterShown: function() {}, // will be triggered after the toat has been shown
            beforeHide: function() {}, // will be triggered before the toast gets hidden
            afterHidden: function() {} // will be triggered after the toast has been hidden
        });
    };
    window.toast_success = function(text, head) {
        toast(text, head, 'success');
    };
    window.toast_error   = function (text, head) {
        toast(text, head, 'error');
    };
    window.toast_info    = function (text, head) {
        toast(text, head, 'info');
    };
    window.toast_warning = function (text, head) {
        toast(text, head, 'warning');
    };
    window.str_to_array = function(text){
        return text.split(',');
    };
    window.isMobileDevice = function () {
        let check = false;
        (function (a) {
            if (/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(
                    a) ||
                /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(
                    a.substr(0, 4))) check = true;
        })(navigator.userAgent || navigator.vendor || window.opera);
        return check;
    };
    window.api           = {
        get(path, data) {
            let _path = path;
            let parts = path.split('?', 2);
            if (data !== undefined) {
                if (parts.length === 2) {
                    parts[1] += '&' + $.param(data);
                } else {
                    parts[0] += '?' + $.param(data);
                }
            }
            _path = parts.join('?');

            if (!_path.includes('__token')) {
                parts = _path.split('?', 2);

                if (parts.length === 2) {
                    parts[1] += '&__token=' + wbapp._session.token;
                } else {
                    parts[0] += '?__token=' + wbapp._session.token;
                }
                _path = parts.join('?');
            }

            const defaultOptions = { Method: 'GET' };
            return fetch(_path, defaultOptions).then((result) => result.json());
        },
        post(path, data) {
            //return this.request(path, 'post', data, options);
            if (is_string(data) && (data.indexOf('__token') == -1)) {
                data += '&__token=' + wbapp._session.token;
            } else if (!data.hasOwnProperty('__token')) {
                try { data.__token = wbapp._session.token; } catch (error) { null; }
            }
            wbapp.loading();
            return $.post(path, data, function() {
                wbapp.unloading();
            });
        }
    };
    window.popupMessage = function(title, subtitle, caption, html, onShow) {
        return new Ractive({
            el: '.popup.--message',
            template: wbapp.tpl('#popupMessage').html,
            data: {
                content: html,
                title: title,
                subtitle: subtitle,
                caption: caption,
                html: html
            },
            on: {
                init() {},
                complete() {
                    if (!!onShow) {
                        onShow(this);
                    }
                    $(this.el).show();
                },
                close(e) {}
            }
        });

    };
    $(document).ready(function() {
        $(document).on('change', '.select__list.single .select__item input[type=checkbox]', function (e) {
            e.stopPropagation();
            $(this).parents('.select__list').find('input[type="checkbox"]:checked').not($(this)).prop('checked', false);
            var ne   = false;
            var value    = [];
            $(this).closest('.select__list').find('.select__item--checkbox').each(function () {
                if ($(this).find('input[type=checkbox]:checked, input[type=radio]:checked').length) {
                    value.push($(this).find('.select__name:first').text());
                    ne = true;
                }
            });
            value = value.join(', ');
            $(this).closest('.select').toggleClass('has-values', ne).find('.select__values:first').html(value);
        });
        $(document).on('click', '.select .select__main', function (e) {
            e.stopPropagation();
            var _parent = $(this).parents('.select');
            _parent.toggleClass('active');
        }).delegate('.select .select__item', 'click', function (e) {
            //e.stopPropagation(); - не работает фильр блога
            var value = false;
            if ($(this).hasClass('select__item--checkbox')) {
                var ne = false;
                value  = [];
                var list = $(this).closest('.select__list');
                //if (list.hasClass('single')){
                //    //$(this).siblings('.select__item input[type="checkbox"]:checked').prop('checked', false);
                //    $(this).closest('.select').toggleClass('has-values', ne).find('.select__values:first').html(value);
                //} else {
                    $(this).closest('.select__list').find('.select__item--checkbox').each(function () {
                        if ($(this).find('input[type=checkbox]:checked, input[type=radio]:checked').length) {
                            value.push($(this).find('.select__name:first').text());
                            ne = true;
                        }
                    });
                    value = value.join(', ');
                    $(this).closest('.select').toggleClass('has-values', ne).find('.select__values:first').html(value);
                //}
            } else {
                value = $(this).html();
                $(this).addClass('active').siblings('.select__item').removeClass('active');
                $(this).closest('.select').removeClass('active').find('.select__main:first').html(value);
                if ($(this).data('id') !== undefined) value = $(this).data('id');
                $(this).closest('.select').find('input[type=hidden]:not(.group):not(.status):not(.pay_status)').each(function() {
                    $(this).val(value);
                });
            }
        })

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
            var _f = $(this).data('call');
            $('body').addClass('noscroll');

            setTimeout(function() {
                // fix "onclick" trigger on iphone
                $('body').find('div.' + P + ':first').show();
            }, 100);
            setTimeout(function() {
                $(document).find('.gallery__slider').each(function() {
                    new Swiper(this, {
                        loop: true,
                        slidesPerView: 1,
                        speed: 1000,
                        spaceBetween: 30,
                        navigation: { nextEl: '.gallery__nav .next', prevEl: '.gallery__nav .prev' },
                    });
                });
            }, 600);
            //return false;
        }).on('click', '.--switchpopup', function() {
            var P = $(this).attr('data-popup');
            $(this).closest('.popup').hide();
            $('body').find('div.' + P + ':first').show();
            return false;
        }).on('click', '.popup__panel.--succed.d-block .popup__close', function(e) {
            e.stopPropagation();
            $('body').removeClass('noscroll');
            $(this).closest('.popup').hide();
            $(this).closest('.popup').find('.popup__panel.d-none:not(.--succed)').removeClass('d-none');
            $(this).closest('.popup').find('.--succed.d-block').removeClass('d-block');
            return false;
        }).on('click', '.popup__close', function() {
            $(this).closest('.popup').hide();
            $('body').removeClass('noscroll');
            return false;
        }).on('click', 'button.burger', function(e) {
            e.stopPropagation();
            $(this).toggleClass('active');
            $('#mainmenu').toggleClass('active', $(this).hasClass('active'));
        }).on('click', '#mainmenu', function(e) {
            e.stopPropagation();
        }).on('click', '.accardeon .accardeon__click', function() {
            var _accardeon = $(this).closest('.accardeon');
            if (_accardeon.hasClass('active')) {
                _accardeon.removeClass('active');
                if (_accardeon.attr('data-accardeon')){
                    sessionStorage.removeItem('state-accardeon');
                }
            } else {
                _accardeon.addClass('active').siblings('.accardeon').removeClass('active');
                if (_accardeon.attr('data-accardeon')){
                    sessionStorage['state-accardeon'] = _accardeon.attr('data-accardeon');
                }
            }
            return false;
        }).on('___click', '.select .select__main', function() { // ###############
            if ($(this).parent().hasClass('active')) {
                $(this).parent().removeClass('active');
            } else {
                $('.select').each(function() {
                    $(this).removeClass('active');
                });
                $(this).parent().addClass('active');
            }
            return false;
        }).on('___click', '.select .select__item', function(e) { // ###############
            //e.stopPropagation(); - не работает фильр блога
            var value = false;
            if ($(this).hasClass('select__item--checkbox')) {
                var ne = false;
                value = [];
                $(this).closest('.select__list').find('.select__item--checkbox').each(function() {
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
                $(this).closest('.select').find('input[type=hidden]').each(function() {
                    $(this).val(value);
                });
            }
        }).on('click', '.admin-editor button.user__edit', function() {
            $(this).closest('.admin-editor').find('.profile-edit:first').addClass('active');
            return false;
        }).on('click', '.account button.user__edit.all', function() {
            $(this).parents('.account').find('.profile-edit').toggleClass('active');
            return false;
        }).on('click', '.account button.user__edit:not(.all)', function() {
            $(this).closest('.account').find('.profile-edit:first').toggleClass('active');
            return false;
        }).on('click', '.accardeon button.user__edit', function() {
            $(this).closest('.accardeon').find('.profile-edit:first').toggleClass('active');
            return false;
        }).on('click', '.popup__overlay', function() {
            //$(this).closest('.popup:not(.strict_close)').hide();
            $(this).closest('.popup').hide();
            $('body').removeClass('noscroll');
        }).on('click', '.profile-menu', function(e) {
            e.stopPropagation();
            $(this).toggleClass('active');
        }).on('click', 'button.flag-date__ico', function() {
            $(this).toggleClass('checked');
        }).on('change', '.hider-checkbox input[type=checkbox]', function(e) {
            $('[data-hide="' + $(this).parent().attr('data-hide-input') + '"]').toggle(!(this.checked));
        }).on('change', '.show-checkbox input[type=checkbox]', function(e) {
            $('[data-show="' + $(this).parent().attr('data-show-input') + '"]').toggle(this.checked);
        }).on('click', '.repeater-delete', function() {
            $(this).closest('.repeater-item').remove();
            return false;
        }).on('click', '.repeater-add', function() {
            var R = $(this).attr('data-repeater');
            var S = $('.repeater-sample[data-repeater="' + R + '"]:first');
            var C = $('.repeater-container[data-repeater="' + R + '"]:first');
            if (S)
                if (C) {
                    S = S.clone();
                    S.removeClass('repeater-sample').addClass('repeater-item').appendTo(C);
                    S.trigger('repeaterAdd');
                }
            return false;
        }).on('repeaterAdd', '[data-repeater="license"]', function() {
            $(this).find('input').attr('name', 'adv[licenses][]');
            initPlugins();
        }).on('repeaterAdd', '[data-repeater="study"]', function() {
            var _max_idx = $(this).parents('.repeater-container')
                .find('.profile-education__inner.row[data-idx]:last')
                .data('idx');
            _max_idx++;
            $(this).attr('data-idx', _max_idx);
            $(this).find('input[name="stages[][stage]"]').attr('name', 'adv[stages][' +
                _max_idx + '][stage]');
            $(this).find('input[name="stages[][year]"]').attr('name', 'adv[stages][' +
                _max_idx + '][year]');
            $(this).find('input[name="stages[][year_end]"]').attr('name', 'adv[stages][' +
                _max_idx + '][year_end]');
            initPlugins();
        }).on('click', '.ddl', function() {
            $(this).toggleClass('active');
            return false;
        }).on('click', '.ddl a', function() {
            $(this).parent().toggleClass('active');
            return false;
        });

        $('html').on('click', 'body', function(e) {
            if(!$(e.target).parents('.select').length){
                $('.select.active').removeClass('active');
            }
            $('button.burger.active').removeClass('active');
            $('#mainmenu.active').removeClass('active');
            $('.profile-menu.active').removeClass('active');
        }).on('click', 'header', function() {
            $('#mainfilter').hide();
        });

        $(document).find('.gallery__slider').each(function() {
            new Swiper(this, {
                loop: true,
                slidesPerView: "auto",
                speed: 1000,
                loop: true,
                loopFillGroupWithBlank: true,
                spaceBetween: 30,
                navigation: { nextEl: '.gallery__nav .next', prevEl: '.gallery__nav .prev' },
            });

        });

        var countryData = window.intlTelInputGlobals.getCountryData();
        for (var i = 0; i < countryData.length; i++) {
            var country  = countryData[i];
            country.name = country.name.replace(/.+\((.+)\)/, "$1");
        }

        initPlugins = function (parent) {
            if (parent) {
                parent.find('input.datebirthdaypickr').each(function () {
                    new AirDatepicker(this, {
                        selectedDates: [$(this).val() || (new Date())],
                        maxDate: (new Date()),
                        autoClose: true,
                        dateFormat: 'dd.MM.yyyy',
                        timepicker: false
                    });

                    $(this).inputmask('99.99.9999', {
                        clearMaskOnLostFocus: true,
                        showMaskOnHover: false,
                        positionCaretOnClick: 'radixFocus'
                    });
                });

                parent.find('input.daterangepickr').each(function () {
                    new AirDatepicker(this, {
                        autoClose: true,
                        range: true,
                        multipleDatesSeparator: ' - '
                    });
                });
                parent.find('input.yearpickr').each(function () {
                    let _config = {
                        selectedDates: [$(this).val() || (new Date())],
                        dateFormat: 'yyyy',
                        maxDate: (new Date()),
                        view: 'years',
                        timepicker: false,
                        minView: 'years',
                        autoClose: true
                    };
                    if ($(this).hasClass('empty-date') || $(this).val() == '') {
                        delete _config.selectedDates;
                    }

                    new AirDatepicker(this, _config);
                });

                parent.find('input.datepickr').each(function () {
                    let _config = {
                        timepicker: false,
                        dateFormat: 'dd.MM.yyyy',
                        autoClose: true
                    };

                    if ($(this).val() != '') {
                        _config.selectedDates = [$(this).val()],
                            _config.minDate = $(this).data('min-date') || '';
                        if ($(this).data('max-date')) {
                            _config.maxDate = $(this).data('max-date');
                        }
                    }

                    new AirDatepicker(this, _config);
                });

                parent.find('.input__control.timepickr').each(function (e) {
                    console.log($(this), e);
                    $(this).timepicker({
                        timeFormat: $(this).data('time-format') || 'HH:mm',
                        interval: $(this).data('interval') || 15,
                        minTime: $(this).data('min-time') || '08:00',
                        maxTime: $(this).data('max-time') || '21:00',
                        dynamic: false,
                        dropdown: true,
                        scrollbar: true,
                        change: function (time) {
                            // the input field
                            var element    = $(this),
                                text;
                            // get access to this Timepicker instance
                            var timepicker = element.timepicker();
                            console.log('change', element, element.val(), timepicker);
                            /* is start-time changed...*/
                            if (element.hasClass('event-time-start') && element.val()) {
                                var end_time = $(this).parents('.event-time').find('input.event-time-end');
                                var end_tpkr = end_time.timepicker({
                                    'minTime': element.val(),
                                    'startTime': element.val()
                                });
                                if (end_time.val() < element.val()) {
                                    end_time.val(element.val());
                                }
                            } else {
                                if (element.hasClass('event-time-end') && element.val()) {
                                    var start_time = $(this).parents('.event-time').find('input.event-time-end');

                                    if (start_time.val() > element.val()) {
                                        element.val(start_time.val());
                                    }
                                }
                            }

                        }
                    });
                });
                parent.find('input.datetimepickr').each(function () {
                    new AirDatepicker(this, {
                        selectedDates: [$(this).val() || (new Date())],
                        minHours: 8,
                        maxHours: 20,
                        timepicker: true,
                        autoClose: true,
                        minutesStep: 10,
                        dateFormat: 'dd.MM.yyyy',
                        timeFormat: "HH:mm"
                    });
                });

                parent.find('input[data-inputmask]').each(function () {
                    $(this).inputmask();
                });

                //
                //$('input.autocomplete').each(function () {
                //    $(this).autocomplete({
                //        noCache: true,
                //        minChars: 3,
                //    });
                //});

                parent.find('input.autocomplete-inline').each(function () {
                    let _lookup = $(this).data('lookup');
                    if (!!_lookup) {
                        _lookup = _lookup.split(',');
                    } else {
                        _lookup = [];
                    }
                    $(this).autocomplete({
                        noCache: true,
                        minChars: 1,
                        noSuggestionNotice: '<p>Нет результатов..</p>',
                        lookup: function (query, done) {
                            // Do Ajax call or lookup locally, when done,
                            // call the callback and pass your results:
                            var _res = [];
                            _lookup.forEach(function (v, k) {
                                _res.push({"value": v, "data": k});
                            });
                            var result = {suggestions: _res};
                            done(result);
                        }
                    });
                });

                parent.find('input.intl-tel').each(function () {
                    var self = $(this);
                    var val = self.val();
                    if (val[0] === '7'){
                        self.val(
                            '+'+val
                        )
                    }
                    self.intlTelInput({
                        formatOnDisplay: false,
                        customPlaceholder: function (selectedCountryPlaceholder, selectedCountryData) {
                            //console.log(selectedCountryPlaceholder.replaceAll(/[0-9]/g, '0'), selectedCountryData);
                            if(selectedCountryData.iso2==='ru'){
                                selectedCountryPlaceholder = selectedCountryPlaceholder.replace(
                                    ' 912 ', ' (912) ');
                            }
                            selectedCountryPlaceholder = selectedCountryPlaceholder.replace(
                                '+' + selectedCountryData.dialCode, ' ');
                            self.inputmask('+' + selectedCountryData.dialCode.replace('9', '\\9')
                                           + ' ' +
                                           selectedCountryPlaceholder.replaceAll(/[0-9]/g, '9'),
                                {
                                    placeholder: '+' + selectedCountryData.dialCode.replace('9', '\\9')
                                                 + ' ' +
                                                 selectedCountryPlaceholder.replaceAll(/[0-9]/g, '_').replaceAll(' ', '-'),

                                    clearMaskOnLostFocus: true,
                                    showMaskOnHover: false,
                                    positionCaretOnClick: 'radixFocus'
                                });
                            return '+' + selectedCountryData.dialCode.replace('9', '\9')
                                   + ' ' +
                                   selectedCountryPlaceholder.replaceAll(/[0-9]/g, '9');
                        },
                        nationalMode: false,
                        /*
                        onlyCountries: ["al", "ad", "at", "by", "be", "ba", "bg", "hr", "cz", "dk",
                                        "ee", "fo", "fi", "fr", "de", "gi", "gr", "va", "hu", "is", "ie", "it", "lv",
                                        "li", "lt", "lu", "mk", "mt", "md", "mc", "me", "nl", "no", "pl", "pt", "ro",
                                        "ru", "sm", "rs", "sk", "si", "es", "se", "ch", "ua", "gb"]*/
                        excludeCountries: ['af', 'al', 'dz', 'as', 'ad', 'ao', 'ai', 'ag', 'aw', 'ac', 'bs', 'bh', 'bd', 'bb', 'bz', 'bj', 'bm', 'bt', 'bo', 'ba', 'bw', 'io', 'vg', 'bn', 'bf', 'bi', 'kh', 'cm', 'cv', 'bq', 'ky', 'cf', 'td', 'cx', 'cc', 'km', 'cd', 'cg', 'ck', 'cr', 'ci', 'cu', 'cw', 'dj', 'dm', 'do', 'ec', 'eg', 'sv', 'gq', 'er', 'ee', 'sz', 'et', 'fk', 'fo', 'fj', 'fi', 'gf', 'pf', 'ga', 'gm', 'gh', 'gi', 'gl', 'gd', 'gp', 'gu', 'gt', 'gg', 'gn', 'gw', 'gy', 'ht', 'hn', 'ir', 'iq', 'im', 'jm', 'je', 'jo', 'ke', 'xk', 'kw', 'kg', 'la', 'lb', 'ls', 'lr', 'ly', 'li', 'mk', 'mg', 'mw', 'my', 'ml', 'mh', 'mq', 'mr', 'mu', 'yt', 'fm', 'md', 'mn', 'ms', 'ma', 'mz', 'mm', 'na', 'nr', 'np', 'nc', 'ni', 'ne', 'ng', 'nu', 'nf', 'kp', 'mp', 'om', 'pk', 'pw', 'ps', 'pa', 'pg', 'py', 'pe', 'ph', 'pr', 're', 'ro', 'rw', 'bl', 'sh', 'kn', 'lc', 'mf', 'pm', 'vc', 'ws', 'sm', 'st', 'sa', 'sn', 'sc', 'sl', 'sx', 'sk', 'sb', 'so', 'za', 'ss', 'lk', 'sd', 'sr', 'sj', 'sy', 'tj', 'tz', 'tl', 'tg', 'tk', 'to', 'tt', 'tn', 'tm', 'tc', 'tv', 'vi', 'ug', 'uy', 'vu', 'va', 've', 'vn', 'wf', 'ye', 'zm', 'zw', 'ax'],
                        placeholderNumberType: "MOBILE",
                        preferredCountries: ['ru'],
                        separateDialCode: false,
                        utilsScript: "/assets/js/intlTelInput-utils.js"
                    });
                });

                parent.find('.consultations .consultation-type').on('change', function (e) {
                    var _parent = $(this).parents('.consultations');
                    var _type   = $(this).val();
                    _parent.find('.consultation').removeClass('selected');
                    _parent.find('.consultation').attr('data-price', '0');
                    _parent.find('[name="consultation_price"]').val(0);

                    _parent.find('.price-list .consultation').hide();
                    _parent.find('.price-list .consultation.' + _type).show();
                    _parent.find('.price-list .consultation.' + _type + ' input:checked')
                        .prop('checked', false);

                    _parent.parents('form').find('.selected-consultation').removeClass('d-flex').addClass('d-none');
                    setTimeout(function () {
                        window.updPrice(_parent.parents('form'));
                    });
                });
                parent.find('.consultations input[name="for_consultation"]').on('change', function (e) {
                    var _parent = $(this).parents('.consultations');
                    _parent.find('.consultation').removeClass('selected');
                    _parent.find('.consultation').attr('data-price', '0');

                    _parent.find('[name="consultation_price"]').val(0);
                    console.log('>> for_consultation:checked', $(this).is(':checked'));
                    _parent.find('.consultation-type:checked').prop('checked', false);

                    _parent.parents('form').find('.selected-consultation').removeClass('d-flex').addClass('d-none');
                    if ($(this).is(':checked')) {
                        _parent.find('input.consultation-type:checked').trigger('change');
                    } else {
                        _parent.find('.admin-editor__patient.price-list .consultation').hide();
                        _parent.find('input.consultation-type:checked').prop('checked', false).trigger('change');
                    }

                    setTimeout(function () {
                        window.updPrice(_parent.parents('form'));
                    });
                });
                parent.find('.consultations .consultation .checkbox input[type="radio"]').on('change', function (e) {
                    var _parent       = $(this).parents('.consultations');
                    var _consultation = $(this).parents('.search__drop-item.consultation');
                    _parent.find('.consultation').removeClass('selected');
                    _parent.find('.consultation').attr('data-price', '0');
                    _parent.find('[name="consultation_price"]').val(0);

                    _parent.parents('form').find('.selected-consultation').removeClass('d-flex').addClass('d-none');

                    if ($(this).is(':checked')) {
                        _consultation.addClass('selected');
                        _parent.find('[name="consultation_price"]').val($(this).data('price'));
                        _consultation.attr('data-price', $(this).data('price'));

                        _parent.parents('form').find('.selected-consultation .consultation-header span').text(
                            $(this).data('name')
                        );
                        _parent.parents('form').find('.selected-consultation .consultation-price').html(
                            utils.formatPrice($(this).data('price')) + ' ₽<sup><b>*</b></sup>'
                        );
                        _parent.parents('form').find('.selected-consultation').removeClass('d-none').addClass('d-flex');
                        setTimeout(function () {
                            window.updPrice(_parent.parents('form'));
                        });
                    }
                });
            } else {

                $('input.datebirthdaypickr').each(function () {
                    console.log($(this).val());
                    new AirDatepicker(this, {
                        selectedDates: [$(this).val() || (new Date())],
                        maxDate: (new Date()),
                        autoClose: true,
                        dateFormat: 'dd.MM.yyyy',
                        timepicker: false
                    });
                });
                $('input.daterangepickr').each(function () {
                    new AirDatepicker(this, {
                        autoClose: true,
                        range: true,
                        multipleDatesSeparator: ' - '
                    });
                });
                $('input.yearpickr').each(function () {
                    let _config = {
                        selectedDates: [$(this).val() || (new Date())],
                        dateFormat: 'yyyy',
                        maxDate: (new Date()),
                        view: 'years',
                        timepicker: false,
                        minView: 'years',
                        autoClose: true
                    };
                    if ($(this).hasClass('empty-date') || $(this).val() == '') {
                        delete _config.selectedDates;
                    }

                    new AirDatepicker(this, _config);
                });

                $('input.datepickr').each(function () {
                    let _config = {
                        timepicker: false,
                        dateFormat: 'dd.MM.yyyy',
                        autoClose: true
                    };

                    if ($(this).val() != '') {
                        _config.selectedDates = [$(this).val()],

                            _config.minDate = $(this).data('min-date') || '';
                        if ($(this).data('max-date')) {
                            _config.maxDate = $(this).data('max-date');
                        }
                    }

                    new AirDatepicker(this, _config);
                });

                $('.input__control.timepickr').each(function (e) {
                    console.log($(this), e);
                    $(this).timepicker({
                        timeFormat: $(this).data('time-format') || 'HH:mm',
                        interval: $(this).data('interval') || 15,
                        minTime: $(this).data('min-time') || '08:00',
                        maxTime: $(this).data('max-time') || '21:00',
                        dynamic: false,
                        dropdown: true,
                        scrollbar: true,
                        change: function (time) {
                            // the input field
                            var element    = $(this),
                                text;
                            // get access to this Timepicker instance
                            var timepicker = element.timepicker();
                            console.log('change', element, element.val(), timepicker);
                            /* is start-time changed...*/
                            if (element.hasClass('event-time-start') && element.val()) {
                                var end_time = $(this).parents('.event-time').find('input.event-time-end');
                                var end_tpkr = end_time.timepicker({
                                    'minTime': element.val(),
                                    'startTime': element.val()
                                });
                                if (end_time.val() < element.val()) {
                                    end_time.val(element.val());
                                }
                            } else {
                                if (element.hasClass('event-time-end') && element.val()) {
                                    var start_time = $(this).parents('.event-time').find('input.event-time-end');

                                    if (start_time.val() > element.val()) {
                                        element.val(start_time.val());
                                    }
                                }
                            }

                        }
                    });
                });
                $('input.datetimepickr').each(function () {
                    new AirDatepicker(this, {
                        selectedDates: [$(this).val() || (new Date())],
                        minHours: 8,
                        maxHours: 20,
                        timepicker: true,
                        autoClose: true,
                        minutesStep: 10,
                        dateFormat: 'dd.MM.yyyy',
                        timeFormat: "HH:mm"
                    });
                });

                $('input[data-inputmask]').each(function () {
                    $(this).inputmask();
                });

                //
                //$('input.autocomplete').each(function () {
                //    $(this).autocomplete({
                //        noCache: true,
                //        minChars: 3,
                //    });
                //});

                $('input.autocomplete-inline').each(function () {
                    let _lookup = $(this).data('lookup');
                    if (!!_lookup) {
                        _lookup = _lookup.split(',');
                    } else {
                        _lookup = [];
                    }
                    $(this).autocomplete({
                        noCache: true,
                        minChars: 1,
                        noSuggestionNotice: '<p>Нет результатов..</p>',
                        lookup: function (query, done) {
                            // Do Ajax call or lookup locally, when done,
                            // call the callback and pass your results:
                            var _res = [];
                            _lookup.forEach(function (v, k) {
                                _res.push({"value": v, "data": k});
                            });
                            var result = {suggestions: _res};
                            done(result);
                        }
                    });
                });

                $('input[type="tel"].intl-tel').each(function () {
                    console.log($(this), 'init tel');
                    $(this).intlTelInput({
                        // allowDropdown: false,
                        autoHideDialCode: false,
                        // autoPlaceholder: "off",
                        // dropdownContainer: document.body,
                        excludeCountries: ['af', 'al', 'dz', 'as', 'ad', 'ao', 'ai', 'ag', 'aw', 'ac', 'bs', 'bh', 'bd', 'bb', 'bz', 'bj', 'bm', 'bt', 'bo', 'ba', 'bw', 'io', 'vg', 'bn', 'bf', 'bi', 'kh', 'cm', 'cv', 'bq', 'ky', 'cf', 'td', 'cx', 'cc', 'km', 'cd', 'cg', 'ck', 'cr', 'ci', 'cu', 'cw', 'dj', 'dm', 'do', 'ec', 'eg', 'sv', 'gq', 'er', 'ee', 'sz', 'et', 'fk', 'fo', 'fj', 'fi', 'gf', 'pf', 'ga', 'gm', 'gh', 'gi', 'gl', 'gd', 'gp', 'gu', 'gt', 'gg', 'gn', 'gw', 'gy', 'ht', 'hn', 'ir', 'iq', 'im', 'jm', 'je', 'jo', 'ke', 'xk', 'kw', 'kg', 'la', 'lb', 'ls', 'lr', 'ly', 'li', 'mk', 'mg', 'mw', 'my', 'ml', 'mh', 'mq', 'mr', 'mu', 'yt', 'fm', 'md', 'mn', 'ms', 'ma', 'mz', 'mm', 'na', 'nr', 'np', 'nc', 'ni', 'ne', 'ng', 'nu', 'nf', 'kp', 'mp', 'om', 'pk', 'pw', 'ps', 'pa', 'pg', 'py', 'pe', 'ph', 'pr', 're', 'ro', 'rw', 'bl', 'sh', 'kn', 'lc', 'mf', 'pm', 'vc', 'ws', 'sm', 'st', 'sa', 'sn', 'sc', 'sl', 'sx', 'sk', 'sb', 'so', 'za', 'ss', 'lk', 'sd', 'sr', 'sj', 'sy', 'tj', 'tz', 'tl', 'tg', 'tk', 'to', 'tt', 'tn', 'tm', 'tc', 'tv', 'vi', 'ug', 'uy', 'vu', 'va', 've', 'vn', 'wf', 'ye', 'zm', 'zw', 'ax'],
                        // formatOnDisplay: false,
                        // geoIpLookup: function(callback) {
                        //   $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
                        //     var countryCode = (resp && resp.country) ? resp.country : "";
                        //     callback(countryCode);
                        //   });
                        // },
                        hiddenInput: "full_number",
                        // initialCountry: "auto",
                        // localizedCountries: { 'de': 'Deutschland' },
                        // nationalMode: false,
                        // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
                        placeholderNumberType: "MOBILE",
                        preferredCountries: ['ru'],
                        // separateDialCode: true,
                        utilsScript: "/assets/js/intlTelInput-utils.js"
                    });
                });
            }

        };

        $(document).on('click', 'a.login, a.signout', function() {
            localStorage.removeItem('db.quoteStatus');
            localStorage.removeItem('db.quoteType');
            localStorage.removeItem('db.quotePay');
            localStorage.removeItem('db.categories');
            localStorage.removeItem('db.labCategories');

            sessionStorage.removeItem('db.services');
            sessionStorage.removeItem('db.servicesList');
            sessionStorage.removeItem('db.servicePrices');

            /* old keys clear */
            sessionStorage.removeItem('db.experts');
            sessionStorage.removeItem('db.expert_users');
            sessionStorage.removeItem('db.experts_alt');
            sessionStorage.removeItem('db.expert_list');
            sessionStorage.removeItem('db.expert_user_list');
        });

        $(document).on('wb-verify-false', function(e, el, err) {
            if (err !== undefined) {
                alert(err)
                    //wbapp.toast(wbapp._settings.sysmsg.error, err, { target: '.content-toasts', 'bgcolor': 'warning', 'txcolor': 'white' });
            }
        });

        $(document).on('wb-save-error', function(e, res) {
            if (res.data == undefined) return;
            if (res.data.error == true) {
                alert(res.data.msg)
                    //wbapp.toast(wbapp._settings.sysmsg.error, err, { target: '.content-toasts', 'bgcolor': 'warning', 'txcolor': 'white' });
            }
        });

        $(document).on('wb-ajax-done', function(e, res) {
            if (res.data.error == true) {
                alert(res.data.msg)
                    //wbapp.toast(wbapp._settings.sysmsg.error, err, { target: '.content-toasts', 'bgcolor': 'warning', 'txcolor': 'white' });
            }
        });

        function getCookie(name) {
            var match = document.cookie.match(RegExp('(?:^|;\\s*)' + name + '=([^;]*)'));
            return match ? match[1] : null;
        }

        function setCookie(c_name, value, exdays) {
            var exdate = new Date();
            exdate.setDate(exdate.getDate() + exdays);
            var c_value = escape(value) + ((exdays == null) ? "" : "; expires=" + exdate.toUTCString());
            document.cookie = c_name + "=" + c_value;
        }

        /*
         var map = document.querySelector('#map');
         if (map) {
         new google.maps.Map(map, {
         center: { lat: 55.742403, lng: 37.575313 },
         zoom: 12,
         });
         }
         */

        /*
         var header = $('.header'),
         scrollPrev = 0;

         $(window).scroll(function() {
         var scrolled = $(window).scrollTop();

         if ((scrolled > 10) && (scrolled > scrollPrev)) {
         header.addClass('out');
         } else {
         header.removeClass('out');
         }

         scrollPrev = scrolled;
         });

         */

        //header flip
        /*
         if($('.header__logo').hasClass('header__logo-red')){
         setTimeout(function(){
         $('.header__logo-red').addClass('active');
         }, 2000);
         }
         */

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
        /*
         var swiper = new Swiper('.post-slider', {
         slidesPerView: 1,
         watchOverflow: true,
         spaceBetween: 30,
         });

         */

        if (getCookie('cookok')) {
            $('.cookies-block').remove()
        } else {
            $('.cookies-block').addClass('cookies-block--active')
            $('.cookies-block .cookies-block__accept-button').on('click', function() {
                setCookie('cookok', true, 300)
                $('.cookies-block').removeClass('cookies-block--active')
            })
        }

        // top button
        $('.to_top_btn').click(function() {
            $('html, body').animate({ scrollTop: 0 }, 800);
        })

        if (window.pageYOffset > 10) {
            $('.header').addClass('out');
            $('.to_top_btn').addClass('showed');
        }

        $(window).scroll(function() {
            if ($(this).scrollTop() <= 10) {
                $('.header').removeClass('out');
                $('.to_top_btn').removeClass('showed');
            }
            if ($(this).scrollTop() > 10) {
                $('.header').addClass('out');
                $('.to_top_btn').addClass('showed');
            }
        });
    });

});