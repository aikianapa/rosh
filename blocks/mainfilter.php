<view>
    <div class="mainfilter" id="mainfilter">
        <template>
            <div class="mainfilter__close --closefilter">
                <svg class="svgsprite _close">
                    <use xlink:href="/assets/img/sprites/svgsprites.svg#close"></use>
                </svg>
            </div>
            <div class="mainfilter__wrap row">
                <div class="col-lg-9 col-md-8">
                    <div class="mainfilter__left">
                        <div class="mainfilter__tab-list">
                            <div class="mainfilter__tab-item data-tab-link active" data-tab="services" data-tabs="mainfilter">Услуги</div>
                            <div class="mainfilter__tab-item data-tab-link" data-tab="problems" data-tabs="mainfilter">Проблемы</div>
                            <div class="mainfilter__tab-item data-tab-link" data-tab="sympthoms" data-tabs="mainfilter">Симптомы</div>
                        </div>
                        <div class="mainfilter__tabs data-tab-wrapper" data-tabs="mainfilter">
                            <div class="mainfilter__tab data-tab-item active" data-tab="services">
                                {{#each categories}}
                                    <div class="accardeon" data-category="{{id}}">
                                        <div class="accardeon__main accardeon__click" on-click="getServices">
                                            <div class="accardeon__name --{{data.color}}">{{name}}</div>
                                        </div>
                                        <div class="accardeon__list">
                                            <div class="row">
                                                {{#each services}}
                                                    <div class="col-lg-4">
                                                        <label class="checkbox mainfilter__checkbox" data-id="{{../../id}}_{{id}}" data-service="{{id}}" on-click="toggleChoise">
                                                            <input type="checkbox"><span> </span>
                                                            <div class="checbox__name">{{header}}</div>
                                                            <a class="checbox__link --openpopup" data-popup="--service-l" href="#">Подробнее</a>
                                                        </label>
                                                    </div>
                                                {{/each}}
                                            </div>
                                        </div>
                                    </div>
                                {{/each}}
                            </div>
                            <div class="mainfilter__tab data-tab-item" data-tab="problems">
                                {{#each srvtypes}}
                                    <div class="accardeon-group">
                                        <div class="accrdeon__title" data-type="{{id}}">{{name}}</div>
                                        {{#each categories}}
                                            <div class="accardeon">
                                                {{#if id != "gyn"  }}
                                                    {{#if id != "lab"  }}
                                                        <div class="accardeon__main accardeon__click" data-category="{{id}}" on-click="getProblems">
                                                            <div class="accardeon__name --{{data.color}}">{{name}}</div>
                                                        </div>
                                                        <div class="accardeon__list">
                                                            <div class="row">
                                                                {{#each ~/prblist}}
                                                                    <div class="col-lg-4">
                                                                        <label class="checkbox mainfilter__checkbox" data-category="{{category}}" data-problem="{{id}}" data-services="{{#each services}}{{this}}{{#if @last !== @index}},{{/if}}{{/each}}" on-click="toggleChoise">
                                                                            <input type="checkbox"><span> </span>
                                                                            <div class="checbox__name">{{header}}</div><a class="checbox__link --openpopup" data-popup="--service-l" href="#">Подробнее</a>
                                                                        </label>
                                                                    </div>
                                                                {{/each}}
                                                            </div>
                                                        </div>
                                                    {{/if}}
                                                {{/if}}
                                            </div>
                                        {{/each}}
                                    </div>
                                {{/each}}
                                <div class="accardeon-group no-border">
                                    <div class="accrdeon__title">Гинекология</div>
                                    <div class="row">
                                        {{#each gynecology}}
                                            <div class="col-lg-4">
                                                <label class="checkbox mainfilter__checkbox">
                                                    <input type="checkbox"><span> </span>
                                                    <div class="checbox__name">{{header}}</div><a class="checbox__link --openpopup" data-popup="--service-l" href="#">Подробнее</a>
                                                </label>
                                            </div>
                                        {{/each}}
                                    </div>
                                </div>
                            </div>
                            <div class="mainfilter__tab data-tab-item" data-tab="sympthoms">
                                <div class="accrdeon__title">Симптомы</div>
                                <div class="row">
                                    {{#each symptoms}}
                                        <div class="col-lg-4">
                                            <label class="checkbox mainfilter__checkbox">
                                                <input type="checkbox"><span> </span>
                                                <div class="checbox__name">{{header}}</div><a class="checbox__link --openpopup" data-popup="--service" href="#">Подробнее </a>
                                            </label>
                                        </div>
                                    {{/each}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 mainfilter__right">
                    <div class="mainfilter__choice">
                        <h5 class="h5">Ваш выбор</h5>
                        <div class="mainfilter__tags">
                            {{#each choice}}
                                <div class="mainfilter-tag">
                                    <div class="mainfilter-tag__name">
                                        <div class="mainfilter-tag__delete">
                                            <svg class="svgsprite _delete">
                                                <use xlink:href="assets/img/sprites/svgsprites.svg#delete"></use>
                                            </svg>
                                        </div> <a class="mainfilter-tag__link" href="/landing.html">{{header}}</a>
                                    </div>
                                    <div class="mainfilter-tag__group --{{color}}">{{liter}}</div>
                                </div>
                            {{/each}}
                        </div>
                    </div>
                    <div class="mainfilter__bottom">
                        <form class="mainfilter__form">
                            <div class="mainfilter__form-top">
                                <h5 class="h5">Ваш выбор</h5>
                                <div class="input input--grey">
                                    <input class="input__control" type="text" placeholder="ФИО">
                                    <div class="input__placeholder">ФИО</div>
                                </div>
                                <div class="input input--grey">
                                    <input class="input__control" type="tel" placeholder="Номер телефона" data-inputmask="'mask': '+7 (999) 999-99-99'">
                                    <div class="input__placeholder">Номер телефона</div>
                                </div>
                                <div class="input input--grey">
                                    <input class="input__control" type="email" placeholder="Ваш е-мейл">
                                    <div class="input__placeholder">Ваш е-мейл</div>
                                </div>
                                <div class="form__description">Нажимая на кнопку "Записаться", Вы даете согласие на обработку своих персональных данных на основании <a href="/policy">Политики
                                        конфиденциальности</a></div>
                                <button class="form__submit btn btn--black">Записаться</button>
                            </div>
                            <div class="mainfilter__form-bottom">После отправки заявки для Вас будет создан Личный кабинет, в который можно попасть через кнопку "Войти" в верхнем меню сайта</div>
                        </form>
                        <div class="mainfilter__succed"></div>
                    </div>
                </div>
            </div>
        </template>
    </div>
    <script>
        if (wbapp.data('choice') == undefined) wbapp.data('choice', {})
        var choice = wbapp.data('choice')
        var mainFilter = new Ractive({
            el: '#mainfilter',
            template: $('#mainfilter template').html(),
            on: {
                getServices(ev) {
                    let category = $(ev.node).parents('.accardeon').data('category')
                    let services = `categories.${category}.services`;
                    if (!mainFilter.get(services)) {
                        $(mainFilter.get('services')).each(function(i, item) {
                            if (item.category == '' || item.category == category) {
                                mainFilter.push(services, item)
                            }
                        })
                    }
                    this.fire('checkSevices')
                },
                getProblems(ev) {
                    mainFilter.set('prblist', {});
                    let srvtype = $(ev.node).parents('.accardeon-group').find('.accrdeon__title').data('type')
                    let category = $(ev.node).data('category')
                    let data = []
                    $.each(mainFilter.get('problems'), function(i, obj) {
                        let item = Object.assign({}, obj);
                        if (in_array(category, item.category) && srvtype == item.srvtype) {
                            item.category = category
                            data.push(item)
                        }
                    })
                    mainFilter.set('prblist', data);
                },
                toggleChoise(ev) {
                    let data = $(ev.node).data();
                    let services = mainFilter.get('services');
                    let choice = mainFilter.get('choice');
                    let toggleItem = function(obj,sid,cid) {
                        let item = Object.assign({}, obj);
                        let cartid = cid + '_' + sid
                        let liter = mainFilter.get(`categories.${cid}`).name.substring(0, 1)
                        let color = mainFilter.get(`categories.${cid}`).data.color
                        if (item.id == sid && (item.category == "" || item.category == cid)) {
                            if (choice[cartid] == undefined) {
                                item.category = cid
                                item.cartid = cartid
                                item.liter = liter.toUpperCase()
                                item.color = color
                                choice[cartid] = item
                                $(ev.node).find('input').prop('checked', true)
                            } else {
                                delete choice[cartid]
                                $(ev.node).find('input').prop('checked', false)
                            }
                            wbapp.data('choice', choice)
                            mainFilter.set('choice', choice)
                        }
                    }
                    if (data.service !== undefined) {
                        // клик в табе сервисов
                        let sid = data.service
                        let cid = $(ev.node).parents('.accardeon').data('category')
                        let cartid = data.id
                        $.each(services, function(i, obj) {
                            toggleItem(obj,sid,cid)
                        })
                    } else if (data.problem !== undefined) {
                        console.log(data);
                        let srvs = data.services.split(',')
                        let cid = data.category
                        $.each(srvs,function(i,sid){
                            $.each(mainFilter.get('services'),function(i,obj){
                                let item = Object.assign({}, obj);
                                if (item.id == sid && item.category == cid) toggleItem(item,sid,cid)
                            })
//                            toggleItem(obj,sid,cid)
                        })
                    }
                    return false
                },
                checkSevices() {
                    $.each(choice, function(i, item) {
                        $(`.mainfilter__checkbox[data-id=${item.cartid}] > input`).prop('checked', true);
                    })
                }
            }
        })
        mainFilter.set('choice', choice)
        wbapp.get('/api/v2/list/catalogs/srvcat', function(data) {
            mainFilter.set('categories', data.tree.data);
            mainFilter.set('srvtypes.categories', data.tree.data);
        })
        wbapp.get('/api/v2/list/catalogs/srvtype', function(data) {
            mainFilter.set('srvtypes', data.tree.data);
        })
        wbapp.post("/api/v2/list/services", {
                filter: {
                    active: 'on'
                }
            },
            function(data) {
                mainFilter.set('services', data);
            })

        wbapp.post("/api/v2/list/problems", {
                filter: {
                    active: 'on'
                }
            },
            function(data) {
                mainFilter.set('problems', data);
                let gynecology = [];
                $.each(data, function(i, obj) {
                    let item = Object.assign({}, obj);
                    if (in_array('gyn', item.category)) {
                        gynecology.push(item)
                    }
                })

                mainFilter.set('gynecology', gynecology);
            })
        wbapp.post("/api/v2/list/symptoms", {
                filter: {
                    active: 'on'
                }
            },
            function(data) {
                mainFilter.set('symptoms', data);
            })
    </script>
</view>
<edit header="Основной фильтр">
    <div>
        <wb-module wb="module=yonger&mode=edit&block=common.inc" />
    </div>
</edit>