<view>
    <div class="row container">
        <div class="col-md-4"></div>
        <div class="col-md-8">
            <div class="blog-inner__text">
                <div class="content-wrap">
                    <div class="text">
                        <img class="mb-40 radius-20" src="{{images.0.img}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</view>

<edit header="Блог слайдер (узкий с текстом) ">
    <div>
        <wb-module wb="module=yonger&mode=edit&block=common.inc" />
    </div>
    <div class="form-group">
        <label>Изображения</label>
        <wb-module wb="module=filepicker&width=250&&height=150" wb-path="/uploads/blog/" name="images">
        </wb-module>
    </div>
</edit>