<view>
    <div class="landing">
        <div class="container">
            <div class="row" wb-if="'{{_parent.header}}'>''">
                <div class="col-md-4"></div>
                <div class="col-md-8">
                    <div class="content-wrap">
                        <h1 class="h1 text-center">{{_parent.header}}</h1>
                    </div>
                </div>
            </div>
            <div class="row" wb-if="'{{subheader}}'>''">
                <div class="col-md-12">
                    <h2 class="h2 landing-small-title mb-40">{{subheader}}</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-8">
                    <div class="callback">
                        <div class="callback__text">Закажите обратный звонок, мы ответим на все ваши вопросы</div>
                        <button class="callback__btn btn btn--black --openpopup" data-popup="--fast">Перезвонить мне</button>
                    </div>
                    <div class="content-wrap" wb-if="'{{text}}'>''">
                        <div class="text mb-80">
                            <p class="text-break">{{text}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-pic mb-80" wb-if="'{{cover.0.img}}'>''">
                <img class="radius-20 w-100p" src="{{cover.0.img}}" alt="{{_parent.header}}">
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-8">
                    <div class="content-wrap">
                        <h3 class="h3 mb-40">Наиболее часто аллергическая реакция вырабатывается на различные продукты.</h3>
                    </div>
                </div>
            </div>
            <div class="row --aicn mb-40">
                <div class="col-md-4">
                    <div class="text-right text-bold">Это называется</div>
                </div>
                <div class="col-md-8">
                    <div class="content-wrap">
                        <h2 class="big-title">Пищевой аллергией.</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"> </div>
                <div class="col-md-6">
                    <div class="content-wrap">
                        <div class="text mb-80">
                            <p>Хотя, в большинстве случаев,виновником является не какой-то конкретный природный компонент продукта, а химические добавки: красители, консерванты, подсластители, усилители вкуса и т.д. Так как с каждым годом растет потребление подобных продуктов, врачи именно с этим, в первую очередь, и связывают высокий рост аллергических реакций в последнее время.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row --aicn mb-80">
                <div class="col-md-4">
                    <div class="aside">
                        <h2 class="h2">Помимо пищевой аллергии распространены:</h2>
                        <div class="text">
                            <ul>
                                <li>поллиноз (сезонная аллергия на пыльцу растений)</li>
                                <li>медикаментозная аллергия,</li>
                                <li>аллергия на укусы насекомых,</li>
                                <li>бытовую химию и на животных.</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="content-pic"><img src="/assets/img/landing/1.jpg" alt=""></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <h5 class="h5 content-title">Проявление аллергенов</h5>
                </div>
                <div class="col-md-8">
                    <div class="content-wrap">
                        <div class="text mb-80">
                            <div class="text">
                                <p>Многие аллергены не проявляют себя сразу и вызывают соответствующую реакцию только после накопления в организме. Это усложняет диагностику,поскольку человек не наблюдает каких-то резких изменений в рационе или окружающей среде, при этом иммунный ответ может быть достаточно серьезным. Реакция на аллерген может проявиться не сразу, а только спустя двое суток после контакта с аллергеном.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        let h1 = document.querySelector('.crumbs + h1')
        if (h1) h1.remove()
    </script>
</view>

<edit header="Лендинг - текст тип #1">
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
        <div class="col-sm-4">
        <label>Подзаголовок слева</label>
        <input name="left" class="form-control tx-bold">
        </div>
        <div class="col-sm-4">
        <label>Подзаголовок справа</label>
        <input name="right" class="form-control tx-bold">
        </div>
        <div class="col-12">
        <label>Текст</label>
        <textarea name="text" rows="auto" class="form-control"></textarea>
        </div>
    </div>
</edit>

<preview>
    <div class="landing page">
        <div class="container">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-8">
                    <div class="content-wrap">
                        <h3 class="h3 mb-40">Наиболее часто аллергическая реакция вырабатывается на различные продукты.</h3>
                    </div>
                </div>
            </div>
            <div class="row --aicn mb-40">
                <div class="col-md-4">
                    <div class="text-right text-bold">Это называется</div>
                </div>
                <div class="col-md-8">
                    <div class="content-wrap">
                        <h2 class="big-title">Пищевой аллергией.</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"> </div>
                <div class="col-md-6">
                    <div class="content-wrap">
                        <div class="text mb-80">
                            <p>Хотя, в большинстве случаев,виновником является не какой-то конкретный природный компонент продукта, а химические добавки: красители, консерванты, подсластители, усилители вкуса и т.д. Так как с каждым годом растет потребление подобных продуктов, врачи именно с этим, в первую очередь, и связывают высокий рост аллергических реакций в последнее время.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</preview>