<!DOCTYPE html>
<html class="no-js" lang="ru">
<head>
	<title seo>Кабинет администратора</title>
	<link rel="icon" href="/favicon.svg" type=" image/svg+xml">
</head>

<body class="body lk-cabinet" data-barba="wrapper">
<div class="scroll-container lk-main" data-scroll-container>
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
						<div>
							<a class="btn btn--black --openpopup" onclick="popupsCreateProfile();"
								data-popup="--create-client">
								Создать карточку пациента
							</a>
							<a class="btn btn--black" onclick="newEvent();">
								Записать пациента
							</a>
						</div>

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
							data-type="group=quotes"
							data-tab="quotes" data-tabs="records">Заявки
						</div>
						<div class="account__tab-item data-tab-link"
							data-type="group=events&status=upcoming"
							data-tab="events" data-tabs="records">События
						</div>
						<div class="account__tab-item data-tab-link"
							data-type="group=events&status=[past,cancel_think,cancel_expensive,cancel_noreason]"
							data-tab="past" data-tabs="records">Завершенные
						</div>
						<div class="account__tab-item data-tab-link"
							data-tab="longterms" data-tabs="records">Продолжительное
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

					<div class="account__tab data-tab-item active" data-tab="quotes"
						data-type="group=quotes">
						<div class="loading-overlay">
							<div class="loader"></div>
						</div>
					</div>
					<div class="account__tab data-tab-item" data-tab="events"
						data-type="group=events&status=upcoming">
						<div class="loading-overlay">
							<div class="loader"></div>
						</div>
					</div>

					<div class="account__tab data-tab-item" data-tab="past"
						data-type="group=events&status=[past,cancel_think,cancel_expensive,cancel_noreason]">
						<div class="loading-overlay">
							<div class="loader"></div>
						</div>
					</div>
					<div class="account__tab data-tab-item" data-tab="longterms"
						data-type="group=longterms">
						<div class="loading-overlay">
							<div class="loader"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
</div>

<template id="editProfile" wb-off>
	<form class="profile-edit d-block" on-submit="save">
		<input type="hidden" value="{{ id }}" name="id">
		<p class="text-bold mb-30">Редактировать профиль</p>
		<div class="row profile-edit__wrap">
			<div class="col-md-9">
				<div class="input input--grey">
					<input class="input__control" name="fullname" required
						value="{{ .fullname }}" type="text" placeholder="ФИО">
					<div class="input__placeholder input__placeholder--dark">ФИО</div>
				</div>
			</div>
		</div>
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
					<input class="input__control intl-tel" type="tel" name="phone" required
						value="{{ .phone }}">
					<div class="input__placeholder input__placeholder--dark active">Телефон</div>
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
				<button class="btn btn--white profile-edit__submit" type="submit">Сохранить</button>
			</div>
		</div>

		<p class="text-bold mb-30 delivery-address">Адрес доставки</p>
		<div class="row profile-edit__wrap">
			<div class="col-md-9">
				<div class="row">
					<div class="col-md-3">
						<div class="input input--grey">
							<input class="input__control" type="text" name="country"
								value="{{ country }}" placeholder="Страна">
							<div class="input__placeholder input__placeholder--dark">Страна</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="input input--grey">
							<input class="input__control" type="text" name="city"
								value="{{ city }}" placeholder="Город">
							<div class="input__placeholder input__placeholder--dark">Город</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="input input--grey">
							<input class="input__control" type="text" name="street"
								value="{{street}}" placeholder="Улица">
							<div class="input__placeholder input__placeholder--dark">Улица
							</div>
						</div>
					</div>
					<div class="col-md-2">
						<div class="input input--grey">
							<input class="input__control" type="text" name="build"
								value="{{build}}" placeholder="Дом">
							<div class="input__placeholder input__placeholder--dark">Дом</div>
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
				<button class="btn btn--white profile-edit__submit" type="submit">Сохранить</button>
			</div>
		</div>
	</form>
