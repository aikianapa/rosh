<html>

<head>
    <meta charset="utf-8">
    <title>{{header}}</title>
    <link rel="icon" href="/favicon.svg" type=" image/svg+xml">
</head>

<body class="body lk-cabinet" data-barba="wrapper">
    <div class="scroll-container" data-scroll-container>
        <div>
            <wb-module wb="module=yonger&mode=render&view=header"></wb-module>
        </div>
        <main class="page {{_session.user.role}}" data-barba="container" data-barba-namespace="{{_route.name}}">
            <div>
                <div class="product">
                    <div class="container">
                        <div class="product-top">
                            <div class="product-main">
                                <div class="product-slider swiper-container">
                                    <div class="swiper-wrapper">
                                        <wb-foreach wb="from=image&tpl=false">
                                        <div class="product-slide swiper-slide">
                                            <img src="/thumb/953x566/src{{img}}" alt="{{alt}}">
                                        </div>
                                        </wb-foreach>
                                    </div>
                                    <div class="product-arrow swiper-button-next"></div>
                                    <div class="product-arrow swiper-button-prev"></div>
                                </div>
                            </div>
                            <div class="product-descr">
                                <span class="product-subtitle">{{short}}</span>
                                <span class="product-title">{{header}}</span>
                                <ul>
                                    <li wb-if="'{{articul}}'>''">Артикул: {{articul}}</li>
                                    <wb-foreach wb="from=prop&tpl=false">
                                    <li>{{prop_name}} {{prop_value}}</li>
                                    </wb-foreach>
                                </ul>
                                <span class="product-price">{{fmtPrice({{price}})}} ₽</span>
                                <div class="card-bottom">
                                    <button class="btn btn--black">В корзину</button>
                                    <div class="amount">
                                        <span class="amount-minus"></span>
                                        <span class="amount-txt">1 шт</span>
                                        <span class="amount-plus"></span>
                                    </div>
                                    <span class="card-txt" wb-if="'{{office}}'=='on' && '{{delivery}}'=='on'">Доступен к самовывозу и доставке</span>
                                <span class="card-txt" wb-if="'{{office}}'=='on' && '{{delivery}}'==''">Доступен к самовывозу</span>
                                <span class="card-txt" wb-if="'{{office}}'=='' && '{{delivery}}'=='on'">Доступен к доставке</span>
                                <span class="card-txt" wb-if="'{{office}}'=='' && '{{delivery}}'==''">Нет в наличии</span>
                                </div>
                            </div>
                        </div>
                        <div class="product-info">
                            <div class="account__history data-tab-wrapper" data-tabs="hislech">
                                <div class="account__tab-items">
                                    <div class="product-item data-tab-link active" data-tabs="hislech" data-tab="descr">
                                        Описание</div>
                                    <div class="product-item data-tab-link" data-tabs="hislech" data-tab="application">
                                        Применение</div>
                                    <div class="product-item data-tab-link" data-tabs="hislech" data-tab="brand">Бренд</div>
                                </div>
                                <div class="account__tab data-tab-item active" data-tab="descr">
                                    <div class="product-row">
                                        <div class="product-block">
                                            <span class="product-tit">Общая информация</span>
                                        </div>
                                        <div class="product-text text-break">{{text}}</div>
                                    </div>
                                </div>
                                <div class="account__tab data-tab-item" data-tab="application">
                                    <div class="product-row">
                                        <div class="product-block">
                                            <span class="product-tit">Применение</span>
                                        </div>
                                        <div class="product-text text-break">{{apply}}</div>
                                    </div>
                                </div>
                                <div class="account__tab data-tab-item" data-tab="brand">
                                    <div class="product-row" wb-tree="dict=shop_category&branch={{category}}">
                                        <div class="product-block">
                                            <span class="product-tit">Бренд</span>
                                            <div><strong>{{name}}</strong></div>
                                        </div>
                                        <div class="product-text">{{data.text}}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <wb-module wb="module=yonger&mode=render&view=footer" />
            </div>
        </main>
    </div>
    <div class="to_top_btn">
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="20px" height="29px" viewBox="0 0 20 29" enable-background="new 0 0 20 29" xml:space="preserve">
            <path fill="#FFF" d="M11.011,0.4c-0.534-0.533-1.397-0.533-1.929,0L0.4,9.082c-0.533,0.533-0.533,1.396,0,1.929 c0.532,0.533,1.396,0.533,1.929,0l7.717-7.717l7.717,7.717c0.533,0.533,1.397,0.533,1.93,0c0.533-0.532,0.533-1.396,0-1.929 L11.011,0.4z" />
            <rect x="8.682" y="1.364" fill="#FFF" width="2.729" height="27.284" />
        </svg>
    </div>
</body>
<wb-jq wb="$dom->find('script:not([src]):not([type])')->attr('type','wbapp');" />
<wb-jq wb="$dom->find('.content-wrap ul')->addClass('ul-line');" />

</html>