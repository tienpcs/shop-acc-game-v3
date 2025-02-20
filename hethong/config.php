<?php
// Code được viết bởi BuiDucThanh, vui lòng không xóa để tôn trọng tác giả
session_start();
$localhost   = 'localhost';
$username   = 'igxwsxelxy_fakebill'; //user
$password = 'igxwsxelxy_fakebill'; //pass
$database  = 'igxwsxelxy_fakebill'; //database

//Recaptcha Google
$site_key = "6LdGraoqAAAAAKg_O3ii6dNSSckuJpAaLqpcOzAx";
$secret_key = "6LdGraoqAAAAAMt1rxCMWc9hhWij7IdSx2frsNVo";


$ketnoi = @mysqli_connect($localhost,$username,$password,$database) or die("lỗi kết nối database !");
@mysqli_set_charset($ketnoi,"utf8");
date_default_timezone_set('Asia/Ho_Chi_Minh');
$_SESSION['session_request'] = time();
$time = date('h:i d-m-Y');
$gio = date('H');
$now = time();
$bdtvl = $ketnoi->query("SELECT * FROM `setting` ")->fetch_array(); 

$noi_dung = $bdtvl['noi_dung_nap'];
$trang_thai_sale = $bdtvl['sale'];
$partner_id = $bdtvl['partner_id'];
$partner_key = $bdtvl['partner_key'];
$web_gach_the = $bdtvl['web_gach_the'];

include_once('SMTP/class.smtp.php');
include_once('SMTP/PHPMailerAutoload.php');
include_once('SMTP/class.phpmailer.php');

if(isset($_SESSION['session'])) {
    $session = $_SESSION['session'];
    $user = $ketnoi->query("SELECT * FROM `users` WHERE `session` = '$session' ")->fetch_array();
    $username = $user['username'];
    if(empty($user['id'])) {
    session_start();
    session_destroy();
    header('location: /');
    }
    if($user['bannd'] == 1) {
    session_start();
    session_destroy();
    header('location: /');
    }
    if($user['level'] == 3) {
    $_SESSION['ctv'] = $username;
    }else{
    unset($_SESSION['ctv']);
    }
    if($user['level'] == 9) {
    $_SESSION['admin'] = $username;
    }else{
    unset($_SESSION['admin']);
    }
}else{
    $username = "";
}

