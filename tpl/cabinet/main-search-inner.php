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
							<input class="search__input" type="text" name="q" placeholder="Поиск по пациентам">
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
				<div class="user__confirm">
					<svg class="svgsprite _confirm">
						<use xlink:href="/assets/img/sprites/svgsprites.svg#alert-grey"></use>
					</svg>
					Неподтвержденный адрес электронной почты <a class="user__notconfirm"
						onclick="sendRestoreEMail('{{this.email}}');">Отправить код восстановления на почту</a>
				</div>
				{{else}}
				<div class="user__confirm">
					<svg class="svgsprite _confirm">
						<use xlink:href="/assets/img/sprites/svgsprites.svg#confirm"></use>
					</svg>
					Подтвержденный аккаунт <a class="user__notconfirm"
						onclick="sendRestoreEMail('{{this.email}}');">Отправить код восстановления на почту</a>
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
		<div class="admin-edit__user-btns vertical-btns mt-0 pt-0" style="margin-top:0;">
			<a class="text-danger" on-click="['deleteProfile', this, idx]">
				Удалить профиль
			</a>
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
							<p>{{@global.catalog.experts[this].fullname}}</p>
							{{/this.experts}}
						</div>
					</div>
				</div>
				<div class="analysis mt-20">
					<div class="row">
						<div class="col-md-12">
							<div class="analysis__top --aicn --flex mb-20">
								<div class="analysis__title">Анализы</div>

								{{#if this.analyses}}
								<a class="btn btn--white mr-20" href="{{this.analyses}}"
									target="_blank">
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
								{{@global.catalog.experts[this].fullname}}<br>
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
												target="_blank">
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
							<div class="row acount__photos-wrap">
								<div class="col-md-2">
									<a class="btn btn--white" on-click="['addPhoto',this]">
										Добавить фото
									</a>
								</div>
							</div>
							{{#if this.hasPhoto}}
							<div class="row">
								<div class="col-md-5">
									<div class="text-bold text-big mb-20">Фото до приема</div>
									{{#each this.photos.before}} <!--single photo!-->
									<a class="before-healing photo"
										data-fancybox="images-{{event.id}}"
										data-href="{{.src}}"
										data-caption="Фото до приема, {{ @global.utils.formatDate(.date) }}">
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
										Фото после приема
									</div>
									<div class="after-healing">
										<h2 class="h2 healing__date-title d-none month-header d-none"></h2>
										<div class="row">
											{{#each this.photos.after}}
											<div class="col-md-6">
												<a class="after-healing__item photo"
													data-fancybox="images-{{event.id}}"
													data-href="{{.src}}"
													data-caption="Фото после приема, {{ @global.utils.formatDate(.date) }}">
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

					<div class="consultations mb-20">
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
							<div class="text-bold mb-10">Тип события</div>
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
								<div class="search__drop-item consultation online {{#if record.consultation == this.id }}selected{{/if}}"
									data-show="consultation-online"
									data-consultation="{{this.id}}"
									data-price="{{this.price}}"
									style="display: {{#if record.type === 'online' }} flex {{else}} none {{/if}};">

									<label class="checkbox search__drop-name"
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
									<label class="search__drop-right">
										<div class="search__drop-summ">{{ @global.utils.formatPrice(this.price) }} ₽</div>
									</label>
								</div>
								{{/each}}
								{{#each @global.catalog.spec_service.consultations.clinic}}
								<div class="search__drop-item consultation clinic {{#if record.consultation == this.id }}selected{{/if}}"
									data-show="consultation-clinic"
									data-consultation="{{this.id}}"
									data-price="{{this.price}}"
									style="display: {{#if record.type === 'clinic' }} flex {{else}} none {{/if}};">
									<label class="checkbox search__drop-name"
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
									<label class="search__drop-right">
										<div class="search__drop-summ">{{ @global.utils.formatPrice(this.price) }} ₽</div>
									</label>
								</div>
								{{/each}}
							</div>
						</div>
						<input type="hidden" class="consultation_price"
							name="consultation_price"
							value="{{record.consultation_price}}">
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
								<div class="service-search__list" style="position: relative;"></div>
							</div>
						</div>
					</div>
					<div class="admin-editor__event mb-20">
						<!-- services-select.dropdown -->
					</div>
					<div class="text-bold mb-10">Выбраны услуги</div>

					<div class="search__drop-item selected-consultation" style="display: {{#if record.consultation }} flex {{else}} none {{/if}};">
						<div class="search__drop-name consultation-header">
							<div class="search__drop-delete fake" onclick="unselectConsultation(this);">
								<svg class="svgsprite _delete">
									<use xlink:href="/assets/img/sprites/svgsprites.svg#delete"></use>
								</svg>
							</div>
							<span>
							{{@global.catalog.spec_service.consultations[record.type][record.consultation].header}}
							</span>
						</div>
						<div class="search__drop-right">
							<div class="search__drop-summ consultation-price">
								{{@global.utils.formatPrice(@global.catalog.spec_service.consultations[record.type][record.consultation].price)}} ₽<sup><b>*</b></sup>
							</div>
						</div>
					</div>

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
					<div class="search__drop-item services selected" data-index="{{idx}}"
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
				<div class="mb-60 text-right" data-hide="service-search">
					<b>*</b>&nbsp;<small>Не является публичной офертой. Стоимость указана приблизительно и может быть изменена в зависимости от фактически оказанных услуг</small>
				</div>

				{{#if record.group == 'events'}}
				<div class="admin-editor__images mb-40">
					{{#if record.hasPhoto}}
					<div class="row">
						<div class="col-md-6">
							<div class="text-bold text-big mb-20">Фото до приема</div>
							{{#each record.photos.before}} <!--single photo!-->
							<a class="before-healing photo"
								data-fancybox="images-{{record.id}}"
								href="{{.src}}"
								data-href="{{.src}}"
								data-caption="Фото до приема, {{ @global.utils.formatDate(.date) }}">
								<div class="healing__date">
									{{ @global.utils.formatDate(.date) }}
								</div>
								<div class="before-healing__photo" style="background-image: url('{{.src}}')"></div>
							</a>
							{{/each}}
						</div>
						<div class="col-md-6">
							<div class="text-bold text-big mb-20">
								Фото после приема
							</div>
							<div class="after-healing">
								<div class="row">
									{{#each record.photos.after}}
									<div class="col-md-12">
										<a class="after-healing__item photo"
											data-fancybox="images-{{record.id}}"
											data-href="{{.src}}"
											data-caption="Фото после приема, {{ @global.utils.formatDate(.date) }}">
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
			<div class="col-md-4 --jcfe --flex" style="
    flex-direction: column;
    justify-content: flex-start;">
				<div class="row">
					<div class="col-md-12">
						<div class="select-form">
							<div class="select pay">
								<div class="select__main">Статус оплаты</div>
								<div class="select__list">
									<input type="hidden" class="pay_status" name="pay_status" value="{{ record.pay_status }}">
									{{#each @global.catalog.quotePay}}
									<div class="select__item" data-id="{{id}}"
										onclick="$(this).parents('.select.pay').find('input.pay_status').val($(this).attr('data-id'));$(this).parents('.select.pay').addClass('has-values')">
										{{name}}
									</div>
									{{/each}}
								</div>
							</div>
						</div>

					</div>
				</div>
				<div class="row">
					<div class="col-md-12">

						<div class="select-form">
							<div class="select status">
								<div class="select__main">Изменить статус</div>
								<div class="select__list">
									<input type="hidden" class="status" name="status" value="{{ record.status }}">
									<input type="hidden" class="group" name="group" value="{{ record.group }}">
									{{#each @global.catalog.quoteStatus}}
									{{#if id == 'delimiter'}}
									<div class="select__delimiter" disabled></div>
									{{else}}
									<div class="select__item select__item--acc-{{color}}"
										data-id="{{id}}"
										data-group="{{type}}"
										onclick="$(this).parents('.select.status').find('input.status').val($(this).attr('data-id'));$(this).parents('.select.status').find('input.group').val($(this).attr('data-group'));$(this).parents('.select.status').addClass('has-values')">
										{{name}}
									</div>
									{{/if}}
									{{/each}}
								</div>
							</div>
						</div>

					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<textarea class="admin__editor-textarea" name="comment" placeholder="Добавить комментарий" style="max-width: none;">{{record.comment}}</textarea>
					</div>
				</div>

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
						target="_blank">
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
					data-href="{{catalog.experts[this].page_uri}}"
					data-link="{{catalog.experts[this].page_uri}}">
					<div class="expert__worked-pic">
						<img class="lazyload"
							data-src="{{{catalog.experts[this].image[0].img}}}"
							alt="{{@global.catalog.experts[this].fullname}}">
					</div>
					<div class="expert__worked-name">
						{{@global.catalog.experts[this].fullname}}
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
					<p>Фото до приема</p>
					{{#each this.photos.before}}
					<div class="col-md-6">
						<a class="after-healing__item"
							data-fancybox="images-{{this.id}}"
							href="{{.src}}"
							data-caption="Фото после приема {{ @global.utils.formatDate(.date) }}">
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
					<p>Фото после приема</p>
					{{#each this.photos.after}}
					<div class="col-md-6">
						<a class="after-healing__item"
							data-fancybox="images-{{this.id}}"
							href="{{.src}}"
							data-caption="Фото после приема {{ @global.utils.formatDate(.date) }}">
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
			<div class="text-bold text-big mb-20">
				Фото до начала лечения
			</div>
			{{#each photos.before}} <!--single photo!-->
			<a class="after-healing__item"
				data-fancybox="images"
				href="{{.src}}"
				data-caption="Фото до начала лечения, {{.date}}">
				<h2 class="h2 healing__date-title">{{ @global.utils.formatDate(.date) }}</h2>
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
					{{#each photos.after}}
					<div class="col-md-6">
						<a class="after-healing__item"
							data-fancybox="images-{{this.id}}"
							href="{{.src}}"
							data-caption="Фото после начала лечения, {{ @global.utils.formatDate(.date) }}">
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
					<input class="input__control intl-tel" type="tel" name="phone"
						value="{{.phone}}" required>
					<div class="input__placeholder input__placeholder--dark active">Телефон</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="input input--grey">
					<input class="input__control" type="email"
						name="email" value="{{.email}}" placeholder="E-mail" required>
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
		var saveRecord = function(id, data){
			utils.api.post(
					'/api/v2/update/records/' + id, data)
				.then(function (res) {
					console.log('event data:', data);
					toast('Успешно сохранено');
					window.content_load();
				});
		};
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
					var $form = $(ev.node).parents('form');
					var files = Array.from($form.find('input[name="file"]')[0].files);
					files.forEach(function (file) {
						uploadFile(
							file,
							'records/analyses/' + record.client,
							Date.now() + '_' + utils.getRandomStr(4),
							function (photo) {
								console.log(photo);
								utils.api.post('/api/v2/update/records/' + record.id, {
										'analyses': photo.uri
									})
									.then(function (record) {
										toast('Анализы добавлены!');
										window.load();
									});
							});
						return false;
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
								initPlugins($(this.el));
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
				addPhoto(ev, record) {
					var self = this;
					popupPhoto(catalog.clients[record.client], record,
						function (rec) {
							toast('Фото добавлено!');
							content_load();
							setTimeout(function () {
								$(self.el).find('a.photo[data-href]')
									.each(function (i) {
										var _img = $(this);
										_img.attr('href', $(this).data('href'));
									});
							}, 150);
						});
				},
				deleteProfile(ev, client, idx) {
					if (confirm("Удалить профиль " + client.fullname + " и все записи пациента?") == true) {
						window.api.get('/api/v2/list/records?client=' + client.id).then(function (recs) {
							if (!!recs) {
								recs.forEach(function (rec, i) {
									setTimeout(function () {
										window.api.get('/api/v2/delete/record/' + rec.id);
									});
								});
							}
							window.api.get('/api/v2/delete/users/' + client.id).then(function () {
								toast('Профиль удален!');

								setTimeout(function () {
									location.href = '/cabinet/search'
								}, 1000);
							});
						});
					} else {

					}
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
					var recordEditor   = new Ractive({
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
								$(this.find(`.select.status [data-id="${_record.status}"]`))
									.trigger('click');
								$(this.find(`.select.pay [data-id="${_record.pay_status}"]`))
									.trigger('click');
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
									if (new_data.group === 'events') {
										if (!!new_data.services || !!new_data.consultation) {
											new_data.no_services = 0;
										}
									}
									if (!new_data.hasOwnProperty('has_meetroom')) {
										new_data.has_meetroom = 0;
									}
									if (!new_data.hasOwnProperty('consultation')) {
										new_data.consultation       = null;
										new_data.for_consultation   = 0;
										new_data.consultation_price = 0;
									}
									if (!new_data.hasOwnProperty('services')) {
										new_data.services       = [];
										new_data.service_prices = {};
									} else {
										new_data.services = utils.arr.unique(new_data.services);
									}

									if (new_data.group === 'upcoming') {
										if (!new_data.price) {
											toast_error('Необходимо выбрать услугу');
											$($(ev.node).parents('form'))
												.find('.popup-services-list')
												.focus();
											return false;
										}
									}

									new_data.event_date = utils.dateForce(new_data.event_date);

									changeLogSave(new_data, _record);
									var is_saved = false;
									if (new_data.type == 'online') {
										if (new_data.status == 'upcoming') {
											if (!new_data.meetroom ||
											    !new_data.meetroom.meetingId) {
												is_saved = true;
												onlineRooms.create(function (meetroom) {
													new_data['meetroom'] = meetroom;
													saveRecord(_record.id, new_data);
												});
											} else {
												is_saved = true;
												saveRecord(_record.id, new_data);
											}
										}
									}

									if (!is_saved) {
										if (!!new_data.meetroom) {
											onlineRooms.delete(new_data.meetroom.meetingId, function (meetroom) {});
											new_data.meetroom = {};
										}
										saveRecord(_record.id, new_data);
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