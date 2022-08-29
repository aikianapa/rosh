<html>
<wb-var category="" />
<wb-var i="0" />
<wb-foreach wb="from=category&tpl=false">
<span wb-tree="dict=srvcat&branch={{_val}}">
    <wb-var category="{{name}}" wb-if="'{{_var.i}}' == '0'" else="{{_var.category}}, {{name}}" />
    <wb-var i="{{_var.i + 1}}" />
</span>
</wb-foreach>

<h2 data-category="{{_var.category}}" class="h2 mb-20">{{header}}</h2>
<div class="popup__img"><img src="/thumbc/750x287/src{{cover.0.img}}" alt=""></div>

<p class="text-bold text-big mb-10" wb-if="'{{subtitle}}' > ''">{{subtitle}}</p>
<div class="text text-break" wb-if="'{{text}}' > ''">{{text}}</div>

<!--a class="btn btn--black" href="/symptoms/{{wbFurlGenerate({{header}})}}">Читать подробнее</a-->
</html>