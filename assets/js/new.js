$(document).ready(function(){

	//service__header
	$('.mainfilter__left .mainfilter__checkbox input').on('click', function(){
		$(this).toggleClass('act');

		function getRandomInt(max) {
		  return Math.floor(Math.random() * max);
		}

		var attr = $(this).parents('.mainfilter__checkbox').attr('data-name'),
				name = $(this).parents('.checkbox').find('.checbox__name').text(),
				letter = $(this).parents('.accardeon').find('.accardeon__name').text().substr(0,1),
				rand =  getRandomInt(30000);

		if($(this).hasClass('act') && attr == undefined){
			//console.log('1');
			var color = $(this).parents('.accardeon').find('.accardeon__name').attr('class').replace(/accardeon__name /g, '');
			$(this).attr('data-rand', rand);
			$('.mainfilter__choice-main .mainfilter__tags').append("<div class='mainfilter-tag' id='" + rand + "'><div class='mainfilter-tag__name'><div class='mainfilter-tag__delete'><svg class='svgsprite _delete'><use xlink:href='assets/img/sprites/svgsprites.svg#delete'></use></svg></div><a class='mainfilter-tag__link' href='/landing.html'>" + name + "</a></div><div class='mainfilter-tag__group " + color + " --yellow'>" + letter + "</div></div>");
		}
		else if(!$(this).hasClass('act') && attr == undefined){
			//console.log('2');
			$("#" + $(this).attr('data-rand')).remove();
			$(this).removeAttr("data-rand");
		}
		else if($(this).hasClass('act') && $(this).parents('.mainfilter__checkbox').attr('data-name')){
			//console.log('3');
			for(var i = 0; i < $('.' + attr).length; i++){
				var atts = $('.' + attr).eq(i).attr('class').replace(/checkbox mainfilter__checkbox /g, ''),
						att = $(this).parents('.checkbox').attr('data-name'),
						tt = $('.' + attr).eq(i).find('.checbox__name').text(),
						ll = $('.' + attr).eq(i).parents('.accardeon').find('.accardeon__name').text().substr(0,1),
						cc = $('.' + attr).eq(i).parents('.accardeon').find('.accardeon__name').attr('class').replace(/accardeon__name /g, '');
				
				if(!$('.' + attr).eq(i).attr('data-sp') > 0){
					rand =  getRandomInt(30000);
					$('.' + attr).eq(i).attr('data-sp', rand);
					$('.mainfilter__symptoms .mainfilter__tags').append("<div class='mainfilter-tag "+att+"' data-fof='" + atts + "'><div class='mainfilter-tag__name'><div class='mainfilter-tag__delete'><svg class='svgsprite _delete'><use xlink:href='assets/img/sprites/svgsprites.svg#delete'></use></svg></div><a class='mainfilter-tag__link' href='/landing.html'>" + tt + "</a></div><div class='mainfilter-tag__group " + cc + " --yellow'>" + ll + "</div></div>");
				}
				else{
					if($('.mainfilter__symptoms .mainfilter__tags').find('.mainfilter-tag').eq(i).attr('data-fof').indexOf(att) > 0){
						//console.log('==1');
						$('.mainfilter__symptoms .mainfilter__tags').find('.mainfilter-tag').eq(i).addClass($(this).parents('.checkbox').attr('data-name'));
					}
					else{
						//console.log('==2');
						//$('.mainfilter__symptoms .mainfilter__tags').append("<div class='mainfilter-tag "+att+"' data-fof='" + atts + "'><div class='mainfilter-tag__name'><div class='mainfilter-tag__delete'><svg class='svgsprite _delete'><use xlink:href='assets/img/sprites/svgsprites.svg#delete'></use></svg></div><a class='mainfilter-tag__link' href='/landing.html'>" + tt + "</a></div><div class='mainfilter-tag__group " + cc + " --yellow'>" + ll + "</div></div>");
					}
				}
			}
		}
		else if(!$(this).hasClass('act') && $(this).parents('.mainfilter__checkbox').attr('data-name')){
			console.log('4');
			for(var i = 0; i < $('.mainfilter__tags .mainfilter-tag').length; i++){
				if($('.mainfilter__symptoms').find('.mainfilter-tag').eq(i).hasClass(attr)){
					$('.mainfilter__symptoms').find('.mainfilter-tag').eq(i).removeClass(attr);
					if($('.mainfilter__symptoms').find('.mainfilter-tag').eq(i).attr('class').length == 14){
						$('.' + attr).eq(i).removeAttr( "data-sp" );
						$('.mainfilter__symptoms').find('.mainfilter-tag').eq(i).addClass('del');
					}
				}
			}
			setTimeout(function(){
				$('.del').remove();
			}, 10);
		}

	});


	//service__item
	$('.service__item input').on('click', function(){

		$(this).toggleClass('act');

		var text  = $(this).parents('.service__item').find('.service__name').text(),
				price = $(this).parents('.service__item').find('.service__price').text(),
				block = "<div class='all-form__service'><div class='all-form__service-name'><div class='all-form__service-delete'><svg class='svgsprite _delete'><use xlink:href='assets/img/sprites/svgsprites.svg#delete'></use></svg></div><p>" + text + "</p></div><div class='all-form__service__summ'>" + price + "</div></div>",
				summBlock  = $(this).parents('.all-tab').find('.all-form__summ p').eq(1),
				summ  = $(summBlock).text().replace(/[^0-9]/gi, ''),
				price2 = price.replace(/[^0-9]/gi, '');

		if($(this).hasClass('act')){
			$('.all-form__services').append(block);
			$(summBlock).text((+summ + +price2).toLocaleString('ru') + " ₽");
		}
		else{
			$(this).parents('.all-tab').find( ".all-form__service:contains('" + text + "')" ).remove();
			$(summBlock).text((+summ - +price2).toLocaleString('ru') + " ₽");
		}
	});

});