<html>
<div class="modal effect-scale show removable" id="modalPagesEdit" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xxl" role="document">
        <div class="modal-content">
            <div class="modal-header row">
                <div class="col-5">
                    <h5>Редактирование новости</h5>
                </div>
                <div class="col-7">
                    <h5 class='header'></h5>
                </div>
                <i class="fa fa-close r-20 position-absolute cursor-pointer" data-dismiss="modal" aria-label="Close"></i>
            </div>
            <div class="modal-body pd-20">
                <div class="row">
                    <div class="col-5 scroll-y modal-h">
                        <form id="{{_form}}EditForm">
                            <div>
                                <div class="form-group row align-items-center">
                                    <div class="col-8">
                                        <label class="form-control-label">Дата</label>
                                        <input type="datepicker" name="date" class="form-control" wb="module=datetimepicker" required>
                                    </div>
                                    <div class="col-4 text-center">
                                        <label class="form-control-label" for="{{_form}}SwitchItemActive">Отображать</label>
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" name="active" id="{{_form}}SwitchItemActive">
                                            <label class="custom-control-label" for="{{_form}}SwitchItemActive">&nbsp;</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">

                                    <div class="col-12 mt-1">
                                        <div class="divider-text">Обложка</div>
                                        <wb-module wb="module=filepicker&mode=single&width=800&&height=300" wb-path="/uploads/blog/" name="cover">
                                        </wb-module>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12">
                                        <input type="text" name="header" class="form-control" placeholder="Заголовок" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-10">
                                        <select name="category" class="form-control" required wb-tree="dict=blog">
                                            <option value="{{id}}">{{name}}</option>
                                        </select>
                                    </div>
                                    <div class="col-2">
                                        <label class="form-control-label" for="{{_form}}SwitchItemDone">Завершено</label>
                                        <div class="custom-control custom-switch d-inline">
                                            <input type="checkbox" class="custom-control-input" name="done" id="{{_form}}SwitchItemDone">
                                            <label class="custom-control-label" for="{{_form}}SwitchItemDone">&nbsp;</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-8">
                                        <input type="text" name="recommend_name" readonly class="form-control" placeholder="Рекомендованая новость">
                                        <input type="hidden" name="recommend_id">
                                    </div>

                                    <div class="col-2">
                                        <a href="javascript:void(0)" onclick="clearRecommend()" id="" class="btn btn-block btn-outline-secondary nobr">
                                            <span class="d-md-none d-lg-inline">Очистить</span>
                                        </a>
                                    </div>

                                    <div class="col-2">
                                        <a href="#" id="" class="btn btn-block btn-outline-secondary nobr" data-toggle="modal" data-target="#recommendModal">
                                            <span class="d-md-none d-lg-inline">Выбрать</span>
                                        </a>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-12">
                                        <input type="text" name="tags" class="form-control" placeholder="Тэги" wb="module=tagsinput">
                                    </div>
                                </div>
                            </div>
                            <wb-module wb="module=yonger&mode=structure&preset=blog" />
                        </form>
                    </div>

                    <div class="col-7 scroll-y modal-h">
                        <div id="yongerBlocksForm">
                            <form method="post">

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer pd-x-20 pd-b-20 pd-t-0 bd-t-0">
                <wb-include wb="{'form':'common_formsave.php'}" />
            </div>
        </div>
    </div>
</div>

<div class="modal effect-slide-in-right left w-50" id="recommendModal" data-backdrop="true" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center">
                <input type="text" class="form-control" id="recommend_search" placeholder="поиск">
                <i class="fa fa-close cursor-pointer ml-2" data-dismiss="modal" aria-label="Close"></i>
            </div>
            <div class="modal-body p-0 pb-5 scroll-y">
                <div class="list-group" id="">
                    <wb-foreach wb="{'table':'{{_form}}',
                        'render':'server',
                        'bind':'cms.list.{{_form}}',
                        'sort':'date:d',
                        'size':'{{_sett.page_size}}',
                        'filter': {'_site' : {'$in': [null,'{{_sett.site}}']}}
                    }">

                        <a class="list-group-item list-group-item-action" href="javascript:void(0)" onclick="add2recommend('{{id}}', '{{header}}')">
                            <span class="text-black">{{header}}</span>
                        </a>

                    </wb-foreach>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal effect-slide-in-right left w-50" id="modalPagesEditBlocks" data-backdrop="true" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <i></i>
                <i class="fa fa-close cursor-pointer" data-dismiss="modal" aria-label="Close"></i>
            </div>
            <div class="modal-body p-0 pb-5 scroll-y">
                <div class="list-group" id="{{_form}}EditFormListBlocks">
                    <wb-foreach wb="from=_null&render=client&bind=yonger.blocks">
                        <a class="list-group-item list-group-item-action" href="javascript:void(0)" data-name="{{name}}" onclick="yonger.yongerPageBlockAdd('{{id}}')">
                            <span>{{name}}</span>
                            <span class="d-block tx-11 text-muted">{{header}}</span>
                        </a>
                    </wb-foreach>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function add2recommend(id, name){
		$('input[name=recommend_id]').val(id);
		$('input[name=recommend_name]').val(name);
		$('#recommendModal').modal('hide')
    }

	function clearRecommend(){
		$('input[name=recommend_id]').val('');
		$('input[name=recommend_name]').val('');
	}

	$(document).ready(function(){
		$('#recommend_search').keyup(function(){

			var search_val = $(this).val().toLowerCase();
            var values = $('#recommendModal').find('.list-group-item-action');

			values.show();

			if(search_val !== ''){
				values.hide();
			    $.each(values, function(i, value){
					let text = $(value).find('span').text().toLowerCase();

					if(text.indexOf(search_val, 0) !== -1){
						$(value).show();
                    }
                })
            }

        })
    })
</script>

<script wb-app>
    let timeout = 50;
    yonger.pageEditor = function() {
        let $form = $('#{{_form}}EditForm');
        $form.delegate('[name=path]', 'change', function() {
            let path = $(this).val() + '/';
            $form.find('.path').html(path);
            $form.find('[name=name]').trigger('change');
        });
        $form.delegate('[name=name]', 'change keyup', function() {
            let path = $form.find('[name=path]').val() + '/';
            let name = $(this).val();
            if (path == '/' && name == 'home') name = '';
            $form.find('.path').html(path + name);
        });
        $form.find('[name=path]').trigger('change');

        $form.find('.pagelink').on(wbapp.evClick, function() {
            let url = $(this).text();
            let target = md5(url);
            window.open(url, target).focus();
        })
    }

    yonger.pageEditor();

</script>
<wb-lang>
    [ru]
    main = Основное
    prop = Вставки кода
    seo = Оптимизация
    images = Изображения
    visible = Отображать
    header = Заголовок
    [en]
    main = Main
    prop = Code injection
    seo = SEO
    images = Images
    visible = Visible
    header = Header
</wb-lang>

</html>