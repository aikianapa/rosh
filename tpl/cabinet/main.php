<!DOCTYPE html>
<html class="no-js" lang="ru">
<head>
	<title seo>Личный кабинет</title>
	<link rel="icon" href="/favicon.svg" type=" image/svg+xml">
</head>

<body class="body lk-cabinet" data-barba="wrapper">
<div class="scroll-container" data-scroll-container>
	<div>
		<wb-module wb="module=yonger&mode=render&view=header"></wb-module>
	</div>
	<main class="page" data-barba="container" data-barba-namespace="cabinet" wb-off>
		<div class="account admin">
			<form class="search">
				<div class="container">
					<div class="crumbs">
						<a class="crumbs__arrow" href="#">
							<svg class="svgsprite _crumbs-back">
								<use xlink:href="/assets/img/sprites/svgsprites.svg#crumbs-back"></use>
							</svg>
						</a>
						<a class="crumbs__link" href="/">Главная</a>
						<span class="crumbs__link">Кабинет администратора</span>
					</div>
					<div class="title-flex --flex --jcsb">
						<div class="title">
							<h1 class="h1 mb-10">Кабинет администратора </h1>
						</div>
						<a class="btn btn--black --openpopup" onclick="popupsCreateProfile();"
							data-popup="--create-client">
							Создать карточку пациента
						</a>
					</div>
					<div class="search__block --flex --aicn">
						<div class="input">
							<input class="search__input" type="text" placeholder="Поиск">
						</div>
						<button class="btn btn--white">Найти</button>
					</div>
				</div>
			</form>

			<div class="page-content">
				<div class="container data-tab-wrapper" data-tabs="records">
					<div class="account__tab-items">
						<div class="account__tab-item data-tab-link active"
							data-tab="quotes" data-tabs="records">Заявки
						</div>
						<div class="account__tab-item data-tab-link"
							data-tab="events" data-tabs="records">События
						</div>
						<div class="buttons disabled">
							<label class="checkbox">
								<input type="checkbox">
								<span></span>
							</label>
							<button class="flag-date__ico">
								<svg class="svgsprite _flag">
									<use xlink:href="/assets/img/sprites/svgsprites.svg#flag"></use>
								</svg>
							</button>
						</div>
					</div>

					<div class="account__tab data-tab-item active" data-tab="quotes">
						<div class="loading-overlay">
							<div class="loader"></div>
						</div>
					</div>
					<div class="account__tab data-tab-item" data-tab="events">
						<div class="loading-overlay">
							<div class="loader"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
</div>
<template id="editProfile">
	<form class="profile-editor">
		<input type="hidden" value="{{ id }}">
		<p class="text-bold mb-30">Редактировать профиль</p>
		<div class="row profile-edit__wrap">
			<div class="col-md-3">
				<div class="input input--grey">
					<input class="input__control datebirthdaypickr" name="birthdate" value="{{ birthdate }}" type="text" placeholder="Дата рождения">
					<div class="input__placeholder input__placeholder--dark">Дата рождения</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="input input--grey">
					<input class="input__control" type="tel" name="phone" value="+{{ phone }}" placeholder="Телефон" data-inputmask="'mask': '+7 (999) 999-99-99'">
					<div class="input__placeholder input__placeholder--dark">Телефон</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="input input--grey">
					<input class="input__control" type="email" name="email" value="{{ email }}" placeholder="E-mail">
					<div class="input__placeholder input__placeholder--dark">E-mail</div>
				</div>
			</div>
			<div class="col-md-2">
				<button class="btn btn--white profile-edit__submit" type="button" on-click="save">Сохранить</button>
			</div>
		</div>

		<p class="text-bold mb-30 delivery-address">Адрес доставки</p>
		<div class="row profile-edit__wrap">
			<div class="col-md-9">
				<div class="row">
					<div class="col-md-4">
						<div class="input input--grey">
							<input class="input__control" type="text" name="country" value="{{ country }}" placeholder="Страна">
							<div class="input__placeholder input__placeholder--dark">Страна</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="input input--grey">
							<input class="input__control" type="text" name="city" value="{{ city }}" placeholder="Город">
							<div class="input__placeholder input__placeholder--dark">Город</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="input input--grey">
							<input class="input__control" type="text" name="address" value="{{ address }}" placeholder="Улица и дом">
							<div class="input__placeholder input__placeholder--dark">Улица и дом</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row profile-edit__wrap">
			<div class="col-md-9">
				<div class="row">
					<div class="col-md-3">
						<div class="input input--grey">
							<input class="input__control" type="text" name="flat" value="{{ flat }}" placeholder="Кв./офис">
							<div class="input__placeholder input__placeholder--dark">Кв./офис</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="input input--grey">
							<input class="input__control" type="text" name="intercom" value="{{ intercom }}" placeholder="Домофон">
							<div class="input__placeholder input__placeholder--dark">Домофон</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="input input--grey">
							<input class="input__control" type="text" name="entrance" value="{{ entrance }}" placeholder="Подъезд">
							<div class="input__placeholder input__placeholder--dark">Подъезд</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="input input--grey">
							<input class="input__control" type="text" name="level" value="{{ level }}" placeholder="Этаж">
							<div class="input__placeholder input__placeholder--dark">Этаж</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-2">
				<button class="btn btn--white profile-edit__submit" type="button" on-click="save">Сохранить</button>
			</div>
		</div>
	</form>
