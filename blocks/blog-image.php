<view>
    <div class="col-md-4"></div>
    <div class="col-md-8">
    <div class="blog-inner__text">
        <div class="text">
            <img class="mb-40 radius-20" src="{{image.0.img}}" alt="">
        </div>
        </div>
    </div>
</view>

<edit header="Блог изображение">
    <div>
        <wb-module wb="module=yonger&mode=edit&block=common.inc" />
    </div>
    <div class="form-group">
        <label>Изображение</label>
        <wb-module wb="module=filepicker&mode=single&width=580&&height=315" wb-path="/uploads/blog/" name="image">
        </wb-module>
    </div>
</edit>