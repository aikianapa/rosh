<view>
    <div class="landing" data-large-container="{{_parent.largeContainer}}" itemscope itemtype="http://schema.org/Service" >
        <meta itemprop="serviceType" content="{{_parent.header}}" />
        <div class="container">
            <div class="row" wb-if="'{{_parent.header}}'>''">
                <input type="hidden" name="quote_page_comment" value="{{_parent.header}}">
                <div class="content">
                    <div class="content-wrap">
                        <h1 class="text-center h1 landing-title">{{_parent.header}}</h1>
                    </div>
                </div>
            </div>
            <div class="row" wb-if="'{{subheader}}'>''">
                <div class="col-lg-12">
                    <h2 class="mb-40 h2 landing-small-title">{{subheader}}</h2>
                </div>
            </div>
            <div class="">
                <div class="content">
                    <div class="callback">
                        <div class="callback__text">Закажите обратный звонок, мы ответим на все ваши вопросы</div>
                        <button class="callback__btn btn btn--black --openpopup" data-popup="--fast">Перезвонить мне</button>
                    </div>
                    <div class="content-wrap" wb-if="'{{text}}'>''">
                        <div class="text mb-80" itemprop="description">
                            <p class="text-break">{{text}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-pic mb-80" wb-if="'{{cover.0.img}}'>''">
                <img class="radius-20 w-100p" src="{{cover.0.img}}" alt="{{_parent.header}}">
            </div>
        </div>
    </div>
</view>

<edit header="Лендинг - основной блок">
    <div>
        <wb-module wb="module=yonger&mode=edit&block=common.inc" />
    </div>
    <div class="form-group row">
        <label class="col-form-label col-sm-3">Подзаголовок</label>
        <div class="col-sm-9">
            <input name="subheader" class="form-control tx-bold">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-form-label col-sm-3">Текст</label>
        <div class="col-sm-9">
            <textarea name="text" rows="auto" class="form-control"></textarea>
        </div>
    </div>
    <div class="form-group">
        <label>Обложка (главное изображение)</label>
        <wb-module wb="module=filepicker&mode=single&width=780&&height=315" wb-path="/uploads/landing/cover/" name="cover">
        </wb-module>
    </div>
</edit>
