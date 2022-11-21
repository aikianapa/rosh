window.user_role = wbapp?._session?.user?.role;

Date.prototype.isValid = function () {
	// An invalid date object returns NaN for getTime() and NaN is the only
	// object not strictly equal to itself.
	return this.getTime() === this.getTime();
};

$(function () {
	console.log('>>> cabinet.js loaded ..');

	var isObj  = function (a) {
		return (!!a) && (a.constructor === Object);
	};
	var _st    = function (z, g) {
		return "" + (g != "" ? "[" : "") + z + (g != "" ? "]" : "");
	};
	var months = ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'];

	window.utils   = {
		urlParams(params, skipobjects, prefix) {
			if (skipobjects === void 0) {
				skipobjects = false;
			}
			if (prefix === void 0) {
				prefix = "";
			}
			var result = "";
			if (typeof (params) != "object") {
				return prefix + "=" + encodeURIComponent(params) + "&";
			}
			for (var param in params) {
				var c = "" + prefix + _st(param, prefix);
				if (isObj(params[param]) && !skipobjects) {
					result += utils.urlParams(params[param], false, "" + c);
				} else if (Array.isArray(params[param]) && !skipobjects) {
					params[param].forEach(function (item, ind) {
						result += utils.urlParams(item, false, c + "[" + ind + "]");
					});
				} else {
					result += c + "=" + encodeURIComponent(params[param]) + "&";
				}
			}
			return result;
		},
		changeUrl(title, url) {
			if (typeof (history.pushState) != "undefined") {
				var obj = {Title: title || document.title, Url: url};
				history.pushState(obj, obj.Title, obj.Url);
			} else {
				alert("Browser does not support HTML5.");
			}
		},
		varType(val) {
			return ({}).toString.call(val).match(/\s([a-zA-Z]+)/)[1].toLowerCase();
		},

		arr: {
			search(val, array) {
				if (!val || !array) {
					return false;
				}
				var _include = false;
				$(array).each(function (key) {
					_include = (this == val);
					return !_include;
				});
				return _include;
			},
			unique(array) {
				if (utils.varType(array) !== 'array') {
					console.warn('value not array: ', array);
					return array;
				}

				function onlyUnique(value, index, self) {
					return self.indexOf(value) === index;
				}

				return array.filter(onlyUnique);
			},
			indexBy(array, index_key /* default "id" */) {
				let _result = {};
				if (utils.varType(array) !== 'array') {
					console.warn('value not array: ', array);
					return _result;
				}
				const _index = index_key || 'id';
				array.forEach(function (item) {
					_result[item[_index]] = item;
				});

				return _result;
			}
		},
		api: {
			get(path, data) {
				let _path = path;
				let parts = path.split('?', 2);
				if (data !== undefined) {
					if (parts.length === 2) {
						parts[1] += '&' + $.param(data);
					} else {
						parts[0] += '?' + $.param(data);
					}
				}
				_path = parts.join('?');

				if (!_path.includes('__token')) {
					parts = _path.split('?', 2);

					if (parts.length === 2) {
						parts[1] += '&__token=' + wbapp._session.token;
					} else {
						parts[0] += '?__token=' + wbapp._session.token;
					}
					_path = parts.join('?');
				}

				const defaultOptions = {Method: 'GET'};
				return fetch(_path, defaultOptions).then((result) => result.json());
			},
			post(path, data) {
				//return this.request(path, 'post', data, options);
				if (is_string(data)) {
					data += '&__token=' + wbapp._session.token;
				} else {
					try { data.__token = wbapp._session.token; } catch (error) { null; }
				}
				wbapp.loading();
				return $.post(path, data, function () {
					wbapp.unloading();
				});
			},
			async request(path, method, data, options) {

			}
		},
		getRandomStr(length) {
			var _length          = length || 6;
			var result           = '';
			var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
			var charactersLength = characters.length;
			for (var i = 0; i < length; i++) {
				result += characters.charAt(Math.floor(Math.random() * charactersLength));
			}
			return result;
		},
		timestamp(datetime) {
			return Math.floor(new Date(datetime).getTime() / 1000);
		},
		monthYearDate(date) {
			var datetime = this.getDate(date);
			var year     = datetime.getFullYear();
			var month    = datetime.getMonth();
			return months[month] + ', ' + year;
		},
		formatDate(date) {
			var d = this.getDate(date);
			if (d.isValid()) {
				return d.toLocaleDateString();
			}
			return date;
		},
		formatDateAdv(date) {
			var d = this.getDate(date);
			if (d.isValid()) {
				return d.toLocaleDateString('ru-RU', {year: 'numeric', month: 'short', day: 'numeric'});
			}
			return date;
		},
		getISODate(date) {

		},
		dateForce(date) {
			if (!!date && !!date.length) {
				var parts = date.match(/(\d+)\.(\d+)\.(\d+)/);
				if (parts) {
					return parts[3] + '-' + parts[2] + '-' + parts[1] + ' 00:00:00';
				}
			}
			return date;
		},
		getDate(date) {
			var result = new Date(this.dateForce(date));
			if (!result.isValid()) {
				date   = date.split(' ')[0].split('.').reverse().join('-');
				result = new Date(date);
			}
			return result;
		},
		formatDateTime(date) {
			return new Date(this.getDate(date)).toLocaleString();
		},
		formatTime(date) {
			return new Date(date).toLocaleTimeString();
		},
		formatPhone(_phone) {
			var phone   = str_replace([' ', '+', '-', '(', ')'], '', _phone);
			var cleaned = ('' + phone).replace(/\D/g, '');
			var match   = cleaned.match(/^(7|)?(\d{3})(\d{3})(\d{2})(\d{2})$/); //(XXX) XXX XX XX
			//console.log('??', phone, match);
			if (match) {
				var intlCode = (match[1] ? '+7 ' : '');
				phone        = [intlCode, '(', match[2], ') ', match[3], '-', match[4], '-', match[5]].join('');
			}
			//console.log('???', phone);

			return phone;
		},
		formatPrice(val, sufix) {
			if (!val) {
				return 0;
			}

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
		}
	};
	window.catalog = {
		/*!!! TODO: add methods to set this spec. services price from cms/dashboard !!!*/
		spec_service: {
			experts_consultation: {
				header: 'Общая консультация специалиста',
				price: 4000
			},
			consultation: {
				header: 'Консультация врача'

			},
			analyses_interpretation: {
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
		roles: {
			"main": "Aдминистратор",
			"expert": "Специалист",
			"client": "Пациент"
		},
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
		reload(only_key) {
			var _key = only_key;
			if (!!_key) {
				sessionStorage.removeItem('db.' + _key);
			} else {
				sessionStorage.removeItem('db.quoteStatus');
				sessionStorage.removeItem('db.quotePay');
				sessionStorage.removeItem('db.quoteType');
				sessionStorage.removeItem('db.categories');
				sessionStorage.removeItem('db.services');
				sessionStorage.removeItem('db.servicesList');
				sessionStorage.removeItem('db.servicePrices');
				sessionStorage.removeItem('db.experts');
			}
			console.log('Clear cached!');
			if (_key !== false) {
				this.init();
			}
		},
		init(use_session_cache) {
			var _self   = this;
			var getters = [];

			if (!localStorage.getItem('db.quoteStatus')) {
				getters.push(
					utils.api.get('/api/v2/func/catalogs/getQuoteStatus').then(function (data) {
						_self.quoteStatus = utils.arr.indexBy(data);
						localStorage.setItem('db.quoteStatus', JSON.stringify(_self.quoteStatus));
					})
				);
			} else {
				_self.quoteStatus = JSON.parse(localStorage.getItem('db.quoteStatus'));
			}

			if (!localStorage.getItem('db.quotePay')) {
				getters.push(
					utils.api.get('/api/v2/func/catalogs/getQuotePay').then(function (data) {
						_self.quotePay = utils.arr.indexBy(data);
						localStorage.setItem('db.quotePay', JSON.stringify(_self.quotePay));

					})
				);
			} else {
				_self.quotePay = JSON.parse(localStorage.getItem('db.quotePay'));
			}

			if (!localStorage.getItem('db.quoteType')) {
				getters.push(
					utils.api.get('/api/v2/func/catalogs/getQuoteType').then(function (data) {
						_self.quoteType = utils.arr.indexBy(data);
						localStorage.setItem('db.quoteType', JSON.stringify(_self.quoteType));
					})
				);
			} else {
				_self.quoteType = JSON.parse(localStorage.getItem('db.quoteType'));
			}

			if (!localStorage.getItem('db.categories')) {
				utils.api.get('/api/v2/list/catalogs/srvcat').then(function (res) {
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
					localStorage.setItem('db.categories', JSON.stringify(_self.categories));
				});
			} else {
				_self.categories = JSON.parse(localStorage.getItem('db.categories'));
			}

			if (!sessionStorage.getItem('db.services')
			    || !sessionStorage.getItem('db.servicesPrices')
			    || !sessionStorage.getItem('db.servicesList')) {
				getters.push(
					utils.api.get('/api/v2/list/services?active=on' +
					              '&@return=id,header,category,blocks' +
					              '&@sort=header').then(function (data) {
						_self.servicePrices = {};

						data.forEach(function (service, i) {
							_self.services[service.id] = service;
							const _cats                = service.category;
							const _tags                = [];

							_cats.forEach(function (cat) {
								_tags.push({
									"id": cat,
									"color": _self.serviceTags[cat].color,
									"tag": Array.from(_self.serviceTags[cat].name)[0]
								});
							});
							if (!!service.blocks) {
								service.blocks.landing_price?.price?.forEach(function (serv_price, j) {
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
										id: service.id + '-' + j,
										service_id: service.id,
										service_title: service.header,
										price: serv_price.price,
										header: serv_price.header,
										tags: _tags
									};
								});
							}
						});

						sessionStorage.setItem('db.services', JSON.stringify(_self.services));
						sessionStorage.setItem('db.servicesList', JSON.stringify(_self.servicesList));
						sessionStorage.setItem('db.servicePrices', JSON.stringify(_self.servicePrices));
					})
				);
			} else {
				_self.services      = JSON.parse(sessionStorage.getItem('db.services'));
				_self.servicesList  = JSON.parse(sessionStorage.getItem('db.servicesList'));
				_self.servicePrices = JSON.parse(sessionStorage.getItem('db.servicePrices'));
			}

			if (!sessionStorage.getItem('db.experts')) {
				getters.push(
					utils.api.get('/api/v2/list/experts?active=on&' +
					              '@return=id,name,image,devision,spec,experience,education' +
					              '@sort=name:a').then(function (data) {
						let _experts = {};
						data.forEach(function (expert, i) {
							_experts[expert.id] = expert;
							utils.api.get('/api/v2/list/_yonmap', {f: 'experts', i: expert.id})
								.then(function (res) {
									_self.experts[expert.id].info_uri = res[0]['u'] || '';
									/* save to SS */
								});
						});
						_self.experts = _experts;
						sessionStorage.setItem('db.experts', JSON.stringify(_self.experts));
					})
				);
			} else {
				_self.experts = JSON.parse(sessionStorage.getItem('db.experts'));
			}
			/* for Admins only */
			if (!!window.user_role && window.user_role !== 'client') {
				getters.push(
					utils.api.get('/api/v2/list/users?role=client&active=on' +
					              '&@return=id,fullname,phone,email,birthdate,' +
					              'country,city,street,build,flat,intercom,entrance,level,address' +
					              '&@sort=fullname:a').then(function (data) {
						_self.clients = utils.arr.indexBy(data);
						//sessionStorage.setItem('db.clients', JSON.stringify(_self.clients));
					})
				);

				if (window.user_role === 'main') {
					getters.push(
						utils.api.get('/api/v2/list/users?role=main&active=on' +
						              '&@return=id,fullname&@sort=fullname:a')
							.then(function (data) {
								_self.admins = utils.arr.indexBy(data);
							})
					);
				}
				getters.push(
					utils.api.get('/api/v2/list/users?role=[main,expert,client]&active=on' +
					              '&@return=id,fullname,role&@sort=fullname:a')
						.then(function (data) {
							_self.users = utils.arr.indexBy(data);
						})
				);
			} else {
				sessionStorage.removeItem('db.clients');
			}
			utils.api.get('/api/v2/read/price/id63619e811c69')
				.then(function (data) {
					_self.spec_service.consultation = data;
				});
			return Promise.allSettled(getters).then(() => {
				$(document).trigger('cabinet-db-ready');
			});
		}
	};
	window.Cabinet = {
		isCurrentEvent(event) {
			var event_date     = utils.getDate(event.event_date);
			let curr_timestamp = parseInt(getdate()[0]);
			var iso_date       = new Date(event_date).toISOString().split('T')[0];
			if (utils.formatDate(event_date) !== (new Date()).toLocaleDateString()) {
				return false;
			}

			let event_from_timestamp = utils.timestamp(
				iso_date + 'T' + event.event_time_start);
			let event_to_timestamp   = utils.timestamp(
				iso_date + 'T' + event.event_time_end);
			console.log(event_from_timestamp, event_to_timestamp);

			return (event_from_timestamp < curr_timestamp && event_to_timestamp >= curr_timestamp);
		},
		runOnlineChat(record_id) {
			/*!! check record  exists & status & pay_status & date !!*/
			/*!! mark record as "online_waiting"=1 !!*/
			if (!wbapp?._session?.user) {
				return false;
			}
			window.open('/cabinet/online#' + record_id,
				'_blank', 'width=' + screen.availWidth + ',' +
				          'height=' + screen.availHeight +
				          ',location=yes,scrollbars=yes,status=no');
		},
		updateProfile(profile_id, profile_data, callback) {
			let data   = profile_data;
			data.phone = str_replace([' ', '+', '-', '(', ')'], '', data.phone);
			data.fullname = data.fullname.replaceAll('  ', ' ')
			var names            = data.fullname.split(' ');
			data.first_name  = names[0];
			data.middle_name = names[1] || '';
			data.last_name   = names[2] || '';

			utils.api.post('/api/v2/update/users/' + profile_id, data).then(function (res) {
				if (!!callback) {
					callback(res);
				}
			});
		},
		createLongterm(record_data, callback) {
			let data = record_data;

			data.group      = 'longterm';
			data.status     = 'upcoming';
			data.pay_status = 'free';

			data.priority = 0;
			data.marked   = 0;

			//data.event_date       = '';
			//data.event_time       = '';
			//data.event_time_start = '';
			//data.event_time_end   = '';

			data.analyses = false;
			data.photos   = {before: [], after: []};

			data.comment        = '';
			data.recommendation = '';
			data.description    = '';

			data.price = 0;

			utils.api.post('/api/v2/create/records/', data).then(function (res) {
				callback(res);
			});
		},
		createQuote(record_data, callback) {
			let data = record_data;

			data.group      = 'quotes';
			data.status     = 'new';
			data.pay_status = 'unpay';

			data.priority = 0;
			data.marked   = 0;

			data.event_date       = '';
			data.event_time       = '';
			data.event_time_start = '';
			data.event_time_end   = '';

			data.longterm_date_end = '';
			data.longterm_title    = '';

			data.photos = {before: [], after: []};

			data.comment        = '';
			data.recommendation = '';
			data.description    = '';

			data.price = parseInt(data.price);

			utils.api.post('/api/v2/create/records/', data).then(function (res) {
				callback(res);
			});
		},
		updateQuote(record_id, record_data, callback) {
			let data = record_data;

			//data.event_date        = '';onSaved
			//data.event_time        = '';
			//data.longterm_date_end = '';
			if (record_data?.status_type == 'event') {
				data.group = 'events';
			} else if (record_data?.status_type == 'quote') {
				data.group = 'quotes';
			}

			data.longterm_title = '';
			//data.analyses  = false;
			//data.photos    = {before: [], after: []};

			//data.comment        = '';
			//data.recommendation = '';
			//data.description    = '';

			data.price = parseInt(data.price);

			utils.api.post('/api/v2/update/records/' + record_id, data).then(function (res) {
				callback(res);
			});
		},
		listUpcomingEvents(options, callback) {
			var _options  = options || {};
			var upcomings = [], currents = [];

			var qry_str = '';
			if (!!_options?.client) {
				qry_str += '&client=' + _options?.client;
			}
			if (!!_options?.expert) {
				qry_str += '&experts~=' + _options?.expert;
			}

			const curr_timestamp = parseInt(getdate()[0]);

			utils.api.get('/api/v2/list/records?active=on&status=upcoming').then(
				function (data) {

					data.forEach(function (rec) {
						if (rec.event_date !== (new Date()).toLocaleDateString()) {
							upcomings.push(rec); /* get actually user next events */
						}

						let times = rec.event_time.split('-');

						let event_from_timestamp = utils.timestamp(rec.event_date + ' ' + rec.event_time_start);
						let event_to_timestamp   = utils.timestamp(rec.event_date + ' ' + rec.event_time_end);

						if (event_from_timestamp < curr_timestamp
						    && (event_to_timestamp >= curr_timestamp)) {
							currents.push(rec);
						}
					});

					if (!!callback) {
						callback({currents: currents, upcomings: upcomings});
					}

					return {currents: currents, upcomings: upcomings};
				}).then(function (list) {

				console.log('???', list);
			});
		},
		getHistoryEvents(client_id, callback) {
			return utils.api.get('/api/v2/list/records?status=past&group=events').then(
				function (data) {
					console.log('history.events:', data);
					page.set('history.events', data); /* get actually user next events */
				});
		},
		listLongterms(client_id) {
			return utils.api.get('/api/v2/list/records?group=longterms&client=' + wbapp._session.user.id)
				.then(function (data) {
					console.log('history.longterms:', data);
					page.set('history.longterms', data); /* get actually user next events */
				});
		}
	};

	window.catalog.init(false);
	//.then(() => {
	//});

	/* common function */
	//setTimeout(function () {
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
	window.toast          = function (text, head, icon) {
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
				bgColor = '#BB9107';
				break;
			case 'info':
				bgColor = '#0A6BB9';
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
	window.toast_success  = function (text, head) {
		toast(text, head, 'success');
	};
	window.toast_error    = function (text, head) {
		toast(text, head, 'error');
	};
	window.toast_info     = function (text, head) {
		toast(text, head, 'info');
	};
	window.toast_warning  = function (text, head) {
		toast(text, head, 'warning');
	};

	//document.addEventListener('visibilitychange', (event) => { console.log('Toggle tabs...', event);});

	window.initServicesSearch = function ($selector, service_list) {
		console.log($selector, service_list);

		var _parent_form = $selector.closest('form');
		$selector.autocomplete({
			noCache: true,
			minChars: 1,
			lookup: service_list,
			beforeRender: function (container, suggestions) {
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
							$('<div></div>').addClass('search__drop-right').append(TAGS).append(
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
				const index = _parent_form.find(
					'.admin-editor__patient .search__drop-item[data-service_id]').length;
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
						$('<div></div>').addClass('search__drop-name').append(
							$('<div class="search__drop-delete">' +
							  '<svg class="svgsprite _delete">' +
							  '	<use xlink:href="/assets/img/sprites/svgsprites.svg#delete"></use>' +
							  '</svg>' +
							  '</div>')
						).append(TAGS).append(suggestion.value)
					).append(
						$('<div></div>').addClass('search__drop-right')
							.append($('<div></div>').addClass('search__drop-summ').html(PRICE + ' ₽<sup><b>*</b></sup>'))
					)
				);
				_parent_form.find('.admin-editor__patient .search__drop-item').each(function (e) {
					sum += parseInt($(this).data('price'));
				});
				console.log(_parent_form, sum);
				_parent_form.find('.admin-editor__summ .price').html(utils.formatPrice(sum) + ' ₽<sup><b>*</b></sup>');
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
			_parent_form.find('.admin-editor__summ .price').html(utils.formatPrice(sum) + ' ₽<sup><b>*</b></sup>');
			_parent_form.find('.admin-editor__summ [name="price"]').val(sum);
		});
	};
	window.initLongtermSearch = function ($form, for_client) {
		var form       = $form || $('.popup .popup__form');
		let client_qry = '';
		if (!!for_client) {
			client_qry = '&client=' + form.find('[name="client"]').val();
		}
		form.find('.event-search.longterm-search').autocomplete({
			noCache: false,
			minChars: 1,
			deferRequestBy: 350,
			dataType: 'json',
			type: 'GET',
			paramName: 'title~',
			serviceUrl: '/api/v2/list/records?group=longterms' + client_qry,
			transformResult: function (response) {
				console.log(response);
				return {
					suggestions: $.map(response, function (dataItem) {
						return {
							value: dataItem.longterm_title + ', ' +
							       utils.formatDate(dataItem.event_date) + ' ' +
							       dataItem.event_time_start + '-' + dataItem.event_time_end,
							data: dataItem.id
						};
					})
				};
			},
			onSelect: function (suggestion) {
				console.log($(this), suggestion);
				form.find('input[name="record"]').val(suggestion.data);
			}
		});
	};
	window.initEventSearch    = function ($form, for_client) {
		var form       = $form || $('.popup .popup__form');
		let client_qry = '';
		if (!!for_client) {
			client_qry = '&client=' + form.find('[name="client"]').val();
		}
		form.find('.event-search.record-search').autocomplete({
			noCache: false,
			minChars: 0,
			deferRequestBy: 350,
			dataType: 'json',
			type: 'GET',
			paramName: '',
			serviceUrl: '/api/v2/list/records?group=[longterms,events]' + client_qry,
			noSuggestionNotice: '<p>Не найдено событий..</p>',
			showNoSuggestionNotice: 1,
			transformResult: function (response) {
				console.log(response);
				return {
					suggestions: $.map(response, function (dataItem) {
						var title = (dataItem.group === 'longterms')
							? dataItem.longterm_title
							: catalog.services[dataItem.services[0]].header;

						return {
							value: title + ', ' +
							       utils.formatDate(dataItem.event_date) + ' ' +
							       dataItem.event_time_start + '-' + dataItem.event_time_end,
							data: dataItem.id
						};
					})
				};
			},
			onSelect: function (suggestion) {
				console.log($(this), suggestion);
				form.find('input[name="id"]').val(suggestion.data);
			}
		});
	};
	window.initClientSearch   = function ($form) {
		var form = $form || $('.popup .popup__form');
		form.find('input.client-search').autocomplete({
			noCache: true,
			minChars: 1,
			deferRequestBy: 300,
			dataType: 'json',
			type: 'GET',
			paramName: 'fullname~',
			serviceUrl: '/api/v2/list/users?role=client&active=on&__token' + wbapp._session.token,
			noSuggestionNotice: '<p>Пациентов не найдено..</p>',
			showNoSuggestionNotice: 1,
			transformResult: function (response) {
				console.log(response);
				return {
					suggestions: $.map(response, function (dataItem) {
						return {value: dataItem.fullname, data: dataItem.id};
					})
				};
			},
			onSelect: function (suggestion) {
				form.find('input[name="client"]').val(suggestion.data);
				form.find('.search-form.event.disabled').removeClass('disabled');
			}
		});
	};

	window.popupCreateQuote           = function (user_id) {
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
						data.client     = uid;
						data.priority   = 0;
						data.marked     = false;

						data.comment        = '';
						data.recommendation = '';
						data.description    = '';

						data.price = parseInt(data.price || 0);
						Cabinet.createQuote(data, function (res) {
							$('.popup.--record .popup__panel:not(.--succed)').addClass('d-none');
							$('.popup.--record .popup__panel.--succed').addClass('d-block');
							if (typeof window.load == 'function') {
								window.load();
							}
						});
					}

					return false;
				},
				checkConsultation(ev) {
					var ght = 0;
					var lv  = 0;
					console.log(ev);
					if ($(ev.node).is(':checked') && $(ev.node).val() == 'online') {
						ght = parseInt(catalog.spec_service.consultation.price);
					} else {
						ght = 0;
					}
					var price      = 0;
					var prev_price = $(ev.node).parents('form').find('[name="price"]').val();
					if (!!prev_price) {
						price = parseInt(prev_price);
					}
					if (ght === 0){
						if ($(ev.node).parents('form').find('[name="price"]').hasClass('consultation')){
							price -= catalog.spec_service.consultation.price;
						}
						$(ev.node).parents('form').find('[name="price"]').removeClass('consultation');
					} else {
						price += ght;
						$(ev.node).parents('form').find('[name="price"]').addClass('consultation');
					}

					$(ev.node).parents('form').find('[name="price"]').val(price);
					$(ev.node).parents('form').find('.price').html(utils.formatPrice(price) +
					                                               ' ₽<sup><b>*</b></sup>');
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
				complite() {
				},
				submit() {
					$('.popup.--pay .popup__panel:not(.--succed-pay)').addClass('d-none');
					$('.popup.--pay .popup__panel.--succed-pay').addClass('d-block');
				}
			}
		});

		$('.popup.--pay').show();
	};
	window.popupAnalizeInterpretation = function (client_id, record_id, analyses_file_uri, onShow) {
		let popup = new Ractive({
			el: '.popup.--analize-interpretation',
			template: wbapp.tpl('#popupAnalizeInterpretation').html,
			data: {
				catalog: catalog,
				record: {}
			},
			on: {
				init() {
					setTimeout(function () {
						popup.set('catalog', catalog);
					});
				},
				complete() {
					$(this.el).show();
					if (!!onShow) {
						onShow(this);
					}

				},
				submit() {
					let form = this.find('.popup.--analize-interpretation .popup__form');
					if ($(form).verify()) {
						let post = $(form).serializeJSON();

						utils.api.post('/create/records', post, function (data) {
							if (data.error) {
								wbapp.trigger('wb-save-error', {'data': data});
							} else {
								$('.popup.--analize-interpretation .popup__panel:not(.--succed)').addClass('d-none');
								$('.popup.--analize-interpretation .popup__panel.--succed').addClass('d-block');
							}
						});
					}
					return false;
				}
			}
		});
	};

	window.popupsConfirmSmsCode = function () {
		return new Ractive({
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
	window.popupMessage         = function (title, subtitle, caption, html, onShow) {
		return new Ractive({
			el: '.popup.--message',
			template: wbapp.tpl('#popupMessage').html,
			data: {
				content: html,
				title: title,
				subtitle: subtitle,
				caption: caption,
				html: html
			},
			on: {
				init() {
				},
				complete() {
					if (!!onShow) {
						onShow(this);
					}
					$(this.el).show();
				},
				close(e) {}
			}
		});

	};
	window.popupPhoto2          = function (params) {
		var _data = {}, _default = {
			description: '',
			longterm: 0,
			client: null,
			record: null,
			title: '',
			type: null,
			date: (new Date())
		};
		if (!!params) {
			_data = $.extend({}, params, _default);
		}
		_data.catalog = catalog;

		return new Ractive({
			el: '.popup.--photo',
			template: wbapp.tpl('#popupPhoto').html,
			data: _data,
			on: {
				init() {
					setTimeout(function () {
						initPlugins();
						initClientSearch($('.popup.--photo form'));
						initLongtermSearch($('.popup.--photo form'), true);
					});
				},
				complete() {
					$(this.el).show();
				},
				submit(ev) {
					let form = $(ev.node);

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
	window.popupLongterm2       = function (params, onSaved, onCancel) {
		var _data = {}, _default = {
			description: '',
			longterm: 1,
			client: null,
			record: null,
			title: '',
			type: null,
			date: (new Date())
		};
		if (!!params) {
			_data = $.extend({}, params, _default);
		}
		_data.catalog = catalog;

		return new Ractive({
			el: '.popup.--longterm',
			template: wbapp.tpl('#popupLongterm').html,
			data: _data,
			on: {
				init() {
					setTimeout(function () {
						initPlugins();
						initClientSearch($('.popup.--longterm form'));
						initLongtermSearch($('.popup.--longterm form'), true);
					});
				},
				complete() {
					$(this.el).show();
				},
				submit(ev) {
					var form = $(ev.node);

					if ($(form).verify()) {
						let record_data = $(form).serializeJSON();
						const edit_mode = !!record_data.id;

						record_data.group = 'longterms';
						if (edit_mode) {
							delete record_data.longterm_title;
						}

						utils.api.post('/api/v2/' + (edit_mode ? 'update' : 'create') + '/records/', record_data,
							function (data) {
								if (typeof onSaved == 'function') {
									onSaved(data);
								}
								toast('Успешно сохранено!');
							});
					}
					return false;
				}
			}
		});

	};

	window.uploadFile    = function (file_input, path, filename, callback) {
		var formData  = new FormData();
		var _fileext  = file_input.files[0].name.split('.').pop();
		var _filename = filename ? filename + '.' + _fileext : file_input.files[0].name;
		console.log(_filename);
		formData.append("__token", wbapp._session.token);
		formData.append("file", file_input.files[0], _filename);
		formData.append("path", '/' + path + '/');
		$.ajax({
			url: "/api/v2/upload/",
			type: "POST",
			data: formData,
			contentType: false,
			cache: false,
			processData: false,
			beforeSend: function () {
				return true;
			},
			success: function (data) {
				console.log(data);
				callback(data);
			},
			error: function (e) {
				callback(e);
			}
		});
	};
	window.uploader      = function (file_input, upload_url, callback) {
		var formData = new FormData();

		formData.append("__token", wbapp._session.token);
		formData.append("files[]", file_input.files[0]);
		formData.append("upload_url", path);

		$.ajax({
			url: "/engine/modules/filepicker/uploader/index.php",
			type: "POST",
			data: formData,
			contentType: false,
			cache: false,
			processData: false,
			beforeSend: function () {
				return true;
			},
			success: function (data) {
				console.log(data);
				callback(data);
			},
			error: function (e) {
				callback(e);
			}
		});
	};
	window.changeLogSave = function (new_record_data, prev_record_data) {
		var changelog = [];
		if (new_record_data.status != prev_record_data.status) {
			changelog.push({
				label: 'Статус',
				field: 'status',
				prev_val: prev_record_data.status,
				new_val: new_record_data.status
			});
		}
		if (new_record_data.event_date != prev_record_data.event_date) {
			changelog.push({
				label: 'Дата/время приёма',
				field: 'event_date',
				prev_val: utils.formatDate(prev_record_data.event_date),
				new_val: utils.formatDate(new_record_data.event_date)
			});
		}
		if (new_record_data.services.join('') != prev_record_data.services.join('')) {
			changelog.push({
				label: 'Услуга',
				field: 'services',
				prev_val: prev_record_data.services,
				new_val: new_record_data.services
			});
		}
		if (new_record_data.experts.join('') != prev_record_data.experts.join('')) {
			changelog.push({
				label: 'Специалисты',
				field: 'experts',
				prev_val: prev_record_data.experts,
				new_val: new_record_data.experts
			});
		}
		if (changelog.length) {
			utils.api.post('/api/v2/create/record-changes/',
				{
					record: prev_record_data.id,
					record_group: prev_record_data.group,
					experts: prev_record_data.experts,
					client: prev_record_data.client,
					changes: changelog
				});
		}

	};
	$(document)
		.on('change blur', '.event-time-start', function (e) {
			var end_time       = $(this).parents('.row.event-time').find('.event-time-end');
			var start_time_val = $(this).val();
			var end_time_val   = end_time.val();
			console.log(end_time_val, start_time_val);
			end_time.attr('data-min-time', start_time_val);
			if (!end_time_val) {
				end_time.val(start_time_val);
			}
		})
		.on('change', '[type="file"].client-photo', function (e) {
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
		})
		.on('click', 'a[data-link]', function (e) {
			e.stopPropagation();
			e.preventDefault();
			window.location.href = $(this).data('link');
		})
		.on('click', 'a[data-client]', function (e) {
			e.stopPropagation();
			e.preventDefault();
			window.location.href = "/cabinet/client/" + $(this).data('client');
		})
		.on('click', 'a.signout', function (e) {
			e.stopPropagation();
			console.log('Logout clicked..');
			window.catalog.reload();
		})
		.on('click', 'a.btn.btn--black.login', function (e) {
			e.stopPropagation();
			console.log('Login clicked..');
			window.catalog.reload();
		})
		.on('wb-ready', function (e) {
			console.log('Async. JS loaded!');
			$(document).trigger('plugins-ready');
		})
		.on('cabinet-page-ready', function (e) {
			console.log('Cabinet page ready!');
		});
});