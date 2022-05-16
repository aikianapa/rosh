<html>

<head>
    <title>{{header}}</title>
</head>

<body class="body" data-barba="wrapper">
    <div class="scroll-container" data-scroll-container>
            <div>
                <wb-module wb="module=yonger&mode=render&view=header"></wb-module>
            </div>
        <main class="page" data-barba="container" data-barba-namespace="{{_route.name}}">
        <div class="main-wrapper">
            <div class="container">
                <div class="crumbs"><a class="crumbs__arrow" href="javascript:window.history.back();">
                        <svg class="svgsprite _crumbs-back">
                            <use xlink:href="assets/img/sprites/svgsprites.svg#crumbs-back"></use>
                        </svg></a><a class="crumbs__link" href="/">Главная</a><a class="crumbs__link" href="#">Страница не найдена</a>
                </div>
                <h1 class="h1">Страница не найдена</h1>
                <div class="search search--service">
                    <div class="search__block --flex --aicn">
                        <div class="input">
                            <input class="search__input" type="text" placeholder="Поиск">
                        </div>
                        <button class="btn btn--white">Найти</button>
                    </div>
                </div>
            </div>
        </div>
            <div>
                <wb-module wb="module=yonger&mode=render&view=mainfilter" />
            </div>
            <div>
                <wb-module wb="module=yonger&mode=render&view=footer" />
            </div>
        </main>
    </div>
</body>
<wb-jq wb="$dom->find('script:not([src]):not([type])')->attr('type','wbapp');"/>
<wb-jq wb="$dom->find('.content-wrap ul')->addClass('ul-line');"/>
</html>