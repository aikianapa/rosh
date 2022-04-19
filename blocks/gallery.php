<view>
    <div class="container">
        <div class="crumbs">
            <a class="crumbs__arrow" href="#">
                <svg class="svgsprite _crumbs-back">
                    <use xlink:href="/assets/img/sprites/svgsprites.svg#crumbs-back"></use>
                </svg>
            </a>
            <a class="crumbs__link" href="/">Главная</a>
            <a class="crumbs__link" href="{{_parent.path}}">О клинике</a>
            <a class="crumbs__link" href="{{_route.url}}">Галерея</a>
        </div>
        <h1 class="h1">Галерея</h1>
    </div>
    <div class="gallery">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                    <div class="gallery__slider">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="gallery__pic" style="background-image: url(/assets/img/gallery/1.jpg)"></div>
                                <div class="gallery__description text-small">Отделение дерматологии и косметологии</div>
                            </div>
                            <div class="swiper-slide">
                                <div class="gallery__pic" style="background-image: url(/assets/img/gallery/1.jpg)"></div>
                                <div class="gallery__description text-small">Отделение дерматологии и косметологии</div>
                            </div>
                            <div class="swiper-slide">
                                <div class="gallery__pic" style="background-image: url(/assets/img/gallery/1.jpg)"></div>
                                <div class="gallery__description text-small">Отделение дерматологии и косметологии</div>
                            </div>
                            <div class="swiper-slide">
                                <div class="gallery__pic" style="background-image: url(/assets/img/gallery/1.jpg)"></div>
                                <div class="gallery__description text-small">Отделение дерматологии и косметологии</div>
                            </div>
                            <div class="swiper-slide">
                                <div class="gallery__pic" style="background-image: url(/assets/img/gallery/1.jpg)"></div>
                                <div class="gallery__description text-small">Отделение дерматологии и косметологии</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2"></div>
            </div>
        </div>
        <div class="gallery__nav">
            <div class="container">
                <div class="prev">
                    <svg class="svgsprite _prev">
                        <use xlink:href="/assets/img/sprites/svgsprites.svg#prev"></use>
                    </svg>
                </div>
                <div class="next">
                    <svg class="svgsprite _next">
                        <use xlink:href="/assets/img/sprites/svgsprites.svg#next"></use>
                    </svg>
                </div>
            </div>
        </div>
    </div>
</view>

<edit header="Галерея">
    <div>
        <wb-module wb="module=yonger&mode=edit&block=common.inc" />
    </div>
</edit>