<view>
    <div class="landing">
        <div class="container">
            <div class="row --aicn mb-80">
                <div class="col-md-4">
                    <div class="aside">
                        <h3 class="h2" wb-if="'{{subheader}}'>''">{{subheader}}</h3>
                        <div class="text">
                            <ul>
                                <wb-foreach wb="from=list&tpl=false">
                                <li wb-if="'{{_val}}'>''">{{_val}}</li>
                                </wb-foreach>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="content-pic" wb-if="'{{image.0.img}}'>''"><img src="/thimbc/807x629/src{{image.0.img}}" alt="{{_parent.header}}"></div>
                </div>
            </div>
        </div>
    </div>
</view>

<edit header="Лендинг - список и фото справа">
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
        <label class="col-form-label col-sm-3">Список</label>
        <div class="col-sm-9">
            <wb-multiinput name="list">
                <input name="list" class="form-control">
            </wb-multiinput>    
        
        </div>
    </div>
    <div class="form-group">
        <label>Изображение</label>
        <wb-module wb="module=filepicker&mode=single&width=780&&height=315" wb-path="/uploads/landing/images/" name="image">
        </wb-module>
    </div>
</edit>

