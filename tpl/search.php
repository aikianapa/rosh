<!DOCTYPE html>
<html class="no-js" lang="ru">

<head>
    <title seo>Поиск</title>
    <link rel="icon" href="/favicon.svg" type="image/svg+xml">
    <link rel="stylesheet" href="/assets/css/listnav.css?v=2">
</head>

<body class="body lk-cabinet" data-barba="wrapper">
<div class="scroll-container lk-main" data-scroll-container>
    <div>
        <wb-module wb="module=yonger&mode=render&view=header"></wb-module>
    </div>
    <main class="page {{_session.user.role}}" data-barba="container" data-barba-namespace="lk-cabinet">
        <template>
            <div class="account admin">
                <div class="container">
                    <div class="crumbs">
                        <a class="crumbs__arrow" href="#">
                            <svg class="svgsprite _crumbs-back">
                                <use xlink:href="/assets/img/sprites/svgsprites.svg#crumbs-back"></use>
                            </svg>
                        </a>
                        <a class="crumbs__link" href="/">Главная</a>
                        <a class="crumbs__link" href="/search">Поиск</a>
                    </div>
                    <div class="title-flex --flex --jcsb">
                        <div class="title">
                            <h1 class="mb-10 h1">Поиск</h1>
                        </div>
                    </div>
                    <div class="search__block --flex --aicn">
                        <div class="input">
                            <input class="search__input" type="text" name="q" placeholder="Поиск"
                                   value="{{searchValue}}" on-keyup="search">
                        </div>
                        <button class="btn btn--black" on-click="submit">Найти</button>
                    </div>
                </div>

                <div class="search-result" wb-off>
                    <div class="container">
                        <div class="data-tab-item" data-tab="all">
                            <div class="all-services" id="servicesList">
                                {{#res}}
                                <a class="all-services__item" href="{{url}}" data-category="{{category}}">
                                    <div class="all-services__pic"
                                         style="background-image: url('{{cover[0].img || image[0].img}}')"></div>
                                    <div class="all-services__name">{{header}}</div>
                                </a>
                                {{/res}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </template>

    </main>
</div>
<script wbapp>
    window.search = () => {
        const tables = ["services", "blog", "experts"];

        window.contentSearch = new Ractive({
            el: ".page",
            template: document.querySelector(".page template").innerHTML,
            data: {
                searchValue: sessionStorage.getItem("search"),
                res: [],
            },
            on: {
                complete() {
                    sessionStorage.setItem("search", "");
                    const searchValue = this.get('searchValue').trim();

                    if (searchValue) {
                        getRes(tables, searchValue)
                    }
                },
                submit() {
                    const searchValue = this.get('searchValue').trim();

                    if (searchValue) {
                        getRes(tables, searchValue)
                    }
                },
                search(event) {
                    if (event.original.keyCode !== 13) return

                    const searchValue = this.get('searchValue').trim();

                    if (searchValue) {
                        getRes(tables, searchValue)
                    }
                },
            }
        })
    }
    window.search();

    function getRes(tables, searchValue) {
        const results = [];

        tables.forEach(table => {
            const result = fetch(`/api/v2/list/${table}?header~=${searchValue}`).then((res) => res.json()).then((data) => {
                return data.map(post => {
                    post.url = `/${post._table}/${post._id}`;

                    return post;
                })
            })
            results.push(result)
        })

        Promise.all(results).then(data => {
            const res = [].concat(...data).sort((a, b) => {
                const headerA = a.header.toLowerCase();
                const headerB = b.header.toLowerCase();

                if (headerA < headerB) {
                    return -1;
                }
                if (headerA > headerB) {
                    return 1;
                }
                return 0;
            });

            console.log("res:", res)

            contentSearch.set('res', res);
        })
    }
</script>

<div>
    <wb-module wb="module=yonger&mode=render&view=footer"/>
</div>

</body>
<wb-jq wb="$dom->find('script:not([src]):not([type])')->attr('type','wbapp');"/>
<wb-jq wb="$dom->find('.content-wrap ul')->addClass('ul-line');"/>

</html>