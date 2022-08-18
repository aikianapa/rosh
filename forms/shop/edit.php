<html>
<div class="modal effect-scale show removable" id="modalPriceEdit" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header row">
                <div class="col-5">
                    <h5>Редактирование прайса</h5>
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
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text p-1">
                                                <input name="active" wb-module="swico">
                                            </span>
                                        </div>
                                        <textarea name="header" class="form-control" placeholder="Наименование" required></textarea>
                                    </div>
                                </div>

                                <div class="col-12 mt-1">
                                        <div class="divider-text">Изображение</div>
                                        <wb-module wb="module=filepicker&mode=single&width=200&&height=200" wb-path="/uploads/shop/" name="image">
                                        </wb-module>
                                    </div>


                                <div class="form-group row">
                                    <label class="col-form-label col-sm-4">Артикул</label>
                                    <div class="col">
                                        <input name="articul" type="text" class="form-control" placeholder="Артикул">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label col-sm-4">Брэнд</label>
                                    <div class="col">
                                        <select class="form-control" wb-tree="dict=shop_category&branch=cosm&parent=false" placeholder="Брэнд" name="category" >
                                            <option value="{{id}}">{{name}}</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label col-sm-4">Короткое описание</label>
                                    <div class="col">
                                    <textarea name="short" class="form-control" placeholder="Короткое описание"></textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label col-sm-4">Полное описание</label>
                                    <div class="col">
                                    <textarea name="text" class="form-control" placeholder="Полное описание"></textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label col-sm-4">Применение</label>
                                    <div class="col">
                                    <textarea name="apply" class="form-control" placeholder="Применение"></textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label col-sm-4">Цена</label>
                                    <div class="col">
                                        <input name="price" type="number" class="form-control" placeholder="Цена" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-auto">Самовывоз</label>
                                    <div class="col col-form-label">
                                        <input wb="module=switch" name="office">
                                    </div>
                                    <label class="col-form-label col-auto">Доставка</label>
                                    <div class="col col-form-label">
                                        <input wb="module=switch" name="delivery">
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