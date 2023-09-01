<html lang="ru">

<head>
	<meta charset="utf-8">
	<title>{{header}}</title>
	<meta name="robots" content="noindex,nofollow" wb-if="'{{_route.hostname}}'=='dev.medcenterrosh.ru'">
	<meta name="robots" content="noindex,nofollow" wb-if="'{{_route.hostname}}'=='www.dev.medcenterrosh.ru'">
</head>

<body class="body" data-barba="wrapper">
	<div class="scroll-container" data-scroll-container>
		<div>
			<wb-module wb="module=yonger&mode=render&view=header"></wb-module>
		</div>
		<main class="{{_session.user.role}}" data-barba="container" data-barba-namespace="{{_route.name}}">
			<div>
				<wb-module wb="module=yonger&mode=render" />
			</div>
			<div>
				<wb-module wb="module=yonger&mode=render&view=footer" />
			</div>
		</main>
	</div>
</body>
<wb-jq wb="$dom->find('script:not([src]):not([type])')->attr('type','wbapp');" />

</html>