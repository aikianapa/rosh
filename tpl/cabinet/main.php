<!DOCTYPE html>
<html class="no-js" lang="ru">

<head>
    <title seo>Кабинет администратора</title>
    <link rel="icon" href="/favicon.svg" type="image/svg+xml">
</head>

<body class="body lk-cabinet" data-barba="wrapper">
<div class="scroll-container lk-main" data-scroll-container>
    <div>
        <wb-module wb="module=yonger&mode=render&view=header"></wb-module>
    </div>
    <main class="page {{_session.user.role}}" data-barba="container" data-barba-namespace="cabinet" wb-off>
        <div class="account admin">
            <form class="search" action="/cabinet/search">
                <div class="container">
                    <div class="crumbs">
                        <a class="crumbs__arrow" href="#">
                            <svg class="svgsprite _crumbs-back">
                                <use xlink:href="/assets/img/sprites/svgsprites.svg#crumbs-back"></use>
                            </svg>
                        </a>
                        <a class="crumbs__link" href="/">Главная</a>
                        <span class="crumbs__link">Кабинет администратора</span>
                    </div>
                    <div class="title-flex --flex --jcsb">
                        <div class="title">
                            <h1 class="mb-10 h1">Кабинет администратора</h1>
                        </div>
                        <div>
                            <a class="btn btn--black --openpopup" onclick="popupsCreateProfile();"
                               data-popup="--create-client">
                                Создать карточку пациента
                            </a>
                            <a class="btn btn--black" onclick="newEvent();">
                                Записать пациента
                            </a>
                        </div>

                    </div>
                    <div class="search__block --flex --aicn">
                        <div class="input">
                            <input class="search__input" type="text" placeholder="Поиск по пациентам" name="q">
                        </div>
                        <button class="btn btn--white">Найти</button>
                    </div>
                </div>
            </form>

            <div class="page-content">
                <div class="container data-tab-wrapper" data-tabs="records">
                    <div class="account__tab-items">
                        <div class="account__tab-item data-tab-link" data-type="group=quotes" data-tab="quotes"
                             data-tabs="records">Заявки
                        </div>
                        <div class="account__tab-item data-tab-link" data-type="group=events&status=upcoming"
                             data-tab="events" data-tabs="records">События
                        </div>
                        <div class="account__tab-item data-tab-link"
                             data-type="group=events&status=[past,cancel_think,cancel_expensive,cancel_noreason,id63ea52b10780]"
                             data-tab="past" data-tabs="records">Завершенные
                        </div>
                        <div class="account__tab-item data-tab-link" data-tab="longterms" data-tabs="records">
                            Продолжительное
                        </div>
                    </div>

                    <div class="account__tab data-tab-item" data-tab="quotes" data-type="group=quotes">
                        <div class="loading-overlay">
                            <div class="loader"></div>
                        </div>
                    </div>
                    <div class="account__tab data-tab-item" data-tab="events" data-type="group=events&status=upcoming">
                        <div class="loading-overlay">
                            <div class="loader"></div>
                        </div>
                    </div>
                    <div class="account__tab data-tab-item" data-tab="past"
                         data-type="group=events&status=[past,cancel_think,cancel_expensive,cancel_noreason,id63ea52b10780]">
                        <div class="loading-overlay">
                            <div class="loader"></div>
                        </div>
                    </div>
                    <div class="account__tab data-tab-item" data-tab="longterms" data-type="group=longterms">
                        <div class="loading-overlay">
                            <div class="loader"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

<template id="editProfile" wb-off>
    <form class="profile-edit d-block" on-submit="save">
        <input type="hidden" value="{{ id }}" name="id">
        <p class="text-bold mb-30">Редактировать профиль</p>
        <div class="row profile-edit__wrap">
            <div class="col-md-9">
                <div class="input input--grey">
                    <input class="input__control" name="fullname" required value="{{ .fullname }}" type="text"
                           placeholder="ФИО">
                    <div class="input__placeholder input__placeholder--dark">ФИО</div>
                </div>
            </div>
        </div>
        <div class="row profile-edit__wrap">
            <div class="col-md-3">
                <div class="input input--grey">
                    <input class="input__control datebirthdaypickr" name="birthdate" required value="{{ .birthdate }}"
                           type="text" placeholder="Дата рождения">
                    <div class="input__placeholder input__placeholder--dark">Дата рождения</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="input input--grey">
                    <input class="input__control intl-tel" type="tel" name="phone" required value="{{ .phone }}">
                    <div class="input__placeholder input__placeholder--dark active">Телефон</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="input input--grey">
                    <input class="input__control" type="email" name="email" required value="{{ email }}"
                           placeholder="E-mail">
                    <div class="input__placeholder input__placeholder--dark">E-mail</div>
                </div>
            </div>
            <div class="col-md-2">
                <button class="btn btn--white profile-edit__submit" type="submit">Сохранить</button>
            </div>
        </div>

        <p class="text-bold mb-30 delivery-address">Адрес доставки</p>
        <div class="row profile-edit__wrap">
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-3">
                        <div class="input input--grey">
                            <input class="input__control" type="text" name="country" value="{{ country }}"
                                   placeholder="Страна">
                            <div class="input__placeholder input__placeholder--dark">Страна</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="input input--grey">
                            <input class="input__control" type="text" name="city" value="{{ city }}"
                                   placeholder="Город">
                            <div class="input__placeholder input__placeholder--dark">Город</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input input--grey">
                            <input class="input__control" type="text" name="street" value="{{street}}"
                                   placeholder="Улица">
                            <div class="input__placeholder input__placeholder--dark">Улица
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="input input--grey">
                            <input class="input__control" type="text" name="build" value="{{build}}" placeholder="Дом">
                            <div class="input__placeholder input__placeholder--dark">Дом</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row profile-edit__wrap">
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-3">
                        <div class="input input--grey">
                            <input class="input__control" type="text" name="flat" value="{{ flat }}"
                                   placeholder="Кв./офис">
                            <div class="input__placeholder input__placeholder--dark">Кв./офис</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="input input--grey">
                            <input class="input__control" type="text" name="intercom" value="{{ intercom }}"
                                   placeholder="Домофон">
                            <div class="input__placeholder input__placeholder--dark">Домофон</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="input input--grey">
                            <input class="input__control" type="text" name="entrance" value="{{ entrance }}"
                                   placeholder="Подъезд">
                            <div class="input__placeholder input__placeholder--dark">Подъезд</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="input input--grey">
                            <input class="input__control" type="text" name="level" value="{{ level }}"
                                   placeholder="Этаж">
                            <div class="input__placeholder input__placeholder--dark">Этаж</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <button class="btn btn--white profile-edit__submit" type="submit">Сохранить</button>
            </div>
        </div>
    </form>
