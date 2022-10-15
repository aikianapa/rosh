<view head>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <!--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAT3JOvpJuMXozLKY-hPfjCDdEgo78vZok"></script>-->
    
    <wb-snippet name="wbapp"></wb-snippet>

    <wb-scripts src="scripts">
	    [
            "/assets/js/jquery.inputmask.min.js",
            "/assets/js/jquery.maskedinput.min.js",
            "/assets/js/jquery.autocomplete.min.js",
            "/assets/js/fancybox.umd.js",
            "/assets/js/jquery.serializejson.min.js",
            "/assets/js/air-datepicker.js",
	        "/assets/js/jquery.toast.min.js",
            "/assets/js/main.js",
            "/assets/js/new.js",
            "/assets/js/blogFilter.js",
            "/assets/js/auth.js"
	    ]
    </wb-scripts>

    <script type="text/javascript" src="/assets/js/swiper-bundle.min.js"></script>
    <script type="wbapp">
        $(function () {
        	wbapp.init();
            new Swiper('.main-slider', {
                loop: true,
                slidesPerView: 1,
                speed: 1000,
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true
                }
            });
        });
    </script>
   
    <!--<script type="text/javascript">-->
    <!--var __cs = __cs || [];-->
    <!--__cs.push(["setCsAccount", "VZFXRLYeQPw2Bg8xzsSHG1XSqdzBz7Ku"]);-->
    <!--</script>-->
    <!--<script type="text/javascript" async src="https://app.comagic.ru/static/cs.min.js"></script>-->
	<!---->

    <link href="/assets/css/fancybox.css" rel="stylesheet">
	<link href="/assets/css/jquery.toast.min.css" rel="stylesheet">
	<link href="/assets/css/new.css" rel="stylesheet">
    <link href="/assets/css/additional/frontend.css" rel="stylesheet">

	<link wb-if="in_array('{{_sess.user.role}}',['main','client','expert'])"
		href="/assets/css/cabinet.css?v=2"
		rel="stylesheet">
</view>

<edit header="Загрузка скриптов">
    <input name="active" value="on">
</edit>