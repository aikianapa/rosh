<?php
require $_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class recordsClass extends cmsFormsClass
{
    function download() {
        $post = $this->app->vars('_post');
        $filter = [];
        $period = @$post['period'][0] > '' ? $post['period'] : [];
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
        $services = $this->app->vars('_post.services') ?  (array) $this->app->vars('_post.services') : [];
        $experts = $this->app->vars('_post.experts') ? (array) $this->app->vars('_post.experts') : [];
        $admins = $this->app->vars('_post.admins') ? (array) $this->app->vars('_post.admins') : [];
        $phone = $this->app->vars('_post.phone') ? text2tel($this->app->vars('_post.phone')) : null;
        $email = $this->app->vars('_post.email') ? trim($this->app->vars('_post.email')) : null;

        $clients = $this->app->itemList('users',['filter'=>['role'=>'client']])['list'];
        $types = $this->app->itemRead('catalogs', 'quote_type')['tree']['data'];
        $pays = $this->app->itemRead('catalogs', 'quote_pay')['tree']['data'];
        $status = $this->app->itemRead('catalogs', 'quote_status')['tree']['data'];
        $specs =  $this->app->itemList('users',['filter'=>['role'=>'expert']])['list'];

        //$servs =  $this->app->itemList('services')['list'];

        $orders = [];
        $events = [];

        foreach($list as $item) {
            $servs = [];
            $flag = true;
            $client = $clients[$item['client']];
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
                in_array($item['_creator'],(array)$admins) ? null : $flag = false;
                /*
                foreach ($admins as $adm) {
                    in_array($adm, (array)$item['admins']) ? null : $flag = false;
                }
                */
            }
            if ($phone && $phone !== text2tel($client['phone'])) {
                $flag = false;
            }

            if ($email && $email !== trim($client['email'])) {
                $flag = false;
            }

            if ($flag === true) {
                foreach(@(array)$item['experts'] as &$expert) {
                    $expert = $specs[$expert]['fullname'];
                }

                foreach (@(array)$item['service_prices'] as $serv) {
                    $servs[] = $serv['name'];
                }
                if (count($servs)) {
                    array_unshift($servs,"Назначенные услуги:");
                }
                $res = [
                        'Дата'      => date('d.m.Y H:i', strtotime($item['_created'])),
                        'Приём'     => date('d.m.Y H:i', strtotime(date('Y-m-d',strtotime($item['event_date'])). ' '.$item['event_time_start'])),
                        'Ф.И.О.'    => @$client['fullname'],
                        'Телефон'   => wbPhoneFormat(@$clients[$item['client']]['phone']),
                        'Эл.почта'  => $client['email'],
                        'Специалист'=> implode(",\r\n", @(array)$item['experts']),
                        'Тип'       => @$types[$item['type']]['name'],
                        'Услуги'    => @str_replace(["\r\n\r\n","\n\n"], ["\r\n","\n"],$item['client_comment']."\r\n".implode("\r\n", $servs)),
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
            $sheet->getStyle('E1:E999')->getAlignment()->setWrapText(true);
            $sheet->getStyle('G1:G999')->getAlignment()->setWrapText(true);
            $sheet->getStyle('H1:H999')->getAlignment()->setWrapText(true);
            $sheet->getStyle('A1:Z1')->getFont()->setBold(true);

            $sheet->fromArray(array_keys($data[0]), null, 'A1');
    //        $sheet->fromArray($data, null, 'A2');

            foreach($data as $row => $item) {
                $col = 0;
                foreach($item as $val) {
                    $sym = chr(65 + $col);
                    $cell = $sym.($row+2);
                    if ($sym == 'H') {
                        $richText = new \PhpOffice\PhpSpreadsheet\RichText\RichText();
                        $richText->createText($val);
                        $sheet->getCell($cell)->setValue($val);
                        $sheet->getStyle($cell)->getAlignment()->setWrapText(true);
                    } else {
                        $sheet->getCell($cell)->setValue($val);
                    }
                    
                    $col++;
                }
            }

/*

            */


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
    
    function meetRoomCreate() {
        $post = $this->app->vars('_post');
        $record_id = $post['record_id'] ?? '';
        if ($record_id) {
            
        }
        $end_date = date('Y-m-d', strtotime('+2 months'));
        $api_key = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJodHRwczovL2FjY291bnRzLmFwcGVhci5pbiIsImF1ZCI6Imh0dHBzOi8vYXBpLmFwcGVhci5pbi92MSIsImV4cCI6OTAwNzE5OTI1NDc0MDk5MSwiaWF0IjoxNjc1MTc0MjUwLCJvcmdhbml6YXRpb25JZCI6MTc3NzQxLCJqdGkiOiI2NzUxZGFkNS1kYTNhLTQ1OWUtOGUyZC03NWJjZmYyMmJmZDIifQ.tjy-0ZKb4nZSb3KwGPTI08bVkubU1TvzrBzTDh5Qjlk";
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, 'https://api.whereby.dev/v1/meetings');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, '{
		  "roomNamePattern": "human-short",
		  "roomNamePrefix": "online",
		  "endDate": "'.$end_date.'T00:01:00.000Z",
		  "fields": ["hostRoomUrl"]
		  }'
		);

		$headers = [
		  'Authorization: Bearer ' . $api_key,
		  'Content-Type: application/json'
		];

		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		$response = curl_exec($ch);
		$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

		curl_close($ch);
		$data = json_decode($response);
        
        //$list = $this->app->itemList('records', ['filter'=>$filter])['list'];
        if ($data){
            header('Content-type: application/json; charset=utf-8');
            return json_encode($data, JSON_UNESCAPED_UNICODE);
        }
    }
	
	function meetRoomDelete() {
        $post = $this->app->vars('_post');
        $meetingId = $post['meetingId'] ?? '';
        if (!$meetingId) {
            header('Content-type: application/json; charset=utf-8');
            return json_encode([
				'success'=>'false',
				'error'=>"param. meetingId cant be empty!"
            ], JSON_UNESCAPED_UNICODE);
        }
        $api_key = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJodHRwczovL2FjY291bnRzLmFwcGVhci5pbiIsImF1ZCI6Imh0dHBzOi8vYXBpLmFwcGVhci5pbi92MSIsImV4cCI6OTAwNzE5OTI1NDc0MDk5MSwiaWF0IjoxNjc1MTc0MjUwLCJvcmdhbml6YXRpb25JZCI6MTc3NzQxLCJqdGkiOiI2NzUxZGFkNS1kYTNhLTQ1OWUtOGUyZC03NWJjZmYyMmJmZDIifQ.tjy-0ZKb4nZSb3KwGPTI08bVkubU1TvzrBzTDh5Qjlk";
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, 'https://api.whereby.dev/v1/meetings/'.$meetingId);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
		$headers = [
		  'Authorization: Bearer ' . $api_key,
		  'Content-Type: application/json'
		];

		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		$response = curl_exec($ch);
		$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

		curl_close($ch);
		$data = json_decode($response);
        
        //$list = $this->app->itemList('records', ['filter'=>$filter])['list'];
        if ($data){
            header('Content-type: application/json; charset=utf-8');
            return json_encode($data, JSON_UNESCAPED_UNICODE);
        }
    }

}