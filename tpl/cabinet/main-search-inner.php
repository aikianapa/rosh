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
	<main class="page" data-barba="container" data-barba-namespace="lk-cabinet" wb-off>
		<div class="account">
			<form class="search" action="/cabinet/search">
				<div class="container">
					<div class="crumbs"><a class="crumbs__arrow" href="#">
							<svg class="svgsprite _crumbs-back">
								<use xlink:href="assets/img/sprites/svgsprites.svg#crumbs-back"></use>
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

<div>
	<wb-module wb="module=yonger&mode=render&view=footer"/>
</div>


<!--!!! TEMPLATES !!!-->
<template id="page-content" wb-off>
	<div class="lk-title">Карточка пациента</div>
	{{#user}}
	<div class="account__panel">
		<div class="account__info">
			<div class="user">
				<div class="user__name">{{this.fullname}}</div>
				<div class="user__item">Дата рождения:
					<span>{{ @global.utils.formatDate(this.birthdate) }}</span>
				</div>
				<a href="callto:{{ this.phone }}" class="user__item">Тел:
					<span>{{ @global.utils.formatPhone(this.phone) }}</span>
				</a>
				<div class="user__item">Почта:
					<span>{{this.email}}</span>
				</div>
				<div class="user__confirm">
					<svg class="svgsprite _confirm">
						<use xlink:href="assets/img/sprites/svgsprites.svg#confirm"></use>
					</svg>
					Подтвержденный аккаунт<a class="user__notconfirm --openpopup"
						data-popup="--email-send">Отправить код восстановления на почту</a>
				</div>
				<div class="admin-edit__user-btns">
					<a class="admin-edit__user-btn btn btn--white"
						onclick="popupCreateQuote('{{this.id}}', true)">
						Записать пациента на прием
					</a>
					<a class="admin-edit__user-btn btn btn--white"
						onclick="popupPhoto({longterm:1, client:'{{this.id}}'})">
						Добавить продолжительное лечение
					</a>
					<div class="admin-edit__uploads" data-client="{{this.id}}">
						<input type="hidden" name="analises">
						<input class="admin-edit__upload upload-analises"
							id="upload-analises-file"
							type="file"
							name="files[]"
							accept="application/pdf">
						<label class="admin-edit__upload-btn btn btn--white" for="upload-analises-file">
							Добавить анализы
						</label>
					</div>
				</div>
			</div>
		</div>
		<input class="admin-edit__upload" type="hidden" id="analises-file" name="analises"
			value="{{this.analises}}">

		<div class="profile-editor-inline d-none">
			<!-- profileEditInline target -->
		</div>
	</div>
	{{/user}}
	{{#if events.upcoming}}
	<div class="lk-title">Предстоящие события</div>
	<div class="account-events">
		{{#each events.upcoming}}
		<div class="account-events__block --flex --jcsb">
			<div class="account-events__block-wrap">
				<div class="account-events__item">
					<div class="account-event-wrap">
						<div class="account-events__name">Услуги:</div>
						<div class="account-event">
							<p>Услуги</p>
							{{#services}}
							{{catalog.services[this].header}}<br>
							{{/services}}
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
							<p>{{ this.event_time }}</p>
						</div>
					</div>
				</div>
				<div class="account-events__item">
					<div class="account-event-wrap">
						<div class="account-events__name">Специалист:</div>
						<div class="account-event">
							{{#experts}}
							<p>{{catalog.experts[this].name}}</p>
							{{/experts}}
						</div>
					</div>
				</div>

				<a class="account__detail --openpopup"
					data-popup="--edit-event"
					on-click="editEvent"
					data-record="{{this.id}}">
					Редактировать
				</a>
			</div>
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
		</div>
		<!-- !!! quote history tab !!! -->
		<div class="account__tab data-tab-item active" data-tab="visits">
			<div class="account__table">
				<div class="account__table-head">
					<div class="history-item">Дата</div>
					<div class="history-item">Время</div>
					<div class="history-item">Специалисты</div>
					<div class="history-item">Услуги</div>
					<div class="history-item">Анализы</div>
				</div>
				<div class="account__table-body">
					<!-- !!! quote history item !!! -->
					{{#each history.events}}
					<div class="acount__table-accardeon accardeon"
						data-idx="{{@index}}">
						<div class="acount__table-main accardeon__main accardeon__click" on-click="showEventDetails">
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
								{{#if this.analises}}
								Есть анализы
								{{else}}
								Нет анализов
								{{/if}}
							</div>
						</div>
						<div class="acount__table-list accardeon__list">

						</div>
					</div>
					{{else}}
					<div class="acount__table-accardeon accardeon">
						<div class="acount__table-main accardeon__main">
							<span>Нет записей о посещении</span>
						</div>
					</div>
					{{/each}}
					<!-- !!! / quote history item !!! -->
				</div>
			</div>
		</div>
		<!-- !!! longterm tab !!! -->
		<div class="account__tab data-tab-item" data-tab="longterm">
			<div class="account__table">
				<div class="account__table-head">
					<div class="healing-item">Дата</div>
					<div class="healing-item">Услуги</div>
				</div>
				<div class="account__table-body">
					{{#each history.longterms}}
					<!-- !!! longterm item !!! -->
					<div class="acount__table-accardeon accardeon" data-idx="{{@index}}">>
						<div class="acount__table-main accardeon__main accardeon__click" on-click="showLongtermDetails">
							<div class="healing-item">
								<p>Дата</p> {{ @global.utils.formatDate(this.event_date) }} - {{this.longterm_date_end}}
							</div>
							<div class="healing-item">
								<p>Услуги</p> {{this.longterm_title}}
							</div>
						</div>
						<div class="acount__table-list accardeon__list">

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
	</div>
</template>
<template id="event-details" wb-off>
	{{#event}}
	<div class="analysis mb-40">
		<div class="row">
			<div class="col-md-6">
				{{#if .analises}}
				<div class="account-events__download">
					<div class="lk-title">Анализы</div>
					<a class="btn btn--white" href="{{.}}"
						download="Анализы(за {{this.event_date}}).pdf">
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
				{{#if this.analises}}
				<a class="btn btn--black mb-20 --openpopup"
					data-popup="--analize-type"
					onclick="popupAnalizeInterpretation('{{user.id}}', '{{this.id}}', '{{this.analises}}')">
					Получить расшифровку анализов
				</a>
				{{/if}}
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
	{{#if photos}}
	<div class="acount__photos">
		<div class="row acount__photos-wrap">
			<div class="col-md-6">
				<div class="acount__photo">
					<p>Фото до начала лечения</p>
					{{#each photos.before}}
					<div class="col-md-6">
						<a class="after-healing__item"
							data-fancybox="images"
							href="{{.src}}"
							data-caption="{{.date}}">
							<div class="healing__date">{{.date}}</div>
							<div class="after-healing__photo"
								style="background-image: url({{.src}})">
							</div>
						</a>
					</div>
					{{else}}

					{{/each}}
				</div>
			</div>
			<div class="col-md-6">
				<div class="acount__photo">
					<p>Фото в процессе лечения</p>
					{{#each photos.after}}
					<a class="after-healing__item"
						data-fancybox="images"
						href="{{.src}}"
						data-caption="{{.date}}">
						<img src="{{.src}}" alt="After visit {{.date}}">
					</a>
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
							data-fancybox="images"
							href="{{.src}}"
							data-caption="{{.date}}">
							<div class="healing__date">{{.date}}</div>
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

<script wb-app>
	var client_id = '{{_route.client}}';
	$(document).on('cabinet-db-ready', function () {
		//console.log('>>> cabinet page script.');
		var page = new Ractive({
			el: 'main.page .page-content .container',
			template: wbapp.tpl('#page-content').html,
			data: {
				catalog: {},
				q: '{{_route.params.q}}',
				user: {},
				events: {
					'upcoming': []
				},
				history: {
					'events': [],
					'longterms': []
				}
			},
			on: {
				init() {
					utils.api.get('/api/v2/read/users/' + client_id).then(function (data) {
						data.birthdate_fmt = utils.formatDate(data.birthdate);
						data.phone         = utils.formatPhone(data.phone);
						page.set('user', data); /* get actually user data */
					});

					utils.api.get('/api/v2/list/records?status=upcoming&client=' + client_id).then(
						function (data) {
							let curr_timestamp = parseInt(getdate()[0]);

							data.forEach(function (rec) {
								page.push('events.upcoming', rec); /* get actually user next events */
							});
						});

					utils.api.get('/api/v2/list/records?status=past&group=events&client=' + client_id).then(
						function (data) {
							console.log('history.events:', data);
							page.set('history.events', data); /* get actually user next events */
						});

					utils.api.get('/api/v2/list/records?group=longterms&client=' + client_id)
						.then(function (data) {
							console.log('history.longterms:', data);
							page.set('history.longterms', data); /* get actually user next events */
						});

					setTimeout(function () {
						page.set('catalog', catalog);
					});
				},
				complete() {

				},
				showEventDetails(ev) {
					var _parent = $(ev.node).parents('.accardeon');
					if (!_parent.hasClass('loaded')) {
						var _record_idx      = _parent.data('idx');
						var _record          = page.get('history.events.' + _record_idx);
						var _accardeon__list = new Ractive({
							el: _parent.find('.accardeon__list'),
							template: wbapp.tpl('#event-details').html,
							data: {
								event: _record,
								user: page.get('user'),
								catalog: catalog
							},
							on: {
								init() {
									var _this = this;
									if (!!_record.photos?.before || !!_record.photos?.after) {
										utils.api.get('/api/v2/list/record-photos?record=' + _record.id).then(
											function (result) {
												if (!result) {
													return;
												}

												var list = {before: [], after: []};
												result.forEach(function (photo) {
													if (_record.photos?.before &&
													    _record.photos.before.includes(photo.id)) {
														list.before.push(photo);
													} else if (_record.photos?.after &&
													           _record.photos.after.includes(photo.id)) {
														list.after.push(photo);
													}
												});
												_this.set('photos', list);
											}
										);
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
										utils.api.get('/api/v2/list/record-photos?record=' + _record.id).then(
											function (result) {
												if (!result) {
													return;
												}

												var list = {before: [], after: []};
												result.forEach(function (photo) {
													if (_record.photos?.before &&
													    _record.photos.before.includes(photo.id)) {
														list.before.push(photo);
													} else if (_record.photos?.after &&
													           _record.photos.after.includes(photo.id)) {
														list.after.push(photo);
													}
												});
												_this.set('photos', list);
											}
										);
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
					console.log(ev, $(ev.node), this);
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
								if ($form.verify() && uid > '') {
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
				}
			}
		});
	});
</script>

</body>
<wb-jq wb="$dom->find('script:not([src]):not([type])')->attr('type','wbapp');"/>
<wb-jq wb="$dom->find('.content-wrap ul')->addClass('ul-line');"/>

</html>