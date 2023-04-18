<div class="modal effect-scale" id="modalPriceSelect" data-backdrop="true" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header row">
                <div class="col-7">
                    <input class="form-control" type="search" placeholder="Поиск..." data-ajax="{'target':'#priceList','filter_add':{'$or':[{ 'header': {'$like' : '$value'} }, { 'price': {'$like' : '$value'} }, { 'articul': {'$like' : '$value'} }  ]} }">
                </div>
                <div class="col-3">
                    <a href="#" data-ajax="{'url':'/cms/ajax/form/price/edit/_new','append':'modals'}" class="btn btn-primary">
                        <img src="/module/myicons/24/FFFFFF/item-select-plus-add.svg" width="24" height="24" /> Добавить
                    </a>
                </div>
                <i class="cursor-pointer fa fa-close r-20 position-absolute" data-dismiss="modal" aria-label="Close"></i>
            </div>
            <div class="modal-body pd-20">
                <div class="row">
                    <div class="col-12">
                        <ul class="list-group" id="priceList">
                            <wb-foreach wb="{'table':'price',
                            'render':'client',
                            'bind':'cms.list.price',
                            'sort':'header',
                            'size':'100',
                            'filter': {'active':'on'}
                            }">
                                <li class="list-group-item d-flex align-items-center">
                                    <div class="cursor-pointer flex-grow-1" onclick="priceSelectorSelect(this)" data-id="{{id}}" data-price_id="{{id}}" data-price="{{price}}" data-articul="{{articul}}">
                                        <small>{{articul}}</small>
                                        <h6 class="d-inline tx-13 tx-inverse tx-semibold mg-b-0"> {{header}}</h6>
                                        <span class="d-block tx-11 text-muted">{{price}} ₽</span>
                                    </div>
                                    <div class="mg-l-auto wd-150">
                                        <form method="post" class="m-0 text-right cursor-pointer" data-item="{{id}}" data-form="price">
                                            <img src="/module/myicons/24/7987a1/content-edit-pen.svg" width="24" height="24" class="dd-edit">
                                        </form>
                                    </div>
                                </li>
                            </wb-foreach>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<script>
    $(document).undelegate('#modalPriceSelect #priceList [data-item] .dd-edit', wbapp.evClick);
    $(document).delegate('#modalPriceSelect #priceList [data-item] .dd-edit', wbapp.evClick, function(e) {
        e.stopPropagation();
        let data = $(this).parents('[data-item]').data();
        if (!$(document).find('#modalPriceSelect')) {
            wbapp.ajax({
                'url': '/cms/ajax/form/' + data.form + '/edit/' + data.item,
                'append': 'modals'
            });
        }
    });

    var priceSelector = function(el) {
        $('#modalPriceSelect').modal('show')
        $('#modalPriceSelect')[0].el = el
    }

    var priceSelectorSelect = function(el) {
        let target = $('#modalPriceSelect')[0].el
        let data = $(el).data()
        data.header = $(el).children('h6').text().trim()
        $(target).closest('.row').find('[wb-name],[name]').each(function(i, inp) {
            let fld = $(inp).is('[name]') ? $(inp).attr('name') : $(inp).attr('wb-name')
            if (data[fld] !== undefined) $(inp).val(data[fld]).trigger('change')
        })
        $('#modalPriceSelect').modal('hide')
    }
</script>