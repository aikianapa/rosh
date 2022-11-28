<view>
    <div class="container" wb-if="'{{title}}'>''">
        <div class="container-wrap">
            <span class="libi-title">{{title}}</span>
        </div>
    </div>

</view>

<edit header="Libi - заголовок">
    <div>
        <wb-module wb="module=yonger&mode=edit&block=common.inc" />
    </div>
    <div class="form-group row">
        <label class="col-form-label col-sm-4">Заголовок</label>
        <div class="col-sm-8">
            <input name="title" class="form-control">
        </div>
    </div>
</edit>