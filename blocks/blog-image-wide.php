<view>
    <div>
        <div class=" container">
            <img class="mb-40 radius-20 w-100p" src="{{image.0.img}}" alt="">
        </div>
    </div>
</view>

<edit header="Блог изображение (широкое)">
    <div>
        <wb-module wb="module=yonger&mode=edit&block=common.inc" />
    </div>
    <div class="form-group">
        <label>Изображение</label>
        <wb-module wb="module=filepicker&mode=single&width=780&&height=315" wb-path="/uploads/blog/" name="image">
        </wb-module>
    </div>
</edit>