<edit header="Свайпер и ссылки">
    <div>
        <wb-module wb="module=yonger&mode=edit&block=common.inc" />
    </div>
    <wb-multiinput name="swiper">
        <div class="col-sm-4">
            <wb-module wb="module=filepicker&mode=single&width=730&height=570" wb-path="/uploads/landing/images/" name="image">
            </wb-module>
        </div>
        <div class="col-sm-8 pl-3">
            <div class="form-group row">
                <label class="col-form-label col-sm-3">Заголовок</label>
                <div class="col-sm-9">
                    <input name="title" class="form-control tx-bold">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-sm-3">Ссылка</label>
                <div class="col-sm-9">
                    <input name="href" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-sm-3">Тэг</label>
                <div class="col-sm-9">
                    <input name="tag" class="form-control">
                </div>
            </div>

        </div>
    </wb-multiinput>
</edit>

<view>
    <div class="problems">
        <div class="container">
            <div class="problems__slider">
                <div class="swiper-wrapper">
                    <wb-foreach wb="from=swiper">
                        <div class="swiper-slide">
                            <a class="problem__link" href="#" style="background-image: url(/thumbc/730x570/src{{image.0.img}})">
                                <div class="blog-panel__tag" wb-if="'{{tag}}'>''">{{tag}}</div>
                                <div class="problem__name">{{title}}</div>
                            </a>
                        </div>
                    </wb-foreach>
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
    <script wb-app>
        $(function() {
            var PS = new Swiper('.problems__slider', {
                loop: true,
                slidesPerView: 1,
                speed: 1000,
                spaceBetween: 30,
                navigation: {
                    nextEl: '.problems .next',
                    prevEl: '.problems .prev'
                },
                breakpoints: {
                    768: {
                        slidesPerView: 2
                    }
                }
            });
        })
    </script>
</view>

<preview>
    <div class="problems page">
        <div class="container">
            <div class="problems__slider">
                <div class="swiper-wrapper">
                    <div class="swiper-slide"> <a class="problem__link" href="#" style="background-image: url(/assets/img/landing/1.jpg)">
                            <div class="blog-panel__tag">Проблемы</div>
                            <div class="problem__name">Акне и постакне</div>
                        </a></div>
                    <div class="swiper-slide"> <a class="problem__link" href="#" style="background-image: url(/assets/img/landing/1.jpg)">
                            <div class="blog-panel__tag">Проблемы</div>
                            <div class="problem__name">Акне и постакне</div>
                        </a></div>
                    <div class="swiper-slide"> <a class="problem__link" href="#" style="background-image: url(/assets/img/landing/1.jpg)">
                            <div class="blog-panel__tag">Проблемы</div>
                            <div class="problem__name">Акне и постакне</div>
                        </a></div>
                    <div class="swiper-slide"> <a class="problem__link" href="#" style="background-image: url(/assets/img/landing/1.jpg)">
                            <div class="blog-panel__tag">Проблемы</div>
                            <div class="problem__name">Акне и постакне</div>
                        </a></div>
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
    <script wb-app>
        $(function() {
            var PS = new Swiper('.problems__slider', {
                loop: true,
                slidesPerView: 1,
                speed: 1000,
                spaceBetween: 30,
                navigation: {
                    nextEl: '.problems .next',
                    prevEl: '.problems .prev'
                },
                breakpoints: {
                    768: {
                        slidesPerView: 2
                    }
                }
            });
        })
    </script>
</preview>