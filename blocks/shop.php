<edit header="Витрина интернет-магазина">
    <div>
        <wb-module wb="module=yonger&mode=edit&block=common.inc" />
    </div>
</edit>

<view>
    <div class="container">
        <div class="title-flex --flex --jcsb">
            <div class="title">
                <h1 class="mb-10 h1">{{_parent.header}}</h1>
                <h3></h3>
            </div>
        </div>
    </div>
    <div class="card" id="Shop">
        <div class="container">
            <div class="card-row">
                <wb-foreach wb="table=shop&size=12&sort=header" wb-filter="active=on">
                    <div class="card-col">
                        <div class="card-wrap"  data-id="{{id}}" data-price="{{price}}" data-img="{{image.0.img}}">
                            <a href="/shop/{{wbFurlGenerate({{header}})}}" class="card-img"><img src="/thumbc/700x680/src{{image.0.img}}" alt="{{header}}"></a>
                            <span class="card-name"><a href="#">{{header}}</a></span>
                            <span class="card-price">{{fmtPrice({{price}})}} ₽</span>
                            <div class="card-info d-none">
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

