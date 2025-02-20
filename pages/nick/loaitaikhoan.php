<!DOCTYPE html>
<html style="overflow-x: hidden;">

<?php require $_SERVER['DOCUMENT_ROOT'].'/hethong/head.php';?>
<?php 
if(empty($_GET['loai'])||antixss($_GET['loai']=="")){
    echo '<script type="text/javascript">if(!alert("Không tìm thấy trang !")){window.location.href = "/";}</script>';
}else{
    $id = antixss($_GET['loai']);
    $loai = $ketnoi->query("SELECT * FROM `loai_tai_khoan` WHERE `id` = '$id' AND `status` = 'ON' ")->fetch_array();
    if(empty($loai)){
        echo '<script type="text/javascript">if(!alert("Không tìm thấy trangv!")){window.location.href = "/";}</script>';
    }else{
        $ketnoi->query("UPDATE `loai_tai_khoan` SET `view` = `view` + 1 WHERE `id` = '".$id."' ");
        $id_danhmuc = $loai['danhmuc'];
        $danhmuc = $ketnoi->query("SELECT * FROM `danh_muc_tai_khoan` WHERE `id` = '$id_danhmuc' AND `status` = 'ON' ")->fetch_array();
        $id_game = $danhmuc['game'];
        $game = $ketnoi->query("SELECT * FROM `list_game` WHERE `id` = '$id_game' AND `status` = 'ON' ")->fetch_array();
        
        $ck = $ketnoi->query("SELECT * FROM `list_acc_game` WHERE `status` = '' AND `loai` = '".$loai['id']."'")->fetch_array();
       if(empty($game)){
        echo '<script type="text/javascript">if(!alert("Không tìm thấy trang!")){window.location.href = "/";}</script>';
       }
    }
} 
?>
<title><?=$loai['name'];?> </title>
<?php require $_SERVER['DOCUMENT_ROOT'].'/hethong/nav.php';?>

