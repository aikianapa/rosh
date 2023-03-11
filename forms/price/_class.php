<?php

class priceClass extends cmsFormsClass
{
    private $treeMaincat;
    private $dataMaincat;

    public function afterItemRead(&$item)
    {
        if (!$item) return;
        if ($this->app->vars('dataMaincat')) {
            $cats = $this->app->vars('dataMaincat');
        } else {
            $this->maincat();
            $cats = $this->dataMaincat;
            $this->app->vars('dataMaincat',$cats);
            
        }
        $item['main'] = @$cats[$item['category']];
    }

    function maincat($category = null) {
        !isset($this->treeMaincat) ? $this->treeMaincat = $this->app->wbTreeRead('shop_category')['tree']['data'] : null;
        !isset($this->dataMaincat) ? $this->dataMaincat = [] : null;

        foreach ($this->treeMaincat as $key => $value) {
            $this->dataMaincat[$key] = $key;
            $this->maincatChilds($key, $value);
        }
    }
    function maincatChilds($main, $branch) {
        $childs = @(array)$branch['children'];
        foreach ($childs as $key => $value) {
            $this->dataMaincat[$key] = $main;
            $this->maincatChilds($main, $value);
        }

    }
}
?>