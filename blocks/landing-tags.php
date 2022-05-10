<edit header="Лендинг - тэги">
    <div>
        <wb-module wb="module=yonger&mode=edit&block=common.inc" />
    </div>

    <div class="form-group row">
        <label class="col-form-label col-sm-3">Заголовок</label>
        <div class="col-sm-9">
            <input name="title" class="form-control tx-bold">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-form-label col-sm-3">Тэги</label>
        <div class="col-sm-9">
                <input name="tags" class="form-control" wb-module="tagsinput">
        </div>
    </div>
</edit>

<view>
    <div class="landing">
        <div class="container">
            <div class="row">
                <div class="offset-md-4 col-md-8">
                    <div class="symptoms">
                        <h3 class="h3 mb-40">{{title}}</h3>
                        <div class="tags">
                        <wb-foreach wb='json={{explode(",",{{tags}})}}&tpl=false'>
                            <div class="tag">{{_val}}</div>
                        </wb-foreach>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</view>

<preview>
    <div class="landing page">
        <div class="container">
            <div class="row">
                <div class="offset-md-4 col-md-8">
                    <div class="symptoms">
                        <h3 class="h3 mb-40">Симптомы:</h3>
                        <div class="tags">
                            <div class="tag">Воспаленная кожа </div>
                            <div class="tag">Жжение кожи</div>
                            <div class="tag">Зуд кожи;</div>
                            <div class="tag">Зудящие пятна;</div>
                            <div class="tag">Красная кожа;</div>
                            <div class="tag">Отек;</div>
                            <div class="tag">Отечные красные пятна</div>
                            <div class="tag">Пузыри на коже;</div>
                            <div class="tag">Шелушение кожи</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</preview>