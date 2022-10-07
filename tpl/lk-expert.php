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
								<use xlink:href="assets/img/sprites/svgsprites.svg#crumbs-back"></use>
							</svg>
						</a>
						<a class="crumbs__link" href="/">Главная</a>
						<span class="crumbs__link">Кабинет специалиста</span>
					</div>
					<h1 class="h1 mb-40">Кабинет специалиста</h1>
					<div class="search__block --flex --aicn">
						<div class="input">
							<input class="search__input" type="text" name="q" placeholder="Поиск">
						</div>
						<button class="btn btn--black" type="submit">Найти</button>
					</div>
				</div>
			</form>
			<div class="container">
				<template id="editorProfile">
					<form on-submit="profileSave">
						{{#user}}
						<div class="profile-edit__block">
							<div class="lk-title">Редактировать профиль</div>
							<div class="row profile-edit__wrap">
								<div class="col-md-3">
									<div class="input input--grey">
										<input class="input__control datebirthdaypickr" name="birthdate" value="{{.birthdate}}" type="text" placeholder="Дата рождения">
										<div class="input__placeholder input__placeholder--dark">Дата рождения</div>
									</div>
								</div>
								<div class="col-md-3">
									<div class="input input--grey">
										<input class="input__control" type="tel" name="phone" value="{{.phone}}" placeholder="Телефон" data-inputmask="'mask': '+9 (999) 999-99-99'">
										<div class="input__placeholder input__placeholder--dark">Телефон</div>
									</div>
								</div>
								<div class="col-md-3">
									<div class="input input--grey">
										<input class="input__control" type="email" name="email" value="{{.email}}" placeholder="E-mail">
										<div class="input__placeholder input__placeholder--dark">E-mail</div>
									</div>
								</div>
								<div class="col-md-2">
									<button class="btn btn--white profile-edit__submit">Сохранить</button>
								</div>
							</div>
						</div>
						{{/user}}
					</form>
					<form on-submit="saveExpert">
						<div class="profile-edit__block">
							<div class="lk-title">Лицензия</div>
							<div class="profile-licenses row">
								<div class="col-md-6">
									<div class="profile-licenses__inputs repeater-container" data-repeater="license" data-name="licenses[]">
										{{#user.expert.licenses: idx}}
										<div class="profile-licenses__input input repeater-item input--grey">
											<input class="input__control" type="text"
												name="licenses[]"
												placeholder="Добавьте лицензию"
												value="{{user.expert.licenses[idx]}}">
											<div class="input__placeholder">Добавьте лицензию</div>
											{{#idx}}
												<a class="profile-licenses__delete repeater-delete" href="#">
													<svg class="svgsprite _delete-black">
														<use xlink:href="assets/img/sprites/svgsprites.svg#delete-black">
														</use>
													</svg>
												</a>
											{{/idx}}
										</div>
										{{else}}
										<div class="profile-licenses__inputs repeater-container"
											data-repeater="license">
											<div class="profile-licenses__input input input--grey">
												<input class="input__control" type="text"
													placeholder="Добавьте лицензию" value="">
												<div class="input__placeholder">Добавьте лицензию</div>
											</div>
										</div>
										{{/user.expert}}
									</div>
								</div>
								<div class="col-md-6 --flex">
									<a class="btn btn--black add-license repeater-add" href="#"
										data-repeater="license">Добавить лицензию</a>
									<div class="profile-licenses__input input input--grey repeater-sample"
										data-repeater="license">
										<input class="input__control" type="text" placeholder="№ лицензии">
										<div class="input__placeholder">Добавьте лицензию</div>
										<a class="profile-licenses__delete repeater-delete" href="#">
											<svg class="svgsprite _delete-black">
												<use xlink:href="assets/img/sprites/svgsprites.svg#delete-black">
												</use>
											</svg>
										</a>
									</div>
								</div>
							</div>
						</div>
						<div class="profile-edit__block profile-education">
							<div class="lk-title">Образование</div>
							<div class="profile-education__wrap repeater-container" data-repeater="study">
								{{#each user.expert.stages: idx}}
								<div class="profile-education__inner row repeater-item" data-idx="{{idx}}">
									<div class="col-md-6">
										<div class="input input--grey">
											<input class="input__control" type="text"
												placeholder="Название учебного заведения"
												name="stages[{{idx}}][stage]"
												value="{{.stage}}">
											<div class="input__placeholder">Название учебного заведения</div>
										</div>
									</div>
									<div class="col-md-5">
										<div class="profile-education__inputs">
											<div class="profile-education__input">
												<div class="input input-lk-calendar input--grey">
													<input class="input__control yearpickr" type="text"
														name="stages[{{idx}}][year]"
														placeholder="Начало обучения"
														value="{{.year}}">
													<div class="input__placeholder">Начало обучения</div>
												</div>
											</div>
											<div class="profile-education__input">
												<div class="input input-lk-calendar input--grey">
													<input class="input__control yearpickr" type="text"
														placeholder="Окончание обучения"
														name="stages[{{idx}}][year_end]"
														value="{{.year_end}}">
													<div class="input__placeholder">Окончание обучения</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-1">
										{{#idx}}
										<a class="profile-study__delete repeater-delete" href="#">
											<svg class="svgsprite _delete-black">
												<use xlink:href="assets/img/sprites/svgsprites.svg#delete-black">
												</use>
											</svg>
										</a>
										{{/idx}}
									</div>
								</div>
								{{else}}
								<div class="profile-education__inner row repeater-item" data-idx="{{idx}}">
									<div class="col-md-6">
										<div class="input input--grey">
											<input class="input__control" type="text"
												placeholder="Название учебного заведения"
												name="stages[{{idx}}][stage]"
												value="{{.stage}}">
											<div class="input__placeholder">Название учебного заведения</div>
										</div>
									</div>
									<div class="col-md-5">
										<div class="profile-education__inputs">
											<div class="profile-education__input">
												<div class="input input-lk-calendar input--grey">
													<input class="input__control yearpickr" type="text"
														name="stages[{{idx}}][year]"
														placeholder="Начало обучения"
														value="{{.year}}">
													<div class="input__placeholder">Начало обучения</div>
												</div>
											</div>
											<div class="profile-education__input">
												<div class="input input-lk-calendar input--grey">
													<input class="input__control yearpickr" type="text"
														placeholder="Окончание обучения"
														name="stages[{{idx}}][year_end]"
														value="{{.year_end}}">
													<div class="input__placeholder">Окончание обучения</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-1"></div>
								</div>
								{{/each}}
							</div>
							<div class="profile-education__inner row">
								<div class="col-md-6 --flex">
									<a class="btn btn--black add-education repeater-add" href="#"
										data-repeater="study">Добавить обучение</a>
									<div class="profile-education__inner row repeater-sample" data-repeater="study">
										<div class="col-md-6">
											<div class="input input--grey">
												<input class="input__control" type="text"
													placeholder="Название учебного заведения">
												<div class="input__placeholder">Название учебного заведения</div>
											</div>
										</div>
										<div class="col-md-5">
											<div class="profile-education__inputs">
												<div class="profile-education__input">
													<div class="input input-lk-calendar input--grey">
														<input class="input__control yearpickr" type="text"
															placeholder="Начало обучения">
														<div class="input__placeholder">Начало обучения</div>
													</div>
												</div>
												<div class="profile-education__input">
													<div class="input input-lk-calendar input--grey">
														<input class="input__control yearpickr" type="text"
															placeholder="Окончание обучения">
														<div class="input__placeholder">Окончание обучения</div>
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-1">
											<a class="profile-study__delete repeater-delete" href="#">
												<svg class="svgsprite _delete-black">
													<use xlink:href="assets/img/sprites/svgsprites.svg#delete-black">
													</use>
												</svg>
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<button class="btn btn--white">Сохранить</button>
					</form>
				</template>
				<div class="account__panel">
					<div class="account__info">
						<div class="user --flex">
							{{#user.expert}}
							<div class="user__panel">
								<div class="user__name">{{.name}}
									<button class="user__edit all">
										<svg class="svgsprite _edit">
											<use xlink:href="assets/img/sprites/svgsprites.svg#edit"></use>
										</svg>
									</button>
								</div>
								<div class="user__group --noflex">
									<div class="user__item">Образование:
										<span>{{.education}}</span>
									</div>
									<div class="user__item">Лицензия:
										{{#each user.expert.licenses: ixd}}
										<p>
											<span>№ {{user.expert.licenses[ixd]}}</span>
										</p>
										{{/each}}
									</div>
								</div>
							</div>
							<div class="user__panel user__panel--border">
								<div class="user__item">{{.spec}}</div>

								<div class="user__notifcation">
									<svg class="svgsprite _notification">
										<use xlink:href="assets/img/sprites/svgsprites.svg#notification"></use>
									</svg>
									Ближайшая запись: 03.10.2022, 15:30 – 16:30
								</div>
							</div>
							{{/user.expert}}
						</div>
					</div>
					<a class="account__exit" href="/signout">Выйти из аккаунта</a>
					<div class="profile-edit">
					</div>
				</div>
				<div class="lk-title current_event" style="display:none">Текущее событие</div>
				<div class="account-events current_event" style="display:none">
					<div class="account-events__block">
						<div class="account-events__block-wrap">
							<div class="account-events__item">
								<div class="account-event-wrap">
									<div class="account-events__name">Услуги:</div>
									<div class="account-event">
										<p>Консультация врача</p>
										<p>Фотолечение BBL</p>
									</div>
								</div>
							</div>
							<div class="account-events__item">
								<div class="account-event-wrap">
									<div class="account-events__name">Дата приема:</div>
									<div class="account-event">
										<p>03.10.2022</p>
									</div>
								</div>
								<div class="account-event-wrap">
									<div class="account-events__name">Время приема:</div>
									<div class="account-event">
										<p>15:30 – 16:30</p>
									</div>
								</div>
							</div>
							<div class="account-events__item">
								<div class="account-event-wrap">
									<div class="account-events__name">Пациент:</div>
									<div class="account-event">
										<p>Client Rosh</p>
									</div>
								</div>
							</div>
						</div>
						<div class="account-events__btns">
							<div class="account-event-wrap --aicn">
								<div class="account-events__btn">
									<a class="btn btn--black"
										onclick="window.open('/cabinet/online#id6267fa8a2297', '_blank',
                                             'width='+screen.availWidth+',height='+screen.availHeight+
                                             ',location=yes,height=0,width=0,scrollbars=yes,status=yes');">
										Начать консультацию
									</a>
								</div>
								<p>Вас ожидает пациент, можете подключиться прямо сейчас</p>
							</div>
						</div>
						<div class="account-edit pt-30">
							<div class="account-edit__title">
								<p>Рекомендации</p><a class="user__edit" href="#">
									<svg class="svgsprite _edit">
										<use xlink:href="assets/img/sprites/svgsprites.svg#edit"></use>
									</svg>
								</a>
							</div>
							<textarea class="account-edit__textarea"></textarea>
							<button class="btn btn--white">Сохранить</button>
						</div>
					</div>
				</div>
				<div class="lk-title">Предстоящие события</div>
				<div class="account-events">
					<div class="account-events__block">
						<div class="account-events__block-wrap">
							<div class="account-events__item --flex">
								<div class="account-event-wrap">
									<div class="account-events__name">Услуги:</div>
									<div class="account-event">
										<p>Консультация врача</p>
									</div>
								</div>
							</div>
							<div class="account-events__item">
								<div class="account-event-wrap">
									<div class="account-events__name">Дата приема:</div>
									<div class="account-event">
										<p>03.10.2022</p>
									</div>
								</div>
								<div class="account-event-wrap">
									<div class="account-events__name">Время приема:</div>
									<div class="account-event">
										<p>10:00 – 11:00</p>
									</div>
								</div>
							</div>
							<div class="account-events__item">
								<div class="account-event-wrap">
									<div class="account-events__name">Пациент:</div>
									<div class="account-event">
										<p>Иванов Иван</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="lk-title">История посещений и приемов</div>
				<div class="account__history">
					<template id="eventsHistory">
						<div class="account__table">
							<div class="account__table-head" style="padding:0 40px;">
								<div class="history-item">Дата</div>
								<div class="history-item">Время</div>
								<div class="history-item">Пациент</div>
								<div class="history-item">Услуги</div>
								<div class="history-item">Анализы</div>
							</div>
							<div class="account__table-body">
								<div class="acount__table-accardeon accardeon">
									<div class="acount__table-main accardeon__main accardeon__click">
										<div class="history-item">16.09.2022</div>
										<div class="history-item">08:45-09:45</div>
										<div class="history-item">Кира Глумова</div>
										<div class="history-item">Фотолечение BBL</div>
										<div class="history-item">Нет анализов</div>
									</div>
									<div class="acount__table-list accardeon__list">
										<form class="recomendation-text">
											<div class="account-edit__title">
												<p>Рекомендация врача</p>
												<a class="user__edit" href="#">
													<svg class="svgsprite _edit">
														<use xlink:href="assets/img/sprites/svgsprites.svg#edit"></use>
													</svg>
												</a>
											</div>
											<textarea class="account-edit__textarea">Ut tortor pretium viverra suspendisse potenti nullam ac tortor vitae. Diam vel quam elementum pulvinar etiam. Rhoncus est pellentesque elit ullamcorper.
                                        Vitae tempus quam pellentesque nec nam aliquam sem.</textarea>
											<button class="btn btn--white">Сохранить</button>
										</form>
									</div>
								</div>
								<div class="acount__table-accardeon accardeon">
									<div class="acount__table-main accardeon__main accardeon__click">
										<div class="history-item">18.09.2022</div>
										<div class="history-item">10:00-11:00</div>
										<div class="history-item">Иван Иванов</div>
										<div class="history-item">Консультация врача</div>
										<div class="history-item">Нет анализов</div>
									</div>
									<div class="acount__table-list accardeon__list">
										<div class="account-edit__title">
											<p>Рекомендация врача</p><a class="user__edit" href="#">
												<svg class="svgsprite _edit">
													<use xlink:href="assets/img/sprites/svgsprites.svg#edit"></use>
												</svg>
											</a>
										</div>
										<textarea class="account-edit__textarea">Lorem ipsum dolor sit amet consectetur adipiscing elit ut. Suspendisse ultrices gravida dictum fusce ut placerat orci. A diam maecenas sed enim ut. Sem et tortor consequat id porta nibh venenatis cras sed. Pharetra et ultrices neque ornare aenean euismod elementum nisi. Ut sem viverra aliquet eget sit amet. Id leo in vitae turpis massa sed elementum tempus egestas.</textarea>
										<button class="btn btn--white">Сохранить</button>
									</div>
								</div>
							</div>
							<div class="account__table-body">

							</div>
						</div>
					</template>
					<div class="account__table">
						<div class="account__table-head" style="padding:0 40px;">
							<div class="history-item">Дата</div>
							<div class="history-item">Время</div>
							<div class="history-item">Пациент</div>
							<div class="history-item">Услуги</div>
							<div class="history-item">Анализы</div>
						</div>
						<div class="account__table-body">
							<div class="acount__table-accardeon accardeon">
								<div class="acount__table-main accardeon__main accardeon__click">
									<div class="history-item">16.09.2022</div>
									<div class="history-item">08:45-09:45</div>
									<div class="history-item">Кира Глумова</div>
									<div class="history-item">Фотолечение BBL</div>
									<div class="history-item">Нет анализов</div>
								</div>
								<form class="acount__table-list accardeon__list">
									<div class="account-edit__title">
										<p>Рекомендация врача</p><a class="user__edit" href="#">
											<svg class="svgsprite _edit">
												<use xlink:href="assets/img/sprites/svgsprites.svg#edit"></use>
											</svg>
										</a>
									</div>
									<textarea class="account-edit__textarea">Ut tortor pretium viverra suspendisse potenti nullam ac tortor vitae. Diam vel quam elementum pulvinar etiam. Rhoncus est pellentesque elit ullamcorper.
                                        Vitae tempus quam pellentesque nec nam aliquam sem.</textarea>
									<button class="btn btn--white">Сохранить</button>
								</form>
							</div>
							<div class="acount__table-accardeon accardeon">
								<div class="acount__table-main accardeon__main accardeon__click">
									<div class="history-item">18.09.2022</div>
									<div class="history-item">10:00-11:00</div>
									<div class="history-item">Иван Иванов</div>
									<div class="history-item">Консультация врача</div>
									<div class="history-item">Нет анализов</div>
								</div>
								<div class="acount__table-list accardeon__list">
									<div class="account-edit__title">
										<p>Рекомендация врача</p><a class="user__edit" href="#">
											<svg class="svgsprite _edit">
												<use xlink:href="assets/img/sprites/svgsprites.svg#edit"></use>
											</svg>
										</a>
									</div>
									<textarea class="account-edit__textarea">Lorem ipsum dolor sit amet consectetur adipiscing elit ut. Suspendisse ultrices gravida dictum fusce ut placerat orci. A diam maecenas sed enim ut. Sem et tortor consequat id porta nibh venenatis cras sed. Pharetra et ultrices neque ornare aenean euismod elementum nisi. Ut sem viverra aliquet eget sit amet. Id leo in vitae turpis massa sed elementum tempus egestas.</textarea>
									<button class="btn btn--white">Сохранить</button>
								</div>
							</div>
						</div>
						<div class="account__table-body">

						</div>
					</div>
				</div>
			</div>
		</div>
	</main>

	<script wbapp>
		setTimeout(function () {
			let editorProfile = wbapp.tpl('#editorProfile').html;
			var expertCabinet = new Ractive({
				el: 'main.page .account__panel',
				template: $('main.page .account__panel').html(),
				data: {
					user: wbapp._session.user,
					expert: {}
				},
				on: {
					init() {
						wbapp.get('/api/v2/read/users/' + wbapp._session.user.id, function (data) {
							expertCabinet.set('user', data); /* get actually user data */
							console.log('user', data);
						});
						wbapp.get('/api/v2/list/experts/?login=' + wbapp._session.user.id, function (data) {
							expertCabinet.set('expert', data[0]); /* get actually user data */
							console.log('expert', data[0]);
						});
					},
					complete(ev) {
						let profileEditor = new Ractive({
							el: 'main.page .profile-edit',
							template: editorProfile,
							data: {
								user: expertCabinet.get('user')
							},
							on: {
								complete() {
									console.log('expert editor ready!');
									//$('.profile-education__inner.row').each(function(){
									//	$(this).find('input[name="stages[stage][]"]').attr('name', 'stages['+$(this).data('idx')+'][stage]');
									//	$(this).find('input[name="stages[year][]"]').attr('name', 'stages['+$(this).data('idx')+'][year]');
									//	$(this).find('input[name="stages[year_end][]"]').attr('name', 'stages['+$(this).data('idx')+'][year_end]');
									//});

									//$('.profile-licenses__inputs.repeater-container').each(function(){
									//	$(this).find('input[name="stages[stage][]"]').attr('name', 'stages['+$(this).data('idx')+'][stage]');
									//	$(this).find('input[name="stages[year][]"]').attr('name', 'stages['+$(this).data('idx')+'][year]');
									//	$(this).find('input[name="stages[year_end][]"]').attr('name', 'stages['+$(this).data('idx')+'][year_end]');
									//})
								},
								profileSave(ev) {
									let $form = $(ev.node);
									let uid   = profileEditor.get('user.id');
									if ($form.verify() && uid > '') {
										let data   = $form.serializeJson();
										data.phone = str_replace([' ', '+', '-', '(', ')'], '', data.phone);
										wbapp.post('/api/v2/update/users/' + uid, data, function (res) {
											console.log(res);
											expertCabinet.set('user', res);
										});
										$('.user__edit.all').trigger('click');

									}
									return false;
								},
								saveExpert(ev) {
									let $form = $(ev.node);
									let uid   = profileEditor.get('user.expert.id');
									console.log('saved', uid);

									if ($form.verify() && uid > '') {
										let data = $form.serializeJSON();
										wbapp.post('/api/v2/update/experts/' + uid, data, function (res) {
											expertCabinet.set('expert', res);
											expertCabinet.set('user.expert', res);
											console.log('saved', res);
										});
										$('.user__edit.all').trigger('click');
									}
									return false;
								}
							}
						});
					}

				}
			});
		}, 50);
		$(function () {
			setTimeout(function () {
				$('.datebirthdaypickr').each(function () {
					new AirDatepicker(this, {autoClose: true, selectedDates: $(this).val()});
				});
				$('.daterangepickr').each(function () { new AirDatepicker(this, {autoClose: true, range: true}); });
				$('.datepickr')
					.each(function () { new AirDatepicker(this, {selectedDates: $(this).val(), autoClose: true}); });
				$('.datetimepickr').each(function () {
					new AirDatepicker(this,
						{selectedDates: $(this).val(), timepicker: true, autoClose: true, minutesStep: 10});
				});
				$(this).find('input.yearpickr').each(function () {
					new AirDatepicker(this,
						{selectedDates: $(this).val(), view: 'years', minView: 'years', autoClose: true});
				});
				$('.dtp-test').each(function () { new AirDatepicker(this, {autoClose: true, inline: true}); });

				$('input[data-inputmask]').each(function () {
					$(this).inputmask();
				});

				$('input.autocomplete').each(function () {
					$(this).autocomplete({
						noCache: true,
						minChars: 3
					});
				});
			}, 50);
			setTimeout(function () {
				$('.current_event').slideDown('fast');
			}, 15000);
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