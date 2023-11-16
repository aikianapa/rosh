<view>
	<div class="fast-form-block">
		<template>
			<div class="popup fast-form-block">
				<div class="popup__overlay"></div>
				<div class="popup__wrapper">
					<div class="popup__panel --succed">
						<button class="popup__close">
							<svg class="svgsprite _close">
								<use xlink:href="/assets/img/sprites/svgsprites.svg#close"></use>
							</svg>
						</button>
						<div class="popup__name text-bold">Быстрая запись</div>
						<h3 class="h3">Успешно !</h3>
						<p class="text-grey">Мы перезвоним Вам в ближайшее время</p>
					</div>
				</div>
			</div>
			<form class="fast-form no-validation">
				<div class="container">
					<div class="container-fluid">
						<div class="row" style="justify-content:center;">
							<div class="col-lg-4">
								<div class="fast-form__info">
									<h2 class="h2 fast-form__title">Быстрая запись на прием</h2>
									<p class="fast-form__undertitle text-grey">Также, после отправки формы, Вам будет автоматически сгенерирован личный кабинет на сайте, доступ к которому вы можете получить в правом верхнем углу по номеру телефона, указанному при заполнении.</p>
								</div>
							</div>
							<div class="col-lg-7">
								<input type="hidden" name="client" value="{{user.id}}">
								<div class="fast-form__item">
									<div class="row">
										<div class="col-lg-6">
											<div class="input">
												<input class="input__control" name="fullname"
													value="{{user.fullname}}"
													type="text" placeholder="ФИО"
													required>
												<div class="input__placeholder">ФИО</div>
											</div>
										</div>
										<div class="col-lg-6">
											<div class="input">
                                            <input class="input__control intl-tel" name="phone"
	                                            value="{{user.phone}}"
	                                            type="tel" required>
                                            <div class="input__placeholder active">Номер телефона</div>
											</div>
										</div>
									</div>
								</div>
								<div class="fast-form__item">
									<div class="input">
										<textarea class="input__control" placeholder="Причина обращения" name="client_comment" required></textarea>
										<div class="input__placeholder">Причина обращения</div>
									</div>
								</div>
								<div class="fast-form__item --flex --aicn">
									<button class="btn btn--black form__submit mr-20" type="button" on-click="submit">Перезвонить мне</button>
									<div class="fast-form__description ml-10">Нажимая на кнопку "Перезвонить мне", Вы даете согласие на
										<a href="">обработку своих персональных данных</a> на основании
										<a href="/policy/">Политики конфиденциальности</a></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</form>
		</template>
	</div>
	<script wbapp>
		var createFastQuote2 = function (client_id, client_comment, experts) {
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
			quote.price          = 0;
			if(experts){
				quote.experts=experts;
            }
			/* save "страница обращения" only for
			* - problems
			* - services
			* - blog
			* ...
			* */
			quote.quote_from_page = '';
			if (window.location.href.search(/(problem|experts|services|blog)/i) >= 0){
				var page_crumbs = [];
				$('.crumbs__link').each(function (i) {
					if (i === 0) return;
					page_crumbs.push($(this).text().trim());
				});

				if (page_crumbs.length) {
					quote.quote_from_page = page_crumbs.join(' / ');
				}
			}
			quote.client_comment = client_comment;
			quote.event_date       = '';
			quote.event_time       = '';
			quote.event_time_start = '';
			quote.event_time_end   = '';

			quote.longterm_date_end = '';
			quote.longterm_title    = '';

			quote.photos         = {before: [], after: []};
			quote.client_comment = client_comment;
			quote.active         = 'on';

			quote.__token = wbapp._settings.devmode === 'on' ? '123' : wbapp._session.token;

			window.api.post(
				'/api/v2/create/records/', quote).then(
				function (data) {
					if (data.error) {
						wbapp.trigger('wb-save-error',
							{'data': data});
					} else {
						$('.popup.fast-form-block').show();
						$('.popup.fast-form-block .popup__panel:not(.--succed)')
							.addClass('d-none');
						$('.popup.fast-form-block .popup__panel.--succed')
							.addClass('d-block');
					}
				});
		};
		var fastQuoteCreate  = new Ractive({
			el: '.fast-form-block',
			template: document.querySelector('.fast-form-block > template').innerHTML,
			data: {
				user: wbapp._session.user
			},
			on: {
				complete() {
					var _self = this;
					setTimeout(function () {
						initPlugins($(_self.el));


					}, 500);
				},
				submit() {
					var form = this.find('.fast-form-block .fast-form');
					if ($(form).verify()) {

						var post     = $(form).serializeJSON();
						var expert   = $('input.expert');
						post.experts = [];
						if (expert.length) {
							post.experts.push(expert.val());
                        }
						if (!post.client) {
							console.log('try to createProfile: ', post);

							let names = post.fullname.split(' ', 3);
							let keys  = ['last_name', 'first_name', 'middle_name'];
							for (var i = 0; i < names.length; i++) {
								post[keys[i]] = names[i];
							}
							var _token = wbapp._settings.devmode === 'on' ? '123' : wbapp._session.token;
							post.phone = str_replace([' ', '-', '(', ')'], '', post.phone);
							var _req_phone = str_replace('+', '', post.phone);
							window.api.get('/api/v2/list/users/?role=client&phone~=' + _req_phone +
							               '&__token=' + _token).then(
								function (data) {
									if (!data.length) {
										post.role      = "client";
										post.role      = "client";
										post.confirmed = 0;
										post.active    = "on";
										post.__token   = _token;
										window.api.post('/api/v2/create/users/', post).then(
											function (data) {
												if (data && data.error) {
													wbapp.trigger('wb-save-error', {
														'data': data
													});
												} else {
													createFastQuote2(data.id, post.client_comment, post.experts);
												}
											});
									} else {
										createFastQuote2(data[0].id, post.client_comment, post.experts);
									}
								});
						} else {
							createFastQuote2(post.client, post.client_comment, post.experts);
						}
					}

				}
			}
		});
	</script>
</view>

<edit header="Быстрая запись на приём">
	<div>
		<wb-module wb="module=yonger&mode=edit&block=common.inc"/>
	</div>
</edit>