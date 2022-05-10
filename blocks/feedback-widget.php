<edit header="Виджет - отзывы">
    <div>
        <wb-module wb="module=yonger&mode=edit&block=common.inc" />
    </div>
</edit>

<view>
    <div class="reports">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5 class="h5">Отзывы пациентов</h5>
                </div>
                <div class="col-md-8">
                    <div class="reports-slider">
                        <wb-var fbc="0" />
                        <div class="swiper-wrapper" wb-tree="item=feedback">
                            <div class="swiper-slide">
                                <div class="report">
                                    <div class="report__text">«{{data.text}}»</div>
                                    <div class="report__info">
                                        <div class="report__name">{{name}}</div>
                                        <div class="report__city">{{data.city}}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="report__navigation">
                            <div class="report__prev">
                                <svg class="svgsprite _prev">
                                    <use xlink:href="/assets/img/sprites/svgsprites.svg#prev"></use>
                                </svg>
                            </div>
                            <div class="report__pagination">
                                <div class="report__pagination-active"></div>/<div class="report__pagination-all"></div>
                            </div>
                            <div class="report__next">
                                <svg class="svgsprite _next">
                                    <use xlink:href="/assets/img/sprites/svgsprites.svg#next"></use>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script wb-app>
    $(function(){
        var RS = new Swiper('.reports-slider', {
            loop: false, slidesPerView: 1, speed: 1000, spaceBetween: 30,
            navigation: {nextEl: '.report__next', prevEl: '.report__prev'},
            on: {
                afterInit: function() {
                    var n = this.activeIndex + 1;
                    var t = this.slides.length;
                    $('.report__pagination-active').text(String("0" + n).slice(-2));
                    $('.report__pagination-all').text(String("0" + t).slice(-2));
                }
            }
        });

        RS.on('slideChange', function(){
            var n = RS.activeIndex + 1;
            var t = RS.slides.length;
            $('.report__pagination-active').text(String("0" + n).slice(-2));
            $('.report__pagination-all').text(String("0" + t).slice(-2));
        });
    });
</script>
</view>

<preview>
    <div class="reports page">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5 class="h5">Отзывы пациентов</h5>
                </div>
                <div class="col-md-8">
                    <div class="reports-slider">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="report">
                                    <div class="report__text">«Обратился в клинику по рекомендации. Очень доволен. Эффект от процедур был заметен очень быстро, раньше для незначительных улучшений приходилось «биться» месяцами. Сейчас прохожу в «ROSH» курс для закрепления результатов. Спасибо врачам!»</div>
                                    <div class="report__info">
                                        <div class="report__name">Марат</div>
                                        <div class="report__city">Московская обл.</div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="report">
                                    <div class="report__text">«Обратился в клинику по рекомендации. Очень доволен. Эффект от процедур был заметен очень быстро, раньше для незначительных улучшений приходилось «биться» месяцами. Сейчас прохожу в «ROSH» курс для закрепления результатов. Спасибо врачам!»</div>
                                    <div class="report__info">
                                        <div class="report__name">Марат</div>
                                        <div class="report__city">Московская обл.</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="report__navigation">
                            <div class="report__prev">
                                <svg class="svgsprite _prev">
                                    <use xlink:href="/assets/img/sprites/svgsprites.svg#prev"></use>
                                </svg>
                            </div>
                            <div class="report__pagination">
                                <div class="report__pagination-active">01</div>/<div class="report__pagination-all">02</div>
                            </div>
                            <div class="report__next">
                                <svg class="svgsprite _next">
                                    <use xlink:href="/assets/img/sprites/svgsprites.svg#next"></use>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</preview>