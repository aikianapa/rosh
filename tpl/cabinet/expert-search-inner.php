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
					<div class="crumbs"><a class="crumbs__arrow" href="#">
							<svg class="svgsprite _crumbs-back">
								<use xlink:href="/assets/img/sprites/svgsprites.svg#crumbs-back"></use>
							</svg>
						</a><a class="crumbs__link" href="/">Главная</a>
						<a class="crumbs__link" href="/cabinet">Кабинет специалиста</a>
						<span class="crumbs__link">Поиск</span>
					</div>
					<h1 class="h1 mb-40">Кабинет специалиста</h1>
					<div class="search__block --flex --aicn">
						<div class="input">
							<input class="search__input" type="text" name="q" placeholder="Поиск">
						</div>
						<button class="btn btn--black">Найти</button>
					</div>
				</div>
			</form>
			<div class="search-result">
				<div class="loading-overlay">
					<div class="loader"></div>
				</div>
			</div>
		</div>
	</main>
	<template id="search-result">
		{{#with client}}
		<div class="container">
			<div class="lk-title">Карточка пациента</div>
			<div class="account__panel">
				<div class="account__info">
					<div class="user">
						<div class="user__name">{{.fullname}}</div>
						<div class="user__group">
							<div class="user__birthday">Дата рождения:
								<span>{{ @global.utils.formatDate(.birthdate) }}</span>
							</div>
						</div>
					</div>
				</div>
			</div>

			{{#if events.current}}
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

					{{#if this.type == 'online'}}
					<div class="account-events__btns">
						<div class="account-event-wrap --aicn">
							<div class="account-events__btn">
								<a class="btn btn--black" data-id="{{this.id}}" on-click="runOnlineChat">
									Начать консультацию
								</a>
							</div>
							{{#if this.online_waiting == 'client'}}
							<p>Вас ожидает пациент, можете подключиться прямо сейчас</p>
							{{/if}}
						</div>
					</div>
					{{/if}}
					<div class="account-edit pt-30">
						<div class="account-edit__title">
							<p>Рекомендация врача</p>
							<a class="user__edit">
								<svg class="svgsprite _edit">
									<use xlink:href="/assets/img/sprites/svgsprites.svg#edit"></use>
								</svg>
							</a>
						</div>
						<form class="profile-edit active" on-submit="saveRecommendation" data-id="{{this.id}}">
								<textarea class="account-edit__textarea" id="{{this.id}}--recommendation"
									name="recommendation">{{this.recommendation}}</textarea>

							<button class="btn btn--white" type="submit">Сохранить</button>
						</form>
					</div>

					{{#if this.analyses}}
					<div class="account-events__download">
						<div class="lk-title">Анализы</div>
						<a class="btn btn--white" href="{{this.analyses}}"
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

					{{#if this.analyses}}
					<div class="account-events__download">
						<div class="lk-title">Анализы</div>
						<a class="btn btn--white" href="{{this.analyses}}"
							download="Анализы({{@global.catalog.clients[this.client].fullname}}, {{@global.utils.formatDate(this.event_date)}}).pdf">
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
									{{catalog.clients[client].fullname}}
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
								<div class="account-edit__title">
									<p>Рекомендация врача</p>
									<a class="user__edit">
										<svg class="svgsprite _edit">
											<use xlink:href="/assets/img/sprites/svgsprites.svg#edit"></use>
										</svg>
									</a>
								</div>
								<form class="profile-edit active" on-submit="saveRecommendation" data-id="{{this.id}}">
								<textarea class="account-edit__textarea" id="{{this.id}}--recommendation"
									name="recommendation">{{this.recommendation}}</textarea>

									<button class="btn btn--white" type="submit">Сохранить</button>
								</form>
							</div>
						</div>
						{{elseif ready}}
						<div class="acount__table-accardeon accardeon">
							<div class="acount__table-main accardeon__main">
								Нет записей о посещении
							</div>
						</div>
						{{else}}
						<div class="acount__table-accardeon accardeon">

						</div>
						{{/each}}
					</div>
				</div>
			</div>
		</div>
		{{/with}}
	</template>
	<script wbapp>
		$(document).on('cabinet-db-ready', function () {
			var client_id = '{{_route.client}}';
			//var page      = new Ractive({
			//
			//	data: {
			//		q: '{{_route.params.q}}',
			//		user: wbapp._session.user,
			//		client: {}
			//	},
			//	on: {
			//		init() {
			//			utils.api.get('/api/v2/read/users/' + client_id).then(function (data) {
			//				page.set('client', data);
			//			});
			//		},
			//		saveRecommendation(ev) {
			//			const _id             = $(ev.node).data('id');
			//			const _recommendation = $('#' + _id + '--recommendation').val();
			//
			//			utils.api.get('/api/v2/read/records/' + _id).then(function (data) {
			//				var prev_recommendation = data.recommendation;
			//
			//				utils.api.post('/api/v2/update/records/' + _id,
			//					{'recommendation': _recommendation}).then(function (res) {
			//						toast('Рекомендация сохранена!');
			//					}
			//				);
			//				if (_recommendation !== prev_recommendation) {
			//					utils.api.post('/api/v2/create/record-changes/',
			//						{
			//							record: data.id,
			//							experts: data.experts,
			//							client: data.client,
			//							changes: [{
			//								field: 'recommendation',
			//								prev_val: prev_recommendation,
			//								new_val: _recommendation
			//							}]
			//						}
			//					).then(function (res) {});
			//				}
			//			});
			//		}
			//	}
			//});

			utils.api.get('/api/v2/read/users/' + client_id).then(function (client) {
				window.page = new Ractive({
					el: 'main.page .search-result',
					template: wbapp.tpl('#search-result').html,
					data: {
						q: '{{_route.params.q}}',
						user: wbapp._session.user,
						client: client,
						catalog: catalog,
						events: {
							'upcoming': [],
							'current': []
						},
						history: []
					},
					on: {
						init() {

						},
						complete() {
							this.set('catalog', catalog);
						},
						runOnlineChat(ev) {
							const _rec_id = $(ev.node).data('id');
							Cabinet.runOnlineChat(_rec_id);
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
				utils.api.get(
						'/api/v2/list/records?group=events&status=[upcoming,past]' +
						'&client=' + client_id +
						'&experts~=' + wbapp._session.user.expert.id +
						'&@sort=event_date:d')
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

							if (event_from_timestamp < curr_timestamp && event_to_timestamp >= curr_timestamp) {
								page.push('events.current', rec);
							} else {
								page.push('events.upcoming', rec);
							}
						});
					});
				/*!!! check & sync updates by interval (1-3min) !!!*/

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