</template>
<template id="editStatus" wb-off>
    <div class="select-form">
        <div class="select pay">
            <div class="select__main">Статус оплаты</div>
            <div class="select__list">
                <input type="hidden" class="pay_status" name="pay_status" value="{{ record.pay_status }}">
                {{#each catalog.quotePay}}
                <div class="select__item" data-id="{{id}}"
                     onclick="$(this).parents('.select.pay').find('input.pay_status').val($(this).attr('data-id'));$(this).parents('.select.pay').addClass('has-values')">
                    {{name}}
                </div>
                {{/each}}
            </div>
        </div>
    </div>

    <div class="select-form">
        <div class="select status">
            <div class="select__main">Изменить статус</div>
            <div class="select__list">
                <input type="hidden" class="status" name="status" value="{{ record.status }}">
                <input type="hidden" class="group" name="group" value="{{ record.group }}">
                {{#each catalog.quoteStatus}}
                {{#if id == 'delimiter'}}
                <div class="select__delimiter" disabled></div>
                {{else}}
                <div class="select__item select__item--acc-{{color}}" data-id="{{id}}" data-group="{{type}}"
                     onclick="$(this).parents('.select.status').find('input.status').val($(this).attr('data-id'));$(this).parents('.select.status').find('input.group').val($(this).attr('data-group'));">
                    {{name}}
                </div>
                {{/if}}
                {{/each}}
            </div>
        </div>
    </div>

    <button class="btn btn--white d-none status-save" on-click="save">Сохранить</button>
</template>
<!-- !!! editorRecord !!! -->
<template id="editorRecord" wb-off>
    <form class="mt-2 record-edit">
        <div class="row">
            <div class="col-md-7">
                {{#record.quote_from_page}}
                {{#unless record.quote_from_page.search(/(проблем|услуг|блог|клинике)/i) == -1 }}
                <div class="mb-20 account-events__item wide">
                    <div class="account-event-wrap">
                        <div class="account-events__name" style="font-size: 20px">Страница обращения:</div>
                        <div class="account-event" style="font-size: 16px">
                            {{record.quote_from_page}}
                        </div>
                    </div>
                </div>
                {{/unless}}
                {{/record.quote_from_page}}

                {{#if record.client_comment}}
                <div class="account-events__item wide">
                    <div class="account-event-wrap">
                        <div class="account-events__name" style="font-size: 20px">Причина обращения:</div>
                        <div class="account-event" style="font-size: 16px">
                            {{{@global.nl2br(@global.fix_comment(record.client_comment))}}}
                        </div>
                    </div>
                </div>
                {{/if}}
                {{#if record.group == 'quotes'}}
                {{#record.quote_page_comment}}
                <div class="account-events__item wide">
                    <div class="account-event-wrap">
                        <div class="account-event" style="font-size: 16px">
                            Заявка на услугу <b style="font-weight: bolder;">{{record.quote_page_comment}}</b>
                        </div>
                    </div>
                </div>
                {{/record.quote_page_comment}}
                {{/if}}

                <div class="mt-40 lk-title">Редактировать заявку</div>
                <input type="hidden" value="{{ record.id }}" name="id">

                {{#if record.spec_service}}
                <input type="hidden" name="spec_service" value="{{this.spec_service}}">
                <input type="hidden" name="title" value="{{catalog.spec_service[this.spec_service].header}}">
                {{else}}

                {{/if}}
                {{#if record.group === 'events' }}
                {{elseif record.no_services === '1' }}
                <label class="checkbox checkbox--record hider-checkbox">
                    <input class="checkbox-hidden-next-form disabled" type="checkbox" value="1" checked>
                    <span></span>
                    <div class="checbox__name">Мне лень искать в списке, скажу администратору (указано в пациентом)
                    </div>
                </label>
                {{/if}}

                {{#if record.group === 'events' }}
                {{elseif record.no_experts === '1' }}
                <label class="checkbox checkbox--record hider-checkbox">
                    <input class="checkbox-hidden-next-form disabled" type="checkbox" value="1" checked>
                    <span></span>
                    <div class="checbox__name">Я не знаю, кого выбрать (указано в пациентом)</div>
                </label>
                {{/if}}
                <input type="hidden" name="has_meetroom" value="{{this.has_meetroom}}">

                <div class="admin-editor__type-event">
                    <div class="mb-20 consultations">
                        <label class="checkbox checkbox--record show-checkbox" data-show-input="consultation-type">
                            <input type="hidden" name="for_consultation" value="0">

                            {{#if record.for_consultation === '1' }}
                            <input class="checkbox-visible-next-form" type="checkbox" checked name="for_consultation"
                                   value="1">
                            {{else}}
                            <input class="checkbox-visible-next-form" type="checkbox" name="for_consultation" value="1">
                            {{/if}}
                            <span></span>
                            <div class="checbox__name">Консультация врача</div>
                        </label>
                        <div class="select-form" data-show="consultation-type"
                             style="display: {{#if record.for_consultation === '1' }} block {{else}} none {{/if}};">
                            <div class="mb-10 text-bold">Тип события</div>
                            <div class="popups__text-chexboxs">
                                {{#each @global.catalog.quoteType as qt}}
                                <label class="text-radio show-checkbox" data-show-input="consultation-{{ qt.id }}">
                                    {{#if qt.id === record.type }}
                                    <input type="radio" name="type" class="consultation-type {{qt.id}}"
                                           value="{{ qt.id }}" checked>
                                    {{else}}
                                    <input type="radio" name="type" value="{{ qt.id }}"
                                           class="consultation-type {{qt.id}}">
                                    {{/if}}
                                    <span>{{qt.name}}</span>
                                </label>
                                {{/each}}
                            </div>
                            <div class="admin-editor__patient price-list">
                                {{#each @global.catalog.spec_service.consultations.online}}
                                <div class="search__drop-item consultation online {{#if record.consultation == this.id }}selected{{/if}}"
                                     data-show="consultation-online" data-consultation="{{this.id}}"
                                     data-price="{{this.price}}"
                                     style="display: {{#if record.type === 'online' }} flex {{else}} none {{/if}};">

                                    <label class="checkbox search__drop-name" data-name="{{this.header}}"
                                           data-price="{{this.price}}" data-id="{{this.id}}">
                                        {{#if record.consultation == this.id }}
                                        <input type="radio" name="consultation" value="{{this.id}}"
                                               data-name="{{this.header}}" data-price="{{this.price}}"
                                               checked="checked">
                                        {{else}}
                                        <input type="radio" name="consultation" value="{{this.id}}"
                                               data-name="{{this.header}}" data-price="{{this.price}}">
                                        {{/if}}
                                        <span></span>
                                        <div class="checbox__name">{{this.header}}</div>
                                    </label>
                                    <label class="search__drop-right">
                                        <div class="search__drop-summ">{{ @global.utils.formatPrice(this.price) }} ₽
                                        </div>
                                    </label>
                                </div>
                                {{/each}}
                                {{#each @global.catalog.spec_service.consultations.clinic}}
                                <div class="search__drop-item consultation clinic {{#if record.consultation == this.id }}selected{{/if}}"
                                     data-show="consultation-clinic" data-consultation="{{this.id}}"
                                     data-price="{{this.price}}"
                                     style="display: {{#if record.type === 'clinic' }} flex {{else}} none {{/if}};">
                                    <label class="checkbox search__drop-name" data-name="{{this.header}}"
                                           data-price="{{this.price}}" data-id="{{this.id}}">
                                        {{#if record.consultation == this.id }}
                                        <input type="radio" name="consultation" value="{{this.id}}"
                                               data-name="{{this.header}}" data-price="{{this.price}}"
                                               checked="checked">
                                        {{else}}
                                        <input type="radio" name="consultation" value="{{this.id}}"
                                               data-name="{{this.header}}" data-price="{{this.price}}">
                                        {{/if}}
                                        <span></span>
                                        <div class="checbox__name">{{this.header}}</div>
                                    </label>
                                    <label class="search__drop-right">
                                        <div class="search__drop-summ">{{ @global.utils.formatPrice(this.price) }} ₽
                                        </div>
                                    </label>
                                </div>
                                {{/each}}
                            </div>
                        </div>
                        <input type="hidden" class="consultation_price" name="consultation_price"
                               value="{{record.consultation_price}}">
                    </div>

                    <div class="row mt-30">
                        {{#if record.spec_service}}
                        {{else}}
                        <div class="col-md-6">
                            <div class="select-form select-checkboxes">
                                <div class="select select_experts">
                                    <div class="select__main">
                                        <div class="select__placeholder">Выберите специалиста</div>
                                        <div class="select__values"></div>
                                    </div>
                                    <div class="select__list single">
                                        {{#each @global.catalog.experts}}
                                        <div class="select__item select__item--checkbox">
                                            <label class="checkbox checkbox--record">
                                                {{#if @global.utils.arr.search(.id, record.experts)}}
                                                <input type="checkbox" class="checked" name="experts[]" checked
                                                       value="{{.id}}">
                                                {{else}}
                                                <input type="checkbox" name="experts[]" value="{{.id}}">
                                                {{/if}}
                                                <span></span>
                                                <div class="checbox__name">
                                                    <div class="select__name">{{fullname}}</div>
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
                                        <input class="input__control datepickr empty-date" name="event_date"
                                               data-date="{{record.event_date}}"
                                               value="{{ @global.utils.dateForce(record.event_date) }}"
                                               autocomplete="off" type="text" placeholder="Выбрать дату и время">
                                        <div class="input__placeholder">Выбрать дату</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row event-time">
                                <div class="col-md-6">
                                    <div class="calendar input mb-30">
                                        <input class="input__control timepickr event-time-start" type="text"
                                               name="event_time_start" value="{{record.event_time_start}}"
                                               data-min-time="09:00" data-max-time="21:00" autocomplete="off"
                                               pattern="[0-9]{2}:[0-9]{2}">
                                        <div class="input__placeholder">Время (начало)</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="calendar input mb-30">
                                        <input class="input__control timepickr event-time-end" type="text"
                                               name="event_time_end" value="{{record.event_time_end}}"
                                               data-min-time="09:00" data-max-time="21:00" autocomplete="off"
                                               pattern="[0-9]{2}:[0-9]{2}">
                                        <div class="input__placeholder">Время (конец)</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-20 admin-editor__event">
                    <div class="search__block --flex --aicn">
                        <div class="input">
                            <input class="popup-services-list" type="text" placeholder="Поиск по услугам"
                                   autocomplete="off">
                            <div class="search__drop"></div>
                            <button class="search__btn" type="button">
                                <svg class="svgsprite _search">
                                    <use xlink:href="/assets/img/sprites/svgsprites.svg#search"></use>
                                </svg>
                            </button>
                            <div class="service-search__list" style="position: relative;"></div>
                        </div>
                    </div>
                </div>
                <div class="admin-editor__patient">
                    <div class="mb-10 text-bold">Выбраны услуги</div>

                    <div class="search__drop-item selected-consultation"
                         style="display: {{#if record.consultation_price > 0 }} flex {{else}} none {{/if}};">
                        <div class="search__drop-name consultation-header">
                            <div class="search__drop-delete fake" onclick="unselectConsultation(this);">
                                <svg class="svgsprite _delete">
                                    <use xlink:href="/assets/img/sprites/svgsprites.svg#delete"></use>
                                </svg>
                            </div>
                            <span>
									{{@global.catalog.spec_service.consultations[record.type][record.consultation].header}}
								</span>
                        </div>
                        <div class="search__drop-right">
                            <div class="search__drop-summ consultation-price">
                                {{@global.utils.formatPrice(@global.catalog.spec_service.consultations[record.type][record.consultation].price)}}
                                ₽
                            </div>
                        </div>
                    </div>

                    {{#each record.service_prices: idx, key}}
                    <div class="search__drop-item services selected"
                         data-index="{{idx}}"
                         data-id="{{service_id}}-{{price_id}}"
                         data-service_id="{{service_id}}"
                         data-price="{{price}}"
                         data-count="{{@global.utils.ifNull(this.count, 1)}}">
                        <input type="hidden" name="services[]" value="{{service_id}}">
                        <input type="hidden" name="service_prices[{{idx}}][service_id]" value="{{service_id}}">
                        <input type="hidden" name="service_prices[{{service_id}}-{{price_id}}][price_id]"
                               value="{{price_id}}">
                        <input type="hidden" name="service_prices[{{service_id}}-{{price_id}}][name]" value="{{name}}">
                        <input type="hidden" name="service_prices[{{service_id}}-{{price_id}}][price]"
                               value="{{price}}">
                        <div class="search__drop-name">
                            <div class="search__drop-delete">
                                <svg class="svgsprite _delete">
                                    <use xlink:href="/assets/img/sprites/svgsprites.svg#delete"></use>
                                </svg>
                            </div>
                            <div class="search__drop-tags">
                                {{#each catalog.servicePrices[service_id+'-'+this.price_id].tags}}
                                <div class="search__drop-tag --{{.color}}">{{this.tag}}</div>
                                {{/each}}
                            </div>
                            {{name}}
                        </div>
                        <label class="search__drop-right">
                            <input type="number" class="service-count"
                                   title="Количество"
                                   name="service_prices[{{service_id}}-{{price_id}}][count]"
                                   value="{{@global.utils.ifNull(this.count, 1)}}" min="1" max="99">
                            <span class="service-count-label"> ед.</span>
                            <div class="search__drop-summ">{{ @global.utils.formatPrice(this.price) }} ₽</div>
                        </label>
                    </div>
                    {{/each}}
                </div>
                <div class="mb-3 admin-editor__summ">
                    <p>Всего</p>
                    {{#if record.for_consultation == '0'}}
                    <input type="hidden" name="price" value="{{record.price}}">
                    {{elseif record.type == 'online'}}
                    <input type="hidden" name="price" class="consultation" data-type="online" value="{{record.price}}">
                    {{elseif record.type == 'clinic'}}
                    <input type="hidden" name="price" class="consultation" data-type="clinic" value="{{record.price}}">
                    {{else}}
                    <input type="hidden" name="price" value="{{record.price}}">
                    {{/if}}
                    <p class="price">{{ @global.utils.formatPrice(record.price) }} ₽<sup><b>*</b></sup></p>
                </div>
                <div class="text-right mb-80" data-hide="service-search">
                    <b>*</b>&nbsp;<small>стоимость указана приблизительно, она может быть изменена в зависимости от
                        фактически оказанных услуг</small>
                </div>

                {{#if record.group == 'events'}}
                <div class="mb-40 pt-30 admin-editor__images">
                    {{#if record.hasPhoto}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-30 text-bold text-big">Фото до приема</div>
                            {{#each record.photos.before}} <!--single photo!-->
                            <a class="before-healing photo" data-fancybox="images-{{record.id}}" href="{{.src}}"
                               data-caption="Фото до приема, {{ @global.utils.formatDate(.date) }}">
                                <div class="healing__date">
                                    {{ @global.utils.formatDate(.date) }}
                                </div>
                                <div class="before-healing__photo" style="background-image: url('{{.src}}')"></div>
                            </a>
                            {{/each}}
                        </div>
                        <div class="col-md-6">
                            <div class="mb-30 text-bold text-big">
                                Фото после приема
                            </div>
                            <div class="after-healing">
                                <div class="row">
                                    {{#each record.photos.after}}
                                    <div class="col-md-12">
                                        <a class="after-healing__item photo" data-fancybox="images-{{record.id}}"
                                           href="{{.src}}"
                                           data-caption="Фото после приема, {{ @global.utils.formatDate(.date) }}">
                                            <div class="healing__date">{{ @global.utils.formatDate(.date) }}</div>
                                            <div class="after-healing__photo"
                                                 style="background-image: url('{{.src}}');">
                                            </div>
                                        </a>
                                    </div>
                                    {{/each}}
                                </div>
                            </div>
                        </div>
                    </div>
                    {{/if}}
                    <div class="row acount__photos-wrap">
                        <div class="col-md-2">
                            <a class="btn btn--white" on-click="['addPhoto',record]">
                                Добавить фото
                            </a>
                        </div>
                    </div>
                </div>

                {{/if}}
                <button class="btn btn--white" on-click="save">Сохранить</button>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-4 --jcfe --flex" style="flex-direction: column-reverse; align-items: flex-end;">
                <div style="width: 100%; max-width: 305px;">
                    <div class="mb-10 text-bold">Комментарий для специалистов</div>
                    <textarea class="admin__editor-textarea" name="comment_for_expert"
                              placeholder="Комментарий для специалистов">{{record.comment_for_expert}}</textarea>
                </div>
                <div style="width: 100%; max-width: 305px;">
                    <div class="mb-10 text-bold">Комментарий для администратора</div>
                    <textarea class="mb-2 admin__editor-textarea" name="comment" placeholder="Добавить комментарий">{{record.comment}}</textarea>
                </div>
            </div>
        </div>
    </form>
</template>
<template id="listEvents" wb-off>
    <div class="account-scroll">
        <div class="account__table" data-records-group="{{group}}">
            <div class="account__table-head">
                <div class="admin-events-item orderby">
                    <button class="flag-date__ico" style="visibility: hidden">
                        <svg class="svgsprite _flag">
                            <use xlink:href="/assets/img/sprites/svgsprites.svg#flag"></use>
                        </svg>
                    </button>
                    {{#if group == 'group=quotes'}}
                    <span>Заявка</span>
                    {{else}}
                    <span>Приём</span>
                    {{/if}}
                </div>
                <div class="admin-events-item orderby">ФИО</div>
                <div class="admin-events-item orderby">Телефон</div>
                <div class="admin-events-item orderby">Специалист</div>
                <div class="admin-events-item">Тип</div>
                <div class="admin-events-item">Услуга</div>
                <div class="admin-events-item orderby">Оплата</div>
                <div class="admin-events-item orderby">Статус</div>
                <!--{{#if group == 'group=quotes'}}-->
                <!--<div class="w-8 admin-events-item orderby">Дата приёма</div>-->
                <!--{{else}}-->
                <!--<div class="w-8 admin-events-item orderby">Дата заявки</div>-->
                <!--{{/if}}-->
                <div class="admin-events-item comment">Комментарии</div>
            </div>
            <div class="account__table-body">
                <div class="loading-overlay">
                    <div class="loader"></div>
                </div>
                {{#each records as record: idx}}
                {{#with catalog.users[this.client]}}
                <div class="acount__table-accardeon accardeon acount__table-accardeon--pmin status-{{status}}"
                     data-client="{{record.client}}" data-record="{{record.id}}" data-id="{{record.id}}"
                     data-idx="{{idx}}" data-priority="{{record.priority}}" data-group="{{record.group}}">
                    <div class="acount__table-main accardeon__main acount__table-auto">
                        <div class="admin-events-item heap">
                            <div class="accardeon__click" data-record="{{record.id}}" data-idx="{{idx}}"
                                 on-click="toggleAccordeon"></div>
                            <div class="flag-date">
                                <div>
                                    {{#if priority * 1}}
                                    <label class="checkbox">
                                        <input type="checkbox" checked>
                                        <span></span>
                                    </label>
                                    {{else}}
                                    <label class="checkbox">
                                        <input type="checkbox">
                                        <span></span>
                                    </label>
                                    {{/if}}
                                    {{#if .parent_id}}
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="black" class="mt-30" style="margin-left: -6px;" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M19 16C18.4067 16 17.8266 16.1759 17.3333 16.5056C16.8399 16.8352 16.4554 17.3038 16.2284 17.8519C16.0013 18.4001 15.9419 19.0033 16.0576 19.5853C16.1734 20.1672 16.4591 20.7018 16.8787 21.1213C17.2982 21.5409 17.8328 21.8266 18.4147 21.9424C18.9967 22.0581 19.5999 21.9987 20.1481 21.7716C20.6962 21.5446 21.1648 21.1601 21.4944 20.6667C21.8241 20.1734 22 19.5933 22 19C22 18.2044 21.6839 17.4413 21.1213 16.8787C20.5587 16.3161 19.7956 16 19 16V16ZM19 20C18.8022 20 18.6089 19.9414 18.4444 19.8315C18.28 19.7216 18.1518 19.5654 18.0761 19.3827C18.0004 19.2 17.9806 18.9989 18.0192 18.8049C18.0578 18.6109 18.153 18.4327 18.2929 18.2929C18.4327 18.153 18.6109 18.0578 18.8049 18.0192C18.9989 17.9806 19.2 18.0004 19.3827 18.0761C19.5654 18.1518 19.7216 18.28 19.8315 18.4444C19.9414 18.6089 20 18.8022 20 19C20 19.2652 19.8946 19.5196 19.7071 19.7071C19.5196 19.8946 19.2652 20 19 20ZM9 16C8.40666 16 7.82664 16.1759 7.33329 16.5056C6.83994 16.8352 6.45542 17.3038 6.22836 17.8519C6.0013 18.4001 5.94189 19.0033 6.05764 19.5853C6.1734 20.1672 6.45912 20.7018 6.87868 21.1213C7.29824 21.5409 7.83279 21.8266 8.41473 21.9424C8.99667 22.0581 9.59987 21.9987 10.1481 21.7716C10.6962 21.5446 11.1648 21.1601 11.4944 20.6667C11.8241 20.1734 12 19.5933 12 19C12 18.2044 11.6839 17.4413 11.1213 16.8787C10.5587 16.3161 9.79565 16 9 16V16ZM9 20C8.80222 20 8.60888 19.9414 8.44443 19.8315C8.27998 19.7216 8.15181 19.5654 8.07612 19.3827C8.00043 19.2 7.98063 18.9989 8.01921 18.8049C8.0578 18.6109 8.15304 18.4327 8.29289 18.2929C8.43275 18.153 8.61093 18.0578 8.80491 18.0192C8.99889 17.9806 9.19996 18.0004 9.38268 18.0761C9.56541 18.1518 9.72159 18.28 9.83147 18.4444C9.94135 18.6089 10 18.8022 10 19C10 19.2652 9.89464 19.5196 9.70711 19.7071C9.51957 19.8946 9.26522 20 9 20ZM22 8.5C21.9974 6.7769 21.3117 5.12514 20.0933 3.90673C18.8749 2.68831 17.2231 2.00264 15.5 2H15C14.7348 2 14.4804 2.10536 14.2929 2.29289C14.1054 2.48043 14 2.73478 14 3V8H7.52L6.27 4.65C6.19849 4.4586 6.07006 4.2937 5.902 4.17749C5.73395 4.06128 5.53432 3.99934 5.33 4H3C2.73478 4 2.48043 4.10536 2.29289 4.29289C2.10536 4.48043 2 4.73478 2 5C2 5.26522 2.10536 5.51957 2.29289 5.70711C2.48043 5.89464 2.73478 6 3 6H4.64L5.89 9.37L6.4 10.74V10.83C6.86587 12.0671 7.70115 13.1309 8.79245 13.8769C9.88374 14.6229 11.1782 15.015 12.5 15H15.5C16.354 15.0013 17.1998 14.8341 17.989 14.5079C18.7782 14.1817 19.4953 13.703 20.0991 13.0991C20.703 12.4953 21.1817 11.7782 21.5079 10.989C21.8341 10.1998 22.0013 9.35396 22 8.5V8.5ZM18.68 11.68C18.2635 12.0993 17.768 12.4319 17.2222 12.6585C16.6764 12.885 16.091 13.0011 15.5 13H12.5C11.6061 13.0027 10.7319 12.7374 9.99039 12.2383C9.24883 11.7392 8.67395 11.0292 8.34 10.2C8.33566 10.1802 8.33566 10.1598 8.34 10.14L8.26 10H19.74C19.522 10.6347 19.159 11.2099 18.68 11.68V11.68ZM16 8V4C17.0244 4.10684 17.9809 4.5626 18.7091 5.29087C19.4374 6.01913 19.8932 6.97563 20 8H16Z" fill="#080E0D"/>
                                    </svg>

                                    {{/if}}
                                </div>

                                {{#if marked == 'true' }}
                                <button class="flag-date__ico checked">
                                    <svg class="svgsprite _flag">
                                        <use xlink:href="/assets/img/sprites/svgsprites.svg#flag"></use>
                                    </svg>
                                </button>
                                {{else}}
                                <button class="flag-date__ico">
                                    <svg class="svgsprite _flag">
                                        <use xlink:href="/assets/img/sprites/svgsprites.svg#flag"></use>
                                    </svg>
                                </button>
                                {{/if}}

                                {{#if group == 'events'}}
                                <input type="hidden" class="orderby" value="{{@global.utils.timestamp(event_date)}}">

                                <span class="dt"><strong class="title">Приём: </strong>
													{{@global.utils.formatDate(record.event_date)}}<br>
													{{record.event_time_start}}-{{record.event_time_end}}
												</span>
                                {{else}}
                                <input type="hidden" class="orderby"
                                       value="{{@global.utils.timestamp(record._created)}}">

                                <span class="dt"><strong class="title">Заявка: </strong>
													{{@global.utils.formatDate(record._created)}}<br>
													{{@global.utils.formatTime(record._created, 1)}}
												</span>
                                {{/if}}
                            </div>
                        </div>
                        <div class="admin-events-item">
                            <input type="hidden" class="orderby" value="{{catalog.clients[client].fullname}}">
                            <p>ФИО</p>
                            <div>
                                <a class="client-card link" href="/cabinet/client/{{client}}" target="_blank">{{catalog.clients[record.client].fullname}}</a>
                                {{#if @global.catalog.clients_has_longterm[record.client]}}
                                <small class="text-danger">продолжительное</small>
                                {{/if}}
                                {{#if .parent_id}}
                                <br>
                                <small class="mt-10">Родитель:</small>
                                <br>
                                <a class="client-card link" href="/cabinet/client/{{.parent_id}}" target="_blank">
                                    {{catalog.clients[.parent_id].fullname}}
                                </a>
                                {{/if}}
                            </div>
                        </div>
                        <div class="admin-events-item">
                            <input type="hidden" class="orderby" value="{{catalog.clients[client].phone}}">
                            <p>Телефон</p>
                            <div>{{catalog.clients[record.client].phone}}</div>
                        </div>
                        <div class="admin-events-item col-experts flex-column">
                            <p>Специалист</p>
                            {{#if no_experts == '1'}}
                            <div></div>
                            {{else}}
                            <input type="hidden" class="orderby"
                                   value="{{#experts}}{{@global.catalog.experts[this].fullname}},{{/experts}}">
                            {{#experts}}
                            <div>{{@global.catalog.experts[this].fullname}}</div>
                            {{/experts}}
                            {{/if}}
                        </div>
                        <div class="admin-events-item">
                            <p>Тип</p>
                            {{#each catalog.quoteType as item}}
                            {{#if item.id == type }}
                            <div>{{item.name}}</div>
                            {{/if}}
                            {{/each}}
                        </div>
                        <div class="admin-events-item col-services flex-column">
                            <p>Услуга</p>

                            {{#if group == 'events'}}
                            {{#record.consultation }}
                            <div>{{ @global.catalog.spec_service.consultations[type][consultation].header }}</div>
                            {{/record.consultation}}

                            {{#record.services}}
                            <div>{{catalog.services[this].header}}</div>
                            {{/record.services}}
                            {{elseif group == 'past'}}
                            {{#record.consultation }}
                            <div>{{ @global.catalog.spec_service.consultations[type][consultation].header }}</div>
                            {{/record.consultation}}

                            {{#record.services}}
                            <div>{{catalog.services[this].header}}</div>
                            {{/record.services}}
                            {{elseif record.quote_page_comment}}
                            <div>Заявка на услугу</div>
                            {{elseif record.is_mainfilter_quote == '1'}}
                            <div>Заявка из фильтра</div>
                            {{else}}
                            <div>Заявка из формы</div>
                            {{/if}}
                        </div>
                        <div class="admin-events-item">
                            <p>Оплата</p>
                            {{#each catalog.quotePay as item}}
                            {{#if item.id == pay_status }}
                            <input type="hidden" class="orderby" value="{{item.name}}">
                            <div>
                                <span class="pay-status-{{pay_status}}"></span>
                                {{item.name}}
                            </div>
                            {{/if}}
                            {{/each}}
                        </div>
                        <div class="admin-events-item">
                            <input type="hidden" class="orderby" value="{{catalog.quoteStatus[status].name}}">
                            <p>Статус</p>
                            <div>{{catalog.quoteStatus[status].name}}</div>
                        </div>

                        <!--<div class="w-8 admin-events-item">-->
                        <!--	{{#if group == 'events'}}-->
                        <!--	<input type="hidden" class="orderby" value="{{@global.utils.timestamp(record._created)}}">-->
                        <!--	<p>Дата заявки</p>-->
                        <!--	<div>-->
                        <!--		{{@global.utils.formatDate(record._created)}}<br>-->
                        <!--		{{@global.utils.formatTime(record._created)}}-->
                        <!--	</div>-->
                        <!--	{{else}}-->
                        <!--	<input type="hidden" class="orderby" value="">-->
                        <!--	<p>Дата приёма</p>-->
                        <!--	<span class="link-danger">&nbsp;</span>-->
                        <!--	{{/if}}-->
                        <!--</div>-->
                        <div class="admin-events-item comment">
                            <p>Комментарии</p>
                            <div>{{record.comment}}</div>
                        </div>
                    </div>
                    <div class="acount__table-list accardeon__list admin-editor">
                        <div class="mb-40 admin-editor__top">
                            <div class="admin-editor__top-info">
                                <div class="mb-40 row">
                                    <div class="col-md-12">
                                        <div class="mb-20 analysis__top --aicn --flex">
                                            <div class="analysis__title">Анализы</div>

                                            {{#if record.analyses}}
                                            <a class="mr-20 btn btn--white" href="{{record.analyses}}" target="_blank">
                                                Скачать анализы
                                            </a>
                                            {{/if}}

                                            <form class="analyses">
                                                <label class="admin-edit__upload-btn btn btn--white">
                                                    Загрузить анализы
                                                    <input class="admin-edit__upload analyses" type="file" name="file"
                                                           accept=".pdf" on-change="['addAnalyses',record,@index]">
                                                </label>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                {{#if .parent_id}}
                                <div class="lk-title" style="display:flex">
                                    Родитель
                                </div>
                                <div class="admin-editor__iser-contacts mb-40">
                                    <p>
                                        ФИО:
                                        <span>
                                            {{ catalog.clients[.parent_id].fullname }}
                                        </span>
                                    </p>
                                </div>
                                {{/if}}

                                <div class="lk-title" style="display:flex">
                                    Редактировать профиль
                                    {{#if .parent_id}}
                                    <svg class="ml-10" style="margin-left: 2px;" xmlns="http://www.w3.org/2000/svg"
                                         height="1em" viewBox="0 0 448 512">
                                        <path d="M152 88a72 72 0 1 1 144 0A72 72 0 1 1 152 88zM39.7 144.5c13-17.9 38-21.8 55.9-8.8L131.8 162c26.8 19.5 59.1 30 92.2 30s65.4-10.5 92.2-30l36.2-26.4c17.9-13 42.9-9 55.9 8.8s9 42.9-8.8 55.9l-36.2 26.4c-13.6 9.9-28.1 18.2-43.3 25V288H128V251.7c-15.2-6.7-29.7-15.1-43.3-25L48.5 200.3c-17.9-13-21.8-38-8.8-55.9zm89.8 184.8l60.6 53-26 37.2 24.3 24.3c15.6 15.6 15.6 40.9 0 56.6s-40.9 15.6-56.6 0l-48-48C70 438.6 68.1 417 79.2 401.1l50.2-71.8zm128.5 53l60.6-53 50.2 71.8c11.1 15.9 9.2 37.5-4.5 51.2l-48 48c-15.6 15.6-40.9 15.6-56.6 0s-15.6-40.9 0-56.6L284 419.4l-26-37.2z"/>
                                    </svg>
                                    {{/if}}
                                </div>
                                <div class="admin-editor__name user__edit">
                                    {{ catalog.clients[record.client].fullname }}
                                    <button class="user__edit" on-click="editProfile" data-id="{{record.client}}">
                                        <svg class="svgsprite _edit">
                                            <use xlink:href="/assets/img/sprites/svgsprites.svg#edit"></use>
                                        </svg>
                                    </button>
                                </div>
                                <div class="admin-editor__iser-contacts">
                                    {{#if catalog.clients[record.client].birthdate === '01.01.1970' }}
                                    {{else}}
                                    <p>Дата рождения:
                                        <span>{{ @global.utils.formatDate(catalog.clients[record.client].birthdate) }}</span>
                                    </p>
                                    {{/if}}

                                    <p>Телефон:
                                        <span>{{ @global.utils.formatPhone(catalog.clients[record.client].phone) }}</span>
                                    </p>
                                </div>
                            </div>
                            <div class="admin-editor__top-status">
                                <div class="admin-editor__top-date">
                                    Заявка сформирована {{@global.utils.formatDate(_created)}} /
                                    {{@global.utils.formatTime(_created)}}
                                </div>
                                <div class="admin-editor__top-select"></div>
                            </div>
                        </div>
                        <div class="admin-editor__edit-profile" data-client="{{record.client}}"></div>
                        <div class="admin-editor__events" data-record="{{record.id}}" data-idx="{{idx}}"></div>
                    </div>
                </div>
                {{/with}}
                {{else}}
                <div class="acount__table-accardeon accardeon">
                    <div class="acount__table-main accardeon__main">
                        Нет записей
                    </div>
                </div>
                {{/each}}
            </div>
        </div>
    </div>
</template>
<template id="listLongterms" wb-off>
    <div class="account-scroll">
        <div class="account__table">
            <div class="account__table-head">
                <div class="admin-events-item orderby">
                    <button class="flag-date__ico" style="visibility: hidden;">
                        <svg class="svgsprite _flag">
                            <use xlink:href="/assets/img/sprites/svgsprites.svg#flag"></use>
                        </svg>
                    </button>
                    <span>Дата</span>
                </div>
                <div class="admin-events-item orderby">ФИО</div>
                <div class="admin-events-item orderby">Телефон</div>
                <div class="admin-events-item">Услуга</div>
            </div>
            <div class="account__table-body">
                <div class="loading-overlay">
                    <div class="loader"></div>
                </div>
                {{#each records as record: idx}}
                {{#with catalog.users[this.client]}}
                <div class="acount__table-accardeon accardeon acount__table-accardeon--pmin"
                     data-client="{{record.client}}" data-record="{{record.id}}" data-id="{{record.id}}"
                     data-idx="{{idx}}" data-priority="{{record.priority}}" data-group="{{record.group}}">
                    <div class="acount__table-main accardeon__main acount__table-auto">
                        <div class="admin-events-item heap">
                            <div class="accardeon__click" data-record="{{record.id}}" data-idx="{{idx}}"
                                 on-click="toggleAccordeon"></div>
                            <div class="flag-date">
                                <div>
                                    {{#if priority * 1}}
                                    <label class="checkbox">
                                        <input type="checkbox" checked>
                                        <span></span>
                                    </label>
                                    {{else}}
                                    <label class="checkbox">
                                        <input type="checkbox">
                                        <span></span>
                                    </label>
                                    {{/if}}
                                    {{#if .parent_id}}
                                    <svg class="mt-30" style="margin-left: 2px;" xmlns="http://www.w3.org/2000/svg"
                                         height="1em" viewBox="0 0 448 512">
                                        <path d="M152 88a72 72 0 1 1 144 0A72 72 0 1 1 152 88zM39.7 144.5c13-17.9 38-21.8 55.9-8.8L131.8 162c26.8 19.5 59.1 30 92.2 30s65.4-10.5 92.2-30l36.2-26.4c17.9-13 42.9-9 55.9 8.8s9 42.9-8.8 55.9l-36.2 26.4c-13.6 9.9-28.1 18.2-43.3 25V288H128V251.7c-15.2-6.7-29.7-15.1-43.3-25L48.5 200.3c-17.9-13-21.8-38-8.8-55.9zm89.8 184.8l60.6 53-26 37.2 24.3 24.3c15.6 15.6 15.6 40.9 0 56.6s-40.9 15.6-56.6 0l-48-48C70 438.6 68.1 417 79.2 401.1l50.2-71.8zm128.5 53l60.6-53 50.2 71.8c11.1 15.9 9.2 37.5-4.5 51.2l-48 48c-15.6 15.6-40.9 15.6-56.6 0s-15.6-40.9 0-56.6L284 419.4l-26-37.2z"/>
                                    </svg>
                                    {{/if}}
                                </div>

                                {{#if marked == 'true' }}
                                <button class="flag-date__ico checked">
                                    <svg class="svgsprite _flag">
                                        <use xlink:href="/assets/img/sprites/svgsprites.svg#flag"></use>
                                    </svg>
                                </button>
                                {{else}}
                                <button class="flag-date__ico">
                                    <svg class="svgsprite _flag">
                                        <use xlink:href="/assets/img/sprites/svgsprites.svg#flag"></use>
                                    </svg>
                                </button>
                                {{/if}}
                                <input type="hidden" class="orderby"
                                       value="{{@global.utils.timestamp(record._created)}}">

                                <span class="dt"><strong class="title">Дата: </strong>
												{{@global.utils.formatDate(record._created)}}<br>
												{{@global.utils.formatTime(record._created, 1)}}
											</span>
                            </div>
                        </div>
                        <div class="admin-events-item">
                            <input type="hidden" class="orderby" value="{{catalog.clients[record.client].fullname}}">
                            <p>ФИО</p>
                            <div>
                                <a class="client-card link" href="/cabinet/client/{{record.client}}" target="_blank">{{catalog.clients[record.client].fullname}}</a>
                                <br>
                                <small class="text-danger">продолжительное</small>
                                {{#if .parent_id}}
                                <small class="mt-10">Родитель:</small>
                                <br>
                                <a class="client-card link" href="/cabinet/client/{{.parent_id}}" target="_blank">
                                    {{catalog.clients[.parent_id].fullname}}
                                </a>
                                {{/if}}
                            </div>
                        </div>
                        <div class="admin-events-item">
                            <input type="hidden" class="orderby" value="{{catalog.clients[record.client].phone}}">
                            <p>Телефон</p>
                            <div>{{catalog.clients[client].phone}}</div>
                        </div>
                        <div class="admin-events-item col-services flex-column">
                            <p>Услуги</p>
                            <div>{{record.longterm_title}}</div>
                        </div>
                    </div>
                    <div class="acount__table-list accardeon__list admin-editor">
                        <div class="admin-editor__top">
                            <div class="admin-editor__top-info">
                                <div class="lk-title">Редактировать профиль</div>
                                <div class="admin-editor__name user__edit">
                                    {{ catalog.clients[record.client].fullname }}
                                    <button class="user__edit" on-click="editProfile" data-id="{{record.client}}">
                                        <svg class="svgsprite _edit">
                                            <use xlink:href="/assets/img/sprites/svgsprites.svg#edit"></use>
                                        </svg>
                                    </button>
                                </div>
                                <div class="admin-editor__iser-contacts">
                                    {{#if catalog.clients[client].birthdate === '01.01.1970' }}
                                    {{else}}
                                    <p>Дата рождения:
                                        <span>{{ @global.utils.formatDate(catalog.clients[client].birthdate) }}</span>
                                    </p>
                                    {{/if}}

                                    <p>Телефон:
                                        <span>{{ @global.utils.formatPhone(catalog.clients[client].phone) }}</span>
                                    </p>
                                </div>
                            </div>
                            <div class="admin-editor__top-status">
                                <div class="admin-editor__top-date">
                                    Заявка сформирована {{@global.utils.formatDate(record._created)}} /
                                    {{@global.utils.formatTime(record._created)}}
                                </div>
                                <div class="admin-editor__top-select"></div>
                            </div>
                        </div>
                        <div class="admin-editor__edit-profile" data-client="{{record.client}}"></div>
                        <div class="mt-20 admin-editor__events border-top" data-record="{{record.id}}"
                             data-idx="{{idx}}">
                            <div class="row acount__photos-wrap">
                                <div class="col-md-2">
                                    <a class="btn btn--white" on-click="['addPhoto',record]">
                                        Добавить фото
                                    </a>
                                </div>
                            </div>
                            {{#if record.hasPhoto}}
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="mb-20 text-bold text-big">
                                        Фото до начала лечения
                                    </div>
                                    {{#each record.photos.before}} <!--single photo!-->
                                    <a class="before-healing photo" data-fancybox="images-{{record.id}}" href="{{.src}}"
                                       data-caption="Фото до начала лечения, {{ @global.utils.formatDate(.date) }}">
                                        <h2 class="h2 healing__date-title">
                                            {{ @global.utils.formatDateAdv(.date) }}
                                        </h2>
                                        <div class="before-healing__photo" style="background-image: url('{{.src}}')">
                                        </div>
                                    </a>
                                    {{/each}}
                                </div>
                                <div class="col-md-7">
                                    <div class="mb-20 text-bold text-big">
                                        Фото после начала лечения
                                    </div>
                                    <div class="after-healing">
                                        <h2 class="h2 healing__date-title d-none month-header"></h2>
                                        <div class="row">
                                            {{#each record.photos.after}}
                                            <div class="col-md-6">
                                                <a class="after-healing__item photo"
                                                   data-fancybox="images-{{record.id}}" href="{{.src}}"
                                                   data-caption="Фото после начала лечения, {{ @global.utils.formatDate(.date) }}">
                                                    <h2 class="h2 healing__date-title">
                                                        {{ @global.utils.formatDateAdv(.date) }}
                                                    </h2>
                                                    <div class="after-healing__photo"
                                                         style="background-image: url({{.src}});">
                                                    </div>
                                                </a>
                                            </div>
                                            {{/each}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{/if}}
                        </div>
                    </div>
                </div>
                {{/with}}
                {{else}}
                <div class="acount__table-accardeon accardeon">
                    <div class="acount__table-main accardeon__main">
                        Нет записей
                    </div>
                </div>
                {{/each}}
            </div>
        </div>
    </div>
</template>

<wb-module wb="module=yonger&mode=render&view=footer"/>

<wb-jq wb="$dom->find('script:not([src]):not([type])')->attr('type','wbapp');"/>
<wb-jq wb="$dom->find('.content-wrap ul')->addClass('ul-line');"/>


<script wb-app remove>
    var tabs = {};
    window.can_update = false;
    $(document).on('cabinet-db-ready', function () {
        var getGroupByStatus = function (status) {
            if (['new', 'uncall', 'delay'].includes(status)) {
                return 'quote';
            }
            return 'event';
        };
        window.tab_urls = [
            'group=longterms',
            'group=quotes',
            'group=events&status=upcoming',
            'group=events&status=[past,cancel_think,cancel_expensive,cancel_noreason,id63ea52b10780]'
        ];
        let editProfile = wbapp.tpl('#editProfile').html;
        let editStatus = wbapp.tpl('#editStatus').html;
        window.newEvent = function () {
            var editor = window.popupEvent(null, null, function (data) {
                toast('Запись успешно создана!');
                window.load('group=events&status=upcoming');
                editor.close();
            });
        };
        window.afterLoads = {};
        window.afterLoad = null;
        window.load = function (only_tab) {
            var _sorts = [
                '_created:d',
                'event_date:d',
                'event_date:a',
                '_created:d'
            ];
            var _tab;

            tab_urls.forEach(
                function (target_tab, i) {
                    if (!window.can_update) {
                        return;
                    }
                    if (only_tab && only_tab != target_tab) {
                        return;
                    }

                    utils.api.get('/api/v2/list/records?' + target_tab, {
                        '@sort': _sorts[i]
                    }).then(function (result) {
                        if (!window.can_update) {
                            return;
                        }
                        if (target_tab == 'group=longterms') {
                            _tab = new Ractive({
                                el: '.data-tab-item[data-type="' + target_tab + '"]',
                                template: wbapp.tpl('#listLongterms').html,
                                data: {
                                    group: target_tab,
                                    records: result,
                                    catalog: catalog
                                },
                                on: {
                                    loaded() {
                                        //console.log('>>> loaded', target_tab);
                                        $(this.el).find('.loading-overlay').remove();
                                    },
                                    complete() {
                                        this.find('.loading-overlay').remove();
                                    },
                                    toggleAccordeon(ev) {
                                        var target_tab = this;
                                        const _parent = $(ev.node).closest('.accardeon');
                                        window.can_update = false;
                                        var _edit_active = (sessionStorage["state.open-editor"] == _parent.data('record'));
                                        if (_edit_active) {
                                            //$(ev.node).removeClass('open');
                                            //_parent.find('.admin-editor__events').html('');
                                            //_parent.find('.admin-editor__top-select').html('');
                                            sessionStorage.removeItem("state.open-editor");
                                            console.log('autoupdate activated...');
                                            window.can_update = true;
                                            return;
                                        } else {
                                            console.log('autoupdate deactivated...');
                                        }

                                        sessionStorage["state.open-editor"] = _parent.data('record');
                                        console.log('open', target_tab, ev);
                                    },
                                    editProfile(ev) {
                                        var form = $(ev.node).parents('.admin-editor')
                                            .find('.admin-editor__edit-profile');
                                        window.can_update = false;

                                        if ($(ev.node).hasClass('open')) {
                                            $(ev.node).removeClass('open');
                                            $(form).html('');
                                            window.can_update = true;
                                            return;
                                        }
                                        $(ev.node).addClass('open');
                                        var profile_id = $(ev.node).data('id');
                                        let editor = new Ractive({
                                            el: form,
                                            template: editProfile,
                                            data: {},
                                            lazy: true,

                                            on: {
                                                save(ev) {
                                                    var $form = $(ev.node);
                                                    if ($form.verify() && profile_id > '') {
                                                        var data = $form.serializeJSON();

                                                        Cabinet.updateProfile(profile_id, data,
                                                            function (res) {
                                                                console.log('client saved', res);
                                                                data.birthdate_fmt = utils.formatDate(
                                                                    data.birthdate);
                                                                data.phone = utils.formatPhone(data.phone);
                                                                _tab.set('catalog.clients.' + profile_id, data);
                                                                catalog.clients[profile_id] = data;

                                                                $(form).html('');
                                                                toast('Профиль успешно обновлён');
                                                            });
                                                    }

                                                    return false;
                                                }
                                            }
                                        });
                                        utils.api.get('/api/v2/read/users/' + profile_id).then(
                                            function (data) {
                                                data.phone = str_replace([' ', '-', '(', ')'], '', data.phone);
                                                data.phone = data.phone.includes('+') ? data.phone : '+' +
                                                    data.phone;
                                                editor.set(data);

                                                console.log(data);
                                                initPlugins(form);
                                            });
                                    },
                                    addPhoto(ev, record) {
                                        var self = this;
                                        var _row_idx = $(ev.node).parents('.admin-editor__events').data('idx');
                                        window.can_update = false;

                                        popupPhoto(catalog.clients[record.client], record,
                                            function (rec) {
                                                self.set('records.' + _row_idx, rec);
                                                toast('Фото добавлено!');
                                                //self.set('record', rec);
                                                //window.can_update = true;
                                                //sessionStorage.removeItem("state.open-editor");
                                                //window.load();
                                                console.log('rec:', rec);
                                            });
                                    }
                                }
                            });
                        } else {
                            _tab = new Ractive({
                                el: '.data-tab-item[data-type="' + target_tab + '"]',
                                template: wbapp.tpl('#listEvents').html,
                                data: {
                                    group: target_tab,
                                    records: result,
                                    catalog: catalog
                                },
                                on: {
                                    init() {
                                    },
                                    loaded() {
                                        //console.log('>>> loaded', target_tab);
                                        $(this.el).find('.loading-overlay').remove();
                                        if (window.afterLoads.hasOwnProperty(target_tab)) {
                                            setTimeout(function () {
                                                var res = window.afterLoads[target_tab]();
                                                if (res.length) {
                                                    delete window.afterLoads[target_tab];
                                                }
                                            }, 100);
                                        }
                                    },
                                    complete() {
                                        this.find('.loading-overlay').remove();
                                    },
                                    addAnalyses(ev, record, index) {
                                        var self = this;
                                        var $form = $(ev.node).parents('form');
                                        var files = Array.from($form.find('input[name="file"]')[0].files);
                                        files.forEach(function (file) {
                                            uploadFile(
                                                file,
                                                'records/analyses/' + record.client,
                                                Date.now() + '_' + utils.getRandomStr(4),
                                                function (photo) {
                                                    console.log(photo);
                                                    utils.api.post('/api/v2/update/records/' + record.id, {
                                                        'analyses': photo.uri
                                                    })
                                                        .then(function (record) {
                                                            toast('Анализы добавлены!');
                                                            console.log(index);
                                                            self.set('records.' + index, record);
                                                            //window.afterLoads[target_tab] = function () {
                                                            //	var res = $(
                                                            //		'.accardeon__click[data-record="' + record.id +
                                                            //		'"]');
                                                            //	if (res.length) {
                                                            //		setTimeout(function () {
                                                            //			$('.accardeon__click[data-record="' +
                                                            //			  record.id + '"]')[0].scrollIntoView();
                                                            //			$('.accardeon__click[data-record="' +
                                                            //			  record.id + '"]')[0].click();
                                                            //		}, 500);
                                                            //	}
                                                            //	return res;
                                                            //};

                                                            //window.load();
                                                        });
                                                });
                                            return false;
                                        });
                                    },
                                    editProfile(ev) {
                                        var form = $(ev.node).parents('.admin-editor')
                                            .find('.admin-editor__edit-profile');
                                        window.can_update = false;

                                        if ($(ev.node).hasClass('open')) {
                                            $(ev.node).removeClass('open');
                                            $(form).html('');
                                            window.can_update = true;
                                            return;
                                        }
                                        $(ev.node).addClass('open');
                                        var profile_id = $(ev.node).data('id');

                                        let editor = new Ractive({
                                            el: form,
                                            template: editProfile,
                                            data: {},
                                            lazy: true,

                                            on: {
                                                save(ev) {

                                                    var $form = $(ev.node);
                                                    console.log(form);
                                                    if ($form.verify() && profile_id > '') {
                                                        var data = $form.serializeJSON();

                                                        Cabinet.updateProfile(profile_id, data,
                                                            function (res) {
                                                                console.log('client saved', res);
                                                                data.birthdate_fmt = utils.formatDate(
                                                                    data.birthdate);
                                                                data.phone = utils.formatPhone(data.phone);
                                                                _tab.set('catalog.clients.' + profile_id, data);
                                                                catalog.clients[profile_id] = data;
                                                                $(form).html('');

                                                                toast('Профиль успешно обновлён');
                                                            });
                                                    }

                                                    return false;
                                                }
                                            }
                                        });
                                        utils.api.get('/api/v2/read/users/' + profile_id).then(
                                            function (data) {
                                                data.phone = str_replace([' ', '-', '(', ')'], '', data.phone);
                                                data.phone = data.phone.includes('+') ? data.phone : '+' +
                                                    data.phone;
                                                editor.set(data);
                                                console.log(data);
                                                initPlugins(form);
                                            });
                                    },
                                    toggleAccordeon(ev) {
                                        var target_tab = this;
                                        const _parent = $(ev.node).closest('.accardeon');
                                        window.can_update = false;
                                        var _is_edit_active = (sessionStorage["state.open-editor"] ==
                                            _parent.data('record'));
                                        console.log(_parent.data('record'));
                                        if (_is_edit_active) {
                                            //_parent.removeClass('active');
                                            //_parent.find('.admin-editor__events').html('');
                                            //_parent.find('.admin-editor__top-select').html('');
                                            sessionStorage.removeItem("state.open-editor");
                                            window.can_update = true;
                                            console.log('autoupdate activated...');
                                            return;
                                        } else {
                                            //_parent.addClass('active');
                                            console.log('autoupdate deactivated...');
                                        }
                                        sessionStorage["state.open-editor"] = _parent.data('record');
                                        console.log('open', target_tab, ev);

                                        var _row_idx = $(ev.node).data('idx');
                                        var _record = this.get('records.' + _row_idx);
                                        if (!_record.price) {
                                            _record.price = 0;
                                        }

                                        _record.price_text = utils.formatPrice(_record.price);
                                        var saveRecord = function (id, idx, data) {
                                            utils.api.post('/api/v2/update/records/' + id, data)
                                                .then(function (res) {
                                                    toast('Успешно сохранено');
                                                    _tab.set('records.' + idx, res);
                                                    sessionStorage.removeItem("state.open-editor");
                                                    window.can_update = true;
                                                    window.load();
                                                    console.log('autoupdate activated...');
                                                });
                                        };

                                        var statusEditor = new Ractive({
                                            el: _parent.find('.admin-editor__top-select'),
                                            template: editStatus,
                                            data: {
                                                catalog: catalog,
                                                record: _record
                                            },
                                            on: {
                                                complete() {
                                                    $(statusEditor.find(
                                                        `.select.status [data-id="${_record.status}"]`))
                                                        .trigger('click');
                                                    $(statusEditor.find(
                                                        `.select.pay [data-id="${_record.pay_status}"]`))
                                                        .trigger('click');
                                                },
                                                save(ev) {
                                                    let form = $(ev.node).parents('.admin-editor');
                                                    $(form).find('.admin-editor__edit-profile').html('');
                                                    let copy = $('<form></form>');
                                                    $(copy).html($(form).clone());

                                                    let post = $(copy).serializeJSON();

                                                    post.group = (catalog.quoteStatus[post.status].type ||
                                                        _record.group.substring(0,
                                                            _record.group.length - 1)) + 's';

                                                    utils.api.post('/api/v2/update/records/' + _record.id, post)
                                                        .then(function (res) {
                                                            _tab.set('records.' + _row_idx, res);
                                                            window.load();
                                                            toast('Успешно сохранено');
                                                        });
                                                    delete copy;

                                                    return false;
                                                }
                                            }
                                        });
                                        var recordEditor = new Ractive({
                                            el: _parent.find('.admin-editor__events'),
                                            template: wbapp.tpl('#editorRecord').html,
                                            data: {
                                                catalog: catalog,
                                                record: _record,
                                                start_time: 0,
                                                end_time: 0
                                            },
                                            on: {
                                                complete() {
                                                    initServicesSearch(
                                                        _parent.find('.admin-editor__events .popup-services-list'),
                                                        catalog.servicesList
                                                    );
                                                    console.log('true: ',
                                                        $(this.el).find('.search__drop-item.services').length);
                                                    initPlugins($(this.el));

                                                    if (!!$(this.el)
                                                        .find('.select .select__item input:checked').length) {
                                                        $(this.el).find('.select.select_experts .select__item')
                                                            .trigger('click');
                                                    }
                                                    console.log($('.search__drop-item.services').length);
                                                },
                                                addPhoto(ev, record) {
                                                    var self = this;
                                                    popupPhoto(catalog.clients[record.client], record,
                                                        function (rec) {
                                                            _tab.set('records.' + _row_idx, rec);
                                                            toast('Фото добавлено!');
                                                            self.set('record', rec);
                                                        });
                                                },
                                                setEventTime(ev) {
                                                    if ($(ev.node).hasClass('event-time-start')) {
                                                        this.set('start_time', $(ev.node).val());
                                                    } else {
                                                        this.set('end_time', $(ev.node).val());
                                                        if (!!this.get('start_time')) {
                                                            $(ev.node).timepicker({
                                                                minTime: this.get('start_time')
                                                            });
                                                        }
                                                    }

                                                },
                                                save(ev) {
                                                    if ($($(ev.node).parents('form')).length) {
                                                        let form = $(ev.node).parents('.admin-editor');
                                                        $(form).find('.admin-editor__edit-profile').html('');
                                                        let copy = $('<form></form>');
                                                        $(copy).html($(form).clone());

                                                        let post_statuses = $(copy).serializeJSON();

                                                        post_statuses.group = (
                                                            catalog.quoteStatus[post_statuses.status].type || ''
                                                        );
                                                        if (!post_statuses.group) {
                                                            post_statuses.group = getGroupByStatus(
                                                                post_statuses.status);
                                                        }
                                                        post_statuses.group += 's';
                                                        var new_data = $($(ev.node).parents('form'))
                                                            .serializeJSON();
                                                        console.log('!!', new_data);

                                                        new_data.price = parseInt(new_data.price);
                                                        new_data.status = post_statuses.status;
                                                        new_data.pay_status = post_statuses.pay_status;
                                                        new_data.group = post_statuses.group;
                                                        // if(post_statuses.status === 'upcoming'){
                                                        if (new_data.group === 'upcoming' && !new_data.event_date) {
                                                            toast_error('Необходимо выбрать дату/время события');
                                                            $($(ev.node).parents('form'))
                                                                .find('[name="event_date"]')
                                                                .focus();
                                                            return false;
                                                        }
                                                        if (new_data.status === 'upcoming' && !new_data?.experts) {
                                                            toast_error('Необходимо выбрать специалиста');
                                                            $($(ev.node).parents('form'))
                                                                .find('.select_experts')
                                                                .focus();
                                                            return false;
                                                        }
                                                        if (new_data.group === 'events' &&
                                                            !!new_data.experts) {
                                                            new_data.no_experts = 0;
                                                        }

                                                        if (!new_data.hasOwnProperty('has_meetroom')) {
                                                            new_data.has_meetroom = 0;
                                                        }
                                                        if (!new_data.hasOwnProperty('consultation') ||
                                                            new_data.consultation_price === 0) {
                                                            new_data.consultation = null;
                                                            new_data.type = null;
                                                            new_data.for_consultation = 0;
                                                            new_data.consultation_price = 0;
                                                        }
                                                        if (!new_data.hasOwnProperty('services')) {
                                                            new_data.services = null;
                                                            new_data.service_prices = null;
                                                        } else {
                                                            new_data.services = utils.arr.unique(new_data.services);
                                                        }
                                                        if (new_data.group === 'events' &&
                                                            (!!new_data.services || !!new_data.consultation)) {
                                                            new_data.no_services = 0;
                                                        }
                                                        if (new_data.group === 'upcoming' && !new_data.price) {
                                                            toast_error('Необходимо выбрать услугу');
                                                            $($(ev.node).parents('form'))
                                                                .find('.popup-services-list')
                                                                .focus();
                                                            return false;
                                                        }
                                                        new_data.event_date = utils.dateForce(new_data.event_date);
                                                        try {
                                                            changeLogSave(new_data, _record);
                                                        } catch (e) {
                                                            console.error(e);
                                                        } finally {
                                                            var is_saved = false;
                                                            if (new_data.type == 'online') {
                                                                if (new_data.status == 'upcoming') {
                                                                    if (!!new_data.has_meetroom == 0) {
                                                                        is_saved = true;
                                                                        onlineRooms.create(function (meetroom) {
                                                                            new_data['has_meetroom'] = 1;
                                                                            new_data['meetroom'] = meetroom;
                                                                            saveRecord(_record.id, _row_idx, new_data);
                                                                        });
                                                                    } else {
                                                                        is_saved = true;
                                                                        saveRecord(_record.id, _row_idx, new_data);
                                                                    }
                                                                }
                                                            }
                                                        }


                                                        if (!is_saved) {
                                                            if (new_data.has_meetroom == 1) {
                                                                onlineRooms.delete(new_data.meetroom.meetingId,
                                                                    function (meetroom) {
                                                                    });
                                                                new_data.meetroom = {};
                                                                new_data.has_meetroom = 0;
                                                            }
                                                            saveRecord(_record.id, _row_idx, new_data);
                                                        }
                                                    } else {
                                                        toast('Проверьте указанные данные');
                                                    }
                                                    return false;
                                                }
                                            }
                                        });
                                    }
                                }
                            });
                        }
                    }).then(function () {
                        if (!window.can_update) {
                            return;
                        }
                        _tab.fire('loaded');

                        var _curr_tab = $('.account__tab.data-tab-item[data-type="' + target_tab + '"]');
                        var _has_sort = sessionStorage.getItem('state.order-by-' + _curr_tab.data('tab'));
                        if (!!_has_sort) {
                            //console.log('Need tab?', _curr_tab, target_tab,
                            //	'.account__tab.data-tab-item[data-type="' + target_tab + '"].active');
                            var order = _has_sort.split(':');
                            var col = _curr_tab.find('.account__table-head .admin-events-item:eq(' + order[0] + ')');
                            if (!!col.length) {
                                if (order[1] === '0') {
                                    col.addClass('selected');
                                }
                                col.trigger('click');
                            }
                        } else {
                            /* sort by prior */

                        }
                        var _list = $(
                            '.account__tab.data-tab-item[data-type="' + target_tab + '"] .account__table-body');
                        //console.log('order by priority', _list);
                        _list.find(".acount__table-accardeon").sort(function (a, b) {
                            const _a = parseInt($(a).attr('data-priority'));
                            const _b = parseInt($(b).attr('data-priority'));
                            //console.log(_a, _b);
                            return (_a > _b) ? -1 : (_a < _b) ? 1 : 0;
                        }).appendTo(_list);
                    });
                }
            );

            setTimeout(function () {
                if (only_tab === false) {
                    utils.restoreScroll();
                }
                //var _curr_tab      = $('.account__tab.data-tab-item.active');
                //var _curr_tab_item = $('.account__tab-items .account__tab-item.data-tab-link.active');
                //var _has_sort      = sessionStorage.getItem('state.order-by-' + _curr_tab_item.data('tab'));
                //console.log(_has_sort);
                //if (typeof _has_sort !== 'undefined' && !!_has_sort) {
                //	var order = _has_sort.split(':');
                //	console.log('.account__table-head .admin-events-item.orderby:eq(' + order[0] + ')');
                //	var col = _curr_tab.find('.account__table-head .admin-events-item.orderby:eq(' + order[0] + ')');
                //	console.log(col);
                //
                //	if (order[1] === '0') {
                //		col.addClass('selected');
                //	}
                //	col.trigger('click');
                //}
            }, 750);
        };

        function OrderBy(a, b, n) {
            if (n) return a - b;
            if (a < b) return -1;
            if (a > b) return 1;
            return 0;
        }

        $('body').on('click', '.account__tab-items .account__tab-item.data-tab-link', function (e, prevent_editor_reset) {
            var _type = $(this).data('type');
            var _tab = $(this).data('tab');
            var _curr_editor = sessionStorage["state.open-editor"];
            console.log('open:', _type);

            sessionStorage.setItem('state.tab-cabinet', _tab);
            autoupdate_stop();
            window.can_update = false;

            if (!prevent_editor_reset && !!_curr_editor) {
                sessionStorage.removeItem("state.open-editor");
                $('.accardeon[data-record="' + _curr_editor + '"]').removeClass('active');
                //$('.accardeon[data-record="' + _curr_editor + '"] .admin-editor__events').html('');
                //$('.accardeon[data-record="' + _curr_editor + '"] .admin-editor__top-select').html('');
                console.log('autoupdate activated...');
            }
            window.can_update = true;
            try {
                window.load(_type);
            } finally {
                autoupdate_start();
            }
        });

        $(document).on('click', '.account__table-head .admin-events-item.orderby', function () {
            var $th = $(this);
            var _curr_tab = $(this).parents('.account__tab.data-tab-item').data('tab');
            console.log('ordering tab: ' + _curr_tab);
            $th.toggleClass('selected');
            $th.siblings('.selected').removeClass('selected');
            var isSelected = $th.hasClass('selected');

            var isInput = true;
            var column = $th.index();
            var $table = $th.parents('.account__table');
            var isNum = false;
            var rows = $table.find('.account__table-body > .acount__table-accardeon').get();
            sessionStorage.setItem('state.order-by-' + _curr_tab, column + ':' + (isSelected ? '1' : '0'));

            rows.sort(function (rowA, rowB) {
                var keyA, keyB;
                if (isInput) {
                    keyA = $(rowA).find('.admin-events-item').eq(column).find('input.orderby').val().toUpperCase();
                    keyB = $(rowB).find('.admin-events-item').eq(column).find('input.orderby').val().toUpperCase();
                } else {
                    keyA = $(rowA).children('.admin-events-item').eq(column).text().toUpperCase();
                    keyB = $(rowB).children('.admin-events-item').eq(column).text().toUpperCase();
                }

                if (isSelected) {
                    return OrderBy(keyA, keyB, isNum);
                }

                return OrderBy(keyB, keyA, isNum);
            });
            $.each(rows, function (index, row) {
                $table.children('.account__table-body').append(row);
            });

            return false;
        }).on('click', 'button.flag-date__ico', function (e) {
            e.stopPropagation();
            const _parent = $(this).parents('.acount__table-accardeon');
            const _id = _parent.data('id');
            const _is_marked = $(this).hasClass('checked');
            utils.api.post('/api/v2/update/records/' + _id, {
                marked: !!_is_marked
            }).then(function (res) {
                //toast('Список обновлен');
            });
        })
            .on('change', '.flag-date [type="checkbox"]', function (e) {
                e.stopPropagation();
                const _list = $(this).parents('.account__table-body');
                const _parent = $(this).parents('.acount__table-accardeon');
                const _id = _parent.data('id');
                const _is_marked = $(this).is(':checked');
                const _priority = _is_marked ? Date.now() : 0;

                _parent.attr('data-priority', _priority);
                _list.find(".acount__table-accardeon").sort(function (a, b) {
                    const _a = parseInt($(a).attr('data-priority'));
                    const _b = parseInt($(b).attr('data-priority'));
                    return (_a > _b) ? -1 : (_a < _b) ? 1 : 0;
                }).appendTo(_list);

                utils.api.post('/api/v2/update/records/' + _id, {
                    priority: _priority
                })
                    .then(function (res) {
                        //toast('Список обновлен');
                    });
            });
        var active_tab = sessionStorage['state.tab-cabinet'] || 'quotes';
        if (!['quotes', 'events', 'past', 'longterms'].includes(active_tab)) {
            sessionStorage.removeItem('state.tab-cabinet');
            active_tab = 'quotes';
        }

        if (!!active_tab) {
            $('.account__tab-item[data-tab="' + active_tab + '"]').addClass('active');
            $('.account__tab[data-tab="' + active_tab + '"]').addClass('active');
        }
        window.can_update = true;
        load(false);
        utils.saveScroll();
        var autoupdateTimer = null;

        function autoupdate_stop() {
            if (autoupdateTimer) {
                clearTimeout(autoupdateTimer);
            }
        }

        function autoupdate_start(exec_immediately) {
            autoupdateTimer = setTimeout(function reload() {
                try {
                    if (window.can_update) {
                        catalog.reload_users();
                        window.load();
                    }
                } finally {
                    autoupdateTimer = setTimeout(reload, 10000);
                }
            }, exec_immediately ? 100 : 10000);
        }

        autoupdate_start();
    });
</script>

</html>