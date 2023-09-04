var BlogFilter = function () {
	var $filter = $('#blogFilter')
	if (!$filter.length) return
	var monthes = ['', 'Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь']
	var filter = new Ractive({
		el: $filter,
		template: $filter.html(),
		data: {
			c: [],
			y: [],
			m: [],
			p: [],
			t: [],
			filter: {
				active: 'on'
			}
		},
		on: {
			init() {
				this.getPeriods()
			},
			setTag(ev) {
				$filter.find('#years').prev('.select__main').text("Год")
				$filter.find('#months').prev('.select__main').text("Месяц")
				filter.set('filter.month', undefined)
				filter.set('filter.year', undefined)
				let tag = $(ev.node).attr('data-tag')
				if (tag == '*') {
					this.getPeriods()
					filter.set('filter.tags', undefined)
				} else {
					this.getPeriods();
					filter.set('filter.tags', {'$like': tag});
				}
				this.update()
			},
			setCat(ev) {
				$filter.find('#years').prev('.select__main').text("Год")
				$filter.find('#months').prev('.select__main').text("Месяц")
				filter.set('filter.month', undefined)
				filter.set('filter.year', undefined)
				let cat = $(ev.node).attr('data-id')
				if (cat == '*') {
					this.getPeriods()
					filter.set('filter.category', undefined)
				} else {
					this.getPeriods(cat)
					filter.set('filter.category', cat)
				}
				this.update()
			},
			setYear(ev) {
				let year = $(ev.node).attr('data-id')
				let list = filter.get('p.' + year)
				filter.set('m', [])
				filter.set('filter.month',undefined)
				if (year == undefined) {
					filter.set('filter.year', undefined)
					filter.getAllMonthes()
				} else {
					filter.set('filter.year', year)
					$.each(list, function (m, k) {
						filter.push('m', { num: m, name: monthes[m * 1] })
					})
				}
				$filter.find('#months').prev('.select__main').text("Месяц")
				this.update()
			},
			setMonth(ev) {
				let month = $(ev.node).attr('data-id')
				month == '*' ? filter.set('filter.month', undefined) : filter.set('filter.month', month)
				this.update()
			}
		},
		getPeriods(cat = null, tag = null) {
			let years = [];
			cat       = cat == null ? '' : '&category=' + cat;
			tag       = tag == null ? '' : '&tags~=' + tag;

			fetch("/api/v2/list/blog?@sort=year&@group=year,month&@return=year,month,date,category" + cat + tag +
			      '&__token=' + wbapp._session.token)
				.then((res) => res.json())
				.then(function (data) {
					data  = Object.assign([], data);
					years = Object.keys(data);
					years.reverse();
					filter.set('p', data);
					filter.set('y', years);
					filter.getAllMonthes();
				});
			fetch("/api/v2/list/blog?@sort=tags&@group=tags&@return=tags" + cat +
			      '&__token=' + wbapp._session.token)
				.then((res) => res.json())
				.then(function (data) {
					let _tags = Object.keys(data);
					var list  = {};
					_tags.forEach(function (tag) {
						if (!tag) {
							return;
						}
						var _sub_tags = tag.split(',');
						if (_sub_tags) {
							_sub_tags.forEach(function (sub_tag) {
								list[sub_tag] = sub_tag;
							});
						}
					});
					_tags = Object.keys(list);
					_tags.sort();
					filter.set('t', _tags);

					console.log('tags:', _tags);
				});
			setTimeout(function () {
				const _list = $('#blogList .blog-panel');
				_list.each(function () {
					var _parent   = $(this);
					var _tag_list = $(this).find('.tag-list');
					var _tags_str = _tag_list.data('tags');
					if (!_tags_str) {
						return;
					}
					var _tags = _tags_str.split(',');
					if (_tags) {
						_tags.sort();
						_tag_list.html('');
						_tags.forEach(function (tag) {
							$('<div class="blog-panel__tag invert">' + tag + '</div>').appendTo(_tag_list);
						});
						_tag_list.removeClass('d-none');
					}
				});
			});
		},
		getAllMonthes() {
			console.log(123);
			let mons = []
			let data = filter.get('p')
			data.forEach((year, id) => {
				$.each(year, (month) => {
					mons.indexOf(month) == -1 ? mons.push(month) : null
				});
			})
			mons.sort()
			filter.set('m',[])
			$.each(mons, function (i, m) {
				filter.push('m', { num: m, name: monthes[m * 1] })
			})
		},
		update() {
			let fil = {}
			let map = filter.get('filter')
			console.log(map);
			$.each(map, function (k, v) {
				if (v) fil[k] = v
			})
			$('#blogList').html('')
			wbapp.ajax({ target: "#blogList", filter: 'clear', filter_add: fil},function(){
				console.log('sssQ');
			})
		}
	})
}

$(document).ready(function () {
	if ($('#blogFilter').length) {
		BlogFilter();
		$(document).on('wb-ajax-done', function () {
			setTimeout(function () {
				const _list = $('#blogList .blog-panel');
				_list.each(function () {
					var _parent   = $(this);
					var _tag_list = $(this).find('.tag-list');
					var _tags_str = _tag_list.data('tags');
					if (!_tags_str) {
						return;
					}
					var _tags = _tags_str.split(',');
					if (_tags) {
						_tags.sort();
						_tag_list.html('');
						_tags.forEach(function (tag) {
							$('<div class="blog-panel__tag invert">' + tag + '</div>').appendTo(_tag_list);
						});
						_tag_list.removeClass('d-none');
					}
				});
			});
		});
		setTimeout(function () {
			if (!window.isMobileDevice()) {
				$('nav[data-tpl="#blogList"]').addClass('invisible').insertBefore('#blogList');
				$('nav[data-tpl="#blogList"]')[0].scrollIntoView();
			}
		}, 2000);
	}
})