</template>
<template id="editStatus">
	<div class="select-form">
		<div class="select pay">
			<div class="select__main">Статус оплаты</div>
			<div class="select__list">
				<input type="hidden" name="pay_status" value="{{ pay_status }}">
				{{#each catalog.quotePay}}
				<div class="select__item" data-id="{{ id }}"
					onclick="$(this).parent('.select__list').children('input').val($(this).attr('data-id'))">
					{{name}}
				</div>
				{{/each}}
			</div>
		</div>
	</div>

	<div class="select-form">
		<div class="select status">
			<div class="select__main">Изменить статус</div>
			<div class="select__list">
				<input type="hidden" class="status" name="status" value="{{ status }}">
				<input type="hidden" class="group" name="group" value="{{ group }}">
				{{#each catalog.quoteStatus}}
				{{#if id == 'delimiter'}}
				<div class="select__delimiter" disabled></div>
				{{else}}
				<div class="select__item select__item--acc-{{color}}"
					data-id="{{ id }}" data-group="{{ type }}"
					onclick="$(this).parent('.select__list').children('input.status').val($(this).attr('data-id'));$(this).parent('.select__list').children('input.group').val($(this).attr('data-type'))">
					{{name}}
				</div>
				{{/if}}
				{{/each}}
			</div>
		</div>
	</div>

	<button class="btn btn--white" on-click="save">Сохранить</button>
</template>
<template id="editQuote">
	<form class="quote-edit">
		<div class="row">
			<div class="col-md-7">
				<div class="lk-title">Редактировать заявку</div>
				<input type="hidden" value="{{ quote.id }}" name="id">
				{{#if this.spec_service}}
				<input type="hidden" name="spec_service" value="{{this.spec_service}}">
				<input type="hidden" name="title" value="{{catalog.spec_service[this.spec_service].header}}">
				{{else}}
				<div class="admin-editor__event mb-20">
					<div class="search__block --flex --aicn">
						<div class="input">
							<input class="popup-services-list" type="text" placeholder="Поиск по услугам" autocomplete="off">
							<div class="search__drop">
							</div>
							<button class="search__btn" type="button">
								<svg class="svgsprite _search">
									<use xlink:href="/assets/img/sprites/svgsprites.svg#search"></use>
								</svg>
							</button>
						</div>
					</div>
				</div>
				<div class="admin-editor__event mb-20">
					<!-- services-select.dropdown -->
				</div>
				{{/if}}
				<div class="admin-editor__type-event">
					<p class="mb-10">Тип события</p>
					<div class="text-radios">
						{{#each catalog.quoteType as item}}
						<label class="text-radio">
							{{#if item.id == quote.type }}
							<input type="radio" name="type" value="{{ item.id }}" checked>
							<span>{{item.name}}</span>
							{{else}}
							<input type="radio" name="type" value="{{ item.id }}">
							<span>{{item.name}}</span>
							{{/if}}
						</label>
						{{/each}}
					</div>
					<div class="row">
						{{#if this.spec_service}}
						{{else}}
						<div class="col-md-6">
							<div class="select-form select-checkboxes">
								<div class="select select_experts">
									<div class="select__main">
										<div class="select__placeholder">Выберите специалиста</div>
										<div class="select__values"></div>
									</div>
									<div class="select__list">
										{{#each catalog.experts}}
										<div class="select__item select__item--checkbox">
											<label class="checkbox checkbox--record">
												{{#if @global.expertSelected(quote.experts, this)}}
												<input type="checkbox" name="experts[]" checked value="{{id}}">
												{{else}}
												<input type="checkbox" name="experts[]" value="{{id}}">
												{{/if}}
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
						</div>
						{{/if}}
						<div class="col-md-6">
							<div class="row">

								<div class="col-md-6">
									<div class="input input-lk-calendar input--grey">
										<input class="input__control datepickr"
											name="event_datetime" value="{{event_date}}"
											type="text" placeholder="Выбрать дату и время">
										<div class="input__placeholder">Выбрать дату</div>
									</div>
								</div>
								<div class="col-md-3">
									<div class="calendar input mb-30">
										<input class="input__control" type="time" name="event_time_start"
											min="09:00" max="18:00" pattern="[0-9]{2}:[0-9]{2}" required>
										<div class="input__placeholder">Время начала</div>
									</div>
								</div>
								<div class="col-md-3">
									<div class="calendar input mb-30">
										<input class="input__control" type="time" name="event_time_end"
											min="09:00" max="18:00" pattern="[0-9]{2}:[0-9]{2}" required>
										<div class="input__placeholder">Время окончания</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="admin-editor__patient">
					<div class="text-bold mb-10">Выбраны услуги</div>
					{{#if this.spec_service}}
					<div class="search__drop-item">
						<input type="hidden" name="services[]" value="">
						<div class="search__drop-name">
							{{catalog.spec_service[this.spec_service].header}}
						</div>
						<div class="search__drop-right">
							<div class="search__drop-summ">{{catalog.spec_service[this.spec_service].price}} ₽</div>
						</div>
					</div>
					{{else}}
					{{#each quote.service_prices: idx, key}}
					<div class="search__drop-item" data-index="{{idx}}"
						data-id="{{key}}" data-service_id="{{service_id}}" data-price="{{price}}">
						<input type="hidden" name="services[]"
							value="{{service_id}}">
						<input type="hidden" name="service_prices[{{key}}][service_id]"
							value="{{service_id}}">
						<input type="hidden" name="service_prices[{{key}}][price_id]"
							value="{{price_id}}">
						<input type="hidden" name="service_prices[{{key}}][name]"
							value="{{name}}">
						<input type="hidden" name="service_prices[{{key}}][price]"
							value="{{price}}">
						<div class="search__drop-name">
							{{name}}
							<div class="search__drop-delete">
								<svg class="svgsprite _delete">
									<use xlink:href="/assets/img/sprites/svgsprites.svg#delete"></use>
								</svg>
							</div>
						</div>
						<div class="search__drop-right">
							<div class="search__drop-summ">{{price}} ₽</div>
						</div>
					</div>
					{{/each}}
					{{/if}}
				</div>

				<div class="admin-editor__summ">
					<p>Всего</p>
					<input type="hidden" name="price" value="{{quote.price}}">
					<p class="price">{{quote.price}} ₽</p>
				</div>

				<button class="btn btn--white" on-click="save">Сохранить</button>
			</div>
			<div class="col-md-1"></div>
			<div class="col-md-4 --jcfe --flex">
				<textarea class="admin__editor-textarea" name="comment" placeholder="Добавить комментарий">{{quote.comment}}</textarea>
			</div>
		</div>
	</form>
</template>
<template id="listRecords">
	<div class="account-scroll">
		<div class="account__table" data-records-group="{{group}}">
			<div class="account__table-head">
				<div class="admin-events-item">
					<button class="flag-date__ico">
						<svg class="svgsprite _flag">
							<use xlink:href="/assets/img/sprites/svgsprites.svg#flag"></use>
						</svg>
					</button>
					<span>{{#if group == 'events'}} Событие {{else}} Заявка {{/if}}</span>
				</div>
				<div class="admin-events-item">Приём</div>
				<div class="admin-events-item">ФИО</div>
				<div class="admin-events-item">Телефон</div>
				<div class="admin-events-item">Специалист</div>
				<div class="admin-events-item">Тип</div>
				<div class="admin-events-item">Услуга</div>
				<div class="admin-events-item">Оплата</div>
				<div class="admin-events-item">Статус</div>
				<div class="admin-events-item">Комментарии</div>
			</div>
			<div class="account__table-body">
				<div class="loading-overlay">
					<div class="loader"></div>
				</div>

				{{#each records}}
				<div class="acount__table-accardeon accardeon --{{catalog.quoteStatus[this.status].color}} acount__table-accardeon--pmin"
					data-client={{client}} data-id="{{id}}" data-priority="{{priority}}" data-group="{{group}}">
					<div class="acount__table-main accardeon__main acount__table-auto">
						<div class="admin-events-item heap">
							<div class="accardeon__click" data-id="{{this.id}}" on-click="editRecord"></div>
							<div class="flag-date">
								{{#if priority * 1}}
								<label class="checkbox">
									<input type="checkbox" checked>
									<span></span>
								</label>
								{{else}}
								<label class="checkbox">
									<input type="checkbox">
									<span></span>
								</label>
								{{/if}}

								{{#if marked == 'true' }}
								<button class="flag-date__ico checked">
									<svg class="svgsprite _flag">
										<use xlink:href="/assets/img/sprites/svgsprites.svg#flag"></use>
									</svg>
								</button>
								{{else}}
								<button class="flag-date__ico">
									<svg class="svgsprite _flag">
										<use xlink:href="/assets/img/sprites/svgsprites.svg#flag"></use>
									</svg>
								</button>
								{{/if}}

								<span class="dt"><strong class="title">Заявка: </strong>{{date}}
									<br>{{time}}
								</span>
							</div>
						</div>
						<div class="admin-events-item">
							<p>Приём</p>
							{{#if group === 'events'}}
							<a href="#">{{@global.utils.formatDate(event_date)}}, {{event_time_start}}-{{event_time_end}}</a>
							{{else}}
							<span class="link-danger">- уточнить -</span>
							{{/if}}
						</div>
						<div class="admin-events-item">
							<p>ФИО</p>
							<a href="/search/client/{{.client}}">{{catalog.clients[client].fullname}}</a>
						</div>
						<div class="admin-events-item">
							<p>Телефон</p>
							{{catalog.clients[client].phone}}
						</div>
						<div class="admin-events-item col-experts">
							<p>Специалист</p>
							{{#if no_experts == '1'}}
							<span class="link-danger">- уточнить -</span>
							{{else}}
							{{#experts}}
							<div>{{catalog.experts[this].name}}</div>
							{{/experts}}
							{{/if}}
						</div>
						<div class="admin-events-item">
							<p>Тип</p>
							{{#each catalog.quoteType as item}}
							{{#if item.id == type }}{{item.name}}{{/if}}
							{{/each}}
						</div>
						<div class="admin-events-item col-services">
							<p>Услуга</p>
							{{#if no_services == '1'}}
							<span class="link-danger">- уточнить -</span>
							{{else}}
							{{#services}}
							<div>{{catalog.services[this].header}}</div>
							{{/services}}
							{{/if}}
						</div>
						<div class="admin-events-item">
							<p>Оплата</p>
							{{#each catalog.quotePay as item}}
							{{#if item.id == pay_status }}{{item.name}}{{/if}}
							{{/each}}
						</div>
						<div class="admin-events-item">
							<p>Статус</p>
							{{catalog.quoteStatus[status].name}}
						</div>
						<div class="admin-events-item">
							<p>Комментарии</p>{{comment}}
						</div>
					</div>
					<div class="acount__table-list accardeon__list admin-editor">
						<div class="admin-editor__top">
							<div class="admin-editor__top-info">
								<div class="lk-title">Редактировать профиль</div>
								<div class="admin-editor__name user__edit">{{catalog.clients[client].fullname}}
									<button class="user__edit" on-click="editProfile" data-id="{{client}}">
										<svg class="svgsprite _edit">
											<use xlink:href="/assets/img/sprites/svgsprites.svg#edit"></use>
										</svg>
									</button>
								</div>
								<div class="admin-editor__iser-contacts">
									<p>Дата рождения:
										<span>{{catalog.clients[client].birthdate}}</span>
									</p>
									<p>Телефон:
										<span>{{catalog.clients[client].phone}}</span>
									</p>
								</div>
							</div>
							<div class="admin-editor__top-status">
								<div class="admin-editor__top-date">
									Заявка сформирована {{@global.utils.formatDate(_created)}} / {{@global.utils.formatTime(_created)}}
								</div>
								<div class="admin-editor__top-select"></div>
							</div>
						</div>
						<div class="admin-editor__edit-profile" data-client="{{this.client}}"></div>
						<div class="admin-editor__events" data-id="{{this.id}}"></div>
					</div>
				</div>
				{{else}}
				<div class="acount__table-accardeon accardeon">
					<div class="acount__table-main accardeon__main">
						Нет записей о продолжительном лечении
					</div>
				</div>
				{{/each}}
			</div>
		</div>
	</div>
</template>

<script wb-app remove>
	var tabs = {};
	$(function () {
		setTimeout(function () {
			let editProfile = wbapp.tpl('#editProfile').html;
			let editStatus  = wbapp.tpl('#editStatus').html;
			let editQuote   = wbapp.tpl('#editQuote').html;

			['quotes', 'events'].forEach(
				function (target_tab) {
					utils.api.get('/api/v2/list/records?group=' + target_tab + '&@sort=priority:d')
						.then(function (result) {
							let data = {
								group: target_tab,
								records: result,
								catalog: catalog
							};
							var _tab = new Ractive({
								el: '.data-tab-item[data-tab="' + target_tab + '"]',
								template: wbapp.tpl('#listRecords').html,
								data: {
									group: target_tab,
									records: result,
									catalog: catalog
								},
								on: {
									loaded() {
										console.log('>>> loaded', target_tab);
										this.find('.loading-overlay').remove();
									},
									editProfile(ev) {
										let record     = $(ev.node).parents('.acount__table-accardeon[data-id]')
											.data('id');
										let profile_id = $(ev.node).data('id');
										let form       = $(ev.node).parents('.admin-editor')
											.find('.admin-editor__edit-profile');
										let editor     = new Ractive({
											el: form,
											template: editProfile,
											data: {},
											on: {
												save(ev) {
													let $form = $(form);
													if ($form.verify() && profile_id > '') {
														let data = $form.serializeJSON();
														CabinetController.updateProfile(profile_id, data,
															function (res) {
																console.log(res);
																data.birthdate_fmt = utils.formatDate(data.birthdate);
																data.phone         = utils.formatPhone(data.phone);
																cabinet.set('user', data); /* get actually user data */
																$(form).html('');
																toast('Профиль успешно обновлён');
															});
													}
												}
											}
										});
										fetch('/form/users/getClient/' + profile_id, {
											method: 'GET'
										}).then((response) => {
											return response.json();
										}).then(function (data) {
											editor.set(data);
											initPlugins();
										});
									},
									editQuote(ev) {
										const _parent = $(ev.node).parents('.accardeon');
										let id        = $(ev.node).data('id');
										let record    = _tab.get('result.' + id);
										if (!quote.price) {
											quote.price = 0;
										}

										fetch('/form/users/getClient/' + item, {
											method: 'GET'
										}).then((response) => {
											return response.json();
										}).then(function (data) {
											_tab.set('result.' + id + '.clientData', data);
										});

										quote.price_text = utils.formatPrice(quote.price);
										let statusEdt    = new Ractive({
											el: _parent.find('.admin-editor__top-select'),
											template: editStatus,
											data: {
												catalog: catalog,
												quote: quote
											},
											on: {
												complete() {
													$(statusEdt.find(`.select.status [data-id="${quote.status}"]`))
														.trigger('click');
													$(statusEdt.find(`.select.pay [data-id="${quote.pay_status}"]`))
														.trigger('click');
												},
												save(ev) {
													let lead = $(ev.node).parents('.acount__table-accardeon[data-id]')
														.data('id');
													let item = $(ev.node).data('id');
													let form = $(ev.node).parents('.admin-editor');
													$(form).find('.admin-editor__edit-profile').html('');
													let copy = $('<form></form>');
													$(copy).html($(form).clone());
													let post = $(copy).serializeJSON();
													wbapp.post('/api/v2/update/records/' + lead, post, function (res) {
														_tab.set('results.' + lead, res);

														toast('Успешно сохранено');
													});
													delete copy;
												}
											}
										});
										let quoteEdt     = new Ractive({
											el: _parent.find('.admin-editor__events'),
											template: editQuote,
											data: {
												catalog: catalog,
												quote: quote
											},
											on: {
												complete(ev) {
													initServicesSearch($('.popup-services-list'), catalog.servicesList);
													initPlugins();
												},
												save(ev) {
													let lead = $(ev.node).parents('.acount__table-accardeon[data-id]')
														.data('id');
													let item = $(ev.node).data('id');
													let form = $(ev.node).parents('.admin-editor');

													let post = $($(ev.node).parents('form')).serializeJSON();
													CabinetController.updateQuote(lead, post, function (res) {
														console.log('event data:', post);
														toast('Успешно сохранено');
														_tab.set('results.' + lead, res);

														toast('Успешно сохранено');
													});

													return false;
												}
											}
										});
									}
								}
							});

							console.log('>>> loaded ' + target_tab + ':', data);
							_tab.fire('loaded');
							tabs[target_tab] = {ractive: _tab, data: data};
						});

				}
			);

			$(document).on('click', 'button.flag-date__ico', function (e) {
				e.stopPropagation();
				const _parent    = $(this).parents('.acount__table-accardeon');
				const _id        = _parent.data('id');
				const _is_marked = $(this).hasClass('checked');
				console.log('flagged', _id, _is_marked);
				wbapp.post('/api/v2/update/records/' + _id, {marked: !!_is_marked}, function (res) {
					toast('Успешно обновлено');
				});
			}).on('change', '.flag-date [type="checkbox"]', function (e) {
				e.stopPropagation();
				const _list      = $(this).parents('.account__table-body');
				const _parent    = $(this).parents('.acount__table-accardeon');
				const _id        = _parent.data('id');
				const _is_marked = $(this).is(':checked');
				const _priority  = _is_marked ? Date.now() : 0;

				_parent.attr('data-priority', _priority);
				_list.find(".acount__table-accardeon").sort(function (a, b) {
					const _a = parseInt($(a).attr('data-priority'));
					const _b = parseInt($(b).attr('data-priority'));
					return (_a > _b) ? -1 : (_a < _b) ? 1 : 0;
				}).appendTo(_list);

				utils.api.post('/api/v2/update/records/' + _id, {priority: _priority})
					.then(function (res) {
						//toast('Список обновлен');
					});
			});
		});
	});
</script>

<div>
	<wb-module wb="module=yonger&mode=render&view=footer"/>
</div>

<script src="/assets/js/cabinet.js?v=1.1"></script>
</body>

<wb-jq wb="$dom->find('script:not([src]):not([type])')->attr('type','wbapp');"/>
<wb-jq wb="$dom->find('.content-wrap ul')->addClass('ul-line');"/>

</html>