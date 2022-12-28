<edit header="Виджет - специалисты">
    <div>
        <wb-module wb="module=yonger&mode=edit&block=common.inc" />
    </div>
    <p class="alert alert-info">
        В разделе Услуг отображаются только те специалисты, у которых указано направление соответствующее услуге
    </p>
</edit>

<view>
    <div class="inner-experts">
        <wb-var count="0" />
        <div class="container">
            <h3 class="h3 mb-40">Специалисты</h3>
            <div class="inner-experts__list">
                <wb-var filter="active=on&srvtype~={{_parent.type}}"
                        wb-if="'{{_route.form}}' == 'services' && '{{_route.mode}}' == 'show' " else="active=on" />
                <wb-foreach wb="table=experts&limit=5" wb-filter="{{_var.filter}}">
                <wb-var count="{{_var.count*1 + 1}}" />
                <div class="inner-experts__item">
                    <div class="inner-experts__pic" style="background-image: url(/thumbc/700x388/src{{image.0.img}})" wb-if="'{{image.0.img}}'>''"></div>
                    <div class="inner-experts__info">
                        <div class="inner-experts__name" wb-if="'{{name}}'>''"><a href="/about/experts/{{wbFurlGenerate({{name}})}}">{{name}}</a></div>
                        <div class="inner-experts__experience" wb-if="'{{experience}}'>''">
                            Опыт работы {{experience}}</div><a class="inner-experts__link" href="/about/experts/{{wbFurlGenerate({{name}})}}">Читать подробнее</a>
                    </div>
                </div>
                </wb-foreach>
                <div class="inner-experts__item inner-experts__item-all">
                    <div class="inner-experts__all">
                        <h2 class="h2">Смотреть остальных специалистов </h2>
                        <div class="/arrow__link">
                            <svg class="svgsprite _arrow-link">
                                <use xlink:href="/assets/img/sprites/svgsprites.svg#arrow-link"></use>
                            </svg><a href="/about/experts">Еще специалисты</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <wb-jq wb="$dom->find('.container')->remove()" wb-if="'{{_var.count}}'=='0'" />
    </div>
</view>

<preview>
    <div class="inner-experts page">
        <div class="container">
            <h3 class="h3 mb-40">Специалисты</h3>
            <div class="inner-experts__list">
                <div class="inner-experts__item">
                    <div class="inner-experts__pic" style="background-image: url(/assets/img/experts/1.jpg)"></div>
                    <div class="inner-experts__info">
                        <div class="inner-experts__name"><a href="/expert.html">Хачатурян Любовь Андреева</a></div>
                        <div class="inner-experts__experience">Опыт работы 25 лет</div><a class="inner-experts__link" href="/expert.html">Читать подробнее</a>
                    </div>
                </div>
                <div class="inner-experts__item">
                    <div class="inner-experts__pic" style="background-image: url(/assets/img/experts/1.jpg)"></div>
                    <div class="inner-experts__info">
                        <div class="inner-experts__name"><a href="/expert.html">Хачатурян Любовь Андреева</a></div>
                        <div class="inner-experts__experience">Опыт работы 25 лет</div><a class="inner-experts__link" href="/expert.html">Читать подробнее</a>
                    </div>
                </div>
                <div class="inner-experts__item">
                    <div class="inner-experts__pic" style="background-image: url(/assets/img/experts/1.jpg)"></div>
                    <div class="inner-experts__info">
                        <div class="inner-experts__name"><a href="/expert.html">Хачатурян Любовь Андреева</a></div>
                        <div class="inner-experts__experience">Опыт работы 25 лет</div><a class="inner-experts__link" href="/expert.html">Читать подробнее</a>
                    </div>
                </div>
                <div class="inner-experts__item">
                    <div class="inner-experts__pic" style="background-image: url(/assets/img/experts/1.jpg)"></div>
                    <div class="inner-experts__info">
                        <div class="inner-experts__name"><a href="/expert.html">Хачатурян Любовь Андреева</a></div>
                        <div class="inner-experts__experience">Опыт работы 25 лет</div><a class="inner-experts__link" href="/expert.html">Читать подробнее</a>
                    </div>
                </div>
                <div class="inner-experts__item">
                    <div class="inner-experts__pic" style="background-image: url(/assets/img/experts/1.jpg)"></div>
                    <div class="inner-experts__info">
                        <div class="inner-experts__name"><a href="/expert.html">Хачатурян Любовь Андреева</a></div>
                        <div class="inner-experts__experience">Опыт работы 25 лет</div><a class="inner-experts__link" href="/expert.html">Читать подробнее</a>
                    </div>
                </div>
                <div class="inner-experts__item inner-experts__item-all">
                    <div class="inner-experts__all">
                        <h2 class="h2">Смотреть остальных специалистов </h2>
                        <div class="/arrow__link">
                            <svg class="svgsprite _arrow-link">
                                <use xlink:href="/assets/img/sprites/svgsprites.svg#arrow-link"></use>
                            </svg><a href="/experts.html">Все специалисты</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</preview>