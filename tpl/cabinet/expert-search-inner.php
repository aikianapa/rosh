<!DOCTYPE html>
<html class="no-js" lang="ru">
<head>
    <title seo>Кабинет специалиста</title>
</head>

<body class="body lk-cabinet" data-barba="wrapper">
    <div class="scroll-container" data-scroll-container>
        <div>
            <wb-module wb="module=yonger&mode=render&view=header"></wb-module>
        </div>
        <main class="page" data-barba="container" data-barba-namespace="lk-cabinet" >
            <div class="account">
                <form class="search" action="/cabinet/search">
                    <div class="container">
                        <div class="crumbs"><a class="crumbs__arrow" href="#">
                                <svg class="svgsprite _crumbs-back">
                                    <use xlink:href="assets/img/sprites/svgsprites.svg#crumbs-back"></use>
                                </svg>
                            </a><a class="crumbs__link" href="/">Главная</a>
                            <span class="crumbs__link" href="/cabinet">Кабинет специалиста</span>
                            <span class="crumbs__link">Поиск</span>
                        </div>
                        <h1 class="h1 mb-40">Кабинет специалиста</h1>
                        <div class="search__block --flex --aicn">
                            <div class="input">
                                <input class="search__input" type="text" name="q" placeholder="Поиск">
                            </div>
                            <button class="btn btn--black">Найти</button>
                        </div>
                    </div>
                </form>
                <div class="search-result">
                    {{#with client}}
                    <div class="container">
                        <div class="lk-title">Карточка пациента</div>
                        <div class="account__panel">
                            <div class="account__info">
                                <div class="user">
                                    <div class="user__name">{{fullname}}</div>
                                    <div class="user__group">
                                        <div class="user__birthday">Дата рождения: <span>{{birthdate}}</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="lk-title">История посещений</div>
                        <div class="account__table">
                            <div class="account__table-head">
                                <div class="history-item">Дата</div>
                                <div class="history-item">Время</div>
                                <div class="history-item">Специалисты</div>
                                <div class="history-item">Услуги</div>
                                <div class="history-item">Анализы</div>
                            </div>
                            <div class="account__table-body">
                                {{#each client.results}}
                                <div class="acount__table-accardeon accardeon">
                                    <div class="acount__table-main accardeon__main accardeon__click">
                                        <div class="history-item">
                                            <p>Дата</p>{{event_date}}
                                        </div>
                                        <div class="history-item">
                                            <p>Время</p>{{event_time}}
                                        </div>
                                        <div class="history-item">
                                            <p>Специалисты</p>
                                            {{#this.experts}}
                                            <p>{{catalog.experts[this].head}}</p>
                                            {{/this.experts}}
                                        </div>
                                        <div class="history-item">
                                            <p>Услуги</p>
                                            {{#this.services}}
                                            <p>{{this.name}}</p>
                                            {{/this.services}}
                                        </div>
                                        <div class="history-item">
                                            <p>Анализы</p>
                                            {{#if this.analises}}
												Есть анализы
											{{else}}
												Нет анализов
											{{/if}}
                                        </div>
                                    </div>
                                    <div class="acount__table-list accardeon__list">
                                        <div class="account-edit__title">
                                            <p>Рекомендация врача</p>
                                            <a class="user__edit" href="#">
                                                <svg class="svgsprite _edit">
                                                    <use xlink:href="assets/img/sprites/svgsprites.svg#edit"></use>
                                                </svg>
                                            </a>
                                        </div>
                                        <textarea class="account-edit__textarea">{{this.recommendation}}</textarea>
                                        <button class="btn btn--white" on-click="@.saveRecomendation" data-record="{{this.id}}">Сохранить</button>
                                    </div>
                                </div>
                                {{else}}
                                <div class="account__panel" wb-if="'{{_route.params.q}}' == 'йцу'">
                                    <span>Ничего не найдено. Измените запрос и повторите поиск</span>
                                </div>
                                {{/each}}                                
                            </div>
                        </div>
                    </div>
                    {{/with}}
                </div>
            </div>
        </main>
        <script wbapp>
            var client_id = '{{_route.client}}';
            var cabinet = new Ractive({
                el: 'main.page',
                template: $('main.page').html(),
                data: {
                    q: '{{_route.params.q}}',
                    user: wbapp._session.user,
                    client: {}
                },
                on: {
                    init() {
                        wbapp.get('/api/v2/read/users/' + client_id, function(data) {
                            cabinet.set('client', data);
                        });
                    },
                    complete(ev) {
                        console.log('page ready');
                    }
                }
            })
        </script>
    </div>
    <div>
        <wb-module wb="module=yonger&mode=render&view=footer" />
    </div>
</body>
<wb-jq wb="$dom->find('script:not([src]):not([type])')->attr('type','wbapp');" />
<wb-jq wb="$dom->find('.content-wrap ul')->addClass('ul-line');" />

</html>