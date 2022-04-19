<view>
        <form class="fast-form no-validation">
            <div class="container">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="fast-form__info">
                                <h2 class="h2 fast-form__title">Быстрая запись на прием</h2>
                                <p class="fast-form__undertitle text-grey">После отправки заявки для Вас будет создан Личный кабинет, в который можно попасть через кнопку "Войти" в верхнем меню сайта</p>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="fast-form__item">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="input">
                                            <input class="input__control" type="text" placeholder="ФИО">
                                            <div class="input__placeholder">ФИО</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input">
                                            <input class="input__control" type="tel" placeholder="Номер телефона" data-inputmask="'mask': '+7 (999) 999-99-99'">
                                            <div class="input__placeholder">Номер телефона</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="fast-form__item">
                                <div class="input">
                                    <textarea class="input__control" placeholder="Причина обращения"></textarea>
                                    <div class="input__placeholder">Причина обращения</div>
                                </div>
                            </div>
                            <div class="fast-form__item --flex --aicn">
                                <button class="btn btn--black fast-form__submit --openpopup" data-popup="--form-send">Перезвонить мне</button>
                                <div class="fast-form__description">Нажимая на кнопку "Перезвонить мне", Вы даете согласие на <a href="">обработку своих персональных данных</a>  на основании <a href="policy.html">Политики конфиденциальности</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
</view>

<edit header="Быстрая запись на приём">
    <div>
        <wb-module wb="module=yonger&mode=edit&block=common.inc" />
    </div>
</edit>