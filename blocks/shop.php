<edit header="Витрина интернет-магазина">
    <div>
        <wb-module wb="module=yonger&mode=edit&block=common.inc" />
    </div>
</edit>

<view>
    <div class="container">
        <div class="title-flex --flex --jcsb">
            <div class="title">
                <h1 class="h1 mb-10">{{_parent.header}}</h1>
                <h3></h3>
            </div>
        </div>
    </div>
    <div class="card" id="Shop">
        <div class="container">
            <div class="card-row">
                <wb-foreach wb="table=shop&size=12&sort=header:d" wb-filter="active=on">
                    <div class="card-col">
                        <div class="card-wrap"  data-id="{{id}}" data-price="{{price}}" data-img="{{image.0.img}}">
                            <a href="/shop/{{wbFurlGenerate({{header}})}}" class="card-img"><img src="/thumbc/700x680/src{{image.0.img}}" alt="{{header}}"></a>
                            <span class="card-name"><a href="#">{{header}}</a></span>
                            <span class="card-price">{{fmtPrice({{price}})}} ₽</span>
                            <div class="card-info">
                                <wb-var stars="{{rand(1,5)}}" />
                                <i class="hb-ico star-{{_var.stars}}"></i>
                                <a href="#" class="card-link">{{rand(1,30)}} отзывов</a>
                            </div>
                            <p>{{short}}</p>
                            <div class="card-bottom">
                                <button wb-if="'{{office}}'=='on' OR '{{delivery}}'=='on'" class="btn btn--black cart-add" type="button">В корзину</button>
                                <button wb-if="'{{office}}'=='' && '{{delivery}}'==''" class="btn btn--black" disabled  type="button">Нет в наличии</button>
                                <div class="amount">
                                    <span class="amount-minus cart-dec"></span>
                                    <span class="amount-txt"><span class="amount-qty">1</span> шт</span>
                                    <span class="amount-plus cart-inc"></span>
                                </div>
                                <span class="card-txt" wb-if="'{{office}}'=='on' && '{{delivery}}'=='on'">Доступен к самовывозу и доставке</span>
                                <span class="card-txt" wb-if="'{{office}}'=='on' && '{{delivery}}'==''">Доступен к самовывозу</span>
                                <span class="card-txt" wb-if="'{{office}}'=='' && '{{delivery}}'=='on'">Доступен к доставке</span>
                                <span class="card-txt" wb-if="'{{office}}'=='' && '{{delivery}}'==''">Нет в наличии</span>
                            </div>
                        </div>
                    </div>
                </wb-foreach>
            </div>
        </div>
    </div>
</view>

