<!DOCTYPE html>
<html class="no-js" lang="ru">
<head>
	<title seo>Кабинет специалиста</title>
	<link rel="icon" href="/favicon.svg" type=" image/svg+xml">
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
							<input class="search__input" type="text" name="q" placeholder="Поиск"
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
					<div class="lk-title">Результаты поиска</div>
					{{#each results}}
					<div class="account__panel">
						<div class="account__info">
							<div class="user">
								<div class="user__name">{{.fullname}}</div>
								<div class="user__group">
									<div class="user__birthday">Дата рождения:
										<span>{{ @global.utils.formatDate(.birthdate) }}</span>
									</div>
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
			</div>
		</div>
	</main>

	<script wbapp>
		var q = '{{_route.params.q}}';
		$(document).on('cabinet-db-ready', function () {
			var page = new Ractive({
				el: 'main.page',
				template: $('main.page').html(),
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