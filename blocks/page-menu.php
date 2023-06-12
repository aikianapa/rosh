<view>
    <div>
        <wb-foreach wb="from=pagemenu&tpl=false">
            <div><a href="{{link}}">{{label}}</a></div>
        </wb-foreach>
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
                    <div class="dropdown-menu" wb-off>
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
        var pagemenu = new Ractive({
            el: `#{{_var.pagemenu}}`,
            template: $(`#{{_var.pagemenu}}`).html(),
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
                }
            }
        })
    </script>
</edit>