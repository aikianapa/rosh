<!DOCTYPE html>
<html class="no-js" lang="ru">
<head>
	<title seo>Кабинет администратора</title>
	<link rel="icon" href="/favicon.svg" type=" image/svg+xml">
	<link rel="stylesheet" href="/assets/css/listnav.css?v=2">
</head>

<body class="body lk-cabinet" data-barba="wrapper">
<div class="scroll-container lk-main" data-scroll-container>
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
							<input class="search__input" type="text" name="q" placeholder=Поиск по пациента" value="{{_route.params.q}}">
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
	<div class="result-list" id="result-list">
		{{#each results: idx}}
		<div class="account__panel" data-orderby="{{this.fullname}}">
			<div class="account__info">
				<div class="user">
					<a class="user__name" data-client="{{.id}}">{{this.fullname}}</a>
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
							onclick="sendRestoreEMail('{{this.email}}');"
							data-email="{{this.email}}">Отправить код восстановления на почту</a>
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
			<div class="admin-edit__user-btns vertical-btns" style="margin-top:0;padding-top: 0">
				<a class="account__detail" data-client="[[id]]">
					Подробнее
				</a>
				<a class="text-danger" on-click="['deleteProfile', this, idx]" style="padding-bottom: 20px;">
					Удалить профиль
				</a>
			</div>
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
	</div>
</template>
<script src='/assets/js/jquery-listnav.js?v=2'></script>

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
				deleteProfile(ev, client, idx){
					if (confirm("Удалить профиль "+client.fullname+" и все записи пациента?") == true) {
						window.api.get('/api/v2/list/records?client='+client.id).then(function (recs){
							if (!!recs){
								recs.forEach(function (rec, i) {
									setTimeout(function () {
										window.api.get('/api/v2/delete/record/' + rec.id);
									});
								});
							}
							window.api.get('/api/v2/delete/users/' + client.id).then(function (){
								toast('Профиль удален!');

								setTimeout(function () {
									search();
								});
							});
						});
					} else {

					}
				},
				createEvent(ev, client) {
					console.log('createEvent', client);

					var editor = window.popupEvent(client, null, function (data) {
						console.log(client, data);
						toast('Запись на прием успешно создана!');
						editor.close();
					});
				},
				createLongterm(ev, client) {
					console.log('createLongterm', client);
					popupLongterm(client, null, function (rec) {
						toast('Запись успешно создана!');
					});
				}
			}
		});
		var result_ready = function (resolved_count) {
			console.log(resolved_count);
			if (resolved_count > 2) {
				page.set('ready', true);

				const _list = $('.search-result .container .result-list');

				_list.find(".account__panel").sort(function (a, b) {
					const _a = $(a).attr('data-orderby').toUpperCase();
					const _b = $(b).attr('data-orderby').toUpperCase();
					if (_a > _b) {
						return 1;
					} else {
						if (_a == _b) {
							return 0;
						} else {
							return -1;
						}
					}
				}).appendTo(_list);
				setTimeout(function (){
					$('.loading-overlay').length && $('.loading-overlay').remove();
					$('#result-list-nav').remove();
					$('.result-list').listnav({
						filterSelector: '.user__name',
						includeNums: true,
						includeOther: true,
						removeDisabled: false,
						allText: 'Все'
					});
				});
			}
		};
		var search       = function () {
			var loaded      = 0;
			var phone_query = str_replace([' ', '-', '(', ')'], '', q);
			page.set('ready', false);
			page.set('results', {});
			if (phone_query.length > 1 && phone_query[0] == '8') {
				phone_query = '7' + phone_query.substring(1);
			}

			utils.api.get('/api/v2/list/users?active=on&role=client&phone~=' + phone_query).then(function (data) {
				if (!!data) {
					data.forEach(function (user, i) {
						page.set('results.' + user.id, user);
					});
				}

				loaded++;
				result_ready(loaded);
			});
			utils.api.get('/api/v2/list/users?active=on&role=client&email~=' + q).then(function (data) {
				if (!!data) {
					data.forEach(function (user, i) {
						page.set('results.' + user.id, user);
					});
				}

				loaded++;
				result_ready(loaded);
			});
			utils.api.get('/api/v2/list/users?active=on&role=client&fullname~=' + q).then(function (data) {
				if (!!data) {
					data.forEach(function (user, i) {
						page.set('results.' + user.id, user);
					});
				}

				loaded++;
				result_ready(loaded);
			});
		};

		setTimeout(function () {
			search();
		});

		$('form.search').on('submit', function (e) {
			console.log(e);

			window.q = $(this).find('[name="q"]').val();
			page.set('results', {});

			$('<div class="loading-overlay"><div class="loader"></div></div>').appendTo($('.search-result .container'));
			utils.changeUrl(false, window.location.origin + window.location.pathname + '?q=' + window.q);
			search();
			return false;
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