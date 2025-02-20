<?php require_once('config.php'); ?>
<?php
	$url = 'https://'.$web_gach_the.'/chargingws/v2';
    function creatSign($partner_key, $dataPost) {
        $data = array();
        $data['request_id'] = $dataPost['request_id'];
        $data['code'] = $dataPost['code'];
        $data['partner_id'] = $dataPost['partner_id'];
        $data['serial'] = $dataPost['serial'];
        $data['telco'] = $dataPost['telco'];
        $data['command'] = $dataPost['command'];
        ksort($data);
        $sign = $partner_key;
        foreach ($data as $item) {
            $sign .= $item;
        }
        return md5($sign);
    }
?>