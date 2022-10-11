var Utils     = {
	formatPhone(phone) {
		var cleaned = ('' + phoneNumberString).replace(/\D/g, '');
		var match   = cleaned.match(/^(7|)?(\d{3})(\d{3})(\d{2})(\d{2})$/); //(XXX) XXX XX XX
		if (match) {
			var intlCode = (match[1] ? '+7 ' : '');
			return [intlCode, '(', match[2], ') ', match[3], '-', match[2], '-', match[2]].join('');
		}
		return null;
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
	api: {
		get(path, data, options) {
			const fullPath = (data === undefined) ? path : path + `?${new URLSearchParams(data)}`;
			return this.request(fullPath, 'get', undefined, options);
		},
		post(path, data, options) {
			return this.request(path, 'post', data, options);
		},
		async request(path, method, data, options) {
			const defaultOptions = {
				method
			};
			if (method !== 'get' && method !== 'head') {
				defaultOptions.body = new URLSearchParams(data);
			}
			return fetch(path,
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
	}
};
var Record    = {
	data: {},
	find: function (id) {
		if (!!id) {
			this.data.id = id;
		}
	},
	validate: function (data) {

	},
	save: function () {

	}

};

const catalog = {
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

		Utils.api.get('/api/v2/list/users?role=main&active=on' +
		              '&@return=id,fullname&@sort=fullname:a').then(function (data) {
			_self.admins = Utils.arrIndexBy(data);
		});

		Utils.api.get('/api/v2/list/users?role=client&active=on' +
		              '&@return=id,fullname,phone,email,birthdate&@sort=fullname:a').then(function (data) {
			_self.clients = Utils.arrIndexBy(data);
		});

		Utils.api.get('/api/v2/list/experts?active=on&@sort=name:a').then(function (data) {
			let _experts = {};
			data.forEach(function (expert, i) {
				_experts[expert.id] = expert;
				Utils.api.get('/api/v2/list/_yonmap?f=experts&i=' + expert.id, function (res) {
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

$(function () {
	catalog.init();

	/* common function */
	window.getChangesJSON = function (prev_data, curr_data, field_to_compare) {
		var changes    = {};
		var to_compare = field_to_compare;
		for (var i in obj2) {
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
		$.toast({
			text: text, // Text that is to be shown in the toast
			heading: head || '', // Optional heading to be shown on the toast
			showHideTransition: 'slide', // fade, slide or plain
			allowToastClose: true, // Boolean value true or false
			hideAfter: 4000,
			stack: 5,
			position: 'top-right',
			bgColor: '#616161',  // Background color of the toast
			textColor: '#FEFEFE',  // Text color of the toast
			textAlign: 'left',  // Text alignment i.e. left, right or center
			loader: false,  // Whether to show loader or not. True by default
			icon: (!!icon) ? icon : false,
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
				_parent_form.find('.admin-editor__summ .price').text(numFormaSpace(sum) + ' ₽');
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
			_parent_form.find('.admin-editor__summ .price').text(numFormaSpace(sum) + ' ₽');
			_parent_form.find('.admin-editor__summ [name="price"]').val(sum);
		});
	};

	window.initLongtermSearch = function ($form, for_client) {
		let client_qry = '';
		if (!!for_client) {
			client_qry = '&client='.$($form).find('[name="client"]').val();
		}

		$form.find('input.autocomplete.event-search').autocomplete({
			noCache: true,
			minChars: 1,
			deferRequestBy: 300,
			dataType: 'json',
			type: 'GET',
			paramName: 'title~',
			serviceUrl: '/api/v2/list/records?group=longterm' + client_qry,
			transformResult: function (response) {
				return {
					suggestions: response.forEach(function (item) {
						return {value: item.title, data: item.id};
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
					suggestions: response.forEach(function (item) {
						return {value: item.fullname, data: item.id};
					})
				};
			},
			onSelect: function (suggestion) {
				$form.find('input[name="client"]').val(suggestion.data);
			}
		});
	};

	setTimeout(function() {
		initPlugins();
		$(document).on('mod-filepicker-done', function (e, list) {
			//$('.file-photo__ico img.preview').attr('src', list[0].img);
			var src = list[0].img;

			$(e.target).parents('.popup__panel').find('input[name="src"]').val(src);
			$(e.target).find('img.preview').attr('src', list[0].img);
			$(e.target).parents('.popup__panel button.upload-image').show();
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