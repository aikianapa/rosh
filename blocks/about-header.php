<view>
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

<preview>
<div class="container page">
    <div class="tags"> <a class="tag" href="equipment.html">Оборудование </a><a class="tag" href="gallery.html">Галерея </a><a class="tag" href="experts.html">Специалисты </a></div>
</div>
</preview>