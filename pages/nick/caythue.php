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
<style>
   .el-input__inner {
        width: 700px;
    }

    @media (max-width: 600px) {
        .el-input__inner {
            width: 100%;
        }
    }
</style>
<body style="max-width: 100%;" class="ws-bg-zinc-50">
    <?php require $_SERVER['DOCUMENT_ROOT'].'/hethong/nav.php';?>

    <div class="el-overlay ws-auth-modal" style="z-index:1795351;display:none;">
        <div role="dialog" aria-modal="true" aria-labelledby="el-id-1024-1" aria-describedby="el-id-1024-2" class="el-overlay-dialog"></div>
    </div>
    
    <div id="__nuxt">
        <div>
            <div id="app-layout">
               <div class="ws-px-2 ws-mx-auto ws-max-w-7xl" style="min-height:90vh;">
    <div class="ws-mb-[2rem] ws-bg-white" style="margin-top:20px" id="service" data-v-app="">
        <div class="ws-max-w-6xl ws-mx-auto ws-py-10 ws-px-2">
            <div class="ws-rounded ws-pt-2 ws-mb-4">
                <label class="ws-text-base">
                    <small>DỊCH VỤ</small>
                </label>
                <h2 class="ws-block ws-font-bold ws-text-lg ws-text-red-500"><?=$loai['name'];?></h2>
            </div>
            <div class="ws-grid ws-grid-cols-12 ws-gap-4">
                <div class="ws-col-span-12 ws-border ws-border-red-600 ws-border-dashed ws-rounded ws-py-4 ws-px-3">
                    <p><?=$loai['noidung'];?></p>
                </div>
                <div class="ws-col-span-12 md:ws-col-span-4">
                    <img src="<?=$loai['img'];?>" class="ws-w-full ws-rounded">
                </div>
                <div class="ws-col-span-12 md:ws-col-span-8">
                    <form class="el-form el-form--default el-form--label-top">
                        <div class="el-form-item is-required asterisk-left">
                                        <label class="el-form-item__label">Chọn gói</label>
                                        <div class="el-input__wrapper" tabindex="-1">
                                                    <select class="el-input__inner" id="goi" onchange="tongtien()">
                                                        <option>--- Vui Lòng Chọn Gói ---</option>
                                                        <?php $result1 = $ketnoi->query("SELECT * FROM `goi_caythue` WHERE `loai` = '$id' AND `status` = '1'");
                        while ($row1 = $result1->fetch_assoc()) { ?>
                                                        <option value="<?=$row1['id'];?>"><?=$row1['ten'];?></option>
                                  <?php }?>
                                                    </select>

                                                </div>
                                    </div>
                        <div>
                            <h2 class="ws-block ws-mb-3">THÔNG TIN NGƯỜI DÙNG</h2>
                            <div class="el-form-item is-required asterisk-left">
                                <label class="el-form-item__label">Tên tài khoản</label>
                                <div class="el-input el-input--large">
                                    <!-- input --><!-- prepend slot --><!--v-if-->
                                    <div class="el-input__wrapper" tabindex="-1">
                                        <!-- prefix slot --><!--v-if-->
                                    <input class="el-input__inner" type="text" autocomplete="off" tabindex="0" placeholder="Nhập tài khoản" id="taikhoan">
                                    <!-- suffix slot --><!--v-if-->
                                    </div>
                                    <!-- append slot --><!--v-if-->
                                </div>
                            </div>
                            <div class="el-form-item is-required asterisk-left">
                                <label class="el-form-item__label">Mật khẩu</label>
                                <div class="el-input el-input--large">
                                    <!-- input --><!-- prepend slot --><!--v-if-->
                                    <div class="el-input__wrapper" tabindex="-1">
                                        <!-- prefix slot --><!--v-if-->
                                        <input class="el-input__inner" type="text" autocomplete="off" tabindex="0" placeholder="Nhập mật khẩu" id="matkhau">
                                        <!-- suffix slot --><!--v-if-->
                                        </div>
                                        <!-- append slot --><!--v-if-->
                                </div>
                            </div>
                            <div class="el-form-item is-required asterisk-left">
                                <label class="el-form-item__label">2FA / Mã dự phòng</label>
                                <div class="el-input el-input--large">
                                    <!-- input --><!-- prepend slot --><!--v-if-->
                                    <div class="el-input__wrapper" tabindex="-1">
                                        <!-- prefix slot --><!--v-if-->
                                        <input class="el-input__inner" type="text" autocomplete="off" tabindex="0" placeholder="Nhập 2fa/mã dự phòng" id="mkc2">
                                        <!-- suffix slot --><!--v-if-->
                                        </div>
                                        <!-- append slot --><!--v-if-->
                                </div>
                                <i>
                                    <a class="ws-text-red-600" target="_blank" href="">Xem hướng dẫn</a>
                                </i>
                            </div>
                            <div class="el-form-item is-required asterisk-left">
                                <label class="el-form-item__label">Ghi Chú</label>
                                <div class="el-textarea el-input--large">
                                    <!-- input --><!-- textarea -->
                                    <textarea class="el-textarea__inner" rows="4" tabindex="0" autocomplete="off" placeholder="Nhập ghi chú cho admin nếu có..." id="ghichu" style="min-height: 31px;"></textarea>
                                    <!--v-if-->
                                    </div>
                            </div>
                        </div>
                        <div class="el-form-item asterisk-left">
                            <div class="ws-mt-4">
                                <label class="ws-font-medium ws-block ws-text-zinc-800 ws-text-xs ws-mb-1">CẦN THANH TOÁN:</label>
                                <span class="ws-font-extrabold ws-text-2xl ws-text-red-600" id="tongtien">0</span>
                                <span class="ws-font-extrabold ws-text-2xl ws-text-red-600">₫</span></div>
                        </div>
                        <button aria-disabled="false" id="btn_oder" type="button" class="el-button el-button--primary el-button--large ws-font-extrabold" fdprocessedid="vaxb0h">
                            <!--v-if-->
                            <span class="">MUA NGAY</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
            </div>
        </div>
    </div>
<script type="text/javascript">
    $("#btn_oder").click(function() {
        $('#btn_oder').html('Loading...').prop('disabled',
            true);
        $.ajax({
            url: '/ajax/caythe/caythue.php',
            type: 'POST',
            dataType: "json",
            data: {
                action: "caythue",
                goi: $('#goi').val(),
                taikhoan: $('#taikhoan').val(),
                matkhau: $('#matkhau').val(),
                mkc2: $('#mkc2').val(),
                ghichu: $('#ghichu').val(),
            },
            success: function(res) {
                if (res.status == 'success') {
                    cuteToast({
                        type: "success",
                        message: res.msg,
                        timer: 5000
                    });
                    setTimeout(function() {
                        window.location = "/customer/caythue"
                    }, 1000);
                } else {
                    cuteToast({
                        type: "error",
                        message: res.msg,
                        timer: 5000
                    });
                }
                $('#btnThueCron').html('<i class="fa fa-cart-plus mr-1"></i>THUÊ NGAY').prop('disabled', false);
            }
        });
    });
    
    function tongtien() {
        var goi = $('#goi').val();
        if(goi != ''){
            $.ajax({
                url: '/ajax/caythe/caythue.php',
                type: 'POST',
                data: {
                    action: "total",
                    goi: goi
                },
                success: function(result) {
                    $('#tongtien').html(result);
                }
            });
        }else{
            $('#tongtien').html();
        }
            
    }
</script>
    <?php require $_SERVER['DOCUMENT_ROOT'].'/hethong/foot.php';?>
</body>
</html>