<body style="max-width: 100%;" class="ws-bg-zinc-50">
    <div class="el-overlay ws-auth-modal" style="z-index:1795351;display:none;">
        <!--[-->
        <div role="dialog" aria-modal="true" aria-labelledby="el-id-1024-1" aria-describedby="el-id-1024-2"
            class="el-overlay-dialog" style="">
        </div>
        <!--]-->
    </div>
    <!--teleport anchor-->
    <div class="el-overlay ws-recharge-modal" style="z-index:1795352;display:none;">
        <!--[-->
        <div role="dialog" aria-modal="true" aria-label="Chọn phương thức nạp tiền" aria-describedby="el-id-1024-3"
            class="el-overlay-dialog" style="">
            <!--[-->
            <!--]-->
        </div>
        <!--]-->
    </div>
    <!--teleport anchor-->
    <div id="el-popper-container-1024">
        <div style="z-index:1795350;position:absolute;left:0;top:0;width:320px;display:none;"
            class="el-popper is-light el-popover" tabindex="-1" aria-hidden="true">
            <!--[-->
            <!--[-->
            <!--[-->
            <!--[-->
            <div class="el-popover__title" role="title">Tìm kiếm</div>
            <!--[-->
            <div class="ws-relative"><input
                    class="ws-border focus:ws-outline-none ws-rounded-lg ws-py-2 ws-pl-4 ws-pr-[5rem] ws-w-full ws-text-sm"
                    placeholder="Nhập tìm kiếm..." value><button
                    class="ws-absolute ws-bg-white ws-font-semibold ws-text-sm ws-text-red-500 ws-top-[1px] ws-right-[5px] ws-py-2 ws-px-3 ws-rounded">
                    Tìm kiếm </button></div>
            <!--]-->
            <!--]--><span class="el-popper__arrow" style="position:absolute;" data-popper-arrow></span>
            <!--]-->
            <!--]-->
            <!--]-->
        </div>
        <!--teleport anchor-->
    </div>
    <div id="__nuxt">
        <div>
            <!--[-->
            <div id="app-layout">
                <div class="ws-px-2 ws-mx-auto ws-max-w-7xl" style="min-height:70vh;">
                    <!--[-->
                    <div class="ws-max-w-6xl ws-mx-auto ws-pb-12">
                        <div class="ws-grid ws-grid-cols-12 ws-gap-2">
                            <div class="ws-col-span-12">
                                <?php if($danhmuc['type']=="muanick"){ ?>
                                <div class="ws-rounded-lg ws-pt-2 ws-mb-4">
                                    <div><label class="ws-text-base"><small>DANH MỤC</small></label>
                                        <h2 class="ws-block ws-font-bold ws-text-lg ws-text-red-500">
                                            <?=$danhmuc['name'];?></h2>
                                        <div class="ws-bg-white ws-rounded ws-px-2">
                                            <div class="ws-py-2"><b
                                                    class="ws-block ws-mb-2 ws-font-medium ws-text-sm ws-text-zinc-800">Lọc
                                                    tìm kiếm</b>
                                                <div class="ws-grid ws-grid-cols-12 ws-gap-4">
                                                    <div class="ws-col-span-12 md:ws-col-span-3">
                                                        <div class="el-input el-input--large el-input--suffix" style="">
                                                            <!-- input -->
                                                            <!--[-->
                                                            <!-- prepend slot -->
                                                            <!--v-if-->
                                                            <div class="el-input__wrapper">
                                                                <!-- prefix slot -->
                                                                <!--v-if--><input class="el-input__inner" type="text"
                                                                    autocomplete="off" tabindex="0" placeholder="ID"
                                                                    style=""><!-- suffix slot -->
                                                                <!--v-if-->
                                                            </div><!-- append slot -->
                                                            <!--v-if-->
                                                            <!--]-->
                                                        </div>
                                                    </div>
                                                    <div class="ws-col-span-12 md:ws-col-span-3">
                                                        <div class="el-select el-select--large ws-w-full">
                                                            <!--[-->
                                                            <div
                                                                class="select-trigger el-tooltip__trigger el-tooltip__trigger">
                                                                <!--v-if-->
                                                                <!--v-if-->
                                                                <div class="el-input el-input--large el-input--suffix"
                                                                    style="">
                                                                    <!-- input -->
                                                                    <!--[-->
                                                                    <!-- prepend slot -->
                                                                    <!--v-if-->
                                                                    <div class="el-input__wrapper">
                                                                        <!-- prefix slot -->
                                                                        <!--v-if--><input class="el-input__inner"
                                                                            role="combobox" aria-activedescendant
                                                                            aria-controls="el-id-1024-7"
                                                                            aria-expanded="false"
                                                                            aria-autocomplete="none"
                                                                            aria-haspopup="listbox" type="text" readonly
                                                                            autocomplete="off" tabindex="0"
                                                                            placeholder="Chọn" style="">
                                                                        <!-- suffix slot --><span
                                                                            class="el-input__suffix"><span
                                                                                class="el-input__suffix-inner">
                                                                                <!--[-->
                                                                                <!--[--><i
                                                                                    class="el-icon el-select__caret el-select__icon"
                                                                                    style="">
                                                                                    <!--[--><svg
                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                        viewBox="0 0 1024 1024">
                                                                                        <path fill="currentColor"
                                                                                            d="M831.872 340.864 512 652.672 192.128 340.864a30.592 30.592 0 0 0-42.752 0 29.12 29.12 0 0 0 0 41.6L489.664 714.24a32 32 0 0 0 44.672 0l340.288-331.712a29.12 29.12 0 0 0 0-41.728 30.592 30.592 0 0 0-42.752 0z">
                                                                                        </path>
                                                                                    </svg>
                                                                                    <!--]-->
                                                                                </i>
                                                                                <!--v-if-->
                                                                                <!--]-->
                                                                                <!--v-if-->
                                                                                <!--]-->
                                                                                <!--v-if-->
                                                                                <!--v-if-->
                                                                                <!--v-if-->
                                                                                <!--v-if-->
                                                                            </span></span>
                                                                    </div><!-- append slot -->
                                                                    <!--v-if-->
                                                                    <!--]-->
                                                                </div>
                                                            </div>
                                                            <!--teleport start-->
                                                            <!--teleport end-->
                                                            <!--]-->
                                                        </div>
                                                    </div>
                                                    <div class="ws-col-span-12 md:ws-col-span-3">
                                                        <div class="el-select el-select--large ws-w-full">
                                                            <!--[-->
                                                            <div
                                                                class="select-trigger el-tooltip__trigger el-tooltip__trigger">
                                                                <!--v-if-->
                                                                <!--v-if-->
                                                                <div class="el-input el-input--large el-input--suffix"
                                                                    style="">
                                                                    <!-- input -->
                                                                    <!--[-->
                                                                    <!-- prepend slot -->
                                                                    <!--v-if-->
                                                                    <div class="el-input__wrapper">
                                                                        <!-- prefix slot -->
                                                                        <!--v-if--><input class="el-input__inner"
                                                                            role="combobox" aria-activedescendant
                                                                            aria-controls="el-id-1024-19"
                                                                            aria-expanded="false"
                                                                            aria-autocomplete="none"
                                                                            aria-haspopup="listbox" type="text" readonly
                                                                            autocomplete="off" tabindex="0"
                                                                            placeholder="Chọn" style="">
                                                                        <!-- suffix slot --><span
                                                                            class="el-input__suffix"><span
                                                                                class="el-input__suffix-inner">
                                                                                <!--[-->
                                                                                <!--[--><i
                                                                                    class="el-icon el-select__caret el-select__icon"
                                                                                    style="">
                                                                                    <!--[--><svg
                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                        viewBox="0 0 1024 1024">
                                                                                        <path fill="currentColor"
                                                                                            d="M831.872 340.864 512 652.672 192.128 340.864a30.592 30.592 0 0 0-42.752 0 29.12 29.12 0 0 0 0 41.6L489.664 714.24a32 32 0 0 0 44.672 0l340.288-331.712a29.12 29.12 0 0 0 0-41.728 30.592 30.592 0 0 0-42.752 0z">
                                                                                        </path>
                                                                                    </svg>
                                                                                    <!--]-->
                                                                                </i>
                                                                                <!--v-if-->
                                                                                <!--]-->
                                                                                <!--v-if-->
                                                                                <!--]-->
                                                                                <!--v-if-->
                                                                                <!--v-if-->
                                                                                <!--v-if-->
                                                                                <!--v-if-->
                                                                            </span></span>
                                                                    </div><!-- append slot -->
                                                                    <!--v-if-->
                                                                    <!--]-->
                                                                </div>
                                                            </div>
                                                            <!--teleport start-->
                                                            <!--teleport end-->
                                                            <!--]-->
                                                        </div>
                                                    </div>
                                                    <!---->
                                                    <!---->
                                                    <!---->
                                                    <div class="ws-col-span-12 md:ws-col-span-3"><button
                                                            ariadisabled="false" type="button"
                                                            class="el-button el-button--primary el-button--large ws-w-full"
                                                            style="">
                                                            <!--v-if--><span class="">
                                                                <!--[-->Áp dụng
                                                                <!--]-->
                                                            </span>
                                                        </button></div>
                                                </div>
                                            </div>
                                            <div
                                                class="ws-mt-2 ws-border-t ws-border-dashed ws-text-sm ws-font-medium ws-text-zinc-700 sort-list">
                                                <a class="ws-py-1">Nổi Bật</a><a class="ws-py-1">Nick Mới</a><a
                                                    class="ws-py-1">Giá <i class="fa-solid fa-up-long"></i></a><a
                                                    class="ws-py-1">Giá <i class="fa-solid fa-down-long"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                                <div class="ws-mb-4">
                                    <div>
                                        <!--[-->
                                        <div
                                            class="ws-more-hidd ws-more ws-leading-4 ws-bg-white ws-rounded ws-py-2 ws-px-3 ws-transition-all ws-duration-200 ws-flex ws-items-center">
                                            <p style="margin-left:0px;">
                                                <a><span style="color:rgb(52,152,219);"><strong>Game
                                                            <?=$game['name'];?></strong></span></a>
                                                <span style="color:rgb(0,0,0);"><strong>&nbsp;được phát hành
                                                        bởi&nbsp;</strong></span>
                                                <a href="#"><span
                                                        style="color:rgb(41,128,185);"><strong><?=$game['phathanh'];?></strong></span></a>
                                                <span style="color:rgb(41,128,185);"><strong>&nbsp;</strong></span>
                                            </p>
                                            <button type="button" onclick="xemluuy()"
                                                class="el-button el-button--primary el-button--small ws-relative ws-ml-2">
                                                <!--v-if--><span class="">Xem lưu ý</span>
                                            </button>
                                        </div>
                                        <!--]-->
                                    </div>
                                </div>

                                <!---->
                                <div>
                                    <!---->
                                    <div class="ws-grid ws-grid-cols-12 ws-gap-2 md:ws-gap-4">

                                        <?php
                                    $result2 = mysqli_query($ketnoi,"SELECT * FROM `list_acc_game` WHERE `status` = '' AND `loai` = '".$loai['id']."'");
                                    while($row2 = mysqli_fetch_assoc($result2)) { ?>
                                        <?php
                                        if($danhmuc['type']=="muanick"){
                                            $gia = tien($row2['gia'] - ($row2['gia'] * ($row2['ck'] / 100)));
                                            $img = $row2['img'];
                                            $tieude = "Vô xem chi tiết nè bạn ơi";
                                        }elseif($danhmuc['type']=="random"){
                                            $gia = tien($loai['noidung'] - ($loai['noidung'] * ($row2['ck'] / 100)));
                                            $img = $loai['img'];
                                            $tieude = "THỬ VẬN MAY NGAY NÀO";
                                        }
                                        ?>
                                        <div
                                            class="ws-cursor-pointer ws-col-span-6 md:ws-col-span-4 lg:ws-col-span-3 ws-bg-white ws-rounded-lg hover:ws-shadow-sm">
                                            <a <?php if ($danhmuc['type'] == "muanick") { echo 'href="/tai-khoan/'.$row2['id'].'"';} else {echo 'onclick="random('.$row2['id'].')"';} ?>
                                                class="ws-bg-white">
                                                <div class="ws-relative ws-w-full ws-inline-block ws-mb-0">
                                                    <div class="ws-overflow-hidden ws-select-none ws-h-40 md:ws-h-40 ws-w-full ws-object-fill ws-object-center ws-rounded-t-sm ws-rounded-t-lg ws-bg-zinc-50"
                                                        style="aspect-ratio:16 / 9;"><img src="<?=$img;?>"
                                                            onerror="this.setAttribute(&#39;data-error&#39;, 1)"
                                                            alt="nick" loading="eager" data-nuxt-img
                                                            class="ws-select-none ws-rounded-lg ws-w-full ws-h-40 md:ws-h-40 ws-w-full ws-object-fill ws-object-center ws-rounded-t-sm ws-rounded-t-lg">
                                                        <div class="el-skeleton" style="width:100%;">
                                                            <!--[-->
                                                            <!--[-->
                                                            <!--[-->
                                                            <div class="el-skeleton__item el-skeleton__image ws-h-40 md:ws-h-40 ws-w-full ws-object-fill ws-object-center ws-rounded-t-sm ws-rounded-t-lg"
                                                                style="width:100%;"><svg
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    viewBox="0 0 1024 1024">
                                                                    <path fill="currentColor"
                                                                        d="M96 896a32 32 0 0 1-32-32V160a32 32 0 0 1 32-32h832a32 32 0 0 1 32 32v704a32 32 0 0 1-32 32zm315.52-228.48-68.928-68.928a32 32 0 0 0-45.248 0L128 768.064h778.688l-242.112-290.56a32 32 0 0 0-49.216 0L458.752 665.408a32 32 0 0 1-47.232 2.112M256 384a96 96 0 1 0 192.064-.064A96 96 0 0 0 256 384">
                                                                    </path>
                                                                </svg></div>
                                                            <!--]-->
                                                            <!--]-->
                                                            <!--]-->
                                                        </div>
                                                    </div><span
                                                        class="ws-bg-red-600 ws-absolute ws-top-[5px] ws-right-[5px] ws-text-xs ws-px-2 ws-py-0.5 ws-rounded ws-text-white"><b
                                                            class="ws-font-bold">ID</b> <?=$row2['id'];?></span>
                                                </div>
                                                <div class="ws-py-1 ws-px-2 ws-text-red-500 ws-text-base">
                                                    <div class="ws-flex ws-justify-between ws-items-center">
                                                        <div class="ws-col-span-7"><span
                                                                class="ws-font-semibold ws-inline-flex ws-items-start"><span
                                                                    class="ws-text-lg"><?=$gia;?></span><small
                                                                    class="ws-ml-[0.5px]">đ</small></span></div>
                                                        <div
                                                            class="ws-col-span-5 ws-text-right ws-flex ws-items-center ws-mb-1.5">
                                                            <button
                                                                class="ws-text-xs ws-bg-red-500 ws-text-white ws-rounded ws-px-2 ws-py-1">
                                                                <?php if ($danhmuc['type'] == "muanick") { echo 'Mua';} else {echo 'Xem';} ?>
                                                                ngay</span></button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php if($danhmuc['type']=="muanick") { ?>

                                                <div
                                                    class="ws-text-sm ws-text-zinc-800 ws-border-t ws-border-dashed ws-py-1 ws-px-2">
                                                    <?php
                                                    $lines = explode("\n", $game['list_thong_tin']);
                                                    $lines2 = explode("\n", $row2['list_thong_tin']);
                                                    if (!empty($lines)) {
                                                        foreach ($lines as $index => $line) { ?>
                                                    <div class="ws-my-1">
                                                        <span class="ws-truncate ws-w-full ws-block">
                                                            <span class="ws-mr-1 ws-text-zinc-700 ws-cap">
                                                                <i class="fa-solid fa-caret-right"></i>
                                                                <?= trim($line); ?>:
                                                            </span>
                                                            <span class="ws-font-medium">
                                                                <?= isset($lines2[$index]) ? trim($lines2[$index]) : ''; ?></span>
                                                        </span>
                                                    </div>
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                    <!--]-->
                                                </div>
                                                <?php } ?>
                                                <div
                                                    class="ws-py-2 ws-truncate ws-text-sm ws-text-zinc-800 ws-px-2 ws-border-t ws-border-dashed">
                                                    <i class="ws-text-red-600 fa-solid fa-fire"></i>
                                                    <strong><?=$tieude;?></strong>
                                                </div>

                                            </a>
                                        </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <!--teleport start-->
                                <!--teleport end-->
                            </div>
                            <!--]-->
                        </div>
                    </div>
                </div>
            </div>
            <?php if($danhmuc['type']=="random"){ ?>
            <div id="random_acc" role="dialog" aria-modal="false" aria-labelledby="el-id-1024-6"
                aria-describedby="el-id-1024-7" class="el-overlay ws-notihomes" style="display:none;">

                <!--[-->
                <div class="el-dialog" tabindex="-1">
                    <header class="el-dialog__header">
                        <div class="ws-flex ws-items-center ws-justify-between">
                            <div class="ws-text-red ws-font-semibold"><small>XÁC NHẬN MUA TÀI KHOẢN</small>
                                <p class="ws-text-2xl">
                                <div id="id_acc">559989</div>
                                </p>
                            </div>
                            <button onclick="close_random()"><i class="fa-solid fa-circle-xmark fa-xl"></i></button>
                        </div>
                        <!--v-if-->
                    </header>
                    <div id="el-id-1024-7" class="el-dialog__body">
                        <div class="ws-p-3">
                            <div class="ws-mb-4">
                                <div class="ws-flex ws-justify-between ws-items-center">
                                    <div class="ws-relative ws-font-medium ws-text-zinc-700 ws-uppercase"><span>Số dư
                                            của bạn</span>
                                    </div>
                                    <div class="ws-text-right ws-font-bold ws-text-base ws-text-red-600"><?=tien($user['money']);?>đ
                                        <button onclick="naptien()" class="ws-px-1"><i
                                                class="ws-text-red-500 fa-solid fa-square-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="ws-border-b ws-border-gray-100 ws-my-2"></div>
                            <div class="ws-flex ws-items-center">
                                <div
                                    class="el-input el-input--large el-input--prefix el-input--suffix ws-w-full ws-mr-2">
                                    <!-- input -->
                                    <!-- prepend slot -->
                                    <!--v-if-->
                                    <div class="el-input__wrapper" tabindex="-1">
                                        <!-- prefix slot --><span class="el-input__prefix"><span
                                                class="el-input__prefix-inner"><i class="el-icon el-input__icon"><svg
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1024 1024">
                                                        <path fill="currentColor"
                                                            d="M640 832H64V640a128 128 0 1 0 0-256V192h576v160h64V192h256v192a128 128 0 1 0 0 256v192H704V672h-64zm0-416v192h64V416z">
                                                        </path>
                                                    </svg></i>
                                                <!--v-if-->
                                            </span></span><input class="el-input__inner" type="text" autocomplete="off"
                                            tabindex="0" placeholder="Mã giảm giá" id="magiamgia">
                                        <!-- suffix slot -->
                                        <!--v-if-->
                                    </div><!-- append slot -->
                                    <!--v-if-->
                                </div>
                                <div>
                                    <button type="button" id="btn_giamgia" onclick="giamgia()"
                                        class="el-button el-button--primary el-button--large ">
                                        <!--v-if--><span class="">Áp dụng</span>
                                    </button>
                                    <!---->
                                </div>
                            </div>
                            <div class="ws-border-b ws-border-gray-100 ws-my-2"></div>
                            <div class="ws-my-4 ws-flex ws-justify-between"><label
                                    class="ws-font-semibold ws-text-red-600 ws-text-base">GIÁ TÀI KHOẢN</label><span
                                    class="ws-font-bold ws-text-red-600 ws-text-xl"
                                    id="sotien"><?=tien($loai['noidung'] - ($loai['noidung'] * ($ck['ck'] / 100)));?>đ</span>
                            </div>
                            <!---->
                            <div class="ws-grid ws-grid-cols-12 ws-gap-x-2 ws-py-2">
                                <div class="ws-col-span-8">
                                    <button aria-disabled="false" type="button" id="btn_random"
                                        class="el-button el-button--primary el-button--large ws-w-full"
                                        style="font-size: 1rem;">
                                        <!--v-if--><span>Xác nhận mua</span>
                                    </button>
                                </div>
                                <div class="ws-col-span-4">
                                    <button aria-disabled="false" onclick="close_random()" type="button"
                                        class="el-button el-button--large ws-w-full">
                                        <!--v-if--><span class="">Đóng</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!---->
                    </div>
                    <!--v-if-->
                </div>
                <!--]-->
            </div>
            <script type="text/javascript">
            function giamgia() {
                var sotien = document.getElementById("sotien");
                $('#btn_giamgia').html(
                        '<i class="fa fa-spinner fa-spin"></i>'
                    )
                    .prop(
                        'disabled',
                        true);
                $.ajax({
                    url: "<?=BASE_URL('ajax/muanick/giamgia.php');?>",
                    method: "POST",
                    dataType: "JSON",
                    data: {
                        type: "<?=$danhmuc['type'];?>",
                        sotien: "<?=($loai['noidung'] - ($loai['noidung'] * ($ck['ck'] / 100)));?>",
                        magiamgia: $("#magiamgia").val()
                    },

                    success: function(respone) {
                        if (respone.status == 'success') {
                            cuteToast({
                                type: "success",
                                message: respone.msg,
                                timer: 5000
                            });
                            sotien.innerText = respone.giam;
                        } else {
                            cuteToast({
                                type: "error",
                                message: respone
                                    .msg,
                                timer: 5000
                            });
                            sotien.innerText = "<?=tien($loai['noidung'] - ($loai['noidung'] * ($ck['ck'] / 100)));?>đ";
                        }
                        $('#btn_giamgia').html(
                            'Áp dụng'
                        ).prop('disabled',
                            false);
                    },
                    error: function() {
                        cuteToast({
                            type: "error",
                            message: 'Không thể xử lý',
                            timer: 5000
                        });
                        $('#btn_giamgia').html(
                            'Áp dụng'
                        ).prop('disabled',
                            false);
                    }

                });
            }
            </script>

            <script>
            function random(id_acc) {
                var random_acc = document.getElementById("random_acc");
                random_acc.style.display = "block";

                // Thêm giá trị id_acc vào nội dung của phần tử có id là id_acc
                var idAccElement = document.getElementById("id_acc");
                idAccElement.innerText = id_acc;
                idAccElement.value = id_acc;
            }

            function close_random() {
                var random_acc = document.getElementById("random_acc");
                var sotien = document.getElementById("sotien");

                random_acc.style.display = "none";
                sotien.innerText = "<?=tien($loai['noidung']);?>đ";
                sotien.value = "<?=tien($loai['noidung']);?>đ";
            }
            </script>
            <script type="text/javascript">
            $("#btn_random").on("click", function() {
                $('#btn_random').html(
                        '<i class="fa fa-spinner fa-spin"></i> Đang xử lý...'
                    )
                    .prop(
                        'disabled',
                        true);
                $.ajax({
                    url: "<?=BASE_URL('ajax/muanick/xulythanhtoan.php');?>",
                    method: "POST",
                    dataType: "JSON",
                    data: {
                        id_acc: $("#id_acc").val(),
                        magiamgia: $("#magiamgia").val()
                    },

                    success: function(respone) {
                        if (respone.status == 'success') {
                            cuteToast({
                                type: "success",
                                message: respone
                                    .msg,
                                timer: 5000
                            });
                            setTimeout(
                                "location.href = '/customer/nicks';",
                                500);
                        } else {
                            cuteToast({
                                type: "error",
                                message: respone
                                    .msg,
                                timer: 5000
                            });
                        }
                        $('#btn_random').html(
                            'Mua ngay'
                        ).prop('disabled',
                            false);
                    },
                    error: function() {
                        cuteToast({
                            type: "error",
                            message: 'Không thể xử lý',
                            timer: 5000
                        });
                        $('#btn_random').html(
                            'Mua ngay'
                        ).prop('disabled',
                            false);
                    }

                });
            });
            </script>
            <?php } ?>
            <?php
$nd_muanick = '<p style="margin-left:0px;"><span style="color:rgb(41,128,185);"><strong>Đối
với Acc TRẮNG THÔNG TIN</strong></span></p><p style="margin-left:0px;"><span style="color:rgb(41,128,185);"><strong>-Bắt buộc phải đổi Mật Khẩu sau khi giao dịch thành công tại WEB,
Bên SHOP sẽ không bảo hành những Acc Trắng thông tin</strong></span></p>
<p style="margin-left:0px;"><span style="color:rgb(41,128,185);"><strong>-
SHOP chỉ bảo hành Trường Hợp Acc Bị Cấm Do Tranh Chấp ( trường
hợp acc bị khóa do sử dụng phần mềm thứ 3, tool hack, mod skin…
shop không hỗ trợ bảo hành )</strong></span></p>
<p style="margin-left:0px;"><span style="color:rgb(41,128,185);"><strong>-
Trong trường hợp Acc có liên kết FB thì bên shop đã KHÓA FB cũ
nên chỉ chơi trên Acc Garena Shop cung cấp, Trường hợp FB khóa
SHOP chỉ bảo hành 30 ngày, quá 30 ngày bên SHOP không hỗ trợ bảo
hành</strong></span></p>
<p style="margin-left:0px;"><span style="color:rgb(41,128,185);"><strong>Đối
với Acc Có Số Điện Thoại</strong></span></p>
<p style="margin-left:0px;"><span style="color:rgb(41,128,185);"><strong>-
Do cơ chế của Garena mỗi tài khoản Garena chỉ được thay đổi
thông tin mỗi 30 ngày một lần</strong></span></p>
<p style="margin-left:0px;"><span style="color:rgb(41,128,185);"><strong>-
Nên những tài khoản có SĐT ở shop chưa tới ngày đổi SĐT sẽ được
shop bảo hành trong thơi gian chờ đổi SĐT</strong></span></p>
<p style="margin-left:0px;"><span style="color:rgb(41,128,185);"><strong>-
Khách Hàng có quyền yêu cầu SHOP hỗ trợ cài thông tin như Gmail,
CMND (nếu được), LK FB (nếu được)</strong></span></p>
<p style="margin-left:0px;"><span style="color:rgb(41,128,185);"><strong>-
Lưu ý sau 2 tháng nếu khách hàng không đổi SĐT hoặc đã đổi SĐT
sau 2 tháng bị mất acc shop không hỗ trợ vì ngoài thời gian bảo
hành.</strong></span></p>
<p style="margin-left:0px;"><span style="color:rgb(230,77,77);"><strong>Vui
Lòng Đổi Mật Khẩu Ngay Sau Khi Mua Nick</strong>';
?>
            <?php
$nd_random = '<p style="margin-left:0px;text-align:center;"><span style="color:rgb(230,77,77);"><strong>CAM KẾT: 98% ACC TRẮNG
THÔNG TIN VÀ CHƠI ĐƯỢC</strong></span></p>
<p style="margin-left:0px;"><span style="color:rgb(0,0,0);"><strong>50% Có Sẵn 500 - 800 Quân Huy</strong></span>
</p>
<p style="margin-left:0px;"><span style="color:rgb(0,0,0);"><strong>45% Trên 80 Tướng</strong></span></p>
<p style="margin-left:0px;"><span style="color:rgb(0,0,0);"><strong>30% Trên 60 Tướng</strong></span></p>
<p style="margin-left:0px;"><span style="color:rgb(0,0,0);"><strong>25% Có Skin SS</strong></span></p>
<p style="margin-left:0px;"><span style="color:rgb(0,0,0);"><strong>10% Có Người Chơi Cùng</strong></span></p>
<p style="margin-left:0px;"><span style="color:rgb(0,0,0);"><strong>10% Acc Cùi Bắp ( đen thì trúng ae nhá
)</strong></span></p>
<p style="margin-left:0px;"><span style="color:rgb(230,77,77);"><strong>LƯU Ý: MỤC NÀY CÓ TỈ LỆ NICK KHÔNG CHƠI
ĐƯỢC</strong></span></p>
<p style="margin-left:0px;"><span style="color:rgb(230,77,77);"><strong>Các Bạn Muốn Acc 100% Trắng Thông Tin &amp;
Đổi Được Thông Tin Thì Mua Acc Trị Giá 20k Trở Lên Nha!</strong></span></p>';
?>
            <div id="modal_luuy" class="el-overlay ws-notihomes" style="z-index: 2005; display: none;">
                <div role="dialog" aria-modal="false" aria-labelledby="el-id-1024-6" aria-describedby="el-id-1024-7"
                    class="el-overlay-dialog">
                    <div class="el-dialog" tabindex="-1">
                        <header class="el-dialog__header">
                            <div data-v-596f3477="" class="ws-text-red-500 ws-font-bold"><i
                                    class="fa-solid fa-bell"></i>
                                Lưu Ý </div>
                        </header>
                        <div id="el-id-1024-7" class="el-dialog__body">
                            <?php if($danhmuc['type']=='muanick'){
                                echo $nd_muanick;
                            }elseif($danhmuc['type']=='random'){
                            echo $nd_random;
                            }?>
                        </div>
                        <footer class="el-dialog__footer">
                            <span data-v-596f3477="" class="dialog-footer">
                                <button type="button" onclick="xemluuy()" class="el-button">
                                    <span class="">Đóng</span>
                                </button></span>
                        </footer>
                    </div>
                </div>
            </div>
            <script>
            function xemluuy() {
                var modal_luuy = document.getElementById("modal_luuy");
                if (modal_luuy.style.display === "block") {
                    modal_luuy.style.display = "none";
                } else {
                    modal_luuy.style.display = "block";
                }
            }
            </script>
</body>

<?php require $_SERVER['DOCUMENT_ROOT'].'/hethong/foot.php';?>


</html>