<view>
    <div class="account expert">
            <form class="search">
                <div class="container">
                    <div class="search__block --flex --aicn">
                        <div class="input">
                            <input class="search__input" type="text" placeholder="Поиск">
                        </div>
                        <button class="btn btn--black">Найти</button>
                    </div>
                </div>
            </form>
            <div class="container">
                <div class="account__panel">
                    <div class="account__info">
                        <div class="user --flex">
                            <div class="user__panel">
                                <div class="user__name">{{_sess.user.expert.name}}
                                    <button class="user__edit">
                                        <svg class="svgsprite _edit">
                                            <use xlink:href="/assets/img/sprites/svgsprites.svg#edit"></use>
                                        </svg>
                                    </button>
                                </div>

                                <div class="user__group --noflex">
                                    <div class="user__item">Образование: <span>{{_sess.user.expert.blocks.expert_inner.education}}</span></div>
                                    <div class="user__item">Лицензия: <span>№{{_sess.user.expert.blocks.expert_inner.certificate}}:</span></div>
                                </div>
                            </div>
                            <div class="user__panel user__panel--border">
                                <div class="user__item">{{_sess.user.expert.spec}}</div>
                                <div class="user__notifcation">
                                    <svg class="svgsprite _notification">
                                        <use xlink:href="/assets/img/sprites/svgsprites.svg#notification"></use>
                                    </svg>Ближайшая запись: 28.10.2021, 08:30 – 9:00
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="account__exit" href="/signout">Выйти из аккаунта</a>
                    <form class="profile-edit">
                        <div class="profile-edit__block">
                            <div class="lk-title">Редактировать профиль</div>
                            <div class="row profile-edit__wrap">
                                <div class="col-md-3">
                                    <div class="input input--grey">
                                        <input class="input__control datebirthdaypickr" type="text" placeholder="Дата рождения">
                                        <div class="input__placeholder">Дата рождения</div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="input input--grey">
                                        <input class="input__control" type="tel" placeholder="Телефон" data-inputmask="'mask': '+7 (999) 999-99-99'">
                                        <div class="input__placeholder">Телефон</div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="input input--grey">
                                        <input class="input__control" type="email" placeholder="E-mail">
                                        <div class="input__placeholder">E-mail</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="profile-edit__block">
                            <div class="lk-title">Лицензия</div>
                            <div class="profile-licenses row">
                                <div class="col-md-6">
                                    <div class="profile-licenses__inputs repeater-container" data-repeater="license">
                                        <div class="profile-licenses__input input input--grey">
                                            <input class="input__control" type="text" placeholder="Добавьте лицензию" value="165335789">
                                            <div class="input__placeholder">Добавьте лицензию</div>
                                        </div>
                                        <div class="profile-licenses__input input input--grey repeater-item">
                                            <input class="input__control" type="text" placeholder="Добавьте лицензию">
                                            <div class="input__placeholder">Добавьте лицензию</div>
                                            <a class="profile-licenses__delete repeater-delete" href="#">
                                                <svg class="svgsprite _delete-black">
                                                    <use xlink:href="/assets/img/sprites/svgsprites.svg#delete-black"></use>
                                                </svg>
                                            </a>
                                        </div>
                                        <div class="profile-licenses__input input input--grey repeater-item">
                                            <input class="input__control" type="text" placeholder="Добавьте лицензию">
                                            <div class="input__placeholder">Добавьте лицензию</div>
                                            <a class="profile-licenses__delete repeater-delete" href="#">
                                                <svg class="svgsprite _delete-black">
                                                    <use xlink:href="/assets/img/sprites/svgsprites.svg#delete-black"></use>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 --flex">
                                    <a class="btn btn--black add-license repeater-add" href="#" data-repeater="license">Добавить лицензию</a>
                                    <div class="profile-licenses__input input input--grey repeater-sample" data-repeater="license">
                                        <input class="input__control" type="text" placeholder="Добавьте лицензию">
                                        <div class="input__placeholder">Добавьте лицензию</div>
                                        <a class="profile-licenses__delete repeater-delete" href="#">
                                            <svg class="svgsprite _delete-black">
                                                <use xlink:href="/assets/img/sprites/svgsprites.svg#delete-black"></use>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="profile-edit__block profile-education">
                            <div class="lk-title">Образование</div>
                            <div class="profile-education__wrap repeater-container" data-repeater="study">
                                <div class="profile-education__inner row">
                                    <div class="col-md-6">
                                        <div class="input input--grey">
                                            <input class="input__control" type="text" placeholder="Название учебного заведения" value="Институт усовершенствования врачей">
                                            <div class="input__placeholder">Название учебного заведения</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="profile-education__inputs">
                                            <div class="profile-education__input">
                                                <div class="input input-lk-calendar input--grey">
                                                    <input class="input__control datepickr" type="text" placeholder="Начало обучения" value="2007-06-22">
                                                    <div class="input__placeholder">Начало обучения</div>
                                                </div>
                                            </div>
                                            <div class="profile-education__input">
                                                <div class="input input-lk-calendar input--grey">
                                                    <input class="input__control datepickr" type="text" placeholder="Окончание обучения" value="2012-06-12">
                                                    <div class="input__placeholder">Окончание обучения</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="profile-education__inner row repeater-item">
                                    <div class="col-md-6">
                                        <div class="input input--grey">
                                            <input class="input__control" type="text" placeholder="Название учебного заведения">
                                            <div class="input__placeholder">Название учебного учреждения</div>
                                            <div class="education__delete repeater-delete">
                                                <svg class="svgsprite _delete-black">
                                                    <use xlink:href="/assets/img/sprites/svgsprites.svg#delete-black"></use>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="profile-education__inputs">
                                            <div class="profile-education__input">
                                                <div class="input input-lk-calendar input--grey">
                                                    <input class="input__control datepickr" type="text" placeholder="Начало обучения">
                                                    <div class="input__placeholder">Начало обучения</div>
                                                </div>
                                            </div>
                                            <div class="profile-education__input">
                                                <div class="input input-lk-calendar input--grey">
                                                    <input class="input__control datepickr" type="text" placeholder="Окончание обучения">
                                                    <div class="input__placeholder">Окончание обучения</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="profile-education__inner row">
                                <div class="col-md-6 --flex">
                                    <a class="btn btn--black add-education repeater-add" href="#" data-repeater="study">Добавить обучение</a>
                                    <div class="profile-education__inner row repeater-sample" data-repeater="study">
                                        <div class="col-md-6">
                                            <div class="input input--grey">
                                                <input class="input__control" type="text" placeholder="Название учебного заведения">
                                                <div class="input__placeholder">Название учебного учреждения</div>
                                                <div class="education__delete repeater-delete">
                                                    <svg class="svgsprite _delete-black">
                                                        <use xlink:href="/assets/img/sprites/svgsprites.svg#delete-black"></use>
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="profile-education__inputs">
                                                <div class="profile-education__input">
                                                    <div class="input input-lk-calendar input--grey">
                                                        <input class="input__control datepickr" type="text" placeholder="Начало обучения">
                                                        <div class="input__placeholder">Начало обучения</div>
                                                    </div>
                                                </div>
                                                <div class="profile-education__input">
                                                    <div class="input input-lk-calendar input--grey">
                                                        <input class="input__control datepickr" type="text" placeholder="Окончание обучения">
                                                        <div class="input__placeholder">Окончание обучения</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn--white">Сохранить</button>
                    </form>
                </div>
                <div class="lk-title">Текущее событие</div>
                <div class="account-events">
                    <div class="account-events__block">
                        <div class="account-events__block-wrap">
                            <div class="account-events__item">
                                <div class="account-event-wrap">
                                    <div class="account-events__name">Услуги: </div>
                                    <div class="account-event">
                                        <p>Консультация врача</p>
                                    </div>
                                </div>
                            </div>
                            <div class="account-events__item">
                                <div class="account-event-wrap">
                                    <div class="account-events__name">Дата приема: </div>
                                    <div class="account-event">
                                        <p>28.10.2021</p>
                                    </div>
                                </div>
                                <div class="account-event-wrap">
                                    <div class="account-events__name">Время приема: </div>
                                    <div class="account-event">
                                        <p>08:30 – 9:00</p>
                                    </div>
                                </div>
                            </div>
                            <div class="account-events__item">
                                <div class="account-event-wrap">
                                    <div class="account-events__name">Пациент: </div>
                                    <div class="account-event">
                                        <p>Мартынова Александра Михайловна</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="account-events__btns">
                            <div class="account-event-wrap --aicn">
                                <div class="account-events__btn">
                                    <button class="btn btn--black">Начать консультацию</button>
                                </div>
                                <p>Вас ожидает пациент, можете подключиться прямо сейчас</p>
                            </div>
                        </div>
                        <div class="account-edit pt-30">
                            <div class="account-edit__title">
                                <p>Рекомендации</p><a class="user__edit" href="#">
                                    <svg class="svgsprite _edit">
                                        <use xlink:href="/assets/img/sprites/svgsprites.svg#edit"></use>
                                    </svg></a>
                            </div>
                            <textarea class="account-edit__textarea"></textarea>
                            <button class="btn btn--white">Сохранить</button>
                        </div>
                    </div>
                </div>
                <div class="lk-title">Предстоящие события</div>
                <div class="account-events">
                    <div class="account-events__block">
                        <div class="account-events__block-wrap">
                            <div class="account-events__item --flex">
                                <div class="account-event-wrap">
                                    <div class="account-events__name">Услуги: </div>
                                    <div class="account-event">
                                        <p>Консультация врача </p>
                                        <p>Расшифровка анализов</p>
                                    </div>
                                </div>
                            </div>
                            <div class="account-events__item">
                                <div class="account-event-wrap">
                                    <div class="account-events__name">Дата приема: </div>
                                    <div class="account-event">
                                        <p>28.10.2021</p>
                                    </div>
                                </div>
                                <div class="account-event-wrap">
                                    <div class="account-events__name">Время приема: </div>
                                    <div class="account-event">
                                        <p>08:30 – 9:00</p>
                                    </div>
                                </div>
                            </div>
                            <div class="account-events__item">
                                <div class="account-event-wrap">
                                    <div class="account-events__name">Пациент: </div>
                                    <div class="account-event">
                                        <p>Молотилова Ольга Юрьевна</p>
                                    </div>
                                </div>
                                <div class="account-event-wrap">
                                    <div class="account-events__name">Специалист: </div>
                                    <div class="account-event">
                                        <p>Молотилова Ольга Юрьевна</p>
                                        <p>Айрапетян Амалия Суреновна</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="account-events__block">
                        <div class="account-events__block-wrap">
                            <div class="account-events__item">
                                <div class="account-event-wrap">
                                    <div class="account-events__name">Услуги: </div>
                                    <div class="account-event">
                                        <p>Консультация врача</p>
                                    </div>
                                </div>
                            </div>
                            <div class="account-events__item">
                                <div class="account-event-wrap">
                                    <div class="account-events__name">Дата приема: </div>
                                    <div class="account-event">
                                        <p>28.10.2021</p>
                                    </div>
                                </div>
                                <div class="account-event-wrap">
                                    <div class="account-events__name">Время приема: </div>
                                    <div class="account-event">
                                        <p>08:30 – 9:00</p>
                                    </div>
                                </div>
                            </div>
                            <div class="account-events__item">
                                <div class="account-event-wrap">
                                    <div class="account-events__name">Пациент: </div>
                                    <div class="account-event">
                                        <p>Молотилова Ольга Юрьевна</p>
                                    </div>
                                </div>
                                <div class="account-event-wrap">
                                    <div class="account-events__name">Специалист: </div>
                                    <div class="account-event">
                                        <p>Айрапетян Амалия Суреновна</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="account-events__btns">
                            <div class="account-event-wrap --aicn">
                                <div class="account-events__btn">
                                    <button class="btn btn--white">Онлайн консультация</button>
                                </div>
                                <p>Кнопка станет активной за 5 минут до начала консультации</p>
                            </div>
                        </div>
                    </div>
                    <div class="account-events__block">
                        <div class="account-events__block-wrap">
                            <div class="account-events__item">
                                <div class="account-event-wrap">
                                    <div class="account-events__name">Услуги: </div>
                                    <div class="account-event">
                                        <p>Консультация врача</p>
                                    </div>
                                </div>
                            </div>
                            <div class="account-events__item">
                                <div class="account-event-wrap">
                                    <div class="account-events__name">Дата приема: </div>
                                    <div class="account-event">
                                        <p>28.10.2021</p>
                                    </div>
                                </div>
                                <div class="account-event-wrap">
                                    <div class="account-events__name">Время приема: </div>
                                    <div class="account-event">
                                        <p>08:30 – 9:00</p>
                                    </div>
                                </div>
                            </div>
                            <div class="account-events__item">
                                <div class="account-event-wrap">
                                    <div class="account-events__name">Пациент: </div>
                                    <div class="account-event">
                                        <p>Молотилова Ольга Юрьевна</p>
                                    </div>
                                </div>
                                <div class="account-event-wrap">
                                    <div class="account-events__name">Специалист: </div>
                                    <div class="account-event">
                                        <p>Айрапетян Амалия Суреновна</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="account-events__btns">
                            <div class="account-event-wrap --aicn">
                                <div class="account-events__btn">
                                    <button class="btn btn--white">Онлайн консультация</button>
                                </div>
                                <p>Кнопка станет активной за 5 минут до начала консультации</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="lk-title">История посещений и приемов</div>
                <div class="account__history">
                    <div class="account__table">
                        <div class="account__table-head">
                            <div class="history-item">Дата</div>
                            <div class="history-item">Время</div>
                            <div class="history-item">Специалисты</div>
                            <div class="history-item">Услуги</div>
                            <div class="history-item">Анализы</div>
                        </div>
                        <div class="account__table-body">
                            <div class="acount__table-accardeon accardeon">
                                <div class="acount__table-main accardeon__main accardeon__click">
                                    <div class="history-item">16.10.2021</div>
                                    <div class="history-item">08:45-09:45</div>
                                    <div class="history-item">Цветкова Инна Сергеевна</div>
                                    <div class="history-item">Удаление образований</div>
                                    <div class="history-item">Нет анализов</div>
                                </div>
                                <div class="acount__table-list accardeon__list">
                                    <div class="account-edit__title">
                                        <p>Рекомендация врача</p><a class="user__edit" href="#">
                                            <svg class="svgsprite _edit">
                                                <use xlink:href="/assets/img/sprites/svgsprites.svg#edit"></use>
                                            </svg></a>
                                    </div>
                                    <textarea class="account-edit__textarea"></textarea>
                                    <button class="btn btn--white">Сохранить</button>
                                </div>
                            </div>
                        </div>
                        <div class="account__table-body">
                            <div class="acount__table-accardeon accardeon">
                                <div class="acount__table-main accardeon__main accardeon__click">
                                    <div class="history-item">18.10.2021</div>
                                    <div class="history-item">08:45-09:45</div>
                                    <div class="history-item">Цветкова Инна Сергеевна</div>
                                    <div class="history-item">Удаление образований</div>
                                    <div class="history-item">Нет анализов</div>
                                </div>
                                <div class="acount__table-list accardeon__list">
                                    <div class="account-edit__title">
                                        <p>Рекомендация врача</p><a class="user__edit" href="#">
                                            <svg class="svgsprite _edit">
                                                <use xlink:href="/assets/img/sprites/svgsprites.svg#edit"></use>
                                            </svg></a>
                                    </div>
                                    <textarea class="account-edit__textarea"></textarea>
                                    <button class="btn btn--white">Сохранить</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</view>

<edit header="ЛК Админа - главная">
    <div>
        <wb-module wb="module=yonger&mode=edit&block=common.inc" />
    </div>
</edit>