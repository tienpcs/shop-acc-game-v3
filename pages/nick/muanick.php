<!DOCTYPE html>
<html style="overflow-x: hidden;">

<?php require $_SERVER['DOCUMENT_ROOT'].'/hethong/head.php';?>
<?php 
if(empty($_GET['id_acc'])||antixss($_GET['id_acc']=="")){
    echo '<script type="text/javascript">if(!alert("Không tìm thấy trang!")){window.location.href = "/";}</script>';
}else{
    $id = antixss($_GET['id_acc']);
    $acc = $ketnoi->query("SELECT * FROM `list_acc_game` WHERE `id` = '$id' AND `status` = '' AND `gia` != '' ")->fetch_array();
    if(empty($acc)){
        echo '<script type="text/javascript">if(!alert("Không tìm thấy trang!")){window.location.href = "/";}</script>';
    }else{
    $loai = $ketnoi->query("SELECT * FROM `loai_tai_khoan` WHERE `id` = '".$acc['loai']."' AND `status` = 'ON' ")->fetch_array();
    $ketnoi->query("UPDATE `loai_tai_khoan` SET `view` = `view` +1 WHERE `id` = '".$acc['loai']."' ");
    $danhmuc = $ketnoi->query("SELECT * FROM `danh_muc_tai_khoan` WHERE `id` = '".$loai['danhmuc']."' AND `status` = 'ON' ")->fetch_array();
    $game = $ketnoi->query("SELECT * FROM `list_game` WHERE `id` = '".$danhmuc['game']."' AND `status` = 'ON' ")->fetch_array();
    }
} 
?>
<title><?=$loai['name'];?> | </title>
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
                    <!--[-->
                    <div class="ws-breadcrumb ws-text-sm ws-text-zinc-700 ws-py-2"><a href="/">Trang chủ </a><i
                            class="ws-relative ws-top-[1px] fa-solid fa-angle-right fa-2xs"></i><a
                            href="/danh-muc-tai-khoan"><span> Tài khoản </span></a><i
                            class="ws-relative ws-top-[1px] fa-solid fa-angle-right fa-2xs"></i> Nick: <?=$id;?>
                        (<?=$game['name'];?>) </div>
                    <div class="ws-mb-4 ws--mx-2 md:ws--mx-0 ws-bg-white md:ws-rounded"
                        style="background-image: url(https://cdns.diongame.com/static/Wbt9g97I1bTcyMc.png);background-position: top right; background-repeat:  no-repeat">
                        <div class="ws-grid ws-grid-cols-12 ws-gap-x-4">
                            <div
                                class="ws-col-span-12 md:ws-col-span-5 ws-py-3 ws-px-3 md:ws-px-5 md:ws-py-5 md:ws-pr-0">
                                <!--[-->
                                <div>
                                    <div
                                        class="ws-relative ws-h-[300px] ws-bg-black ws-flex ws-items-center ws-justify-center ws-rounded">
                                        <img id="img_acc" onclick="zoomImage(this);" src="<?=$acc['img'];?>"
                                            class="ws-rounded ws-h-[260px]">
                                        <button ariadisabled="false" type="button"
                                            class="el-button el-button--success el-button--small ws-absolute ws-right-[105px] ws-bottom-[5px] ws-w-[55px]"
                                            style="">
                                            <span class="">
                                                <div id="id_anh">0</div> / <?=demdong($acc['list_img']);?>
                                                <!--]-->
                                            </span>
                                        </button>
                                        <button id="phongto" ariadisabled="false" type="button"
                                            class="el-button el-button--primary el-button--small is-has-bg ws-absolute ws-right-[5px] ws-bottom-[5px]"
                                            style=""><i class="el-icon" style="">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1024 1024">
                                                    <path fill="currentColor"
                                                        d="M512 64a448 448 0 1 1 0 896 448 448 0 0 1 0-896m-38.4 409.6H326.4a38.4 38.4 0 1 0 0 76.8h147.2v147.2a38.4 38.4 0 0 0 76.8 0V550.4h147.2a38.4 38.4 0 0 0 0-76.8H550.4V326.4a38.4 38.4 0 1 0-76.8 0v147.2z">
                                                    </path>
                                                </svg>
                                            </i><span class="">
                                                Phóng to
                                            </span>
                                        </button>
                                    </div>
                                    <div class="ws-mt-2">
                                        <!--[-->
                                        <div class="ws-relative ws-px-9">
                                            <div class="swiper swiper-initialized swiper-horizontal ws-relative">
                                                <div class="swiper-wrapper"
                                                    style="transform: translate3d(0px, 0px, 0px); transition-duration: 0ms; transition-delay: 0ms;">
                                                    <div class="swiper-slide ws-cursor-pointer swiper-slide-active"
                                                        style="width: 48.25px; margin-right: 10px;">
                                                        <div onclick="imgacc('<?=$acc['img'];?>', 0)"
                                                            class="ws-relative ws-w-full"><span
                                                                class="ws-absolute ws-font-medium ws-right-[5px] ws-top-[4px] ws-text-xs ws-px-1 ws-rounded ws-text-white ws-bg-red-700"><small>0</small></span><img
                                                                src="<?=$acc['img'];?>"
                                                                class="ws-rounded ws-border-2 ws-h-[45px] ws-border-zinc-200">
                                                        </div>
                                                        <!---->
                                                    </div>
                                                    <?php 
                                                    $i = 1;
                                                    $lines = explode("\n", $acc['list_img']); 
                                                    if (!empty($lines)) {
                                                        foreach ($lines as $line) { ?>
                                                    <div onclick="imgacc('<?=trim($line);?>', <?=$i;?>)"
                                                        class="swiper-slide ws-cursor-pointer"
                                                        style="width: 48.25px; margin-right: 10px;">
                                                        <div class="ws-relative ws-w-full">
                                                            <span
                                                                class="ws-absolute ws-font-medium ws-right-[5px] ws-top-[4px] ws-text-xs ws-px-1 ws-rounded ws-text-white ws-bg-zinc-900">
                                                                <small><?=$i++;?></small>
                                                            </span>
                                                            <img src="<?=trim($line);?>" id="img<?=$i;?>"
                                                                class="ws-rounded ws-border-2 ws-h-[45px] ws-border-zinc-200">
                                                        </div>
                                                    </div>
                                                    <?php
    }
}
?>
                                                </div>
                                            </div>
                                            <script>
                                            window.onload = function() {
                                                var phongto = document.getElementById("phongto");
                                                var img_acc = document.getElementById("img_acc");

                                                phongto.addEventListener("click", function() {
                                                    img_acc.click();
                                                });

                                                // Add event listeners to the prev and next buttons
                                                var myPrev = document.querySelector(".myPrev");
                                                var myNext = document.querySelector(".myNext");

                                                myPrev.addEventListener("click", function() {
                                                    var activeSlide = document.querySelector(".swiper-slide-active");
                                                    var prevSlide = activeSlide.previousElementSibling;
                                                    if (prevSlide) {
                                                        activeSlide.classList.remove("swiper-slide-active");
                                                        prevSlide.classList.add("swiper-slide-active");
                                                        imgacc(prevSlide.querySelector("img").src, prevSlide.querySelector("small").innerText);
                                                    }
                                                });

                                                myNext.addEventListener("click", function() {
                                                    var activeSlide = document.querySelector(".swiper-slide-active");
                                                    var nextSlide = activeSlide.nextElementSibling;
                                                    if (nextSlide) {
                                                        activeSlide.classList.remove("swiper-slide-active");
                                                        nextSlide.classList.add("swiper-slide-active");
                                                        imgacc(nextSlide.querySelector("img").src, nextSlide.querySelector("small").innerText);
                                                    }
                                                });
                                            };
                                            </script>
                                            <style>
                                            .zoomed-image {
                                                position: fixed;
                                                top: 0;
                                                left: 0;
                                                width: 100%;
                                                height: 100%;
                                                background-color: rgba(0, 0, 0, 0.8);
                                                display: flex;
                                                align-items: center;
                                                justify-content: center;
                                                z-index: 9999;
                                                cursor: zoom-out;
                                            }

                                            .zoomed-image img {
                                                max-width: 90%;
                                                max-height: 90%;
                                            }
                                            </style>

                                            <!-- Add the following JavaScript code -->
                                            <style>
                                            .zoomed-image {
                                                position: fixed;
                                                top: 0;
                                                left: 0;
                                                width: 100%;
                                                height: 100%;
                                                background-color: rgba(0, 0, 0, 0.8);
                                                display: flex;
                                                align-items: center;
                                                justify-content: center;
                                                z-index: 9999;
                                                cursor: zoom-out;
                                            }

                                            .zoomed-image img {
                                                max-width: 90%;
                                                max-height: 90%;
                                                border-radius: 0.375rem;
                                            }
                                            </style>

                                            <!-- Add the following JavaScript code -->
                                            <script>
                                            function zoomImage(image) {
                                                var zoomedContainer = document.createElement('div');
                                                zoomedContainer.className = 'zoomed-image';
                                                zoomedContainer.onclick = function(event) {
                                                    if (event.target === zoomedContainer || event.target ===
                                                        zoomedImage) {
                                                        zoomedContainer.remove();
                                                    }
                                                };

                                                var zoomedImage = document.createElement('img');
                                                zoomedImage.src = image.src;
                                                zoomedImage.classList.add(
                                                    'card-rounded'); // Add the 'card-rounded' class

                                                zoomedContainer.appendChild(zoomedImage);
                                                document.body.appendChild(zoomedContainer);
                                            }
                                            </script>


                                            <script>
                                            function imgacc(img, order) {
                                                var img_acc = document.getElementById("img_acc");
                                                img_acc.src = img;
                                                var id_anh = document.getElementById("id_anh");
                                                var id_img = document.getElementById("img") + id_anh;
                                                id_anh.innerHTML = order
                                                id_img.class = 'ws-rounded ws-border-2 ws-h-[45px] ws-border-red-600'
                                            }
                                            </script>
                                            <button type="button"
                                                class="myPrev ws-absolute ws-bg-zinc-800 ws-rounded ws-h-[45px] ws-px-1 ws-left-[1px] ws-top-[0px] ws-text-xl ws-text-white swiper-button-disabled">
                                                <i class="fa-solid fa-chevron-left"></i></i>
                                            </button>
                                            <button type="button"
                                                class="myNext ws-absolute ws-bg-zinc-800 ws-rounded ws-h-[45px] ws-px-1 ws-right-[1px] ws-top-[0px] ws-text-xl ws-text-white">
                                                <i class="fa-solid fa-chevron-right"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <!--teleport start-->
                                <div class="el-overlay ws-preview-dialog" style="z-index:1840949;display:none;">
                                    <!--[-->
                                    <div role="dialog" aria-modal="true" aria-labelledby="el-id-1024-6"
                                        aria-describedby="el-id-1024-7" class="el-overlay-dialog" style="">
                                        <!--[-->
                                        <!--]-->
                                    </div>
                                    <!--]-->
                                </div>
                                <!--teleport end-->
                                <!--]-->
                            </div>
                            <div
                                class="ws-col-span-12 md:ws-col-span-7 ws-py-3 md:ws-pl-1 ws-px-3 md:ws-px-5 md:ws-py-5">
                                <div>
                                    <h2 class="ws-text-xl"></h2>
                                    <div class="ws-flex ws-my-2 md:ws-block ws-justify-between ws-items-center">
                                        <div class="ws-w-[80%] md:ws-w-full"><label
                                                class="ws-text-sm ws-text-zinc-700 ws-block">Trò chơi: <span
                                                    class="ws-text-red-500"><?=$game['name'];?></span></label><label
                                                class="ws-text-sm ws-font-bold">Mã số: <?=$acc['id'];?></label></div>
                                        <div class="md:ws-hidden ws-w-full ws-flex ws-justify-end"><span><button
                                                    class="ws-w-[6rem] ws-relative ws-top-[3px] ws-rounded ws-text-zinc-900 focus:ws-outline-none ws-py-1 ws-px-3"><i
                                                        style="font-size:1.5rem;"
                                                        class="bx bx-cart-alt ws-mx-auto"></i><span
                                                        class="ws-block ws-relative ws-top-[-3px] ws-font-semibold ws-mx-auto ws-text-xs"><small>Thêm
                                                            vào giỏ</small></span></button></span></div>
                                    </div>
                                    <p><span class="ws-text-sm"></span></p>
                                    <div class="ws-my-4 ws-grid ws-grid-cols-12 ws-gap-0">
                                        <div class="md:ws-col-span-9 ws-col-span-12">
                                            <div style="background: linear-gradient(100deg, rgb(255, 66, 78), rgb(253, 130, 10));"
                                                class="ws-rounded">
                                                <!---->
                                                <div class="ws-flex ws-items-center ws-justify-between ws-px-3 ws-py-1">
                                                    <div><span
                                                            class="ws-text-white ws-text-sm ws-text-xs ws-font-semibold">GIÁ
                                                            GỐC</span>
                                                        <h2
                                                            class="ws-text-white ws-stroke-red-500 ws-font-extrabold ws-text-2xl">
                                                            <span
                                                                class="ws-line-through"><?=tien($acc['gia']);?></span><small
                                                                class="ws-relative ws-top-[-10px] ws-text-[10px]">đ</small>
                                                        </h2>
                                                        <p class="ws-font-medium ws-text-sm"
                                                            style="color:rgba(255, 255, 255, 0.8);">Giảm giá <?=$acc['ck'];?>%</p>
                                                    </div>
                                                    <div class="el-divider el-divider--vertical"
                                                        style="--el-border-style:solid;" role="separator">
                                                        <!--v-if-->
                                                    </div>
                                                    <div><span class="ws-text-white ws-text-xs ws-font-semibold">CHỈ CÒN
                                                            <i class="fa-solid fa-fire"></i></span>
                                                        <h2 class="ws-text-white ws-font-extrabold ws-text-2xl">
                                                           <?=tien($acc['gia']- ($acc['gia'] * ($acc['ck'] / 100)) );?> <small
                                                                class="ws-relative ws-top-[-10px] ws-text-[10px]">đ</small>
                                                        </h2>
                                                        <!---->
                                                    </div>
                                                </div>
                                            </div><span class="ws-mt-2 ws-block ws-text-xs">Đã có <b>???</b> người đã
                                                thêm vào giỏ Yêu thích</span>
                                        </div>
                                        <div class="ws-hidden md:ws-block ws-col-span-3">
                                            <div>
                                                <div>
                                                    <button onclick="giohang('<?=$id;?>')"
                                                        class="focus:ws-outline-none ws-block ws-w-full ws-flex ws-flex-col ws-py-4"><i
                                                            class="fa-solid fa-cart-shopping ws-mx-auto"
                                                            style="font-size:2rem;"></i><span
                                                            class="ws-block ws-font-medium ws-mx-auto ws-text-xs ws-text-zinc-700">Thêm
                                                            vào giỏ</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ws-bg-white ws-mb-4"><label
                                            class="ws-text-sm ws-font-medium ws-uppercase ws-mb-2 ws-block">Thông Tin
                                            Chi Tiết</label>
                                        <div>
                                            <?php
                                                    $lines = explode("\n", $game['list_thong_tin']);
                                                    $lines2 = explode("\n", $acc['list_thong_tin']);
                                                    if (!empty($lines)) {
                                                        foreach ($lines as $index => $line) { ?>
                                            <div class="ws-grid ws-grid-cols-12 ws-gap-1 ws-text-sm">
                                                <div
                                                    class="ws-mb-0.5 ws-col-span-4 md:ws-col-span-3 ws-py-2 ws-font-medium ws-px-2 ws-text-zinc-700 ws-bg-zinc-100">
                                                    <?= trim($line); ?></div>
                                                <div
                                                    class="ws-col-span-8 md:ws-col-span-9 ws-py-2 ws-px-2 ws-text-zinc-700">
                                                    <span
                                                        class="ws-inline-block ws-min-w-[5rem]"><?= isset($lines2[$index]) ? trim($lines2[$index]) : ''; ?></span>
                                                    <!---->
                                                </div>
                                            </div>
                                            <?php
                                                        }
                                                    }
                                                    ?>
                                        </div>
                                    </div>
                                    <div><label><i>🔥 Khuyến mãi giảm giá <?=$acc['ck'];?>%</i></label></div>
                                    <div class="ws-mt-4"><button onclick="modal('<?=$acc['id'];?>')" ariadisabled="false" type="button"
                                            class="el-button el-button--primary el-button--large ws-w-full md:ws-w-[20rem]"
                                            style="font-size:1.2rem;--el-button-size:46px;"><i class="el-icon" style="">
                                                <!--[--><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1024 1024">
                                                    <path fill="currentColor"
                                                        d="M192 352h640l64 544H128zm128 224h64V448h-64zm320 0h64V448h-64zM384 288h-64a192 192 0 1 1 384 0h-64a128 128 0 1 0-256 0">
                                                    </path>
                                                </svg>
                                                <!--]-->
                                            </i><span>
                                                <!--[-->Mua ngay
                                                <!--]-->
                                            </span></button></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="modal" role="dialog" aria-modal="false" aria-labelledby="el-id-1024-6"
                        aria-describedby="el-id-1024-7" class="el-overlay ws-notihomes" style="display:none;">

                        <!--[-->
                        <div class="el-dialog" tabindex="-1">
                            <header class="el-dialog__header">
                                <div class="ws-flex ws-items-center ws-justify-between">
                                    <div class="ws-text-red ws-font-semibold"><small>XÁC NHẬN MUA TÀI KHOẢN</small>
                                        <p class="ws-text-2xl">
                                        <div><?=$acc['id'];?></div>
                                        </p>
                                    </div>
                                    <button onclick=" close_modal()"><i
                                            class="fa-solid fa-circle-xmark fa-xl"></i></button>
                                </div>
                                <!--v-if-->
                            </header>
                            <div id="el-id-1024-7" class="el-dialog__body">
                                <div class="ws-p-3">
                                    <div class="ws-mb-4">
                                        <div class="ws-flex ws-justify-between ws-items-center">
                                            <div class="ws-relative ws-font-medium ws-text-zinc-700 ws-uppercase">
                                                <span>Số dư của bạn</span>
                                            </div>
                                            <div class="ws-text-right ws-font-bold ws-text-base ws-text-red-600">
                                                <?=tien($user['money']);?>đ
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
                                                        class="el-input__prefix-inner"><i
                                                            class="el-icon el-input__icon"><svg
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 1024 1024">
                                                                <path fill="currentColor"
                                                                    d="M640 832H64V640a128 128 0 1 0 0-256V192h576v160h64V192h256v192a128 128 0 1 0 0 256v192H704V672h-64zm0-416v192h64V416z">
                                                                </path>
                                                            </svg></i>
                                                        <!--v-if-->
                                                    </span></span><input class="el-input__inner" type="text"
                                                    autocomplete="off" tabindex="0" placeholder="Mã giảm giá"
                                                    id="magiamgia">
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
                                            class="ws-font-semibold ws-text-red-600 ws-text-base">GIÁ TÀI
                                            KHOẢN</label><span class="ws-font-bold ws-text-red-600 ws-text-xl"
                                            id="sotien"><?=tien($acc['gia']- ($acc['gia'] * ($acc['ck'] / 100)) );?>đ</span>
                                    </div>
                                    <!---->
                                    <div class="ws-grid ws-grid-cols-12 ws-gap-x-2 ws-py-2">
                                        <div class="ws-col-span-8">
                                            <button aria-disabled="false" type="button" id="btn_muanick"
                                                class="el-button el-button--primary el-button--large ws-w-full"
                                                style="font-size: 1rem;">
                                                <!--v-if--><span>Xác nhận mua</span>
                                            </button>
                                        </div>
                                        <div class="ws-col-span-4">
                                            <button aria-disabled="false" onclick="close_modal()" type="button"
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
                                sotien: "<?=($acc['gia']- ($acc['gia'] * ($acc['ck'] / 100)) );?>",
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
                                    sotien.innerText = "<?=tien($acc['gia']- ($acc['gia'] * ($acc['ck'] / 100)) );?>đ";
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

                    <script type="text/javascript">
                    $("#btn_muanick").on("click", function() {
                        $('#btn_muanick').html(
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
                                id_acc: "<?=$acc['id'];?>",
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
                                $('#btn_muanick').html(
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
                                $('#btn_muanick').html(
                                    'Mua ngay'
                                ).prop('disabled',
                                    false);
                            }

                        });
                    });

                    function modal(id_acc) {
                        var modal = document.getElementById("modal");
                        modal.style.display = "block";
                    }

                    function close_modal() {
                        var modal = document.getElementById("modal");
                        modal.style.display = "none"; // Ensure modal is hidden when close button is clicked
                        // Reset the innerHTML of sotien to its original value
                        var sotien = document.getElementById("sotien");
                        sotien.innerHTML = "<?=tien($acc['gia']- ($acc['gia'] * ($acc['ck'] / 100)) );?>đ";
                    }
                    </script>
                    <div class="ws-my-4 ws--mx-2 md:ws--mx-0 ws-bg-white md:ws-rounded">
                        <div class="ws-p-3"><label class="ws-text-lg ws-font-medium ws-mb-3 ws-block">Tài Khoản
                                Khác</label>
                            <div class="ws-grid ws-grid-cols-10 ws-gap-2">
                                <?php
                                    $result2 = mysqli_query($ketnoi,"SELECT * FROM `list_acc_game` WHERE `status` = '' AND `gia` != '' ");
                                    while($row2 = mysqli_fetch_assoc($result2)) { ?>
                                <div
                                    class="ws-border ws-col-span-5 md:ws-col-span-2 ws-bg-white ws-rounded-lg hover:ws-shadow-sm">
                                    <a href="/tai-khoan/<?=$row2['id'];?>" class="ws-bg-white">
                                        <div class="ws-relative ws-w-full ws-inline-block ws-mb-0"><img
                                                src="<?=$row2['img'];?>"
                                                class="ws-h-32 md:ws-h-40 ws-w-full ws-object-fill ws-object-center ws-rounded-t-sm ws-rounded-t-lg"><span
                                                class="ws-bg-red-600 ws-absolute ws-top-[5px] ws-right-[5px] ws-text-xs ws-px-2 ws-py-0.5 ws-rounded ws-text-white"><b
                                                    class="ws-font-bold">ID</b> <?=$row2['id'];?></span></div>
                                        <div class="ws-py-1 ws-px-2 ws-text-red-500 ws-text-base">
                                            <div class="ws-flex ws-justify-between ws-items-center">
                                                <div class="ws-col-span-7"><span class="ws-text-sm ws-block">
                                                        <span
                                                            class="ws-line-through ws-text-zinc-500"><?=tien($row2['gia']);?></span>
                                                        <small class="ws-text-zinc-500">đ</small>
                                                        <small class="ws-ml-1 ws-font-semibold">-<?=($row2['ck']);?>%</small></span>
                                                    <span class="ws-font-semibold ws-inline-flex ws-items-start">
                                                        <span class="ws-text-lg"><?=tien($row2['gia']- ($row2['gia'] * ($row2['ck'] / 100)) );?></span>
                                                        <small class="ws-ml-[0.5px]">đ</small>
                                                    </span>
                                                </div>
                                                <div class="ws-col-span-5 ws-text-right ws-mb-1.5"><button
                                                        class="ws-text-xs ws-bg-red-500 ws-text-white ws-rounded ws-px-2 ws-py-1">
                                                        Xem<span
                                                            class="ws-hidden md:ws-inline ws-ml-1">ngay</span></button>
                                                </div>
                                            </div>
                                        </div>
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
                                        <div
                                            class="ws-py-2 ws-truncate ws-text-sm ws-text-zinc-800 ws-px-2 ws-border-t ws-border-dashed">
                                            <i class="ws-text-red-600 fa-solid fa-fire"></i> Vô xem
                                            chi tiết nè.
                                        </div>
                                    </a>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>


</body>

<?php require $_SERVER['DOCUMENT_ROOT'].'/hethong/foot.php';?>


</html>
