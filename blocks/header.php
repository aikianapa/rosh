<view>
<div class="scroll-container" data-scroll-container>
    <header class="header header--transparent header--fixed --unfilter">
    <div class="container --flex --jcsb --aicn"><a class="header__logo" href="/"> <img src="/assets/img/logo.svg" alt=""></a>
        <div class="header__left --flex --aicn">
            <div class="header__contacts"> <a class="header__contact" href="tel:+74951320169"> 8 (495) <b>132-01-69</b></a>
                <div class="header__contact header__contact--small">Пн-Сб, с <b>10:00</b> до <b>21:00</b> </div>
            </div>
            <a class="btn btn--white --openfilter" href="#mainfilter">Подобрать услугу</a>
        </div>
        <div class="header__right --flex --aicn">
            <button class="btn btn-link --openpopup --mobile-fade" data-popup="--fast">Записаться на прием</button>
            <button class="btn btn-link enter --openpopup --mobile-fade" data-popup="--enter-number">Войти</button>
            <button class="burger"></button>
        </div>
    </div>
    </header>
</div>
</view>
<edit header="Заголовок сайта">
    <div>
        <wb-module wb="module=yonger&mode=edit&block=common.inc" />
    </div>
    <wb-multilang wb-lang="{{_sett.locales}}" name="lang">
        <div class="form-group">
        <div class="col-12">
            <label class="form-control-label">{{_lang.name}}</label>
            <input type="text" class="form-control" name="header" placeholder="{{_lang.name}}">
        </div>
        </div>
        <div class="form-group">
            <div class="col-12">
                <wb-module wb="{'module':'jodit'}" name="text" />
            </div>
        </div>
        <div class="form-group row">
        <div class="col-md-6">
            <label class="form-control-label">{{_lang.button}}</label>
            <input type="text" class="form-control" name="button" placeholder="{{_lang.button}}">
        </div>
        <div class="col-md-6">
            <label class="form-control-label">{{_lang.link}}</label>
            <input type="text" class="form-control" name="link" placeholder="{{_lang.link}}">
        </div>
        </div>
        <wb-lang>
        [ru]
        header = "Шапка сайта"
        name = "Заголовок"
        button = Кнопка
        link = Ссылка
        [en]
        header = "Site header"
        name = "Header"
        button = Button
        link = Link
        </wb-lang>
    </wb-multilang>
</edit>