var in_list = function (val, list) {
	if (!val || !list) {
		return false;
	}
	return list.includes(val);
};
var formatPhone = function(phone) {
	var cleaned = ('' + phone).replace(/\D/g, '');
	console.log(cleaned);
	var match = cleaned.match(/^(7|)?(\d{3})(\d{3})(\d{2})(\d{2})$/); //(XXX) XXX XX XX
	if (match) {
		var intlCode = (match[1] ? '+7 ' : '');
		return [intlCode, '(', match[2], ') ', match[3], '-', match[2], '-', match[2]].join('');
	}
	return phone;
};
var catalog = {
	/*!!! TODO: add methods to set this spec. services price from cms/dashboard !!!*/
	spec_service: {
		experts_consultation: {
			header: 'Общая консультация специалиста',
			price: 4000
		},
		analises_interpretation: {
			header: 'Расшифровка анализов',
			price: 2000
		}
	},
	/*dyctionary types*/
	quoteStatus: {},
	quoteType: {},
	quotePay: {},

	services: {},
	servicePrices: {},
	servicesList: [], /* for autocomplete */
	serviceTags: {
		"face": {
			"name": "Лицо",
			"color": "yellow"
		},
		"body": {
			"name": "Тело",
			"color": "green"
		},
		"hair": {
			"name": "Волосы",
			"color": "red"
		},
		"gyn": {
			"name": "Гинекология",
			"color": "blue"
		},
		"lab": {
			"name": "Лаборатория",
			"color": "purple"
		}
	},
	categories: {},

	experts: {},
	clients: {},
	admins: {},

	init() {
		var _self = this;

		Utils.api.get('/api/v2/func/catalogs/getQuoteStatus').then(function (data) {
			_self.quoteStatus = Utils.arrIndexBy(data);
		});

		Utils.api.get('/api/v2/func/catalogs/getQuotePay').then(function (data) {
			_self.quotePay = Utils.arrIndexBy(data);
		});
		Utils.api.get('/api/v2/func/catalogs/getQuoteType').then(function (data) {
			_self.quoteType = Utils.arrIndexBy(data);
		});

		Utils.api.get('/api/v2/list/services?active=on').then(function (data) {

			let _services       = {};
			_self.servicePrices = {};

			data.forEach(function (service, i) {
				_services[service.id] = service;
				const _cats           = service.category;
				const _tags           = [];

				_cats.forEach(function (cat) {
					_tags.push({
						"id": cat,
						"color": _self.serviceTags[cat].color,
						"tag": Array.from(_self.serviceTags[cat].name)[0]
					});
				});

				service.blocks.landing_price.price.forEach(function (serv_price, j) {
					if (serv_price.price === 0) {
						return;
					}
					let _item = {
						value: serv_price.header,
						id: service.id + '-' + j,
						data: {
							service_id: service.id,
							service_title: service.header,
							tags: _tags,
							price: serv_price.price,
							price_id: j
						}
					};
					_self.servicesList.push(_item);
					_self.servicePrices[service.id + '-' + j] = {
						'price': serv_price.price,
						'header': serv_price.header
					};
				});
			});

			_self.services = _services;
		});
		/* for Admins only */
		if (window.user_role === 'main') {
			Utils.api.get('/api/v2/list/users?role=main&active=on' +
			              '&@return=id,fullname&@sort=fullname:a').then(function (data) {
				_self.admins = Utils.arrIndexBy(data);
			});
			Utils.api.get('/api/v2/list/users?role=client&active=on' +
			              '&@return=id,fullname,phone,email,birthdate&@sort=fullname:a').then(function (data) {
				_self.clients = Utils.arrIndexBy(data);
			});
		}

		Utils.api.get('/api/v2/list/experts?active=on&@sort=name:a').then(function (data) {
			let _experts = {};
			data.forEach(function (expert, i) {
				_experts[expert.id] = expert;
				Utils.api.get('/api/v2/list/_yonmap?f=experts&i=' + expert.id, function (res) {
					console.log('-- expert url:', res[0]['u']);
					_experts[expert.id].info_uri = res[0]['u'] || '';
				});
			});
			_self.experts = _experts;
		});

		Utils.api.get('/api/v2/list/catalogs/srvcat').then(function (res) {
			let _serviceCats = {};
			Object.keys(res.tree.data).forEach(function (_key) {
				const _cat = res.tree.data[_key];
				if (_cat.active != 'on') {
					return;
				}
				_serviceCats[_cat.id] = {
					'id': _cat.id,
					'name': _cat.name,
					'color': _cat.data.color
				};
			});
			_self.categories = _serviceCats;
		});

		console.log('-- start preload catalogs data --');
	}
};
var Utils   = {
	formatPhone(phone) {
		var cleaned = ('' + phone).replace(/\D/g, '');
		console.log(cleaned);
		var match   = cleaned.match(/^(7|)?(\d{3})(\d{3})(\d{2})(\d{2})$/); //(XXX) XXX XX XX
		if (match) {
			var intlCode = (match[1] ? '+7 ' : '');
			return [intlCode, '(', match[2], ') ', match[3], '-', match[2], '-', match[2]].join('');
		}
		return phone;
	},
	formatPrice(price, sufix) {
		var sign = 1;
		if (val < 0) {
			sign = -1;
			val  = -val;
		}
		// trim the number decimal point if it exists
		let num    = val.toString().includes('.') ? val.toString().split('.')[0] : val.toString();
		let len    = num.toString().length;
		let result = '';
		let count  = 1;

		for (let i = len - 1; i >= 0; i--) {
			result = num.toString()[i] + result;
			if (count % 3 === 0 && count !== 0 && i !== 0) {
				result = ' ' + result;
			}
			count++;
		}

		// add number after decimal point
		if (val.toString().includes('.')) {
			result = result + '.' + val.toString().split('.')[1];
		}
		// return result with - sign if negative
		return (sign < 0 ? '-' + result : result) + (sufix || '');
	},
	varType(val) {
		return ({}).toString.call(val).match(/\s([a-zA-Z]+)/)[1].toLowerCase();
	},
	uniqueArray(arr) {
		if (this.varType(arr) === 'array') {
			console.warn('value not array: ', arr);
			return arr;
		}

		function onlyUnique(value, index, self) {
			return self.indexOf(value) === index;
		}

		return arr.filter(onlyUnique);
	},
	timestamp(datetime){
		return Math.floor(new Date(datetime).getTime() / 1000);
	},
	api: {
		get(path, data, options) {
			const fullPath = (data === undefined) ? path : path + `?${new URLSearchParams(data)}`;
			return this.request(fullPath, 'get', undefined, options);
		},
		post(path, data, options) {
			return this.request(path, 'post', data, options);
		},
		async request(path, method, data, options) {
			let _path = path;
			if (!path.includes('__token')) {
				let parts = path.split('?', 2);
				if (parts.length === 2) {
					parts[1] += '&__token=' + wbapp._session.token;
				} else {
					parts[0] += '?__token=' + wbapp._session.token;
				}
				_path = parts.join('?');
			}
			const defaultOptions = {
				method
			};
			if (method !== 'get' && method !== 'head') {
				defaultOptions.body = new URLSearchParams(data);
			}
			return fetch(_path,
				options === undefined ? defaultOptions : Object.assign(defaultOptions, options))
				.then((result) => result.json());
		}
	},
	arrIndexBy(array, index_key) {
		const _index = index_key || 'id';
		let _result  = {};
		array.forEach(function (item) {
			_result[item[_index]] = item;
		});

		return _result;
	},
	formatDate(date) {
		console.log(date);
		return new Date(date).toLocaleDateString();
	},
	formatDateTime(date) {
		return new Date(date).toLocaleString();
	}
};

