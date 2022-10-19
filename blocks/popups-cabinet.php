<view>
	<div wb-if="'{{_sess.user.role}}'=='client'">
		<div class="popup --record">
			<template id="popupRecord">
				<div class="popup__overlay"></div>
				<form class="popup__panel" on-submit="submit">
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
							<input type="radio" name="service_category" value="{{id}}">
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
						<input class="checkbox-visible-next-form" type="checkbox"
							name="for_consultation" value="1">
						<span></span>
						<div class="checbox__name">Консультация врача</div>
					</label>
					<div class="select-form" style="display: none;" data-show="service">
						<div class="text-bold mb-20">Тип события</div>
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
					<div class="admin-editor__summ" data-hide="service-search">
						<p>Всего</p>
						<input type="hidden" name="price">
						<p class="price">0 ₽</p>
					</div>
					<button class="btn btn--black form__submit" type="submit"> Записаться</button>
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
					<div class="popup__name text-bold">{{catalog.spec_service.analises_interpretation.header}}</div>
					<form class="popup__form" method="post">
						<input type="hidden" name="pay_status" value="unpay">
						<input type="hidden" name="spec_service" value="analises_interpretation">
						<input type="hidden" name="price"
							value="{{catalog.spec_service.analises_interpretation.price}}">
						<input type="hidden" name="group" value="quotes">
						<input type="hidden" name="status" value="new">
						<input type="hidden" name="title" value="Расшифровка анализов">

						<div class="text-bold mb-20">Тип события</div>
						<div class="popups__text-chexboxs">
							<label class="text-radio" name="type" value="clinic">
								<input type="radio" name="status">
								<span>В клинике</span>
							</label>
							<label class="text-radio switch-blocks" value="online">
								<input type="radio" name="status">
								<span>Онлайн</span>
							</label>
						</div>
						<p class="text-grey mb-30">Нажмите на способ получения анализа</p>
						<button class="btn btn--black popup__change form__submit" type="button" on-click="submit">
							Оставить заявку
						</button>
					</form>
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
					<form
						on-submit="submit"
						action="https://demo.paykeeper.ru/create/"
						method="POST"
						target="_blank">
						<input type='hidden' name='sum' value='{{this.pay_price}}'/>
						<input type='hidden' name='orderid' value='{{this.id}}'/>
						<input type='hidden' name='clientid' value='{{this.client}}'/>
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

	<div wb-if="'{{_sess.user.role}}'=='main'">
		<div class="popup --photo">
			<template id="popupPhoto">
				<div class="popup__overlay"></div>
				<div class="popup__panel">
					<button class="popup__close">
						<svg class="svgsprite _close">
							<use xlink:href="/assets/img/sprites/svgsprites.svg#close"></use>
						</svg>
					</button>
					<div class="popup__name text-bold">Добавить фото</div>
					<form class="popup__form" on-submit="submit">
						<div class="search-form input">
							<input class="input__control client-search" type="text" placeholder="Выбрать пациента">
							<div class="input__placeholder">Выбрать пациента</div>
						</div>

						<input type="hidden" name="client">
						<input type="hidden" name="record">

						<div class="input calendar mb-20">
							<input class="input__control datepickr" type="text" name="date"
								placeholder="Выбрать дату посещения">
							<div class="input__placeholder">Выбрать дату посещения</div>
						</div>
						<div class="popup-title__checkbox">
							<p class="mb-10">Выбрать статус</p>
							<input type="hidden" name="is_longterm" value="0">
							<label class="checkbox mb-20 show-checkbox" data-show-input="longterm">
								<input type="checkbox" name="is_longterm" value="1">
								<span></span>
								<div class="checbox__name">Продолжительное лечение</div>
							</label>
						</div>
						<div class="input calendar mb-20" data-show="longterm" style="display:none">
							<input class="input__control event-search longterm-search"
								type="text"
								name="title"
								placeholder="Название продолжительного лечения">
							<div class="input__placeholder">Название продолжительного лечения</div>
						</div>
						<div class="radios --flex" data-show="longterm">
							<label class="text-radio">
								<input type="radio" name="type">
								<span>В клинике</span>
							</label>
							<label class="text-radio">
								<input type="radio" name="type">
								<span>Онлайн</span>
							</label>
						</div>

						<label class="file-photo" for="file-photo">
							<div class="file-photo__ico">
								<svg class="svgsprite _file">
									<use xlink:href="/assets/img/sprites/svgsprites.svg#file"></use>
								</svg>
								<img class="preview d-none" alt="upload preview">
							</div>
							<input type="file" id="file-photo" name="file" required>
							<input type="hidden" name="path" value="/records/" >
							<div class="file-photo__text text-grey">Для загрузки фото заполните все поля
								<br>Фото не должно превышать 10 мб
							</div>
						</label>
						<button class="btn btn--white upload-image disabled" on-click="submit">Сохранить</button>
					</form>
				</div>
			</template>
		</div>
		<div class="popup --photo-longterm">
			<template id="popupPhotoLongterm">
				<div class="popup__overlay"></div>
				<div class="popup__panel">
					<button class="popup__close">
						<svg class="svgsprite _close">
							<use xlink:href="/assets/img/sprites/svgsprites.svg#close"></use>
						</svg>
					</button>
					<div class="popup__name text-bold">Добавить фото к событию</div>
					<div class="popup__form">
						<div class="search-form input disabled">
							<input class="input__control autocomplete client-search"
								type="text" placeholder="Выбрать пациента">
							<div class="input__placeholder">Выбрать пациента</div>
						</div>
						<div class="input calendar mb-20">
							<input class="input__control datepickr" type="text"
								name="event_date" placeholder="Выбрать дату посещения">
							<div class="input__placeholder">Выбрать дату посещения</div>
						</div>
						<input type="hidden" name="group" value="event">
						<input type="hidden" name="id" value="{{this.id}}">
						<div class="popup-title__checkbox">
							<label class="checkbox mb-20 show-checkbox" data-show-input="longterm">
								<input type="checkbox" name="group" value="longterm"
									{{#if this.group== 'longterm' }}checked{{/if}}>
								<span></span>
								<div class="checbox__name">Продолжительное лечение</div>
							</label>
						</div>
						<div class="input calendar mb-20" data-show="longterm">
							<input class="input__control longterm-search"
								type="text" name="title"
								placeholder="Название продолжительного лечения"
								value="">
							<div class="input__placeholder">Название продолжительного лечения</div>
						</div>
						<div class="radios --flex">
							<label class="text-radio">
								<input type="radio" name="photo_group" value="before" checked="checked">
								<span>До начала лечения</span>
							</label>
							<label class="text-radio disabled">
								<input type="radio" name="photo_group" value="after">
								<span>В процессе лечения</span>
							</label>
						</div>
						<label class="file-photo" for="image-selector">
							<div class="filepicker">
								<textarea type="json" name="image" class="d-none filepicker-data"></textarea>
								<!-- Button Bar -->
								<div class="button-bar">
									<button class="btn btn-success fileinput" style="height:70px;">
										<div class="file-photo__ico">
											<img class="preview" alt="upload preview" src="">
											<svg class="svgsprite _file">
												<use xlink:href="/assets/img/sprites/svgsprites.svg#file"></use>
											</svg>
										</div>
										<input type="file" id="image-selector" name="files[]" class="wb-unsaved">
										<input type="hidden" name="upload_url" value="/uploads/records/"
											class="wb-unsaved">
										<input type="hidden" name="prevent_img" class="wb-unsaved">
									</button>
								</div>
								<script type="text/javascript">
									wbapp.loadScripts(["/engine/modules/filepicker/filepicker.js"], "filepicker-js");
								</script>
							</div>
							<div class="file-photo__text text-grey">Для загрузки фото заполните все поля
								<br>Фото не должно
								превышать 10 мб
							</div>
						</label>
						<button class="btn btn--white">Сохранить</button>
					</div>
				</div>
			</template>
		</div>
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
							<input class="input__control autocomplete client-search"
								type="text" placeholder="Выбрать пациента">
							<div class="input__placeholder">Выбрать пациента</div>
						</div>
						<div class="input calendar mb-20">
							<input class="input__control datepickr" type="text"
								name="event_date" placeholder="Выбрать дату посещения">
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
							<input class="input__control longterm-search"
								type="text" name="title"
								placeholder="Название продолжительного лечения"
								value="">
							<div class="input__placeholder">Название продолжительного лечения</div>
						</div>
						<div class="radios --flex">
							<label class="text-radio">
								<input type="radio" name="photo_group" value="before" checked="checked">
								<span>До начала лечения</span>
							</label>
							<label class="text-radio disabled">
								<input type="radio" name="photo_group" value="after">
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

		<div class="popup --analises">
			<template id="popupAnalises">
				<div class="popup__overlay"></div>
				<div class="popup__panel">
					<button class="popup__close">
						<svg class="svgsprite _close">
							<use xlink:href="/assets/img/sprites/svgsprites.svg#close"></use>
						</svg>
					</button>
					<div class="popup__name text-bold">Добавить фото к событию</div>
					<div class="popup__form">
						<div class="search-form input disabled">
							<input class="input__control autocomplete client-search"
								type="text" placeholder="Выбрать пациента">
							<div class="input__placeholder">Выбрать пациента</div>
						</div>
						<div class="input calendar mb-20">
							<input class="input__control datepickr" type="text"
								name="event_date" placeholder="Выбрать дату посещения">
							<div class="input__placeholder">Выбрать дату посещения</div>
						</div>
						<input type="hidden" name="group" value="event">
						<input type="hidden" name="id" value="{{this.id}}">
						<div class="popup-title__checkbox">
							<label class="checkbox mb-20 show-checkbox" data-show-input="longterm">
								<input type="checkbox" name="group" value="longterm"
									{{#if this.group== 'longterm' }}checked{{/if}}>
								<span></span>
								<div class="checbox__name">Продолжительное лечение</div>
							</label>
						</div>
						<div class="input calendar mb-20" data-show="longterm">
							<input class="input__control longterm-search"
								type="text" name="title"
								placeholder="Название продолжительного лечения"
								value="">
							<div class="input__placeholder">Название продолжительного лечения</div>
						</div>
						<div class="radios --flex">
							<label class="text-radio">
								<input type="radio" name="photo_group" value="before" checked="checked">
								<span>До начала лечения</span>
							</label>
							<label class="text-radio disabled">
								<input type="radio" name="photo_group" value="after">
								<span>В процессе лечения</span>
							</label>
						</div>
						<label class="file-photo" for="image-selector">
							<div class="filepicker">
								<textarea type="json" name="image" class="d-none filepicker-data"></textarea>
								<!-- Button Bar -->
								<div class="button-bar">
									<button class="btn btn-success fileinput" style="height:70px;">
										<div class="file-photo__ico">
											<img class="preview" alt="upload preview" src="">
											<svg class="svgsprite _file">
												<use xlink:href="/assets/img/sprites/svgsprites.svg#file"></use>
											</svg>
										</div>
										<input type="file" id="image-selector" name="files[]" class="wb-unsaved">
										<input type="hidden" name="upload_url" value="/uploads/records/"
											class="wb-unsaved">
										<input type="hidden" name="prevent_img" class="wb-unsaved">
									</button>
								</div>
								<script type="text/javascript">
									wbapp.loadScripts(["/engine/modules/filepicker/filepicker.js"], "filepicker-js");
								</script>
							</div>
							<div class="file-photo__text text-grey">Для загрузки фото заполните все поля
								<br>Фото не должно
								превышать 10 мб
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
						<div class="input">
							<input class="input__control" type="text" required
								placeholder="ФИО" name="fullname">
							<div class="input__placeholder">ФИО</div>
						</div>
						<div class="input">
							<input class="input__control datebirthdaypickr" required
								type="text" placeholder="Дата рождения" name="birthdate">
							<div class="input__placeholder">Дата рождения</div>
						</div>
						<div class="input mb-30">
							<input class="input__control" type="tel" required
								placeholder="Номер телефона"
								data-inputmask="'mask': '+7 (999) 999-99-99'"
								name="phone">
							<div class="input__placeholder">Номер телефона</div>
						</div>
						<button class="btn btn--black form__submit">Создать</button>
						<div class="form-bottom">После отправки для пациента будет создан Личный кабинет, в&nbsp;который можно попасть через кнопку &laquo;Войти&raquo; в&nbsp;верхнем меню сайта</div>
					</form>
				</div>
			</template>
		</div>
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
							.<br>
							Время жизни кода 30 секунд.<br>
							Осталось <strong>
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

		<div class="popup --edit-event">
			<template id="popupCreateAppoint">
				<div class="popup__overlay"></div>
				<div class="popup__panel">
					<button class="popup__close">
						<svg class="svgsprite _close">
							<use xlink:href="/assets/img/sprites/svgsprites.svg#close"></use>
						</svg>
					</button>
					<div class="popup__name text-bold">Запись на прием</div>
					<form class="record-edit popup__form" on-submit="submit">
		<div class="row">
			<div class="col-md-7">
				<input type="hidden" value="{{ record.id }}" name="id">

				{{#if record.spec_service}}
				<input type="hidden" name="spec_service" value="{{this.spec_service}}">
				<input type="hidden" name="title" value="{{catalog.spec_service[this.spec_service].header}}">
				{{else}}
				<div class="admin-editor__event mb-20">
					<div class="search__block --flex --aicn">
						<div class="input">
							<input class="popup-services-list"
								type="text" placeholder="Поиск по услугам"
								autocomplete="off">
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
							<input type="radio" name="type" value="{{ qt.id }}" checked>
							{{else}}
							<input type="radio" name="type" value="{{ qt.id }}">
							{{/if}}
							<span>{{qt.name}}</span>
						</label>
						{{/each}}
					</div>
					<div class="row">
						{{#if record.spec_service}}
						{{else}}
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
												<input type="checkbox" class="checked" name="experts[]" checked value="{{.id}}">
												{{else}}
												<input type="checkbox" name="experts[]" value="{{.id}}">
												{{/if}}
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
										<input class="input__control datepickr"
											name="event_date"
											value="{{record.event_date}}"
											type="text" placeholder="Выбрать дату и время">
										<div class="input__placeholder">Выбрать дату</div>
									</div>
								</div>
							</div>
							<div class="row event-time">
								<div class="col-md-6">
									<div class="calendar input mb-30">
										<input class="input__control timepickr event-time-start"
											type="text"
											name="event_time_start"
											value="{{record.event_time_start}}"
											data-min-time="09:00"
											data-max-time="18:00"
											pattern="[0-9]{2}:[0-9]{2}" required>
										<div class="input__placeholder">Время (начало)</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="calendar input mb-30">
										<input class="input__control timepickr event-time-end" type="text"
											name="event_time_end"
											value="{{record.event_time_end}}"
											data-min-time="09:00"
											data-max-time="18:00"
											pattern="[0-9]{2}:[0-9]{2}" required>
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
							{{catalog.spec_service[this.spec_service].header}}
						</div>
						<div class="search__drop-right">
							<div class="search__drop-summ">{{catalog.spec_service[this.spec_service].price}} ₽</div>
						</div>
					</div>
					{{else}}
					{{#each record.service_prices: idx, key}}
					<div class="search__drop-item" data-index="{{idx}}"
						data-id="{{key}}" data-service_id="{{service_id}}" data-price="{{price}}">
						<input type="hidden" name="services[]"
							value="{{service_id}}">
						<input type="hidden" name="service_prices[{{key}}][service_id]"
							value="{{service_id}}">
						<input type="hidden" name="service_prices[{{key}}][price_id]"
							value="{{price_id}}">
						<input type="hidden" name="service_prices[{{key}}][name]"
							value="{{name}}">
						<input type="hidden" name="service_prices[{{key}}][price]"
							value="{{price}}">
						<div class="search__drop-name">
							{{name}}
							<div class="search__drop-delete">
								<svg class="svgsprite _delete">
									<use xlink:href="/assets/img/sprites/svgsprites.svg#delete"></use>
								</svg>
							</div>
						</div>
						<div class="search__drop-right">
							<div class="search__drop-summ">{{ @global.utils.formatPrice(record.price) }} ₽</div>
						</div>
					</div>
					{{/each}}
					{{/if}}
				</div>

				<div class="admin-editor__summ">
					<p>Всего</p>
					<input type="hidden" name="price" value="{{record.price}}">
					<p class="price">{{ @global.utils.formatPrice(record.price) }} ₽</p>
				</div>
				<div class="row">
				<div class="col-md-4 --jcfe --flex">
					<textarea class="admin__editor-textarea" name="comment" placeholder="Добавить комментарий">{{record.comment}}</textarea>
				</div>
				</div>
				<button class="btn btn--white" type=submit>Сохранить</button>
			</div>
			<div class="col-md-1"></div>
			
		</div>
	</form>
				</div>
			</template>
		</div>
		<div class="popup --create-event">
			<template id="popupClientEvent">
				<div class="popup__overlay"></div>
				<div class="popup__panel">
					<button class="popup__close">
						<svg class="svgsprite _close">
							<use xlink:href="/assets/img/sprites/svgsprites.svg#close"></use>
						</svg>
					</button>
					<div class="popup__name text-bold">{{popup.title}}</div>
					<form class="popup__form" on-submit="submit" data-record="{{record.id}}">
						<p class="text-bold text-big mb-20">{{client.fullname}}</p>

						<div class="input" data-hide="service-search">
							<input class="search__input search-services" type="text"
								placeholder="Поиск по услугам">
							<div class="search__drop"></div>
							<button class="search__btn" type="button">
								<svg class="svgsprite _search">
									<use xlink:href="/assets/img/sprites/svgsprites.svg#search"></use>
								</svg>
							</button>
						</div>
						<label class="checkbox checkbox--record show-checkbox" data-show-input="service">
							<input class="checkbox-visible-next-form" type="checkbox"
								name="for_consultation" value="1">
							<span></span>
							<div class="checbox__name">Консультация врача</div>
						</label>
						<div class="select-form" style="display: none;" data-show="service">
							<div class="text-bold mb-20">Тип события</div>
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
						</div>

						<div class="select-form" data-hide="expert">
							<div class="select">
								<div class="select__main">
									<div class="select__placeholder">Выберите специалиста</div>
									<div class="select__values"></div>
								</div>
								<div class="select__list">
									{{#each catalog.experts}}
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

						<div class="calendar input mb-30">
							<input class="input__control datepickr" type="text"
								name="event_date" required
								placeholder="Выбрать дату и время">
							<div class="input__placeholder">Выбрать время и дату</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="calendar input mb-30">
									<input class="input__control" type="time" name="event_time_start"
										min="09:00" max="18:00" pattern="[0-9]{2}:[0-9]{2}" required>
									<div class="input__placeholder">Время начала</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="calendar input mb-30">
									<input class="input__control" type="time" name="event_time_end"
										min="09:00" max="18:00" pattern="[0-9]{2}:[0-9]{2}" required>
									<div class="input__placeholder">Время окончания</div>
								</div>
							</div>
						</div>

						<div class="admin-editor__patient" data-hide="service-search">
							<div class="text-bold mb-10">Выбраны услуги</div>
						</div>
						<div class="admin-editor__summ" data-hide="service-search">
							<p>Всего</p>
							<input type="hidden" name="price">
							<p class="price">0 ₽</p>
						</div>

						<input type="hidden" name="client" value="{{client.id}}">
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

					<form class="popup__form" method="GET" action="/cabinet/download-data/">
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
							<input class="input__control daterangepickr" type="text" placeholder="За весь период">
							<div class="input__placeholder">За весь период</div>
						</div>
						<div class="select-form">
							<label class="checkbox mainfilter__checkbox mb-10">
								<input type="checkbox">
								<span></span>
								<div class="checbox__name text-grey">Выгрузить только список номеров</div>
							</label>
							<div class="calendar input">
								<input class="input__control" type="tel" placeholder="Номер телефона" data-inputmask="'mask': '+7 (999) 999-99-99'">
								<div class="input__placeholder">Номер телефона</div>
							</div>
						</div>
						<div class="select-form mb-30">
							<label class="checkbox mainfilter__checkbox mb-10">
								<input type="checkbox">
								<span></span>
								<div class="checbox__name text-grey">Введите только список е-мейлов</div>
							</label>
							<div class="calendar input">
								<input class="input__control" type="email" placeholder="Введите е-мейл">
								<div class="input__placeholder">Введите е-мейл</div>
							</div>
						</div>
						<button type="submit" class="btn btn--black">Скачать</button>
					</form>
				</div>
			</template>
		</div>
	</div>
</view>
<edit header="Все попапы для ЛК">
	<div>
		<wb-module wb="module=yonger&mode=edit&block=common.inc"/>
	</div>
</edit>