<edit header="Лендинг - блок с цитатой">
    <script defer type="module" src="/engine/js/alpine.min.js"></script>
    <div>
        <wb-module wb="module=yonger&mode=edit&block=common.inc" />
    </div>

    <div class="form-group row">
        <label class="col-form-label col-12">Текст цитаты</label>
        <div class="col-sm-12">
            <textarea name="text" class="form-control" rows="auto"></textarea>

        </div>
    </div>
    <div x-data="{quote:'{{quote}}'}">
        <div class="form-group row">
            <label class="col-form-label col-sm-3">Запись к специалисту</label>
            <div class="col-sm-9 col-form-label">
                <input name="quote" wb-module="switch" x-model="quote">
            </div>
        </div>
        <div x-show="!quote">
            <div class="form-group row">
                <label class="col-form-label col-sm-3">Подзаголовок</label>
                <div class="col-sm-9">
                    <input name="subheader" class="form-control tx-bold">
                </div>
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
        </div>
        <div x-show="quote">

            <div class="form-group row">
                <label class="col-form-label col-sm-3">Специалист</label>
                <div class="col-sm-9">
                    <input class="form-control" name="expert" wb-module="selectexperts" placeholder="Список специалистов">
                </div>
            </div>

        </div>
    </div>
</edit>

<view>
    <div class="landing" data-large-container="{{_parent.largeContainer}}">
        <div class="container info">
            <div class="row --aicn mb-80">
                <div class="col-lg-4" wb-if="'{{subheader}}'>'' && 'quote'==''">
                    <div class="aside">
                        <h3 class="mb-40 h3" wb-if="'{{subheader}}'>'' && 'quote'==''">{{subheader}}</h3>
                        <h3 class="mb-40 h3" wb-if="'{{quote}}'=='on'">Комментарий специалиста</h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <blockquote>
                        <p wb-if="'{{text}}'>''">«{{text}}»</p>
                        <figcaption wb-if="'{{quote}}'==''">
                            <span wb-if="'{{author}}'>''">{{author}}</span>
                            <cite wb-if="'{{subtitle}}'>''">{{subtitle}}</cite>
                        </figcaption>
                        <figcaption wb-if="'{{quote}}'=='on' && '{{expert}}'>''" class="row">
                            <wb-data wb="table=users&item={{expert}}">
                                <div class="col-sm-6">
                                    <div class="expert__worked-pic">
                                        <img
                                            src="{{image[0].img}}"
                                            alt="{{fullname}}">
                                    </div>
                                </div>
                                <div class="col-sm-6"></div>
                                <div class="col-sm-6">
                                    <a class="expert__worked-name"
                                       target="_blank"
                                       title="Открыть страницу о специалисте"
                                       href="/about/experts/{{wbFurlGenerate({{fullname}})}}"
                                    >
                                        {{fullname}}
                                    </a>
                                </div>
                                <div class="text-right col-sm-6">
                                    <button class="callback__btn btn btn--black --openpopup" data-popup="--fast-make" onclick="
                                    $('.popup.--fast-make .select-form .select__main').text('{{fullname}}')
                                    $('.popup.--fast-make .checkbox-hidden-next-form').prop('checked',false)
                                ">Записаться</button>
                                </div>
                                <div class="col-sm-6">
                                    <div class="expert__worked-work font-normal">
                                        {{spec}}
                                    </div>
                                </div>
                                <div class="col-sm-6"></div>
                            </wb-data>
                        </figcaption>

                    </blockquote>
                </div>
            </div>
        </div>
    </div>
</view>