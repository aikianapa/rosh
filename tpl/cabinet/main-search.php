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
				<div class="user__confirm disabled">
					<svg class="svgsprite _confirm">
						<use xlink:href="/assets/img/sprites/svgsprites.svg#confirm"></use>
					</svg>
					Подтвержденный аккаунт<a class="user__notconfirm --openpopup" data-popup="--email-send">Отправить код восстановления на почту</a>
				</div>
				<div class="admin-edit__user-btns d-none">
					<a class="admin-edit__user-btn btn btn--white --openpopup"
						data-popup="--create-appoint">Записать пациента на прием</a>
					<a class="admin-edit__user-btn btn btn--white --openpopup"
						onclick="popupPhoto(true)"
						data-popup="--photo">Добавить продолжительное лечение </a>
					<div class="admin-edit__uploads">
						<input class="admin-edit__upload" type="file" id="analyses-file">
						<label class="admin-edit__upload-btn btn btn--white" for="analyses-file">Добавить анализы</label>
					</div>
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
				}
			}
		});

		var loaded = 0;
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
	});
</script>

<div>
	<wb-module wb="module=yonger&mode=render&view=footer"/>
</div>

</body>
<wb-jq wb="$dom->find('script:not([src]):not([type])')->attr('type','wbapp');"/>
<wb-jq wb="$dom->find('.content-wrap ul')->addClass('ul-line');"/>

</html>