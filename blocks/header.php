<view>
    <wb-meta/>
    <wb-var cityPrefix="+7 (495) "/>
    <div class="scroll-container" data-scroll-container>

        <header class="header header--transparent header--fixed --unfilter">
            <!---div class="container --flex --jcsb --aicn"  wb-if="'{{_sess.user.role}}'=='' OR '{{_sess.user.role}}'=='admin' OR '{{_sess.user.role}}'=='client'"-->
            <div class="container --flex --jcsb --aicn" wb-if="in_array('{{_sess.user.role}}',['','client','admin'])">

                <wb-var hover_logo="{{is_hover_logo({{_route.uri}})}}"></wb-var>

                <a wb-if="'{{_var.hover_logo}}' == '0'" class="header__logo" href="/">
                    <img src="/assets/img/logo.svg" alt="{{_sett.header}}">
                </a>

                <a wb-if="'{{_var.hover_logo}}' == '1'" class="header__logo header__logo-red" href="/">
                    <div class="header__logo-wrap">
                        <div class="logo"><img src="/assets/img/logo.svg" alt="{{_sett.header}}"></div>
                        <!--<div class="logo-red"><img src="/assets/img/logo-red.svg" alt="{{_sett.header}}"></div>-->
                    </div>
                </a>


                <div class="header__left --flex --aicn" wb-if="in_array('{{_sess.user.role}}',['','client','admin'])">
                    <wb-var tel="+7{{_var.cityPrefix}}{{_var.cityPhone}}"/>
                    <wb-var tel='{{str_replace("+78","+7",{{_var.tel}})}}'/>
                    <div class="header__contacts"><a class="header__contact" href="tel:+{{text2tel({{_var.tel}})}}">
                            {{_var.cityPrefix}} <span>{{_var.cityPhone}}</span></a>
                        <div wb-if="'{{_route.uri}}' !=='/english'" class="header__contact header__contact--small">
                            {{_var.worktime}}
                        </div>
                        <wb-data wb="table=pages&item={{_route.item}}&field=blocks.contacts_english"
                                 wb-if="'{{_route.uri}}' =='/english'">
                            <div class="header__contact header__contact--small" wb-if="'{{worktime}}'>''">{{worktime}}
                            </div>
                        </wb-data>
                    </div>
                    <a wb-if="'{{_route.uri}}' !=='/english'" class="btn btn--white --openfilter"
                       onclick="window.mainFilter.fire('open')" href="#mainfilter">Подобрать услугу</a>
                </div>

                <div class="header__search" wb-off>
                    <template>
                        <div class="d-flex align-items-center" data-view="{{view}}">
                            <div class="input input--grey mb-0">
                                <div class="search__wrap">
                                    <input class="input__control" type="text" placeholder="Поиск" name="search"
                                           value="{{searchValue}}" on-keyup="search">
                                    <div class="search__results">
                                        <ul>
                                            {{#res}}
                                            <li>
                                                <a href="{{url}}">
                                                    <div class="search__results--img"
                                                         style="background-image: url('{{cover[0].img || image[0].img}}')"></div>
                                                    <span>{{header}}</span>
                                                </a>
                                            </li>
                                            {{/res}}
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn--white --openfilter ml-10" on-click="submit">Найти</button>
                        </div>
                    </template>
                </div>

                <script wbapp>
                    const tables = ["services", "blog", "experts"];

                    window.headerSearch = new Ractive({
                        el: ".header__search",
                        template: document.querySelector(".header__search template").innerHTML,
                        data: {
                            searchValue: "",
                            res: [],
                            view: false
                        },
                        on: {
                            complete() {
                                console.log("complete")
                            },
                            submit() {
                                const searchValue = this.get('searchValue').trim();
                                sessionStorage.setItem("search", searchValue);
                                console.log(searchValue);

                                if (searchValue) {
                                    window.location.href = '/search';
                                }
                            },
                            search(event) {
                                const searchValue = this.get('searchValue').trim();
                                const resBlock = document.querySelector(".search__results");

                                if (event.original.keyCode === 13 && searchValue) {
                                    sessionStorage.setItem("search", searchValue);

                                    window.location.href = '/search';
                                    return;
                                }

                                if (searchValue) {
                                    getRes(tables, searchValue);

                                    resBlock.style.maxHeight = 240 + "px";
                                    return;
                                }

                                resBlock.style.maxHeight = 0;
                            },
                        }
                    })

                    function getRes(tables, searchValue) {
                        const results = [];

                        tables.forEach(table => {
                            const result = fetch(`/api/v2/list/${table}?header~=${searchValue}&__token=${wbapp._session.token}`).then((res) => res.json()).then((data) => {
                                return data.map(post => {
                                    post.url = `/${post._table}/${post._id}`;

                                    return post;
                                })
                            })
                            results.push(result)
                        })

                        Promise.all(results).then(data => {
                            const res = [].concat(...data).sort((a, b) => {
                                const headerA = a.header.toLowerCase();
                                const headerB = b.header.toLowerCase();

                                if (headerA < headerB) {
                                    return -1;
                                }
                                if (headerA > headerB) {
                                    return 1;
                                }
                                return 0;
                            });

                            res.splice(6);

                            console.log("res:", res)

                            headerSearch.set('res', res);
                        })
                    }
                </script>

                <div class="header__right --flex --aicn" wb-if="'{{_sess.user.role}}'==''">
                    <button wb-if="'{{_route.uri}}' !=='/english'" class="btn btn-link --openpopup --mobile-fade"
                            data-popup="--fast">Записаться на прием
                    </button>
                    <button wb-if="'{{_route.uri}}' !=='/english'" class="btn btn-link enter --openpopup --mobile-fade"
                            data-popup="--enter-number">Войти
                    </button>
                    <a href="/basket" wb-if="'{{_route.uri}}' !=='/english'"
                       class="d-none hb-ico basket-ico header-basket"><i class="cart-total-qty">0</i></a>
                    <button wb-if="'{{_route.uri}}' !=='/english'" class="burger"></button>
                    <a class="pt-0 en-version" href="/" wb-if="'{{_route.uri}}' =='/english'">
                        <svg class="svgsprite _web">
                            <use xlink:href="/assets/img/sprites/svgsprites.svg#web"></use>
                        </svg>
                        Русская версия
                        <svg class="svgsprite _arrow-link">
                            <use xlink:href="/assets/img/sprites/svgsprites.svg#arrow-link"></use>
                        </svg>
                    </a>
                </div>

                <div class="header__left --flex --aicn baseline"
                     wb-if="in_array('{{_sess.user.role}}',['expert','main'])">
                    <wb-var tel="+7{{_var.cityPrefix}}{{_var.cityPhone}}"/>
                    <wb-var tel='{{str_replace("+78","+7",{{_var.tel}})}}'/>
                    <div class="header__contacts"><a class="header__contact" href="tel:+{{text2tel({{_var.tel}})}}">
                            {{_var.cityPrefix}} <span>{{_var.cityPhone}}</span></a>
                        <div wb-if="'{{_route.uri}}' !=='/english'" class="header__contact header__contact--small">
                            {{_var.worktime}}
                        </div>
                        <wb-data wb="table=pages&item={{_route.item}}&field=blocks.contacts_english"
                                 wb-if="'{{_route.uri}}' =='/english'">
                            <div class="header__contact header__contact--small" wb-if="'{{worktime}}'>''">{{worktime}}
                            </div>
                        </wb-data>
                    </div>
                </div>

                <div class="header__right --flex --aicn" wb-if="in_array('{{_sess.user.role}}',['client','admin'])">
                    <div wb-if="'{{_route.uri}}' !=='/english'" class="d-flex align-items-center">

                        <button class="btn btn-link --openpopup --mobile-fade" wb-if="'{{_sess.user.role}}'!=='expert'"
                                data-popup="--fast">Записаться на прием
                        </button>
                        <button class="btn btn-link profile-menu" wb-if="'{{_route.uri}}' !=='/english'">
                            Профиль
                            <svg class="svgsprite _drop">
                                <use xlink:href="/assets/img/sprites/svgsprites.svg#drop"></use>
                            </svg>
                            <div class="enter__panel">
                                <a class="enter__btn text-small" href="/cabinet">Мой кабинет</a>
                                <a class="enter__btn text-small" href="#" onclick="window.popupChangePassword();">
                                    Изменить пароль
                                </a>
                                <a class="enter__btn text-small signout" href="/signout">Выйти</a>
                            </div>
                        </button>
                        <div class="header__search-btn__wrap">
                            <template>
                                <button class="header__search-btn" data-view="{{view}}" on-click="click">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <g id="vuesax/linear/search-normal">
                                            <g id="search-normal">
                                                <path id="Vector"
                                                      d="M11.5 21C16.7467 21 21 16.7467 21 11.5C21 6.25329 16.7467 2 11.5 2C6.25329 2 2 6.25329 2 11.5C2 16.7467 6.25329 21 11.5 21Z"
                                                      stroke="#080E0D" stroke-width="1.5" stroke-linecap="round"
                                                      stroke-linejoin="round"/>
                                                <path id="Vector_2" d="M22 22L20 20" stroke="#080E0D" stroke-width="1.5"
                                                      stroke-linecap="round" stroke-linejoin="round"/>
                                            </g>
                                        </g>
                                    </svg>
                                </button>
                            </template>
                        </div>

                        <script wbapp>
                            window.headerSearchBtn = () => {
                                window.searchBtnView = new Ractive({
                                    el: ".header__search-btn__wrap",
                                    template: document.querySelector(".header__search-btn__wrap template").innerHTML,
                                    data: {
                                        view: true,
                                    },
                                    on: {
                                        complete() {
                                            console.log("header__search-btn active")
                                        },
                                        click() {
                                            if(window.innerWidth <= 1400) {
                                                window.location.href = "/search";
                                                return;
                                            }

                                            headerSearch.set("view", !headerSearch.get("view"));
                                            searchBtnView.set("view", false);

                                        }
                                    }
                                })
                            }
                            window.headerSearchBtn();
                        </script>

                        <div class="d-none" wb-if="'{{_route.uri}}' !=='/english'">
                            <a wb-if="'{{_sess.user.role}}'!=='expert'" href="/basket"
                               class="hb-ico basket-ico header-basket"><i class="cart-total-qty">0</i></a>
                        </div>
                        <button class="burger"></button>
                    </div>
                    <a class="pt-0 en-version" href="/" wb-if="'{{_route.uri}}' =='/english'">
                        <svg class="svgsprite _web">
                            <use xlink:href="/assets/img/sprites/svgsprites.svg#web"></use>
                        </svg>
                        Русская версия
                        <svg class="svgsprite _arrow-link">
                            <use xlink:href="/assets/img/sprites/svgsprites.svg#arrow-link"></use>
                        </svg>
                    </a>
                </div>
            </div>
            <div wb-if="'{{_sess.user.role}}'=='expert'">
                <div wb-if="'{{_route.uri}}' =='/english'">
                    <wb-var hover_logo="{{is_hover_logo({{_route.uri}})}}"></wb-var>

                    <a wb-if="'{{_var.hover_logo}}' == '0'" class="header__logo" href="/">
                        <img src="/assets/img/logo.svg" alt="{{_sett.header}}">
                        <img src="/assets/img/logo-red.svg" alt="{{_sett.header}}">
                    </a>

                    <a wb-if="'{{_var.hover_logo}}' == '1'" class="header__logo header__logo-red" href="/">
                        <div class="header__logo-wrap">
                            <div class="logo"><img src="/assets/img/logo.svg" alt="{{_sett.header}}"></div>
                            <div class="logo-red"><img src="/assets/img/logo-red.svg" alt="{{_sett.header}}"></div>
                        </div>
                    </a>
                </div>
                <div class="container --flex --jcsb --aicn cabinet-expert">
                    <div class="header__admin --flex --aicn" wb-if="'{{_route.uri}}' !=='/english'">
                        <a class="btn btn-link" href="/cabinet">Список событий</a>
                        <a class="btn btn-link" href="/cabinet/search">Пациенты</a>
                    </div>
                    <div class="header__right --flex --aicn" wb-if="'{{_route.uri}}' !=='/english'">
                        <button class="btn btn-link profile-menu">
                            Профиль
                            <svg class="svgsprite _drop">
                                <use xlink:href="/assets/img/sprites/svgsprites.svg#drop"></use>
                            </svg>
                            <div class="enter__panel">
                                <a class="enter__btn text-small" onclick="popupEditProfile();">Редактировать</a>
                                <a class="enter__btn text-small signout" href="/signout">Выйти</a>
                            </div>
                        </button>
                        <button class="burger"></button>
                    </div>


                    <div class="header__right --flex --aicn eng-only" wb-if="'{{_route.uri}}' =='/english'">
                        <a class="pt-0 en-version" href="/">
                            <svg class="svgsprite _web">
                                <use xlink:href="/assets/img/sprites/svgsprites.svg#web"></use>
                            </svg>
                            Русская версия
                            <svg class="svgsprite _arrow-link">
                                <use xlink:href="/assets/img/sprites/svgsprites.svg#arrow-link"></use>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <div wb-if="'{{_sess.user.role}}'=='main'">
                <div wb-if="'{{_route.uri}}' =='/english'">
                    <wb-var hover_logo="{{is_hover_logo({{_route.uri}})}}"></wb-var>

                    <a wb-if="'{{_var.hover_logo}}' == '0'" class="header__logo" href="/">
                        <img src="/assets/img/logo.svg" alt="{{_sett.header}}">
                        <img src="/assets/img/logo-red.svg" alt="{{_sett.header}}">
                    </a>

                    <a wb-if="'{{_var.hover_logo}}' == '1'" class="header__logo header__logo-red" href="/">
                        <div class="header__logo-wrap">
                            <div class="logo"><img src="/assets/img/logo.svg" alt="{{_sett.header}}"></div>
                            <div class="logo-red"><img src="/assets/img/logo-red.svg" alt="{{_sett.header}}"></div>
                        </div>
                    </a>
                </div>
                <div class="container --flex --jcsb --aicn cabinet-admin">
                    <div class="header__admin --flex --aicn" wb-if="'{{_route.uri}}' !=='/english'">
						<span class="lower-deck">
							<button class="btn btn--white loaddata --openpopup d-none d-lg-block"
                                    onclick="popupDownloadData();" data-popup="--download-data">
								<svg class="svgsprite _xl">
									<use xlink:href="/assets/img/sprites/svgsprites.svg#xl"></use>
								</svg>
								Выгрузить данные
							</button>
						</span>
                        <a class="btn btn-link" href="/cabinet">Заявки и события</a>
                        <a class="btn btn-link" href="/cabinet/search">Пациенты</a>
                        <a class="btn btn-link" href="/cabinet/photos">Медиатека</a>
                        <a class="btn btn-link" href="/cabinet/changes">Журнал изменений</a>

                        <button class="btn btn--white loaddata --openpopup d-sm-block d-lg-none d-md-none"
                                onclick="popupDownloadData();" data-popup="--download-data">
                            <svg class="svgsprite _xl">
                                <use xlink:href="/assets/img/sprites/svgsprites.svg#xl"></use>
                            </svg>
                            Выгрузить данные
                        </button>
                    </div>
                    <div class="header__right --flex --aicn fd-mobile-column" wb-if="'{{_route.uri}}' !=='/english'">
                        <button class="btn btn-link profile-menu">
                            Профиль
                            <svg class="svgsprite _drop">
                                <use xlink:href="/assets/img/sprites/svgsprites.svg#drop"></use>
                            </svg>
                            <div class="enter__panel">
                                <a class="enter__btn text-small" onclick="popupEditProfile();">Редактировать</a>
                                <a class="enter__btn text-small signout" href="/signout">Выйти</a>
                            </div>
                        </button>
                        <button class="burger" style="margin: 8px;padding-left: 14px;"></button>
                    </div>

                    <div class="header__left --flex --aicn" wb-if="'{{_route.uri}}' =='/english'">
                        <wb-var tel="+7{{_var.cityPrefix}}{{_var.cityPhone}}"/>
                        <wb-var tel='{{str_replace("+78","+7",{{_var.tel}})}}'/>
                        <div class="header__contacts"><a class="header__contact" href="tel:+{{text2tel({{_var.tel}})}}">
                                {{_var.cityPrefix}} <span>{{_var.cityPhone}}</span></a>
                            <div wb-if="'{{_route.uri}}' !=='/english'" class="header__contact header__contact--small">
                                {{_var.worktime}}
                            </div>
                            <wb-data wb="table=pages&item={{_route.item}}&field=blocks.contacts_english"
                                     wb-if="'{{_route.uri}}' =='/english'">
                                <div class="header__contact header__contact--small" wb-if="'{{worktime}}'>''">
                                    {{worktime}}
                                </div>
                            </wb-data>
                        </div>
                    </div>
                    <div class="header__right --flex --aicn" wb-if="'{{_route.uri}}' =='/english'">
                        <a class="pt-0 en-version" href="/">
                            <svg class="svgsprite _web">
                                <use xlink:href="/assets/img/sprites/svgsprites.svg#web"></use>
                            </svg>
                            Русская версия
                            <svg class="svgsprite _arrow-link">
                                <use xlink:href="/assets/img/sprites/svgsprites.svg#arrow-link"></use>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <div class="crumbs__en" wb-if="'{{_route.uri}}'=='/english'">
                <div class="container">
                    <div class="crumbs"><a class="crumbs__arrow" href="javascript:window.history.back();">
                            <svg class="svgsprite _crumbs-back-white">
                                <use xlink:href="assets/img/sprites/svgsprites.svg#crumbs-back-white"></use>
                            </svg>
                        </a><a class="crumbs__link" href="/">Home page</a>
                        <span class="crumbs__link">Contacts</span>
                    </div>
                </div>
            </div>
        </header>
    </div>

    <script>
        document.addEventListener("click", (e) => {
            const closestElement = (e.target.closest(".header__search") || e.target.closest(".header__search-btn__wrap")) || e.target;
            const className = closestElement.className;

            if (className !== "header__search" && className !== "header__search-btn__wrap") {
                window.headerSearch.set("searchValue", "");
                window.headerSearch.set("res", []);
                window.headerSearch.set("view", false);

                document.querySelector(".search__results").style.maxHeight = 0;

                window.searchBtnView.set("view", true);
            }
        })
        document.addEventListener("scroll", (e) => {
            window.headerSearch.set("searchValue", "");
            window.headerSearch.set("res", []);
            window.headerSearch.set("view", false);

            document.querySelector(".search__results").style.maxHeight = 0;

            window.searchBtnView.set("view", true);
        })
    </script>
</view>
<edit header="Заголовок сайта">
    <div>
        <wb-module wb="module=yonger&mode=edit&block=common.inc"/>
    </div>
    <wb-multilang wb-lang="{{_sett.locales}}" name="lang">
        <div class="form-group">
            <div class="col-12">
                <label class="form-control-label">{{_lang.name}}</label>
                <input type="text" class="form-control" name="header" placeholder="{{_lang.name}}">
            </div>
        </div>
        <div class="form-group">
            <div class="col-12">
                <wb-module wb="{'module':'jodit'}" name="text"/>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-6">
                <label class="form-control-label">{{_lang.button}}</label>
                <input type="text" class="form-control" name="button" placeholder="{{_lang.button}}">
            </div>
            <div class="col-md-6">
                <label class="form-control-label">{{_lang.link}}</label>
                <input type="text" class="form-control" name="link" placeholder="{{_lang.link}}">
            </div>
        </div>
        <wb-lang>
            [ru]
            header = "Шапка сайта"
            name = "Заголовок"
            button = Кнопка
            link = Ссылка
            [en]
            header = "Site header"
            name = "Header"
            button = Button
            link = Link
        </wb-lang>
    </wb-multilang>
</edit>
