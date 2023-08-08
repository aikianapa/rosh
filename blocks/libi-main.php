<view>
    <div class="landing">
        <div class="container">
            <div class="post__head">
                <div class="post__head-all">
                    <div class="post__head-wrap">
                        <div class="post__head-top">
                            <ul class="post-list">
                                <li><a href="#libi_main" class="active">Почему мы</a></li>
                                <li><a href="#libi_slider">Наши ценности</a></li>
                                <li><a href="#libi_hike">Наш подход</a></li>
                            </ul>
                            <h1 class="post-title" wb-if="'{{subheader}}'>''">{{subheader}}</h1>
                        </div>
                        <p wb-if="'{{text}}'>''" class="mb-40">{{text}}</p>

                        <div class="mb-0 callback">
                            <div class="callback__text">Закажите обратный звонок, мы ответим на все ваши вопросы</div>
                            <button class="callback__btn btn btn--black --openpopup" data-popup="--fast">Перезвонить мне</button>
                        </div>


                    </div>
                </div>
                <div class="post__head-img" wb-if="'{{cover.0.img}}'>''"><img class="radius-20 w-100p" src="{{cover.0.img}}" alt="{{_parent.header}}"></div>
            </div>
        </div>
    </div>

    <script >
		$('.post-list li a').on('click', function() {

			$('.post-list').find('li a').removeClass('active');
			$(this).addClass('active');

			let href = $(this).attr('href');

			$('html, body').animate({
				scrollTop: $(href).offset().top
			});

			return false;
		});
    </script>
</view>

<edit header="Libi - основной блок">
    <div>
        <wb-module wb="module=yonger&mode=edit&block=common.inc" />
    </div>
    <div class="form-group row">
        <label class="col-form-label col-sm-3">Подзаголовок</label>
        <div class="col-sm-9">
            <input name="subheader" class="form-control tx-bold">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-form-label col-sm-3">Текст</label>
        <div class="col-sm-9">
            <textarea name="text" rows="auto" class="form-control"></textarea>
        </div>
    </div>
    <div class="form-group">
        <label>Обложка (главное изображение)</label>
        <wb-module wb="module=filepicker&mode=single&width=780&&height=315" wb-path="/uploads/landing/cover/" name="cover">
        </wb-module>
    </div>
</edit>