var CabinetController = {
	updateProfile(profile_id, profile_data, callback) {
		let data       = profile_data;
		data.phone     = str_replace([' ', '+', '-', '(', ')'], '', data.phone);

		Utils.api.post('/api/v2/update/users/' + profile_id, data).then(function (res) {
			if (!!callback) {
				callback(res);
			}
		});
	},
	createQuote(record_data, callback) {
		let data = record_data;

		data.group      = 'quotes';
		data.status     = 'new';
		data.pay_status = 'unpay';

		data.priority = 0;
		data.marked   = false;

		data.event_date        = '';
		data.event_time        = '';
		data.longterm_date_end = '';

		data.longterm_title = '';
		data.analises  = false;
		data.photos    = {before: [], after: []};

		data.comment        = '';
		data.recommendation = '';
		data.description    = '';

		data.price = parseInt(data.price);

		Utils.api.post('/api/v2/create/records/', data).then(function (res) {
			callback(res);
		});
	},
	updateQuote(record_id, record_data, callback) {
		let data = record_data;

		//data.event_date        = '';
		//data.event_time        = '';
		//data.longterm_date_end = '';

		data.longterm_title = '';
		//data.analises  = false;
		//data.photos    = {before: [], after: []};

		//data.comment        = '';
		//data.recommendation = '';
		//data.description    = '';

		data.price = parseInt(data.price);

		Utils.api.post('/api/v2/update/records/' + record_id, data).then(function (res) {
			callback(res);
		});
	},
	listClientUpcoming(client_id, callback) {
		Utils.api.get('/api/v2/list/records?status=upcoming&client=' + client_id).then(
			function (data) {
				if (!data) {
					callback([]);
				}
				let curr_timestamp = parseInt(getdate()[0]);
				data.forEach(function (rec) {
					const event_date = (new Date(rec.event_begin_time * 1000)).toLocaleDateString();

					if (event_date !== (new Date()).toLocaleDateString()) {
						cabinet.push('events.upcoming', rec); /* get actually user next events */
					}

					if ((curr_timestamp + 10) > rec.event_begin_time && (rec.event_end_time >= curr_timestamp)) {
						cabinet.push('events.current', rec);
					}
				});
			});

		wbapp.get('/api/v2/list/records?status=past&client=' + wbapp._session.user.id,
			function (data) {
				console.log('history.events:', data);
				cabinet.set('history.events', data); /* get actually user next events */
			});

		wbapp.get('/api/v2/list/records?longterm=1&client=' + wbapp._session.user.id,
			function (data) {
				console.log('history.longterms:', data);
				cabinet.set('history.longterms', data); /* get actually user next events */
			});
	},
	listClientPast() {

	},
	listClientLongterms() {

	}

};
$(function () {
	if (!!window.user_role.length) {
		catalog.init();
	}
	/* common function */
	window.getChangesJSON = function (prev_data, curr_data, field_to_compare) {
		var changes    = {};
		var to_compare = field_to_compare;
		for (var i in curr_data) {
			if (!!to_compare && !to_compare.include(i)) {
				return;
			}
			if (!prev_data.hasOwnProperty(i) || curr_data[i] !== prev_data[i]) {
				changes[i] = {
					'from': (typeof prev_data[i] === 'undefined') ? '-' : prev_data[i],
					'to': curr_data[i]
				};
			}
		}

		return changes;
	};
	window.toast = function (text, head, icon) {
		var bgColor   = '#616161';
		var textColor = '#FEFEFE';
		switch (icon) {
			case 'error':
				bgColor = '#DC3545';
				break;
			case 'success':
				bgColor = '#198754';
				break;
			case 'warning':
				bgColor = '#FFC107';
				break;
			default:
				bgColor = '#616161';
		}

		$.toast({
			text: text, // Text that is to be shown in the toast
			heading: head || '', // Optional heading to be shown on the toast
			showHideTransition: 'slide', // fade, slide or plain
			allowToastClose: true, // Boolean value true or false
			hideAfter: 4000,
			stack: 5,
			position: 'top-right',
			bgColor: bgColor,  // Background color of the toast
			textColor: textColor,  // Text color of the toast
			textAlign: 'left',  // Text alignment i.e. left, right or center
			loader: false,  // Whether to show loader or not. True by default
			icon: false,
			beforeShow: function () {}, // will be triggered before the toast is shown
			afterShown: function () {}, // will be triggered after the toat has been shown
			beforeHide: function () {}, // will be triggered before the toast gets hidden
			afterHidden: function () {}  // will be triggered after the toast has been hidden
		});
	};

	window.initServicesSearch = function ($selector, service_list) {
		console.log($selector, service_list);

		var _parent_form = $selector.parents('form');
		$selector.autocomplete({
			noCache: true,
			minChars: 1,
			lookup: service_list,
			beforeRender: function (container, suggestions) {
				console.log(suggestions);

				var CNT = $(container);
				$(container).addClass('search__drop').html('');
				var _catSelector = $(this).parents('form').find('[name="service_category"]:checked');
				var _selectedCat = '';
				if (_catSelector.length) {
					_selectedCat = _catSelector.val();
				}
				$(suggestions).each(function (index) {
					var PRICE = new Intl.NumberFormat('ru-RU').format(this.data.price);
					var TAGS  = $('<div></div>').addClass('search__drop-tags');
					var _cats = [];
					$(this.data.tags).each(function () {
						_cats.push(this.id);
						TAGS.append(
							$('<div></div>').addClass('search__drop-tag --' + this.color).text(this.tag)
						);
					});
					if (!!_selectedCat && !_cats.includes(_selectedCat)) {
						return;
					}
					CNT.append(
						$('<label></label>').addClass(
							'search__drop-item autocomplete-suggestion').attr({
							"data-index": index,
							'data-id': this.id,
							"data-service_id": this.data.service_id,
							"data-price": this.data.price
						}).append(
							$('<div></div>').addClass('search__drop-name').text(this.value)
						).append(
							$('<div></div>').addClass('search__drop-right').append(
								TAGS).append(
								$('<div></div>').addClass('search__drop-summ').text(
									PRICE + ' ₽')
							)
						)
					);
				});
			},
			onSelect: function (suggestion) {
				console.log(suggestion);
				$selector.val('');

				if (_parent_form.find('.admin-editor__patient [data-id=' + suggestion.id + ']').length) {
					return;
				}
				var PRICE = new Intl.NumberFormat('ru-RU').format(suggestion.data.price);
				var TAGS  = $('<div></div>').addClass('search__drop-tags');
				$(suggestion.data.tags).each(function () {
					TAGS.append(
						$('<div></div>').addClass('search__drop-tag --' + this.color).text(this.tag)
					);
				});
				const index = _parent_form.find('.admin-editor__patient .search__drop-item[data-service_id]').length;
				var sum     = 0;
				_parent_form.find('.admin-editor__patient').append(
					$('<div></div>').addClass('search__drop-item').attr({
						"data-index": index,
						'data-id': suggestion.id,
						"data-service_id": suggestion.data.service_id,
						"data-price": suggestion.data.price
					}).append(
						$('<input type="hidden">').attr({
							"name": 'services[]',
							"value": suggestion.data.service_id
						}).val(suggestion.data.service_id)
					).append(
						$('<input type="hidden">').attr({
							"name": 'service_prices[' + suggestion.id + '][service_id]',
							"value": suggestion.data.service_id
						}).val(suggestion.data.service_id)
					).append(
						$('<input type="hidden">').attr({
							"name": 'service_prices[' + suggestion.id + '][price_id]',
							"value": suggestion.data.price_id
						}).val(suggestion.data.price_id)
					).append(
						$('<input type="hidden">').attr({
							"name": 'service_prices[' + suggestion.id + '][name]',
							"value": suggestion.value
						}).val(suggestion.value)
					).append(
						$('<input type="hidden">').attr({
							"name": 'service_prices[' + suggestion.id + '][price]',
							"value": suggestion.data.price
						}).val(suggestion.data.price)
					).append(
						$('<div></div>').addClass('search__drop-name').text(suggestion.value).append(
							$('<div class="search__drop-delete">' +
							  '<svg class="svgsprite _delete">' +
							  '	<use xlink:href="/assets/img/sprites/svgsprites.svg#delete"></use>' +
							  '</svg>' +
							  '</div>')
						)
					).append(
						$('<div></div>').addClass('search__drop-right')
							.append(TAGS)
							.append($('<div></div>').addClass('search__drop-summ').text(PRICE + ' ₽'))
					)
				);
				_parent_form.find('.admin-editor__patient .search__drop-item').each(function (e) {
					sum += parseInt($(this).data('price'));
				});
				console.log(sum);
				_parent_form.find('.admin-editor__summ .price').text(Utils.formatPrice(sum) + ' ₽');
				_parent_form.find('.admin-editor__summ [name="price"]').val(sum);
			}
		});
		$(document).on('click', '.search__drop-delete', function (e) {
			e.stopPropagation();
			$(this).parents('.search__drop-item').remove();
			let sum = 0;
			console.log(_parent_form.find('.admin-editor__patient .search__drop-item').length);
			_parent_form.find('.admin-editor__patient .search__drop-item').each(function (e) {
				sum += parseInt($(this).data('price'));
			});
			_parent_form.find('.admin-editor__summ .price').text(Utils.formatPrice(sum) + ' ₽');
			_parent_form.find('.admin-editor__summ [name="price"]').val(sum);
		});
	};
	window.initLongtermSearch = function ($form, for_client) {
		let client_qry = '';
		if (!!for_client) {
			client_qry = '&client=' + $($form).find('[name="client"]').val();
		}

		$form.find('.event-search.longterm-search').autocomplete({
			noCache: true,
			minChars: 1,
			deferRequestBy: 350,
			dataType: 'json',
			type: 'GET',
			paramName: 'title~',
			serviceUrl: '/api/v2/list/records?group=longterm' + client_qry,
			transformResult: function (response) {
				console.log(response);
				return {
					suggestions: $.map(response, function (dataItem) {
						return {value: dataItem.fullname, data: dataItem.id};
					})
				};
			},
			onSelect: function (suggestion) {
				$form.find('input[name="record"]').val(suggestion.data);
			}
		});
	};
	window.initClientSearch = function ($form) {
		$form.find('input.client-search').autocomplete({
			noCache: true,
			minChars: 1,
			deferRequestBy: 300,
			dataType: 'json',
			type: 'GET',
			paramName: 'fullname~',
			serviceUrl: '/api/v2/list/users?role=client',
			noSuggestionNotice: '<p>Пациентов не найдено..</p>',
			transformResult: function (response) {
				console.log(response);
				return {
					suggestions: $.map(response, function (dataItem) {
						return {value: dataItem.fullname, data: dataItem.id};
					})
				};
			},
			onSelect: function (suggestion) {
				$form.find('input[name="client"]').val(suggestion.data);
			}
		});
	};

	setTimeout(function () {
		window.popupCreateQuote    = function (user_id) {
			console.log(user_id);
			var popup = new Ractive({
				el: '.popup.--record',
				template: wbapp.tpl('#popupRecord').html,
				data: {
					user: wbapp._session.user,
					'experts': catalog.experts,
					'categories': catalog.categories,
					'services': catalog.services
				},
				on: {
					complete() {
						this.set('catalog', catalog);

						initServicesSearch($('.search-services'), catalog.servicesList);
						initPlugins();
					},
					submit(ev) {
						let $form = $(ev.node);
						let uid   = popup.get('user.id');

						if ($form.verify() && uid > '') {
							let data = $form.serializeJSON();

							data.group      = 'quotes';
							data.status     = 'new';
							data.pay_status = 'unpay';

							data.analises = false;
							data.photos   = {before: [], after: []};

							data.client   = uid;
							data.priority = 0;
							data.marked   = false;

							data.comment        = '';
							data.recommendation = '';
							data.description    = '';

							data.price = parseInt(data.price);
							CabinetController.createQuote(data, function (res) {
								$('.popup.--record .popup__panel:not(.--succed)').addClass('d-none');
								$('.popup.--record .popup__panel.--succed').addClass('d-block');
							});
						}

						return false;
					}
				}
			});
		};

		window.popupPay                   = function (record_id, price, user_id) {
			const pay_price = Math.floor(parseInt(price) / 5);

			var popup = new Ractive({
				el: '.popup.--pay',
				template: wbapp.tpl('#popupPay').html,
				data: {
					pay_price: pay_price,
					price: parseInt(price),
					client: user_id,
					id: record_id
				},
				on: {
					complite(ev) {
						$('.popup.--pay').show();
					},
					submit() {
						$('.popup.--pay .popup__panel:not(.--succed-pay)').addClass('d-none');
						$('.popup.--pay .popup__panel.--succed-pay').addClass('d-block');
					}
				}
			});
		};
		window.popupAnalizeInterpretation = function () {
			let popup = new Ractive({
				el: '.popup.--analize-interpretation',
				template: wbapp.tpl('#popupAnalizeInterpretation').html,
				data: {
					catalog: {},
					record: {}
				},
				on: {
					init() {
						setTimeout(function () {
							popup.set('catalog', catalog);
						});
					},
					submit() {
						let form = this.find('.popup.--analize-interpretation .popup__form');
						if ($(form).verify()) {
							let post = $(form).serializeJSON();

							wbapp.post('/create/records', post, function (data) {
								if (data.error) {
									wbapp.trigger('wb-save-error', {'data': data});
								} else {
									$('.popup.--analize-type .popup__panel:not(.--succed)').addClass('d-none');
									$('.popup.--analize-type .popup__panel.--succed').addClass('d-block');
								}
							});
						}
						return false;
					}
				}
			});
		};
		window.popupDownloadData          = function () {
			let popup = new Ractive({
				el: '.popup.--download-data',
				template: wbapp.tpl('#popupDownloadData').html,
				data: {
					catalog: {},
					admins: []
				},
				on: {
					init() {
						wbapp.get('/api/v2/list/users/?role=main', function (data) {
							popup.set('admins', data);
							setTimeout(function () {
								popup.set('catalog', catalog);
							});
						});
					}
				}
			});
		};
		window.popupsCreateProfile = function () {
			let popup = new Ractive({
				el: '.popup.--create-client',
				template: wbapp.tpl('#popupCreateClient').html,
				data: {},
				on: {
					submit() {
						let form = this.find('.popup.--create-client .popup__form');
						if ($(form).verify()) {
							let post = $(form).serializeJSON();
							console.log(post);

							let names = post.fullname.split(' ', 3);
							let keys  = ['last_name', 'first_name', 'middle_name'];
							for (var i = 0; i < names.length; i++) {
								post[keys[i]] = names[i];
							}

							wbapp.get('/api/v2/list/users/?role=client&email=' + post.email, function (data) {
								if (data.length === 0) {
									wbapp.get('/api/v2/list/users/?role=client&phone=' + post.phone,
										function (data) {
											if (data.length == 0) {
												wbapp.post('/api/v2/create/users/', post, function (data) {
													if (data.error) {
														wbapp.trigger('wb-save-error', {'data': data});
													} else {
														toast('Карточка клиента успешно создана!');
														$('.popup.--create-client').fadeOut('fast');
													}
												});
											} else {
												form.find('[name="phone"]').focus();
												toast('Этот номер уже используется!', 'Ошибка!', 'error');
											}
										});
								} else {
									form.find('[name="email"]').focus();
									toast('E-mail уже используется!', 'Ошибка!', 'error');
								}
							});

						}
						return false;
					}
				}
			});
		};
		window.popupsConfirmSmsCode = function () {
			let popup = new Ractive({
				el: '.popup.--confirm-sms-code',
				template: wbapp.tpl('#popupConfirmSmsCode').html,
				data: {
					phone: '',
					client: {}
				},
				on: {
					init(ev) {

					},
					keyup(ev) {
						console.log(ev, $(ev.node));
						const _this  = $(ev.node);
						const _phone = $(ev.node).find('[name="phone"]').val();

						var sms_code = '';
						$('.popup.--confirm-sms-code .code__input').each(function (digit, item) {
							sms_code += $(item).val();
						});

						if (sms_code.length === 6) {
							$.ajax({
								url: '/form/phoneAuth/check_code',
								method: 'POST',
								data: {
									phone: _phone,
									code: sms_code
								},
								success: function (data) {
									if (data.status === 'ok') {
										wbapp.post('/create/users/', post, function (data) {
											if (data.error) {
												wbapp.trigger('wb-save-error', {'data': data});
											} else {
												toast('Карточка клиента создана!');
												$('.popup.--confirm-sms-code').hide();
												$('.popup.--confirm-sms-code .code__input').val('');
											}
										});
									}
								}
							});
						} else {
							_this.next().focus();
						}
					}
				},
				showPopup: function () {
					$('.popup.--confirm-sms-code .code__input').mask('9', {placeholder: ''});
					$('.popup.--confirm-sms-code').show();
				}
			});
		};
		window.popupPhoto           = function (is_longterm) {
			let popup = new Ractive({
				el: '.popup.--photo',
				template: wbapp.tpl('#popupPhoto').html,
				data: {
					catalog: {},
					record: {},
					longterm: is_longterm
				},
				on: {
					init() {
						setTimeout(function () {
							popup.set('catalog', catalog);
							initPlugins();
							initClientSearch($('.popup.--photo form'));
							initLongtermSearch($('.popup.--photo form'), true);
						});
					},
					submit() {
						let form = this.parents('.popup__form').find('form');

						if ($(form).verify()) {
							let post = $(form).serializeJSON();
							wbapp.post('/update/records/', post, function (data) {

							});
						}
						return false;
					}
				}
			});
		};

		initPlugins();
		$(document).on('change', '#file-photo', function (e, list) {
			e.stopPropagation();
			var _block   = $(this).parents('.file-photo');
			var _files   = e.target.files;
			var _preview = _block.find('img.preview');
			console.log(_block, 'selected!');

			if (!!_preview.length) {
				var reader;
				var file;
				var url;

				var max_size = 10 * 1024 * 1024;
				if (_files && _files.length > 0) {
					file = _files[0];
					if (file.size >= max_size) {
						toast('Размер файла c фото не может превышать 10 мб', '', 'error');
						$(this).val('');
						return;
					}

					if (URL) {
						_preview.attr('src', URL.createObjectURL(file));
						_preview.removeClass('d-none');
					} else if (FileReader) {
						reader        = new FileReader();
						reader.onload = function (e) {
							_preview.attr('src', reader.result);
							_preview.removeClass('d-none');
						};
						reader.readAsDataURL(file);
					}
				}
			}
		}).on('click', 'a.account__detail[data-link]', function (e) {
			e.stopPropagation();
			e.preventDefault();
			window.location.href = $(this).data('link');
		}).on('click', 'a.account__detail[data-client]', function (e) {
			e.stopPropagation();
			e.preventDefault();
			window.location.href = "/cabinet/client/" + $(this).data('link');
		});
	});
});