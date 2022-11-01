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
						<span class="crumbs__link">Журнал изменений</span>
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
							<input class="search__input" type="text" placeholder="Поиск" name="q">
						</div>
						<button class="btn btn--white">Найти</button>
					</div>
				</div>
			</form>
			<div class="container">
				<div class="lk-title">Журнал изменений</div>
				<div class="accoutn-scroll">
					<div class="account__table">
						<div class="loading-overlay">
							<div class="loader"></div>
						</div>

						<div class="account__table-head">
							<div class="changes-item">Дата / время изменения</div>
							<div class="changes-item">ФИО</div>
							<div class="changes-item">Запись пациента</div>
							<div class="changes-item">Изменено</div>
							<div class="changes-item">Значения</div>
						</div>
						<div class="account__table-body">
							{{#each changes}}
							<div class="acount__table-accardeon accardeon">
								<div class="acount__table-main accardeon__main accardeon__click">
									<div class="history-item">
										<p>Дата / время изменения</p>
										{{@global.utils.formatDate(this._created)}} / {{@global.utils.formatTime(this._created)}}
									</div>
									<div class="history-item">
										<p>ФИО</p>
										{{this.author.fullname}}
									</div>
									<div class="history-item">
										<p>Запись пациента</p>
										{{catalog.users[this.client].fullname}}
									</div>
									<div class="history-item">
										<p>Изменения в полях</p>
										{{#each this.changes}}
										<span>{{this.label}}</span><br>
										{{/each}}
									</div>
									<div class="history-item">
										<p>Изменения</p>
										{{#each this.changes}}
										<span>Предыдущее: {{this.prev_val}}</span>
										<span>Новое: {{this.new_val}}</span>
										{{/each}}
									</div>
								</div>
								<div class="acount__table-list accardeon__list">
								</div>
							</div>
							{{else}}
							<div class="acount__table-accardeon accardeon">
								<div class="acount__table-main accardeon__main">
									Нет записей журналe изменений
								</div>
							</div>
							{{/each}}
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>

	<script>
		$(document).on('cabinet-db-ready', function () {
			window.page = new Ractive({
				el: 'main.page',
				template: $('main.page').html(),
				data: {
					user: wbapp._session.user,
					changes: [],
					catalog: catalog
				},
				on: {
					init() {
					},
					complete(ev) {
						$('main.page .loading-overlay').remove();
					}
				}
			});

			utils.api.get('/api/v2/list/record-changes?@sort=date:d').then(function (data) {
				page.set('changes', data);
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