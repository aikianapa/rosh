<view>
  <div class="landing" data-large-container="{{_parent.largeContainer}}" data-large-container="{{_parent.largeContainer}}">
    <div class="post_block--right container">
      <div class=" --aicn mb-80 post_block--info content">
        <div class="col-md-12">
          <div class="aside">
            <h3 class="h2" wb-if="'{{subheader}}'>''">{{subheader}}</h3>
            <p class="text">
              <img src="/thimbc/807x629/src{{image.0.img}}"
                   alt="{{_parent.header}}" style="float:right; width: 50%;border-radius: 20px;margin-left:20px;
    margin-bottom: 20px;"/>
              <wb-foreach wb="from=list&tpl=false">
                <span style="display:block;">
                {{_val}}
                  <br>
                  <br>
                </span>
              </wb-foreach>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</view>

<edit header="Лендинг - список и фото справа">
  <div>
    <wb-module wb="module=yonger&mode=edit&block=common.inc"/>
  </div>
  <div class="form-group row">
    <label class="col-form-label col-sm-3">Подзаголовок</label>
    <div class="col-sm-9">
      <input name="subheader" class="form-control tx-bold">
    </div>
  </div>
  <div class="form-group row">
    <label class="col-form-label col-sm-3">Список</label>
    <div class="col-sm-9">
      <wb-multiinput name="list">
        <input name="list" class="form-control">
      </wb-multiinput>

    </div>
  </div>
  <div class="form-group">
    <label>Изображение</label>
    <wb-module wb="module=filepicker&mode=single&width=780&&height=315" wb-path="/uploads/landing/images/" name="image">
    </wb-module>
  </div>
</edit>

