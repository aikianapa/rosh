<view>
    <div class="container mb-80">
        <div class="row">
            <div class="col-lg-4"></div>
            <div class="col-lg-8">
                <div>
                    <h3 class="mb-20 h3">Оглавление</h3>
                    <wb-foreach wb="from=pagemenu&tpl=false">
                        <div>
                            <a class="link link-black" href="{{link}}">{{label}}</a>
                        </div>
                    </wb-foreach>
                </div>
            </div>
        </div>
    </div>
</view>

<edit header="Меню блоков">
    <div>
        <wb-module wb="module=yonger&mode=edit&block=common.inc" />
    </div>
    <wb-var pagemenu="{{wbNewId()}}" />
    <div id="{{_var.pagemenu}}">
        <wb-multiinput name="pagemenu">
            <div class="col-6"><input class="form-control" name="label" placeholder="Метка"></div>
            <div class="col-6">
                <div class="dropdown">
                    <input class="form-control" name="link" placeholder="Ссылка" on-click="dropdown" data-toggle="dropdown" aria-expanded="false">
                    <div class="overflow-y-auto dropdown-menu" wb-off style="height:300px">
                        {{#each blocks}}
                            {{#if active == 'on'}}
                                {{#if name !== 'page-menu'}}
                                    <div class="dropdown-item" data-id="blk{{id}}" on-click="select">
                                        <div>{{header}}</div>
                                        <div class="lh-5 tx-gray tx-normal tx-11">{{name}}</div>
                                    </div>
                                {{/if}}
                            {{/if}}
                        {{/each}}
                    </div>
                </div>

            </div>

        </wb-multiinput>
        <div>

        </div>
    </div>
    <script>
        var pm_multi = `#{{_var.pagemenu}}`
        var pm_template = $(`#{{_var.pagemenu}} .dropdown`).html()

        function pm_init(dropdown) {
            var pagemenu = new Ractive({
                el: dropdown,
                template: pm_template,
                data: {
                    blocks: []
                },
                on: {
                    dropdown() {
                        this.set('blocks', ypbrBlocks.get('blocks'));
                    },
                    select(ev) {
                        $(ev.node).closest('.dropdown').children('input')[0].value = '#' + ev.node.dataset.id
                        $(ev.node).trigger('change')
                    },
                    complete(ev) {
                        let data = JSON.parse($(dropdown).closest('wb-multiinput').children('.wb-multiinput-data').val());
                        let idx = $(dropdown).closest('.wb-multiinput-row').index()
                        let inp = $(dropdown).children('input');
                        inp.val(data[idx].link)
                    }
                }
            })
        }
        setTimeout(() => {
            $(pm_multi).find('.dropdown').each((i, dropdown) => {
                pm_init(dropdown)
            })
        }, 300)
        $(pm_multi).on('multiinput_after_add', (ev, el) => {
            pm_init($(el).find('.dropdown'))
        })
        $(pm_multi).on('multiinput_after_remove', (ev, el) => {
            $(pm_multi).find('.dropdown').each((i, dropdown) => {
                pm_init(dropdown)
            })
        })
    </script>
</edit>