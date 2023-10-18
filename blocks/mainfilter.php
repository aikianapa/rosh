<view>
	<div class="mainfilter" id="mainfilter" wb-if="in_array('{{_sess.user.role}}',['','client','admin'])">
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
								<div class="mainfilter__tab-item data-tab-link {{#if act_tab=='services'}}active{{/if}}" data-tab="services" data-tabs="mainfilter">Услуги
								</div>
								<div class="mainfilter__tab-item data-tab-link {{#if act_tab=='problems'}}active{{/if}}" data-tab="problems" data-tabs="mainfilter">
									Проблемы
								</div>
								<div class="mainfilter__tab-item data-tab-link {{#if act_tab=='sympthoms'}}active{{/if}}" data-tab="sympthoms" data-tabs="mainfilter">
									Симптомы
								</div>
							</div>
							<div class="mainfilter__tabs data-tab-wrapper" data-tabs="mainfilter">
								<div class="mainfilter__tab data-tab-item {{#if act_tab=='services'}}active{{/if}}" data-tab="services">

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
															<label class="checkbox mainfilter__checkbox" data-id="{{../../id}}_{{id}}" data-color="{{../../data.color}}" data-cname="{{../../name}}" data-service="{{id}}">
																<input type="checkbox" on-change="toggleService">
																<span></span>
																<div class="checbox__name">{{header}}</div>
																{{#if ../../id != "lab"}}
																	<a class="checbox__link --openpopup" data-popup="--service-l" href="#" on-click="viewService">Подробнее</a>
																{{/if}}
															</label>
														</div>
													{{/each}}
												</div>
											</div>
										</div>
									{{/each}}
								</div>
								<div class="mainfilter__tab data-tab-item {{#if act_tab=='problems'}}active{{/if}}" data-tab="problems">

									{{#if texts.problems.active == 'on'}}
										<p>
											{{texts.problems.data.text}}
										</p>
									{{/if}} {{#each problems}} {{#if id != "gyn" }} {{#if id != "lab" }}
												<div class="accardeon-group" data-group-type="{{id}}">
													<div class="accrdeon__title" data-type="{{id}}">{{name}}</div>
													{{#each cats}} {{#if id != "gyn" }} {{#if id != "lab" }}
																<div class="accardeon">
																	<div class="accardeon__main accardeon__click" data-category="{{id}}" on-click="getProblems">
																		<div class="accardeon__name --{{data.color}}">{{name}}</div>
																	</div>
																	<div class="accardeon__list">
																		<div class="row">
																			{{#each items}}
																				<div class="col-lg-4">
																					<label class="checkbox mainfilter__checkbox" data-id="{{category}}_{{id}}" data-color="{{../../data.color}}" data-cname="{{../../name}}" data-category="{{category}}" data-problem="{{id}}">
																						<input type="checkbox" on-change="toggleProblem">
																						<span></span>
																						<div class="checbox__name">{{header}}</div>
																						<a class="checbox__link --openpopup" data-popup="--service-l" href="#" on-click="viewProblem">Подробнее</a>
																					</label>
																				</div>
																			{{/each}}
																		</div>
																	</div>
																</div>
															{{/if}} {{/if}} {{/each}}
												</div>
											{{/if}} {{/if}} {{/each}}
									<div class="accardeon-group no-border" data-group-type="gyn">

										<div class="accardeon" data-category="{{id}}">
											<div class="accardeon__main accardeon__click" data-category="{{id}}" on-click="getProblems">
												<div class="accrdeon__title">Гинекология</div>
											</div>
											<div class="accardeon__list">
												<div class="row">
													{{#each problems.gyn.cats.gyn.items}}
														<div class="col-lg-4">
															<label class="checkbox mainfilter__checkbox" data-id="{{category}}_{{id}}" data-category="{{category}}" data-problem="{{id}}" data-color="{{../../data.color}}" data-cname="{{../../name}}">
																<input type="checkbox" on-change="toggleProblem">
																<span></span>
																<div class="checbox__name">{{header}}</div>
																<a class="checbox__link --openpopup" data-popup="--service-l" href="#" on-click="viewProblem">Подробнее</a>
															</label>
														</div>
													{{/each}}
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="mainfilter__tab data-tab-item {{#if act_tab=='sympthoms'}}active{{/if}}" data-tab="sympthoms">
									{{#if texts.sympthoms.active == 'on'}}
										<p>
											{{texts.sympthoms.data.text}}
										</p>
									{{/if}}

									<div class="accrdeon__title">Симптомы</div>
									<div class="row">
										{{#each symptoms}}
											<div class="col-lg-4">
												<label class="checkbox mainfilter__checkbox" data-id="{{id}}" data-color="{{../../data.color}}" data-cname="{{../../name}}" data-symptom="{{id}}">
													<input type="checkbox" on-change="toggleSymptom">
													<span></span>
													<div class="checbox__name">{{header}}</div>
													<a class="checbox__link --openpopup" data-popup="--service-l" href="#" on-click="viewSymptom">Подробнее </a>
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
								<div class="mainfilter__tags problems">
									{{#each choice.services}}
										<div class="mainfilter-tag">
											<div class="mainfilter-tag__name">
												<div class="mainfilter-tag__delete" data-id="{{id}}" on-click="delete">
													<svg class="svgsprite _delete">
														<use xlink:href="/assets/img/sprites/svgsprites.svg#delete"></use>
													</svg>
												</div>
												<a class="mainfilter-tag__link" href="#__srv" data-service="{{service}}" data-popup="--service-l" on-click="viewService">{{header}}</a>
											</div>
											<div class="mainfilter-tag__group --{{color}}">{{liter}}</div>
										</div>
									{{/each}}
									{{#each choice.problems}}
										<div class="mainfilter-tag">
											<div class="mainfilter-tag__name">
												<div class="mainfilter-tag__delete" data-id="{{id}}" on-click="delete">
													<svg class="svgsprite _delete">
														<use xlink:href="/assets/img/sprites/svgsprites.svg#delete"></use>
													</svg>
												</div>
												<a class="mainfilter-tag__link" href="#__prb" data-problem="{{problem}}" data-popup="--service-l" on-click="viewProblem">{{header}}</a>
											</div>
											{{#each tags}}
												<div class="mainfilter-tag__group --{{color}}">{{liter}}</div>
											{{/each}}
										</div>
									{{/each}}
								</div>
								<a href="#" class="mainfilter__symptoms-link" on-click="clearProblems">
									<svg class="svgsprite _delete">
										<use xlink:href="/assets/img/sprites/svgsprites.svg#delete"></use>
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
												<div class="mainfilter-tag__delete" data-id="{{id}}" data-problem="{{id}}" on-click="deleteSymPrb">
													<svg class="svgsprite _delete">
														<use xlink:href="/assets/img/sprites/svgsprites.svg#delete"></use>
													</svg>
												</div>
												<a class="mainfilter-tag__link" href="#__sym" data-problem="{{id}}" data-popup="--service-l" on-click="viewProblem">{{header}}</a>
											</div>
											{{#each tags}}
												<div class="mainfilter-tag__group --{{.color}}">{{.liter}}</div>
											{{/each}}
										</div>
									{{/each}}
								</div>
								<a href="#" class="mainfilter__symptoms-link" on-click="clearSymptoms">
									<svg class="svgsprite _delete">
										<use xlink:href="/assets/img/sprites/svgsprites.svg#delete"></use>
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
											<input class="input__control" required type="text" name="fullname" value="{{user.fullname}}" placeholder="ФИО">
											<div class="input__placeholder">ФИО</div>
										</div>
										<div class="input input--grey">
											<input class="input__control intl-tel" type="tel" name="phone" value="{{user.phone}}" required>
											<div class="input__placeholder active">Номер телефона</div>
										</div>
										<div class="input input--grey">
											<input class="input__control" type="email" name="email" value="{{user.email}}" placeholder="Ваш е-мейл" reuired>
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
									<div class="mainfilter__form-bottom">
										Также, после отправки формы ,вам будет автоматически сгенерирован личный кабинет на
										сайте, доступ к которому вы можете получить в правом верхнем углу по номеру телефона,
										указанному при заполнении.
									</div>
								{{/if}}
							</form>
							<div class="mainfilter__succed"></div>
						</div>
					</div>
					{{else}}
						<div class="mt-5 col-12">
							<p class="pt-5 text-center">Подождите, выполняется загрузка...</p>
						</div>
				{{/filter}}
			</div>
		</template>
	</div>
	<script wbapp>
		if (wbapp.data('choice') == undefined) wbapp.data('choice', {});
		var createMainfilterQuote = function(client_id, client_comment) {
			var quote = {};
			quote.group = 'quotes';
			quote.status = 'new';
			quote.pay_status = 'free';
			quote.client = client_id;
			quote.priority = 0;
			quote.marked = false;

			quote.comment = '';
			quote.recommendation = '';
			quote.description = '';
			quote.client_comment = '';
			quote.price = 0;

			quote.event_date = '';
			quote.event_time = '';
			quote.event_time_start = '';
			quote.event_time_end = '';

			quote.longterm_date_end = '';
			quote.longterm_title = '';

			quote.photos = {
				before: [],
				after: []
			};

			quote.comment = '';
			quote.recommendation = '';
			quote.description = '';
			quote.client_comment = client_comment;
			quote.is_mainfilter_quote = 1;
			quote.__token = wbapp._settings.devmode === 'on' ? '123' : wbapp._session.token;
			window.api.post(
				'/api/v2/create/records/', quote).then(
				function(data) {
					if (data.error) {
						wbapp.trigger('wb-save-error', {
							'data': data
						});
					} else {
						$('.mainfilter-tag__delete').each(function() {
							$(this).trigger('click');
						});
						$('.mainfilter__symptoms-link').trigger('click');
						$('.mainfilter__close.--closefilter').trigger('click');

						popupMessage('Заявка создана!', 'Мы перезвоним Вам в ближайшее время!',
							'', '',
							function(d) {});
						if (typeof window.load == 'function') {
							window.load();
						}
					}
				});
		};
		window.mainFilterState = {
			save(force) {
				if (force) {
					var _is_active = $('#mainfilter').is(':visible') ? 1 : 0;
					var _mf_page = sessionStorage["mf-state--page"];
					if (!_is_active && (_mf_page !== location.pathname)) {
						return;
					}
					sessionStorage["mf-state--active"] = _is_active;
					if (!sessionStorage["mf-state--active"]) {
						sessionStorage.removeItem("mf-state--active");
						sessionStorage.removeItem("mf-state--page");
						sessionStorage.removeItem("mf-state--pos");
						sessionStorage.removeItem("mf-state--tab");
					} else {
						sessionStorage["mf-state--page"] = location.pathname;
						sessionStorage["mf-state--pos"] = $(window).scrollTop();
						sessionStorage['mf-state--tab'] = $('.mainfilter__tab-item.data-tab-link.active')
							.attr('data-tab');
					}
				} else {
					window.onbeforeunload = function() {
						var _is_active = $('#mainfilter').is(':visible') ? 1 : 0;
						var _mf_page = sessionStorage["mf-state--page"];
						if (!_is_active && (_mf_page !== location.pathname)) {
							return;
						}
						sessionStorage["mf-state--active"] = _is_active;
						if (!sessionStorage["mf-state--active"]) {
							sessionStorage.removeItem("mf-state--active");
							sessionStorage.removeItem("mf-state--page");
							sessionStorage.removeItem("mf-state--pos");
							sessionStorage.removeItem("mf-state--tab");
						} else {
							sessionStorage["mf-state--page"] = location.pathname;
							sessionStorage["mf-state--pos"] = $(window).scrollTop();
							sessionStorage['mf-state--tab'] = $('.mainfilter__tab-item.data-tab-link.active')
								.attr('data-tab');
						}
					};
				}
			},
			load() {
				var _is_active = sessionStorage["mf-state--active"];
				var _mf_page = sessionStorage["mf-state--page"];
				if (_is_active != 1) {
					sessionStorage.removeItem("mf-state--active");
					sessionStorage.removeItem("mf-state--page");
					sessionStorage.removeItem("mf-state--pos");
					sessionStorage.removeItem("mf-state--tab");
					return;
				} else if (_mf_page !== location.pathname) {
					return;
				}
				setTimeout(function() {
				//	$('.--openfilter')[0].click();

					var _tab = sessionStorage['mf-state--tab'];
					if (!!_tab && typeof _tab !== 'undefined') {
						console.log('tab', _tab);
						setTimeout(function() {
							$('.mainfilter__tab-item.data-tab-link[data-tab="' + _tab + '"]')[0]
								.click();
						}, 1500);
						//sessionStorage.removeItem("mf-state--tab");
					}
					var _pos = sessionStorage["mf-state--pos"];
					if (_pos) {
						setTimeout(function() {
							$(window).scrollTop(_pos);
						}, 650);
						sessionStorage.removeItem("mf-state--pos");
					}
				}, 400);
			}
		};
		mainFilterState.save();
		window.mainFilter = new Ractive({
			el: '#mainfilter',
			template: document.querySelector("#mainfilter template").innerHTML,
			data: {
				choice: wbapp.data('choice'),
				filter: {},
				checked: 0,
				user: wbapp._session.user
			},
			loaded: false,
			on: {
				init() {
					var self = this;
				},
				open() {
					this.loaded === false ? this.fire('mainFilterLoad') : null
				},
				mainFilterLoad() {
					var self = this;
					utils.api.get('/api/v2/func/problems/mainfilter').then((data) => {
            if (sessionStorage['mf-state--tab'] && sessionStorage['mf-state--tab'] !==
              'undefined') {
              data['act_tab'] = sessionStorage['mf-state--tab'];
            } else {
              data['act_tab'] = 'services'
            }
            self.set('filter', data);
            self.fire('checkChoose');
            mainFilterState.load();
            // self.loaded = true
          })
				},
				complete() {
					console.log('filter ready');
				},
				clearSymptoms() {
					$(document).find('.mainfilter__tab[data-tab="sympthoms"] input[type="checkbox"]:checked').prop(
						'checked', false);
					$(document).find('.mainfilter__symptoms .mainfilter-tag').remove();

					mainFilter.set('choice.symprbms', {});
					mainFilter.set('choice.symptoms', {});
					wbapp.data('choice.symprbms', {});
					wbapp.data('choice.symptoms', {});
					mainFilter.countChoice();
				},
				clearProblems() {
					$(document).find('.mainfilter__tab[data-tab="services"] input[type="checkbox"]:checked').prop(
						'checked', false);
					$(document).find('.mainfilter__tab[data-tab="problems"] input[type="checkbox"]:checked').prop(
						'checked', false);
					$(document).find('.mainfilter__tags.problems .mainfilter-tag').remove();

					mainFilter.set('choice.problems', {});
					wbapp.data('choice.problems', {});
					mainFilter.set('choice.services', {});
					wbapp.data('choice.services', {});


					mainFilter.countChoice();
				},
				toTop() {
					document.getElementById(`mainfilterRight`).scrollIntoView();
				},
				delete(ev) {
					did = $(ev.node).data('id');
					$(document).find('#mainfilter label[data-id="' + did + '"]').trigger('click');
					//console.log(did, $(document).find('#mainfilter label[data-id="' + did + '"]'));
					mainFilter.countChoice();
				},
				deleteSymPrb(ev) {
					let data = $(ev.node).data();
					let choice = mainFilter.get('choice');
					let count = 0;
					delete choice.symprbms[data.id];
					$.each(choice.symprbms, function(j, sym) {
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
					let input = $(ev.node);
					let label = $(input).parent('.mainfilter__checkbox');
					let data = $(label).data();
					let cid = $(label).parents('[data-category]').data('category');
					let choice = mainFilter.get('choice.services');
					if (choice == undefined) choice = {};

					if ($(input).is(':checked')) {
						let header = $(label).find('.checbox__name').text().trim();
						let liter = $(label).data('cname').substring(0, 1).toUpperCase();
						let color = $(label).data('color');
						let item = {
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
					let input = $(ev.node);
					let label = $(input).parent('.mainfilter__checkbox');
					let data = $(label).data();
					let cid = $(label).parents('[data-category]').data('category');
					let problem = data.problem;
					let choice = mainFilter.get('choice.problems');
					let header = $(label).find('.checbox__name').text().trim();
					let liter = $(label).data('cname').substring(0, 1).toUpperCase();
					let color = $(label).data('color');
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
						$(item.tags).each(function(i, tag) {
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
					let input = $(ev.node);
					let label = $(input).parent('.mainfilter__checkbox');
					let data = $(label).data();
					let choice = mainFilter.get('choice.symptoms');
					let symptom = mainFilter.get('filter.symptoms.' + data.id);
					let services = mainFilter.get('filter.services');
					let problems = mainFilter.get('filter.prbms');
					let symprbms = mainFilter.get('choice.symprbms');
					if (symprbms == undefined) symprbms = {};
					if (choice == undefined) choice = {};
					if ($(input).is(':checked')) {
						let header = $(label).find('.checbox__name').text().trim();
						//let liter = 'С'
						//let color = 'yellow'
						let item = {
							id: data.id,
							header: header,
							//liter: liter,
							//color: color,
							symptom: data.symptom
						};
						choice[data.id] = item;
						$.each(problems, function(j, prb) {
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
								$(symprbms[prb.id].symptoms).each(function(i, cats) {
									cats = array_values(cats);
									$(cats).each(function(j, cat) {
										cat = array_values(cat);
										$(cat).each(function(g, c) {
											if (symprbms[prb.id].tags[c] ==
												undefined) {
												symprbms[prb.id].tags[c] = {
													liter: services[c].name
														.substring(0, 1)
														.toUpperCase(),
													color: services[c].data
														.color
												};
											}
										});
									});
								});
							}
						});
					} else {
						$.each(problems, function(j, prb) {
							if (in_array(data.id, prb.symptoms)) {
								delete symprbms[prb.id].symptoms[symptom.id];
								if (count(symprbms[prb.id].symptoms) == 0) {
									delete symprbms[prb.id];
								} else {
									$(symprbms[prb.id].symptoms).each(function(i, cats) {
										cats = array_values(cats);
										$(cats).each(function(j, cat) {
											cat = array_values(cat);
											$(cat).each(function(g, c) {
												if (symprbms[prb.id].tags[c] ==
													undefined) {
													symprbms[prb.id].tags[c] = {
														liter: services[c].name
															.substring(0, 1)
															.toUpperCase(),
														color: services[c].data
															.color
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
					setTimeout(function() {
						$.each(mainFilter.get('choice.services'), function(i, item) {
							$(`[data-tab="services"] label[data-id="${item.id}"] > input`).prop(
								'checked', true);
							$(`[data-tab="services"] label[data-id="${item.id}"]`).parents(
									'.accardeon').find('.accardeon__click')
								.trigger('click');
						});
						$.each(mainFilter.get('choice.problems'), function(i, item) {
							$(`[data-tab="problems"] label[data-id="${item.id}"] > input`).prop(
								'checked', true);
							$(`[data-tab="problems"] label[data-id="${item.id}"]`).parents(
									'.accardeon').find('.accardeon__click')
								.trigger('click');

						});
						setTimeout(function() {
							$.each(mainFilter.get('choice.symptoms'), function(i, item) {
								$(`[data-tab="sympthoms"] label[data-id="${item.id}"] > input`)
									.prop(
										'checked', true);
							});
							mainFilter.countChoice();
						}, 300);
						// mainFilter.countChoice();
					}, 300);
				},
				viewService(ev) {
					let data;
					$(ev.node).is('[data-service]') ? data = $(ev.node).data() : data = $(ev.node).parent(
						'label').data();
					let sid = data.service;
					let popup = $(ev.node).data('popup');
					let title = $(ev.node).parents('.accardeon').find('.accardeon__name').text();
					let form = $('body').find('div.' + popup + ':first');
					$(form).find('.popup__name').text(title);
					$(form).find('.popup__content').html("");
					wbapp.get('/services/popup/' + sid, function(res) {
						$(form).find('.popup__content').html(res);
						$(form).show();
					});
				},
				viewProblem(ev) {
					let data;
					$(ev.node).is('[data-problem]') ? data = $(ev.node).data() : data = $(ev.node).parent(
						'label').data();
					let sid = data.problem;
					let popup = $(ev.node).data('popup');
					let title = $(ev.node).parents('.accardeon').find('.accardeon__name').text();
					let form = $('body').find('div.' + popup + ':first');
					$(form).find('.popup__name').text(title);
					$(form).find('.popup__content').html("");
					wbapp.get('/problems/popup/' + sid, function(res) {
						$(form).find('.popup__content').html(res);
						$(form).show();
					});
				},
				viewSymptom(ev) {
					let data = $(ev.node).parent('label').data();
					let sid = data.symptom;
					let popup = $(ev.node).data('popup');
					let title = $(ev.node).parents('.accardeon').find('.accardeon__name').text();
					let form = $('body').find('div.' + popup + ':first');
					$(form).find('.popup__name').text("");
					$(form).find('.popup__content').html("");
					wbapp.get('/symptoms/popup/' + sid, function(res) {
						$(form).find('.popup__content').html(res);
						$(form).find('.popup__name').text($(form).find(
							'.popup__content [data-category]').data('category'));
						$(form).show();
					});
				},
				createQuote: function(ev) {
					console.log('checked', mainFilter.get('choice.services'));
					var problems = [];
					var services = [];
					$('.mainfilter__choice-main .mainfilter-tag').each(function() {
						var el = $(this).find('a.mainfilter-tag__link');
						if (!!el.data('service')) {
							services.push(el.text());
						} else {
							problems.push(el.text());
						}
					});
					var checked_symptoms = [];
					$('[data-tab="sympthoms"] .checkbox.mainfilter__checkbox:has(input:checked)').each(
						function() {
							checked_symptoms.push($(this).find('.checbox__name').text());
						});
					var symptoms = [];
					$('.mainfilter__symptoms .mainfilter-tag').each(function() {
						symptoms.push($(this).find('a.mainfilter-tag__link').text());
					});

					var title_services = 'выбранные услуги';
					var title_problems = 'выбранные проблемы';
					var title_checked_symptoms = 'выбранные симптомы';
					var title_symptoms = 'вероятная проблематика по симптомам';
					var comment = '';
					if (!!services.length) {
						comment += title_services + "\n";
						services.forEach(function(str) {
							comment += '- ' + str.trim() + ";\n";
						});
						comment += "\n";
					}

					if (!!problems.length) {
						comment += title_problems + "\n";
						problems.forEach(function(str) {
							comment += '- ' + str.trim() + ";\n";
						});
						comment += "\n";
					}

					if (!!checked_symptoms.length) {
						comment += title_checked_symptoms + "\n";
						checked_symptoms.forEach(function(str) {
							comment += '- ' + str.trim() + ";\n";
						});
						comment += "\n";
					}

					if (!!symptoms.length) {
						comment += title_symptoms + "\n";
						symptoms.forEach(function(str) {
							comment += '- ' + str.trim() + ";\n";
						});
					}
					if (!comment.length) {
						toast('Выберите услугу или укажите симптомы!');
						return false;
					}
					var form = $(ev.node);
					if ($(form).verify()) {
						var post = $(form).serializeJSON();
						if (!post.client) {
							console.log('try to createProfile: ', post);

							let names = post.fullname.split(' ', 3);
							let keys = ['last_name', 'first_name', 'middle_name'];
							for (var i = 0; i < names.length; i++) {
								post[keys[i]] = names[i];
							}
							var _token = wbapp._settings.devmode === 'on' ? '123' : wbapp._session.token;
							post.phone = str_replace([' ', '-', '(', ')'], '', post.phone);
							var _req_phone = str_replace('+', '', post.phone);
							window.api.get('/api/v2/list/users/?role=client&phone~=' + _req_phone +
								'&__token=' + _token).then(
								function(data) {
									if (!data.length) {
										window.api.get('/api/v2/list/users/?email=' + post.email +
											'&__token=' + _token).then(
											function(data) {
												if (!data.length) {
													post.role = "client";
													post.role = "client";
													post.confirmed = 0;
													post.active = "on";
													post.__token = _token;
													mainFilter.fire('clearSymptoms')
													mainFilter.fire('clearProblems')
													window.api.post('/api/v2/create/users/', post).then(
														function(data) {
															if (data.error) {
																wbapp.trigger('wb-save-error', {
																	'data': data
																});
															} else {
																createMainfilterQuote(data.id,
																	comment);
															}
														});

												} else {
													toast('Этот e-mail уже используется!', 'Ошибка!',
														'error');
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
							mainFilter.fire('clearSymptoms')
							mainFilter.fire('clearProblems')
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
		$(document).on('click', '.btn.btn--white.--openfilter', function() {
			mainFilterState.save(true);
			initPlugins();
		});
		$(document).on('click', '.popup.--service-l a.btn.btn--black', function() {
			mainFilterState.save(true);
		});

		setTimeout(async () => {
			initPlugins($(mainFilter.el));
		}, 500);
	</script>
</view>
<edit header="Основной фильтр">
	<div>
		<wb-module wb="module=yonger&mode=edit&block=common.inc" />
	</div>
</edit>