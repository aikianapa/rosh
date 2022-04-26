<view>
    <footer>
            <div class="footer">
                <div class="container">
                    <div class="container-fluid">
                        <div class="row footer__top">
                            <div class="footer__item col-lg-2">
                                <div class="socials"><a class="socials__link" href="#"><svg
                                            class="svgsprite _socials-1">
                                            <use xlink:href="assets/img/sprites/svgsprites.svg#socials-1"></use>
                                        </svg></a><a class="socials__link" href="#"><svg class="svgsprite _socials-2">
                                            <use xlink:href="assets/img/sprites/svgsprites.svg#socials-2"></use>
                                        </svg></a><a class="socials__link" href="#"><svg class="svgsprite _socials-3">
                                            <use xlink:href="assets/img/sprites/svgsprites.svg#socials-3"></use>
                                        </svg></a></div>
                            </div>
                            <div class="footer__item col-lg-3"><a class="footer__contact text-small text-grey"
                                    href="mailto:{{_var.contactEmail}}">{{_var.contactEmail}}</a></div>
                            <div class="footer__item col-lg-7"><a class="footer__contact text-small text-grey"
                                    href="contacts.html"> г. Москва, Ростовская набережная д. 5, пом. 9</a></div>
                        </div>
                        <div class="row footer__bottom">
                            <div class="footer__item col-lg-2"><a class="text-small" href="/"> © ROSH, 2021</a>
                            </div>
                            <div class="footer__item col-lg-3"><a class="text-small policy" href="/policy"> Политика
                                    конфиденциальности</a></div>
                            <div class="footer__item col-lg-7 --flex --jcsb"><a class="text-small map-site"
                                    href="site-map.html">Карта сайта</a>
                                <p class="text-small">Лицензия №ЛО-77-01-002172 от 12.01.2010</p><a class="develop"
                                    href="http://idees.ru/">
                                    <svg class="svgsprite _develop">
                                        <use xlink:href="assets/img/sprites/svgsprites.svg#develop"></use>
                                    </svg></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </footer>
</view>
<edit header="Подвал сайта">
    <div>
        <wb-module wb="module=yonger&mode=edit&block=common.inc" />
    </div>
    <wb-lang>
        [ru]
        header = Подвал сайта
        name = "Наименование блока"
        active = "Отображать блок"
        template = Шаблон
        [en]
        header = Site footer
        name = "Block name"
        active = "Show block"
        template = Template

    </wb-lang>
</edit>