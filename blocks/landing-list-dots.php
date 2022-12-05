<view>
    <div class="landing">
        <div class="info container">
            <div class="row --aicn mb-80">
                <div class="col-md-4">
                    <div class="aside">
                        <h2 class="h2" wb-if="'{{subheader}}'>''">{{subheader}}</h2>
                    </div>
                </div>
                <div class="col-md-6">
                        <ul>
                            <wb-foreach wb="from=list&tpl=false">
                            <li wb-if="'{{_val}}'>''">{{_val}}</li>
                            </wb-foreach>
                        </ul>
                </div>
            </div>
        </div>
    </div>
</view>

<edit header="Лендинг - список с точками">
    <div>
        <wb-module wb="module=yonger&mode=edit&block=common.inc" />
    </div>
    <div class="form-group row">
        <label class="col-form-label col-sm-3">Подзаголовок</label>
        <div class="col-sm-9">
            <input name="subheader" class="form-control tx-bold">
        </div>
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