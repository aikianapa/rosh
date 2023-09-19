<view>
    <div class="container post_block">
        <div class="post__block right">
            <div class="post__block-info text">
                <span class="post__block-title" wb-if="'{{title}}'>''">{{title}}</span>
                <p wb-if="'{{text}}'>''">
                    {{nl2br(text)}}
                    <img src="{{image.0.img}}" alt="{{title}}">
                </p>
            </div>
        </div>
    </div>
</view>

<edit header="Landing - текст-фото (справа)">
    <div>
        <wb-module wb="module=yonger&mode=edit&block=common.inc" />
    </div>
    <div class="form-group row">
        <label class="col-form-label col-sm-4">Заголовок</label>
        <div class="col-sm-8">
            <input name="title" class="form-control">
        </div>
    </div>

    <div class="form-group row">
        <label class="col-form-label col-sm-4">Текст</label>
        <div class="col-sm-8">
            <textarea name="text" rows="auto" class="form-control"></textarea>
        </div>
    </div>

    <div class="form-group">
        <label>Изображение</label>
        <wb-module wb="module=filepicker&mode=single&width=580&&height=315" wb-path="/uploads/blog/" name="image">
        </wb-module>
    </div>

</edit>
