<view>
    <div class="container">
        <div class="contacts">
            <h1 class="h1">{{_parent.header}}</h1>
            <div class="row">
                <div class="col-lg-4 contacts__left">
                    <div class="contacts__socials">
                        <p class="text-bold text-big">Social media</p>
                        <div class="socials socials-menu">
                            <a class="socials__link" href="{{_var.facebook}}" wb-if="'{{_var.facebook}}'>''">
                                <svg class="svgsprite _socials-1">
                                    <use xlink:href="assets/img/sprites/svgsprites.svg#socials-1"></use>
                                </svg></a>
                            <a class="socials__link" href="{{_var.instagram}}" wb-if="'{{_var.instagram}}'>''">
                                <svg class="svgsprite _socials-2">
                                    <use xlink:href="assets/img/sprites/svgsprites.svg#socials-2"></use>
                                </svg></a>
                            <a class="socials__link" href="{{_var.vkontakte}}" wb-if="'{{_var.vkontakte}}'>''">
                                <svg class="svgsprite _socials-4">
                                    <use xlink:href="assets/img/sprites/svgsprites.svg#socials-4"></use>
                                </svg></a><a class="socials__link" href="{{_var.youtube}}" wb-if="'{{_var.youtube}}'>''">
                                <svg class="svgsprite _socials-3">
                                    <use xlink:href="assets/img/sprites/svgsprites.svg#socials-3"></use>
                                </svg></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="contacts__info">
                        <div class="contacts__address">
                            <p class="text-small text-grey">{{city}}</p>
                            <p class="text-bold">{{address}}
                            </p>
                            <p class="text-grey">{{addressComment}}</p>
                        </div>
                        <div class="contacts__phones">
                            <div class="contacts__time text-grey">{{worktime}}</div>
                            <a class="contacts__phone" href="tel:+{{text2tel({{_var.tel}})}}">{{_var.cityPrefix}} <b>{{_var.cityPhone}}</b></a>
                            <div class="contacts__small-phones --flex --jcsb">
                                <wb-var phlen="{{count(phone)}}" />
                                <wb-foreach wb="from=phone&tpl=false">
                                    <wb-var phone="{{_val}}" />
                                    <wb-var phone="{{_var.phone}}," wb-if="'{{_ndx}}'<'{{_var.phlen}}'" />
                                    <a class="text-grey" href="tel:+79154563407">
                                        {{_var.phone}}
                                    </a>
                                </wb-foreach>
                            </div>
                        </div>
                        <div class="contacts__emails">
                            <p class="text-grey">Email:</p><a class="contacts__email text-bold text-big" href="mailto:{{_var.contactEmail}}">{{_var.contactEmail}} </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</view>

<edit header="Контакты">
    <div>
        <wb-module wb="module=yonger&mode=edit&block=common.inc" />
    </div>
    <div class="row">
        <div class="col-sm-5">
            <div class="form-group">
                <label>Город</label>
                <input class="form-control" type="text" name="city">
            </div>
        </div>
        <div class="col-sm-7">
            <div class="form-group">
                <label>Адрес</label>
                <input class="form-control" type="text" name="address">
            </div>
        </div>

    </div>


    <div class="form-group">
        <label>Комментарий</label>
        <input class="form-control" type="text" name="addressComment">
    </div>
    <div class="form-group">
        <label>Часы работы</label>
        <input class="form-control" type="text" name="worktime">
    </div>
    <div class="form-group">
        <label>Эл.почта</label>
        <input class="form-control" type="text" value="{{_var.contactEmail}}" readonly>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label>Основной телефон</label>
                <input class="form-control" type="text" value="{{_var.cityPrefix}} {{_var.cityPhone}}" readonly>
            </div>
            <div class="form-group">
                <label>Контактный телефон</label>
                <input class="form-control" type="text" value="{{_var.contactPhone}}" readonly>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label>Дополнительные телефоны</label>
                <wb-multiinput name="phone">
                    <input class="form-control" type="text" name="phone">
                </wb-multiinput>
            </div>
        </div>
    </div>


</edit>