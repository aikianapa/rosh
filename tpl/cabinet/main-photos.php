<!DOCTYPE html>
<html class="no-js" lang="ru">
<head>
	<title seo>Кабинет администратора</title>
	<link rel="icon" href="/favicon.svg" type="image/svg+xml">
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
<template id="gallery">
	<div class="title-flex --flex --jcsb photos-title">
		<div class="add-photo">
			<div class="lk-title mb-0 mr-20">Библиотека фотографий</div>
			<a class="btn btn--black" on-click="addPhoto">Добавить фото</a>
		</div>
		<div class="filter__item">
			<a class="filter__name text-bold" href="#">Удалить фильтры</a>
			<div class="filter__select">
				<div class="filter-select select">
					<div class="filter-select__main select__main">Фильтр</div>
					<div class="filter-select__list select__list">
						<div class="filter-select__item select__item">Все</div>
						<div class="filter-select__item select__item" data-filter="current_month">За текущий месяц</div>
						<div class="filter-select__item select__item" data-filter="date_range">Диапазон дат</div>
						<div class="filter-select__item select__item" data-filter=""></div>

					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="admin-photos">
		{{#each photos: idx}}
		<a class="admin-photo" data-idx="{{idx}}"
			data-filter-client="{{this.client}}"
			data-filter-type="{{this.type}}"
			data-filter-date="{{this.date}}"
			data-fancybox="gallery"
			data-caption="{{ this.title }}"
			href="{{this.image}}"
			style="background-image: url('{{this.image}}')">
			<div class="admin-photo__date">{{ this.date }}</div>
			<div class="admin-photo__info">
				<p class="text-bold mb-10 admin-photo__name">{{ @global.catalog.clients[this.client].fullname }}</p>
				<div class="admin-photo__description">
					{{ this.title }}<br>{{ this.type_text }}
				</div>
			</div>
		</a>
		{{elseif content_loaded}}
		<div class="account__panel">
			<span>Нет записей с фото пациентов</span>
		</div>
		{{else}}
		<div class="account__panel">
			<span>Подождите, идет загрузка..</span>
		</div>
		{{/each}}
	</div>
</template>
<script wbapp>
	$(document).on('cabinet-db-ready', function () {
		window.page         = new Ractive({
			el: 'main.page .search-result .container',
			template: wbapp.tpl('#gallery').html,
			data: {
				user: wbapp._session.user,
				photos: [],
				content_loaded: false,
				groups: {}
			},
			on: {
				complete() {
					initClientSearch();
				},
				filter(ev) {
					//page.set('photos', clientPhotos.filterBy($(ev.node)));
				},
				addPhoto(ev) {
					console.log('addPhoto');
					popupPhoto(null, null, function (rec) {
						toast('Фото добавлено успешно!');
					});
				}
			}
		});
		window.content_load = function () {
			utils.api.get('/api/v2/list/records/?group=[events,longterm]').then(function (data) {
				console.log(data);
				let _images        = [];
				var _images_groups = {};
				data.forEach(function (rec) {
					_before_photo = rec.photos?.before[0];
					if (!!_before_photo) {
						var img                                                 = {
							date: utils.formatDate(_before_photo.date),
							title: (rec.groups === 'longterms' ? 'Продолжительное лечение: ' + rec.longterm_title
								: ''),
							type: 'before',
							type_text: 'До начала лечения',
							image: _before_photo.src,
							client: rec.client,
							record: rec.id
						};
						_images_groups[utils.monthYearDate(_before_photo.date)] = img;
						_images.push(img);
					}
					rec.photos?.after.forEach(function (photo) {
						var img                                         = {
							date: utils.formatDate(photo.date),
							title: (rec.groups === 'longterms'
								? 'Продолжительное лечение: ' + rec.longterm_title
								: ''),
							type: 'after',
							type_text: 'В процессе лечения',
							image: photo.src,
							client: rec.client,
							record: rec.id
						};
						_images_groups[utils.monthYearDate(photo.date)] = img;
						_images.push(img);
					});
				});
				console.log(_images_groups);
				page.set('photos', _images); /* get actually user data */
				page.set('groups', _images_groups); /* get actually user data */
				page.set('content_loaded', true); /* get actually user data */
			});
		};
		content_load();
	});
</script>
<div>
	<wb-module wb="module=yonger&mode=render&view=footer"/>
</div>

</body>

</html>