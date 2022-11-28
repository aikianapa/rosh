<edit header="Список с номерами">
    <div>
        <wb-module wb="module=yonger&mode=edit&block=common.inc" />
    </div>
    <div class="form-group row">
        <label class="col-form-label col-12">Список с номерами</label>
        <div class="col-sm-12">
            <wb-multiinput name="list">
                <input name="list" class="form-control">
            </wb-multiinput>
        </div>
    </div>
</edit>

<view>
    <div class="info container">
    <ol>
        <wb-foreach wb="from=list&tpl=false">
        <li>{{_val}}</li>
        </wb-foreach>
    </ol>
    </div>
</view>