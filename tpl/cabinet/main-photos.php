<!DOCTYPE html>
<html class="no-js" lang="ru">

<head>
	<title seo>Кабинет администратора</title>
	<link rel="icon" href="/favicon.svg" type="image/svg+xml">
	<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
	<meta http-equiv="Pragma" content="no-cache" />
	<meta http-equiv="Expires" content="0" />
</head>

<body class="body lk-cabinet photos" data-barba="wrapper">
	<div class="scroll-container lk-main" data-scroll-container>
		<div>
			<wb-module wb="module=yonger&mode=render&view=header"></wb-module>
		</div>
		<main class="page {{_session.user.role}}" data-barba="container" data-barba-namespace="lk-cabinet" wb-off>
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
								<h1 class="mb-10 h1">Кабинет администратора </h1>
							</div>
							<a class="btn btn--black --openpopup" onclick="popupsCreateProfile();" data-popup="--create-client">
								Создать карточку пациента
							</a>
						</div>
						<div class="search__block --flex --aicn">
							<div class="input">
								<input class="search__input" type="text" name="q" placeholder="Поиск по пациентам"" value=" {{_route.params.q}}">
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
	<template id="gallery" wb-off>
		<div class="title-flex --flex --jcsb photos-title">
			<div class="add-photo">
				<div class="mb-0 mr-20 lk-title">Библиотека фотографий</div>
				<a class="btn btn--black" on-click="addPhoto">Добавить фото</a>
			</div>
			<div class="filter__item">
				<a class="filter__name text-bold" href="#" on-click="filterClear">Удалить фильтры</a>
				<div class="filter__select">
					<div class="filter-select select">
						<div class="filter-select__main select__main">Фильтр</div>
						<div class="filter-select__list select__list">
							<div class="filter-select__item select__item all" on-click="filterClear">Все</div>
							{{#each filters}}
								<div class="filter-select__item select__item" data-filter="{{@key}}" on-click="['filter', @key]">{{ @key }}</div>
							{{/each}}
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="admin-photos">
			{{#each photos: idx}}
				<a class="admin-photo" data-idx="{{idx}}" data-timestamp="{{this.timestamp}}" data-date_filter="{{this.date_filter}}" data-filter-client="{{this.client}}" data-filter-type="{{this.type}}" data-filter-date="{{this.date}}" data-fancybox="gallery" href="{{.image}}" data-caption="{{@global.catalog.clients[this.client].fullname}}<br>{{ this.date }}, {{ this.title }} {{ this.type_text }}" style="background-image: url('{{.image}}');" data-href="{{this.image}}">
					<div class="admin-photo__date">{{ this.date }}</div>
					<div class="admin-photo__info">
						<p class="mb-10 text-bold admin-photo__name">{{ @global.catalog.clients[client].fullname }}</p>
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
		$(document).on('cabinet-db-ready', function() {
			window.page = new Ractive({
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
					filter(ev, key) {
						console.log(key);
						$(this.el).find('.admin-photo[data-date_filter]').hide();
						$(this.el).find('.admin-photo[data-date_filter="' + key + '"]').show();
					},
					filterClear(ev) {
						console.log('clearkey');
						$(this.el).find('.admin-photo[data-date_filter]').show();
						$(this.el).find('.select__item.all').trigger('click');
						return false;
					},
					addPhoto(ev) {
						console.log('addPhoto');
						popupPhoto(null, null, function(rec) {
							toast_success('Фото успешно добавлено!');

							content_load();
						});
					}
				}
			});

			window.sortElems = function(selector, attrName) {
				return $($(selector).toArray().sort(function(a, b) {
					//console.log(a, b)
					var aVal = parseInt(a.getAttribute(attrName)),
						bVal = parseInt(b.getAttribute(attrName));
					return bVal - aVal;
				}));
			};

			window.content_load = function() {
				utils.api.get('/api/v2/list/records/?group=[events,longterms]').then(function(data) {
					console.log(data);
					let _images = [];
					var _filters = {};
					var _images_groups = {};
					data.forEach(function(rec) {
						var _before_photo = rec.photos?.before;
						if (!!_before_photo) {
							_before_photo = _before_photo[0];
							var img = {
								date: utils.formatDate(_before_photo.date),
								title: (rec.groups === 'longterms' ? 'Продолжительное лечение: ' + rec.longterm_title :
									''),
								type: 'before',
								type_text: 'Фото до приема',
								image: _before_photo.src,
								client: rec.client,
								record: rec.id,
								date_filter: utils.monthYearDate(_before_photo.date),
								timestamp: utils.timestamp(_before_photo.date)
							};
							_images_groups[utils.monthYearDate(_before_photo.date)] = img;

							if (!_filters[utils.monthYearDate(_before_photo.date)]) {
								_filters[utils.monthYearDate(_before_photo.date)] = 0;
							}
							_filters[utils.monthYearDate(_before_photo.date)]++;
							_images.push(img);
						}
						if (!!rec.photos?.after) {
							rec.photos?.after.forEach(function(photo) {
								var img = {
									date: utils.formatDate(photo.date),
									title: (rec.groups === 'longterms' ?
										'Продолжительное лечение: ' + rec.longterm_title :
										''),
									type: 'after',
									type_text: 'Фото после приема',
									image: photo.src,
									client: rec.client,
									record: rec.id,
									date_filter: utils.monthYearDate(photo.date),
									timestamp: utils.timestamp(photo.date)
								};
								_images_groups[utils.monthYearDate(photo.date)] = img;
								if (!_filters[utils.monthYearDate(photo.date)]) {
									_filters[utils.monthYearDate(photo.date)] = 0;
								}
								_filters[utils.monthYearDate(photo.date)]++;
								_images.push(img);
							});
						}
					});

					console.log(_images_groups, _images);
					page.set('photos', _images); /* get actually user data */
					page.set('groups', _images_groups); /* get actually user data */
					page.set('filters', _filters); /* get actually user data */
					page.set('content_loaded', true); /* get actually user data */
					utils.restoreScroll();

					setTimeout(function() {
						$(page.el).find('a[data-href]').each(function(i) {
							console.log($(this).data('href'));
							var _img = $(this);
							_img.attr('href', ''); // $(this).data('href'));

							setTimeout(function() {
								_img.attr('href', _img.attr('data-href'));
							});
						});
						$('.admin-photos').html(window.sortElems('a.admin-photo', 'data-timestamp'));
					}, 200);
				});
			};
			content_load();
			utils.saveScroll();

		});
	</script>
	<div>
		<wb-module wb="module=yonger&mode=render&view=footer" />
	</div>

	<wb-jq wb="$dom->find('script:not([src]):not([type])')->attr('type','wbapp');" />
	<wb-jq wb="$dom->find('.content-wrap ul')->addClass('ul-line');" />
</body>

</html>