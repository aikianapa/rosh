<?php
class modPaykeeper
{
    private $app;
    private $mode;


    function __construct($app)
    {
        $this->app = &$app;
        $this->init();
    }

    function init()
    {
        set_time_limit(60);
        $app = &$this->app;
        $mode = $this->mode = $app->vars('_route.mode');
        if (method_exists($this, $mode)) {
            $result = $this->$mode();
        }
    }

    function checkPay()
    {
        $secret_seed   = $this->app->vars('_sett.modules.paykeeper.secret');       // секретное слово
        $key       = $_POST['key'];
        $id       = $_POST['id'];
        $sum       = $_POST['sum'];     // сумма внесенной предоплаты сделанной клиентом (1\5 от общей суммы за услуги)
        $clientid   = $_POST['clientid']; // id клиента (таблица /users)
        $orderid     = $_POST['orderid'];  // id "события" с услугами за которое внесена предоплата (таблица /records)

        $checkClient = $this->app->itemRead('users', $clientid);
        $checkClient = $checkClient ? true : false;
        $checkOrder = $this->app->itemRead('records', $clientid);
        $checkOrder = $checkOrder && $checkOrder['pay_status'] == 'prepay' ? true : false;

        $hash = md5($id . number_format($sum, 2, ".", "") . $clientid . $orderid . $secret_seed);

        if ($key != $hash) {
            echo "Error! Hash mismatch";
            exit;
        } else {
            echo 'OK ' . $hash;
            exit;
        }
    }
}

?>
