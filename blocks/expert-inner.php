<edit header="Страница специалиста">
    <div>
        <wb-module wb="module=yonger&mode=edit&block=common.inc" />
    </div>
    <div class="form-group row">
        <label class="col-form-label col-sm-3">Образование</label>
        <div class="col-sm-9">
            <input name="education" class="form-control">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-form-label col-sm-3">Сертификат</label>
        <div class="col-sm-9">
            <input name="certificate" class="form-control">
        </div>
    </div>

    <div class="form-group row">
        <div class="col-12">
            <label>Общая информация</label>
            <textarea name="text" rows="auto" class="form-control"></textarea>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-12">
            <label>Образование и курсы</label>
            <wb-multiinput name="stages">
                <input name="year" class="col-sm-4 form-control" placeholder="Годы(ы)">
                <input name="stage" class="col-sm-8 form-control" placeholder="Стядия обучения">
            </wb-multiinput>
        </div>
    </div>
</edit>

<view>
    <div class="container">
        <div class="crumbs"><a class="crumbs__arrow" href="javascript:window.history.back();">
                <svg class="svgsprite _crumbs-back">
                    <use xlink:href="/assets/img/sprites/svgsprites.svg#crumbs-back"></use>
                </svg></a>
            <a class="crumbs__link" href="/">Главная</a>
            <a class="crumbs__link" href="/about">О клинике</a>
            <a class="crumbs__link" href="/about/experts">Специалисты</a>
            <span class="crumbs__link">{{_parent.fullname}}</span>
        </div>
        
        <div class="expert">
            <div class="expert__top row">
                <div class="col-md-4">
                    <div class="expert__photo">
                        <img src="/thumbc/630x350/src{{_parent.image.0.img}}" alt="{{_parent.fullname}}">
                    </div>
                </div>
                <div class="col-md-8">
                    <h2 class="h2 expert__name">{{_parent.fullname}}</h2>
                    <div class="expert__work">
                        <p wb-if="'{{_parent.spec}}'>''">{{_parent.spec}}</p>
                        <p wb-if="'{{education}}'>''">Образование: {{education}}</p>
                        <p wb-if="'{{certificate}}'>''">Лицензия: {{certificate}}</p>
                    </div>
                    <input type="hidden" class="expert" value="{{_parent.login}}">
                    <button class="btn btn--black --openpopup" data-popup="--fast" href="#">Записаться на прием</button>
                </div>
            </div>
            <div class="expert__information" wb-if="'{{text}}'>''">
                <div class="row">
                    <div class="col-lg-4">
                        <h5 class="h5">Общая информация</h5>
                    </div>
                    <div class="col-lg-8">
                        <div class="expert__text">
                            <p class="text-break">{{text}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="education">
                <wb-foreach wb="from=stages&tpl=false">
                <div class="education__item row" wb-if="'{{stage}}'>'' OR '{{year}}'>''">
                    <div class="col-lg-2">
                        <h5 class="h5" wb-if="_idx == '0'">Образование</h5>
                    </div>
                    <div class="col-lg-2">
                        <h2 class="h2 education__time">{{year}}</h2>
                    </div>
                    <div class="col-lg-8">
                        <div class="education__name">{{stage}}</div>
                    </div>
                </div>
                </wb-foreach>
             </div>
        </div>
    </div>
</view>
