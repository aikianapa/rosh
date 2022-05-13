<html>
<div class="m-3" id="yongerSpace">
    <nav class="nav navbar navbar-expand-md col">
        <h3 class="tx-bold tx-spacing--2 order-1">Симптомы</h3>
        <div class="ml-auto order-2 float-right" wb-disallow="content">
            <a href="#" data-ajax="{'url':'/cms/ajax/form/{{_form}}/edit/_new','html':'modals'}" class="btn btn-primary">
                <img src="/module/myicons/24/FFFFFF/item-select-plus-add.svg" width="24" height="24" /> Добавить
            </a>
        </div>
    </nav>

    <div>
        <span class="bg-light">
            <div class="header py-2">
                <span clsss="row">
                    <div class="col-6">
                        <input type="search" class="form-control" placeholder="Поиск" data-ajax="{'target':'#{{_form}}List','filter_add':{'$or':[{ 'header': {'$like' : '$value'} } ]} }">
                    </div>
                </span>
            </div>

        </span>

        <ul class="list-group" id="{{_form}}List">
            <wb-foreach wb="{'table':'{{_form}}',
                            'render':'server',
                            'bind':'cms.list.{{_form}}',
                            'sort':'header',
                            'size':'{{_sett.page_size}}',
                            'filter': {'_site' : {'$in': [null,'{{_sett.site}}']}}
            }">
                <li class="list-group-item d-flex align-items-center">
                    <img src="/thumbc/30x30/src{{cover.0.img}}" class="wd-30 rounded-circle mg-r-15" alt="">
                    <div class="flex-grow-1">
                        <h6 class="tx-13 tx-inverse tx-semibold mg-b-0">{{header}}</h6>
                        <span class="d-block tx-11 text-muted" wb-if="'{{category}}' > ''" wb-tree="dict=srvcat&branch={{category}}">{{name}}</span>
                    </div>
                    <div class="mg-l-auto wd-150">
                        <form method="post" class="text-right m-0 cursor-pointer" data-item="{{id}}" data-form="{{_form}}">
                            <wb-var wb-if='"{{active}}" == ""' stroke="FC5A5A" else="82C43C" />
                            <input type="checkbox" name="active" class="d-none">
                            <img src="/module/myicons/24/7987a1/copy-paste-select-add-plus.svg" width="24" height="24" class="dd-copy" wb-allow="admin">
                            <img src="/module/myicons/24/7987a1/content-edit-pen.svg" width="24" height="24" class="dd-edit">
                            <img src="/module/myicons/24/{{_var.stroke}}/power-turn-on-square.1.svg" class="dd-active cursor-pointer" wb-allow="admin">
                            <img src="/module/myicons/24/FC5A5A/trash-delete-bin.2.svg" width="24" height="24" class="dd-remove" wb-allow="admin">
                        </form>
                    </div>
                </li>
            </wb-foreach>
        </ul>
    </div>
</div>

<script wb-app>
    $(document).undelegate('#{{_form}}List .dd-remove', wbapp.evClick);
    $(document).delegate('#{{_form}}List .dd-remove', wbapp.evClick, function(e) {
        let data = $(this).parents('form').data();
        wbapp.confirm('Удаление', `Удалить запись ${data.item} из таблицы ${data.form} ?`, {
                'bgcolor': 'danger'
            })
            .on('confirm', function() {
                wbapp.ajax({
                    'url': '/ajax/rmitem/' + data.form + '/' + data.item +
                        '?_confirm',
                    'update': 'cms.list.{{_form}}',
                    'html': 'modals'
                });
            });
        e.stopPropagation();
    });

    $(document).undelegate('#{{_form}}List .dd-active', wbapp.evClick);
    $(document).delegate('#{{_form}}List .dd-active', wbapp.evClick, function(e) {
        e.stopPropagation();
        let id = $(e.currentTarget).parents('form').attr('data-item');
        let form = $(e.currentTarget).parents('form').attr('data-form');
        $(e.currentTarget).parent('form').find('[name=active]').trigger('click');
        wbapp.save($(e.currentTarget), {
            'table': form,
            'id': id,
            'update': 'cms.list.{{_form}}',
            'silent': 'true'
        })
    });

    $(document).undelegate('#{{_form}}List [data-item] .dd-edit', wbapp.evClick);
    $(document).delegate('#{{_form}}List [data-item] .dd-edit', wbapp.evClick, function(e) {
        e.stopPropagation();
        let data = $(this).parents('[data-item]').data();
        wbapp.ajax({
            'url': '/cms/ajax/form/' + data.form + '/edit/' + data.item,
            'append': 'modals'
        });
    });

    $(document).undelegate('#{{_form}}List [data-item] .dd-copy', wbapp.evClick);
    $(document).delegate('#{{_form}}List [data-item] .dd-copy', wbapp.evClick, function(e) {
        e.stopPropagation();
        let data = $(this).parents('[data-item]').data();
        url = '/ajax/copy/' + data.form + '/' + data.item + '/';
        wbapp.ajax({
            'url': url,
            'item': data.item,
            'update': 'cms.list.{{_form}}'
        });
    });
</script>