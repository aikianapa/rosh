<!DOCTYPE html>
<html class="no-js" lang="ru">
<head>
	<title seo>Личный кабинет</title>
	<link rel="icon" href="/favicon.svg" type=" image/svg+xml">
</head>

<body class="body lk-cabinet" data-barba="wrapper">

<div class="scroll-container" data-scroll-container>
	<div>
		<wb-module wb="module=yonger&mode=render&view=header"></wb-module>
	</div>

	<script wbapp>
		var cabinet = new Ractive({
			el: 'main.page',
			template: $('main.page').html(),
			data: {
				catalog: {},
				user: wbapp._session.user,
				events: {
					'upcoming': [],
					'current': []
				},
				history: {
					'events': [],
					'longterms': []
				}
			},
			on: {
				init() {
					wbapp.get('/api/v2/read/users/' + wbapp._session.user.id, function (data) {
						data.birthdate = new Date(data.birthdate).toLocaleDateString();
						data.phone     = '+' + data.phone;
						cabinet.set('user', data); /* get actually user data */
					});

					wbapp.get('/api/v2/list/records?status=upcoming&client=' + wbapp._session.user.id,
						function (data) {
							const curr_timestamp = parseInt(getdate()[0]);

							data.forEach(function (rec) {
								const event_date = (new Date(rec.event_begin_time * 1000)).toLocaleDateString();

								if (event_date !== (new Date()).toLocaleDateString()) {
									cabinet.push('events.upcoming', data); /* get actually user next events */
								}

								if (((curr_timestamp - 15 * 60) < rec.event_begin_time)
								    && (rec.event_end_time > curr_time)) {
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

					setTimeout(function () {
						cabinet.set('catalog', catalog);
					});
				},
				popupCreateQuote(ev) {
					var createQuote = new Ractive({
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
								console.log('ready!', catalog);
								initServicesSearchInput($('#popup-services-list'), servicesList);
							},
							cancel(ev) {

							},
							close(ev) {

							},
							submit(ev) {
								let $form = $(ev.node);
								let uid   = createQuote.get('user.id');

								if ($form.verify() && uid > '') {
									let data      = $form.serializeJSON();
									data.group    = 'quotes';
									data.status   = 'new';
									data.status   = 'new';
									data.analises = {};
									data.photos   = {before: [], after: []};

									data.pay_status = 'unpay';
									data.client     = uid;
									data.priority   = 0;
									data.marked     = 0;

									data.comment        = '';
									data.recommendation = '';
									data.description    = '';

									data.clientData = {
										'fullname': cabinet.get('user.fullname'),
										'email': cabinet.get('user.email'),
										'phone': cabinet.get('user.phone')
									};
									wbapp.post('/api/v2/create/records/', data, function (res) {
										$('.popup.--record .popup__panel:not(.--succed)').addClass('d-none');
										$('.popup.--record .popup__panel.--succed').addClass('d-block');
									});
								}

								return false;
							}
						}
					});
				},
				profileSave(ev) {
					let $form = $(ev.node);
					let uid   = cabinet.get('user.id');
					if ($form.verify() && uid > '') {
						let data       = $form.serializeJSON();
						data.phone     = str_replace([' ', '+', '-', '(', ')'], '', data.phone);
						data.birthdate = new Date(data.birthdate).toLocaleDateString();
						wbapp.post('/api/v2/update/users/' + uid, data, function (res) {
							console.log(res);
							cabinet.set('user.birthdate', data.birthdate);
							cabinet.set('user.phone', '+' + data.birthdate);
							cabinet.set('user.email', data.birthdate);
						});
					}
					return false;
				}
			}
		});
	</script>
</div>
<div>
	<wb-module wb="module=yonger&mode=render&view=footer"/>
</div>
</body>
<wb-jq wb="$dom->find('script:not([src]):not([type])')->attr('type','wbapp');"/>
<wb-jq wb="$dom->find('.content-wrap ul')->addClass('ul-line');"/>

</html>