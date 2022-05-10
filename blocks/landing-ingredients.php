<edit header="Лендинг - ингредиенты">
    <div>
        <wb-module wb="module=yonger&mode=edit&block=common.inc" />
    </div>
    <div class="form-group row">
        <label class="col-form-label col-sm-3">Заголовок</label>
        <div class="col-sm-9">
            <input name="title" class="form-control tx-bold">
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
    <div class="form-group row">
        <div class="col-12">
            <label>Текст</label>
            <textarea name="text" rows="auto" class="form-control"></textarea>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-form-label col-sm-3">Подзаголовок</label>
        <div class="col-sm-9">
            <input name="subtitle" class="form-control tx-bold">
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-5">
            <label>Текст слева</label>
            <textarea name="right" rows="auto" class="form-control"></textarea>
        </div>
        <div class="col-sm-7">
            <label>Плашки справа / Отступ md-x</label>
            <wb-multiinput name="left">
                <div class="col-10">
                    <input name="name" class="form-control" placeholder="Текст">
                </div>
                <div class="col-2">
                    <select name="offset" class="form-control">
                        <wb-foreach wb-tpl="false" wb-json="[0,1,2,3,4,5,6,7,8,9,10,11]">
                            <option value="{{_val}}">{{_val}}</option>
                        </wb-foreach>
                    </select>
                </div>
            </wb-multiinput>
        </div>
    </div>
</edit>

<view>
    <div class="landing">
        <div class="container">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-8">
                    <div class="content-wrap">
                        <h3 class="h3 mb-20">{{title}}</h3>
                    </div>
                </div>
            </div>
            <div class="ingredients">
                <wb-foreach wb="from=list&tpl=false">
                    <div class="ingredients__item">{{_val}}</div>
                </wb-foreach>
            </div>
            <div class="row mb-40">
                <div class="col-md-4"> </div>
                <div class="col-md-8">
                    <div class="content-wrap">
                        <div class="text">
                            <p class="text-break">{{text}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <h3 class="h3 mb-40">{{subtitle}}</h3>
            <div class="row mb-40">
                <div class="col-md-3">
                    <div class="text-bold text-break mt-10">{{right}}</div>
                </div>
                <div class="col-md-9">
                    <div class="chat">
                        <wb-foreach wb="from=left&tpl=false">
                            <div class="row">
                                <div class="offset-md-{{offset}} col-auto">
                                    <div class="chat__item"> <span>{{name}}</span></div>
                                </div>
                            </div>
                        </wb-foreach>
                    </div>
                </div>
            </div>
        </div>
    </div>

</view>

<preview>
    <div class="landing page">
        <div class="container">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-8">
                    <div class="content-wrap">
                        <h3 class="h3 mb-20">Среди наиболее распространённых природных пищевых аллергенов выделяют</h3>
                    </div>
                </div>
            </div>
            <div class="ingredients">
                <div class="ingredients__item">Цитрусовые</div>
                <div class="ingredients__item">Клубнику</div>
                <div class="ingredients__item">Орехи</div>
                <div class="ingredients__item">Мед</div>
                <div class="ingredients__item">Молоко и молочные продукты</div>
                <div class="ingredients__item">Морепродукты</div>
            </div>
            <div class="row mb-40">
                <div class="col-md-4"> </div>
                <div class="col-md-8">
                    <div class="content-wrap">
                        <div class="text">
                            <p>Эти продукты следует исключать из рациона беременным и кормящим женщинам. Пищевая аллергия не всегда появляется на коже, то, что принято называть несварением – тоже признак аллергии: колики, газы, боли, вздутие живота, нарушение стула.</p>
                        </div>
                    </div>
                </div>
            </div>
            <h3 class="h3 mb-40">Острая аллергия – наиболее опасный вид, который стремительно развивается вплоть до отёка Квинке и анафилактического шока.</h3>
            <div class="row mb-40">
                <div class="col-md-3">
                    <div class="text-bold mt-10">Если вы знаете, <br>что её спровоцировало</div>
                </div>
                <div class="col-md-9">
                    <div class="chat">
                        <div class="chat__item"> <span>Первым делом необходимо прекратить контакт с аллергеном</span></div>
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-8">
                                <div class="chat__item"> <span>Принять антигистаминный препарат</span></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-11">
                                <div class="chat__item"> <span>Сразу обратиться ко врачу.</span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</preview>