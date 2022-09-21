<html>

<head>
    <title>{{header}}</title>
    <link rel="icon" href="/favicon.svg" type=" image/svg+xml">
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
                        </svg></a><a class="crumbs__link" href="/">Главная</a><a class="crumbs__link" href="/blog">Блог</a>
                        <a class="crumbs__link" href="#">{{header}}</a>
                </div>
            </div>
            <div class="blog-inner__top">
                <div class="container">
                    <div class="blog-panel blog-panel--100" style="background-image: url({{cover.0.img}})">
                        <div class="blog-panel__tags">
                            <div class="blog-panel__tag" wb-tree="dict=blog&branch={{category}}">{{name}}</div>
                            <div  wb-if="'{{category}}'=='action'">
                                <div class="blog-panel__tag" wb-if="'{{done}}'=='on'">Завершенная</div>
                                <div class="blog-panel__tag" wb-if="'{{done}}'!=='on'">Активная</div>
                            </div>
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

                            <wb-var recommend="{{getRecommend({{recommend_id}})}}"></wb-var>


                            <div class="recomendation" wb-if="'{{_var.recommend}}'!=='0'" data-s="{{_var.recommend}}">
                                <a class="recomendation" href="/blog/{{wbFurlGenerate({{_var.recommend.header}})}}">
                                    <div class="recomendation__title">Рекомендованая новость</div>
                                    <div class="recomendation__pic"> <img src="{{_var.recommend.image}}" alt=""></div>
                                    <h4 class="h4 recomendation__title">{{_var.recommend.header}}</h4>
                                    <p class="recomendation__text text-small text-grey" wb-if="'{{_var.recommend.text}}'!==''">{{wbGetWords({{_var.recommend.text}},10)}}</p>
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
                                    </svg><a class="--openpopup" href="javascript:void(0)" data-popup="--fast"> Напишите нам </a>
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

    <div class="to_top_btn">
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="20px" height="29px" viewBox="0 0 20 29" enable-background="new 0 0 20 29" xml:space="preserve">
            <path fill="#262626" d="M11.011,0.4c-0.534-0.533-1.397-0.533-1.929,0L0.4,9.082c-0.533,0.533-0.533,1.396,0,1.929 c0.532,0.533,1.396,0.533,1.929,0l7.717-7.717l7.717,7.717c0.533,0.533,1.397,0.533,1.93,0c0.533-0.532,0.533-1.396,0-1.929 L11.011,0.4z"/>
            <rect x="8.682" y="1.364" fill="#262626" width="2.729" height="27.284"/>
        </svg>
    </div>
</body>
<wb-jq wb="$dom->find('script:not([src]):not([type])')->attr('type','wbapp');" />

</html>