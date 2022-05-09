<view>
    <div class="blogs">
        <div class="container">
            <div class="blogs__list">
                <wb-foreach wb="{
                    'ajax':'/api/v2/list/blog/',
                    'limit':'8',
                    'sort': 'date:d',
                    'filter':{
                        'active':'on'
                    }
                }" wb-tpl="false">
                    <wb-var width="33" />
                    <wb-var width="50" wb-if="'{{_ndx}}'>'3'" />
                    <wb-var width="100" wb-if="'{{_ndx}}'>'5'" />
                    <wb-var width="50" wb-if="'{{_ndx}}'=='7'" />
                    <wb-var width="33" wb-if="'{{_ndx}}'=='8'" />
                    <a class="blog-panel blog-panel--{{_var.width}}" href="/blog/{{wbFurlGenerate({{header}})}}" style="background-image: url({{cover.0.img}})">
                        <div class="blog-panel__tags">
                            <div class="blog-panel__tag" wb-tree="dict=blog&branch={{category}}">{{name}}</div>
                            <div class="blog-panel__tag" wb-if="'{{done}}'=='on'">Завершенная</div>
                        </div>
                        <div class="blog-panel__info">
                            <div class="blog-panel__top">
                                <div class="blog-panel__date">{{dateform({{date}})}}</div>
                                <div class="blog-panel__title">{{header}}</div>
                            </div>
                            <div class="blog-panel__bottom">
                                <div class="blog-panel__text">
                                    {{wbGetWords({{blocks.blog_content.text}},15)}}
                                </div>
                                <div class="blog-panel__link">Читать далее</div>
                            </div>
                        </div>
                    </a>
                </wb-foreach>
            </div>
        </div>
    </div>
</view>
<edit header="Виджет новостей">
    <div>
        <wb-module wb="module=yonger&mode=edit&block=common.inc" />
    </div>
</edit>

