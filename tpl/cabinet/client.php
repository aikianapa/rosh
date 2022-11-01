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
	<main class="page" data-barba="container" data-barba-namespace="lk-cabinet" wb-off>
		<div class="container">
			<div class="account">
				<div class="crumbs">
					<a class="crumbs__arrow">
						<svg class="svgsprite _crumbs-back">
							<use xlink:href="/assets/img/sprites/svgsprites.svg#crumbs-back"></use>
						</svg>
					</a>
					<a class="crumbs__link" href="/">Главная</a>
					<span class="crumbs__link">Личный кабинет</span>
				</div>
				<div class="title-flex --flex --jcsb">
					<div class="title">
						<h1 class="h1 mb-10">Личный кабинет</h1>
					</div>
					<button class="btn btn--black --openpopup" data-popup="--record"
						onclick="popupCreateQuote()">
						Записаться на прием
					</button>
				</div>

				<div class="page-content">
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
	<div class="account__panel">
		<div class="account__info">
			<div class="user">
				<div class="user__name">
					{{user.fullname}}
					<button class="user__edit" on-click="toggleEdit">
						<svg class="svgsprite _edit">
							<use xlink:href="/assets/img/sprites/svgsprites.svg#edit"></use>
						</svg>
					</button>
				</div>
				<div class="user__group">
					<div class="user__birthday">Дата рождения:
						<span>{{ @global.utils.formatDate(user.birthdate) }}</span>
					</div>
					<div class="user__phone">Тел:
						<span>{{ @global.utils.formatPhone(user.phone) }}</span>
					</div>
				</div>
				<div class="user__confirm">
					<svg class="svgsprite _confirm">
						<use xlink:href="/assets/img/sprites/svgsprites.svg#confirm"></use>
					</svg>
					Подтвержденный аккаунт
				</div>
			</div>
		</div>
		<a href="/signout" class="account__exit">Выйти из аккаунта</a>
		<input class="admin-edit__upload" type="hidden" id="analyses-file">

		<div class="profile-editor-inline d-none">
			<!-- profileEditInline target -->
		</div>
	</div>

	{{#if events.current}}
	<div class="lk-title">Текущее событие</div>
	<div class="account-events">
		<!-- multiple: .account-events__block -->
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
			</div>

			{{#if this.type == 'online'}}
			<div class="account-events__btns">
				<div class="account-event-wrap --aicn">
					<div class="account-events__btn">
						<a class="btn btn--black" on-click="runOnlineChat">
							Начать консультацию
						</a>
					</div>
					<!-- TODO: add record.expert_waiting for detect online expert status -->
					<p>Вас ожидает специалист, можете подключиться прямо сейчас</p>
				</div>
			</div>
			{{/if}}

			{{#if this.analyses}}
			<div class="account-events__download">
				<div class="lk-title">Анализы</div>
				<a class="btn btn--white" data-href="{{this.analyses}}" download="Анализы.pdf">Скачать анализы</a>
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

				{{#if this.pay_status !== 'unpay'}}
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
				{{else}}

				{{/if}}
				{{#if this.status == 'new'}}
				<div class="account-events__item event_date">
					<div class="account-event-wrap --jcsb">
						<div class="account-events__name">Заявка на рассмотрении</div>

					</div>
				</div>
				{{else}}
				<div class="account-events__item event_date"></div>
				{{/if}}
			</div>

			{{#if this.pay_status == 'unpay'}}
			<div class="account-events__btns">
				<div class="account-event-wrap --aicn">
					<div class="account-events__btn">
						<button class="btn btn--black"
							onclick="popupPay('{{this.id}}','{{this.price}}','{{this.client}}')">
							Внести предоплату
						</button>
					</div>
					<p>Услуга требует внесения предоплаты</p>
				</div>
			</div>
			{{elseif this.type == 'online'}}
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
				<a class="btn btn--white" data-href="[[this.analyses]]" download="Анализы.pdf">Скачать анализы</a>
			</div>
			{{/if}}
		</div>
		{{/each}}
	</div>
	{{/if}}
	<!-- !!! quote history tab !!! -->
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
					<div class="history-item">Специалисты</div>
					<div class="history-item">Услуги</div>
					<div class="history-item">Анализы</div>
				</div>
				<div class="account__table-body">
					<!-- !!! quote history item !!! -->
					{{#each history.events}}
					<div class="acount__table-accardeon accardeon"
						data-idx="{{@index}}">
						<div class="acount__table-main accardeon__main accardeon__click">
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
									<div class="col-md-6">
										{{#if this.analyses}}
										<div class="analysis__top --aicn --flex mb-20">
											<div class="analysis__title">Анализы</div>
											<a class="btn btn--white" href="{{this.analyses}}"
												download="Анализы(за {{this.event_date}}).pdf">Скачать анализы</a>
										</div>
										{{/if}}

										<div class="analysis__description">
											<p class="text-bold mb-20">Выполнялись процедуры</p>
											<p class="text-grey">{{.comment}}</p>
										</div>
									</div>
									<div class="col-md-6">
										{{#if this.analyses}}
										<a class="btn btn--black mb-20 --openpopup"
											data-popup="--analize-type"
											onclick="popupAnalizeInterpretation('{{user.id}}', '{{this.id}}', '{{this.analyses}}')">
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

							{{#if this.hasPhoto}}
							<div class="acount__photos">
								<div class="row">
									<div class="col-md-4">
										<p>Фото до начала лечения</p>
										{{#each photos.before}}
										<div class="row">
											<div class="col-md-12">
												<div class="acount__photo">
													<a class="after-healing__item"
														data-fancybox="event-{{this.id}}"
														href="{{.src}}"
														data-caption="Фото до начала лечения:
															{{ @global.utils.formatDate(.date) }}">
														<div class="healing__date">Фото до начала лечения:
															{{ @global.utils.formatDate(.date) }}</div>
														<div class="after-healing__photo"
															style="background-image: url({{.src}})">
														</div>
													</a>

												</div>
											</div>
										</div>
										{{else}}

										{{/each}}
									</div>
									<div class="col-md-4">
										<p>Фото в процессе лечения:</p>
										{{#each photos.after}}
										<div class="row">
											<div class="col-md-12">
												<div class="acount__photo">
													<a class="after-healing__item"
														data-fancybox="event-{{this.id}}"
														href="{{.src}}"
														data-caption="Фото в процессе лечения:
															{{ @global.utils.formatDate(.date) }}">
														<div class="healing__date">Фото в процессе лечения:
															{{ @global.utils.formatDate(.date) }}</div>
														<div class="after-healing__photo"
															style="background-image: url({{.src}})">
														</div>
													</a>

												</div>
											</div>
										</div>
										{{else}}

										{{/each}}
									</div>
								</div>
							</div>
							{{/if}}
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
					{{#each history.longterms}}
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
								<div class="col-md-4">
									<div class="text-bold text-big mb-20">Фото до начала лечения</div>
									{{#each this.photos.before}} <!--single photo!-->
									<a class="before-healing"
										data-fancybox="images-{{this.id}}"
										href="{{.src}}"
										data-caption="Фото до начала лечения: {{ @global.utils.formatDate(.date) }}">
										<h2 class="h2 healing__date-title d-none">
											{{ @global.utils.formatDate(.date) }}
										</h2>
										<div class="before-healing__photo" style="background-image: url('{{.src}}')"></div>
										<div class="healing__date">
											{{ @global.utils.formatDate(.date) }}
										</div>
										<div class="healing__description">{{.comment}}</div>
									</a>
									{{/each}}
								</div>
								<div class="col-md-8">
									<div class="text-bold text-big mb-20">
										Фото после начала лечения
									</div>
									<div class="after-healing">
										<h2 class="h2 healing__date-title d-none month-header d-none"></h2>
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

<template id="profile-editor-inline" wb-off>
	<form on-submit="submit">
		{{#with user}}
		<p class="text-bold mb-30">Редактировать профиль</p>
		<div class="row profile-edit__wrap">
			<div class="col-md-3">
				<div class="input input--grey">
					<input class="input__control datebirthdaypickr"
						name="birthdate"
						value="{{.birthdate}}"
						type="text"
						required
						placeholder="Дата рождения" twoway="false">
					<div class="input__placeholder input__placeholder--dark">Дата рождения</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="input input--grey">
					<input class="input__control" type="tel" name="phone"
						required value="{{user.phone}}" placeholder="Телефон"
						data-inputmask="'mask': '+9 (999) 999-99-99'">
					<div class="input__placeholder input__placeholder--dark">Телефон</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="input input--grey">
					<input class="input__control" type="email"
						name="email" value="{{.email}}" placeholder="E-mail"
						required>
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
							<input class="input__control" type="text" name="country"
								value="{{.country}}" placeholder="Страна">
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
		{{/with}}
	</form>
</template>

<script>
	$(document).on('cabinet-db-ready', function () {
		window.page = new Ractive({
			el: 'main.page .page-content',
			template: wbapp.tpl('#page-content').html,
			data: {
				catalog: {},
				user: wbapp._session.user,
				events: {
					'upcoming': [],
					'current': []
				},
				history: {
					'events': [],
					'longterms': []
				}
			},
			on: {
				init() {

				},
				complete() {
					this.set('catalog', catalog);
					setTimeout(function (){
						$(this.el).find("img[data-src]:not([src])").lazyload();
					});
				},
				runOnlineChat(ev) {
					const _rec_id = $(ev.node).data('id');
					Cabinet.runOnlineChat(_rec_id);
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
									let data   = $form.serializeJSON();
									data.phone = str_replace([' ', '+', '-', '(', ')'], '', data.phone);
									Cabinet.updateProfile(uid, data, function (data) {
										data.birthdate_fmt = utils.formatDate(data.birthdate);
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

		utils.api.get('/api/v2/read/users/' + wbapp._session.user.id).then(function (data) {
			page.set('user', data);
		});
		window.load = function () {
			utils.api.get('/api/v2/list/records?status=[upcoming,new,past]&group=[events,quotes]&client=' +
			              wbapp._session.user.id)
				.then(function (records) {
					console.log('event:', records);
					if (!!records) {
						records.forEach(function (rec, idx) {
							console.log('event:', rec);
							if (rec.status === 'past') {
								page.push('history.events', rec);
								return;
							}
							if (rec.status === 'new') {
								page.push('events.upcoming', rec);
								return;
							}

							if (Cabinet.isCurrentEvent(rec)) {
								page.push('events.current', rec);
							} else {
								page.push('events.upcoming', rec);
							}
						});
					}
					page.set('events_ready', true);
				});
		};
		load();
		utils.api.get('/api/v2/list/records?group=longterms&client=' + wbapp._session.user.id)
			.then(function (records) {
				if (!!records) {
					page.set('history.longterms', records);
				}
				page.set('longterms_ready', true);
			});

		setTimeout(function () {
		});
	});
</script>

<div>
	<wb-module wb="module=yonger&mode=render&view=footer"/>
</div>
</body>

</html>