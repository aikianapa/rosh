<!DOCTYPE html>
<html class="no-js" lang="ru">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <title seo>Личный кабинет</title>
    <meta name="description" content="Личный кабинет">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/common.css">
    <link rel="stylesheet" href="/assets/css/new.css">
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAT3JOvpJuMXozLKY-hPfjCDdEgo78vZok"></script>
    <script src="/assets/js/jquery-1.12.4.min.js"></script>
    <script src="/assets/js/jquery.autocomplete.min.js"></script>
    <script src="/assets/js/air-datepicker.js"></script>
    <script src="/assets/js/jquery.inputmask.min.js"></script>
    <script src="/assets/js/swiper-bundle.min.js"></script>
    <script src="/assets/js/main.js"></script>
    <script src="/assets/js/new.js"></script>
</head>

<body class="body" data-barba="wrapper">
    <div class="scroll-container" data-scroll-container>
        <main class="page" data-barba="container" data-barba-namespace="lk-expert">
            <header class="header header--transparent --unfilter">
                <div class="container --flex --jcsb --aicn"><a class="header__logo" href="index.html"> <img
                            src="./assets/img/logo.svg" alt=""></a>
                    <div class="header__left --flex --aicn">
                        <div class="header__contacts"> <a class="header__contact" href="tel:+74951320169"> 8 (495)
                                <b>132-01-69</b></a>
                            <div class="header__contact header__contact--small">Пн-Сб, с <b>10:00</b> до <b>21:00</b>
                            </div>
                        </div>
                    </div>
                    <div class="header__right --flex --aicn">
                        <button class="btn btn-link enter profile-menu">
                            Профиль
                            <svg class="svgsprite _drop">
                                <use xlink:href="assets/img/sprites/svgsprites.svg#drop"></use>
                            </svg>
                            <div class="enter__panel">
                                <a href="/signout" class="enter__btn text-small">Выйти</a>
                            </div>
                        </button>

                        <button class="burger"></button>
                    </div>
                </div>
            </header>


            <div class="menu" id="mainmenu">
                <nav class="nav">
                    <div class="nav__link"><a href="all-services.html">Услуги</a></div>
                    <div class="nav__link"><a href="all-problems.html">Проблемы</a></div>
                    <div class="nav__link"><a href="shop.html">Магазин</a></div>
                    <div class="nav__link"><a href="blog.html">Блог</a></div>
                    <div class="nav__link"><a href="l-n-d.html">Libi & Daughters</a></div>
                    <div class="nav__link ddl"><a href="about.html">О клинике</a> <svg class="svgsprite _drop">
                            <use xlink:href="assets/img/sprites/svgsprites.svg#drop"></use>
                        </svg></div>
                    <div class="nav__group ddm">
                        <div class="nav__link-inner"><a href="about.html">О клинике</a></div>
                        <div class="nav__link-inner"><a href="equipment.html">Оборудование</a></div>
                        <div class="nav__link-inner"><a href="gallery.html">Галерея</a></div>
                        <div class="nav__link-inner"><a href="experts.html">Специалисты</a></div>
                    </div>
                    <div class="nav__link"><a href="contacts.html">Контакты</a></div>
                </nav>
                <div class="mobile-btns">
                    <!-- button class="btn btn--white --openfilter mb-10">Подобрать услугу</button -->
                    <div class="--flex">
                        <button class="btn btn-link --openpopup pl-0" data-popup="--fast">Записаться на прием</button>
                        <button class="btn btn-link enter --openpopup" data-popup="--enter-number">Войти</button>
                    </div>
                </div>

                <div class="socials socials-menu"><a class="socials__link" href="#"><svg class="svgsprite _socials-1">
                            <use xlink:href="assets/img/sprites/svgsprites.svg#socials-1"></use>
                        </svg></a><a class="socials__link" href="#"><svg class="svgsprite _socials-2">
                            <use xlink:href="assets/img/sprites/svgsprites.svg#socials-2"></use>
                        </svg></a><a class="socials__link" href="#"><svg class="svgsprite _socials-3">
                            <use xlink:href="assets/img/sprites/svgsprites.svg#socials-3"></use>
                        </svg></a><a class="socials__link" href="#"><svg class="svgsprite _socials-4">
                            <use xlink:href="assets/img/sprites/svgsprites.svg#socials-4"></use>
                        </svg></a></div>

                <div class="menu__contacts"> <a class="text-small text-grey" href="contacts.html"> г. Москва, Ростовская
                        набережная д. 5, пом. 9</a><a class="text-small text-grey" href="mailto:info@medcenterrosh.ru">
                        info@medcenterrosh.ru</a></div><a class="en-version" href="en-version.html">
                    <svg class="svgsprite _web">
                        <use xlink:href="assets/img/sprites/svgsprites.svg#web"></use>
                    </svg>English version
                    <svg class="svgsprite _arrow-link">
                        <use xlink:href="assets/img/sprites/svgsprites.svg#arrow-link"></use>
                    </svg></a>

            </div>
            <div class="account">
                <form class="search">
                    <div class="container">
                        <div class="crumbs"><a class="crumbs__arrow" href="#">
                                <svg class="svgsprite _crumbs-back">
                                    <use xlink:href="assets/img/sprites/svgsprites.svg#crumbs-back"></use>
                                </svg></a><a class="crumbs__link" href="#">Главная</a><a class="crumbs__link"
                                href="#">Кабинет специалиста</a>
                        </div>
                        <h1 class="h1 mb-40">Кабинет специалиста</h1>
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
                                    <div class="user__name">Чачанидзе Елена Элгуджаевна
                                        <button class="user__edit">
                                            <svg class="svgsprite _edit">
                                                <use xlink:href="assets/img/sprites/svgsprites.svg#edit"></use>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="user__group --noflex">
                                        <div class="user__item">Образование: <span>25.10.2000, г. Москва, МГУ</span>
                                        </div>
                                        <div class="user__item">Лицензия: <span>№124124957:</span></div>
                                    </div>
                                </div>
                                <div class="user__panel user__panel--border">
                                    <div class="user__item">Врач дерматовенеролог, кандидат медицинских наук. </div>
                                    <div class="user__notifcation">
                                        <svg class="svgsprite _notification">
                                            <use xlink:href="assets/img/sprites/svgsprites.svg#notification"></use>
                                        </svg>Ближайшая запись: 28.10.2021, 08:30 – 9:00
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="account__exit">Выйти из аккаунта</div>
                        <form class="profile-edit" on-submit="profileSave">
                            {{#user}}
                            <div class="profile-edit__block">
                                <div class="lk-title">Редактировать профиль</div>
                                <div class="row profile-edit__wrap">
                                    <div class="col-md-3">
                                        <div class="input input--grey">
                                            <input class="input__control datebirthdaypickr" type="text"
                                                placeholder="Дата рождения">
                                            <div class="input__placeholder">Дата рождения</div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="input input--grey">
                                            <input class="input__control" type="tel" placeholder="Телефон"
                                                data-inputmask="'mask': '+7 (999) 999-99-99'">
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
                                        <div class="profile-licenses__inputs repeater-container"
                                            data-repeater="license">
                                            <div class="profile-licenses__input input input--grey">
                                                <input class="input__control" type="text"
                                                    placeholder="Добавьте лицензию" value="165335789">
                                                <div class="input__placeholder">Добавьте лицензию</div>
                                            </div>
                                            <div class="profile-licenses__input input input--grey repeater-item">
                                                <input class="input__control" type="text"
                                                    placeholder="Добавьте лицензию">
                                                <div class="input__placeholder">Добавьте лицензию</div>
                                                <a class="profile-licenses__delete repeater-delete" href="#">
                                                    <svg class="svgsprite _delete-black">
                                                        <use
                                                            xlink:href="assets/img/sprites/svgsprites.svg#delete-black">
                                                        </use>
                                                    </svg>
                                                </a>
                                            </div>
                                            <div class="profile-licenses__input input input--grey repeater-item">
                                                <input class="input__control" type="text"
                                                    placeholder="Добавьте лицензию">
                                                <div class="input__placeholder">Добавьте лицензию</div>
                                                <a class="profile-licenses__delete repeater-delete" href="#">
                                                    <svg class="svgsprite _delete-black">
                                                        <use
                                                            xlink:href="assets/img/sprites/svgsprites.svg#delete-black">
                                                        </use>
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 --flex">
                                        <a class="btn btn--black add-license repeater-add" href="#"
                                            data-repeater="license">Добавить лицензию</a>
                                        <div class="profile-licenses__input input input--grey repeater-sample"
                                            data-repeater="license">
                                            <input class="input__control" type="text" placeholder="Добавьте лицензию">
                                            <div class="input__placeholder">Добавьте лицензию</div>
                                            <a class="profile-licenses__delete repeater-delete" href="#">
                                                <svg class="svgsprite _delete-black">
                                                    <use xlink:href="assets/img/sprites/svgsprites.svg#delete-black">
                                                    </use>
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
                                                <input class="input__control" type="text"
                                                    placeholder="Название учебного заведения"
                                                    value="Институт усовершенствования врачей">
                                                <div class="input__placeholder">Название учебного заведения</div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="profile-education__inputs">
                                                <div class="profile-education__input">
                                                    <div class="input input-lk-calendar input--grey">
                                                        <input class="input__control datepickr" type="text"
                                                            placeholder="Начало обучения" value="2007-06-22">
                                                        <div class="input__placeholder">Начало обучения</div>
                                                    </div>
                                                </div>
                                                <div class="profile-education__input">
                                                    <div class="input input-lk-calendar input--grey">
                                                        <input class="input__control datepickr" type="text"
                                                            placeholder="Окончание обучения" value="2012-06-12">
                                                        <div class="input__placeholder">Окончание обучения</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="profile-education__inner row repeater-item">
                                        <div class="col-md-6">
                                            <div class="input input--grey">
                                                <input class="input__control" type="text"
                                                    placeholder="Название учебного заведения">
                                                <div class="input__placeholder">Название учебного учреждения</div>
                                                <div class="education__delete repeater-delete">
                                                    <svg class="svgsprite _delete-black">
                                                        <use
                                                            xlink:href="assets/img/sprites/svgsprites.svg#delete-black">
                                                        </use>
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="profile-education__inputs">
                                                <div class="profile-education__input">
                                                    <div class="input input-lk-calendar input--grey">
                                                        <input class="input__control datepickr" type="text"
                                                            placeholder="Начало обучения">
                                                        <div class="input__placeholder">Начало обучения</div>
                                                    </div>
                                                </div>
                                                <div class="profile-education__input">
                                                    <div class="input input-lk-calendar input--grey">
                                                        <input class="input__control datepickr" type="text"
                                                            placeholder="Окончание обучения">
                                                        <div class="input__placeholder">Окончание обучения</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="profile-education__inner row">
                                    <div class="col-md-6 --flex">
                                        <a class="btn btn--black add-education repeater-add" href="#"
                                            data-repeater="study">Добавить обучение</a>
                                        <div class="profile-education__inner row repeater-sample" data-repeater="study">
                                            <div class="col-md-6">
                                                <div class="input input--grey">
                                                    <input class="input__control" type="text"
                                                        placeholder="Название учебного заведения">
                                                    <div class="input__placeholder">Название учебного учреждения</div>
                                                    <div class="education__delete repeater-delete">
                                                        <svg class="svgsprite _delete-black">
                                                            <use
                                                                xlink:href="assets/img/sprites/svgsprites.svg#delete-black">
                                                            </use>
                                                        </svg>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="profile-education__inputs">
                                                    <div class="profile-education__input">
                                                        <div class="input input-lk-calendar input--grey">
                                                            <input class="input__control datepickr" type="text"
                                                                placeholder="Начало обучения">
                                                            <div class="input__placeholder">Начало обучения</div>
                                                        </div>
                                                    </div>
                                                    <div class="profile-education__input">
                                                        <div class="input input-lk-calendar input--grey">
                                                            <input class="input__control datepickr" type="text"
                                                                placeholder="Окончание обучения">
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
                            {{/user}}
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
                                            <use xlink:href="assets/img/sprites/svgsprites.svg#edit"></use>
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
                                                    <use xlink:href="assets/img/sprites/svgsprites.svg#edit"></use>
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
                                                    <use xlink:href="assets/img/sprites/svgsprites.svg#edit"></use>
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
            <div class="footer">
                <div class="container">
                    <div class="container-fluid">
                        <div class="row footer__top">
                            <div class="footer__item col-lg-2">
                                <div class="socials"><a class="socials__link" href="#"><svg
                                            class="svgsprite _socials-1">
                                            <use xlink:href="assets/img/sprites/svgsprites.svg#socials-1"></use>
                                        </svg></a><a class="socials__link" href="#"><svg class="svgsprite _socials-2">
                                            <use xlink:href="assets/img/sprites/svgsprites.svg#socials-2"></use>
                                        </svg></a><a class="socials__link" href="#"><svg class="svgsprite _socials-3">
                                            <use xlink:href="assets/img/sprites/svgsprites.svg#socials-3"></use>
                                        </svg></a></div>
                            </div>
                            <div class="footer__item col-lg-3"><a class="footer__contact text-small text-grey"
                                    href="mailto:info@medcenterrosh.ru">info@medcenterrosh.ru</a></div>
                            <div class="footer__item col-lg-7"><a class="footer__contact text-small text-grey"
                                    href="contacts.html"> г. Москва, Ростовская набережная д. 5, пом. 9</a></div>
                        </div>
                        <div class="row footer__bottom">
                            <div class="footer__item col-lg-2"><a class="text-small" href="index.html"> © ROSH, 2021</a>
                            </div>
                            <div class="footer__item col-lg-3"><a class="text-small policy" href="policy.html"> Политика
                                    конфиденциальности</a></div>
                            <div class="footer__item col-lg-7 --flex --jcsb"><a class="text-small map-site"
                                    href="site-map.html">Карта сайта</a>
                                <p class="text-small">Лицензия №ЛО-77-01-002172 от 12.01.2010</p><a class="develop"
                                    href="http://idees.ru/">
                                    <svg class="svgsprite _develop">
                                        <use xlink:href="assets/img/sprites/svgsprites.svg#develop"></use>
                                    </svg></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mainfilter" id="mainfilter">
                <div class="mainfilter__close --closefilter">
                    <svg class="svgsprite _close">
                        <use xlink:href="assets/img/sprites/svgsprites.svg#close"></use>
                    </svg>
                </div>
                <div class="mainfilter__wrap row">
                    <div class="col-lg-9 col-md-8">
                        <div class="mainfilter__left">
                            <div class="mainfilter__tab-list">
                                <div class="mainfilter__tab-item data-tab-link active" data-tab="services"
                                    data-tabs="mainfilter">Услуги</div>
                                <div class="mainfilter__tab-item data-tab-link" data-tab="problems"
                                    data-tabs="mainfilter">Проблемы</div>
                                <div class="mainfilter__tab-item data-tab-link" data-tab="sympthoms"
                                    data-tabs="mainfilter">Симптомы</div>
                            </div>
                            <div class="mainfilter__tabs data-tab-wrapper" data-tabs="mainfilter">
                                <div class="mainfilter__tab data-tab-item active" data-tab="services">
                                    <div class="accardeon">
                                        <div class="accardeon__main accardeon__click">
                                            <div class="accardeon__name --yellow">Лицо</div>
                                        </div>
                                        <div class="accardeon__list">
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <label class="checkbox mainfilter__checkbox">
                                                        <input type="checkbox"><span> </span>
                                                        <div class="checbox__name">Консультация врача</div><a
                                                            class="checbox__link --openpopup" data-popup="--service-l"
                                                            href="#">Подробнее</a>
                                                    </label>

                                                    <label class="checkbox mainfilter__checkbox">
                                                        <input type="checkbox"><span> </span>
                                                        <div class="checbox__name">Консультация врача</div><a
                                                            class="checbox__link --openpopup" data-popup="--service-l"
                                                            href="#">Подробнее</a>
                                                    </label>

                                                    <label class="checkbox mainfilter__checkbox">
                                                        <input type="checkbox"><span> </span>
                                                        <div class="checbox__name">Консультация врача</div><a
                                                            class="checbox__link --openpopup" data-popup="--service-l"
                                                            href="#">Подробнее</a>
                                                    </label>

                                                    <label class="checkbox mainfilter__checkbox">
                                                        <input type="checkbox"><span> </span>
                                                        <div class="checbox__name">Консультация врача</div><a
                                                            class="checbox__link --openpopup" data-popup="--service-l"
                                                            href="#">Подробнее</a>
                                                    </label>

                                                </div>
                                                <div class="col-lg-4">
                                                    <label class="checkbox mainfilter__checkbox">
                                                        <input type="checkbox"><span> </span>
                                                        <div class="checbox__name">Консультация врача</div><a
                                                            class="checbox__link --openpopup" data-popup="--service-l"
                                                            href="#">Подробнее</a>
                                                    </label>

                                                    <label class="checkbox mainfilter__checkbox">
                                                        <input type="checkbox"><span> </span>
                                                        <div class="checbox__name">Консультация врача</div><a
                                                            class="checbox__link --openpopup" data-popup="--service-l"
                                                            href="#">Подробнее</a>
                                                    </label>

                                                    <label class="checkbox mainfilter__checkbox">
                                                        <input type="checkbox"><span> </span>
                                                        <div class="checbox__name">Консультация врача</div><a
                                                            class="checbox__link --openpopup" data-popup="--service-l"
                                                            href="#">Подробнее</a>
                                                    </label>

                                                    <label class="checkbox mainfilter__checkbox">
                                                        <input type="checkbox"><span> </span>
                                                        <div class="checbox__name">Консультация врача</div><a
                                                            class="checbox__link --openpopup" data-popup="--service-l"
                                                            href="#">Подробнее</a>
                                                    </label>

                                                </div>
                                                <div class="col-lg-4">
                                                    <label class="checkbox mainfilter__checkbox">
                                                        <input type="checkbox"><span> </span>
                                                        <div class="checbox__name">Консультация врача</div><a
                                                            class="checbox__link --openpopup" data-popup="--service-l"
                                                            href="#">Подробнее</a>
                                                    </label>

                                                    <label class="checkbox mainfilter__checkbox">
                                                        <input type="checkbox"><span> </span>
                                                        <div class="checbox__name">Консультация врача</div><a
                                                            class="checbox__link --openpopup" data-popup="--service-l"
                                                            href="#">Подробнее</a>
                                                    </label>

                                                    <label class="checkbox mainfilter__checkbox">
                                                        <input type="checkbox"><span> </span>
                                                        <div class="checbox__name">Консультация врача</div><a
                                                            class="checbox__link --openpopup" data-popup="--service-l"
                                                            href="#">Подробнее</a>
                                                    </label>

                                                    <label class="checkbox mainfilter__checkbox">
                                                        <input type="checkbox"><span> </span>
                                                        <div class="checbox__name">Консультация врача</div><a
                                                            class="checbox__link --openpopup" data-popup="--service-l"
                                                            href="#">Подробнее</a>
                                                    </label>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accardeon">
                                        <div class="accardeon__main accardeon__click">
                                            <div class="accardeon__name --green">Тело</div>
                                        </div>
                                        <div class="accardeon__list">
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <label class="checkbox mainfilter__checkbox">
                                                        <input type="checkbox"><span> </span>
                                                        <div class="checbox__name">Консультация врача</div><a
                                                            class="checbox__link --openpopup" data-popup="--service-l"
                                                            href="#">Подробнее</a>
                                                    </label>

                                                    <label class="checkbox mainfilter__checkbox">
                                                        <input type="checkbox"><span> </span>
                                                        <div class="checbox__name">Консультация врача</div><a
                                                            class="checbox__link --openpopup" data-popup="--service-l"
                                                            href="#">Подробнее</a>
                                                    </label>

                                                    <label class="checkbox mainfilter__checkbox">
                                                        <input type="checkbox"><span> </span>
                                                        <div class="checbox__name">Консультация врача</div><a
                                                            class="checbox__link --openpopup" data-popup="--service-l"
                                                            href="#">Подробнее</a>
                                                    </label>

                                                    <label class="checkbox mainfilter__checkbox">
                                                        <input type="checkbox"><span> </span>
                                                        <div class="checbox__name">Консультация врача</div><a
                                                            class="checbox__link --openpopup" data-popup="--service-l"
                                                            href="#">Подробнее</a>
                                                    </label>

                                                </div>
                                                <div class="col-lg-4">
                                                    <label class="checkbox mainfilter__checkbox">
                                                        <input type="checkbox"><span> </span>
                                                        <div class="checbox__name">Консультация врача</div><a
                                                            class="checbox__link --openpopup" data-popup="--service-l"
                                                            href="#">Подробнее</a>
                                                    </label>

                                                    <label class="checkbox mainfilter__checkbox">
                                                        <input type="checkbox"><span> </span>
                                                        <div class="checbox__name">Консультация врача</div><a
                                                            class="checbox__link --openpopup" data-popup="--service-l"
                                                            href="#">Подробнее</a>
                                                    </label>

                                                    <label class="checkbox mainfilter__checkbox">
                                                        <input type="checkbox"><span> </span>
                                                        <div class="checbox__name">Консультация врача</div><a
                                                            class="checbox__link --openpopup" data-popup="--service-l"
                                                            href="#">Подробнее</a>
                                                    </label>

                                                    <label class="checkbox mainfilter__checkbox">
                                                        <input type="checkbox"><span> </span>
                                                        <div class="checbox__name">Консультация врача</div><a
                                                            class="checbox__link --openpopup" data-popup="--service-l"
                                                            href="#">Подробнее</a>
                                                    </label>

                                                </div>
                                                <div class="col-lg-4">
                                                    <label class="checkbox mainfilter__checkbox">
                                                        <input type="checkbox"><span> </span>
                                                        <div class="checbox__name">Консультация врача</div><a
                                                            class="checbox__link --openpopup" data-popup="--service-l"
                                                            href="#">Подробнее</a>
                                                    </label>

                                                    <label class="checkbox mainfilter__checkbox">
                                                        <input type="checkbox"><span> </span>
                                                        <div class="checbox__name">Консультация врача</div><a
                                                            class="checbox__link --openpopup" data-popup="--service-l"
                                                            href="#">Подробнее</a>
                                                    </label>

                                                    <label class="checkbox mainfilter__checkbox">
                                                        <input type="checkbox"><span> </span>
                                                        <div class="checbox__name">Консультация врача</div><a
                                                            class="checbox__link --openpopup" data-popup="--service-l"
                                                            href="#">Подробнее</a>
                                                    </label>

                                                    <label class="checkbox mainfilter__checkbox">
                                                        <input type="checkbox"><span> </span>
                                                        <div class="checbox__name">Консультация врача</div><a
                                                            class="checbox__link --openpopup" data-popup="--service-l"
                                                            href="#">Подробнее</a>
                                                    </label>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accardeon">
                                        <div class="accardeon__main accardeon__click">
                                            <div class="accardeon__name --red">Волосы</div>
                                        </div>
                                        <div class="accardeon__list">
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <label class="checkbox mainfilter__checkbox">
                                                        <input type="checkbox"><span> </span>
                                                        <div class="checbox__name">Консультация врача</div><a
                                                            class="checbox__link --openpopup" data-popup="--service-l"
                                                            href="#">Подробнее</a>
                                                    </label>

                                                    <label class="checkbox mainfilter__checkbox">
                                                        <input type="checkbox"><span> </span>
                                                        <div class="checbox__name">Консультация врача</div><a
                                                            class="checbox__link --openpopup" data-popup="--service-l"
                                                            href="#">Подробнее</a>
                                                    </label>

                                                    <label class="checkbox mainfilter__checkbox">
                                                        <input type="checkbox"><span> </span>
                                                        <div class="checbox__name">Консультация врача</div><a
                                                            class="checbox__link --openpopup" data-popup="--service-l"
                                                            href="#">Подробнее</a>
                                                    </label>

                                                    <label class="checkbox mainfilter__checkbox">
                                                        <input type="checkbox"><span> </span>
                                                        <div class="checbox__name">Консультация врача</div><a
                                                            class="checbox__link --openpopup" data-popup="--service-l"
                                                            href="#">Подробнее</a>
                                                    </label>

                                                </div>
                                                <div class="col-lg-4">
                                                    <label class="checkbox mainfilter__checkbox">
                                                        <input type="checkbox"><span> </span>
                                                        <div class="checbox__name">Консультация врача</div><a
                                                            class="checbox__link --openpopup" data-popup="--service-l"
                                                            href="#">Подробнее</a>
                                                    </label>

                                                    <label class="checkbox mainfilter__checkbox">
                                                        <input type="checkbox"><span> </span>
                                                        <div class="checbox__name">Консультация врача</div><a
                                                            class="checbox__link --openpopup" data-popup="--service-l"
                                                            href="#">Подробнее</a>
                                                    </label>

                                                    <label class="checkbox mainfilter__checkbox">
                                                        <input type="checkbox"><span> </span>
                                                        <div class="checbox__name">Консультация врача</div><a
                                                            class="checbox__link --openpopup" data-popup="--service-l"
                                                            href="#">Подробнее</a>
                                                    </label>

                                                    <label class="checkbox mainfilter__checkbox">
                                                        <input type="checkbox"><span> </span>
                                                        <div class="checbox__name">Консультация врача</div><a
                                                            class="checbox__link --openpopup" data-popup="--service-l"
                                                            href="#">Подробнее</a>
                                                    </label>

                                                </div>
                                                <div class="col-lg-4">
                                                    <label class="checkbox mainfilter__checkbox">
                                                        <input type="checkbox"><span> </span>
                                                        <div class="checbox__name">Консультация врача</div><a
                                                            class="checbox__link --openpopup" data-popup="--service-l"
                                                            href="#">Подробнее</a>
                                                    </label>

                                                    <label class="checkbox mainfilter__checkbox">
                                                        <input type="checkbox"><span> </span>
                                                        <div class="checbox__name">Консультация врача</div><a
                                                            class="checbox__link --openpopup" data-popup="--service-l"
                                                            href="#">Подробнее</a>
                                                    </label>

                                                    <label class="checkbox mainfilter__checkbox">
                                                        <input type="checkbox"><span> </span>
                                                        <div class="checbox__name">Консультация врача</div><a
                                                            class="checbox__link --openpopup" data-popup="--service-l"
                                                            href="#">Подробнее</a>
                                                    </label>

                                                    <label class="checkbox mainfilter__checkbox">
                                                        <input type="checkbox"><span> </span>
                                                        <div class="checbox__name">Консультация врача</div><a
                                                            class="checbox__link --openpopup" data-popup="--service-l"
                                                            href="#">Подробнее</a>
                                                    </label>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accardeon">
                                        <div class="accardeon__main accardeon__click">
                                            <div class="accardeon__name --blue">Гинекология</div>
                                        </div>
                                        <div class="accardeon__list">
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <label class="checkbox mainfilter__checkbox">
                                                        <input type="checkbox"><span> </span>
                                                        <div class="checbox__name">Консультация врача</div><a
                                                            class="checbox__link --openpopup" data-popup="--service-l"
                                                            href="#">Подробнее</a>
                                                    </label>

                                                    <label class="checkbox mainfilter__checkbox">
                                                        <input type="checkbox"><span> </span>
                                                        <div class="checbox__name">Консультация врача</div><a
                                                            class="checbox__link --openpopup" data-popup="--service-l"
                                                            href="#">Подробнее</a>
                                                    </label>

                                                    <label class="checkbox mainfilter__checkbox">
                                                        <input type="checkbox"><span> </span>
                                                        <div class="checbox__name">Консультация врача</div><a
                                                            class="checbox__link --openpopup" data-popup="--service-l"
                                                            href="#">Подробнее</a>
                                                    </label>

                                                    <label class="checkbox mainfilter__checkbox">
                                                        <input type="checkbox"><span> </span>
                                                        <div class="checbox__name">Консультация врача</div><a
                                                            class="checbox__link --openpopup" data-popup="--service-l"
                                                            href="#">Подробнее</a>
                                                    </label>

                                                </div>
                                                <div class="col-lg-4">
                                                    <label class="checkbox mainfilter__checkbox">
                                                        <input type="checkbox"><span> </span>
                                                        <div class="checbox__name">Консультация врача</div><a
                                                            class="checbox__link --openpopup" data-popup="--service-l"
                                                            href="#">Подробнее</a>
                                                    </label>

                                                    <label class="checkbox mainfilter__checkbox">
                                                        <input type="checkbox"><span> </span>
                                                        <div class="checbox__name">Консультация врача</div><a
                                                            class="checbox__link --openpopup" data-popup="--service-l"
                                                            href="#">Подробнее</a>
                                                    </label>

                                                    <label class="checkbox mainfilter__checkbox">
                                                        <input type="checkbox"><span> </span>
                                                        <div class="checbox__name">Консультация врача</div><a
                                                            class="checbox__link --openpopup" data-popup="--service-l"
                                                            href="#">Подробнее</a>
                                                    </label>

                                                    <label class="checkbox mainfilter__checkbox">
                                                        <input type="checkbox"><span> </span>
                                                        <div class="checbox__name">Консультация врача</div><a
                                                            class="checbox__link --openpopup" data-popup="--service-l"
                                                            href="#">Подробнее</a>
                                                    </label>

                                                </div>
                                                <div class="col-lg-4">
                                                    <label class="checkbox mainfilter__checkbox">
                                                        <input type="checkbox"><span> </span>
                                                        <div class="checbox__name">Консультация врача</div><a
                                                            class="checbox__link --openpopup" data-popup="--service-l"
                                                            href="#">Подробнее</a>
                                                    </label>

                                                    <label class="checkbox mainfilter__checkbox">
                                                        <input type="checkbox"><span> </span>
                                                        <div class="checbox__name">Консультация врача</div><a
                                                            class="checbox__link --openpopup" data-popup="--service-l"
                                                            href="#">Подробнее</a>
                                                    </label>

                                                    <label class="checkbox mainfilter__checkbox">
                                                        <input type="checkbox"><span> </span>
                                                        <div class="checbox__name">Консультация врача</div><a
                                                            class="checbox__link --openpopup" data-popup="--service-l"
                                                            href="#">Подробнее</a>
                                                    </label>

                                                    <label class="checkbox mainfilter__checkbox">
                                                        <input type="checkbox"><span> </span>
                                                        <div class="checbox__name">Консультация врача</div><a
                                                            class="checbox__link --openpopup" data-popup="--service-l"
                                                            href="#">Подробнее</a>
                                                    </label>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accardeon">
                                        <div class="accardeon__main accardeon__click">
                                            <div class="accardeon__name --purple">Лаборатория</div>
                                        </div>
                                        <div class="accardeon__list">
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <label class="checkbox mainfilter__checkbox">
                                                        <input type="checkbox"><span> </span>
                                                        <div class="checbox__name">Консультация врача</div><a
                                                            class="checbox__link --openpopup" data-popup="--service-l"
                                                            href="#">Подробнее</a>
                                                    </label>

                                                    <label class="checkbox mainfilter__checkbox">
                                                        <input type="checkbox"><span> </span>
                                                        <div class="checbox__name">Консультация врача</div><a
                                                            class="checbox__link --openpopup" data-popup="--service-l"
                                                            href="#">Подробнее</a>
                                                    </label>

                                                    <label class="checkbox mainfilter__checkbox">
                                                        <input type="checkbox"><span> </span>
                                                        <div class="checbox__name">Консультация врача</div><a
                                                            class="checbox__link --openpopup" data-popup="--service-l"
                                                            href="#">Подробнее</a>
                                                    </label>

                                                    <label class="checkbox mainfilter__checkbox">
                                                        <input type="checkbox"><span> </span>
                                                        <div class="checbox__name">Консультация врача</div><a
                                                            class="checbox__link --openpopup" data-popup="--service-l"
                                                            href="#">Подробнее</a>
                                                    </label>

                                                </div>
                                                <div class="col-lg-4">
                                                    <label class="checkbox mainfilter__checkbox">
                                                        <input type="checkbox"><span> </span>
                                                        <div class="checbox__name">Консультация врача</div><a
                                                            class="checbox__link --openpopup" data-popup="--service-l"
                                                            href="#">Подробнее</a>
                                                    </label>

                                                    <label class="checkbox mainfilter__checkbox">
                                                        <input type="checkbox"><span> </span>
                                                        <div class="checbox__name">Консультация врача</div><a
                                                            class="checbox__link --openpopup" data-popup="--service-l"
                                                            href="#">Подробнее</a>
                                                    </label>

                                                    <label class="checkbox mainfilter__checkbox">
                                                        <input type="checkbox"><span> </span>
                                                        <div class="checbox__name">Консультация врача</div><a
                                                            class="checbox__link --openpopup" data-popup="--service-l"
                                                            href="#">Подробнее</a>
                                                    </label>

                                                    <label class="checkbox mainfilter__checkbox">
                                                        <input type="checkbox"><span> </span>
                                                        <div class="checbox__name">Консультация врача</div><a
                                                            class="checbox__link --openpopup" data-popup="--service-l"
                                                            href="#">Подробнее</a>
                                                    </label>

                                                </div>
                                                <div class="col-lg-4">
                                                    <label class="checkbox mainfilter__checkbox">
                                                        <input type="checkbox"><span> </span>
                                                        <div class="checbox__name">Консультация врача</div><a
                                                            class="checbox__link --openpopup" data-popup="--service-l"
                                                            href="#">Подробнее</a>
                                                    </label>

                                                    <label class="checkbox mainfilter__checkbox">
                                                        <input type="checkbox"><span> </span>
                                                        <div class="checbox__name">Консультация врача</div><a
                                                            class="checbox__link --openpopup" data-popup="--service-l"
                                                            href="#">Подробнее</a>
                                                    </label>

                                                    <label class="checkbox mainfilter__checkbox">
                                                        <input type="checkbox"><span> </span>
                                                        <div class="checbox__name">Консультация врача</div><a
                                                            class="checbox__link --openpopup" data-popup="--service-l"
                                                            href="#">Подробнее</a>
                                                    </label>

                                                    <label class="checkbox mainfilter__checkbox">
                                                        <input type="checkbox"><span> </span>
                                                        <div class="checbox__name">Консультация врача</div><a
                                                            class="checbox__link --openpopup" data-popup="--service-l"
                                                            href="#">Подробнее</a>
                                                    </label>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="mainfilter__tab data-tab-item" data-tab="problems">
                                    <div class="accardeon-group">
                                        <div class="accrdeon__title">Дерматовенерология</div>
                                        <div class="accardeon">
                                            <div class="accardeon__main accardeon__click">
                                                <div class="accardeon__name --yellow">Лицо</div>
                                            </div>
                                            <div class="accardeon__list">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <label class="checkbox mainfilter__checkbox">
                                                            <input type="checkbox"><span> </span>
                                                            <div class="checbox__name">Консультация врача</div><a
                                                                class="checbox__link --openpopup"
                                                                data-popup="--service-l" href="#">Подробнее</a>
                                                        </label>

                                                        <label class="checkbox mainfilter__checkbox">
                                                            <input type="checkbox"><span> </span>
                                                            <div class="checbox__name">Консультация врача</div><a
                                                                class="checbox__link --openpopup"
                                                                data-popup="--service-l" href="#">Подробнее</a>
                                                        </label>

                                                        <label class="checkbox mainfilter__checkbox">
                                                            <input type="checkbox"><span> </span>
                                                            <div class="checbox__name">Консультация врача</div><a
                                                                class="checbox__link --openpopup"
                                                                data-popup="--service-l" href="#">Подробнее</a>
                                                        </label>

                                                        <label class="checkbox mainfilter__checkbox">
                                                            <input type="checkbox"><span> </span>
                                                            <div class="checbox__name">Консультация врача</div><a
                                                                class="checbox__link --openpopup"
                                                                data-popup="--service-l" href="#">Подробнее</a>
                                                        </label>

                                                    </div>
                                                    <div class="col-lg-4">
                                                        <label class="checkbox mainfilter__checkbox">
                                                            <input type="checkbox"><span> </span>
                                                            <div class="checbox__name">Консультация врача</div><a
                                                                class="checbox__link --openpopup"
                                                                data-popup="--service-l" href="#">Подробнее</a>
                                                        </label>

                                                        <label class="checkbox mainfilter__checkbox">
                                                            <input type="checkbox"><span> </span>
                                                            <div class="checbox__name">Консультация врача</div><a
                                                                class="checbox__link --openpopup"
                                                                data-popup="--service-l" href="#">Подробнее</a>
                                                        </label>

                                                        <label class="checkbox mainfilter__checkbox">
                                                            <input type="checkbox"><span> </span>
                                                            <div class="checbox__name">Консультация врача</div><a
                                                                class="checbox__link --openpopup"
                                                                data-popup="--service-l" href="#">Подробнее</a>
                                                        </label>

                                                        <label class="checkbox mainfilter__checkbox">
                                                            <input type="checkbox"><span> </span>
                                                            <div class="checbox__name">Консультация врача</div><a
                                                                class="checbox__link --openpopup"
                                                                data-popup="--service-l" href="#">Подробнее</a>
                                                        </label>

                                                    </div>
                                                    <div class="col-lg-4">
                                                        <label class="checkbox mainfilter__checkbox">
                                                            <input type="checkbox"><span> </span>
                                                            <div class="checbox__name">Консультация врача</div><a
                                                                class="checbox__link --openpopup"
                                                                data-popup="--service-l" href="#">Подробнее</a>
                                                        </label>

                                                        <label class="checkbox mainfilter__checkbox">
                                                            <input type="checkbox"><span> </span>
                                                            <div class="checbox__name">Консультация врача</div><a
                                                                class="checbox__link --openpopup"
                                                                data-popup="--service-l" href="#">Подробнее</a>
                                                        </label>

                                                        <label class="checkbox mainfilter__checkbox">
                                                            <input type="checkbox"><span> </span>
                                                            <div class="checbox__name">Консультация врача</div><a
                                                                class="checbox__link --openpopup"
                                                                data-popup="--service-l" href="#">Подробнее</a>
                                                        </label>

                                                        <label class="checkbox mainfilter__checkbox">
                                                            <input type="checkbox"><span> </span>
                                                            <div class="checbox__name">Консультация врача</div><a
                                                                class="checbox__link --openpopup"
                                                                data-popup="--service-l" href="#">Подробнее</a>
                                                        </label>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="accardeon">
                                            <div class="accardeon__main accardeon__click">
                                                <div class="accardeon__name --green">Тело</div>
                                            </div>
                                            <div class="accardeon__list">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <label class="checkbox mainfilter__checkbox">
                                                            <input type="checkbox"><span> </span>
                                                            <div class="checbox__name">Консультация врача</div><a
                                                                class="checbox__link --openpopup"
                                                                data-popup="--service-l" href="#">Подробнее</a>
                                                        </label>

                                                        <label class="checkbox mainfilter__checkbox">
                                                            <input type="checkbox"><span> </span>
                                                            <div class="checbox__name">Консультация врача</div><a
                                                                class="checbox__link --openpopup"
                                                                data-popup="--service-l" href="#">Подробнее</a>
                                                        </label>

                                                        <label class="checkbox mainfilter__checkbox">
                                                            <input type="checkbox"><span> </span>
                                                            <div class="checbox__name">Консультация врача</div><a
                                                                class="checbox__link --openpopup"
                                                                data-popup="--service-l" href="#">Подробнее</a>
                                                        </label>

                                                        <label class="checkbox mainfilter__checkbox">
                                                            <input type="checkbox"><span> </span>
                                                            <div class="checbox__name">Консультация врача</div><a
                                                                class="checbox__link --openpopup"
                                                                data-popup="--service-l" href="#">Подробнее</a>
                                                        </label>

                                                    </div>
                                                    <div class="col-lg-4">
                                                        <label class="checkbox mainfilter__checkbox">
                                                            <input type="checkbox"><span> </span>
                                                            <div class="checbox__name">Консультация врача</div><a
                                                                class="checbox__link --openpopup"
                                                                data-popup="--service-l" href="#">Подробнее</a>
                                                        </label>

                                                        <label class="checkbox mainfilter__checkbox">
                                                            <input type="checkbox"><span> </span>
                                                            <div class="checbox__name">Консультация врача</div><a
                                                                class="checbox__link --openpopup"
                                                                data-popup="--service-l" href="#">Подробнее</a>
                                                        </label>

                                                        <label class="checkbox mainfilter__checkbox">
                                                            <input type="checkbox"><span> </span>
                                                            <div class="checbox__name">Консультация врача</div><a
                                                                class="checbox__link --openpopup"
                                                                data-popup="--service-l" href="#">Подробнее</a>
                                                        </label>

                                                        <label class="checkbox mainfilter__checkbox">
                                                            <input type="checkbox"><span> </span>
                                                            <div class="checbox__name">Консультация врача</div><a
                                                                class="checbox__link --openpopup"
                                                                data-popup="--service-l" href="#">Подробнее</a>
                                                        </label>

                                                    </div>
                                                    <div class="col-lg-4">
                                                        <label class="checkbox mainfilter__checkbox">
                                                            <input type="checkbox"><span> </span>
                                                            <div class="checbox__name">Консультация врача</div><a
                                                                class="checbox__link --openpopup"
                                                                data-popup="--service-l" href="#">Подробнее</a>
                                                        </label>

                                                        <label class="checkbox mainfilter__checkbox">
                                                            <input type="checkbox"><span> </span>
                                                            <div class="checbox__name">Консультация врача</div><a
                                                                class="checbox__link --openpopup"
                                                                data-popup="--service-l" href="#">Подробнее</a>
                                                        </label>

                                                        <label class="checkbox mainfilter__checkbox">
                                                            <input type="checkbox"><span> </span>
                                                            <div class="checbox__name">Консультация врача</div><a
                                                                class="checbox__link --openpopup"
                                                                data-popup="--service-l" href="#">Подробнее</a>
                                                        </label>

                                                        <label class="checkbox mainfilter__checkbox">
                                                            <input type="checkbox"><span> </span>
                                                            <div class="checbox__name">Консультация врача</div><a
                                                                class="checbox__link --openpopup"
                                                                data-popup="--service-l" href="#">Подробнее</a>
                                                        </label>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="accardeon">
                                            <div class="accardeon__main accardeon__click">
                                                <div class="accardeon__name --red">Волосы</div>
                                            </div>
                                            <div class="accardeon__list">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <label class="checkbox mainfilter__checkbox">
                                                            <input type="checkbox"><span> </span>
                                                            <div class="checbox__name">Консультация врача</div><a
                                                                class="checbox__link --openpopup"
                                                                data-popup="--service-l" href="#">Подробнее</a>
                                                        </label>

                                                        <label class="checkbox mainfilter__checkbox">
                                                            <input type="checkbox"><span> </span>
                                                            <div class="checbox__name">Консультация врача</div><a
                                                                class="checbox__link --openpopup"
                                                                data-popup="--service-l" href="#">Подробнее</a>
                                                        </label>

                                                        <label class="checkbox mainfilter__checkbox">
                                                            <input type="checkbox"><span> </span>
                                                            <div class="checbox__name">Консультация врача</div><a
                                                                class="checbox__link --openpopup"
                                                                data-popup="--service-l" href="#">Подробнее</a>
                                                        </label>

                                                        <label class="checkbox mainfilter__checkbox">
                                                            <input type="checkbox"><span> </span>
                                                            <div class="checbox__name">Консультация врача</div><a
                                                                class="checbox__link --openpopup"
                                                                data-popup="--service-l" href="#">Подробнее</a>
                                                        </label>

                                                    </div>
                                                    <div class="col-lg-4">
                                                        <label class="checkbox mainfilter__checkbox">
                                                            <input type="checkbox"><span> </span>
                                                            <div class="checbox__name">Консультация врача</div><a
                                                                class="checbox__link --openpopup"
                                                                data-popup="--service-l" href="#">Подробнее</a>
                                                        </label>

                                                        <label class="checkbox mainfilter__checkbox">
                                                            <input type="checkbox"><span> </span>
                                                            <div class="checbox__name">Консультация врача</div><a
                                                                class="checbox__link --openpopup"
                                                                data-popup="--service-l" href="#">Подробнее</a>
                                                        </label>

                                                        <label class="checkbox mainfilter__checkbox">
                                                            <input type="checkbox"><span> </span>
                                                            <div class="checbox__name">Консультация врача</div><a
                                                                class="checbox__link --openpopup"
                                                                data-popup="--service-l" href="#">Подробнее</a>
                                                        </label>

                                                        <label class="checkbox mainfilter__checkbox">
                                                            <input type="checkbox"><span> </span>
                                                            <div class="checbox__name">Консультация врача</div><a
                                                                class="checbox__link --openpopup"
                                                                data-popup="--service-l" href="#">Подробнее</a>
                                                        </label>

                                                    </div>
                                                    <div class="col-lg-4">
                                                        <label class="checkbox mainfilter__checkbox">
                                                            <input type="checkbox"><span> </span>
                                                            <div class="checbox__name">Консультация врача</div><a
                                                                class="checbox__link --openpopup"
                                                                data-popup="--service-l" href="#">Подробнее</a>
                                                        </label>

                                                        <label class="checkbox mainfilter__checkbox">
                                                            <input type="checkbox"><span> </span>
                                                            <div class="checbox__name">Консультация врача</div><a
                                                                class="checbox__link --openpopup"
                                                                data-popup="--service-l" href="#">Подробнее</a>
                                                        </label>

                                                        <label class="checkbox mainfilter__checkbox">
                                                            <input type="checkbox"><span> </span>
                                                            <div class="checbox__name">Консультация врача</div><a
                                                                class="checbox__link --openpopup"
                                                                data-popup="--service-l" href="#">Подробнее</a>
                                                        </label>

                                                        <label class="checkbox mainfilter__checkbox">
                                                            <input type="checkbox"><span> </span>
                                                            <div class="checbox__name">Консультация врача</div><a
                                                                class="checbox__link --openpopup"
                                                                data-popup="--service-l" href="#">Подробнее</a>
                                                        </label>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="accardeon-group">
                                        <div class="accrdeon__title">Эстетика</div>
                                        <div class="accardeon">
                                            <div class="accardeon__main accardeon__click">
                                                <div class="accardeon__name --yellow">Лицо</div>
                                            </div>
                                            <div class="accardeon__list">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <label class="checkbox mainfilter__checkbox">
                                                            <input type="checkbox"><span> </span>
                                                            <div class="checbox__name">Консультация врача</div><a
                                                                class="checbox__link --openpopup"
                                                                data-popup="--service-l" href="#">Подробнее</a>
                                                        </label>

                                                        <label class="checkbox mainfilter__checkbox">
                                                            <input type="checkbox"><span> </span>
                                                            <div class="checbox__name">Консультация врача</div><a
                                                                class="checbox__link --openpopup"
                                                                data-popup="--service-l" href="#">Подробнее</a>
                                                        </label>

                                                        <label class="checkbox mainfilter__checkbox">
                                                            <input type="checkbox"><span> </span>
                                                            <div class="checbox__name">Консультация врача</div><a
                                                                class="checbox__link --openpopup"
                                                                data-popup="--service-l" href="#">Подробнее</a>
                                                        </label>

                                                        <label class="checkbox mainfilter__checkbox">
                                                            <input type="checkbox"><span> </span>
                                                            <div class="checbox__name">Консультация врача</div><a
                                                                class="checbox__link --openpopup"
                                                                data-popup="--service-l" href="#">Подробнее</a>
                                                        </label>

                                                    </div>
                                                    <div class="col-lg-4">
                                                        <label class="checkbox mainfilter__checkbox">
                                                            <input type="checkbox"><span> </span>
                                                            <div class="checbox__name">Консультация врача</div><a
                                                                class="checbox__link --openpopup"
                                                                data-popup="--service-l" href="#">Подробнее</a>
                                                        </label>

                                                        <label class="checkbox mainfilter__checkbox">
                                                            <input type="checkbox"><span> </span>
                                                            <div class="checbox__name">Консультация врача</div><a
                                                                class="checbox__link --openpopup"
                                                                data-popup="--service-l" href="#">Подробнее</a>
                                                        </label>

                                                        <label class="checkbox mainfilter__checkbox">
                                                            <input type="checkbox"><span> </span>
                                                            <div class="checbox__name">Консультация врача</div><a
                                                                class="checbox__link --openpopup"
                                                                data-popup="--service-l" href="#">Подробнее</a>
                                                        </label>

                                                        <label class="checkbox mainfilter__checkbox">
                                                            <input type="checkbox"><span> </span>
                                                            <div class="checbox__name">Консультация врача</div><a
                                                                class="checbox__link --openpopup"
                                                                data-popup="--service-l" href="#">Подробнее</a>
                                                        </label>

                                                    </div>
                                                    <div class="col-lg-4">
                                                        <label class="checkbox mainfilter__checkbox">
                                                            <input type="checkbox"><span> </span>
                                                            <div class="checbox__name">Консультация врача</div><a
                                                                class="checbox__link --openpopup"
                                                                data-popup="--service-l" href="#">Подробнее</a>
                                                        </label>

                                                        <label class="checkbox mainfilter__checkbox">
                                                            <input type="checkbox"><span> </span>
                                                            <div class="checbox__name">Консультация врача</div><a
                                                                class="checbox__link --openpopup"
                                                                data-popup="--service-l" href="#">Подробнее</a>
                                                        </label>

                                                        <label class="checkbox mainfilter__checkbox">
                                                            <input type="checkbox"><span> </span>
                                                            <div class="checbox__name">Консультация врача</div><a
                                                                class="checbox__link --openpopup"
                                                                data-popup="--service-l" href="#">Подробнее</a>
                                                        </label>

                                                        <label class="checkbox mainfilter__checkbox">
                                                            <input type="checkbox"><span> </span>
                                                            <div class="checbox__name">Консультация врача</div><a
                                                                class="checbox__link --openpopup"
                                                                data-popup="--service-l" href="#">Подробнее</a>
                                                        </label>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="accardeon">
                                            <div class="accardeon__main accardeon__click">
                                                <div class="accardeon__name --green">Тело</div>
                                            </div>
                                            <div class="accardeon__list">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <label class="checkbox mainfilter__checkbox">
                                                            <input type="checkbox"><span> </span>
                                                            <div class="checbox__name">Консультация врача</div><a
                                                                class="checbox__link --openpopup"
                                                                data-popup="--service-l" href="#">Подробнее</a>
                                                        </label>

                                                        <label class="checkbox mainfilter__checkbox">
                                                            <input type="checkbox"><span> </span>
                                                            <div class="checbox__name">Консультация врача</div><a
                                                                class="checbox__link --openpopup"
                                                                data-popup="--service-l" href="#">Подробнее</a>
                                                        </label>

                                                        <label class="checkbox mainfilter__checkbox">
                                                            <input type="checkbox"><span> </span>
                                                            <div class="checbox__name">Консультация врача</div><a
                                                                class="checbox__link --openpopup"
                                                                data-popup="--service-l" href="#">Подробнее</a>
                                                        </label>

                                                        <label class="checkbox mainfilter__checkbox">
                                                            <input type="checkbox"><span> </span>
                                                            <div class="checbox__name">Консультация врача</div><a
                                                                class="checbox__link --openpopup"
                                                                data-popup="--service-l" href="#">Подробнее</a>
                                                        </label>

                                                    </div>
                                                    <div class="col-lg-4">
                                                        <label class="checkbox mainfilter__checkbox">
                                                            <input type="checkbox"><span> </span>
                                                            <div class="checbox__name">Консультация врача</div><a
                                                                class="checbox__link --openpopup"
                                                                data-popup="--service-l" href="#">Подробнее</a>
                                                        </label>

                                                        <label class="checkbox mainfilter__checkbox">
                                                            <input type="checkbox"><span> </span>
                                                            <div class="checbox__name">Консультация врача</div><a
                                                                class="checbox__link --openpopup"
                                                                data-popup="--service-l" href="#">Подробнее</a>
                                                        </label>

                                                        <label class="checkbox mainfilter__checkbox">
                                                            <input type="checkbox"><span> </span>
                                                            <div class="checbox__name">Консультация врача</div><a
                                                                class="checbox__link --openpopup"
                                                                data-popup="--service-l" href="#">Подробнее</a>
                                                        </label>

                                                        <label class="checkbox mainfilter__checkbox">
                                                            <input type="checkbox"><span> </span>
                                                            <div class="checbox__name">Консультация врача</div><a
                                                                class="checbox__link --openpopup"
                                                                data-popup="--service-l" href="#">Подробнее</a>
                                                        </label>

                                                    </div>
                                                    <div class="col-lg-4">
                                                        <label class="checkbox mainfilter__checkbox">
                                                            <input type="checkbox"><span> </span>
                                                            <div class="checbox__name">Консультация врача</div><a
                                                                class="checbox__link --openpopup"
                                                                data-popup="--service-l" href="#">Подробнее</a>
                                                        </label>

                                                        <label class="checkbox mainfilter__checkbox">
                                                            <input type="checkbox"><span> </span>
                                                            <div class="checbox__name">Консультация врача</div><a
                                                                class="checbox__link --openpopup"
                                                                data-popup="--service-l" href="#">Подробнее</a>
                                                        </label>

                                                        <label class="checkbox mainfilter__checkbox">
                                                            <input type="checkbox"><span> </span>
                                                            <div class="checbox__name">Консультация врача</div><a
                                                                class="checbox__link --openpopup"
                                                                data-popup="--service-l" href="#">Подробнее</a>
                                                        </label>

                                                        <label class="checkbox mainfilter__checkbox">
                                                            <input type="checkbox"><span> </span>
                                                            <div class="checbox__name">Консультация врача</div><a
                                                                class="checbox__link --openpopup"
                                                                data-popup="--service-l" href="#">Подробнее</a>
                                                        </label>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="accardeon">
                                            <div class="accardeon__main accardeon__click">
                                                <div class="accardeon__name --red">Волосы</div>
                                            </div>
                                            <div class="accardeon__list">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <label class="checkbox mainfilter__checkbox">
                                                            <input type="checkbox"><span> </span>
                                                            <div class="checbox__name">Консультация врача</div><a
                                                                class="checbox__link --openpopup"
                                                                data-popup="--service-l" href="#">Подробнее</a>
                                                        </label>

                                                        <label class="checkbox mainfilter__checkbox">
                                                            <input type="checkbox"><span> </span>
                                                            <div class="checbox__name">Консультация врача</div><a
                                                                class="checbox__link --openpopup"
                                                                data-popup="--service-l" href="#">Подробнее</a>
                                                        </label>

                                                        <label class="checkbox mainfilter__checkbox">
                                                            <input type="checkbox"><span> </span>
                                                            <div class="checbox__name">Консультация врача</div><a
                                                                class="checbox__link --openpopup"
                                                                data-popup="--service-l" href="#">Подробнее</a>
                                                        </label>

                                                        <label class="checkbox mainfilter__checkbox">
                                                            <input type="checkbox"><span> </span>
                                                            <div class="checbox__name">Консультация врача</div><a
                                                                class="checbox__link --openpopup"
                                                                data-popup="--service-l" href="#">Подробнее</a>
                                                        </label>

                                                    </div>
                                                    <div class="col-lg-4">
                                                        <label class="checkbox mainfilter__checkbox">
                                                            <input type="checkbox"><span> </span>
                                                            <div class="checbox__name">Консультация врача</div><a
                                                                class="checbox__link --openpopup"
                                                                data-popup="--service-l" href="#">Подробнее</a>
                                                        </label>

                                                        <label class="checkbox mainfilter__checkbox">
                                                            <input type="checkbox"><span> </span>
                                                            <div class="checbox__name">Консультация врача</div><a
                                                                class="checbox__link --openpopup"
                                                                data-popup="--service-l" href="#">Подробнее</a>
                                                        </label>

                                                        <label class="checkbox mainfilter__checkbox">
                                                            <input type="checkbox"><span> </span>
                                                            <div class="checbox__name">Консультация врача</div><a
                                                                class="checbox__link --openpopup"
                                                                data-popup="--service-l" href="#">Подробнее</a>
                                                        </label>

                                                        <label class="checkbox mainfilter__checkbox">
                                                            <input type="checkbox"><span> </span>
                                                            <div class="checbox__name">Консультация врача</div><a
                                                                class="checbox__link --openpopup"
                                                                data-popup="--service-l" href="#">Подробнее</a>
                                                        </label>

                                                    </div>
                                                    <div class="col-lg-4">
                                                        <label class="checkbox mainfilter__checkbox">
                                                            <input type="checkbox"><span> </span>
                                                            <div class="checbox__name">Консультация врача</div><a
                                                                class="checbox__link --openpopup"
                                                                data-popup="--service-l" href="#">Подробнее</a>
                                                        </label>

                                                        <label class="checkbox mainfilter__checkbox">
                                                            <input type="checkbox"><span> </span>
                                                            <div class="checbox__name">Консультация врача</div><a
                                                                class="checbox__link --openpopup"
                                                                data-popup="--service-l" href="#">Подробнее</a>
                                                        </label>

                                                        <label class="checkbox mainfilter__checkbox">
                                                            <input type="checkbox"><span> </span>
                                                            <div class="checbox__name">Консультация врача</div><a
                                                                class="checbox__link --openpopup"
                                                                data-popup="--service-l" href="#">Подробнее</a>
                                                        </label>

                                                        <label class="checkbox mainfilter__checkbox">
                                                            <input type="checkbox"><span> </span>
                                                            <div class="checbox__name">Консультация врача</div><a
                                                                class="checbox__link --openpopup"
                                                                data-popup="--service-l" href="#">Подробнее</a>
                                                        </label>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="accardeon-group no-border">
                                        <div class="accrdeon__title">Гинекология</div>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <label class="checkbox mainfilter__checkbox">
                                                    <input type="checkbox"><span> </span>
                                                    <div class="checbox__name">Консультация врача</div><a
                                                        class="checbox__link --openpopup" data-popup="--service-l"
                                                        href="#">Подробнее</a>
                                                </label>

                                                <label class="checkbox mainfilter__checkbox">
                                                    <input type="checkbox"><span> </span>
                                                    <div class="checbox__name">Консультация врача</div><a
                                                        class="checbox__link --openpopup" data-popup="--service-l"
                                                        href="#">Подробнее</a>
                                                </label>

                                                <label class="checkbox mainfilter__checkbox">
                                                    <input type="checkbox"><span> </span>
                                                    <div class="checbox__name">Консультация врача</div><a
                                                        class="checbox__link --openpopup" data-popup="--service-l"
                                                        href="#">Подробнее</a>
                                                </label>

                                                <label class="checkbox mainfilter__checkbox">
                                                    <input type="checkbox"><span> </span>
                                                    <div class="checbox__name">Консультация врача</div><a
                                                        class="checbox__link --openpopup" data-popup="--service-l"
                                                        href="#">Подробнее</a>
                                                </label>

                                            </div>
                                            <div class="col-lg-4">
                                                <label class="checkbox mainfilter__checkbox">
                                                    <input type="checkbox"><span> </span>
                                                    <div class="checbox__name">Консультация врача</div><a
                                                        class="checbox__link --openpopup" data-popup="--service-l"
                                                        href="#">Подробнее</a>
                                                </label>

                                                <label class="checkbox mainfilter__checkbox">
                                                    <input type="checkbox"><span> </span>
                                                    <div class="checbox__name">Консультация врача</div><a
                                                        class="checbox__link --openpopup" data-popup="--service-l"
                                                        href="#">Подробнее</a>
                                                </label>

                                                <label class="checkbox mainfilter__checkbox">
                                                    <input type="checkbox"><span> </span>
                                                    <div class="checbox__name">Консультация врача</div><a
                                                        class="checbox__link --openpopup" data-popup="--service-l"
                                                        href="#">Подробнее</a>
                                                </label>

                                                <label class="checkbox mainfilter__checkbox">
                                                    <input type="checkbox"><span> </span>
                                                    <div class="checbox__name">Консультация врача</div><a
                                                        class="checbox__link --openpopup" data-popup="--service-l"
                                                        href="#">Подробнее</a>
                                                </label>

                                            </div>
                                            <div class="col-lg-4">
                                                <label class="checkbox mainfilter__checkbox">
                                                    <input type="checkbox"><span> </span>
                                                    <div class="checbox__name">Консультация врача</div><a
                                                        class="checbox__link --openpopup" data-popup="--service-l"
                                                        href="#">Подробнее</a>
                                                </label>

                                                <label class="checkbox mainfilter__checkbox">
                                                    <input type="checkbox"><span> </span>
                                                    <div class="checbox__name">Консультация врача</div><a
                                                        class="checbox__link --openpopup" data-popup="--service-l"
                                                        href="#">Подробнее</a>
                                                </label>

                                                <label class="checkbox mainfilter__checkbox">
                                                    <input type="checkbox"><span> </span>
                                                    <div class="checbox__name">Консультация врача</div><a
                                                        class="checbox__link --openpopup" data-popup="--service-l"
                                                        href="#">Подробнее</a>
                                                </label>

                                                <label class="checkbox mainfilter__checkbox">
                                                    <input type="checkbox"><span> </span>
                                                    <div class="checbox__name">Консультация врача</div><a
                                                        class="checbox__link --openpopup" data-popup="--service-l"
                                                        href="#">Подробнее</a>
                                                </label>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mainfilter__tab data-tab-item" data-tab="sympthoms">
                                    <div class="accrdeon__title">Симптомы</div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <label class="checkbox mainfilter__checkbox">
                                                <input type="checkbox"><span> </span>
                                                <div class="checbox__name">Консультация врача</div><a
                                                    class="checbox__link --openpopup" data-popup="--service"
                                                    href="#">Подробнее </a>
                                            </label>

                                            <label class="checkbox mainfilter__checkbox">
                                                <input type="checkbox"><span> </span>
                                                <div class="checbox__name">Консультация врача</div><a
                                                    class="checbox__link --openpopup" data-popup="--service"
                                                    href="#">Подробнее </a>
                                            </label>

                                            <label class="checkbox mainfilter__checkbox">
                                                <input type="checkbox"><span> </span>
                                                <div class="checbox__name">Консультация врача</div><a
                                                    class="checbox__link --openpopup" data-popup="--service"
                                                    href="#">Подробнее </a>
                                            </label>

                                            <label class="checkbox mainfilter__checkbox">
                                                <input type="checkbox"><span> </span>
                                                <div class="checbox__name">Консультация врача</div><a
                                                    class="checbox__link --openpopup" data-popup="--service"
                                                    href="#">Подробнее </a>
                                            </label>

                                        </div>
                                        <div class="col-lg-4">
                                            <label class="checkbox mainfilter__checkbox">
                                                <input type="checkbox"><span> </span>
                                                <div class="checbox__name">Консультация врача</div><a
                                                    class="checbox__link --openpopup" data-popup="--service"
                                                    href="#">Подробнее </a>
                                            </label>

                                            <label class="checkbox mainfilter__checkbox">
                                                <input type="checkbox"><span> </span>
                                                <div class="checbox__name">Консультация врача</div><a
                                                    class="checbox__link --openpopup" data-popup="--service"
                                                    href="#">Подробнее </a>
                                            </label>

                                            <label class="checkbox mainfilter__checkbox">
                                                <input type="checkbox"><span> </span>
                                                <div class="checbox__name">Консультация врача</div><a
                                                    class="checbox__link --openpopup" data-popup="--service"
                                                    href="#">Подробнее </a>
                                            </label>

                                            <label class="checkbox mainfilter__checkbox">
                                                <input type="checkbox"><span> </span>
                                                <div class="checbox__name">Консультация врача</div><a
                                                    class="checbox__link --openpopup" data-popup="--service"
                                                    href="#">Подробнее </a>
                                            </label>

                                        </div>
                                        <div class="col-lg-4">
                                            <label class="checkbox mainfilter__checkbox">
                                                <input type="checkbox"><span> </span>
                                                <div class="checbox__name">Консультация врача</div><a
                                                    class="checbox__link --openpopup" data-popup="--service"
                                                    href="#">Подробнее </a>
                                            </label>

                                            <label class="checkbox mainfilter__checkbox">
                                                <input type="checkbox"><span> </span>
                                                <div class="checbox__name">Консультация врача</div><a
                                                    class="checbox__link --openpopup" data-popup="--service"
                                                    href="#">Подробнее </a>
                                            </label>

                                            <label class="checkbox mainfilter__checkbox">
                                                <input type="checkbox"><span> </span>
                                                <div class="checbox__name">Консультация врача</div><a
                                                    class="checbox__link --openpopup" data-popup="--service"
                                                    href="#">Подробнее </a>
                                            </label>

                                            <label class="checkbox mainfilter__checkbox">
                                                <input type="checkbox"><span> </span>
                                                <div class="checbox__name">Консультация врача</div><a
                                                    class="checbox__link --openpopup" data-popup="--service"
                                                    href="#">Подробнее </a>
                                            </label>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 mainfilter__right">
                        <div class="mainfilter__choice">
                            <h5 class="h5">Ваш выбор</h5>
                            <div class="mainfilter__tags">
                                <div class="mainfilter-tag">
                                    <div class="mainfilter-tag__name">
                                        <div class="mainfilter-tag__delete">
                                            <svg class="svgsprite _delete">
                                                <use xlink:href="assets/img/sprites/svgsprites.svg#delete"></use>
                                            </svg>
                                        </div> <a class="mainfilter-tag__link" href="/landing.html">Аллергия на коже</a>
                                    </div>
                                    <div class="mainfilter-tag__group --yellow">Л</div>
                                </div>

                                <div class="mainfilter-tag">
                                    <div class="mainfilter-tag__name">
                                        <div class="mainfilter-tag__delete">
                                            <svg class="svgsprite _delete">
                                                <use xlink:href="assets/img/sprites/svgsprites.svg#delete"></use>
                                            </svg>
                                        </div> <a class="mainfilter-tag__link" href="/landing.html">Аллергия на коже</a>
                                    </div>
                                    <div class="mainfilter-tag__group --green">Л</div>
                                </div>

                                <div class="mainfilter-tag">
                                    <div class="mainfilter-tag__name">
                                        <div class="mainfilter-tag__delete">
                                            <svg class="svgsprite _delete">
                                                <use xlink:href="assets/img/sprites/svgsprites.svg#delete"></use>
                                            </svg>
                                        </div> <a class="mainfilter-tag__link" href="/landing.html">Аллергия на коже</a>
                                    </div>
                                    <div class="mainfilter-tag__group --red">Л</div>
                                </div>

                                <div class="mainfilter-tag">
                                    <div class="mainfilter-tag__name">
                                        <div class="mainfilter-tag__delete">
                                            <svg class="svgsprite _delete">
                                                <use xlink:href="assets/img/sprites/svgsprites.svg#delete"></use>
                                            </svg>
                                        </div> <a class="mainfilter-tag__link" href="/landing.html">Аллергия на коже</a>
                                    </div>
                                    <div class="mainfilter-tag__group --blue">Л</div>
                                </div>

                                <div class="mainfilter-tag">
                                    <div class="mainfilter-tag__name">
                                        <div class="mainfilter-tag__delete">
                                            <svg class="svgsprite _delete">
                                                <use xlink:href="assets/img/sprites/svgsprites.svg#delete"></use>
                                            </svg>
                                        </div> <a class="mainfilter-tag__link" href="/landing.html">Аллергия на коже</a>
                                    </div>
                                    <div class="mainfilter-tag__group --purple">Л</div>
                                </div>

                            </div>
                        </div>
                        <div class="mainfilter__bottom">
                            <form class="mainfilter__form">
                                <div class="mainfilter__form-top">
                                    <h5 class="h5">Ваш выбор</h5>
                                    <div class="input input--grey">
                                        <input class="input__control" type="text" placeholder="ФИО">
                                        <div class="input__placeholder">ФИО</div>
                                    </div>
                                    <div class="input input--grey">
                                        <input class="input__control" type="tel" placeholder="Номер телефона"
                                            data-inputmask="'mask': '+7 (999) 999-99-99'">
                                        <div class="input__placeholder">Номер телефона</div>
                                    </div>
                                    <div class="input input--grey">
                                        <input class="input__control" type="email" placeholder="Ваш е-мейл">
                                        <div class="input__placeholder">Ваш е-мейл</div>
                                    </div>
                                    <div class="form__description">Нажимая на кнопку "Записаться", Вы даете согласие на
                                        обработку своих персональных данных на основании <a href="policy.html">Политики
                                            конфиденциальности</a></div>
                                    <button class="form__submit btn btn--black">Записаться</button>
                                </div>
                                <div class="mainfilter__form-bottom">После отправки заявки для Вас будет создан Личный
                                    кабинет, в который можно попасть через кнопку "Войти" в верхнем меню сайта</div>
                            </form>
                            <div class="mainfilter__succed"></div>
                        </div>
                    </div>
                </div>
            </div>

        </main>
        <script>
             var cabinet = new Ractive({
                el: 'main.page',
                template: $('main.page').html(),
                data: {
                    user: wbapp._session.user
                },
                on: {
                    init() {
                        wbapp.get('/api/v2/read/users/' + wbapp._session.user.id, function(data) {
                            cabinet.set('user', data); /* get actually user data */
                        });
                    },
                    profileSave(ev) {
                        let $form = $(ev.node);
                        let uid = cabinet.get('user.id');
                        if ($form.verify() && uid > '') {
                            let data = $form.serializeJson()
                            data.phone = str_replace([' ','+','-','(',')'],'',data.phone)
                            wbapp.post('/api/v2/update/users/'+uid,data,function(res){
                                console.log(res);
                            })
                        }
                        return false
                    }
                }
            })
        </script>
    </div>

    <a class="phone --openpopup" href="#" data-popup="--fast"><svg class="svgsprite _phone">
            <use xlink:href="assets/img/sprites/svgsprites.svg#phone"></use>
        </svg></a>
    <div class="popup --fast">
        <div class="popup__overlay"></div>
        <div class="popup__panel">
            <button class="popup__close">
                <svg class="svgsprite _close">
                    <use xlink:href="assets/img/sprites/svgsprites.svg#close"></use>
                </svg>
            </button>
            <div class="popup__name text-bold">Быстрая запись</div>
            <form class="popup__form">
                <div class="input input--grey">
                    <input class="input__control" type="text" placeholder="ФИО">
                    <div class="input__placeholder">ФИО</div>
                </div>
                <div class="input input--grey">
                    <input class="input__control" type="tel" placeholder="Номер телефона"
                        data-inputmask="'mask': '+7 (999) 999-99-99'">
                    <div class="input__placeholder">Номер телефона</div>
                </div>
                <div class="input input--grey">
                    <textarea class="input__control" placeholder="Причина обращения"></textarea>
                    <div class="input__placeholder">Причина обращения</div>
                </div>
                <div class="form__description">Нажимая на кнопку "Перезвонить мне", Вы даете согласие на обработку своих
                    персональных данных на основании <a href="policy.html">Политики конфиденциальности</a></div>
                <button class="btn btn--black form__submit">Перезвонить мне</button>
                <div class="form-bottom">После отправки заявки для Вас будет создан Личный кабинет, в&nbsp;который можно
                    попасть через кнопку &laquo;Войти&raquo; в&nbsp;верхнем меню сайта</div>
            </form>
        </div>
        <div class="popup__panel --succed">
            <button class="popup__close">
                <svg class="svgsprite _close">
                    <use xlink:href="assets/img/sprites/svgsprites.svg#close"></use>
                </svg>
            </button>
            <div class="popup__name text-bold">Быстрая запись</div>
            <h3 class="h3">Успешно !</h3>
            <p class="text-grey">Мы перезвоним Вам в ближайшее время</p>
        </div>
    </div>

    <div class="popup --form-send">
        <div class="popup__overlay"></div>
        <div class="popup__panel">
            <button class="popup__close">
                <svg class="svgsprite _close">
                    <use xlink:href="assets/img/sprites/svgsprites.svg#close"></use>
                </svg>
            </button>
            <div class="popup__name text-bold">Перезвонить мне</div>
            <h3 class="h3">Успешно !</h3>
            <p class="text-grey">Мы перезвоним Вам в ближайшее время</p>
        </div>
    </div>

    <div class="popup --recover-password">
        <div class="popup__overlay"></div>
        <div class="popup__panel">
            <button class="popup__close">
                <svg class="svgsprite _close">
                    <use xlink:href="assets/img/sprites/svgsprites.svg#close"></use>
                </svg>
            </button>
            <div class="popup__name text-bold">Восстановление пароля</div>
            <h3 class="h3">Пароль успешно обновлен</h3>
        </div>
    </div>

    <div class="popup --fast-make">
        <div class="popup__overlay"></div>
        <div class="popup__panel">
            <button class="popup__close">
                <svg class="svgsprite _close">
                    <use xlink:href="assets/img/sprites/svgsprites.svg#close"></use>
                </svg>
            </button>
            <div class="popup__name text-bold">Быстрая запись</div>
            <form class="popup__form">
                <div class="input input--grey">
                    <input class="input__control" type="text" placeholder="ФИО">
                    <div class="input__placeholder">ФИО</div>
                </div>
                <div class="input input--grey">
                    <input class="input__control" type="tel" placeholder="Номер телефона"
                        data-inputmask="'mask': '+7 (999) 999-99-99'">
                    <div class="input__placeholder">Номер телефона</div>
                </div>
                <label class="checkbox mainfilter__checkbox hider-checkbox" data-hide-input="expert">
                    <input class="checkbox-hidden-next-form" type="checkbox"><span></span>
                    <div class="checbox__name text-grey">Я не знаю, кого выбрать</div>
                </label>
                <div class="select-form" data-hide="expert">
                    <div class="select">
                        <div class="select__main">Хачатурян Любовь Андреева</div>
                        <div class="select__list">
                            <div class="select__item active">Хачатурян Любовь Андреева</div>
                            <div class="select__item">Хачатурян Любовь Андреева</div>
                            <div class="select__item">Хачатурян Любовь Андреева</div>
                            <div class="select__item">Хачатурян Любовь Андреева</div>
                        </div>
                    </div>
                </div>
                <p class="text-grey text-grey mb-10">Необязательно</p>
                <div class="input input--grey">
                    <textarea class="input__control" placeholder="Причина обращения"></textarea>
                    <div class="input__placeholder">Причина обращения</div>
                </div>
                <div class="form__description">Нажимая на кнопку "Перезвонить мне", Вы даете согласие на обработку своих
                    персональных данных на основании <a href="policy.html">Политики конфиденциальности</a></div>
                <button class="btn btn--black form__submit">Перезвонить мне</button>
                <div class="form-bottom">После отправки заявки для Вас будет создан Личный кабинет, в&nbsp;который можно
                    попасть через кнопку &laquo;Войти&raquo; в&nbsp;верхнем меню сайта</div>
            </form>
        </div>
        <div class="popup__panel --succed">
            <button class="popup__close">
                <svg class="svgsprite _close">
                    <use xlink:href="assets/img/sprites/svgsprites.svg#close"></use>
                </svg>
            </button>
            <div class="popup__name text-bold">Быстрая запись</div>
            <h3 class="h3">Успешно !</h3>
            <p class="text-grey">Мы перезвоним Вам в ближайшее время</p>
        </div>
    </div>

    <div class="popup --enter-number">
        <div class="popup__overlay"></div>
        <div class="popup__panel">
            <button class="popup__close">
                <svg class="svgsprite _close">
                    <use xlink:href="assets/img/sprites/svgsprites.svg#close"></use>
                </svg>
            </button>
            <div class="popup__name text-bold">Войдите или зарегистрируйтесь</div>
            <form class="popup__form">
                <div class="input input--grey">
                    <input class="input__control" type="tel" placeholder="Номер телефона"
                        data-inputmask="'mask': '+7 (999) 999-99-99'">
                    <div class="input__placeholder">Номер телефона</div>
                </div><a class="form__link --switchpopup" href="#" data-popup="--email-enter"> Войти по почте</a>
            </form>
            <div class="form-bottom">
                <button class="btn btn--black form__submit --switchpopup" data-popup="--code">Получить код</button>
            </div>
        </div>
    </div>

    <div class="popup --code">
        <div class="popup__overlay"></div>
        <div class="popup__panel">
            <button class="popup__close">
                <svg class="svgsprite _close">
                    <use xlink:href="assets/img/sprites/svgsprites.svg#close"></use>
                </svg>
            </button>
            <div class="popup__name text-bold">Вход</div>
            <form class="popup__form">
                <h3 class="h3">Введите код</h3>
                <div class="form-title__description form-title__description--small">Мы отправили код подтверждения на
                    номер <br>+7 939 319 33 38 <a class="link" href="#"> Изменить</a></div>
                <div class="code">
                    <input class="code__input" type="number">
                    <input class="code__input" type="number">
                    <input class="code__input" type="number">
                    <input class="code__input" type="number">
                    <input class="code__input" type="number">
                    <input class="code__input" type="number">
                </div><a class="form__link" href="#"> Отправить код повторно</a>
            </form>
        </div>
    </div>

    <div class="popup --email-enter">
        <div class="popup__overlay"></div>
        <div class="popup__panel">
            <button class="popup__close">
                <svg class="svgsprite _close">
                    <use xlink:href="assets/img/sprites/svgsprites.svg#close"></use>
                </svg>
            </button>
            <div class="popup__name text-bold">Войдите или зарегистрируйтесь</div>
            <form class="popup__form">
                <div class="input input--grey">
                    <input class="input__control" type="email" placeholder="Ваш е-мейл">
                    <div class="input__placeholder">Ваш е-мейл</div>
                </div>
                <div class="text-right mb-10"><a class="form__link --switchpopup" data-popup="--email-recover">Забыли
                        пароль?</a></div>
                <div class="input input--grey">
                    <input class="input__control" type="password" placeholder="Пароль">
                    <div class="input__placeholder">Пароль</div>
                </div><a class="form__link --switchpopup" type="button" data-popup="--enter-number"> Войти по номеру
                    телефона</a>
                <div class="form-bottom --flex">
                    <button class="btn btn--black form__submit" type="submit">Войти</button>
                    <button class="btn btn--white form__submit --switchpopup" type="button"
                        data-popup="--reg">Зарегистрироваться</button>
                </div>
            </form>
        </div>
    </div>

    <div class="popup --email-recover">
        <div class="popup__overlay"></div>
        <div class="popup__panel">
            <button class="popup__close">
                <svg class="svgsprite _close">
                    <use xlink:href="assets/img/sprites/svgsprites.svg#close"></use>
                </svg>
            </button>
            <div class="popup__name text-bold">Восстановление пароля</div>
            <div class="form-title__description form-title__description--small">Для восстановления пароля введите email,
                который Вы указывали при регистрации</div>
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
                    <use xlink:href="assets/img/sprites/svgsprites.svg#close"></use>
                </svg>
            </button>
            <div class="popup__name text-bold">Восстановление пароля</div>
            <h3 class="h3">Письмо отправлено!</h3>
            <p class="text-grey">На Ваш почтовый ящик выслана ссылка для восстановления пароля. Пожалуйста, проверьте
                почту</p>
        </div>
    </div>

    <div class="popup --email-send">
        <div class="popup__overlay"></div>
        <div class="popup__panel">
            <button class="popup__close">
                <svg class="svgsprite _close">
                    <use xlink:href="assets/img/sprites/svgsprites.svg#close"></use>
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
                    <use xlink:href="assets/img/sprites/svgsprites.svg#close"></use>
                </svg>
            </button>
            <div class="popup__name text-bold">Регистрация Личного кабинета</div>
            <div class="form-title__description">Для регистрации личного кабинета введите свой email адрес, пароль будет
                выслан на указанную почту</div>
            <form class="popup__form">
                <div class="input input--grey">
                    <input class="input__control" type="email" placeholder="Ваш е-мейл">
                    <div class="input__placeholder">Ваш е-мейл</div>
                </div>
                <div class="form__alert text-small">Адрес уже используется, хотите&nbsp;<a class="link link--medium"
                        href="">восстановить пароль</a>?
                    <svg class="svgsprite _alert">
                        <use xlink:href="assets/img/sprites/svgsprites.svg#alert"></use>
                    </svg>
                </div>
                <div class="form__description">Нажимая на кнопку "Зарегистрироваться", Вы даете согласие на обработку
                    своих персональных данных на основании <a href="policy.html">Политики конфиденциальности</a></div>
                <div class="form-bottom --flex">
                    <button class="btn btn--black form__submit --switchpopup" type="submit">Зарегистрироваться</button>
                    <button class="btn btn--white form__submit --switchpopup" type="button"
                        data-popup="--enter-number">Войти</button>
                </div>
            </form>
        </div>
        <div class="popup__panel --succed">
            <button class="popup__close">
                <svg class="svgsprite _close">
                    <use xlink:href="assets/img/sprites/svgsprites.svg#close"></use>
                </svg>
            </button>
            <div class="popup__name text-bold">Регистрация Личного кабинета</div>
            <h3 class="h3">Успешно !</h3>
            <p class="text-grey">Ваш Личный кабинет создан, сейчас вы будете в него автоматически перенаправлены</p>
        </div>
    </div>

    <div class="popup --service">
        <div class="popup__overlay"></div>
        <div class="popup__panel">
            <button class="popup__close">
                <svg class="svgsprite _close">
                    <use xlink:href="assets/img/sprites/svgsprites.svg#close"></use>
                </svg>
            </button>
            <div class="popup__name text-bold">Лицо</div>
            <h2 class="h2 mb-20">Консультация врача</h2>
            <div class="popup__img"><img src="./assets/img/popup/1.jpg" alt=""></div>
            <p class="text-bold text-big mb-10">На консультации в медицинском центре РОШ врач-дерматолог:</p>
            <div class="text">
                <p class="mb-10">Врач выслушает ваши жалобы, расспросит об образе жизни, аллергических реакциях.</p>
                <p class="mb-10">Проведет дерматологическое обследование всего кожного покрова, пигментный скрининг.</p>
                <p class="mb-10">Назначит дополнительное обследование, лечение, а также даст рекомендации по образу
                    жизни.</p>
            </div>
        </div>
    </div>

    <div class="popup --service-l">
        <div class="popup__overlay"></div>
        <div class="popup__panel">
            <button class="popup__close">
                <svg class="svgsprite _close">
                    <use xlink:href="assets/img/sprites/svgsprites.svg#close"></use>
                </svg>
            </button>
            <div class="popup__name text-bold">Лицо</div>
            <h2 class="h2 mb-20">Консультация врача</h2>
            <div class="popup__img"><img src="./assets/img/popup/1.jpg" alt=""></div>
            <p class="text-bold text-big mb-10">На консультации в медицинском центре РОШ врач-дерматолог:</p>
            <div class="text">
                <p class="mb-10">Врач выслушает ваши жалобы, расспросит об образе жизни, аллергических реакциях.</p>
                <p class="mb-10">Проведет дерматологическое обследование всего кожного покрова, пигментный скрининг.</p>
                <p class="mb-10">Назначит дополнительное обследование, лечение, а также даст рекомендации по образу
                    жизни.</p>
            </div><a class="btn btn--black" href="/landing.html">Читать подробнее</a>
        </div>
    </div>

    <div class="popup --problems">
        <div class="popup__overlay"></div>
        <div class="popup__panel">
            <button class="popup__close">
                <svg class="svgsprite _close">
                    <use xlink:href="assets/img/sprites/svgsprites.svg#close"></use>
                </svg>
            </button>
            <div class="popup__name text-bold">Аллергия на коже</div>
            <h2 class="h2 mb-20">Аллергия на коже</h2>
            <div class="text">
                <p class="mb-10">Ответственны за этот процесс клетки иммунной системы – белки крови – иммуноглобулины Е.
                    Они начинают вырабатываться при попадании в организм аллергена, который для каждого человека
                    индивидуален. Аллергия проявляется в виде высыпаний, шелушения и покраснения кожных покровов, зуда,
                    часто – затруднение дыхания, насморк, слезоточивость.жизни.</p>
            </div>
            <div class="popup__img"><img src="./assets/img/popup/1.jpg" alt=""></div>
            <h2 class="h2 mb-20">Лечение в Rosh</h2>
            <div class="text">
                <p class="mb-10">Диагноз «аллергия» ставится после проведения соответствующей диагностики: кожных проб и
                    анализа крови, в некоторых случаях, при помощи лабораторных исследований можно выявить конкретный
                    аллерген, но не всегда. В медицинском центре ROSH для диагностики и лечения аллергии мы также
                    применяем биорезонансный аппарат BICOM.</p>
            </div>
            <div class="row mb-30">
                <div class="col-md-6">
                    <div class="popup__img"><img src="./assets/img/popup/1.jpg" alt=""></div>
                </div>
                <div class="col-md-6">
                    <div class="popup__img"><img src="./assets/img/popup/1.jpg" alt=""></div>
                </div>
            </div><a class="btn btn--black" href="#">Читать подробнее</a>
        </div>
    </div>

    <div class="popup --eq">
        <div class="popup__overlay"></div>
        <div class="popup__panel">
            <button class="popup__close">
                <svg class="svgsprite _close">
                    <use xlink:href="assets/img/sprites/svgsprites.svg#close"></use>
                </svg>
            </button>
            <div class="popup__name text-bold">Мультиплатформа Joule SCITON</div>
            <div class="text">
                <p class="mb-10">Медицинский центр "ROSH" представляет мультиплатформу Joule SCITON, которая на сегодня
                    не знает аналогов во всем мире. Все Голливудские дивы уже по достоинству оценили и являются
                    поклонниками данного аппарата.И есть от чего: единственная преследуемая цель процедуры - это
                    удовлетворенность пациентов конечными результатами. Лазер SCITON поистине универсален, чтобы
                    предложить эффективную и безопасную коррекцию большинства патологий кожи (дерматологических и
                    эстетических) на всех типах кожи с минимальным восстановительным периодом и восхитительными
                    результатами.</p>
            </div>
            <div class="gallery">
                <div class="gallery__slider">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="gallery__pic" style="background-image: url(./assets/img/gallery/1.jpg)"></div>
                        </div>
                        <div class="swiper-slide">
                            <div class="gallery__pic" style="background-image: url(./assets/img/gallery/1.jpg)"></div>
                        </div>
                        <div class="swiper-slide">
                            <div class="gallery__pic" style="background-image: url(./assets/img/gallery/1.jpg)"></div>
                        </div>
                        <div class="swiper-slide">
                            <div class="gallery__pic" style="background-image: url(./assets/img/gallery/1.jpg)"></div>
                        </div>
                        <div class="swiper-slide">
                            <div class="gallery__pic" style="background-image: url(./assets/img/gallery/1.jpg)"></div>
                        </div>
                    </div>
                </div>
                <div class="gallery__nav">
                    <div class="prev">
                        <svg class="svgsprite _prev">
                            <use xlink:href="assets/img/sprites/svgsprites.svg#prev"></use>
                        </svg>
                    </div>
                    <div class="next">
                        <svg class="svgsprite _next">
                            <use xlink:href="assets/img/sprites/svgsprites.svg#next"></use>
                        </svg>
                    </div>
                </div>
            </div>
            <p class="text-bold mb-12"></p>
            <div class="text">
                <ul class="ul-line mb-20">
                    <li>омоложение (морщины, снижение тонуса кожи),</li>
                    <li>пигментация,</li>
                    <li>сосуды и сосудистые новообразования,</li>
                    <li>расширенные поры и повышенное салоотделение,</li>
                    <li>акне (угревая болезнь),</li>
                    <li>рубцы и стрии,</li>
                </ul>
                <p>Кроме того, на данном аппарате проводится уникальная методика FOREVER YOUNG - мало того, что она
                    устраняет абсолютно все недостатки, имеющиеся на лице и теле, это еще и омоложение на генном уровне!
                </p>
            </div>
        </div>
    </div>

    <div class="popup --record">
        <div class="popup__overlay"></div>
        <div class="popup__panel">
            <button class="popup__close">
                <svg class="svgsprite _close">
                    <use xlink:href="assets/img/sprites/svgsprites.svg#close"></use>
                </svg>
            </button>
            <div class="popup__name text-bold">Запись на прием</div>
            <div class="text-bold mb-10">Разделы услуг</div>
            <div class="popups__text-chexboxs">
                <label class="text-radio">
                    <input type="radio" name="status"><span>Лицо</span>
                </label>
                <label class="text-radio switch-blocks">
                    <input type="radio" name="status"><span>Тело</span>
                </label>
                <label class="text-radio switch-blocks">
                    <input type="radio" name="status"><span>Волосы</span>
                </label>
                <label class="text-radio switch-blocks">
                    <input type="radio" name="status"><span>Гинекология</span>
                </label>
                <label class="text-radio switch-blocks">
                    <input type="radio" name="status"><span>Лаборатория</span>
                </label>
            </div>
            <div class="input">
                <input class="search__input" type="text" placeholder="Поиск по услугам" id="popup-services-list">
                <div class="search__drop">
                    <label class="search__drop-item">
                        <div class="search__drop-name">Прием (осмотр, консультация врача-дерматовенеролога главного
                            врача первичный (включает составление плана лечения).</div>
                        <div class="search__drop-right">
                            <div class="search__drop-tags">
                                <div class="search__drop-tag --yellow">Л</div>
                                <div class="search__drop-tag --green">Т</div>
                            </div>
                            <div class="search__drop-summ">7 000 ₽</div>
                            <div class="search__drop-check">
                                <div class="checkbox">
                                    <input type="checkbox"><span></span>
                                </div>
                            </div>
                        </div>
                    </label>
                    <label class="search__drop-item">
                        <div class="search__drop-name">Дерматологический пилинг Cosmedix Purity ретиноевый</div>
                        <div class="search__drop-right">
                            <div class="search__drop-tags">
                                <div class="search__drop-tag --yellow">Л</div>
                            </div>
                            <div class="search__drop-summ">7 000 ₽</div>
                            <div class="search__drop-check">
                                <div class="checkbox">
                                    <input type="checkbox"><span></span>
                                </div>
                            </div>
                        </div>
                    </label>
                    <label class="search__drop-item">
                        <div class="search__drop-name">Дерматологический пилинг Enerpeel Jessners
                            салициловый-резорциновый</div>
                        <div class="search__drop-right">
                            <div class="search__drop-tags">
                                <div class="search__drop-tag --yellow">Л</div>
                                <div class="search__drop-tag --green">Т</div>
                            </div>
                            <div class="search__drop-summ">7 000 ₽</div>
                            <div class="search__drop-check">
                                <div class="checkbox">
                                    <input type="checkbox"><span></span>
                                </div>
                            </div>
                        </div>
                    </label>
                    <label class="search__drop-item">
                        <div class="search__drop-name">Дерматологический пилинг для кожи с гиперпигментацией "SC Pigment
                            Balancing Peel"</div>
                        <div class="search__drop-right">
                            <div class="search__drop-tags">
                                <div class="search__drop-tag --yellow">Л</div>
                                <div class="search__drop-tag --green">Т</div>
                            </div>
                            <div class="search__drop-summ">7 000 ₽</div>
                            <div class="search__drop-check">
                                <div class="checkbox">
                                    <input type="checkbox"><span></span>
                                </div>
                            </div>
                        </div>
                    </label>
                </div>
                <button class="search__btn" type="button">
                    <svg class="svgsprite _search">
                        <use xlink:href="assets/img/sprites/svgsprites.svg#search"></use>
                    </svg>
                </button>
            </div>
            <label class="checkbox checkbox--record show-checkbox" data-show-input="service">
                <input class="checkbox-visible-next-form" type="checkbox"><span></span>
                <div class="checbox__name">Консультация врача</div>
            </label>
            <div class="select-form" style="display: none;" data-show="service">
                <div class="text-bold mb-20">Тип события</div>
                <div class="popups__text-chexboxs">
                    <label class="text-radio">
                        <input type="radio" name="status-service"><span>В клинике</span>
                    </label>
                    <label class="text-radio switch-blocks">
                        <input type="radio" name="status-service"><span>Онлайн</span>
                    </label>
                </div>
            </div>
            <label class="checkbox checkbox--record hider-checkbox" data-hide-input="service">
                <input class="checkbox-hidden-next-form" type="checkbox"><span></span>
                <div class="checbox__name">Мне лень искать в списке, скажу администратору</div>
            </label>
            <div class="select-form" data-hide="service">
                <div class="select">
                    <div class="select__main">
                        <div class="select__placeholder">Услуга</div>
                        <div class="select__values"> </div>
                    </div>
                    <div class="select__list">
                        <div class="select__item select__item--checkbox">
                            <label class="checkbox checkbox--record">
                                <input type="checkbox"><span> </span>
                                <div class="checbox__name --flex --aic --jcsb">
                                    <div class="select__name">Внутривенное введение лекарственных препаратов -
                                        капельница (Антиоксидантная)</div>
                                    <div>6 000 ₽</div>
                                </div>
                            </label>
                        </div>
                        <div class="select__item select__item--checkbox">
                            <label class="checkbox checkbox--record">
                                <input type="checkbox"><span> </span>
                                <div class="checbox__name --flex --aic --jcsb">
                                    <div class="select__name">Дерматологический пилинг Cosmedix Purity ретиноевый</div>
                                    <div>7 000 ₽</div>
                                </div>
                            </label>
                        </div>
                        <div class="select__item select__item--checkbox">
                            <label class="checkbox checkbox--record">
                                <input type="checkbox"><span> </span>
                                <div class="checbox__name --flex --aic --jcsb">
                                    <div class="select__name">Дерматологический пилинг Enerpeel Jessners
                                        салициловый-резорциновый</div>
                                    <div>7 000 ₽</div>
                                </div>
                            </label>
                        </div>
                        <div class="select__item select__item--checkbox">
                            <label class="checkbox checkbox--record">
                                <input type="checkbox"><span> </span>
                                <div class="checbox__name --flex --aic --jcsb">
                                    <div class="select__name">Дерматологический пилинг для кожи с гиперпигментацией "SC
                                        Pigment Balancing Peel"</div>
                                    <div>7 000 ₽</div>
                                </div>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="service-checkboxs">
                <label class="search__drop-item">
                    <div class="search__drop-name">Прием (осмотр, консультация врача-дерматовенеролога главного врача
                        первичный (включает составление плана лечения).</div>
                    <div class="search__drop-right">
                        <div class="search__drop-tags"></div>
                        <div class="search__drop-summ">7 000 ₽</div>
                        <div class="search__drop-check">
                            <div class="checkbox">
                                <input type="checkbox"><span></span>
                            </div>
                        </div>
                    </div>
                </label>
            </div>
            <label class="checkbox checkbox--record hider-checkbox" data-hide-input="expert">
                <input class="checkbox-hidden-next-form" type="checkbox"><span></span>
                <div class="checbox__name">Я не знаю, кого выбрать</div>
            </label>
            <div class="select-form" data-hide="expert">
                <div class="select">
                    <div class="select__main">
                        <div class="select__placeholder">Выберите специалиста</div>
                        <div class="select__values"> </div>
                    </div>
                    <div class="select__list">
                        <div class="select__item select__item--checkbox">
                            <label class="checkbox checkbox--record">
                                <input type="checkbox"><span> </span>
                                <div class="checbox__name">
                                    <div class="select__name">Хачатурян Любовь Андреева 1</div>
                                </div>
                            </label>
                        </div>
                        <div class="select__item select__item--checkbox">
                            <label class="checkbox checkbox--record">
                                <input type="checkbox"><span> </span>
                                <div class="checbox__name">
                                    <div class="select__name">Хачатурян Любовь Андреева 2</div>
                                </div>
                            </label>
                        </div>
                        <div class="select__item select__item--checkbox">
                            <label class="checkbox checkbox--record">
                                <input type="checkbox"><span> </span>
                                <div class="checbox__name">
                                    <div class="select__name">Хачатурян Любовь Андреева 3</div>
                                </div>
                            </label>
                        </div>
                        <div class="select__item select__item--checkbox">
                            <label class="checkbox checkbox--record">
                                <input type="checkbox"><span> </span>
                                <div class="checbox__name">
                                    <div class="select__name">Хачатурян Любовь Андреева 4</div>
                                </div>
                            </label>
                        </div>
                        <div class="select__item select__item--checkbox">
                            <label class="checkbox checkbox--record">
                                <input type="checkbox"><span> </span>
                                <div class="checbox__name">
                                    <div class="select__name">Хачатурян Любовь Андреева 5</div>
                                </div>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="admin-editor__patient">
                <div class="text-bold mb-10">Выбраны услуги</div>
                <div class="search__drop-item">
                    <div class="search__drop-name">
                        <div class="search__drop-delete">
                            <svg class="svgsprite _delete">
                                <use xlink:href="assets/img/sprites/svgsprites.svg#delete"></use>
                            </svg>
                        </div>
                        <div class="search__drop-tags">
                            <div class="search__drop-tag --yellow">Л</div>
                        </div>Прием (осмотр, консультация врача-дерматовенеролога главного врача первичный (включает
                        составление плана лечения).
                    </div>
                    <label class="search__drop-right">
                        <div class="search__drop-summ">7 000 ₽</div>
                    </label>
                </div>
            </div>
            <div class="admin-editor__summ">
                <p>Всего</p>
                <p>7 000 ₽</p>
            </div>
            <button class="btn btn--black form__submit"> Записаться</button>
        </div>
        <div class="popup__panel --succed">
            <button class="popup__close">
                <svg class="svgsprite _close">
                    <use xlink:href="assets/img/sprites/svgsprites.svg#close"></use>
                </svg>
            </button>
            <div class="popup__name text-bold">Запись на прием</div>
            <h3 class="h3">Успешно !</h3>
            <p class="text-grey">Мы перезвоним Вам в ближайшее время</p>
        </div>
    </div>
    <script type="text/javascript">
        var servicesList = [{
                "value": 'Прием (осмотр, консультация врача-дерматовенеролога главного врача первичный (включает составление плана лечения)',
                "data": {
                    "tags": [{
                            "color": "yellow",
                            "tag": "Л"
                        },
                        {
                            "color": "green",
                            "tag": "Т"
                        }
                    ],
                    "price": 7000
                }
            },
            {
                "value": 'Дерматологический пилинг Cosmedix Purity ретиноевый',
                "data": {
                    "tags": [{
                        "color": "yellow",
                        "tag": "Л"
                    }, ],
                    "price": 7000
                }
            },
            {
                "value": 'Дерматологический пилинг Enerpeel Jessners салициловый-резорциновый',
                "data": {
                    "tags": [{
                            "color": "yellow",
                            "tag": "Л"
                        },
                        {
                            "color": "green",
                            "tag": "Т"
                        }
                    ],
                    "price": 7000
                }
            },
            {
                "value": 'Дерматологический пилинг для кожи с гиперпигментацией "SC Pigment Balancing Peel"',
                "data": {
                    "tags": [{
                            "color": "yellow",
                            "tag": "Л"
                        },
                        {
                            "color": "green",
                            "tag": "Т"
                        }
                    ],
                    "price": 7000
                }
            }
        ];

        $(function () {
            $('#popup-services-list').autocomplete({
                noCache: true,
                minChars: 1,
                //            delimiter    : ',',
                lookup: servicesList,
                beforeRender: function (container, suggestions) {
                    var CNT = $(container);
                    $(container).addClass('search__drop').html('');
                    $(suggestions).each(function (index) {
                        var PRICE = new Intl.NumberFormat('ru-RU').format(this.data.price);
                        var TAGS = $('<div></div>').addClass('search__drop-tags');
                        $(this.data.tags).each(function () {
                            TAGS.append(
                                $('<div></div>').addClass(
                                    'search__drop-tag --' + this.color).text(
                                    this.tag)
                            );
                        });
                        CNT.append(
                            $('<label></label>').addClass(
                                'search__drop-item autocomplete-suggestion').attr({
                                "data-index": index
                            }).append(
                                $('<div></div>').addClass('search__drop-name').text(this
                                    .value)
                            ).append(
                                $('<div></div>').addClass('search__drop-right').append(
                                    TAGS).append(
                                    $('<div></div>').addClass('search__drop-summ').text(
                                        PRICE + ' ₽')
                                )
                                /*.append(
                                $('<div></div>').addClass('search__drop-check').append(
                                    $('<div></div>').addClass('checkbox').append(
                                        $('<input type="checkbox">')
                                    ).append(
                                        $('<span></span>')
                                    )
                                )
                            ) */
                            )
                        )
                    });
                },
                onSelect: function (suggestion) {
                    console.log(suggestion.value);
                }
            });
        });
    </script>
    <div class="popup --analize-type">
        <div class="popup__overlay"></div>
        <div class="popup__panel">
            <button class="popup__close">
                <svg class="svgsprite _close">
                    <use xlink:href="assets/img/sprites/svgsprites.svg#close"></use>
                </svg>
            </button>
            <div class="popup__name text-bold">Расшифровка анализов</div>
            <div class="text-bold mb-20">Тип события</div>
            <div class="popups__text-chexboxs">
                <label class="text-radio">
                    <input type="radio" name="status"><span>В клинике</span>
                </label>
                <label class="text-radio switch-blocks">
                    <input type="radio" name="status"><span>Онлайн</span>
                </label>
            </div>
            <p class="text-grey mb-30">Нажмите на способ получения анализа</p>
            <button class="btn btn--black popup__change --openpopup" data-popup="--pay-one">Далее</button>
        </div>
    </div>

    <div class="popup --pay">
        <div class="popup__overlay"></div>
        <div class="popup__panel">
            <button class="popup__close">
                <svg class="svgsprite _close">
                    <use xlink:href="assets/img/sprites/svgsprites.svg#close"></use>
                </svg>
            </button>
            <div class="popup__name text-bold">Расшифровка анализов</div>
            <h3 class="h3">В ближайшее время с вами свяжутся для определения удобной даты</h3>
            <div class="text-grey text-small mb-10">Стоимость услуги</div>
            <div class="popup-summ">
                <div class="popup-summ__big">5 000 ₽</div>
                <div class="popup-summ__small">Предоплата - 1 000 ₽</div>
            </div>
            <div class="popup__description">Для подтверждения записи необходимо произвести оплату в размере 20% от
                стоимости услуги</div>
            <div class="form-bottom --flex">
                <button class="btn btn--white form__submit --switchpopup" type="button">Назад</button>
                <button class="btn btn--black form__submit --switchpopup" type="button">Внести предоплату</button>
            </div>
        </div>
        <div class="popup__panel --succed">
            <button class="popup__close">
                <svg class="svgsprite _close">
                    <use xlink:href="assets/img/sprites/svgsprites.svg#close"></use>
                </svg>
            </button>
            <div class="popup__name text-bold">Запись на прием</div>
            <h3 class="h3">Успешно !</h3>
            <p class="text-grey">Мы перезвоним Вам в ближайшее время</p>
        </div>
    </div>

    <div class="popup --pay-one">
        <div class="popup__overlay"></div>
        <div class="popup__panel">
            <button class="popup__close">
                <svg class="svgsprite _close">
                    <use xlink:href="assets/img/sprites/svgsprites.svg#close"></use>
                </svg>
            </button>
            <div class="popup__name text-bold">Внести предоплату</div>
            <h3 class="h3">В ближайшее время с вами свяжутся для определения удобной даты</h3>
            <div class="text-grey text-small mb-10">Стоимость услуги</div>
            <div class="popup-summ --aifs mb-20">
                <div class="popup-summ__big">5 000 ₽</div>
                <div class="popup-summ__small">Предоплата - 1 000 ₽</div>
            </div>
            <div class="popup__description text-grey mb-30">Для подтверждения записи необходимо произвести оплату в
                размере 20% от стоимости услуги</div>
            <button class="btn btn--black form__submit --switchpopup" type="button">Внести предоплату</button>
        </div>
        <div class="popup__panel --succed">
            <button class="popup__close">
                <svg class="svgsprite _close">
                    <use xlink:href="assets/img/sprites/svgsprites.svg#close"></use>
                </svg>
            </button>
            <div class="popup__name text-bold">Внести предоплату</div>
            <h3 class="h3">Успешно !</h3>
            <p class="text-grey">Информация о предстоящем приеме будет доступна в Личном кабинете</p>
        </div>
    </div>

    <div class="popup --download">
        <div class="popup__overlay"></div>
        <div class="popup__panel">
            <button class="popup__close">
                <svg class="svgsprite _close">
                    <use xlink:href="assets/img/sprites/svgsprites.svg#close"></use>
                </svg>
            </button>
            <div class="popup__name text-bold">Расшифровка анализов</div>
            <div class="select-form">
                <div class="select input">
                    <div class="select__main">Все специалисты</div>
                    <div class="select__list">
                        <div class="select__item">Консультация врача</div>
                        <div class="select__item">Коррекция витаминно-минерального обмена (капельницы)</div>
                        <div class="select__item">Лазерный пилинг</div>
                        <div class="select__item">Липолитики</div>
                        <div class="select__item">Массаж лица</div>
                    </div>
                </div>
            </div>
            <div class="select-form">
                <div class="select input">
                    <div class="select__main">Все администраторы</div>
                    <div class="select__list">
                        <div class="select__item">Консультация врача</div>
                        <div class="select__item">Коррекция витаминно-минерального обмена (капельницы)</div>
                        <div class="select__item">Лазерный пилинг</div>
                        <div class="select__item">Липолитики</div>
                        <div class="select__item">Массаж лица</div>
                    </div>
                </div>
            </div>
            <div class="input">
                <input class="input__control daterangepickr" type="text" placeholder="За весь период">
                <div class="input__placeholder">За весь период</div>
            </div>
            <div class="input">
                <input class="input__control datebirthdaypickr" type="text" placeholder="Дата рождения">
                <div class="input__placeholder">Дата рождения</div>
            </div>
            <label class="checkbox checkbox--record">
                <input type="checkbox"><span></span>
                <div class="checbox__name">Выгрузить только список номеров</div>
            </label>
            <div class="input">
                <input class="input__control" type="tel" placeholder="Номер телефона"
                    data-inputmask="'mask': '+7 (999) 999-99-99'">
                <div class="input__placeholder">Номер телефона</div>
            </div>
            <label class="checkbox checkbox--record">
                <input type="checkbox"><span></span>
                <div class="checbox__name">Введите только список е-мейлов</div>
            </label>
            <div class="input">
                <input class="input__control" type="email" placeholder="Ваш е-мейл">
                <div class="input__placeholder">Введите е-мейл</div>
            </div><a class="btn btn--black" href="#" download> Скачать</a>
        </div>
    </div>

    <div class="popup --filter">
        <div class="popup__overlay"></div>
        <div class="popup__panel">
            <button class="popup__close">
                <svg class="svgsprite _close">
                    <use xlink:href="assets/img/sprites/svgsprites.svg#close"></use>
                </svg>
            </button>
            <div class="popup__name text-bold">Расшифровка анализов</div>
            <form class="popup__form">
                <div class="radios --flex">
                    <label class="text-radio">
                        <input type="radio" name="status2"><span>Заявка</span>
                    </label>
                    <label class="text-radio">
                        <input type="radio" name="status2"><span>Событие</span>
                    </label>
                </div>
                <div class="input">
                    <input class="input__control" type="text" placeholder="ФИО">
                    <div class="input__placeholder">ФИО</div>
                </div>
                <div class="select-form">
                    <div class="select">
                        <div class="select__main">Все услуги</div>
                        <div class="select__list">
                            <div class="select__item">Все услуги</div>
                            <div class="select__item">Все услуги</div>
                            <div class="select__item">Все услуги</div>
                            <div class="select__item">Все услуги</div>
                        </div>
                    </div>
                </div>
                <div class="input">
                    <input class="input__control" type="tel" placeholder="Телефон"
                        data-inputmask="'mask': '+7 (999) 999-99-99'">
                    <div class="input__placeholder">Телефон</div>
                </div>
                <div class="select-form">
                    <div class="select">
                        <div class="select__main">Все услуги</div>
                        <div class="select__list">
                            <div class="select__item">Все специалисты</div>
                            <div class="select__item">Все специалисты</div>
                            <div class="select__item">Все специалисты</div>
                            <div class="select__item">Все специалисты</div>
                        </div>
                    </div>
                </div>
                <div class="select-form">
                    <div class="select">
                        <div class="select__main">Статус</div>
                        <div class="select__list">
                            <div class="select__item">Статус</div>
                            <div class="select__item">Статус</div>
                            <div class="select__item">Статус</div>
                            <div class="select__item">Статус</div>
                        </div>
                    </div>
                </div>
                <div class="popup__block">
                    <p class="text-bold mb-10">Тип события</p>
                </div>
                <div class="radios --flex">
                    <label class="text-radio">
                        <input type="radio" name="status22"><span>В клинике</span>
                    </label>
                    <label class="text-radio">
                        <input type="radio" name="status22"><span>Онлайн</span>
                    </label>
                </div>
                <div class="calendar input mb-30">
                    <input class="input__control daterangepickr" type="text" placeholder="За весь период">
                    <div class="input__placeholder">За весь период</div>
                </div>
                <button class="btn btn--black">Найти</button>
            </form>
        </div>
    </div>
    <div class="popup --photo">
        <div class="popup__overlay"></div>
        <div class="popup__panel">
            <button class="popup__close">
                <svg class="svgsprite _close">
                    <use xlink:href="assets/img/sprites/svgsprites.svg#close"></use>
                </svg>
            </button>
            <div class="popup__name text-bold">Добавить фото</div>
            <form class="popup__form">
                <div class="search-form input">
                    <input class="input__control" type="text" placeholder="Выбрать пациента">
                    <div class="input__placeholder">Выбрать пациента</div>
                </div>
                <div class="input calendar mb-20">
                    <input class="input__control datepickr" type="text" placeholder="Выбрать дату посещения">
                    <div class="input__placeholder">Выбрать дату посещения</div>
                </div>
                <div class="popup-title__checkbox">
                    <p class="mb-10">Выбрать статус</p>
                    <label class="checkbox mb-10">
                        <input type="checkbox"><span></span>
                        <div class="checbox__name">Продолжительное лечение</div>
                    </label>
                </div>
                <div class="radios --flex">
                    <label class="text-radio">
                        <input type="radio" name="status233"><span>В клинике</span>
                    </label>
                    <label class="text-radio">
                        <input type="radio" name="status233"><span>Онлайн</span>
                    </label>
                </div>
                <label class="file-photo">
                    <input type="file">
                    <div class="file-photo__ico">
                        <svg class="svgsprite _file">
                            <use xlink:href="assets/img/sprites/svgsprites.svg#file"></use>
                        </svg>
                    </div>
                    <div class="file-photo__text text-grey">Для загрузки фото заполните все поля <br>Фото не должно
                        превышать 10 мб</div>
                </label>
                <button class="btn btn--white">Сохранить</button>
            </form>
        </div>
    </div>
    <div class="popup --photo-edit">
        <div class="popup__overlay"></div>
        <div class="popup__panel">
            <button class="popup__close">
                <svg class="svgsprite _close">
                    <use xlink:href="assets/img/sprites/svgsprites.svg#close"></use>
                </svg>
            </button>
            <div class="popup__name text-bold">Редактор фото</div>
            <form class="popup__form">
                <div class="edit-photo">
                    <div class="--flex --aicn">
                        <div class="edit-photo__pic"><img src="./assets/img/popup/photo.png" alt=""></div>
                        <div class="edit-photo__info">
                            <div class="edit-photo__name">Мартынова Александра Михайловна</div>
                            <div class="edit-photo__date">22.10.2021</div>
                        </div>
                    </div>
                    <div class="edit-photo__delete">
                        <svg class="svgsprite _delete">
                            <use xlink:href="assets/img/sprites/svgsprites.svg#delete"></use>
                        </svg>
                    </div>
                </div>
                <div class="search-form input">
                    <input class="input__control" type="text" placeholder="Выбрать пациента">
                    <div class="input__placeholder">Выбрать пациента</div>
                </div>
                <div class="input calendar mb-20">
                    <input class="input__control datepickr" type="text" placeholder="Выбрать дату посещения">
                    <div class="input__placeholder">Выбрать дату посещения</div>
                </div>
                <div class="popup-title__checkbox">
                    <p class="mb-10">Выбрать статус</p>
                    <label class="checkbox mb-10">
                        <input type="checkbox"><span></span>
                        <div class="checbox__name">Продолжительное лечение</div>
                    </label>
                </div>
                <div class="radios --flex">
                    <label class="text-radio">
                        <input type="radio" name="status233"><span>В клинике</span>
                    </label>
                    <label class="text-radio">
                        <input type="radio" name="status233"><span>Онлайн</span>
                    </label>
                </div>
                <label class="file-photo">
                    <input type="file">
                    <div class="file-photo__ico">
                        <svg class="svgsprite _file">
                            <use xlink:href="assets/img/sprites/svgsprites.svg#file"></use>
                        </svg>
                    </div>
                    <div class="file-photo__text text-grey">Для загрузки фото заполните все поля <br>Фото не должно
                        превышать 10 мб</div>
                </label>
                <button class="btn btn--white">Сохранить</button>
            </form>
        </div>
    </div>
    <div class="popup --create">
        <div class="popup__overlay"></div>
        <div class="popup__panel">
            <button class="popup__close">
                <svg class="svgsprite _close">
                    <use xlink:href="assets/img/sprites/svgsprites.svg#close"></use>
                </svg>
            </button>
            <div class="popup__name text-bold">Создать карточку пациента</div>
            <form class="popup__form">
                <div class="input">
                    <input class="input__control" type="text" placeholder="ФИО">
                    <div class="input__placeholder">ФИО</div>
                </div>
                <div class="input">
                    <input class="input__control datebirthdaypickr" type="text" placeholder="Дата рождения">
                    <div class="input__placeholder">Дата рождения</div>
                </div>
                <div class="input mb-30">
                    <input class="input__control" type="tel" placeholder="Номер телефона"
                        data-inputmask="'mask': '+7 (999) 999-99-99'">
                    <div class="input__placeholder">Номер телефона</div>
                </div>
                <button class="btn btn--black form__submit --switchpopup" data-popup="--code">Создать</button>
                <div class="form-bottom">После отправки заявки для пациента будет создан Личный кабинет, в&nbsp;который
                    можно попасть через кнопку &laquo;Войти&raquo; в&nbsp;верхнем меню сайта</div>
            </form>
        </div>
    </div>
    <div class="popup --create-recover">
        <div class="popup__overlay"></div>
        <div class="popup__panel">
            <button class="popup__close">
                <svg class="svgsprite _close">
                    <use xlink:href="assets/img/sprites/svgsprites.svg#close"></use>
                </svg>
            </button>
            <div class="popup__name text-bold">Создать карточку пациента</div>
            <form class="popup__form">
                <div class="input">
                    <input class="input__control" type="text" placeholder="ФИО">
                    <div class="input__placeholder">ФИО</div>
                </div>
                <div class="input">
                    <input class="input__control datebirthdaypickr" type="text" placeholder="Дата рождения">
                    <div class="input__placeholder">Дата рождения</div>
                </div><a class="--flex --jcfe mb-10" href="#"> Забыли пароль?</a>
                <div class="input mb-30">
                    <input class="input__control" type="tel" placeholder="Номер телефона"
                        data-inputmask="'mask': '+7 (999) 999-99-99'">
                    <div class="input__placeholder">Номер телефона</div>
                    <div class="phone-alert">
                        <p>Данный номер уже используется</p>
                        <svg class="svgsprite _alert-grey">
                            <use xlink:href="assets/img/sprites/svgsprites.svg#alert-grey"></use>
                        </svg>
                    </div>
                </div>
                <button class="btn btn--black form__submit --switchpopup" data-popup="--code">Создать</button>
                <div class="form-bottom">После отправки заявки для пациента создан Личный кабинет, в&nbsp;который можно
                    попасть через кнопку &laquo;Войти&raquo; в&nbsp;верхнем меню сайта</div>
            </form>
        </div>
    </div>
    <div class="popup --create-appoint">
        <div class="popup__overlay"></div>
        <div class="popup__panel">
            <button class="popup__close">
                <svg class="svgsprite _close">
                    <use xlink:href="assets/img/sprites/svgsprites.svg#close"></use>
                </svg>
            </button>
            <div class="popup__name text-bold">Записать пациента на прием</div>
            <form class="popup__form">
                <p class="text-bold text-big mb-20">Мартынова Александра Михайловна</p>
                <div class="select-form">
                    <div class="select">
                        <div class="select__main">
                            <div class="select__placeholder">Услуга</div>
                            <div class="select__values"> </div>
                        </div>
                        <div class="select__list">
                            <div class="select__item select__item--checkbox">
                                <label class="checkbox checkbox--record">
                                    <input type="checkbox"><span> </span>
                                    <div class="checbox__name --flex --aic --jcsb">
                                        <div class="select__name">Внутривенное введение лекарственных препаратов -
                                            капельница (Антиоксидантная)</div>
                                        <div>6 000 ₽</div>
                                    </div>
                                </label>
                            </div>
                            <div class="select__item select__item--checkbox">
                                <label class="checkbox checkbox--record">
                                    <input type="checkbox"><span> </span>
                                    <div class="checbox__name --flex --aic --jcsb">
                                        <div class="select__name">Дерматологический пилинг Cosmedix Purity ретиноевый
                                        </div>
                                        <div>7 000 ₽</div>
                                    </div>
                                </label>
                            </div>
                            <div class="select__item select__item--checkbox">
                                <label class="checkbox checkbox--record">
                                    <input type="checkbox"><span> </span>
                                    <div class="checbox__name --flex --aic --jcsb">
                                        <div class="select__name">Дерматологический пилинг Enerpeel Jessners
                                            салициловый-резорциновый</div>
                                        <div>7 000 ₽</div>
                                    </div>
                                </label>
                            </div>
                            <div class="select__item select__item--checkbox">
                                <label class="checkbox checkbox--record">
                                    <input type="checkbox"><span> </span>
                                    <div class="checbox__name --flex --aic --jcsb">
                                        <div class="select__name">Дерматологический пилинг для кожи с гиперпигментацией
                                            "SC Pigment Balancing Peel"</div>
                                        <div>7 000 ₽</div>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <p class="mb-10">Тип события</p>
                <div class="radios --flex">
                    <label class="text-radio">
                        <input type="radio" name="status233"><span>В клинике</span>
                    </label>
                    <label class="text-radio">
                        <input type="radio" name="status233"><span>Онлайн</span>
                    </label>
                </div>
                <div class="select-form">
                    <div class="select">
                        <div class="select__main">
                            <div class="select__placeholder">Выберите специалиста</div>
                            <div class="select__values"> </div>
                        </div>
                        <div class="select__list">
                            <div class="select__item select__item--checkbox">
                                <label class="checkbox checkbox--record">
                                    <input type="checkbox"><span> </span>
                                    <div class="checbox__name">
                                        <div class="select__name">Хачатурян Любовь Андреева 1</div>
                                    </div>
                                </label>
                            </div>
                            <div class="select__item select__item--checkbox">
                                <label class="checkbox checkbox--record">
                                    <input type="checkbox"><span> </span>
                                    <div class="checbox__name">
                                        <div class="select__name">Хачатурян Любовь Андреева 2</div>
                                    </div>
                                </label>
                            </div>
                            <div class="select__item select__item--checkbox">
                                <label class="checkbox checkbox--record">
                                    <input type="checkbox"><span> </span>
                                    <div class="checbox__name">
                                        <div class="select__name">Хачатурян Любовь Андреева 3</div>
                                    </div>
                                </label>
                            </div>
                            <div class="select__item select__item--checkbox">
                                <label class="checkbox checkbox--record">
                                    <input type="checkbox"><span> </span>
                                    <div class="checbox__name">
                                        <div class="select__name">Хачатурян Любовь Андреева 4</div>
                                    </div>
                                </label>
                            </div>
                            <div class="select__item select__item--checkbox">
                                <label class="checkbox checkbox--record">
                                    <input type="checkbox"><span> </span>
                                    <div class="checbox__name">
                                        <div class="select__name">Хачатурян Любовь Андреева 5</div>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="calendar input mb-30">
                    <input class="input__control datetimepickr" type="text" placeholder="Выбрать дату и время">
                    <div class="input__placeholder">Выбрать время и дату</div>
                </div>
                <button class="btn btn--black">Продолжить</button>
            </form>
        </div>
    </div>

    <div class="popup --download-data">
        <div class="popup__overlay"></div>
        <div class="popup__panel">
            <button class="popup__close">
                <svg class="svgsprite _close">
                    <use xlink:href="assets/img/sprites/svgsprites.svg#close"></use>
                </svg>
            </button>
            <div class="popup__name text-bold">Выгрузить данные</div>
            <form class="popup__form">
                <div class="select-form">
                    <div class="select">
                        <div class="select__main">Все услуги</div>
                        <div class="select__list">
                            <div class="select__item">Консультация врача</div>
                            <div class="select__item">Консультация врача</div>
                            <div class="select__item">Консультация врача</div>
                            <div class="select__item">Консультация врача</div>
                        </div>
                    </div>
                </div>
                <div class="select-form">
                    <div class="select">
                        <div class="select__main">Все специалисты</div>
                        <div class="select__list">
                            <div class="select__item">Специалист</div>
                            <div class="select__item">Специалист</div>
                            <div class="select__item">Специалист</div>
                        </div>
                    </div>
                </div>
                <div class="select-form">
                    <div class="select">
                        <div class="select__main">Все администраторы</div>
                        <div class="select__list">
                            <div class="select__item">Администратор</div>
                            <div class="select__item">Администратор</div>
                            <div class="select__item">Администратор</div>
                        </div>
                    </div>
                </div>
                <div class="calendar input">
                    <input class="input__control daterangepickr" type="text" placeholder="За весь период">
                    <div class="input__placeholder">За весь период</div>
                </div>
                <div class="select-form">
                    <label class="checkbox mainfilter__checkbox mb-10">
                        <input type="checkbox"><span></span>
                        <div class="checbox__name text-grey">Выгрузить только список номеров</div>
                    </label>
                    <div class="calendar input">
                        <input class="input__control" type="tel" placeholder="Номер телефона"
                            data-inputmask="'mask': '+7 (999) 999-99-99'">
                        <div class="input__placeholder">Номер телефона</div>
                    </div>
                </div>
                <div class="select-form mb-30">
                    <label class="checkbox mainfilter__checkbox mb-10">
                        <input type="checkbox"><span></span>
                        <div class="checbox__name text-grey">Введите только список е-мейлов</div>
                    </label>
                    <div class="calendar input">
                        <input class="input__control" type="email" placeholder="Введите е-мейл">
                        <div class="input__placeholder">Введите е-мейл</div>
                    </div>
                </div>
                <button class="btn btn--black">Скачать</button>
            </form>
        </div>
    </div>
</body>

<wb-jq wb="$dom->find('script:not([src]):not([type])')->attr('type','wbapp');"/>
</html>
