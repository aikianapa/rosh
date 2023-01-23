<view>
	<div wb-if="'{{_sess.user.role}}'=='client'">
		<div class="popup --record">
			<template id="popupRecord">
				<div class="popup__overlay"></div>
				<form class="popup__panel popup__panel-wide" on-submit="submit">
					<button class="popup__close" on-click="cancel">
						<svg class="svgsprite _close">
							<use xlink:href="/assets/img/sprites/svgsprites.svg#close"></use>
						</svg>
					</button>
					<div class="popup__name text-bold">Запись на прием</div>
					<div class="text-bold mb-10">Разделы услуг</div>
					<div class="popups__text-chexboxs">
						{{#each categories}}
						<label class="text-radio">
							<input type="radio" name="service_category" value="{{id}}" on-click="selectCategory">
							<span>{{name}}</span>
						</label>
						{{/each}}
					</div>
					<div class="input" data-hide="service-search">
						<input class="search__input search-services" type="text" placeholder="Поиск по услугам">
						<div class="search__drop"></div>
						<button class="search__btn" type="button">
							<svg class="svgsprite _search">
								<use xlink:href="/assets/img/sprites/svgsprites.svg#search"></use>
							</svg>
						</button>
					</div>
					<label class="checkbox checkbox--record hider-checkbox" data-hide-input="service-search">
						<input class="checkbox-hidden-next-form" type="checkbox" name="no_services" value="1">
						<span></span>
						<div class="checbox__name">Мне лень искать в списке, скажу администратору</div>
					</label>
					<label class="checkbox checkbox--record show-checkbox" data-show-input="service">
						<input class="checkbox-visible-next-form" type="checkbox" name="for_consultation" value="1">
						<span></span>
						<div class="checbox__name">Консультация врача</div>
					</label>
					<div class="select-form" style="display: none;" data-show="service">
						<div class="text-bold mb-20">Тип события</div>
						<div class="popups__text-chexboxs">
							<label class="text-radio">
								<input type="radio" name="type" value="clinic" checked on-click="checkConsultation">
								<span>В клинике</span>
							</label>
							<label class="text-radio switch-blocks">
								<input type="radio" name="type" value="online" on-click="checkConsultation">
								<span>Онлайн</span>
							</label>
						</div>
					</div>

					<label class="checkbox checkbox--record hider-checkbox" data-hide-input="expert">
						<input class="checkbox-hidden-next-form" type="checkbox" name="no_experts" value="1">
						<span></span>
						<div class="checbox__name">Я не знаю, кого выбрать</div>
					</label>
					<div class="select-form" data-hide="expert">
						<div class="select">
							<div class="select__main">
								<div class="select__placeholder">Выберите специалиста</div>
								<div class="select__values"></div>
							</div>
							<div class="select__list">
								{{#each experts}}
								<div class="select__item select__item--checkbox">
									<label class="checkbox checkbox--record">
										<input type="checkbox" name="experts[]" value="{{id}}">
										<span></span>
										<div class="checbox__name">
											<div class="select__name">{{name}}</div>
										</div>
									</label>
								</div>
								{{/each}}
							</div>
						</div>
					</div>
					<div class="admin-editor__patient" data-hide="service-search">
						<div class="text-bold mb-10">Выбраны услуги</div>
					</div>
					<div class="admin-editor__summ mb-3" data-hide="service-search">
						<p>Всего</p>
						<input type="hidden" name="price" value="0">
						<p class="price">0 ₽
							<sup>
								<b>*</b>
							</sup>
						</p>
					</div>
					<div class="mb-4 text-right" data-hide="service-search">
						<b>*</b>&nbsp;
						<small>стоимость указана приблизительно, она может быть изменена в зависимости от фактически оказанных услуг</small>
					</div>
					<button class="btn btn--black form__submit" type="submit"> Записаться </button>
				</form>

				<div class="popup__panel --succed">
					<button class="popup__close">
						<svg class="svgsprite _close">
							<use xlink:href="/assets/img/sprites/svgsprites.svg#close"></use>
						</svg>
					</button>
					<div class="popup__name text-bold">Запись на прием</div>
					<h3 class="h3">Успешно!</h3>
					<p class="text-grey">Мы перезвоним Вам в ближайшее время.</p>
				</div>
			</template>
		</div>

		<div class="popup --analize-interpretation">
			<template id="popupAnalizeInterpretation">
				<div class="popup__overlay"></div>
				<div class="popup__panel">
					<button class="popup__close">
						<svg class="svgsprite _close">
							<use xlink:href="/assets/img/sprites/svgsprites.svg#close"></use>
						</svg>
					</button>
					<div class="popup__name text-bold">{{catalog.spec_service.analyses_interpretation.header}}</div>
					<form class="popup__form" method="post" on-submit="submit">
						<input type="hidden" name="pay_status" value="free">
						<input type="hidden" name="for_consultation" value="1">
						<input type="hidden" name="group" value="quotes">
						<input type="hidden" name="status" value="new">
						<input type="hidden" name="title" value="Расшифровка анализов">

						<p class="text-grey mb-30">Нажмите на способ получения расшифровки анализов</p>
						<div class="popups__text-chexboxs">
							<label class="text-radio">
								<input type="radio" name="type" value="clinic" checked>
								<span>В клинике</span>
							</label>
							<label class="text-radio switch-blocks">
								<input type="radio" name="type" value="online">
								<span>Онлайн</span>
							</label>
						</div>
						<button class="btn btn--black popup__change form__submit" type="submit">
							Оставить заявку
						</button>
					</form>

				</div>
				<div class="popup__panel --succed">
					<button class="popup__close">
						<svg class="svgsprite _close">
							<use xlink:href="/assets/img/sprites/svgsprites.svg#close"></use>
						</svg>
					</button>
					<div class="popup__name text-bold">Заявка на прием</div>
					<h3 class="h3">Успешно!</h3>
					<p class="text-grey">Мы перезвоним Вам в ближайшее время.</p>
				</div>
			</template>
		</div>

		<div class="popup --pay">
			<template id="popupPay">
				<div class="popup__overlay"></div>
				<div class="popup__panel">
					<button class="popup__close">
						<svg class="svgsprite _close">
							<use xlink:href="/assets/img/sprites/svgsprites.svg#close"></use>
						</svg>
					</button>
					<div class="popup__name text-bold">Внести предоплату</div>
					<h3 class="h3">В ближайшее время с вами свяжутся для определения удобной даты</h3>
					<div class="text-grey text-small mb-10">Стоимость услуги</div>
					<div class="popup-summ --aifs mb-20">
						<div class="popup-summ__big">{{this.price}} ₽</div>
						<div class="popup-summ__small">Предоплата - {{this.pay_price}} ₽</div>
					</div>
					<div class="popup__description text-grey mb-30">
						Для подтверждения необходимо произвести оплату в размере 20% от стоимости
					</div>
					<!--!!! change `action` address on PROD. !!!-->
					<form on-submit="submit" action="https://demo.paykeeper.ru/create/" method="POST" target="_blank">
						<input type='hidden' name='sum' value='{{this.pay_price}}' />
						<input type='hidden' name='orderid' value='{{this.id}}' />
						<input type='hidden' name='clientid' value='{{this.client}}' />
						<button class="btn btn--black form__submit" type="submit">
							Внести предоплату
						</button>
					</form>
				</div>
				<div class="popup__panel --succed-pay d-none">
					<button class="popup__close">
						<svg class="svgsprite _close">
							<use xlink:href="/assets/img/sprites/svgsprites.svg#close"></use>
						</svg>
					</button>
					<div class="popup__name text-bold">Внести предоплату</div>
					<h3 class="h3">Успешно!</h3>
					<p class="text-grey">Информация о предстоящем приеме будет доступна в Личном кабинете после подтверждения оплаты</p>
				</div>
			</template>
		</div>
	</div>

	<div class="popup --message">
		<template id="popupMessage">
			<div class="popup__overlay"></div>
			<div class="popup__panel">
				<button class="popup__close" on-click="close">
					<svg class="svgsprite _close">
						<use xlink:href="/assets/img/sprites/svgsprites.svg#close"></use>
					</svg>
				</button>
				<div class="popup__name text-bold">{{caption}}</div>
				<h3 class="h3">{{title}}</h3>
				<p class="text-grey">{{subtitle}}</p>
				<div>
					{{{html}}}
				</div>
			</div>
		</template>
	</div>

	<div wb-if="'{{_sess.user.role}}'=='main'">
		<div class="popup --record-editor">
			<template id="popupRecordEditor">
				<div class="popup__overlay"></div>
				<div class="popup__panel popup__panel-wide">
					<button class="popup__close">
						<svg class="svgsprite _close">
							<use xlink:href="/assets/img/sprites/svgsprites.svg#close"></use>
						</svg>
					</button>
					<div class="popup__name text-bold">Записать пациента на прием</div>
					<form class="record-edit popup__form" on-submit="submit" data-record="{{record.id}}">
						<p class="text-bold text-big mb-20">{{client.fullname}}</p>
						<div class="row">
							<div class="col-md-12">
								<input type="hidden" value="{{ record.id }}" name="id"> {{#if record.spec_service}}
								<input type="hidden" name="spec_service" value="{{record.spec_service}}">
								<input type="hidden" name="title" value="{{@global.catalog.spec_service[record.spec_service].header}}"> {{else}}
								<div class="admin-editor__event mb-20">
									<div class="search__block --flex --aicn">
										<div class="input">
											<input class="popup-services-list search__input search-services" type="text" placeholder="Поиск по услугам" autocomplete="off">
											<div class="search__drop"></div>
											<button class="search__btn" type="button">
												<svg class="svgsprite _search">
													<use xlink:href="/assets/img/sprites/svgsprites.svg#search"></use>
												</svg>
											</button>
										</div>
									</div>
								</div>
								<div class="admin-editor__event mb-20">
									<!-- services-select.dropdown -->
								</div>
								{{/if}}

								<div class="admin-editor__type-event">

									<div class="row">
										<div class="col-md-6">
											<label class="checkbox checkbox--record show-checkbox" data-show-input="service">
												{{#if record.for_consultation=== '1' }}
												<input class="checkbox-visible-next-form" type="checkbox" checked name="for_consultation" value="1"> {{else}}
												<input class="checkbox-visible-next-form" type="checkbox" name="for_consultation" value="1"> {{/if}}
												<span></span>
												<div class="checbox__name">Консультация врача</div>
											</label>
										</div>
										<div class="col-md-6" data-show="service">
											<p class="mb-10">Тип события</p>
											<div class="popups__text-chexboxs">
												{{#each @global.catalog.quoteType as qt}}
												<label class="text-radio" name="type" value="{{ qt.id }}">
													{{#if qt.id === record.type }}
													<input type="radio" name="type" value="{{ qt.id }}" checked on-click="checkConsultation"> {{else}}
													<input type="radio" name="type" value="{{ qt.id }}" on-click="checkConsultation"> {{/if}}
													<span>{{qt.name}}</span>
												</label>
												{{/each}}
											</div>
										</div>
									</div>
									<div class="row">
										{{#if record.spec_service}} {{else}}
										<div class="col-md-6">
											<div class="select-form select-checkboxes">
												<div class="select select_experts">
													<div class="select__main">
														<div class="select__placeholder">Выберите специалиста</div>
														<div class="select__values"></div>
													</div>
													<div class="select__list">
														{{#each @global.catalog.experts}}
														<div class="select__item select__item--checkbox">
															<label class="checkbox checkbox--record">
																{{#if @global.utils.arr.search(.id, record.experts)}}
																<input type="checkbox" class="checked" name="experts[]" checked value="{{.id}}" required> {{else}}
																<input type="checkbox" name="experts[]" value="{{.id}}"> {{/if}}
																<span></span>
																<div class="checbox__name">
																	<div class="select__name">{{name}}</div>
																</div>
															</label>
														</div>
														{{/each}}
													</div>
												</div>
											</div>
										</div>
										{{/if}}
										<div class="col-md-6">
											<div class="row">
												<div class="col-md-12">
													<div class="input input-lk-calendar input--grey">
														<input class="input__control datepickr" name="event_date" value="{{ @global.utils.dateForce(record.event_date) }}" autocomplete="off"
														 type="text" placeholder="Выбрать дату и время">
														<div class="input__placeholder">Выбрать дату</div>
													</div>
												</div>
											</div>
											<div class="row event-time">
												<div class="col-md-6">
													<div class="calendar input mb-30">
														<input class="input__control timepickr event-time-start" type="text" name="event_time_start" value="{{record.event_time_start}}"
														 data-min-time="09:00" data-max-time="21:00" autocomplete="off" pattern="[0-9]{2}:[0-9]{2}" required>
														<div class="input__placeholder">Время (начало)</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="calendar input mb-30">
														<input class="input__control timepickr event-time-end" type="text" name="event_time_end" value="{{record.event_time_end}}"
														 data-min-time="09:00" autocomplete="off" data-max-time="21:00" pattern="[0-9]{2}:[0-9]{2}" required>
														<div class="input__placeholder">Время (конец)</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="admin-editor__patient">
									<div class="text-bold mb-10">Выбраны услуги</div>
									{{#if record.spec_service}}
									<div class="search__drop-item">
										<input type="hidden" name="services[]" value="">
										<div class="search__drop-name">
											{{@global.catalog.spec_service[record.spec_service].header}}
										</div>
										<div class="search__drop-right">
											<div class="search__drop-summ">{{@global.catalog.spec_service[this.spec_service].price}} ₽</div>
										</div>
									</div>
									{{else}} {{#each record.service_prices: idx, key}}
									<div class="search__drop-item" data-index="{{idx}}" data-id="{{service_id}}-{{price_id}}" data-service_id="{{service_id}}"
									 data-price="{{price}}">
										<input type="hidden" name="services[]" value="{{service_id}}">
										<input type="hidden" name="service_prices[{{service_id}}-{{price_id}}][service_id]" value="{{service_id}}">
										<input type="hidden" name="service_prices[{{service_id}}-{{price_id}}][price_id]" value="{{price_id}}">
										<input type="hidden" name="service_prices[{{service_id}}-{{price_id}}][name]" value="{{name}}">
										<input type="hidden" name="service_prices[{{service_id}}-{{price_id}}][price]" value="{{price}}">
										<div class="search__drop-name">
											<div class="search__drop-delete">
												<svg class="svgsprite _delete">
													<use xlink:href="/assets/img/sprites/svgsprites.svg#delete"></use>
												</svg>
											</div>
											<div class="search__drop-tags">
												{{#each @global.catalog.servicePrices[this.service_id+'-'+this.price_id].tags}}
												<div class="search__drop-tag --{{.color}}">{{this.tag}}</div>
												{{/each}}
											</div>
											{{name}}
										</div>
										<label class="search__drop-right">
											<div class="search__drop-summ">{{ @global.utils.formatPrice(this.price) }} ₽</div>
										</label>
									</div>
									{{/each}} {{/if}}
								</div>

								<div class="admin-editor__summ">
									<p>Всего</p>
									<input type="hidden" name="price" value="{{record.price}}">
									<p class="price">{{ @global.utils.formatPrice(record.price) }} ₽</p>
								</div>

								<button class="btn btn--white" type=submit>Сохранить</button>
							</div>
						</div>
					</form>
				</div>
			</template>
		</div>
		<script wbapp>
			window.popupEvent = function(client, _record, onSaved) {
				return new Ractive({
					el: '.popup.--record-editor',
					template: wbapp.tpl('#popupRecordEditor').html,
					data: {
						client: client,
						record: _record || {},
						'experts': catalog.experts,
						'categories': catalog.categories,
						'services': catalog.services
					},
					on: {
						complete() {
							initServicesSearch($('.search-services'), catalog.servicesList);
							initPlugins();
							if (!!$('.select .select__item input:checked').length) {
								$('.select.select_experts .select__item').trigger('click');
							}
							$(this.el).show();
							console.log('show');
						},

						checkConsultation(ev) {
							var ght = 0;
							var lv = 0;
							console.log(ev);
							if ($(ev.node).is(':checked') && $(ev.node).val() == 'online') {
								ght = parseInt(catalog.spec_service.consultation.price);
							} else {
								ght = 0;
							}
							var price = 0;
							var prev_price = $(ev.node).parents('form').find('[name="price"]').val();
							if (!!prev_price) {
								price = parseInt(prev_price);
							}
							if (ght === 0) {
								if ($(ev.node).parents('form').find('[name="price"]')
									.hasClass('consultation')) {
									price -= catalog.spec_service.consultation.price;
								}
								$(ev.node).parents('form').find('[name="price"]')
									.removeClass('consultation');
							} else {
								price += ght;
								$(ev.node).parents('form').find('[name="price"]')
									.addClass('consultation');
							}
							console.log(ght, price);
							$(ev.node).parents('form').find('[name="price"]').val(price);
							$(ev.node).parents('form').find('.price')
								.html(utils.formatPrice(price) +
									' ₽<sup><b>*</b></sup>');
						},
						submit(ev) {
							console.log('saving...', ev);
							var edit_mode = (!!_record && !!_record.id);
							let $form = $(ev.node);
							let uid = this.get('client.id');
							if ($form.verify()) {
								let new_data = $form.serializeJSON();
								new_data.group = 'events';
								new_data.price = parseInt(new_data.price);
								if (!edit_mode) {
									new_data.status = 'upcoming';
									new_data.pay_status = new_data.price ? 'unpay' : 'free';

									new_data.priority = 0;
									new_data.marked = false;
									new_data.photos = {
										before: [],
										after: []
									};
									new_data.client = uid;
								}

								if (new_data.group === 'events' && !new_data.event_date) {
									toast_error('Необходимо выбрать дату/время события');
									$($(ev.node).parents('form')).find('[name="event_date"]')
										.focus();
									return false;
								}
								if (new_data.group === 'events' && !new_data.experts) {
									toast_error('Необходимо выбрать специалиста');
									$($(ev.node).parents('form'))
										.find('.select_experts')
										.focus();
									return false;
								}
								if (new_data.group === 'events' && !new_data.price) {
									toast_error('Необходимо выбрать услугу');
									$($(ev.node).parents('form'))
										.find('.popup-services-list')
										.focus();
									return false;
								}
								new_data.event_date = utils.dateForce(new_data.event_date);
								new_data.price = parseInt(new_data.price);

								console.log('saving...', new_data);

								utils.api.post('/api/v2/' + (edit_mode ? 'update' : 'create') +
										'/records/' +
										(edit_mode ? _record.id : ''), new_data)
									.then(function(res) {
										if (!!onSaved) {
											onSaved(res);
										}
									});

							}

							return false;
						}
					},
					close() {
						$(this.el).hide();
					}
				});
			};
		</script>

		<div class="popup --photo">
			<template id="popupPhoto">
				<div class="popup__overlay"></div>
				<div class="popup__panel popup__panel-wide">
					<button class="popup__close">
						<svg class="svgsprite _close">
							<use xlink:href="/assets/img/sprites/svgsprites.svg#close"></use>
						</svg>
					</button>
					<div class="popup__name text-bold">Добавить фото</div>
					<form class="popup__form" on-submit="submit">
						{{#if record}}
						<input type="hidden" name="id" value="{{record.id}}">
						<input type="hidden" name="client" value="{{record.client}}">

						<p class="text-bold text-big mb-20">
							{{ @global.catalog.clients[record.client].fullname }}
						</p>
						{{else}}
						<div class="search-form input">
							<input class="input__control autocomplete client-search" autocomplete="off" type="text" placeholder="Выбрать пациента" required>
							<div class="input__placeholder">Выбрать пациента</div>
						</div>
						<input type="hidden" name="client" value="">
						<input type="hidden" name="id" value="">

						<div class="search-form event disabled input">
							<input class="input__control autocomplete event-search record-search" type="text" placeholder="Выбрать пациента" required
							 autocomplete="off">
							<div class="input__placeholder">Выбрать событие/посещение</div>
						</div>
						{{/if}}

						<div class="input calendar mb-20">
							<input class="input__control datepickr" type="text" name="date" placeholder="Выбрать дату посещения" autocomplete="off">
							<div class="input__placeholder">Укажите дату фото</div>
						</div>
						<div class="popups__text-chexboxs radios --flex" data-show="longterm">
							<label class="text-radio" name="target" value="before">
								<input type="radio" name="target" value="before">
								<span>До начала лечения</span>
							</label>
							<label class="text-radio switch-blocks" name="target" value="after">
								<input type="radio" name="target" value="after">
								<span class="changed_label">В процессе лечения</span>
							</label>
						</div>

						<label class="file-photo">
							<div class="file-photo__ico">
								<svg class="svgsprite _file">
									<use xlink:href="/assets/img/sprites/svgsprites.svg#file"></use>
								</svg>
								<img class="preview d-none" alt="upload preview">
							</div>
							<input type="file" name="file" accept=".jpg, .jpeg, .png" class="client-photo" required>
							<input type="hidden" name="path" value="/records/photos/{{ @global.wbapp._session.user.id }}/">
							<div class="file-photo__text text-grey">
								Для загрузки фото заполните все поля
								<br> Фото не должно превышать {{ @global.wbapp.settings()['max_upload_size'] / 1024 / 1024 / 1000 }} мб
							</div>
						</label>
						<button class="btn btn--white upload-image" type="submit">Сохранить</button>
					</form>
				</div>
			</template>
		</div>
		<script wbapp>
			window.popupPhoto = function(client, record, onSaved) {
				return new Ractive({
					el: '.popup.--photo',
					template: wbapp.tpl('#popupPhoto').html,
					data: {
						client: client,
						record: record || {}
					},
					on: {
						complete() {
							initClientSearch();
							initEventSearch($(this.el), true);
							initPlugins();
							$(this.el).show();
						},
						submit(ev) {
							console.log('Submit form...');
							var _form = $(ev.node);
							var self = this;

							wbapp.loading();
							console.log('form data', form_data);
							_form.addClass('disabled');

							if (_form.verify()) {
								var form_data = _form.serializeJSON();
								if (!form_data.client) {
									toast_error('Необходимо выбрать пациента');
									$($(ev.node).parents('form')).find('.client-search')
										.focus();
									return false;
								}

								if (!form_data.id) {
									toast_error('Необходимо выбрать посещение');
									$($(ev.node).parents('form'))
										.find('.event-search')
										.focus();
									return false;
								}
								utils.api.get('/api/v2/read/records/' + form_data.id).then(function(record) {
									var _photo_group = form_data.target || 'before';
									delete form_data.target;

									uploadFile(
										_form.find('input[name="file"]')[0],
										'record/photos/' + record.id,
										Date.now() + '_' + utils.getRandomStr(4),
										function(photo) {

											if (photo.error) {
												_form.removeClass('disabled');
												wbapp.unloading();

												toast_error(photo.error);
												return false;
											}
											console.log('record: ', record, _photo_group);
											if (!record.photos) {
												record.photos = {
													'before': [],
													'after': []
												};
											}
											var _photo_data = {
												src: photo.uri,
												filename: photo.filename,
												comment: record.comment,
												date: form_data.date,
												photo_group: _photo_group
											};
											if (_photo_group == 'before') {
												record.photos['before'] = [];
											} else if(!record.photos[_photo_group]){
												record.photos[_photo_group] = [];
											}

											record.hasPhoto = 1;
											record.photos[_photo_group].push(_photo_data);
											wbapp.loading();

											utils.api.post('/api/v2/update/records/' + record.id, {
												'photos': record.photos,
												'hasPhoto': 1
											}).then(function(rec) {
												wbapp.unloading();
												_form.removeClass('disabled');
												onSaved(rec);
												$(self.el).hide();
											});
										});
								});
							} else {
								wbapp.unloading();
								_form.removeClass('disabled');
							}

							return false;

						}
					}
				});
			};
		</script>

		<div class="popup --longterm">
			<template id="popupLongterm">
				<div class="popup__overlay"></div>
				<div class="popup__panel popup__panel-wide">
					<button class="popup__close">
						<svg class="svgsprite _close">
							<use xlink:href="/assets/img/sprites/svgsprites.svg#close"></use>
						</svg>
					</button>
					<div class="popup__name text-bold">Продолжительное лечение</div>
					<form class="popup__form" on-submit="longtermSave" autocomplete="off">
						{{#if record}}
						<input type="hidden" name="id" value="{{record.id}}"> {{else}}
						<!-- new record -->
						{{/if}}
						<input type="hidden" name="group" value="longterms">
						<input type="hidden" name="client" value="{{client.id}}"> {{#if client}}
						<p class="text-bold text-big mb-20">
							{{ @global.catalog.clients[client.id].fullname }}
						</p>
						{{else}}
						<div class="search-form input">
							<input class="input__control autocomplete client-search" autocomplete="off" type="text" placeholder="Выбрать пациента" required>
							<div class="input__placeholder">Выбрать пациента</div>
						</div>
						{{/if}}

						<div class="input calendar mb-20">
							<input class="input__control datepickr" type="text" required autocomplete="off" name="event_date" value="{{ @global.utils.dateForce(record.event_date) }}"
							 placeholder="Выбрать дату посещения">
							<div class="input__placeholder">Дата посещения</div>
						</div>
						<div class="popup-title__checkbox disabled d-none">
							<label class="checkbox mb-20 show-checkbox" data-show-input="longterm">
								<input type="checkbox" name="group" value="longterms" checked>
								<span></span>
								<div class="checbox__name">Продолжительное лечение</div>
							</label>
						</div>

						<div class="input calendar mb-20" data-filter="longterms">
							<input class="input__control event-search longterm-search" type="text" name="longterm_title" autocomplete="off" placeholder="Название продолжительного лечения"
							 required>
							<div class="input__placeholder">Название продолжительного лечения</div>
						</div>

						<div class="radios --flex">
							<label class="text-radio">
								<input type="radio" name="target" value="before" checked="checked">
								<span>До начала лечения</span>
							</label>
							<label class="text-radio">
								<input type="radio" name="target" value="after">
								<span>После начала лечения</span>
							</label>
						</div>
						<label class="file-photo">
							<div class="file-photo__ico">
								<svg class="svgsprite _file">
									<use xlink:href="/assets/img/sprites/svgsprites.svg#file"></use>
								</svg>
								<img class="preview d-none" alt="upload preview">
							</div>

							<input type="hidden" name="path" value="/records/photos/longterms/">
							<input type="file" accept=".jpg, .jpeg, .png" name="file" class="client-photo" required>

							<div class="file-photo__text text-grey">
								Для загрузки фото заполните все поля
								<br> Фото не должно превышать {{ @global.wbapp.settings()['max_upload_size'] / 1024 / 1024 / 1000 }} мб
							</div>
						</label>
						<button class="btn btn--white" type="submit">Сохранить</button>
					</form>
				</div>
			</template>
		</div>
		<script wbapp>
			window.popupLongterm = function(client, record, onSaved) {
				return new Ractive({
					el: '.popup.--longterm',
					template: wbapp.tpl('#popupLongterm').html,
					data: {
						client: client,
						record: false
					},
					on: {
						complete() {
							initServicesSearch($('.search-services'), catalog.servicesList);
							initPlugins();
							$(this.el).show();
						},
						longtermSave(ev) {
							var self = this;
							var $form = $(ev.node);
							var uid = this.get('client.id');

							if ($form.verify() && uid > '') {
								var form_data = $form.serializeJSON();

								form_data.group = 'longterms';
								form_data.status = '';
								form_data.pay_status = 'free';
								form_data.photos = {
									before: [],
									after: []
								};

								form_data.client = uid;
								form_data.priority = 0;
								form_data.marked = 0;
								if (!form_data.event_date) {
									toast_error('Выберите дату и время события');
									$($(ev.node).parents('form'))
										.find('[name="event_date"]')
										.focus();
									return false;
								}
								form_data.event_date = utils.dateForce(form_data.event_date);
								form_data.recommendation = '';
								form_data.description = '';
								form_data.price = 0;
								var _photo_group = form_data.target || 'before';
								delete form_data.photo_group;

								uploadFile(
									$form.find('input[name="file"]')[0],
									'records/photos/longterms',
									Date.now() + '_' + utils.getRandomStr(4),
									function(photo) {
										if (photo.error) {
											toast_error(photo.error);
											return false;
										}

										var _photo_data = {
											src: photo.uri,
											filename: photo.filename,
											date: form_data.event_date,
											timestamp: utils.timestamp(form_data.event_date),
											photo_group: _photo_group
										};
										form_data.photos[_photo_group].push(_photo_data);
										form_data.hasPhoto = 1;
										utils.api.post('/api/v2/create/records/', form_data).then(
											function(longterm_record) {
												if (typeof onSaved == 'function') {
													onSaved(longterm_record);


												}
												$(self.el).hide();
											});
									});
							}

							return false;
						}
					}
				});
			};
		</script>


		<div class="popup --photo-profile">
			<template id="popupPhotoProfile">
				<div class="popup__overlay"></div>
				<div class="popup__panel">
					<button class="popup__close">
						<svg class="svgsprite _close">
							<use xlink:href="/assets/img/sprites/svgsprites.svg#close"></use>
						</svg>
					</button>
					<div class="popup__name text-bold">Добавить фото</div>
					<div class="popup__form">
						<input type="hidden" name="client" value="{{this.client}}">
						<input type="hidden" name="id" value="{{this.id}}">

						<div class="search-form input disabled">
							<input class="input__control autocomplete client-search" type="text" placeholder="Выбрать пациента">
							<div class="input__placeholder">Выбрать пациента</div>
						</div>
						<div class="input calendar mb-20">
							<input class="input__control datepickr" type="text" name="event_date" placeholder="Выбрать дату посещения">
							<div class="input__placeholder">Выбрать дату посещения</div>
						</div>
						<input type="hidden" name="group" value="event">
						<input type="hidden" name="id">
						<div class="popup-title__checkbox">
							<label class="checkbox mb-20 show-checkbox" data-show-input="longterm">
								<input type="checkbox" name="group" value="longterm" checked>
								<span></span>
								<div class="checbox__name">Продолжительное лечение</div>
							</label>
						</div>
						<div class="input calendar mb-20" data-show="longterm">
							<input class="input__control longterm-search" type="text" name="title" placeholder="Название продолжительного лечения" value="">
							<div class="input__placeholder">Название продолжительного лечения</div>
						</div>
						<div class="radios --flex">
							<label class="text-radio">
								<input type="radio" name="target" value="before" checked="checked">
								<span>До начала лечения</span>
							</label>
							<label class="text-radio disabled">
								<input type="radio" name="target" value="after">
								<span>В процессе лечения</span>
							</label>
						</div>

						<label class="file-photo" for="file-photo">
							<input type="hidden" name="path" value="/records/">
							<div class="file-photo__ico">
								<svg class="svgsprite _file">
									<use xlink:href="assets/img/sprites/svgsprites.svg#file"></use>
								</svg>
								<img class="preview d-none" alt="upload preview">
							</div>
							<input type="file" id="file-photo" name="file">
							<div class="file-photo__text text-grey">Для загрузки фото заполните все поля
								<br>Фото не должно превышать 10 мб
							</div>
						</label>
						<button class="btn btn--white">Сохранить</button>
					</div>
				</div>
			</template>
		</div>

		<div class="popup --create-client">
			<template id="popupCreateClient">
				<div class="popup__overlay"></div>
				<div class="popup__panel">
					<button class="popup__close" on-click="close">
						<svg class="svgsprite _close">
							<use xlink:href="/assets/img/sprites/svgsprites.svg#close"></use>
						</svg>
					</button>
					<div class="popup__name text-bold">Создать карточку пациента</div>
					<form class="popup__form" on-submit="submit">
						<input type="hidden" name="role" value="client">
						<input type="hidden" name="confirmed" value="0">
						<input type="hidden" name="active" value="on">
						<div class="input">
							<input class="input__control" type="text" required placeholder="ФИО" name="fullname" minlength="5">
							<div class="input__placeholder">ФИО</div>
						</div>
						<div class="input">
							<input class="input__control datebirthdaypickr" required type="text" placeholder="Дата рождения" name="birthdate" minlength="5">
							<div class="input__placeholder">Дата рождения</div>
						</div>
						<div class="input mb-30">
							<input class="input__control" type="tel" required placeholder="Номер телефона" minlength="7" data-inputmask="'mask': '+7 (999) 999-99-99'"
							 name="phone">
							<div class="input__placeholder">Номер телефона</div>
						</div>
						<button class="btn btn--black form__submit" type="submit">Создать</button>

						<div class="form-bottom">После отправки для пациента будет создан Личный кабинет, в&nbsp;который можно попасть через кнопку &laquo;Войти&raquo;
							в&nbsp;верхнем меню сайта</div>
					</form>
				</div>
			</template>
		</div>
		<script wbapp>
			window.popupsCreateProfile = function() {
				return new Ractive({
					el: '.popup.--create-client',
					template: wbapp.tpl('#popupCreateClient').html,
					data: {},
					on: {
						complete() {
							initPlugins();
							$(this.el).show();
						},
						submit() {
							var form = this.find('.popup__form');
							if ($(form).verify()) {
								var post = $(form).serializeJSON();
								console.log('popupsCreateProfile: ', post);

								let names = post.fullname.split(' ', 3);
								let keys  = ['last_name', 'first_name', 'middle_name'];
								for (var i = 0; i < names.length; i++) {
									post[keys[i]] = names[i];
								}
								post.phone = str_replace([' ', '+', '-', '(', ')'], '', post.phone);
								utils.api.get('/api/v2/list/users/?role=client&phone=' + post.phone).then(
									function (data) {
										if (!data.length) {
											utils.api.get('/api/v2/list/users/?email=' + post.email).then(
												function (data) {
													if (!data.length) {
														post.role   = "client";
														post.role   = "client";
														post.confirmed = "0";
														post.active = "on";
														wbapp.post('/api/v2/create/users/', post)
															.then(function (data) {
																if (data.error) {
																	wbapp.trigger('wb-save-error', {
																		'data': data
																	});
																} else {
																	$('.popup.--create-client').fadeOut('fast');
																	popupMessage('Карточка пациента создана!', '',
																		'Успешно',
																		'<a href="/cabinet/client/' + data.id +
																		'"> Перейти на страницу профиля </a>',
																		function (d) {});
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
							}
							return false;
						}
					}
				});
			};
		</script>

		<div class="popup --edit-profile">
			<template id="popupEditProfile">
				<div class="popup__overlay"></div>
				<div class="popup__panel">
					<button class="popup__close" on-click="close">
						<svg class="svgsprite _close">
							<use xlink:href="/assets/img/sprites/svgsprites.svg#close"></use>
						</svg>
					</button>
					<div class="popup__name text-bold">Редактировать профиль</div>
					<form class="popup__form" on-submit="submit">
						{{#user}}
						<input type="hidden" name="id" value="{{user.id}}">
						<div class="input">
							<input class="input__control" type="text" required value="{{.fullname}}" placeholder="ФИО" name="fullname" minlength="5">
							<div class="input__placeholder">ФИО</div>
						</div>
						<div class="input">
							<input class="input__control datebirthdaypickr" required value="{{.birthdate}}" type="text" placeholder="Дата рождения" name="birthdate"
							 minlength="5">
							<div class="input__placeholder">Дата рождения</div>
						</div>
						<div class="input mb-30">
							<input class="input__control" type="tel" required placeholder="Номер телефона" minlength="7" value="{{.phone}}" data-inputmask="'mask': '+7 (999) 999-99-99'"
							 name="phone">
							<div class="input__placeholder">Номер телефона</div>
						</div>
						<div class="input input--grey">
							<input class="input__control" type="email" name="email" value="{{.email}}" required placeholder="E-mail">
							<div class="input__placeholder input__placeholder--dark">E-mail</div>
						</div>

						<button class="btn btn--black form__submit" type="submit">Сохранить</button>
						{{/user}}
					</form>
				</div>
			</template>
		</div>
		<script wbapp>
			window.popupEditProfile = function() {
				return new Ractive({
					el: '.popup.--edit-profile',
					template: wbapp.tpl('#popupEditProfile').html,
					data: {
						user: wbapp._session.user
					},
					on: {
						complete() {
							var self = this;
							utils.api.get('/api/v2/read/users/' + wbapp._session.user.id + '?active=on')
								.then(function(data) {
									data.fullname = data.fullname.replaceAll('  ', ' ')
									self.set('user', data);
									console.log(data);

									$(this.el).show();
								});
							initPlugins();
							$(this.el).show();
						},
						submit(ev) {
							var self = this;
							var $form = $(ev.node);
							if ($form.verify()) {
								var data = $form.serializeJSON();
								data.phone = str_replace([' ', '+', '-', '(', ')'], '', data.phone);
								Cabinet.updateProfile(wbapp._session.user.id, data, function(data) {
									data.birthdate_fmt = utils.formatDate(data.birthdate);
									self.set('user', data); /* get actually user data */
									toast_success('Профиль обновлён!');
									$(self.el).hide();
								});
							}
							return false;
						}
					}
				});
			};
		</script>

		<div class="popup --confirm-sms-code">
			<template id="popupConfirmSmsCode">
				<div class="popup__overlay"></div>
				<div class="popup__panel">
					<button class="popup__close">
						<svg class="svgsprite _close">
							<use xlink:href="/assets/img/sprites/svgsprites.svg#close"></use>
						</svg>
					</button>
					<div class="popup__name text-bold">Вход</div>
					<form class="popup__form">
						<h3 class="h3">Введите код</h3>
						<div class="form-title__description">
							Мы отправили код подтверждения на номер
							<span class="current_phone">{{phone}}</span>
							.
							<br> Время жизни кода 30 секунд.
							<br> Осталось
							<strong>
								<span class="sms_code_lifetime"></span>
							</strong>
						</div>

						<div class="code">
							<input class="code__input" on-keyup="keyup" type="text">
							<input class="code__input" on-keyup="keyup" type="text">
							<input class="code__input" on-keyup="keyup" type="text">
							<input class="code__input" on-keyup="keyup" type="text">
							<input class="code__input" on-keyup="keyup" type="text">
							<input class="code__input" on-keyup="keyup" type="text">
						</div>

						<div class="alert alert-warning mb-2"></div>
					</form>
				</div>
			</template>
		</div>


		<div class="popup --record-edit">
			<template id="popupRecordEdit">
				<div class="popup__overlay"></div>
				<div class="popup__panel popup__panel-wide">
					<button class="popup__close">
						<svg class="svgsprite _close">
							<use xlink:href="/assets/img/sprites/svgsprites.svg#close"></use>
						</svg>
					</button>
					<div class="popup__name text-bold">{{title}}</div>

					<form class="popup__form" on-submit="submit" data-record="{{record.id}}">
						<p class="text-bold text-big mb-20">{{client.fullname}}</p>


						<input type="hidden" value="{{ record.id }}" name="id"> {{#if this.spec_service}}
						<input type="hidden" name="spec_service" value="{{this.spec_service}}">
						<input type="hidden" name="title" value="{{catalog.spec_service[this.spec_service].header}}"> {{else}}
						<div class="admin-editor__event mb-20">
							<div class="search__block --flex --aicn">
								<div class="input">
									<input class="popup-services-list search__input search-services" type="text" placeholder="Поиск по услугам" autocomplete="off">
									<div class="search__drop"></div>
									<button class="search__btn" type="button">
										<svg class="svgsprite _search">
											<use xlink:href="/assets/img/sprites/svgsprites.svg#search"></use>
										</svg>
									</button>
								</div>
							</div>
						</div>
						<div class="admin-editor__event mb-20">
							<!-- services-select.dropdown -->
						</div>
						{{/if}}

						<div class="admin-editor__type-event">
							<p class="mb-10">Тип события</p>
							<div class="text-radios">
								{{#each catalog.quoteType as qt}}
								<label class="text-radio">
									{{#if qt.id === record.type }}
									<input type="radio" name="type" value="{{ qt.id }}" checked> {{else}}
									<input type="radio" name="type" value="{{ qt.id }}"> {{/if}}
									<span>{{qt.name}}</span>
								</label>
								{{/each}}
							</div>
							<div class="row">
								{{#if record.spec_service}} {{else}}
								<div class="col-md-6">
									<div class="select-form select-checkboxes">
										<div class="select select_experts">
											<div class="select__main">
												<div class="select__placeholder">Выберите специалиста</div>
												<div class="select__values"></div>
											</div>
											<div class="select__list">
												{{#each catalog.experts}}
												<div class="select__item select__item--checkbox">
													<label class="checkbox checkbox--record">
														{{#if @global.utils.arr.search(.id, record.experts)}}
														<input type="checkbox" class="checked" name="experts[]" checked value="{{.id}}"> {{else}}
														<input type="checkbox" name="experts[]" value="{{.id}}"> {{/if}}
														<span></span>
														<div class="checbox__name">
															<div class="select__name">{{name}}</div>
														</div>
													</label>
												</div>
												{{/each}}
											</div>
										</div>
									</div>
								</div>
								{{/if}}
								<div class="col-md-6">
									<div class="row">
										<div class="col-md-12">
											<div class="input input-lk-calendar input--grey">
												<input class="input__control datepickr" name="event_date" value="{{ @global.utils.dateForce(record.event_date) }}" type="text"
												 placeholder="Выбрать дату и время">
												<div class="input__placeholder">Выбрать дату</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="calendar input mb-30">
												<input class="input__control timepickr" type="text" name="event_time_start" value="{{record.event_time_start}}" data-min-time="09:00"
												 data-max-time="21:00" pattern="[0-9]{2}:[0-9]{2}" required>
												<div class="input__placeholder">Время (начало)</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="calendar input mb-30">
												<input class="input__control timepickr" type="text" name="event_time_end" value="{{record.event_time_end}}" data-min-time="09:00"
												 data-max-time="21:00" pattern="[0-9]{2}:[0-9]{2}" required>
												<div class="input__placeholder">Время (конец)</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="admin-editor__patient">
							<div class="text-bold mb-10">Выбраны услуги</div>
							{{#if this.spec_service}}
							<div class="search__drop-item">
								<input type="hidden" name="services[]" value="">
								<div class="search__drop-name">
									{{catalog.spec_service[this.spec_service].header}}
								</div>
								<div class="search__drop-right">
									<div class="search__drop-summ">
										{{catalog.spec_service[this.spec_service].price}} ₽
									</div>
								</div>
							</div>
							{{else}}{{#each record.service_prices: idx, key}}
							<div class="search__drop-item" data-index="{{idx}}" data-id="{{service_id}}-{{price_id}}" data-service_id="{{service_id}}"
								data-price="{{price}}">
								<input type="hidden" name="services[]" value="{{service_id}}">
								<input type="hidden" name="service_prices[{{service_id}}-{{price_id}}][service_id]" value="{{service_id}}">
								<input type="hidden" name="service_prices[{{service_id}}-{{price_id}}][price_id]" value="{{price_id}}">
								<input type="hidden" name="service_prices[{{service_id}}-{{price_id}}][name]" value="{{name}}">
								<input type="hidden" name="service_prices[{{service_id}}-{{price_id}}][price]" value="{{price}}">
								<div class="search__drop-name">
									<div class="search__drop-delete">
										<svg class="svgsprite _delete">
											<use xlink:href="/assets/img/sprites/svgsprites.svg#delete"></use>
										</svg>
									</div>
									<div class="search__drop-tags">
										{{#each @global.catalog.servicePrices[this.service_id+'-'+this.price_id].tags}}
										<div class="search__drop-tag --{{.color}}">{{this.tag}}</div>
										{{/each}}
									</div>
									{{name}}
								</div>
								<label class="search__drop-right">
									<div class="search__drop-summ">{{ @global.utils.formatPrice(this.price) }} ₽</div>
								</label>
							</div>
							{{/each}} {{/if}}
						</div>
						<div class="admin-editor__summ">
							<p>Всего</p>
							<input type="hidden" name="price" value="{{record.price}}">
							<p class="price">{{ @global.utils.formatPrice(record.price) }} ₽</p>
						</div>

						<input type="hidden" name="client" value="{{this.client}}">
						<input type="hidden" name="group" value="events">
						<input type="hidden" name="status" value="upcoming">
						<input type="hidden" name="pay_status" value="unpay">

						<button class="btn btn--black" type="submit">Продолжить</button>
					</form>
				</div>
			</template>
		</div>

		<div class="popup --download-data">
			<template id="popupDownloadData">
				<div class="popup__overlay"></div>
				<div class="popup__panel">
					<button class="popup__close">
						<svg class="svgsprite _close">
							<use xlink:href="/assets/img/sprites/svgsprites.svg#close"></use>
						</svg>
					</button>
					<div class="popup__name text-bold">Выгрузить данные</div>

					<form class="popup__form" method="GET" action="/form/records/download" on-submit="submit">
						<div class="select-form">
							<div class="select">
								<div class="select__main">
									<div class="select__placeholder">Все услуги</div>
									<div class="select__values"></div>
								</div>
								<div class="select__list">
									{{#each catalog.services}}
									<div class="select__item select__item--checkbox">
										<label class="checkbox checkbox--record">
											<input type="checkbox" name="services[]" value="{{this.id}}">
											<span></span>
											<div class="checbox__name">
												<div class="select__name">{{this.header}}</div>
											</div>
										</label>
									</div>
									{{/each}}
								</div>
							</div>
						</div>
						<div class="select-form">
							<div class="select">
								<div class="select__main">
									<div class="select__placeholder">Выберите специалиста</div>
									<div class="select__values"></div>
								</div>
								<div class="select__list">
									{{#each catalog.experts}}
									<div class="select__item select__item--checkbox">
										<label class="checkbox checkbox--record">
											<input type="checkbox" name="experts[]" value="{{this.id}}">
											<span></span>
											<div class="checbox__name">
												<div class="select__name">{{this.name}}</div>
											</div>
										</label>
									</div>
									{{/each}}
								</div>
							</div>
						</div>
						<div class="select-form">
							<div class="select">
								<div class="select__main">Все администраторы</div>
								<div class="select__list">
									{{#each admins}}
									<div class="select__item select__item--checkbox">
										<label class="checkbox checkbox--record">
											<input type="checkbox" name="admins[]" value="{{this.id}}">
											<span></span>
											<div class="checbox__name">
												<div class="select__name">{{this.fullname}}</div>
											</div>
										</label>
									</div>
									{{/each}}
								</div>
							</div>
						</div>
						<div class="calendar input">
							<input class="input__control daterangepickr" type="text" name="period" placeholder="За весь период">
							<div class="input__placeholder">За весь период</div>
						</div>
						<div class="select-form">
							<label class="checkbox mainfilter__checkbox mb-10">
								<input type="checkbox" name="only_phones">
								<span></span>
								<div class="checbox__name text-grey">Выгрузить только список номеров</div>
							</label>
							<div class="calendar input">
								<input class="input__control" type="tel" name="phone" placeholder="Номер телефона" data-inputmask="'mask': '+7 (999) 999-99-99'">
								<div class="input__placeholder">Номер телефона</div>
							</div>
						</div>
						<div class="select-form mb-30">
							<label class="checkbox mainfilter__checkbox mb-10">
								<input type="checkbox" name="only_emails">
								<span></span>
								<div class="checbox__name text-grey">Введите только список е-мейлов</div>
							</label>
							<div class="calendar input">
								<input class="input__control" type="email" name="email" placeholder="Введите е-мейл">
								<div class="input__placeholder">Введите е-мейл</div>
							</div>
						</div>
						<button type="submit" class="btn btn--black">Скачать</button>
					</form>
				</div>
			</template>
		</div>
		<script wbapp>
			window.popupDownloadData = function() {
				return new Ractive({
					el: '.popup.--download-data',
					template: wbapp.tpl('#popupDownloadData').html,
					data: {
						catalog: catalog,
						admins: catalog.admins
					},
					on: {
						complete() {
							initPlugins();
							$(this.el).show();
						},
						submit(ev) {
							let form = ev.node;
							let data = $(form).serializeJSON()
							let action = $(form).attr('action')

/*
							$.post(action,data,function(res){
								console.log(res);
							})
							return false;
*/

							var xhr = new XMLHttpRequest();
							xhr.open('POST', action, true);
							xhr.responseType = 'blob';
							xhr.onload = function() {
								if (this.status === 200) {
									var blob = this.response;
									var filename = "";
									var disposition = xhr.getResponseHeader('Content-Disposition');
									if (disposition && disposition.indexOf('attachment') !== -1) {
										var filenameRegex = /filename[^;=\n]*=((['"]).*?\2|[^;\n]*)/;
										var matches = filenameRegex.exec(disposition);
										if (matches != null && matches[1]) filename = matches[1].replace(/['"]/g, '');
									}

									if (typeof window.navigator.msSaveBlob !== 'undefined') {
										// IE workaround for "HTML7007: One or more blob URLs were revoked by closing the blob for which they were created. These URLs will no longer resolve as the data backing the URL has been freed."
										window.navigator.msSaveBlob(blob, filename);
									} else {
										var URL = window.URL || window.webkitURL;
										var downloadUrl = URL.createObjectURL(blob);

										if (filename) {
											// use HTML5 a[download] attribute to specify filename
											var a = document.createElement("a");
											// safari doesn't support this yet
											if (typeof a.download === 'undefined') {
												window.location.href = downloadUrl;
											} else {
												a.href = downloadUrl;
												a.download = filename;
												document.body.appendChild(a);
												a.click();
											}
										} else {
											window.location.href = downloadUrl;
										}

										setTimeout(function() {
											URL.revokeObjectURL(downloadUrl);
										}, 100); // cleanup
									}
								}
							};
							xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
							xhr.send($.param(data, true));
							return false;

						}
					}
				});
			};
		</script>
	</div>
</view>
<edit header="Все попапы для ЛК">
	<div>
		<wb-module wb="module=yonger&mode=edit&block=common.inc" />
	</div>
</edit>