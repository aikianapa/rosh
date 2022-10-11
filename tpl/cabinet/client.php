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
							<use xlink:href="assets/img/sprites/svgsprites.svg#crumbs-back"></use>
						</svg>
					</a>
					<a class="crumbs__link" href="/">Главная</a>
					<a class="crumbs__link" href="#">Личный кабинет</a>
				</div>

				<div class="title-flex --flex --jcsb">
					<div class="title">
						<h1 class="h1 mb-10">Личный кабинет</h1>
					</div>
					<button class="btn btn--black --openpopup" data-popup="--record"
						on-click="popupCreateQuote">
						Записаться на прием
					</button>
				</div>
				<div class="account__panel">
					<div class="account__info">
						<div class="user">
							<div class="user__name">{{user.fullname}}
								<button class="user__edit">
									<svg class="svgsprite _edit">
										<use xlink:href="assets/img/sprites/svgsprites.svg#edit"></use>
									</svg>
								</button>
							</div>
							<div class="user__group">
								<div class="user__birthday">Дата рождения:
									<span>{{user.birthdate}}</span>
								</div>
								<div class="user__phone">Тел:
									<span>{{user.phone}}</span>
								</div>
							</div>
							<div class="user__confirm">
								<svg class="svgsprite _confirm">
									<use xlink:href="assets/img/sprites/svgsprites.svg#confirm"></use>
								</svg>
								Подтвержденный аккаунт
							</div>
						</div>
					</div>
					<a href="/signout" class="account__exit">Выйти из аккаунта</a>
					<form class="profile-edit" on-submit="profileSave">
						{{#user}}
						<p class="text-bold mb-30">Редактировать профиль</p>
						<div class="row profile-edit__wrap">
							<div class="col-md-3">
								<div class="input input--grey">
									<input class="input__control datebirthdaypickr" name="birthdate" value="{{.birthdate}}" type="text" placeholder="Дата рождения">
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
									<input class="input__control" type="email" name="email" value="{{.email}}" placeholder="E-mail">
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
									<div class="account-events__name">Дата приема:</div>
									<div class="account-event">
										<p>{{this.event_date}}</p>
									</div>
								</div>
								<div class="account-event-wrap">
									<div class="account-events__name">Время приема:</div>
									<div class="account-event">
										<p>{{this.event_time}}</p>
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

						{{#if this.type == 'online'}}
						<div class="account-events__btns">
							<div class="account-event-wrap --aicn">
								<div class="account-events__btn">
									<a class="btn btn--black"
										onclick="window.open('/cabinet/online#{{this.id}}',
											 '_blank',
                                             'width='+screen.availWidth+',height='+screen.availHeight+
                                             ',location=yes,scrollbars=yes,status=no');">
										Начать консультацию
									</a>
								</div>
								<p>Вас ожидает специалист, можете подключиться прямо сейчас</p>
							</div>
						</div>
						{{/if}}

						{{#if this.analises}}
						<div class="account-events__download">
							<div class="lk-title">Анализы</div>
							<a class="btn btn--white" href="{{this.client}}.pdf" download="Анализы.pdf">Скачать анализы</a>
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
									<div class="account-events__name">Дата приема:</div>
									<div class="account-event">
										<p>{{this.event_date}}</p>
									</div>
								</div>
								<div class="account-event-wrap">
									<div class="account-events__name">Время приема:</div>
									<div class="account-event">
										<p>{{this.event_time}}</p>
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

						{{#if this.pay_status == 'unpay'}}
						<div class="account-events__btns">
							<div class="account-event-wrap --aicn">
								<div class="account-events__btn">
									<button class="btn btn--black --openpopup" data-popup="--pay-one">Внести предоплату
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

						{{#if this.analises}}
						<div class="account-events__download">
							<div class="lk-title">Анализы</div>
							<a class="btn btn--white" href="{{this.analises.src}}" download="Анализы.pdf">Скачать анализы</a>
						</div>
						{{/if}}

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
								{{#each history.visits}}
								<div class="acount__table-accardeon accardeon">
									<div class="acount__table-main accardeon__main accardeon__click">
										<div class="history-item">
											<p>Дата</p>{{this.event_date}}
										</div>
										<div class="history-item">
											<p>Время</p>{{this.event_time}}
										</div>
										<div class="history-item">
											<p>Специалисты</p>
											{{#experts}}
											{{catalog.experts[this].name}}<br>
											{{/experts}}
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
										<div class="analysis mb-40">
											<div class="row">
												<div class="col-md-6">
													{{#if this.analises}}
													<div class="analysis__top --aicn --flex mb-20">
														<div class="analysis__title">Анализы</div>
														<a class="btn btn--white" href="{{this.analises.src}}" download="Анализы(за 03.10.2022).pdf">Скачать анализы</a>
													</div>
													{{/if}}
													<div class="analysis__description">
														<p class="text-bold mb-20">Выполнялись процедуры</p>
														<p class="text-grey">{{this.description}}</p>
													</div>
												</div>
												<div class="col-md-6">
													{{#if this.analises}}
													<a class="btn btn--black mb-20 --openpopup"
														data-popup="--analize-type"
														on-click="@.analisesQuote"
														data-file="{{this.analises.src}}"
														data-record="{{this.id}}">
														Получить расшифровку анализов
													</a>
													{{/if}}
													<div class="analysis__description">
														<p class="text-bold mb-20">Рекомендация врача</p>
														<div class="text">
															{{this.recommendation}}
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="experts__worked">
											<div class="experts__worked-title">С вами работали</div>
											<div class="row">
												{{#experts}}
												<div class="col-md-6">
													<a class="expert__worked"
														target="_blank"
														data-href="/about/experts/{{catalog.experts[this].info_uri}}">
														<div class="expert__worked-pic">
															<img src="{{catalog.experts[this].image.0.src}}" alt="{{catalog.experts[this].name}}">
														</div>
														<div class="expert__worked-name">{{catalog.experts[this].name}}</div>
														<div class="expert__worked-work">{{catalog.experts[this].spec}}</div>
													</a>
												</div>
												{{/experts}}
											</div>
										</div>
										<div class="acount__photos d-none">
											<div class="row acount__photos-wrap">
												<div class="col-md-6">
													<div class="acount__photo">
														<p>Фото до начала лечения</p>
														{{#each photos.before}}
														<div class="col-md-6">
															<a class="after-healing__item"
																data-fancybox="images"
																href="{{.image.src}}"
																data-caption="{{.date}}">
																<div class="healing__date">{{.date}}</div>
																<div class="after-healing__photo"
																	style="background-image: url({{.image.src}})">
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
															href="{{this.image.src}}"
															data-caption="{{this.date}}">
															<img src="{{this.image.src}}" alt="After visit {{this.date}}">
														</a>
														{{/each}}
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								{{else}}
								<div class="acount__table-accardeon accardeon">
									<div class="acount__table-main accardeon__main">
										Нет записей о посещении
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
								<div class="acount__table-accardeon accardeon">
									<div class="acount__table-main accardeon__main accardeon__click">
										<div class="healing-item">
											<p>Дата</p> {{this.event_date}} - {{this.longterm_date_end}}
										</div>
										<div class="healing-item">
											<p>Услуги</p> {{this.title}}
										</div>
									</div>
									<div class="acount__table-list accardeon__list">
										<div class="row">
											<div class="col-md-4">
												<div class="text-bold text-big mb-20">Фото до начала лечения</div>
												{{#each this.photos.before}} <!--single photo!-->
												<a class="after-healing__item"
													data-fancybox="images"
													href="{{this.image.src}}"
													data-caption="{{this.date}}">
													<h2 class="h2 healing__date-title">{{this.date}}</h2>
													<div class="after-healing__photo"
														style="background-image: url('{{this.image.src}}')">
													</div>
													<div class="healing__description">
														{{this.comment}}
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
																href="{{this.image.src}}"
																data-caption="{{this.date}}">
																<div class="healing__date">{{this.date}}</div>
																<div class="after-healing__photo"
																	style="background-image: url('{{this.image.src}}')">
																</div>
															</a>
														</div>
														{{/each}}
													</div>
												</div>
											</div>
										</div>
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
			</div>
		</div>
	</main>

	<script wbapp>
		var cabinet = new Ractive({
			el: 'main.page',
			template: $('main.page').html(),
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
					wbapp.get('/api/v2/read/users/' + wbapp._session.user.id, function (data) {
						data.birthdate = new Date(data.birthdate).toLocaleDateString();
						data.phone     = '+' + data.phone;
						cabinet.set('user', data); /* get actually user data */
					});

					wbapp.get('/api/v2/list/records?status=upcoming&client=' + wbapp._session.user.id,
						function (data) {
							let curr_timestamp = parseInt(getdate()[0]);

							data.forEach(function (rec) {
								const event_date = (new Date(rec.event_begin_time * 1000)).toLocaleDateString();

								if (event_date !== (new Date()).toLocaleDateString()) {
									cabinet.push('events.upcoming', data); /* get actually user next events */
								}

								if ((curr_timestamp+10) > rec.event_begin_time && (rec.event_end_time >= curr_timestamp)) {
									cabinet.push('events.current', rec);
								}
							});
						});

					wbapp.get('/api/v2/list/records?status=past&client=' + wbapp._session.user.id,
						function (data) {
							console.log('history.events:', data);
							cabinet.set('history.events', data); /* get actually user next events */
						});

					wbapp.get('/api/v2/list/records?longterm=1&client=' + wbapp._session.user.id,
						function (data) {
							console.log('history.longterms:', data);
							cabinet.set('history.longterms', data); /* get actually user next events */
						});

					setTimeout(function () {
						cabinet.set('catalog', catalog);
					});
				},
				popupCreateQuote(ev) {
					var createQuote = new Ractive({
						el: '.popup.--record',
						template: wbapp.tpl('#popupRecord').html,
						data: {
							user: wbapp._session.user,
							'experts': catalog.experts,
							'categories': catalog.categories,
							'services': catalog.services
						},
						on: {
							complete() {
								console.log('ready!', catalog);
								initServicesSearchInput($('#popup-services-list'), servicesList);
								initPlugins();
							},
							submit(ev) {
								let $form = $(ev.node);
								let uid   = createQuote.get('user.id');

								if ($form.verify() && uid > '') {
									let data      = $form.serializeJSON();
									data.group    = 'quotes';
									data.status   = 'new';
									data.status   = 'new';
									data.analises = {};
									data.photos   = {before: [], after: []};

									data.pay_status = 'unpay';
									data.client     = uid;
									data.priority   = 0;
									data.marked     = 0;

									data.comment        = '';
									data.recommendation = '';
									data.description    = '';

									data.clientData = {
										'fullname': cabinet.get('user.fullname'),
										'email': cabinet.get('user.email'),
										'phone': cabinet.get('user.phone')
									};
									wbapp.post('/api/v2/create/records/', data, function (res) {
										$('.popup.--record .popup__panel:not(.--succed)').addClass('d-none');
										$('.popup.--record .popup__panel.--succed').addClass('d-block');
									});
								}

								return false;
							}
						}
					});
				},
				profileSave(ev) {
					let $form = $(ev.node);
					let uid   = cabinet.get('user.id');
					if ($form.verify() && uid > '') {
						let data       = $form.serializeJSON();
						data.phone     = str_replace([' ', '+', '-', '(', ')'], '', data.phone);
						data.birthdate = new Date(data.birthdate).toLocaleDateString();
						wbapp.post('/api/v2/update/users/' + uid, data, function (res) {
							console.log(res);
							toast('Успешно сохранено');
						});
					}
					return false;
				}
			}
		});
	</script>
</div>

<div>
	<wb-module wb="module=yonger&mode=render&view=footer"/>
	<div class="popup --record">
		<template id="popupRecord">
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
					<input class="search__input search-services" type="text" placeholder="Поиск по услугам">
					<div class="search__drop"></div>
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
							<wb-foreach wb="table=experts" wb-filter="active=on">
								<div class="select__item select__item--checkbox">
									<label class="checkbox checkbox--record">
										<input type="checkbox" name="experts[]" value="{{id}}">
										<span></span>
										<div class="checbox__name">
											<div class="select__name">{{name}}</div>
										</div>
									</label>
								</div>
							</wb-foreach>
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
		</template>
	</div>
</div>
</body>
<wb-jq wb="$dom->find('script:not([src]):not([type])')->attr('type','wbapp');"/>
<wb-jq wb="$dom->find('.content-wrap ul')->addClass('ul-line');"/>

</html>