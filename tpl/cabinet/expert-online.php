<!DOCTYPE html>
<html class="no-js" lang="ru">
<head>
	<title seo>Онлайн консультация с пациентом</title>
	<link rel="icon" href="/favicon.svg" type=" image/svg+xml">
</head>
<body class="body lk-cabinet online-consultation" data-barba="wrapper">
<div>
	<wb-module wb="module=yonger&mode=render&view=header"></wb-module>
</div>
<div class="scroll-container" data-scroll-container>
	<main class="page" data-barba="container" data-barba-namespace="lk-cabinet" wb-off style="padding-top: 40px;">
		<div class="container">
			<div class="row">
				<div class="col-md-3">&nbsp;</div>
				<div class="col-md-6 text-center"><h3 class="copy">Онлайн консультация</h3></div>
				<div class="col-md-3">&nbsp;</div>
			</div>
			<div class="row" style="height: 80vh;">
				<iframe class="meeting-online d-none" style="width:100%;height: 100%"
					src="https://subdomain.whereby.com/room?minimal"
					allow="camera; microphone; fullscreen; speaker; display-capture; autoplay"
				></iframe>
			</div>
		</div>
	</main>
</div>
<script>
	$(function () {
		const roomHash = location.hash.substring(1);
		$('.meeting-online').attr(
			'src', 'https://rosh-test.whereby.com' + roomHash /*onlinepf0zy9*/
		);
		$('header').addClass('d-none');
		$('footer').addClass('d-none');
		setTimeout(
			function () {
				$('.meeting-online').removeClass('d-none');
			}
		);
	});
</script>
<div>
	<wb-module wb="module=yonger&mode=render&view=footer"/>
</div>
</body>
<wb-jq wb="$dom->find('script:not([src]):not([type])')->attr('type','wbapp');"/>
<wb-jq wb="$dom->find('.content-wrap ul')->addClass('ul-line');"/>

</html>