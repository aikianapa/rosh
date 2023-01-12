<view>
    <div class="main-wrapper">
        <div class="container">
            <div class="crumbs"><a class="crumbs__arrow" href="#">
                    <svg class="svgsprite _crumbs-back">
                        <use xlink:href="/assets/img/sprites/svgsprites.svg#crumbs-back"></use>
                    </svg></a><a class="crumbs__link" href="/">Главная</a><span class="crumbs__link">Карта сайта</span>
            </div>
            <h1 class="h1">Карта сайта</h1>
            <div class="site-map">
                <div class="site-map__column">
                    <div class="site-map__block"> <a class="site-map__heading" href="/">Главная </a></div>
                    <div class="site-map__block"> <a class="site-map__heading" href="[english]">English version </a></div>
                    <div class="site-map__block"> <a class="site-map__heading" href="[services]">Услуги </a>
                        <wb-var list wb-api="/api/v2/list/services?active=on&@1return=id,active,header,_form" />
                        <ul class="site-map__list">
                            <wb-foreach wb="table=catalogs&item=srvcat&from=tree.data&tpl=false">
                                <li class="site-map__item" wb-if="'{{active}}'=='on'">
                                    <span class="site-map__link">{{name}}</span>
                                    <ul class="site-map__list">
                                        <wb-foreach wb="from=_var.list&tpl=false&size=999" wb-filter="active=on&category~={{id}}">
                                            <li class="site-map__item">
                                                <a class="site-map__link" href="{{yongerFurl()}}">{{header}}</a>
                                            </li>
                                        </wb-foreach>
                                    </ul>
                                </li>
                            </wb-foreach>
                        </ul>
                    </div>
                    <div class="site-map__block"> <a class="site-map__heading" href="/blog">Блог </a>
                        <wb-var list wb-api="/api/v2/list/blog?active=on" />
                        <ul class="site-map__list">
                            <li class="site-map__item">
                                <span class="site-map__link">Статьи</span>
                                <ul class="site-map__list">
                                    <wb-foreach wb="from=_var.list&tpl=false&size=999" wb-filter="active=on&category=article">
                                        <li class="site-map__item">
                                            <a class="site-map__link" href="{{yongerFurl()}}">{{header}}</a>
                                        </li>
                                    </wb-foreach>
                                </ul>
                            </li>
                            <li class="site-map__item">
                                <span class="site-map__link">Новости</span>
                                <ul class="site-map__list">
                                    <wb-foreach wb="from=_var.list&tpl=false&size=999" wb-filter="active=on&category=article">
                                        <li class="site-map__item">
                                            <a class="site-map__link" href="{{yongerFurl()}}">{{header}}</a>
                                        </li>
                                    </wb-foreach>
                                </ul>
                            </li>
                            <li class="site-map__item">
                                <span class="site-map__link">Акции</span>
                                <ul class="site-map__list">
                                    <wb-foreach wb="from=_var.list&tpl=false&size=999" wb-filter="active=on&category=action">
                                        <li class="site-map__item">
                                            <a class="site-map__link" href="{{yongerFurl()}}">{{header}}</a>
                                        </li>
                                    </wb-foreach>
                                </ul>
                            </li>
                            <li class="site-map__item">
                                <span class="site-map__link">Публикации</span>
                                <ul class="site-map__list">
                                    <wb-foreach wb="from=_var.list&tpl=false&size=999" wb-filter="active=on&category=press">
                                        <li class="site-map__item">
                                            <a class="site-map__link" href="{{yongerFurl()}}">{{header}}</a>
                                        </li>
                                    </wb-foreach>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="site-map__block"> <a class="site-map__heading" href="[about]">О клинике </a>
                        <ul class="site-map__list">
                            <li class="site-map__item"> <a class="site-map__link" href="[equipment]">Оборудование</a></li>
                            <li class="site-map__item"> <a class="site-map__link" href="[gallery]">Галерея</a></li>
                            <li class="site-map__item"> <a class="site-map__link" href="[experts]">Специалисты</a>
                                <ul class="site-map__list">
                                    <wb-foreach wb="table=experts&tpl=false&sort=header" wb-filter="active=on">
                                        <li class="site-map__item">
                                            <a class="site-map__link" href="/about{{yongerFurl()}}">{{header}}</a>
                                        </li>
                                    </wb-foreach>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="site-map__block"> <a class="site-map__heading" href="[contacts]">Контакты </a></div>
                    <div class="site-map__block"> <a class="site-map__heading" href="[policy]">Политика конфиденциальности </a></div>
                </div>
                <div class="site-map__column">
                    <div class="site-map__block">
                        <wb-var list wb-api="/api/v2/list/problems" />
                        <a class="site-map__heading" href="/problems">Проблемы </a>
                        <ul class="site-map__list">
                            <wb-foreach wb="table=catalogs&item=srvtype&from=tree.data&tpl=false">
                                <li class="site-map__item">
                                    <span class="site-map__link">{{name}}</span>
                                    <ul class="site-map__list">
                                        <wb-foreach wb="from=_var.list&tpl=false&size=999" wb-filter="active=on&srvtype={{id}}">
                                            <li class="site-map__item">
                                                <a class="site-map__link" href="{{yongerFurl()}}">{{header}}</a>
                                            </li>
                                        </wb-foreach>
                                    </ul>
                                </li>
                            </wb-foreach>
                        </ul>
                    </div>
                </div>
                <div class="site-map__column">
                    <div class="site-map__block"> <a class="site-map__heading" href="/cabinet">Личный кабинет </a></div>
                    <div class="site-map__block"> <a class="site-map__heading" href="/shop">Магазин</a>
                        <ul class="site-map__list">
                            <wb-foreach wb="table=shop&tpl=false&sort=header" wb-filter="active=on">
                                <li class="site-map__item">
                                    <a class="site-map__link" href="{{yongerFurl()}}">{{header}}</a>
                            </wb-foreach>
                        </ul>
                    </div>
                    <div class="site-map__block"> <a class="site-map__heading" href="/basket">Корзина </a></div>
                </div>
            </div>
        </div>
    </div>
</view>

<edit header="Карта сайта">
    <div>
        <wb-module wb="module=yonger&mode=edit&block=common.inc" />
    </div>
</edit>