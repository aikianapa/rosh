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
	<main class="page" data-barba="container" data-barba-namespace="lk-cabinet">
		<div class="account">
			<form class="search" action="/cabinet/search">
				<div class="container">
					<div class="crumbs"><a class="crumbs__arrow" href="#">
							<svg class="svgsprite _crumbs-back">
								<use xlink:href="assets/img/sprites/svgsprites.svg#crumbs-back"></use>
							</svg>
						</a><a class="crumbs__link" href="/">Главная</a>
						<a class="crumbs__link" href="/cabinet">Кабинет администратора</a>
						<span class="crumbs__link">Поиск</span>
					</div>
					<h1 class="h1 mb-40">Кабинет администратора</h1>
					<div class="search__block --flex --aicn">
						<div class="input">
							<input class="search__input" type="text" name="q" placeholder="Поиск">
						</div>
						<button class="btn btn--black">Найти</button>
					</div>
				</div>
			</form>
			<div class="search-result">
				{{#with client}}
				<div class="container">
					<div class="lk-title">Карточка пациента</div>
					<div class="account__panel">
						<div class="account__info">
							<div class="user">
								<div class="user__name">{{this.fullname}}</div>
								<div class="user__item">Дата рождения:
									<span>{{this.birthdate}}</span>
								</div>
								<a href="callto:+{{this.phone}}" class="user__item">Тел:
									<span>+{{this.phone}}</span>
								</a>

								<div class="user__item">Почта:
									<span>{{this.email}}</span>
								</div>
								<div class="user__confirm">
									<svg class="svgsprite _confirm">
										<use xlink:href="assets/img/sprites/svgsprites.svg#confirm"></use>
									</svg>
									Подтвержденный аккаунт<a class="user__notconfirm --openpopup" href="#" data-popup="--email-send">Отправить код восстановления на почту</a>
								</div>
								<div class="admin-edit__user-btns d-none">
									<a class="admin-edit__user-btn btn btn--white --openpopup" 
										data-popup="--create-appoint">Записать пациента на прием</a>
									<a class="admin-edit__user-btn btn btn--white --openpopup" href="#" data-popup="--photo">Добавить продолжительное лечение </a>
									<div class="admin-edit__uploads">
										<input class="admin-edit__upload" type="file" id="analises-file">
										<label class="admin-edit__upload-btn btn btn--white" for="analises-file">Добавить анализы</label>
									</div>
								</div>
							</div>
						</div>
						<a class="account__detail" href="/cabinet/client/id631f0bdf2137"> Подробнее</a>
					</div>
					{{#if events.upcoming}}
					<div class="lk-title">Предстоящие события</div>
					<div class="account-events">
						{{#each events.upcoming}}
						<div class="account-events__block --flex --jcsb d-none">
							<div class="account-events__block-wrap d-none">
								<div class="account-events__item">
									<div class="account-event-wrap">
										<div class="account-events__name">Услуги:</div>
										<div class="account-event">
											{{#this.services}}
											<p>{{this.name}}</p>
											{{/this.services}}
										</div>
									</div>
								</div>
								<div class="account-events__item">
									<div class="account-event-wrap">
										<div class="account-events__name">Дата приема:</div>
										<div class="account-event">
											<p>{{this.event_date}}</p>
										</div>
									</div>
									<div class="account-event-wrap">
										<div class="account-events__name">Время приема:</div>
										<div class="account-event">
											<p>{{this.event_time}}</p>
										</div>
									</div>
								</div>
								<div class="account-events__item">
									<div class="account-event-wrap">
										<div class="account-events__name">Специалист:</div>
										<div class="account-event">
											{{#experts}}
											<p>{{catalog.experts[this].name}}</p>
											{{/experts}}
										</div>
									</div>
								</div>
								<a class="account__detail --openpopup" 
									data-popup="--create-appoint"
									on-click="@.editEvent()"
									data-record="{{this.id}}">
									Редактировать
								</a>
							</div>
						</div>
						{{/each}}
					</div>
					{{/if}}
					<div class="account__history data-tab-wrapper" data-tabs="history">
						<div class="account__tab-items">
							<div class="account__tab-item data-tab-link active" data-tabs="history" data-tab="visits">
								История посещений
							</div>
							<div class="account__tab-item data-tab-link" data-tabs="history" data-tab="longterm">
								Продолжительное лечение
							</div>
						</div>
						<!-- !!! quote history tab !!! -->
						<div class="account__tab data-tab-item active" data-tab="visits">
							<div class="account__table">
								<div class="account__table-head">
									<div class="history-item">Дата</div>
									<div class="history-item">Время</div>
									<div class="history-item">Специалисты</div>
									<div class="history-item">Услуги</div>
									<div class="history-item">Анализы</div>
								</div>
								<div class="account__table-body">
									<!-- !!! quote history item !!! -->
									{{#each history.visits}}
									<div class="acount__table-accardeon accardeon">
										<div class="acount__table-main accardeon__main accardeon__click">
											<div class="history-item">
												<p>Дата</p>{{this.event_date}}
											</div>
											<div class="history-item">
												<p>Время</p>{{this.event_time}}
											</div>
											<div class="history-item">
												<p>Специалисты</p>
												{{#experts}}
												{{catalog.experts[this].name}}<br>
												{{/experts}}
											</div>
											<div class="history-item">
												<p>Услуги</p>
												{{#services}}
												{{catalog.services[this].header}}<br>
												{{/services}}
											</div>
											<div class="history-item">
												<p>Анализы</p>
												{{#if this.analises}}
													Есть анализы
												{{else}}
													Нет анализов
												{{/if}}
											</div>
										</div>
										<div class="acount__table-list accardeon__list">
											<div class="analysis mb-40">
												<div class="row">
													<div class="col-md-6">
														{{#if this.analises}}
														<div class="analysis__top --aicn --flex mb-20">
															<div class="analysis__title">Анализы</div>
															<a class="btn btn--white" href="{{this.analises.src}}" download="Анализы(за 03.10.2022).pdf">Скачать анализы</a>
														</div>
														{{/if}}
														<div class="analysis__description">
															<p class="text-bold mb-20">Выполнялись процедуры</p>
															<p class="text-grey">{{this.description}}</p>
														</div>
													</div>
													<div class="col-md-6">
														{{#if this.analises}}
														<a class="btn btn--black mb-20 --openpopup" 
															data-popup="--analize-type" 
															on-click="@.analisesQuote" 
															data-file="{{this.analises.src}}" 
															data-record="{{this.id}}">
															Получить расшифровку анализов
														</a>
														{{/if}}
														<div class="analysis__description">
															<p class="text-bold mb-20">Рекомендация врача</p>
															<div class="text">
																{{this.recommendation}}
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="experts__worked">
												<div class="experts__worked-title">С вами работали</div>
												<div class="row">
													{{#experts}}
													<div class="col-md-6">
														<a class="expert__worked"
															target="_blank"
															data-link="/about/experts/{{catalog.experts[this].info_uri}}">
															<div class="expert__worked-pic">
																<img src="{{catalog.experts[this].image.0.src}}" alt="{{catalog.experts[this].name}}">
															</div>
															<div class="expert__worked-name">{{catalog.experts[this].name}}</div>
															<div class="expert__worked-work">{{catalog.experts[this].spec}}</div>
														</a>
													</div>
													{{/experts}}
												</div>
											</div>
											<div class="acount__photos d-none">
												<div class="row acount__photos-wrap">
													<div class="col-md-6">
														<div class="acount__photo">
															<p>Фото до начала лечения</p>
															{{#each image_after}}
															<div class="col-md-6">
																<a class="after-healing__item"
																	data-fancybox="images"
																	href="{{this.image.src}}"
																	data-caption="{{this.date}}">
																	<div class="healing__date">{{this.date}}</div>
																	<div class="after-healing__photo"
																		style="background-image: url('{{this.image.src}}')">
																	</div>
																</a>
															</div>
															{{/each}}
														</div>
													</div>
													<div class="col-md-6">
														<div class="acount__photo">
															<p>Фото в процессе лечения</p>
															{{#each image_after}}
															<a class="after-healing__item"
																data-fancybox="images"
																href="{{this.image.src}}"
																data-caption="{{this.date}}">
																<img src="{{this.image.src}}" alt="Before {{this.date}}">
															</a>
															{{/each}}
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									{{else}}
									<div class="acount__table-accardeon accardeon">
										<div class="acount__table-main accardeon__main">
											Нет записей о посещении
										</div>
									</div>
									{{/each}}
									<!-- !!! / quote history item !!! -->
								</div>
							</div>
						</div>
						
						<!-- !!! longterm tab !!! -->
						<div class="account__tab data-tab-item" data-tab="longterm">
							<div class="account__table">
								<div class="account__table-head">
									<div class="healing-item">Дата</div>
									<div class="healing-item">Услуги</div>
								</div>
								<div class="account__table-body">
									{{#each history.longterms}}
									<!-- !!! longterm item !!! -->
									<div class="acount__table-accardeon accardeon">
										<div class="acount__table-main accardeon__main accardeon__click">
											<div class="healing-item">
												<p>Дата</p> {{this.event_date}} - {{this.longterm_date_end}}
											</div>
											<div class="healing-item">
												<p>Услуги</p> {{this.title}}
											</div>
										</div>
										<div class="acount__table-list accardeon__list">
											<div class="row">
												<div class="col-md-4">
													<div class="text-bold text-big mb-20">Фото до начала лечения</div>
													{{#each photos.before}}
														<a class="after-healing__item"
															data-fancybox="images"
															href="{{this.image.src}}"
															data-caption="{{this.date}}">
															<h2 class="h2 healing__date-title">{{this.date}}</div>
															<div class="after-healing__photo"
																style="background-image: url('{{this.image.src}}')">
															</div>
															<div class="healing__description">
																{{this.comment}}
															</div>
														</a>
													{{/each}}
												</div>
												<div class="col-md-8">
													<div class="text-bold text-big mb-20">
														Фото после начала лечения
													</div>
													<div class="after-healing">
														<h2 class="h2 healing__date-title d-none month-header"></h2>
														<div class="row">
															{{#each image_after}}
															<div class="col-md-6">
																<a class="after-healing__item"
																	data-fancybox="images"
																	href="{{this.image.src}}"
																	data-caption="{{this.date}}">
																	<div class="healing__date">{{this.date}}</div>
																	<div class="after-healing__photo"
																		style="background-image: url('{{this.image.src}}')">
																	</div>
																</a>
															</div>
															{{/each}}
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									{{else}}
									<div class="acount__table-accardeon accardeon">
										<div class="acount__table-main accardeon__main">
											Нет записей о продолжительном лечении
										</div>
									</div>
									{{/each}}
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>

	<script wbapp>
		var cabinet = new Ractive({
			el: 'main.page',
			template: $('main.page').html(),
			data: {
				q: '{{_route.params.q}}',
				user: wbapp._session.user,
				quotes: {}
			},
			on: {
				init() {
					//wbapp.get('/api/v2/read/users/' + wbapp._session.user.id, function(data) {
					//    cabinet.set('user', data); /* get actually user data */
					//});
					//wbapp.get('/api/v2/read/quotes/?experts=' + wbapp._session.user.id +'&' wbapp._route.params.q, function(data) {
					//    cabinet.set('quotes', data); /* get actually user data */
					//});
				},
				profileSave(ev) {
					//let $form = $(ev.node);
					//let uid = cabinet.get('user.id');
					//if ($form.verify() && uid > '') {
					//    let data = $form.serializeJson()
					//    data.phone = str_replace([' ','+','-','(',')'],'',data.phone)
					//    wbapp.post('/api/v2/update/users/'+uid,data,function(res){
					//        console.log(res);
					//    })
					//}
					//return false
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