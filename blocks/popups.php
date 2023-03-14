<view>
	<a class="phone --openpopup" href="javascript:void(0)" data-popup="--fast"
		wb-if="in_array('{{_sess.user.role}}',['','client'])">
		<svg class="svgsprite _phone">
			<use xlink:href="/assets/img/sprites/svgsprites.svg?v=2#phone"></use>
		</svg>
	</a>
	<div class="popup --message">
		<template id="popupMessage">
			<div class="popup__overlay"></div>
			<div class="popup__wrapper">
				<div class="popup__panel">
					<button class="popup__close" on-click="close">
						<svg class="svgsprite _close">
							<use xlink:href="/assets/img/sprites/svgsprites.svg#close"></use>
						</svg>
					</button>
					<div class="popup__name text-bold">{{caption}}</div>
					<h3 class="h3">{{title}}</h3>
					<p class="text-grey">{{subtitle}}</p>
					<div>
						{{{html}}}
					</div>
				</div>
			</div>
		</template>
	</div>

	<div wb-if="in_array('{{_sess.user.role}}',['admin','','main','client'])">
		<wb-module wb="module=yonger&mode=render&view=popups-login"/>
		<div class="popup --fast">
			<template>
				<div class="popup__overlay"></div>
				<div class="popup__wrapper">
					<div class="popup__panel">
						<button class="popup__close">
							<svg class="svgsprite _close">
								<use xlink:href="/assets/img/sprites/svgsprites.svg#close"></use>
							</svg>
						</button>
						<div class="popup__name text-bold">Обратная связь</div>
						<form class="popup__form" method="post">
							<input type="hidden" name="client" value="{{user.id}}">

							<div class="input input--grey">
								<input class="input__control" name="fullname"
									value="{{user.fullname}}"
									type="text" placeholder="ФИО"
									required>
								<div class="input__placeholder">ФИО</div>
							</div>
							<div class="input input--grey">
								<input class="input__control intl-tel" name="phone"
									value="{{user.phone}}"
									type="tel" required>
								<div class="input__placeholder active">Номер телефона</div>
							</div>
							<div class="input input--grey">
							<textarea class="input__control"
								name="client_comment" placeholder="Причина обращения" required>{{comment}}</textarea>
								<div class="input__placeholder">Причина обращения</div>
							</div>
							<div class="form__description">Нажимая на кнопку "Перезвонить мне", Вы даете согласие на обработку своих персональных данных на основании
								<a href="/policy">Политики конфиденциальности</a></div>
							<button class="btn btn--black form__submit" type="button" on-click="submit">Перезвонить мне</button>

							{{#if user.id}}
							{{else}}
							<div class="form-bottom">После отправки заявки для Вас будет создан Личный кабинет, в&nbsp;который можно попасть через кнопку &laquo;Войти&raquo; в&nbsp;верхнем меню сайта</div>
							{{/if}}
						</form>
					</div>
					<div class="popup__panel --succed">
						<button class="popup__close">
							<svg class="svgsprite _close">
								<use xlink:href="/assets/img/sprites/svgsprites.svg#close"></use>
							</svg>
						</button>
						<div class="popup__name text-bold">Быстрая запись</div>
						<h3 class="h3">Успешно !</h3>
						<p class="text-grey">Мы перезвоним Вам в ближайшее время</p>
					</div>
				</div>

			</template>
		</div>
		<script wbapp>
			var createFastQuote = function (client_id, client_comment, experts) {
				var quote        = {};
				quote.group      = 'quotes';
				quote.status     = 'new';
				quote.pay_status = 'free';
				quote.client     = client_id;
				quote.priority   = 0;
				quote.marked     = false;

				quote.comment        = '';
				quote.recommendation = '';
				quote.description    = '';
				quote.price          = 0;
				if (experts) {
					quote.experts = experts;
				}

				toast_success('Мы перезвоним Вам в ближайшее время!');
				quote.event_date       = '';
				quote.event_time       = '';
				quote.event_time_start = '';
				quote.event_time_end   = '';

				quote.longterm_date_end = '';
				quote.longterm_title    = '';

				quote.photos         = {before: [], after: []};
				quote.client_comment = client_comment;
				quote.__token        = wbapp._settings.devmode === 'on' ? '123' : wbapp._session.token;

				window.api.post(
					'/api/v2/create/records/', quote).then(
					function (data) {
						if (data.error) {
							wbapp.trigger('wb-save-error',
								{'data': data});
						} else {
							$('.popup.fast-form-block').show();
							$('.popup.fast-form-block .popup__panel:not(.--succed)')
								.addClass('d-none');
							$('.popup.fast-form-block .popup__panel.--succed')
								.addClass('d-block');
						}
					});
			};
			var popFast22       = new Ractive({
				el: '.popup.--fast',
				template: document.querySelector('.popup.--fast > template').innerHTML,
				data: {
					user: wbapp._session.user
				},
				on: {
					complete() {
						var self = this;
						setTimeout(function () {
							if (wbapp._session.user) {
								if (wbapp._session.user.phone[0] === '7') {
									wbapp._session.user.phone = '+' + wbapp._session.user.phone;
									self.set('user', wbapp._session.user);
								}
							}
							if ($('[name="quote_page_comment"]').length) {
								self.set('comment', $('[name="quote_page_comment"]').val().trim());
							}

							console.log('init tel', $(self.el).find('input.intl-tel'));
							$(self.el).find('input.intl-tel').each(function () {
								var self = $(this);
								self.intlTelInput({
									formatOnDisplay: false,
									customPlaceholder: function (selectedCountryPlaceholder, selectedCountryData) {
										//console.log(selectedCountryPlaceholder.replaceAll(/[0-9]/g, '0'), selectedCountryData);
										selectedCountryPlaceholder = selectedCountryPlaceholder.replace(
											'+' + selectedCountryData.dialCode, ' ');
										self.inputmask('+' + selectedCountryData.dialCode.replace('9', '\\9')
										               + ' ' +
										               selectedCountryPlaceholder.replaceAll(/[0-9]/g, '9'),
											{
												placeholder: '+' + selectedCountryData.dialCode.replace('9', '\\9')
												             + ' ' +
												             selectedCountryPlaceholder.replaceAll(/[0-9]/g, '_')
													             .replaceAll(' ', '-'),

												clearMaskOnLostFocus: true,
												showMaskOnHover: false,
												positionCaretOnClick: 'radixFocus'
											});
										return '+' + selectedCountryData.dialCode.replace('9', '\\9')
										       + ' ' +
										       selectedCountryPlaceholder.replaceAll(/[0-9]/g, '9');
									},
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
							});
						}, 2000);
					},
					submit() {
						var form = this.find('.popup.--fast .popup__form');
						if ($(form).verify()) {
							//wbapp.post('/form/quotes/getQuote', post, function (data) {
							//	if (data.error) {
							//		wbapp.trigger('wb-save-error', {'data': data});
							//	} else {
							//		console.log('resp:', data);
							//
							//
							//		$('.popup.--fast .popup__panel:not(.--succed)').addClass('d-none');
							//		$('.popup.--fast .popup__panel.--succed').addClass('d-block');
							//	}
							//});

							var post     = $(form).serializeJSON();
							var expert   = $('input.expert');
							post.experts = [];
							if (expert.length) {
								post.experts.push(expert.val());
							}
							if (!post.client) {
								console.log('try to createProfile: ', post);

								let names = post.fullname.split(' ', 3);
								let keys  = ['last_name', 'first_name', 'middle_name'];
								for (var i = 0; i < names.length; i++) {
									post[keys[i]] = names[i];
								}
								var _token = wbapp._settings.devmode === 'on' ? '123' : wbapp._session.token;
								post.phone = str_replace([' ', '-', '(', ')'], '', post.phone);
								window.api.get('/api/v2/list/users/?role=client&phone=' + post.phone +
								          '&__token=' + _token).then(
									function (data) {
										if (!data.length) {
											window.api.get('/api/v2/list/users/?email=' + post.email +
											          '&__token=' + _token).then(
												function (data) {
													if (!data.length) {
														post.role      = "client";
														post.role      = "client";
														post.confirmed = 0;
														post.active    = "on";
														post.__token   = _token;
														window.api.post('/api/v2/create/users/', post).then(
															function (data) {
																if (data.error) {
																	wbapp.trigger('wb-save-error', {
																		'data': data
																	});
																} else {
																	createFastQuote(data.id, post.client_comment);
																}
															});

													} else {
														toast('Этот e-mail уже используется!', 'Ошибка!', 'error');
														form.find('[name="email"]').focus();
													}
												});
										} else {
											toast('Этот номер уже используется!', 'Ошибка!', 'error');
											form.find('[name="phone"]').focus();
										}
									});
							} else {
								createFastQuote(post.client, post.client_comment);
							}
						}

					}
				}
			});
		</script>
	</div>
	<div class="popup --change-password">
		<template id="popupChangePassword">
			<div class="popup__overlay"></div>
			<div class="popup__wrapper">
				<div class="popup__panel">
					<button class="popup__close" on-click="close">
						<svg class="svgsprite _close">
							<use xlink:href="/assets/img/sprites/svgsprites.svg#close"></use>
						</svg>
					</button>
					<div class="popup__name text-bold">Сменить пароль</div>
					<form class="popup__form" on-submit="submit">
						{{#user}}
						<input type="hidden" name="id" value="{{user.id}}">
						<div class="input">
							<input class="input__control" type="password" required placeholder="Текущий пароль"
								name="old_password">
							<div class="input__placeholder">Текущий пароль</div>
						</div>
						<div class="input">
							<input class="input__control" required type="password" placeholder="Новый пароль"
								name="new_password">
							<div class="input__placeholder">Новый пароль</div>
						</div>
						<div class="input mb-30">
							<input class="input__control" type="password" required placeholder="Повторите пароль"
								name="new_password_repeat" autocomplete="off">
							<div class="input__placeholder">Повторите пароль</div>
						</div>

						<button class="btn btn--black form__submit" type="submit">Сохранить</button>
						{{/user}}
					</form>
				</div>
			</div>
		</template>
	</div>
	<script wbapp>
		window.popupChangePassword = function () {
			return new Ractive({
				el: '.popup.--change-password',
				template: wbapp.tpl('#popupChangePassword').html,
				data: {
					user: wbapp._session.user
				},
				on: {
					complete() {
						var self = this;
						initPlugins($(this.el));

						$(this.el).show();
						//$('body').addClass('noscroll');
					},
					submit(ev) {
						var self  = this;
						var $form = $(ev.node);
						if ($form.verify()) {
							var data = $form.serializeJSON();
							wbapp.loading();

							$.ajax({
								url: '/form/users/change_password',
								method: 'POST',
								data: {
									old_password: data.old_password,
									new_password: data.new_password,
									new_password_repeat: data.new_password_repeat
								},
								complete: function () {
									wbapp.unloading();
								},
								success: function (data) {
									wbapp.unloading();
									if (data.error) {
										toast_error(data.msg);
									} else {
										$(self.el).hide();
										//$('body').removeClass('noscroll');
										toast('Пароль изменен успешно!');
									}
								}
							});
						}
						return false;
					}
				}
			});
		};
	</script>

	<div class="popup --form-send">
		<div class="popup__overlay"></div>
		<div class="popup__wrapper">
			<div class="popup__panel">
				<button class="popup__close">
					<svg class="svgsprite _close">
						<use xlink:href="/assets/img/sprites/svgsprites.svg#close"></use>
					</svg>
				</button>
				<div class="popup__name text-bold">Перезвонить мне</div>
				<h3 class="h3">Успешно !</h3>
				<p class="text-grey">Мы перезвоним Вам в ближайшее время</p>
			</div>
		</div>
	</div>

	<div class="popup --recover-password">
		<div class="popup__overlay"></div>
		<div class="popup__wrapper">
			<div class="popup__panel">
				<button class="popup__close">
					<svg class="svgsprite _close">
						<use xlink:href="/assets/img/sprites/svgsprites.svg#close"></use>
					</svg>
				</button>
				<div class="popup__name text-bold">Восстановление пароля</div>
				<h3 class="h3">Пароль успешно обновлен</h3>
			</div>
		</div>
	</div>

	<div class="popup --fast-make">
		<div class="popup__overlay"></div>
		<div class="popup__wrapper">
			<div class="popup__panel">
				<button class="popup__close">
					<svg class="svgsprite _close">
						<use xlink:href="/assets/img/sprites/svgsprites.svg#close"></use>
					</svg>
				</button>
				<div class="popup__name text-bold">Быстрая запись</div>
				<form class="popup__form">
					<div class="input input--grey">
						<input class="input__control" type="text" placeholder="ФИО">
						<div class="input__placeholder">ФИО</div>
					</div>
					<div class="input input--grey">
						<input class="input__control" type="tel" placeholder="Номер телефона" data-inputmask="'mask': '+7 (999) 999-99-99'">
						<div class="input__placeholder">Номер телефона</div>
					</div>
					<label class="checkbox mainfilter__checkbox hider-checkbox" data-hide-input="expert">
						<input class="checkbox-hidden-next-form" type="checkbox">
						<span></span>
						<div class="checbox__name text-grey">Я не знаю, кого выбрать</div>
					</label>
					<div class="select-form" data-hide="expert">
						<div class="select">
							<div class="select__main">Укажите специалиста</div>
							<div class="select__list">
								<wb-foreach wb="table=experts&limit=5&tpl=false" wb-filter="active=on">
									<div class="select__item">{{name}}</div>
								</wb-foreach>
							</div>
						</div>
					</div>
					<p class="mb-10 text-grey">Необязательно</p>
					<div class="input input--grey">
						<textarea class="input__control" placeholder="Причина обращения"></textarea>
						<div class="input__placeholder">Причина обращения</div>
					</div>
					<div class="form__description">Нажимая на кнопку "Перезвонить мне", Вы даете согласие на обработку своих персональных данных на основании
						<a href="/policy">Политики конфиденциальности</a></div>
					<button class="btn btn--black form__submit">Перезвонить мне</button>
					<div class="form-bottom">После отправки заявки для Вас будет создан Личный кабинет, в&nbsp;который можно попасть через кнопку &laquo;Войти&raquo; в&nbsp;верхнем меню сайта</div>
				</form>
			</div>
			<div class="popup__panel --succed">
				<button class="popup__close">
					<svg class="svgsprite _close">
						<use xlink:href="/assets/img/sprites/svgsprites.svg#close"></use>
					</svg>
				</button>
				<div class="popup__name text-bold">Быстрая запись</div>
				<h3 class="h3">Успешно !</h3>
				<p class="text-grey">Мы перезвоним Вам в ближайшее время</p>
			</div>
		</div>
	</div>

	<div class="popup --service">
		<div class="popup__overlay"></div>
		<div class="popup__wrapper">

			<div class="popup__panel">
				<button class="popup__close">
					<svg class="svgsprite _close">
						<use xlink:href="/assets/img/sprites/svgsprites.svg#close"></use>
					</svg>
				</button>
				<div class="popup__name text-bold">Лицо</div>
				<h2 class="mb-20 h2">Консультация врача</h2>
				<div class="popup__img"><img src="/assets/img/popup/1.jpg" alt=""></div>
				<p class="mb-10 text-bold text-big">На консультации в медицинском центре РОШ врач-дерматолог:</p>
				<div class="text">
					<p class="mb-10">Врач выслушает ваши жалобы, расспросит об образе жизни, аллергических реакциях.</p>
					<p class="mb-10">Проведет дерматологическое обследование всего кожного покрова, пигментный скрининг.</p>
					<p class="mb-10">Назначит дополнительное обследование, лечение, а также даст рекомендации по образу жизни.
					</p>
				</div>
			</div>
		</div>
	</div>

	<div class="popup --service-l">
		<div class="popup__overlay"></div>
		<div class="popup__wrapper">

			<div class="popup__panel">
				<button class="popup__close">
					<svg class="svgsprite _close">
						<use xlink:href="/assets/img/sprites/svgsprites.svg#close"></use>
					</svg>
				</button>
				<div class="popup__name text-bold">Лицо</div>
				<div class="popup__content">
					<h2 class="mb-20 h2">Консультация врача</h2>
					<div class="popup__img"><img src="/assets/img/popup/1.jpg" alt=""></div>
					<p class="mb-10 text-bold text-big">На консультации в медицинском центре РОШ врач-дерматолог:</p>
					<div class="text">
						<p class="mb-10">Врач выслушает ваши жалобы, расспросит об образе жизни, аллергических реакциях.</p>
						<p class="mb-10">Проведет дерматологическое обследование всего кожного покрова, пигментный скрининг.</p>
						<p class="mb-10">Назначит дополнительное обследование, лечение, а также даст рекомендации по образу жизни.
						</p>
					</div>
					<a class="btn btn--black" href="/landing.html">Читать подробнее</a>
				</div>
			</div>
		</div>
	</div>

	<div class="popup --problems">
		<div class="popup__overlay"></div>
		<div class="popup__wrapper">

			<div class="popup__panel">
				<button class="popup__close">
					<svg class="svgsprite _close">
						<use xlink:href="/assets/img/sprites/svgsprites.svg#close"></use>
					</svg>
				</button>
				<div class="popup__name text-bold">Аллергия на коже</div>
				<h2 class="mb-20 h2">Аллергия на коже</h2>
				<div class="text">
					<p class="mb-10">Ответственны за этот процесс клетки иммунной системы – белки крови – иммуноглобулины Е. Они начинают вырабатываться при попадании в организм аллергена, который для каждого человека индивидуален. Аллергия проявляется в виде высыпаний, шелушения
						и покраснения кожных покровов, зуда, часто – затруднение дыхания, насморк, слезоточивость.жизни.</p>
				</div>
				<div class="popup__img"><img src="/assets/img/popup/1.jpg" alt=""></div>
				<h2 class="mb-20 h2">Лечение в Rosh</h2>
				<div class="text">
					<p class="mb-10">Диагноз «аллергия» ставится после проведения соответствующей диагностики: кожных проб и анализа крови, в некоторых случаях, при помощи лабораторных исследований можно выявить конкретный аллерген, но не всегда. В медицинском центре ROSH
						для диагностики и лечения аллергии мы также применяем биорезонансный аппарат BICOM.</p>
				</div>
				<div class="row mb-30">
					<div class="col-md-6">
						<div class="popup__img"><img src="/assets/img/popup/1.jpg" alt=""></div>
					</div>
					<div class="col-md-6">
						<div class="popup__img"><img src="/assets/img/popup/1.jpg" alt=""></div>
					</div>
				</div>
				<a class="btn btn--black" href="#">Читать подробнее</a>
			</div>
		</div>
	</div>

	<div class="popup --filter">
		<div class="popup__overlay"></div>
		<div class="popup__wrapper">

			<div class="popup__panel">
				<button class="popup__close">
					<svg class="svgsprite _close">
						<use xlink:href="/assets/img/sprites/svgsprites.svg#close"></use>
					</svg>
				</button>
				<div class="popup__name text-bold">Расшифровка анализов</div>
				<form class="popup__form">
					<div class="radios --flex">
						<label class="text-radio">
							<input type="radio" name="status2">
							<span>Заявка</span>
						</label>
						<label class="text-radio">
							<input type="radio" name="status2">
							<span>Событие</span>
						</label>
					</div>
					<div class="input">
						<input class="input__control" type="text" placeholder="ФИО">
						<div class="input__placeholder">ФИО</div>
					</div>
					<div class="select-form">
						<div class="select">
							<div class="select__main">Все услуги</div>
							<div class="select__list">
								<div class="select__item">Все услуги</div>
								<div class="select__item">Все услуги</div>
								<div class="select__item">Все услуги</div>
								<div class="select__item">Все услуги</div>
							</div>
						</div>
					</div>
					<div class="input">
						<input class="input__control" type="tel" placeholder="Телефон" data-inputmask="'mask': '+7 (999) 999-99-99'">
						<div class="input__placeholder">Телефон</div>
					</div>
					<div class="select-form">
						<div class="select">
							<div class="select__main">Все услуги</div>
							<div class="select__list">
								<div class="select__item">Все специалисты</div>
								<div class="select__item">Все специалисты</div>
								<div class="select__item">Все специалисты</div>
								<div class="select__item">Все специалисты</div>
							</div>
						</div>
					</div>
					<div class="select-form">
						<div class="select">
							<div class="select__main">Статус</div>
							<div class="select__list">
								<div class="select__item">Статус</div>
								<div class="select__item">Статус</div>
								<div class="select__item">Статус</div>
								<div class="select__item">Статус</div>
							</div>
						</div>
					</div>
					<div class="popup__block">
						<p class="mb-10 text-bold">Тип события</p>
					</div>
					<div class="radios --flex">
						<label class="text-radio">
							<input type="radio" name="status22">
							<span>В клинике</span>
						</label>
						<label class="text-radio">
							<input type="radio" name="status22">
							<span>Онлайн</span>
						</label>
					</div>
					<div class="calendar input mb-30">
						<input class="input__control daterangepickr" type="text" placeholder="За весь период">
						<div class="input__placeholder">За весь период</div>
					</div>
					<button class="btn btn--black">Найти</button>
				</form>
			</div>
		</div>
	</div>

	<div class="popup --photo-edit">
		<template id="popupPhotoEdit">
			<div class="popup__overlay"></div>
			<div class="popup__wrapper">

				<div class="popup__panel">
					<button class="popup__close">
						<svg class="svgsprite _close">
							<use xlink:href="/assets/img/sprites/svgsprites.svg#close"></use>
						</svg>
					</button>
					<div class="popup__name text-bold">Редактор фото</div>
					<form class="popup__form">
						<input type="hidden" name="id" value="{{photo.id}}">
						<div class="edit-photo">
							<div class="--flex --aicn">
								<div class="edit-photo__pic"><img src="{{photo.file.src}}" alt=""></div>
								<div class="edit-photo__info">
									<div class="edit-photo__name">{{photo.clientData.name}}</div>
									<div class="edit-photo__date">{{photo.date}}</div>
								</div>
							</div>
							<div class="edit-photo__delete">
								<svg class="svgsprite _delete">
									<use xlink:href="/assets/img/sprites/svgsprites.svg#delete"></use>
								</svg>
							</div>
						</div>
						<div class="search-form input">
							<input class="input__control" type="text" placeholder="Выбрать пациента">
							<div class="input__placeholder">Выбрать пациента</div>
						</div>
						<div class="mb-20 input calendar">
							<input class="input__control datepickr" type="text" value="{{photo.date}}" placeholder="Выбрать дату посещения">
							<div class="input__placeholder">Выбрать дату посещения</div>
						</div>
						<div class="popup-title__checkbox">
							<p class="mb-10">Выбрать статус</p>
							<label class="mb-10 checkbox show-checkbox" data-show-input="longterm">
								<input type="checkbox">
								<span></span>
								<div class="checbox__name">Продолжительное лечение</div>
							</label>
							<div class="mb-20 input calendar" style="display:none;" data-show="longterm">
								<input class="input__control datepickr" type="text" value="{{photo.longterm}}" placeholder="Название продолжительного лечения">
								<div class="input__placeholder">Название продолжительного лечения</div>
							</div>
						</div>
						<div class="radios --flex">
							<label class="text-radio">
								<input type="radio" name="status233">
								<span>В клинике</span>
							</label>
							<label class="text-radio">
								<input type="radio" name="status233">
								<span>Онлайн</span>
							</label>
						</div>

						<div class="filepicker">
							<textarea type="json" name="file" class="d-none filepicker-data"></textarea>
							<!-- Button Bar -->
							<div class="button-bar">
								<button class="btn btn-success fileinput">
									<div class="file-photo__ico">
										<svg class="svgsprite _file">
											<use xlink:href="/assets/img/sprites/svgsprites.svg#file"></use>
										</svg>
									</div>
									<input type="file" id="image-select" name="files[]" class="wb-unsaved">
									<input type="hidden" name="upload_url" value="/uploads/client-photos" class="wb-unsaved">
									<input type="hidden" name="prevent_img" class="wb-unsaved">
								</button>
							</div>
							<script wb-app>
								wbapp.loadScripts(["/engine/modules/filepicker/filepicker.js"], "filepicker-js");
							</script>
						</div>
						<label class="file-photo" for="image-select">
							<div class="file-photo__text text-grey">Для загрузки фото заполните все поля
								<br>Фото не должно
								превышать 10 мб
							</div>
						</label>
						<button class="btn btn--white">Сохранить</button>
					</form>
				</div>
			</div>
		</template>
	</div>

	<div class="popup --create-recover">
		<div class="popup__overlay"></div>
		<div class="popup__wrapper">

			<div class="popup__panel">
				<button class="popup__close">
					<svg class="svgsprite _close">
						<use xlink:href="/assets/img/sprites/svgsprites.svg#close"></use>
					</svg>
				</button>
				<div class="popup__name text-bold">Создать карточку пациента</div>
				<form class="popup__form">
					<div class="input">
						<input class="input__control" type="text" placeholder="ФИО">
						<div class="input__placeholder">ФИО</div>
					</div>
					<div class="input">
						<input class="input__control datebirthdaypickr" type="text" placeholder="Дата рождения">
						<div class="input__placeholder">Дата рождения</div>
					</div>
					<a class="mb-10 --flex --jcfe" href="#"> Забыли пароль?</a>
					<div class="input mb-30">
						<input class="input__control" type="tel" placeholder="Номер телефона" data-inputmask="'mask': '+7 (999) 999-99-99'">
						<div class="input__placeholder">Номер телефона</div>
						<div class="phone-alert">
							<p>Данный номер уже используется</p>
							<svg class="svgsprite _alert-grey">
								<use xlink:href="/assets/img/sprites/svgsprites.svg#alert-grey"></use>
							</svg>
						</div>
					</div>
					<button class="btn btn--black form__submit --switchpopup" data-popup="--code">Создать</button>
					<div class="form-bottom">После отправки заявки для пациента создан Личный кабинет, в&nbsp;который можно попасть через кнопку &laquo;Войти&raquo; в&nbsp;верхнем меню сайта</div>
				</form>
			</div>
		</div>
	</div>
</view>

<edit header="Все попапы">
	<div>
		<wb-module wb="module=yonger&mode=edit&block=common.inc"/>
	</div>
</edit>