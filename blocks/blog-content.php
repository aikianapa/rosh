<view>
    <div class="row container">
        <div class="col-md-4">
            <h5 class="h5 content-title" wb-if="'{{aside}}'>''">{{aside}}</h5>
        </div>
        <div class="col-md-8">
            <div class="content-wrap">
                <h3 class="h3 mb-40" wb-if="'{{title}}'>''">{{title}}</h3>
                <div class="blog-inner__text">
                    <div class="text">
                        {{text}}
                    </div>
                    <wb-jq wb="$dom->find('p')->addClass('mb-10');
                $dom->find('iframe')->attr('width','560');
                $dom->find('iframe')->attr('height','315');
                $dom->find('iframe, img')->addClass('mt-80 radius-20');
                $dom->find('iframe')->parent()->addClass('video mb-40');" />
                </div>
            </div>
        </div>
    </div>
</view>

<preview>
<div class="blog-inner-content page">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="blog-inner__aside">
                            <p class="blog-inner__message">Чтобы попасть на процедуру или консультацию к нашим специалистам, позвоните по телефону <a href="tel:+74950215945">+7 (495) 021-59-45</a></p>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="blog-inner__text">
                            <div class="text mb-80">
                                <h2 class="h2">Укрепление иммунитета с BICOM </h2>
                                <p class="mb-10"> Дорогие пациенты! Как известно, самая лучшая защита от вирусной инфекции – это крепкий иммунитет.</p>
                                <p class="mb-10">Мы уже рассказывали, что одним из значительных клинических эффектов BICOM-терапии является повышение иммунитета. Ежегодно мы рекомендуем и проводим для своих пациентов и сотрудников специальный курс биком-терапии в период сезонных простуд и гриппа для повышения сопротивляемости организма к инфекциям.</p>
                                <p class="mb-10">Ввиду последних событий, мы дополнили стандартный курс специализированными программами, разработанными нашими коллегами из Германии, о чем рассказывали вам ранее в наших публикациях.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</preview>

<edit header="Блог контент">
    <div>
        <wb-module wb="module=yonger&mode=edit&block=common.inc" />
    </div>
    <div class="form-group row">
        <label class="col-form-label col-sm-4">Заголовок сверху</label>
        <div class="col-sm-8">
            <input name="title" class="form-control tx-bold">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-form-label col-sm-4">Заголовок слева</label>
        <div class="col-sm-8">
            <input name="aside" class="form-control">
        </div>
    </div>
    <div class="form-group">
        <label>Текст справа</label>
        <input name="text" wb="module=ckeditor">
    </div>
</edit>