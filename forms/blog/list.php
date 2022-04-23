<html>
<div class="m-3" id="yongerSpace">
    <nav class="nav navbar navbar-expand-md col">
        <h3 class="tx-bold tx-spacing--2 order-1">Блог</h3>
        <div class="ml-auto order-2 float-right">
            <a href="#" data-ajax="{'url':'/cms/ajax/form/blog/edit/_new','html':'modals'}" class="btn btn-primary">
                <img src="/module/myicons/24/FFFFFF/item-select-plus-add.svg" width="24" height="24" /> Добавить запись
            </a>
        </div>
    </nav>

    <div class="yonger-nested mb-1">
        <span class="bg-light">
            <div class="header p-2">
                <span clsss="row">
                    <div class="col-3">
                        <input class="form-control" type="search" placeholder="Поиск..." data-ajax="{'target':'#{{_form}}List','filter_add':{'$or':[{ 'header': {'$like' : '$value'} }, { 'tags': {'$like' : '$value'} }  ]} }">
                    </div>
                </span>
            </div>
        </span>


        <table class="table table-striped table-hover tx-15">
            <thead>
                <tr>
                    <td>Дата</td>
                    <td>Заголовок</td>
                    <td>Теги</td>
                    <!--td class="text-center">На главной</!--td-->
                    <td class="text-right">Действия</td>
                </tr>
            </thead>
            <tbody id="{{_form}}List">
                <wb-foreach wb="{'table':'{{_form}}',
                            'render':'server',
                            'bind':'cms.list.{{_form}}',
                            'sort':'date:d',
                            'size':'{{_sett.page_size}}',
                            'filter': {'_site' : {'$in': [null,'{{_sett.site}}']}}
                }">
                    <tr class="bg-transparent">
                        <td data-ajax="{'url':'/cms/ajax/form/blog/edit/{{_id}}','html':'modals'}">
                            <span class="tx-13 tx-inverse tx-semibold mg-b-0">{{date}}</span>
                        </td>
                        <td class="w-50">
                            {{header}}
                        </td>
                        <td class="w-25">
                            <wb-foreach wb="call=explode(',','{{tags}}')">
                                <small class="d-flex-inline p-1 mr-1 bg-light text-dark" wb-if="'{{_val}}'>''">{{_val}}</small>
                            </wb-foreach>
                        </td>
                        <!--td class="text-center">
                            <div class="custom-control custom-switch d-inline">
                                <input type="checkbox" class="custom-control-input" name="home" id="{{_form}}SwitchItemHome{{_idx}}" onchange="wbapp.save($(this),{'table':'{{_form}}','id':'{{_id}}','field':'home','silent':true})">
                                <label class="custom-control-label" for="{{_form}}SwitchItemHome{{_idx}}">&nbsp;</label>
                            </div>
                        </td-->
                        <td class="text-right">
                            <form method="post" class="text-right m-0 cursor-pointer"  data-item="{{id}}" data-form="{{_form}}">
                                <wb-var wb-if='"{{active}}" == ""' stroke="FC5A5A" else="82C43C" />
                                <input type="checkbox" name="active" class="d-none">
                                <img src="/module/myicons/24/7987a1/copy-paste-select-add-plus.svg" width="24" height="24" class="dd-copy" wb-allow="admin">
                                <img src="/module/myicons/24/7987a1/content-edit-pen.svg" width="24" height="24" class="dd-edit">
                                <img src="/module/myicons/24/{{_var.stroke}}/power-turn-on-square.1.svg" class="dd-active cursor-pointer" wb-allow="admin">
                                <img src="/module/myicons/24/FC5A5A/trash-delete-bin.2.svg" width="24" height="24" class="dd-remove" wb-allow="admin">
                            </form>
                        </td>
                    </tr>
                </wb-foreach>
            </tbody>
        </table>
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

</html>