if (!empty($_SERVER['HTTP_CLIENT_IP'])) {  
$ip_address = $_SERVER['HTTP_CLIENT_IP'];  
} else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
$ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];  
} else {  
$ip_address = $_SERVER['REMOTE_ADDR'];  
}
//Mail auto
$smtp_server = $bdtvl['smtp'];
$smtp_port = $bdtvl['port_smtp'];
$smtp_gmail = $bdtvl['email_auto']; // LẤY TỰ ĐỘNG EMAIL TRONG SETTING
$smtp_pass = $bdtvl['pass_mail_auto']; // LẤY TỰ ĐỘNG PASS TRONG SETTING
function sendCSM($mail_nhan,$ten_nhan,$chu_de,$noi_dung,$bcc)
{
    global $smtp_gmail, $smtp_pass,$smtp_server,$smtp_port;
        // PHPMailer Modify
        $mail = new PHPMailer();
        $mail->SMTPDebug = 0;
        $mail ->Debugoutput = "html";
        $mail->isSMTP();
        $mail->Host = $smtp_server;
        $mail->SMTPAuth = true;
        $mail->Username = $smtp_gmail; // GMAIL STMP
        $mail->Password = $smtp_pass; // PASS STMP
        $mail->SMTPSecure = 'tls';
        $mail->Port = $smtp_port;
        $mail->setFrom($smtp_gmail, $bcc);
        $mail->addAddress($mail_nhan, $ten_nhan);
        $mail->addReplyTo($smtp_gmail, $bcc);
        $mail->isHTML(true);
        $mail->Subject = $chu_de;
        $mail->Body    = $noi_dung;
        $mail->CharSet = 'UTF-8';
        $send = $mail->send();
        return $send;
}
function BASE_URL($url)
{
    $base_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER["HTTP_HOST"];
    return $base_url .'/'. $url;
}
function parse_order_id($des, $MEMO_PREFIX)
{
    $re = '/'.$MEMO_PREFIX.'\d+/im';
    preg_match_all($re, $des, $matches, PREG_SET_ORDER, 0);
    if (count($matches) == 0) {
        return null;
    }
    // Print the entire match result
    $orderCode = $matches[0][0];
    $prefixLength = strlen($MEMO_PREFIX);
    $orderId = intval(substr($orderCode, $prefixLength));
    return $orderId ;
}
function magiamgia($magiamgia, $type, $sotien){
    global $ketnoi,$now; 
    $giamgia = $ketnoi->query("SELECT * FROM `ma_giam_gia` WHERE `magiamgia` = '$magiamgia' ")->fetch_array();
    if ($sotien < 10000) {
        return $sotien; 
    } elseif (empty($giamgia)) {
        return $sotien; 
    } elseif ($type != $giamgia['type']) {
        return $sotien; 
    } elseif ($giamgia['soluong'] == 0) {
        return $sotien; 
    } elseif ($giamgia['batdau'] > $now || $giamgia['ketthuc'] < $now) {
        return $sotien; 
    } else {
        // Apply the discount
        if ($giamgia['theo'] == 'phantram') {
            return $sotien * (100 - $giamgia['giamgia']) / 100; 
        } elseif ($giamgia['theo'] == 'sotien') {
            // Apply fixed amount discount
            if ($sotien - $giamgia['giamgia'] <= 0) {
                return $sotien; 
            } else {
                return $sotien - $giamgia['giamgia'];
            }
        } else {
            return $sotien; 
        }
    }
}
function demdong($chuoi_duong_dan) {
    $mang_duong_dan = explode("\n", $chuoi_duong_dan);
    
    $so_duong_dan = count($mang_duong_dan);
    
    return $so_duong_dan;
}
function thongtinbank($bank,$thongtin) {
    global $ketnoi;
    $bank = $ketnoi->query("SELECT * FROM `list_bank` WHERE `type` = '$bank' ")->fetch_array();
    return $bank[$thongtin];

}
function curl_get($url)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $data = curl_exec($ch);
    curl_close($ch);
    return $data;
}
function checklogin()
{
    global $username;
    if($username == "")
    {
        return die('<script type="text/javascript">if(!alert("Đăng nhập trước khi thực hiện!")){window.location.href = "/Auth/Login";}</script>');
    }
}
function facode($apikey)
{
$curl = curl_init();
curl_setopt_array($curl, array(
CURLOPT_URL => "https://".$_SERVER['HTTP_HOST']."/2fa/2fa.php?key=YGXHWNJTQWHGTPDQ",
CURLOPT_RETURNTRANSFER => true,
CURLOPT_SSL_VERIFYPEER => false,
CURLOPT_MAXREDIRS => 10,
CURLOPT_TIMEOUT => 30,
CURLOPT_CUSTOMREQUEST => "POST",
));
$response = curl_exec($curl);
curl_close($curl);
return $response;
}
function phantrang($url, $start, $total, $kmess)
{
    $out[] = ' <nav class="relative z-0 inline-flex v-pagination mx-auto v-text-1 v-light-theme">';
    $neighbors = 2;
    if ($start >= $total) $start = max(0, $total - (($total % $kmess) == 0 ? $kmess : ($total % $kmess)));
    else $start = max(0, (int)$start - ((int)$start % (int)$kmess));
    $base_link = '<li><a class="mx-1 border border-gray-400 bg-white relative v-page-no w-8 md:w-10 h-8 md:h-10 text-md md:text-lg rounded font-bold inline-flex items-center justify-center px-2 py-2 leading-5 font-medium focus:outline-none transition ease-in-out duration-150 text-gray-800 v-pagination-text disabled" href="' . strtr($url, array('%' => '%%')) . 'page=%d' . '">%s</a></li>';
    $out[] = $start == 0 ? '' : sprintf($base_link, $start / $kmess, '<svg viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5">
    <path fill-rule="evenodd"
        d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
        clip-rule="evenodd"></path>
</svg>');
    if ($start > $kmess * $neighbors) $out[] = sprintf($base_link, 1, '1');
    if ($start > $kmess * ($neighbors + 1)) $out[] = '<li class="page-item"><a class="page-link">...</a></li>';
    for ($nCont = $neighbors;$nCont >= 1;$nCont--) if ($start >= $kmess * $nCont) {
        $tmpStart = $start - $kmess * $nCont;
        $out[] = sprintf($base_link, $tmpStart / $kmess + 1, $tmpStart / $kmess + 1);
    }
    $out[] = '<li class="border mx-1 w-8 md:w-10 h-8 md:h-10 text-md md:text-lg select-none rounded inline-flex justify-center items-center px-4 py-2 focus:outline-none text-white border-red-600 text-white bg-red-600"><a class="page-link">' . ($start / $kmess + 1) . '</a></li>';
    $tmpMaxPages = (int)(($total - 1) / $kmess) * $kmess;
    for ($nCont = 1;$nCont <= $neighbors;$nCont++) if ($start + $kmess * $nCont <= $tmpMaxPages) {
        $tmpStart = $start + $kmess * $nCont;
        $out[] = sprintf($base_link, $tmpStart / $kmess + 1, $tmpStart / $kmess + 1);
    }
    if ($start + $kmess * ($neighbors + 1) < $tmpMaxPages) $out[] = '<li class="page-item"><a class="page-link">...</a></li>';
    if ($start + $kmess * $neighbors < $tmpMaxPages) $out[] = sprintf($base_link, $tmpMaxPages / $kmess + 1, $tmpMaxPages / $kmess + 1);
    if ($start + $kmess < $total)
    {
        $display_page = ($start + $kmess) > $total ? $total : ($start / $kmess + 2);
        $out[] = sprintf($base_link, $display_page, '<svg viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5">
        <path fill-rule="evenodd"
            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
            clip-rule="evenodd"></path>
    </svg>
        ');
    }
    $out[] = '</ul></nav>';
    return implode('', $out);
}
function check_string($data)
{
    return trim(htmlspecialchars(addslashes($data)));
    //return str_replace(array('<',"'",'>','?','/',"\\",'--','eval(','<php'),array('','','','','','','','',''),htmlspecialchars(addslashes(strip_tags($data))));
}
function ngay($date) {
return date('h:i d-m-Y', $date);
}
function tien($price) {
return str_replace(",", ".", number_format($price));
}


function antixss($data)
{
// Fix &entity\n;
$data = str_replace(array('&amp;', '&lt;', '&gt;'), array('&amp;amp;', '&amp;lt;', '&amp;gt;'), $data);
$data = preg_replace('/(&#*\w+)[\x00-\x20]+;/u', '$1;', $data);
$data = preg_replace('/(&#x*[0-9A-F]+);*/iu', '$1;', $data);
$data = html_entity_decode($data, ENT_COMPAT, 'UTF-8');

// Remove any attribute starting with "on" or xmlns
$data = preg_replace('#(<[^>]+?[\x00-\x20"\'])(?:on|xmlns)[^>]*+>#iu', '$1>', $data);

// Remove javascript: and vbscript: protocols
$data = preg_replace('#([a-z]*)[\x00-\x20]*=[\x00-\x20]*([`\'"]*)[\x00-\x20]*j[\x00-\x20]*a[\x00-\x20]*v[\x00-\x20]*a[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2nojavascript...', $data);
$data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*v[\x00-\x20]*b[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2novbscript...', $data);
$data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*-moz-binding[\x00-\x20]*:#u', '$1=$2nomozbinding...', $data);

// Only works in IE: <span style="width: expression(alert('Ping!'));"></span>
$data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?expression[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
$data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?behaviour[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
$data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:*[^>]*+>#iu', '$1>', $data);

// Remove namespaced elements (we do not need them)
$data = preg_replace('#</*\w+:\w[^>]*+>#i', '', $data);

do {
    // Remove really unwanted tags
    $old_data = $data;
    $data = preg_replace('#</*(?:applet|b(?:ase|gsound|link)|embed|frame(?:set)?|i(?:frame|layer)|l(?:ayer|ink)|meta|object|s(?:cript|tyle)|title|xml)[^>]*+>#i', '', $data);
} while ($old_data !== $data);
// we are done...
$xoa = htmlspecialchars(addslashes(trim($data)));
return $xoa;
}
function random($string, $int) {  
return substr(str_shuffle($string), 0, $int);
}
function dv_the($web_gach_the, $parter)
{
$url = 'https://'.$web_gach_the.'/chargingws/v2/getfee?partner_id='.$parter;
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$data = curl_exec($ch);
curl_close($ch);
return json_decode($data, true);
}
function loaitk($id, $row){
    global $ketnoi;
    $result = $ketnoi->query("SELECT * FROM `loai_tai_khoan` WHERE `id` = '$id'");
    $data = $result->fetch_array();
    return $data[$row];
}
function getdon($id, $row){
    global $ketnoi;
    $result = $ketnoi->query("SELECT * FROM `goi_caythue` WHERE `id` = '$id'");
    $data = $result->fetch_array();
    return $data[$row];
}
function getloai($id, $row){
    global $ketnoi;
    $result = $ketnoi->query("SELECT * FROM `loai_tai_khoan` WHERE `id` = '$id'");
    $data = $result->fetch_array();
    return $data[$row];
}

function capbac($data) {
if($data == 9) {
$show = 'Quản Trị viên';
} elseif($data == 3){
$show = 'Cộng tác viên';
}else {
$show = 'Thành Viên';
}
return $show;
}
function status_caythue($data) {
if ($data == "xuly") {
$show = '<span type="span" class="badge badge-warning">Đang Chờ Admin Duyệt</span>';
} else if ($data == "hoantat") {
$show = '<span type="span" class="badge badge-success">Đã Hoàn Thành</span>';
} else if ($data == "daduyet") {
$show = '<span type="span" class="badge badge-success">Admin Đã Duyệt</span>';
} else if($data == "thatbai") {
$show = '<span type="span" class="badge badge-danger">Đã Hủy Đơn</span>';
} else {
$show = '<span type="span" class="badge badge-warning">Khác</span>';
}
return $show;
}
function napthe($data) {
if ($data == "xuly") {
$show = '<span type="span" class="ws-text-white ws-px-3 ws-font-medium ws-rounded ws-bg-yellow-300 ws-text-xs ws-inline-block ws-py-1">Đang Xử Lý</span>';
} else if ($data == "hoantat") {
$show = '<span type="span" class="ws-text-white ws-px-3 ws-font-medium ws-rounded ws-bg-green-500 ws-text-xs ws-inline-block ws-py-1">Thành Công</span>';
} else if($data == "thatbai") {
$show = '<span type="span" class="ws-text-white ws-px-3 ws-font-medium ws-rounded ws-bg-red-500 ws-text-xs ws-inline-block ws-py-1">Thất Bại</span>';
} else {
$show = '<span type="span" class="ws-text-white ws-px-3 ws-font-medium ws-rounded ws-bg-orange-500 ws-text-xs ws-inline-block ws-py-1">Khác</span>';
}
return $show;
}
function caythue($data) {
if ($data == "xuly") {
$show = '<span type="span" class="ws-text-white ws-px-3 ws-font-medium ws-rounded ws-bg-yellow-300 ws-text-xs ws-inline-block ws-py-1">Đang Chờ Admin Duyệt</span>';
} else if ($data == "hoantat") {
$show = '<span type="span" class="ws-text-white ws-px-3 ws-font-medium ws-rounded ws-bg-green-500 ws-text-xs ws-inline-block ws-py-1">Đã Hoàn Thành</span>';
} else if ($data == "daduyet") {
$show = '<span type="span" class="ws-text-white ws-px-3 ws-font-medium ws-rounded ws-bg-green-500 ws-text-xs ws-inline-block ws-py-1">Admin Đã Duyệt</span>';
} else if($data == "thatbai") {
$show = '<span type="span" class="ws-text-white ws-px-3 ws-font-medium ws-rounded ws-bg-red-500 ws-text-xs ws-inline-block ws-py-1">Đã Hủy Đơn</span>';
} else {
$show = '<span type="span" class="ws-text-white ws-px-3 ws-font-medium ws-rounded ws-bg-orange-500 ws-text-xs ws-inline-block ws-py-1">Khác</span>';
}
return $show;
}
function taggame($data) {
if ($data == "banchay") {
$show = '<div class="stc-Tag"> 
<img class="lazyLoad"
    src="https://nickloqua.hiepsicode.site/assets/storage/images/tag_VJMNOQ.png">
</div>';
} else if ($data == "sale30%") {
$show = '<div class="stc-Tag"> <img class="lazyLoad"
src="https://nickloqua.hiepsicode.site/assets/storage/images/tag_C1X8HO.png">
</div>';
} else if($data == "sale50%") {
$show = '<div class="stc-Tag"> <img class="lazyLoad"
src="https://nickloqua.hiepsicode.site/assets/storage/images/tag_LY1JKS.png">
</div>';
}else if($data == "bestseller") {
$show = '<div class="stc-Tag"> <img class="lazyLoad"
src="https://nickloqua.hiepsicode.site/assets/storage/images/tag_K6TMQP.png">
</div>';
} else {
$show = '';
}
return $show;
}
    
function bannd($data) {
if ($data == 0) {
$show = '<span type="span" class="btn btn-success">Hoạt Động</span>';
} else if($data == 1) {
$show = '<span type="span" class="btn btn-danger">Band</span>';
} else {
$show = '<span type="span" class="btn btn-info">Khác</span>';
}
return $show;
}


function status($data) {
if ($data == "xuly") {
$show = '<span type="span" class="btn btn-info">Đang Xử Lý</span>';
} else if ($data == "hoantat") {
$show = '<span type="span" class="btn btn-success">Thành Công</span>';
} else if($data == "thatbai") {
$show = '<span type="span" class="btn btn-danger">Thất Bại</span>';
} else if($data == "loi") {
$show = '<span type="span" class="btn btn-warning">Lỗi</span>';
} else if($data == "saitt") {
$show = '<span type="span" class="btn btn-danger">Sai Thông Tin</span>';
}else {
$show = '<span type="span" class="btn btn-warning">Khác</span>';
}
return $show;
}

function XoaDauCach($text)
{
return trim(preg_replace('/\s+/',' ', $text));
}

function xoadau($strTitle) {
$strTitle=strtolower($strTitle);
$strTitle=trim($strTitle);
$strTitle=str_replace(' ','-',$strTitle);
$strTitle=preg_replace("/(ò|ó|ọ|ỏ|õ|ơ|ờ|ớ|ợ|ở|ỡ|ô|ồ|ố|ộ|ổ|ỗ)/",'o',$strTitle);
$strTitle=preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ|Ô|Ố|Ổ|Ộ|Ồ|Ỗ)/",'o',$strTitle);
$strTitle=preg_replace("/(à|á|ạ|ả|ã|ă|ằ|ắ|ặ|ẳ|ẵ|â|ầ|ấ|ậ|ẩ|ẫ)/",'a',$strTitle);
$strTitle=preg_replace("/(À|Á|Ạ|Ả|Ã|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ|Â|Ấ|Ầ|Ậ|Ẩ|Ẫ)/",'a',$strTitle);
$strTitle=preg_replace("/(ề|ế|ệ|ể|ê|ễ|é|è|ẻ|ẽ|ẹ)/",'e',$strTitle);
$strTitle=preg_replace("/(Ể|Ế|Ệ|Ể|Ê|Ễ|É|È|Ẻ|Ẽ|Ẹ)/",'e',$strTitle);
$strTitle=preg_replace("/(ừ|ứ|ự|ử|ư|ữ|ù|ú|ụ|ủ|ũ)/",'u',$strTitle);
$strTitle=preg_replace("/(Ừ|Ứ|Ự|Ử|Ư|Ữ|Ù|Ú|Ụ|Ủ|Ũ)/",'u',$strTitle);
$strTitle=preg_replace("/(ì|í|ị|ỉ|ĩ)/",'i',$strTitle);
$strTitle=preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/",'i',$strTitle);
$strTitle=preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/",'y',$strTitle);
$strTitle=preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/",'y',$strTitle);
$strTitle=str_replace('đ','d',$strTitle);
$strTitle=str_replace('Đ','d',$strTitle);
$strTitle=preg_replace("/[^-a-zA-Z0-9]/",'',$strTitle);
return $strTitle;
}
?>
