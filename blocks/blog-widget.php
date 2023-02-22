<view>
    <div class="blogs">
        <div class="container">
            <div class="blogs__list" id="blogList">

                <wb-var matrix="{{get_blog_matrix()}}"></wb-var>

                <wb-foreach wb="{
                    'ajax':'/api/v2/list/blog/',
                    'size':'10',
                    'sort': '_lastdate:d',
                    'more': 'true',
                    'bind': 'site.list.blog',
                    'filter':{
                        'active':'on',
                        'done':''
                    }
                }">
                    <wb-var width="33" />
                    <wb-var width="50" wb-if="'{{_ndx}}'>'3'" />
                    <wb-var width="100" wb-if="'{{_ndx}}'>'5'" />
                    <wb-var width="50" wb-if="'{{_ndx}}'=='7'" />
                    <wb-var width="33" wb-if="'{{_ndx}}'=='8'" />

                    <a class="blog-panel blog-panel--{{_var.matrix[{{_idx}}]}}" href="/blog/{{wbFurlGenerate({{header}})}}" style="background-image: url({{cover.0.img}})" data-date="{{date}}">
                        <div class="blog-panel__tags" data-cat="{{category}}">
                            <div class="blog-panel__tag" wb-tree="dict=blog&branch={{category}}">{{name}}</div>
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
	<script>
		$(document).on('wb-ready wb-ajax-done', function () {
			const _list = $('#blogList');
			_list.find(".blog-panel").sort(function (a, b) {

				const _da = $(a).attr('data-date').split(' ')[0].split('.').reverse().join('');
				const _db = $(b).attr('data-date').split(' ')[0].split('.').reverse().join('');
				console.log(_da, _db);
				const _a = parseInt(_da);
				const _b = parseInt(_db);
				return (_a > _b) ? -1 : (_a < _b) ? 1 : 0;
			}).appendTo(_list);

			console.log(' blog items order fixed! ');
		});
	</script>
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