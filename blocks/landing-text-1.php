<view>
    <div class="landing">
        <div class="container">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-8">
                    <div class="content-wrap">
                        <h3 class="h3 mb-40">{{title}}</h3>
                    </div>
                </div>
            </div>
            <div class="row --aicn mb-40">
                <div class="col-md-4">
                    <div class="text-right text-bold">{{left}}</div>
                </div>
                <div class="col-md-8">
                    <div class="content-wrap">
                        <h2 class="big-title">{{right}}</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"> </div>
                <div class="col-md-6">
                    <div class="content-wrap">
                        <div class="text mb-80">
                            <p class="text-break">{{text}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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