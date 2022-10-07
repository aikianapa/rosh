<!DOCTYPE html>
<html class="no-js" lang="ru">
<head>
    <title seo>Кабинет администратора</title>
</head>

<body class="body lk-cabinet" data-barba="wrapper">
    <div class="scroll-container" data-scroll-container>
        <div>
            <wb-module wb="module=yonger&mode=render&view=header"></wb-module>
        </div>
        <main class="page" data-barba="container" data-barba-namespace="lk-cabinet" wb-off>
            <div class="account admin">
				<form class="search" action="/cabinet/search">
					<div class="container">
						<div class="crumbs">
							<a class="crumbs__arrow" href="#">
								<svg class="svgsprite _crumbs-back">
									<use xlink:href="/assets/img/sprites/svgsprites.svg#crumbs-back"></use>
								</svg>
							</a>
							<a class="crumbs__link" href="/">Главная</a>
							<a class="crumbs__link" href="/cabinet">Кабинет администратора</a>
							<span class="crumbs__link">Журнал изменений</span>
						</div>
						<div class="title-flex --flex --jcsb">
							<div class="title">
								<h1 class="h1 mb-10">Кабинет администратора </h1>
							</div>
							<a class="btn btn--black --openpopup" href="#" data-popup="--create">Создать карточку пациента</a>
						</div>
						<div class="search__block --flex --aicn">
							<div class="input">
								<input class="search__input" type="text" placeholder="Поиск" name="q">
							</div>
							<button class="btn btn--white">Найти</button>
						</div>
					</div>
				</form>
				<div class="container">
					<div class="lk-title">Журнал изменений</div>
					<div class="accoutn-scroll">
						<div class="account__table">
							<div class="account__table-head">
								<div class="changes-item">Дата / время изменения</div>
								<div class="changes-item">ФИО</div>
								<div class="changes-item">Специалист</div>
								<div class="changes-item">Услуга</div>
								<div class="changes-item">Рекомендация</div>
								<div class="changes-item">Новая рекомендация</div>
							</div>
							<div class="account__table-body">
								<div class="acount__table-accardeon accardeon">
									<div class="acount__table-main accardeon__main acount__table-auto">
										<div class="changes-item">
											<p>Дата / время изменения</p>
											<span>03.10.2022 16:23</span>
										</div>
										<div class="changes-item">
											<p>ФИО</p>
											<span>Кира Глумова</span>
										</div>
										<div class="changes-item">
											<p>Специалист</p>
											<span>Иванов Иван Алексеевич</span>
										</div>
										<div class="changes-item">
											<p>Услуга </p>
											<div>Фотолечение BBL</div>
										</div>
										<div class="changes-item">
											<p>Рекомендация</p>
											<span>Ut tortor pretium viverra suspendisse potenti nullam ac tortor vitae. Diam vel quam elementum pulvinar etiam. Rhoncus est pellentesque elit ullamcorper. Vitae tempus quam pellentesque nec nam aliquam sem.</span>
										</div>
										<div class="changes-item">
											<p>Новая рекомендация </p>
											<span>Ut tortor pretium viverra suspendisse potenti nullam ac tortor vitae.</span>
										</div>
									</div>
									<div class="acount__table-list accardeon__list"></div>
								</div>
							</div>
							<div class="account__table-body">
								<div class="acount__table-accardeon accardeon">
									<div class="acount__table-main accardeon__main acount__table-auto">
										<div class="changes-item">
											<p>Дата / время изменения</p>
											<span>03.10.2022 16:21</span>
										</div>
										<div class="changes-item">
											<p>ФИО</p>
											<span>Иванов Иван</span>
										</div>
										<div class="changes-item">
											<p>Специалист</p>
											<span>Иванов Иван Алексеевич</span>
										</div>
										<div class="changes-item">
											<p>Услуга </p>
											<div>Консультация врача</div>
										</div>
										<div class="changes-item">
											<p>Рекомендация</p>
											<span>Lorem ipsum dolor sit amet consectetur adipiscing elit ut. Suspendisse ultrices gravida dictum fusce ut placerat orci. A diam maecenas sed enim ut. Sem et tortor consequat id porta nibh venenatis cras sed. Pharetra et ultrices neque ornare aenean euismod elementum nisi. Ut sem viverra aliquet eget sit amet. Id leo in vitae turpis massa sed elementum tempus egestas</span>
										</div>
										<div class="changes-item">
											<p>Новая рекомендация </p>
											<span>Lorem ipsum dolor sit amet consectetur adipiscing elit ut.</span>
										</div>
									</div>
									<div class="acount__table-list accardeon__list"></div>
								</div>
							</div>
							<div class="account__table-head">
								<div class="changes-item">Дата / время изменения</div>
								<div class="changes-item">ФИО</div>
								<div class="changes-item">Специалист</div>
								<div class="changes-item">Услуга</div>
								<div class="changes-item">Рекомендация</div>
								<div class="changes-item">Новая рекомендация</div>
							</div>
							<div class="account__table-body">
								<div class="acount__table-accardeon accardeon --yellow">
									<div class="acount__table-main accardeon__main acount__table-auto">
										<div class="changes-item">
											<p>Дата / время изменения</p>
											<span>03.10.2022 16:20</span>
										</div>
										<div class="changes-item">
											<p>ФИО</p><span>Client Rosh</span>
										</div>
										<div class="changes-item">
											<p>Специалист</p><span>Иванов Иван Алексеевич</span>
										</div>
										<div class="changes-item">
											<p>Услуга </p>
											<div>Консультация врача</div>
											<div>Фотолечение BBL</div>
										</div>
										<div class="changes-item">
											<p>Рекомендация</p>
											<span>-</span>
										</div>
										<div class="changes-item">
											<p>Новая рекомендация </p>
											<span>Тестовая рекомендация</span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
            </div>
        </main>

        <script>
            var cabinet = new Ractive({
                el: 'main.page',
                template: $('main.page').html(),
                data: {
                    user: wbapp._session.user
                },
                on: {
                    init() {
                        //wbapp.get('/api/v2/read/users/' + wbapp._session.user.id, function(data) {
                        //    cabinet.set('user', data); /* get actually user data */
                        //});
                    },
                    profileSave(ev) {
                        //let $form = $(ev.node);
                        //let uid = cabinet.get('user.id');
                        //if ($form.verify() && uid > '') {
                        //    let data = $form.serializeJson()
                        //    data.phone = str_replace([' ','+','-','(',')'],'',data.phone)
                        //    wbapp.post('/api/v2/update/users/'+uid,data,function(res){
                        //        console.log(res);
                        //    })
                        //}
                        //return false
                    }
                }
            })
        </script>
    </div>
    <div>
        <wb-module wb="module=yonger&mode=render&view=footer" />
    </div>
    <script type='text/javascript' src='https://cdn.scaledrone.com/scaledrone.min.js'></script>
</body>
<wb-jq wb="$dom->find('script:not([src]):not([type])')->attr('type','wbapp');" />
<wb-jq wb="$dom->find('.content-wrap ul')->addClass('ul-line');" />

</html>