<edit header="Виджет - специалисты">
    <div>
        <wb-module wb="module=yonger&mode=edit&block=common.inc" />
    </div>

    <div class="form-group row">
        <label class="col-sm-2">Специалисты</label>
        <div class="col-sm-10">
            <div class="form-group row">
                <div class="col-12 mb-1">
                    <input class="form-control" name="experts" wb-module="selectexperts" multiple placeholder="Список специалистов">
                </div>
            </div>
        </div>
    </div>
</edit>

<view>
    <div class="inner-experts">
        <wb-var count="0" />
        <wb-var experts wb-api="/api/v2/list/experts?active=on" />

        <div class="container">
            <h3 class="h3 mb-40">Специалисты</h3>
            <div class="inner-experts__list">
                <wb-foreach wb="from=_var.experts" wb-if="'{{_route.form}}' == 'services' && '{{_route.mode}}' == 'show'">
                    <div class="inner-experts__item" wb-if="in_array('{{id}}',{{_parent.experts}})">
                        <wb-var count="{{_var.count*1 + 1}}" />
                        <div class="inner-experts__pic" style="background-image: url(/thumbc/700x388/src{{image.0.img}})" wb-if="'{{image.0.img}}'>''"></div>
                        <div class="inner-experts__info">
                            <div class="inner-experts__name" wb-if="'{{name}}'>''"><a href="/about/experts/{{wbFurlGenerate({{name}})}}">{{name}}</a></div>
                            <div class="inner-experts__experience" wb-if="'{{experience}}'>''">
                                Опыт работы {{experience}}</div><a class="inner-experts__link" href="/about/experts/{{wbFurlGenerate({{name}})}}">Читать подробнее</a>
                        </div>
                    </div>
                </wb-foreach>
                <wb-foreach wb="from=_var.experts&limit=5&sort=_sort" wb-if="!('{{_route.form}}' == 'services' && '{{_route.mode}}' == 'show')">
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