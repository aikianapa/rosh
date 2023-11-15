<edit header="Лендинг - широкая картинка">
    <div>
        <wb-module wb="module=yonger&mode=edit&block=common.inc" />
    </div>
    <div class="form-group">
        <label>Изображение</label>
        <wb-module wb="module=filepicker&mode=single&width=780&height=315" wb-path="/uploads/landing/images/" name="image">
        </wb-module>
    </div>
</edit>

<view>
    <div class="full-pic" wb-if="'{{image.0.img}}'>''" data-large-container="{{_parent.largeContainer}}"><img src="{{image.0.img}}" alt="{{_parent.header}}"></div>
</view>
