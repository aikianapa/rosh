<view>
    <div class="page__search">
                <template>
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
                </template>
    </div>
    <script wbapp>
        window.search = () => {
            const tables = ["services", "blog", "experts"];

            window.contentSearch = new Ractive({
                el: ".page__search",
                template: document.querySelector(".page__search template").innerHTML,
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
                const result = fetch(`/api/v2/list/${table}?header~=${searchValue}&$__token${wbapp._session.token}`).then((res) => res.json()).then((data) => {
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
</view>

<edit header="Поиск">
    <div>
        <wb-module wb="module=yonger&mode=edit&block=common.inc"/>
    </div>
</edit>
