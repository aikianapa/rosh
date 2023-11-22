<html>
<div class="modal effect-scale show removable" id="modalPagesEdit" data-backdrop="static" tabindex="-1" role="dialog"
     aria-hidden="true">
  <div class="modal-dialog modal-xxl" role="document">
    <div class="modal-content">
      <div class="modal-header row">
        <div class="col-5">
          <h5>Редактирование услуги</h5>
        </div>
        <div class="col-7">
          <h3 class="header"></h3>
        </div>
        <i class="fa fa-close r-20 position-absolute cursor-pointer" data-dismiss="modal" aria-label="Close"></i>
      </div>
      <div class="modal-body pd-20">
        <div class="row">
          <div class="col-5 scroll-y modal-h">
            <form id="{{_form}}EditForm">
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
              <div class="form-group">
                <wb-module wb="module=filepicker&mode=single&width=800&&height=300" wb-path="/uploads/services/"
                           name="cover">
                </wb-module>
              </div>

              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-prepend">
                                            <span class="input-group-text p-1">
                                                <input name="active" wb-module="swico">
                                            </span>
                  </div>
                  <textarea name="header" class="form-control" placeholder="Наименование услуги" required></textarea>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-form-label col-sm-4">Категория</label>
                <div class="col">
                  <select class="form-control" wb-select2 multiple placeholder="" name="category">
                    <wb-foreach wb="table=catalogs&item=srvcat&from=tree.data" wb-filter="active=on">
                      <option value="{{id}}">{{name}}</option>
                    </wb-foreach>
                  </select>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-form-label col-sm-4">Направление</label>
                <div class="col">
                  <select class="form-control" wb-tree="dict=srvtype&children=false" multiple wb-select2 placeholder=""
                          name="type">
                    <option value="{{id}}">{{name}}</option>
                  </select>
                </div>
              </div>

              <wb-module wb="module=yonger&mode=structure&preset=landing"/>
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
        <wb-include wb="{'form':'common_formsave.php'}"/>
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
            <a class="list-group-item list-group-item-action" href="javascript:void(0)" data-name="{{name}}"
               onclick="yonger.yongerPageBlockAdd('{{id}}')">
              <span>{{name}}</span>
              <span class="d-block tx-11 text-muted">{{header}}</span>
            </a>
          </wb-foreach>
        </div>
      </div>
    </div>
  </div>
</div>

<script wb-app>
  yonger.pageEditor = function () {
    let $form = $('#{{_form}}EditForm');
    $form.delegate('[name=path]', 'change', function () {
      let path = $(this).val() + '/';
      $form.find('.path').html(path);
      $form.find('[name=name]').trigger('change');
    });
    $form.delegate('[name=name]', 'change keyup', function () {
      let path = $form.find('[name=path]').val() + '/';
      let name = $(this).val();
      if (path == '/' && name == 'home') name = '';
      $form.find('.path').html(path + name);
    });
    $form.find('[name=path]').trigger('change');

    $form.find('.pagelink').on(wbapp.evClick, function () {
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