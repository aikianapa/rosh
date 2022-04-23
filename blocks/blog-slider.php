<view>
    <wb-var sliderid="sl{{wbNewId}}" />
    <div class="row container">
        <div class="col-md-4">
            <h5 class="h5 content-title" wb-if="'{{aside}}'>''">{{aside}}</h5>
        </div>
        <div class="col-md-8">
            <div class="content-wrap">
                <h3 class="h3 mb-40" wb-if="'{{title}}'>''">{{title}}</h3>
            </div>
            <div class="slider-content">
                <div class="slider-content-overflow">
                    <div class="slider-content__wrap" id="{{_var.sliderid}}">
                        <div class="swiper-wrapper">
                            <wb-foreach wb="from=images&tpl=false">
                            <div class="swiper-slide slider-content__slide" style="background-image: url({{img}}); background-size: cover;"></div>
                            </wb-foreach>
                        </div>
                    </div>
                    <div class="gallery__nav slider-content__nav">
                        <div class="container">
                            <div class="prev">
                                <svg class="svgsprite _prev">
                                    <use xlink:href="assets/img/sprites/svgsprites.svg#prev"></use>
                                </svg>
                            </div>
                            <div class="next">
                                <svg class="svgsprite _next">
                                    <use xlink:href="assets/img/sprites/svgsprites.svg#next"></use>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slider-content__info">
                    <h2 class="h2 slider-content__title">Современная аппаратура</h2>
                    <p class="slider-content__text text-grey">Медицинский центр Rosh предлагает своим пациентам комфортное безболезненное лечение и обследования на современном сертифицированном оборудовании ведущих американских, немецких,французских,японских производителей.</p>
                </div>
            </div>

        </div>
    </div>
    <script type="text/javascript">
    $(function(){
        new Swiper('#{{_var.sliderid}}', {
            loop: true, slidesPerView: 1, speed: 1000, spaceBetween: 30,
            navigation: {nextEl: '.gallery__nav .next', prevEl: '.gallery__nav .prev'}
        });
    });
</script>
</view>

<edit header="Блог слайдер (узкий с текстом) ">
    <div>
        <wb-module wb="module=yonger&mode=edit&block=common.inc" />
    </div>
    <div class="form-group row">
        <label class="col-form-label col-sm-4">Заголовок сверху</label>
        <div class="col-sm-8">
            <input name="title" class="form-control tx-bold">
        </div>
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