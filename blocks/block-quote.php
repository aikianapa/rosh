<edit header="Блок с цитатой">
    <div>
        <wb-module wb="module=yonger&mode=edit&block=common.inc" />
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
    <div class="info container">
        <blockquote>
            <p wb-if="'{{text}}'>''">«{{text}}»</p>
            <figcaption>
                <span wb-if="'{{author}}'>''">{{author}}</span>
                <cite wb-if="'{{subtitle}}'>''">{{subtitle}}</cite>
            </figcaption>
        </blockquote>
    </div>
</view>