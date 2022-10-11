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
	<main class="page" data-barba="container" data-barba-namespace="lk-cabinet" wb-off>
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
						<span class="crumbs__link">Медиатека</span>
					</div>
					<div class="title-flex --flex --jcsb">
						<div class="title">
							<h1 class="h1 mb-10">Кабинет администратора </h1>
						</div>
						<a class="btn btn--black --openpopup" data-popup="--create-client">
							Создать карточку пациента
						</a>
					</div>
					<div class="search__block --flex --aicn">
						<div class="input">
							<input class="search__input" type="text" placeholder="Поиск">
						</div>
						<button class="btn btn--white">Найти</button>
					</div>
				</div>
			</form>
			<div class="container">
				<div class="title-flex --flex --jcsb photos-title">
					<div class="add-photo">
						<div class="lk-title mb-0 mr-20">Библиотека фотографий</div>
						<a class="btn btn--black --openpopup" data-popup="--photo" on-click="addPhoto">Добавить фото</a>
					</div>
					<div class="filter__item">
						<a class="filter__name text-bold" href="#">Удалить фильтры</a>
						<div class="filter__select">
							<div class="filter-select select">
								<div class="filter-select__main select__main">Фильтр</div>
								<div class="filter-select__list select__list">
									<div class="filter-select__item select__item">Все</div>
									<div class="filter-select__item select__item" data-filter="1">За текущий месяц</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="admin-photos">
					{{#each photos: idx}}
					<a class="admin-photo" data-idx="{{idx}}"
						data-filter-client="{{this.client}}"
						data-filter-date="{{this.date}}"
						data-fancybox="gallery" href="{{this.image.src}}"
						style="background-image: url('{{this.image.src}}')">
						<div class="admin-photo__date">{{this.date}}</div>
						<div class="admin-photo__info">
							<p class="text-bold mb-10 admin-photo__name">{{this.clientData.fullname}}</p>
							<div class="admin-photo__description">{{this.title}}</div>
						</div>
					</a>
					{{/each}}
				</div>
			</div>
		</div>
	</main>

	<script>
		var cabinet = new Ractive({
			el: 'main.page',
			template: $('main.page').html(),
			data: {
				user: wbapp._session.user,
				photos: []
			},
			on: {
				init() {
					wbapp.get('/api/v2/list/record-photos/', function (data) {
						let _images = [];
						data.forEach(function (rec) {
							_before_photo = rec.photos.before[0];
							if (!!_before_photo) {
								_images.push({
									date: _before_photo.date,
									comment: _before_photo.comment,
									image: _before_photo.image.src,

									client: rec.client,
									record: rec.id

								});
							}
							rec.photos.after.forEach(function (photo) {
								_images.push({
									date: photo.date,
									comment: photo.comment,
									image: photo.image.src,
									client: rec.client,
									record: rec.id
								});
							});
						});
						cabinet.set('photos', data); /* get actually user data */
					});
				},
				filter(ev) {
					cabinet.set('photos', clientPhotos.filterBy($(ev.node)));
				}
			}
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