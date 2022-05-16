<view>
    <div class="container blog-head">
        <div class="crumbs"><a class="crumbs__arrow" href="javascript:window.history.back();">
                <svg class="svgsprite _crumbs-back">
                    <use xlink:href="assets/img/sprites/svgsprites.svg#crumbs-back"></use>
                </svg></a><a class="crumbs__link" href="/">Главная</a><a class="crumbs__link" href="/blog">{{_parent.header}}</a>
        </div>
        <div class="title-flex --flex --jcsb --aicn">
            <h1 class="h1">{{_parent.header}}</h1>
            <div class="filter" id="blogFilter">
                <div class="filter__item">
                    <div class="filter__name text-bold">Разделы </div>
                    <div class="filter__select">
                        <div class="filter-select select">
                            <div class="filter-select__main select__main" data-id="">Все</div>
                            <div class="filter-select__list select__list" wb-tree="dict=blog&children=false">
                                <div class="filter-select__item select__item filter-category" data-ajax="{'target':'#blogList','filter_remove': 'category','filter_add':{'category':'{{id}}'}}" data-id="{{id}}">{{name}}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="filter__item">
                    <div class="filter__name text-bold">Период </div>
                    <div class="filter__select">
                        <div class="filter-select select">
                            <div class="filter-select__main select__main">Месяц</div>
                            <div class="filter-select__list select__list">
                                <wb-foreach wb-tpl="false" wb-count="12">
                                    <div class="filter-select__item select__item active">{{_ndx}}</div>
                                </wb-foreach>
                            </div>
                        </div>
                    </div>
                    <div class="filter__select">
                        <div class="filter-select select">
                            <div class="filter-select__main select__main">Год</div>
                            <div class="filter-select__list select__list">
                                <div class="filter-select__item select__item active">Пункт 1</div>
                                <div class="filter-select__item select__item">Пункт 2</div>
                                <div class="filter-select__item select__item">Пункт 3</div>
                                <div class="filter-select__item select__item">Пункт 4</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="blogs">
        <div class="container">
            <div class="blogs__list" id="blogList">
                <wb-foreach wb="{
                    'ajax':'/api/v2/list/blog/',
                    'size':'8',
                    'sort': 'date:d',
                    'bind': 'site.list.blog',
                    'filter':{
                        'active':'on'
                    }
                }">
                    <wb-var width="33" />
                    <wb-var width="50" wb-if="'{{_ndx}}'>'3'" />
                    <wb-var width="100" wb-if="'{{_ndx}}'>'5'" />
                    <wb-var width="66" wb-if="'{{_ndx}}'=='7'" />
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
    <script wb-app remove>

    </script>
</view>

<edit header="Блог">
    <div>
        <wb-module wb="module=yonger&mode=edit&block=common.inc" />
    </div>
</edit>