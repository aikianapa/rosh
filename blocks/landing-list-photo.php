<view>
    <div class="landing">
        <div class="container">
            <div class="row --aicn mb-80">
                <div class="col-md-4">
                    <div class="aside">
                        <h2 class="h2">{{subheader}}</h2>
                        <div class="text">
                            <ul>
                                <wb-foreach wb="from=list&tpl=false">
                                <li>{{_val}}</li>
                                </wb-foreach>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="content-pic"><img src="/thimbc/807x629/src{{image.0.img}}" alt=""></div>
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

<preview>
    <div class="landing page">
        <div class="container">
            <div class="row --aicn mb-80">
                <div class="col-md-4">
                    <div class="aside">
                        <h2 class="h2">Помимо пищевой аллергии распространены:</h2>
                        <div class="text">
                            <ul>
                                <li>поллиноз (сезонная аллергия на пыльцу растений)</li>
                                <li>медикаментозная аллергия,</li>
                                <li>аллергия на укусы насекомых,</li>
                                <li>бытовую химию и на животных.</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="content-pic"><img src="/assets/img/landing/1.jpg" alt=""></div>
                </div>
            </div>
        </div>
    </div>
</preview>