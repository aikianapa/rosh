<html>

<h2 class="h2 mb-20">{{header}}</h2>
<div class="popup__img"><img src="/thumbc/750x287/src{{cover.0.img}}" alt=""></div>

<p class="text-bold text-big mb-10" wb-if="'{{blocks.landing_main.active}}' == 'on'">{{blocks.landing_main.subheader}}</p>
<div class="text text-break" wb-if="'{{blocks.landing_main.active}}' == 'on'">{{blocks.landing_main.text}}</div>

<a class="btn btn--black" href="/problems/{{wbFurlGenerate({{header}})}}">Читать подробнее</a>
</html>