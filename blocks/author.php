<edit header="Автор статьи">
    <div>
        <wb-module wb="module=yonger&mode=edit&block=common.inc" />
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
        <div class="container author">
            <div class="row --aicn mb-80">
                <div class="col-lg-4">
                </div>
                <div class="col-lg-6">
                    <blockquote>
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