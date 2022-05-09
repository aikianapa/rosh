<view>
    <wb-var sliderid="sl{{wbNewId}}" />
    <div class="gallery">
        <div class="gallery__slider" id="{{_var.sliderid}}">
            <div class="swiper-wrapper">
                <wb-foreach wb="from=images&tpl=false">
                    <div class="swiper-slide">
                        <div class="gallery__pic" style="background-image: url({{img}})" alt="{{alt}}"></div>
                        <div class="gallery__description text-small" wb-if="'{{title}}'>''">{{title}}</div>
                    </div>
                </wb-foreach>
            </div>
        </div>
        <div class="gallery__nav">
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
</view>

<edit header="Контент слайдер">
    <div>
        <wb-module wb="module=yonger&mode=edit&block=common.inc" />
    </div>
    <div class="form-group">
        <label>Изображения слайдера</label>
        <wb-module wb="module=filepicker&width=250&&height=150" wb-path="/uploads/content/" name="images">
        </wb-module>
    </div>
</edit>