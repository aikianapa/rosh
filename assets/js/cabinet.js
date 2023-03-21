window.user_role       = wbapp?._session?.user?.role;
window.client_search   = null;
Date.prototype.isValid = function () {
	// An invalid date object returns NaN for getTime() and NaN is the only
	// object not strictly equal to itself.
	return this.getTime() === this.getTime();
};

function html_decode(input) {
	var e       = document.createElement('textarea');
	e.innerHTML = input;
	// handle case of empty input
	return e.childNodes.length === 0 ? "" : e.childNodes[0].nodeValue;
}

function setPageScrollPosition(_page_name) {
	window.onbeforeunload = function () {
		sessionStorage["scroll-position--" + _page_name] = $(window).scrollTop();
	};
	var pos               = sessionStorage["scroll-position--" + _page_name] || false;
	if (pos) {
		$('body').scrollTop(pos);
		sessionStorage.removeItem("sp--lk-main");
	}
}

function getPageScrollPosition(_page_name, _clear) {
	let res = sessionStorage["scroll-position--" + _page_name] || false;
	if (!!_clear) {
		sessionStorage.removeItem("scroll-position--" + _page_name);
	}
	return res;
	//
	//window.onbeforeunload = function () {
	//	sessionStorage["tab--lk-main"] = $('.tab.active').data("tab");
	//};
	//var pos               = sessionStorage["sp--lk-main"] || false;
	//if (pos) {
	//	$('body').scrollTop(pos);
	//	sessionStorage.removeItem("sp--lk-main");
	//}
}

function fix_comment(text) {
	var title_problems = 'ВЫБРАННЫЕ УСЛУГИ ИЛИ СУЩЕСТВУЮЩИЕ ПРОБЛЕМЫ';
	var title_symptoms = 'ВЕРОЯТНАЯ ПРОБЛЕМАТИКА ПО СИМПТОМАМ';
	var tmp            = text.replace(title_problems, title_problems.toLowerCase());
	tmp                = tmp.replace(title_problems.toLowerCase(),
		'<div class="text-bold" style="color:#123">' + title_problems.toLowerCase() + '</div>');
	tmp                = tmp.replace(title_symptoms, title_symptoms.toLowerCase());
	tmp                = tmp.replace(title_symptoms.toLowerCase(),
		'<div class="text-bold" style="color:#123">' + title_symptoms.toLowerCase() + '</div>');
	return tmp;
}

function unselectConsultation(el) {
	var _parent = $(el).parents('form').find('.consultations .select-form[data-show="consultation-type"]');
	console.log(el, _parent);
	_parent.find('label[data-show-input="consultation-online"] input.consultation-type').prop('checked', false);
	_parent.find('label[data-show-input="consultation-online"]').trigger('click');
}