<preview>
    <div class="blogs">
        <div class="container">
            <div class="blogs__list">
                <a class="blog-panel blog-panel--33" href="blog-inner.html" style="background-image: url(/assets/img/blogs/1.jpg)">
                    <div class="blog-panel__tags">
                        <div class="blog-panel__tag">Новость</div>
                        <div class="blog-panel__tag">Завершенная</div>
                    </div>
                    <div class="blog-panel__info">
                        <div class="blog-panel__top">
                            <div class="blog-panel__date">27.10.2021</div>
                            <div class="blog-panel__title">Mini FX</div>
                        </div>
                        <div class="blog-panel__bottom">
                            <div class="blog-panel__text">Только в нашем медицинском центре проводит консультации всемирно известный пластический хирург из Швейцарии Мишаль Брюггер.
                            </div>
                            <div class="blog-panel__link">Читать далее</div>
                        </div>
                    </div>
                </a>
                <a class="blog-panel blog-panel--33" href="blog-inner.html" style="background-image: url(/assets/img/blogs/1.jpg)">
                    <div class="blog-panel__tags">
                        <div class="blog-panel__tag">Новость</div>
                    </div>
                    <div class="blog-panel__info">
                        <div class="blog-panel__top">
                            <div class="blog-panel__date">27.10.2021</div>
                            <div class="blog-panel__title">Mini FX</div>
                        </div>
                        <div class="blog-panel__bottom">
                            <div class="blog-panel__text">Только в нашем медицинском центре проводит консультации всемирно известный пластический хирург из Швейцарии Мишаль Брюггер.
                            </div>
                            <div class="blog-panel__link">Читать далее</div>
                        </div>
                    </div>
                </a>
                <a class="blog-panel blog-panel--33" href="blog-inner.html" style="background-image: url(/assets/img/blogs/1.jpg)">
                    <div class="blog-panel__tags">
                        <div class="blog-panel__tag">Новость</div>
                    </div>
                    <div class="blog-panel__info">
                        <div class="blog-panel__top">
                            <div class="blog-panel__date">27.10.2021</div>
                            <div class="blog-panel__title">Mini FX</div>
                        </div>
                        <div class="blog-panel__bottom">
                            <div class="blog-panel__text">Только в нашем медицинском центре проводит консультации всемирно известный пластический хирург из Швейцарии Мишаль Брюггер.
                            </div>
                            <div class="blog-panel__link">Читать далее</div>
                        </div>
                    </div>
                </a>
                <a class="blog-panel blog-panel--50" href="blog-inner.html" style="background-image: url(/assets/img/blogs/1.jpg)">
                    <div class="blog-panel__tags">
                        <div class="blog-panel__tag">Новость</div>
                    </div>
                    <div class="blog-panel__info">
                        <div class="blog-panel__top">
                            <div class="blog-panel__date">27.10.2021</div>
                            <div class="blog-panel__title">Mini FX</div>
                        </div>
                        <div class="blog-panel__bottom">
                            <div class="blog-panel__text">Только в нашем медицинском центре проводит консультации всемирно известный пластический хирург из Швейцарии Мишаль Брюггер.
                            </div>
                            <div class="blog-panel__link">Читать далее</div>
                        </div>
                    </div>
                </a>
                <a class="blog-panel blog-panel--50" href="blog-inner.html" style="background-image: url(/assets/img/blogs/1.jpg)">
                    <div class="blog-panel__tags">
                        <div class="blog-panel__tag">Новость</div>
                    </div>
                    <div class="blog-panel__info">
                        <div class="blog-panel__top">
                            <div class="blog-panel__date">27.10.2021</div>
                            <div class="blog-panel__title">Mini FX</div>
                        </div>
                        <div class="blog-panel__bottom">
                            <div class="blog-panel__text">Только в нашем медицинском центре проводит консультации всемирно известный пластический хирург из Швейцарии Мишаль Брюггер.
                            </div>
                            <div class="blog-panel__link">Читать далее</div>
                        </div>
                    </div>
                </a>
                <a class="blog-panel blog-panel--100" href="blog-inner.html" style="background-image: url(/assets/img/blogs/1.jpg)">
                    <div class="blog-panel__tags">
                        <div class="blog-panel__tag">Новость</div>
                    </div>
                    <div class="blog-panel__info">
                        <div class="blog-panel__top">
                            <div class="blog-panel__date">27.10.2021</div>
                            <div class="blog-panel__title">Mini FX</div>
                        </div>
                        <div class="blog-panel__bottom">
                            <div class="blog-panel__text">Только в нашем медицинском центре проводит консультации всемирно известный пластический хирург из Швейцарии Мишаль Брюггер.
                            </div>
                            <div class="blog-panel__link">Читать далее</div>
                        </div>
                    </div>
                </a>
                <a class="blog-panel blog-panel--66" href="blog-inner.html" style="background-image: url(/assets/img/blogs/1.jpg)">
                    <div class="blog-panel__tags">
                        <div class="blog-panel__tag">Новость</div>
                    </div>
                    <div class="blog-panel__info">
                        <div class="blog-panel__top">
                            <div class="blog-panel__date">27.10.2021</div>
                            <div class="blog-panel__title">Mini FX</div>
                        </div>
                        <div class="blog-panel__bottom">
                            <div class="blog-panel__text">Только в нашем медицинском центре проводит консультации всемирно известный пластический хирург из Швейцарии Мишаль Брюггер.
                            </div>
                            <div class="blog-panel__link">Читать далее</div>
                        </div>
                    </div>
                </a>
                <a class="blog-panel blog-panel--33" href="blog-inner.html" style="background-image: url(/assets/img/blogs/1.jpg)">
                    <div class="blog-panel__tags">
                        <div class="blog-panel__tag">Новость</div>
                    </div>
                    <div class="blog-panel__info">
                        <div class="blog-panel__top">
                            <div class="blog-panel__date">27.10.2021</div>
                            <div class="blog-panel__title">Mini FX</div>
                        </div>
                        <div class="blog-panel__bottom">
                            <div class="blog-panel__text">Только в нашем медицинском центре проводит консультации всемирно известный пластический хирург из Швейцарии Мишаль Брюггер.
                            </div>
                            <div class="blog-panel__link">Читать далее</div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

</preview>