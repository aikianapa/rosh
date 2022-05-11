<view>

    <script wb-app>
        $(".crumbs").after(`
        <div class="title-flex --flex --jcsb">
        <button class="btn btn--black --openpopup" data-popup="--fast-make" href="#">Записаться на прием </button>
        </div>
        `)
        $(".crumbs + div.title-flex + h1").prependTo($(".crumbs + div.title-flex"))

        $(".all-tabs-item.data-tab-link[data-tab]").on('click', function(ev) {
            $(".search.search--service .search__input").trigger("keyup")
            let category = $(this).data('tab')
            wbapp.storage('services.list.category', category)
            if (category == undefined || category == '') {
                $(".all-services .all-services__item[data-category]").show()
            } else {
                $(".all-services .all-services__item").hide()
                $(".all-services .all-services__item[data-category*='" + category + "']").show()
            }
        })

        $(".search.search--service .search__input").on("keyup", function() {
            let regex = $(this).val();
            if (regex > ' ') {
                regex = new RegExp(regex, "gi");
                $(".all-services .all-services__item").each(function() {
                    let str = $(this).text()
                    str.match(regex) ? $(this).show() : $(this).hide();
                })
            } else {
                $(".all-services .all-services__item").show()
            }
        })

        setTimeout(() => {
            let category = wbapp.storage('services.list.category')
            if (category) {
                $(".all-tabs-item.data-tab-link[data-tab]").removeClass("active")
                $(".all-tabs-item.data-tab-link[data-tab=" + category + "]").addClass("active").trigger('click')
            }
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
        <div class="all-tabs-items">
            <div class="all-tabs-item data-tab-link active" data-tabs="services" data-tab="">Все услуги</div>
            <wb-foreach wb="table=catalogs&item=srvcat&from=tree.data">
                <div class="all-tabs-item data-tab-link cursor-pointer" data-tabs="services" data-tab="{{id}}">{{name}}</div>
            </wb-foreach>
        </div>
        <div class="all-tabs data-tab-wrapper" data-tabs="services">
            <div class="all-tab data-tab-item active" data-tab="all">
                <div class="all-services">
                    <wb-foreach wb="table=services">
                        <wb-var image="{{cover.0.img}}" wb-if="'{{cover.0.img}}'>''" else="/assets/img/all/1.jpg" />
                        <a class="all-services__item" href="/services/{{wbFurlGenerate({{header}})}}" data-category="{{category}}">
                            <div class="all-services__pic" style="background-image: url(/thumbc/255x157/src{{_var.image}})"></div>
                            <div class="all-services__name">{{header}}</div>
                        </a>
                    </wb-foreach>
                </div>
            </div>
        </div>
    </div>
</view>

<edit header="Все услуги">
    <div>
        <wb-module wb="module=yonger&mode=edit&block=common.inc" />
    </div>
</edit>