<view>
    <div class="row container">
        <div class="col-md-4">
            <h5 class="h5 content-title" wb-if="'{{aside}}'>''">{{aside}}</h5>
        </div>
        <div class="col-md-8">
            <div class="content-wrap">
                <h3 class="h3 mb-40" wb-if="'{{title}}'>''">{{title}}</h3>
                <div class="blog-inner__text">
                    <div class="text">
                        {{text}}
                    </div>
                    <wb-jq wb="$dom->find('p')->addClass('mb-10');
                $dom->find('iframe')->attr('width','560');
                $dom->find('iframe')->attr('height','315');
                $dom->find('iframe, img')->addClass('mt-80 radius-20');
                $dom->find('iframe')->parent()->addClass('video mb-40');" />
                </div>
            </div>
        </div>
    </div>
</view>

<edit header="Блог контент">
    <div>
        <wb-module wb="module=yonger&mode=edit&block=common.inc" />
    </div>
    <div class="form-group">
        <label>Заголовок сверху</label>
        <input name="title" class="form-control tx-bold">
    </div>
    <div class="form-group">
        <label>Заголовок слева</label>
        <input name="aside" class="form-control">
    </div>
    <div class="form-group">
        <label>Текст справа</label>
        <input name="text" wb="module=ckeditor">
    </div>
</edit>