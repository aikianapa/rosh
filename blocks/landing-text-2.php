<view>
    <div class="landing">
        <div class="container">
        <div class="row">
                <div class="col-md-4">
                    <h5 class="h5 content-title" wb-if="'{{title}}'>''">{{title}}</h5>
                </div>
                <div class="col-md-8">
                    <div class="content-wrap">
                        <h3 class="h3 mb-40" wb-if="'{{subtitle}}'>''">{{subtitle}}</h3>
                        <div class="text mb-80">
                            <div class="text">
                                <p class="text-break">{{text}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</view>

<edit header="Лендинг - текст тип #2">
    <div>
        <wb-module wb="module=yonger&mode=edit&block=common.inc" />
    </div>
    <div class="form-group row">
        <label class="col-form-label col-sm-3">Заголовок слева</label>
        <div class="col-sm-9">
            <input name="title" class="form-control tx-bold">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-form-label col-sm-3">Заголовок над текстом</label>
        <div class="col-sm-9">
            <input name="subtitle" class="form-control tx-bold">
        </div>
    </div>
    <div class="form-group row">
        <div class="col-12">
            <label>Текст справа</label>
            <textarea name="text" rows="auto" class="form-control"></textarea>
        </div>
    </div>
</edit>

<preview>
    <div class="landing page">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5 class="h5 content-title">Проявление аллергенов</h5>
                </div>
                <div class="col-md-8">
                    <div class="content-wrap">
                        <h3 class="h3 mb-40">Аллергены</h3>
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
</preview>