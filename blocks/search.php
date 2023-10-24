<view>
  <div class="page__search">
    <template>
      <div class="container">
        <div class="search__block --flex --aicn">
          <div class="input">
            <input class="search__input" type="text" name="q" placeholder="Поиск"
                   value="{{searchValue}}" on-keyup="search">
          </div>
          <button class="btn btn--black" on-click="submit">Найти</button>
        </div>
        <div class="all-tabs-items">
          <div class="all-tabs-item data-tab-link active" data-srvtype="all" data-tabs="all" on-click="switchCategory">
            Все результаты
          </div>
          {{#tabs}}
          <div class="cursor-pointer all-tabs-item data-tab-link" data-srvtype="{{key}}" data-tabs="{{key}}"
               on-click="switchCategory">
            {{name}}
          </div>
          {{/tabs}}
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
    </template>
  </div>
  <script wbapp>
    window.search = () => {
      const tables = [
        {
          key: "services",
          name: "Услуги"
        },
        {
          key: "blog",
          name: "Блоги"
        },
        {
          key: "experts",
          name: "Специалисты"
        }
      ];

      window.contentSearch = new Ractive({
        el: ".page__search",
        template: document.querySelector(".page__search template").innerHTML,
        data: {
          searchValue: sessionStorage.getItem("search"),
          res: [],
          allRes: [],
          activeTab: "all"
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
          switchCategory() {
            setTimeout(() => {
              const activeTab = document.querySelector(".data-tab-link.active").dataset.tabs;

              this.set("res", this.get("allRes").filter(el => el._table === activeTab || activeTab === "all"));
            }, 300)
          }
        }
      })
    }
    window.search();

    function getRes(tables, searchValue) {
      const results = [];
      const tabs = new Set();

      tables.forEach(table => {
        const result = fetch(`/api/v2/list/${table.key}?header~=${searchValue}&__token=${wbapp._session.token}`).then((res) => res.json()).then((data) => {
          return data.map(post => {
            post.url = `/${post._table}/${post._id}`;
            tabs.add(post._table)

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
        console.log("tabs:", tabs)

        contentSearch.set('tabs', tables.map(table => {
          if (tabs.has(table.key)) return table
        }))
        contentSearch.set('res', res);
        contentSearch.set('allRes', res);
      })
    }
  </script>
</view>

<edit header="Поиск">
  <div>
    <wb-module wb="module=yonger&mode=edit&block=common.inc"/>
  </div>
</edit>