</template>
<template id="editStatus" wb-off>
	<div class="select-form">
		<div class="select pay">
			<div class="select__main">Статус оплаты</div>
			<div class="select__list">
				<input type="hidden" class="pay_status" name="pay_status" value="{{ record.pay_status }}">
				{{#each catalog.quotePay}}
				<div class="select__item" data-id="{{id}}"
					onclick="$(this).parents('.select.pay').find('input.pay_status').val($(this).attr('data-id'));$(this).parents('.select.pay').addClass('has-values')">
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
					data-id="{{id}}"
					data-group="{{type}}"
					onclick="$(this).parents('.select.status').find('input.status').val($(this).attr('data-id'));$(this).parents('.select.status').find('input.group').val($(this).attr('data-group'));">
					{{name}}
				</div>
				{{/if}}
				{{/each}}
			</div>
		</div>
	</div>

	<button class="btn btn--white d-none status-save" on-click="save">Сохранить</button>
</template>
<template id="editorRecord" wb-off>
	<form class="record-edit">
		<div class="row">
			<div class="col-md-7">
				{{#if record.client_comment}}
				<div class="account-events__item wide">
					<div class="account-event-wrap" style="font-size: 20px">
						<div class="account-events__name">Причина обращения:</div>
						<div class="account-event">
							{{{@global.nl2br(record.client_comment)}}}
						</div>
					</div>
				</div>
				{{/if}}
				<div class="lk-title">Редактировать заявку</div>
				<input type="hidden" value="{{ record.id }}" name="id">

				{{#if record.spec_service}}
				<input type="hidden" name="spec_service" value="{{this.spec_service}}">
				<input type="hidden" name="title" value="{{catalog.spec_service[this.spec_service].header}}">
				{{else}}

				{{/if}}
				{{#if record.group === 'events' }}
				{{elseif record.no_services === '1' }}
					<label class="checkbox checkbox--record hider-checkbox">
						<input class="checkbox-hidden-next-form disabled" type="checkbox" value="1" checked>
						<span></span>
						<div class="checbox__name">Мне лень искать в списке, скажу администратору (указано в пациентом)</div>
					</label>
				{{/if}}

				{{#if record.group === 'events' }}
				{{elseif record.no_experts === '1' }}
				<label class="checkbox checkbox--record hider-checkbox">
					<input class="checkbox-hidden-next-form disabled" type="checkbox" value="1" checked>
					<span></span>
					<div class="checbox__name">Я не знаю, кого выбрать (указано в пациентом)</div>
				</label>
				{{/if}}

				<div class="admin-editor__type-event">
					<div class="consultations mb-16">
						<label class="checkbox checkbox--record show-checkbox" data-show-input="consultation-type">
							<input type="hidden" name="for_consultation" value="0">

							{{#if record.for_consultation === '1' }}
							<input class="checkbox-visible-next-form" type="checkbox" checked
								name="for_consultation" value="1">
							{{else}}
							<input class="checkbox-visible-next-form" type="checkbox"
								name="for_consultation" value="1">
							{{/if}}
							<span></span>
							<div class="checbox__name">Консультация врача</div>
						</label>
						<div class="select-form" data-show="consultation-type"
							style="display: {{#if record.for_consultation === '1' }} block {{else}} none {{/if}};">
							<div class="text-bold mb-20">Тип события</div>
							<div class="popups__text-chexboxs">
								{{#each @global.catalog.quoteType as qt}}
								<label class="text-radio show-checkbox" data-show-input="consultation-{{ qt.id }}">
									{{#if qt.id === record.type }}
									<input type="radio" name="type"
										class="consultation-type {{qt.id}}"
										value="{{ qt.id }}" checked>
									{{else}}
									<input type="radio" name="type" value="{{ qt.id }}"
										class="consultation-type {{qt.id}}">
									{{/if}}
									<span>{{qt.name}}</span>
								</label>
								{{/each}}
							</div>
							<div class="admin-editor__patient price-list">
								{{#each @global.catalog.spec_service.consultations.online}}
								<div class="search__drop-item consultation online"
									data-show="consultation-online"
									data-consultation="{{this.id}}"
									data-price="0"
									style="display: {{#if record.type === 'online' }} flex {{else}} none {{/if}};">
									<div class="search__drop-name pl-0">
										<label class="checkbox"
											data-name="{{this.header}}"
											data-price="{{this.price}}"
											data-id="{{this.id}}">
											{{#if record.consultation == this.id }}
											<input type="radio" name="consultation" value="{{this.id}}"
												data-name="{{this.header}}" data-price="{{this.price}}"
												checked="checked">
											{{else}}
											<input type="radio" name="consultation" value="{{this.id}}"
												data-name="{{this.header}}" data-price="{{this.price}}">
											{{/if}}
											<span></span>
											<div class="checbox__name">{{this.header}}</div>
										</label>
									</div>
									<label class="search__drop-right">
										<div class="search__drop-summ">{{ @global.utils.formatPrice(this.price) }} ₽</div>
									</label>
								</div>
								{{/each}}

								{{#each @global.catalog.spec_service.consultations.clinic}}
								<div class="search__drop-item consultation clinic"
									data-show="consultation-clinic"
									data-consultation="{{this.id}}"
									data-price="0"
									style="display: {{#if record.type === 'clinic' }} flex {{else}} none {{/if}};">
									<div class="search__drop-name pl-0">
										<label class="checkbox"
											data-name="{{this.header}}" data-price="{{this.price}}"
											data-id="{{this.id}}">
											{{#if record.consultation == this.id }}
											<input type="radio" name="consultation" value="{{this.id}}"
												data-name="{{this.header}}" data-price="{{this.price}}"
												checked="checked">
											{{else}}
											<input type="radio" name="consultation" value="{{this.id}}"
												data-name="{{this.header}}" data-price="{{this.price}}">
											{{/if}}
											<span></span>
											<div class="checbox__name">{{this.header}}</div>
										</label>
									</div>
									<label class="search__drop-right">
										<div class="search__drop-summ">{{ @global.utils.formatPrice(this.price) }} ₽</div>
									</label>
								</div>
								{{/each}}
							</div>
						</div>
						<input type="hidden" class="consultation_price" name="consultation_price" value="{{record.consultation_price}}">
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
										{{#each @global.catalog.experts}}
										<div class="select__item select__item--checkbox">
											<label class="checkbox checkbox--record">
												{{#if @global.utils.arr.search(.id, record.experts)}}
												<input type="checkbox" class="checked" name="experts[]" checked value="{{.id}}">
												{{else}}
												<input type="checkbox" name="experts[]" value="{{.id}}">
												{{/if}}
												<span></span>
												<div class="checbox__name">
													<div class="select__name">{{fullname}}</div>
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
										<input class="input__control datepickr empty-date"
											name="event_date"
											data-date="{{record.event_date}}"
											value="{{ @global.utils.dateForce(record.event_date) }}"
											autocomplete="off"
											type="text" placeholder="Выбрать дату и время">
										<div class="input__placeholder">Выбрать дату</div>
									</div>
								</div>
							</div>
							<div class="row event-time">
								<div class="col-md-6">
									<div class="calendar input mb-30">
										<input class="input__control timepickr event-time-start"
											type="text"
											name="event_time_start"
											value="{{record.event_time_start}}"
											data-min-time="09:00"
											data-max-time="21:00" autocomplete="off"
											pattern="[0-9]{2}:[0-9]{2}" required>
										<div class="input__placeholder">Время (начало)</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="calendar input mb-30">
										<input class="input__control timepickr event-time-end"
											type="text"
											name="event_time_end"
											value="{{record.event_time_end}}"
											data-min-time="09:00"
											data-max-time="21:00" autocomplete="off"
											pattern="[0-9]{2}:[0-9]{2}" required>
										<div class="input__placeholder">Время (конец)</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="admin-editor__patient">
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
					<div class="text-bold mb-10">Выбраны услуги</div>
					{{#if this.spec_service}}
					<div class="search__drop-item">
						<input type="hidden" name="services[]" value="">
						<div class="search__drop-name">
							{{catalog.spec_service[this.spec_service].header}}
						</div>
						<div class="search__drop-right">
							<div class="search__drop-summ">
								{{catalog.spec_service[this.spec_service].price}} ₽
							</div>
						</div>
					</div>
					{{else}}
					{{#each record.service_prices: idx, key}}
					<div class="search__drop-item services" data-index="{{idx}}"
						data-id="{{service_id}}-{{price_id}}" data-service_id="{{service_id}}" data-price="{{price}}">
						<input type="hidden" name="services[]"
							value="{{service_id}}">
						<input type="hidden" name="service_prices[{{service_id}}-{{price_id}}][service_id]"
							value="{{service_id}}">
						<input type="hidden" name="service_prices[{{service_id}}-{{price_id}}][price_id]"
							value="{{price_id}}">
						<input type="hidden" name="service_prices[{{service_id}}-{{price_id}}][name]"
							value="{{name}}">
						<input type="hidden" name="service_prices[{{service_id}}-{{price_id}}][price]"
							value="{{price}}">
						<div class="search__drop-name">
							<div class="search__drop-delete">
								<svg class="svgsprite _delete">
									<use xlink:href="assets/img/sprites/svgsprites.svg#delete"></use>
								</svg>
							</div>
							<div class="search__drop-tags">
								{{#each catalog.servicePrices[service_id+'-'+this.price_id].tags}}
								<div class="search__drop-tag --{{.color}}">{{this.tag}}</div>
								{{/each}}
							</div>
							{{name}}
						</div>
						<label class="search__drop-right">
							<div class="search__drop-summ">{{ @global.utils.formatPrice(this.price) }} ₽</div>
						</label>
					</div>
					{{/each}}
					{{/if}}
				</div>
				<div class="admin-editor__summ mb-3">
					<p>Всего</p>
					{{#if record.for_consultation == '0'}}
					<input type="hidden" name="price" value="{{record.price}}">
					{{elseif record.type == 'online'}}
					<input type="hidden" name="price" class="consultation" data-type="online"
						value="{{record.price}}">
					{{elseif record.type == 'clinic'}}
					<input type="hidden" name="price" class="consultation" data-type="clinic"
						value="{{record.price}}">
					{{else}}
					<input type="hidden" name="price" value="{{record.price}}">
					{{/if}}
					<p class="price">{{ @global.utils.formatPrice(record.price) }} ₽<sup><b>*</b></sup></p>
				</div>
				<div class="mb-4 text-right" data-hide="service-search">
					<b>*</b>&nbsp;<small>стоимость указана приблизительно, она может быть изменена в зависимости от фактически оказанных услуг</small>
				</div>

				{{#if record.group == 'events'}}
				<div class="admin-editor__images mb-40">
					{{#if record.hasPhoto}}
					<div class="row">
						<div class="col-md-6">
							<div class="text-bold text-big mb-20">Фото до начала лечения</div>
							{{#each record.photos.before}} <!--single photo!-->
							<a class="before-healing photo"
								data-fancybox="images-{{record.id}}"
								href="{{.src}}"
								data-href="{{.src}}"
								data-caption="Фото до начала лечения, {{ @global.utils.formatDate(.date) }}">
								<div class="healing__date">
									{{ @global.utils.formatDate(.date) }}
								</div>
								<div class="before-healing__photo" style="background-image: url('{{.src}}')"></div>
							</a>
							{{/each}}
						</div>
						<div class="col-md-6">
							<div class="text-bold text-big mb-20">
								Фото в процессе лечения
							</div>
							<div class="after-healing">
								<div class="row">
									{{#each record.photos.after}}
									<div class="col-md-12">
										<a class="after-healing__item photo"
											data-fancybox="images-{{record.id}}"
											data-href="{{.src}}"
											data-caption="Фото Фото в процессе лечения, {{ @global.utils.formatDate(.date) }}">
											<div class="healing__date">{{ @global.utils.formatDate(.date) }}</div>
											<div class="after-healing__photo"
												style="background-image: url({{.src}});">
											</div>
										</a>
									</div>
									{{/each}}
								</div>
							</div>
						</div>
					</div>
					{{/if}}
					<div class="row acount__photos-wrap">
						<div class="col-md-2">
							<a class="btn btn--white" on-click="['addPhoto',record]">
								Добавить фото
							</a>
						</div>
					</div>
				</div>

				{{/if}}
				<button class="btn btn--white" on-click="save">Сохранить</button>
			</div>
			<div class="col-md-1"></div>
			<div class="col-md-4 --jcfe --flex">
				<textarea class="admin__editor-textarea" name="comment" placeholder="Добавить комментарий">{{record.comment}}</textarea>
			</div>
		</div>
	</form>
</template>
<template id="listRecords" wb-off>
	<div class="account-scroll">
		<div class="account__table" data-records-group="{{group}}">
			<div class="account__table-head">
				<div class="admin-events-item orderby">
					<button class="flag-date__ico">
						<svg class="svgsprite _flag">
							<use xlink:href="/assets/img/sprites/svgsprites.svg#flag"></use>
						</svg>
					</button>
					{{#if group == 'group=quotes'}}
					<span>Заявка</span>
					{{else}}
					<span>Приём</span>
					{{/if}}
				</div>
				<div class="admin-events-item orderby">ФИО</div>
				<div class="admin-events-item orderby">Телефон</div>
				<div class="admin-events-item orderby">Специалист</div>
				<div class="admin-events-item">Тип</div>
				<div class="admin-events-item">Услуга</div>
				<div class="admin-events-item orderby">Оплата</div>
				<div class="admin-events-item orderby">Статус</div>
				{{#if group == 'group=quotes'}}
				<div class="admin-events-item w-8 orderby">Дата приёма</div>
				{{else}}
				<div class="admin-events-item w-8 orderby">Дата заявки</div>
				{{/if}}
				<div class="admin-events-item comment">Комментарии</div>
			</div>
			<div class="account__table-body">
				<div class="loading-overlay">
					<div class="loader"></div>
				</div>
				{{#each records as record: idx}}
				{{#with @global.catalog.clients[this.client]}}
				<div class="acount__table-accardeon accardeon acount__table-accardeon--pmin status-{{status}}"
					data-client="{{record.client}}"
					data-record="{{record.id}}"
					data-id="{{record.id}}"
					data-idx="{{idx}}"
					data-priority="{{record.priority}}"
					data-group="{{record.group}}">
					<div class="acount__table-main accardeon__main acount__table-auto">
						<div class="admin-events-item heap">
							<div class="accardeon__click" data-record="{{record.id}}" data-idx="{{idx}}"
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

								{{#if group == 'events'}}
								<input type="hidden" class="orderby" value="{{@global.utils.timestamp(event_date)}}">

								<span class="dt"><strong class="title">Приём: </strong>
									{{@global.utils.formatDate(event_date)}}<br> {{event_time_start}}-{{event_time_end}}
								</span>
								{{else}}
								<input type="hidden" class="orderby" value="{{@global.utils.timestamp(_created)}}">

								<span class="dt"><strong class="title">Заявка: </strong>
									{{@global.utils.formatDate(_created)}}<br>
									{{@global.utils.formatTime(_created)}}
								</span>
								{{/if}}
							</div>
						</div>
						<div class="admin-events-item">
							<input type="hidden" class="orderby" value="{{catalog.clients[client].fullname}}">
							<p>ФИО</p>
							<div>
								<a class="client-card link" data-href="/cabinet/client/{{client}}" target="_blank">{{@global.catalog.clients[client].fullname}}</a>
								{{#if @global.catalog.clients[client].has_longterm}}
								<small class="text-danger">продолжительное</small>
								{{/if}}
							</div>
						</div>
						<div class="admin-events-item">
							<input type="hidden" class="orderby" value="{{catalog.clients[client].phone}}">
							<p>Телефон</p>
							<div>{{@global.catalog.clients[client].phone}}</div>
						</div>
						<div class="admin-events-item col-experts flex-column">
							<p>Специалист</p>
							{{#if no_experts == '1'}}
							<div></div>
							{{else}}
							<input type="hidden" class="orderby" value="{{#experts}}{{@global.catalog.experts[this].name}},{{/experts}}">
							{{#experts}}
							<div>{{@global.catalog.experts[this].fullname}}</div>
							{{/experts}}
							{{/if}}
						</div>
						<div class="admin-events-item">
							<p>Тип</p>
							{{#each catalog.quoteType as item}}
							{{#if item.id == type }}
							<div>{{item.name}}</div>
							{{/if}}
							{{/each}}
						</div>
						<div class="admin-events-item col-services flex-column">
							<p>Услуга</p>
							{{#if no_services == '1'}}
							<div></div>
							{{elseif services}}
							{{#services}}
							<div>{{catalog.services[this].header}}</div>
							{{/services}}
							{{elseif group == 'quotes'}}
							<div>{{{@global.nl2br(client_comment)}}}</div>
							{{else}}
							<div></div>
							{{/if}}
						</div>
						<div class="admin-events-item">
							<p>Оплата</p>
							{{#each catalog.quotePay as item}}
							{{#if item.id == pay_status }}
							<input type="hidden" class="orderby" value="{{item.name}}">
							<div>{{item.name}}</div>
							{{/if}}
							{{/each}}
						</div>
						<div class="admin-events-item">
							<input type="hidden" class="orderby" value="{{catalog.quoteStatus[status].name}}">
							<p>Статус</p>
							<div>{{catalog.quoteStatus[status].name}}</div>
						</div>

						<div class="admin-events-item w-8">
							{{#if group == 'events'}}
							<input type="hidden" class="orderby" value="{{@global.utils.timestamp(_created)}}">
							<p>Дата заявки</p>
							<div>
								{{@global.utils.formatDate(_created)}}<br>
								{{@global.utils.formatTime(_created)}}
							</div>
							{{else}}
							<input type="hidden" class="orderby" value="">
							<p>Дата приёма</p>
							<span class="link-danger">&nbsp;</span>
							{{/if}}
						</div>
						<div class="admin-events-item comment">
							<p>Комментарии</p>
							<div>{{this.comment}}</div>
						</div>
					</div>
					<div class="acount__table-list accardeon__list admin-editor">
						<div class="admin-editor__top">
							<div class="admin-editor__top-info">
								<div class="row">
									<div class="col-md-12">
										<div class="analysis__top --aicn --flex mb-20">
											<div class="analysis__title">Анализы</div>

											{{#if record.analyses}}
											<a class="btn btn--white mr-20" href="{{record.analyses}}"
												target="_blank">
												Скачать анализы
											</a>
											{{/if}}

											<form class="analyses">
												<label class="admin-edit__upload-btn btn btn--white">
													Загрузить анализы
													<input class="admin-edit__upload analyses" type="file" name="file" accept=".pdf" on-change="['addAnalyses',record,@index]">
												</label>
											</form>
										</div>
									</div>

								</div>

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
									{{#if catalog.clients[client].birthdate === '01.01.1970' }}
									{{else}}
									<p>Дата рождения:
										<span>{{ @global.utils.formatDate(catalog.clients[client].birthdate) }}</span>
									</p>
									{{/if}}

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
						<div class="admin-editor__edit-profile" data-client="{{record.client}}"></div>
						<div class="admin-editor__events" data-record="{{record.id}}" data-idx="{{idx}}"></div>
					</div>
				</div>
				{{/with}}
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
<template id="listLongterms" wb-off>
	<div class="account-scroll">
		<div class="account__table">
			<div class="account__table-head">
				<div class="admin-events-item orderby">
					<button class="flag-date__ico">
						<svg class="svgsprite _flag">
							<use xlink:href="/assets/img/sprites/svgsprites.svg#flag"></use>
						</svg>
					</button>
					<span>Дата</span>
				</div>
				<div class="admin-events-item orderby">ФИО</div>
				<div class="admin-events-item orderby">Телефон</div>
				<div class="admin-events-item">Услуга</div>
			</div>
			<div class="account__table-body">
				<div class="loading-overlay">
					<div class="loader"></div>
				</div>
				{{#each records as record: idx}}
				{{#with @global.catalog.clients[this.client]}}
				<div class="acount__table-accardeon accardeon acount__table-accardeon--pmin"
					data-client="{{record.client}}"
					data-record="{{record.id}}"
					data-id="{{record.id}}"
					data-idx="{{idx}}"
					data-priority="{{record.priority}}"
					data-group="{{record.group}}">
					<div class="acount__table-main accardeon__main acount__table-auto">
						<div class="admin-events-item heap">
							<div class="accardeon__click" data-record="{{record.id}}" data-idx="{{idx}}"></div>
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
								<input type="hidden" class="orderby" value="{{@global.utils.timestamp(_created)}}">

								<span class="dt"><strong class="title">Дата: </strong>
									{{@global.utils.formatDate(_created)}}<br>
									{{@global.utils.formatTime(_created)}}
								</span>
							</div>
						</div>
						<div class="admin-events-item">
							<input type="hidden" class="orderby" value="{{catalog.clients[record.client].fullname}}">
							<p>ФИО</p>
							<div>
								<a class="client-card link" href="/cabinet/client/{{record.client}}" target="_blank">{{catalog.clients[record.client].fullname}}</a>
								<br>
								<small class="text-danger">продолжительное</small>
							</div>
						</div>
						<div class="admin-events-item">
							<input type="hidden" class="orderby" value="{{catalog.clients[record.client].phone}}">
							<p>Телефон</p>
							<div>{{catalog.clients[client].phone}}</div>
						</div>
						<div class="admin-events-item col-services flex-column">
							<p>Услуги</p>
							<div>{{this.longterm_title}}</div>
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
									{{#if catalog.clients[client].birthdate === '01.01.1970' }}
									{{else}}
									<p>Дата рождения:
										<span>{{ @global.utils.formatDate(catalog.clients[client].birthdate) }}</span>
									</p>
									{{/if}}

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
						<div class="admin-editor__edit-profile" data-client="{{record.client}}"></div>
						<div class="admin-editor__events mt-20 border-top" data-record="{{record.id}}" data-idx="{{idx}}">
							<div class="row acount__photos-wrap">
								<div class="col-md-2">
									<a class="btn btn--white" on-click="['addPhoto',record]">
										Добавить фото
									</a>
								</div>
							</div>
							{{#if record.hasPhoto}}
							<div class="row">
								<div class="col-md-5">
									<div class="text-bold text-big mb-20">Фото до начала лечения</div>
									{{#each record.photos.before}} <!--single photo!-->
									<a class="before-healing photo"
										data-fancybox="images-{{event.id}}"
										data-href="{{.src}}"
										data-caption="Фото до начала лечения: {{ @global.utils.formatDate(.date) }}">
										<h2 class="h2 healing__date-title">
											{{ @global.utils.formatDateAdv(.date) }}
										</h2>
										<div class="before-healing__photo" style="background-image: url('{{.src}}')">
										</div>
									</a>
									{{/each}}
								</div>
								<div class="col-md-7">
									<div class="text-bold text-big mb-20">
										Фото после начала лечения
									</div>
									<div class="after-healing">
										<h2 class="h2 healing__date-title d-none month-header d-none"></h2>
										<div class="row">
											{{#each record.photos.after}}
											<div class="col-md-6">
												<a class="after-healing__item photo"
													data-fancybox="images-{{event.id}}"
													data-href="{{.src}}"
													data-caption="Фото после начала лечения {{ @global.utils.formatDate(.date) }}">
													<h2 class="h2 healing__date-title">
														{{ @global.utils.formatDateAdv(.date) }}
													</h2>
													<div class="after-healing__photo"
														style="background-image: url({{.src}});">
													</div>
												</a>
											</div>
											{{/each}}
										</div>
									</div>
								</div>
							</div>
							{{/if}}
						</div>
					</div>
				</div>
				{{/with}}
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
<template id="longterm-details" wb-off>
	{{#if photos}}
	<div class="row">
		<div class="col-md-4">
			<div class="text-bold text-big mb-20">Фото до начала лечения</div>
			{{#each photos.before}} <!--single photo!-->
			<a class="after-healing__item"
				data-fancybox="images"
				href="{{.src}}"
				data-caption="{{.date}}">
				<h2 class="h2 healing__date-title">{{.date}}</h2>
				<div class="after-healing__photo"
					style="background-image: url('{{.src}}')">
				</div>
				<div class="healing__description">
					{{.comment}}
				</div>
			</a>
			{{/each}}
		</div>
		<div class="col-md-8">
			<div class="text-bold text-big mb-20">
				Фото после начала лечения
			</div>
			<div class="after-healing">
				<h2 class="h2 healing__date-title d-none month-header"></h2>
				<div class="row">
					{{#each this.photos.after}}
					<div class="col-md-6">
						<a class="after-healing__item"
							data-fancybox="images-{{this.id}}"
							href="{{.src}}"
							data-caption="Фото после начала лечения {{ @global.utils.formatDate(.date) }}">
							<div class="healing__date">{{ @global.utils.formatDate(.date) }}</div>
							<div class="after-healing__photo"
								style="background-image: url({{.src}});">
							</div>
						</a>
					</div>
					{{/each}}
				</div>
			</div>
		</div>
	</div>
	{{/if}}
</template>
<script wb-app remove>
	var tabs = {};
	$(document).on('cabinet-db-ready', function () {
		var getGroupByStatus = function (status) {
			if (['new', 'uncall', 'delay'].includes(status)) {
				return 'quote';
			}
			return 'event';
		};
		window.tab_urls      = [
			'group=longterms',
			'group=quotes',
			'group=events&status=upcoming',
			'group=events&status=[past,cancel_think,cancel_expensive,cancel_noreason]',
		];
		let editProfile      = wbapp.tpl('#editProfile').html;
		let editStatus       = wbapp.tpl('#editStatus').html;
		window.newEvent  = function(){
			var editor = window.popupEvent(null, null, function (data) {
				toast('Запись успешно создана!');
				window.load('group=events&status=upcoming');
				editor.close();
			});
		}
		window.load          = function (only_tab) {
			tab_urls.forEach(function (target_tab, i) {
				if (only_tab && only_tab != target_tab) {
					return;
				}
				var _sorts = [
					'_lastdate:d',
					'event_date:d',
					'event_date:d',
					'_created:d'
				];
				utils.api.get('/api/v2/list/records?' + target_tab, {'@sort': _sorts[i]}).then(
					function (result) {
						let data = {
							group: target_tab,
							records: result,
							catalog: catalog
						};
						var _tab;
						if (target_tab == 'group=longterms'){
							_tab = new Ractive({
								el: '.data-tab-item[data-type="' + target_tab + '"]',
								template: wbapp.tpl('#listLongterms').html,
								data: {
									group: target_tab,
									records: result,
									catalog: catalog
								},
								on: {
									loaded() {
										console.log('>>> loaded', target_tab);
										$(this.el).find('.loading-overlay').remove();
									},
									complete() {
										this.find('.loading-overlay').remove();
										var self = this;
										setTimeout(function () {
											$(self.el).find('a.photo[data-href]')
												.each(function (i) {
													var _img = $(this);
													_img.attr('href', $(this).data('href'));
												});
										}, 150);
									},
									editProfile(ev) {
										var form = $(ev.node).parents('.admin-editor')
											.find('.admin-editor__edit-profile');
										if ($(ev.node).hasClass('open')) {
											$(ev.node).removeClass('open');
											$(form).html('');
											return;
										}
										$(ev.node).addClass('open');
										var profile_id = $(ev.node).data('id');

										let editor = new Ractive({
											el: form,
											template: editProfile,
											data: {},
											lazy: true,

											on: {
												save(ev) {

													var $form = $(ev.node);
													console.log(form);
													if ($form.verify() && profile_id > '') {
														var data = $form.serializeJSON();

														Cabinet.updateProfile(profile_id, data,
															function (res) {
																console.log('client saved', res);
																data.birthdate_fmt = utils.formatDate(data.birthdate);
																data.phone         = utils.formatPhone(data.phone);
																_tab.set('catalog.clients.' + profile_id, data);
																catalog.clients[profile_id] = data;

																$(form).html('');
																toast('Профиль успешно обновлён');
															});
													}

													return false;
												}
											}
										});
										utils.api.get('/api/v2/read/users/' + profile_id).then(
											function (data) {
												data.phone = str_replace([' ', '-', '(', ')'], '', data.phone);
												data.phone = data.phone.includes('+') ? data.phone : '+' + data.phone;
												editor.set(data);

												console.log(data);
												initPlugins();
											});
									},
									addPhoto(ev, record) {
										var self = this;
										var _row_idx = $(ev.node).parents('.admin-editor__events').data('idx');

										popupPhoto(catalog.clients[record.client], record,
											function (rec) {
												_tab.set('records.' + _row_idx, rec);
												toast('Фото добавлено!');
												self.set('record', rec);
												setTimeout(function () {
													$(self.el).find('a.photo[data-href]')
														.each(function (i) {
															var _img = $(this);
															_img.attr('href', $(this).data('href'));
														});
												}, 150);
											});
									}
								}
							});
						} else {
							_tab = new Ractive({
								el: '.data-tab-item[data-type="' + target_tab + '"]',
								template: wbapp.tpl('#listRecords').html,
								data: {
									group: target_tab,
									records: result,
									catalog: catalog
								},
								on: {
									loaded() {
										console.log('>>> loaded', target_tab);
										$(this.el).find('.loading-overlay').remove();
									},
									complete() {
										this.find('.loading-overlay').remove();
										var self = this;
										setTimeout(function () {
											$(self.el).find('a.photo[data-href]')
												.each(function (i) {
													var _img = $(this);
													_img.attr('href', $(this).data('href'));
												});
										}, 150);
									},
									addAnalyses(ev, record, index) {
										console.log('addAnalyses', ev, index, record);
										var $form = $(ev.node).parents('form');
										uploadFile(
											$form.find('input[name="file"]')[0],
											'records/analyses/' + record.client,
											Date.now() + '_' + utils.getRandomStr(4),
											function (photo) {
												console.log(photo);
												utils.api.post('/api/v2/update/records/' + record.id,
														{'analyses': photo.uri})
													.then(function (record) {
														toast('Анализы добавлены!');
														window.load();
													});
											});
									},
									editProfile(ev) {
										var form = $(ev.node).parents('.admin-editor')
											.find('.admin-editor__edit-profile');
										if ($(ev.node).hasClass('open')) {
											$(ev.node).removeClass('open');
											$(form).html('');
											return;
										}
										$(ev.node).addClass('open');
										var profile_id = $(ev.node).data('id');

										let editor = new Ractive({
											el: form,
											template: editProfile,
											data: {},
											lazy: true,

											on: {
												save(ev) {

													var $form = $(ev.node);
													console.log(form);
													if ($form.verify() && profile_id > '') {
														var data = $form.serializeJSON();

														Cabinet.updateProfile(profile_id, data,
															function (res) {
																console.log('client saved', res);
																data.birthdate_fmt = utils.formatDate(data.birthdate);
																data.phone         = utils.formatPhone(data.phone);
																_tab.set('catalog.clients.' + profile_id, data);
																catalog.clients[profile_id] = data;

																$(form).html('');
																toast('Профиль успешно обновлён');
															});
													}

													return false;
												}
											}
										});
										utils.api.get('/api/v2/read/users/' + profile_id).then(
											function (data) {
												data.phone = str_replace([' ', '-', '(', ')'], '', data.phone);
												data.phone = data.phone.includes('+') ? data.phone : '+' + data.phone;
												editor.set(data);

												console.log(data);
												initPlugins();
											});
									},
									editRecord(ev) {
										var target_tab = this;
										var _row_idx   = $(ev.node).data('idx');
										const _parent  = $(ev.node).closest('.accardeon');
										var _record    = this.get('records.' + _row_idx);
										console.log('open ', _record);
										if (!_record.price) {
											_record.price = 0;
										}

										_record.price_text = utils.formatPrice(_record.price);
										var statusEditor   = new Ractive({
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
													$(statusEditor.find(
														`.select.pay [data-id="${_record.pay_status}"]`))
														.trigger('click');
												},
												save(ev) {
													let form = $(ev.node).parents('.admin-editor');
													$(form).find('.admin-editor__edit-profile').html('');
													let copy = $('<form></form>');
													$(copy).html($(form).clone());

													let post = $(copy).serializeJSON();

													post.group = (catalog.quoteStatus[post.status].type ||
													              _record.group.substring(0,
														              _record.group.length - 1)) + 's';

													utils.api.post('/api/v2/update/records/' + _record.id, post)
														.then(function (res) {
															_tab.set('records.' + _row_idx, res);
															window.load();
															toast('Успешно сохранено');
														});
													delete copy;

													return false;
												}
											}
										});
										var saveRecord = function(id, idx, data){
											utils.api.post('/api/v2/update/records/' + id, data)
												.then(function (res) {
													console.log('event data:', data);
													toast('Успешно сохранено');
													_tab.set('records.' + idx, res);
													window.load();
												});
										}
										let recordEditor = new Ractive({
											el: _parent.find('.admin-editor__events'),
											template: wbapp.tpl('#editorRecord').html,
											data: {
												catalog: catalog,
												record: _record,
												start_time: 0,
												end_time: 0
											},
											on: {
												complete() {
													initServicesSearch(
														_parent.find('.admin-editor__events .popup-services-list'),
														catalog.servicesList
													);
													console.log('true: ',
														$(this.el).find('.search__drop-item.services').length);
													initPlugins($(this.el));

													if (!!$(this.el)
														.find('.select .select__item input:checked').length) {
														$(this.el).find('.select.select_experts .select__item')
															.trigger('click');
													}
													console.log($('.search__drop-item.services').length);
													setTimeout(function () {
														$('a.photo[data-href]').each(function (i) {
															var _img = $(this);
															_img.attr('href', $(this).data('href'));
														});
													}, 150);
												},
												addPhoto(ev, record) {
													var self = this;
													popupPhoto(catalog.clients[record.client], record,
														function (rec) {
															_tab.set('records.' + _row_idx, rec);
															toast('Фото добавлено!');
															self.set('record', rec);
															setTimeout(function () {
																$(self.el).find('a.photo[data-href]')
																	.each(function (i) {
																		var _img = $(this);
																		_img.attr('href', $(this).data('href'));
																	});
															}, 150);
														});
												},
												setEventTime(ev) {
													console.log(ev, $(ev.node).hasClass('event-time-start'),
														$(ev.node).val());
													console.log(this.get('start_time'));
													if ($(ev.node).hasClass('event-time-start')) {
														this.set('start_time', $(ev.node).val());
													} else {
														this.set('end_time', $(ev.node).val());
														if (!!this.get('start_time')) {
															$(ev.node).timepicker({minTime: this.get('start_time')});
														}
													}

												},
												save(ev) {
													if ($($(ev.node).parents('form')).length) {
														let form = $(ev.node).parents('.admin-editor');
														$(form).find('.admin-editor__edit-profile').html('');
														let copy = $('<form></form>');
														$(copy).html($(form).clone());

														let post_statuses = $(copy).serializeJSON();

														post_statuses.group = (
															catalog.quoteStatus[post_statuses.status].type || ''
														);
														if (!post_statuses.group) {
															post_statuses.group = getGroupByStatus(
																post_statuses.status);
														}
														post_statuses.group += 's';
														var new_data = $($(ev.node).parents('form'))
															.serializeJSON();
														console.log(post_statuses.group, post_statuses.pay_status);

														new_data.price      = parseInt(new_data.price);
														new_data.status     = post_statuses.status;
														new_data.pay_status = post_statuses.pay_status;
														new_data.group      = post_statuses.group;
														if (new_data.group === 'events' && !new_data.event_date) {
															toast_error('Необходимо выбрать дату/время события');
															$($(ev.node).parents('form')).find('[name="event_date"]')
																.focus();
															return false;
														}
														if (new_data.group === 'events' && !new_data.experts) {
															toast_error('Необходимо выбрать специалиста');
															$($(ev.node).parents('form'))
																.find('.select_experts')
																.focus();
															return false;
														}
														if (new_data.group === 'events'
														    && !!new_data.experts) {
															new_data.no_experts = 0;
														}
														if (new_data.group === 'events'
														    && !!new_data.services) {
															new_data.no_services = 0;
														}

														if (new_data.group === 'events' && !new_data.price) {
															toast_error('Необходимо выбрать услугу');
															$($(ev.node).parents('form'))
																.find('.popup-services-list')
																.focus();
															return false;
														}

														new_data.event_date = utils.dateForce(new_data.event_date);
														new_data.services   = utils.arr.unique(new_data.services);

														changeLogSave(new_data, _record);

														var is_saved = false;
														if (new_data.type == 'online') {
															if (new_data.status == 'upcoming') {
																if (!new_data.meetroom ||
																    !new_data.meetroom.meetingId) {
																	is_saved = true;
																	onlineRooms.create(function (meetroom) {
																		new_data['meetroom'] = meetroom;
																		saveRecord(_record.id, _row_idx, new_data);
																	});
																} else {
																	is_saved = true;
																	saveRecord(_record.id, _row_idx, new_data);
																}
															}
														}

														if(!is_saved){
															if (!!new_data.meetroom) {
																onlineRooms.delete(new_data.meetroom.meetingId, function (meetroom) {});
																new_data.meetroom = {}
															}
															saveRecord(_record.id, _row_idx, new_data);
														}
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
						}
						_tab.fire('loaded');
						tabs[target_tab] = {ractive: _tab, data: data};
					});
				/* sort by prior */
				const _list = $('.account__tab.data-tab-item[data-tab="' + target_tab + '"] .account__table-body');
				_list.find(".acount__table-accardeon").sort(function (a, b) {
					const _a = parseInt($(a).attr('data-priority'));
					const _b = parseInt($(b).attr('data-priority'));
					return (_a > _b) ? -1 : (_a < _b) ? 1 : 0;
				}).appendTo(_list);
				setTimeout(function () {
					$('a.account__table').find('a.client-card[data-href]').each(function (i) {
						$(this).attr('href', $(this).data('href'));
					});
				}, 550);
			});

			setTimeout(function () {
				$('.account__table').find('a.client-card[data-href]').each(function (i) {
					$(this).attr('href', $(this).data('href'));
				});
			}, 750);
		};

		load();

		setTimeout(function reload() {
			window.load();
			setTimeout(reload, 600000);
		}, 600000);

		function OrderBy(a, b, n) {
			if (n) return a - b;
			if (a < b) return -1;
			if (a > b) return 1;
			return 0;
		}

		$('body').on('click', '.account__tab-items .account__tab-item.data-tab-link', function () {
			var _type = $(this).data('type');
			console.log('open:',_type);
			window.load(_type);
		});
		$(document).on('click', '.account__table-head .admin-events-item.orderby', function () {
			var $th = $(this);

			console.log('clicked')
			$th.toggleClass('selected');
			var isSelected = $th.hasClass('selected');
			var isInput    = true;
			var column     = $th.index();
			var $table     = $th.parents('.account__table');
			var isNum      = false;
			var rows       = $table.find('.account__table-body > .acount__table-accardeon').get();
			//console.log(column, $table, rows);
			rows.sort(function (rowA, rowB) {
				var keyA, keyB;
				if (isInput) {
					keyA = $(rowA).find('.admin-events-item').eq(column).find('input.orderby').val().toUpperCase();
					keyB = $(rowB).find('.admin-events-item').eq(column).find('input.orderby').val().toUpperCase();
				} else {
					keyA = $(rowA).children('.admin-events-item').eq(column).text().toUpperCase();
					keyB = $(rowB).children('.admin-events-item').eq(column).text().toUpperCase();
				}
				//console.log('keys:', keyA, keyB);
				if (isSelected) return OrderBy(keyA, keyB, isNum);
				return OrderBy(keyB, keyA, isNum);
			});
			$.each(rows, function (index, row) {
				$table.children('.account__table-body').append(row);
			});
			return false;
		});
		$(document)
			.on('click', 'button.flag-date__ico', function (e) {
				e.stopPropagation();
				const _parent    = $(this).parents('.acount__table-accardeon');
				const _id        = _parent.data('id');
				const _is_marked = $(this).hasClass('checked');
				console.log('flagged', _id, _is_marked);
				utils.api.post('/api/v2/update/records/' + _id, {marked: !!_is_marked}).then(function (res) {
					//toast('Список обновлен');
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