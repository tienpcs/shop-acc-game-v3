<!DOCTYPE html>
<html style="overflow-x: hidden;" class="ws-bg-zinc-100">

<!DOCTYPE html>
<html style="overflow-x: hidden;">

<?php require $_SERVER['DOCUMENT_ROOT'].'/hethong/head.php';?>
<title>Thông tin tài khoản</title>
<?php checklogin();?>
<?php require $_SERVER['DOCUMENT_ROOT'].'/hethong/nav.php';?>

<body style="max-width: 100%;">


    <div id="__nuxt">
        <div>
            <!--[-->
            <div id="customer-layout">
                <div class="ws-px-2 ws-py-4 md:ws-py-12 ws-grid ws-grid-cols-12 ws-gap-2 md:ws-max-w-6xl md:ws-mx-auto">
                    <?php require_once('nav.php');?>
                    <div class="ws-col-span-12 md:ws-col-span-9 ws-min-h-[70vh]">
                        <!--[-->
                        <div>
                            <h3 class="ws-text-xl ws-text-zinc-900 ws-mb-4">Thông tin tài khoản</h3>
                            <div class="ws-relative">
                                <!---->
                                <div
                                    class="ws-bg-white ws-relative ws-my-1 ws-py-3 md:ws-py-4 ws-px-4 ws-grid ws-grid-cols-12 ws-gap-x-4 ws-gap-y-2 ws-rounded-none md:ws-rounded">
                                    <div class="ws-absolute ws-border-skz"></div>
                                    <div class="ws-col-span-12 md:ws-col-span-6"><label
                                            class="ws-block ws-mb-4 ws-text-zinc-700"><i
                                                class="fa-regular fa-user ws-relative ws-top-[1px] ws-mr-1"></i> Thông
                                            tin cá
                                            nhân</label>
                                        <div class="ws-grid ws-grid-cols-12 ws-gap-4 ws-text-sm ws-px-1 ws-mb-4">
                                            <div class="ws-col-span-5 ws-text-zinc-700">ID</div>
                                            <div class="ws-col-span-7"><?=$user['id'];?></div>
                                        </div>
                                        <div class="ws-grid ws-grid-cols-12 ws-gap-4 ws-text-sm ws-px-1 ws-mb-4">
                                            <div class="ws-col-span-5 ws-text-zinc-700">Tên tài khoản</div>
                                            <div class="ws-col-span-7 ws-text-red-500"><?=$username;?></div>
                                        </div>

                                        <div class="ws-grid ws-grid-cols-12 ws-gap-4 ws-text-sm ws-px-1 ws-mb-4">
                                            <div class="ws-col-span-5 ws-text-zinc-700">Ví chính</div>
                                            <div class="ws-col-span-7 ws-text-red-500 ws-font-semibold">
                                                <?=tien($user['money']);?> đ </div>
                                        </div>
                                        <div class="ws-grid ws-grid-cols-12 ws-gap-4 ws-text-sm ws-px-1 ws-mb-4">
                                            <div class="ws-col-span-5 ws-text-zinc-700">Ví Coin</div>
                                            <div class="ws-col-span-7 ws-text-red-500 ws-font-semibold">
                                                <?=tien($user['money']);?></div>
                                        </div>
                                        <div class="ws-grid ws-grid-cols-12 ws-gap-4 ws-text-sm ws-px-1 ws-mb-4">
                                            <div class="ws-col-span-5 ws-text-zinc-700">Ngày tham gia</div>
                                            <div class="ws-col-span-7"><?=($user['time']);?></div>
                                        </div>
                                        <div
                                            class="ws-mb-8 md:ws-mb-0 ws-text-sm ws-leading-6 ws-border ws-border-dashed ws-border-red-500 ws-rounded ws-px-2 ws-py-1 ws-bg-red-50">
                                            Vui lòng ghi nhớ <span class="ws-text-red-500">tên tài khoản</span> và cập
                                            nhật các thông tin chính xác để tránh mất tài khoản
                                        </div>
                                    </div>
                                    <div class="ws-col-span-12 md:ws-col-span-6 md:ws-border-l md:ws-pl-6">
                                        <div class="ws-update_3 ws-mb-2">
                                            <label class="ws-block ws-mb-2 ws-text-zinc-700">
                                            <i class="fa-solid fa-lock ws-relative ws-top-[1px] ws-mr-1"></i> 
                                                    Đổi mật khẩu
                                            </label>
                                            <div>
                                                <div class="ws-max-w-sm">
                                                    <form
                                                        class="el-form el-form--default el-form--label-right tw-px-2 md:tw-px-0">
                                                        <div class="el-form-item is-required asterisk-left">
                                                            <div class="el-form-item__content" style="margin-left:;">
                                                                <!--[--><label for="new_password">Mật khẩu cũ</label>
                                                                <div class="el-input el-input--large el-input--suffix"
                                                                    style="">
                                                                    <div class="el-input__wrapper">
                                                                        <input class="el-input__inner" type="password"
                                                                            id="oldpassword" autocomplete="off"
                                                                            tabindex="0" style="">
                                                                        <span class="el-input__suffix"><span
                                                                                class="el-input__suffix-inner">
                                                                            </span></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="el-form-item is-required asterisk-left">
                                                            <div class="el-form-item__content" style="margin-left:;">
                                                                <label for="confirm_password">Nhập mật khẩu
                                                                    mới</label>
                                                                <div class="el-input el-input--large el-input--suffix"
                                                                    style="">
                                                                    <div class="el-input__wrapper">
                                                                        <input id="repassword1" class="el-input__inner"
                                                                            type="password" autocomplete="off"
                                                                            tabindex="0" style="">
                                                                        <span class="el-input__suffix"><span
                                                                                class="el-input__suffix-inner">
                                                                            </span></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="el-form-item is-required asterisk-left">
                                                            <div class="el-form-item__content" style="margin-left:;">
                                                                <label for="confirm_password">Nhập lại mật khẩu
                                                                    mới</label>
                                                                <div class="el-input el-input--large el-input--suffix"
                                                                    style="">
                                                                    <div class="el-input__wrapper">
                                                                        <input id="repassword2" class="el-input__inner"
                                                                            type="password" autocomplete="off"
                                                                            tabindex="0" style="">
                                                                        <span class="el-input__suffix"><span
                                                                                class="el-input__suffix-inner">
                                                                            </span></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <button ariadisabled="false" type="button" id="btn_matkhau"
                                                            class="el-button el-button--primary el-button--large ws-w-full ws-font-bold"
                                                            style="">
                                                            <span class="">
                                                                Cập nhật
                                                            </span>
                                                        </button>
                                                        <script type="text/javascript">
                                                        $("#btn_matkhau").on("click", function() {
                                                            $('#btn_matkhau').html(
                                                                '<i class="fa fa-spinner fa-spin"></i> Đang xử lý...'
                                                            ).prop(
                                                                'disabled',
                                                                true);
                                                            $.ajax({
                                                                url: "<?=BASE_URL('ajax/doipass.php');?>",
                                                                method: "POST",
                                                                dataType: "JSON",
                                                                data: {
                                                                    oldpassword: $("#oldpassword").val(),
                                                                    repassword1: $("#repassword1")
                                                                        .val(),
                                                                    repassword2: $("#repassword2").val()
                                                                },

                                                                success: function(respone) {
                                                                    if (respone.status ==
                                                                        'success') {
                                                                        cuteToast({
                                                                            type: "success",
                                                                            message: respone
                                                                                .msg,
                                                                            timer: 5000
                                                                        });
                                                                        setTimeout(
                                                                            "location.href = '';",
                                                                            500);
                                                                    } else {
                                                                        cuteToast({
                                                                            type: "error",
                                                                            message: respone
                                                                                .msg,
                                                                            timer: 5000
                                                                        });
                                                                    }
                                                                    $('#btn_matkhau').html(
                                                                        'Cập nhật'
                                                                    ).prop('disabled',
                                                                        false);
                                                                },
                                                                error: function() {
                                                                    cuteToast({
                                                                        type: "error",
                                                                        message: 'Không thể xử lý',
                                                                        timer: 5000
                                                                    });
                                                                    $('#btn_matkhau').html(
                                                                        'Cập nhật'
                                                                    ).prop('disabled',
                                                                        false);
                                                                }

                                                            });
                                                        });
                                                        </script>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--]-->
                    </div>
                </div>
            </div>

</body>
<?php require $_SERVER['DOCUMENT_ROOT'].'/hethong/foot.php';?>

</html>