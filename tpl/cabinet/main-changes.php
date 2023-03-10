<!DOCTYPE html>
<html class="no-js" lang="ru">
<head>
	<title seo>Кабинет администратора</title>

	<link rel="icon" href="/favicon.svg" type=" image/svg+xml">
</head>

<body class="body lk-cabinet" data-barba="wrapper">
<div class="scroll-container lk-main" data-scroll-container>
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
							<input class="search__input" type="text" placeholder="Поиск по пациентам" name="q">
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
							<div class="changes-item">Запись</div>
							<div class="changes-item">Пациент</div>
							<div class="changes-item">Изменены поля</div>
							<div class="changes-item">К-ство измененых полей</div>
						</div>
						<div class="account__table-body">
							{{#each changes}}
							<div class="acount__table-accardeon accardeon">
								<div class="acount__table-main accardeon__main accardeon__click acount__table-auto"
									title="Скрыть / Посмотреть полную информацию">
									<div class="changes-item">
										<p>Дата / время изменения</p>
										{{@global.utils.formatDate(this._created)}} / {{@global.utils.formatTime(this._created)}}
									</div>
									<div class="changes-item">
										<p>ФИО</p>
										<span>{{@global.catalog.users[this._creator].fullname}} ({{@global.catalog.roles[@global.catalog.users[this._creator].role]}})</span>
									</div>
									<div class="changes-item">
										<p>Запись</p>
										<span>
											{{#if this.record_group == 'quotes'}}
											Заявка
											{{elseif this.record_group == 'longterms'}}
											Продолжительное лечение
											{{else}}
											Событие
											{{/if}}
										</span>
									</div>
									<div class="changes-item">
										<p>Пациент</p>
										<span>{{ @global.catalog.users[this.client].fullname }}</span>
									</div>
									<div class="changes-item">
										<p>Изменены поля</p>
										<span>
											{{#each this.changes}}
											{{this.label}}<br>
											{{/each}}
										</span>
									</div>
									<div class="changes-item">
										<p>К-ство измененых полей</p>
										<span>{{this.changes.length}}</span>
									</div>
								</div>
								<div class="acount__table-list accardeon__list">

									<div class="row">
										<div class="col-lg-4">
											<h5 class="h5 expert__category">Поле</h5>
										</div>
										<div class="col-lg-4">
											<h5 class="h5 expert__category">Пред. значение</h5>
										</div>
										<div class="col-lg-4">
											<h5 class="h5 expert__category">Новое значение</h5>
										</div>
									</div>
									<hr>
									{{#each this.changes}}

									<div class="row mb-2">
										<div class="col-lg-4">
											<p class="text-primary">{{this.label}}</p>
										</div>
										<div class="col-lg-4">
											<p class="">
												{{#if this.field == 'experts'}}
												{{#each this.prev_val}}
												{{catalog.experts[this].fullname}}<br>
												{{/each}}
												{{elseif this.field == 'services'}}
												{{#each this.prev_val}}
												{{catalog.services[this].header}}<br>
												{{/each}}
												{{elseif this.field == 'status'}}
												{{catalog.quoteStatus[this.prev_val].name}}
												{{elseif this.field == 'event_date'}}
												{{@global.utils.formatDate(this.prev_val)}}
												{{else}}
												{{this.prev_val}}
												{{/if}}
											</p>
										</div>
										<div class="col-lg-4">
											<p class="">
												{{#if this.field == 'experts'}}
												{{#each this.new_val}}
												{{catalog.experts[this].fullname}}
												{{/each}}
												{{elseif this.field == 'services'}}
												{{#each this.new_val}}
												{{catalog.services[this].header}}<br>
												{{/each}}
												{{elseif this.field == 'status'}}
												{{catalog.quoteStatus[this.new_val].name}}
												{{elseif this.field == 'event_date'}}
												{{@global.utils.formatDate(this.new_val)}}
												{{else}}
												{{this.new_val}}
												{{/if}}

											</p>
										</div>
									</div>
									{{/each}}
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

			utils.api.get('/api/v2/list/record-changes?@sort=_created:d').then(function (data) {
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