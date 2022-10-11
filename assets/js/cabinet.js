$(function () {
	/* common function */
	window.getChangesJSON = function (prev_data, curr_data, field_to_compare) {
		var changes = {};
		var to_compare = field_to_compare;
		for (var i in obj2) {
			if (!!to_compare && !to_compare.include(i)){
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
			$(e.target);
			wbapp.loading();
			setTimeout(function () {
				wbapp.unloading();
			}, 100);
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