<preview>
    <div class="card">
        <div class="container">
            <div class="card-row">
                <div class="card-col">
                    <div class="card-wrap">
                        <a href="#" class="card-img"><img src="assets/img/new/img-1-min.jpg" alt=""></a>
                        <span class="card-name"><a href="#">Мультиплатформа Joule SCITON</a></span>
                        <span class="card-price">5 000 ₽</span>
                        <div class="card-info">
                            <i class="hb-ico star-4"></i>
                            <a href="#" class="card-link">30 отзывов</a>
                        </div>
                        <p>Тройная сыворотка для лица и шеи Rénergie H.C.F. Triple Serum – это новое
                            поколение(1) высокоэффективного антивозрастного ухода за кожей лица.</p>
                        <div class="card-bottom">
                            <button class="btn btn--black">В корзину</button>
                            <div class="amount">
                                <span class="amount-minus"></span>
                                <span class="amount-txt">1 шт</span>
                                <span class="amount-plus"></span>
                            </div>
                            <span class="card-txt">Доступен к самовывозу и доставке</span>
                        </div>
                    </div>
                </div><!-- col -->
                <div class="card-col">
                    <div class="card-wrap">
                        <a href="#" class="card-img"><img src="assets/img/new/img-1-min.jpg" alt=""></a>
                        <span class="card-name"><a href="#">Мультиплатформа Joule SCITON</a></span>
                        <span class="card-price">5 000 ₽<sup>8 000 ₽</sup></span>
                        <div class="card-info">
                            <i class="hb-ico star-4"></i>
                            <a href="#" class="card-link">30 отзывов</a>
                        </div>
                        <p>Тройная сыворотка для лица и шеи Rénergie H.C.F. Triple Serum – это новое
                            поколение(1) высокоэффективного </p>
                        <div class="card-bottom">
                            <button class="btn btn--black">В корзину</button>
                            <div class="amount">
                                <span class="amount-minus"></span>
                                <span class="amount-txt">1 шт</span>
                                <span class="amount-plus"></span>
                            </div>
                            <span class="card-txt">Доступен к самовывозу и доставке</span>
                        </div>
                    </div>
                </div><!-- col -->
                <div class="card-col">
                    <div class="card-wrap">
                        <a href="#" class="card-img"><img src="assets/img/new/img-1-min.jpg" alt=""></a>
                        <span class="card-name"><a href="#">Мультиплатформа Joule SCITON</a></span>
                        <span class="card-price">5 000 ₽</span>
                        <div class="card-info">
                            <i class="hb-ico star-2"></i>
                            <a href="#" class="card-link">30 отзывов</a>
                        </div>
                        <p>Тройная сыворотка для лица и шеи Rénergie H.C.F. Triple Serum – это новое
                            поколение(1) </p>
                        <div class="card-bottom">
                            <button class="btn btn--black">В корзину</button>
                            <div class="amount">
                                <span class="amount-minus"></span>
                                <span class="amount-txt">1 шт</span>
                                <span class="amount-plus"></span>
                            </div>
                            <span class="card-txt">Доступен к самовывозу и доставке</span>
                        </div>
                    </div>
                </div><!-- col -->
                <div class="card-col">
                    <div class="card-wrap">
                        <a href="#" class="card-img"><img src="assets/img/new/img-1-min.jpg" alt=""></a>
                        <span class="card-name"><a href="#">Мультиплатформа Joule SCITON</a></span>
                        <span class="card-price">5 000 ₽</span>
                        <div class="card-info">
                            <i class="hb-ico star-4"></i>
                            <a href="#" class="card-link">30 отзывов</a>
                        </div>
                        <p>Тройная сыворотка для лица и шеи Rénergie H.C.F. Triple Serum – это новое
                            поколение(1) высокоэффективного антивозрастного ухода за кожей лица.</p>
                        <div class="card-bottom">
                            <button class="btn btn--black">В корзину</button>
                            <div class="amount">
                                <span class="amount-minus"></span>
                                <span class="amount-txt">1 шт</span>
                                <span class="amount-plus"></span>
                            </div>
                            <span class="card-txt">Доступен к самовывозу и доставке</span>
                        </div>
                    </div>
                </div><!-- col -->
                <div class="card-col">
                    <div class="card-wrap">
                        <a href="#" class="card-img"><img src="assets/img/new/img-1-min.jpg" alt=""></a>
                        <span class="card-name"><a href="#">Мультиплатформа Joule SCITON</a></span>
                        <span class="card-price">5 000 ₽</span>
                        <div class="card-info">
                            <i class="hb-ico star-4"></i>
                            <a href="#" class="card-link">30 отзывов</a>
                        </div>
                        <p>Тройная сыворотка для лица и шеи Rénergie H.C.F. Triple Serum – это новое
                            поколение(1) высокоэффективного </p>
                        <div class="card-bottom">
                            <button class="btn btn--black">В корзину</button>
                            <div class="amount">
                                <span class="amount-minus"></span>
                                <span class="amount-txt">1 шт</span>
                                <span class="amount-plus"></span>
                            </div>
                            <span class="card-txt">Доступен к самовывозу и доставке</span>
                        </div>
                    </div>
                </div><!-- col -->
                <div class="card-col">
                    <div class="card-wrap">
                        <a href="#" class="card-img"><img src="assets/img/new/img-1-min.jpg" alt=""></a>
                        <span class="card-name"><a href="#">Мультиплатформа Joule SCITON</a></span>
                        <span class="card-price">5 000 ₽</span>
                        <div class="card-info">
                            <i class="hb-ico star-2"></i>
                            <a href="#" class="card-link">30 отзывов</a>
                        </div>
                        <p>Тройная сыворотка для лица и шеи Rénergie H.C.F. Triple Serum – это новое
                            поколение(1) </p>
                        <div class="card-bottom">
                            <button class="btn btn--black">В корзину</button>
                            <div class="amount">
                                <span class="amount-minus"></span>
                                <span class="amount-txt">1 шт</span>
                                <span class="amount-plus"></span>
                            </div>
                            <span class="card-txt">Доступен к самовывозу и доставке</span>
                        </div>
                    </div>
                </div><!-- col -->
            </div>
        </div>
    </div>

</preview>