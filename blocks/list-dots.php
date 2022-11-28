<edit header="Список с точками">
    <div>
        <wb-module wb="module=yonger&mode=edit&block=common.inc" />
    </div>
    <div class="form-group row">
        <label class="col-form-label col-12">Список с точками</label>
        <div class="col-sm-12">
            <wb-multiinput name="list">
                <input name="list" class="form-control">
            </wb-multiinput>
        </div>
    </div>
</edit>

<view>
    <div class="info container">
    <ul>
        <wb-foreach wb="from=list&tpl=false">
        <li>{{_val}}</li>
        </wb-foreach>
    </ul>
    </div>
</view>