<view head>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <!--script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAT3JOvpJuMXozLKY-hPfjCDdEgo78vZok"></script-->
    <wb-snippet name="wbapp"></wb-snippet>
    <wb-scripts src="scripts">
        [
            "/assets/js/jquery.autocomplete.min.js",
            "/assets/js/air-datepicker.js",
            "/assets/js/jquery.inputmask.min.js",
            "/assets/js/swiper-bundle.min.js",
            "/assets/js/main.js"
        ]
    </wb-scripts>
    <script type="wbapp">
        $(function () {
            wbapp.init()
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
</view>

<edit header="Загрузка скриптов">
    <ipnut name="active" value="on"></ipnut>
</edit>