<view>

    <div class="menu" id="mainmenu">
        <nav class="nav">
            <wb-foreach wb="table=pages&sort=_sort" wb-filter="active=on&menu=on&path=">
                <wb-var child="0" />
                <wb-foreach wb="table=pages&limit=1" wb-filter="active=on&menu=on&path={{url}}">
                    <wb-var child="1" />
                </wb-foreach>
                <wb-var option="{{menu_title}}" wb-if="'{{menu_title}}'>''" else="{{header}}" />
                <div class="nav__link" wb-if="_var.child == 0"><a href="{{url}}">{{_var.option}}</a></div>
                <div class="nav__link ddl" wb-if="_var.child == 1">
                    <a href="{{url}}">{{_var.option}}</a>
                    <svg class="svgsprite _drop">
                        <use xlink:href="/assets/img/sprites/svgsprites.svg#drop"></use>
                    </svg>
                </div>
                <div class="nav__group ddm" wb-if="_var.child == 1">
                    <div class="nav__link-inner"><a href="{{url}}">{{_var.option}}</a></div>
                    <wb-foreach wb="table=pages&sort=_sort" wb-filter="active=on&menu=on&path={{url}}">
                        <wb-var option="{{menu_title}}" wb-if="'{{menu_title}}'>''" else="{{header}}" />
                        <div class="nav__link-inner"><a href="{{url}}">{{_var.option}}</a></div>
                    </wb-foreach>
                </div>
            </wb-foreach>
        </nav>
        <div class="mobile-btns">
            <!-- button class="btn btn--white --openfilter mb-10">Подобрать услугу</button -->
            <div class="--flex">
                <button class="btn btn-link --openpopup pl-0" data-popup="--fast">Записаться на прием</button>
                <button class="btn btn-link enter --openpopup" data-popup="--enter-number">Войти</button>
            </div>
        </div>

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

        <div class="menu__contacts"> <a class="text-small text-grey" href="/contacts">
            {{_sett.address}}
        </a><a class="text-small text-grey" href="mailto:{{_sett.contactEmail}}">
                {{_sett.contactEmail}}</a></div><a class="en-version" href="/english">
            <svg class="svgsprite _web">
                <use xlink:href="/assets/img/sprites/svgsprites.svg#web"></use>
            </svg>English version
            <svg class="svgsprite _arrow-link">
                <use xlink:href="/assets/img/sprites/svgsprites.svg#arrow-link"></use>
            </svg></a>

    </div>

</view>

<edit header="Главное меню">
    <div>
        <wb-module wb="module=yonger&mode=edit&block=common.inc" />
    </div>
</edit>