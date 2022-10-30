<!DOCTYPE html>
<html class="no-js" lang="ru">
<head>
	<title seo>Кабинет администратора</title>
	<link rel="icon" href="/favicon.svg" type=" image/svg+xml">
</head>

<body class="body lk-cabinet" data-barba="wrapper">
<div class="scroll-container" data-scroll-container>
	<div>
		<wb-module wb="module=yonger&mode=render&view=header"></wb-module>
	</div>
	<main class="page" data-barba="container" data-barba-namespace="cabinet" wb-off>
		<div class="account admin">
			<form class="search" action="/cabinet/search">
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
							<h1 class="h1 mb-10">Кабинет администратора</h1>
						</div>
						<a class="btn btn--black --openpopup" onclick="popupsCreateProfile();"
							data-popup="--create-client">
							Создать карточку пациента
						</a>
					</div>
					<div class="search__block --flex --aicn">
						<div class="input">
							<input class="search__input" type="text" placeholder="Поиск" name="q">
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
	<form class="profile-edit d-block" on-submit="save">
		<input type="hidden" value="{{ id }}" name="id">
		<p class="text-bold mb-30">Редактировать профиль</p>
		<div class="row profile-edit__wrap">
			<div class="col-md-3">
				<div class="input input--grey">
					<input class="input__control datebirthdaypickr" name="birthdate" required
						value="{{ .birthdate }}" type="text" placeholder="Дата рождения">
					<div class="input__placeholder input__placeholder--dark">Дата рождения</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="input input--grey">
					<input class="input__control" type="tel" name="phone" required
						value="{{ phone }}" placeholder="Телефон"
						data-inputmask="'mask': '+7 (999) 999-99-99'">
					<div class="input__placeholder input__placeholder--dark">Телефон</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="input input--grey">
					<input class="input__control" type="email" name="email" required
						value="{{ email }}" placeholder="E-mail">
					<div class="input__placeholder input__placeholder--dark">E-mail</div>
				</div>
			</div>
			<div class="col-md-2">
				<button class="btn btn--white profile-edit__submit" type="button">Сохранить</button>
			</div>
		</div>

		<p class="text-bold mb-30 delivery-address">Адрес доставки</p>
		<div class="row profile-edit__wrap">
			<div class="col-md-9">
				<div class="row">
					<div class="col-md-4">
						<div class="input input--grey">
							<input class="input__control" type="text" name="country"
								value="{{ country }}" placeholder="Страна">
							<div class="input__placeholder input__placeholder--dark">Страна</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="input input--grey">
							<input class="input__control" type="text" name="city"
								value="{{ city }}" placeholder="Город">
							<div class="input__placeholder input__placeholder--dark">Город</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="input input--grey">
							<input class="input__control" type="text" name="address"
								value="{{ address }}" placeholder="Улица и дом">
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
				<button class="btn btn--white profile-edit__submit" type="button" >Сохранить</button>
			</div>
		</div>
	</form>
</template>

