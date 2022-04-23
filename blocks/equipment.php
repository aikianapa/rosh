<view>
    <div class="container">
        <div class="equipments">
        <wb-foreach wb="{'table':'equipment',
                            'render':'server',
                            'bind':'cms.list.equipment',
                            'sort':'date:d',
                            'size':'{{_sett.page_size}}',
                            'filter': {'active':'on','_site' : {'$in': [null,'{{_sett.site}}']}}
            }">
            <div class="equipment --openpopup" data-popup="--eq" data-id="{{id}}">
                <div class="equipment__pic" style="background-image: url({{cover.0.img}})"></div>
                <div class="equipment__name text-bold">{{header}}</div>
            </div>
        </wb-foreach>
        </div>
    </div>

    <script>
        $(document).delegate('.equipment.--openpopup',wbapp.evClick,function(){
            let header = $(this).find('.equipment__name').text();
            let id = $(this).data('id');
            $('.popup.--eq .popup__body').html("");
            $('.popup.--eq .popup__name').text(header);
            fetch('/form/equipment/popup/'+id).then(function(response){
                return response.text();
            }).then(function(html){
                $('.popup.--eq .popup__body').html(html);
            })
        })
    </script>

    <div class="popup --eq">
        <div class="popup__overlay"></div>
        <div class="popup__panel">
            <button class="popup__close">
                <svg class="svgsprite _close">
                    <use xlink:href="/assets/img/sprites/svgsprites.svg#close"></use>
                </svg>
            </button>
            <div class="popup__name text-bold"></div>
            <div class="popup__body"></div>
        </div>
    </div>
</view>

<edit header="Оборудование">
    <div>
        <wb-module wb="module=yonger&mode=edit&block=common.inc" />
    </div>
</edit>