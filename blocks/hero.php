<view>
    <div class="main-slider mb-80">
        <div class="swiper-wrapper">
            <wb-foreach wb="from=images&tpl=false">
                <div class="swiper-slide" style="background-image: url({{img}})"></div>
            </wb-foreach>
        </div>
        <div class="swiper-pagination"></div>
    </div>
</view>
<edit header="Обложка сайта">
    <div>
        <wb-module wb="module=yonger&mode=edit&block=common.inc" />
    </div>
    <div class="form-group">
        <label>Изображения</label>
        <wb-module wb="module=filepicker&width=250&&height=180" wb-path="/uploads/hero/" name="images">
        </wb-module>
    </div>
</edit>