<?php

class shopClass extends cmsFormsClass
{
    public function afterItemSave($item)
    {
        if ($this->app->route->mode == 'save') {
            $this->app->shadow('/cms/ajax/form/pages/list');
        }
    }
}
