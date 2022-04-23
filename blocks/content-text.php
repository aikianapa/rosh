<view>
    <h3 class="h3 mb-40" wb-if="'{{title}}'>''">{{title}}</h3>
    <div class="text">
        {{text}}
    </div>
    <wb-jq wb="$dom->find('p')->addClass('mb-10');
                $dom->find('ul')->addClass('ul-line mb-20');
                $dom->find('iframe')->attr('width','560');
                $dom->find('iframe')->attr('height','315');
                $dom->find('iframe, img')->addClass('mt-80 radius-20');
                $dom->find('iframe')->parent()->addClass('video mb-40');" />
    </div>

</view>

<edit header="Контент текст">
    <div>
        <wb-module wb="module=yonger&mode=edit&block=common.inc" />
    </div>
    <div class="form-group row">
        <label class="col-form-label col-sm-4">Заголовок сверху</label>
        <div class="col-sm-8">
            <input name="title" class="form-control tx-bold">
        </div>
    </div>
    <div class="form-group">
        <label>Текст</label>
        <input name="text" wb="module=ckeditor">
    </div>
</edit>