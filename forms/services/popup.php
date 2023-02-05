<html>

<h2 class="mb-20 h2">{{header}}</h2>
<div class="popup__img"><img src="/thumbc/750x287/src{{cover.0.img}}" alt=""></div>
<wb-var text="" />
<wb-foreach wb="from=blocks&tpl=false&parent=false" wb-filter="active=on&text>=">
    <div class="text text-break" wb-if="'{{_var.text}}' == '' && '{{trim(strip_tags({{text}}))}}'>'a'">
        <wb-var text="{{text}}" />
        {{wbGetWords({{_var.text}},150)}}
    </div>
</wb-foreach>
<a class="btn btn--black" href="{{yongerFurl()}}">Читать подробнее</a>

</html>