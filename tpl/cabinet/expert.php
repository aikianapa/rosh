<!DOCTYPE html>
<html class="no-js" lang="ru">
<head>
	<title seo>Кабинет специалиста</title>
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
					<div class="crumbs">
						<a class="crumbs__arrow" href="#">
							<svg class="svgsprite _crumbs-back">
								<use xlink:href="/assets/img/sprites/svgsprites.svg#crumbs-back"></use>
							</svg>
						</a>
						<a class="crumbs__link" href="/">Главная</a>
						<span class="crumbs__link">Кабинет специалиста</span>
					</div>
					<h1 class="h1 mb-40">Кабинет специалиста</h1>
					<div class="search__block --flex --aicn">
						<div class="input">
							<input class="search__input" type="text" name="q" placeholder="Поиск">
						</div>
						<button class="btn btn--black" type="submit">Найти</button>
					</div>
				</div>
			</form>
			<div class="container expert-page">
				<div class="loading-overlay">
					<div class="loader"></div>
				</div>
			</div>
		</div>
	</main>

	<template id="expert-page">
		<div class="account__panel">
			<div class="account__info">
				<div class="user --flex">
					<div class="user__panel">
						<div class="user__name">
							{{user.expert.name}}
							<button class="user__edit all" on-click="toggleEdit">
								<svg class="svgsprite _edit">
									<use xlink:href="/assets/img/sprites/svgsprites.svg#edit"></use>
								</svg>
							</button>
						</div>
						<div class="user__group --noflex">
							<div class="user__item">Образование:
								<span>{{user.expert.education}}</span>
							</div>
							<div class="user__item">Лицензия:
								{{#each user.adv.licenses: ixd}}
								<p>
									<span>№ {{.}}</span>
								</p>
								{{/each}}
							</div>
						</div>
					</div>
					<div class="user__panel user__panel--border">
						<div class="user__item">{{user.expert.spec}}</div>
						{{#if events.upcoming}}
						<div class="user__notifcation closest-event">
							<svg class="svgsprite _notification">
								<use xlink:href="/assets/img/sprites/svgsprites.svg#notification"></use>
							</svg>
							Ближайшая запись: {{ @global.utils.formatDate(events.upcoming[0].event_date) }},
							{{events.upcoming[0].event_time_start}} - {{events.upcoming[0].event_time_end}}
						</div>
						{{/if}}
					</div>
				</div>
			</div>
			<a class="account__exit" href="/signout">Выйти из аккаунта</a>
			<div class="profile-editor-inline profile-edit" data-template="editorProfile"></div>
		</div>

		{{#if events.currents}}
		<div class="lk-title current_event">Текущее событие</div>
		<div class="account-events current_event">
			{{#each events.current}}
			<div class="account-events__block">
				<div class="account-events__block-wrap mb-20">
					<div class="account-events__item">
						<div class="account-event-wrap">
							<div class="account-events__name">Услуги:</div>
							<div class="account-event">
								{{#services}}
								{{catalog.services[this].header}}<br>
								{{/services}}
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
					<div class="account-events__item event_date">
						<div class="account-event-wrap --jcsb">
							<div class="account-events__name">Дата приема:</div>
							<div class="account-event">
								<p>{{ @global.utils.formatDate(this.event_date) }}</p>
							</div>
						</div>

						<div class="account-event-wrap --jcsb">
							<div class="account-events__name">Время приема:</div>
							<div class="account-event">
								<p>{{this.event_time_start}}-{{this.event_time_end}}</p>
							</div>
						</div>
					</div>
					<div class="account-events__item">
						<div class="account-event-wrap">
							<div class="account-events__name">Пациент:</div>
							<div class="account-event">
								<p>{{ @global.catalog.clients[this.client].fullname }}</p>
							</div>
						</div>
					</div>
				</div>

				{{#if this.type == 'online'}}
				<div class="account-events__btns">
					<div class="account-event-wrap --aicn">
						<div class="account-events__btn">
							<a class="btn btn--black"
								onclick="window.open('/cabinet/online#{{this.id}}', '_blank',
                                             'width='+screen.availWidth+',height='+screen.availHeight+
                                             ',location=yes,scrollbars=yes,status=yes');">
								Начать консультацию
							</a>
						</div>
						<p>Вас ожидает пациент, можете подключиться прямо сейчас</p>
					</div>
				</div>
				{{/if}}
				<div class="account-edit pt-30">
					<div class="account-edit__title">
						<p>Рекомендации</p>
						<a class="user__edit">
							<svg class="svgsprite _edit">
								<use xlink:href="/assets/img/sprites/svgsprites.svg#edit"></use>
							</svg>
						</a>
					</div>
					<textarea class="account-edit__textarea">{{this.recommendation}}</textarea>
					<button class="btn btn--white">Сохранить</button>
				</div>
				{{#if this.analises}}
				<div class="account-events__download">
					<div class="lk-title">Анализы</div>
					<a class="btn btn--white" href="{{this.analises}}"
						download="Анализы({{this.clientData.fullname}}, {{this.event_date}}).pdf">
						Скачать анализы</a>
				</div>
				{{/if}}
			</div>
			{{/each}}
		</div>
		{{/if}}

		{{#if events.upcoming}}
		<div class="lk-title">Предстоящие события</div>
		<div class="account-events">
			{{#each events.upcoming}}
			<div class="account-events__block">
				<div class="account-events__block-wrap mb-20">
					<div class="account-events__item">
						<div class="account-event-wrap">
							<div class="account-events__name">Услуги:</div>
							<div class="account-event">
								{{#services}}
								{{catalog.services[this].header}}<br>
								{{/services}}
							</div>
						</div>
					</div>
					<div class="account-events__item event_date">
						<div class="account-event-wrap --jcsb">
							<div class="account-events__name">Дата приема:</div>
							<div class="account-event">
								<p>{{ @global.utils.formatDate(this.event_date) }}</p>
							</div>
						</div>
						<div class="account-event-wrap --jcsb">
							<div class="account-events__name">Время приема:</div>
							<div class="account-event">
								<p>{{this.event_time_start}}-{{this.event_time_end}}</p>
							</div>
						</div>
					</div>
					<div class="account-events__item">
						<div class="account-event-wrap">
							<div class="account-events__name">Пациент:</div>
							<div class="account-event">
								<p>{{ @global.catalog.clients[this.client].fullname }}</p>
							</div>
						</div>
					</div>
				</div>


				{{#if this.type == 'online'}}
				<div class="account-events__btns">
					<div class="account-event-wrap --aicn">
						<div class="account-events__btn">
							<button class="btn btn--white disabled" disabled>
								Онлайн консультация
							</button>
						</div>
						<p>Кнопка станет активной за 5 минут до начала приема</p>
					</div>
				</div>
				{{/if}}

				{{#if this.analises}}
				<div class="account-events__download">
					<div class="lk-title">Анализы</div>
					<a class="btn btn--white" data-link="[[this.analises]]" download="Анализы.pdf">
						Скачать анализы
					</a>
				</div>
				{{/if}}
			</div>
			{{/each}}
		</div>
		{{/if}}

		<div class="lk-title">История посещений и приемов</div>
		<div class="account__history">
			<div class="account__table">
				<div class="account__table-head">
					<div class="history-item">Дата</div>
					<div class="history-item">Время</div>
					<div class="history-item">Пациент</div>
					<div class="history-item">Услуги</div>
					<div class="history-item">Анализы</div>
				</div>
				<div class="account__table-body">
					{{#each history}}
					<div class="acount__table-accardeon accardeon" data-record_id="{{this.id}}">
						<div class="acount__table-main accardeon__main accardeon__click">
							<div class="history-item">
								<p>Дата</p>
								{{ @global.utils.formatDate(.event_date) }}
							</div>
							<div class="history-item">
								<p>Время</p>
								{{this.event_time_start}} - {{this.event_time_end}}
							</div>
							<div class="history-item">
								<p>Пациент</p>
								<p>{{ this.catalog.clients[.client].fullname }}</p>
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
							<div class="account-edit__title">
								<p>Рекомендация врача</p>
								<a class="user__edit">
									<svg class="svgsprite _edit">
										<use xlink:href="/assets/img/sprites/svgsprites.svg#edit"></use>
									</svg>
								</a>
							</div>
							<form on-submit="saveRecommendation" data-id="{{this.id}}">
								<textarea class="account-edit__textarea" id="{{this.id}}--recommendation"
									name="recommendation">{{this.recommendation}}</textarea>

								<button class="btn btn--white" type="submit">Сохранить</button>
							</form>
						</div>
					</div>
					{{else}}
					<div class="acount__table-accardeon accardeon">
						<div class="acount__table-main accardeon__main">
							Нет записей о посещении
						</div>
					</div>
					{{/each}}
				</div>
			</div>
		</div>
	</template>
	<template id="editorProfile">
		<form on-submit="submitUserForm">
			{{#user}}
			<div class="profile-edit__block">
				<div class="lk-title">Редактировать профиль</div>
				<div class="row profile-edit__wrap">
					<div class="col-md-3">
						<div class="input input--grey">
							<input class="input__control datebirthdaypickr" name="birthdate"
								required value="{{.birthdate}}" type="text" placeholder="Дата рождения">
							<div class="input__placeholder input__placeholder--dark">Дата рождения</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="input input--grey">
							<input class="input__control" type="tel" name="phone" value="{{.phone}}"
								required placeholder="Телефон" data-inputmask="'mask': '+9 (999) 999-99-99'">
							<div class="input__placeholder input__placeholder--dark">Телефон</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="input input--grey">
							<input class="input__control" type="email" name="email" value="{{.email}}"
								required placeholder="E-mail">
							<div class="input__placeholder input__placeholder--dark">E-mail</div>
						</div>
					</div>
					<div class="col-md-2">
						<button class="btn btn--white profile-edit__submit" type="submit">Сохранить</button>
					</div>
				</div>
			</div>
			{{/user}}
		</form>
		<form on-submit="submitExpertForm">
			<div class="profile-edit__block">
				<div class="lk-title">Лицензия</div>
				<div class="profile-licenses row">
					<div class="col-md-6">
						<div class="profile-licenses__inputs repeater-container" data-repeater="license"
							data-name="adv[licenses][]">
							{{#each user.adv.licenses: idx}}
							<div class="profile-licenses__input input repeater-item input--grey">
								<input class="input__control" type="text"
									name="adv[licenses][]"
									placeholder="Добавьте лицензию"
									value="{{user.adv.licenses[idx]}}">
								<div class="input__placeholder">Добавьте лицензию</div>
								{{#idx}}
								<a class="profile-licenses__delete repeater-delete" href="#">
									<svg class="svgsprite _delete-black">
										<use xlink:href="/assets/img/sprites/svgsprites.svg#delete-black">
										</use>
									</svg>
								</a>
								{{/idx}}
							</div>
							{{else}}
							<div class="profile-licenses__inputs repeater-container"
								data-repeater="license">
								<div class="profile-licenses__input input input--grey">
									<input class="input__control" type="text"
										placeholder="Добавьте лицензию" name="adv[licenses][]">
									<div class="input__placeholder">Добавьте лицензию</div>
								</div>
							</div>
							{{/each}}
						</div>
					</div>
					<div class="col-md-6 --flex">
						<a class="btn btn--black add-license repeater-add"
							data-repeater="license">Добавить лицензию</a>
						<div class="profile-licenses__input input input--grey repeater-sample"
							data-repeater="license">
							<input class="input__control" type="text" placeholder="№ лицензии">
							<div class="input__placeholder">Добавьте лицензию</div>
							<a class="profile-licenses__delete repeater-delete" href="#">
								<svg class="svgsprite _delete-black">
									<use xlink:href="/assets/img/sprites/svgsprites.svg#delete-black">
									</use>
								</svg>
							</a>
						</div>
					</div>
				</div>
			</div>
			<div class="profile-edit__block profile-education">
				<div class="lk-title">Образование</div>
				<div class="profile-education__wrap repeater-container" data-repeater="study">
					{{#each user.expert.stages: idx}}
					<div class="profile-education__inner row repeater-item" data-idx="{{idx}}">
						<div class="col-md-6">
							<div class="input input--grey">
								<input class="input__control" type="text"
									placeholder="Название учебного заведения"
									name="adv[stages][{{idx}}][stage]"
									value="{{.stage}}">
								<div class="input__placeholder">Название учебного заведения</div>
							</div>
						</div>
						<div class="col-md-5">
							<div class="profile-education__inputs">
								<div class="profile-education__input">
									<div class="input input-lk-calendar input--grey">
										<input class="input__control yearpickr" type="text"
											name="adv[stages][{{idx}}][year]"
											placeholder="Начало обучения"
											value="{{.year}}">
										<div class="input__placeholder">Начало обучения</div>
									</div>
								</div>
								<div class="profile-education__input">
									<div class="input input-lk-calendar input--grey">
										<input class="input__control yearpickr" type="text"
											placeholder="Окончание обучения"
											name="adv[stages][{{idx}}][year_end]"
											value="{{.year_end}}">
										<div class="input__placeholder">Окончание обучения</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-1">
							{{#idx}}
							<a class="profile-study__delete repeater-delete" href="#">
								<svg class="svgsprite _delete-black">
									<use xlink:href="/assets/img/sprites/svgsprites.svg#delete-black">
									</use>
								</svg>
							</a>
							{{/idx}}
						</div>
					</div>
					{{else}}
					<div class="profile-education__inner row repeater-item" data-idx="0">
						<div class="col-md-6">
							<div class="input input--grey">
								<input class="input__control" type="text"
									placeholder="Название учебного заведения"
									name="adv[stages][0][stage]">
								<div class="input__placeholder">Название учебного заведения</div>
							</div>
						</div>
						<div class="col-md-5">
							<div class="profile-education__inputs">
								<div class="profile-education__input">
									<div class="input input-lk-calendar input--grey">
										<input class="input__control yearpickr" type="text"
											name="adv[stages][0][year]"
											placeholder="Начало обучения">
										<div class="input__placeholder">Начало обучения</div>
									</div>
								</div>
								<div class="profile-education__input">
									<div class="input input-lk-calendar input--grey">
										<input class="input__control yearpickr" type="text"
											placeholder="Окончание обучения"
											name="adv[stages][0][year_end]">
										<div class="input__placeholder">Окончание обучения</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-1"></div>
					</div>
					{{/each}}
				</div>
				<div class="profile-education__inner row">
					<div class="col-md-6 --flex">
						<a class="btn btn--black add-education repeater-add" href="#"
							data-repeater="study">Добавить обучение</a>
						<div class="profile-education__inner row repeater-sample" data-repeater="study">
							<div class="col-md-6">
								<div class="input input--grey">
									<input class="input__control" type="text"
										placeholder="Название учебного заведения">
									<div class="input__placeholder">Название учебного заведения</div>
								</div>
							</div>
							<div class="col-md-5">
								<div class="profile-education__inputs">
									<div class="profile-education__input">
										<div class="input input-lk-calendar input--grey">
											<input class="input__control yearpickr" type="text"
												placeholder="Начало обучения">
											<div class="input__placeholder">Начало обучения</div>
										</div>
									</div>
									<div class="profile-education__input">
										<div class="input input-lk-calendar input--grey">
											<input class="input__control yearpickr" type="text"
												placeholder="Окончание обучения">
											<div class="input__placeholder">Окончание обучения</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-1">
								<a class="profile-study__delete repeater-delete" href="#">
									<svg class="svgsprite _delete-black">
										<use xlink:href="/assets/img/sprites/svgsprites.svg#delete-black">
										</use>
									</svg>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<button class="btn btn--white" type="submit">Сохранить</button>
		</form>
	</template>

	<script wb-app>
		$(document).on('cabinet-db-ready', function () {
			utils.api.get('/api/v2/read/users/' + wbapp._session.user.id).then(function (user) {

				window.page = new Ractive({
					el: 'main.page .expert-page',
					template: wbapp.tpl('#expert-page').html,
					data: {
						user: user,
						expert: {},
						catalog: catalog,
						events: {
							'upcoming': [],
							'current': []
						},
						history: []
					},
					on: {
						init() {
							utils.api.get('/api/v2/list/experts/?login=' + wbapp._session.user.id)
								.then(function (data) {
									page.set('expert', data[0]); /* get actually user data */
									page.set('show_history', true);
									return data[0];
								})
								.then(function (expert) {
									utils.api.get(
											'/api/v2/list/records?group=events&status=[upcoming,past]' +
											'&experts~=' + expert.id + '&@sort=event_date:d')
										.then(function (records) {
											if (!records) {
												return;
											}
											let curr_timestamp = parseInt(getdate()[0]);
											records.forEach(function (rec, idx) {
												if (rec.status === 'past') {
													page.push('history', rec);
													return;
												} else if (idx === 0) {
													page.set('closest_event', rec);
												}

												if (rec.event_date !== (new Date()).toLocaleDateString()) {
													page.push('events.upcoming', rec); /* get actually user next events */
													return;
												}

												let event_from_timestamp = utils.timestamp(
													rec.event_date + ' ' + rec.event_time_start);
												let event_to_timestamp   = utils.timestamp(
													rec.event_date + ' ' + rec.event_time_end);

												if (event_from_timestamp < curr_timestamp
												    && (event_to_timestamp >= curr_timestamp)) {
													page.push('events.current', rec);
												} else {
													page.push('events.upcoming', rec);
												}
											});
										});
								});
						},
						complete() {
							this.set('catalog', catalog);
						},
						toggleEdit(ev) {
							console.log(ev, $(ev.node), this);
							if (!!window.profile_inline_editor) {
								//$('.profile-editor-inline').toggleClass('d-none');
								return;
							}
							window.profile_inline_editor = new Ractive({
								el: 'main.page .profile-edit',
								template: wbapp.tpl('#editorProfile').html,
								data: {
									user: this.get('user')
								},
								on: {
									complete() {
										$('.profile-editor-inline').removeClass('d-none');
										initPlugins();
									},
									submitUserForm(ev) {
										let $form = $(ev.node);
										let uid   = this.get('user.id');
										if ($form.verify() && uid > '') {
											let data = $form.serializeJSON();

											data.phone = str_replace([' ', '+', '-', '(', ')'], '', data.phone);
											utils.api.post('/api/v2/update/users/' + uid, data)
												.then(function (res) {
													console.log(res);
													page.set('user', res);
												});
											$('.user__edit.all').trigger('click');
										}
										return false;
									},
									submitExpertForm(ev) {
										let $form = $(ev.node);
										let uid   = this.get('user.id');

										if ($form.verify() && uid > '') {
											let data = $form.serializeJSON();

											utils.api.post('/api/v2/update/users/' + uid, data).then(
												function (res) {
													page.set('user', res);
													console.log('saved', res);
												});
											$('.user__edit.all').trigger('click');
										}
										return false;
									}
								}
							});
						},
						saveRecommendation(ev) {
							const _id             = $(ev.node).data('id');
							const _recommendation = $('#' + _id + '--recommendation').val();

							utils.api.get('/api/v2/read/records/' + _id).then(function (data) {
								var prev_recommendation = data.recommendation;

								utils.api.post('/api/v2/update/records/' + _id,
									{'recommendation': _recommendation}).then(function (res) {
									if (_recommendation !== prev_recommendation) {
										utils.api.post('/api/v2/create/record-changes/',
											{
												record: data.id,
												experts: data.experts,
												client: data.client,
												changes: [{
													label: 'Рекомендации врача',
													field: 'recommendation',
													prev_val: prev_recommendation,
													new_val: _recommendation
												}]
											});
									}
									toast('Успешно сохранено!');
								});
							});
							return false;
						}
					}
				});
			});
		});
	</script>
</div>

<div>
	<wb-module wb="module=yonger&mode=render&view=footer"/>
</div>

</body>
<wb-jq wb="$dom->find('script:not([src]):not([type])')->attr('type','wbapp');"/>
<wb-jq wb="$dom->find('.content-wrap ul')->addClass('ul-line');"/>

</html>