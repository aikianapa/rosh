<view>
    <div class="account admin">
        <form class="search">
            <div class="container">
                <div class="search__block --flex --jcsb">
                    <div class="input">
                        <input class="search__input" type="text" placeholder="Поиск">
                    </div>
                    <button class="btn btn--white mr-20 mb-10">Найти</button>
                    <a class="btn btn--black --openpopup" href="#" data-popup="--create">Создать карточку пациента</a>
                </div>
            </div>
        </form>
        <div class="container data-tab-wrapper" data-tabs="lk-leads">
            <div class="account__tab-items">
                <div class="account__tab-item data-tab-link active" data-tab="leads" data-tabs="lk-leads">Заявки</div>
                <div class="account__tab-item data-tab-link" data-tab="events" data-tabs="lk-leads">События</div>
                <div class="buttons">
                    <label class="checkbox">
                        <input type="checkbox"><span> </span>
                    </label>
                    <button class="flag-date__ico">
                        <svg class="svgsprite _flag">
                            <use xlink:href="/assets/img/sprites/svgsprites.svg#flag"></use>
                        </svg>
                    </button>
                </div>
            </div>
            <template id="editProfile">
                <form class="profile-edit">
                    <input type="hidden" value="{{ id }}">
                    <p class="text-bold mb-30">Редактировать профиль</p>
                    <div class="row profile-edit__wrap">
                        <div class="col-md-3">
                            <div class="input input--grey">
                                <input class="input__control datebirthdaypickr" name="birthdate" value="{{ birthdate }}" type="text" placeholder="Дата рождения">
                                <div class="input__placeholder input__placeholder--dark">Дата рождения</div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="input input--grey">
                                <input class="input__control" type="tel" name="phone" value="+{{ phone }}" placeholder="Телефон" data-inputmask="'mask': '+7 (999) 999-99-99'">
                                <div class="input__placeholder input__placeholder--dark">Телефон</div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="input input--grey">
                                <input class="input__control" type="email" name="email" value="{{ email }}" placeholder="E-mail">
                                <div class="input__placeholder input__placeholder--dark">E-mail</div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn--white profile-edit__submit" type="button" on-click="save">Сохранить</button>
                        </div>
                    </div>
                    <p class="text-bold mb-30 delivery-address">Адрес доставки</p>
                    <div class="row profile-edit__wrap">
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="input input--grey">
                                        <input class="input__control" type="text" name="country" value="{{ country }}" placeholder="Страна">
                                        <div class="input__placeholder input__placeholder--dark">Страна</div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input input--grey">
                                        <input class="input__control" type="text" name="city" value="{{ city }}" placeholder="Город">
                                        <div class="input__placeholder input__placeholder--dark">Город</div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input input--grey">
                                        <input class="input__control" type="text" name="address" value="{{ address }}" placeholder="Улица и дом">
                                        <div class="input__placeholder input__placeholder--dark">Улица и дом</div>
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
                                        <input class="input__control" type="text" name="flat" value="{{ flat }}" placeholder="Кв./офис">
                                        <div class="input__placeholder input__placeholder--dark">Кв./офис</div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="input input--grey">
                                        <input class="input__control" type="text" name="intercom" value="{{ intercom }}" placeholder="Домофон">
                                        <div class="input__placeholder input__placeholder--dark">Домофон</div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="input input--grey">
                                        <input class="input__control" type="text" name="entrance" value="{{ entrance }}" placeholder="Подъезд">
                                        <div class="input__placeholder input__placeholder--dark">Подъезд</div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="input input--grey">
                                        <input class="input__control" type="text" name="level" value="{{ level }}" placeholder="Этаж">
                                        <div class="input__placeholder input__placeholder--dark">Этаж</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn--white profile-edit__submit" type="button" on-click="save">Сохранить</button>
                        </div>
                    </div>
                </form>
            </template>
            <template id="editStatus">
                <div class="select-form">
                    <div class="select pay">
                        <div class="select__main">Статус оплаты</div>
                        <div class="select__list">
                        <input type="hidden" name="payment" value="{{ payment }}">
                        {{#each catalog.quotePay}}
                            <div class="select__item" data-id="{{ id }}" 
                                onclick="$(this).parent('.select__list').children('input').val($(this).attr('data-id'))">
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
                            <input type="hidden" name="status" value="{{ status }}">
                            {{#each catalog.quoteStatus}}
                                {{#if id == 'delimiter'}}
                                    <div class="select__delimiter" disabled></div>
                                {{else}}
                                    <div class="select__item select__item--acc-{{color}}" data-id="{{ id }}"
                                        onclick="$(this).parent('.select__list').children('input').val($(this).attr('data-id'))">
                                        {{name}}
                                    </div>
                                {{/if}}
                            {{/each}}
                        </div>
                    </div>
                </div>
            </template>
            <div class="account__tab data-tab-item active" data-tab="leads">
                <template id="leadsList">
                    <div class="account-scroll">
                        <div class="account__table">
                            <div class="account__table-head">
                                <div class="admin-events-item">
                                    <button class="flag-date__ico">
                                        <svg class="svgsprite _flag">
                                            <use xlink:href="/assets/img/sprites/svgsprites.svg#flag"></use>
                                        </svg>
                                    </button><span>Заявка</span>
                                </div>
                                <div class="admin-events-item">Приём</div>
                                <div class="admin-events-item">ФИО</div>
                                <div class="admin-events-item">Телефон</div>
                                <div class="admin-events-item">Специалист</div>
                                <div class="admin-events-item">Тип</div>
                                <div class="admin-events-item">Услуга</div>
                                <div class="admin-events-item">Оплата</div>
                                <div class="admin-events-item">Статус</div>
                                <div class="admin-events-item">Комментарии</div>
                            </div>
                            <div class="account__table-body">
                                {{#each result}}
                                    <div class="acount__table-accardeon accardeon --yellow acount__table-accardeon--pmin" data-id="{{id}}">
                                    <div class="acount__table-main accardeon__main acount__table-auto">
                                            <div class="admin-events-item heap">
                                                <div class="accardeon__click" data-id="{{id}}" on-click="editQuote"></div>
                                                <div class="flag-date">
                                                    <label class="checkbox">
                                                        <input type="checkbox"><span> </span>
                                                    </label>
                                                    <button class="flag-date__ico">
                                                        <svg class="svgsprite _flag">
                                                            <use xlink:href="/assets/img/sprites/svgsprites.svg#flag"></use>
                                                        </svg>
                                                    </button>
                                                    <span class="dt"><strong class="title">Заявка: </strong>{{date}} <br>{{time}}</span>
                                                </div>
                                            </div>
                                            <div class="admin-events-item">
                                                <p>Приём</p>
                                                <span class="dt">17.10.2021 <br>10:42</span>
                                            </div>
                                            <div class="admin-events-item">
                                                <p>ФИО</p><a href="#">{{clientData.fullname}}</a>
                                            </div>
                                            <div class="admin-events-item">
                                                <p>Телефон</p>{{clientData.phone}}
                                            </div>
                                            <div class="admin-events-item">
                                                <p>Специалист</p>{{expert}}
                                            </div>
                                            <div class="admin-events-item">
                                                <p>Тип</p>
                                                {{#each catalog.quoteType as item}}
                                                    {{#if item.id == type }}{{item.name}}{{/if}}
                                                {{/each}}
                                            </div>
                                            <div class="admin-events-item">
                                                <p>Услуга</p>
                                                {{#each services}}
                                                    <div>{{name}}</div>
                                                {{/each}}
                                            </div>
                                            <div class="admin-events-item">
                                                <p>Оплата</p>
                                                {{#each catalog.quotePay as item}}
                                                    {{#if item.id == pay_status }}{{item.name}}{{/if}}
                                                {{/each}}
                                            </div>
                                            <div class="admin-events-item">
                                                <p>Статус</p>
                                                {{#each catalog.quoteStatus as item}}
                                                    {{#if item.id == status }}{{item.name}}{{/if}}
                                                {{/each}}
                                            </div>
                                            <div class="admin-events-item">
                                                <p>Комментарии</p>{{comment}}
                                            </div>
                                        </div>
                                        <div class="acount__table-list accardeon__list admin-editor">
                                            <div class="admin-editor__top">
                                                <div class="admin-editor__top-info">
                                                    <div class="lk-title">Редактировать профиль</div>
                                                    <div class="admin-editor__name user__edit">{{clientData.fullname}}
                                                        <button class="user__edit" on-click="editProfile" data-id="{{client}}">
                                                            <svg class="svgsprite _edit">
                                                                <use xlink:href="/assets/img/sprites/svgsprites.svg#edit"></use>
                                                            </svg>
                                                        </button>
                                                    </div>
                                                    <div class="admin-editor__iser-contacts">
                                                        <p>Дата рождения: <span>{{clientData.birthdate}}</span></p>
                                                        <p>Телефон: <span>{{clientData.phone}}</span></p>
                                                    </div>
                                                </div>
                                                <div class="admin-editor__top-status">
                                                    <div class="admin-editor__top-date">Заявка сформирована {{date}} / {{time}}</div>
                                                    <div class="admin-editor__top-select">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="admin-editor__edit-profile">

                                            </div>
                                            <div class="admin-editor__events">
                                                <div class="row">
                                                    <div class="col-md-7">
                                                        <div class="lk-title">Редактировать заявку</div>
                                                        <div class="admin-editor__event mb-20">
                                                            <div class="search__block --flex --aicn">
                                                                <div class="input">
                                                                    <input class="search__input" type="text" placeholder="Поиск">
                                                                </div>
                                                                <button class="btn btn--black">Найти</button>
                                                            </div>
                                                        </div>
                                                        <div class="admin-editor__event mb-20">
                                                            <div class="select-form">
                                                                <div class="select">
                                                                    <div class="select__main">
                                                                        <div class="select__placeholder">Услуга</div>
                                                                        <div class="select__values"> </div>
                                                                    </div>
                                                                    <div class="select__list">
                                                                        <div class="select__item select__item--checkbox">
                                                                            <label class="checkbox checkbox--record">
                                                                                <input type="checkbox"><span> </span>
                                                                                <div class="checbox__name --flex --aic --jcsb">
                                                                                    <div class="select__name">Внутривенное введение лекарственных препаратов - капельница (Антиоксидантная)</div>
                                                                                    <div>6 000 ₽</div>
                                                                                </div>
                                                                            </label>
                                                                        </div>
                                                                        <div class="select__item select__item--checkbox">
                                                                            <label class="checkbox checkbox--record">
                                                                                <input type="checkbox"><span> </span>
                                                                                <div class="checbox__name --flex --aic --jcsb">
                                                                                    <div class="select__name">Дерматологический пилинг Cosmedix Purity ретиноевый</div>
                                                                                    <div>7 000 ₽</div>
                                                                                </div>
                                                                            </label>
                                                                        </div>
                                                                        <div class="select__item select__item--checkbox">
                                                                            <label class="checkbox checkbox--record">
                                                                                <input type="checkbox"><span> </span>
                                                                                <div class="checbox__name --flex --aic --jcsb">
                                                                                    <div class="select__name">Дерматологический пилинг Enerpeel Jessners салициловый-резорциновый</div>
                                                                                    <div>7 000 ₽</div>
                                                                                </div>
                                                                            </label>
                                                                        </div>
                                                                        <div class="select__item select__item--checkbox">
                                                                            <label class="checkbox checkbox--record">
                                                                                <input type="checkbox"><span> </span>
                                                                                <div class="checbox__name --flex --aic --jcsb">
                                                                                    <div class="select__name">Дерматологический пилинг для кожи с гиперпигментацией "SC Pigment Balancing Peel"</div>
                                                                                    <div>7 000 ₽</div>
                                                                                </div>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="admin-editor__type-event">
                                                            <p class="mb-10">Тип события</p>
                                                            <div class="text-radios">
                                                            {{#each catalog.quoteType as item}}
                                                            <label class="text-radio">
                                                                {{#if item.id == type }}
                                                                <input type="radio" name="type" value="{{ item.id }}" checked><span>{{item.name}}</span>
                                                                {{else}}
                                                                <input type="radio" name="type" value="{{ item.id }}"><span>{{item.name}}</span>
                                                                {{/if}}
                                                            </label>
                                                            {{/each}}
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="select-form select-checkboxes">
                                                                        <div class="select">
                                                                            <div class="select__main">
                                                                                <div class="select__placeholder">Выберите специалиста</div>
                                                                                <div class="select__values"></div>
                                                                            </div>
                                                                            <div class="select__list">
                                                                                <div class="select__item select__item--checkbox">
                                                                                    <label class="checkbox checkbox--record">
                                                                                        <input type="checkbox"><span> </span>
                                                                                        <div class="checbox__name">
                                                                                            <div class="select__name">Хачатурян Любовь Андреева 1</div>
                                                                                        </div>
                                                                                    </label>
                                                                                </div>
                                                                                <div class="select__item select__item--checkbox">
                                                                                    <label class="checkbox checkbox--record">
                                                                                        <input type="checkbox" checked="checked"><span> </span>
                                                                                        <div class="checbox__name">
                                                                                            <div class="select__name">Хачатурян Любовь Андреева 2</div>
                                                                                        </div>
                                                                                    </label>
                                                                                </div>
                                                                                <div class="select__item select__item--checkbox">
                                                                                    <label class="checkbox checkbox--record">
                                                                                        <input type="checkbox"><span> </span>
                                                                                        <div class="checbox__name">
                                                                                            <div class="select__name">Хачатурян Любовь Андреева 3</div>
                                                                                        </div>
                                                                                    </label>
                                                                                </div>
                                                                                <div class="select__item select__item--checkbox">
                                                                                    <label class="checkbox checkbox--record">
                                                                                        <input type="checkbox"><span> </span>
                                                                                        <div class="checbox__name">
                                                                                            <div class="select__name">Хачатурян Любовь Андреева 4</div>
                                                                                        </div>
                                                                                    </label>
                                                                                </div>
                                                                                <div class="select__item select__item--checkbox">
                                                                                    <label class="checkbox checkbox--record">
                                                                                        <input type="checkbox"><span> </span>
                                                                                        <div class="checbox__name">
                                                                                            <div class="select__name">Хачатурян Любовь Андреева 5</div>
                                                                                        </div>
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="input input-lk-calendar input--grey">
                                                                        <input class="input__control datetimepickr" type="text" placeholder="Выбрать дату и время">
                                                                        <div class="input__placeholder">Выбрать дату и время</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="admin-editor__patient">
                                                            <div class="lk-title">Выбраны услуги</div>
                                                            <div class="search__drop-item">
                                                                <div class="search__drop-name">
                                                                    <div class="search__drop-delete">
                                                                        <svg class="svgsprite _delete">
                                                                            <use xlink:href="/assets/img/sprites/svgsprites.svg#delete"></use>
                                                                        </svg>
                                                                    </div>
                                                                    <div class="search__drop-tags">
                                                                        <div class="search__drop-tag --yellow">Л</div>
                                                                    </div>Прием (осмотр, консультация врача-дерматовенеролога главного врача первичный (включает составление плана лечения).
                                                                </div>
                                                                <label class="search__drop-right">
                                                                    <div class="search__drop-summ">7 000 ₽</div>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="admin-editor__summ">
                                                            <p>Всего</p>
                                                            <p>7 000 ₽ </p>
                                                        </div>
                                                        <button class="btn btn--white" on-click="saveQuote">Сохранить</button>
                                                    </div>
                                                    <div class="col-md-1"></div>
                                                    <div class="col-md-4 --jcfe --flex">
                                                    <textarea class="admin__editor-textarea" name="comment" placeholder="Добавить комментарий">{{comment}}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                {{/each}}
                            </div>
                        </div>
                    </div>
                </template>
            </div>
            <script wbapp>
                var catalog = {}
                fetch('/api/v2/func/catalogs/getQuoteStatus', {
                    method: 'GET'
                }).then((response) => {
                    return response.json();
                }).then(function(data) {
                    catalog.quoteStatus = data
                });
                fetch('/api/v2/func/catalogs/getQuotePay', {
                    method: 'GET'
                }).then((response) => {
                    return response.json();
                }).then(function(data) {
                    catalog.quotePay = data
                });
                fetch('/api/v2/func/catalogs/getQuoteType', {
                    method: 'GET'
                }).then((response) => {
                    return response.json();
                }).then(function(data) {
                    catalog.quoteType = data
                });
                setTimeout(function() {
                    let editProfile = wbapp.tpl('#editProfile').html
                    let editStatus = wbapp.tpl('#editStatus').html
                    let tpl = wbapp.tpl('#leadsList').html
                    let tabLeads = new Ractive({
                        el: '.data-tab-item[data-tab="leads"]',
                        template: tpl,
                        data: {},
                        on: {
                            saveQuote(ev) {
                                let lead = $(ev.node).parents('.acount__table-accardeon[data-id]').data('id')
                                let item = $(ev.node).data('id')
                                let form = $(ev.node).parents('.admin-editor')
                                $(form).find('.admin-editor__edit-profile').html('')
                                let copy = $('<form></form>');
                                $(copy).html($(form).clone());
                                let post = $(copy).serializeJson();
                                delete copy;
                                console.log(post);
                            },
                            editProfile(ev) {
                                let lead = $(ev.node).parents('.acount__table-accardeon[data-id]').data('id')
                                let item = $(ev.node).data('id')
                                let form = $(ev.node).parents('.admin-editor').find('.admin-editor__edit-profile')
                                let editor = new Ractive({
                                    el: form,
                                    template: editProfile,
                                    data: {},
                                    on: {
                                        save(ev) {
                                            let post = $($(ev.node).parents('form')).serializeJson();
                                            wbapp.post('/form/users/setClient/'+item, post, function(res) {
                                                tabLeads.set('result.'+lead+'.clientData',res)
                                                $(form).html('');
                                            })
                                        }
                                    }
                                })
                                fetch('/form/users/getClient/' + item, {
                                    method: 'GET'
                                }).then((response) => {
                                    return response.json();
                                }).then(function(data) {
                                    editor.set(data)
                                    initPlugins()
                                });
                            },
                            editQuote(ev) {
                                let lead = $(ev.node).data('id')
                                let quote = tabLeads.get('result.' + lead)
                                let status = new Ractive({
                                    el: $(ev.node).parents('.accardeon').find('.admin-editor__top-select'),
                                    template: editStatus,
                                    data: {catalog: catalog},
                                    on: {
                                        complete() {
                                            $(status.find(`.select.status [data-id="${quote.status}"]`)).trigger('click')
                                            $(status.find(`.select.pay [data-id="${quote.payment}"]`)).trigger('click')
                                        }
                                    }
                                })
                            }
                        }
                    });
                    fetch('/api/v2/list/quotes?status=new&@size=20', {
                        method: 'GET'
                    }).then((response) => {
                        return response.json();
                    }).then(function(data) {
                        data.catalog = catalog
                        tabLeads.set(data)
                    });
                }, 50)
            </script>
            <div class="account__tab data-tab-item" data-tab="events">
                <div class="account-scroll">
                    <div class="account__table">
                        <div class="account__table-head">
                            <div class="admin-events-item">
                                <button class="flag-date__ico">
                                    <svg class="svgsprite _flag">
                                        <use xlink:href="/assets/img/sprites/svgsprites.svg#flag"></use>
                                    </svg>
                                </button><span>Заявка</span>
                            </div>
                            <div class="admin-events-item">Приём</div>
                            <div class="admin-events-item">ФИО</div>
                            <div class="admin-events-item">Телефон</div>
                            <div class="admin-events-item">Специалист</div>
                            <div class="admin-events-item">Тип</div>
                            <div class="admin-events-item">Услуга</div>
                            <div class="admin-events-item">Оплата</div>
                            <div class="admin-events-item">Статус</div>
                            <div class="admin-events-item">Комментарии</div>
                        </div>
                        <div class="account__table-body">
                            <div class="acount__table-accardeon accardeon --yellow acount__table-accardeon--pmin">
                                <div class="acount__table-main accardeon__main acount__table-auto">
                                    <div class="admin-events-item heap">
                                        <div class="accardeon__click"></div>
                                        <div class="flag-date">
                                            <label class="checkbox">
                                                <input type="checkbox"><span> </span>
                                            </label>
                                            <button class="flag-date__ico">
                                                <svg class="svgsprite _flag">
                                                    <use xlink:href="/assets/img/sprites/svgsprites.svg#flag"></use>
                                                </svg>
                                            </button>
                                            <span class="dt"><strong class="title">Событие: </strong>16.10.2021 <br>08:45</span>
                                        </div>
                                    </div>
                                    <div class="admin-events-item">
                                        <p>Приём</p>
                                        <span class="dt">17.10.2021 <br>10:42</span>
                                    </div>
                                    <div class="admin-events-item">
                                        <p>ФИО</p><a href="#">Цветкова Дарья Михайловна</a>
                                    </div>
                                    <div class="admin-events-item">
                                        <p>Телефон</p>+7 (939) 333-33-33
                                    </div>
                                    <div class="admin-events-item">
                                        <p>Специалист</p>Хачатурян Любовь Андреева
                                    </div>
                                    <div class="admin-events-item">
                                        <p>Тип</p>
                                    </div>
                                    <div class="admin-events-item">
                                        <p>Услуга</p>Уходы и маски<br>Фотолечение BBL
                                    </div>
                                    <div class="admin-events-item">
                                        <p>Оплата</p>Ожидает оплаты
                                    </div>
                                    <div class="admin-events-item">
                                        <p>Статус</p>Не дозвонился
                                    </div>
                                    <div class="admin-events-item">
                                        <p>Комментарии</p>Прием (осмотр, консультация) врача-дерматовенеролога КМН
                                    </div>
                                </div>
                                <div class="acount__table-list accardeon__list admin-editor">
                                    <div class="admin-editor__top">
                                        <div class="admin-editor__top-info">
                                            <div class="lk-title">Редактировать профиль</div>
                                            <div class="admin-editor__name user__edit">Меркушева Эля Евгеньевна
                                                <button class="user__edit">
                                                    <svg class="svgsprite _edit">
                                                        <use xlink:href="/assets/img/sprites/svgsprites.svg#edit"></use>
                                                    </svg>
                                                </button>
                                            </div>
                                            <div class="admin-editor__iser-contacts">
                                                <p>Дата рождения: <span>08.10.1999</span></p>
                                                <p>Телефон: <span>+7 (927) 124-99-68</span></p>
                                            </div>
                                        </div>
                                        <div class="admin-editor__top-status">
                                            <div class="admin-editor__top-date">Заявка сформирована 16.10.2021 / 08:45</div>
                                            <div class="admin-editor__top-select">
                                                <div class="select-form">
                                                    <div class="select">
                                                        <div class="select__main">Статус оплаты</div>
                                                        <div class="select__list">
                                                            <div class="select__item">Есть предоплата</div>
                                                            <div class="select__item">Не оплачено</div>
                                                            <div class="select__item">Не требует оплаты</div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="select-form">
                                                    <div class="select">
                                                        <div class="select__main">Изменить статус</div>
                                                        <div class="select__list">
                                                            <div class="select__item select__item--acc-yellow">Необработанная заявка</div>
                                                            <div class="select__item select__item--acc-red">Не дозвонился</div>
                                                            <div class="select__item select__item--acc-purple">Отложенный звонок</div>
                                                            <div class="select__delimiter"></div>
                                                            <div class="select__item select__item--acc-yellow">Предстоящее событие</div>
                                                            <div class="select__item select__item--acc-green">Состоявшееся событие</div>
                                                            <div class="select__item select__item--acc-blue">Отмена визита (дорого)</div>
                                                            <div class="select__item select__item--acc-light-blue">Отмена визита (подумаем)</div>
                                                            <div class="select__item select__item--acc-ocean">Отмена визита (без причины)</div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="admin-editor__edit-profile">
                                        <form class="profile-edit">
                                            <p class="text-bold mb-30">Редактировать профиль</p>
                                            <div class="row profile-edit__wrap">
                                                <div class="col-md-3">
                                                    <div class="input input--grey">
                                                        <input class="input__control datebirthdaypickr" type="text" placeholder="Дата рождения">
                                                        <div class="input__placeholder input__placeholder--dark">Дата рождения</div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="input input--grey">
                                                        <input class="input__control" type="tel" placeholder="Телефон" data-inputmask="'mask': '+7 (999) 999-99-99'">
                                                        <div class="input__placeholder input__placeholder--dark">Телефон</div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="input input--grey">
                                                        <input class="input__control" type="email" placeholder="E-mail">
                                                        <div class="input__placeholder input__placeholder--dark">E-mail</div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <button class="btn btn--white profile-edit__submit">Сохранить</button>
                                                </div>
                                            </div>
                                            <p class="text-bold mb-30 delivery-address">Адрес доставки</p>
                                            <div class="row profile-edit__wrap">
                                                <div class="col-md-9">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="input input--grey">
                                                                <input class="input__control" type="text" placeholder="Страна">
                                                                <div class="input__placeholder input__placeholder--dark">Страна</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="input input--grey">
                                                                <input class="input__control" type="text" placeholder="Город">
                                                                <div class="input__placeholder input__placeholder--dark">Город</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="input input--grey">
                                                                <input class="input__control" type="text" placeholder="Улица и дом">
                                                                <div class="input__placeholder input__placeholder--dark">Улица и дом</div>
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
                                                                <input class="input__control" type="text" placeholder="Кв./офис">
                                                                <div class="input__placeholder input__placeholder--dark">Кв./офис</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="input input--grey">
                                                                <input class="input__control" type="text" placeholder="Домофон">
                                                                <div class="input__placeholder input__placeholder--dark">Домофон</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="input input--grey">
                                                                <input class="input__control" type="text" placeholder="Подъезд">
                                                                <div class="input__placeholder input__placeholder--dark">Подъезд</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="input input--grey">
                                                                <input class="input__control" type="text" placeholder="Этаж">
                                                                <div class="input__placeholder input__placeholder--dark">Этаж</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <button class="btn btn--white profile-edit__submit">Сохранить</button>
                                                </div>
                                            </div>
                                        </form>


                                    </div>
                                    <div class="admin-editor__events">
                                        <div class="row">
                                            <div class="col-md-7">
                                                <div class="lk-title">Редактировать событие</div>
                                                <div class="admin-editor__event mb-20">
                                                    <div class="search__block --flex --aicn">
                                                        <div class="input">
                                                            <input class="search__input" type="text" placeholder="Поиск">
                                                        </div>
                                                        <button class="btn btn--black">Найти</button>
                                                    </div>
                                                </div>
                                                <div class="admin-editor__event mb-20">
                                                    <div class="select-form">
                                                        <div class="select">
                                                            <div class="select__main">
                                                                <div class="select__placeholder">Услуга</div>
                                                                <div class="select__values"> </div>
                                                            </div>
                                                            <div class="select__list">
                                                                <div class="select__item select__item--checkbox">
                                                                    <label class="checkbox checkbox--record">
                                                                        <input type="checkbox"><span> </span>
                                                                        <div class="checbox__name --flex --aic --jcsb">
                                                                            <div class="select__name">Внутривенное введение лекарственных препаратов - капельница (Антиоксидантная)</div>
                                                                            <div>6 000 ₽</div>
                                                                        </div>
                                                                    </label>
                                                                </div>
                                                                <div class="select__item select__item--checkbox">
                                                                    <label class="checkbox checkbox--record">
                                                                        <input type="checkbox"><span> </span>
                                                                        <div class="checbox__name --flex --aic --jcsb">
                                                                            <div class="select__name">Дерматологический пилинг Cosmedix Purity ретиноевый</div>
                                                                            <div>7 000 ₽</div>
                                                                        </div>
                                                                    </label>
                                                                </div>
                                                                <div class="select__item select__item--checkbox">
                                                                    <label class="checkbox checkbox--record">
                                                                        <input type="checkbox"><span> </span>
                                                                        <div class="checbox__name --flex --aic --jcsb">
                                                                            <div class="select__name">Дерматологический пилинг Enerpeel Jessners салициловый-резорциновый</div>
                                                                            <div>7 000 ₽</div>
                                                                        </div>
                                                                    </label>
                                                                </div>
                                                                <div class="select__item select__item--checkbox">
                                                                    <label class="checkbox checkbox--record">
                                                                        <input type="checkbox"><span> </span>
                                                                        <div class="checbox__name --flex --aic --jcsb">
                                                                            <div class="select__name">Дерматологический пилинг для кожи с гиперпигментацией "SC Pigment Balancing Peel"</div>
                                                                            <div>7 000 ₽</div>
                                                                        </div>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="admin-editor__type-event">
                                                    <p class="mb-10">Тип события</p>
                                                    <div class="text-radios">
                                                        <label class="text-radio">
                                                            <input type="radio" name="status" checked><span>В клинике</span>
                                                        </label>
                                                        <label class="text-radio">
                                                            <input type="radio" name="status"><span>Онлайн</span>
                                                        </label>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="select-form select-checkboxes">
                                                                <div class="select">
                                                                    <div class="select__main">
                                                                        <div class="select__placeholder">Выберите специалиста</div>
                                                                        <div class="select__values"></div>
                                                                    </div>
                                                                    <div class="select__list">
                                                                        <div class="select__item select__item--checkbox">
                                                                            <label class="checkbox checkbox--record">
                                                                                <input type="checkbox"><span> </span>
                                                                                <div class="checbox__name">
                                                                                    <div class="select__name">Хачатурян Любовь Андреева 1</div>
                                                                                </div>
                                                                            </label>
                                                                        </div>
                                                                        <div class="select__item select__item--checkbox">
                                                                            <label class="checkbox checkbox--record">
                                                                                <input type="checkbox" checked="checked"><span> </span>
                                                                                <div class="checbox__name">
                                                                                    <div class="select__name">Хачатурян Любовь Андреева 2</div>
                                                                                </div>
                                                                            </label>
                                                                        </div>
                                                                        <div class="select__item select__item--checkbox">
                                                                            <label class="checkbox checkbox--record">
                                                                                <input type="checkbox"><span> </span>
                                                                                <div class="checbox__name">
                                                                                    <div class="select__name">Хачатурян Любовь Андреева 3</div>
                                                                                </div>
                                                                            </label>
                                                                        </div>
                                                                        <div class="select__item select__item--checkbox">
                                                                            <label class="checkbox checkbox--record">
                                                                                <input type="checkbox"><span> </span>
                                                                                <div class="checbox__name">
                                                                                    <div class="select__name">Хачатурян Любовь Андреева 4</div>
                                                                                </div>
                                                                            </label>
                                                                        </div>
                                                                        <div class="select__item select__item--checkbox">
                                                                            <label class="checkbox checkbox--record">
                                                                                <input type="checkbox"><span> </span>
                                                                                <div class="checbox__name">
                                                                                    <div class="select__name">Хачатурян Любовь Андреева 5</div>
                                                                                </div>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="input input-lk-calendar input--grey">
                                                                <input class="input__control datetimepickr" type="text" placeholder="Выбрать дату и время">
                                                                <div class="input__placeholder">Выбрать дату и время</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="admin-editor__patient">
                                                    <div class="lk-title">Выбраны услуги</div>
                                                    <div class="search__drop-item">
                                                        <div class="search__drop-name">
                                                            <div class="search__drop-delete">
                                                                <svg class="svgsprite _delete">
                                                                    <use xlink:href="/assets/img/sprites/svgsprites.svg#delete"></use>
                                                                </svg>
                                                            </div>
                                                            <div class="search__drop-tags">
                                                                <div class="search__drop-tag --yellow">Л</div>
                                                            </div>Прием (осмотр, консультация врача-дерматовенеролога главного врача первичный (включает составление плана лечения).
                                                        </div>
                                                        <label class="search__drop-right">
                                                            <div class="search__drop-summ">7 000 ₽</div>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="admin-editor__summ">
                                                    <p>Всего</p>
                                                    <p>7 000 ₽ </p>
                                                </div>
                                                <div class="admin-editor__patient mb-40">
                                                    <div class="row acount__photos-wrap mb-20">
                                                        <div class="col-md-6">
                                                            <div class="acount__photo">
                                                                <p>Фото до начала лечения</p><img src="./assets/img/experts/1.jpg" alt="">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="acount__photo">
                                                                <p>Фото в процессе лечения</p><img src="./assets/img/experts/1.jpg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row acount__photos-wrap">
                                                        <div class="col-md-2"> <a class="btn btn--white --openpopup" href="#" data-popup="--photo">Добавить фото</a></div>
                                                    </div>
                                                </div>
                                                <button class="btn btn--white">Сохранить</button>
                                            </div>
                                            <div class="col-md-1"></div>
                                            <div class="col-md-4 --jcfe --flex">
                                                <textarea class="admin__editor-textarea" placeholder="Добавить комментарий"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="acount__table-accardeon accardeon --green acount__table-accardeon--pmin">
                                <div class="acount__table-main accardeon__main acount__table-auto">
                                    <div class="admin-events-item heap">
                                        <div class="accardeon__click"></div>
                                        <div class="flag-date">
                                            <label class="checkbox">
                                                <input type="checkbox"><span> </span>
                                            </label>
                                            <button class="flag-date__ico">
                                                <svg class="svgsprite _flag">
                                                    <use xlink:href="/assets/img/sprites/svgsprites.svg#flag"></use>
                                                </svg>
                                            </button>
                                            <span class="dt"><strong class="title">Событие: </strong>16.10.2021 <br>08:45</span>
                                        </div>
                                    </div>
                                    <div class="admin-events-item">
                                        <p>Приём</p>
                                        <span class="dt">17.10.2021 <br>10:42</span>
                                    </div>
                                    <div class="admin-events-item">
                                        <p>ФИО</p><a href="#">Цветкова Дарья Михайловна</a>
                                    </div>
                                    <div class="admin-events-item">
                                        <p>Телефон</p>+7 (939) 333-33-33
                                    </div>
                                    <div class="admin-events-item">
                                        <p>Специалист</p>Хачатурян Любовь Андреева
                                    </div>
                                    <div class="admin-events-item">
                                        <p>Тип</p>
                                    </div>
                                    <div class="admin-events-item">
                                        <p>Услуга</p>Уходы и маски<br>Фотолечение BBL
                                    </div>
                                    <div class="admin-events-item">
                                        <p>Оплата</p>Ожидает оплаты
                                    </div>
                                    <div class="admin-events-item">
                                        <p>Статус</p>Не дозвонился
                                    </div>
                                    <div class="admin-events-item">
                                        <p>Комментарии</p>Прием (осмотр, консультация) врача-дерматовенеролога КМН
                                    </div>
                                </div>
                                <div class="acount__table-list accardeon__list admin-editor">
                                    <div class="admin-editor__top">
                                        <div class="admin-editor__top-info">
                                            <div class="lk-title">Редактировать профиль</div>
                                            <div class="admin-editor__name user__edit">Меркушева Эля Евгеньевна
                                                <button class="user__edit">
                                                    <svg class="svgsprite _edit">
                                                        <use xlink:href="/assets/img/sprites/svgsprites.svg#edit"></use>
                                                    </svg>
                                                </button>
                                            </div>
                                            <div class="admin-editor__iser-contacts">
                                                <p>Дата рождения: <span>08.10.1999</span></p>
                                                <p>Телефон: <span>+7 (927) 124-99-68</span></p>
                                            </div>
                                        </div>
                                        <div class="admin-editor__top-status">
                                            <div class="admin-editor__top-date">Заявка сформирована 16.10.2021 / 08:45</div>
                                            <div class="admin-editor__top-select">
                                                <div class="select-form">
                                                    <div class="select">
                                                        <div class="select__main">Статус оплаты</div>
                                                        <div class="select__list">
                                                            <div class="select__item">Есть предоплата</div>
                                                            <div class="select__item">Не оплачено</div>
                                                            <div class="select__item">Не требует оплаты</div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="select-form">
                                                    <div class="select">
                                                        <div class="select__main">Изменить статус</div>
                                                        <div class="select__list">
                                                            <div class="select__item select__item--acc-yellow">Необработанная заявка</div>
                                                            <div class="select__item select__item--acc-red">Не дозвонился</div>
                                                            <div class="select__item select__item--acc-purple">Отложенный звонок</div>
                                                            <div class="select__delimiter"></div>
                                                            <div class="select__item select__item--acc-yellow">Предстоящее событие</div>
                                                            <div class="select__item select__item--acc-green">Состоявшееся событие</div>
                                                            <div class="select__item select__item--acc-blue">Отмена визита (дорого)</div>
                                                            <div class="select__item select__item--acc-light-blue">Отмена визита (подумаем)</div>
                                                            <div class="select__item select__item--acc-ocean">Отмена визита (без причины)</div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="admin-editor__edit-profile">
                                        <form class="profile-edit">
                                            <p class="text-bold mb-30">Редактировать профиль</p>
                                            <div class="row profile-edit__wrap">
                                                <div class="col-md-3">
                                                    <div class="input input--grey">
                                                        <input class="input__control datebirthdaypickr" type="text" placeholder="Дата рождения">
                                                        <div class="input__placeholder input__placeholder--dark">Дата рождения</div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="input input--grey">
                                                        <input class="input__control" type="tel" placeholder="Телефон" data-inputmask="'mask': '+7 (999) 999-99-99'">
                                                        <div class="input__placeholder input__placeholder--dark">Телефон</div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="input input--grey">
                                                        <input class="input__control" type="email" placeholder="E-mail">
                                                        <div class="input__placeholder input__placeholder--dark">E-mail</div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <button class="btn btn--white profile-edit__submit">Сохранить</button>
                                                </div>
                                            </div>
                                            <p class="text-bold mb-30 delivery-address">Адрес доставки</p>
                                            <div class="row profile-edit__wrap">
                                                <div class="col-md-9">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="input input--grey">
                                                                <input class="input__control" type="text" placeholder="Страна">
                                                                <div class="input__placeholder input__placeholder--dark">Страна</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="input input--grey">
                                                                <input class="input__control" type="text" placeholder="Город">
                                                                <div class="input__placeholder input__placeholder--dark">Город</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="input input--grey">
                                                                <input class="input__control" type="text" placeholder="Улица и дом">
                                                                <div class="input__placeholder input__placeholder--dark">Улица и дом</div>
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
                                                                <input class="input__control" type="text" placeholder="Кв./офис">
                                                                <div class="input__placeholder input__placeholder--dark">Кв./офис</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="input input--grey">
                                                                <input class="input__control" type="text" placeholder="Домофон">
                                                                <div class="input__placeholder input__placeholder--dark">Домофон</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="input input--grey">
                                                                <input class="input__control" type="text" placeholder="Подъезд">
                                                                <div class="input__placeholder input__placeholder--dark">Подъезд</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="input input--grey">
                                                                <input class="input__control" type="text" placeholder="Этаж">
                                                                <div class="input__placeholder input__placeholder--dark">Этаж</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <button class="btn btn--white profile-edit__submit">Сохранить</button>
                                                </div>
                                            </div>
                                        </form>


                                    </div>
                                    <div class="admin-editor__events">
                                        <div class="row">
                                            <div class="col-md-7">
                                                <div class="lk-title">Редактировать событие</div>
                                                <div class="admin-editor__event mb-20">
                                                    <div class="search__block --flex --aicn">
                                                        <div class="input">
                                                            <input class="search__input" type="text" placeholder="Поиск">
                                                        </div>
                                                        <button class="btn btn--black">Найти</button>
                                                    </div>
                                                </div>
                                                <div class="admin-editor__event mb-20">
                                                    <div class="select-form">
                                                        <div class="select">
                                                            <div class="select__main">
                                                                <div class="select__placeholder">Услуга</div>
                                                                <div class="select__values"> </div>
                                                            </div>
                                                            <div class="select__list">
                                                                <div class="select__item select__item--checkbox">
                                                                    <label class="checkbox checkbox--record">
                                                                        <input type="checkbox"><span> </span>
                                                                        <div class="checbox__name --flex --aic --jcsb">
                                                                            <div class="select__name">Внутривенное введение лекарственных препаратов - капельница (Антиоксидантная)</div>
                                                                            <div>6 000 ₽</div>
                                                                        </div>
                                                                    </label>
                                                                </div>
                                                                <div class="select__item select__item--checkbox">
                                                                    <label class="checkbox checkbox--record">
                                                                        <input type="checkbox"><span> </span>
                                                                        <div class="checbox__name --flex --aic --jcsb">
                                                                            <div class="select__name">Дерматологический пилинг Cosmedix Purity ретиноевый</div>
                                                                            <div>7 000 ₽</div>
                                                                        </div>
                                                                    </label>
                                                                </div>
                                                                <div class="select__item select__item--checkbox">
                                                                    <label class="checkbox checkbox--record">
                                                                        <input type="checkbox"><span> </span>
                                                                        <div class="checbox__name --flex --aic --jcsb">
                                                                            <div class="select__name">Дерматологический пилинг Enerpeel Jessners салициловый-резорциновый</div>
                                                                            <div>7 000 ₽</div>
                                                                        </div>
                                                                    </label>
                                                                </div>
                                                                <div class="select__item select__item--checkbox">
                                                                    <label class="checkbox checkbox--record">
                                                                        <input type="checkbox"><span> </span>
                                                                        <div class="checbox__name --flex --aic --jcsb">
                                                                            <div class="select__name">Дерматологический пилинг для кожи с гиперпигментацией "SC Pigment Balancing Peel"</div>
                                                                            <div>7 000 ₽</div>
                                                                        </div>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="admin-editor__type-event">
                                                    <p class="mb-10">Тип события</p>
                                                    <div class="text-radios">
                                                        <label class="text-radio">
                                                            <input type="radio" name="status" checked><span>В клинике</span>
                                                        </label>
                                                        <label class="text-radio">
                                                            <input type="radio" name="status"><span>Онлайн</span>
                                                        </label>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="select-form select-checkboxes">
                                                                <div class="select">
                                                                    <div class="select__main">
                                                                        <div class="select__placeholder">Выберите специалиста</div>
                                                                        <div class="select__values"></div>
                                                                    </div>
                                                                    <div class="select__list">
                                                                        <div class="select__item select__item--checkbox">
                                                                            <label class="checkbox checkbox--record">
                                                                                <input type="checkbox"><span> </span>
                                                                                <div class="checbox__name">
                                                                                    <div class="select__name">Хачатурян Любовь Андреева 1</div>
                                                                                </div>
                                                                            </label>
                                                                        </div>
                                                                        <div class="select__item select__item--checkbox">
                                                                            <label class="checkbox checkbox--record">
                                                                                <input type="checkbox" checked="checked"><span> </span>
                                                                                <div class="checbox__name">
                                                                                    <div class="select__name">Хачатурян Любовь Андреева 2</div>
                                                                                </div>
                                                                            </label>
                                                                        </div>
                                                                        <div class="select__item select__item--checkbox">
                                                                            <label class="checkbox checkbox--record">
                                                                                <input type="checkbox"><span> </span>
                                                                                <div class="checbox__name">
                                                                                    <div class="select__name">Хачатурян Любовь Андреева 3</div>
                                                                                </div>
                                                                            </label>
                                                                        </div>
                                                                        <div class="select__item select__item--checkbox">
                                                                            <label class="checkbox checkbox--record">
                                                                                <input type="checkbox"><span> </span>
                                                                                <div class="checbox__name">
                                                                                    <div class="select__name">Хачатурян Любовь Андреева 4</div>
                                                                                </div>
                                                                            </label>
                                                                        </div>
                                                                        <div class="select__item select__item--checkbox">
                                                                            <label class="checkbox checkbox--record">
                                                                                <input type="checkbox"><span> </span>
                                                                                <div class="checbox__name">
                                                                                    <div class="select__name">Хачатурян Любовь Андреева 5</div>
                                                                                </div>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="input input-lk-calendar input--grey">
                                                                <input class="input__control datetimepickr" type="text" placeholder="Выбрать дату и время">
                                                                <div class="input__placeholder">Выбрать дату и время</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="admin-editor__patient">
                                                    <div class="lk-title">Выбраны услуги</div>
                                                    <div class="search__drop-item">
                                                        <div class="search__drop-name">
                                                            <div class="search__drop-delete">
                                                                <svg class="svgsprite _delete">
                                                                    <use xlink:href="/assets/img/sprites/svgsprites.svg#delete"></use>
                                                                </svg>
                                                            </div>
                                                            <div class="search__drop-tags">
                                                                <div class="search__drop-tag --yellow">Л</div>
                                                            </div>Прием (осмотр, консультация врача-дерматовенеролога главного врача первичный (включает составление плана лечения).
                                                        </div>
                                                        <label class="search__drop-right">
                                                            <div class="search__drop-summ">7 000 ₽</div>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="admin-editor__summ">
                                                    <p>Всего</p>
                                                    <p>7 000 ₽ </p>
                                                </div>
                                                <div class="admin-editor__patient mb-40">
                                                    <div class="row acount__photos-wrap mb-20">
                                                        <div class="col-md-6">
                                                            <div class="acount__photo">
                                                                <p>Фото до начала лечения</p><img src="./assets/img/experts/1.jpg" alt="">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="acount__photo">
                                                                <p>Фото в процессе лечения</p><img src="./assets/img/experts/1.jpg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row acount__photos-wrap">
                                                        <div class="col-md-2"> <a class="btn btn--white --openpopup" href="#" data-popup="--photo">Добавить фото</a></div>
                                                    </div>
                                                </div>
                                                <button class="btn btn--white">Сохранить</button>
                                            </div>
                                            <div class="col-md-1"></div>
                                            <div class="col-md-4 --jcfe --flex">
                                                <textarea class="admin__editor-textarea" placeholder="Добавить комментарий"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="acount__table-accardeon accardeon --blue acount__table-accardeon--pmin">
                                <div class="acount__table-main accardeon__main acount__table-auto">
                                    <div class="admin-events-item heap">
                                        <div class="accardeon__click"></div>
                                        <div class="flag-date">
                                            <label class="checkbox">
                                                <input type="checkbox"><span> </span>
                                            </label>
                                            <button class="flag-date__ico">
                                                <svg class="svgsprite _flag">
                                                    <use xlink:href="/assets/img/sprites/svgsprites.svg#flag"></use>
                                                </svg>
                                            </button>
                                            <span class="dt"><strong class="title">Событие: </strong>16.10.2021 <br>08:45</span>
                                        </div>
                                    </div>
                                    <div class="admin-events-item">
                                        <p>Приём</p>
                                        <span class="dt">17.10.2021 <br>10:42</span>
                                    </div>
                                    <div class="admin-events-item">
                                        <p>ФИО</p><a href="#">Цветкова Дарья Михайловна</a>
                                    </div>
                                    <div class="admin-events-item">
                                        <p>Телефон</p>+7 (939) 333-33-33
                                    </div>
                                    <div class="admin-events-item">
                                        <p>Специалист</p>Хачатурян Любовь Андреева
                                    </div>
                                    <div class="admin-events-item">
                                        <p>Тип</p>
                                    </div>
                                    <div class="admin-events-item">
                                        <p>Услуга</p>Уходы и маски<br>Фотолечение BBL
                                    </div>
                                    <div class="admin-events-item">
                                        <p>Оплата</p>Ожидает оплаты
                                    </div>
                                    <div class="admin-events-item">
                                        <p>Статус</p>Не дозвонился
                                    </div>
                                    <div class="admin-events-item">
                                        <p>Комментарии</p>Прием (осмотр, консультация) врача-дерматовенеролога КМН
                                    </div>
                                </div>
                                <div class="acount__table-list accardeon__list admin-editor">
                                    <div class="admin-editor__top">
                                        <div class="admin-editor__top-info">
                                            <div class="lk-title">Редактировать профиль</div>
                                            <div class="admin-editor__name user__edit">Меркушева Эля Евгеньевна
                                                <button class="user__edit">
                                                    <svg class="svgsprite _edit">
                                                        <use xlink:href="/assets/img/sprites/svgsprites.svg#edit"></use>
                                                    </svg>
                                                </button>
                                            </div>
                                            <div class="admin-editor__iser-contacts">
                                                <p>Дата рождения: <span>08.10.1999</span></p>
                                                <p>Телефон: <span>+7 (927) 124-99-68</span></p>
                                            </div>
                                        </div>
                                        <div class="admin-editor__top-status">
                                            <div class="admin-editor__top-date">Заявка сформирована 16.10.2021 / 08:45</div>
                                            <div class="admin-editor__top-select">
                                                <div class="select-form">
                                                    <div class="select">
                                                        <div class="select__main">Статус оплаты</div>
                                                        <div class="select__list">
                                                            <div class="select__item">Есть предоплата</div>
                                                            <div class="select__item">Не оплачено</div>
                                                            <div class="select__item">Не требует оплаты</div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="select-form">
                                                    <div class="select">
                                                        <div class="select__main">Изменить статус</div>
                                                        <div class="select__list">
                                                            <div class="select__item select__item--acc-yellow">Необработанная заявка</div>
                                                            <div class="select__item select__item--acc-red">Не дозвонился</div>
                                                            <div class="select__item select__item--acc-purple">Отложенный звонок</div>
                                                            <div class="select__delimiter"></div>
                                                            <div class="select__item select__item--acc-yellow">Предстоящее событие</div>
                                                            <div class="select__item select__item--acc-green">Состоявшееся событие</div>
                                                            <div class="select__item select__item--acc-blue">Отмена визита (дорого)</div>
                                                            <div class="select__item select__item--acc-light-blue">Отмена визита (подумаем)</div>
                                                            <div class="select__item select__item--acc-ocean">Отмена визита (без причины)</div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="admin-editor__edit-profile">
                                        <form class="profile-edit">
                                            <p class="text-bold mb-30">Редактировать профиль</p>
                                            <div class="row profile-edit__wrap">
                                                <div class="col-md-3">
                                                    <div class="input input--grey">
                                                        <input class="input__control datebirthdaypickr" type="text" placeholder="Дата рождения">
                                                        <div class="input__placeholder input__placeholder--dark">Дата рождения</div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="input input--grey">
                                                        <input class="input__control" type="tel" placeholder="Телефон" data-inputmask="'mask': '+7 (999) 999-99-99'">
                                                        <div class="input__placeholder input__placeholder--dark">Телефон</div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="input input--grey">
                                                        <input class="input__control" type="email" placeholder="E-mail">
                                                        <div class="input__placeholder input__placeholder--dark">E-mail</div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <button class="btn btn--white profile-edit__submit">Сохранить</button>
                                                </div>
                                            </div>
                                            <p class="text-bold mb-30 delivery-address">Адрес доставки</p>
                                            <div class="row profile-edit__wrap">
                                                <div class="col-md-9">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="input input--grey">
                                                                <input class="input__control" type="text" placeholder="Страна">
                                                                <div class="input__placeholder input__placeholder--dark">Страна</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="input input--grey">
                                                                <input class="input__control" type="text" placeholder="Город">
                                                                <div class="input__placeholder input__placeholder--dark">Город</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="input input--grey">
                                                                <input class="input__control" type="text" placeholder="Улица и дом">
                                                                <div class="input__placeholder input__placeholder--dark">Улица и дом</div>
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
                                                                <input class="input__control" type="text" placeholder="Кв./офис">
                                                                <div class="input__placeholder input__placeholder--dark">Кв./офис</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="input input--grey">
                                                                <input class="input__control" type="text" placeholder="Домофон">
                                                                <div class="input__placeholder input__placeholder--dark">Домофон</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="input input--grey">
                                                                <input class="input__control" type="text" placeholder="Подъезд">
                                                                <div class="input__placeholder input__placeholder--dark">Подъезд</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="input input--grey">
                                                                <input class="input__control" type="text" placeholder="Этаж">
                                                                <div class="input__placeholder input__placeholder--dark">Этаж</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <button class="btn btn--white profile-edit__submit">Сохранить</button>
                                                </div>
                                            </div>
                                        </form>


                                    </div>
                                    <div class="admin-editor__events">
                                        <div class="row">
                                            <div class="col-md-7">
                                                <div class="lk-title">Редактировать событие</div>
                                                <div class="admin-editor__event mb-20">
                                                    <div class="search__block --flex --aicn">
                                                        <div class="input">
                                                            <input class="search__input" type="text" placeholder="Поиск">
                                                        </div>
                                                        <button class="btn btn--black">Найти</button>
                                                    </div>
                                                </div>
                                                <div class="admin-editor__event mb-20">
                                                    <div class="select-form">
                                                        <div class="select">
                                                            <div class="select__main">
                                                                <div class="select__placeholder">Услуга</div>
                                                                <div class="select__values"> </div>
                                                            </div>
                                                            <div class="select__list">
                                                                <div class="select__item select__item--checkbox">
                                                                    <label class="checkbox checkbox--record">
                                                                        <input type="checkbox"><span> </span>
                                                                        <div class="checbox__name --flex --aic --jcsb">
                                                                            <div class="select__name">Внутривенное введение лекарственных препаратов - капельница (Антиоксидантная)</div>
                                                                            <div>6 000 ₽</div>
                                                                        </div>
                                                                    </label>
                                                                </div>
                                                                <div class="select__item select__item--checkbox">
                                                                    <label class="checkbox checkbox--record">
                                                                        <input type="checkbox"><span> </span>
                                                                        <div class="checbox__name --flex --aic --jcsb">
                                                                            <div class="select__name">Дерматологический пилинг Cosmedix Purity ретиноевый</div>
                                                                            <div>7 000 ₽</div>
                                                                        </div>
                                                                    </label>
                                                                </div>
                                                                <div class="select__item select__item--checkbox">
                                                                    <label class="checkbox checkbox--record">
                                                                        <input type="checkbox"><span> </span>
                                                                        <div class="checbox__name --flex --aic --jcsb">
                                                                            <div class="select__name">Дерматологический пилинг Enerpeel Jessners салициловый-резорциновый</div>
                                                                            <div>7 000 ₽</div>
                                                                        </div>
                                                                    </label>
                                                                </div>
                                                                <div class="select__item select__item--checkbox">
                                                                    <label class="checkbox checkbox--record">
                                                                        <input type="checkbox"><span> </span>
                                                                        <div class="checbox__name --flex --aic --jcsb">
                                                                            <div class="select__name">Дерматологический пилинг для кожи с гиперпигментацией "SC Pigment Balancing Peel"</div>
                                                                            <div>7 000 ₽</div>
                                                                        </div>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="admin-editor__type-event">
                                                    <p class="mb-10">Тип события</p>
                                                    <div class="text-radios">
                                                        <label class="text-radio">
                                                            <input type="radio" name="status" checked><span>В клинике</span>
                                                        </label>
                                                        <label class="text-radio">
                                                            <input type="radio" name="status"><span>Онлайн</span>
                                                        </label>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="select-form select-checkboxes">
                                                                <div class="select">
                                                                    <div class="select__main">
                                                                        <div class="select__placeholder">Выберите специалиста</div>
                                                                        <div class="select__values"></div>
                                                                    </div>
                                                                    <div class="select__list">
                                                                        <div class="select__item select__item--checkbox">
                                                                            <label class="checkbox checkbox--record">
                                                                                <input type="checkbox"><span> </span>
                                                                                <div class="checbox__name">
                                                                                    <div class="select__name">Хачатурян Любовь Андреева 1</div>
                                                                                </div>
                                                                            </label>
                                                                        </div>
                                                                        <div class="select__item select__item--checkbox">
                                                                            <label class="checkbox checkbox--record">
                                                                                <input type="checkbox" checked="checked"><span> </span>
                                                                                <div class="checbox__name">
                                                                                    <div class="select__name">Хачатурян Любовь Андреева 2</div>
                                                                                </div>
                                                                            </label>
                                                                        </div>
                                                                        <div class="select__item select__item--checkbox">
                                                                            <label class="checkbox checkbox--record">
                                                                                <input type="checkbox"><span> </span>
                                                                                <div class="checbox__name">
                                                                                    <div class="select__name">Хачатурян Любовь Андреева 3</div>
                                                                                </div>
                                                                            </label>
                                                                        </div>
                                                                        <div class="select__item select__item--checkbox">
                                                                            <label class="checkbox checkbox--record">
                                                                                <input type="checkbox"><span> </span>
                                                                                <div class="checbox__name">
                                                                                    <div class="select__name">Хачатурян Любовь Андреева 4</div>
                                                                                </div>
                                                                            </label>
                                                                        </div>
                                                                        <div class="select__item select__item--checkbox">
                                                                            <label class="checkbox checkbox--record">
                                                                                <input type="checkbox"><span> </span>
                                                                                <div class="checbox__name">
                                                                                    <div class="select__name">Хачатурян Любовь Андреева 5</div>
                                                                                </div>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="input input-lk-calendar input--grey">
                                                                <input class="input__control datetimepickr" type="text" placeholder="Выбрать дату и время">
                                                                <div class="input__placeholder">Выбрать дату и время</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="admin-editor__patient">
                                                    <div class="lk-title">Выбраны услуги</div>
                                                    <div class="search__drop-item">
                                                        <div class="search__drop-name">
                                                            <div class="search__drop-delete">
                                                                <svg class="svgsprite _delete">
                                                                    <use xlink:href="/assets/img/sprites/svgsprites.svg#delete"></use>
                                                                </svg>
                                                            </div>
                                                            <div class="search__drop-tags">
                                                                <div class="search__drop-tag --yellow">Л</div>
                                                            </div>Прием (осмотр, консультация врача-дерматовенеролога главного врача первичный (включает составление плана лечения).
                                                        </div>
                                                        <label class="search__drop-right">
                                                            <div class="search__drop-summ">7 000 ₽</div>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="admin-editor__summ">
                                                    <p>Всего</p>
                                                    <p>7 000 ₽ </p>
                                                </div>
                                                <div class="admin-editor__patient mb-40">
                                                    <div class="row acount__photos-wrap mb-20">
                                                        <div class="col-md-6">
                                                            <div class="acount__photo">
                                                                <p>Фото до начала лечения</p><img src="./assets/img/experts/1.jpg" alt="">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="acount__photo">
                                                                <p>Фото в процессе лечения</p><img src="./assets/img/experts/1.jpg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row acount__photos-wrap">
                                                        <div class="col-md-2"> <a class="btn btn--white --openpopup" href="#" data-popup="--photo">Добавить фото</a></div>
                                                    </div>
                                                </div>
                                                <button class="btn btn--white">Сохранить</button>
                                            </div>
                                            <div class="col-md-1"></div>
                                            <div class="col-md-4 --jcfe --flex">
                                                <textarea class="admin__editor-textarea" placeholder="Добавить комментарий"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="acount__table-accardeon accardeon --light-blue acount__table-accardeon--pmin">
                                <div class="acount__table-main accardeon__main acount__table-auto">
                                    <div class="admin-events-item heap">
                                        <div class="accardeon__click"></div>
                                        <div class="flag-date">
                                            <label class="checkbox">
                                                <input type="checkbox"><span> </span>
                                            </label>
                                            <button class="flag-date__ico">
                                                <svg class="svgsprite _flag">
                                                    <use xlink:href="/assets/img/sprites/svgsprites.svg#flag"></use>
                                                </svg>
                                            </button>
                                            <span class="dt"><strong class="title">Событие: </strong>16.10.2021 <br>08:45</span>
                                        </div>
                                    </div>
                                    <div class="admin-events-item">
                                        <p>Приём</p>
                                        <span class="dt">17.10.2021 <br>10:42</span>
                                    </div>
                                    <div class="admin-events-item">
                                        <p>ФИО</p><a href="#">Цветкова Дарья Михайловна</a>
                                    </div>
                                    <div class="admin-events-item">
                                        <p>Телефон</p>+7 (939) 333-33-33
                                    </div>
                                    <div class="admin-events-item">
                                        <p>Специалист</p>Хачатурян Любовь Андреева
                                    </div>
                                    <div class="admin-events-item">
                                        <p>Тип</p>
                                    </div>
                                    <div class="admin-events-item">
                                        <p>Услуга</p>Уходы и маски<br>Фотолечение BBL
                                    </div>
                                    <div class="admin-events-item">
                                        <p>Оплата</p>Ожидает оплаты
                                    </div>
                                    <div class="admin-events-item">
                                        <p>Статус</p>Не дозвонился
                                    </div>
                                    <div class="admin-events-item">
                                        <p>Комментарии</p>Прием (осмотр, консультация) врача-дерматовенеролога КМН
                                    </div>
                                </div>
                                <div class="acount__table-list accardeon__list admin-editor">
                                    <div class="admin-editor__top">
                                        <div class="admin-editor__top-info">
                                            <div class="lk-title">Редактировать профиль</div>
                                            <div class="admin-editor__name user__edit">Меркушева Эля Евгеньевна
                                                <button class="user__edit">
                                                    <svg class="svgsprite _edit">
                                                        <use xlink:href="/assets/img/sprites/svgsprites.svg#edit"></use>
                                                    </svg>
                                                </button>
                                            </div>
                                            <div class="admin-editor__iser-contacts">
                                                <p>Дата рождения: <span>08.10.1999</span></p>
                                                <p>Телефон: <span>+7 (927) 124-99-68</span></p>
                                            </div>
                                        </div>
                                        <div class="admin-editor__top-status">
                                            <div class="admin-editor__top-date">Заявка сформирована {{date}} / {{time}}</div>
                                            <div class="admin-editor__top-select">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="admin-editor__edit-profile">
                                        <form class="profile-edit">
                                            <p class="text-bold mb-30">Редактировать профиль</p>
                                            <div class="row profile-edit__wrap">
                                                <div class="col-md-3">
                                                    <div class="input input--grey">
                                                        <input class="input__control datebirthdaypickr" type="text" placeholder="Дата рождения">
                                                        <div class="input__placeholder input__placeholder--dark">Дата рождения</div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="input input--grey">
                                                        <input class="input__control" type="tel" placeholder="Телефон" data-inputmask="'mask': '+7 (999) 999-99-99'">
                                                        <div class="input__placeholder input__placeholder--dark">Телефон</div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="input input--grey">
                                                        <input class="input__control" type="email" placeholder="E-mail">
                                                        <div class="input__placeholder input__placeholder--dark">E-mail</div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <button class="btn btn--white profile-edit__submit">Сохранить</button>
                                                </div>
                                            </div>
                                            <p class="text-bold mb-30 delivery-address">Адрес доставки</p>
                                            <div class="row profile-edit__wrap">
                                                <div class="col-md-9">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="input input--grey">
                                                                <input class="input__control" type="text" placeholder="Страна">
                                                                <div class="input__placeholder input__placeholder--dark">Страна</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="input input--grey">
                                                                <input class="input__control" type="text" placeholder="Город">
                                                                <div class="input__placeholder input__placeholder--dark">Город</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="input input--grey">
                                                                <input class="input__control" type="text" placeholder="Улица и дом">
                                                                <div class="input__placeholder input__placeholder--dark">Улица и дом</div>
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
                                                                <input class="input__control" type="text" placeholder="Кв./офис">
                                                                <div class="input__placeholder input__placeholder--dark">Кв./офис</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="input input--grey">
                                                                <input class="input__control" type="text" placeholder="Домофон">
                                                                <div class="input__placeholder input__placeholder--dark">Домофон</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="input input--grey">
                                                                <input class="input__control" type="text" placeholder="Подъезд">
                                                                <div class="input__placeholder input__placeholder--dark">Подъезд</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="input input--grey">
                                                                <input class="input__control" type="text" placeholder="Этаж">
                                                                <div class="input__placeholder input__placeholder--dark">Этаж</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <button class="btn btn--white profile-edit__submit">Сохранить</button>
                                                </div>
                                            </div>
                                        </form>


                                    </div>
                                    <div class="admin-editor__events">
                                        <div class="row">
                                            <div class="col-md-7">
                                                <div class="lk-title">Редактировать событие</div>
                                                <div class="admin-editor__event mb-20">
                                                    <div class="search__block --flex --aicn">
                                                        <div class="input">
                                                            <input class="search__input" type="text" placeholder="Поиск">
                                                        </div>
                                                        <button class="btn btn--black">Найти</button>
                                                    </div>
                                                </div>
                                                <div class="admin-editor__event mb-20">
                                                    <div class="select-form">
                                                        <div class="select">
                                                            <div class="select__main">
                                                                <div class="select__placeholder">Услуга</div>
                                                                <div class="select__values"> </div>
                                                            </div>
                                                            <div class="select__list">
                                                                <div class="select__item select__item--checkbox">
                                                                    <label class="checkbox checkbox--record">
                                                                        <input type="checkbox"><span> </span>
                                                                        <div class="checbox__name --flex --aic --jcsb">
                                                                            <div class="select__name">Внутривенное введение лекарственных препаратов - капельница (Антиоксидантная)</div>
                                                                            <div>6 000 ₽</div>
                                                                        </div>
                                                                    </label>
                                                                </div>
                                                                <div class="select__item select__item--checkbox">
                                                                    <label class="checkbox checkbox--record">
                                                                        <input type="checkbox"><span> </span>
                                                                        <div class="checbox__name --flex --aic --jcsb">
                                                                            <div class="select__name">Дерматологический пилинг Cosmedix Purity ретиноевый</div>
                                                                            <div>7 000 ₽</div>
                                                                        </div>
                                                                    </label>
                                                                </div>
                                                                <div class="select__item select__item--checkbox">
                                                                    <label class="checkbox checkbox--record">
                                                                        <input type="checkbox"><span> </span>
                                                                        <div class="checbox__name --flex --aic --jcsb">
                                                                            <div class="select__name">Дерматологический пилинг Enerpeel Jessners салициловый-резорциновый</div>
                                                                            <div>7 000 ₽</div>
                                                                        </div>
                                                                    </label>
                                                                </div>
                                                                <div class="select__item select__item--checkbox">
                                                                    <label class="checkbox checkbox--record">
                                                                        <input type="checkbox"><span> </span>
                                                                        <div class="checbox__name --flex --aic --jcsb">
                                                                            <div class="select__name">Дерматологический пилинг для кожи с гиперпигментацией "SC Pigment Balancing Peel"</div>
                                                                            <div>7 000 ₽</div>
                                                                        </div>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="admin-editor__type-event">
                                                    <p class="mb-10">Тип события</p>
                                                    <div class="text-radios">
                                                        <label class="text-radio">
                                                            <input type="radio" name="status" checked><span>В клинике</span>
                                                        </label>
                                                        <label class="text-radio">
                                                            <input type="radio" name="status"><span>Онлайн</span>
                                                        </label>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="select-form select-checkboxes">
                                                                <div class="select">
                                                                    <div class="select__main">
                                                                        <div class="select__placeholder">Выберите специалиста</div>
                                                                        <div class="select__values"></div>
                                                                    </div>
                                                                    <div class="select__list">
                                                                        <div class="select__item select__item--checkbox">
                                                                            <label class="checkbox checkbox--record">
                                                                                <input type="checkbox"><span> </span>
                                                                                <div class="checbox__name">
                                                                                    <div class="select__name">Хачатурян Любовь Андреева 1</div>
                                                                                </div>
                                                                            </label>
                                                                        </div>
                                                                        <div class="select__item select__item--checkbox">
                                                                            <label class="checkbox checkbox--record">
                                                                                <input type="checkbox" checked="checked"><span> </span>
                                                                                <div class="checbox__name">
                                                                                    <div class="select__name">Хачатурян Любовь Андреева 2</div>
                                                                                </div>
                                                                            </label>
                                                                        </div>
                                                                        <div class="select__item select__item--checkbox">
                                                                            <label class="checkbox checkbox--record">
                                                                                <input type="checkbox"><span> </span>
                                                                                <div class="checbox__name">
                                                                                    <div class="select__name">Хачатурян Любовь Андреева 3</div>
                                                                                </div>
                                                                            </label>
                                                                        </div>
                                                                        <div class="select__item select__item--checkbox">
                                                                            <label class="checkbox checkbox--record">
                                                                                <input type="checkbox"><span> </span>
                                                                                <div class="checbox__name">
                                                                                    <div class="select__name">Хачатурян Любовь Андреева 4</div>
                                                                                </div>
                                                                            </label>
                                                                        </div>
                                                                        <div class="select__item select__item--checkbox">
                                                                            <label class="checkbox checkbox--record">
                                                                                <input type="checkbox"><span> </span>
                                                                                <div class="checbox__name">
                                                                                    <div class="select__name">Хачатурян Любовь Андреева 5</div>
                                                                                </div>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="input input-lk-calendar input--grey">
                                                                <input class="input__control datetimepickr" type="text" placeholder="Выбрать дату и время">
                                                                <div class="input__placeholder">Выбрать дату и время</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="admin-editor__patient">
                                                    <div class="lk-title">Выбраны услуги</div>
                                                    <div class="search__drop-item">
                                                        <div class="search__drop-name">
                                                            <div class="search__drop-delete">
                                                                <svg class="svgsprite _delete">
                                                                    <use xlink:href="/assets/img/sprites/svgsprites.svg#delete"></use>
                                                                </svg>
                                                            </div>
                                                            <div class="search__drop-tags">
                                                                <div class="search__drop-tag --yellow">Л</div>
                                                            </div>Прием (осмотр, консультация врача-дерматовенеролога главного врача первичный (включает составление плана лечения).
                                                        </div>
                                                        <label class="search__drop-right">
                                                            <div class="search__drop-summ">7 000 ₽</div>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="admin-editor__summ">
                                                    <p>Всего</p>
                                                    <p>7 000 ₽ </p>
                                                </div>
                                                <div class="admin-editor__patient mb-40">
                                                    <div class="row acount__photos-wrap mb-20">
                                                        <div class="col-md-6">
                                                            <div class="acount__photo">
                                                                <p>Фото до начала лечения</p><img src="./assets/img/experts/1.jpg" alt="">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="acount__photo">
                                                                <p>Фото в процессе лечения</p><img src="./assets/img/experts/1.jpg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row acount__photos-wrap">
                                                        <div class="col-md-2"> <a class="btn btn--white --openpopup" href="#" data-popup="--photo">Добавить фото</a></div>
                                                    </div>
                                                </div>
                                                <button class="btn btn--white">Сохранить</button>
                                            </div>
                                            <div class="col-md-1"></div>
                                            <div class="col-md-4 --jcfe --flex">
                                                <textarea class="admin__editor-textarea" placeholder="Добавить комментарий"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="acount__table-accardeon accardeon --ocean acount__table-accardeon--pmin">
                                <div class="acount__table-main accardeon__main acount__table-auto">
                                    <div class="admin-events-item heap">
                                        <div class="accardeon__click"></div>
                                        <div class="flag-date">
                                            <label class="checkbox">
                                                <input type="checkbox"><span> </span>
                                            </label>
                                            <button class="flag-date__ico">
                                                <svg class="svgsprite _flag">
                                                    <use xlink:href="/assets/img/sprites/svgsprites.svg#flag"></use>
                                                </svg>
                                            </button>
                                            <span class="dt"><strong class="title">Событие: </strong>16.10.2021 <br>08:45</span>
                                        </div>
                                    </div>
                                    <div class="admin-events-item">
                                        <p>Приём</p>
                                        <span class="dt">17.10.2021 <br>10:42</span>
                                    </div>
                                    <div class="admin-events-item">
                                        <p>ФИО</p><a href="#">Цветкова Дарья Михайловна</a>
                                    </div>
                                    <div class="admin-events-item">
                                        <p>Телефон</p>+7 (939) 333-33-33
                                    </div>
                                    <div class="admin-events-item">
                                        <p>Специалист</p>Хачатурян Любовь Андреева
                                    </div>
                                    <div class="admin-events-item">
                                        <p>Тип</p>
                                    </div>
                                    <div class="admin-events-item">
                                        <p>Услуга</p>Уходы и маски<br>Фотолечение BBL
                                    </div>
                                    <div class="admin-events-item">
                                        <p>Оплата</p>Ожидает оплаты
                                    </div>
                                    <div class="admin-events-item">
                                        <p>Статус</p>Не дозвонился
                                    </div>
                                    <div class="admin-events-item">
                                        <p>Комментарии</p>Прием (осмотр, консультация) врача-дерматовенеролога КМН
                                    </div>
                                </div>
                                <div class="acount__table-list accardeon__list admin-editor">
                                    <div class="admin-editor__top">
                                        <div class="admin-editor__top-info">
                                            <div class="lk-title">Редактировать профиль</div>
                                            <div class="admin-editor__name user__edit">Меркушева Эля Евгеньевна
                                                <button class="user__edit">
                                                    <svg class="svgsprite _edit">
                                                        <use xlink:href="/assets/img/sprites/svgsprites.svg#edit"></use>
                                                    </svg>
                                                </button>
                                            </div>
                                            <div class="admin-editor__iser-contacts">
                                                <p>Дата рождения: <span>08.10.1999</span></p>
                                                <p>Телефон: <span>+7 (927) 124-99-68</span></p>
                                            </div>
                                        </div>
                                        <div class="admin-editor__top-status">
                                            <div class="admin-editor__top-date">Заявка сформирована 16.10.2021 / 08:45</div>
                                            <div class="admin-editor__top-select">
                                                <div class="select-form">
                                                    <div class="select">
                                                        <div class="select__main">Статус оплаты</div>
                                                        <div class="select__list">
                                                            <div class="select__item">Есть предоплата</div>
                                                            <div class="select__item">Не оплачено</div>
                                                            <div class="select__item">Не требует оплаты</div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="select-form">
                                                    <div class="select">
                                                        <div class="select__main">Изменить статус</div>
                                                        <div class="select__list">
                                                            <div class="select__item select__item--acc-yellow">Необработанная заявка</div>
                                                            <div class="select__item select__item--acc-red">Не дозвонился</div>
                                                            <div class="select__item select__item--acc-purple">Отложенный звонок</div>
                                                            <div class="select__delimiter"></div>
                                                            <div class="select__item select__item--acc-yellow">Предстоящее событие</div>
                                                            <div class="select__item select__item--acc-green">Состоявшееся событие</div>
                                                            <div class="select__item select__item--acc-blue">Отмена визита (дорого)</div>
                                                            <div class="select__item select__item--acc-light-blue">Отмена визита (подумаем)</div>
                                                            <div class="select__item select__item--acc-ocean">Отмена визита (без причины)</div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="admin-editor__edit-profile">
                                        <form class="profile-edit">
                                            <p class="text-bold mb-30">Редактировать профиль</p>
                                            <div class="row profile-edit__wrap">
                                                <div class="col-md-3">
                                                    <div class="input input--grey">
                                                        <input class="input__control datebirthdaypickr" type="text" placeholder="Дата рождения">
                                                        <div class="input__placeholder input__placeholder--dark">Дата рождения</div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="input input--grey">
                                                        <input class="input__control" type="tel" placeholder="Телефон" data-inputmask="'mask': '+7 (999) 999-99-99'">
                                                        <div class="input__placeholder input__placeholder--dark">Телефон</div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="input input--grey">
                                                        <input class="input__control" type="email" placeholder="E-mail">
                                                        <div class="input__placeholder input__placeholder--dark">E-mail</div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <button class="btn btn--white profile-edit__submit">Сохранить</button>
                                                </div>
                                            </div>
                                            <p class="text-bold mb-30 delivery-address">Адрес доставки</p>
                                            <div class="row profile-edit__wrap">
                                                <div class="col-md-9">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="input input--grey">
                                                                <input class="input__control" type="text" placeholder="Страна">
                                                                <div class="input__placeholder input__placeholder--dark">Страна</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="input input--grey">
                                                                <input class="input__control" type="text" placeholder="Город">
                                                                <div class="input__placeholder input__placeholder--dark">Город</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="input input--grey">
                                                                <input class="input__control" type="text" placeholder="Улица и дом">
                                                                <div class="input__placeholder input__placeholder--dark">Улица и дом</div>
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
                                                                <input class="input__control" type="text" placeholder="Кв./офис">
                                                                <div class="input__placeholder input__placeholder--dark">Кв./офис</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="input input--grey">
                                                                <input class="input__control" type="text" placeholder="Домофон">
                                                                <div class="input__placeholder input__placeholder--dark">Домофон</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="input input--grey">
                                                                <input class="input__control" type="text" placeholder="Подъезд">
                                                                <div class="input__placeholder input__placeholder--dark">Подъезд</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="input input--grey">
                                                                <input class="input__control" type="text" placeholder="Этаж">
                                                                <div class="input__placeholder input__placeholder--dark">Этаж</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <button class="btn btn--white profile-edit__submit">Сохранить</button>
                                                </div>
                                            </div>
                                        </form>


                                    </div>
                                    <div class="admin-editor__events">
                                        <div class="row">
                                            <div class="col-md-7">
                                                <div class="lk-title">Редактировать событие</div>
                                                <div class="admin-editor__event mb-20">
                                                    <div class="search__block --flex --aicn">
                                                        <div class="input">
                                                            <input class="search__input" type="text" placeholder="Поиск">
                                                        </div>
                                                        <button class="btn btn--black">Найти</button>
                                                    </div>
                                                </div>
                                                <div class="admin-editor__event mb-20">
                                                    <div class="select-form">
                                                        <div class="select">
                                                            <div class="select__main">
                                                                <div class="select__placeholder">Услуга</div>
                                                                <div class="select__values"> </div>
                                                            </div>
                                                            <div class="select__list">
                                                                <div class="select__item select__item--checkbox">
                                                                    <label class="checkbox checkbox--record">
                                                                        <input type="checkbox"><span> </span>
                                                                        <div class="checbox__name --flex --aic --jcsb">
                                                                            <div class="select__name">Внутривенное введение лекарственных препаратов - капельница (Антиоксидантная)</div>
                                                                            <div>6 000 ₽</div>
                                                                        </div>
                                                                    </label>
                                                                </div>
                                                                <div class="select__item select__item--checkbox">
                                                                    <label class="checkbox checkbox--record">
                                                                        <input type="checkbox"><span> </span>
                                                                        <div class="checbox__name --flex --aic --jcsb">
                                                                            <div class="select__name">Дерматологический пилинг Cosmedix Purity ретиноевый</div>
                                                                            <div>7 000 ₽</div>
                                                                        </div>
                                                                    </label>
                                                                </div>
                                                                <div class="select__item select__item--checkbox">
                                                                    <label class="checkbox checkbox--record">
                                                                        <input type="checkbox"><span> </span>
                                                                        <div class="checbox__name --flex --aic --jcsb">
                                                                            <div class="select__name">Дерматологический пилинг Enerpeel Jessners салициловый-резорциновый</div>
                                                                            <div>7 000 ₽</div>
                                                                        </div>
                                                                    </label>
                                                                </div>
                                                                <div class="select__item select__item--checkbox">
                                                                    <label class="checkbox checkbox--record">
                                                                        <input type="checkbox"><span> </span>
                                                                        <div class="checbox__name --flex --aic --jcsb">
                                                                            <div class="select__name">Дерматологический пилинг для кожи с гиперпигментацией "SC Pigment Balancing Peel"</div>
                                                                            <div>7 000 ₽</div>
                                                                        </div>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="admin-editor__type-event">
                                                    <p class="mb-10">Тип события</p>
                                                    <div class="text-radios">
                                                        <label class="text-radio">
                                                            <input type="radio" name="status" checked><span>В клинике</span>
                                                        </label>
                                                        <label class="text-radio">
                                                            <input type="radio" name="status"><span>Онлайн</span>
                                                        </label>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="select-form select-checkboxes">
                                                                <div class="select">
                                                                    <div class="select__main">
                                                                        <div class="select__placeholder">Выберите специалиста</div>
                                                                        <div class="select__values"></div>
                                                                    </div>
                                                                    <div class="select__list">
                                                                        <div class="select__item select__item--checkbox">
                                                                            <label class="checkbox checkbox--record">
                                                                                <input type="checkbox"><span> </span>
                                                                                <div class="checbox__name">
                                                                                    <div class="select__name">Хачатурян Любовь Андреева 1</div>
                                                                                </div>
                                                                            </label>
                                                                        </div>
                                                                        <div class="select__item select__item--checkbox">
                                                                            <label class="checkbox checkbox--record">
                                                                                <input type="checkbox" checked="checked"><span> </span>
                                                                                <div class="checbox__name">
                                                                                    <div class="select__name">Хачатурян Любовь Андреева 2</div>
                                                                                </div>
                                                                            </label>
                                                                        </div>
                                                                        <div class="select__item select__item--checkbox">
                                                                            <label class="checkbox checkbox--record">
                                                                                <input type="checkbox"><span> </span>
                                                                                <div class="checbox__name">
                                                                                    <div class="select__name">Хачатурян Любовь Андреева 3</div>
                                                                                </div>
                                                                            </label>
                                                                        </div>
                                                                        <div class="select__item select__item--checkbox">
                                                                            <label class="checkbox checkbox--record">
                                                                                <input type="checkbox"><span> </span>
                                                                                <div class="checbox__name">
                                                                                    <div class="select__name">Хачатурян Любовь Андреева 4</div>
                                                                                </div>
                                                                            </label>
                                                                        </div>
                                                                        <div class="select__item select__item--checkbox">
                                                                            <label class="checkbox checkbox--record">
                                                                                <input type="checkbox"><span> </span>
                                                                                <div class="checbox__name">
                                                                                    <div class="select__name">Хачатурян Любовь Андреева 5</div>
                                                                                </div>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="input input-lk-calendar input--grey">
                                                                <input class="input__control datetimepickr" type="text" placeholder="Выбрать дату и время">
                                                                <div class="input__placeholder">Выбрать дату и время</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="admin-editor__patient">
                                                    <div class="lk-title">Выбраны услуги</div>
                                                    <div class="search__drop-item">
                                                        <div class="search__drop-name">
                                                            <div class="search__drop-delete">
                                                                <svg class="svgsprite _delete">
                                                                    <use xlink:href="/assets/img/sprites/svgsprites.svg#delete"></use>
                                                                </svg>
                                                            </div>
                                                            <div class="search__drop-tags">
                                                                <div class="search__drop-tag --yellow">Л</div>
                                                            </div>Прием (осмотр, консультация врача-дерматовенеролога главного врача первичный (включает составление плана лечения).
                                                        </div>
                                                        <label class="search__drop-right">
                                                            <div class="search__drop-summ">7 000 ₽</div>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="admin-editor__summ">
                                                    <p>Всего</p>
                                                    <p>7 000 ₽ </p>
                                                </div>
                                                <div class="admin-editor__patient mb-40">
                                                    <div class="row acount__photos-wrap mb-20">
                                                        <div class="col-md-6">
                                                            <div class="acount__photo">
                                                                <p>Фото до начала лечения</p><img src="./assets/img/experts/1.jpg" alt="">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="acount__photo">
                                                                <p>Фото в процессе лечения</p><img src="./assets/img/experts/1.jpg" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row acount__photos-wrap">
                                                        <div class="col-md-2"> <a class="btn btn--white --openpopup" href="#" data-popup="--photo">Добавить фото</a></div>
                                                    </div>
                                                </div>
                                                <button class="btn btn--white">Сохранить</button>
                                            </div>
                                            <div class="col-md-1"></div>
                                            <div class="col-md-4 --jcfe --flex">
                                                <textarea class="admin__editor-textarea" placeholder="Добавить комментарий"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</view>

<edit header="ЛК Админа - главная">
    <div>
        <wb-module wb="module=yonger&mode=edit&block=common.inc" />
    </div>
</edit>