<template id="editStatus">
	<div class="select-form">
		<div class="select pay">
			<div class="select__main">Статус оплаты</div>
			<div class="select__list">
				<input type="hidden" name="pay_status" value="{{ record.pay_status }}">
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
				<input type="hidden" class="status" name="status" value="{{ record.status }}">
				<input type="hidden" class="group" name="group" value="{{ record.group }}">
				{{#each catalog.quoteStatus}}
				{{#if id == 'delimiter'}}
				<div class="select__delimiter" disabled></div>
				{{else}}
				<div class="select__item select__item--acc-{{color}}"
					data-id="{{ id }}"
					data-group="{{ type }}"
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
<template id="editorRecord">
	<form class="record-edit">
		<div class="row">
			<div class="col-md-7">
				<div class="lk-title">Редактировать заявку</div>
				<input type="hidden" value="{{ record.id }}" name="id">

				{{#if this.spec_service}}
				<input type="hidden" name="spec_service" value="{{this.spec_service}}">
				<input type="hidden" name="title" value="{{catalog.spec_service[this.spec_service].header}}">
				{{else}}
				<div class="admin-editor__event mb-20">
					<div class="search__block --flex --aicn">
						<div class="input">
							<input class="popup-services-list"
								type="text" placeholder="Поиск по услугам"
								autocomplete="off">
							<div class="search__drop"></div>
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
						{{#each catalog.quoteType as qt}}
						<label class="text-radio">
							{{#if qt.id === record.type }}
							<input type="radio" name="type" value="{{ qt.id }}" checked>
							{{else}}
							<input type="radio" name="type" value="{{ qt.id }}">
							{{/if}}
							<span>{{qt.name}}</span>
						</label>
						{{/each}}
					</div>
					<div class="row">
						{{#if record.spec_service}}
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
												{{#if @global.utils.arr.search(.id, record.experts)}}
												<input type="checkbox" class="checked" name="experts[]" checked value="{{.id}}">
												{{else}}
												<input type="checkbox" name="experts[]" value="{{.id}}">
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
								<div class="col-md-12">
									<div class="input input-lk-calendar input--grey">
										<input class="input__control datepickr"
											name="event_date"
											value="{{record.event_date}}"
											type="text" placeholder="Выбрать дату и время">
										<div class="input__placeholder">Выбрать дату</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="calendar input mb-30">
										<input class="input__control timepickr"
											type="text"
											name="event_time_start"
											value="{{record.event_time_start}}"
											data-min-time="09:00"
											data-max-time="18:00"
											pattern="[0-9]{2}:[0-9]{2}" required>
										<div class="input__placeholder">Время (начало)</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="calendar input mb-30">
										<input class="input__control timepickr" type="text"
											name="event_time_end"
											value="{{record.event_time_end}}"
											data-min-time="09:00"
											data-max-time="18:00"
											pattern="[0-9]{2}:[0-9]{2}" required>
										<div class="input__placeholder">Время (конец)</div>
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
							<div class="search__drop-summ">
								{{catalog.spec_service[this.spec_service].price}} ₽</div>
						</div>
					</div>
					{{else}}
					{{#each record.service_prices: idx, key}}
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
							<div class="search__drop-summ">{{ @global.utils.formatPrice(.price) }} ₽</div>
						</div>
					</div>
					{{/each}}
					{{/if}}
				</div>
				<div class="admin-editor__summ">
					<p>Всего</p>
					<input type="hidden" name="price" value="{{record.price}}">
					<p class="price">{{ @global.utils.formatPrice(record.price) }} ₽</p>
				</div>

				<button class="btn btn--white" on-click="save">Сохранить</button>
			</div>
			<div class="col-md-1"></div>
			<div class="col-md-4 --jcfe --flex">
				<textarea class="admin__editor-textarea" name="comment" placeholder="Добавить комментарий">{{record.comment}}</textarea>
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
				{{#each records: idx}}
				<div class="acount__table-accardeon accardeon --{{catalog.quoteStatus[this.status].color}} acount__table-accardeon--pmin"
					data-client="{{.client}}"
					data-record="{{.id}}"
					data-idx="{{idx}}"
					data-priority="{{.priority}}"
					data-group="{{.group}}">
					<div class="acount__table-main accardeon__main acount__table-auto">
						<div class="admin-events-item heap">
							<div class="accardeon__click" data-record="{{this.id}}" data-idx="{{idx}}"
								on-click="editRecord"></div>
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
							<span class="link-danger"></span>
							{{/if}}
						</div>
						<div class="admin-events-item">
							<p>ФИО</p>
							<a href="/search/client/{{.client}}">{{catalog.clients[.client].fullname}}</a>
						</div>
						<div class="admin-events-item">
							<p>Телефон</p>
							{{catalog.clients[client].phone}}
						</div>
						<div class="admin-events-item col-experts">
							<p>Специалист</p>
							{{#if no_experts == '1'}}
							<div></div>
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
							<div></div>
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
							{{catalog.quoteStatus[this.status].name}}
						</div>
						<div class="admin-events-item">
							<p>Комментарии</p>{{this.comment}}
						</div>
					</div>
					<div class="acount__table-list accardeon__list admin-editor">
						<div class="admin-editor__top">
							<div class="admin-editor__top-info">
								<div class="lk-title">Редактировать профиль</div>
								<div class="admin-editor__name user__edit">
									{{ catalog.clients[client].fullname }}
									<button class="user__edit" on-click="editProfile" data-id="{{client}}">
										<svg class="svgsprite _edit">
											<use xlink:href="/assets/img/sprites/svgsprites.svg#edit"></use>
										</svg>
									</button>
								</div>
								<div class="admin-editor__iser-contacts">
									<p>Дата рождения:
										<span>{{ catalog.clients[client].birthdate }}</span>
									</p>
									<p>Телефон:
										<span>{{ @global.utils.formatPhone(catalog.clients[client].phone) }}</span>
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
						<div class="admin-editor__edit-profile" data-client="{{.client}}"></div>
						<div class="admin-editor__events" data-record="{{.id}}" data-idx="{{idx}}"></div>
					</div>
				</div>
				{{else}}
				<div class="acount__table-accardeon accardeon">
					<div class="acount__table-main accardeon__main">
						Нет записей
					</div>
				</div>
				{{/each}}
			</div>
		</div>
	</div>
</template>

<script wb-app remove>
	var tabs = {};
	$(document).on('cabinet-db-ready', function () {
		let editProfile = wbapp.tpl('#editProfile').html;
		let editStatus  = wbapp.tpl('#editStatus').html;

		['quotes', 'events'].forEach(
			function (target_tab) {
				utils.api.get('/api/v2/list/records', {group: target_tab, '@sort': "priority:d"}).then(
					function (result) {
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
									let profile_id = $(ev.node).data('id');
									let form       = $(ev.node).parents('.admin-editor')
										.find('.admin-editor__edit-profile');
									let editor     = new Ractive({
										el: form,
										template: editProfile,
										data: {},
										lazy: true,

										on: {
											save(ev) {
												let $form = $(form);
												if ($form.verify() && profile_id > '') {
													let data = $form.serializeJSON();

													Cabinet.updateProfile(profile_id, data,
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
								editRecord(ev) {
									const _parent = $(ev.node).parents('.accardeon');
									var _row_idx  = $(ev.node).data('idx');
									var _record   = this.get('records.' + _row_idx);
									console.log('open ', _record);
									if (!_record.price) {
										_record.price = 0;
									}

									_record.price_text = utils.formatPrice(_record.price);
									let statusEditor   = new Ractive({
										el: _parent.find('.admin-editor__top-select'),
										template: editStatus,
										data: {
											catalog: catalog,
											record: _record
										},
										on: {
											complete() {
												$(statusEditor.find(`.select.status [data-id="${_record.status}"]`))
													.trigger('click');
												$(statusEditor.find(`.select.pay [data-id="${_record.pay_status}"]`))
													.trigger('click');
											},
											save(ev) {
												let form = $(ev.node).parents('.admin-editor');
												$(form).find('.admin-editor__edit-profile').html('');
												let copy = $('<form></form>');
												$(copy).html($(form).clone());

												let post = $(copy).serializeJSON();
												utils.api.post('/api/v2/update/records/' + _record.id, post)
													.then(function (res) {
														_tab.set('records.' + _row_idx, res);

														toast('Успешно сохранено');
													});
												delete copy;
											}
										}
									});
									let recordEditor   = new Ractive({
										el: _parent.find('.admin-editor__events'),
										template: wbapp.tpl('#editorRecord').html,
										data: {
											catalog: catalog,
											record: _record
										},
										on: {
											complete() {
												initServicesSearch($('.popup-services-list'), catalog.servicesList);

												initPlugins();
												if (!!$('.select .select__item input:checked').length) {
													$('.select.select_experts .select__item').trigger('click');
												}
											},
											save(ev) {
												if ($($(ev.node).parents('form')).verify()) {

													let post = $($(ev.node).parents('form')).serializeJSON();
													Cabinet.updateQuote(_record.id, post,
														function (res) {
															console.log('event data:', post);
															toast('Успешно сохранено');
															_tab.set('records.' + _row_idx, res);
														});
												} else {
													toast('Проверьте указанные данные');
												}
												return false;
											}
										}
									});
								}
							}
						});

						_tab.fire('loaded');
						tabs[target_tab] = {ractive: _tab, data: data};
					});
			})
		;

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
</script>

<div>
	<wb-module wb="module=yonger&mode=render&view=footer"/>
</div>
<wb-jq wb="$dom->find('script:not([src]):not([type])')->attr('type','wbapp');"/>
<wb-jq wb="$dom->find('.content-wrap ul')->addClass('ul-line');"/>

</html>