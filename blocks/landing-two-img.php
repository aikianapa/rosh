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
    <div class="landing">
        <div class="container">
            <div class="row mb-80">
                <div class="col-md-6">
                    <div class="content-pic"><img src="/thumbc/525x409/src{{left.0.img}}" alt=""></div>
                </div>
                <div class="col-md-6">
                    <div class="content-pic"><img src="/thumbc/525x409/src{{right.0.img}}" alt=""></div>
                </div>
            </div>
        </div>
    </div>
</view>

<preview>
    <div class="landing page">
        <div class="container">
            <div class="row mb-80">
                <div class="col-md-6">
                    <div class="content-pic"><img src="/thumbc/525x409/src/assets/img/landing/1.jpg" alt=""></div>
                </div>
                <div class="col-md-6">
                    <div class="content-pic"><img src="/thumbc/525x409/src/assets/img/landing/2.jpg" alt=""></div>
                </div>
            </div>
        </div>
    </div>
</preview>