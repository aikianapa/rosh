<view>
    <script wb-app>
        $(".crumbs").after(`
        <div class="title-flex --flex --jcsb">
        <button class="btn btn--black --openpopup" data-popup="--fast-make" href="#">Записаться на прием </button>
        </div>
        `)
        $(".crumbs + div.title-flex + h1").prependTo($(".crumbs + div.title-flex"))
        $(".problems-filter__list .problems-filter__item").on('click', function(ev) {
            $(".search.search--service .search__input").trigger("keyup")
            $(".problems-filter__list .problems-filter__item").removeClass('active')
            $(ev.target).addClass('active')
            let srvtype = $('.all-tabs-items .data-tab-link.active[data-tab][data-tabs=all-problems]').data('tab')
            let category = $(this).data('category')
            wbapp.storage('problems.list.srvtype', srvtype)
            wbapp.storage('problems.list.category', category)
            if (category == undefined || category == '') {
                $(".all-services .all-services__item[data-category]").show()
            } else {
                $(".all-services .all-services__item").hide()
                $(".all-services .all-services__item[data-category*='" + category + "']").show()
            }
        })

        $(".all-tabs-item.data-tab-link[data-tab]").on('click', function() {
            $(".all-tabs-item.data-tab-link[data-tab]").removeClass("active")
            $(this).addClass('active')
            let srvtype = $('.all-tabs-items .data-tab-link.active[data-tab][data-tabs=all-problems]').data('tab')
            wbapp.storage('problems.list.srvtype', srvtype)
        })

        $(".search.search--service .search__input").on("keyup",function(){
            let regex = $(this).val();
            if (regex > ' ') {
                regex = new RegExp(regex, "gi");
                $(".all-services .all-services__item").each(function(){
                    let str = $(this).text()
                    str.match(regex) ? $(this).show() : $(this).hide();
                })
            } else {
                $(".all-services .all-services__item").show()
            }
        })

        setTimeout(() => {
            let srvtype = wbapp.storage('problems.list.srvtype')
            let category = wbapp.storage('problems.list.category')
            if (srvtype) $(".all-tabs-item.data-tab-link[data-tab=" + srvtype + "]").trigger('click')
            if (category) $(".problems-filter__list .problems-filter__item[data-category=" + category + "]").trigger('click')

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
            <div class="cursor-pointer all-tabs-item data-tab-link {{_var.active}}" data-tab="{{id}}" data-tabs="all-problems">{{name}}</div>
            <wb-var active="" />
        </div>
    </div>
    <div class="problems-filter">
        <div class="container">
            <p class="text-bold problems-filter__title">Фильтр:</p>
            <div class="problems-filter__list">
                <div class="problems-filter__item cursor-pointer active" data-category="">Все</div>
                <wb-foreach wb="table=catalogs&item=srvcat&from=tree.data">
                    <div class="problems-filter__item cursor-pointer" data-category="{{id}}" wb-if='!in_array({{id}},["gyn","lab"])'>{{name}}</div>
                </wb-foreach>
            </div>
        </div>
    </div>
    <wb-var active="active" />
    <div class="all-tabs data-tab-wrapper" data-tabs="all-problems" wb-tree="dict=srvtype&children=false">
        <div class="all-tab data-tab-item {{_var.active}}" data-tab="{{id}}">
            <div class="container">
                <div class="all-services">
                    <wb-foreach wb="table=problems&size=999999" wb-filter="active=on&srvtype={{id}}">
                        <wb-var image="{{cover.0.img}}" wb-if="'{{cover.0.img}}'>''" else="/assets/img/all/1.jpg" />
                        <a class="all-services__item" href="/{{_table}}/{{wbFurlGenerate({{header}})}}" data-category='{{implode(" ",category)}}'>
                            <div class="all-services__pic" style="background-image: url(/thumbc/255x157/src{{_var.image}})"></div>
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