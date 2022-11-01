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
	<main class="page" data-barba="container" data-barba-namespace="lk-cabinet">
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
							<input class="search__input" type="text" name="q" placeholder="Поиск" value="{{_route.params.q}}">
						</div>
						<button class="btn btn--black">Найти</button>
					</div>
				</div>
			</form>

			<div class="search-result" wb-off>
				<div class="container">
					<div class="loading-overlay">
						<div class="loader"></div>
					</div>
				</div>
			</div>
		</div>
	</main>
</div>

<template id="search-result">
	<div class="lk-title">Результаты поиска</div>
	{{#each results}}
	<div class="account__panel">
		<div class="account__info">
			<div class="user">
				<div class="user__name">{{this.fullname}}</div>
				<div class="user__item">Дата рождения:
					<span>{{ @global.utils.formatDate(this.birthdate) }}</span>
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
		<a class="account__detail" data-client="[[id]]">
			Подробнее
		</a>
	</div>
	{{elseif ready}}
	<div class="account__panel">
		<span>Ничего не найдено. Измените запрос и повторите поиск</span>
	</div>
	{{else}}
	<div class="account__panel">
		<span>Подождите, идет поиск..</span>
	</div>
	{{/each}}
</template>
<script wbapp>
	var q = '{{_route.params.q}}';
	$(document).on('cabinet-db-ready', function () {
		window.page = new Ractive({
			el: 'main.page .search-result .container',
			template: wbapp.tpl('#search-result').html,
			data: {
				q: '{{_route.params.q}}',
				user: wbapp._session.user,
				results: {},
				ready: false
			},
			on: {
				complete(ev) {
					$('main.page .loading-overlay').remove();
				},
				createEvent(ev, client) {
					console.log('createEvent', client);

					var editor = window.popupEvent(client, null, function(data){
						console.log(client, data);
						toast('Запись на прием успешно создана!');
						editor.close();
					});
				},
				createLongterm(ev, client) {
					console.log('createLongterm', client);

					var popup_createLongerm = new Ractive({
						el: '.popup.--longterm',
						template: wbapp.tpl('#popupLongterm').html,
						data: {
							client: client,
							record: false,
							'experts': catalog.experts,
							'categories': catalog.categories,
							'services': catalog.services
						},
						on: {
							complete() {
								initServicesSearch($('.search-services'), catalog.servicesList);
								initPlugins();
								$(this.el).show();
							},
							submit(ev) {
								let $form = $(ev.node);
								let uid   = this.get('client.id');

								if ($form.verify() && uid > '') {
									var form_data = $form.serializeJSON();

									form_data.group      = 'longterms';
									form_data.status     = '';
									form_data.pay_status = 'free';

									form_data.analyses = false;
									form_data.photos   = {before: [], after: []};

									form_data.client   = uid;
									form_data.priority = 0;
									form_data.marked   = 0;

									form_data.recommendation = '';
									form_data.description    = '';

									form_data.price  = 0;
									var _photo_group = form_data.photo_group || 'before';
									delete form_data.photo_group;

									uploadFile(
										$form.find('input[name="file"]')[0],
										'record/photos/longterms',
										Date.now() + '_' + utils.getRandomStr(4),
										function (photo) {
											if (photo.error) {
												toast_error(photo.error);
												return false;
											}

											var _photo_data   = {
												src: photo.uri,
												filename: photo.filename,
												comment: form_data.comment,
												date: form_data.event_date,
												timestamp: utils.timestamp(form_data.event_date),
												photo_group: _photo_group
											};
											form_data.comment = '';
											form_data.photos[_photo_group].push(_photo_data);

											utils.api.post('/api/v2/create/records/', form_data).then(
												function (longterm_record) {
												});
										});

								}
								return false;

							}
						}
					});
				}
			}
		});
		var search = function() {
			var loaded = 0;
			page.set('ready', false);
			utils.api.get('/api/v2/list/users?active=on&role=client&phone~=' + q).then(function (data) {
				if (!!data) {
					data.forEach(function (user, i) {
						page.set('results.' + user.id, user);
					});
				}

				loaded++;
				if (loaded > 2) {
					page.set('ready', true);
				}
			});
			utils.api.get('/api/v2/list/users?active=on&role=client&email~=' + q).then(function (data) {
				if (!!data) {
					data.forEach(function (user, i) {
						page.set('results.' + user.id, user);
					});
				}

				loaded++;
				if (loaded > 2) {
					page.set('ready', true);
				}
			});
			utils.api.get('/api/v2/list/users?active=on&role=client&fullname~=' + q).then(function (data) {
				if (!!data) {
					data.forEach(function (user, i) {
						page.set('results.' + user.id, user);
					});
				}

				loaded++;
				if (loaded > 2) {
					page.set('ready', true);
				}
			});
		};

		setTimeout(function () {
			search();
		});
	});
</script>

<div>
	<wb-module wb="module=yonger&mode=render&view=footer"/>
</div>

</body>
<wb-jq wb="$dom->find('script:not([src]):not([type])')->attr('type','wbapp');"/>
<wb-jq wb="$dom->find('.content-wrap ul')->addClass('ul-line');"/>

</html>