<view>
    <div class="container">
        <div class="crumbs"><a class="crumbs__arrow" href="#">
                <svg class="svgsprite _crumbs-back">
                    <use xlink:href="assets/img/sprites/svgsprites.svg#crumbs-back"></use>
                </svg></a><a class="crumbs__link" href="/">Главная</a><a class="crumbs__link" href="/about">{{_parent.header}}</a>
        </div>
        <h1 class="h1">{{_parent.header}}</h1>
    </div>
    <div class="container">
        <div class="tags">
            <wb-foreach wb-tpl="false" wb="{
                    'ajax':'/api/v2/list/pages/',
                    'size':'8',
                    'sort': '_sort',
                    'filter':{
                        'path':'/about',
                        'active':'on'
                    }
                }">
                <a class="tag" href="{{url}}">{{header}}</a>
            </wb-foreach>
        </div>
    </div>
</view>

<edit header="О компании (заголовок)">
    <div>
        <wb-module wb="module=yonger&mode=edit&block=common.inc" />
    </div>
    <div class="alert alert-info">
        Данный блок генерируется автоматически.
    </div>
</edit>