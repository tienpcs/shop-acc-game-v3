<?php require $_SERVER['DOCUMENT_ROOT'].'/hethong/config.php';?>
<?php
$token = $bdtvl['token_vcb'];
$result = curl_get("https://api.sieuthicode.net/historyapivcb/$token");

$result = json_decode($result, true);
foreach ($result['TranList'] as $mb) {
    $tranId = explode('\\', $mb['refNo'])[0];
    $amount = $mb['creditAmount'];
    $comment = $mb['description'];
    $partnerId = $mb['accountNo'];
    $partnerName = $mb['beneficiaryAccount'];
    $idnap = parse_order_id($comment, $noi_dung);
    $now = time();
    $toz_checkidnap =  $ketnoi->query("SELECT * FROM `users` WHERE `id` = '$idnap' ")->fetch_array();
    if ($toz_checkidnap) {
       $total_trans = mysqli_fetch_assoc(mysqli_query($ketnoi, "SELECT COUNT(*) FROM `history_nap_bank` WHERE `trans_id` = '$tranId' ")) ['COUNT(*)']; 
      if ($total_trans == 0) {
            if ($amount > 0) {
                $username =  $toz_checkidnap['username'];
                $ketnoi->query("INSERT INTO `history_nap_bank` SET 
                  `trans_id` = '$tranId',
                  `username` = '$username',
                  `type` = 'VietcomBank',
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