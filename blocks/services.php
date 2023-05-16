<view>

	<script wb-app>
		window.fastquote_top = 0;
		$(".crumbs").after(`
	        <div class="title-flex --flex --jcsb">
	        <button class="btn btn--black --openpopup" data-popup="--fast" href="#">Записаться на прием </button>
	        </div>
        `);
		$(".crumbs + div.title-flex + h1").prependTo($(".crumbs + div.title-flex"));

		$(".all-tabs-item.data-tab-link[data-tab]").on('click', function(ev) {
			$(".search.search--service .search__input").trigger("keyup");
			let category = $(this).data('tab');
			wbapp.storage('services.list.category', category);
			if (category == undefined || category == '' || category == 'all') {
				$(".all-tabs .data-tab-item[data-tab]").removeClass('active');
				$(".all-tabs .data-tab-item[data-tab=all]").addClass('active');
				$(".all-services .all-services__item[data-category]").show();
			} else {
				$(".all-tabs .data-tab-item[data-tab]").removeClass('active');
				$(".all-tabs .data-tab-item[data-tab=all]").addClass('active');
				$(".all-services .all-services__item").hide();
				$(".all-services .all-services__item[data-category*='" + category + "']").show();

				console.log(window.fastquote_top);
				window.fastquote_top = $('.all-tabs.data-tab-wrapper').offset().top - 1;
			}
		});

		$(".search.search--service .search__input").on("keyup", function() {
			let regex = $(this).val();
			if (regex > ' ') {
				regex = new RegExp(regex, "gi");
				$(".all-services .all-services__item").each(function() {
					let str = $(this).text();
					str.match(regex) ? $(this).show() : $(this).hide();
				});
			} else {
				$(".all-services .all-services__item").show();
			}
		});

		setTimeout(() => {
			let category = wbapp.storage('services.list.category');
			if (category) {
				setTimeout(() => {
					$(".all-tabs-item.data-tab-link[data-tab]").removeClass("active");
					$(".all-tabs-item.data-tab-link[data-tab=" + category + "]").addClass("active").trigger('click');
				}, 500);
			} else {
				$(".all-tabs-item.data-tab-link[data-tab=all]").addClass("active");
				$(".all-tabs .data-tab-item[data-tab=all]").addClass("active");
			}
		}, 400);
	</script>

	<div class="container">
		<div class="search search--service">
			<div class="search__block --flex --aicn">
				<div class="input">
					<input class="search__input" type="text" placeholder="Поиск" id="services-list">
				</div>
				<button class="btn btn--white">Найти</button>
			</div>
		</div>
		<div class="all-tabs-items">
			<div class="all-tabs-item data-tab-link" data-tabs="services" data-tab="all">Все услуги</div>
			<wb-foreach wb="table=catalogs&item=srvcat&from=tree.data&tpl=false">
				<div class="cursor-pointer all-tabs-item data-tab-link" data-tabs="services" data-tab="{{id}}">{{name}}</div>
			</wb-foreach>
		</div>
		<div class="all-tabs data-tab-wrapper" data-tabs="services">
			<div class="all-tab data-tab-item" data-tab="all">
				<wb-var srvlist wb-api="/api/v2/list/services?active=on&@sort=_sort,header" />
				<div class="all-services" id="servicesList">
					<wb-foreach wb="from=_var.srvlist&tpl=false">
						<wb-var image="{{cover.0.img}}" wb-if="'{{cover.0.img}}'>''" else="/assets/img/all/1.jpg" />
						<a class="all-services__item" href="{{yongerFurl()}}" data-category="{{category}}">
							<div class="all-services__pic" style="background-image: url(/thumbc/510x314/src{{_var.image}})"></div>
							<div class="all-services__name" wb-if="'{{header}}'>''">{{header}}</div>
						</a>
					</wb-foreach>
				</div>
			</div>
			<div class="all-tab data-tab-item" data-tab="lab" id="priceListLab">
				<wb-var pricelist wb-api="/api/v2/list/price?active=on&@return=id,header,price,category,from" />
				<div class="row">
					<div class="col-lg-8">
						<div class="service" wb-tree="dict=shop_category&branch=lab&parent=false">
							<div class="service__accardeon accardeon" wb-if="'{{active}}'=='on'">
								<div class="accardeon__main service__main accardeon__click" wb-if="'{{name}}'>''">{{name}}</div>
								<div class="accardeon__list service__drop">
									<wb-foreach wb="from=_var.pricelist&tpl=false" wb-filter="category~={{id}}">
										<div class="service__item">
											<div class="service__name" wb-if="'{{header}}'>''">{{header}}</div>
											<label class="service__right">
												<div class="service__price" wb-if="'{{price}}'>''"><span wb-if="'{{from}}'=='on'">от </span> {{price}} ₽</div>
												<div class="service__checkbox">
													<div class="checkbox">
														<input type="checkbox" wb-if="'{{price}}'>''" data-id="{{id}}" data-service_price="{{category}}-{{id}}" data-category="{{category}}" data-price="{{price}}" data-name="{{header}}" on-click="cartAdd">
														<span></span>
													</div>
												</div>
											</label>
										</div>
									</wb-foreach>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-4 fastquote-block " wb-off>
						<template id="fastquote-block-services">
							<form class="all-form sticky-block">
								<div class="all-form__succed d-none">
									<h3 class="h3">Успешно !</h3>
									<p class="text-grey">Мы перезвоним Вам в ближайшее время</p>
								</div>
								<div class="all-form__main">
									<input type="hidden" name="client" value="{{user.id}}">
									<input type="hidden" class="total_price" name="price" value="0">

									<div class="all-form__summ">
										<p>Всего </p>
										<p>0 ₽</p>
									</div>
									<p class="all-form__text">Выберите необходимые услуги — и калькулятор автоматически произведет суммарный расчет их стоимости. Для уточнения вашего результата вы можете оставить заявку.</p>
									<div class="all-form__services">
										<div class="all-form__service-title">Ваш выбор</div>

									</div>
									<div class="input">
										<input class="input__control" type="text" value="{{user.fullname}}" name="fullname" placeholder="ФИО" required>
										<div class="input__placeholder">ФИО</div>
									</div>
									<div class="input">
										<input class="input__control intl-tel" value="{{user.phone}}" name="phone" type="tel" required>
										<div class="input__placeholder active">Номер телефона</div>
									</div>
									<button class="mb-20 all-form__submit btn btn--black" on-click="submit">Записаться</button>
									<div class="form__description">Нажимая на кнопку "Записаться", Вы даете согласие на обработку своих персональных данных на основании
										<a href="policy.html">Политики конфиденциальности</a>
									</div>
									<div class="form-bottom">После отправки заявки для Вас будет создан Личный кабинет, в&nbsp;который можно попасть через кнопку «Войти» в&nbsp;верхнем меню сайта</div>
								</div>
							</form>
						</template>
					</div>
				</div>
			</div>

		</div>
	</div>
	<script wbapp>
		$(document).on('wb-ready wb-ajax-done', function() {

			window.fastQuoteServiceCreate = new Ractive({
				el: '.fastquote-block',
				template: wbapp.tpl('#fastquote-block-services').html,
				data: {
					user: wbapp._session.user
				},
				on: {
					complete() {
						var _self = this;
						setTimeout(function () {
							initPlugins($(_self.el));
							setTimeout(function () {
								window.fastquote_top = $('.all-tabs.data-tab-wrapper').offset().top - 1;
								//console.log('sticky-block:', window.fastquote_top );
								$(window).scroll(function (e) {
									if (window.fastquote_top < 1){
										return true;
									}
									// Get the position of the vertical scroll.
									var y = $(this).scrollTop();
									//console.log('sticky-block:', window.fastquote_top , y);

									if (y >= window.fastquote_top ) {
										$('.sticky-block').addClass('fixed-top');
										$('footer').css('z-index', '99');
									} else {
										$('.sticky-block').removeClass('fixed-top');
										$('footer').css('z-index', 'auto');
									}
								});
							}, 500);

						}, 500);

					},
					submit() {
						var form = this.find('.fastquote-block form');
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
								window.api.get('/api/v2/list/users/?role=client&phone=' + _req_phone +
									'&__token=' + _token).then(
									function(data) {
										if (!data.length) {
											post.role = "client";
											post.role = "client";
											post.confirmed = 0;
											post.active = "on";
											post.__token = _token;
											window.api.post('/api/v2/create/users/', post).then(
												function(data) {
													if (data && data.error) {
														wbapp.trigger('wb-save-error', {
															'data': data
														});
													} else {
														createFastQuoteServices(data.id, post);
													}
												});
										} else {
											toast('Этот номер уже используется!', 'Ошибка!', 'error');
											form.find('[name="phone"]').focus();
										}
									});
							} else {
								createFastQuoteServices(post.client, post);
							}
						}
						return false;
					}
				}
			});
			var createFastQuoteServices = function(client_id, data) {
				function unique(array) {
					function onlyUnique(value, index, self) {
						return self.indexOf(value) === index;
					}

					return array.filter(onlyUnique);
				}

				var quote = {};
				quote.group = 'quotes';
				quote.status = 'new';
				quote.pay_status = 'unpay';
				quote.client = client_id;
				quote.priority = 0;
				quote.marked = false;

				quote.comment = '';
				quote.recommendation = '';
				quote.description = '';
				quote.client_comment = '';

				quote.price = data?.price || 0;
				quote.services = unique(Object.values(data?.services || {}));
				quote.service_prices = data?.service_prices;

				quote.event_date = '';
				quote.event_time = '';
				quote.event_time_start = '';
				quote.event_time_end = '';

				quote.for_consultation = 0;
				quote.longterm_date_end = '';
				quote.longterm_title = '';

				quote.photos = {
					before: [],
					after: []
				};
				quote.__token = wbapp._settings.devmode === 'on' ? '123' : wbapp._session.token;
				console.log('Save new quote record:', quote);
				window.api.post(
					'/api/v2/create/records/', quote).then(
					function(data) {
						if (data.error) {
							wbapp.trigger('wb-save-error', {
								'data': data
							});
						} else {
							popupMessage('Заявка создана!', 'Мы перезвоним Вам в ближайшее время!',
								'', '',
								function(d) {});
							$('.all-form__services svg').trigger('click');
						}
					});

			};
		});
	</script>
</view>

<edit header="Все услуги">
	<div>
		<wb-module wb="module=yonger&mode=edit&block=common.inc" />
	</div>
</edit>