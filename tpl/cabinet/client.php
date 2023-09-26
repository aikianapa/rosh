<!DOCTYPE html>
<html class="no-js" lang="ru">

<head>
    <title seo>Личный кабинет</title>
    <link rel="icon" href="/favicon.svg" type="image/svg+xml">
</head>

<body class="body lk-cabinet" data-barba="wrapper">

<div class="scroll-container" data-scroll-container>
    <div>
        <wb-module wb="module=yonger&mode=render&view=header"></wb-module>
    </div>
    <main class="page {{_session.user.role}}" data-barba="container" data-barba-namespace="cabinet" wb-off>
        <div class="main-wrapper">
            <div class="container">
                <div class="account">
                    <div class="crumbs">
                        <a class="crumbs__arrow">
                            <svg class="svgsprite _crumbs-back">
                                <use xlink:href="/assets/img/sprites/svgsprites.svg#crumbs-back"></use>
                            </svg>
                        </a>
                        <a class="crumbs__link" href="/">Главная</a>
                        <span class="crumbs__link">Личный кабинет</span>
                    </div>
                    <div class="title-flex --flex --jcsb account-header align-items-center">
                        <div class="title">
                            <h1 class="mb-10 h1">Личный кабинет</h1>
                        </div>
                        <div id="select-childrens" class="col-md-3">
                            <template>
                                {{#if user.childrens}}
                                <div>
                                    <div class="select-form mb-0 w-100" data-hide="expert">
                                        <div class="select">
                                            <div class="select__main" data-parent="parent_id={{user.id}}">Выберите
                                                кабинет
                                            </div>
                                            <div class="select__list">
                                                <div class="select__item active" data-child-id="{{user.id}}"
                                                     on-click="select">Ваш
                                                </div>
                                                <wb-foreach wb="table=users" wb-filter="parent_id~={{user.id}}" wb-on>
                                                    <div class="select__item" data-child-id="{{_id}}" on-click="select">
                                                        {{fullname}}
                                                    </div>
                                                </wb-foreach>
                                            </div>
                                        </div>
                                    </div>
                                    {{#if user.warning}}
                                    <svg class="ml-10" xmlns="http://www.w3.org/2000/svg" height="1em"
                                         viewBox="0 0 512 512">
                                        <style>svg {
                                                fill: #fb0909
                                            }</style>
                                        <path d="M256 32c14.2 0 27.3 7.5 34.5 19.8l216 368c7.3 12.4 7.3 27.7 .2 40.1S486.3 480 472 480H40c-14.3 0-27.6-7.7-34.7-20.1s-7-27.8 .2-40.1l216-368C228.7 39.5 241.8 32 256 32zm0 128c-13.3 0-24 10.7-24 24V296c0 13.3 10.7 24 24 24s24-10.7 24-24V184c0-13.3-10.7-24-24-24zm32 224a32 32 0 1 0 -64 0 32 32 0 1 0 64 0z"/>
                                    </svg>
                                    {{/if}}
                                </div>
                                {{/if}}
                            </template>
                        </div>
                        <div class="--flex align-items-center" id="client-btns">
                            <template>
                                {{#if !user.parent_id}}
                                <button class="btn btn--black mr-20 --openpopup" data-popup="--children-create"
                                        onclick="popupCreateChildren()">
                                    Добавить ребёнка
                                </button>
                                {{/if}}
                                <button class="btn btn--black --openpopup" data-popup="--record"
                                        onclick="popupCreateClientQuote()">
                                    Записаться на прием
                                </button>
                            </template>
                        </div>
                    </div>
                    <div class="page-content">
                        <div class="loading-overlay">
                            <div class="loader"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

<script wbapp>

    (function () {
        window.btnCreateChildren = new Ractive({
                el: "#client-btns",
                template: document.querySelector("#client-btns template").innerHTML,
                data: {
                    user: wbapp.postSync("/ajax/getsess/").user
                },
                on: {}
            }
        )
    })()

    function calculateAge(birthdate) {
        const parts = birthdate.split('.');
        const day = parseInt(parts[0]);
        const month = parseInt(parts[1]) - 1;
        const year = parseInt(parts[2]);

        const givenDate = new Date(year, month, day);
        const currentDate = new Date();
        const timeDiff = currentDate - givenDate;
        const yearsDiff = Math.floor(timeDiff / (1000 * 60 * 60 * 24 * 365.25));

        return yearsDiff;
    }

    (function () {
        window.childrensSelect = new Ractive({
            el: '#select-childrens',
            template: document.querySelector('#select-childrens template').innerHTML,
            data: {
                user: wbapp.postSync("/ajax/getsess/").user,
            },
            on: {
                complete() {
                },
                select(ev) {
                    const userId = ev.node.dataset.childId;

                    utils.api.get('/api/v2/read/users/' + userId + '?active=on').then(function (data) {
                        Cabinet.updateProfile(userId, data, function (data) {
                            if (!!data.parent_id) {
                                const age = calculateAge(data.birthdate);
                                console.log(data.birthdate)

                                if (age >= 18) {
                                    data.adult = true

                                    toast("Пожалуйста обновите данные, для создания личного кабинета", "Важно", "error");
                                }
                            }

                            window.btnCreateChildren.set("user", data);
                            page.set('user', data);
                            wbapp._session.user = data;

                            window.loadRecords();
                            if (!!window.profile_inline_editor) {
                                window.profile_inline_editor.set('user', data);
                            }
                        });
                    });
                }
            }
        });
    })();
</script>

<!--!!! TEMPLATES !!!-->
<template id="page-content" wb-off>
    <div class="account__panel">
        <div class="account__info">
            <div class="user">
                <div class="user__name">
                    {{user.fullname}}
                    <button class="user__edit" on-click="toggleEdit">
                        <svg class="svgsprite _edit">
                            <use xlink:href="/assets/img/sprites/svgsprites.svg#edit"></use>
                        </svg>
                        <span class="mr-10 crumbs__link font-weight-normal d-sm-none">редактировать профиль</span>
                    </button>
                    {{#if user.adult}}
                    <svg class="ml-10" xmlns="http://www.w3.org/2000/svg" height="1em"
                         viewBox="0 0 512 512">
                        <style>svg {
                                fill: #fb0909
                            }</style>
                        <path d="M256 32c14.2 0 27.3 7.5 34.5 19.8l216 368c7.3 12.4 7.3 27.7 .2 40.1S486.3 480 472 480H40c-14.3 0-27.6-7.7-34.7-20.1s-7-27.8 .2-40.1l216-368C228.7 39.5 241.8 32 256 32zm0 128c-13.3 0-24 10.7-24 24V296c0 13.3 10.7 24 24 24s24-10.7 24-24V184c0-13.3-10.7-24-24-24zm32 224a32 32 0 1 0 -64 0 32 32 0 1 0 64 0z"/>
                    </svg>
                    {{/if}}
                </div>
                <div class="user__group">
                    <div class="user__birthday">
                        {{#if user.birthdate}}
                        Дата рождения:
                        <span>{{ @global.utils.formatDate(user.birthdate) }}</span>
                        {{else}}
                        {{/if}}
                    </div>
                    <div class="user__phone">Тел:
                        <span>{{ @global.utils.formatPhone(user.phone) }}</span>
                    </div>
                </div>
            </div>
        </div>
        <a class="account__exit signout" href="/signout">Выйти из аккаунта</a>
        <input class="admin-edit__upload" type="hidden" id="analyses-file">

        <div class="profile-editor-inline d-none">
            <!-- profileEditInline target -->
        </div>
    </div>

    {{#if events.current}}
    <div class="lk-title">Текущее событие</div>
    <div class="account-events current status-past">
        <!-- multiple: .account-events__block -->
        {{#each events.current}}
        <div class="account-events__block status-past" data-sort="{{this.event_timestamp}}">
            <div class="mb-20 account-events__block-wrap">
                <div class="account-events__item">
                    <div class="account-event-wrap">
                        <div class="account-events__name">Услуги:</div>
                        <div class="account-event">
                            {{#if consultation}}
                            {{ @global.catalog.spec_service.consultations[type][consultation].header }}<br>
                            {{/if}}
                            {{#services}}
                            {{catalog.services[this].header}}<br>
                            {{/services}}
                        </div>
                    </div>
                </div>
                <div class="account-events__item">
                    <div class="account-event-wrap">
                        <div class="account-events__name">Специалист:</div>
                        <div class="account-event">
                            {{#this.experts}}
                            <p>{{@global.catalog.experts[this].fullname}}</p>
                            {{/this.experts}}
                        </div>
                    </div>
                </div>
                <div class="account-events__item event_date">
                    <div class="account-event-wrap --jcsb">
                        <div class="account-events__name">Дата приема:</div>
                        <div class="account-event">
                            <p>{{ @global.utils.formatDate(this.event_date) }}</p>
                        </div>
                    </div>

                    <div class="account-event-wrap --jcsb">
                        <div class="account-events__name">Время приема:</div>
                        <div class="account-event">
                            <div class="text-right account-event">
                                <p>{{this.event_time_start}}-{{this.event_time_end}}<br>
                                    <small><u>по московскому времени</u></small>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{#if this.status == 'new'}}
            <!--nothing..-->
            {{elseif this.pay_status == 'unpay'}}
            <div class="account-events__btns">
                <div class="account-event-wrap --aicn">
                    <div class="account-events__btn">
                        <button class="btn btn--black"
                                onclick="popupPay('{{this.id}}','{{this.price}}','{{this.client}}','{{this.type}}','{{this.consultation_price}}', '{{user.email}}', '{{@global.utils.formatPhone(user.phone)}}', '{{@global.catalog.spec_service.consultations[type][consultation].header}}')">
                            Внести предоплату
                        </button>
                    </div>
                    <p>Услуга требует внесения предоплаты</p>
                </div>
            </div>
            {{elseif this.pay_status == 'prepay'}}
            <div class="account-events__btns">
                <div class="account-event-wrap --aicn">
                    <div class="account-events__btn">
                        <a class="btn btn--black" data-id="{{this.id}}" on-click="['runOnlineChat',this]">
                            Начать консультацию
                        </a>
                    </div>
                    <!-- TODO: add record.expert_waiting for detect online expert status -->
                    <p style="color:#333;">Консультация начнётся в {{this.event_time_start}} по <u>московскому
                            времени</u></p>
                </div>
            </div>
            {{/if}}

            {{#if this.analyses}}
            <div class="account-events__download">
                <div class="lk-title">Анализы</div>
                <a class="btn btn--white" href="{{this.analyses}}" target="_blank">Скачать анализы</a>
            </div>
            {{/if}}
        </div>
        {{/each}}
    </div>
    {{/if}}

    {{#if events.upcoming}}
    <div class="lk-title">Предстоящие события</div>
    <div class="account-events upcoming status-upcoming">
        {{#each events.upcoming}}
        <div class="account-events__block status-upcoming" data-sort="{{this.event_timestamp}}">
            <div class="mb-20 account-events__block-wrap">
                {{#if this.services}}
                <div class="account-events__item">
                    <div class="account-event-wrap">
                        <div class="account-events__name">Услуги:</div>
                        <div class="account-event">
                            {{#if consultation}}
                            {{ @global.catalog.spec_service.consultations[type][consultation].header }}<br>
                            {{/if}}
                            {{#services}}
                            {{@global.catalog.services[this].header}}<br>
                            {{/services}}
                        </div>
                    </div>
                </div>
                {{elseif this.consultation}}
                <div class="account-events__item">
                    <div class="account-event-wrap">
                        <div class="account-events__name">Услуги:</div>
                        <div class="account-event">
                            {{#if consultation}}
                            {{ @global.catalog.spec_service.consultations[type][consultation].header }}<br>
                            {{/if}}
                        </div>
                    </div>
                </div>
                {{elseif this.group == 'events'}}
                <div class="account-events__item">
                    <div class="account-event-wrap">
                        <div class="account-events__name">Услуги:</div>
                        <div class="account-event">
                            {{#if consultation}}
                            {{ @global.catalog.spec_service.consultations[type][consultation].header }}<br>
                            {{/if}}
                            {{#services}}
                            {{@global.catalog.services[this].header}}<br>
                            {{/services}}
                        </div>
                    </div>
                </div>
                {{elseif this.client_comment}}
                <div class="account-events__item wide">
                    <div class="account-event-wrap">
                        <div class="account-events__name">Причина обращения:</div>
                        <div class="account-event">
                            {{{@global.nl2br(@global.fix_comment(.client_comment))}}}
                        </div>
                    </div>
                </div>
                {{else}}
                <div class="account-events__item">
                    <div class="account-event-wrap">
                        <div class="account-events__name">&nbsp;</div>
                        <div class="account-event">&nbsp;</div>
                    </div>
                </div>
                {{/if}}

                {{#if this.experts}}
                <div class="account-events__item">
                    <div class="account-event-wrap">
                        <div class="account-events__name">Специалист:</div>
                        <div class="account-event">
                            {{#experts}}
                            <p>{{@global.catalog.experts[this].fullname}}</p>
                            {{/experts}}
                        </div>
                    </div>
                </div>
                {{else}}
                <div class="account-events__item">
                    <div class="account-event-wrap">
                        <div class="account-events__name">&nbsp;</div>
                        <div class="account-event">&nbsp;</div>
                    </div>
                </div>
                {{/if}}


                {{#if this.status == 'new'}}
                <div class="account-events__item event_date">
                    <div class="account-event-wrap --jcsb">
                        <div class="account-events__name" style="color:#393">Заявка на рассмотрении</div>
                    </div>
                </div>
                {{elseif this.status == 'uncall'}}
                <div class="account-events__item event_date">
                    <div class="account-event-wrap --jcsb">
                        <div class="account-events__name" style="color:#f57c00">Вам не дозвонились</div>
                    </div>
                </div>
                {{elseif this.status == 'delay'}}
                <div class="account-events__item event_date">
                    <div class="account-event-wrap --jcsb">
                        <div class="account-events__name" style="color:#f57c00">Вы попросили перезвонить</div>
                    </div>
                </div>
                {{elseif this.status == 'upcoming'}}
                <div class="account-events__item event_date">
                    <div class="account-event-wrap --jcsb">
                        <div class="account-events__name">Дата приема:</div>
                        <div class="account-event">
                            <p>{{ @global.utils.formatDate(this.event_date) }}</p>
                        </div>
                    </div>
                    <div class="account-event-wrap --jcsb">
                        <div class="account-events__name">Время приема:</div>
                        <div class="text-right account-event">
                            <p>{{this.event_time_start}}-{{this.event_time_end}}<br><small><u>по московскому времени</u></small>
                            </p>
                        </div>
                    </div>
                </div>
                {{/if}}
                {{#if this.status == 'new'}}
                {{elseif this.status == 'delay'}}
                {{elseif this.status == 'uncall'}}
                <!--nothing..-->
                {{elseif this.pay_status == 'unpay'}}
                <div class="account-events__btns">
                    <div class="account-event-wrap --aicn">
                        <div class="account-events__btn">
                            <button class="btn btn--black"
                                    onclick="popupPay('{{this.id}}','{{this.price}}','{{this.client}}','{{this.type}}','{{this.consultation_price}}','{{user.email}}', '{{@global.utils.formatPhone(user.phone)}}', '{{@global.catalog.spec_service.consultations[type][consultation].header}}')">
                                Внести предоплату
                            </button>
                        </div>
                        <p>Услуга требует внесения предоплаты</p>
                    </div>
                </div>
                {{elseif this.type == 'online'}}
                <div class="account-events__btns">
                    <div class="account-event-wrap --aicn">
                        <div class="account-events__btn">
                            <button class="btn btn--white disabled" disabled>
                                Онлайн консультация
                            </button>
                        </div>
                        <p>Кнопка станет активной за 5 минут до начала приема</p>
                    </div>
                </div>
                {{/if}}
            </div>

            {{#if this.analyses}}
            <div class="account-events__download">
                <div class="lk-title">Анализы</div>
                <a class="btn btn--white" href="{{this.analyses}}" target="_blank">
                    Скачать анализы
                </a>
            </div>
            {{/if}}
        </div>
        {{/each}}
    </div>
    {{/if}}
    <!-- !!! quote history tab !!! -->
    <div class="account__history data-tab-wrapper" data-tabs="history">
        <div class="account__tab-items">
            <div class="account__tab-item data-tab-link active" data-tabs="history" data-tab="visits">
                История посещений
            </div>
            <div class="account__tab-item data-tab-link" data-tabs="history" data-tab="longterm">
                Продолжительное лечение
            </div>
            <div class="account__tab-item data-tab-link d-none" data-tabs="history" data-tab="history">
                История покупок
            </div>
        </div>
        <div class="account__tab data-tab-item active" data-tab="visits">
            <div class="account__table">
                <div class="account__table-head status-cancel_noreason">
                    <div class="history-item">Дата</div>
                    <div class="history-item">Время</div>
                    <div class="history-item">Специалисты</div>
                    <div class="history-item">Услуги</div>
                    <div class="history-item">Анализы</div>
                </div>
                <div class="account__table-body">
                    <!-- !!! quote history item !!! -->
                    {{#each history.events as event}}
                    <div class="acount__table-accardeon accardeon status-cancel_noreason"
                    "
                    data-accardeon=" {{event.id}}" data-idx="{{@index}}">
                    <div class="acount__table-main accardeon__main accardeon__click">
                        <div class="history-item">
                            <p>Дата</p>
                            {{ @global.utils.formatDate(this.event_date) }}
                        </div>
                        <div class="history-item">
                            <p>Время</p>{{this.event_time_start}}-{{this.event_time_end}}
                        </div>
                        <div class="history-item">
                            <p>Специалисты</p>
                            {{#each experts}}
                            {{@global.catalog.experts[this].fullname}}<br>
                            {{/each}}
                        </div>
                        <div class="history-item">
                            <p>Услуги</p>
                            {{#services}}
                            {{catalog.services[this].header}}<br>
                            {{/services}}
                            {{#if consultation}}
                            {{ @global.catalog.spec_service.consultations[type][consultation].header }}<br>
                            {{/if}}
                        </div>
                        <div class="history-item">
                            <p>Анализы</p>
                            {{#if this.analyses}}
                            Есть анализы
                            {{else}}
                            Нет анализов
                            {{/if}}
                        </div>
                    </div>
                    <div class="acount__table-list accardeon__list">
                        <div class="pt-20 mb-40 analysis" style="max-width: 100%">
                            <div class="row">
                                <div class="col-md-4">
                                    {{#if this.analyses}}
                                    <div class="analysis__top --aicn --flex mb-50">
                                        <div class="analysis__title">Анализы</div>
                                        <a class="btn btn--white" href="{{this.analyses}}" target="_blank">
                                            Скачать анализы
                                        </a>
                                    </div>
                                    {{/if}}
                                    <div class="analysis__description pt-30">
                                        <p class="text-bold mb-30">Выполнялись процедуры</p>
                                        <ul class="text-left text-grey">
                                            {{#each this.service_prices as service_price: i, path}}
                                            <li class="text-left service_price">{{service_price.name}}</li>
                                            {{/each}}
                                            {{#if consultation}}
                                            <li class="text-left service_price">{{
                                                @global.catalog.spec_service.consultations[this.type][this.consultation].header
                                                }}
                                            </li>
                                            {{/if}}
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    {{#if this.analyses}}
                                    <a class="btn btn--black mb-50 --openpopup" data-popup="--analize-type"
                                       onclick="popupAnalizeInterpretation('{{user.id}}', '{{this.id}}', '{{this.analyses}}')">
                                        Получить расшифровку анализов
                                    </a>
                                    {{/if}}
                                    <div class="analysis__description pt-30">
                                        <p class="mb-20 text-bold">Рекомендация врача</p>
                                        <div class="text">
                                            {{#this.recommendation}}
                                            {{{@global.nl2br(this.recommendation)}}}
                                            {{/this.recommendation}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="pt-20 mt-20 experts__worked">
                            <div class="experts__worked-title">С вами работали</div>
                            <div class="row">
                                {{#each .experts}}
                                <div class="col-md-6">
                                    <a class="expert__worked" target="_blank" title="Открыть страницу о специалисте"
                                       href="{{@global.catalog.experts[this].page_uri}}"
                                       data-link="{{@global.catalog.experts[this].page_uri}}">
                                        <div class="expert__worked-pic">
                                            <img class="lazyload"
                                                 data-src="{{{@global.catalog.experts[this].image[0].img}}}"
                                                 alt="{{@global.catalog.experts[this].fullname}}">
                                        </div>
                                        <div class="expert__worked-name">
                                            {{@global.catalog.experts[this].fullname}}
                                        </div>
                                        <div class="expert__worked-work">
                                            {{@global.catalog.experts[this].spec}}
                                        </div>
                                    </a>
                                </div>
                                {{/each}}
                            </div>
                        </div>

                        {{#if this.hasPhoto}}
                        <div class="mt-20 acount__photos bg-inherit">
                            <div class="row">
                                <div class="col-md-5">
                                    <p>Фото до приема</p>
                                    {{#each photos.before}}
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="acount__photo">
                                                <a class="before-healing__item photo" data-fancybox="event-{{event.id}}"
                                                   href="{{.src}}" data-caption="Фото до приема,
															{{ @global.utils.formatDate(.date) }}">
                                                    <div class="healing__date">
                                                        {{ @global.utils.formatDate(.date) }}
                                                    </div>
                                                    <div class="after-healing__photo"
                                                         style="background-image: url('{{.src}}')">
                                                    </div>
                                                </a>

                                            </div>
                                        </div>
                                    </div>
                                    {{else}}

                                    {{/each}}
                                </div>
                                <div class="col-md-7">
                                    <p>Фото после приема</p>
                                    {{#each photos.after}}
                                    <div class="row">
                                        <div class="mt-1 col-md-6">
                                            <div class="acount__photo">
                                                <a class="after-healing__item photo" data-fancybox="event-{{event.id}}"
                                                   href="{{.src}}" data-caption="Фото после приема,
															{{ @global.utils.formatDate(.date) }}">
                                                    <div class="healing__date">{{ @global.utils.formatDate(.date) }}
                                                    </div>
                                                    <div class="after-healing__photo"
                                                         style="background-image: url('{{.src}}')">
                                                    </div>
                                                </a>

                                            </div>
                                        </div>
                                    </div>
                                    {{else}}

                                    {{/each}}
                                </div>
                            </div>
                        </div>
                        {{/if}}
                    </div>
                </div>
                {{elseif events_ready}}
                <div class="acount__table-accardeon accardeon">
                    <div class="acount__table-main accardeon__main">
                        Нет записей о посещении
                    </div>
                </div>
                {{else}}
                <div class="acount__table-accardeon accardeon">

                </div>
                {{/each}}
                <!-- !!! / quote history item !!! -->
            </div>
        </div>
    </div>
    <div class="account__tab data-tab-item" data-tab="longterm">
        <div class="account__table">
            <div class="account__table-head status-cancel_noreason">
                <div class="healing-item">Дата</div>
                <div class="healing-item">Услуги</div>
            </div>
            <div class="account__table-body">
                {{#each history.longterms as event}}
                <!-- !!! longterm item !!! -->
                <div class="acount__table-accardeon accardeon status-cancel_noreason" data-idx="{{@index}}">
                    <div class="acount__table-main accardeon__main accardeon__click">
                        <div class="healing-item">
                            <p>Дата</p>
                            {{ @global.utils.formatDate(this.event_date) }} - {{
                            @global.utils.formatDate(this.longterm_date_end) }}
                        </div>
                        <div class="healing-item">
                            <p>Услуги</p> {{this.longterm_title}}
                        </div>
                    </div>
                    <div class="acount__table-list accardeon__list">
                        {{#if this.hasPhoto}}
                        <div class="row">
                            <div class="col-md-5">
                                <div class="mb-20 text-bold text-big">
                                    Фото до начала лечения
                                </div>
                                {{#each this.photos.before}} <!--single photo!-->
                                <a class="before-healing photo" data-fancybox="images-{{event.id}}" href="{{.src}}"
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
                                        {{#each this.photos.after}}
                                        <div class="col-md-6">
                                            <a class="after-healing__item photo" data-fancybox="images-{{event.id}}"
                                               href="{{.src}}"
                                               data-caption="Фото после начала лечения, {{ @global.utils.formatDate(.date) }}">
                                                <h2 class="h2 healing__date-title">
                                                    {{ @global.utils.formatDateAdv(.date) }}
                                                </h2>
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
                    </div>
                </div>
                {{elseif longterms_ready}}
                <div class="acount__table-accardeon accardeon">
                    <div class="acount__table-main accardeon__main">
                        Нет записей о продолжительном лечении
                    </div>
                </div>
                {{else}}
                <div class="acount__table-accardeon accardeon">

                </div>
                {{/each}}
            </div>
        </div>
    </div>
    <div class="account__tab data-tab-item purchases d-none" data-tab="history">
        <div class="account__table account__table-second">
            <div class="account__table-head">
                <div class="healing-item">Дата</div>
                <div class="healing-item">Наименование</div>
                <div class="healing-item">Кол-во</div>
                <div class="healing-item">Цена</div>
                <div class="healing-item">Способ доставки</div>
                <div class="healing-item">Статус</div>
            </div>
            <div class="account__table-body">
                <div class="acount__table-accardeon accardeon purchases-wrap">
                    <div class="purchases-wrap-row">
                        Нет записей об истории покупок
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <div class="modal__img">
        <svg class="modal__img-close" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512">
            <path d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"/>
        </svg>
        <img class="modal__img-img" src="" alt="">
    </div>
</template>

<script>
    $(document).ready(() => {
        if (window.innerWidth <= 600) {
            const searchInterval = setInterval(function () {
                console.log("search")

                const elementsWithDataFancybox = [...$('[data-fancybox]')];
                if (elementsWithDataFancybox.length > 0) {
                    // Элемент найден, выполните ваш код здесь
                    clearInterval(searchInterval); // Остановить цикл

                    elementsWithDataFancybox.forEach(item => {
                        item.addEventListener("click", function (e) {
                            e.preventDefault();

                            $(".modal__img")[0].classList.add("active");
                            $(".modal__img-img")[0].src = this.href;
                        })
                    })
                }
            }, 100);
        }


        const searchIntervalModal = setInterval(function () {
            const modal = $('.modal__img');
            if (modal.length > 0) {
                // Элемент найден, выполните ваш код здесь
                clearInterval(searchIntervalModal); // Остановить цикл

                modal.on("click", function (e) {
                    const target = e.target;

                    if (target.className === "modal__img-img") return;

                    $(this).removeClass("active");
                })
            }
        }, 100);
    })
</script>

<template id="profile-editor-inline" wb-off>
    <form on-submit="submit">
        <p class="text-bold mb-30 align-items-center" style="display:flex;">
            Редактировать профиль
            {{#if user.parent_id}}
            <svg class="ml-10" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512">
                <path d="M152 88a72 72 0 1 1 144 0A72 72 0 1 1 152 88zM39.7 144.5c13-17.9 38-21.8 55.9-8.8L131.8 162c26.8 19.5 59.1 30 92.2 30s65.4-10.5 92.2-30l36.2-26.4c17.9-13 42.9-9 55.9 8.8s9 42.9-8.8 55.9l-36.2 26.4c-13.6 9.9-28.1 18.2-43.3 25V288H128V251.7c-15.2-6.7-29.7-15.1-43.3-25L48.5 200.3c-17.9-13-21.8-38-8.8-55.9zm89.8 184.8l60.6 53-26 37.2 24.3 24.3c15.6 15.6 15.6 40.9 0 56.6s-40.9 15.6-56.6 0l-48-48C70 438.6 68.1 417 79.2 401.1l50.2-71.8zm128.5 53l60.6-53 50.2 71.8c11.1 15.9 9.2 37.5-4.5 51.2l-48 48c-15.6 15.6-40.9 15.6-56.6 0s-15.6-40.9 0-56.6L284 419.4l-26-37.2z"/>
            </svg>
            {{/if}}
        </p>
        {{#if !user.parent_id}}
        <div class="row profile-edit__wrap">
            <div class="col-md-9">
                <div class="input input--grey">
                    <input class="input__control" name="fullname" required value="{{ user.fullname }}" type="text"
                           placeholder="ФИО">
                    <div class="input__placeholder input__placeholder--dark">ФИО</div>
                </div>
            </div>
        </div>
        <div class="row profile-edit__wrap" data-child="false">
            <div class="col-md-3">
                <div class="input input--grey">
                    <input class="input__control datebirthdaypickr" name="birthdate" value="{{user.birthdate}}"
                           type="text"
                           required placeholder="Дата рождения" twoway="false">
                    <div class="input__placeholder input__placeholder--dark">Дата рождения</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="input input--grey">
                    <input class="input__control intl-tel" type="tel" name="phone" required value="{{user.phone}}">
                    <div class="input__placeholder input__placeholder--dark active">Телефон</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="input input--grey">
                    <input class="input__control" type="email" name="email" value="{{user.email}}" placeholder="E-mail"
                           required>
                    <div class="input__placeholder input__placeholder--dark">E-mail</div>
                </div>
            </div>
            <div class="col-md-2">
                <button class="btn btn--white profile-edit__submit">Сохранить</button>
            </div>
        </div>
        <p class="text-bold mb-30 delivery-address" data-child="false">Адрес доставки</p>
        <div class="row profile-edit__wrap" data-child="false">
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-3">
                        <div class="input input--grey">
                            <input class="input__control" type="text" name="country" value="{{user.country}}"
                                   placeholder="Страна">
                            <div class="input__placeholder input__placeholder--dark">Страна</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="input input--grey">
                            <input class="input__control" type="text" name="city" value="{{user.city}}"
                                   placeholder="Город">
                            <div class="input__placeholder input__placeholder--dark">Город</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input input--grey">
                            <input class="input__control" type="text" name="street" value="{{user.street}}"
                                   placeholder="Улица">
                            <div class="input__placeholder input__placeholder--dark">Улица
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="input input--grey">
                            <input class="input__control" type="text" name="build" value="{{user.build}}"
                                   placeholder="Дом">
                            <div class="input__placeholder input__placeholder--dark">Дом</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row profile-edit__wrap" data-child="false">
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-3">
                        <div class="input input--grey">
                            <input class="input__control" type="text" name="flat" placeholder="Кв./офис"
                                   value="{{user.flat}}">
                            <div class="input__placeholder input__placeholder--dark">Кв./офис</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="input input--grey">
                            <input class="input__control" type="text" name="intercom" placeholder="Домофон"
                                   value="{{user.intercom}}">
                            <div class="input__placeholder input__placeholder--dark">Домофон</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="input input--grey">
                            <input class="input__control" type="text" name="entrance" placeholder="Подъезд"
                                   value="{{user.entrance}}">
                            <div class="input__placeholder input__placeholder--dark">Подъезд</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="input input--grey">
                            <input class="input__control" type="text" name="level" placeholder="Этаж"
                                   value="{{user.level}}">
                            <div class="input__placeholder input__placeholder--dark">Этаж</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2" data-child="false">
                <button class="btn btn--white profile-edit__submit">Сохранить</button>
            </div>
        </div>
        {{/if}}
        {{#if user.parent_id}}
        <div class="row profile-edit__wrap">
            <div class="col-md-9">
                <div class="input input--grey">
                    <input class="input__control" name="fullname" required value="{{ user.fullname }}" type="text"
                           placeholder="ФИО">
                    <div class="input__placeholder input__placeholder--dark">ФИО</div>
                </div>
            </div>
        </div>
        <div class="row profile-edit__wrap">
            <div class="col-md-3">
                <div class="input input--grey">
                    <input class="input__control datebirthdaypickr" name="birthdate" value="{{user.birthdate}}"
                           type="text"
                           required placeholder="Дата рождения" twoway="false">
                    <div class="input__placeholder input__placeholder--dark">Дата рождения</div>
                </div>
            </div>
            {{#if user.adult}}
            <div class="col-md-3">
                <div class="input input--grey">
                    <input class="input__control intl-tel" type="tel" name="phone" required value="{{user.phone}}">
                    <div class="input__placeholder input__placeholder--dark active">Телефон</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="input input--grey">
                    <input class="input__control" type="email" name="email" value="{{user.email}}" placeholder="E-mail"
                           required>
                    <div class="input__placeholder input__placeholder--dark">E-mail</div>
                </div>
            </div>
            {{/if}}
            <div class="col-md-2">
                <button class="btn btn--white profile-edit__submit">Сохранить</button>
            </div>
        </div>
        {{/if}}
    </form>
    {{#if !user.parent_id}}
    <form class="mt-20 popup__form" on-submit="changePasswordInline" wb-if="{{!user.childrens}}">
        {{#user}}
        <p class="text-bold mb-30">Смена пароля</p>
        <input type="hidden" name="id" value="{{user.id}}">
        <div class="row profile-edit__wrap">
            <div class="col-md-3">
                <div class="input">
                    <input class="input__control" type="password" required placeholder="Текущий пароль"
                           name="old_password">
                    <div class="input__placeholder">Текущий пароль</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="input">
                    <input class="input__control" required type="password" placeholder="Новый пароль"
                           name="new_password">
                    <div class="input__placeholder">Новый пароль</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="input mb-30">
                    <input class="input__control" type="password" required placeholder="Повторите пароль"
                           name="new_password_repeat" autocomplete="off">
                    <div class="input__placeholder">Повторите пароль</div>
                </div>

            </div>
            <div class="col-md-2">
                <button class="btn btn--white profile-edit__submit">Сохранить</button>
            </div>
        </div>
        {{/user}}
    </form>
    {{/if}}
</template>

<script>
    $(document).on('cabinet-db-ready', function () {
        window.changePassword = function () {
            var editor = window.popupChangePassword();
        };
        window.page = new Ractive({
            el: 'main.page .page-content',
            template: wbapp.tpl('#page-content').html,
            data: {
                user: wbapp._session.user,
                events: {
                    'upcoming': [],
                    'current': []
                },
                history: {
                    'events': [],
                    'longterms': [],
                    'orders': []
                }
            },
            on: {
                init() {
                },
                complete() {
                    console.log("!!!!!COMPLETE")
                    var self = this;
                    setTimeout(function () {
                        $(self.el).find("img[data-src]:not([src])").lazyload();
                        self.set('catalog', window.catalog);
                        utils.api.get('/api/v2/read/users/' + wbapp._session.user.id + '?active=on')
                            .then(function (data) {
                                data.phone = data.phone.includes('+') ? data.phone : '+' + data.phone;
                                data.fullname = data.fullname.replaceAll('  ', ' ');
                                page.set('user', data);
                                console.log(data);
                            });
                    }, 200);

                    const childrensId = wbapp._session.user.childrens;

                    if (childrensId.length <= 0) return;

                    childrensId.forEach((id) => utils.api.get(`/api/v2/read/users/${id}`).then((data) => {
                            const age = calculateAge(data.birthdate)

                            if (age < 18) return;

                            toast("Пожалуйста обновите данные " + data.fullname + ", для создания личного кабинета", "Важно", "error");

                            window.childrensSelect.set('user.warning', true)
                        })
                    )
                },
                runOnlineChat(ev, record) {
                    console.log("!!!runOnlineChat")
                    Cabinet.runOnlineChat(record?.meetroom?.roomName);
                },
                toggleEdit(ev) {
                    if (!!window.profile_inline_editor) {
                        $('.profile-editor-inline').toggleClass('d-none');
                        return;
                    }
                    window.profile_inline_editor = new Ractive({
                        el: '.profile-editor-inline',
                        template: wbapp.tpl('#profile-editor-inline').html,
                        data: {
                            user: page.get('user')
                        },
                        on: {
                            complete(ev) {
                                $('.profile-editor-inline').removeClass('d-none');
                                initPlugins($(this.el));
                            },
                            changePasswordInline(ev) {
                                var self = this;
                                var $form = $(ev.node);
                                if ($form.verify()) {
                                    var data = $form.serializeJSON();
                                    wbapp.loading();

                                    $.ajax({
                                        url: '/form/users/change_password',
                                        method: 'POST',
                                        data: {
                                            old_password: data.old_password,
                                            new_password: data.new_password,
                                            new_password_repeat: data.new_password_repeat
                                        },
                                        complete: function () {
                                            wbapp.unloading();
                                        },
                                        success: function (data) {
                                            wbapp.unloading();
                                            if (data.error) {
                                                toast_error(data.msg);
                                            } else {
                                                $(self.el).hide();
                                                //$('body').removeClass('noscroll');
                                                toast_success('Пароль успешно изменен!');
                                            }
                                        }
                                    });
                                }
                                return false;
                            },
                            submit(ev) {
                                let $form = $(ev.node);
                                let uid = page.get('user.id');
                                if ($form.verify() && uid > '') {
                                    let data = $form.serializeJSON();
                                    data.phone = str_replace([' ', '-', '(', ')'], '', data.phone);

                                    if (!!data.email && !!data.phone) {
                                        const parent_id = page.get("user.parent_id");
                                        data.parent_id = '';
                                        window.childrensSelect.set('user.warning', false);

                                        Cabinet.updateProfile(uid, data, function (data) {
                                            utils.api.get("/api/v2/read/users/" + parent_id).then((data) => {
                                                data.childrens = data.childrens.filter(function(child){
                                                    return child !== page.get("user.id")
                                                });

                                                Cabinet.updateProfile(page.get('user.parent_id'), data, function (data) {
                                                    wbapp._session.user = data;
                                                    page.set('user', data);
                                                    toast('Профиль успешно обновлён');
                                                })
                                            })
                                        });
                                        return;
                                    }

                                    Cabinet.updateProfile(uid, data, function (data) {
                                        data.birthdate_fmt = utils.formatDate(data.birthdate);

                                        page.set('user', data); /* get actually user data */
                                        toast('Профиль успешно обновлён');
                                    });
                                }
                                return false;
                            }
                        }
                    });
                },

                prepay(ev) {
                    popupPay.showPopup($(ev.node).data('record'));
                }
            }
        });
        window.sort_events = function () {
            $(".account-events.upcoming .account-events__block")
                .sort((a, b) => $(a).data("sort") - $(b).data("sort"))
                .appendTo(".account-events.upcoming");
            $(".account-events.current .account-events__block")
                .sort((a, b) => $(a).data("sort") - $(b).data("sort"))
                .appendTo(".account-events.current");
        };
        var current_day_events_checker = null;
        window.loadRecords = function () {
            if (!!current_day_events_checker) {
                clearTimeout(current_day_events_checker);
            }
            Promise.allSettled([
                utils.api.get('/api/v2/list/records?status=[upcoming,new,past,delay,uncall]&client=' +
                    wbapp._session.user.id + '&@sort=_lastdate:d')
                    .then(function (records) {
                        if (!!current_day_events_checker) {
                            clearTimeout(current_day_events_checker);
                        }
                        //console.log('records:', records);
                        let events = {
                                'upcoming': [],
                                'current': []
                            },
                            history_events = [];
                        if (!!records) {
                            records.forEach(function (rec, idx) {
                                if (rec.status === 'past') {
                                    history_events.push(rec);
                                    return;
                                }
                                if (rec.status === 'new' || rec.status === 'uncall' || rec.status === 'delay') {
                                    rec['event_timestamp'] = utils.timestamp(new Date('2029-12-12'));
                                    events.upcoming.push(rec);
                                    return;
                                }
                                if (rec.status !== 'upcoming') {
                                    return;
                                }

                                rec['event_timestamp'] = Cabinet.eventTimestamp(rec);

                                if (Cabinet.isCurrentEvent(rec)) {
                                    events.current.push(rec);
                                } else {
                                    events.upcoming.push(rec);
                                }
                            });

                            window.sort_events();
                        }
                        page.set('events', events);
                        page.set('history.events', history_events);
                        page.set('events_ready', true);
                        $("img[data-src]:not([src])").lazyload();
                    }),
                utils.api.get('/api/v2/list/records?group=longterms&client=' + wbapp._session.user.id)
                    .then(function (records) {
                        if (!!records) {
                            page.set('history.longterms', records);
                        } else {
                            page.set('history.longterms', []);
                        }
                        page.set('longterms_ready', true);
                    })
            ]).then(function () {
                utils.restoreScroll();
                if (sessionStorage['state-accardeon']) {
                    setTimeout(function () {
                        $('.acount__table-accardeon.accardeon[data-accardeon="' + sessionStorage['state-accardeon'] + '"]:not(.active) .accardeon__click').trigger('click');
                    });
                }
                current_day_events_checker = setTimeout(loadRecords, 10000);
                //console.log('Records loaded!');
            })
        };

        loadRecords();

        //utils.api.get('/api/v2/list/records?group=longterms&client=' + wbapp._session.user.id)
        //	.then(function (records) {
        //		if (!!records) {
        //			page.set('history.orders', records);
        //		}
        //		page.set('orders_ready', true);
        //	});

        utils.saveScroll();
    });
</script>

<div>
    <wb-module wb="module=yonger&mode=render&view=mainfilter"/>
</div>
<div>
    <wb-module wb="module=yonger&mode=render&view=footer"/>
</div>

</body>
<wb-jq wb="$dom->find('script:not([src]):not([type])')->attr('type','wbapp');"/>
<wb-jq wb="$dom->find('.content-wrap ul')->addClass('ul-line');"/>

</html>
