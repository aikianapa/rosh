<html>

<head>
    <title>{{header}}</title>
</head>

<body class="body" data-barba="wrapper">
    <div class="scroll-container" data-scroll-container>
        <div>
            <wb-module wb="module=yonger&mode=render&view=header"></wb-module>
        </div>
        <main class="page" data-barba="container" data-barba-namespace="{{_route.name}}">
            <div class="container blog-head">
                <div class="crumbs"><a class="crumbs__arrow" href="javascript:window.history.back();">
                        <svg class="svgsprite _crumbs-back">
                            <use xlink:href="/assets/img/sprites/svgsprites.svg#crumbs-back"></use>
                        </svg></a><a class="crumbs__link" href="/">Главная</a><a class="crumbs__link" href="/blog">Блог</a><a class="crumbs__link" href="{{_route.url}}">{{header}}</a>
                </div>
            </div>
            <div class="blog-inner__top">
                <div class="container">
                    <div class="blog-panel blog-panel--100" style="background-image: url({{cover.0.img}})">
                        <div class="blog-panel__tags">
                            <div class="blog-panel__tag" wb-tree="dict=blog&branch={{category}}">{{name}}</div>
                            <div class="blog-panel__tag" wb-if="'{{done}}'!=='on'">Активная</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="blog-inner-content">
                <div class="container">
                    <div class="render">
                        <wb-module wb="module=yonger&mode=render"></wb-module>
                        <wb-jq wb-html=".blog-inner-content .render .row:eq(0) .col-md-4:eq(0)">
                        <div class="blog-inner__aside">
                            <p class="blog-inner__message">Чтобы попасть на процедуру или консультацию к нашим специалистам, позвоните по телефону <a href="tel:{{text2tel({{_var.consultPhone}})}}">{{_var.consultPhone}}</a></p>
                            <p class="blog-inner__date">{{dateform({{date}})}}</p>
                            <div class="recomendation">
                                <a class="recomendation" href="#">
                                    <div class="recomendation__title">Рекомендованная новость</div>
                                    <div class="recomendation__pic"> <img src="{{cover.0.img}}" alt=""></div>
                                    <h4 class="h4 recomendation__title">Mini FX</h4>
                                    <p class="recomendation__text text-small text-grey">Безоперационное удаление локальных жировых отложений на лице, подбородке, шее, на спине (холка), внутренней поверхности плеча и бёдрах⠀</p>
                                </a>
                            </div>
                        </div>
                        </wb-jq>
                        <wb-jq wb-prepend=".blog-inner-content .render .row:eq(0) .col-md-8:eq(0) .text:eq(0)">
                            <h2 class="h2">{{header}}</h2>
                        </wb-jq>
                    </div>
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-8">
                            <div class="share">
                                <div class="socials socials-blog">
                                    <a class="socials__link" href="{{_var.facebook}}" wb-if="'{{_var.facebook}}'>''">
                                        <svg class="svgsprite _socials-1">
                                            <use xlink:href="/assets/img/sprites/svgsprites.svg#socials-1"></use>
                                        </svg></a><a class="socials__link" href="{{_var.instagram}}" wb-if="'{{_var.instagram}}'>''">
                                        <svg class="svgsprite _socials-2">
                                            <use xlink:href="/assets/img/sprites/svgsprites.svg#socials-2"></use>
                                        </svg></a><a class="socials__link" href="{{_var.vkontakte}}" wb-if="'{{_var.vkontakte}}'>''">
                                        <svg class="svgsprite _socials-4">
                                            <use xlink:href="/assets/img/sprites/svgsprites.svg#socials-4"></use>
                                        </svg></a><a class="socials__link" href="{{_var.youtube}}" wb-if="'{{_var.youtube}}'>''">
                                        <svg class="svgsprite _socials-3">
                                            <use xlink:href="/assets/img/sprites/svgsprites.svg#socials-3"></use>
                                        </svg></a>
                                </div>
                                <div class="arrow__link" href="#">
                                    <svg class="svgsprite _arrow-link">
                                        <use xlink:href="/assets/img/sprites/svgsprites.svg#arrow-link"></use>
                                    </svg><a class="--openpopup" href="mailto:{{_var.contactEmail}}" data-popup="--fast"> Напишите нам </a>
                                </div>
                                <div class="arrow__link" href="#">
                                    <svg class="svgsprite _arrow-link">
                                        <use xlink:href="/assets/img/sprites/svgsprites.svg#arrow-link"></use>
                                    </svg><a href="tel:{{text2tel({{_var.contactPhone}})}}"> Позвоните нам </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
    </div>
    <div>

    </div>
    <div>
        <div>
            <wb-module wb="module=yonger&mode=render&view=mainfilter" />
        </div>
        <div>
            <wb-module wb="module=yonger&mode=render&view=footer" />
        </div>
        </main>
    </div>
</body>
<wb-jq wb="$dom->find('script:not([src]):not([type])')->attr('type','wbapp');" />

</html>