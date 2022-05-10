<edit header="Виджет - специалисты">
    <div>
        <wb-module wb="module=yonger&mode=edit&block=common.inc" />
    </div>
</edit>

<view>
    <div class="inner-experts">
        <div class="container">
            <h3 class="h3 mb-40">Специалисты</h3>
            <div class="inner-experts__list">
                <wb-foreach wb="table=experts&limit=5" wb-filter="active=on">
                <div class="inner-experts__item">
                    <div class="inner-experts__pic" style="background-image: url(/thumbc/350x194/src{{image.0.img}})"></div>
                    <div class="inner-experts__info">
                        <div class="inner-experts__name"><a href="/about/experts/{{wbFurlGenerate({{fullname}})}}">{{fullname}}</a></div>
                        <div class="inner-experts__experience">Опыт работы {{experience}}</div><a class="inner-experts__link" href="/expert.html">Читать подробнее</a>
                    </div>
                </div>
                </wb-foreach>
                <div class="inner-experts__item inner-experts__item-all">
                    <div class="inner-experts__all">
                        <h2 class="h2">Смотреть остальных специалистов </h2>
                        <div class="/arrow__link">
                            <svg class="svgsprite _arrow-link">
                                <use xlink:href="/assets/img/sprites/svgsprites.svg#arrow-link"></use>
                            </svg><a href="/experts">Еще специалисты</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
                            </svg><a href="/experts.html">Еще 12 специалистов</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</preview>