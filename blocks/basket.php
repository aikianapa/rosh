<edit header="Корзина интернет-магазина">
    <div>
        <wb-module wb="module=yonger&mode=edit&block=common.inc" />
    </div>
</edit>

<view>
<div class="container">
            <div class="account" id="Basket"  wb-off>
                <div class="basket account__history data-tab-wrapper" data-tabs="hislech">
                    <div class="account__tab-items">
                        <div class="basket-link data-tab-link" data-tabs="hislech" data-tab="basket">Корзина</div>
                        <div class="basket-link data-tab-link active" data-tabs="hislech" data-tab="registration">Оформление</div>
                    </div>
                    <form action="">
                        <div class="account__tab data-tab-item" data-tab="basket">
                            <div class="basket-row">
                                <div class="basket-content">
                                    <div class="basket-top">
                                        <label class="checkbox">
                                            <input type="checkbox"><span></span>
                                        </label>
                                        <span class="basket-txt">Выбрать все </span>
                                        <span class="basket-txt basket-txt-2">Цена</span>
                                        <span class="basket-txt basket-txt-3">Количество</span>
                                    </div>
                                    {{#each cart.list}}
                                    <div class="orders-product" data-id="{{id}}">
                                        <label class="checkbox">
                                            <input type="checkbox"><span></span>
                                        </label>
                                        <div class="orders-img"><img src="assets/img/new/img-3-min.jpg" alt=""></div>
                                        <div class="orders-product-wrap">
                                            <div class="orders-info">
                                                <span class="orders-name"><a href="#">{{name}}</a></span>
                                                <span class="orders-volume">Объем: 50 мл.</span>
                                            </div>
                                            <span class="orders-price">{{price}} ₽</span>
                                            <div class="orders-bl">
                                                <div class="filter__select">
                                                    <div class="filter-select select">
                                                        <div class="filter-select__main select__main">{{qty}}</div>
                                                        <div class="filter-select__list select__list">
                                                            <div class="filter-select__item select__item" on-click="setQty">1</div>
                                                            <div class="filter-select__item select__item active" on-click="setQty">2</div>
                                                            <div class="filter-select__item select__item" on-click="setQty">3</div>
                                                            <div class="filter-select__item select__item" on-click="setQty">4</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="#" class="orders-link" on-click="delete">Удалить</a>
                                            </div>
                                        </div>
                                    </div>
                                    {{/each}}
                                </div>
                                <div class="basket-sidebar">
                                    <div class="basket-wrap">
                                        <div class="total">
                                            <span>Итого</span>
                                            <span>{{cart.total.sum}} ₽</span>
                                        </div>
                                        <div class="basket-main">
                                            <a class="btn btn--black" href="#">Перейти к оформлению</a>
                                            <p>Способы оплаты и время доставки можно выбрать после оформления</p>
                                        </div>
                                        <span class="basket-tit">Ваша корзина</span>
                                        {{#each cart.list}}
                                        <div class="basket-item">
                                            <span class="basket-item-tit">Количество ({{qty}})</span>
                                            <div class="basket-item-row">
                                                <span>{{name}}</span>
                                                <b>{{price}} ₽  </b>
                                            </div>
                                        </div>
                                        {{/each}}
                                    </div>
                                    <div class="basket-bottom">
                                        <span class="basket-tit">Оплата и доставка</span>
                                        <a class="btn btn--white" href="#">Подробнее</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="account__tab data-tab-item active" data-tab="registration">
                            <div class="basket-row">
                                <div class="basket-content">
                                    <div class="basket-block">
                                        <span class="basket-subtitle">Способ доставки</span>
                                        <div class="ways">
                                            <div class="way">
                                                <div class="way-wrap">
                                                    <input type="radio" name="way" checked>
                                                    <span class="way-label">Курьер</span>
                                                </div>
                                            </div>
                                            <div class="way">
                                                <div class="way-wrap">
                                                    <input type="radio" name="way">
                                                    <span class="way-label">Заберу в клинике</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="basket-block">
                                        <span class="basket-subtitle">Получатель</span>
                                        <div class="basket-wr">
                                            <span class="basket-subtitle">Уже зарегистрированы ?</span>
                                            <a class="btn btn--white" href="#">Войти</a>
                                        </div>
                                        <div class="input">
                                            <input class="input__control" type="text" placeholder="ФИО">
                                            <div class="input__placeholder">ФИО</div>
                                        </div>
                                        <span class="basket-subtitle">Контакты</span>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input">
                                                    <input class="input__control" type="text" placeholder="+7 (___) ___-__-__">
                                                    <div class="input__placeholder">+7 (___) ___-__-__</div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input">
                                                    <input class="input__control" type="text" placeholder="Е-мейл">
                                                    <div class="input__placeholder">Е-мейл</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="basket-block">
                                        <span class="basket-subtitle">Адрес</span>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input">
                                                    <input class="input__control" type="text" placeholder="Страна">
                                                    <div class="input__placeholder">Страна</div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input">
                                                    <input class="input__control" type="text" placeholder="Город">
                                                    <div class="input__placeholder">Город</div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="input">
                                                    <input class="input__control" type="text" placeholder="Улица и дом">
                                                    <div class="input__placeholder">Улица и дом</div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input">
                                                    <input class="input__control" type="text" placeholder="кв./офис">
                                                    <div class="input__placeholder">кв./офис</div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input">
                                                    <input class="input__control" type="text" placeholder="Домофон">
                                                    <div class="input__placeholder">Домофон</div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input">
                                                    <input class="input__control" type="text" placeholder="Подъезд">
                                                    <div class="input__placeholder">Подъезд</div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input">
                                                    <input class="input__control" type="text" placeholder="Этаж">
                                                    <div class="input__placeholder">Этаж</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="basket-block basket-block-last">
                                        <span class="basket-subtitle">Дополнительная информация</span>
                                        <div class="input">
                                            <textarea name="text" class="input__control" placeholder="Оставить пожелания"></textarea>
                                            <div class="input__placeholder">Оставить пожелания</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="basket-sidebar">
                                    <div class="basket-wrap">
                                        <div class="total">
                                            <span>Итого</span>
                                            <span>{{cart.total.sum}} ₽</span>
                                        </div>
                                        <div class="basket-main">
                                            <a class="btn btn--black" href="#">Оплатить</a>
                                            <a class="btn btn--white" href="#">Заберу в клинике</a>
                                            <p>Нажимая на кнопку "Перезвонить мне", Вы даете согласие на обработку своих персональных данных на основании <a href="#">Политики конфиденциальности</a> а также с <a href="#">Условиями продажи</a></p>
                                        </div>
                                        <span class="basket-tit">Ваша корзина</span>
                                        {{#each cart.list}}
                                        <div class="basket-item">
                                            <span class="basket-item-tit">Количество ({{qty}})</span>
                                            <div class="basket-item-row">
                                                <span>{{name}}</span>
                                                <b>{{price}} ₽  </b>
                                            </div>
                                        </div>
                                        {{/each}}
                                    </div>
                                    <div class="basket-bottom">
                                        <span class="basket-tit">Оплата и доставка</span>
                                        <a class="btn btn--white" href="#">Подробнее</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script wb-app>
            var basket = new Ractive({
                el: '#Basket',
                template: $('#Basket').html(),
                data: {
                    cart: wbapp.storage("shop.cart")
                },
                on: {
                    init() {
                        this.fire('calc')
                    },
                    setQty(ev) {
                        let pid = $(ev.node).parents('[data-id]').data('id')
                        let qty = $(ev.node).text()*1
                        let cart = wbapp.storage("shop.cart")
                        cart.list[pid].qty = qty
                        this.fire('set',cart)
                    },
                    delete(ev) {
                        let pid = $(ev.node).parents('[data-id]').data('id')
                        let cart = wbapp.storage("shop.cart")
                        delete cart.list[pid]
                        this.fire('set',cart)
                    },
                    calc() {
                        let cart = wbapp.storage("shop.cart")
                        cart.total = {sum:0,qty:0}
                        $.each(cart.list, function(key, item) {
                            cart.total.sum = cart.total.sum + item.price*1*item.qty
                            cart.total.qty = cart.total.qty + item.qty*1
                        })
                        this.set('cart',cart)
                    },
                    set(cart) {
                        wbapp.storage("shop.cart", cart)
                        basket.set('cart',cart)
                        this.fire('calc')
                    }
                }
            })
        </script>
</view>

<preview>
<div class="container">
            <div class="account">
                <div class="crumbs"><a class="crumbs__arrow" href="#">
                        <svg class="svgsprite _crumbs-back">
                            <use xlink:href="assets/img/sprites/svgsprites.svg#crumbs-back"></use>
                        </svg></a><a class="crumbs__link" href="#">Главная</a><a class="crumbs__link" href="#">Корзина</a>
                </div>
                <div class="basket account__history data-tab-wrapper" data-tabs="hislech">
                    <div class="account__tab-items">
                        <div class="basket-link data-tab-link" data-tabs="hislech" data-tab="basket">Корзина</div>
                        <div class="basket-link data-tab-link active" data-tabs="hislech" data-tab="registration">Оформление</div>
                    </div>
                    <form action="">
                        <div class="account__tab data-tab-item" data-tab="basket">
                            <div class="basket-row">
                                <div class="basket-content">
                                    <div class="basket-top">
                                        <label class="checkbox">
                                            <input type="checkbox"><span></span>
                                        </label>
                                        <span class="basket-txt">Выбрать все </span>
                                        <span class="basket-txt basket-txt-2">Цена</span>
                                        <span class="basket-txt basket-txt-3">Количество</span>
                                    </div>
                                    <div class="orders-product">
                                        <label class="checkbox">
                                            <input type="checkbox"><span></span>
                                        </label>
                                        <div class="orders-img"><img src="assets/img/new/img-3-min.jpg" alt=""></div>
                                        <div class="orders-product-wrap">
                                            <div class="orders-info">
                                                <span class="orders-name"><a href="#">LANCÔME rénergie h.c.f. triple serum</a></span>
                                                <span class="orders-volume">Объем: 50 мл.</span>
                                            </div>
                                            <span class="orders-price">5 000 ₽</span>
                                            <div class="orders-bl">
                                                <div class="filter__select">
                                                    <div class="filter-select select">
                                                        <div class="filter-select__main select__main">1</div>
                                                        <div class="filter-select__list select__list">
                                                            <div class="filter-select__item select__item active">2</div>
                                                            <div class="filter-select__item select__item">3</div>
                                                            <div class="filter-select__item select__item">4</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="#" class="orders-link">Удалить</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="orders-product">
                                        <label class="checkbox">
                                            <input type="checkbox"><span></span>
                                        </label>
                                        <div class="orders-img"><img src="assets/img/new/img-3-min.jpg" alt=""></div>
                                        <div class="orders-product-wrap">
                                            <div class="orders-info">
                                                <span class="orders-name"><a href="#">LANCÔME rénergie h.c.f. triple serum</a></span>
                                                <span class="orders-volume">Объем: 50 мл.</span>
                                            </div>
                                            <span class="orders-price">5 000 ₽</span>
                                            <div class="orders-bl">
                                                <div class="filter__select">
                                                    <div class="filter-select select">
                                                        <div class="filter-select__main select__main">1</div>
                                                        <div class="filter-select__list select__list">
                                                            <div class="filter-select__item select__item active">2</div>
                                                            <div class="filter-select__item select__item">3</div>
                                                            <div class="filter-select__item select__item">4</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="#" class="orders-link">Удалить</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="orders-product">
                                        <label class="checkbox">
                                            <input type="checkbox"><span></span>
                                        </label>
                                        <div class="orders-img"><img src="assets/img/new/img-3-min.jpg" alt=""></div>
                                        <div class="orders-product-wrap">
                                            <div class="orders-info">
                                                <span class="orders-name"><a href="#">LANCÔME rénergie h.c.f. triple serum</a></span>
                                                <span class="orders-volume">Объем: 50 мл.</span>
                                            </div>
                                            <span class="orders-price">5 000 ₽</span>
                                            <div class="orders-bl">
                                                <div class="filter__select">
                                                    <div class="filter-select select">
                                                        <div class="filter-select__main select__main">1</div>
                                                        <div class="filter-select__list select__list">
                                                            <div class="filter-select__item select__item active">2</div>
                                                            <div class="filter-select__item select__item">3</div>
                                                            <div class="filter-select__item select__item">4</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="#" class="orders-link">Удалить</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="orders-product">
                                        <label class="checkbox">
                                            <input type="checkbox"><span></span>
                                        </label>
                                        <div class="orders-img"><img src="assets/img/new/img-3-min.jpg" alt=""></div>
                                        <div class="orders-product-wrap">
                                            <div class="orders-info">
                                                <span class="orders-name"><a href="#">LANCÔME rénergie h.c.f. triple serum</a></span>
                                                <span class="orders-volume">Объем: 50 мл.</span>
                                            </div>
                                            <span class="orders-price">5 000 ₽</span>
                                            <div class="orders-bl">
                                                <div class="filter__select">
                                                    <div class="filter-select select">
                                                        <div class="filter-select__main select__main">1</div>
                                                        <div class="filter-select__list select__list">
                                                            <div class="filter-select__item select__item active">2</div>
                                                            <div class="filter-select__item select__item">3</div>
                                                            <div class="filter-select__item select__item">4</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="#" class="orders-link">Удалить</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="basket-sidebar">
                                    <div class="basket-wrap">
                                        <div class="total">
                                            <span>Итого</span>
                                            <span>15 000 ₽</span>
                                        </div>
                                        <div class="basket-main">
                                            <a class="btn btn--black" href="#">Перейти к оформлению</a>
                                            <p>Способы оплаты и время доставки можно выбрать после оформления</p>
                                        </div>
                                        <span class="basket-tit">Ваша корзина</span>
                                        <div class="basket-item">
                                            <span class="basket-item-tit">Количество (1)</span>
                                            <div class="basket-item-row">
                                                <span>LANCÔME rénergie h.c.f. triple serum</span>
                                                <b>5 000 ₽  </b>
                                            </div>
                                        </div>
                                        <div class="basket-item">
                                            <span class="basket-item-tit">Количество (2)</span>
                                            <div class="basket-item-row">
                                                <span>LANCÔME rénergie h.c.f. triple serum</span>
                                                <b>5 000 ₽  </b>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="basket-bottom">
                                        <span class="basket-tit">Оплата и доставка</span>
                                        <a class="btn btn--white" href="#">Подробнее</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="account__tab data-tab-item active" data-tab="registration">
                            <div class="basket-row">
                                <div class="basket-content">
                                    <div class="basket-block">
                                        <span class="basket-subtitle">Способ доставки</span>
                                        <div class="ways">
                                            <div class="way">
                                                <div class="way-wrap">
                                                    <input type="radio" name="way" checked>
                                                    <span class="way-label">Курьер</span>
                                                </div>
                                            </div>
                                            <div class="way">
                                                <div class="way-wrap">
                                                    <input type="radio" name="way">
                                                    <span class="way-label">Заберу в клинике</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="basket-block">
                                        <span class="basket-subtitle">Получатель</span>
                                        <div class="basket-wr">
                                            <span class="basket-subtitle">Уже зарегистрированы ?</span>
                                            <a class="btn btn--white" href="#">Войти</a>
                                        </div>
                                        <div class="input">
                                            <input class="input__control" type="text" placeholder="ФИО">
                                            <div class="input__placeholder">ФИО</div>
                                        </div>
                                        <span class="basket-subtitle">Контакты</span>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input">
                                                    <input class="input__control" type="text" placeholder="+7 (___) ___-__-__">
                                                    <div class="input__placeholder">+7 (___) ___-__-__</div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input">
                                                    <input class="input__control" type="text" placeholder="Е-мейл">
                                                    <div class="input__placeholder">Е-мейл</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="basket-block">
                                        <span class="basket-subtitle">Адрес</span>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input">
                                                    <input class="input__control" type="text" placeholder="Страна">
                                                    <div class="input__placeholder">Страна</div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input">
                                                    <input class="input__control" type="text" placeholder="Город">
                                                    <div class="input__placeholder">Город</div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="input">
                                                    <input class="input__control" type="text" placeholder="Улица и дом">
                                                    <div class="input__placeholder">Улица и дом</div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input">
                                                    <input class="input__control" type="text" placeholder="кв./офис">
                                                    <div class="input__placeholder">кв./офис</div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input">
                                                    <input class="input__control" type="text" placeholder="Домофон">
                                                    <div class="input__placeholder">Домофон</div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input">
                                                    <input class="input__control" type="text" placeholder="Подъезд">
                                                    <div class="input__placeholder">Подъезд</div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input">
                                                    <input class="input__control" type="text" placeholder="Этаж">
                                                    <div class="input__placeholder">Этаж</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="basket-block basket-block-last">
                                        <span class="basket-subtitle">Дополнительная информация</span>
                                        <div class="input">
                                            <textarea name="text" class="input__control" placeholder="Оставить пожелания"></textarea>
                                            <div class="input__placeholder">Оставить пожелания</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="basket-sidebar">
                                    <div class="basket-wrap">
                                        <div class="total">
                                            <span>Итого</span>
                                            <span>15 000 ₽</span>
                                        </div>
                                        <div class="basket-main">
                                            <a class="btn btn--black" href="#">Оплатить</a>
                                            <a class="btn btn--white" href="#">Заберу в клинике</a>
                                            <p>Нажимая на кнопку "Перезвонить мне", Вы даете согласие на обработку своих персональных данных на основании <a href="#">Политики конфиденциальности</a> а также с <a href="#">Условиями продажи</a></p>
                                        </div>
                                        <span class="basket-tit">Ваша корзина</span>
                                        <div class="basket-item">
                                            <span class="basket-item-tit">Количество (1)</span>
                                            <div class="basket-item-row">
                                                <span>LANCÔME rénergie h.c.f. triple serum</span>
                                                <b>5 000 ₽  </b>
                                            </div>
                                        </div>
                                        <div class="basket-item">
                                            <span class="basket-item-tit">Количество (2)</span>
                                            <div class="basket-item-row">
                                                <span>LANCÔME rénergie h.c.f. triple serum</span>
                                                <b>5 000 ₽  </b>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="basket-bottom">
                                        <span class="basket-tit">Оплата и доставка</span>
                                        <a class="btn btn--white" href="#">Подробнее</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

</preview>