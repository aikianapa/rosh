var auth;

function Auth()
{
	this.start_button = $('.btn.enter');

	this.phone_current = null;
	this.sms_code = '';
	this.sms_code_timelife = 60;
	this.timelife_handler = null;

	//Общие функции
	this.set_alert_type = function (target, alert_type){
		if (!!alert_type) {
			target.removeClass('alert-warning').addClass('alert-' + alert_type);
		} else if (target.hasClass('alert-success')) {
			target.removeClass('alert-success').addClass('alert-warning');
		}
	};
	this.close_all_windows = function(){
		this.phone_window_close();
		this.smscode_window_close();
		this.email_enter_window_close();
		this.registration_window_close();
		this.recover_window_close();
	}

	this.num_word = function(value, words = ['секунда', 'секунды', 'секунд'], show = true){
		var num = value % 100;
		if (num > 19) {
			num = num % 10;
		}

		var out = (show) ?  value + ' ' : '';
		switch (num) {
			case 1:  out += words[0]; break;
			case 2:
			case 3:
			case 4:  out += words[1]; break;
			default: out += words[2]; break;
		}

		return out;
	}

	//Окно ввода номера телефона-----------------------------------
	this.phone_window            = $('.popup.--enter-number');
	this.tel_input               = this.phone_window.find('input[name=tel]');
	this.phone_value             = this.phone_window.find('input[name=phone]');
	this.phone_window_alert      = this.phone_window.find('.alert');
	this.phone_window_close_btn  = this.phone_window.find('.popup__close');
	this.phone_window_submit_btn = this.phone_window.find('.form__submit');

	this.phone_window_close = function(){
		this.phone_window_clear_alert();
		this.phone_value.val('');
		this.phone_window.hide();
	}

	this.phone_window_show = function(){
		this.close_all_windows();
		this.phone_window_submit_btn.attr('disabled', '');
		this.phone_window.show();
	}

	this.phone_window_show_alert = function(message){
		this.phone_window_alert.text(message).show();
	}

	this.phone_window_clear_alert = function(){
		this.phone_window_alert.text('').hide();
	}

	//Окно ввода одноразового пароля
	this.smscode_window = $('.popup.--code');
	this.smscode_window_current_phone = this.smscode_window.find('.current_phone');
	this.smscode_window_lifetime_count = this.smscode_window.find('.sms_code_lifetime');
	this.smscode_window_digits = this.smscode_window.find('.code__input');
	this.smscode_window_alert = this.smscode_window.find('.alert');
	this.smscode_window_close_btn = this.smscode_window.find('.popup__close');

	this.smscode_window_show = function(){
		this.close_all_windows();
		this.smscode_window.show();
		this.smscode_window_current_phone.text(this.phone_current);

		var _this = this;
		var cur_timelife = this.sms_code_timelife;
		this.smscode_window_lifetime_count.text(this.num_word(cur_timelife));
		this.timelife_handler = setInterval(function(){
			if(cur_timelife <= 0){
				clearInterval(_this.timelife_handler);
				_this.smscode_window_close();
			} else {
				_this.smscode_window_lifetime_count.text(_this.num_word(cur_timelife))
			}
			cur_timelife -= 1;
		}, 1000);
	}

	this.smscode_window_clear_alert = function(){
		this.smscode_window_alert.text('').hide();
	}

	this.smscode_window_close = function(){
		this.smscode_window_clear_alert();
		this.smscode_window_digits.val('');
		this.smscode_window.hide();
	}

	this.smscode_window_show_alert = function(message, alert_type) {
		this.set_alert_type(this.smscode_window_alert, alert_type);
		this.smscode_window_alert.text(message).show();
	}

	this.smscode_window_clear_alert = function(){
		this.set_alert_type(this.smscode_window_alert);
		this.smscode_window_alert.text('').hide();
	}

	//Окно входа по email
	this.email_enter_window = $('.popup.--email-enter');
	this.email_enter_window_login_btn = this.email_enter_window.find('.login');
	this.email_enter_window_email = this.email_enter_window.find('input[name=login]');
	this.email_enter_window_password = this.email_enter_window.find('input[name=password]');
	this.email_enter_window_alert = this.email_enter_window.find('.alert');

	this.email_enter_window_show = function(){
		this.close_all_windows();
		this.email_enter_window.show();
	}

	this.email_enter_window_close = function(){
		this.email_enter_window_clear_alert();
		this.email_enter_window_clear_fields();
		this.email_enter_window.hide();
	}

	this.email_enter_window_show_alert = function(message, alert_type){
		this.set_alert_type(this.email_enter_window_alert, alert_type);
		this.email_enter_window_alert.text(message).show();
	}

	this.email_enter_window_clear_alert = function(){
		this.set_alert_type(this.email_enter_window_alert);
		this.email_enter_window_alert.text('').hide();
	}

	this.email_enter_window_clear_fields = function(){
		this.email_enter_window_email.val('');
		this.email_enter_window_password.val('');
	}

	//Окно регистрации
	this.registration_window = $('.popup.--reg');
	this.registration_window_email_busy_alert = this.registration_window.find('.email_is_busy');
	this.registration_window_email_do_register_btn = this.registration_window.find('.do_register');
	this.registration_window_email_value = this.registration_window.find('input[type=email]');
	this.registration_window_alert = this.registration_window.find('.alert');

	this.registration_window_show = function(){
		this.close_all_windows();
		this.registration_window.show();
	}

	this.registration_window_close = function(){
		this.registration_window_email_busy_alert_hide();
		this.registration_window_clear_alert();
		this.registration_window.hide();
	}

	this.registration_window_email_busy_alert_show = function(){
		this.registration_window_email_busy_alert.show();
	}

	this.registration_window_email_busy_alert_hide = function(){
		this.registration_window_email_busy_alert.hide();
	}

	this.registration_window_show_alert = function(message, alert_type){
		if (!!alert_type) {
			this.registration_window_alert.removeClass('alert-warning').addClass('alert-' + alert_type);
		} else if(this.registration_window_alert.hasClass('alert-success')) {
			this.registration_window_alert.removeClass('alert-success').addClass('alert-warning');
		}
		this.set_alert_type(this.registration_window_alert, alert_type);
		this.registration_window_alert.text(message).show();

	}

	this.registration_window_clear_alert = function(){
		this.set_alert_type(this.registration_window_alert);
		this.registration_window_alert.text('').hide();
	}

	//Окно восстановления пароля
	this.recover_window = $('.popup.--email-recover');
	this.recover_window_alert = this.recover_window.find('.alert');
	this.recover_window_do_recover_btn = this.recover_window.find('.do_recover');
	this.recover_window_email_value = this.recover_window.find('input[type=email]');

	this.recover_window_show = function(){
		this.close_all_windows();
		this.recover_window.show();
	}

	this.recover_window_close = function(){
		this.recover_window_clear_alert();
		this.recover_window.hide();
	}

	this.recover_window_show_alert = function(message, alert_type) {
		this.set_alert_type(this.recover_window_alert, alert_type);
		this.recover_window_alert.text(message).show();
	}

	this.recover_window_clear_alert = function(){
		this.set_alert_type(this.recover_window_alert);
		this.recover_window_alert.text('').hide();
	}

}

