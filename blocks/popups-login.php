<view>
    <div id="popupsLogin">
        <template>
            <div class="popup --enter-number">
                <div class="popup__overlay"></div>
                <div class="popup__panel">
                    <button class="popup__close">
                        <svg class="svgsprite _close">
                            <use xlink:href="/assets/img/sprites/svgsprites.svg#close"></use>
                        </svg>
                    </button>
                    <div class="popup__name text-bold">Войдите или зарегистрируйтесь</div>
                    <form class="popup__form">
                        <div class="input input--grey">
                            <input class="input__control" name="phone" type="tel" on-keyup="phoneEnter" placeholder="Номер телефона" data-inputmask="'mask': '+7 (999) 999-99-99'">
                            <div class="input__placeholder">Номер телефона</div>
                        </div><a class="form__link --switchpopup" href="#" data-popup="--email-enter"> Войти по почте</a>
                    </form>
                    <div class="form-bottom">
                        <button class="btn btn--black form__submit --switchpopup" on-click="getCode" disabled data-popup="--code">Получить код</button>
                    </div>
                </div>
            </div>

            <div class="popup --code">
                <div class="popup__overlay"></div>
                <div class="popup__panel">
                    <button class="popup__close">
                        <svg class="svgsprite _close">
                            <use xlink:href="/assets/img/sprites/svgsprites.svg#close"></use>
                        </svg>
                    </button>
                    <div class="popup__name text-bold">Вход</div>
                    <form class="popup__form">
                        <h3 class="h3">Введите код</h3>
                        <div class="form-title__description form-title__description--small">Мы отправили код подтверждения на номер <br>{{phone}} <a class="link" href="#"> Изменить</a></div>
                        <div class="code">
                            <input class="code__input" type="number" on-keyup="getAuth">
                            <input class="code__input" type="number" on-keyup="getAuth">
                            <input class="code__input" type="number" on-keyup="getAuth">
                            <input class="code__input" type="number" on-keyup="getAuth">
                            <input class="code__input" type="number" on-keyup="getAuth">
                            <input class="code__input" type="number" on-keyup="getAuth">
                        </div><a class="form__link" href="#"> Отправить код повторно</a>
                    </form>
                </div>
            </div>

            <div class="popup --email-enter">
                <div class="popup__overlay"></div>
                <div class="popup__panel">
                    <button class="popup__close">
                        <svg class="svgsprite _close">
                            <use xlink:href="/assets/img/sprites/svgsprites.svg#close"></use>
                        </svg>
                    </button>
                    <div class="popup__name text-bold">Войдите или зарегистрируйтесь</div>
                    <form class="popup__form">
                        <div class="input input--grey">
                            <input class="input__control" name="login" type="email" placeholder="Ваш е-мейл">
                            <div class="input__placeholder">Ваш е-мейл</div>
                        </div>
                        <div class="text-right mb-10"><a class="form__link --switchpopup" data-popup="--email-recover">Забыли
                                пароль?</a></div>
                        <div class="input input--grey">
                            <input class="input__control" name="password" type="password" placeholder="Пароль">
                            <div class="input__placeholder">Пароль</div>
                        </div><a class="form__link --switchpopup" type="button" data-popup="--enter-number"> Войти по номеру
                            телефона</a>
                        <div class="form-bottom --flex">
                            <button class="btn btn--black form__submit" type="submit" on-click="getAuthEmail">Войти</button>
                            <button class="btn btn--white form__submit --switchpopup" type="button" data-popup="--reg">Зарегистрироваться</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="popup --email-recover">
                <div class="popup__overlay"></div>
                <div class="popup__panel">
                    <button class="popup__close">
                        <svg class="svgsprite _close">
                            <use xlink:href="/assets/img/sprites/svgsprites.svg#close"></use>
                        </svg>
                    </button>
                    <div class="popup__name text-bold">Восстановление пароля</div>
                    <div class="form-title__description form-title__description--small">Для восстановления пароля введите email, который Вы указывали при регистрации</div>
                    <form class="popup__form">
                        <div class="input input--grey">
                            <input class="input__control" type="email" placeholder="Ваш е-мейл">
                            <div class="input__placeholder">Ваш е-мейл</div>
                        </div><a class="form__link --switchpopup" type="button" data-popup="--enter-number"> Войти по номеру
                            телефона</a>
                        <div class="form-bottom --flex">
                            <button class="btn btn--black form__submit">Восстановить</button>
                        </div>
                    </form>
                </div>
                <div class="popup__panel --succed">
                    <button class="popup__close">
                        <svg class="svgsprite _close">
                            <use xlink:href="/assets/img/sprites/svgsprites.svg#close"></use>
                        </svg>
                    </button>
                    <div class="popup__name text-bold">Восстановление пароля</div>
                    <h3 class="h3">Письмо отправлено!</h3>
                    <p class="text-grey">На Ваш почтовый ящик выслана ссылка для восстановления пароля. Пожалуйста, проверьте почту
                    </p>
                </div>
            </div>

            <div class="popup --email-send">
                <div class="popup__overlay"></div>
                <div class="popup__panel">
                    <button class="popup__close">
                        <svg class="svgsprite _close">
                            <use xlink:href="/assets/img/sprites/svgsprites.svg#close"></use>
                        </svg>
                    </button>
                    <div class="popup__name text-bold">Восстановление пароля</div>
                    <h3 class="h3">КОД УСПЕШНО ОТПРАВЛЕН</h3>
                </div>
            </div>

            <div class="popup --reg">
                <div class="popup__overlay"></div>
                <div class="popup__panel">
                    <button class="popup__close">
                        <svg class="svgsprite _close">
                            <use xlink:href="/assets/img/sprites/svgsprites.svg#close"></use>
                        </svg>
                    </button>
                    <div class="popup__name text-bold">Регистрация Личного кабинета</div>
                    <div class="form-title__description">Для регистрации личного кабинета введите свой email адрес, пароль будет выслан на указанную почту</div>
                    <form class="popup__form">
                        <div class="input input--grey">
                            <input class="input__control" type="email" placeholder="Ваш е-мейл">
                            <div class="input__placeholder">Ваш е-мейл</div>
                        </div>
                        <div class="form__alert text-small">Адрес уже используется, хотите&nbsp;<a class="link link--medium" href="">восстановить пароль</a>?
                            <svg class="svgsprite _alert">
                                <use xlink:href="/assets/img/sprites/svgsprites.svg#alert"></use>
                            </svg>
                        </div>
                        <div class="form__description">Нажимая на кнопку "Зарегистрироваться", Вы даете согласие на обработку своих персональных данных на основании <a href="/policy">Политики конфиденциальности</a></div>
                        <div class="form-bottom --flex">
                            <button class="btn btn--black form__submit --switchpopup" type="submit">Зарегистрироваться</button>
                            <button class="btn btn--white form__submit --switchpopup" type="button" data-popup="--enter-number">Войти</button>
                        </div>
                    </form>
                </div>
                <div class="popup__panel --succed">
                    <button class="popup__close">
                        <svg class="svgsprite _close">
                            <use xlink:href="/assets/img/sprites/svgsprites.svg#close"></use>
                        </svg>
                    </button>
                    <div class="popup__name text-bold">Регистрация Личного кабинета</div>
                    <h3 class="h3">Успешно !</h3>
                    <p class="text-grey">Ваш Личный кабинет создан, сейчас вы будете в него автоматически перенаправлены</p>
                </div>
            </div>
        </template>
    </div>
    <script wbapp remove>
        (function() {
            let tpl = document.querySelector('#popupsLogin > template').innerHTML;
            let popLogin = new Ractive({
                el: '#popupsLogin',
                template: tpl,
                data: {},
                on: {
                    phoneEnter() {
                        let phone = $('.popup.--enter-number [name=phone]').val();
                        if (strpos(phone, '_')) {
                            $('.popup.--enter-number .btn').prop('disabled', true)
                        } else {
                            $('.popup.--enter-number .btn').prop('disabled', false)
                            this.set('phone', phone)
                        }
                    },
                    getCode() {
                        console.log("Get code function");
                    },
                    getAuthPhone(e) {
                        let phone = $('.popup.--enter-number [name=phone]').val();
                        let code = '';
                        $(e.node).val(e.event.key);
                        if ($(e.node).next('.code__input').length) {
                            $(e.node).next('.code__input').focus()
                        }

                        $('.popup.--code form .code input').each(function() {
                            code += $(this).val()
                        })

                        if (code.length == 6) {
                            let post = {
                                'login': phone,
                                'password': 'accept'
                            }
                            post = JSON.stringify(post);
                            fetch('/api/auth/phone', {
                                method: 'POST',
                                body: post
                            }).then((response) => {
                                return response.json();
                            }).then(function(data) {
                                console.log(data);
                            })
                        }
                    },
                    getAuthEmail() {
                        wbapp.auth('.popup.--email-enter form')
                    }
                }
            })
        })()
    </script>

</view>