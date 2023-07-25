<view><footer>
        <div class="footer">
            <div class="container">
                <div class="container-fluid">
                    <div class="row footer__top">
                        <div class="footer__item col-lg-2">
                            <div class="socials" style="display: none;">
                                <a class="socials__link" href="{{_var.facebook}}" wb-if="'{{_var.facebook}}'>''">
                                    <svg class="svgsprite _socials-1">
                                        <use xlink:href="/assets/img/sprites/svgsprites.svg#socials-1"></use>
                                    </svg>
                                </a>
                                <a class="socials__link" href="{{_var.instagram}}" wb-if="'{{_var.instagram}}'>''">
                                    <svg class="svgsprite _socials-2">
                                        <use xlink:href="/assets/img/sprites/svgsprites.svg#socials-2"></use>
                                    </svg>
                                </a>
                                <a class="socials__link" href="{{_var.vkontakte}}" wb-if="'{{_var.vkontakte}}'>''">
                                    <svg class="svgsprite _socials-4">
                                        <use xlink:href="/assets/img/sprites/svgsprites.svg#socials-4"></use>
                                    </svg>
                                </a>
                                <a class="socials__link" href="{{_var.youtube}}" wb-if="'{{_var.youtube}}'>''">
                                    <svg class="svgsprite _socials-3">
                                        <use xlink:href="/assets/img/sprites/svgsprites.svg#socials-3"></use>
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <div class="footer__item col-lg-3">
                            <a class="footer__contact text-small text-grey" href="mailto:{{_var.contactEmail}}">{{_var.contactEmail}}</a>
                        </div>
                        <div class="footer__item col-lg-7">
                            <a class="footer__contact text-small text-grey" href="[contacts]"> г. Москва, Ростовская набережная д. 5, вход с фасада здания.</a>
                        </div>
                    </div>
                    <div class="row footer__bottom">
                        <div class="footer__item col-lg-2">
                            <a class="text-small" href="/"> © ROSH, 2021</a>
                        </div>
                        <div class="footer__item col-lg-3">
                            <a class="text-small policy" href="[policy]"> Политика конфиденциальности
                            </a>
                        </div>
                        <div class="footer__item col-lg-7 --flex --jcsb">
                            <a class="text-small map-site" href="[sitemap]">Карта сайта</a>
                            <p class="text-small text-small-fix">Лицензия №ЛО-77-01-002172 от 12.01.2010</p>
                            <a class="develop" href="https://idees.ru/">
                                <svg class="svgsprite _develop">
                                    <use xlink:href="/assets/img/sprites/svgsprites.svg#develop"></use>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="cookies-block ">
            <div class="container cookies-block__container">
                <div class="cookies-block__wrapper">
                    <svg class="cookies-block__icon" width="30" height="30" aria-hidden="true">
                        <use xlink:href="/assets/img/sprite.svg#cookies"></use>
                    </svg>

                    <span class="cookies-block__text">
                        Мы используем cookies. Оставаясь на сайте, вы соглашаетесь с
                        <a class="cookies-block__link" href="[policy]" target="_blank">политикой конфиденциальности</a>.
                    </span>
                </div>

                <button class="cookies-block__accept-button" type="button">я согласен</button>
            </div>
        </div>
        <div class="to_top_btn">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="20px" height="29px" viewbox="0 0 20 29" enable-background="new 0 0 20 29" xml:space="preserve" space="preserve">
                <path fill="#FFF" d="M11.011,0.4c-0.534-0.533-1.397-0.533-1.929,0L0.4,9.082c-0.533,0.533-0.533,1.396,0,1.929 c0.532,0.533,1.396,0.533,1.929,0l7.717-7.717l7.717,7.717c0.533,0.533,1.397,0.533,1.93,0c0.533-0.532,0.533-1.396,0-1.929 L11.011,0.4z"></path>
                <rect x="8.682" y="1.364" fill="#FFF" width="2.729" height="27.284"></rect>
            </svg>
        </div>
    </footer></view><edit header="Подвал сайта"><div>
        <wb-module wb="module=yonger&amp;mode=edit&amp;block=common.inc"></wb-module>
    </div>
<wb-lang>
        [ru]
        header = Подвал сайта name = "Наименование блока"
        active = "Отображать блок"
        template = Шаблон
        [en] header = Site footer
        name = "Block name"
        active = "Show block"
        template = Template
    </wb-lang></edit>