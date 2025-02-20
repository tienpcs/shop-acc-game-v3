<!DOCTYPE html>
<html style="overflow-x: hidden;">

<?php require $_SERVER['DOCUMENT_ROOT'].'/hethong/head.php';?>
<?php 
if(empty($_GET['danhmuc'])||antixss($_GET['danhmuc']=="")){
    echo '<script type="text/javascript">if(!alert("Không tìm thấy trang!")){window.location.href = "/";}</script>';
}else{
    $id = antixss($_GET['danhmuc']);
    $danhmuc = $ketnoi->query("SELECT * FROM `danh_muc_tai_khoan` WHERE `id` = '$id'AND `status` = 'ON' ")->fetch_array();
    if(empty($danhmuc)){
        echo '<script type="text/javascript">if(!alert("Không tìm thấy trang!")){window.location.href = "/";}</script>';
    }
} 
?>
<title><?=$danhmuc['name'];?> | </title>
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
                    <div class="ws-my-4">
                        <h2 class="ws-text-2xl ws-font-semibold"><?=$danhmuc['name'];?></h2><span
                            class="ws-text-sm ws-text-zinc-700"><?=$danhmuc['noidung'];?></span>
                    </div>
                    <div class="ws-my-10 ws-col-span-12 ws-px-1 md:ws-px-2 lg:ws-px-0">
                        <div>
                            <div>
                                <div class="ws-grid ws-grid-cols-12 ws-gap-3 md:ws-gap-4 lg:ws-gap-5">
                                    <!--[-->
                                    <?php
                                    $result2 = mysqli_query($ketnoi,"SELECT * FROM `loai_tai_khoan` WHERE `status` = 'ON' AND `danhmuc` = '".$id."'");
                                    while($row2 = mysqli_fetch_assoc($result2)) { ?>
                                    <div class="ws-col-span-6 md:ws-col-span-4 lg:ws-col-span-3"><a
                                            href="/tai-khoan/moi-nick-lien-quan-sieu-vip">
                                            <div class="ws-relative ws-mb-2"><img
                                                    src="<?=$row2['img'];?>"
                                                    class="ws-rounded-lg ws-w-full md:ws-h-[9.5rem]"><span
                                                    class="ws-absolute ws-font-semibold ws-bottom-[5px] ws-right-[5px] ws-bg-blue-600 ws-rounded ws-px-2 ws-text-xs ws-text-white"><small><span
                                                            class="ws-inline-block">Đã bán: <?=tien($row2['buy']);?></span>
                                                        <div class="el-divider el-divider--vertical"
                                                            style="--el-border-style:solid;" role="separator">
                                                            <!--v-if-->
                                                        </div><span class="ws-inline-block">Xem: <?=tien($row2['view']);?></span>
                                                    </small></span></div>
                                            <div class="ws-min-h-[50px]"><label
                                                    class="ws-block ws-font-medium ws-text-xs md:ws-text-sm ws-text-zinc-900"><?=($row2['name']);?></label>
                                                <div>
                                                    <!----><span
                                                        class="ws-text-red-600 ws-text-xs md:ws-text-sm ws-font-semibold"><?=($row2['noidung']);?></span>
                                                    <!---->
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <?php } ?>
                                    <!--]-->
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