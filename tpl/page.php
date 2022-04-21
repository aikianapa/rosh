<html>

<head>
    <title>{{header}}</title>
</head>

<body class="body" data-barba="wrapper">
    <div class="scroll-container" data-scroll-container>
            <div>
                <wb-module wb="module=yonger&mode=render&view=header"></wb-module>
            </div>
        <main class="" data-barba="container" data-barba-namespace="{{_route.name}}">
            <div>
                <wb-module wb="module=yonger&mode=render" />
            </div>
            <div>
                <wb-module wb="module=yonger&mode=render&view=mainfilter" />
            </div>
            <div>
                <wb-module wb="module=yonger&mode=render&view=footer" />
            </div>
        </main>
    </div>
</body>
<wb-jq wb="$dom->find('script:not([src]):not([type])')->attr('type','wbapp');"/>
</html>