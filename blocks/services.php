<view>

    <script wb-app>
        $(".crumbs").after(`
        <div class="title-flex --flex --jcsb">
        <button class="btn btn--black --openpopup" data-popup="--fast-make" href="#">Записаться на прием </button>
        </div>
        `)
        $(".crumbs + div.title-flex + h1").prependTo($(".crumbs + div.title-flex"))

        $(".all-tabs-item.data-tab-link[data-tab]").on('click', function(ev) {
            $(".search.search--service .search__input").trigger("keyup")
            let category = $(this).data('tab')
            wbapp.storage('services.list.category', category)
            console.log(category);
            if (category == undefined || category == '') {
                $(".all-tabs .data-tab-item[data-tab]").removeClass('active');
                $(".all-tabs .data-tab-item[data-tab=all]").addClass('active');
                $(".all-services .all-services__item[data-category]").show()
            } else {
                $(".all-tabs .data-tab-item[data-tab]").removeClass('active');
                $(".all-tabs .data-tab-item[data-tab=all]").addClass('active');
                $(".all-services .all-services__item").hide()
                $(".all-services .all-services__item[data-category*='" + category + "']").show()
            }
        })

        $(".search.search--service .search__input").on("keyup", function() {
            let regex = $(this).val();
            if (regex > ' ') {
                regex = new RegExp(regex, "gi");
                $(".all-services .all-services__item").each(function() {
                    let str = $(this).text()
                    str.match(regex) ? $(this).show() : $(this).hide();
                })
            } else {
                $(".all-services .all-services__item").show()
            }
        })

        setTimeout(() => {
            let category = wbapp.storage('services.list.category')
            if (category) {
                $(".all-tabs-item.data-tab-link[data-tab]").removeClass("active")
                $(".all-tabs-item.data-tab-link[data-tab=" + category + "]").addClass("active").trigger('click')
            }
        }, 500)
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
            <div class="all-tabs-item data-tab-link active" data-tabs="services" data-tab="">Все услуги</div>
            <wb-foreach wb="table=catalogs&item=srvcat&from=tree.data">
                <div class="all-tabs-item data-tab-link cursor-pointer" data-tabs="services" data-tab="{{id}}">{{name}}</div>
            </wb-foreach>
        </div>
        <div class="all-tabs data-tab-wrapper" data-tabs="services">
            <div class="all-tab data-tab-item active" data-tab="all">
                <div class="all-services" id="servicesList">
                    <wb-foreach wb="{
                        'table':'services',
                        'size':'40',
                        'sort': 'date:d',
                        'more': 'true',
                        'bind': 'site.list.services',
                        'filter':{
                            'id': {'$ne':'lab'},
                            'active':'on'
                        }
                    }">
                        <wb-var image="{{cover.0.img}}" wb-if="'{{cover.0.img}}'>''" else="/assets/img/all/1.jpg" />
                        <a class="all-services__item" href="/services/{{wbFurlGenerate({{header}})}}" data-category="{{category}}">
                            <div class="all-services__pic" style="background-image: url(/thumbc/255x157/src{{_var.image}})"></div>
                            <div class="all-services__name" wb-if="'{{header}}'>''">{{header}}</div>
                        </a>
                    </wb-foreach>
                </div>
            </div>
            <div class="all-tab data-tab-item" data-tab="lab" id="priceListLab">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="service" wb-tree="dict=shop_category&branch=lab&parent=false">
                                <div class="service__accardeon accardeon">
                                    <div class="accardeon__main service__main accardeon__click" wb-if="'{{name}}'>''">{{name}}</div>
                                    <div class="accardeon__list service__drop">
                                        <wb-foreach wb="table=price&tpl=false" wb-filter="active=on&category={{id}}">
                                        <div class="service__item">
                                            <div class="service__name" wb-if="'{{header}}'>''">{{header}}</div>
                                            <label class="service__right">
                                                <div class="service__price" wb-if="'{{price}}'>''">{{price}} ₽</div>
                                                <div class="service__checkbox">
                                                    <div class="checkbox">
                                                        <input type="checkbox" data-id="{{id}}"  wb-if="'{{price}}'>''" data-price="{{price}}" data-name="{{header}}" on-click="cartAdd">
                                                        <span> </span>
                                                    </div>
                                                </div>
                                            </label>
                                        </div>
                                        </wb-foreach>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4" wb-off>
                            <form class="all-form">
                                <div class="all-form__succed">
                                    <h3 class="h3">Успешно !</h3>
                                    <p class="text-grey">Мы перезвоним Вам в ближайшее время</p>
                                </div>
                                <div class="all-form__main">
                                    <div class="all-form__summ">
                                        <p>Всего </p>
                                        <p>0 ₽</p>
                                    </div>
                                    <p class="all-form__text">Выберите необходимые услуги — и калькулятор автоматически произведет суммарный расчет их стоимости. Для уточнения вашего результата вы можете оставить заявку.</p>
                                    <div class="all-form__services">
                                        <div class="all-form__service-title">Ваш выбор</div>

                                    </div>
                                    <div class="input">
                                        <input class="input__control" type="text" placeholder="ФИО">
                                        <div class="input__placeholder">ФИО</div>
                                    </div>
                                    <div class="input">
                                        <input class="input__control" type="tel" placeholder="Номер телефона" data-inputmask="'mask': '+7 (999) 999-99-99'">
                                        <div class="input__placeholder">Номер телефона</div>
                                    </div>
                                    <button class="all-form__submit btn btn--black mb-20">Записаться</button>
                                    <div class="form__description">Нажимая на кнопку "Записаться", Вы даете согласие на обработку своих персональных данных  на основании <a href="policy.html">Политики конфиденциальности</a></div>
                                    <div class="form-bottom">После отправки заявки для Вас будет создан Личный кабинет, в&nbsp;который можно попасть через кнопку «Войти» в&nbsp;верхнем меню сайта</div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

        </div>
    </div>
</view>

<edit header="Все услуги">
    <div>
        <wb-module wb="module=yonger&mode=edit&block=common.inc" />
    </div>
</edit>