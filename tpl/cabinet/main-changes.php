<!DOCTYPE html>
<html class="no-js" lang="ru">
<head>
    <title seo>Кабинет администратора</title>
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
								<div class="changes-item">Специалист</div>
								<div class="changes-item">Услуга</div>
								<div class="changes-item">Изменения</div>
							</div>
							<div class="account__table-body">
								{{#each changes}}
								<div class="acount__table-accardeon accardeon">
									<div class="acount__table-main accardeon__main accardeon__click">
										<div class="history-item">
											<p>Дата / время изменения</p>{{this.date}} {{this.time}}
										</div>
										<div class="history-item">
											<p>ФИО</p>{{this.clientData.fullname}}
										</div>
										<div class="history-item">
											<p>Специалист</p>
											{{catalog.experts[this.expert].head}}
										</div>
										<div class="history-item">
											<p>Услуги</p>
											{{#services}}
											{{catalog.services[this].header}}<br>
											{{/services}}
										</div>
										<div class="history-item">
											<p>Изменения</p>
											{{#each this.changes}}
											<p>
												<span>Поле: {{catalog.labels[this.field]}}</span>
												<span>Предыдущее значение: {{this.prev_val}}</span>
												<span>Новое значение:{{this.curr_val}}</span>
											</p>
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
            var cabinetChanges = new Ractive({
                el: 'main.page',
                template: $('main.page').html(),
                data: {
                    user: wbapp._session.user,
	                changes: []
                },
                on: {
                    init() {
                        wbapp.get('/api/v2/list/record-changes/@sort=date:d', function(data) {
                            cabinetChanges.set('changes', data);
                        });
                    },
	                complete(ev) {
		                $('main.page .loading-overlay').remove();
	                }
                }
            })
        </script>
    </div>
    <div>
        <wb-module wb="module=yonger&mode=render&view=footer" />
    </div>
    <script type='text/javascript' src='https://cdn.scaledrone.com/scaledrone.min.js'></script>
</body>
<wb-jq wb="$dom->find('script:not([src]):not([type])')->attr('type','wbapp');" />
<wb-jq wb="$dom->find('.content-wrap ul')->addClass('ul-line');" />

</html>