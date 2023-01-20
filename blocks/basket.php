<edit header="Корзина интернет-магазина">
    <div>
        <wb-module wb="module=yonger&mode=edit&block=common.inc" />
    </div>
</edit>

<view>
    <div class="container">
        <div class="account" id="Basket">
            <div class="basket account__history data-tab-wrapper" data-tabs="hislech">
                <div class="account__tab-items">
                    <div class="basket-link data-tab-link" data-tabs="hislech" data-tab="basket">Корзина</div>
                    <div class="basket-link data-tab-link active" data-tabs="hislech" data-tab="registration">Оформление</div>
                </div>
                <form action="/orders/submit" on-submit="order" method="post">
                    <div class="account__tab data-tab-item" data-tab="basket" wb-off>
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
                                        <div class="orders-img"><img data-src="/thumbc/352x352/src{{img}}" alt=""></div>
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
                                                <b>{{price}} ₽ </b>
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
                                                <input type="radio" name="way" value="courier" checked>
                                                <span class="way-label">Курьер</span>
                                            </div>
                                        </div>
                                        <div class="way">
                                            <div class="way-wrap">
                                                <input type="radio" name="way" value="self">
                                                <span class="way-label">Заберу в клинике</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="basket-block">
                                    <span class="basket-subtitle">Получатель</span>
                                    <input type="hidden" name="user_id" value="{{_sess.user.id}}" />
                                    <div class="basket-wr" wb-if="'{{_sess.user.role}}'==''">
                                        <span class="basket-subtitle">Уже зарегистрированы ?</span>
                                        <a class="btn btn--white --openpopup --mobile-fade" data-popup="--enter-number" href="#">Войти</a>
                                    </div>
                                    <div class="input">
                                        <input class="input__control" type="text" name="fullname" value="{{_sess.user.fullname}}" placeholder="ФИО" required>
                                        <div class="input__placeholder">ФИО</div>
                                    </div>
                                    <span class="basket-subtitle">Контакты</span>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="input">
                                                <input class="input__control" type="tel" pname="phone" value="{{_sess.user.phone}}" laceholder="+7 (___) ___-__-__" required>
                                                <div class="input__placeholder">+7 (___) ___-__-__</div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input">
                                                <input class="input__control" type="text" name="email" value="{{_sess.user.email}}" placeholder="Е-мейл">
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
                                                <input class="input__control" name="country" value="{{_sess.user.country}}" type="text" placeholder="Страна">
                                                <div class="input__placeholder">Страна</div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input">
                                                <input class="input__control" name="city" value="{{_sess.user.city}}" type="text" placeholder="Город">
                                                <div class="input__placeholder">Город</div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="input">
                                                <input class="input__control" name="street" value="{{_sess.user.street}}" type="text" placeholder="Улица и дом">
                                                <div class="input__placeholder">Улица и дом</div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input">
                                                <input class="input__control" name="flat" value="{{_sess.user.flat}}" type="text" placeholder="кв./офис">
                                                <div class="input__placeholder">кв./офис</div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input">
                                                <input class="input__control" name="intercom" value="{{_sess.user.intercom}}" type="text" placeholder="Домофон">
                                                <div class="input__placeholder">Домофон</div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input">
                                                <input class="input__control" name="entrance" value="{{_sess.user.entrance}}" type="text" placeholder="Подъезд">
                                                <div class="input__placeholder">Подъезд</div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input">
                                                <input class="input__control" name="level" value="{{_sess.user.level}}" type="text" placeholder="Этаж">
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
                            <div class="basket-sidebar" wb-off>
                                <div class="basket-wrap">
                                    <div class="total">
                                        <span>Итого</span>
                                        <span>{{cart.total.sum}} ₽</span>
                                    </div>
                                    <div class="basket-main">
                                        <button class="btn btn--black" type="submit">Заказать</button>
                                        <p>Нажимая на кнопку "Перезвонить мне", Вы даете согласие на обработку своих персональных данных на основании <a href="/policy">Политики конфиденциальности</a> а также с <a href="/delivery">Условиями продажи</a></p>
                                    </div>
                                    <span class="basket-tit">Ваша корзина</span>
                                    {{#each cart.list}}
                                        <div class="basket-item">
                                            <span class="basket-item-tit">Количество ({{qty}})</span>
                                            <div class="basket-item-row">
                                                <span>{{name}}</span>
                                                <b>{{price}} ₽ </b>
                                            </div>
                                        </div>
                                    {{/each}}
                                </div>
                                <div class="basket-bottom">
                                    <span class="basket-tit">Оплата и доставка</span>
                                    <a class="btn btn--white" href="/delivery">Подробнее</a>
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
                cart: {}
            },
            on: {
                complete() {
                    let cart = wbapp.storage("shop.cart")
                    if (!cart) {
                        cart = {
                            list: {},
                            total: {
                                sum: 0,
                                qty: 0
                            }
                        }
                        wbapp.storage("shop.cart", cart)
                    }
                    this.fire('calc')
                },
                setQty(ev) {
                    let pid = $(ev.node).parents('[data-id]').data('id')
                    let qty = $(ev.node).text() * 1
                    let cart = wbapp.storage("shop.cart")
                    cart.list[pid].qty = qty
                    this.fire('set', cart)
                },
                delete(ev) {
                    let pid = $(ev.node).parents('[data-id]').data('id')
                    let cart = wbapp.storage("shop.cart")
                    delete cart.list[pid]
                    this.fire('set', cart)
                },
                calc() {
                    let cart = wbapp.storage("shop.cart")
                    cart.total = {
                        sum: 0,
                        qty: 0
                    }
                    $.each(cart.list, function(key, item) {
                        cart.total.sum = cart.total.sum + item.price * 1 * item.qty
                        cart.total.qty = cart.total.qty + item.qty * 1
                    })
                    this.set('cart', cart)
                    $(document).find('.cart-total-qty').text(cart.total.qty)
                    $(document).find('.cart-total-sum').text(cart.total.sum)
                },
                set(cart) {
                    wbapp.storage("shop.cart", cart)
                    basket.set('cart', cart)
                    this.fire('calc')
                },
                order(ev) {
                    let data = $(basket.el).find('form').serializeJson();
                    data.cart = basket.get('cart');
                    console.log(data);
                    ev.event.preventDefault()
                    fetch('/api/v2/create/orders?__token=' + wbapp._session.token, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                            },
                            body: JSON.stringify(data),
                        })
                        .then((response) => response.json())
                        .then((data) => {
                            if (data.id !== undefined) {
                                let cart = {
                                    list: {},
                                    total: {
                                        sum: 0,
                                        qty: 0
                                    }
                                }
                                wbapp.storage("shop.cart", cart)
                                this.fire('calc')
                            } else {
                                // что-то пошло не так
                            }
                        })
                        .catch((error) => {
                            console.error('Error:', error);
                        });
                }
            }
        })
    </script>
</view>