$(document).ready(function() {
	auth = new Auth();

	//Устанавливаем и проверяем маску
	//auth.phone_value.mask('+7 (999) 999-99-99');

	//auth.phone_value.mask('+9 (999) 999-99-99');
	var iti = auth.phone_value.intlTelInput({
		// allowDropdown: false
		// autoHideDialCode: true,
		// dropdownContainer: document.body,
		// excludeCountries: ["us"],
		 formatOnDisplay: false,
		// geoIpLookup: function(callback) {
		//   $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
		//     var countryCode = (resp && resp.country) ? resp.country : "";
		//     callback(countryCode);
		//   });
		// },
		customPlaceholder: function (selectedCountryPlaceholder, selectedCountryData) {
			//console.log(selectedCountryPlaceholder.replaceAll(/[0-9]/g, '0'), selectedCountryData);
			selectedCountryPlaceholder = selectedCountryPlaceholder.replace(
				'+'+selectedCountryData.dialCode, '');
			auth.phone_value.inputmask('+' + selectedCountryData.dialCode.replace('9', '\\9')
			                           + ' ' +
			                           selectedCountryPlaceholder.replaceAll(/[0-9]/g, '9'),
				{placeholder: '+' + selectedCountryData.dialCode.replace('9', '\\9')
				              + ' ' +
				              selectedCountryPlaceholder.replaceAll(/[0-9]/g, '_').replaceAll(' ', '-'),
					clearMaskOnLostFocus:true, showMaskOnHover: false, positionCaretOnClick: 'radixFocus'});
			return '+' + selectedCountryData.dialCode.replace('9', '\\9')
			       + ' ' +
			       selectedCountryPlaceholder.replaceAll(/[0-9]/g, '9');
		},

		// hiddenInput: "phones",
		// initialCountry: "auto",
		// localizedCountries: { 'de': 'Deutschland' },
		nationalMode: false,
		onlyCountries: ["al", "ad", "at", "by", "be", "ba", "bg", "hr", "cz", "dk",
		                "ee", "fo", "fi", "fr", "de", "gi", "gr", "va", "hu", "is", "ie", "it", "lv",
		                "li", "lt", "lu", "mk", "mt", "md", "mc", "me", "nl", "no", "pl", "pt", "ro",
		                "ru", "sm", "rs", "sk", "si", "es", "se", "ch", "ua", "gb"],
		placeholderNumberType: "FIXED_LINE",
		preferredCountries: ['ru'],
		separateDialCode: false,
		utilsScript: "/assets/js/intlTelInput-utils.js"
	});
	auth.phone_value.on('keyup input change blur', function () {
		auth.phone_window.find('.phone-error-msg.visible').removeClass('visible');

		if ($(this).inputmask('isComplete')) {
			console.log('is complete!', $(this).val());

			if ($(this).intlTelInput('isValidNumber')) {
				auth.phone_window_submit_btn.removeAttr('disabled');
			} else {
				auth.phone_window.find('.phone-error-msg').addClass('visible');
				auth.phone_window_submit_btn.attr('disabled', '');
			}
		} else {
			auth.phone_window_submit_btn.attr('disabled', '');
		}
	});

	//Дополнительные события для кнопок
	auth.phone_window_close_btn.on('click', function () {
		auth.phone_window_close();
	})

	auth.start_button.click(function(){
		auth.phone_window_show();
	})

	//Получаем код
	auth.phone_window_submit_btn.on('click', function(e){
		e.preventDefault();
		auth.phone_current = auth.phone_value.val();

		$.ajax({
			url: '/form/phoneAuth/get_code',
			method: 'POST',
			data: {
				phone: auth.phone_current,
			},
			success: function(data){
				let res = JSON.parse(data);

				if(res.status === 'error'){
					auth.phone_window_show_alert(res.message);
				}else{
					auth.phone_window_close();
					auth.smscode_window_show();
					//console.log(res.password);
				}
			}
		})
	})

	auth.smscode_window_digits.mask('9', {placeholder: ''});

	//Обрабатываем ввод цифр
	auth.smscode_window_digits.on('keyup', function(e){

		if (e.key === "Backspace") {
			var prev = $(this).prev();
			if (prev.length){
				prev.focus();
			}
			return false;
		}

		$(this).next().focus();
		auth.sms_code = '';
		$.each(auth.smscode_window_digits, function(digit, item){
			auth.sms_code += $(item).val();
		})

		if(auth.sms_code.length === 6){
			$.ajax({
				url: '/form/phoneAuth/check_code',
				method: 'POST',
				data: {
					phone: auth.phone_current,
					code: auth.sms_code
				},
				success: function(data){

					auth.smscode_window_show_alert(data.message, (data.status === 'ok') ? 'success' : '');

					if(data.status === 'ok'){

						$.ajax({
							url: '/form/phoneAuth/createUser',
							data: {
								phone: auth.phone_current,
								password: auth.sms_code
							},
							method: 'POST',
							success: function(data){
								if(data.status === 'ok'){
									location.replace(data.user.group.url_login);
								}else{
									console.warn(data);
								}
							}
						})
					}
				}
			})
		}
	})

	auth.smscode_window_close_btn.on('click', function(){
		auth.smscode_window_close();
	})

	//Авторизация по email

	$('.email_window_show').on('click', function(){
		auth.email_enter_window_show();
	})

	auth.email_enter_window_login_btn.on('click', function(){
		auth.email_enter_window_clear_alert();
		$.ajax({
			url: '/form/emailAuth/login',
			method: 'POST',
			data: {
				email: auth.email_enter_window_email.val(),
				password: auth.email_enter_window_password.val()
			},
			success: function(data){
				if(data.status === 'ok'){
					auth.email_enter_window_show_alert(data.message, 'success');
					location.replace(data.user.group.url_login);
				}else{
					auth.email_enter_window_clear_fields();
					auth.email_enter_window_show_alert(data.message);
				}
			}
		})
	})

	//Регистрация по email
	auth.registration_window_email_do_register_btn.on('click', function(){

		var email = auth.registration_window_email_value.val();

		if(email !== ''){

			auth.registration_window_email_busy_alert_hide();
			auth.registration_window_clear_alert();

			$.ajax({
				url: '/form/emailAuth/register',
				method: 'POST',
				data: {
					email: email,
				},
				success: function(data){

					switch (data.status){
						case 'busy':
							auth.registration_window_email_busy_alert_show();
							break;
						case 'ok':
							auth.registration_window_email_busy_alert_hide();
							auth.registration_window_show_alert(data.message, 'success');
							location.replace(data.user.group.url_login);
							break;
						case 'error':
							auth.registration_window_show_alert(data.message);
							break;
					}
				}
			})
		}
	})

	//Восстановление пароля
	auth.recover_window_do_recover_btn.on('click', function(){
		var email = auth.recover_window_email_value.val();

		auth.recover_window_clear_alert();
		if(email !== ''){

			$.ajax({
				url: '/form/emailAuth/recover',
				method: 'POST',
				data: {
					email: email,
				},
				success: function(data){
					if(data.status === 'ok'){
						setTimeout(function(){
							auth.recover_window_close();
						}, 3000);
					}

					auth.recover_window_show_alert(data.message, (data.status === 'ok') ? 'success' : '');
				}
			})
		}
	})


})