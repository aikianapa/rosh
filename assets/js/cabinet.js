
$(function () {
	/* common function */
	window.toast = function(text, head, type){
		$.toast({
			text: text, // Text that is to be shown in the toast
			heading: head || '', // Optional heading to be shown on the toast
			showHideTransition: 'slide', // fade, slide or plain
			allowToastClose: true, // Boolean value true or false
			hideAfter: 4000,
			stack: 5,
			position: 'top-right',
			bgColor: '#616161',  // Background color of the toast
			textColor: '#fefefe',  // Text color of the toast
			textAlign: 'left',  // Text alignment i.e. left, right or center
			loader: false,  // Whether to show loader or not. True by default
			beforeShow: function () {}, // will be triggered before the toast is shown
			afterShown: function () {}, // will be triggered after the toat has been shown
			beforeHide: function () {}, // will be triggered before the toast gets hidden
			afterHidden: function () {}  // will be triggered after the toast has been hidden
		});
	};
	window.transliterate = function (word){
			var a         = {
				"Ё": "e",
				"ё": "e",

				"ЫЙ": "iy",
				"ый": "iy",
				"ия": "iya",
				"ии": 'ii',
				"ій": "iy",
				"Й": "y",
				"й": "y",

				"Ц": "ts",
				"ц": "ts",

				"У": "u",
				"К": "k",
				"Е": "e",
				"Н": "n",
				"Г": "g",
				"Ш": "sh",
				"Щ": "shch",
				"З": "z",
				"Х": "h",
				"Ъ": "",
				"у": "u", "к": "k",
				"е": "e", "н": "n",
				"г": "g", "ш": "sh", "щ": "shch",
				"з": "z", "х": "h", "ъ": "", "Ф": "f", "Ы": "y", "В": "V", "А": "a",
				"П": "P", "Р": "R", "О": "O", "Л": "l", "Д": "d",
				"Ж": "ZH", "Э": "E", "ф": "f", "ы": "y", "в": "v", "ґ": "g", "Ґ": "g",
				"а": "a", "п": "p", "р": "r", "о": "o", "л": "l", "д": "d", "ж": "zh",
				"э": "e", "Я": "ya", "Ч": "ch", "С": "s", "М": "M", "И": "I", "Т": "T",
				"Ь": "", "Б": "B",
				"Ю": "yu", "я": "ya", "ч": "ch", "ї": "yi", "Ї": "yi",
				"с": "s", "м": "m",
				"и": "i",
				"і": "i", "т": "t", "ь": "", "б": "b",
				"ю": "yu"
			};
			var delimiter = '-';
			return word.split('').map(function (char) {
				return a.hasOwnProperty(char) ? a[char] : char;
			}).join("").replace(/[^a-zA-Z0-9]/g, delimiter).replace(/[-]{2,}/g, '-')
				.replace(/[-_]*$/g, '')
				.toLowerCase();
	};
	window.initServicesSearchInput = function ($selector, service_list) {
		var _parent_form = $selector.parents('form');
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
							"name": 'services[' + suggestion.id + '][service_id]',
							"value": suggestion.data.service_id
						}).val(suggestion.data.service_id)
					).append(
						$('<input type="hidden">').attr({
							"name": 'services[' + suggestion.id + '][price_id]',
							"value": suggestion.data.price_id
						}).val(suggestion.data.price_id)
					).append(
						$('<input type="hidden">').attr({
							"name": 'services[' + suggestion.id + '][name]',
							"value": suggestion.value
						}).val(suggestion.value)
					).append(
						$('<input type="hidden">').attr({
							"name": 'services[' + suggestion.id + '][price]',
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
				console.log(_parent_form.find('.admin-editor__patient .search__drop-item').length);
				_parent_form.find('.admin-editor__summ .total-price').text(numFormaSpace(sum) + ' ₽');
				_parent_form.find('.admin-editor__summ [name="total_price"]').val(sum);
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
			_parent_form.find('.admin-editor__summ .total-price').text(numFormaSpace(sum) + ' ₽');
			_parent_form.find('.admin-editor__summ [name="total_price"]').val(sum);
		});
	};
	window.initClientSearchInput   = function ($selector) {
		var _parent_form = $selector.parents('form');
		$selector.autocomplete({
			noCache: true,
			minChars: 1,
			noSuggestionNotice: '<p>Нет результатов..</p>',
			lookup: function (query, done) {
				// Do Ajax call or lookup locally, when done,
				// call the callback and pass your results:
				var result = {
					suggestions: [
						{"value": "United Arab Emirates", "data": "AE"},
						{"value": "United Kingdom", "data": "UK"},
						{"value": "United States", "data": "US"}
					]
				};

				done(result);
			},
			onSelect: function (suggestion) {
				alert('You selected: ' + suggestion.value + ', ' + suggestion.data);
			}
		});
	};
	$(document).on('change input', '#image-selected', function (e) {
		console.log($(this).val());
	});
	setTimeout(function() {
		initPlugins();
		$(document).on('mod-filepicker-done', function (e, list) {
			$('.file-photo__ico img.preview').attr('src', list[0].img);
			$('.after-healing.mb-10.d-none img').attr('src', list[0].img);
			$('.after-healing.mb-10.d-none img').attr('src', list[0].img);
			wbapp.loading();
			setTimeout(function () {
				wbapp.unloading();
			}, 570);
		}).on('click', '.admin-editor__patient .btn--white', function (e) {
			wbapp.loading();
			e.preventDefault();
			setTimeout(function () {
				wbapp.unloading();
				toast('Успешно сохранено');
			}, 370);
		}).on('click', '.user__notconfirm', function (e) {
			wbapp.loading();
			e.preventDefault();
			setTimeout(function () {
				wbapp.unloading();
				toast('Код восстановления отправлен на почту клиента.', 'Успешно!');
			}, 2170);
		}).on('click', '.popup.--create-appoint .btn--white', function (e) {
			wbapp.loading();
			setTimeout(function () {
				wbapp.unloading();
				toast('Информация о предстоящем приеме доступна в Личном кабинете клиента', 'Успешно!');
				$('.account-events__block.d-none').removeClass('d-none');
			}, 1170);
		}).on('click', '.popup.--photo-profile .btn--white', function (e, list) {
			$('.popup.--photo-profile').fadeOut(200, function (e) {
				toast('Добавлено новое фото');
				setTimeout(function () {
					$('.after-healing.mb-10.d-none').removeClass('d-none');
				}, 770);
			});
		}).on('click', '.popup.--photo-longterm .btn--white', function (e, list) {
			$('.popup.--photo-longterm').fadeOut(200, function (e) {
				toast('Добавлено новое фото: Продолжительное лечение');
				setTimeout(function () {
					$('.after-healing .col-md-6.d-none').removeClass('d-none');
				}, 770);
			});
		}).on('change', '#upload-file', function (e, list) {
			wbapp.loading();
			setTimeout(function () {
				wbapp.unloading();

			}, 1770);
		})
	});
});