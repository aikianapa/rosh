<view>
    <div class="gallery gallery-blog">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                    <div id="{{wbNewId()}}" class="gallery__slider">
                        <div class="swiper-wrapper">
                            <wb-foreach wb="from=image&tpl=false">
                                <div class="swiper-slide">
                                    <div class="gallery__pic" style="background-image: url({{img}})" alt="{{alt}}"></div>
                                    <div class="gallery__description text-small" wb-if="'{{title}}'>''">{{title}}</div>
                                </div>
                            </wb-foreach>
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
    </div>
</view>

<edit header="Блог слайдер">
    <div>
        <wb-module wb="module=yonger&mode=edit&block=common.inc" />
    </div>
    <div class="form-group">
        <label>Изображения слайдера</label>
        <wb-module wb="module=filepicker&width=250&&height=150" wb-path="/uploads/blog/" name="image">
        </wb-module>
    </div>
</edit>

<preview>
    <div class="landing page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                    <div class="gallery__slider">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="gallery__pic" style="background-image: url(/assets/img/gallery/1.jpg)"></div>
                            </div>
                            <div class="swiper-slide">
                                <div class="gallery__pic" style="background-image: url(/assets/img/gallery/1.jpg)"></div>
                            </div>
                            <div class="swiper-slide">
                                <div class="gallery__pic" style="background-image: url(/assets/img/gallery/1.jpg)"></div>
                            </div>
                            <div class="swiper-slide">
                                <div class="gallery__pic" style="background-image: url(/assets/img/gallery/1.jpg)"></div>
                            </div>
                            <div class="swiper-slide">
                                <div class="gallery__pic" style="background-image: url(/assets/img/gallery/1.jpg)"></div>
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
    </div>
</preview>