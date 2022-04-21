<view>
    <div class="col-md-4"></div>
    <div class="col-md-8">
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
</view>

<edit header="Блог контент">
    <div>
        <wb-module wb="module=yonger&mode=edit&block=common.inc" />
    </div>
    <div class="form-group">
        <label>Текст</label>
        <input name="text" wb="module=ckeditor">
    </div>
</edit>