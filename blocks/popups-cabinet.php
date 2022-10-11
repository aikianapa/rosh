<view>
	<script>
		var catalog      = {
			/*!!! TODO: add methods to set this spec. services price from cms/dashboard !!!*/
			spec_service: {
				experts_consultation: {
					header: 'Общая консультация специалиста',
					price: 4000
				},
				analises_interpretation: {
					header: 'Расшифровка анализов',
					price: 2000
				}
			}
		};
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

		window.cabinetPage = {
			objects: {
				record: {},
				photo: {},
				analises: {},
			},
			initData: function () {
				console.log('window.cabinetPage init... start');
				fetch('/api/v2/func/catalogs/getQuoteStatus', {method: 'GET'})
					.then((response) => {
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
					catalog.servicePrices = {};
					let _services         = {};
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
							catalog.servicePrices[service.id + '-' + j] = {
								'price': serv_price.price,
								'header': serv_price.header
							};
						});
					});
					catalog.services = _services;
				});

				wbapp.get('/api/v2/list/users?role=main&active=on&@return=id,fullname', function (res) {
					let _admins = {};
					res.forEach(function (admin, i) {
						_admins[admin.id] = admin;
					});

					catalog.admins = _admins;
				});

				wbapp.get('/api/v2/list/experts?active=on', function (res) {
					let _experts = {};
					res.forEach(function (expert, i) {
						_experts[expert.id] = expert;
						wbapp.get('/api/v2/list/_yonmap?f=experts&i=' + expert.id, function (res) {
							_experts[expert.id].info_uri = res[0]['u'] || '';
						});
					});

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
					catalog.categories = _serviceCats;
				});
				console.log('-- start preload catalogs data --');
			},
			initPopups: function () {

			}
		};

		cabinetPage.initData();
	</script>
	<div class="popup --record-new">
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
				<wb-foreach wb="table=catalogs&item=srvcat&from=tree.data">
					<label class="text-radio">
						<input type="radio" name="service_category" value="{{id}}">
						<span>{{name}}</span>
					</label>
				</wb-foreach>
			</div>
			<div class="input" data-hide="service-search">
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
			<label class="checkbox checkbox--record hider-checkbox" data-hide-input="service-search">
				<input class="checkbox-hidden-next-form" type="checkbox" name="no_services" value="1">
				<span></span>
				<div class="checbox__name">Мне лень искать в списке, скажу администратору</div>
			</label>
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

					</div>
				</div>
			</div>
			<div class="admin-editor__patient" data-hide="service-search">
				<div class="text-bold mb-10">Выбраны услуги</div>
			</div>
			<div class="admin-editor__summ" data-hide="service-search">
				<p>Всего</p>
				<input type="hidden" name="price">
				<p class="price">0 ₽</p>
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
				<div class="popup__name text-bold">{{catalog.spec_service.analises_interpretation.header}}</div>
				<form class="popup__form" method="post">
					<input type="hidden" name="pay_status" value="unpay">
					<input type="hidden" name="spec_service" value="analises_interpretation">
					<input type="hidden" name="price" value="{{catalog.spec_service.analises_interpretation.price}}">
					<input type="hidden" name="group" value="quote">
					<input type="hidden" name="status" value="new">

					<input type="hidden" name="title" value="Расшифровка анализов">

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
					<button class="btn btn--black popup__change form__submit" type="button" on-click="submit">
						Оставить заявку
					</button>
				</form>
				<div class="popup__panel --succed">
					<button class="popup__close">
						<svg class="svgsprite _close">
							<use xlink:href="/assets/img/sprites/svgsprites.svg#close"></use>
						</svg>
					</button>
					<div class="popup__name text-bold">Заявка на прием</div>
					<h3 class="h3">Успешно!</h3>
					<p class="text-grey">Мы перезвоним Вам в ближайшее время</p>
				</div>
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
				<div class="popup__name text-bold">Внести предоплату</div>
				<h3 class="h3">В ближайшее время с вами свяжутся для определения удобной даты</h3>
				<div class="text-grey text-small mb-10">Стоимость услуги</div>
				<div class="popup-summ --aifs mb-20">
					<div class="popup-summ__big">{{this.price}} ₽</div>
					<div class="popup-summ__small">Предоплата - {{this.price / 5}} ₽</div>
				</div>
				<div class="popup__description text-grey mb-30">
					Для подтверждения необходимо произвести оплату в размере 20% от стоимости
				</div>
				<form on-submit="@.paymentSubmit({{this.id}})" method='POST' action='https://demo.paykeeper.ru/create/' target="_blank">
					<input type='hidden' name='sum' value='{{this.price / 5}}'/>
					<input type='hidden' name='orderid' value='{{this.id}}'/>
					<input type='hidden' name='clientid' value='{{this.client}}'/>
					<button class="btn btn--black form__submit" type="submit">
						Внести предоплату
					</button>
				</form>
			</div>
			<div class="popup__panel --succed-pay" fade-in="@.checkPayment({{this.id}})">
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
					<div class="popup-summ__big">{{this.price}} ₽</div>
					<div class="popup-summ__small">Предоплата - {{this.price / 5}} ₽</div>
				</div>
				<div class="popup__description text-grey mb-30">
					Для подтверждения необходимо произвести оплату в размере 20% от стоимости
				</div>
				<form on-submit="@.paymentSubmit({{this.id}})" method='POST' action='https://demo.paykeeper.ru/create/' target="_blank">
					<input type='hidden' name='sum' value='{{this.price / 5}}'/>
					<input type='hidden' name='orderid' value='{{this.id}}'/>
					<input type='hidden' name='clientid' value='{{this.client}}'/>
					<button class="btn btn--black form__submit" type="submit">
						Внести предоплату
					</button>
				</form>
			</div>
			<div class="popup__panel --succed-pay" fade-in="@.checkPayment({{this.id}})">
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

	<div class="popup --photo">
		<template id="popupPhoto">
			<div class="popup__overlay"></div>
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
		<template id="popupPhotoLongterm">
			<div class="popup__overlay"></div>
			<div class="popup__panel">
				<button class="popup__close">
					<svg class="svgsprite _close">
						<use xlink:href="/assets/img/sprites/svgsprites.svg#close"></use>
					</svg>
				</button>
				<div class="popup__name text-bold">Добавить фото к событию</div>
				<div class="popup__form">
					<div class="search-form input disabled">
						<input class="input__control autocomplete client-search"
							type="text" placeholder="Выбрать пациента">
						<div class="input__placeholder">Выбрать пациента</div>
					</div>
					<div class="input calendar mb-20">
						<input class="input__control datepickr" type="text"
							name="event_date" placeholder="Выбрать дату посещения">
						<div class="input__placeholder">Выбрать дату посещения</div>
					</div>
					<input type="hidden" name="group" value="event">
					<input type="hidden" name="id" value="{{this.id}}">
					<div class="popup-title__checkbox">
						<label class="checkbox mb-20 show-checkbox" data-show-input="longterm">
							<input type="checkbox" name="group" value="longterm"
								{{#if this.group== 'longterm' }}checked{{/if}}>
							<span></span>
							<div class="checbox__name">Продолжительное лечение</div>
						</label>
					</div>
					<div class="input calendar mb-20" data-show="longterm">
						<input class="input__control longterm-search"
							type="text" name="title"
							placeholder="Название продолжительного лечения"
							value="">
						<div class="input__placeholder">Название продолжительного лечения</div>
					</div>
					<div class="radios --flex">
						<label class="text-radio">
							<input type="radio" name="photo_group" value="before" checked="checked">
							<span>До начала лечения</span>
						</label>
						<label class="text-radio disabled">
							<input type="radio" name="photo_group" value="after">
							<span>В процессе лечения</span>
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
									<input type="hidden" name="upload_url" value="/uploads/records/"
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
		</template>
	</div>

	<div class="popup --create-client">
		<template id="popupCreateClient">
			<div class="popup__overlay"></div>
			<div class="popup__panel">
				<button class="popup__close" on-click="close">
					<svg class="svgsprite _close">
						<use xlink:href="/assets/img/sprites/svgsprites.svg#close"></use>
					</svg>
				</button>
				<div class="popup__name text-bold">Создать карточку пациента</div>
				<form class="popup__form" on-submit="submit">
					<input type="hidden" name="role" value="client">
					<input type="hidden" name="confirmed" value="0">
					<div class="input">
						<input class="input__control" type="text"
							placeholder="ФИО" name="fullname">
						<div class="input__placeholder">ФИО</div>
					</div>
					<div class="input">
						<input class="input__control datebirthdaypickr"
							type="text" placeholder="Дата рождения" name="birthdate">
						<div class="input__placeholder">Дата рождения</div>
					</div>
					<div class="input mb-30">
						<input class="input__control" type="tel"
							placeholder="Номер телефона"
							data-inputmask="'mask': '+7 (999) 999-99-99'"
							name="phone">
						<div class="input__placeholder">Номер телефона</div>
					</div>
					<button class="btn btn--black form__submit">Создать</button>
					<div class="form-bottom">После отправки для пациента будет создан Личный кабинет, в&nbsp;который можно попасть через кнопку &laquo;Войти&raquo; в&nbsp;верхнем меню сайта</div>
				</form>
			</div>
		</template>
	</div>

	<div class="popup --confirm-sms-code">
		<template id="popupConfirmSmsCode">
			<div class="popup__overlay"></div>
			<div class="popup__panel">
				<button class="popup__close">
					<svg class="svgsprite _close">
						<use xlink:href="/assets/img/sprites/svgsprites.svg#close"></use>
					</svg>
				</button>
				<div class="popup__name text-bold">Вход</div>
				<form class="popup__form">
					<h3 class="h3">Введите код</h3>
					<div class="form-title__description">
						Мы отправили код подтверждения на номер
						<span class="current_phone">{{phone}}</span>
						.<br>
						Время жизни кода 30 секунд.<br>
						Осталось <strong>
							<span class="sms_code_lifetime"></span>
						</strong>
					</div>

					<div class="code">
						<input class="code__input" type="text">
						<input class="code__input" type="text">
						<input class="code__input" type="text">
						<input class="code__input" type="text">
						<input class="code__input" type="text">
						<input class="code__input" type="text">
					</div>

					<div class="alert alert-warning mb-2"></div>
				</form>
			</div>
		</template>
	</div>

	<div class="popup --photo-profile">
		<template id="popupPhotoProfile">
			<div class="popup__overlay"></div>
			<div class="popup__panel">
				<button class="popup__close">
					<svg class="svgsprite _close">
						<use xlink:href="/assets/img/sprites/svgsprites.svg#close"></use>
					</svg>
				</button>
				<div class="popup__name text-bold">Добавить фото</div>
				<div class="popup__form">
					<input type="hidden" name="client" value="{{this.client}}">
					<input type="hidden" name="id" value="{{this.id}}">

					<div class="search-form input disabled">
						<input class="input__control autocomplete client-search"
							type="text" placeholder="Выбрать пациента">
						<div class="input__placeholder">Выбрать пациента</div>
					</div>
					<div class="input calendar mb-20">
						<input class="input__control datepickr" type="text"
							name="event_date" placeholder="Выбрать дату посещения">
						<div class="input__placeholder">Выбрать дату посещения</div>
					</div>
					<input type="hidden" name="group" value="event">
					<input type="hidden" name="id">
					<div class="popup-title__checkbox">
						<label class="checkbox mb-20 show-checkbox" data-show-input="longterm">
							<input type="checkbox" name="group" value="longterm" checked>
							<span></span>
							<div class="checbox__name">Продолжительное лечение</div>
						</label>
					</div>
					<div class="input calendar mb-20" data-show="longterm">
						<input class="input__control longterm-search"
							type="text" name="title"
							placeholder="Название продолжительного лечения"
							value="">
						<div class="input__placeholder">Название продолжительного лечения</div>
					</div>
					<div class="radios --flex">
						<label class="text-radio">
							<input type="radio" name="photo_group" value="before" checked="checked">
							<span>До начала лечения</span>
						</label>
						<label class="text-radio disabled">
							<input type="radio" name="photo_group" value="after">
							<span>В процессе лечения</span>
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
									<input type="hidden" name="upload_url" value="/uploads/records/"
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
		</template>
	</div>

	<div class="popup --create-appoint">
		<template id="popupCreateAppoint">
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
		</template>
	</div>

	<div class="popup --download-data">
		<template id="popupDownloadData">
			<div class="popup__overlay"></div>
			<div class="popup__panel">
				<button class="popup__close">
					<svg class="svgsprite _close">
						<use xlink:href="/assets/img/sprites/svgsprites.svg#close"></use>
					</svg>
				</button>
				<div class="popup__name text-bold">Выгрузить данные</div>
				<form class="popup__form" action="/cabinet/download/">
					<div class="select-form">
						<div class="select">
							<div class="select__main">
								<div class="select__placeholder">Все услуги</div>
								<div class="select__values"></div>
							</div>
							<div class="select__list">
								{{#each catalog.services}}
								<div class="select__item select__item--checkbox">
									<label class="checkbox checkbox--record">
										<input type="checkbox" name="services[]" value="{{this.id}}">
										<span></span>
										<div class="checbox__name">
											<div class="select__name">{{this.header}}</div>
										</div>
									</label>
								</div>
								{{/each}}
							</div>
						</div>
					</div>
					<div class="select-form">
						<div class="select">
							<div class="select__main">
								<div class="select__placeholder">Выберите специалиста</div>
								<div class="select__values"></div>
							</div>
							<div class="select__list">
								{{#each catalog.experts}}
								<div class="select__item select__item--checkbox">
									<label class="checkbox checkbox--record">
										<input type="checkbox" name="experts[]" value="{{this.id}}">
										<span></span>
										<div class="checbox__name">
											<div class="select__name">{{this.name}}</div>
										</div>
									</label>
								</div>
								{{/each}}
							</div>
						</div>
					</div>
					<div class="select-form">
						<div class="select">
							<div class="select__main">Все администраторы</div>
							<div class="select__list">
								{{#each catalog.admins}}
								<div class="select__item select__item--checkbox">
									<label class="checkbox checkbox--record">
										<input type="checkbox" name="experts[]" value="{{this.id}}">
										<span></span>
										<div class="checbox__name">
											<div class="select__name">{{this.name}}</div>
										</div>
									</label>
								</div>
								{{/each}}
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
					<a class="btn btn--black" href="" download="Данные_03.10.2022.xlsx"> Скачать</a>
				</form>
			</div>
		</template>
	</div>

	<script wbapp remove>
		setTimeout(function () {
			console.log('-- start init popups --');
			
			window.popupAnalizeType     = new Ractive({
				el: '.popup.--analize-type',
				template: wbapp.tpl('#popupAnalizeType').html,
				data: {
					client:{},
					record:{}
				},
				on: {
					submit() {
						let form = this.find('.popup.--analize-type .popup__form');
						if ($(form).verify()) {
							let post = $(form).serializeJSON();
							wbapp.post('/create/records', post, function (data) {
								if (data.error) {
									wbapp.trigger('wb-save-error', {'data': data});
								} else {
									$('.popup.--analize-type .popup__panel:not(.--succed)').addClass('d-none');
									$('.popup.--analize-type .popup__panel.--succed').addClass('d-block');
								}
							});
						}
					}
				}
			});
			window.popupsCreateProfile  = new Ractive({
				el: '.popup.--create-client',
				template: wbapp.tpl('#popupCreateClient').html,
				data: {},
				on: {
					submit() {
						let form = this.find('.popup.--create-client .popup__form');
						if ($(form).verify()) {
							let post = $(form).serializeJSON();

							$.ajax({
								url: '/form/phoneAuth/get_code',
								method: 'POST',
								data: {
									phone: post.phone
								},
								success: function (data) {
									let res = JSON.parse(data);
									console.log(res);

									if (res.status === 'error') {
										toast(res.message, '', 'error');
									} else {
										popupsConfirmSmsCode.set('phone', post.phone);
										popupsConfirmSmsCode.set('client', post);
										popupsConfirmSmsCode.showPopup();
									}
								}
							});

						}
					}
				}
			});
			window.popupsConfirmSmsCode = new Ractive({
				el: '.popup.--confirm-sms-code',
				template: wbapp.tpl('#popupConfirmSmsCode').html,
				data: {
					phone: '',
					client:{}
				},
				on: {
					keyup(ev) {
						const _this  = $(ev.node);
						const _phone = $(ev.node).find('[name="phone"]').val();
						_this.next().focus();

						var sms_code = '';
						$.each(auth.smscode_window_digits, function (digit, item) {
							sms_code += $(item).val();
						});

						if (sms_code.length === 6) {
							$.ajax({
								url: '/form/phoneAuth/check_code',
								method: 'POST',
								data: {
									phone: _phone,
									code: sms_code
								},
								success: function (data) {
									if (data.status === 'ok') {
										wbapp.post('/create/users/', post, function (data) {
											if (data.error) {
												wbapp.trigger('wb-save-error', {'data': data});
											} else {
												toast('Карточка клиента создана!');
												$('.popup.--confirm-sms-code').hide();
											}
										});
									}
								}
							});
						}
					}
				},
				showPopup: function () {
					$('.popup.--confirm-sms-code').show();
				}
			});
		});
	</script>
</view>
<edit header="Все попапы для ЛК">
	<div>
		<wb-module wb="module=yonger&mode=edit&block=common.inc"/>
	</div>
</edit>