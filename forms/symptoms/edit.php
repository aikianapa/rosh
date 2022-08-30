<html>
<div class="modal effect-scale show removable" id="modalPagesEdit" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header row">
                <div class="col-5">
                    <h5>Редактирование симптома</h5>
                </div>
                <div class="col-7">
                    <h3 class="header"></h3>
                </div>
                <i class="fa fa-close r-20 position-absolute cursor-pointer" data-dismiss="modal" aria-label="Close"></i>
            </div>
            <div class="modal-body pd-20">
                <div class="row">
                    <div class="col-12">
                        <form id="{{_form}}EditForm">
                            <div class="form-group">
                                <wb-module wb="module=filepicker&mode=single&width=400&height=200" wb-path="/uploads/services/" name="cover">
                                </wb-module>
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text p-1">
                                            <input name="active" wb-module="swico">
                                        </span>
                                    </div>
                                    <input type="text" name="header" class="form-control" placeholder="Наименование симптома" required />
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col">
                                    <label class="col-form-label">Подзаголовок</label>
                                    <input type="text" name="subtitle" class="form-control" placeholder="Подзаголовок">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col">
                                    <label class="col-form-label">Описание</label>
                                    <textarea name="text" class="form-control" placeholder="Описание"></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col">
                                    <label class="col-form-label">Категории</label>
                                    <wb-data wb="table=catalogs&item=srvcat&field=tree">
                                        <select name="category" class="form-control" wb-select2 multiple required>
                                            <wb-foreach wb-from="data">
                                                <option value="{{_id}}" selected wb-if="'{{in_array({{_id}},{{_parent._parent.category}})}}'=='1'">
                                                    {{name}}</option>
                                                <option value="{{_id}}" wb-if="'{{in_array({{_id}},{{_parent._parent.category}})}}'!='1'">
                                                    {{name}}</option>
                                            </wb-foreach>
                                        </select>
                                    </wb-data>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-12">Связанные проблемы</label>
                                <div class="col-12">
                                    <select name="problems" class="form-control" wb-select2 multiple>
                                        <wb-foreach wb="{
                                                'table':'problems',
                                                'render':'server',
                                                'tpl':'false',
                                                'size':'999999',
                                                'filter': {'active' : 'on'}
                                            }">
                                            <option value="{{_id}}">
                                                {{header}}
                                            </option>
                                        </wb-foreach>
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
            <div class="modal-footer pd-x-20 pd-b-20 pd-t-0 bd-t-0">
                <wb-include wb="{'form':'common_formsave.php'}" />
            </div>
        </div>
    </div>
</div>

<wb-lang>
    [ru] main = Основное prop = Вставки кода seo = Оптимизация images = Изображения visible = Отображать header = Заголовок [en]
    main = Main prop = Code injection seo = SEO images = Images visible = Visible header = Header
</wb-lang>

</html>