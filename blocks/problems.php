<view>
    <script wb-app>
        $(".crumbs").after(`
        <div class="title-flex --flex --jcsb">
        <button class="btn btn--black --openpopup" data-popup="--fast-make" href="#">Записаться на прием </button>
        </div>
        `)
        $(".crumbs + div.title-flex + h1").prependTo($(".crumbs + div.title-flex"))

        $(".problems-filter__list .problems-filter__item").on('click', function(ev) {
            $(".problems-filter__list .problems-filter__item").removeClass('active')
            $(this).addClass('active')
            let category = $(this).data('category')
            wbapp.storage('problems.list.category', category)
            $(".search.search--service .search__input").trigger("keyup")
        })

        $(".all-tabs-item.data-tab-link").on('click', function() {
            $(".all-tabs-item.data-tab-link").removeClass("active")
            $(this).addClass('active')
            let srvtype = $('.all-tabs-items .data-tab-link.active').data('srvtype')
            wbapp.storage('problems.list.srvtype', srvtype)
            console.log(srvtype);
            srvtype == 'gyn' ? $('.problems-filter').addClass('d-none') : $('.problems-filter').removeClass('d-none')
            $(".problems-filter__list .problems-filter__item:first").trigger('click')
        })

        $(".search.search--service .search__input").on("keyup",function(){
            let srvtype = wbapp.storage('problems.list.srvtype')
            let category = wbapp.storage('problems.list.category')
            let regex = $(this).val();
            $(".all-services .all-services__item").hide()
            $(".all-services .all-services__item[data-srvtype='" + srvtype + "']").show()
            if (category > '') {
                $(".all-services .all-services__item[data-category]").each(function(){
                    $(this).is("[data-category*='"+category+"']") ? null : $(this).hide()
                })
            }
            srvtype=='gyn' ? $(".all-services .all-services__item[data-category*='gyn']").show() : null
            if (regex > '') {
                regex = new RegExp(regex, "gi");
                $(".all-services .all-services__item").each(function(){
                    let str = $(this).text()
                    str.match(regex) ? null : $(this).hide();
                })
            }
        })

        setTimeout(() => {
            let srvtype = wbapp.storage('problems.list.srvtype')
            let category = wbapp.storage('problems.list.category')
            srvtype ? null : srvtype = $(".all-tabs-items .data-tab-link[data-srvtype]:first").data('srvtype')
            category ? null : category = ''
            $(".all-tabs-item.data-tab-link[data-srvtype=" + srvtype + "]").trigger('click')
            category > '' ? $(".problems-filter__list .problems-filter__item[data-category=" + category + "]").trigger('click') : null
        }, 500)
    </script>
    <div class="container">
        <div class="search search--service">
            <div class="search__block --flex --aicn">
                <div class="input">
                    <input class="search__input" type="text" placeholder="Поиск" id="services-list">
                </div>
                <button class="btn btn--white">Найти</button>
            </div>
        </div>
        <wb-var active="active" />
        <div class="all-tabs-items" wb-tree="dict=srvtype&children=false">
            <div class="cursor-pointer all-tabs-item data-tab-link {{_var.active}}" data-srvtype="{{id}}" data-tabs="all-problems">{{name}}</div>
            <wb-var active="" />
        </div>
    </div>
    <div class="problems-filter">
        <div class="container">
            <p class="text-bold problems-filter__title">Фильтр:</p>
            <div class="problems-filter__list">
                <div class="cursor-pointer problems-filter__item active" data-category="">Все</div>
                <wb-foreach wb="table=catalogs&item=srvcat&from=tree.data">
                    <div class="cursor-pointer problems-filter__item" data-category="{{id}}" wb-if='!in_array({{id}},["gyn","lab"])'>{{name}}</div>
                </wb-foreach>
            </div>
        </div>
    </div>
    <wb-var active="active" />
    <div class="all-tabs data-tab-wrapper" data-tabs="all-problems">
        <div class="all-tab data-tab-item {{_var.active}}" >
            <div class="container">
                <div class="all-services">
                    <wb-foreach wb="table=problems&sort=header&size=999999&tpl=false" wb-filter="active=on">
                        <wb-var image="{{cover.0.img}}" wb-if="'{{cover.0.img}}'>''" else="/assets/img/all/1.jpg" />
                        <a class="all-services__item" href="/{{_table}}/{{wbFurlGenerate({{header}})}}" data-srvtype="{{srvtype}}" data-category='{{implode(" ",category)}}'>
                            <div class="all-services__pic" style="background-image: url(/thumbc/610x314/src{{_var.image}})"></div>
                            <div class="all-services__name">{{header}}</div>
                        </a>
                    </wb-foreach>
                </div>
            </div>
        </div>
        <wb-var active="" />
    </div>
</view>

<edit header="Все проблемы">
    <div>
        <wb-module wb="module=yonger&mode=edit&block=common.inc" />
    </div>
</edit>