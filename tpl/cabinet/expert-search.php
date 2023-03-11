<!DOCTYPE html>
<html class="no-js" lang="ru">
<head>
	<title seo>Кабинет специалиста</title>
	<link rel="icon" href="/favicon.svg" type=" image/svg+xml">
	<link rel="stylesheet" href="/assets/css/listnav.css?v=2">
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
						<a class="crumbs__link" href="/cabinet">Кабинет специалиста</a>
						<span class="crumbs__link">Поиск</span>
					</div>
					<h1 class="h1 mb-40">Кабинет специалиста</h1>
					<div class="search__block --flex --aicn">
						<div class="input">
							<input class="search__input" type="text" name="q" placeholder="Поиск по пациентам"
								value="{{_route.params.q}}">
						</div>
						<button class="btn btn--black">Найти</button>
					</div>
				</div>
			</form>
			<div class="search-result">
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
		{{#each results}}
		<div class="account__panel" data-orderby="{{.fullname}}">
			<div class="account__info">
				<div class="user">
					<a class="user__name" data-client="{{.id}}">{{.fullname}}</a>
					<div class="user__group">
						{{#if .birthdate }}
						<div class="user__birthday">Дата рождения:
							<span>{{ @global.utils.formatDate(.birthdate) }}</span>
						</div>
						{{else}}
						{{/if}}
					</div>
				</div>
			</div>
			<a class="account__detail" data-client="{{.id}}">
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
	</div>
</template>
<script src='/assets/js/jquery-listnav.js?v=2'></script>

<script wbapp>
	var q = '{{_route.params.q}}';
	$(document).on('cabinet-db-ready', function () {
		var page         = new Ractive({
			el: 'main.page .search-result .container',
			template: wbapp.tpl('#search-result').html,
			data: {
				q: '{{_route.params.q}}',
				user: wbapp._session.user,
				results: [],
				ready: false
			},
			on: {
				init() {
						utils.api.get('/api/v2/list/users?role=client&active=on&fullname~=' + q)
							.then(function (data) {
								console.log('found:', data);
								page.set('results', data);
								page.set('ready', true);
							});
				},
				complete(ev) {
					$('main.page .loading-overlay').remove();
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
				setTimeout(function () {
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

			$('<div class="loading-overlay"><div class="loader"></div></div>')
				.appendTo($('.search-result .container'));
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