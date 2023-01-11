<?php
class modSelectExperts {
    public $dom;
    public $app;
    public function __construct($dom)
    {
        $this->dom = $dom;
        $this->app = $dom->app;
        $this->init();
    }
    public function init() {
        $ui = $this->app->fromFile(__DIR__ . '/selectexperts_ui.php');
        $this->dom->attr('name') > '' ? $ui->find('select')->attr('name', $this->dom->attr('name')) : null;
        $this->dom->attr('placeholder') > '' ? $ui->find('select')->attr('placeholder', $this->dom->attr('placeholder')) : null;
        $this->dom->is('[multiple]') ? $ui->find('select')->attr('multiple', 1) : null;
        $ui->fetch($this->dom->item);
        $this->dom->after($ui);
        $this->dom->remove();
    }
}
?>