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
		<div class="account">
			<form class="search" action="/cabinet/search">
				<div class="container">
					<div class="crumbs"><a class="crumbs__arrow" href="#">
							<svg class="svgsprite _crumbs-back">
								<use xlink:href="/assets/img/sprites/svgsprites.svg#crumbs-back"></use>
							</svg>
						</a>
						<a class="crumbs__link" href="/">Главная</a>
						<a class="crumbs__link" href="/cabinet">Кабинет администратора</a>
						<span class="crumbs__link">Поиск</span>
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
							<input class="search__input" type="text" name="q" placeholder="Поиск">
						</div>
						<button class="btn btn--black">Найти</button>
					</div>
				</div>
			</form>


			<div class="search-result page-content">
				<div class="container">
					<div class="loading-overlay">
						<div class="loader"></div>
					</div>
				</div>
			</div>
		</div>
	</main>
</div>

<!--!!! TEMPLATES !!!-->
<template id="page-content" wb-off>
	<div class="lk-title">Карточка пациента</div>
	{{#user}}
	<div class="account__panel">
		<div class="account__info">
			<div class="user">
				<div class="user__name">
					{{this.fullname}}
					<button class="user__edit" on-click="toggleEdit">
						<svg class="svgsprite _edit">
							<use xlink:href="/assets/img/sprites/svgsprites.svg#edit"></use>
						</svg>
						<span class="crumbs__link mr-10 font-weight-normal">редактировать профиль</span>
					</button>
				</div>
				<div class="user__item">
					{{#if this.birthdate}}
					Дата рождения:
					<span>{{ @global.utils.formatDate(this.birthdate) }}</span>
					{{else}}
					{{/if}}
				</div>
				<a href="tel:{{this.phone}}" class="user__item">Тел:
					<span>{{ @global.utils.formatPhone(this.phone) }}</span>
				</a>
				<div class="user__item">Почта:
					<span>{{this.email}}</span>
				</div>

				{{#if this.confirmed == '0'}}
				<div class="user__confirm disabled">
					<svg class="svgsprite _confirm">
						<use xlink:href="/assets/img/sprites/svgsprites.svg#alert-grey"></use>
					</svg>
					Неподтвержденный адрес электронной почты <a class="user__notconfirm --openpopup"
						data-popup="--email-send">Отправить код восстановления на почту</a>
				</div>
				{{else}}
				<div class="user__confirm disabled">
					<svg class="svgsprite _confirm">
						<use xlink:href="/assets/img/sprites/svgsprites.svg#confirm"></use>
					</svg>
					Подтвержденный аккаунт <a class="user__notconfirm --openpopup"
						data-popup="--email-send">Отправить код восстановления на почту</a>
				</div>
				{{/if}}

				<div class="admin-edit__user-btns">
					<a class="admin-edit__user-btn btn btn--white"
						on-click="['createEvent', this]">
						Записать пациента на прием
					</a>
					<a class="admin-edit__user-btn btn btn--white"
						on-click="['createLongterm', this]">
						Добавить продолжительное лечение
					</a>

				</div>
			</div>
		</div>
		<input class="admin-edit__upload" type="hidden" id="analyses-file" name="analyses"
			value="{{this.analyses}}">

		<div class="profile-editor-inline d-none">
			<!-- profileEditInline target -->
		</div>
	</div>
	{{/user}}

	{{#if events.upcoming}}
	<div class="lk-title">Предстоящие события</div>
	<div class="account-events">
		<!-- multiple: .account-events__block -->
		{{#each events.upcoming}}
		<div class="account-events__block --flex --jcsb">
			<div class="account-events__block-wrap">
				<div class="account-events__item --flex">
					<div class="account-event-wrap">
						<div class="account-events__name">Услуги:</div>
						<div class="account-event">
							{{#each @global.utils.arr.unique(services)}}
							<p>{{catalog.services[this].header}}</p>
							{{/each}}
						</div>
					</div>
				</div>
				<div class="account-events__item">
					<div class="account-event-wrap">
						<div class="account-events__name">Дата приема:</div>
						<div class="account-event">
							<p>{{ @global.utils.formatDate(this.event_date) }}</p>
						</div>
					</div>
					<div class="account-event-wrap">
						<div class="account-events__name">Время приема:</div>
						<div class="account-event">
							<p>{{this.event_time_start}}-{{this.event_time_end}}</p>
						</div>
					</div>
				</div>
				<div class="account-events__item">
					<div class="account-event-wrap">
						<div class="account-events__name">Специалист:</div>
						<div class="account-event">
							{{#this.experts}}
							<p>{{catalog.experts[this].name}}</p>
							{{/this.experts}}
						</div>
					</div>
				</div>
			</div>
			<a class="account__detail" on-click="['editRecord', this]" data-idx="{{@index}}">Редактировать</a>
		</div>
		{{/each}}
	</div>
	{{/if}}

	<div class="account__history data-tab-wrapper" data-tabs="history">
		<div class="account__tab-items">
			<div class="account__tab-item data-tab-link active" data-tabs="history" data-tab="visits">
				История посещений
			</div>
			<div class="account__tab-item data-tab-link" data-tabs="history" data-tab="longterm">
				Продолжительное лечение
			</div>
			<div class="account__tab-item data-tab-link" data-tabs="history" data-tab="history">
				История покупок
			</div>
		</div>
		<div class="account__tab data-tab-item active" data-tab="visits">
			<div class="account__table">
				<div class="account__table-head">
					<div class="history-item">Дата</div>
					<div class="history-item">Время</div>
					<div class="history-item w-10">Специалисты</div>
					<div class="history-item">Услуги</div>
					<div class="history-item">Анализы</div>
				</div>
				<div class="account__table-body">
					<!-- !!! quote history item !!! -->
					{{#each history.events as event}}
					<div class="acount__table-accardeon accardeon" data-idx="{{@index}}">
						<div class="acount__table-main accardeon__main accardeon__click" data-record="{{this.id}}"
							data-idx="{{@index}}" on-click="['editPastRecord', this]">
							<div class="history-item">
								<p>Дата</p>
								{{ @global.utils.formatDate(this.event_date) }}
							</div>
							<div class="history-item">
								<p>Время</p>{{this.event_time_start}}-{{this.event_time_end}}
							</div>
							<div class="history-item">
								<p>Специалисты</p>
								{{#each experts}}
								{{catalog.experts[this].name}}<br>
								{{/each}}
							</div>
							<div class="history-item">
								<p>Услуги</p>
								{{#services}}
								{{catalog.services[this].header}}<br>
								{{/services}}
							</div>
							<div class="history-item">
								<p>Анализы</p>
								{{#if this.analyses}}
								Есть анализы
								{{else}}
								Нет анализов
								{{/if}}
							</div>
						</div>
						<div class="acount__table-list accardeon__list">
							<div class="analysis mb-40">
								<div class="row">
									<div class="col-md-12">
										<div class="analysis__top --aicn --flex mb-20">
											<div class="analysis__title">Анализы</div>

											{{#if this.analyses}}
											<a class="btn btn--white mr-20" href="{{this.analyses}}"
												target="_blank"
												download="Анализы({{@global.catalog.clients[this.client].fullname}}, {{@global.utils.formatDate(this.event_date)}}).pdf">
												Скачать анализы
											</a>
											{{/if}}

											<form class="analyses">
												<label class="admin-edit__upload-btn btn btn--white">
													Загрузить анализы
													<input class="admin-edit__upload analyses" type="file" name="file" accept=".pdf" on-change="['addAnalyses',this,@index]">
												</label>
											</form>
										</div>
									</div>

								</div>
							</div>
							<div class="mb-40">
								<div class="row">
									<div class="col-md-8">
										<div class="analysis__description ml-20">
											<p class="text-bold mb-20">Рекомендация врача</p>
											<div class="text">
												{{.recommendation}}
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="analysis__description">
											<p class="text-grey text-small mb-20">
												Ред.: {{@global.utils.formatDateAdv(._lastdate)}} - {{catalog.users[._lastuser].fullname}}
											</p>
										</div>
									</div>
								</div>
							</div>

							<div class="admin-editor__events" data-record="{{.id}}" data-idx="{{idx}}"></div>
						</div>
					</div>
					{{elseif events_ready}}
					<div class="acount__table-accardeon accardeon">
						<div class="acount__table-main accardeon__main">
							Нет записей о посещении
						</div>
					</div>
					{{else}}
					<div class="acount__table-accardeon accardeon">
						<span>Подождите, идет загрузка..</span>
					</div>
					{{/each}}
					<!-- !!! / quote history item !!! -->
				</div>
			</div>
		</div>
		<div class="account__tab data-tab-item" data-tab="longterm">
			<div class="account__table">
				<div class="account__table-head">
					<div class="healing-item">Дата</div>
					<div class="healing-item">Услуги</div>
				</div>
				<div class="account__table-body">
					{{#each history.longterms as event}}
					<!-- !!! longterm item !!! -->
					<div class="acount__table-accardeon accardeon" data-idx="{{@index}}">
						<div class="acount__table-main accardeon__main accardeon__click">
							<div class="healing-item">
								<p>Дата</p>
								{{ @global.utils.formatDate(this.event_date) }} - {{ @global.utils.formatDate(this.longterm_date_end) }}
							</div>
							<div class="healing-item">
								<p>Услуги</p> {{this.longterm_title}}
							</div>
						</div>
						<div class="acount__table-list accardeon__list">
							{{#if this.hasPhoto}}
							<div class="row">
								<div class="col-md-5">
									<div class="text-bold text-big mb-20">Фото до начала лечения</div>
									{{#each this.photos.before}} <!--single photo!-->
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
											{{#each this.photos.after}}
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
					{{elseif longterms_ready}}
					<div class="acount__table-accardeon accardeon">
						<div class="acount__table-main accardeon__main">
							Нет записей о продолжительном лечении
						</div>
					</div>
					{{else}}
					<div class="acount__table-accardeon accardeon">
						<span>Подождите, идет загрузка..</span>
					</div>
					{{/each}}
				</div>
			</div>
		</div>
		<div class="account__tab data-tab-item purchases" data-tab="history">
			<div class="account__table account__table-second">
				<div class="account__table-head">
					<div class="healing-item">Дата</div>
					<div class="healing-item">Наименование</div>
					<div class="healing-item">Кол-во</div>
					<div class="healing-item">Цена</div>
					<div class="healing-item">Способ доставки</div>
					<div class="healing-item">Статус</div>
				</div>
				<div class="account__table-body">
					<div class="acount__table-accardeon accardeon purchases-wrap">
						<div class="purchases-wrap-row">
							Нет записей об истории покупок
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>
<template id="editorRecord" wb-off>
	<form class="record-edit">
		<div class="row">
			<div class="col-md-7">
				<div class="lk-title">Событие</div>

				{{#if record.client_comment}}
				<div class="account-events__item wide">
					<div class="account-event-wrap">
						<div class="account-events__name">Причина обращения:</div>
						<div class="account-event">
							{{{@global.nl2br(record.client_comment)}}}
						</div>
					</div>
				</div>
				{{/if}}
				<input type="hidden" value="{{ record.id }}" name="id">

				{{#if record.spec_service}}
				<input type="hidden" name="spec_service" value="{{this.spec_service}}">
				<input type="hidden" name="title" value="{{catalog.spec_service[this.spec_service].header}}">
				{{else}}

				{{/if}}

				<div class="admin-editor__type-event">
					<label class="checkbox checkbox--record show-checkbox" data-show-input="service">
						<input type="hidden" name="for_consultation" value="0">
						{{#if record.for_consultation === '1' }}
						<input class="checkbox-visible-next-form" type="checkbox" checked
							name="for_consultation" value="1" on-click="forConsultationClick">
						{{else}}
						<input class="checkbox-visible-next-form" type="checkbox"
							name="for_consultation" value="1" on-click="forConsultationClick">
						{{/if}}
						<span></span>
						<div class="checbox__name">Консультация врача</div>
					</label>
					<div class="select-form" style="display: {{#if record.for_consultation === '1' }} block {{else}} none {{/if}};" data-show="service">
						<div class="popups__text-chexboxs">
							{{#each catalog.quoteType as qt}}
							<label class="text-radio">
								{{#if qt.id === record.type }}
								<input type="radio" name="type"
									value="{{ qt.id }}" checked
									on-click="checkConsultation">
								{{else}}
								<input type="radio" name="type" value="{{ qt.id }}"
									on-click="checkConsultation">
								{{/if}}
								<span>{{qt.name}}</span>
							</label>
							{{/each}}
						</div>
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
								data-caption="Фото до начала лечения: {{ @global.utils.formatDate(.date) }}">
								<div class="healing__date">
									{{ @global.utils.formatDate(.date) }}
								</div>
								<div class="before-healing__photo" style="background-image: url('{{.src}}')"></div>
								<div class="healing__description">{{.comment}}</div>
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
<template id="event-details" wb-off>
	{{#event}}
	<div class="analysis mb-40">
		<div class="row">
			<div class="col-md-6">
				{{#if .analyses}}
				<div class="account-events__download">
					<div class="lk-title">Анализы</div>
					<a class="btn btn--white" href="{{.}}"
						target="_blank"
						download="Анализы (за {{@global.utils.formatDate(this.event_date)}}).pdf">
						Скачать анализы
					</a>
				</div>
				{{/if}}

				<div class="analysis__description">
					<p class="text-bold mb-20">Выполнялись процедуры</p>
					<p class="text-grey">{{.comment}}</p>
				</div>
			</div>
			<div class="col-md-6">
				<div class="analysis__description">
					<p class="text-bold mb-20">Рекомендация врача</p>
					<div class="text">
						{{.recommendation}}
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="experts__worked">
		<div class="experts__worked-title">С вами работали</div>
		<div class="row">
			{{#each .experts: idx}}
			<div class="col-md-6">
				<a class="expert__worked"
					target="_blank"
					title="Открыть страницу о специалисте"
					data-href="{{catalog.experts[this].info_uri}}"
					data-link="{{catalog.experts[this].info_uri}}">
					<div class="expert__worked-pic">
						<img class="lazyload"
							data-src="{{{catalog.experts[this].image[0].img}}}"
							alt="{{catalog.experts[this].name}}">
					</div>
					<div class="expert__worked-name">
						{{catalog.experts[this].name}}
					</div>
					<div class="expert__worked-work">
						{{catalog.experts[this].spec}}
					</div>
				</a>
			</div>
			{{/each}}
		</div>
	</div>
	{{#if .hasPhoto}}
	<div class="acount__photos">
		<div class="row acount__photos-wrap">
			<div class="col-md-6">
				<div class="acount__photo">
					<p>Фото до начала лечения</p>
					{{#each this.photos.before}}
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
			<div class="col-md-6">
				<div class="acount__photo">
					<p>Фото в процессе лечения</p>
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
	{{/event}}
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
<template id="profile-editor-inline" wb-off>
	<form on-submit="submit">
		{{#user}}
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
					<input class="input__control datebirthdaypickr"
						name="birthdate"
						value="{{.birthdate}}"
						type="text"
						placeholder="Дата рождения" twoway="false">
					<div class="input__placeholder input__placeholder--dark">Дата рождения</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="input input--grey">
					<input class="input__control" type="tel" name="phone" value="{{.phone}}" placeholder="Телефон" data-inputmask="'mask': '+9 (999) 999-99-99'">
					<div class="input__placeholder input__placeholder--dark">Телефон</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="input input--grey">
					<input class="input__control" type="email"
						name="email" value="{{.email}}" placeholder="E-mail">
					<div class="input__placeholder input__placeholder--dark">E-mail</div>
				</div>
			</div>
			<div class="col-md-2">
				<button class="btn btn--white profile-edit__submit">Сохранить</button>
			</div>
		</div>
		<p class="text-bold mb-30 delivery-address">Адрес доставки</p>
		<div class="row profile-edit__wrap">
			<div class="col-md-9">
				<div class="row">
					<div class="col-md-3">
						<div class="input input--grey">
							<input class="input__control" type="text" name="country" value="{{.country}}" placeholder="Страна">
							<div class="input__placeholder input__placeholder--dark">Страна</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="input input--grey">
							<input class="input__control" type="text" name="city" value="{{.city}}" placeholder="Город">
							<div class="input__placeholder input__placeholder--dark">Город</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="input input--grey">
							<input class="input__control" type="text" name="street" value="{{.street}}" placeholder="Улица">
							<div class="input__placeholder input__placeholder--dark">Улица
							</div>
						</div>
					</div>
					<div class="col-md-2">
						<div class="input input--grey">
							<input class="input__control" type="text" name="build" value="{{.build}}" placeholder="Дом">
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
							<input class="input__control" type="text" name="flat" placeholder="Кв./офис" value="{{.flat}}">
							<div class="input__placeholder input__placeholder--dark">Кв./офис</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="input input--grey">
							<input class="input__control" type="text" name="intercom" placeholder="Домофон" value="{{.intercom}}">
							<div class="input__placeholder input__placeholder--dark">Домофон</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="input input--grey">
							<input class="input__control" type="text" name="entrance" placeholder="Подъезд" value="{{.entrance}}">
							<div class="input__placeholder input__placeholder--dark">Подъезд</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="input input--grey">
							<input class="input__control" type="text" name="level" placeholder="Этаж" value="{{.level}}">
							<div class="input__placeholder input__placeholder--dark">Этаж</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-2">
				<button class="btn btn--white profile-edit__submit">Сохранить</button>
			</div>
		</div>
		{{/user}}
	</form>
</template>

<script wb-app remove>
	var client_id = '{{_route.client}}';
	$(document).on('cabinet-db-ready', function () {
		window.page = new Ractive({
			el: 'main.page .page-content .container',
			template: wbapp.tpl('#page-content').html,
			data: {
				catalog: catalog,
				q: '{{_route.params.q}}',
				user: null,
				events: {
					'upcoming': false
				},
				history: {
					'events': false,
					'longterms': false
				}
			},
			on: {
				complete() {
					setTimeout(function () {
						$('a.photo[data-href]').each(function (i) {
							var _img = $(this);
							_img.attr('href', $(this).data('href'));
						});
					}, 150);
				},
				addEventPhoto(ev, client, record) {
					console.log('addEventPhoto', client, record);
				},
				addLongtermPhoto(ev, client, record) {
					console.log('addLongtermPhoto', client, record);
				},

				editRecord(ev, record) {
					console.log('editRecord', record, $(ev.node).data('idx'));

					var dlg = window.popupEvent(this.data.client, record, function (data) {
						page.set('events.upcoming.' + $(ev.node).data('idx'), data);
						toast('Запись успешно обновлена!');
						dlg.close();
					});
				},
				createEvent(ev, client) {
					console.log('createEvent', client);

					var editor = window.popupEvent(client, null, function (data) {
						page.push('events.upcoming', data);

						toast('Запись успешно создана!');
						content_load();
						editor.close();
					});
				},
				createLongterm(ev, client) {
					console.log('createLongterm', client);
					popupLongterm(client, null, function (rec) {
						toast('Запись успешно создана!');
					});
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
							utils.api.post('/api/v2/update/records/' + record.id, {'analyses': photo.uri})
								.then(function (record) {
									toast('Анализы добавлены!');
									content_load();
									page.set('events.upcoming.' + index, record);
								});
						});
				},
				showLongtermDetails(ev) {
					var _parent = $(ev.node).parents('.accardeon');
					if (!_parent.hasClass('loaded')) {
						var _record_idx      = _parent.data('idx');
						var _record          = page.get('history.longterms.' + _record_idx);
						var _accardeon__list = new Ractive({
							el: _parent.find('.accardeon__list'),
							template: wbapp.tpl('#longterm-details').html,
							data: {
								event: _record,
								user: page.get('user'),
								catalog: catalog
							},
							on: {
								init() {
									var _this = this;
									if (!!_record.photos?.before || !!_record.photos?.after) {
										utils.api.get('/api/v2/list/record-photos?record=' + _record.id)
											.then(function (result) {
												if (!result) {
													return;
												}

												var list = {before: [], after: []};
												result.forEach(function (photo) {
													if (_record.photos?.before) {
														if (_record.photos.before.includes(photo.id)) {
															list.before.push(photo);
														}
													} else if (_record.photos?.after) {
														if (_record.photos.after.includes(photo.id)) {
															list.after.push(photo);
														}
													}
												});
												_this.set('photos', list);
											});
									}
								},
								complete() {
									_parent.find("img[data-src]:not([src])").lazyload();
									_parent.addClass('loaded');
								}
							}
						});
					}
				},
				toggleEdit(ev) {
					if (!!window.profile_inline_editor) {
						$('.profile-editor-inline').toggleClass('d-none');

						return;
					}
					window.profile_inline_editor = new Ractive({
						el: '.profile-editor-inline',
						template: wbapp.tpl('#profile-editor-inline').html,
						data: {
							user: page.get('user')
						},
						on: {
							complete() {
								$('.profile-editor-inline').removeClass('d-none');
								initPlugins();
							},
							submit(ev) {
								let $form = $(ev.node);
								let uid   = page.get('user.id');
								if ($form.verify()) {
									let data = $form.serializeJSON();

									Cabinet.updateProfile(uid, data, function (data) {
										data.birthdate_fmt = utils.formatDate(data.birthdate);
										data.phone         = utils.formatPhone(data.phone);
										page.set('user', data); /* get actually user data */
										toast('Профиль успешно обновлён');
									});
								}
								return false;
							}
						}
					});
				},
				prepay(ev) {
					popupPay.showPopup($(ev.node).data('record'));
				},
				editPastRecord(ev, record) {
					var _row_idx  = $(ev.node).data('idx');
					const _parent = $(ev.node).closest('.accardeon');
					var _record   = record;
					console.log('open ', _record);
					if (!_record.price) {
						_record.price = 0;
					}

					_record.price_text = utils.formatPrice(_record.price);
					let recordEditor   = new Ractive({
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
								initPlugins();

								if (!!$(this.el)
									.find('.select .select__item input:checked').length) {
									$(this.el).find('.select.select_experts .select__item')
										.trigger('click');
								}
								console.log($('.search__drop-item.services').length);

								var _price = (_record.type === 'online')
									? parseInt(catalog.spec_service.consultation.price)
									: 0;
								$(this.el).find('.search__drop-item.services').each(function () {
									_price += parseInt($(this).data('price'));
								});

								console.log(_price);

								$(this.el).find('.admin-editor__summ input[name="price"]')
									.val(_price);
								$(this.el).find('.admin-editor__summ p.price').html(
									utils.formatPrice(_price) + ' ₽<sup><b>*</b></sup>');

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
										toast('Фото добавлено!');
										self.set('record', rec);
										setTimeout(function () {
											$(self.el).find('a.photo[data-href]')
												.each(function (i) {
													var _img = $(this);
													_img.attr('href', $(this).data('href'));
												});
										}, 150);
										page.set('history.events.' + _row_idx, rec);
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
							forConsultationClick(ev) {
								var price        = 0;
								var $price_input = $(ev.node).parents('form').find('[name="price"]');
								var prev_price   = $price_input.val();
								var $for_consultation = $(ev.node);
								if (!isNaN(prev_price)) {
									price = parseInt(prev_price);
								}

								if ($for_consultation.is(':checked')) {
									$(ev.node).parents('form').find('.clinic[name="type"]').trigger('click');
								} else {
									if ($price_input.hasClass('consultation')) {
										if(!!price) {
											if ($price_input.attr('data-type') == 'online') {
												price -= parseInt(catalog.spec_service.consultation.price);
											} else if ($price_input.attr('data-type') == 'clinic') {
												price -= parseInt(catalog.spec_service.consultation_clinic.price);
											}
										}
									}
									$price_input.removeClass('consultation');
									$price_input.removeAttr('data-type');
									$price_input.val(price);
									$(ev.node).parents('form').find('.price').html(
										utils.formatPrice(price) + ' ₽<sup><b>*</b></sup>');
								}
							},
							checkConsultation(ev) {
								var ght               = 0;
								var lv                = 0;
								var sel_type          = $(ev.node).val();
								var $for_consultation = $(ev.node).parents('form').find('[name="for_consultation"]');
								var $price_input      = $(ev.node).parents('form').find('[name="price"]');
								if ($(ev.node).is(':checked')) {
									if (sel_type == 'online') {
										ght = parseInt(catalog.spec_service.consultation.price);
									} else if (sel_type == 'clinic') {
										ght = parseInt(catalog.spec_service.consultation_clinic.price);
									} else {
										ght = 0;
									}
								} else {
									ght = 0;
								}
								var price      = 0;
								var prev_price = $price_input.val();

								if (!isNaN(prev_price)) {
									price = parseInt(prev_price);
								}

								if (ght === 0) {
									if ($price_input.hasClass('consultation')) {
										if (!!price) {
											if ($price_input.attr('data-type') == 'online') {
												price -= parseInt(catalog.spec_service.consultation.price);
											} else if ($price_input.attr('data-type') == 'clinic') {
												price -= parseInt(catalog.spec_service.consultation_clinic.price);
											}
										}
										$price_input.removeClass('consultation');
										$price_input.removeAttr('data-type');
									}

								} else if (!$price_input.hasClass('consultation')
								           || !$price_input.attr('data-type') != sel_type) {
									if (!!price) {
										if ($price_input.attr('data-type') == 'online') {
											price -= parseInt(catalog.spec_service.consultation.price);
										} else if ($price_input.attr('data-type') == 'clinic') {
											price -= parseInt(catalog.spec_service.consultation_clinic.price);
										}
									}
									price += ght;

									$price_input.addClass('consultation');
									$price_input.attr('data-type', sel_type);
								}

								$price_input.val(price);
								$(ev.node).parents('form').find('.price').html(
									utils.formatPrice(price) + ' ₽<sup><b>*</b></sup>');
							},
							save(ev) {
								if ($($(ev.node).parents('form')).length) {
									let form = $(ev.node).parents('.admin-editor');
									$(form).find('.admin-editor__edit-profile').html('');
									let copy = $('<form></form>');
									$(copy).html($(form).clone());

									var new_data = $($(ev.node).parents('form'))
										.serializeJSON();

									new_data.price = parseInt(new_data.price);
									if (!new_data.event_date) {
										toast_error('Необходимо выбрать дату/время события');
										$($(ev.node).parents('form')).find('[name="event_date"]')
											.focus();
										return false;
									}
									if (!new_data.experts) {
										toast_error('Необходимо выбрать специалиста');
										$($(ev.node).parents('form'))
											.find('.select_experts')
											.focus();
										return false;
									}
									if (!!new_data.experts) {
										new_data.no_experts = 0;
									}
									if (!!new_data.services) {
										new_data.no_services = 0;
									}

									if (!new_data.price) {
										toast_error('Необходимо выбрать услугу');
										$($(ev.node).parents('form'))
											.find('.popup-services-list')
											.focus();
										return false;
									}

									new_data.event_date = utils.dateForce(new_data.event_date);
									new_data.services   = utils.arr.unique(new_data.services);

									changeLogSave(new_data, _record);

									utils.api.post(
											'/api/v2/update/records/' + _record.id, new_data)
										.then(function (res) {
											console.log('event data:', new_data);
											toast('Успешно сохранено');
											window.content_load();
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
		utils.api.get('/api/v2/read/users/' + client_id).then(function (client) {
			window.page.set('client', client);
			window.page.set('user', client);
		});
		window.content_load = function () {
			page.set('longterms_ready', false);
			page.set('events_ready', false);

			utils.api.get('/api/v2/list/records?status=upcoming&@sort=event_date:d&client=' + client_id).then(
				function (data) {
					page.set('events.upcoming', data); /* get actually user next events */
					$("img[data-src]:not([src])").lazyload();
					setTimeout(function () {
						$('a.photo[data-href]').each(function (i) {
							var _img = $(this);
							_img.attr('href', $(this).data('href'));
						});
					}, 350);
				});

			utils.api.get('/api/v2/list/records?status=past&group=events&@sort=event_date:d&client=' + client_id).then(
				function (data) {
					page.set('history.events', data); /* get actually user next events */
					page.set('events_ready', true); /* get actually user next events */
					$("img[data-src]:not([src])").lazyload();

					setTimeout(function () {
						$('a.photo[data-href]').each(function (i) {
							var _img = $(this);
							_img.attr('href', $(this).data('href'));
						});
					}, 350);
				});

			utils.api.get("/api/v2/list/records?group=longterms&@sort=_created:d&client=" + client_id)
				.then(function (data) {
					page.set('history.longterms', data); /* get actually user next events */
					page.set('longterms_ready', true); /* get actually user next events */
					$("img[data-src]:not([src])").lazyload();

					setTimeout(function () {
						$('a.photo[data-href]').each(function (i) {
							var _img = $(this);
							_img.attr('href', $(this).data('href'));
						});
					}, 350);

				});
		};
		content_load();
	});
</script>

<div>
	<wb-module wb="module=yonger&mode=render&view=footer"/>
</div>
</body>
</html>