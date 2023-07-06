<?php
class modMicrocode
{
    private $app;
    private $dom;
    private $mode;


    function __construct($dom)
    {
        $this->dom = &$dom;
        $this->app = &$dom->app;
        $this->init();
    }

    function init() {
        if ($this->app->vars('_route.mode') == 'show') {
            $table = $this->app->vars('_route.table');
            switch ($table) {
                case 'users':
                    $this->experts();
                    break;
                case 'pages':
                    $this->pages();
                    break;
                case 'blog':
                    $this->blog();
                    break;
                default:
                    # code...
                    break;
            }
        }
        $this->dom->remove();
    }

    function experts() {
        $tpl = $this->app->fromFile(__DIR__ .'/mc_experts.php');
        $data = [
            'fullname' => $this->dom->item['fullname'],
            'host'=> $this->app->vars('_route.host'),
            'url' => $this->app->vars('_route.url'),
            'image' => $this->dom->item['image'][0]['img'],
            'descr' => $this->dom->item['spec'],
        ];
        $tpl->fetch($data);
        $this->dom->after($tpl);
    }

    function pages() {
        $name = $this->app->vars('_route.name');
        if (in_array($name,['home','about', 'contacts'])) {
            $this->clinic();
            return;
        }
        
    }

    function clinic() {
        $tpl = $this->app->fromFile(__DIR__ . '/mc_clinic.php');
        $data = [
            'name' => $this->app->vars('_var.mc_clinic'),
            'host' => $this->app->vars('_route.host'),
            'url' => $this->app->vars('_route.url'),
            'image' => $this->dom->item['image'][0]['img'],
            'descr' => $this->dom->item['spec'],
            'phone' => $this->app->vars('_var.contactPhone'),
            'address' => $this->app->vars('_var.mc_address'),
        ];
        $tpl->fetch($data);
        $this->dom->after($tpl);
    }

    function blog() {
        $tpl = $this->app->fromFile(__DIR__ . '/mc_article.php');
        $descr = "Статья на тему: " . $this->dom->item['header'];
        foreach((array)$this->dom->item['blocks'] as $block) {
            if ($block['active'] == 'on' && in_array($block['name'],['landing-text-2', 'landing-text-2','blog-content'])) {
                $descr = wbGetWords(@strip_tags($block['text']),30);
                break;
            }
        }

        $data = [
            'name' => $this->app->vars('_var.mc_clinic'),
            'host' => $this->app->vars('_route.host'),
            'url' => $this->app->vars('_route.url'),
            'header' => $this->dom->item['header'],
            'image' => '/thumbc/600x400/src'.$this->dom->item['cover'][0]['img'],
            'image_h' => '400',
            'image_w' => '600',
            'descr' => $descr,
            'phone' => $this->app->vars('_var.contactPhone'),
            'address' => $this->app->vars('_var.mc_address'),
        ];
        $tpl->fetch($data);
        $this->dom->after($tpl);
    }
}
?>