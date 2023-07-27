<!DOCTYPE html>
<html class="no-js" lang="ru">

<head>
	<title seo>Кабинет специалиста</title>
	<link rel="icon" href="/favicon.svg" type="image/svg+xml">
</head>

<body class="body lk-cabinet" data-barba="wrapper">
	<div class="scroll-container" data-scroll-container>
		<div>
			<wb-module wb="module=yonger&mode=render&view=header"></wb-module>
		</div>
		<main class="page {{_session.user.role}}" data-barba="container" data-barba-namespace="lk-cabinet" wb-off>
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
						<h1 class="mb-40 h1">Кабинет специалиста</h1>
						<div class="search__block --flex --aicn">
							<div class="input">
								<input class="search__input" type="text" name="q" placeholder="Поиск по пациентам">
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
				<div class="container expert-page">
					<div class="lk-title">Карточка пациента</div>
					<div class="account__panel">
						<div class="account__info">
							<div class="user">
								<div class="user__name">{{.fullname}}</div>
								<div class="user__group">
									{{#if .birthdate === '01.01.1970' }}
									{{else}}
										<div class="user__birthday">Дата рождения:
											<span>{{ @global.utils.formatDate(.birthdate) }}</span>
										</div>
									{{/if}}
								</div>
							</div>
						</div>
					</div>

					{{#if events.current}}
						<div class="lk-title current_event">Текущее событие</div>
						<div class="account-events current_event status-past">
							{{#each events.current}}
								<div class="account-events__block">
									<div class="acount__table-accardeon accardeon status-past" data-accardeon="{{this.id}}">
										<div class="acount__table-main accardeon__main">
											<div class="accardeon__click"></div>
											<div class="mb-20 account-events__block-wrap">
												<div class="account-events__item">
													<div class="account-event-wrap">
														<div class="account-events__name">Услуги:</div>
														<div class="account-event">
															{{#if consultation}}
																{{ @global.catalog.spec_service.consultations[type][consultation].header }}<br>
															{{/if}}
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
														<div class="text-right account-event">
															<p>{{this.event_time_start}}-{{this.event_time_end}}<br>
																<small>по московскому времени</small>
															</p>
														</div>
													</div>
												</div>
												<div class="account-events__item">
													<div class="account-event-wrap">
														<div class="account-events__name">Пациент:</div>
														<div class="account-event">
															<a class="client-card link" href="/cabinet/client/{{this.client}}" target="_blank">
																{{ @global.catalog.clients[this.client].fullname }}</a>
														</div>
													</div>
													<div class="account-event-wrap">
														<div class="account-events__name">Специалист:</div>
														<div class="account-event">
															{{#this.experts}}
																<p>{{@global.catalog.experts[this].fullname}}</p>
															{{/this.experts}}
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="acount__table-list accardeon__list">

											<div class="admin-editor__patient" style="width:62%">
												<div class="mb-10 text-bold">Выбраны услуги</div>
												{{#if this.consultation}}
													<div class="search__drop-item selected-consultation" style="display:flex;">
														<div class="pl-0 search__drop-name consultation-header">
															<span>
																{{@global.catalog.spec_service.consultations[this.type][this.consultation].header}}
															</span>
														</div>
														<div class="search__drop-right">
															<div class="search__drop-summ consultation-price">

															</div>
														</div>
													</div>
												{{/if}}

												{{#each this.service_prices: idx, key}}
													<div class="search__drop-item services selected">
														<div class="pl-0 search__drop-name">
															<div class="search__drop-tags">
																{{#each catalog.servicePrices[service_id+'-'+this.price_id].tags}}
																	<div class="search__drop-tag --{{.color}}">{{this.tag}}</div>
																{{/each}}
															</div>
															{{name}}
														</div>
														<label class="search__drop-right">
															<div class="search__drop-summ"></div>
														</label>
													</div>
												{{/each}}
											</div>
											{{#this.comment_for_expert}}
												<div class="pt-20 mb-20 analysis__description comment_for_expert" style="width:100%">
													<div class="account-edit__title">
														<p>Комментарий администратора</p>
													</div>
													<div class="m-0 mt-20 text-justify text"> {{{@global.nl2br(.comment_for_expert)}}}</div>
												</div>
											{{/this.comment_for_expert}}
											{{#if this.analyses}}
												<div class="pt-20 mb-20 account-edit__title">
													<div class="mr-10">Анализы</div>
													<a class="btn btn--white btn--compact" href="{{this.analyses}}" target="_blank">
														Скачать анализы
													</a>
												</div>
											{{/if}}
											<div class="pt-20 mb-20 account-edit" style="width: 100%">
												<div class="account-edit__title">
													<p>Рекомендация врача</p>
												</div>
												<form class="pt-0 profile-edit active" on-submit="saveRecommendation" data-id="{{this.id}}">
													<textarea class="account-edit__textarea" style="border-color:#777" id="{{this.id}}--recommendation" name="recommendation">{{this.recommendation}}</textarea>

													<button class="btn btn--white" type="submit">Сохранить</button>
												</form>
											</div>

											{{#if this.hasPhoto}}
												<div class="pt-20 mt-20 mb-20 bg-inherit border-top" style="margin-left: 0">
													<div class="row">
														<div class="col-md-5">
															<p>Фото до приема</p>
															{{#each photos.before}}
																<div class="row">
																	<div class="col-md-12">
																		<div class="acount__photo">
																			<a class="before-healing__item photo" data-fancybox="event-{{event.id}}" href="{{.src}}" data-caption="Фото до приема:
															{{ @global.utils.formatDate(.date) }}">
																				<div class="healing__date">
																					{{ @global.utils.formatDate(.date) }}
																				</div>
																				<div class="after-healing__photo" style="background-image: url({{.src}})">
																				</div>
																			</a>

																		</div>
																	</div>
																</div>
															{{else}}

															{{/each}}
														</div>
														<div class="col-md-7">
															<p>Фото после приема</p>
															{{#each photos.after}}
																<div class="row">
																	<div class="mt-1 col-md-6">
																		<div class="acount__photo">
																			<a class="after-healing__item photo" data-fancybox="event-{{event.id}}" href="{{.src}}" data-caption="Фото после приема:
															{{ @global.utils.formatDate(.date) }}">
																				<div class="healing__date">{{ @global.utils.formatDate(.date) }}</div>
																				<div class="after-healing__photo" style="background-image: url({{.src}})">
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
											<div class="pt-20 mb-20 account-events__btns border-top">
												<div class="account-event-wrap --aicn">
													{{#if this.pay_status == 'unpay'}}
														<p>Ожидается предоплата пациентом</p>
														{{elseif this.type == 'online'}}
														<div class="account-events__btn">
															<a class="btn btn--black" data-id="{{this.id}}" on-click="['runOnlineChat',this]">
																Начать консультацию
															</a>
														</div>
														<p>Вас ожидает пациент, можете подключиться прямо сейчас</p>
													{{/if}}
													<div class="account-events__btn">
														<a class="btn btn--black" data-id="{{this.id}}" on-click="['closeEvent',this]">
															Завершить прием
														</a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							{{/each}}
						</div>
					{{/if}}

					{{#if events.upcoming}}
						<div class="lk-title">Предстоящие события</div>
						<div class="account-events status-upcoming">
							{{#each events.upcoming}}
								<div class="account-events__block">
									<div class="acount__table-accardeon accardeon status-upcoming" data-accardeon="{{this.id}}">
										<div class="acount__table-main accardeon__main">
											<div class="account-events__block-wrap">
												<div class="accardeon__click"></div>
												<div class="account-events__item">
													<div class="account-event-wrap">
														<div class="account-events__name">Услуги:</div>
														<div class="account-event">
															{{#services}}
																{{catalog.services[this].header}}<br>
															{{/services}}
															{{#if consultation}}
																{{ @global.catalog.spec_service.consultations[type][consultation].header }}<br>
															{{/if}}
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
														<div class="text-right account-event">
															<p>{{this.event_time_start}}-{{this.event_time_end}}<br>
																<small>по московскому времени</small>
															</p>
														</div>
													</div>
												</div>
												<div class="account-events__item">
													<div class="account-event-wrap">
														<div class="account-events__name">Пациент:</div>
														<div class="account-event">
															<a class="client-card link" href="/cabinet/client/{{this.client}}" target="_blank">
																{{ @global.catalog.clients[this.client].fullname }}</a>
														</div>
													</div>
													<div class="account-event-wrap">
														<div class="account-events__name">Специалист:</div>
														<div class="account-event">
															{{#this.experts}}
																<p>{{@global.catalog.experts[this].fullname}}</p>
															{{/this.experts}}
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="acount__table-list accardeon__list">

											<div class="admin-editor__patient" style="width:62%">
												<div class="mb-10 text-bold">Выбраны услуги</div>
												{{#if this.consultation}}
													<div class="search__drop-item selected-consultation" style="display:flex;">
														<div class="pl-0 search__drop-name consultation-header">
															<span>
																{{@global.catalog.spec_service.consultations[this.type][this.consultation].header}}
															</span>
														</div>
														<div class="search__drop-right">
															<div class="search__drop-summ consultation-price">

															</div>
														</div>
													</div>
												{{/if}}

												{{#each this.service_prices: idx, key}}
													<div class="search__drop-item services selected">
														<div class="pl-0 search__drop-name">
															<div class="search__drop-tags">
																{{#each catalog.servicePrices[service_id+'-'+this.price_id].tags}}
																	<div class="search__drop-tag --{{.color}}">{{this.tag}}</div>
																{{/each}}
															</div>
															{{name}}
														</div>
														<label class="search__drop-right">
															<div class="search__drop-summ"></div>
														</label>
													</div>
												{{/each}}
											</div>
											{{#this.comment_for_expert}}
												<div class="pt-20 mb-20 analysis__description comment_for_expert" style="width:100%">
													<div class="account-edit__title">
														<p>Комментарий администратора</p>
													</div>
													<div class="m-0 mt-20 text-justify text"> {{{@global.nl2br(.comment_for_expert)}}}</div>
												</div>
											{{/this.comment_for_expert}}
											{{#if this.analyses}}
												<div class="pt-20 mb-20 account-edit__title">
													<div class="mr-10">Анализы</div>
													<a class="btn btn--white btn--compact" href="{{this.analyses}}" target="_blank">
														Скачать анализы
													</a>
												</div>
											{{/if}}
											<div class="pt-20 mb-20 account-edit" style="width: 100%">
												<div class="account-edit__title">
													<p>Рекомендация врача</p>
												</div>
												{{#each experts}}
													{{#if this == user.id}}
														<form class="pt-0 profile-edit active" on-submit="saveRecommendation" data-id="{{this.id}}">
															<textarea class="account-edit__textarea" style="border-color:#777" id="{{this.id}}--recommendation" name="recommendation">{{this.recommendation}}</textarea>
															<button class="btn btn--white" type="submit">Сохранить</button>
														</form>
													{{else}}
														<div class="text">
															{{{@global.nl2br(recommendation)}}}
														</div>
													{{/if}}
												{{/each}}
											</div>
											{{#if this.hasPhoto}}
												<div class="pt-20 mt-20 bg-inherit border-top" style="margin-left: 0">
													<div class="row">
														<div class="col-md-5">
															<p>Фото до приема</p>
															{{#each photos.before}}
																<div class="row">
																	<div class="col-md-12">
																		<div class="acount__photo">
																			<a class="before-healing__item photo" data-fancybox="event-{{event.id}}" href="{{.src}}" data-caption="Фото до приема:
															{{ @global.utils.formatDate(.date) }}">
																				<div class="healing__date">
																					{{ @global.utils.formatDate(.date) }}
																				</div>
																				<div class="after-healing__photo" style="background-image: url({{.src}})">
																				</div>
																			</a>

																		</div>
																	</div>
																</div>
															{{else}}

															{{/each}}
														</div>
														<div class="col-md-7">
															<p>Фото после приема</p>
															{{#each photos.after}}
																<div class="row">
																	<div class="mt-1 col-md-6">
																		<div class="acount__photo">
																			<a class="after-healing__item photo" data-fancybox="event-{{event.id}}" href="{{.src}}" data-caption="Фото после приема:
															{{ @global.utils.formatDate(.date) }}">
																				<div class="healing__date">{{ @global.utils.formatDate(.date) }}</div>
																				<div class="after-healing__photo" style="background-image: url({{.src}})">
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
											{{#if this.type == 'online'}}
												<div class="pt-20 mb-20 account-events__btns border-top">
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
										</div>
									</div>
								</div>
							{{/each}}
						</div>
					{{/if}}

					<div class="account__history data-tab-wrapper" data-tabs="history">
						<div class="account__tab-items">
							<div class="account__tab-item data-tab-link active" data-tabs="history" data-tab="visits">
								История посещений и приемов
							</div>
							<div class="account__tab-item data-tab-link" data-tabs="history" data-tab="longterm">
								Продолжительное лечение
							</div>
						</div>
						<div class="account__tab data-tab-item active" data-tab="visits">
							<div class="account__table">
								<div class="account__table-head status-cancel_noreason">
									<div class="history-item">Дата</div>
									<div class="history-item">Время</div>
									<div class="w-10 history-item">Специалисты</div>
									<div class="history-item">Услуги</div>
									<div class="history-item">Анализы</div>
									<div class="accardeon__click"></div>
								</div>
								<div class="account__table-body">
									{{#each history.events as event}}
										<div class="acount__table-accardeon accardeon status-cancel_noreason" data-record_id="{{this.id}}">
											<div class="acount__table-main accardeon__main">
												<div class="history-item">
													<p>Дата</p>
													{{ @global.utils.formatDate(.event_date) }}
												</div>
												<div class="history-item">
													<p>Время</p>
													{{this.event_time_start}} - {{this.event_time_end}}
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
													{{/services}}{{#if consultation}}
														{{ @global.catalog.spec_service.consultations[type][consultation].header }}<br>
													{{/if}}
												</div>
												<div class="history-item">
													<p>Анализы</p>
													{{#if this.analyses}}
														Есть анализы
													{{else}}
														Нет анализов
													{{/if}}
												</div>
												<div class="accardeon__click"></div>
											</div>
											<div class="pt-1 acount__table-list accardeon__list" style="padding-bottom: 16px;">

												<div class="admin-editor__patient" style="width:62%">
													<div class="mb-10 text-bold">Выбраны услуги</div>
													{{#if this.consultation}}
														<div class="search__drop-item selected-consultation" style="display:flex;">

															<div class="pl-0 search__drop-name consultation-header">
																<span>
																	{{@global.catalog.spec_service.consultations[this.type][this.consultation].header}}
																</span>
															</div>
															<div class="search__drop-right">
																<div class="search__drop-summ consultation-price">

																</div>
															</div>
														</div>
													{{/if}}

													{{#each this.service_prices: idx, key}}
														<div class="search__drop-item services selected">
															<div class="pl-0 search__drop-name">
																<div class="search__drop-tags">
																	{{#each catalog.servicePrices[service_id+'-'+this.price_id].tags}}
																		<div class="search__drop-tag --{{.color}}">{{this.tag}}</div>
																	{{/each}}
																</div>
																{{name}}
															</div>
															<label class="search__drop-right">
																<div class="search__drop-summ"></div>
															</label>
														</div>
													{{/each}}
												</div>
												{{#this.comment_for_expert}}
													<div class="pt-20 mb-20 analysis__description comment_for_expert" style="width:100%">
														<div class="account-edit__title">
															<p>Комментарий администратора</p>
														</div>
														<div class="m-0 mt-20 text-justify text"> {{{@global.nl2br(.comment_for_expert)}}}</div>
													</div>
												{{/this.comment_for_expert}}
												{{#if this.analyses}}
													<div class="pt-20 mb-20 account-edit__title">
														<a class="btn btn--white btn--compact" href="{{this.analyses}}" target="_blank">
															Скачать анализы
														</a>
													</div>
												{{/if}}
												<div class="pt-20 mb-20 account-edit" style="width: 100%">
													<div class="account-edit__title">
														<p>Рекомендация врача</p>
													</div>
													{{#each experts}}
														{{#if this == user.id}}
															<form class="pt-0 profile-edit active" on-submit="saveRecommendation" data-id="{{event.id}}">
																<textarea class="account-edit__textarea" style="border-color:#777" id="{{event.id}}--recommendation" name="recommendation">{{event.recommendation}}</textarea>

																<button class="btn btn--white" type="submit">Сохранить</button>
															</form>
														{{else}}
															<div class="text">
																{{{@global.nl2br(event.recommendation)}}}
															</div>
														{{/if}}
													{{/each}}
												</div>
												{{#if this.hasPhoto}}
													<div class="pt-20 mt-20 bg-inherit border-top" style="margin-left: 0">
														<div class="row">
															<div class="col-md-5">
																<p>Фото до приема</p>
																{{#each photos.before}}
																	<div class="row">
																		<div class="col-md-12">
																			<div class="acount__photo">
																				<a class="before-healing__item photo" data-fancybox="event-{{event.id}}" href="{{.src}}" data-caption="Фото до приема,
															{{ @global.utils.formatDate(.date) }}">
																					<div class="healing__date">
																						{{ @global.utils.formatDate(.date) }}
																					</div>
																					<div class="after-healing__photo" style="background-image: url({{.src}})">
																					</div>
																				</a>

																			</div>
																		</div>
																	</div>
																{{else}}

																{{/each}}
															</div>
															<div class="col-md-7">
																<p>Фото после приема</p>
																{{#each photos.after}}
																	<div class="row">
																		<div class="mt-1 col-md-6">
																			<div class="acount__photo">
																				<a class="after-healing__item photo" data-fancybox="event-{{event.id}}" href="{{.src}}" data-caption="Фото после приема,
															{{ @global.utils.formatDate(.date) }}">
																					<div class="healing__date">{{ @global.utils.formatDate(.date) }}</div>
																					<div class="after-healing__photo" style="background-image: url({{.src}})">
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
										{{elseif ready}}
										<div class="acount__table-accardeon accardeon">
											<div class="acount__table-main accardeon__main">
												Нет записей о посещении
											</div>
										</div>
									{{else}}
										<div class="acount__table-accardeon accardeon">
											<span>Подождите, идет загрузка..</span>
											{{ready}}
										</div>
									{{/each}}
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
															<div class="mb-20 text-bold text-big">
																Фото до начала лечения
															</div>
															{{#each this.photos.before}} <!--single photo!-->
																<a class="before-healing photo" data-fancybox="images-{{event.id}}" href="{{.src}}" data-caption="Фото до начала лечения, {{ @global.utils.formatDate(.date) }}">
																	<h2 class="h2 healing__date-title">
																		{{ @global.utils.formatDateAdv(.date) }}
																	</h2>
																	<div class="before-healing__photo" style="background-image: url('{{.src}}')">
																	</div>
																</a>
															{{/each}}
														</div>
														<div class="col-md-7">
															<div class="mb-20 text-bold text-big">
																Фото после начала лечения
															</div>
															<div class="after-healing">
																<h2 class="h2 healing__date-title d-none month-header"></h2>
																<div class="row">
																	{{#each this.photos.after}}
																		<div class="col-md-6">
																			<a class="after-healing__item photo" data-fancybox="images-{{event.id}}" href="{{.src}}" data-caption="Фото после начала лечения, {{ @global.utils.formatDate(.date) }}">
																				<h2 class="h2 healing__date-title">
																					{{ @global.utils.formatDateAdv(.date) }}
																				</h2>
																				<div class="after-healing__photo" style="background-image: url({{.src}});">
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
					</div>
				</div>
			{{/with}}
		</template>
		<script wbapp>
			$(document).on('cabinet-db-ready', function() {
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
				var page;
				utils.api.get('/api/v2/read/users/' + client_id).then(function(client) {
					page = new Ractive({
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
							history: {
								'events': [],
								'longterms': []
							},
							ready: false,
							longterms_ready: false
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
								const _id = $(ev.node).data('id');
								const _recommendation = $('#' + _id + '--recommendation').val();

								utils.api.get('/api/v2/read/records/' + _id).then(function(data) {
									var prev_recommendation = data.recommendation;

									utils.api.post('/api/v2/update/records/' + _id, {
										'recommendation': _recommendation
									}).then(function(res) {
										if (_recommendation !== prev_recommendation) {
											utils.api.post('/api/v2/create/record-changes/', {
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
					load();
				});
				window.load = function() {
					utils.api.get(
							'/api/v2/list/records?group=events&status=[upcoming,past]' +
							'&client=' + client_id +
							'&@sort=event_date:d')
						.then(function(records) {
							console.log(records);
							page.set('ready', true);

							if (!records) {
								return;
							}
							let curr_timestamp = parseInt(getdate()[0]);
							records.forEach(function(rec, idx) {
								if (rec.status === 'past') {
									page.push('history.events', rec);
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
								let event_to_timestamp = utils.timestamp(
									rec.event_date + ' ' + rec.event_time_end);

								if (event_from_timestamp < curr_timestamp && event_to_timestamp >= curr_timestamp) {
									page.push('events.current', rec);
								} else {
									page.push('events.upcoming', rec);
								}
							});

							console.log('!!!!');
						});
					/*!!! check & sync updates by interval (1-3min) !!!*/
					utils.api.get("/api/v2/list/records?group=longterms&@sort=_created:d&client=" + client_id)
						.then(function(records) {
							console.log(records);

							page.set('history.longterms', records);
							page.set('longterms_ready', true); /* get actually user next events */
							$("img[data-src]:not([src])").lazyload();
							console.log('!!!');
						});
				};
			});
		</script>
	</div>
	<div>
		<wb-module wb="module=yonger&mode=render&view=footer" />
	</div>


</body>
<wb-jq wb="$dom->find('script:not([src]):not([type])')->attr('type','wbapp');" />
<wb-jq wb="$dom->find('.content-wrap ul')->addClass('ul-line');" />

</html>