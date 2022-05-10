<?php
class expertsClass extends cmsFormsClass
{
    function afterItemRead(&$item) {
        $item['header'] = $item['name'];
    }
}
?>