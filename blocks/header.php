<view>
    <wb-var cityPrefix="+7 (495) " />
    <div class="scroll-container" data-scroll-container>

        <header class="header header--transparent header--fixed --unfilter">
            <!---div class="container --flex --jcsb --aicn"  wb-if="'{{_sess.user.role}}'=='' OR '{{_sess.user.role}}'=='admin' OR '{{_sess.user.role}}'=='client'"-->
            <div class="container --flex --jcsb --aicn" wb-if="in_array('{{_sess.user.role}}',['','client','expert','admin'])">

                <wb-var hover_logo="{{is_hover_logo({{_route.uri}})}}"></wb-var>

                <a wb-if="'{{_var.hover_logo}}' == '0'" class="header__logo" href="/">
                    <img src="/assets/img/logo.svg" alt="">
                    <img src="/assets/img/logo-red.svg" alt="">
                </a>

                <a wb-if="'{{_var.hover_logo}}' == '1'" class="header__logo header__logo-red" href="/">
                    <div class="header__logo-wrap">
                        <div class="logo"><img src="/assets/img/logo.svg" alt=""></div>
                        <div class="logo-red"><img src="/assets/img/logo-red.svg" alt=""></div>
                    </div>
                </a>


                <div class="header__left --flex --aicn" wb-if="in_array('{{_sess.user.role}}',['','client','admin'])">
                    <wb-var tel="+7{{_var.cityPrefix}}{{_var.cityPhone}}" />
                    <wb-var tel='{{str_replace("+78","+7",{{_var.tel}})}}' />
                    <div class="header__contacts"> <a class="header__contact" href="tel:+{{text2tel({{_var.tel}})}}">
                            {{_var.cityPrefix}} <b>{{_var.cityPhone}}</b></a>
                        <div wb-if="'{{_route.uri}}' !=='/english'" class="header__contact header__contact--small">{{_var.worktime}}</div>
                        <wb-data wb="table=pages&item={{_route.item}}&field=blocks.contacts_english" wb-if="'{{_route.uri}}' =='/english'">
                            <div class="header__contact header__contact--small" wb-if="'{{worktime}}'>''">{{worktime}}</div>
                        </wb-data>
                    </div>
	                <a class="btn btn--white --openfilter" href="#mainfilter">Подобрать услугу</a>
                </div>

                <div class="header__right --flex --aicn"  wb-if="'{{_sess.user.role}}'==''">
                    <button class="btn btn-link --openpopup --mobile-fade" data-popup="--fast">Записаться на прием</button>
                    <button wb-if="'{{_route.uri}}' !=='/english'" class="btn btn-link enter --openpopup --mobile-fade" data-popup="--enter-number">Войти</button>
                    <a href="/basket" class="hb-ico basket-ico header-basket"><i class="cart-total-qty">0</i></a>
                    <button class="burger"></button>
                </div>
                
                <div class="header__left --flex --aicn" wb-if="in_array('{{_sess.user.role}}',['expert','main'])">
                    <wb-var tel="+7{{_var.cityPrefix}}{{_var.cityPhone}}" />
                    <wb-var tel='{{str_replace("+78","+7",{{_var.tel}})}}' />
                    <div class="header__contacts"> <a class="header__contact" href="tel:+{{text2tel({{_var.tel}})}}">
                            {{_var.cityPrefix}} <b>{{_var.cityPhone}}</b></a>
                        <div wb-if="'{{_route.uri}}' !=='/english'" class="header__contact header__contact--small">{{_var.worktime}}</div>
                        <wb-data wb="table=pages&item={{_route.item}}&field=blocks.contacts_english" wb-if="'{{_route.uri}}' =='/english'">
                            <div class="header__contact header__contact--small" wb-if="'{{worktime}}'>''">{{worktime}}</div>
                        </wb-data>
                    </div>
                </div>
                <div class="header__right --flex --aicn" wb-if="in_array('{{_sess.user.role}}',['expert','client','admin'])">
                    <button class="btn btn-link --openpopup --mobile-fade" wb-if="'{{_sess.user.role}}'!=='expert'" data-popup="--fast">Записаться на прием</button>
                    <button class="btn btn-link profile-menu">
                        Профиль
                        <svg class="svgsprite _drop">
                            <use xlink:href="/assets/img/sprites/svgsprites.svg#drop"></use>
                        </svg>
                        <div class="enter__panel">
                            <a class="enter__btn text-small" href="/cabinet">Мой кабинет</a>
                            <a class="enter__btn text-small signout" href="/signout">Выйти</a>
                        </div>
                    </button>
                    <a  wb-if="'{{_sess.user.role}}'!=='expert'" href="/basket" class="hb-ico basket-ico header-basket"><i class="cart-total-qty">0</i></a>
                    <button class="burger"></button>
                </div>
            </div>

	        <div class="container --flex --jcsb --aicn" wb-if="'{{_sess.user.role}}'=='main'">
		        <div class="header__admin --flex --aicn">
			        <span class="lower-deck">
				        <button class="btn btn--white loaddata --openpopup"
					        onclick="popupDownloadData();"
					        data-popup="--download-data">
					        <svg class="svgsprite _xl">
						        <use xlink:href="/assets/img/sprites/svgsprites.svg#xl"></use>
					        </svg>
					        Выгрузить данные
				        </button>
				    </span>
			        <a class="btn btn-link" href="/cabinet">Заявки и события</a>
			        <a class="btn btn-link" href="/cabinet/photos">Медиатека</a>
			        <a class="btn btn-link" href="/cabinet/changes">Журнал изменений</a>
			        <a class="btn btn-link" href="/cabinet/search">Пациенты</a>
		        </div>
		        <div class="header__right --flex --aicn">
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
            </div>
            <div class="crumbs__en" wb-if="'{{_route.uri}}' =='/english'">
                <div class="container">
                    <div class="crumbs"><a class="crumbs__arrow" href="javascript:window.history.back();">
                            <svg class="svgsprite _crumbs-back-white">
                                <use xlink:href="assets/img/sprites/svgsprites.svg#crumbs-back-white"></use>
                            </svg></a><a class="crumbs__link" href="/">Home page</a>
                            <span class="crumbs__link">Contacts</span></div>
                </div>
            </div>
        </header>
    </div>
</view>
<edit header="Заголовок сайта">
    <div>
        <wb-module wb="module=yonger&mode=edit&block=common.inc" />
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
                <wb-module wb="{'module':'jodit'}" name="text" />
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