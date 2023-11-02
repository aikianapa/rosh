<edit header="Лендинг - прайслист">
    <div>
        <wb-module wb="module=yonger&mode=edit&block=common.inc" />
    </div>
    <div>

        <wb-multiinput name="price">
            <div class="col-sm-7">
                <div class="input-group">
                    <div class="cursor-pointer input-group-prepend" onclick="priceSelector(this)">
                        <span class="input-group-text">
                            <img data-src="/module/myicons/interface-essential-138.svg?size=20&amp;stroke=323232" width="20" height="20" src="/module/myicons/interface-essential-138.svg?size=24&amp;stroke=323232">
                        </span>
                    </div>
                    <input class="form-control" type="text" name="header" placeholder="Наименование">
                </div>
            </div>
            <div class="col-sm-3">
                <input class="form-control tx-right" type="text" name="articul" placeholder="Артикул">
                <input class="d-none" type="text" name="price_id" placeholder="ID прайс-листа">
            </div>
            <div class="col-sm-2">
                <input class="form-control tx-right" type="text" name="price" placeholder="Цена">
            </div>
        </wb-multiinput>
        <wb-include wb="form=price&mode=selector" />
    </div>
</edit>

<view>
    <wb-var cnt='0' />
    <div class="landing">
        <div class="container">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-9">
                    <div class="content-price">
                        <div class="content-price__head">
                            <p>Прайс-лист</p>
                        </div>
                        <wb-var pricelist wb-api="/api/v2/func/price/getPriceList" />
                        <div class="content-price__body">
                            <wb-foreach wb="from=price&tpl=false">
                                <div class="content-price__item row" wb-if="'{{_var.pricelist.{{price_id}}.header}}'>''">
                                    <wb-var cnt='{{_var.cnt + 1}}' />
                                    <div class="col-12 col-md-2 content-price__name">{{_var.pricelist.{{price_id}}.articul}}</div>
                                    <div class="col-9 col-md-8 content-price__name">{{_var.pricelist.{{price_id}}.header}}</div>
                                    <div class="text-right col-3 col-md-2 content-price__summ">{{fmtPrice({{_var.pricelist.{{price_id}}.price}})}}₽</div>
                                </div>
                            </wb-foreach>
                            <p style="color:#b5b7b6;font-size: 14px;">Не является публичной офертой. Cтоимость указана приблизительно и может быть изменена в зависимости от фактически оказанных услуг</p>
                        </div>

                    </div>
                </div>
                <div class="col-md-1"></div>
            </div>
        </div>
    </div>
    <wb-jq wb="$dom->find('.landing')->remove()" wb-if="'{{_var.cnt}}'=='0'" />
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