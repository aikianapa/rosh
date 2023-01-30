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
                            <input class="input__control" name="phone" type="tel" placeholder="Номер телефона" autocomplete="off">
                            <div class="input__placeholder">Номер телефона</div>
                        </div>

                        <div class="alert alert-warning mb-2"></div>

                        <a class="form__link email_window_show" href="javascript:void(0)">Войти по почте</a>
                    </form>
                    <div class="form-bottom">
                        <button class="btn btn--black form__submit" disabled>Получить код</button>
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
                        <div class="form-title__description">
                            Мы отправили код подтверждения на номер <span class="current_phone"></span>.<br>
                            Время жизни кода 60 секунд.<br>
                            Осталось <strong><span class="sms_code_lifetime"></span></strong>
                        </div>

                        <div class="code">
                            <input class="code__input" type="text">
                            <input class="code__input" type="text">
                            <input class="code__input" type="text">
                            <input class="code__input" type="text">
                            <input class="code__input" type="text">
                            <input class="code__input" type="text">
                        </div>

                        <div class="alert alert-warning mb-2"></div>
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
                        <div class="text-right mb-10"><a class="form__link" href="javascript:void(0)" onclick="auth.recover_window_show()">Забыли пароль?</a></div>
                        <div class="input input--grey">
                            <input class="input__control" name="password" type="password" placeholder="Пароль">
                            <div class="input__placeholder">Пароль</div>
                        </div>

                        <div class="alert alert-warning mb-2"></div>

                        <a class="form__link" type="button" href="javascript:void(0)" onclick="auth.phone_window_show()">Войти по номеру телефона</a>
                        <div class="form-bottom --flex">
                            <a class="btn btn--black login">Войти</a>
                            <a class="btn btn--white" href="javascript:void(0)" onclick="auth.registration_window_show()">Зарегистрироваться</a>
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
                            <input class="input__control" type="email" name="email" placeholder="Ваш е-мейл">
                            <div class="input__placeholder">Ваш е-мейл</div>
                        </div>

                        <div class="alert alert-warning mb-2"></div>

                        <a class="form__link" type="button" href="javascript:void(0)" onclick="auth.phone_window_show()"> Войти по номеру телефона</a>
                        <div class="form-bottom --flex">
                            <a href="javascript:void(0)" class="btn btn--black do_recover">Восстановить</a>
                        </div>
                    </form>
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

                        <div class="alert alert-warning mb-2"></div>

                        <div class="form__alert text-small email_is_busy">Адрес уже используется, хотите&nbsp;<a class="link link--medium" href="javascript:void(0)" onclick="auth.recover_window_show()">восстановить пароль</a>?
                            <svg class="svgsprite _alert">
                                <use xlink:href="/assets/img/sprites/svgsprites.svg#alert"></use>
                            </svg>
                        </div>
                        <div class="form__description">Нажимая на кнопку "Зарегистрироваться", Вы даете согласие на обработку своих персональных данных на основании <a href="/policy">Политики конфиденциальности</a></div>
                        <div class="form-bottom --flex">
                            <a class="btn btn--black do_register" type="button">Зарегистрироваться</a>
                            <a class="btn btn--white" type="button" href="javascript:void(0)" onclick="auth.email_enter_window_show()">Войти</a>
                        </div>
                    </form>
                </div>


            </div>
        </template>
    </div>

    <script wbapp remove>
		(function() {
			new Ractive({
				el: '#popupsLogin',
				template: document.querySelector('#popupsLogin > template').innerHTML,
				data: {},
			})
		})()
    </script>

</view>