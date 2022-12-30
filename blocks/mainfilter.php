<view>
	<div class="mainfilter" id="mainfilter">
		<a href="#" class="mainfilter-mob">
			<span class="hb-ico basket2-ico"></span>
			<i>0</i>
		</a>
		<template>
			<div class="mainfilter__close --closefilter">
				<svg class="svgsprite _close">
					<use xlink:href="/assets/img/sprites/svgsprites.svg#close"></use>
				</svg>
			</div>
			<div class="mainfilter__wrap row">
				{{#filter}}
				<div class="col-lg-9 col-md-8">
					<div class="mainfilter__left">
						{{#if texts.main.active == 'on'}}
						<p>
							{{texts.main.data.text}}
						</p>
						{{/if}}

						<div class="mainfilter__tab-list">
							<div class="mainfilter__tab-item data-tab-link active" data-tab="services"
								data-tabs="mainfilter">Услуги
							</div>
							<div class="mainfilter__tab-item data-tab-link" data-tab="problems" data-tabs="mainfilter">
								Проблемы
							</div>
							<div class="mainfilter__tab-item data-tab-link" data-tab="sympthoms" data-tabs="mainfilter">
								Симптомы
							</div>
						</div>
						<div class="mainfilter__tabs data-tab-wrapper" data-tabs="mainfilter">
							<div class="mainfilter__tab data-tab-item active" data-tab="services">

								{{#if texts.services.active == 'on'}}
								<p>
									{{texts.services.data.text}}
								</p>
								{{/if}} {{#each services}}
								<div class="accardeon" data-category="{{id}}">
									<div class="accardeon__main accardeon__click" on-click="getServices">
										<div class="accardeon__name --{{data.color}}">{{name}}</div>
									</div>
									<div class="accardeon__list">
										<div class="row">
											{{#each items}}
											<div class="col-lg-4">
												<label class="checkbox mainfilter__checkbox"
													data-id="{{../../id}}_{{id}}" data-color="{{../../data.color}}"
													data-cname="{{../../name}}" data-service="{{id}}">
                                                    <input type="checkbox" on-change="toggleService">
													<span></span>
													<div class="checbox__name">{{header}}</div>
													{{#if ../../id != "lab"}}
													<a class="checbox__link --openpopup" data-popup="--service-l"
														href="#" on-click="viewService">Подробнее</a>
													{{/if}}
												</label>
											</div>
											{{/each}}
										</div>
									</div>
								</div>
								{{/each}}
							</div>
							<div class="mainfilter__tab data-tab-item" data-tab="problems">

								{{#if texts.problems.active == 'on'}}
								<p>
									{{texts.problems.data.text}}
								</p>
								{{/if}} {{#each problems}} {{#if id != "gyn" }} {{#if id != "lab" }}
								<div class="accardeon-group">
									<div class="accrdeon__title" data-type="{{id}}">{{name}}</div>
									{{#each cats}} {{#if id != "gyn" }} {{#if id != "lab" }}
									<div class="accardeon">
										<div class="accardeon__main accardeon__click" data-category="{{id}}"
											on-click="getProblems">
											<div class="accardeon__name --{{data.color}}">{{name}}</div>
										</div>
										<div class="accardeon__list">
											<div class="row">
												{{#each items}}
												<div class="col-lg-4">
													<label class="checkbox mainfilter__checkbox"
														data-id="{{category}}_{{id}}" data-color="{{../../data.color}}"
														data-cname="{{../../name}}" data-category="{{category}}"
														data-problem="{{id}}">
														<input type="checkbox" on-change="toggleProblem">
														<span></span>
														<div class="checbox__name">{{header}}</div>
														<a class="checbox__link --openpopup" data-popup="--service-l"
															href="#" on-click="viewProblem">Подробнее</a>
													</label>
												</div>
												{{/each}}
											</div>
										</div>
									</div>
									{{/if}} {{/if}} {{/each}}
								</div>
								{{/if}} {{/if}} {{/each}}
								<div class="accardeon-group no-border">

									<div class="accardeon">
										<div class="accardeon__main accardeon__click" data-category="{{id}}"
											on-click="getProblems">
											<div class="accrdeon__title">Гинекология</div>
										</div>
										<div class="accardeon__list">
											<div class="row">
												{{#each problems.gyn.cats.gyn.items}}
												<div class="col-lg-4">
													<label class="checkbox mainfilter__checkbox" data-id="{{category}}_{{id}}"
														data-category="{{category}}" data-problem="{{id}}"
														data-color="{{../../data.color}}" data-cname="{{../../name}}">
														<input type="checkbox" on-change="toggleProblem">
														<span></span>
														<div class="checbox__name">{{header}}</div>
														<a class="checbox__link --openpopup" data-popup="--service-l" href="#"
															on-click="viewProblem">Подробнее</a>
													</label>
												</div>
												{{/each}}
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="mainfilter__tab data-tab-item" data-tab="sympthoms">
								{{#if texts.sympthoms.active == 'on'}}
								<p>
									{{texts.sympthoms.data.text}}
								</p>
								{{/if}}

								<div class="accrdeon__title">Симптомы</div>
								<div class="row">
									{{#each symptoms}}
									<div class="col-lg-4">
										<label class="checkbox mainfilter__checkbox" data-id="{{id}}"
											data-color="{{../../data.color}}" data-cname="{{../../name}}"
											data-symptom="{{id}}">
											<input type="checkbox" on-change="toggleSymptom">
											<span></span>
											<div class="checbox__name">{{header}}</div>
											<a class="checbox__link --openpopup" data-popup="--service-l" href="#"
												on-click="viewSymptom">Подробнее </a>
										</label>
									</div>
									{{/each}}
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-4 mainfilter__right" id="mainfilterRight">
					<div class="mainfilter__choice">
						<div class="mainfilter__choice-main">
							<h5 class="h5">Выбранные услуги или существующие проблемы</h5>
							<div class="mainfilter__tags">
								{{#each choice.services}}
								<div class="mainfilter-tag">
									<div class="mainfilter-tag__name">
										<div class="mainfilter-tag__delete" data-id="{{id}}" on-click="delete">
											<svg class="svgsprite _delete">
												<use xlink:href="assets/img/sprites/svgsprites.svg#delete"></use>
											</svg>
										</div>
										<a class="mainfilter-tag__link" href="#__srv" data-service="{{service}}"
											data-popup="--service-l" on-click="viewService">{{header}}</a>
									</div>
									<div class="mainfilter-tag__group --{{color}}">{{liter}}</div>
								</div>
								{{/each}} {{#each choice.problems}}
								<div class="mainfilter-tag">
									<div class="mainfilter-tag__name">
										<div class="mainfilter-tag__delete" data-id="{{id}}" on-click="delete">
											<svg class="svgsprite _delete">
												<use xlink:href="assets/img/sprites/svgsprites.svg#delete"></use>
											</svg>
										</div>
										<a class="mainfilter-tag__link" href="#__prb" data-problem="{{problem}}"
											data-popup="--service-l" on-click="viewProblem">{{header}}</a>
									</div>
									{{#each tags}}
									<div class="mainfilter-tag__group --{{color}}">{{liter}}</div>
									{{/each}}
								</div>
								{{/each}}
							</div>
							<a href="#" class="mainfilter__symptoms-link" on-click="clearProblems">
								<svg class="svgsprite _delete">
									<use xlink:href="assets/img/sprites/svgsprites.svg#delete"></use>
								</svg>
								<span>Очистить все</span>
							</a>
						</div>
						<div class="mainfilter__symptoms">
							<h5 class="h5">Вероятная проблематика по симптомам</h5>
							<div class="mainfilter__tags">
								{{#each choice.symprbms}}
								<div class="mainfilter-tag">
									<div class="mainfilter-tag__name">
										<div class="mainfilter-tag__delete" data-id="{{id}}" data-symptom="{{symptom}}"
											on-click="deleteSymPrb">
											<svg class="svgsprite _delete">
												<use xlink:href="assets/img/sprites/svgsprites.svg#delete"></use>
											</svg>
										</div>
										<a class="mainfilter-tag__link" href="#__sym" data-problem="{{problem}}"
											data-popup="--service-l" on-click="viewProblem">{{header}}</a>
									</div>
									{{#each tags}}
									<div class="mainfilter-tag__group --{{.color}}">{{.liter}}</div>
									{{/each}}
								</div>
								{{/each}}
							</div>
							<a href="#" class="mainfilter__symptoms-link" on-click="clearSymptoms">
								<svg class="svgsprite _delete">
									<use xlink:href="assets/img/sprites/svgsprites.svg#delete"></use>
								</svg>
								<span>Очистить все</span>
							</a>
						</div>
					</div>

					<div id="mainfilterCounter" on-click="toTop">
						{{~/checked}}
					</div>
					<div class="mainfilter__bottom">
						<form class="mainfilter__form" on-submit="createQuote">
							<input type="hidden" name="client" value="{{user.id}}">
							<div class="mainfilter__form-top">
								<h5 class="h5">Запись на прием</h5>
								{{#if user.id}}
								{{else}}
								<div class="input input--grey">
									<input class="input__control" type="text" name="fullname"
										value="{{user.fullname}}" placeholder="ФИО">
									<div class="input__placeholder">ФИО</div>
								</div>
								<div class="input input--grey">
									<input class="input__control" type="tel" name="phone"
										value="{{user.phone}}"
										placeholder="Номер телефона"
										data-inputmask="'mask': '+7 (999) 999-99-99'">
									<div class="input__placeholder">Номер телефона</div>
								</div>
								<div class="input input--grey">
									<input class="input__control" type="email" name="email"
										value="{{user.email}}"
										placeholder="Ваш е-мейл">
									<div class="input__placeholder">Ваш е-мейл</div>
								</div>
								{{/if}}
								<div class="form__description">Нажимая на кнопку "Записаться", Вы даете согласие на
									обработку своих персональных данных
									на основании
									<a href="/policy">Политики конфиденциальности
									</a>
								</div>
								<button class="form__submit btn btn--black">Записаться</button>
							</div>
							{{#if user.id}}
							{{else}}
							<div class="mainfilter__form-bottom">После отправки заявки для Вас будет создан Личный
								кабинет, в который можно попасть через кнопку
								"Войти" в верхнем меню сайта
							</div>
							{{/if}}
						</form>
						<div class="mainfilter__succed"></div>
					</div>
				</div>
				{{else}}
				<div class="col-12 mt-5">
					<p class="text-center pt-5">Подождите, выполняется загрузка...</p>
				</div>
				{{/filter}}
			</div>
		</template>
	</div>
	<script wbapp>
		if (wbapp.data('choice') == undefined) wbapp.data('choice', {});
		var createMainfilterQuote = function (client_id, client_comment) {
			var quote        = {};
			quote.group      = 'quotes';
			quote.status     = 'new';
			quote.pay_status = 'free';
			quote.client     = client_id;
			quote.priority   = 0;
			quote.marked     = false;

			quote.comment        = '';
			quote.recommendation = '';
			quote.description    = '';
			quote.client_comment = '';
			quote.price          = 0;

			quote.event_date       = '';
			quote.event_time       = '';
			quote.event_time_start = '';
			quote.event_time_end   = '';

			quote.longterm_date_end = '';
			quote.longterm_title    = '';

			quote.photos = {before: [], after: []};

			quote.comment        = '';
			quote.recommendation = '';
			quote.description    = '';
			quote.client_comment = client_comment;

			wbapp.post(
				'/api/v2/create/records/', quote,
				function (data) {
					if (data.error) {
						wbapp.trigger('wb-save-error',
							{'data': data});
					} else {
						$('.mainfilter-tag__delete').each(function () {$(this).trigger('click');});
						$('.mainfilter__symptoms-link').trigger('click');
						$('.mainfilter__close.--closefilter').trigger('click');

						popupMessage('Заявка создана!', 'Мы перезвоним Вам в ближайшее время!',
							'', '', function (d) {});
						if (typeof window.load == 'function') {
							window.load();
						}
					}
				});
		};
		var mainFilter            = new Ractive({
			el: '#mainfilter',
			template: $('#mainfilter template').html(),
			data: {
				choice: wbapp.data('choice'),
				filter: {},
				checked: 0,
				user: wbapp._session.user
			},
			on: {
				init() {
					wbapp.get('/api/v2/func/problems/mainfilter', function (data) {
						mainFilter.set('filter', data);
						mainFilter.fire('checkChoose');
					});
				},
				clearSymptoms() {
					$(document).find('.mainfilter__tab[data-tab="sympthoms"] input[type="checkbox"]:checked').prop(
						'checked', false);
					mainFilter.set('choice.symprbms', {});
					mainFilter.set('choice.symptoms', {});
					wbapp.data('choice.symprbms', {});
					wbapp.data('choice.symptoms', {});
					mainFilter.countChoice();
				},
				toTop() {
					document.getElementById(`mainfilterRight`).scrollIntoView();
				},
				clearProblems() {
					$(document).find('.mainfilter__tab[data-tab="services"] input[type="checkbox"]:checked').prop(
						'checked', false);
					$(document).find('.mainfilter__tab[data-tab="problems"] input[type="checkbox"]:checked').prop(
						'checked', false);
					mainFilter.set('choice.problems', {});
					wbapp.data('choice.problems', {});
					mainFilter.countChoice();
				},
				delete(ev) {
					did = $(ev.node).data('id');
					$(document).find('#mainfilter label[data-id="' + did + '"]').trigger('click');
					//console.log(did, $(document).find('#mainfilter label[data-id="' + did + '"]'));
					mainFilter.countChoice();
				},
				deleteSymPrb(ev) {
					let data   = $(ev.node).data();
					let choice = mainFilter.get('choice');
					let count  = 0;
					delete choice.symprbms[data.id];
					$.each(choice.symprbms, function (j, sym) {
						if (sym.symptom == data.symptom) {
							count++;
						}
					});
					if (count == 0) {
						delete choice.symptoms[data.symptom];
						$(mainFilter.find(`[data-tab=sympthoms] label[data-id=${data.symptom}] input`)).prop(
							'checked', false);
					}
					mainFilter.set('choice', choice);
					wbapp.data('choice', choice);
					mainFilter.countChoice();
				},
				toggleService(ev) {
					let input  = $(ev.node);
					let label  = $(input).parent('.mainfilter__checkbox');
					let data   = $(label).data();
					let cid    = $(label).parents('[data-category]').data('category');
					let choice = mainFilter.get('choice.services');
					if (choice == undefined) choice = {};
					console.log('1');
					if ($(input).is(':checked')) {
						let header      = $(label).find('.checbox__name').text().trim();
						let liter       = $(label).data('cname').substring(0, 1).toUpperCase();
						let color       = $(label).data('color');
						let item        = {
							id: data.id,
							header: header,
							liter: liter,
							color: color,
							service: data.service
						};
						choice[data.id] = item;
					} else {
						delete choice[data.id];
					}
					mainFilter.set('choice.services', choice);
					wbapp.data('choice', this.get('choice'));
					mainFilter.countChoice();
					return false;
				},
				toggleProblem(ev) {
					let input   = $(ev.node);
					let label   = $(input).parent('.mainfilter__checkbox');
					let data    = $(label).data();
					let cid     = $(label).parents('[data-category]').data('category');
					let problem = data.problem;
					let choice  = mainFilter.get('choice.problems');
					let header  = $(label).find('.checbox__name').text().trim();
					let liter   = $(label).data('cname').substring(0, 1).toUpperCase();
					let color   = $(label).data('color');
					let item;
					if (choice == undefined) choice = {};
					if ($(input).is(':checked')) {
						if (choice[data.id] !== undefined) {
							item = choice[data.id];
						} else {
							item = {
								id: data.id,
								header: header,
								tags: [],
								problem: []
							};
						}
						item.tags.push({
							'liter': liter,
							'color': color
						});
						item.problem.push(problem);
						choice[data.id] = item;
					} else {
						item = choice[data.id];
						$(item.tags).each(function (i, tag) {
							if (tag.liter == liter) {
								item.tags.splice(i, 1);
								item.problem.splice(i, 1);
							}
						});
						choice[data.id] = item;
						if (item.tags.length == 0) delete choice[data.id];
					}
					mainFilter.set('choice.problems', choice);
					wbapp.data('choice', this.get('choice'));
					mainFilter.countChoice();
					return false;
				},
				toggleSymptom(ev) {
					let input    = $(ev.node);
					let label    = $(input).parent('.mainfilter__checkbox');
					let data     = $(label).data();
					let choice   = mainFilter.get('choice.symptoms');
					let symptom  = mainFilter.get('filter.symptoms.' + data.id);
					let services = mainFilter.get('filter.services');
					let problems = mainFilter.get('filter.prbms');
					let symprbms = mainFilter.get('choice.symprbms');
					if (symprbms == undefined) symprbms = {};
					if (choice == undefined) choice = {};
					if ($(input).is(':checked')) {
						let header = $(label).find('.checbox__name').text().trim();
						//let liter = 'С'
						//let color = 'yellow'
						let item        = {
							id: data.id,
							header: header,
							//liter: liter,
							//color: color,
							symptom: data.symptom
						};
						choice[data.id] = item;
						$.each(problems, function (j, prb) {
							if (in_array(data.id, prb.symptoms)) {
								if (symprbms[prb.id] == undefined) {
									symprbms[prb.id] = {
										id: prb.id,
										header: prb.header,
										symptoms: {},
										tags: {}
									};
								}
								symprbms[prb.id].symptoms[symptom.id] = Object.assign({}, prb.category);
								$(symprbms[prb.id].symptoms).each(function (i, cats) {
									cats = array_values(cats);
									$(cats).each(function (j, cat) {
										cat = array_values(cat);
										$(cat).each(function (g, c) {
											if (symprbms[prb.id].tags[c] == undefined) {
												symprbms[prb.id].tags[c] = {
													liter: services[c].name.substring(0, 1).toUpperCase(),
													color: services[c].data.color
												};
											}
										});
									});
								});
							}
						});
					} else {
						$.each(problems, function (j, prb) {
							if (in_array(data.id, prb.symptoms)) {
								delete symprbms[prb.id].symptoms[symptom.id];
								if (count(symprbms[prb.id].symptoms) == 0) {
									delete symprbms[prb.id];
								} else {
									$(symprbms[prb.id].symptoms).each(function (i, cats) {
										cats = array_values(cats);
										$(cats).each(function (j, cat) {
											cat = array_values(cat);
											$(cat).each(function (g, c) {
												if (symprbms[prb.id].tags[c] == undefined) {
													symprbms[prb.id].tags[c] = {
														liter: services[c].name.substring(0, 1).toUpperCase(),
														color: services[c].data.color
													};
												}
											});
										});
									});
								}
							}
						});
						delete choice[data.id];
					}
					mainFilter.set('choice.symptoms', choice);
					mainFilter.set('choice.symprbms', symprbms);
					wbapp.data('choice', this.get('choice'));
					mainFilter.countChoice();
					return false;
				},
				checkChoose() {
					setTimeout(function () {
						$.each(mainFilter.get('choice.services'), function (i, item) {
							$(`[data-tab="services"] label[data-id="${item.id}"] > input`).prop(
								'checked', true);
						});
						$.each(mainFilter.get('choice.problems'), function (i, item) {
							$(`[data-tab="problems"] label[data-id="${item.id}"] > input`).prop(
								'checked', true);
						});
						setTimeout(function () {
							$.each(mainFilter.get('choice.symptoms'), function (i, item) {
								$(mainFilter.find(
									`[data-tab=sympthoms] label[data-id=${item.id}] input`
								)).prop('checked', true);
							});
							mainFilter.countChoice();
						}, 300);
						mainFilter.countChoice();
					}, 300);
				},
				viewService(ev) {
					let data;
					$(ev.node).is('[data-service]') ? data = $(ev.node).data() : data = $(ev.node).parent(
						'label').data();
					let sid   = data.service;
					let popup = $(ev.node).data('popup');
					let title = $(ev.node).parents('.accardeon').find('.accardeon__name').text();
					let form  = $('body').find('div.' + popup + ':first');
					$(form).find('.popup__name').text(title);
					$(form).find('.popup__content').html("");
					wbapp.get('/services/popup/' + sid, function (res) {
						$(form).find('.popup__content').html(res);
						$(form).show();
					});
				},
				viewProblem(ev) {
					let data;
					$(ev.node).is('[data-problem]') ? data = $(ev.node).data() : data = $(ev.node).parent(
						'label').data();
					let sid   = data.problem;
					let popup = $(ev.node).data('popup');
					let title = $(ev.node).parents('.accardeon').find('.accardeon__name').text();
					let form  = $('body').find('div.' + popup + ':first');
					$(form).find('.popup__name').text(title);
					$(form).find('.popup__content').html("");
					wbapp.get('/problems/popup/' + sid, function (res) {
						$(form).find('.popup__content').html(res);
						$(form).show();
					});
				},
				viewSymptom(ev) {
					let data  = $(ev.node).parent('label').data();
					let sid   = data.symptom;
					let popup = $(ev.node).data('popup');
					let title = $(ev.node).parents('.accardeon').find('.accardeon__name').text();
					let form  = $('body').find('div.' + popup + ':first');
					$(form).find('.popup__name').text("");
					$(form).find('.popup__content').html("");
					wbapp.get('/symptoms/popup/' + sid, function (res) {
						$(form).find('.popup__content').html(res);
						$(form).find('.popup__name').text($(form).find(
							'.popup__content [data-category]').data('category'));
						$(form).show();
					});
				},
				createQuote: function (ev) {
					console.log('checked', mainFilter.get('choice.services'));
					var problems = [];
					$('.mainfilter__choice-main .mainfilter-tag').each(function () {
						problems.push($(this).find('a.mainfilter-tag__link').text());
					});
					var symptoms = [];
					$('.mainfilter__symptoms .mainfilter-tag').each(function () {
						symptoms.push($(this).find('a.mainfilter-tag__link').text());
					});

					var title_problems = 'ВЫБРАННЫЕ УСЛУГИ ИЛИ СУЩЕСТВУЮЩИЕ ПРОБЛЕМЫ';
					var title_symptoms = 'ВЕРОЯТНАЯ ПРОБЛЕМАТИКА ПО СИМПТОМАМ';
					var comment        = '';
					if (!!problems.length) {
						comment += title_problems + "\n";
						problems.forEach(function (str) {
							comment += '- ' + str.trim() + ";\n";
						});
						comment += "\n";
					}

					if (!!symptoms.length) {
						comment += title_symptoms + "\n";
						symptoms.forEach(function (str) {
							comment += '- ' + str.trim() + ";\n";
						});
					}

					console.log(comment);

					if (!comment.length) {
						toast('Выберите услугу или укажыте симптомы!');
						return false;
					}
					var form = $(ev.node);
					if ($(form).verify()) {
						var post = $(form).serializeJSON();
						if (!post.client) {
							console.log('try to createProfile: ', post);

							let names = post.fullname.split(' ', 3);
							let keys  = ['last_name', 'first_name', 'middle_name'];
							for (var i = 0; i < names.length; i++) {
								post[keys[i]] = names[i];
							}
							post.phone = str_replace([' ', '+', '-', '(', ')'], '', post.phone);
							wbapp.get('/api/v2/list/users/?role=client&phone=' + post.phone,
								function (data) {
									if (!data.length) {
										wbapp.get('/api/v2/list/users/?email=' + post.email,
											function (data) {
												if (!data.length) {
													post.role      = "client";
													post.role      = "client";
													post.confirmed = 0;
													post.active    = "on";
													wbapp.post('/api/v2/create/users/', post, function (data) {
														if (data.error) {
															wbapp.trigger('wb-save-error', {
																'data': data
															});
														} else {
															createMainfilterQuote(data.id,
																post.client_comment);
														}
													});

												} else {
													toast('Этот e-mail уже используется!', 'Ошибка!', 'error');
													form.find('[name="email"]').focus();
												}
											});
									} else {
										toast('Этот номер уже используется!', 'Ошибка!', 'error');
										form.find('[name="phone"]').focus();
									}
								});
						} else {
							createMainfilterQuote(post.client, comment);
						}
					}

					return false;
				}
			},
			countChoice() {
				let checked = $(this.el).find('.mainfilter__tabs input:checked').length;
				this.set('checked', checked);
			}
		});
	</script>
	<style>
		#mainfilterCounter {
			color         : #fff;
			background    : #000;
			padding       : 5px;
			display       : none;
			position      : fixed;
			bottom        : 20px;
			right         : 20px;
			z-index       : 10;
			border-radius : 7px;
			cursor        : pointer;
		}
		@media (max-width : 767px) {
			#mainfilterCounter {
				display : inline;
			}
		}
	</style>
</view>
<edit header="Основной фильтр">
	<div>
		<wb-module wb="module=yonger&mode=edit&block=common.inc"/>
	</div>
</edit>