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
        <div class="col-12">
            <div class="divider-text">Тэги</div>
        </div>
            <div class="col-12">
                <wb-multiinput name="tags">
                    <div class="col">
                        <input name="tag" class="form-control" placeholder="Тэг">
                    </div>
                    <div class="col">
                        <input name="link" class="form-control" wb="module=yonger&mode=pageselect" placeholder="Ссылка">
                    </div>
                </wb-multiinput>

            </div>
        </div>
</edit>

<view>
    <div class="mt-40 mb-40 landing">
        <div class="container">
            <div class="row">
                <div class="offset-lg-4 col-lg-8">
                    <div class="symptoms">
                        <h3 class="mb-40 h3" wb-if="'{{title}}'>''">{{title}}</h3>
                        <div class="tags">
                            <wb-foreach wb='from=tags&tpl=false'>
                                <a href="{{link}}" class="tag" wb-if="'{{tag}}'>''">{{tag}}</a>
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
                <div class="offset-lg-4 col-lg-8">
                    <div class="symptoms">
                        <h3 class="mb-40 h3">Симптомы:</h3>
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