$(function () {
	console.log('>>> cabinet.js loaded ..');

	$('body').on('click', '.crumbs__arrow', function (e) {
		e.preventDefault();
		history.back();
	});
	window.resoreSending    = false;
	window.sendRestoreEMail = function (email) {
		if (window.resoreSending == true) {
			toast_warning('Подождите, идет предыдущая отправка кода!');
			return;
		}
		if (email !== '') {
			wbapp.loading();
			window.resoreSending = true;
			$.ajax({
				url: '/form/emailAuth/recover',
				method: 'POST',
				data: {
					email: email
				},
				complete: function () {
					window.resoreSending = false;
				},
				success: function (data) {
					wbapp.unloading();
					if (data.status === 'ok') {
						toast('Код успешно отправлен!');
					} else {
						toast('Код успешно отправлен!');
					}
				}
			});
		}
	};
	var isObj               = function (a) {
		return (!!a) && (a.constructor === Object);
	};
	var _st                 = function (z, g) {
		return "" + (g != "" ? "[" : "") + z + (g != "" ? "]" : "");
	};
	var months              = ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'];

	window.utils       = {
		saveScroll(page_name) {
			var _page_name        = page_name || location.pathname;
			window.onbeforeunload = function () {
				sessionStorage["state.page"]        = _page_name;
				sessionStorage["state.scroll"]      = $(window).scrollTop();
				sessionStorage["state.tab-cabinet"] = $('.account__tab.data-tab-item.active').data('tab');
				var _open                           = $('.account__tab.data-tab-item.active ' +
				                                        '.accardeon.acount__table-accardeon--pmin.active');
				if (_open.length) {
					sessionStorage["state.open-editor"] = _open.data('record');
				}
			};
		},
		restoreScroll(page_name) {
			var _curr_page_name = page_name || location.pathname;

			let _state_page = sessionStorage["state.page"] || false;

			if (!!_state_page && (_state_page === _curr_page_name)) {
				var _scroll_pos = sessionStorage["state.scroll"],
				    _accardeon  = sessionStorage["state.accardeon"];
				$(window).scrollTop(_scroll_pos);
			} else {
				return;
			}
			var _tab = sessionStorage['state.tab-cabinet'] || false;
			var _el  = $('.account__tab-items .account__tab-item.data-tab-link:first');
			if (_tab) {
				_el = $('.account__tab-items .account__tab-item.data-tab-link[data-tab="' + _tab + '"]');
				if (_el.length) {
					_el.trigger('click');
				}
			} else {
				if (_el.length) {
					_el.trigger('click');
				}
			}
			sessionStorage.removeItem("state.tab");

			var _open_editor = sessionStorage['state.open-editor'] || false;
			if (_open_editor) {
				setTimeout(function () {
					_el = $('.accardeon__click[data-record="' + _open_editor + '"]');
					if (_el.length) {
						console.log('_open_editor', _el);
						setTimeout(function () {
							_el[0].click();
						}, 650);
					}
				}, 500);
			}
			sessionStorage.removeItem("state.page");
			sessionStorage.removeItem('state.tab-cabinet');
			sessionStorage.removeItem('state.open-editor');
			sessionStorage.removeItem("state.accardeons");
			sessionStorage.removeItem("state.scroll");

		},

		isObjEmpty(obj) {
			return Object.keys(obj).length === 0;
		},
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
				/*!!! fix this !!!*/
				let _path = path.replaceAll('&amp;', '&');

				let parts = _path.split('?', 2);
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
				/*!!! fix this !!!*/
				let _path = path.replaceAll('&amp;', '&');

				//return this.request(path, 'post', data, options);
				if (is_string(data) && (data.indexOf('__token') == -1)) {
					data += '&__token=' + wbapp._session.token;
				} else if (!data.hasOwnProperty('__token')) {
					try { data.__token = wbapp._session.token; } catch (error) { null; }
				}
				wbapp.loading();
				return $.post(_path, data, function () {
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
		timestamp(date) {
			var datetime = this.getDate(date);
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
			if (!!date && !result.isValid()) {
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
			var phone   = str_replace([' ', '-', '(', ')'], '', _phone);
			var cleaned = ('' + phone).replace(/\D/g, '');
			if (phone.length === 10) {
				phone = '7' + phone;
			}
			var match = cleaned.match(/^(7|)?(\d{3})(\d{3})(\d{2})(\d{2})$/); //(XXX) XXX XX XX
			//console.log('??', phone, match);

			if (match) {
				var intlCode = (match[1] ? '+7 ' : '');
				phone        = [intlCode, '(', match[2], ') ', match[3], '-', match[4], '-', match[5]].join('');
			}

			//console.log('???', phone);

			return phone;
		},
		formatPrice(val, sufix) {
			if (!val || isNaN(val)) {
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
	window.catalog     = {
		/*!!! TODO: add methods to set this spec. services price from cms/dashboard !!!*/
		spec_service: {
			consultations: {
				online: {},
				clinic: {}
			},
			analyses_interpretation: {
				online: {},
				clinic: {}
			}
		},
		/*dyctionary types*/
		quoteColors: {},
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
		priceCategories: {},
		experts: {},
		expert_users: {},
		clients: {},
		admins: {},
		consultations: {},
		reload(only_key) {
			var _self = this;
			var _key  = only_key;
			if (!!_key) {
				localStorage.removeItem('db.' + _key + _self.cacheKey);
				sessionStorage.removeItem('db.' + _key + _self.cacheKey);
			} else {
				['-dev', '-preprod', _self.cacheKey].forEach(function (ck) {
					localStorage.removeItem('db.quoteStatuses' + ck);
					localStorage.removeItem('db.quoteType' + ck);
					localStorage.removeItem('db.quotePay' + ck);
					localStorage.removeItem('db.categories' + ck);
					localStorage.removeItem('db.labCategories' + ck);

					sessionStorage.removeItem('db.services' + ck);
					sessionStorage.removeItem('db.servicesList' + ck);
					sessionStorage.removeItem('db.servicePrices' + ck);
					/* old keys clear */
					sessionStorage.removeItem('db.experts' + ck);
					sessionStorage.removeItem('db.expert_users' + ck);
					sessionStorage.removeItem('db.experts_alt' + ck);

					sessionStorage.removeItem('db.expert_list' + ck);
					sessionStorage.removeItem('db.expert_user_list' + ck);
				});
			}
			console.log('Cache cleared!');
			if (_key !== false) {
				this.init();
			}
		},
		cacheKey: '-new',
		init(use_session_cache) {
			var _self         = this;
			_self.rawServices = [];
			var getters       = [];
			getters.push(
				utils.api.get('/api/v2/list/catalogs/?' +
				              '@group=_id&@return=tree,name,id&_id=[quote_type,shop_category,srvcat,quote_status,quote_pay]')
					.then(function (data) {
						_self.quotePay                    = data['quote_pay'][0]['tree']['data'];
						_self.quoteType                   = data['quote_type'][0]['tree']['data'];
						_self.quoteStatus                 = data['quote_status'][0]['tree']['data'];
						_self.quoteStatus['past']['type'] = 'event';

						let _serviceCats = {};
						Object.keys(data['srvcat'][0].tree.data).forEach(function (_key) {
							const _cat = data['srvcat'][0].tree.data[_key];
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

						var shop_categories = data['shop_category'][0]?.tree?.data;
						if (!shop_categories) {
							return false;
						}
						var keys = Object.keys(shop_categories);
						keys.forEach(function (key) {
							var cat = shop_categories[key];
							delete cat.active;

							_self.priceCategories[key] = cat;
							if (cat.hasOwnProperty('children')) {
								var _keys = Object.keys(cat.children);
								_keys.forEach(function (_key) {
									var obj = cat.children[_key];
									if (key === 'lab') {
										obj.isLab                   = ["lab"];
										obj.type                    = ["lab"];
										_self.priceCategories[_key] = obj;
									} else {
										delete cat.children;
										_self.priceCategories[_key] = obj;
									}
								});
							} else {
								delete cat.children;
							}
						});
					})
			);
			getters.push(
				utils.api.get('/api/v2/list/price?active=on&@sort=header').then(function (data) {
					if (!data) {
						return;
					}
					console.log('>> >> >>');
					_self.rawServices = data;
				})
			);
			getters.push(
				utils.api.get('/api/v2/list/experts?active=on&login~=id&' +
				              '@return=id,name,image,devision,spec,experience,education,login&' +
				              '@sort=name:a').then(function (data) {
					let _expert_users = {};
					data.forEach(function (expert, i) {
						if (!!expert.login) {
							_expert_users[expert.login] = expert;
							utils.api.get('/api/v2/list/_yonmap', {f: 'experts', i: expert.id})
								.then(function (res) {
									if (!res || !res[0]) {
										return;
									}
									catalog.expert_users[expert.id].info_uri = res[0]['u'] || '';
									sessionStorage.setItem('db.expert_users' + _self.cacheKey,
										JSON.stringify(catalog.expert_users));
								});
						}
					});
					//_self.experts      = _experts;
					_self.expert_users = _expert_users;
					//sessionStorage.setItem('db.expert_list', JSON.stringify(_self.experts));
				})
			);
			/* for Admins only */
			utils.api.get('/api/v2/list/users?role=expert&active=on' +
			              '' +
			              '&@sort=fullname:a').then(function (data) {
				_self.experts = utils.arr.indexBy(data);
			});

			if (!!window.user_role && window.user_role !== 'client') {
				getters.push(
					utils.api.get('/api/v2/list/users?role=client&active=on' +
					              '' +
					              '&@sort=fullname:a').then(function (data) {
						_self.clients = utils.arr.indexBy(data);
						utils.api.get('/api/v2/list/records?group=longterms' +
						              '' +
						              '&@sort=fullname:a').then(function (data) {
							if (data) {
								data.forEach(function (rec) {
									console.log(rec);
									if (_self.clients[rec.client]) {
										_self.clients[rec.client]['has_longterm'] = 1;
									}
								});
							}
						});
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
			}

			return Promise.allSettled(getters).then((results) => {
				_self.rawServices.forEach(function (service, i) {
					if (!service.price || parseInt(service.price) < 1) {
						return;
					}

					if (!_self.priceCategories.hasOwnProperty(service.category)) {
						_self.priceCategories[service.category] = {
							'name': service.header,
							'id': service.category
						};
					}
					var service_parent                      = _self.priceCategories[service.category];
					_self.services[service.category]        = service_parent;
					_self.services[service.category].header = service_parent.name;

					let _cats;
					let _tags = [];

					let _quote = '';
					let title  = '';
					if (!service.hasOwnProperty('type')) {
						_cats = ["lab"];
						title = service_parent.name + ': ' + service.header;
					} else {
						title = service.header;
						_cats = service.type;
					}

					_cats.forEach(function (cat) {
						_tags.push({
							"id": cat,
							"color": _self.serviceTags[cat].color,
							"tag": Array.from(_self.serviceTags[cat].name)[0]
						});
					});
					if (service.hasOwnProperty('quote')) {
						_quote = service.quote;
						if (service.quote == 'online') {
							_self.spec_service.consultations.online[service.id] = service;
						} else if (service.quote == 'clinic') {
							_self.spec_service.consultations.clinic[service.id] = service;
						}
					}

					if (service.header.includes('анализов')) {
						if (service.header.includes('Онлайн')) {
							_self.spec_service.analyses_interpretation.online = service;
						} else {
							_self.spec_service.analyses_interpretation.clinic = service;
						}
					}
					let _item = {
						value: title,
						id: service.category + '-' + service.id,
						data: {
							from: service?.from,
							quote: _quote,
							service_id: service.category,
							service_title: _self.priceCategories[service.category].name,
							tags: _tags,
							price: service.price,
							price_id: service.id
						}
					};
					_self.servicesList.push(_item);
					_self.servicePrices[_item.id] = {
						from: service?.from,
						quote: _quote,
						id: _item.id,
						service_id: service.category,
						service_title: _self.priceCategories[service.category].name,
						price: service.price,
						header: service.header,
						tags: _tags
					};
				});

				$(document).trigger('cabinet-db-ready');
			});
		}
	};
	window.Cabinet     = {
		eventTimestamp(event) {
			var event_date           = utils.getDate(event.event_date);
			let event_from_timestamp = utils.timestamp(
				event_date.setHours(parseInt(event.event_time_start.split(':')[0]),
					parseInt(event.event_time_start.split(':')[1])));
			return event_from_timestamp || 1;
		},
		isCurrentDayEvent(event) {
			return utils.formatDate(event.event_date) === utils.formatDate(new Date());
		},
		isCurrentEvent(event) {
			var event_date     = utils.getDate(event.event_date);
			let curr_timestamp = utils.timestamp(new Date());

			//if (!this.isCurrentDayEvent(event)) {
			//	return false;
			//}

			let event_from_timestamp = utils.timestamp(
				event_date.setHours(parseInt(event.event_time_start.split(':')[0]),
					parseInt(event.event_time_start.split(':')[1])));
			let event_to_timestamp   = utils.timestamp(
				event_date.setHours(parseInt(event.event_time_end.split(':')[0]),
					parseInt(event.event_time_end.split(':')[1])));

			console.log(curr_timestamp, event_from_timestamp, event_from_timestamp < (curr_timestamp + 301));

			return (event_from_timestamp < (curr_timestamp + 301)/* && event_to_timestamp >= curr_timestamp*/);
		},
		runOnlineChat(room_name) {
			/*!! check record  exists & status & pay_status & date !!*/
			/*!! mark record as "online_waiting"=1 !!*/
			if (!wbapp?._session?.user) {
				return false;
			}
			window.open('/cabinet/online#' + room_name,
				'_blank', 'width=' + screen.availWidth + ',' +
				          'height=' + screen.availHeight +
				          ',location=yes,scrollbars=yes,status=no');
		},
		updateProfile(profile_id, profile_data, callback) {
			let data = profile_data;
			//console.log(data);

			data.phone = str_replace([' ', '-', '(', ')'], '', data.phone);
			if (data.phone.length === 10) {
				data.phone = '+7' + data.phone;
			}
			data.fullname    = data.fullname.replaceAll('  ', ' ');
			var names        = data.fullname.split(' ');
			data.first_name  = names[1];
			data.middle_name = names[2] || '';
			data.last_name   = names[0] || '';

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
	window.onlineRooms = {
		create(onSuccess) {
			var self = this;
			utils.api.post('/form/records/meetRoomCreate', {}).then(function (data) {
				console.log('success:', data);
				onSuccess(data);
			});
		},
		delete(meetingId, onSuccess) {
			var self = this;
			utils.api.post('/form/records/meetRoomDelete', {'meetingId': meetingId}).then(function (data) {
				console.log('success:', data);
				onSuccess(data);
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

	//document.addEventListener('visibilitychange', (event) => { console.log('Toggle tabs...', event);});
	window.updPrice           = function (_parent_form) {
		console.log('find price for:', _parent_form);
		var sum = 0;
		_parent_form.find('.admin-editor__patient .search__drop-item.selected').each(function (e) {
			sum += parseInt($(this).data('price'));
		});
		console.log(_parent_form, sum);
		_parent_form.find('.admin-editor__summ .price').html(utils.formatPrice(sum) + ' ₽<sup><b>*</b></sup>');
		_parent_form.find('.admin-editor__summ [name="price"]').val(sum);
	};
	window.initServicesSearch = function ($selector, service_list) {
		var _parent_form = $selector.closest('form');
		$(document).on('click', '.search__drop-delete:not(.fake)', function (e) {
			e.stopPropagation();
			var item = $(this).parents('.search__drop-item');
			if (item.data('quote')) {
				_parent_form.find('input[name="for_consultation"]').prop(':checked', true).trigger('change');
			}
			item.remove();
			let sum = 0;
			_parent_form.find('.admin-editor__patient .search__drop-item.selected').each(function (e) {
				sum += parseInt($(this).data('price'));
			});
			_parent_form.find('.admin-editor__summ .price').html(utils.formatPrice(sum) + ' ₽<sup><b>*</b></sup>');
			_parent_form.find('.admin-editor__summ [name="price"]').val(sum);
		});
		$selector.autocomplete('dispose');

		return $selector.autocomplete({
			noCache: false,
			minChars: 0,
			lookup: service_list,
			appendTo: _parent_form.find('.service-search__list'),
			noSuggestionNotice: '<p>Услуга не найдена..</p>',
			showNoSuggestionNotice: true,
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
							'data-id': this.id,
							'data-index': index,
							'data-value': index,
							"data-service_id": this.data.service_id,
							"data-price": this.data.price
						}).append(
							$('<div></div>').addClass('search__drop-name').text(this.value)
						).append(
							$('<div></div>').addClass('search__drop-right').append(TAGS).append(
								$('<div></div>').addClass('search__drop-summ').text(
									(this.data.from == 'on' ? 'от  ' : '') +
									PRICE + ' ₽')
							)
						)
					);
				});
			},
			onSelect: function (suggestion) {
				$selector.val('');
				if (_parent_form.find(
					'.admin-editor__patient:not(.price-list) [data-id=' + suggestion.id + ']').length) {
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
					'.admin-editor__patient:not(.price-list) .search__drop-item[data-service_id]').length;
				var sum     = 0;
				console.log('selected:', suggestion);
				if (suggestion.data.quote) {
					_parent_form.find('input.checkbox-visible-next-form[name="for_consultation"]')
						.prop(':checked', true);
					_parent_form.find('[data-show="consultation-type"]').show();
					_parent_form.find('[data-show-input="consultation-' + suggestion.data.quote + '"]')
						.trigger('click');
					_parent_form.find('.price-list .search__drop-item.consultation[data-consultation="' +
					                  suggestion.data.price_id + '"] label').trigger('click');
					updPrice(_parent_form);
					setTimeout(function () {

					});
					return;
				}
				_parent_form.find('.admin-editor__patient:not(.price-list)').append(
					$('<div></div>').addClass('search__drop-item selected').attr({
						'data-id': suggestion.id,
						'data-index': index,
						"data-quote": suggestion.data.quote,
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
							.append($('<div></div>').addClass('search__drop-summ').html(
								(suggestion.data.from == 'on' ? 'от ' : '') +
								PRICE + ' ₽<sup><b>*</b></sup>'))
					)
				);
				updPrice(_parent_form);
				//_parent_form.find('.admin-editor__patient .search__drop-item.selected').each(function (e) {
				//	sum += parseInt($(this).data('price'));
				//});
				//console.log(_parent_form, sum);
				//_parent_form.find('.admin-editor__summ .price').html(utils.formatPrice(sum) + '
				// ₽<sup><b>*</b></sup>'); _parent_form.find('.admin-editor__summ [name="price"]').val(sum);
			}
		});
	};
	window.initLongtermSearch = function ($form, for_client) {
		var form       = $form || $('.popup .popup__form');
		let client_qry = '';
		if (!!for_client) {
			client_qry = '&client=' + form.find('[name="client"]').val();
		}
		form.find('.event-search.longterm-search').autocomplete({
			noCache: true,
			minChars: 1,
			deferRequestBy: 350,
			dataType: 'json',
			type: 'GET',
			paramName: 'title~',
			serviceUrl: function () {
				var client_qry = '';
				if (!!for_client) {
					client_qry = '&client=' + form.find('input[name="client"]').val();
				}

				return '/api/v2/list/records?__token=' + wbapp._session.token +
				       '&group=longterms' + client_qry;
			},
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
		var form = $form || $('.popup .popup__form');
		form.find('.event-search.record-search').autocomplete({
			noCache: true,
			minChars: 0,
			deferRequestBy: 250,
			dataType: 'json',
			type: 'GET',
			paramName: '',
			noSuggestionNotice: '<p>Не найдено событий..</p>',
			showNoSuggestionNotice: 1,
			serviceUrl: function () {
				var client_qry = '';
				if (!!for_client) {
					client_qry = '&client=' + form.find('input[name="client"]').val();
				}
				return '/api/v2/list/records?__token=' + wbapp._session.token +
				       '&group=[longterms,events]&status=[upcoming,past,new]' + client_qry + '&@sort=_lastdate:d';
			},

			transformResult: function (response) {
				return {
					suggestions: $.map(response, function (dataItem) {
						console.log(dataItem);

						var title = '';
						if (!!dataItem.for_consultation) {
							title = 'Консультация';
						} else {
							title = (dataItem.group === 'longterms')
								? (dataItem.longterm_title)
								: catalog.services[dataItem.services[0]].header;

						}
						var _sufix = '';
						if (dataItem.group === 'longterms') {
							_sufix = '    (продолжительное лечение)';
						} else {
							if (!!dataItem.event_time_start) {
								_sufix += dataItem.event_time_start;

								if (!!dataItem.event_time_end) {
									_sufix += ' - ' + dataItem.event_time_end;
								}
							}
						}

						return {
							value: (title + (dataItem.type == 'online' ? ' (онлайн)' : '') +
							        ', ' +
							        utils.formatDate(dataItem.event_date) + ' ' + _sufix).trim(),
							data: {id: dataItem.id, is_longterm: dataItem.group === 'longterms'}
						};
					})
				};
			},
			onSelect: function (suggestion) {
				form.find('input[name="id"]').val(suggestion.data.id);
				if (suggestion.data.is_longterm) {
					form.find('span.changed_label_after').text('после начала лечения');
					form.find('span.changed_label_before').text('до начала лечения');
				} else {
					form.find('span.changed_label_after').text('после приема');
					form.find('span.changed_label_before').text('до приема');
				}
			}
		});
	};
	window.initClientSearch   = function ($form) {
		var form             = $form || $('.popup .popup__form');
		window.client_search = form.find('input.client-search').autocomplete({
			noCache: false,
			minChars: 0,
			deferRequestBy: 300,
			dataType: 'json',
			type: 'GET',
			paramName: 'fullname~',
			ignoreSelected: true,
			serviceUrl: '/api/v2/list/users?role=client&active=on&@sort=fullname&__token=' + wbapp._session.token,
			noSuggestionNotice: '<p>Пациентов не найдено..</p>',
			showNoSuggestionNotice: 1,
			transformResult: function (response) {
				console.log(response, response.length);
				if (!!response) {
					response = response.filter(function (item) {
						console.log('--', item, item.fullname);
						return !!item.fullname;
					});
				}
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
				'services': catalog.services,
				'selector': null
			},
			on: {
				teardown() {
					$('.search-services').autocomplete('dispose');
					$('.autocomplete-suggestions.search__drop').remove();
				},
				complete() {
					this.set('catalog', catalog);
					$('.search-services').autocomplete('dispose');

					initServicesSearch($('.search-services'), catalog.servicesList);
					initPlugins($(this.el));
				},
				selectCategory(ev) {
					var _el = $(ev.node).parents('form').find('.search__input.search-services');

					setTimeout(function () {
						_el.trigger('focus').trigger('keydown');
						//_el.find('.search-services').trigger('focus');
					}, 400);
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
						data.client_comment = '';

						data.price = parseInt(data.price || 0);

						if (data.no_services == 1) {
							data.services       = [];
							data.service_prices = {};
						}
						if (data.no_experts == 1) {
							data.experts        = [];
							data.service_prices = {};
						}
						Cabinet.createQuote(data, function (res) {
							$('.popup.--record .popup__panel:not(.--succed)').addClass('d-none');
							$('.popup.--record .popup__panel.--succed').addClass('d-block');
							if (typeof window.load == 'function') {
								window.load();
							}
						});
					}

					return false;
				}
			}
		});
	};
	window.popupPay                   = function (record_id, full_price, user_id, type, consultation_price) {
		const pay_consultation = parseInt(consultation_price || '0');
		var price              = (pay_consultation > 0) ? pay_consultation : parseInt(full_price);
		if (pay_consultation) {

		}
		const pay_price = (type == 'online') ? price : Math.floor(price / 5);

		var popup = new Ractive({
			el: '.popup.--pay',
			template: wbapp.tpl('#popupPay').html,
			data: {
				pay_price: pay_price,
				is_online: (type == 'online'),
				price: price,
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
					var form = this.find('.popup.--analize-interpretation .popup__form');
					console.log(form);
					if ($(form).verify()) {

						var data      = $(form).serializeJSON();
						data.group    = 'quotes';
						data.status   = 'new';
						data.client   = wbapp._session.user.id;
						data.priority = 0;
						data.marked   = false;

						data.comment          = '';
						data.recommendation   = '';
						data.description      = '';
						data.client_comment   = 'Расшифровка анализов';
						data.for_consultation = 1;
						if (data.type === 'online') {
							data.price      = parseInt(catalog.spec_service.analyses_interpretation.online.price);
							data.pay_status = 'unpay';
						} else {
							data.price      = parseInt(catalog.spec_service.analyses_interpretation.clinic);
							data.pay_status = 'unpay';
						}
						data.price          = parseInt(data.price || 0);
						data.services       = [];
						data.experts        = [];
						data.service_prices = {};

						Cabinet.createQuote(data, function (res) {
							$('.popup.--analize-interpretation .popup__panel:not(.--succed)').addClass('d-none');
							$('.popup.--analize-interpretation .popup__panel.--succed').addClass('d-block');

							if (typeof window.load == 'function') {
								window.load();
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
	//window.popupMessage         = function (title, subtitle, caption, html, onShow) {
	//	return new Ractive({
	//		el: '.popup.--message',
	//		template: wbapp.tpl('#popupMessage').html,
	//		data: {
	//			content: html,
	//			title: title,
	//			subtitle: subtitle,
	//			caption: caption,
	//			html: html
	//		},
	//		on: {
	//			init() {
	//			},
	//			complete() {
	//				if (!!onShow) {
	//					onShow(this);
	//				}
	//				$(this.el).show();
	//			},
	//			close(e) {}
	//		}
	//	});
	//
	//};
	window.popupPhoto2    = function (params) {
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
						initPlugins($(this.el));
						initClientSearch($('.popup.--photo form'));
						initLongtermSearch($('.popup.--photo form'), true);
					});
				},
				complete() {
					$(this.el).show();
					$('body').addClass('noscroll');
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
	window.popupLongterm2 = function (params, onSaved, onCancel) {
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
						initClientSearch($('.popup.--longterm form'));
						initLongtermSearch($('.popup.--longterm form'), true);
					});
				},
				complete() {
					var self = this;
					initPlugins($(this.el));
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

	window.uploadFile    = function (file, path, filename, callback) {
		var formData  = new FormData();
		var _fileext  = file.name.split('.').pop();
		var _filename = filename ? filename + '.' + _fileext : file.name;
		console.log(_filename);
		formData.append("__token", wbapp._session.token);
		formData.append("file", file, _filename);
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
				label: 'Датa приёма',
				field: 'event_date',
				prev_val: utils.formatDate(prev_record_data.event_date),
				new_val: utils.formatDate(new_record_data.event_date)
			});
		}
		if ((new_record_data.event_time_start != prev_record_data.event_time_start)
		    || (new_record_data.event_time_end != prev_record_data.event_time_end)) {
			changelog.push({
				label: 'Время приёма',
				field: 'event_time',
				prev_val: prev_record_data.event_time_start + '-' + prev_record_data.event_time_end,
				new_val: new_record_data.event_time_start + '-' + new_record_data.event_time_endevent_
			});
		}

		if ((new_record_data?.services && prev_record_data?.services)
		    &&
		    (new_record_data?.services?.join('') != prev_record_data?.services?.join(''))) {
			changelog.push({
				label: 'Услуга',
				field: 'services',
				prev_val: prev_record_data.services,
				new_val: new_record_data.services
			});
		}
		if (!new_record_data?.services && !!prev_record_data.services) {
			changelog.push({
				label: 'Услуга',
				field: 'services',
				prev_val: prev_record_data.services,
				new_val: []
			});
		}
		if (!prev_record_data?.services && !!new_record_data.services) {
			changelog.push({
				label: 'Услуга',
				field: 'services',
				prev_val: [],
				new_val: new_record_data.services
			});
		}
		if (new_record_data?.experts?.join('') != prev_record_data?.experts?.join('')) {
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
		//.on('change blur focus', 'input.event-time-start', function (e) {
		//	var end_time       = $(this).parents('.row.event-time').find('.event-time-end');
		//	var start_time_val = $(this).val();
		//	var end_time_val   = end_time.val();
		//	console.log('--> ', end_time_val, start_time_val);
		//	if (!start_time_val){
		//		return;
		//	}
		//	end_time.attr('data-min-time', start_time_val);
		//	end_time.timepicker({'minTime': start_time_val});
		//	if (!end_time_val) {
		//		end_time.val(start_time_val);
		//	}
		//})
		.on('change', '[type="file"].client-photo', function (e) {
			e.stopPropagation();
			var _block = $(this).parents('.file-photo');
			var _files = Array.from(e.target.files);
			_block.find('img.preview.cloned').remove();
			var _preview = _block.find('img.preview');
			console.log(_block, 'selected!');

			if (!!_preview.length) {
				var reader;
				var max_size = 10 * 1024 * 1024;
				if (_files && _files.length > 0) {
					_block.find('.svgsprite._file').addClass('d-none');
					_files.forEach(function (file) {
						//file = _files[0];
						if (file.size >= max_size) {
							toast('Размер файла c фото не может превышать 10 мб', '', 'error');
							$(this).val('');
							return;
						}

						var preview = _preview.clone();
						_preview.parents('.file-photo__ico').append(preview);
						if (URL) {
							preview.attr('src', URL.createObjectURL(file));
							preview.addClass('cloned').removeClass('d-none');
						} else if (FileReader) {
							reader        = new FileReader();
							reader.onload = function (e) {
								preview.attr('src', reader.result);
								preview.addClass('cloned').removeClass('d-none');
							};
							reader.readAsDataURL(file);
						}
					});
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