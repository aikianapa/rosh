<view>
    <a class="phone --openpopup" href="#" data-popup="--fast"><svg class="svgsprite _phone">
            <use xlink:href="/assets/img/sprites/svgsprites.svg#phone"></use>
        </svg></a>


    <div>
        <wb-module wb="module=yonger&mode=render&view=popups-login" />
    </div>


    <div class="popup --fast">
        <template>
            <div class="popup__overlay"></div>
            <div class="popup__panel">
                <button class="popup__close">
                    <svg class="svgsprite _close">
                        <use xlink:href="/assets/img/sprites/svgsprites.svg#close"></use>
                    </svg>
                </button>
                <div class="popup__name text-bold">Быстрая запись</div>
                <form class="popup__form" method="post">
                    <div class="input input--grey">
                        <input class="input__control" name="fullname" type="text" placeholder="ФИО" required>
                        <div class="input__placeholder">ФИО</div>
                    </div>
                    <div class="input input--grey">
                        <input class="input__control" name="phone" type="tel" placeholder="Номер телефона" data-inputmask="'mask': '+7 (999) 999-99-99'" required>
                        <div class="input__placeholder">Номер телефона</div>
                    </div>
                    <div class="input input--grey">
                        <textarea class="input__control" name="comment" placeholder="Причина обращения" required></textarea>
                        <div class="input__placeholder">Причина обращения</div>
                    </div>
                    <div class="form__description">Нажимая на кнопку "Перезвонить мне", Вы даете согласие на обработку своих персональных данных на основании <a href="/policy">Политики конфиденциальности</a></div>
                    <button class="btn btn--black form__submit" type="button" on-click="submit">Перезвонить мне</button>
                    <div class="form-bottom">После отправки заявки для Вас будет создан Личный кабинет, в&nbsp;который можно попасть через кнопку &laquo;Войти&raquo; в&nbsp;верхнем меню сайта</div>
                </form>
            </div>
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
        </template>
    </div>
    <script wbapp remove>
        let popFast = new Ractive({
            el: '.popup.--fast',
            template: document.querySelector('.popup.--fast > template').innerHTML,
            data: {},
            on: {
                submit() {
                    let form = this.find('.popup.--fast .popup__form')
                    if ($(form).verify()) {
                        let post = $(form).serializeJson()
                        wbapp.post('/form/quotes/getQuote',post,function(data){
                            if (data.error) {
                                wbapp.trigger('wb-save-error',{'data':data})
                            } else {
                                $('.popup.--fast .popup__panel:not(.--succed)').addClass('d-none')
                                $('.popup.--fast .popup__panel.--succed').addClass('d-block')
                            }
                        })
                    }
                }
            }
        })
    </script>

    <div class="popup --form-send">
        <div class="popup__overlay"></div>
        <div class="popup__panel">
            <button class="popup__close">
                <svg class="svgsprite _close">
                    <use xlink:href="/assets/img/sprites/svgsprites.svg#close"></use>
                </svg>
            </button>
            <div class="popup__name text-bold">Перезвонить мне</div>
            <h3 class="h3">Успешно !</h3>
            <p class="text-grey">Мы перезвоним Вам в ближайшее время</p>
        </div>
    </div>

    <div class="popup --recover-password">
        <div class="popup__overlay"></div>
        <div class="popup__panel">
            <button class="popup__close">
                <svg class="svgsprite _close">
                    <use xlink:href="/assets/img/sprites/svgsprites.svg#close"></use>
                </svg>
            </button>
            <div class="popup__name text-bold">Восстановление пароля</div>
            <h3 class="h3">Пароль успешно обновлен</h3>
        </div>
    </div>

    <div class="popup --fast-make">
        <div class="popup__overlay"></div>
        <div class="popup__panel">
            <button class="popup__close">
                <svg class="svgsprite _close">
                    <use xlink:href="/assets/img/sprites/svgsprites.svg#close"></use>
                </svg>
            </button>
            <div class="popup__name text-bold">Быстрая запись</div>
            <form class="popup__form">
                <div class="input input--grey">
                    <input class="input__control" type="text" placeholder="ФИО">
                    <div class="input__placeholder">ФИО</div>
                </div>
                <div class="input input--grey">
                    <input class="input__control" type="tel" placeholder="Номер телефона" data-inputmask="'mask': '+7 (999) 999-99-99'">
                    <div class="input__placeholder">Номер телефона</div>
                </div>
                <label class="checkbox mainfilter__checkbox hider-checkbox" data-hide-input="expert">
                    <input class="checkbox-hidden-next-form" type="checkbox"><span></span>
                    <div class="checbox__name text-grey">Я не знаю, кого выбрать</div>
                </label>
                <div class="select-form" data-hide="expert">
                    <div class="select">
                        <div class="select__main">Хачатурян Любовь Андреева</div>
                        <div class="select__list">
                            <div class="select__item active">Хачатурян Любовь Андреева</div>
                            <div class="select__item">Хачатурян Любовь Андреева</div>
                            <div class="select__item">Хачатурян Любовь Андреева</div>
                            <div class="select__item">Хачатурян Любовь Андреева</div>
                        </div>
                    </div>
                </div>
                <p class="text-grey text-grey mb-10">Необязательно</p>
                <div class="input input--grey">
                    <textarea class="input__control" placeholder="Причина обращения"></textarea>
                    <div class="input__placeholder">Причина обращения</div>
                </div>
                <div class="form__description">Нажимая на кнопку "Перезвонить мне", Вы даете согласие на обработку своих персональных данных на основании <a href="/policy">Политики конфиденциальности</a></div>
                <button class="btn btn--black form__submit">Перезвонить мне</button>
                <div class="form-bottom">После отправки заявки для Вас будет создан Личный кабинет, в&nbsp;который можно попасть через кнопку &laquo;Войти&raquo; в&nbsp;верхнем меню сайта</div>
            </form>
        </div>
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


    <div class="popup --service">
        <div class="popup__overlay"></div>
        <div class="popup__panel">
            <button class="popup__close">
                <svg class="svgsprite _close">
                    <use xlink:href="/assets/img/sprites/svgsprites.svg#close"></use>
                </svg>
            </button>
            <div class="popup__name text-bold">Лицо</div>
            <h2 class="h2 mb-20">Консультация врача</h2>
            <div class="popup__img"><img src="/assets/img/popup/1.jpg" alt=""></div>
            <p class="text-bold text-big mb-10">На консультации в медицинском центре РОШ врач-дерматолог:</p>
            <div class="text">
                <p class="mb-10">Врач выслушает ваши жалобы, расспросит об образе жизни, аллергических реакциях.</p>
                <p class="mb-10">Проведет дерматологическое обследование всего кожного покрова, пигментный скрининг.</p>
                <p class="mb-10">Назначит дополнительное обследование, лечение, а также даст рекомендации по образу жизни.
                </p>
            </div>
        </div>
    </div>

    <div class="popup --service-l">
        <div class="popup__overlay"></div>
        <div class="popup__panel">
            <button class="popup__close">
                <svg class="svgsprite _close">
                    <use xlink:href="/assets/img/sprites/svgsprites.svg#close"></use>
                </svg>
            </button>
            <div class="popup__name text-bold">Лицо</div>
            <div class="popup__content">
            <h2 class="h2 mb-20">Консультация врача</h2>
            <div class="popup__img"><img src="/assets/img/popup/1.jpg" alt=""></div>
            <p class="text-bold text-big mb-10">На консультации в медицинском центре РОШ врач-дерматолог:</p>
            <div class="text">
                <p class="mb-10">Врач выслушает ваши жалобы, расспросит об образе жизни, аллергических реакциях.</p>
                <p class="mb-10">Проведет дерматологическое обследование всего кожного покрова, пигментный скрининг.</p>
                <p class="mb-10">Назначит дополнительное обследование, лечение, а также даст рекомендации по образу жизни.
                </p>
            </div><a class="btn btn--black" href="/landing.html">Читать подробнее</a>
            </div>
        </div>
    </div>

    <div class="popup --problems">
        <div class="popup__overlay"></div>
        <div class="popup__panel">
            <button class="popup__close">
                <svg class="svgsprite _close">
                    <use xlink:href="/assets/img/sprites/svgsprites.svg#close"></use>
                </svg>
            </button>
            <div class="popup__name text-bold">Аллергия на коже</div>
            <h2 class="h2 mb-20">Аллергия на коже</h2>
            <div class="text">
                <p class="mb-10">Ответственны за этот процесс клетки иммунной системы – белки крови – иммуноглобулины Е. Они начинают вырабатываться при попадании в организм аллергена, который для каждого человека индивидуален. Аллергия проявляется в виде высыпаний, шелушения
                    и покраснения кожных покровов, зуда, часто – затруднение дыхания, насморк, слезоточивость.жизни.</p>
            </div>
            <div class="popup__img"><img src="/assets/img/popup/1.jpg" alt=""></div>
            <h2 class="h2 mb-20">Лечение в Rosh</h2>
            <div class="text">
                <p class="mb-10">Диагноз «аллергия» ставится после проведения соответствующей диагностики: кожных проб и анализа крови, в некоторых случаях, при помощи лабораторных исследований можно выявить конкретный аллерген, но не всегда. В медицинском центре ROSH
                    для диагностики и лечения аллергии мы также применяем биорезонансный аппарат BICOM.</p>
            </div>
            <div class="row mb-30">
                <div class="col-md-6">
                    <div class="popup__img"><img src="/assets/img/popup/1.jpg" alt=""></div>
                </div>
                <div class="col-md-6">
                    <div class="popup__img"><img src="/assets/img/popup/1.jpg" alt=""></div>
                </div>
            </div><a class="btn btn--black" href="#">Читать подробнее</a>
        </div>
    </div>

    <div class="popup --record">
        <div class="popup__overlay"></div>
        <div class="popup__panel">
            <button class="popup__close">
                <svg class="svgsprite _close">
                    <use xlink:href="/assets/img/sprites/svgsprites.svg#close"></use>
                </svg>
            </button>
            <div class="popup__name text-bold">Запись на прием</div>
            <div class="text-bold mb-10">Разделы услуг</div>
            <div class="popups__text-chexboxs">
                <label class="text-radio">
                    <input type="radio" name="status"><span>Лицо</span>
                </label>
                <label class="text-radio switch-blocks">
                    <input type="radio" name="status"><span>Тело</span>
                </label>
                <label class="text-radio switch-blocks">
                    <input type="radio" name="status"><span>Волосы</span>
                </label>
                <label class="text-radio switch-blocks">
                    <input type="radio" name="status"><span>Гинекология</span>
                </label>
                <label class="text-radio switch-blocks">
                    <input type="radio" name="status"><span>Лаборатория</span>
                </label>
            </div>
            <div class="input">
                <input class="search__input" type="text" placeholder="Поиск по услугам" id="popup-services-list">
                <div class="search__drop">
                    <label class="search__drop-item">
                        <div class="search__drop-name">Прием (осмотр, консультация врача-дерматовенеролога главного
                            врача первичный (включает составление плана лечения).</div>
                        <div class="search__drop-right">
                            <div class="search__drop-tags">
                                <div class="search__drop-tag --yellow">Л</div>
                                <div class="search__drop-tag --green">Т</div>
                            </div>
                            <div class="search__drop-summ">7 000 ₽</div>
                            <div class="search__drop-check">
                                <div class="checkbox">
                                    <input type="checkbox"><span></span>
                                </div>
                            </div>
                        </div>
                    </label>
                    <label class="search__drop-item">
                        <div class="search__drop-name">Дерматологический пилинг Cosmedix Purity ретиноевый</div>
                        <div class="search__drop-right">
                            <div class="search__drop-tags">
                                <div class="search__drop-tag --yellow">Л</div>
                            </div>
                            <div class="search__drop-summ">7 000 ₽</div>
                            <div class="search__drop-check">
                                <div class="checkbox">
                                    <input type="checkbox"><span></span>
                                </div>
                            </div>
                        </div>
                    </label>
                    <label class="search__drop-item">
                        <div class="search__drop-name">Дерматологический пилинг Enerpeel Jessners
                            салициловый-резорциновый</div>
                        <div class="search__drop-right">
                            <div class="search__drop-tags">
                                <div class="search__drop-tag --yellow">Л</div>
                                <div class="search__drop-tag --green">Т</div>
                            </div>
                            <div class="search__drop-summ">7 000 ₽</div>
                            <div class="search__drop-check">
                                <div class="checkbox">
                                    <input type="checkbox"><span></span>
                                </div>
                            </div>
                        </div>
                    </label>
                    <label class="search__drop-item">
                        <div class="search__drop-name">Дерматологический пилинг для кожи с гиперпигментацией "SC Pigment
                            Balancing Peel"</div>
                        <div class="search__drop-right">
                            <div class="search__drop-tags">
                                <div class="search__drop-tag --yellow">Л</div>
                                <div class="search__drop-tag --green">Т</div>
                            </div>
                            <div class="search__drop-summ">7 000 ₽</div>
                            <div class="search__drop-check">
                                <div class="checkbox">
                                    <input type="checkbox"><span></span>
                                </div>
                            </div>
                        </div>
                    </label>
                </div>
                <button class="search__btn" type="button">
                    <svg class="svgsprite _search">
                        <use xlink:href="/assets/img/sprites/svgsprites.svg#search"></use>
                    </svg>
                </button>
            </div>
            <label class="checkbox checkbox--record show-checkbox" data-show-input="service">
                <input class="checkbox-visible-next-form" type="checkbox"><span></span>
                <div class="checbox__name">Консультация врача</div>
            </label>
            <div class="select-form" style="display: none;" data-show="service">
                <div class="text-bold mb-20">Тип события</div>
                <div class="popups__text-chexboxs">
                    <label class="text-radio">
                        <input type="radio" name="status-service"><span>В клинике</span>
                    </label>
                    <label class="text-radio switch-blocks">
                        <input type="radio" name="status-service"><span>Онлайн</span>
                    </label>
                </div>
            </div>
            <label class="checkbox checkbox--record hider-checkbox" data-hide-input="service">
                <input class="checkbox-hidden-next-form" type="checkbox"><span></span>
                <div class="checbox__name">Мне лень искать в списке, скажу администратору</div>
            </label>
            <div class="select-form" data-hide="service">
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
                                    <div class="select__name">Внутривенное введение лекарственных препаратов -
                                        капельница (Антиоксидантная)</div>
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
                                    <div class="select__name">Дерматологический пилинг Enerpeel Jessners
                                        салициловый-резорциновый</div>
                                    <div>7 000 ₽</div>
                                </div>
                            </label>
                        </div>
                        <div class="select__item select__item--checkbox">
                            <label class="checkbox checkbox--record">
                                <input type="checkbox"><span> </span>
                                <div class="checbox__name --flex --aic --jcsb">
                                    <div class="select__name">Дерматологический пилинг для кожи с гиперпигментацией "SC
                                        Pigment Balancing Peel"</div>
                                    <div>7 000 ₽</div>
                                </div>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="service-checkboxs">
                <label class="search__drop-item">
                    <div class="search__drop-name">Прием (осмотр, консультация врача-дерматовенеролога главного врача
                        первичный (включает составление плана лечения).</div>
                    <div class="search__drop-right">
                        <div class="search__drop-tags"></div>
                        <div class="search__drop-summ">7 000 ₽</div>
                        <div class="search__drop-check">
                            <div class="checkbox">
                                <input type="checkbox"><span></span>
                            </div>
                        </div>
                    </div>
                </label>
            </div>
            <label class="checkbox checkbox--record hider-checkbox" data-hide-input="expert">
                <input class="checkbox-hidden-next-form" type="checkbox"><span></span>
                <div class="checbox__name">Я не знаю, кого выбрать</div>
            </label>
            <div class="select-form" data-hide="expert">
                <div class="select">
                    <div class="select__main">
                        <div class="select__placeholder">Выберите специалиста</div>
                        <div class="select__values"> </div>
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
                                <input type="checkbox"><span> </span>
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
            <div class="admin-editor__patient">
                <div class="text-bold mb-10">Выбраны услуги</div>
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
                <p>7 000 ₽</p>
            </div>
            <button class="btn btn--black form__submit"> Записаться</button>
        </div>
        <div class="popup__panel --succed">
            <button class="popup__close">
                <svg class="svgsprite _close">
                    <use xlink:href="/assets/img/sprites/svgsprites.svg#close"></use>
                </svg>
            </button>
            <div class="popup__name text-bold">Запись на прием</div>
            <h3 class="h3">Успешно !</h3>
            <p class="text-grey">Мы перезвоним Вам в ближайшее время</p>
        </div>
    </div>
    <script type="wbapp">
        var servicesList = [{
            "value": 'Прием (осмотр, консультация врача-дерматовенеролога главного врача первичный (включает составление плана лечения)',
            "data": {
                "tags": [{
                    "color": "yellow",
                    "tag": "Л"
                }, {
                    "color": "green",
                    "tag": "Т"
                }],
                "price": 7000
            }
        }, {
            "value": 'Дерматологический пилинг Cosmedix Purity ретиноевый',
            "data": {
                "tags": [{
                    "color": "yellow",
                    "tag": "Л"
                }, ],
                "price": 7000
            }
        }, {
            "value": 'Дерматологический пилинг Enerpeel Jessners салициловый-резорциновый',
            "data": {
                "tags": [{
                    "color": "yellow",
                    "tag": "Л"
                }, {
                    "color": "green",
                    "tag": "Т"
                }],
                "price": 7000
            }
        }, {
            "value": 'Дерматологический пилинг для кожи с гиперпигментацией "SC Pigment Balancing Peel"',
            "data": {
                "tags": [{
                    "color": "yellow",
                    "tag": "Л"
                }, {
                    "color": "green",
                    "tag": "Т"
                }],
                "price": 7000
            }
        }];

        $(function() {
            $('#popup-services-list').autocomplete({
                noCache: true,
                minChars: 1,
                //            delimiter    : ',',
                lookup: servicesList,
                beforeRender: function(container, suggestions) {
                    var CNT = $(container);
                    $(container).addClass('search__drop').html('');
                    $(suggestions).each(function(index) {
                        var PRICE = new Intl.NumberFormat('ru-RU').format(this.data.price);
                        var TAGS = $('<div></div>').addClass('search__drop-tags');
                        $(this.data.tags).each(function() {
                            TAGS.append(
                                $('<div></div>').addClass(
                                    'search__drop-tag --' + this.color).text(
                                    this.tag)
                            );
                        });
                        CNT.append(
                            $('<label></label>').addClass(
                                'search__drop-item autocomplete-suggestion').attr({
                                "data-index": index
                            }).append(
                                $('<div></div>').addClass('search__drop-name').text(this
                                    .value)
                            ).append(
                                $('<div></div>').addClass('search__drop-right').append(
                                    TAGS).append(
                                    $('<div></div>').addClass('search__drop-summ').text(
                                        PRICE + ' ₽')
                                )
                                /*.append(
                                $('<div></div>').addClass('search__drop-check').append(
                                    $('<div></div>').addClass('checkbox').append(
                                        $('<input type="checkbox">')
                                    ).append(
                                        $('<span></span>')
                                    )
                                )
                            ) */
                            )
                        )
                    });
                },
                onSelect: function(suggestion) {
                    console.log(suggestion.value);
                }
            });
        });
    </script>
    <div class="popup --analize-type">
        <div class="popup__overlay"></div>
        <div class="popup__panel">
            <button class="popup__close">
                <svg class="svgsprite _close">
                    <use xlink:href="/assets/img/sprites/svgsprites.svg#close"></use>
                </svg>
            </button>
            <div class="popup__name text-bold">Расшифровка анализов</div>
            <div class="text-bold mb-20">Тип события</div>
            <div class="popups__text-chexboxs">
                <label class="text-radio">
                    <input type="radio" name="status"><span>В клинике</span>
                </label>
                <label class="text-radio switch-blocks">
                    <input type="radio" name="status"><span>Онлайн</span>
                </label>
            </div>
            <p class="text-grey mb-30">Нажмите на способ получения анализа</p>
            <button class="btn btn--black popup__change --openpopup" data-popup="--pay-one">Далее</button>
        </div>
    </div>

    <div class="popup --pay">
        <div class="popup__overlay"></div>
        <div class="popup__panel">
            <button class="popup__close">
                <svg class="svgsprite _close">
                    <use xlink:href="/assets/img/sprites/svgsprites.svg#close"></use>
                </svg>
            </button>
            <div class="popup__name text-bold">Расшифровка анализов</div>
            <h3 class="h3">В ближайшее время с вами свяжутся для определения удобной даты</h3>
            <div class="text-grey text-small mb-10">Стоимость услуги</div>
            <div class="popup-summ">
                <div class="popup-summ__big">5 000 ₽</div>
                <div class="popup-summ__small">Предоплата - 1 000 ₽</div>
            </div>
            <div class="popup__description">Для подтверждения записи необходимо произвести оплату в размере 20% от стоимости услуги</div>
            <div class="form-bottom --flex">
                <button class="btn btn--white form__submit --switchpopup" type="button">Назад</button>
                <button class="btn btn--black form__submit --switchpopup" type="button">Внести предоплату</button>
            </div>
        </div>
        <div class="popup__panel --succed">
            <button class="popup__close">
                <svg class="svgsprite _close">
                    <use xlink:href="/assets/img/sprites/svgsprites.svg#close"></use>
                </svg>
            </button>
            <div class="popup__name text-bold">Запись на прием</div>
            <h3 class="h3">Успешно !</h3>
            <p class="text-grey">Мы перезвоним Вам в ближайшее время</p>
        </div>
    </div>

    <div class="popup --pay-one">
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
                <div class="popup-summ__big">5 000 ₽</div>
                <div class="popup-summ__small">Предоплата - 1 000 ₽</div>
            </div>
            <div class="popup__description text-grey mb-30">Для подтверждения записи необходимо произвести оплату в размере 20% от стоимости услуги</div>
            <button class="btn btn--black form__submit --switchpopup" type="button">Внести предоплату</button>
        </div>
        <div class="popup__panel --succed">
            <button class="popup__close">
                <svg class="svgsprite _close">
                    <use xlink:href="/assets/img/sprites/svgsprites.svg#close"></use>
                </svg>
            </button>
            <div class="popup__name text-bold">Внести предоплату</div>
            <h3 class="h3">Успешно !</h3>
            <p class="text-grey">Информация о предстоящем приеме будет доступна в Личном кабинете</p>
        </div>
    </div>

    <div class="popup --download">
        <div class="popup__overlay"></div>
        <div class="popup__panel">
            <button class="popup__close">
                <svg class="svgsprite _close">
                    <use xlink:href="/assets/img/sprites/svgsprites.svg#close"></use>
                </svg>
            </button>
            <div class="popup__name text-bold">Расшифровка анализов</div>
            <div class="select-form">
                <div class="select input">
                    <div class="select__main">Все специалисты</div>
                    <div class="select__list">
                        <div class="select__item">Консультация врача</div>
                        <div class="select__item">Коррекция витаминно-минерального обмена (капельницы)</div>
                        <div class="select__item">Лазерный пилинг</div>
                        <div class="select__item">Липолитики</div>
                        <div class="select__item">Массаж лица</div>
                    </div>
                </div>
            </div>
            <div class="select-form">
                <div class="select input">
                    <div class="select__main">Все администраторы</div>
                    <div class="select__list">
                        <div class="select__item">Консультация врача</div>
                        <div class="select__item">Коррекция витаминно-минерального обмена (капельницы)</div>
                        <div class="select__item">Лазерный пилинг</div>
                        <div class="select__item">Липолитики</div>
                        <div class="select__item">Массаж лица</div>
                    </div>
                </div>
            </div>
            <div class="input">
                <input class="input__control daterangepickr" type="text" placeholder="За весь период">
                <div class="input__placeholder">За весь период</div>
            </div>
            <div class="input">
                <input class="input__control datebirthdaypickr" type="text" placeholder="Дата рождения">
                <div class="input__placeholder">Дата рождения</div>
            </div>
            <label class="checkbox checkbox--record">
                <input type="checkbox"><span></span>
                <div class="checbox__name">Выгрузить только список номеров</div>
            </label>
            <div class="input">
                <input class="input__control" type="tel" placeholder="Номер телефона" data-inputmask="'mask': '+7 (999) 999-99-99'">
                <div class="input__placeholder">Номер телефона</div>
            </div>
            <label class="checkbox checkbox--record">
                <input type="checkbox"><span></span>
                <div class="checbox__name">Введите только список е-мейлов</div>
            </label>
            <div class="input">
                <input class="input__control" type="email" placeholder="Ваш е-мейл">
                <div class="input__placeholder">Введите е-мейл</div>
            </div><a class="btn btn--black" href="#" download> Скачать</a>
        </div>
    </div>

    <div class="popup --filter">
        <div class="popup__overlay"></div>
        <div class="popup__panel">
            <button class="popup__close">
                <svg class="svgsprite _close">
                    <use xlink:href="/assets/img/sprites/svgsprites.svg#close"></use>
                </svg>
            </button>
            <div class="popup__name text-bold">Расшифровка анализов</div>
            <form class="popup__form">
                <div class="radios --flex">
                    <label class="text-radio">
                        <input type="radio" name="status2"><span>Заявка</span>
                    </label>
                    <label class="text-radio">
                        <input type="radio" name="status2"><span>Событие</span>
                    </label>
                </div>
                <div class="input">
                    <input class="input__control" type="text" placeholder="ФИО">
                    <div class="input__placeholder">ФИО</div>
                </div>
                <div class="select-form">
                    <div class="select">
                        <div class="select__main">Все услуги</div>
                        <div class="select__list">
                            <div class="select__item">Все услуги</div>
                            <div class="select__item">Все услуги</div>
                            <div class="select__item">Все услуги</div>
                            <div class="select__item">Все услуги</div>
                        </div>
                    </div>
                </div>
                <div class="input">
                    <input class="input__control" type="tel" placeholder="Телефон" data-inputmask="'mask': '+7 (999) 999-99-99'">
                    <div class="input__placeholder">Телефон</div>
                </div>
                <div class="select-form">
                    <div class="select">
                        <div class="select__main">Все услуги</div>
                        <div class="select__list">
                            <div class="select__item">Все специалисты</div>
                            <div class="select__item">Все специалисты</div>
                            <div class="select__item">Все специалисты</div>
                            <div class="select__item">Все специалисты</div>
                        </div>
                    </div>
                </div>
                <div class="select-form">
                    <div class="select">
                        <div class="select__main">Статус</div>
                        <div class="select__list">
                            <div class="select__item">Статус</div>
                            <div class="select__item">Статус</div>
                            <div class="select__item">Статус</div>
                            <div class="select__item">Статус</div>
                        </div>
                    </div>
                </div>
                <div class="popup__block">
                    <p class="text-bold mb-10">Тип события</p>
                </div>
                <div class="radios --flex">
                    <label class="text-radio">
                        <input type="radio" name="status22"><span>В клинике</span>
                    </label>
                    <label class="text-radio">
                        <input type="radio" name="status22"><span>Онлайн</span>
                    </label>
                </div>
                <div class="calendar input mb-30">
                    <input class="input__control daterangepickr" type="text" placeholder="За весь период">
                    <div class="input__placeholder">За весь период</div>
                </div>
                <button class="btn btn--black">Найти</button>
            </form>
        </div>
    </div>
    <div class="popup --photo">
        <div class="popup__overlay"></div>
        <div class="popup__panel">
            <button class="popup__close">
                <svg class="svgsprite _close">
                    <use xlink:href="/assets/img/sprites/svgsprites.svg#close"></use>
                </svg>
            </button>
            <div class="popup__name text-bold">Добавить фото</div>
            <form class="popup__form">
                <div class="search-form input">
                    <input class="input__control" type="text" placeholder="Выбрать пациента">
                    <div class="input__placeholder">Выбрать пациента</div>
                </div>
                <div class="input calendar mb-20">
                    <input class="input__control datepickr" type="text" placeholder="Выбрать дату посещения">
                    <div class="input__placeholder">Выбрать дату посещения</div>
                </div>
                <div class="popup-title__checkbox">
                    <p class="mb-10">Выбрать статус</p>
                    <label class="checkbox mb-10">
                        <input type="checkbox"><span></span>
                        <div class="checbox__name">Продолжительное лечение</div>
                    </label>
                </div>
                <div class="radios --flex">
                    <label class="text-radio">
                        <input type="radio" name="status233"><span>В клинике</span>
                    </label>
                    <label class="text-radio">
                        <input type="radio" name="status233"><span>Онлайн</span>
                    </label>
                </div>
                <label class="file-photo">
                    <input type="file">
                    <div class="file-photo__ico">
                        <svg class="svgsprite _file">
                            <use xlink:href="/assets/img/sprites/svgsprites.svg#file"></use>
                        </svg>
                    </div>
                    <div class="file-photo__text text-grey">Для загрузки фото заполните все поля <br>Фото не должно
                        превышать 10 мб</div>
                </label>
                <button class="btn btn--white">Сохранить</button>
            </form>
        </div>
    </div>
    <div class="popup --photo-edit">
        <div class="popup__overlay"></div>
        <div class="popup__panel">
            <button class="popup__close">
                <svg class="svgsprite _close">
                    <use xlink:href="/assets/img/sprites/svgsprites.svg#close"></use>
                </svg>
            </button>
            <div class="popup__name text-bold">Редактор фото</div>
            <form class="popup__form">
                <div class="edit-photo">
                    <div class="--flex --aicn">
                        <div class="edit-photo__pic"><img src="/assets/img/popup/photo.png" alt=""></div>
                        <div class="edit-photo__info">
                            <div class="edit-photo__name">Мартынова Александра Михайловна</div>
                            <div class="edit-photo__date">22.10.2021</div>
                        </div>
                    </div>
                    <div class="edit-photo__delete">
                        <svg class="svgsprite _delete">
                            <use xlink:href="/assets/img/sprites/svgsprites.svg#delete"></use>
                        </svg>
                    </div>
                </div>
                <div class="search-form input">
                    <input class="input__control" type="text" placeholder="Выбрать пациента">
                    <div class="input__placeholder">Выбрать пациента</div>
                </div>
                <div class="input calendar mb-20">
                    <input class="input__control datepickr" type="text" placeholder="Выбрать дату посещения">
                    <div class="input__placeholder">Выбрать дату посещения</div>
                </div>
                <div class="popup-title__checkbox">
                    <p class="mb-10">Выбрать статус</p>
                    <label class="checkbox mb-10">
                        <input type="checkbox"><span></span>
                        <div class="checbox__name">Продолжительное лечение</div>
                    </label>
                </div>
                <div class="radios --flex">
                    <label class="text-radio">
                        <input type="radio" name="status233"><span>В клинике</span>
                    </label>
                    <label class="text-radio">
                        <input type="radio" name="status233"><span>Онлайн</span>
                    </label>
                </div>
                <label class="file-photo">
                    <input type="file">
                    <div class="file-photo__ico">
                        <svg class="svgsprite _file">
                            <use xlink:href="/assets/img/sprites/svgsprites.svg#file"></use>
                        </svg>
                    </div>
                    <div class="file-photo__text text-grey">Для загрузки фото заполните все поля <br>Фото не должно
                        превышать 10 мб</div>
                </label>
                <button class="btn btn--white">Сохранить</button>
            </form>
        </div>
    </div>
    <div class="popup --create">
        <div class="popup__overlay"></div>
        <div class="popup__panel">
            <button class="popup__close">
                <svg class="svgsprite _close">
                    <use xlink:href="/assets/img/sprites/svgsprites.svg#close"></use>
                </svg>
            </button>
            <div class="popup__name text-bold">Создать карточку пациента</div>
            <form class="popup__form">
                <div class="input">
                    <input class="input__control" type="text" placeholder="ФИО">
                    <div class="input__placeholder">ФИО</div>
                </div>
                <div class="input">
                    <input class="input__control datebirthdaypickr" type="text" placeholder="Дата рождения">
                    <div class="input__placeholder">Дата рождения</div>
                </div>
                <div class="input mb-30">
                    <input class="input__control" type="tel" placeholder="Номер телефона" data-inputmask="'mask': '+7 (999) 999-99-99'">
                    <div class="input__placeholder">Номер телефона</div>
                </div>
                <button class="btn btn--black form__submit --switchpopup" data-popup="--code">Создать</button>
                <div class="form-bottom">После отправки заявки для пациента будет создан Личный кабинет, в&nbsp;который можно попасть через кнопку &laquo;Войти&raquo; в&nbsp;верхнем меню сайта</div>
            </form>
        </div>
    </div>
    <div class="popup --create-recover">
        <div class="popup__overlay"></div>
        <div class="popup__panel">
            <button class="popup__close">
                <svg class="svgsprite _close">
                    <use xlink:href="/assets/img/sprites/svgsprites.svg#close"></use>
                </svg>
            </button>
            <div class="popup__name text-bold">Создать карточку пациента</div>
            <form class="popup__form">
                <div class="input">
                    <input class="input__control" type="text" placeholder="ФИО">
                    <div class="input__placeholder">ФИО</div>
                </div>
                <div class="input">
                    <input class="input__control datebirthdaypickr" type="text" placeholder="Дата рождения">
                    <div class="input__placeholder">Дата рождения</div>
                </div><a class="--flex --jcfe mb-10" href="#"> Забыли пароль?</a>
                <div class="input mb-30">
                    <input class="input__control" type="tel" placeholder="Номер телефона" data-inputmask="'mask': '+7 (999) 999-99-99'">
                    <div class="input__placeholder">Номер телефона</div>
                    <div class="phone-alert">
                        <p>Данный номер уже используется</p>
                        <svg class="svgsprite _alert-grey">
                            <use xlink:href="/assets/img/sprites/svgsprites.svg#alert-grey"></use>
                        </svg>
                    </div>
                </div>
                <button class="btn btn--black form__submit --switchpopup" data-popup="--code">Создать</button>
                <div class="form-bottom">После отправки заявки для пациента создан Личный кабинет, в&nbsp;который можно попасть через кнопку &laquo;Войти&raquo; в&nbsp;верхнем меню сайта</div>
            </form>
        </div>
    </div>
    <div class="popup --create-appoint">
        <div class="popup__overlay"></div>
        <div class="popup__panel">
            <button class="popup__close">
                <svg class="svgsprite _close">
                    <use xlink:href="/assets/img/sprites/svgsprites.svg#close"></use>
                </svg>
            </button>
            <div class="popup__name text-bold">Записать пациента на прием</div>
            <form class="popup__form">
                <p class="text-bold text-big mb-20">Мартынова Александра Михайловна</p>
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
                                        <div class="select__name">Внутривенное введение лекарственных препаратов -
                                            капельница (Антиоксидантная)</div>
                                        <div>6 000 ₽</div>
                                    </div>
                                </label>
                            </div>
                            <div class="select__item select__item--checkbox">
                                <label class="checkbox checkbox--record">
                                    <input type="checkbox"><span> </span>
                                    <div class="checbox__name --flex --aic --jcsb">
                                        <div class="select__name">Дерматологический пилинг Cosmedix Purity ретиноевый
                                        </div>
                                        <div>7 000 ₽</div>
                                    </div>
                                </label>
                            </div>
                            <div class="select__item select__item--checkbox">
                                <label class="checkbox checkbox--record">
                                    <input type="checkbox"><span> </span>
                                    <div class="checbox__name --flex --aic --jcsb">
                                        <div class="select__name">Дерматологический пилинг Enerpeel Jessners
                                            салициловый-резорциновый</div>
                                        <div>7 000 ₽</div>
                                    </div>
                                </label>
                            </div>
                            <div class="select__item select__item--checkbox">
                                <label class="checkbox checkbox--record">
                                    <input type="checkbox"><span> </span>
                                    <div class="checbox__name --flex --aic --jcsb">
                                        <div class="select__name">Дерматологический пилинг для кожи с гиперпигментацией
                                            "SC Pigment Balancing Peel"</div>
                                        <div>7 000 ₽</div>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <p class="mb-10">Тип события</p>
                <div class="radios --flex">
                    <label class="text-radio">
                        <input type="radio" name="status233"><span>В клинике</span>
                    </label>
                    <label class="text-radio">
                        <input type="radio" name="status233"><span>Онлайн</span>
                    </label>
                </div>
                <div class="select-form">
                    <div class="select">
                        <div class="select__main">
                            <div class="select__placeholder">Выберите специалиста</div>
                            <div class="select__values"> </div>
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
                                    <input type="checkbox"><span> </span>
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
                <div class="calendar input mb-30">
                    <input class="input__control datetimepickr" type="text" placeholder="Выбрать дату и время">
                    <div class="input__placeholder">Выбрать время и дату</div>
                </div>
                <button class="btn btn--black">Продолжить</button>
            </form>
        </div>
    </div>

    <div class="popup --download-data">
        <div class="popup__overlay"></div>
        <div class="popup__panel">
            <button class="popup__close">
                <svg class="svgsprite _close">
                    <use xlink:href="/assets/img/sprites/svgsprites.svg#close"></use>
                </svg>
            </button>
            <div class="popup__name text-bold">Выгрузить данные</div>
            <form class="popup__form">
                <div class="select-form">
                    <div class="select">
                        <div class="select__main">Все услуги</div>
                        <div class="select__list">
                            <div class="select__item">Консультация врача</div>
                            <div class="select__item">Консультация врача</div>
                            <div class="select__item">Консультация врача</div>
                            <div class="select__item">Консультация врача</div>
                        </div>
                    </div>
                </div>
                <div class="select-form">
                    <div class="select">
                        <div class="select__main">Все специалисты</div>
                        <div class="select__list">
                            <div class="select__item">Специалист</div>
                            <div class="select__item">Специалист</div>
                            <div class="select__item">Специалист</div>
                        </div>
                    </div>
                </div>
                <div class="select-form">
                    <div class="select">
                        <div class="select__main">Все администраторы</div>
                        <div class="select__list">
                            <div class="select__item">Администратор</div>
                            <div class="select__item">Администратор</div>
                            <div class="select__item">Администратор</div>
                        </div>
                    </div>
                </div>
                <div class="calendar input">
                    <input class="input__control daterangepickr" type="text" placeholder="За весь период">
                    <div class="input__placeholder">За весь период</div>
                </div>
                <div class="select-form">
                    <label class="checkbox mainfilter__checkbox mb-10">
                        <input type="checkbox"><span></span>
                        <div class="checbox__name text-grey">Выгрузить только список номеров</div>
                    </label>
                    <div class="calendar input">
                        <input class="input__control" type="tel" placeholder="Номер телефона" data-inputmask="'mask': '+7 (999) 999-99-99'">
                        <div class="input__placeholder">Номер телефона</div>
                    </div>
                </div>
                <div class="select-form mb-30">
                    <label class="checkbox mainfilter__checkbox mb-10">
                        <input type="checkbox"><span></span>
                        <div class="checbox__name text-grey">Введите только список е-мейлов</div>
                    </label>
                    <div class="calendar input">
                        <input class="input__control" type="email" placeholder="Введите е-мейл">
                        <div class="input__placeholder">Введите е-мейл</div>
                    </div>
                </div>
                <button class="btn btn--black">Скачать</button>
            </form>
        </div>
    </div>
</view>
<edit header="Все попапы">
    <div>
        <wb-module wb="module=yonger&mode=edit&block=common.inc" />
    </div>
</edit>