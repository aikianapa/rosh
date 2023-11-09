<edit header="Лендинг - две картинки">
    <div>
        <wb-module wb="module=yonger&mode=edit&block=common.inc" />
    </div>
    <div class="form-group row">
        <div class="col-sm-6">
            <label>Изображение слева</label>
            <wb-module wb="module=filepicker&mode=single&width=525&height=409" wb-path="/uploads/landing/images/" name="left">
            </wb-module>
        </div>
        <div class="col-sm-6">
            <label>Изображение справа</label>
            <wb-module wb="module=filepicker&mode=single&width=525&height=409" wb-path="/uploads/landing/images/" name="right">
            </wb-module>
        </div>

    </div>
</edit>

<view>
    <div class="landing two-img">
        <div class="container">
            <div class="row mb-80">
                <div class="col-md-6">
                    <div class="content-pic" wb-if="'{{left.0.img}}'>''"><img src="/thumbc/1050x818/src{{left.0.img}}" alt="{{_parent.header}}"></div>
                </div>
                <div class="col-md-6">
                    <div class="content-pic" wb-if="'{{right.0.img}}'>''"><img src="/thumbc/1050x818/src{{right.0.img}}" alt="{{_parent.header}}"></div>
                </div>
            </div>
        </div>
    </div>
</view>
