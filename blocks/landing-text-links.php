<edit header="Лендинг - текст и ссылки">
    <div>
        <wb-module wb="module=yonger&mode=edit&block=common.inc" />
    </div>
    <div class="form-group row">
        <label class="col-form-label col-sm-3">Рекомендованная новость</label>
        <div class="col-sm-9">
            <input name="newslink" class="form-control">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-form-label col-sm-3">Текст</label>
        <div class="col-sm-9">
            <wb-module wb="{'module':'editor'}" name="text" />
        </div>
    </div>
    <div class="form-group row">
        <label class="col-form-label col-sm-3">Заголовок списка ссылок</label>
        <div class="col-sm-9">
            <input name="title" class="form-control tx-bold">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-form-label col-sm-3">Спрятать "обратный звонок"</label>
        <div class="col-sm-9">
            <input name="nocall" wb-module="module=switch" />
        </div>
    </div>
    <div class="form-group row">
        <div class="col-12">
            <label>Текст / ссылка</label>
            <wb-multiinput name="links">
                <div class="col-sm-6">
                    <input name="name" class="form-control" placeholder="Текст">
                </div>
                <div class="col-sm-6">
                    <input name="href" class="form-control" placeholder="Ссылка" wb-module="module=yonger&mode=pageselect">
                </div>
            </wb-multiinput>
        </div>
    </div>
</edit>

<view>
    <div class="landing">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <wb-var nid='' />
                    <wb-foreach wb="table=_yonmap" wb-filter="f=blog&u={{newslink}}">
                        <wb-var nid="{{i}}" />
                    </wb-foreach>
                    <div class="recomendation" wb-if="'{{newslink}}'>'' AND '{{_var.nid}}'>''">
                        <a class="recomendation" href="{{newslink}}">
                            <wb-data wb="table=blog&item={{_var.nid}}">
                                <div class="recomendation__title">Рекомендованная новость</div>
                                <div class="recomendation__pic"> <img src="/thumbc/260x140/src{{cover.0.img}}" alt="{{header}}"></div>
                                <!--h4 class="h4 recomendation__title">Mini FX</h4-->
                                <p class="recomendation__text text-small text-grey">{{header}}</p>
                            </wb-data>
                        </a>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="content-wrap">
                        <div class="text" wb-if="'{{text}}'>''">
                            {{text}}
                        </div>
                        <wb-jq wb="$dom->find('p')->addClass('mb-10');;$dom->find('p:eq(1)')->addClass('pl-65');" />
                        <div class="callback callback--grey" wb-if="'{{nocall}}'==''">
                            <div class="callback__text">Закажите обратный звонок, мы ответим на все ваши вопросы</div>
                            <button class="callback__btn btn btn--black --openpopup" data-popup="--fast">Перезвонить мне</button>
                        </div>
                        <div class="content__links mb-80">
                            <p class="mb-20 text-bold" wb-if="'{{title}}'>''">{{title}}</p>
                            <wb-foreach wb="from=links&tpl=false">
                                <div class="arrow__link">
                                    <svg class="svgsprite _arrow-link">
                                        <use xlink:href="assets/img/sprites/svgsprites.svg#arrow-link"></use>
                                    </svg><a href="{{href}}">{{name}}</a>
                                </div>
                            </wb-foreach>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</view>

