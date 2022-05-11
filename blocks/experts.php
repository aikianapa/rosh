<view>
    <div class="container">
        <div class="crumbs">
            <a class="crumbs__arrow" href="javascript:window.history.back();">
                <svg class="svgsprite _crumbs-back">
                    <use xlink:href="/assets/img/sprites/svgsprites.svg#crumbs-back"></use>
                </svg>
            </a>
            <a class="crumbs__link" href="/">Главная</a>
            <a class="crumbs__link" href="{{_parent.path}}">О клинике</a>
            <a class="crumbs__link" href="{{_route.url}}">Специалисты</a>
        </div>
        <div class="experts">
            <h1 class="h1">Специалисты</h1>
            <div class="container-fluid">
                <div class="expert row" wb-tree="item=divisions&children=false&active=on">
                    <div class="col-lg-3">
                        <h5 class="h5 expert__category">{{name}}</h5>
                    </div>
                    <div class="col-lg-9">
                        <wb-foreach wb="table=experts&tpl=false" wb-filter="division={{id}}&active=on">
                        <a class="expert__info" href="/about/experts/{{wbFurlGenerate({{name}})}}">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="expert__img">
                                        <img src="/thumbc/315x175/src{{image.0.img}}" alt="{{fullname}} - {{spec}}">
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <p class="expert__name">{{name}}</p>
                                    <div class="expert__description">
                                        <p>{{spec}}</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                        </wb-foreach>
                    </div>
                </div>
            </div>
        </div>
    </div>
</view>

<edit header="Специалисты">
    <div>
        <wb-module wb="module=yonger&mode=edit&block=common.inc" />
    </div>
</edit>