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
			filter: {
				active: 'on'
			}
		},
		on: {
			init() {
				this.getPeriods()
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
		getPeriods(cat = null) {
			let years = []
			cat = cat == null ? '' : '&category='+cat 
			fetch("/api/v2/list/blog?@sort=year&@group=year,month&@return=year,month,date,category"+cat+'&__token='+wbapp._session.token)
				.then((res) => res.json())
				.then(function (data) {
					data = Object.assign([], data)
					years = Object.keys(data)
					years.reverse()
					filter.set('p', data)
					filter.set('y', years)
					filter.getAllMonthes()
				})
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
				alert(1)
			})
		}
	})
}

$(document).ready(function () {
	if ($('#blogFilter').length) {
		BlogFilter()
	}
})
