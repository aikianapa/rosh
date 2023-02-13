var filter;

function BlogFilter(){

	this.blog_category = null;
	this.blog_year = null;
	this.blog_mouth = null;

	this.periods = null;
	this.id_list = [];

	this.category_container = $('.filter-select__list#category');
	this.category_items = this.category_container.find('.filter-select__item');

	this.years_container = $('.filter-select__list#years');
	this.years_items = this.years_container.find('.filter-select__item');

	this.months_container = $('.filter-select__list#months');
	this.months_items = this.months_container.find('.filter-select__item');

	this.get_data_ajax = function(){
		var _this = this, filter_params;
		filter.getDates();

		if(_this.blog_category === null){
			filter_params = {
				'id' : {'$in': _this.id_list},
			}
		}else{
			filter_params = {
				'id' : {'$in': _this.id_list},
				'category': _this.blog_category
			}
		}

		return JSON.stringify({
			target: '#blogList',
			filter_remove: 'category',
			filter_add: filter_params
		});
	}

	this.getDates = function(){
		var _this = this;

		$.ajax({
			url: '/form/blog/getDates',
			method: 'post',
			data: {
				month: this.blog_mouth,
				year: this.blog_year
			},
			async: false,
			success: function(data){
				_this.id_list = data;
			}
		})
	}
	this.months = ['', 'Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'];
	this.init = function(){
		var _this = this;

		let cat_cloned = _this.category_items.eq(0).clone();
		cat_cloned.attr('data-id', 'all').text('Все').addClass('active').prependTo(_this.category_container);

		$.ajax({
			url: '/form/blog/getPeriods',
			method: 'get',
			success: function(data){
				_this.periods = data;

				$.each(_this.periods.months, function(i, month){
					let cloned = _this.months_items.eq(0).clone();
					cloned
						.text(_this.months[parseInt(month)])
						.removeClass('active').removeClass('blank')
						.appendTo(_this.months_container);
				})
				if (_this.periods.years.indexOf('2021') == -1){
					_this.periods.years.push('2021')
				}
				if (_this.periods.years.indexOf('2022') == -1){
					_this.periods.years.push('2022')
				}
				if (_this.periods.years.indexOf('2023') == -1){
					_this.periods.years.push('2023')
				}
				$.each(_this.periods.years.reverse(), function(i, year){
					let cloned = _this.years_items.eq(0).clone();
					cloned
						.text(year)
						.removeClass('active').removeClass('blank')
						.appendTo(_this.years_container);
				})
			}
		})
	}
}


$(document).ready(function(){
	if($('div').is('#blogFilter')){
		filter = new BlogFilter();
		filter.init();

		$('.filter-select__list#months').on('click', '.filter-select__item', function(){
			let _selected = filter.months.indexOf($(this).text());
			if (_selected < 1){
				return false;
			}
			_selected = ''+_selected;
			if (_selected < 10) {
				_selected = '0' + _selected;
			}

			filter.blog_mouth = _selected;
			$(this).attr('data-ajax', filter.get_data_ajax());
		})

		$('.filter-select__list#years').on('click', '.filter-select__item', function(){
			filter.blog_year = $(this).text();
			$(this).attr('data-ajax', filter.get_data_ajax());
		})

		$('.filter-select__list#category').on('click', '.filter-select__item', function(){

			if($(this).attr('data-id') === 'all'){
				filter.blog_category = null;
			}else{
				filter.blog_category = $(this).attr('data-id');
			}

			$(this).attr('data-ajax', filter.get_data_ajax());
		})
	}
})



