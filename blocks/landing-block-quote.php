<edit header="Лендинг - блок с цитатой">
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
        <label class="col-form-label col-12">Текст цитаты</label>
        <div class="col-sm-12">
            <textarea name="text" class="form-control" rows="auto"></textarea>

        </div>
    </div>
    <div class="form-group row">
        <label class="col-form-label col-12">Автор</label>
        <div class="col-sm-12">
            <input name="author" class="form-control">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-form-label col-12">Подпись</label>
        <div class="col-sm-12">
            <input name="subtitle" class="form-control">
        </div>
    </div>
</edit>

<view>
    <div class="landing">
        <div class="info container">
            <div class="row --aicn mb-80">
                <div class="col-lg-4">
                    <div class="aside">
                        <h3 class="h3 mb-40" wb-if="'{{subheader}}'>''">{{subheader}}</h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <blockquote>
                        <p wb-if="'{{text}}'>''">«{{text}}»</p>
                        <figcaption>
                            <span wb-if="'{{author}}'>''">{{author}}</span>
                            <cite wb-if="'{{subtitle}}'>''">{{subtitle}}</cite>
                        </figcaption>
                    </blockquote>
                </div>
            </div>
        </div>
    </div>
</view>