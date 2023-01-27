<?php
require $_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class recordsClass extends cmsFormsClass
{
    function download() {
        $post = $this->app->vars('_post');
        $filter = [];
        $period = $post['period'] > '' ? explode(' - ', $post['period']) : (array)$post['period'];
        if (count($period)) {
            count($period) == 1 ? $period[1] = date('Y-m-d') : null;
            $filter = [
                'event_date' => [
                    '$gte' => date('Y-m-d',strtotime($period[0])),
                    '$lte' => date('Y-m-d',strtotime($period[1]))
                ]
            ];
        }
        $list = $this->app->itemList('records', ['filter'=>$filter])['list'];
        $services = $this->app->vars('_post.services') ?  (array) $this->app->vars('_post.services') : null;
        $experts = $this->app->vars('_post.experts') ? (array) $this->app->vars('_post.experts') : null;
        $admins = $this->app->vars('_post.admins') ? (array) $this->app->vars('_post.admins') : null;
        $phone = $this->app->vars('_post.phone') ? text2tel($this->app->vars('_post.phone')) : null;
        $email = $this->app->vars('_post.email') ? trim($this->app->vars('_post.email')) : null;

        $clients = $this->app->itemList('users',['filter'=>['role'=>'client']])['list'];
        $types = $this->app->itemRead('catalogs', 'quote_type')['tree']['data'];
        $pays = $this->app->itemRead('catalogs', 'quote_pay')['tree']['data'];
        $status = $this->app->itemRead('catalogs', 'quote_status')['tree']['data'];
        $specs =  $this->app->itemList('experts')['list'];
        $servs =  $this->app->itemList('services')['list'];
        $orders = [];
        $events = [];
        foreach($list as $item) {
            $flag = true;
            $client = $clients[$item['client']];
            $item['experts'] = (array)$item['experts'];
            $item['services'] = (array)$item['services'];
            $item['admins'] = (array)$item['admins'];
            if ($services) {
                foreach($services as $srv) {
                    in_array($srv, (array)$item['services']) ? null : $flag = false;
                }
            }
            if ($experts) {
                foreach ($experts as $exp) {
                    in_array($exp, (array)$item['experts']) ? null : $flag = false;
                }
            }
            if ($admins) {
                foreach ($admins as $adm) {
                    in_array($adm, (array)$item['admins']) ? null : $flag = false;
                }
            }
            if ($phone && $phone !== text2tel($client['phone'])) {
                $flag = false;
            }

            if ($email && $email !== trim($client['email'])) {
                $flag = false;
            }

            if ($flag === true) {
                foreach($item['experts'] as &$expert) {
                    $expert = $specs[$expert]['fullname'];
                }

                foreach ($item['services'] as &$serv) {
                    $serv = $servs[$serv]['header'];
                }
                $res = [
                        'Дата'      => date('d.m.Y H:i', strtotime($item['_created'])),
                        'Приём'     => date('d.m.Y H:i', strtotime(date('Y-m-d',strtotime($item['event_date'])). ' '.$item['event_time_start'])),
                        'Ф.И.О.'    => $client['fullname'],
                        'Телефон'   => wbPhoneFormat($clients[$item['client']]['phone']),
                        'Эл.почта'  => $client['email'],
                        'Специалист'=> implode(",\r\n", $item['experts']),
                        'Тип'       => $types[$item['type']]['name'],
                        'Услуги'    => implode(",\r\n", $item['services']),
                        'Оплата'    => $pays[$item['pay_status']]['name'],
                        'Статус'    => $status[$item['status']]['name'],
                        'Комментарий' => $item['comment']
                ];

                if (date('Y', strtotime($res['Приём'])) < 2022) {
                    $res['Приём'] = '';
                }

                if ($this->app->vars('_post.only_phones') == 'on') {
                    foreach($res as $key => $val) {
                        if (!in_array($key, ['Ф.И.О.','Телефон'])) unset($res[$key]);
                    }
                }

                if ($this->app->vars('_post.only_emails') == 'on') {
                    foreach ($res as $key => $val) {
                        if (!in_array($key, ['Ф.И.О.','Эл.почта'])) {
                            unset($res[$key]);
                        }
                    }
                }

                if ($item['group'] == 'events') {
                    $events[] = $res;
                } else {
                    $orders[] = $res;
                }

            } 
        }
        $result = ['События'=> $events, 'Заявки'=>$orders];

    // События
    $spreadsheet = new Spreadsheet();
    $idx = 0;
    foreach($result as $key => $data) {
        if (count($data)) {
            if ($idx > 0) {
                $spreadsheet->createSheet();
                $sheet = $spreadsheet->setActiveSheetIndex($idx);
            } else {
                $sheet = $spreadsheet->getActiveSheet();
            }
            $sheet->setTitle($key);

            $sheet->fromArray(array_keys($data[0]), null, 'A1');
            $sheet->fromArray($data, null, 'A2');

            $sheet->getStyle('E1:E999')->getAlignment()->setWrapText(true);
            $sheet->getStyle('G1:G999')->getAlignment()->setWrapText(true);
            $sheet->getStyle('A1:Z1')->getFont()->setBold(true);

            $sheet->getColumnDimension('A')->setWidth('17');
            $sheet->getColumnDimension('B')->setWidth('17');
            $sheet->getColumnDimension('C')->setWidth('30');
            $sheet->getColumnDimension('D')->setWidth('16');
            $sheet->getColumnDimension('E')->setWidth('20');
            $sheet->getColumnDimension('F')->setWidth('30');
            $sheet->getColumnDimension('G')->setWidth('15');
            $sheet->getColumnDimension('H')->setWidth('40');
            $sheet->getColumnDimension('I')->setWidth('15');
            $sheet->getColumnDimension('J')->setWidth('20');
            $sheet->getColumnDimension('K')->setWidth('30');
            $idx++;
        }
    }

    // redirect output to client browser
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="export.xlsx"');
    header('Cache-Control: max-age=0');
    $writer = new Xlsx($spreadsheet);
    $writer->save('php://output');



    }

}