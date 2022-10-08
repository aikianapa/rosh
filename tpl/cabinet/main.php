<!DOCTYPE html>
<html class="no-js" lang="ru">
<head>
	<title seo>Личный кабинет</title>
</head>

<body class="body lk-cabinet" data-barba="wrapper">
<div class="scroll-container" data-scroll-container>
	<div>
		<wb-module wb="module=yonger&mode=render&view=header"></wb-module>
	</div>
	<main class="page" data-barba="container" data-barba-namespace="cabinet" wb-off>
		<div class="account admin">
			<form class="search">
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
							<h1 class="h1 mb-10">Кабинет администратора </h1>
						</div>
						<a class="btn btn--black --openpopup" data-popup="--create"
							on-click="@.newClient">Создать карточку пациента</a>
					</div>
					<div class="search__block --flex --aicn">
						<div class="input">
							<input class="search__input" type="text" placeholder="Поиск">
						</div>
						<button class="btn btn--white">Найти</button>
					</div>
				</div>
			</form>

			<div class="container data-tab-wrapper" data-tabs="lk-leads">
				<div class="account__tab-items">
					<div class="account__tab-item data-tab-link active" data-tab="leads" data-tabs="lk-leads">Заявки</div>
					<div class="account__tab-item data-tab-link" data-tab="events" data-tabs="lk-leads">События</div>
					<div class="buttons">
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

				<template id="editProfile">
					<form class="profile-editor">
						<input type="hidden" value="{{ id }}">
						<p class="text-bold mb-30">Редактировать профиль</p>
						<div class="row profile-edit__wrap">
							<div class="col-md-3">
								<div class="input input--grey">
									<input class="input__control datebirthdaypickr" name="birthdate" value="{{ birthdate }}" type="text" placeholder="Дата рождения">
									<div class="input__placeholder input__placeholder--dark">Дата рождения</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="input input--grey">
									<input class="input__control" type="tel" name="phone" value="+{{ phone }}" placeholder="Телефон" data-inputmask="'mask': '+7 (999) 999-99-99'">
									<div class="input__placeholder input__placeholder--dark">Телефон</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="input input--grey">
									<input class="input__control" type="email" name="email" value="{{ email }}" placeholder="E-mail">
									<div class="input__placeholder input__placeholder--dark">E-mail</div>
								</div>
							</div>
							<div class="col-md-2">
								<button class="btn btn--white profile-edit__submit" type="button" on-click="save">Сохранить</button>
							</div>
						</div>

						<p class="text-bold mb-30 delivery-address">Адрес доставки</p>
						<div class="row profile-edit__wrap">
							<div class="col-md-9">
								<div class="row">
									<div class="col-md-4">
										<div class="input input--grey">
											<input class="input__control" type="text" name="country" value="{{ country }}" placeholder="Страна">
											<div class="input__placeholder input__placeholder--dark">Страна</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="input input--grey">
											<input class="input__control" type="text" name="city" value="{{ city }}" placeholder="Город">
											<div class="input__placeholder input__placeholder--dark">Город</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="input input--grey">
											<input class="input__control" type="text" name="address" value="{{ address }}" placeholder="Улица и дом">
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
								<button class="btn btn--white profile-edit__submit" type="button" on-click="save">Сохранить</button>
							</div>
						</div>
					</form>
				</template>
				<template id="editStatus">
					<div class="select-form">
						<div class="select pay">
							<div class="select__main">Статус оплаты</div>
							<div class="select__list">
								<input type="hidden" name="pay_status" value="{{ pay_status }}">
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
								<input type="hidden" class="status" name="status" value="{{ status }}">
								<input type="hidden" class="group" name="group" value="{{ group }}">
								{{#each catalog.quoteStatus}}
								{{#if id == 'delimiter'}}
								<div class="select__delimiter" disabled></div>
								{{else}}
								<div class="select__item select__item--acc-{{color}}" 
									data-id="{{ id }}" data-group="{{ type }}"
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
				<template id="editQuote">
					<form class="quote-edit">
						<div class="row">
							<div class="col-md-7">
								<div class="lk-title">Редактировать заявку</div>
								<input type="hidden" value="{{ quote.id }}" name="id">
								{{#if this.spec_service}}
								<input type="hidden" name="spec_service" value="{{this.spec_service}}">
								<input type="hidden" name="title" value="{{catalog.spec_service[this.spec_service].header}}">
								{{else}}
								<div class="admin-editor__event mb-20">
									<div class="search__block --flex --aicn">
										<div class="input">
											<input class="popup-services-list" type="text" placeholder="Поиск по услугам" autocomplete="off">
											<div class="search__drop">
											</div>
											<button class="search__btn" type="button">
												<svg class="svgsprite _search">
													<use xlink:href="assets/img/sprites/svgsprites.svg#search"></use>
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
										{{#each catalog.quoteType as item}}
										<label class="text-radio">
											{{#if item.id == quote.type }}
											<input type="radio" name="type" value="{{ item.id }}" checked>
											<span>{{item.name}}</span>
											{{else}}
											<input type="radio" name="type" value="{{ item.id }}">
											<span>{{item.name}}</span>
											{{/if}}
										</label>
										{{/each}}
									</div>
									<div class="row">
										{{#if this.spec_service}}
										
										{{else}}
										<div class="col-md-6">
											<div class="select-form select-checkboxes">
												<div class="select has-values">
													<div class="select__main">
														<div class="select__placeholder">Выберите специалиста</div>
														<div class="select__values"></div>
													</div>
													<div class="select__list" multiple value="{{catalog.experts}}">
														{{#each catalog.experts}}
														<div class="select__item select__item--checkbox">
															<label class="checkbox checkbox--record">
																<input type="checkbox" name="experts[]" value="{{id}}"
																	{{#if id == 'id6304998b114d'}}checked{{/if}}>
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
										<div class="col-md-4">
											<div class="input input-lk-calendar input--grey">
												<input class="input__control datetimepickr"
													name="event_datetime" value="{{event_datetime}}"
													type="text" placeholder="Выбрать дату и время">
												<div class="input__placeholder">Выбрать дату и время</div>
											</div>
										</div>
										<div class="col-md-2">
											<div class="input input-lk-calendar input--grey">
												<input class="input__control datetimepickr"
													name="event_duration" value="{{event_duration}}"
													type="text" placeholder="Продолжительность">
												<div class="input__placeholder">Продолжительность (часов)</div>
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
												<div class="search__drop-summ">{{catalog.spec_service[this.spec_service].price}} ₽</div>
											</div>
										</div
									{{else}}
										{{#each quote.service_prices: idx, key}}
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
												<div class="search__drop-summ">{{price}} ₽</div>
											</div>
										</div>
										{{/each}}
									{{/if}}
								</div>

								<div class="admin-editor__summ">
									<p>Всего</p>
									<input type="hidden" name="price" value="{{quote.price}}">
									<p class="price">{{quote.price}} ₽</p>
								</div>

								<button class="btn btn--white" on-click="save">Сохранить</button>
							</div>
							<div class="col-md-1"></div>
							<div class="col-md-4 --jcfe --flex">
								<textarea class="admin__editor-textarea" name="comment" placeholder="Добавить комментарий">{{quote.comment}}</textarea>
							</div>
						</div>
					</form>
				</template>

				<div class="account__tab data-tab-item active" data-tab="leads">
					<template id="leadsList">
						<div class="account-scroll">
							<div class="account__table">
								<div class="account__table-head">
									<div class="admin-events-item">
										<button class="flag-date__ico">
											<svg class="svgsprite _flag">
												<use xlink:href="/assets/img/sprites/svgsprites.svg#flag"></use>
											</svg>
										</button>
										<span>Заявка</span>
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
									{{#each result}}
									<div class="acount__table-accardeon accardeon --yellow acount__table-accardeon--pmin" data-id="{{id}}" data-priority="{{priority}}">
										<div class="acount__table-main accardeon__main acount__table-auto">
											<div class="admin-events-item heap">
												<div class="accardeon__click" data-id="{{id}}" on-click="editQuote"></div>
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

													{{#if marked == '1' }}
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
												<span class="dt">22.10.2022 <br>11:00</span>
											</div>
											<div class="admin-events-item">
												<p>ФИО</p><a href="#">{{clientData.fullname}}</a>
											</div>
											<div class="admin-events-item">
												<p>Телефон</p>{{clientData.phone}}
											</div>
											<div class="admin-events-item">
												<p>Специалист</p>
												Иванов Иван Алексеевич
											</div>
											<div class="admin-events-item">
												<p>Тип</p>
												{{#each catalog.quoteType as item}}
												{{#if item.id == type }}{{item.name}}{{/if}}
												{{/each}}
											</div>
											<div class="admin-events-item">
												<p>Услуга</p>
												{{#each services}}
												<div>{{name}}</div>
												{{/each}}
											</div>
											<div class="admin-events-item">
												<p>Оплата</p>
												{{#each catalog.quotePay as item}}
												{{#if item.id == pay_status }}{{item.name}}{{/if}}
												{{/each}}
											</div>
											<div class="admin-events-item">
												<p>Статус</p>
												{{#each catalog.quoteStatus as item}}
												{{#if item.id == status }}{{item.name}}{{/if}}
												{{/each}}
											</div>
											<div class="admin-events-item">
												<p>Комментарии</p>{{comment}}
											</div>
										</div>
										<div class="acount__table-list accardeon__list admin-editor">
											<div class="admin-editor__top">
												<div class="admin-editor__top-info">
													<div class="lk-title">Редактировать профиль</div>
													<div class="admin-editor__name user__edit">{{clientData.fullname}}
														<button class="user__edit" on-click="editProfile" data-id="{{client}}">
															<svg class="svgsprite _edit">
																<use xlink:href="/assets/img/sprites/svgsprites.svg#edit"></use>
															</svg>
														</button>
													</div>
													<div class="admin-editor__iser-contacts">
														<p>Дата рождения:
															<span>{{clientData.birthdate}}</span>
														</p>
														<p>Телефон:
															<span>{{clientData.phone}}</span>
														</p>
													</div>
												</div>
												<div class="admin-editor__top-status">
													<div class="admin-editor__top-date">Заявка сформирована {{date}} / {{time}}</div>
													<div class="admin-editor__top-select">

													</div>
												</div>
											</div>
											<div class="admin-editor__edit-profile">

											</div>
											<div class="admin-editor__events">

											</div>
										</div>
									</div>
									{{/each}}
								</div>
							</div>
						</div>
					</template>
				</div>
				<div class="account__tab data-tab-item" data-tab="events">
					<template id="eventsList">
						<div class="account-scroll">
							<div class="account__table">
								<div class="account__table-head">
									<div class="admin-events-item">
										<button class="flag-date__ico">
											<svg class="svgsprite _flag">
												<use xlink:href="/assets/img/sprites/svgsprites.svg#flag"></use>
											</svg>
										</button>
										<span>Событие</span>
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
									{{#each result}}
									<div class="acount__table-accardeon accardeon --yellow acount__table-accardeon--pmin" data-id="{{id}}" data-priority="{{priority}}">
										<div class="acount__table-main accardeon__main acount__table-auto">
											<div class="admin-events-item heap">
												<div class="accardeon__click" data-id="{{id}}" on-click="editQuote"></div>
												<div class="flag-date">
													{{#if priority}}
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

													{{#if marked == '1' }}
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
												<span class="dt">{{event_date}} <br>{{event_time}}</span>
											</div>
											<div class="admin-events-item">
												<p>ФИО</p><a href="#">{{clientData.fullname}}</a>
											</div>
											<div class="admin-events-item">
												<p>Телефон</p>{{clientData.phone}}
											</div>
											<div class="admin-events-item">
												<p>Специалист</p>
												{{expert}}
											</div>
											<div class="admin-events-item">
												<p>Тип</p>
												{{#each catalog.quoteType as item}}
												{{#if item.id == type }}{{item.name}}{{/if}}
												{{/each}}
											</div>
											<div class="admin-events-item">
												<p>Услуга</p>
												{{#each services}}
												<div>{{name}}</div>
												{{/each}}
											</div>
											<div class="admin-events-item">
												<p>Оплата</p>
												{{#each catalog.quotePay as item}}
												{{#if item.id == pay_status }}{{item.name}}{{/if}}
												{{/each}}
											</div>
											<div class="admin-events-item">
												<p>Статус</p>
												{{#each catalog.quoteStatus as item}}
												{{#if item.id == status }}{{item.name}}{{/if}}
												{{/each}}
											</div>
											<div class="admin-events-item">
												<p>Комментарии</p>{{comment}}
											</div>
										</div>
										<div class="acount__table-list accardeon__list admin-editor">
											<div class="admin-editor__top">
												<div class="admin-editor__top-info">
													<div class="lk-title">Редактировать профиль</div>
													<div class="admin-editor__name user__edit">{{clientData.fullname}}
														<button class="user__edit" on-click="editProfile" data-id="{{client}}">
															<svg class="svgsprite _edit">
																<use xlink:href="/assets/img/sprites/svgsprites.svg#edit"></use>
															</svg>
														</button>
													</div>
													<div class="admin-editor__iser-contacts">
														<p>Дата рождения:
															<span>{{clientData.birthdate}}</span>
														</p>
														<p>Телефон:
															<span>{{clientData.phone}}</span>
														</p>
													</div>
												</div>
												<div class="admin-editor__top-status">
													<div class="admin-editor__top-date">Заявка сформирована {{date}} / {{time}}</div>
													<div class="admin-editor__top-select">
													</div>
												</div>
											</div>
											<div class="admin-editor__edit-profile">

											</div>
											<div class="admin-editor__events">

											</div>
										</div>
									</div>
									{{/each}}
									<div class="acount__table-accardeon accardeon --green acount__table-accardeon--pmin">
										<div class="acount__table-main accardeon__main acount__table-auto">
											<div class="admin-events-item heap">
												<div class="accardeon__click"></div>
												<div class="flag-date">
													<label class="checkbox">
														<input type="checkbox">
														<span></span>
													</label>
													<button class="flag-date__ico checked">
														<svg class="svgsprite _flag">
															<use xlink:href="assets/img/sprites/svgsprites.svg#flag"></use>
														</svg>
													</button>
													<span class="dt"><strong class="title">Событие: </strong>13.09.2022
														<br>14:33
													</span>
												</div>
											</div>
											<div class="admin-events-item">
												<p>Приём</p>
												<span class="dt">16.09.2022 <br>9:00</span>
											</div>
											<div class="admin-events-item">
												<p>ФИО</p><a href="#">Client Rosh</a>
											</div>
											<div class="admin-events-item">
												<p>Телефон</p>+33333333323
											</div>
											<div class="admin-events-item">
												<p>Специалист</p>Иванов Иван Алексеевич
											</div>
											<div class="admin-events-item">
												<p>Тип</p>В клинике
											</div>
											<div class="admin-events-item">
												<p>Услуга</p>Прием (осмотр, диагностика, консультация) врача - первичный (включает составление плана лечения)
											</div>
											<div class="admin-events-item">
												<p>Оплата</p>Есть предоплата
											</div>
											<div class="admin-events-item">
												<p>Статус</p>Состоявшееся событие
											</div>
											<div class="admin-events-item">
												<p>Комментарии</p>Test text comment
											</div>
										</div>
										<div class="acount__table-list accardeon__list admin-editor">
											<div class="admin-editor__top">
												<div class="admin-editor__top-info">
													<div class="lk-title">Редактировать профиль</div>
													<div class="admin-editor__name user__edit">Client Rosh
														<button class="user__edit">
															<svg class="svgsprite _edit">
																<use xlink:href="assets/img/sprites/svgsprites.svg#edit"></use>
															</svg>
														</button>
													</div>
													<div class="admin-editor__iser-contacts">
														<p>Дата рождения:
															<span>22.12.1988</span>
														</p>
														<p>Телефон:
															<span>+33333333323</span>
														</p>
													</div>
												</div>
												<div class="admin-editor__top-status">
													<div class="admin-editor__top-date">Заявка сформирована 16.09.2022 / 11:45</div>
													<div class="admin-editor__top-select">
														<div class="select-form">
															<div class="select">
																<div class="select__main">Есть предоплата</div>
																<div class="select__list">
																	<div class="select__item">Есть предоплата</div>
																	<div class="select__item">Не оплачено</div>
																	<div class="select__item">Не требует оплаты</div>
																</div>
															</div>
														</div>

														<div class="select-form">
															<div class="select">
																<div class="select__main">Состоявшееся событие</div>
																<div class="select__list">
																	<div class="select__item select__item--acc-yellow">Необработанная заявка</div>
																	<div class="select__item select__item--acc-red">Не дозвонился</div>
																	<div class="select__item select__item--acc-purple">Отложенный звонок</div>
																	<div class="select__delimiter"></div>
																	<div class="select__item select__item--acc-yellow">Предстоящее событие</div>
																	<div class="select__item select__item--acc-green">Состоявшееся событие</div>
																	<div class="select__item select__item--acc-blue">Отмена визита (дорого)</div>
																	<div class="select__item select__item--acc-light-blue">Отмена визита (подумаем)</div>
																	<div class="select__item select__item--acc-ocean">Отмена визита (без причины)</div>
																</div>
															</div>
														</div>

													</div>
												</div>
											</div>
											<div class="admin-editor__edit-profile">
												<form class="profile-edit">
													<p class="text-bold mb-30">Редактировать профиль</p>
													<div class="row profile-edit__wrap">
														<div class="col-md-3">
															<div class="input input--grey">
																<input class="input__control datebirthdaypickr" type="text" placeholder="Дата рождения" value="16.05.1975">
																<div class="input__placeholder input__placeholder--dark">Дата рождения</div>
															</div>
														</div>
														<div class="col-md-3">
															<div class="input input--grey">
																<input class="input__control" type="tel" placeholder="Телефон" data-inputmask="'mask': '+7 (999) 999-99-99'" inputmode="text" value="+3 (333) 333-33-33">
																<div class="input__placeholder input__placeholder--dark">Телефон</div>
															</div>
														</div>
														<div class="col-md-3">
															<div class="input input--grey">
																<input class="input__control" type="email" placeholder="E-mail" value="ivanov@rosh.ru">
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
																<div class="col-md-4">
																	<div class="input input--grey">
																		<input class="input__control" type="text" placeholder="Страна">
																		<div class="input__placeholder input__placeholder--dark">Страна</div>
																	</div>
																</div>
																<div class="col-md-4">
																	<div class="input input--grey">
																		<input class="input__control" type="text" placeholder="Город">
																		<div class="input__placeholder input__placeholder--dark">Город</div>
																	</div>
																</div>
																<div class="col-md-4">
																	<div class="input input--grey">
																		<input class="input__control" type="text" placeholder="Улица и дом">
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
																		<input class="input__control" type="text" placeholder="Кв./офис">
																		<div class="input__placeholder input__placeholder--dark">Кв./офис</div>
																	</div>
																</div>
																<div class="col-md-3">
																	<div class="input input--grey">
																		<input class="input__control" type="text" placeholder="Домофон">
																		<div class="input__placeholder input__placeholder--dark">Домофон</div>
																	</div>
																</div>
																<div class="col-md-3">
																	<div class="input input--grey">
																		<input class="input__control" type="text" placeholder="Подъезд" value="2">
																		<div class="input__placeholder input__placeholder--dark">Подъезд</div>
																	</div>
																</div>
																<div class="col-md-3">
																	<div class="input input--grey">
																		<input class="input__control" type="text" placeholder="Этаж" value="3">
																		<div class="input__placeholder input__placeholder--dark">Этаж</div>
																	</div>
																</div>
															</div>
														</div>
														<div class="col-md-2">
															<button class="btn btn--white profile-edit__submit">Сохранить</button>
														</div>
													</div>
												</form>
											</div>
											<div class="admin-editor__events">
												<div class="row">
													<div class="col-md-7">
														<div class="lk-title">Редактировать событие</div>
														<div class="admin-editor__event mb-20">
															<div class="search__block --flex --aicn">
																<div class="input">
																	<input class="search__input" type="text" placeholder="Поиск">
																</div>
															</div>
														</div>

														<div class="admin-editor__type-event">
															<p class="mb-10">Тип события</p>
															<div class="text-radios">
																<label class="text-radio">
																	<input type="radio" name="status" checked>
																	<span>В клинике</span>
																</label>
																<label class="text-radio">
																	<input type="radio" name="status">
																	<span>Онлайн</span>
																</label>
															</div>
															<div class="row">
																<div class="col-md-6">
																	<div class="select-form select-checkboxes">
																		<div class="select has-values">
																			<div class="select__main">
																				<div class="select__placeholder">Выберите специалиста</div>
																				<div class="select__values">Иванов Иван Алексеевич</div>
																			</div>
																			<div class="select__list">
																				<div class="select__item select__item--checkbox">
																					<label class="checkbox checkbox--record">
																						<input type="checkbox" checked>
																						<span></span>
																						<div class="checbox__name">
																							<div class="select__name">Иванов Иван Алексеевич</div>
																						</div>
																					</label>
																				</div>
																				<div class="select__item select__item--checkbox">
																					<label class="checkbox checkbox--record">
																						<input type="checkbox">
																						<span></span>
																						<div class="checbox__name">
																							<div class="select__name">Хачатурян Любовь Андреева</div>
																						</div>
																					</label>
																				</div>
																			</div>
																		</div>
																	</div>

																</div>
																<div class="col-md-6">
																	<div class="input input-lk-calendar input--grey">
																		<input class="input__control datetimepickr" type="text" placeholder="Выбрать дату и время" value="16.09.2022 08:45">
																		<div class="input__placeholder">Выбрать дату и время</div>
																	</div>
																</div>
															</div>
														</div>
														<div class="admin-editor__patient">
															<div class="lk-title">Выбраны услуги</div>
															<div class="search__drop-item">
																<div class="search__drop-name">
																	<div class="search__drop-delete">
																		<svg class="svgsprite _delete">
																			<use xlink:href="assets/img/sprites/svgsprites.svg#delete"></use>
																		</svg>
																	</div>
																	Прием (осмотр, диагностика, консультация) врача - первичный (включает составление плана лечения)
																</div>
																<label class="search__drop-right">
																	<div class="search__drop-summ">7 000 ₽</div>
																</label>
															</div>
														</div>
														<div class="admin-editor__summ">
															<p>Всего</p>
															<p>7 000 ₽ </p>
														</div>
														<div class="admin-editor__patient mb-40">
															<div class="row acount__photos-wrap mb-20">
																<div class="col-md-6">
																	<div class="acount__photo">
																		<p>Фото до начала лечения</p>
																		<a class="before-healing" href="/uploads/events/before.jpg" data-fancybox="images" data-caption="Фото  до начала лечения, 16.09.2022">
																			<img src="/uploads/events/before2.jpg" alt="">
																		</a>
																	</div>
																</div>
																<div class="col-md-6">
																	<div class="acount__photo">
																		<p>Фото в процессе лечения</p>
																		<a class="after-healing mb-10 d-block" href="/uploads/events/after2-2.jpg" data-fancybox="images" data-caption="Фото в процессе лечения, 18.09.2022">
																			<img src="/uploads/events/after2-2.jpg" alt="">
																		</a>
																		<a class="after-healing mb-10 d-block" href="/uploads/events/after2-3.jpg" data-fancybox="images" data-caption="Фото в процессе лечения, 20.09.2022">
																			<img src="/uploads/events/after2-3.jpg" alt="">
																		</a>
																		<a class="after-healing mb-10 d-none" href="/uploads/events/1657743909553.jpg"
																			data-fancybox="images" data-caption="Фото в процессе лечения, 21.09.2022">
																			<img src="/uploads/events/1657743909553.jpg" alt="">
																		</a>
																	</div>
																</div>
															</div>
															<div class="row acount__photos-wrap">
																<div class="col-md-2">
																	<a class="btn btn--white --openpopup" href="#" data-popup="--photo-profile">Добавить фото</a>
																</div>
															</div>
														</div>
														<button class="btn btn--white">Сохранить</button>
													</div>
													<div class="col-md-1"></div>
													<div class="col-md-4 --jcfe --flex">
														<textarea class="admin__editor-textarea" placeholder="Добавить комментарий"></textarea>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="acount__table-accardeon accardeon --green acount__table-accardeon--pmin">
										<div class="acount__table-main accardeon__main acount__table-auto">
											<div class="admin-events-item heap">
												<div class="accardeon__click"></div>
												<div class="flag-date">
													<label class="checkbox">
														<input type="checkbox">
														<span></span>
													</label>
													<button class="flag-date__ico checked">
														<svg class="svgsprite _flag">
															<use xlink:href="assets/img/sprites/svgsprites.svg#flag"></use>
														</svg>
													</button>
													<span class="dt"><strong class="title">Событие: </strong>13.09.2022
														<br>14:33
													</span>
												</div>
											</div>
											<div class="admin-events-item">
												<p>Приём</p>
												<span class="dt">16.09.2022 <br>9:00</span>
											</div>
											<div class="admin-events-item">
												<p>ФИО</p><a href="/cabinet/client/id6267fa632293">Client Rosh</a>
											</div>
											<div class="admin-events-item">
												<p>Телефон</p>+7 (333) 333-3332
											</div>
											<div class="admin-events-item">
												<p>Специалист</p>Иванов Иван Алексеевич
											</div>
											<div class="admin-events-item">
												<p>Тип</p>В клинике
											</div>
											<div class="admin-events-item">
												<p>Услуга</p>Фотолечение BBL
											</div>
											<div class="admin-events-item">
												<p>Оплата</p>Есть предоплата
											</div>
											<div class="admin-events-item">
												<p>Статус</p>Состоявшееся событие
											</div>
											<div class="admin-events-item">
												<p>Комментарии</p>Test text comment
											</div>
										</div>
										<div class="acount__table-list accardeon__list admin-editor">
											<div class="admin-editor__top">
												<div class="admin-editor__top-info">
													<div class="lk-title">Редактировать профиль</div>
													<div class="admin-editor__name user__edit">Client Rosh
														<button class="user__edit">
															<svg class="svgsprite _edit">
																<use xlink:href="assets/img/sprites/svgsprites.svg#edit"></use>
															</svg>
														</button>
													</div>
													<div class="admin-editor__iser-contacts">
														<p>Дата рождения:
															<span>22.12.1988</span>
														</p>
														<p>Телефон:
															<span>+7 (333) 333-3332</span>
														</p>
													</div>
												</div>
												<div class="admin-editor__top-status">
													<div class="admin-editor__top-date">Заявка сформирована 16.09.2022 / 08:45</div>
													<div class="admin-editor__top-select">
														<div class="select-form">
															<div class="select">
																<div class="select__main">Есть предоплата</div>
																<div class="select__list">
																	<div class="select__item">Есть предоплата</div>
																	<div class="select__item">Не оплачено</div>
																	<div class="select__item">Не требует оплаты</div>
																</div>
															</div>
														</div>

														<div class="select-form">
															<div class="select">
																<div class="select__main">Состоявшееся событие</div>
																<div class="select__list">
																	<div class="select__item select__item--acc-yellow">Необработанная заявка</div>
																	<div class="select__item select__item--acc-red">Не дозвонился</div>
																	<div class="select__item select__item--acc-purple">Отложенный звонок</div>
																	<div class="select__delimiter"></div>
																	<div class="select__item select__item--acc-yellow">Предстоящее событие</div>
																	<div class="select__item select__item--acc-green">Состоявшееся событие</div>
																	<div class="select__item select__item--acc-blue">Отмена визита (дорого)</div>
																	<div class="select__item select__item--acc-light-blue">Отмена визита (подумаем)</div>
																	<div class="select__item select__item--acc-ocean">Отмена визита (без причины)</div>
																</div>
															</div>
														</div>

													</div>
												</div>
											</div>
											<div class="admin-editor__edit-profile">
												<form class="profile-edit">
													<p class="text-bold mb-30">Редактировать профиль</p>
													<div class="row profile-edit__wrap">
														<div class="col-md-3">
															<div class="input input--grey">
																<input class="input__control datebirthdaypickr" type="text" placeholder="Дата рождения" value="16.05.1975">
																<div class="input__placeholder input__placeholder--dark">Дата рождения</div>
															</div>
														</div>
														<div class="col-md-3">
															<div class="input input--grey">
																<input class="input__control" type="tel" placeholder="Телефон" data-inputmask="'mask': '+7 (999) 999-99-99'" inputmode="text" value="+3 (333) 333-33-33">
																<div class="input__placeholder input__placeholder--dark">Телефон</div>
															</div>
														</div>
														<div class="col-md-3">
															<div class="input input--grey">
																<input class="input__control" type="email" placeholder="E-mail" value="ivanov@rosh.ru">
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
																<div class="col-md-4">
																	<div class="input input--grey">
																		<input class="input__control" type="text" placeholder="Страна">
																		<div class="input__placeholder input__placeholder--dark">Страна</div>
																	</div>
																</div>
																<div class="col-md-4">
																	<div class="input input--grey">
																		<input class="input__control" type="text" placeholder="Город">
																		<div class="input__placeholder input__placeholder--dark">Город</div>
																	</div>
																</div>
																<div class="col-md-4">
																	<div class="input input--grey">
																		<input class="input__control" type="text" placeholder="Улица и дом">
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
																		<input class="input__control" type="text" placeholder="Кв./офис">
																		<div class="input__placeholder input__placeholder--dark">Кв./офис</div>
																	</div>
																</div>
																<div class="col-md-3">
																	<div class="input input--grey">
																		<input class="input__control" type="text" placeholder="Домофон">
																		<div class="input__placeholder input__placeholder--dark">Домофон</div>
																	</div>
																</div>
																<div class="col-md-3">
																	<div class="input input--grey">
																		<input class="input__control" type="text" placeholder="Подъезд" value="2">
																		<div class="input__placeholder input__placeholder--dark">Подъезд</div>
																	</div>
																</div>
																<div class="col-md-3">
																	<div class="input input--grey">
																		<input class="input__control" type="text" placeholder="Этаж" value="3">
																		<div class="input__placeholder input__placeholder--dark">Этаж</div>
																	</div>
																</div>
															</div>
														</div>
														<div class="col-md-2">
															<button class="btn btn--white profile-edit__submit">Сохранить</button>
														</div>
													</div>
												</form>
											</div>
											<div class="admin-editor__events">
												<div class="row">
													<div class="col-md-7">
														<div class="lk-title">Редактировать событие</div>
														<div class="admin-editor__event mb-20">
															<div class="search__block --flex --aicn">
																<div class="input">
																	<input class="search__input" type="text" placeholder="Поиск">
																</div>
															</div>
														</div>

														<div class="admin-editor__type-event">
															<p class="mb-10">Тип события</p>
															<div class="text-radios">
																<label class="text-radio">
																	<input type="radio" name="status" checked>
																	<span>В клинике</span>
																</label>
																<label class="text-radio">
																	<input type="radio" name="status">
																	<span>Онлайн</span>
																</label>
															</div>
															<div class="row">
																<div class="col-md-6">
																	<div class="select-form select-checkboxes">
																		<div class="select has-values">
																			<div class="select__main">
																				<div class="select__placeholder">Выберите специалиста</div>
																				<div class="select__values">Иванов Иван Алексеевич</div>
																			</div>
																			<div class="select__list">
																				<div class="select__item select__item--checkbox">
																					<label class="checkbox checkbox--record">
																						<input type="checkbox" checked>
																						<span></span>
																						<div class="checbox__name">
																							<div class="select__name">Иванов Иван Алексеевич</div>
																						</div>
																					</label>
																				</div>
																				<div class="select__item select__item--checkbox">
																					<label class="checkbox checkbox--record">
																						<input type="checkbox">
																						<span></span>
																						<div class="checbox__name">
																							<div class="select__name">Хачатурян Любовь Андреева</div>
																						</div>
																					</label>
																				</div>
																			</div>
																		</div>
																	</div>

																</div>
																<div class="col-md-6">
																	<div class="input input-lk-calendar input--grey">
																		<input class="input__control datetimepickr" type="text" placeholder="Выбрать дату и время" value="16.09.2022 08:45">
																		<div class="input__placeholder">Выбрать дату и время</div>
																	</div>
																</div>
															</div>
														</div>
														<div class="admin-editor__patient">
															<div class="lk-title">Выбраны услуги</div>
															<div class="search__drop-item">
																<div class="search__drop-name">
																	<div class="search__drop-delete">
																		<svg class="svgsprite _delete">
																			<use xlink:href="assets/img/sprites/svgsprites.svg#delete"></use>
																		</svg>
																	</div>
																	Фотолечение BBL
																</div>
																<label class="search__drop-right">
																	<div class="search__drop-summ">3 000 ₽</div>
																</label>
															</div>
														</div>
														<div class="admin-editor__summ">
															<p>Всего</p>
															<p>3 000 ₽ </p>
														</div>
														<div class="admin-editor__patient mb-40">
															<div class="row acount__photos-wrap mb-20">
																<div class="col-md-6">
																	<div class="acount__photo">
																		<p>Фото до начала лечения</p>
																		<a class="before-healing" href="/uploads/events/before.jpg" data-fancybox="images" data-caption="Фото  до начала лечения, 16.09.2022">
																			<img src="/uploads/events/before2.jpg" alt="">
																		</a>
																	</div>
																</div>
																<div class="col-md-6">
																	<div class="acount__photo">
																		<p>Фото в процессе лечения</p>
																		<a class="after-healing mb-10 d-block" href="/uploads/events/after2-2.jpg" data-fancybox="images" data-caption="Фото в процессе лечения, 18.09.2022">
																			<img src="/uploads/events/after2-2.jpg" alt="">
																		</a>
																		<a class="after-healing mb-10 d-block" href="/uploads/events/after2-3.jpg" data-fancybox="images" data-caption="Фото в процессе лечения, 20.09.2022">
																			<img src="/uploads/events/after2-3.jpg" alt="">
																		</a>
																		<a class="after-healing mb-10 d-none" href="/uploads/events/1657743909553.jpg"
																			data-fancybox="images" data-caption="Фото в процессе лечения, 21.09.2022">
																			<img src="/uploads/events/1657743909553.jpg" alt="">
																		</a>
																	</div>
																</div>
															</div>
															<div class="row acount__photos-wrap">
																<div class="col-md-2">
																	<a class="btn btn--white --openpopup" href="#" data-popup="--photo-profile">Добавить фото</a>
																</div>
															</div>
														</div>
														<button class="btn btn--white">Сохранить</button>
													</div>
													<div class="col-md-1"></div>
													<div class="col-md-4 --jcfe --flex">
														<textarea class="admin__editor-textarea" placeholder="Добавить комментарий"></textarea>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</template>

				</div>
			</div>
		</div>
	</main>

	<script wbapp>
		setTimeout(function () {
			let tpl         = wbapp.tpl('#leadsList').html;
			let editProfile = wbapp.tpl('#editProfile').html;
			let editStatus  = wbapp.tpl('#editStatus').html;
			let editQuote   = wbapp.tpl('#editQuote').html;

			let tabLeads    = new Ractive({
				el: '.data-tab-item[data-tab="leads"]',
				template: tpl,
				data: {},
				on: {
					editProfile(ev) {
						let lead   = $(ev.node).parents('.acount__table-accardeon[data-id]').data('id');
						let item   = $(ev.node).data('id');
						let form   = $(ev.node).parents('.admin-editor').find('.admin-editor__edit-profile');
						let editor = new Ractive({
							el: form,
							template: editProfile,
							data: {},
							on: {
								save(ev) {
									let post = $($(ev.node).parents('form')).serializeJSON();
									wbapp.post('/form/users/setClient/' + item, post, function (res) {
										tabLeads.set('result.' + lead + '.clientData', res);
										$(form).html('');
										toast('Успешно сохранено')
									});
								}
							}
						});
						fetch('/form/users/getClient/' + item, {
							method: 'GET'
						}).then((response) => {
							return response.json();
						}).then(function (data) {
							editor.set(data);
							initPlugins();
						});
					},
					editQuote(ev) {
						const _parent          = $(ev.node).parents('.accardeon');
						let lead               = $(ev.node).data('id');
						let quote              = tabLeads.get('result.' + lead);
						if (!quote.total_price){
							quote.total_price = 0;
						}
						quote.total_price_text = numFormaSpace(quote.total_price);
						let statusEdt          = new Ractive({
							el: _parent.find('.admin-editor__top-select'),
							template: editStatus,
							data: {
								catalog: catalog,
								quote: quote
							},
							on: {
								complete() {
									$(statusEdt.find(`.select.status [data-id="${quote.status}"]`)).trigger('click');
									$(statusEdt.find(`.select.pay [data-id="${quote.pay_status}"]`)).trigger('click');
									console.log('status editor ready!', quote);
								},
								save(ev){
									let lead = $(ev.node).parents('.acount__table-accardeon[data-id]').data('id');
									let item = $(ev.node).data('id');
									let form = $(ev.node).parents('.admin-editor');
									$(form).find('.admin-editor__edit-profile').html('');
									let copy = $('<form></form>');
									$(copy).html($(form).clone());
									let post = $(copy).serializeJSON();
									wbapp.post('/api/v2/update/quotes/' + lead, post, function (res) {
										tabLeads.set('results.'+lead, res);

										toast('Успешно сохранено');
									});
									delete copy;
									console.log(post);
								}
							}
						});
						let quoteEdt           = new Ractive({
							el: _parent.find('.admin-editor__events'),
							template: editQuote,
							data: {
								catalog: catalog,
								quote: quote
							},
							on: {
								complete(ev) {
									console.log('quote editor ready!');
									initServicesSearchInput($('.popup-services-list'), servicesList);

									initPlugins();
								},
								save(ev) {
									let post = $($(ev.node).parents('form')).serializeJSON();
									console.log('event data:', post);
									toast('Успешно сохранено');
								}
							}
						});
					}
				}
			});
			let tplEvents   = wbapp.tpl('#eventsList').html;
			let tabEvents   = new Ractive({
				el: '.data-tab-item[data-tab="events"]',
				template: tplEvents,
				data: {},
				on: {
					saveQuote(ev) {
						let lead = $(ev.node).parents('.acount__table-accardeon[data-id]').data('id');

						let form = $(ev.node).parents('.admin-editor');
						$(form).find('.admin-editor__edit-profile').html('');
						let copy = $('<form></form>');
						$(copy).html($(form).clone());
						let post = $(copy).serializeJSON();
						delete copy;
						wbapp.post('/api/v2/update/quotes/' + lead, post, function (res) {
							console.log(res);
							tabEvents.set('result.' + lead, res);

							toast('Успешно сохранено');
						});
						console.log(post);
					},
					editProfile(ev) {
						let lead   = $(ev.node).parents('.acount__table-accardeon[data-id]').data('id');
						let item   = $(ev.node).data('id');
						let form   = $(ev.node).parents('.admin-editor').find('.admin-editor__edit-profile');
						let editor = new Ractive({
							el: form,
							template: editProfile,
							data: {},
							on: {
								complete() {

								},
								save(ev) {
									let post = $($(ev.node).parents('form')).serializeJSON();
									wbapp.post('/form/users/setClient/' + item, post, function (res) {
										tabEvents.set('result.' + lead + '.clientData', res);
										toast('Успешно сохранено');
										$(form).html('');
									});
								}
							}
						});
						fetch('/form/users/getClient/' + item, {
							method: 'GET'
						}).then((response) => {
							return response.json();
						}).then(function (data) {
							editor.set(data);
							form.find('form').show();
							initPlugins();
						});
					},
					editQuoteStatus(ev) {
						let event  = $(ev.node).data('id');
						let quote  = tplEvents.get('result.' + event);
						let status = new Ractive({
							el: $(ev.node).parents('.accardeon').find('.admin-editor__top-select'),
							template: editStatus,
							data: {catalog: catalog},
							on: {
								complete() {
									$(status.find(`.select.status [data-id="${quote.status}"]`)).trigger('click');
									$(status.find(`.select.pay [data-id="${quote.pay_status}"]`)).trigger('click');
								},
								save(ev) {
									let post = $($(ev.node).parents('form')).serializeJSON();
									console.log('event data:', post);
									return false;
								}
							}
						});
					},
					editQuote(ev) {
						let event  = $(ev.node).data('id');
						let form = $(ev.node).parents('.admin-editor').find('.admin-editor__events');
						let quote  = tplEvents.get('result.' + event);
						let editor = new Ractive({
							el: form,
							template: editStatus,
							data: {catalog: catalog},
							on: {
								complete() {
									console.log('editor ready!');
								},
								save(ev) {
									let post = $($(ev.node).parents('form')).serializeJSON();
									console.log('event data:', post);
									return false;
								}
							}
						});
					}
				}
			});

			['/api/v2/list/quotes?status=[new,uncall]&@size=10&@sort=priority:d',
			 '/api/v2/list/quotes?status=!new&@size=10&@sort=priority:d'].forEach(
				function (api_url, i) {
					console.log(i, api_url);

					fetch(api_url, {
						method: 'GET'
					}).then((response) => {
						return response.json();
					}).then(function (data) {
						console.log(data.result);

						data.catalog = catalog;
						if (i === 0) {
							tabLeads.set(data);
						} else {
							tabEvents.set(data);
						}
						//console.log('fill: ', data);
						initPlugins();
					});
				});
		}, 50);
		console.log('loading...');
		$(function () {
			console.log('loaded!');
			$(document).on('click', 'button.flag-date__ico', function (e) {
				e.stopPropagation();
				const _parent    = $(this).parents('.acount__table-accardeon');
				const _id        = _parent.data('id');
				const _is_marked = $(this).hasClass('checked');
				console.log('flagged', _id, _is_marked);
				wbapp.post('/api/v2/update/quotes/' + _id, {marked: _is_marked ? 1 : 0}, function (res) {
					console.log(res);
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

				wbapp.post('/api/v2/update/quotes/' + _id, {priority: _priority}, function (res) {
					console.log(res);
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