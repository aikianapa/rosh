<view>
	<a class="phone --openpopup" href="#" data-popup="--fast">
		<svg class="svgsprite _phone">
			<use xlink:href="/assets/img/sprites/svgsprites.svg#phone"></use>
		</svg>
	</a>


	<div>
		<wb-module wb="module=yonger&mode=render&view=popups-login"/>
	</div>
	<script>
		var catalog      = {};
		var servicesList = [];
		var serviceTags  = {
			"face": {
				"name": "Лицо",
				"color": "yellow"
			},
			"body": {
				"name": "Тело",
				"color": "green"
			},
			"hair": {
				"name": "Волосы",
				"color": "red"
			},
			"gyn": {
				"name": "Гинекология",
				"color": "blue"
			},
			"lab": {
				"name": "Лаборатория",
				"color": "purple"
			}
		};
		fetch('/api/v2/func/catalogs/getQuoteStatus', {
			method: 'GET'
		}).then((response) => {
			return response.json();
		}).then(function (data) {
			catalog.quoteStatus = data;
		});
		fetch('/api/v2/func/catalogs/getQuotePay', {
			method: 'GET'
		}).then((response) => {
			return response.json();
		}).then(function (data) {
			catalog.quotePay = data;
		});
		fetch('/api/v2/func/catalogs/getQuoteType', {
			method: 'GET'
		}).then((response) => {
			return response.json();
		}).then(function (data) {
			catalog.quoteType = data;
		});
		wbapp.get('/api/v2/list/services?active=on', function (res) {
			console.log('services', res);

			let _services = {};
			res.forEach(function (service, i) {
				_services[service.id] = service;
				const _cats           = service.category;
				const _tags           = [];
				const _price          = 0.0;

				_cats.forEach(function (cat) {
					_tags.push({
						"id": cat,
						"color": serviceTags[cat].color,
						"tag": Array.from(serviceTags[cat].name)[0]
					});
				});

				service.blocks.landing_price.price.forEach(function (serv_price, j) {
					if (serv_price.price == 0) {
						return;
					}
					let _item = {
						value: serv_price.header,
						id: service.id + '-' + j,
						data: {
							service_id: service.id,
							service_title: service.header,
							tags: _tags,
							price: serv_price.price,
							price_id: j
						}
					};
					servicesList.push(_item);
				});
			});
			console.log('services:', _services);
			catalog.services = _services;
		});
		wbapp.get('/api/v2/list/experts?active=on', function (res) {
			console.log('experts:', res);
			let _experts = {};
			res.forEach(function (expert, i) {
				_experts[expert.id] = expert;
			});
			console.log('experts:', _experts);
			catalog.experts = _experts;
		});
		wbapp.get('/api/v2/list/catalogs/srvcat', function (res) {
			let _serviceCats = {};
			Object.keys(res.tree.data).forEach(function (_key) {
				const _cat = res.tree.data[_key];
				if (_cat.active != 'on') {
					return;
				}
				_serviceCats[_cat.id] = {
					'id': _cat.id,
					'name': _cat.name,
					'color': _cat.data.color
				};
			});
			console.log('srvcat:', _serviceCats);
			catalog.categories = _serviceCats;
		});
	</script>

	<div class="popup --fast">
		<template>
			<div class="popup__overlay"></div>
			<div class="popup__panel">
				<button class="popup__close">
					<svg class="svgsprite _close">
						<use xlink:href="/assets/img/sprites/svgsprites.svg#close"></use>
					</svg>
				</button>
				<div class="popup__name text-bold">Обратная связь</div>
				<form class="popup__form" method="post">
					<div class="input input--grey">
						<input class="input__control" name="fullname" type="text" placeholder="ФИО"
							required>
						<div class="input__placeholder">ФИО</div>
					</div>
					<div class="input input--grey">
						<input class="input__control" name="phone" type="tel" placeholder="Номер телефона" data-inputmask="'mask': '+7 (999) 999-99-99'" required>
						<div class="input__placeholder">Номер телефона</div>
					</div>
					<div class="input input--grey">
						<textarea class="input__control" name="comment" placeholder="Причина обращения" required></textarea>
						<div class="input__placeholder">Причина обращения</div>
					</div>
					<div class="form__description">Нажимая на кнопку "Перезвонить мне", Вы даете согласие на обработку своих персональных данных на основании
						<a href="/policy">Политики конфиденциальности</a></div>
					<button class="btn btn--black form__submit" type="button" on-click="submit">Перезвонить мне</button>
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
		</template>
	</div>
	<script wbapp remove>
		let popFast = new Ractive({
			el: '.popup.--fast',
			template: document.querySelector('.popup.--fast > template').innerHTML,
			data: {},
			on: {
				submit() {
					let form = this.find('.popup.--fast .popup__form');
					if ($(form).verify()) {
						let post = $(form).serializeJson();
						wbapp.post('/form/quotes/getQuote', post, function (data) {
							if (data.error) {
								wbapp.trigger('wb-save-error', {'data': data});
							} else {
								$('.popup.--fast .popup__panel:not(.--succed)').addClass('d-none');
								$('.popup.--fast .popup__panel.--succed').addClass('d-block');
							}
						});
					}
				}
			}
		});
	</script>

	<div class="popup --form-send">
		<div class="popup__overlay"></div>
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

	<div class="popup --recover-password">
		<div class="popup__overlay"></div>
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

	<div class="popup --fast-make">
		<div class="popup__overlay"></div>
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
				<p class="text-grey text-grey mb-10">Необязательно</p>
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

	<div class="popup --service">
		<div class="popup__overlay"></div>
		<div class="popup__panel">
			<button class="popup__close">
				<svg class="svgsprite _close">
					<use xlink:href="/assets/img/sprites/svgsprites.svg#close"></use>
				</svg>
			</button>
			<div class="popup__name text-bold">Лицо</div>
			<h2 class="h2 mb-20">Консультация врача</h2>
			<div class="popup__img"><img src="/assets/img/popup/1.jpg" alt=""></div>
			<p class="text-bold text-big mb-10">На консультации в медицинском центре РОШ врач-дерматолог:</p>
			<div class="text">
				<p class="mb-10">Врач выслушает ваши жалобы, расспросит об образе жизни, аллергических реакциях.</p>
				<p class="mb-10">Проведет дерматологическое обследование всего кожного покрова, пигментный скрининг.</p>
				<p class="mb-10">Назначит дополнительное обследование, лечение, а также даст рекомендации по образу жизни.
				</p>
			</div>
		</div>
	</div>

	<div class="popup --service-l">
		<div class="popup__overlay"></div>
		<div class="popup__panel">
			<button class="popup__close">
				<svg class="svgsprite _close">
					<use xlink:href="/assets/img/sprites/svgsprites.svg#close"></use>
				</svg>
			</button>
			<div class="popup__name text-bold">Лицо</div>
			<div class="popup__content">
				<h2 class="h2 mb-20">Консультация врача</h2>
				<div class="popup__img"><img src="/assets/img/popup/1.jpg" alt=""></div>
				<p class="text-bold text-big mb-10">На консультации в медицинском центре РОШ врач-дерматолог:</p>
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

	<div class="popup --problems">
		<div class="popup__overlay"></div>
		<div class="popup__panel">
			<button class="popup__close">
				<svg class="svgsprite _close">
					<use xlink:href="/assets/img/sprites/svgsprites.svg#close"></use>
				</svg>
			</button>
			<div class="popup__name text-bold">Аллергия на коже</div>
			<h2 class="h2 mb-20">Аллергия на коже</h2>
			<div class="text">
				<p class="mb-10">Ответственны за этот процесс клетки иммунной системы – белки крови – иммуноглобулины Е. Они начинают вырабатываться при попадании в организм аллергена, который для каждого человека индивидуален. Аллергия проявляется в виде высыпаний, шелушения
					и покраснения кожных покровов, зуда, часто – затруднение дыхания, насморк, слезоточивость.жизни.</p>
			</div>
			<div class="popup__img"><img src="/assets/img/popup/1.jpg" alt=""></div>
			<h2 class="h2 mb-20">Лечение в Rosh</h2>
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

	<!--!!! for cabinet !!!-->
	<div class="popup --record">
		<template id="popupNewQuote">
			<div class="popup__overlay"></div>
			<form class="popup__panel" on-submit="submit">
				<button class="popup__close" on-click="cancel">
					<svg class="svgsprite _close">
						<use xlink:href="/assets/img/sprites/svgsprites.svg#close"></use>
					</svg>
				</button>
				<div class="popup__name text-bold">Запись на прием</div>
				<div class="text-bold mb-10">Разделы услуг</div>
				<div class="popups__text-chexboxs">
					{{#each categories}}
					<label class="text-radio">
						<input type="radio" name="service_category" value="{{id}}">
						<span>{{name}}</span>
					</label>
					{{/each}}
				</div>
				<div class="input">
					<input class="search__input" type="text"
						placeholder="Поиск по услугам"
						id="popup-services-list">
					<div class="search__drop">
					</div>
					<button class="search__btn" type="button">
						<svg class="svgsprite _search">
							<use xlink:href="/assets/img/sprites/svgsprites.svg#search"></use>
						</svg>
					</button>
				</div>
				<label class="checkbox checkbox--record show-checkbox" data-show-input="service">
					<input class="checkbox-visible-next-form" type="checkbox"
						name="for_consultation" value="1">
					<span></span>
					<div class="checbox__name">Консультация врача</div>
				</label>
				<div class="select-form" style="display: none;" data-show="service">
					<div class="text-bold mb-20">Тип события</div>
					<div class="popups__text-chexboxs">
						<label class="text-radio">
							<input type="radio" name="type" value="clinic" checked>
							<span>В клинике</span>
						</label>
						<label class="text-radio switch-blocks">
							<input type="radio" name="type" value="online">
							<span>Онлайн</span>
						</label>
					</div>
				</div>
				<label class="checkbox checkbox--record hider-checkbox" data-hide-input="service">
					<input class="checkbox-hidden-next-form" type="checkbox" name="no_services" value="1">
					<span></span>
					<div class="checbox__name">Мне лень искать в списке, скажу администратору</div>
				</label>
				<label class="checkbox checkbox--record hider-checkbox" data-hide-input="expert">
					<input class="checkbox-hidden-next-form" type="checkbox" name="no_experts" value="1">
					<span></span>
					<div class="checbox__name">Я не знаю, кого выбрать</div>
				</label>
				<div class="select-form" data-hide="expert">
					<div class="select">
						<div class="select__main">
							<div class="select__placeholder">Выберите специалиста</div>
							<div class="select__values"></div>
						</div>
						<div class="select__list">
							{{#each experts}}
							<div class="select__item select__item--checkbox">
								<label class="checkbox checkbox--record">
									<input type="checkbox" name="experts[]" value="{{id}}">
									<span></span>
									<div class="checbox__name">
										<div class="select__name">{{name}}</div>
									</div>
								</label>
							</div>
							{{/each}}
						</div>
					</div>
				</div>
				<div class="admin-editor__patient">
					<div class="text-bold mb-10">Выбраны услуги</div>
				</div>
				<div class="admin-editor__summ">
					<p>Всего</p>
					<input type="hidden" name="total_price">
					<p class="total-price">0 ₽</p>
				</div>
				<button class="btn btn--black form__submit" type="submit"> Записаться</button>
			</form>

			<div class="popup__panel --succed">
				<button class="popup__close">
					<svg class="svgsprite _close">
						<use xlink:href="/assets/img/sprites/svgsprites.svg#close"></use>
					</svg>
				</button>
				<div class="popup__name text-bold">Запись на прием</div>
				<h3 class="h3">Успешно!</h3>
				<p class="text-grey">Мы перезвоним Вам в ближайшее время</p>
			</div>
		</template>
	</div>

	<div class="popup --analize-type">

		<template id="popupAnalizeType">
			<div class="popup__overlay"></div>
			<div class="popup__panel">
				<button class="popup__close">
					<svg class="svgsprite _close">
						<use xlink:href="/assets/img/sprites/svgsprites.svg#close"></use>
					</svg>
				</button>
				<div class="popup__name text-bold">Расшифровка анализов</div>
				<form class="popup__form" method="post">
					<div class="text-bold mb-20">Тип события</div>
					<div class="popups__text-chexboxs">
						<label class="text-radio" name="type" value="clinic">
							<input type="radio" name="status">
							<span>В клинике</span>
						</label>
						<label class="text-radio switch-blocks" value="online">
							<input type="radio" name="status">
							<span>Онлайн</span>
						</label>
					</div>
					<p class="text-grey mb-30">Нажмите на способ получения анализа</p>
					<button class="btn btn--black popup__change --openpopup" data-popup="--pay-one">
						Далее
					</button>
				</form>
			</div>
		</template>
	</div>

	<div class="popup --pay">
		<template id="popupPay">
			<div class="popup__overlay"></div>
			<div class="popup__panel">
				<button class="popup__close">
					<svg class="svgsprite _close">
						<use xlink:href="/assets/img/sprites/svgsprites.svg#close"></use>
					</svg>
				</button>
				<div class="popup__name text-bold">Расшифровка анализов</div>
				<h3 class="h3">В ближайшее время с вами свяжутся для определения удобной даты</h3>
				<div class="text-grey text-small mb-10">Стоимость услуги</div>
				<div class="popup-summ">
					<div class="popup-summ__big">5 000 ₽</div>
					<div class="popup-summ__small">Предоплата - 1 000 ₽</div>
				</div>
				<div class="popup__description">Для подтверждения записи необходимо произвести оплату в размере 20% от стоимости услуги</div>
				<div class="form-bottom --flex">
					<button class="btn btn--white form__submit --switchpopup" type="button">Назад</button>
					<button class="btn btn--black form__submit --switchpopup" type="button">Внести предоплату</button>
				</div>
			</div>
			<div class="popup__panel --succed">
				<button class="popup__close">
					<svg class="svgsprite _close">
						<use xlink:href="/assets/img/sprites/svgsprites.svg#close"></use>
					</svg>
				</button>
				<div class="popup__name text-bold">Внести предоплату</div>
				<h3 class="h3">Успешно!</h3>
				<p class="text-grey">Мы перезвоним Вам в ближайшее время</p>
			</div>
		</template>
	</div>

	<div class="popup --pay-one">
		<template id="popupPayOne">
			<div class="popup__overlay"></div>
			<div class="popup__panel">
				<button class="popup__close">
					<svg class="svgsprite _close">
						<use xlink:href="/assets/img/sprites/svgsprites.svg#close"></use>
					</svg>
				</button>
				<div class="popup__name text-bold">Внести предоплату</div>
				<h3 class="h3">В ближайшее время с вами свяжутся для определения удобной даты</h3>
				<div class="text-grey text-small mb-10">Стоимость услуги</div>
				<div class="popup-summ --aifs mb-20">
					<div class="popup-summ__big">2 000₽</div>
					<div class="popup-summ__small">Предоплата - 400 ₽</div>
				</div>
				<div class="popup__description text-grey mb-30">
					Для подтверждения необходимо произвести оплату в размере 20% от стоимости услуги
				</div>
				<form method='POST' action='https://demo.paykeeper.ru/create/' target="_blank">
					<input type='hidden' name='sum' value='{{sum}}'/>
					<input type='hidden' name='orderid' value='{{quote_id}}'/>
					<input type='hidden' name='clientid' value='{{client_id}}'/>
					<button class="btn btn--black form__submit --openpopup"
						data-popup="--succed-pay"
						type="submit">
						Внести предоплату
					</button>
				</form>
			</div>
			<div class="popup__panel --succed-pay">
				<button class="popup__close">
					<svg class="svgsprite _close">
						<use xlink:href="/assets/img/sprites/svgsprites.svg#close"></use>
					</svg>
				</button>
				<div class="popup__name text-bold">Внести предоплату</div>
				<h3 class="h3">Успешно !</h3>
				<p class="text-grey">Информация о предстоящем приеме будет доступна в Личном кабинете</p>
			</div>
		</template>
	</div>

	<div class="popup --download">
		<template id="popupDownload">
			<div class="popup__overlay"></div>
			<div class="popup__panel">
				<button class="popup__close">
					<svg class="svgsprite _close">
						<use xlink:href="/assets/img/sprites/svgsprites.svg#close"></use>
					</svg>
				</button>
				<div class="popup__name text-bold">Выгрузить данные</div>
				<div class="select-form">
					<div class="select input">
						<div class="select__main">Все специалисты</div>
						<div class="select__list">
							{{>list_experts}}
						</div>
					</div>
				</div>
				<div class="select-form">
					<input type="hidden" name="admins[]">

					<div class="select input">
						<div class="select__main">Все администраторы</div>
						<div class="select__list">
							{{>list_admins}}
						</div>
					</div>
				</div>
				<div class="input">
					<input class="input__control datebirthdaypickr" type="text"
						name="client_birthdate" placeholder="Дата рождения">
					<div class="input__placeholder">Дата рождения</div>
				</div>
				<label class="checkbox checkbox--record">
					<input type="checkbox" name="only_phones">
					<span></span>
					<div class="checbox__name">Выгрузить только список номеров</div>
				</label>
				<div class="input">
					<input class="input__control" type="tel" placeholder="Номер телефона" data-inputmask="'mask': '+7 (999) 999-99-99'">
					<div class="input__placeholder">Номер телефона</div>
				</div>
				<label class="checkbox checkbox--record">
					<input type="checkbox" name="only_emails">
					<span></span>
					<div class="checbox__name">Введите только список е-мейлов</div>
				</label>
				<div class="input">
					<input class="input__control" type="email" placeholder="Ваш е-мейл">
					<div class="input__placeholder">Введите е-мейл</div>
				</div>
				<a class="btn btn--black" href="{{file.src}}" download="{{file.name}}"> Скачать</a>
			</div>
		</template>
	</div>

	<div class="popup --filter">
		<div class="popup__overlay"></div>
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
					<p class="text-bold mb-10">Тип события</p>
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

	<div class="popup --photo">
		<div class="popup__overlay"></div>
		<template id="popupNewPhoto">
			<div class="popup__panel">
				<button class="popup__close">
					<svg class="svgsprite _close">
						<use xlink:href="/assets/img/sprites/svgsprites.svg#close"></use>
					</svg>
				</button>
				<div class="popup__name text-bold">Добавить фото</div>
				<form class="popup__form">
					<div class="search-form input">
						<input class="input__control" type="text" placeholder="Выбрать пациента">
						<div class="input__placeholder">Выбрать пациента</div>
					</div>
					<div class="input calendar mb-20">
						<input class="input__control datepickr" type="text" name="visit_date" placeholder="Выбрать дату посещения">
						<div class="input__placeholder">Выбрать дату посещения</div>
					</div>
					<div class="popup-title__checkbox">
						<p class="mb-10">Выбрать статус</p>
						<input type="hidden" name="is_longterm" value="0">
						<label class="checkbox mb-10 show-checkbox" data-show-input="longterm">
							<input type="checkbox" name="is_longterm" value="1">
							<span></span>
							<div class="checbox__name">Продолжительное лечение</div>
						</label>
						<div class="input calendar mb-20" style="display:none;" data-show="longterm">
							<input class="input__control datepickr" type="text" name="photo.longterm" placeholder="Название продолжительного лечения">
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
					<label class="file-photo">
						<input type="file">
						<div class="file-photo__ico">
							<svg class="svgsprite _file">
								<use xlink:href="/assets/img/sprites/svgsprites.svg#file"></use>
							</svg>
						</div>
						<div class="file-photo__text text-grey">Для загрузки фото заполните все поля <br>Фото не должно
							превышать 10 мб
						</div>
					</label>
					<button class="btn btn--white">Сохранить</button>
				</form>
			</div>
		</template>
	</div>
	<div class="popup --photo-longterm">
		<div class="popup__overlay"></div>
		<div class="popup__panel">
			<button class="popup__close">
				<svg class="svgsprite _close">
					<use xlink:href="/assets/img/sprites/svgsprites.svg#close"></use>
				</svg>
			</button>
			<div class="popup__name text-bold">Добавить продолжительное лечение</div>
			<div class="popup__form">
				<div class="search-form input disabled">
					<input class="input__control" type="text" placeholder="Выбрать пациента"
						value="Client Rosh">
					<div class="input__placeholder">Выбрать пациента</div>
				</div>
				<div class="input calendar mb-20">
					<input class="input__control datepickr" type="text" name="visit_date" placeholder="Выбрать дату посещения" value="03.10.2022">
					<div class="input__placeholder">Выбрать дату посещения</div>
				</div>
				<div class="popup-title__checkbox">
					<input type="hidden" name="is_longterm" value="0">
					<label class="checkbox mb-20 show-checkbox" data-show-input="longterm">
						<input type="checkbox" name="is_longterm" value="1" checked>
						<span></span>
						<div class="checbox__name">Продолжительное лечение</div>
					</label>

				</div>
				<div class="input calendar mb-20" data-show="longterm">
					<input class="input__control autocomplete-inline"
						data-lookup="Фототерапия BBL"
						type="text" name="photo.longterm"
						placeholder="Название продолжительного лечения" value="">
					<div class="input__placeholder">Название продолжительного лечения</div>
				</div>
				<div class="radios --flex">
					<label class="text-radio">
						<input type="radio" name="status2331" checked="checked">
						<span>В клинике</span>
					</label>
					<label class="text-radio disabled">
						<input type="radio" name="status2331">
						<span>Онлайн</span>
					</label>
				</div>
				<label class="file-photo" for="image-selector">
					<div class="filepicker">
						<textarea type="json" name="image" class="d-none filepicker-data"></textarea>
						<!-- Button Bar -->
						<div class="button-bar">
							<button class="btn btn-success fileinput" style="height:70px;">
								<div class="file-photo__ico">
									<img class="preview" alt="upload preview" src="">
									<svg class="svgsprite _file">
										<use xlink:href="/assets/img/sprites/svgsprites.svg#file"></use>
									</svg>
								</div>
								<input type="file" id="image-selector" name="files[]" class="wb-unsaved">
								<input type="hidden" name="upload_url" value="/uploads/events"
									class="wb-unsaved">
								<input type="hidden" name="prevent_img" class="wb-unsaved">
							</button>
						</div>
						<script type="text/javascript">
							wbapp.loadScripts(["/engine/modules/filepicker/filepicker.js"], "filepicker-js");
						</script>
					</div>
					<div class="file-photo__text text-grey">Для загрузки фото заполните все поля <br>Фото не должно
						превышать 10 мб
					</div>
				</label>
				<button class="btn btn--white">Сохранить</button>
			</div>
		</div>
	</div>

	<div class="popup --photo-profile">
		<div class="popup__overlay"></div>
		<div class="popup__panel">
			<button class="popup__close">
				<svg class="svgsprite _close">
					<use xlink:href="/assets/img/sprites/svgsprites.svg#close"></use>
				</svg>
			</button>
			<div class="popup__name text-bold">Добавить фото</div>
			<div class="popup__form">
				<div class="search-form input disabled">
					<input class="input__control" type="text" placeholder="Выбрать пациента"
						value="Client Rosh">
					<div class="input__placeholder">Выбрать пациента</div>
				</div>
				<div class="input calendar mb-20 disabled">
					<input class="input__control datepickr" type="text" name="visit_date" placeholder="Выбрать дату посещения" value="16.09.2022">
					<div class="input__placeholder">Выбрать дату посещения</div>
				</div>
				<div class="popup-title__checkbox disabled">
					<p class="mb-10">Выбрать статус</p>
					<input type="hidden" name="is_longterm" value="0">
					<label class="checkbox mb-10 show-checkbox" data-show-input="longterm">
						<input type="checkbox" name="is_longterm" value="1">
						<span></span>
						<div class="checbox__name">Продолжительное лечение</div>
					</label>
					<div class="input calendar mb-20" style="display:none;" data-show="longterm">
						<input class="input__control datepickr" type="text" name="photo.longterm" placeholder="Название продолжительного лечения">
						<div class="input__placeholder">Название продолжительного лечения</div>
					</div>
				</div>
				<div class="radios --flex disabled">
					<label class="text-radio">
						<input type="radio" name="status233" checked>
						<span>В клинике</span>
					</label>
					<label class="text-radio">
						<input type="radio" name="status233">
						<span>Онлайн</span>
					</label>
				</div>
				<!--<label class="file-photo" for="image-select">-->
				<!--	<input type="file">-->
				<!--	<div class="file-photo__ico">-->
				<!--		<svg class="svgsprite _file">-->
				<!--			<use xlink:href="/assets/img/sprites/svgsprites.svg#file"></use>-->
				<!--		</svg>-->
				<!--	</div>-->
				<!--	<div class="file-photo__text text-grey">Для загрузки фото заполните все поля <br>Фото не должно-->
				<!--		превышать 10 мб-->
				<!--	</div>-->
				<!--</label>-->
				<label class="file-photo" for="image-selector">
					<div class="filepicker">
						<textarea type="json" name="image" class="d-none filepicker-data"></textarea>
						<!-- Button Bar -->
						<div class="button-bar">
							<button class="btn btn-success fileinput" style="height:70px;">
								<div class="file-photo__ico">
									<img class="preview" src="">
									<svg class="svgsprite _file">
										<use xlink:href="/assets/img/sprites/svgsprites.svg#file"></use>
									</svg>
								</div>
								<input type="file" id="image-selector" name="files[]" class="wb-unsaved" done="">
								<input type="hidden" name="upload_url" value="/uploads/events" class="wb-unsaved" done="">
								<input type="hidden" name="prevent_img" class="wb-unsaved" done="">
							</button>
						</div>
						<script type="text/javascript">
							wbapp.loadScripts(["/engine/modules/filepicker/filepicker.js"], "filepicker-js");
						</script>
					</div>
					<div class="file-photo__text text-grey">Для загрузки фото заполните все поля <br>Фото не должно
						превышать 10 мб
					</div>
				</label>
				<button class="btn btn--white">Сохранить</button>
			</div>
		</div>
	</div>

	<div class="popup --photo-edit">
		<div class="popup__overlay"></div>
		<template id="popupEditPhoto">
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
					<div class="input calendar mb-20">
						<input class="input__control datepickr" type="text" value="{{photo.date}}" placeholder="Выбрать дату посещения">
						<div class="input__placeholder">Выбрать дату посещения</div>
					</div>
					<div class="popup-title__checkbox">
						<p class="mb-10">Выбрать статус</p>
						<label class="checkbox mb-10 show-checkbox" data-show-input="longterm">
							<input type="checkbox">
							<span></span>
							<div class="checbox__name">Продолжительное лечение</div>
						</label>
						<div class="input calendar mb-20" style="display:none;" data-show="longterm">
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
						<div class="file-photo__text text-grey">Для загрузки фото заполните все поля <br>Фото не должно
							превышать 10 мб
						</div>
					</label>
					<button class="btn btn--white">Сохранить</button>
				</form>
			</div>
		</template>
	</div>

	<div class="popup --create">
		<div class="popup__overlay"></div>
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
				<div class="input mb-30">
					<input class="input__control" type="tel" placeholder="Номер телефона" data-inputmask="'mask': '+7 (999) 999-99-99'">
					<div class="input__placeholder">Номер телефона</div>
				</div>
				<button class="btn btn--black form__submit --switchpopup" data-popup="--code">Создать</button>
				<div class="form-bottom">После отправки заявки для пациента будет создан Личный кабинет, в&nbsp;который можно попасть через кнопку &laquo;Войти&raquo; в&nbsp;верхнем меню сайта</div>
			</form>
		</div>
	</div>

	<div class="popup --create-recover">
		<div class="popup__overlay"></div>
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
				<a class="--flex --jcfe mb-10" href="#"> Забыли пароль?</a>
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

	<div class="popup --create-appoint">
		<div class="popup__overlay"></div>
		<div class="popup__panel">
			<button class="popup__close">
				<svg class="svgsprite _close">
					<use xlink:href="/assets/img/sprites/svgsprites.svg#close"></use>
				</svg>
			</button>
			<div class="popup__name text-bold">Запись на прием</div>
			<form class="popup__form">
				<p class="text-bold text-big mb-20">Client Rosh</p>
				<div class="select-form">
					<div class="select has-values">
						<div class="select__main">
							<div class="select__placeholder">Услуга</div>
							<div class="select__values">Термовоздействие Skin Tyte - уши</div>
						</div>
						<div class="select__list">

							<div class="select__item select__item--checkbox">
								<label class="checkbox checkbox--record">
									<input type="checkbox">
									<span></span>
									<div class="checbox__name --flex --aic --jcsb">
										<div class="select__name">Термовоздействие.Skin Tyte - нижняя треть лица+ментальная зона
										</div>
										<div>28 000 ₽</div>
									</div>
								</label>
							</div>
							<div class="select__item select__item--checkbox">
								<label class="checkbox checkbox--record">
									<input type="checkbox" checked>
									<span></span>
									<div class="checbox__name --flex --aic --jcsb">
										<div class="select__name">Термовоздействие Skin Tyte - уши</div>
										<div>8 000 ₽</div>
									</div>
								</label>
							</div>
							<div class="select__item select__item--checkbox">
								<label class="checkbox checkbox--record">
									<input type="checkbox">
									<span></span>
									<div class="checbox__name --flex --aic --jcsb">
										<div class="select__name">Термовоздействие. Skin Tyte - шея</div>
										<div>24 000 ₽</div>
									</div>
								</label>
							</div>
							<div class="select__item select__item--checkbox">
								<label class="checkbox checkbox--record">
									<input type="checkbox">
									<span></span>
									<div class="checbox__name --flex --aic --jcsb">
										<div class="select__name">Термовоздействие. Skin Tyte - щеки, шея, декольте</div>
										<div>52 000 ₽</div>
									</div>
								</label>
							</div>
							<div class="select__item select__item--checkbox">
								<label class="checkbox checkbox--record">
									<input type="checkbox">
									<span></span>
									<div class="checbox__name --flex --aic --jcsb">
										<div class="select__name">Дерматологический пилинг Enerpeel Jessners
											салициловый-резорциновый
										</div>
										<div>17 000 ₽</div>
									</div>
								</label>
							</div>
							<div class="select__item select__item--checkbox">
								<label class="checkbox checkbox--record">
									<input type="checkbox">
									<span></span>
									<div class="checbox__name --flex --aic --jcsb">
										<div class="select__name">Дерматологический пилинг для кожи с гиперпигментацией
											"SC Pigment Balancing Peel"
										</div>
										<div>7 000 ₽</div>
									</div>
								</label>
							</div>
						</div>
					</div>
				</div>
				<p class="mb-10">Тип события</p>
				<div class="radios --flex">
					<label class="text-radio">
						<input type="radio" name="status233" checked>
						<span>В клинике</span>
					</label>
					<label class="text-radio">
						<input type="radio" name="status233">
						<span>Онлайн</span>
					</label>
				</div>
				<div class="select-form">
					<div class="select has-values">
						<div class="select__main">
							<div class="select__placeholder">Выберите специалиста</div>
							<div class="select__values">Айрапетян Амалия Суреновна</div>
						</div>
						<div class="select__list">
							<div class="select__item select__item--checkbox">
								<label class="checkbox checkbox--record"><input type="checkbox" value="id6263ae3e26bd" name="experts[]">
									<span></span>
									<div class="checbox__name">
										<div class="select__name">Хачатурян Любовь Андреевна</div>
									</div>
								</label></div>
							<div class="select__item select__item--checkbox">
								<label class="checkbox checkbox--record"><input type="checkbox" value="id63049aba1204" name="experts[]">
									<span></span>
									<div class="checbox__name">
										<div class="select__name">Салонтай Инна Рафаэловна</div>
									</div>
								</label></div>
							<div class="select__item select__item--checkbox">
								<label class="checkbox checkbox--record"><input type="checkbox" value="id63049a29140e" name="experts[]">
									<span></span>
									<div class="checbox__name">
										<div class="select__name">Цветкова Инна Сергеевна</div>
									</div>
								</label></div>
							<div class="select__item select__item--checkbox">
								<label class="checkbox checkbox--record"><input type="checkbox" value="id6304989b0d4c" name="experts[]">
									<span></span>
									<div class="checbox__name">
										<div class="select__name">Молотилова Ольга Юрьевна</div>
									</div>
								</label></div>
							<div class="select__item select__item--checkbox">
								<label class="checkbox checkbox--record"><input type="checkbox" value="id630498b4189f" name="experts[]">
									<span></span>
									<div class="checbox__name">
										<div class="select__name">Рассадина Татьяна Александровна</div>
									</div>
								</label></div>
							<div class="select__item select__item--checkbox">
								<label class="checkbox checkbox--record"><input type="checkbox" value="id630498f80f90" name="experts[]" checked>
									<span></span>
									<div class="checbox__name">
										<div class="select__name">Айрапетян Амалия Суреновна</div>
									</div>
								</label></div>
							<div class="select__item select__item--checkbox">
								<label class="checkbox checkbox--record"><input type="checkbox" value="id6304998b114d" name="experts[]">
									<span></span>
									<div class="checbox__name">
										<div class="select__name">Иванов Иван Алексеевич</div>
									</div>
								</label></div>
						</div>
					</div>

				</div>
				<div class="calendar input mb-30">
					<input class="input__control datetimepickr" type="text"
						value="" placeholder="Выбрать дату и время">
					<div class="input__placeholder">Выбрать время и дату</div>
				</div>
				<button class="btn btn--black --switchpopup">Продолжить</button>
			</form>
		</div>
	</div>

	<div class="popup --download-data">
		<div class="popup__overlay"></div>
		<div class="popup__panel">
			<button class="popup__close">
				<svg class="svgsprite _close">
					<use xlink:href="/assets/img/sprites/svgsprites.svg#close"></use>
				</svg>
			</button>
			<div class="popup__name text-bold">Выгрузить данные</div>
			<form class="popup__form">
				<div class="select-form">

					<div class="select">
						<div class="select__main">Все услуги</div>
						<div class="select__list">

							<div class="select__item select__item--checkbox">
								<label class="checkbox checkbox--record">
									<input type="checkbox">
									<span></span>
									<div class="checbox__name --flex --aic --jcsb">
										<div class="select__name">Термовоздействие.Skin Tyte - нижняя треть лица+ментальная зона
										</div>
										<div>28 000 ₽</div>
									</div>
								</label>
							</div>
							<div class="select__item select__item--checkbox">
								<label class="checkbox checkbox--record">
									<input type="checkbox">
									<span></span>
									<div class="checbox__name --flex --aic --jcsb">
										<div class="select__name">Термовоздействие Skin Tyte - уши</div>
										<div>8 000 ₽</div>
									</div>
								</label>
							</div>
							<div class="select__item select__item--checkbox">
								<label class="checkbox checkbox--record">
									<input type="checkbox">
									<span></span>
									<div class="checbox__name --flex --aic --jcsb">
										<div class="select__name">Термовоздействие. Skin Tyte - шея</div>
										<div>24 000 ₽</div>
									</div>
								</label>
							</div>
							<div class="select__item select__item--checkbox">
								<label class="checkbox checkbox--record">
									<input type="checkbox">
									<span></span>
									<div class="checbox__name --flex --aic --jcsb">
										<div class="select__name">Термовоздействие. Skin Tyte - щеки, шея, декольте</div>
										<div>52 000 ₽</div>
									</div>
								</label>
							</div>
							<div class="select__item select__item--checkbox">
								<label class="checkbox checkbox--record">
									<input type="checkbox">
									<span></span>
									<div class="checbox__name --flex --aic --jcsb">
										<div class="select__name">Дерматологический пилинг Enerpeel Jessners
											салициловый-резорциновый
										</div>
										<div>17 000 ₽</div>
									</div>
								</label>
							</div>
							<div class="select__item select__item--checkbox">
								<label class="checkbox checkbox--record">
									<input type="checkbox">
									<span></span>
									<div class="checbox__name --flex --aic --jcsb">
										<div class="select__name">Дерматологический пилинг для кожи с гиперпигментацией
											"SC Pigment Balancing Peel"
										</div>
										<div>7 000 ₽</div>
									</div>
								</label>
							</div>
						</div>
					</div>
				</div>
				<div class="select-form">
					<div class="select">
						<div class="select__main">Все специалисты</div>
						<div class="select__list">
							<div class="select__item select__item--checkbox">
								<label class="checkbox checkbox--record"><input type="checkbox" value="id6263ae3e26bd" name="experts[]">
									<span></span>
									<div class="checbox__name">
										<div class="select__name">Хачатурян Любовь Андреевна</div>
									</div>
								</label></div>
							<div class="select__item select__item--checkbox">
								<label class="checkbox checkbox--record"><input type="checkbox" value="id63049aba1204" name="experts[]">
									<span></span>
									<div class="checbox__name">
										<div class="select__name">Салонтай Инна Рафаэловна</div>
									</div>
								</label></div>
							<div class="select__item select__item--checkbox">
								<label class="checkbox checkbox--record"><input type="checkbox" value="id63049a29140e" name="experts[]">
									<span></span>
									<div class="checbox__name">
										<div class="select__name">Цветкова Инна Сергеевна</div>
									</div>
								</label></div>
							<div class="select__item select__item--checkbox">
								<label class="checkbox checkbox--record"><input type="checkbox" value="id6304989b0d4c" name="experts[]">
									<span></span>
									<div class="checbox__name">
										<div class="select__name">Молотилова Ольга Юрьевна</div>
									</div>
								</label></div>
							<div class="select__item select__item--checkbox">
								<label class="checkbox checkbox--record"><input type="checkbox" value="id630498b4189f" name="experts[]">
									<span></span>
									<div class="checbox__name">
										<div class="select__name">Рассадина Татьяна Александровна</div>
									</div>
								</label></div>
							<div class="select__item select__item--checkbox">
								<label class="checkbox checkbox--record"><input type="checkbox" value="id630498f80f90" name="experts[]">
									<span></span>
									<div class="checbox__name">
										<div class="select__name">Айрапетян Амалия Суреновна</div>
									</div>
								</label>
							</div>
							<div class="select__item select__item--checkbox">
								<label class="checkbox checkbox--record"><input type="checkbox" value="id6304998b114d" name="experts[]">
									<span></span>
									<div class="checbox__name">
										<div class="select__name">Иванов Иван Алексеевич</div>
									</div>
								</label>
							</div>
						</div>
					</div>
				</div>
				<div class="select-form">
					<div class="select">
						<div class="select__main">Все администраторы</div>
						<div class="select__list">
							<div class="select__item select__item--checkbox">
								<label class="checkbox checkbox--record">
									<input type="checkbox" value="id6304998b114d" name="admins[]">
									<span></span>
									<div class="checbox__name">
										<div class="select__name">Admin Rosh</div>
									</div>
								</label>
							</div>
						</div>
					</div>
				</div>
				<div class="calendar input">
					<input class="input__control daterangepickr" type="text" placeholder="За весь период">
					<div class="input__placeholder">За весь период</div>
				</div>
				<div class="select-form">
					<label class="checkbox mainfilter__checkbox mb-10">
						<input type="checkbox">
						<span></span>
						<div class="checbox__name text-grey">Выгрузить только список номеров</div>
					</label>
					<div class="calendar input">
						<input class="input__control" type="tel" placeholder="Номер телефона" data-inputmask="'mask': '+7 (999) 999-99-99'">
						<div class="input__placeholder">Номер телефона</div>
					</div>
				</div>
				<div class="select-form mb-30">
					<label class="checkbox mainfilter__checkbox mb-10">
						<input type="checkbox">
						<span></span>
						<div class="checbox__name text-grey">Введите только список е-мейлов</div>
					</label>
					<div class="calendar input">
						<input class="input__control" type="email" placeholder="Введите е-мейл">
						<div class="input__placeholder">Введите е-мейл</div>
					</div>
				</div>
				<a class="btn btn--black" href="/uploads/events/test-import.xlsx" download="Данные_03.10.2022.xlsx"> Скачать</a>
			</form>
		</div>
	</div>
</view>
<edit header="Все попапы">
	<div>
		<wb-module wb="module=yonger&mode=edit&block=common.inc"/>
	</div>
</edit>