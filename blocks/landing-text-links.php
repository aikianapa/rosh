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
    <div class="col-12">
            <label>Текст / ссылка</label>
            <wb-multiinput name="links">
                <div class="col-sm-6">
                    <input name="name" class="form-control" placeholder="Текст">
                </div>
                <div class="col-sm-6">
                    <input name="href" class="form-control" placeholder="Ссылка">
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
                    <div class="recomendation" wb-if="'{{newslink}}'>''">
                        <a class="recomendation" href="{{newslink}}">
                            <div class="recomendation__title">Рекомендованная новость</div>
                            <div class="recomendation__pic"> <img src="/assets/img/blogs/2.jpg" alt=""></div>
                            <h4 class="h4 recomendation__title">Mini FX</h4>
                            <p class="recomendation__text text-small text-grey">Безоперационное удаление локальных жировых отложений на лице, подбородке, шее, на спине (холка), внутренней поверхности плеча и бёдрах⠀</p>
                        </a></div>
                </div>
                <div class="col-md-8">
                    <div class="content-wrap">
                        <div class="text">
                            {{text}}
                        </div>
                        <wb-jq wb="$dom->find('p')->addClass('mb-10');;$dom->find('p:eq(1)')->addClass('pl-65');"/>
                        <div class="callback callback--grey">
                            <div class="callback__text">Закажите обратный звонок, мы ответим на все ваши вопросы</div>
                            <button class="callback__btn btn btn--black --openpopup" data-popup="--fast">Перезвонить мне</button>
                        </div>
                        <div class="content__links mb-80">
                            <p class="text-bold mb-20" wb-if="'{{title}}'>''">{{title}}</p>
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

<preview>
    <div class="landing page">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="recomendation"><a class="recomendation" href="#">
                            <div class="recomendation__title">Рекомендованная новость</div>
                            <div class="recomendation__pic"> <img src="/assets/img/blogs/2.jpg" alt=""></div>
                            <h4 class="h4 recomendation__title">Mini FX</h4>
                            <p class="recomendation__text text-small text-grey">Безоперационное удаление локальных жировых отложений на лице, подбородке, шее, на спине (холка), внутренней поверхности плеча и бёдрах⠀</p>
                        </a></div>
                </div>
                <div class="col-md-8">
                    <div class="content-wrap">
                        <div class="text">
                            <p class="mb-10">Диагноз «аллергия» ставится после проведения соответствующей диагностики: кожных проб и анализа крови, в некоторых случаях, при помощи лабораторных исследований можно выявить конкретный аллерген, но не всегда. В медицинском центре ROSH для диагностики и лечения аллергии мы также применяем биорезонансный аппарат BICOM.</p>
                            <p class="mb-10 pl-65">Он способен выявлять сезонные и хронические аллергии, в том числе, медикаментозную и пищевую у взрослых и детей с грудничкового возраста. При этом, аллерген может быть выявлен даже на ранней стадии, когда он ещё не успел накопиться и проявить внешнюю кожную реакцию. Мы можем не только выявлять аллергии, (в том числе и скрытые, но подавляющие иммунную систему), но и лечить это заболевание без медикаментозного вмешательства.</p>
                            <p>Этот метод позволяет предотвратить и сезонную аллергию, чтобы спокойно прожить период цветения.</p>
                        </div>
                        <div class="callback callback--grey">
                            <div class="callback__text">Закажите обратный звонок, мы ответим на все ваши вопросы</div>
                            <button class="callback__btn btn btn--black --openpopup" data-popup="--fast">Перезвонить мне</button>
                        </div>
                        <div class="content__links mb-80">
                            <p class="text-bold mb-20">Необходимость тех или иных обследований в каждом индивидуальном случае определяет врач. </p>
                            <div class="arrow__link">
                                <svg class="svgsprite _arrow-link">
                                    <use xlink:href="assets/img/sprites/svgsprites.svg#arrow-link"></use>
                                </svg><a href="#">Лечение угревой сыпи</a>
                            </div>
                            <div class="arrow__link">
                                <svg class="svgsprite _arrow-link">
                                    <use xlink:href="assets/img/sprites/svgsprites.svg#arrow-link"></use>
                                </svg><a href="#">Лечение акне лазером</a>
                            </div>
                            <div class="arrow__link">
                                <svg class="svgsprite _arrow-link">
                                    <use xlink:href="assets/img/sprites/svgsprites.svg#arrow-link"></use>
                                </svg><a href="#">Лечение розацеа</a>
                            </div>
                            <div class="arrow__link">
                                <svg class="svgsprite _arrow-link">
                                    <use xlink:href="assets/img/sprites/svgsprites.svg#arrow-link"></use>
                                </svg><a href="#">Лечение демодекоза</a>
                            </div>
                            <div class="arrow__link">
                                <svg class="svgsprite _arrow-link">
                                    <use xlink:href="assets/img/sprites/svgsprites.svg#arrow-link"></use>
                                </svg><a href="#">Лечение экземы</a>
                            </div>
                            <div class="arrow__link">
                                <svg class="svgsprite _arrow-link">
                                    <use xlink:href="assets/img/sprites/svgsprites.svg#arrow-link"></use>
                                </svg><a href="#">Удаление родинок (невусов)</a>
                            </div>
                            <div class="arrow__link">
                                <svg class="svgsprite _arrow-link">
                                    <use xlink:href="assets/img/sprites/svgsprites.svg#arrow-link"></use>
                                </svg><a href="#">Удаление папиллом</a>
                            </div>
                            <div class="arrow__link">
                                <svg class="svgsprite _arrow-link">
                                    <use xlink:href="assets/img/sprites/svgsprites.svg#arrow-link"></use>
                                </svg><a href="#">Лазерная шлифовка рубцов</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</preview>