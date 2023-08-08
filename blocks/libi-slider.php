<view>
    <wb-var sliderid="sl{{wbNewId}}" />
    <div class="container">
        <div class="post__main">
            <div class="post__main-block" wb-if="'{{aside}}'>''">
                <span class="post-sub">{{aside}}</span>
            </div>
            <div class="post__main-info">
                <div class="post-slider swiper-container" id="{{_var.sliderid}}">
                    <div class="swiper-wrapper">
                        <wb-foreach wb="from=images&tpl=false">
                            <div class="post-slide swiper-slide" wb-if="'{{img}}'>''">
                                <img src="{{img}}" alt="{{_parent.header}}">
                            </div>
                        </wb-foreach>
                    </div>
                </div>
                <div class="post__main-row">
                    <span class="post__block-title" wb-if="'{{subtitle}}'>''">{{subtitle}}</span>
                    <p wb-if="'{{text}}'>''">{{text}}</p>
                </div>
            </div>
        </div>
    </div>
    <script >
    $(function(){
        new Swiper('#{{_var.sliderid}}', {
            loop: true, slidesPerView: 'auto', speed: 1000, spaceBetween: 30,
            navigation: {nextEl: '.gallery__nav .next', prevEl: '.gallery__nav .prev'}
        });
    });
</script>
</view>

<edit header="Libi - слайдер">
    <div>
        <wb-module wb="module=yonger&mode=edit&block=common.inc" />
    </div>
    <div class="form-group row">
        <label class="col-form-label col-sm-4">Заголовок слева</label>
        <div class="col-sm-8">
            <input name="aside" class="form-control">
        </div>
    </div>
    <div class="form-group">
        <div class="divider-text">Изображения</div>
        <wb-module wb="module=filepicker&width=250&&height=150" wb-path="/uploads/blog/" name="images">
        </wb-module>
    </div>
    <div class="form-group row">
        <label class="col-form-label col-sm-4">Заголовок под слайдером</label>
        <div class="col-sm-8">
            <input name="subtitle" class="form-control tx-bold">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-form-label col-sm-4">Текст под слайдером</label>
        <div class="col-sm-8">
            <textarea name="text" rows="auto" class="form-control"></textarea>
        </div>
    </div>
</edit>