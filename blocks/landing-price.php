<edit header="Лендинг - прайслист">
    <div>
        <wb-module wb="module=yonger&mode=edit&block=common.inc" />
    </div>
    <div>

    <wb-multiinput name="price">
        <div class="col-sm-10">
            <div class="input-group">
                <div class="input-group-prepend cursor-pointer" onclick="priceSelector(this)">
                    <span class="input-group-text">
                        <img data-src="/module/myicons/interface-essential-138.svg?size=20&amp;stroke=323232" width="20" height="20" src="/module/myicons/interface-essential-138.svg?size=24&amp;stroke=323232">
                    </span>
                </div>
                <input class="form-control" type="text" name="header" placeholder="Наименование">
            </div>
        </div>
        <div class="col-sm-2">
            <input class="form-control tx-right" type="text" name="price" placeholder="Цена">
        </div>
    </wb-multiinput>
    <wb-include wb="form=price&mode=selector" />
    </div>
</edit>

<view>
    <div class="landing">
        <div class="container">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-9">
                    <div class="content-price">
                        <div class="content-price__head">
                            <p>Прайс-лист</p>
                        </div>
                        <div class="content-price__body">
                            <wb-foreach wb="from=price&tpl=false">
                            <div class="content-price__item">
                                <div class="content-price__name">{{header}}</div>
                                <div class="content-price__summ">{{fmtPrice(price)}}₽</div>
                            </div>
                            </wb-foreach>
                        </div>
                    </div>
                </div>
                <div class="col-md-1"></div>
            </div>
        </div>
    </div>
</view>

<preview>
    <div class="landing page">
        <div class="container">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-9">
                    <div class="content-price">
                        <div class="content-price__head">
                            <p>Консультация врача</p>
                        </div>
                        <div class="content-price__body">
                            <div class="content-price__item">
                                <div class="content-price__name">Прием (осмотр, консультация) врача-дерматовенеролога КМН</div>
                                <div class="content-price__summ">5 000 ₽</div>
                            </div>
                            <div class="content-price__item">
                                <div class="content-price__name">Прием (осмотр, консультация) врача-дерматовенеролога главного врача повторный ( по результатам анализов) </div>
                                <div class="content-price__summ">2 500 ₽</div>
                            </div>
                            <div class="content-price__item">
                                <div class="content-price__name">Прием (осмотр, диагностика, консультация) врача - косметолога- первичный (включает составление плана лечения)</div>
                                <div class="content-price__summ">2 500 ₽</div>
                            </div>
                            <div class="content-price__item">
                                <div class="content-price__name">Прием (осмотр, консультация врача-дерматовенеролога главного врача первичный (включает составление плана лечения).</div>
                                <div class="content-price__summ">5 000 ₽</div>
                            </div>
                            <div class="content-price__item">
                                <div class="content-price__name">Прием (осмотр, консультация) врача - косметолога - повторный</div>
                                <div class="content-price__summ">2 000 ₽</div>
                            </div>
                            <div class="content-price__item">
                                <div class="content-price__name">Прием (осмотр, консультация) врача-дерматовенеролога повторный (включает составление плана лечения по результатам анализов) коррекция лечения</div>
                                <div class="content-price__summ">3 000 ₽</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-1"></div>
            </div>
        </div>
    </div>
</preview>