<?php require $_SERVER['DOCUMENT_ROOT'].'/hethong/config.php';?>
<?php
$token = $bdtvl['token_momo'];
    $dataPost = array(
        "Loai_api" => "lsgd1h",
    );
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.dichvudark.vn/api/ApiMomo",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => $dataPost,
        CURLOPT_HTTPHEADER => array(
            "Code: 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",
            "Token: $token",
            "Hour: 90"
        )
    ));
    $response = curl_exec($curl);
    curl_close($curl);
    $data2 = json_decode($response, true);
    foreach ($data2['tranList'] as $mm) {
        $tranId = $mm['tranId'];
        $partnerId = $mm['partnerId'];
        $partnerName = $mm['partnerName'];
        $amount = $mm['amount'];
        $comment = $mm['comment'];
        $io = $mm['io'];
        $now = time();
        if ($io == 1) {
            $idnap = parse_order_id($comment);
            $toz_checkidnap =  $ketnoi->query("SELECT * FROM `users` WHERE `id` = '$idnap' ")->fetch_array();
            if ($toz_checkidnap) {
                $total_trans = mysqli_fetch_assoc(mysqli_query($ketnoi, "SELECT COUNT(*) FROM `history_nap_bank` WHERE `trans_id` = '$tranId' ")) ['COUNT(*)']; 
               if ($total_trans == 0) {
                    $username =  $toz_checkidnap['username'];
                    $ketnoi->query("INSERT INTO `history_nap_bank` SET 
                  `trans_id` = '$tranId',
                  `username` = '$username',
                  `type` = 'Momo',
                  `stk` = '$partnerId',
                  `ctk` = '$partnerName',
                  `thucnhan` = '$amount',
                  `status` = 'hoantat',
                  `time` = '$now' ");
                  $create = mysqli_query($ketnoi, "UPDATE `users` SET `money`=`money`+ '$amount', `tong_nap` = `tong_nap` + '$amount' WHERE `username`='$username'");
                }
            }
        }
    }