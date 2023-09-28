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
                    <div class="filter__name text-bold">Теги </div>
                    <div class="filter__select">
                        <div class="filter-select select">
                            <div class="filter-select__main select__main">Все</div>
                            <div class="filter-select__list select__list" id="tag">
                                <div class="filter-select__item select__item filter-tag" data-tag="*" on-click="setTag">Все</div>
                                {{#each t}}
                                    <div class="filter-select__item select__item active blank" data-tag="{{.}}" on-click="setTag">{{.}}</div>
                                {{/each}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="filter__item">
                    <div class="filter__name text-bold">Разделы </div>
                    <div class="filter__select">
                        <div class="filter-select select">
                            <div class="filter-select__main select__main">Все</div>
                            <div class="filter-select__list select__list" id="category" wb-tree="dict=blog&children=false">
                                <div class="filter-select__item select__item filter-category" data-id="*" on-click="setCat" wb-if="'{{_idx}}'=='0'">Все</div>
                                <div class="filter-select__item select__item filter-category" data-id="{{id}}" on-click="setCat">{{name}}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="filter__item">
                    <div class="filter__name text-bold">Период </div>
                    <div class="filter__select">
                        <div class="filter-select select">
                            <div class="filter-select__main select__main">Год</div>
                            <div class="filter-select__list select__list" id="years">
                                <div class="filter-select__item select__item active blank all" on-click="setYear">Все</div>
                                {{#each y}}
                                    <div class="filter-select__item select__item active blank" data-id="{{.}}" on-click="setYear">{{.}}</div>
                                {{/each}}
                            </div>
                        </div>
                    </div>
                    <div class="filter__select">
                        <div class="filter-select select" wb-off>
                            <div class="filter-select__main select__main">Месяц</div>
                            <div class="filter-select__list select__list" id="months">
                                <div class="filter-select__item select__item active blank all" data-id="*" on-click="setMonth">Все</div>
                                {{#each m}}
                                    <div class="filter-select__item select__item active blank" data-id="{{num}}" on-click="setMonth">{{name}}</div>
                                {{/each}}
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

                <wb-var matrix="{{get_blog_matrix()}}"></wb-var>

                <wb-foreach wb="{
                    'ajax':'/api/v2/list/blog/?@sort=date:d',
                    'bind': 'site.list.blog',
                    'filter':{
                        'active':'on'
                    },
                    'size':'4',
                    'more':'true'
                }">
                    <wb-var width="33" />
                    <wb-var width="50" wb-if="'{{_ndx}}'>'3'" />
                    <wb-var width="100" wb-if="'{{_ndx}}'>'5'" />
                    <wb-var width="66" wb-if="'{{_ndx}}'=='7'" />
                    <wb-var width="33" wb-if="'{{_ndx}}'=='8'" />
                    <a class="blog-panel blog-panel--{{_var.matrix[{{_idx}}]}}" href="/blog/{{wbFurlGenerate({{header}})}}" style="background-image: url('{{cover.0.img}}')" data-date="{{date}}">
                        <div class="blog-panel__tags">
                            <div class="mr-20 blog-panel__tag" wb-tree="dict=blog&branch={{category}}">{{name}}</div>
                            <div class="tag-list d-none" data-tags="{{tags}}"></div>
                            <div wb-if="'{{category}}'=='action'">
                                <div class="blog-panel__tag" wb-if="'{{done}}'=='on'">Завершенная</div>
                                <div class="blog-panel__tag" wb-if="'{{done}}'!=='on'">Активная</div>
                            </div>
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

            <div class="pagination custom">
                <div class="page-more" data-trigger="click" data-page="more">
                    <a href="#more" class="more btn btn--white" data-page="2">Загрузить ещё</a>
                </div>
            </div>
        </div>
    </div>

    <script>
        console.log("custom pagination")
        if (window.innerWidth < 600) {
            $(document).on("wb-ready wb-ajax-start wb-ajax-done bind", function () {
                $(document).off('scroll');
                console.log("close scroll")
            })

            $(".pagination.custom .page-more").on("click" , function () {
                $(".page-more[data-trigger='auto'] .page-link.more").click();
            })
        } else {
            console.log(".pagination.custom.remove()")
            $(".pagination.custom").remove();
        }
    </script>
</view>

<edit header="Блог">
    <div>
        <wb-module wb="module=yonger&mode=edit&block=common.inc" />
    </div>
</edit>