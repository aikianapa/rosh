<view>
    <div class="mainfilter" id="mainfilter">
        <template>
            <div class="mainfilter__close --closefilter">
                <svg class="svgsprite _close">
                    <use xlink:href="/assets/img/sprites/svgsprites.svg#close"></use>
                </svg>
            </div>
            <div class="mainfilter__wrap row">
                {{#filter}}
                <div class="col-lg-9 col-md-8">
                    <div class="mainfilter__left">
                        {{#if texts.main.active == 'on'}}
                        <p>
                            {{texts.main.data.text}}
                        </p>
                        {{/if}}

                        <div class="mainfilter__tab-list">
                            <div class="mainfilter__tab-item data-tab-link active" data-tab="services" data-tabs="mainfilter">Услуги</div>
                            <div class="mainfilter__tab-item data-tab-link" data-tab="problems" data-tabs="mainfilter">Проблемы</div>
                            <div class="mainfilter__tab-item data-tab-link" data-tab="sympthoms" data-tabs="mainfilter">Симптомы</div>
                        </div>
                        <div class="mainfilter__tabs data-tab-wrapper" data-tabs="mainfilter">
                            <div class="mainfilter__tab data-tab-item active" data-tab="services">

                            {{#if texts.services.active == 'on'}}
                        <p>
                            {{texts.services.data.text}}
                        </p>
                        {{/if}}

                                {{#each services}}
                                    <div class="accardeon" data-category="{{id}}">
                                        <div class="accardeon__main accardeon__click" on-click="getServices">
                                            <div class="accardeon__name --{{data.color}}">{{name}}</div>
                                        </div>
                                        <div class="accardeon__list">
                                            <div class="row">
                                                {{#each items}}
                                                    <div class="col-lg-4">
                                                        <label class="checkbox mainfilter__checkbox" 
                                                            data-id="{{../../id}}_{{id}}" 
                                                            data-color="{{../../data.color}}"
                                                            data-cname="{{../../name}}"
                                                            data-service="{{id}}">
                                                            <input type="checkbox" on-change="toggleService"><span> </span>
                                                            <div class="checbox__name">{{header}}</div>
                                                            <a class="checbox__link --openpopup" data-popup="--service-l" href="#" on-click="viewService">Подробнее</a>
                                                        </label>
                                                    </div>
                                                {{/each}}
                                            </div>
                                        </div>
                                    </div>
                                {{/each}}
                            </div>
                            <div class="mainfilter__tab data-tab-item" data-tab="problems">

                            {{#if texts.problems.active == 'on'}}
                        <p>
                            {{texts.problems.data.text}}
                        </p>
                        {{/if}}
                                {{#each problems}}
                                    {{#if id != "gyn"  }}
                                        {{#if id != "lab"  }}
                                            <div class="accardeon-group">
                                                <div class="accrdeon__title" data-type="{{id}}">{{name}}</div>
                                                {{#each cats}}
                                                    {{#if id != "gyn"  }}
                                                        {{#if id != "lab"  }}
                                                            <div class="accardeon">
                                                                <div class="accardeon__main accardeon__click" data-category="{{id}}" on-click="getProblems">
                                                                    <div class="accardeon__name --{{data.color}}">{{name}}</div>
                                                                </div>
                                                                <div class="accardeon__list">
                                                                    <div class="row">
                                                                        {{#each items}}
                                                                            <div class="col-lg-4">
                                                                                <label class="checkbox mainfilter__checkbox" 
                                                                                    data-id="{{category}}_{{id}}" 
                                                                                    data-color="{{../../data.color}}"
                                                                                    data-cname="{{../../name}}"
                                                                                    data-category="{{category}}" 
                                                                                    data-problem="{{id}}">
                                                                                    <input type="checkbox" on-change="toggleProblem"><span> </span>
                                                                                    <div class="checbox__name">{{header}}</div>
                                                                                    <a class="checbox__link --openpopup" data-popup="--service-l" href="#">Подробнее</a>
                                                                                </label>
                                                                            </div>
                                                                        {{/each}}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        {{/if}}
                                                    {{/if}}
                                                {{/each}}
                                            </div>
                                        {{/if}}
                                    {{/if}}
                                {{/each}}
                                <div class="accardeon-group no-border">
                                    <div class="accrdeon__title">Гинекология</div>
                                    <div class="row">
                                        {{#each problems.gyn.cats.gyn.items}}
                                            <div class="col-lg-4">
                                                <label class="checkbox mainfilter__checkbox" data-id="{{category}}_{{id}}" 
                                                    data-category="{{category}}" data-problem="{{id}}"
                                                    data-color="{{../../data.color}}"
                                                    data-cname="{{../../name}}">
                                                    <input type="checkbox" on-change="toggleProblem"><span> </span>
                                                    <div class="checbox__name">{{header}}</div><a class="checbox__link --openpopup" data-popup="--service-l" href="#">Подробнее</a>
                                                </label>
                                            </div>
                                        {{/each}}
                                    </div>
                                </div>
                            </div>
                            <div class="mainfilter__tab data-tab-item" data-tab="sympthoms">
                            {{#if texts.sympthoms.active == 'on'}}
                        <p>
                            {{texts.sympthoms.data.text}}
                        </p>
                        {{/if}}

                                <div class="accrdeon__title">Симптомы</div>
                                <div class="row">
                                    {{#each symptoms}}
                                        <div class="col-lg-4">
                                            <label class="checkbox mainfilter__checkbox" 
                                                data-id="{{id}}"
                                                data-color="{{../../data.color}}"
                                                data-cname="{{../../name}}">
                                                <input type="checkbox" on-change="toggleSymptom"><span> </span>
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
                            {{#each choice.services}}
                                <div class="mainfilter-tag">
                                    <div class="mainfilter-tag__name">
                                        <div class="mainfilter-tag__delete" data-id="{{id}}" on-click="delete">
                                            <svg class="svgsprite _delete">
                                                <use xlink:href="assets/img/sprites/svgsprites.svg#delete"></use>
                                            </svg>
                                        </div> <a class="mainfilter-tag__link" href="/landing.html">{{header}}</a>
                                    </div>
                                    <div class="mainfilter-tag__group --{{color}}">{{liter}}</div>
                                </div>
                            {{/each}}
                            {{#each choice.problems}}
                                <div class="mainfilter-tag">
                                    <div class="mainfilter-tag__name">
                                        <div class="mainfilter-tag__delete" data-id="{{id}}" on-click="delete">
                                            <svg class="svgsprite _delete">
                                                <use xlink:href="assets/img/sprites/svgsprites.svg#delete"></use>
                                            </svg>
                                        </div> <a class="mainfilter-tag__link" href="/landing.html">{{header}}</a>
                                    </div>
                                    <div class="mainfilter-tag__group --{{color}}">{{liter}}</div>
                                </div>
                            {{/each}}
                            {{#each choice.symptoms}}
                                <div class="mainfilter-tag">
                                    <div class="mainfilter-tag__name">
                                        <div class="mainfilter-tag__delete" data-id="{{id}}" on-click="delete">
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
                                <h5 class="h5">Обратная связь</h5>
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
                {{/filter}}
            </div>
        </template>
    </div>
    <script>
        if (wbapp.data('choice') == undefined) wbapp.data('choice', {})
        var choice = wbapp.data('choice')
        var mainFilter = new Ractive({
            el: '#mainfilter',
            template: $('#mainfilter template').html(),
            data: {
                'choice': choice,
                'filter':{}
            },
            on: {
                complete() {
                    this.fire('checkChoose')
                },
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
                    this.fire('checkChoose')
                },
                getProblems(ev) {
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
                    mainFilter.update('srvtypes.' + srvtype + '.categories.' + category + '.problems')

                    this.fire('checkChoose')
                },
                delete(ev) {
                    did = $(ev.node).data('id')
                    $(document).find('#mainfilter label[data-id="' + did + '"]').trigger('click')
                    console.log(did, $(document).find('#mainfilter label[data-id="' + did + '"]'));
                },
                toggleService(ev) {
                    let input = $(ev.node)
                    let label = $(input).parent('.mainfilter__checkbox')
                    let data = $(label).data()
                    let cid = $(label).parents('[data-category]').data('category')
                    let choice = mainFilter.get('choice.services')
                    if (choice == undefined) choice = {}
                    if ($(input).is(':checked')) {
                        let header = $(label).find('.checbox__name').text().trim()
                        let liter = $(label).data('cname').substring(0, 1).toUpperCase()
                        let color = $(label).data('color')
                        let item = {
                            id: data.id,
                            header: header,
                            liter: liter,
                            color: color
                        }
                        choice[data.id] = item
                    } else {
                        delete choice[data.id]
                    }
                    mainFilter.set('choice.services', choice)
                    wbapp.data('choice', this.get('choice'))
                    return false
                },
                toggleProblem(ev) {
                    let input = $(ev.node)
                    let label = $(input).parent('.mainfilter__checkbox')
                    let data = $(label).data()
                    let cid = $(label).parents('[data-category]').data('category')
                    let choice = mainFilter.get('choice.problems')
                    if (choice == undefined) choice = {}
                    if ($(input).is(':checked')) {
                        let header = $(label).find('.checbox__name').text().trim()
                        let liter = $(label).data('cname').substring(0, 1).toUpperCase()
                        let color = $(label).data('color')
                        let item = {
                            id: data.id,
                            header: header,
                            liter: liter,
                            color: color
                        }
                        choice[data.id] = item
                    } else {
                        delete choice[data.id]
                    }
                    mainFilter.set('choice.problems', choice)
                    wbapp.data('choice', this.get('choice'))
                    return false
                },
                toggleSymptom(ev) {
                    let input = $(ev.node)
                    let label = $(input).parent('.mainfilter__checkbox')
                    let data = $(label).data()
                    let choice = mainFilter.get('choice.symptoms')
                    if (choice == undefined) choice = {}
                    if ($(input).is(':checked')) {
                        let header = $(label).find('.checbox__name').text().trim()
                        let liter = 'С'
                        let color = 'yellow'
                        let item = {
                            id: data.id,
                            header: header,
                            liter: liter,
                            color: color
                        }
                        choice[data.id] = item
                    } else {
                        delete choice[data.id]
                    }
                    mainFilter.set('choice.symptoms', choice)
                    wbapp.data('choice', this.get('choice'))
                    return false
                },
                checkChoose() {
                    setTimeout(function(){
                    $.each(mainFilter.get('choice.services'), function(i, item) {
                        $(`[data-tab="services"] label[data-id=${item.id}] > input`).prop('checked', true);
                    })
                    $.each(mainFilter.get('choice.problems'), function(i, item) {
                        $(`[data-tab="problems"] label[data-id=${item.id}] > input`).prop('checked', true);
                    })
                    $.each(mainFilter.get('choice.symptoms'), function(i, item) {
                        $(`[data-tab="sympthoms"] label[data-id=${item.id}] > input`).prop('checked', true);
                    })
                    },100)
                },
                viewService(ev) {
                    let data = $(ev.node).parent('label').data()
                    let sid = data.service
                    let popup = $(ev.node).data('popup')
                    let title = $(ev.node).parents('.accardeon').find('.accardeon__name').text();
                    let form = $('body').find('div.' + popup + ':first')
                    $(form).find('.popup__name').text(title)
                    $(form).find('.popup__content').html("")
                    wbapp.get('/services/popup/' + sid, function(res) {
                        $(form).find('.popup__content').html(res)
                        $(form).show()
                    })
                }
            }
        })

        wbapp.get('/api/v2/func/problems/mainfilter', function(data) {
            mainFilter.set('filter', data);
        })

    </script>
</view>
<edit header="Основной фильтр">
    <div>
        <wb-module wb="module=yonger&mode=edit&block=common.inc" />
    </div>
</edit>