<!DOCTYPE html>
<html class="no-js" lang="ru">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <title seo>Личный кабинет</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/common.css">
    <link rel="stylesheet" href="./assets/css/new.css">
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAT3JOvpJuMXozLKY-hPfjCDdEgo78vZok"></script>
    <script src="assets/js/jquery-1.12.4.min.js"></script>
    <script src="assets/js/jquery.autocomplete.min.js"></script>
    <script src="assets/js/air-datepicker.js"></script>
    <script src="assets/js/jquery.inputmask.min.js"></script>
    <script src="assets/js/swiper-bundle.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/new.js"></script>

</head>

<body class="body lk-cabinet" data-barba="wrapper">
    <div class="scroll-container" data-scroll-container>
        <div>
            <wb-module wb="module=yonger&mode=render&view=header"></wb-module>
        </div>
        <main class="page" data-barba="container" data-barba-namespace="lk-cabinet">
            <div class="container">
                <div class="account">
                    <div class="crumbs">
                        <a class="crumbs__arrow" href="#">
                            <svg class="svgsprite _crumbs-back">
                                <use xlink:href="assets/img/sprites/svgsprites.svg#crumbs-back"></use>
                            </svg>
                        </a>
                        <a class="crumbs__link" href="#">Главная</a>
                        <a class="crumbs__link" href="#">Личный кабинет</a>
                    </div>
                    <div class="title-flex --flex --jcsb">
                        <div class="title">
                            <h1 class="h1 mb-10">Личный кабинет </h1>
                        </div>
                        <button class="btn btn--black --openpopup" data-popup="--record">Записаться на прием</button>
                    </div>
                    <div class="account__panel">
                        <div class="account__info">
                            <div class="user">
                                <div class="user__name">Хамидова Лия Олеговна
                                    <button class="user__edit">
                                        <svg class="svgsprite _edit">
                                            <use xlink:href="assets/img/sprites/svgsprites.svg#edit"></use>
                                        </svg>
                                    </button>
                                </div>
                                <div class="user__group">
                                    <div class="user__birthday">Дата рождения:
                                        <span>26.08.1989</span>
                                    </div>
                                    <div class="user__phone">Тел:
                                        <span>+7 939 313 33 33</span>
                                    </div>
                                </div>
                                <div class="user__confirm">
                                    <svg class="svgsprite _confirm">
                                        <use xlink:href="assets/img/sprites/svgsprites.svg#confirm"></use>
                                    </svg>Подтвержденный аккаунт
                                </div>
                            </div>
                        </div>
                        <a href="/signout" class="account__exit">Выйти из аккаунта</a>
                        <form class="profile-edit">
                            <p class="text-bold mb-30">Редактировать профиль</p>
                            <div class="row profile-edit__wrap">
                                <div class="col-md-3">
                                    <div class="input input--grey">
                                        <input class="input__control datebirthdaypickr" type="text" placeholder="Дата рождения">
                                        <div class="input__placeholder input__placeholder--dark">Дата рождения</div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="input input--grey">
                                        <input class="input__control" type="tel" placeholder="Телефон" data-inputmask="'mask': '+7 (999) 999-99-99'">
                                        <div class="input__placeholder input__placeholder--dark">Телефон</div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="input input--grey">
                                        <input class="input__control" type="email" placeholder="E-mail">
                                        <div class="input__placeholder input__placeholder--dark">E-mail</div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <button class="btn btn--white profile-edit__submit">Сохранить</button>
                                </div>
                            </div>
                            <p class="text-bold mb-30 delivery-address">Адрес доставки</p>
                            <div class="row profile-edit__wrap">
                                <div class="col-md-9">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="input input--grey">
                                                <input class="input__control" type="text" placeholder="Страна">
                                                <div class="input__placeholder input__placeholder--dark">Страна</div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input input--grey">
                                                <input class="input__control" type="text" placeholder="Город">
                                                <div class="input__placeholder input__placeholder--dark">Город</div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input input--grey">
                                                <input class="input__control" type="text" placeholder="Улица и дом">
                                                <div class="input__placeholder input__placeholder--dark">Улица и дом
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row profile-edit__wrap">
                                <div class="col-md-9">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="input input--grey">
                                                <input class="input__control" type="text" placeholder="Кв./офис">
                                                <div class="input__placeholder input__placeholder--dark">Кв./офис</div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="input input--grey">
                                                <input class="input__control" type="text" placeholder="Домофон">
                                                <div class="input__placeholder input__placeholder--dark">Домофон</div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="input input--grey">
                                                <input class="input__control" type="text" placeholder="Подъезд">
                                                <div class="input__placeholder input__placeholder--dark">Подъезд</div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="input input--grey">
                                                <input class="input__control" type="text" placeholder="Этаж">
                                                <div class="input__placeholder input__placeholder--dark">Этаж</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <button class="btn btn--white profile-edit__submit">Сохранить</button>
                                </div>
                            </div>
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
                                        <button class="btn btn--black">Начать консультацию</button>
                                    </div>
                                    <p>Вас ожидает специалист, можете подключиться прямо сейчас</p>
                                </div>
                            </div>
                            <div class="account-events__download">
                                <div class="lk-title">Анализы</div>
                                <a class="btn btn--white" href="#" download>Скачать анализы
                                </a>
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
                                    <p>Кнопка станет активной за 5 минут до начала приема</p>
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
                                        <button class="btn btn--black --openpopup" data-popup="--pay-one">Внести предоплату
                                        </button>
                                    </div>
                                    <p>Услуга требует внесения предоплаты</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="account__history data-tab-wrapper" data-tabs="hislech">
                        <div class="account__tab-items">
                            <div class="account__tab-item data-tab-link active" data-tabs="hislech" data-tab="his">
                                История посещений</div>
                            <div class="account__tab-item data-tab-link" data-tabs="hislech" data-tab="lech">
                                Продолжительное лечение</div>
                        </div>
                        <div class="account__tab data-tab-item active" data-tab="his">
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
                                            <div class="history-item">
                                                <p>Дата</p>16.10.2021
                                            </div>
                                            <div class="history-item">
                                                <p>Время</p>08:45-09:45
                                            </div>
                                            <div class="history-item">
                                                <p>Специалисты</p>Цветкова Инна Сергеевна
                                            </div>
                                            <div class="history-item">
                                                <p>Услуги</p>Удаление образований
                                            </div>
                                            <div class="history-item">
                                                <p>Анализы</p>Нет анализов
                                            </div>
                                        </div>
                                        <div class="acount__table-list accardeon__list">
                                            <div class="analysis mb-40">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="analysis__top --aicn --flex mb-20">
                                                            <div class="analysis__title">Анализы</div>
                                                            <a class="btn btn--white" href="#" download>Скачать анализы
                                                            </a>
                                                        </div>
                                                        <div class="analysis__description">
                                                            <p class="text-bold mb-20">Выполнялись процедуры</p>
                                                            <p class="text-grey">А также предприниматели в сети интернет неоднозначны и будут
                                                                смешаны с не уникальными данными до степени совершенной неузнаваемости,
                                                                из-за чего возрастает их статус бесполезности.</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <a class="btn btn--black mb-20 --openpopup" href="#" data-popup="--analize-type">Получить расшифровку анализов
                                                        </a>
                                                        <div class="analysis__description">
                                                            <p class="text-bold mb-20">Рекомендация врача</p>
                                                            <div class="text">
                                                                <ul>
                                                                    <li>План обследования:</li>
                                                                    <li>1)Общий клинический анализ крови</li>
                                                                    <li>2)Биохимический анализ крови</li>
                                                                    <li>3)Витамин  ”Д”</li>
                                                                    <li>Требуется прохождение обследования</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="experts__worked">
                                                <div class="experts__worked-title">С вами работали</div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="expert__worked">
                                                            <div class="expert__worked-pic">
                                                                <img src="./assets/img/experts/1.jpg" alt="">
                                                            </div>
                                                            <div class="expert__worked-name">Хачатурян Любовь Андреева
                                                            </div>
                                                            <div class="expert__worked-work">Главный врач медицинского центра РОШ.</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="expert__worked">
                                                            <div class="expert__worked-pic">
                                                                <img src="./assets/img/experts/1.jpg" alt="">
                                                            </div>
                                                            <div class="expert__worked-name">Чачанидзе Елена Элгуджаевна
                                                            </div>
                                                            <div class="expert__worked-work">Врач дерматовенеролог, кандидат медицинских наук. Стаж работы
                                                                19 лет</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="acount__photos">
                                                <div class="row acount__photos-wrap">
                                                    <div class="col-md-6">
                                                        <div class="acount__photo">
                                                            <p>Фото до начала лечения</p>
                                                            <img src="./assets/img/experts/1.jpg"
                                                                alt="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="acount__photo">
                                                            <p>Фото в процессе лечения</p>
                                                            <img src="./assets/img/experts/1.jpg"
                                                                alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="account__tab data-tab-item" data-tab="lech">
                            <div class="account__table">
                                <div class="account__table-head">
                                    <div class="healing-item">Дата</div>
                                    <div class="healing-item">Услуги</div>
                                </div>
                                <div class="account__table-body">
                                    <div class="acount__table-accardeon accardeon">
                                        <div class="acount__table-main accardeon__main accardeon__click">
                                            <div class="healing-item">
                                                <p>Дата</p>16.10.2020-20.10.2021
                                            </div>
                                            <div class="healing-item">
                                                <p> Услуги</p>Лечение акне
                                            </div>
                                        </div>
                                        <div class="acount__table-list accardeon__list">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="text-bold text-big mb-20">Фото до начала лечения</div>
                                                    <div class="before-healing">
                                                        <h2 class="h2 healing__date-title">16.10.2021</h2>
                                                        <div class="before-healing__photo" style="background-image: url(../assets/img/account/1.jpg)">
                                                        </div>
                                                        <div class="healing__date">01.10.2021</div>
                                                        <div class="healing__description">Пациент жаловался на проблемную кожу</div>
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="text-bold text-big mb-20">Фото после начала лечения
                                                    </div>
                                                    <div class="after-healing">
                                                        <h2 class="h2 healing__date-title">Октябрь 2021</h2>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="after-healing__item">
                                                                    <div class="after-healing__photo" style="background-image: url(../assets/img/account/1.jpg)">
                                                                    </div>
                                                                    <div class="healing__date">20.10.2021</div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="after-healing__item">
                                                                    <div class="after-healing__photo" style="background-image: url(../assets/img/account/1.jpg)">
                                                                    </div>
                                                                    <div class="healing__date">20.10.2021</div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="after-healing__item">
                                                                    <div class="after-healing__photo" style="background-image: url(../assets/img/account/1.jpg)">
                                                                    </div>
                                                                    <div class="healing__date">20.10.2021</div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="after-healing__item">
                                                                    <div class="after-healing__photo" style="background-image: url(../assets/img/account/1.jpg)">
                                                                    </div>
                                                                    <div class="healing__date">20.10.2021</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="after-healing">
                                                        <h2 class="h2 healing__date-title">Август 2021</h2>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="after-healing__item">
                                                                    <div class="after-healing__photo" style="background-image: url(../assets/img/account/1.jpg)">
                                                                    </div>
                                                                    <div class="healing__date">20.10.2021</div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="after-healing__item">
                                                                    <div class="after-healing__photo" style="background-image: url(../assets/img/account/1.jpg)">
                                                                    </div>
                                                                    <div class="healing__date">20.10.2021</div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="after-healing__item">
                                                                    <div class="after-healing__photo" style="background-image: url(../assets/img/account/1.jpg)">
                                                                    </div>
                                                                    <div class="healing__date">20.10.2021</div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="after-healing__item">
                                                                    <div class="after-healing__photo" style="background-image: url(../assets/img/account/1.jpg)">
                                                                    </div>
                                                                    <div class="healing__date">20.10.2021</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <script>

        </script>
    </div>

            <div>
                <wb-module wb="module=yonger&mode=render&view=footer" />
            </div>
</body>
<wb-jq wb="$dom->find('script:not([src]):not([type])')->attr('type','wbapp');" />
<wb-jq wb="$dom->find('.content-wrap ul')->addClass('ul-line');" />

</html>