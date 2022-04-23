<?php
class equipmentClass extends cmsFormsClass
{
    function popup() {
        $app = $this->app;
        $item = $app->itemRead('equipment',$app->route->item);
        $dom = $app->fromFile($app->route->path_app.'/tpl/content.php');
        $dom->fetch($item);
        return $dom->find('body')->inner();
    }
}

?>