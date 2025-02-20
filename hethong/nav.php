<div style="z-index:999;" class="ws-bg-white ws-border-b ws-border-zinc-100 ws-sticky ws-top-0">
    <div
        class="ws-flex ws-justify-between ws-items-center md:ws-items-start ws-py-1 md:ws-py-2 ws-px-3 ws-mx-auto ws-max-w-7xl">
        <span class="ws-inline-flex ws-items-start ws-flex-1"><a href="/" class="ws-w-38"><img
                    src="<?=$bdtvl['logo'];?>" class="ws-h-12" alt=""></a>
            <div class="md:ws-block ws-hidden ws-ml-5 ws-w-[70%] ws-mr-4" id="modal_timkiem">
                <!-- máy tính     -->
                <div class="ws-relative"><input value=""
                        class="ws-border focus:ws-outline-none ws-rounded-lg ws-py-2 ws-pl-4 ws-pr-[5rem] ws-w-full ws-text-sm"
                        placeholder="Nhập tìm kiếm..."><button
                        class="ws-absolute ws-bg-white ws-font-semibold ws-text-sm ws-text-red-500 ws-top-[1px] ws-right-[5px] ws-py-2 ws-px-3 ws-rounded">
                        Tìm kiếm </button>
                </div>
                <div class="ws-px-1 ws-mt-1">

                </div>
            </div>
        </span>
        <!-- tìm kiếm phone -->
        <div id="modal_timkiemdt" class="el-overlay ws-notihomes" style="z-index: 2005; display: none;">
            <div role="dialog" aria-modal="false" aria-labelledby="el-id-1024-6" aria-describedby="el-id-1024-7"
                class="el-overlay-dialog">
                <div class="el-dialog" tabindex="-1">
                    <div id="el-id-1024-2" class="el-dialog__body">
                        <div class="ws-auth">
                            <div class="el-popover__title mb-5" role="title"></div>
                            <!--[-->
                            <div class="ws-relative">
                                <input
                                    class="ws-border focus:ws-outline-none ws-rounded-lg ws-py-2 ws-pl-4 ws-pr-[5rem] ws-w-full ws-text-sm"
                                    placeholder="Nhập tìm kiếm..." value="">
                                <button
                                    class="ws-absolute ws-bg-white ws-font-semibold ws-text-sm ws-text-red-500 ws-top-[1px] ws-right-[5px] ws-py-2 ws-px-3 ws-rounded">
                                    Tìm kiếm </button>
                            </div>
                        </div>
                    </div>
                    <footer class="el-dialog__footer">
                        <span data-v-596f3477="" class="dialog-footer">
                            <button data-v-596f3477="" type="button" onclick="modal_timkiemdt()" aria-disabled="false"
                                type="button" class="el-button">
                                <span class="">Tắt</span>
                            </button>
                        </span>
                    </footer>
                </div>
            </div>
        </div>

        <span class="md:ws-flex ws-hidden ws-flex-0 ws-items-start ws-justify-end">
            <span onclick="naptien()"
                class="ws-cursor-pointer ws-bg-gradient-to-l ws-from-red-500 ws-to-pink-500 ws-text-white ws-px-3 ws-h-9 ws-rounded-lg ws-flex ws-justify-center ws-items-center ws-rounded ws-mr-2 md:ws-mr-4">
                <i class="ws-text-xl fa-solid fa-money-bill"></i>
                <span class="ws-hidden lg:ws-inline-block ws-ml-1 ws-text-sm ws-font-semibold">Nạp tiền ( tự động )</span>
            </span>
            <a href="/customer/notifications"
                class="ws-h-9 ws-w-10 ws-rounded ws-flex ws-justify-center ws-items-center ws-text-red-600 ws-mr-4">
                <i class="ws-text-2xl fa-regular fa-bell" style="color: #000000;"></i>
            </a>
            <?php if($username==""){ ?>
            <span
                class="ws-text-red-600 ws-cursor-pointer ws-h-9 ws-rounded ws-flex ws-justify-center ws-items-center ws-rounded">
                <button onclick="modal_dangnhap()">
                    <i
                        class="ws-flex ws-items-center ws-text-xl fa-solid fa-user ws-border ws-py-1.5 ws-rounded-lg ws-px-1.5"></i>
                    <span class="ws-hidden lg:ws-inline-block ws-ml-2 ws-text-sm ws-font-semibold"> Đăng nhập / Đăng ký</span>
                </button>
            </span>
            <!---->
            <?php }else{ ?>
            <div onclick="navbar()">
                <a
                    class="ws-py-1 ws-h-9 ws-rounded-lg ws-cursor-pointer ws-flex ws-justify-center ws-items-center el-tooltip__trigger el-tooltip__trigger">
                    <div class="ws-flex ws-items-center"><img src="/assets/img/avatar.jpeg"
                            class="ws-h-9 ws-rounded-full">
                        <div class="ws-mr-2 ws-ml-1.5 ws-inline-block">
                            <p class="ws-text-sm ws-truncate ws-w-[5.4rem] ws-font-medium ws-text-black">

                                <small><?=$username;?></small>
                            </p>
                            <p class="ws-text-red-500 ws-relative ws-text-xs ws-font-bold">
                                <span class="ws-ml-0 ws-text-red-600"><?=tien($user['money']);?> <small>đ</small>
                                </span>
                            </p>
                        </div>
                        <i class="fa-solid fa-caret-down"></i>
                    </div>
                </a>
            </div>
            <div id="nav_bar"
                class="el-popper is-light el-popover khanhdz" tabindex="-1" aria-hidden="false" role="tooltip" id="el-id-1024-3"
                data-popper-reference-hidden="false" data-popper-escaped="false" data-popper-placement="bottom">
                <div class="ws-text-zinc-800 ws-px-1">
                    <div class="ws-leading-6">
                        <div class="ws-border-b ws-border-gray-100 ws-text-zinc-800 ws-mb-2 ws-pb-2">
                            <div class="ws-relative ws-leading-6">
                                <!---->
                                <p class="ws-text-sm"><?=$username;?></p>
                                <p class="ws-text-sm"><b>Số dư: </b>
                                <span class="ws-text-red-600 ws-font-bold"><?=tien($user['money']);?> <small>đ</small>
                                </span>
                                </p>
                                <p class="ws-text-sm"><b>Coin: </b><span class="ws-text-red-600 ws-font-bold">0</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="ws--mx-2">
                        <?php if($user['level']==9){ ?>
                          <a href="/admin"
                            class="ws-py-2 ws-px-2 ws-block hover:ws-bg-zinc-100 ws-rounded ws-font-medium">Trang Quản Trị</a>
                            <?php } ?>
                        <?php if($user['level']==3){ ?>
                          <a href="/ctv"
                            class="ws-py-2 ws-px-2 ws-block hover:ws-bg-zinc-100 ws-rounded ws-font-medium">Trang CTV</a>
                            <?php } ?>
                        <a href="/customer/profile"
                            class="ws-py-2 ws-px-2 ws-block hover:ws-bg-zinc-100 ws-rounded ws-font-medium">Quản lý tài khoản</a>
                        <label class="ws-mt-2 ws-block ws-text-xs ws-font-bold ws-text-red-600 ws-px-2">
                            <small>LỊCH SỬ</small>
                        </label>
                        <a href="/customer/transactions"
                            class="ws-py-2 ws-px-2 ws-block hover:ws-bg-zinc-100 ws-rounded ws-font-medium"><i
                                class="fa-solid fa-angle-right"></i> Lịch sử nạp tiền</a>
                            
                        <a href="/customer/nicks"
                            class="ws-py-2 ws-px-2 ws-block hover:ws-bg-zinc-100 ws-rounded ws-font-medium">
                            <i class="fa-solid fa-angle-right"></i> Tài khoản đã mua</a>
                             <a href="/customer/caythue"
                            class="ws-py-2 ws-px-2 ws-block hover:ws-bg-zinc-100 ws-rounded ws-font-medium"><i
                                class="fa-solid fa-angle-right"></i> Lịch sử Cày Thuê</a>
                        <label class="ws-mt-2 ws-block ws-text-xs ws-font-bold ws-text-red-600 ws-px-2">
                            <small>TÀI KHOẢN</small>
                        </label>
                        <a href="/Auth/Logout"
                            class="ws-cursor-pointer ws-py-2 ws-px-2 ws-block hover:ws-bg-zinc-100 ws-rounded ws-font-medium">
                            <i class="fa-solid fa-angle-right"></i> Đăng xuất</a>
                    </div>
                </div>
                <span class="el-popper__arrow" style="position: absolute; left: 121px;" data-popper-arrow=""></span>
            </div>



            <?php } ?>

        </span>


        <!-- dienthoai -->
        <span class="ws-inline-flex md:ws-hidden ws-flex-0 ws-items-start ws-justify-end">
            <a href="/customer/notifications"
                class="ws-h-9 ws-w-10 ws-rounded ws-flex ws-justify-center ws-items-center ws-text-red-600">
                <div class="el-badge">
                    <i class="ws-text-2xl fa-solid fa-bell"></i>
                    <sup class="el-badge__content el-badge__content--danger is-fixed is-dot"></sup>
                </div>
            </a>

            <?php if($username!=""){ ?>
            <span onclick="naptien()"
                class="md:ws-hidden ws-cursor-pointer ws-text-xs ws-bg-gradient-to-l ws-from-red-500 ws-to-pink-500 ws-text-white ws-px-3 ws-h-9 ws-flex ws-justify-center ws-items-center ws-rounded ws-ml-2">
                <i class="ws-text-lg fa-solid fa-money-bill"></i>
                <span class="ws-ml-1 ws-font-semibold">Nạp tiền</span></span>
            <button type="button" onclick="navbar_phone()"
                class="ws-ml-2 ws-h-9 ws-w-10 ws-bg-red-50 ws-rounded ws-flex ws-justify-center ws-items-center ws-text-red-600 el-tooltip__trigger el-tooltip__trigger">
                <i class="ws-text-2xl fa-solid fa-bars"></i>
            </button>
            <?php }else{ ?>
            <span onclick="modal_dangnhap_phone()"
                class="md:ws-hidden ws-cursor-pointer ws-text-xs ws-bg-gradient-to-l ws-from-red-500 ws-to-pink-500 ws-text-white ws-px-3 ws-h-9 ws-flex ws-justify-center ws-items-center ws-rounded ws-ml-2">
                <span class="ws-ml-1 ws-font-semibold">Đăng nhập</span>
            </span>
            <?php } ?>
            <!---->
        </span>
    </div>
</div>
<!-- Đăng Kí - Đăng Nhập -->
<div id="modal_dangnhap" class="el-overlay ws-notihomes" style="z-index: 2005; display: none;">
    <div role="dialog" aria-modal="false" aria-labelledby="el-id-1024-6" aria-describedby="el-id-1024-7"
        class="el-overlay-dialog">
        <div class="el-dialog" tabindex="-1">
            <div id="el-id-1024-2" class="el-dialog__body">
                <div class="ws-auth">
                    <button id="closeButtonAuth" aria-label="el.dialog.close" class="el-dialog__headerbtn" type="button"
                        onclick="closemodal_dangnhap()">
                        <i class="el-icon el-dialog__close">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1024 1024">
                                <path fill="currentColor"
                                    d="M764.288 214.592 512 466.88 259.712 214.592a31.936 31.936 0 0 0-45.12 45.12L466.752 512 214.528 764.224a31.936 31.936 0 1 0 45.12 45.184L512 557.184l252.288 252.288a31.936 31.936 0 0 0 45.12-45.12L557.12 512.064l252.288-252.352a31.936 31.936 0 1 0-45.12-45.184z">
                                </path>
                            </svg>
                        </i>
                    </button>
                    <div class="ws-max-w-sm ws-mx-auto">
                        <span class="ws-mt-4 ws-mb-8 ws-text-center ws-block ws-font-semibold ws-text-black ws-text-lg">ĐĂNG NHẬP TÀI KHOẢN</span>
                        <div>
                            <a href="/login-facebook"
                                class="ws-bg-blue-600 ws-text-white ws-relative ws-pl-8 ws-rounded ws-h-10 ws-px-3 ws-font-semibold ws-w-full ws-flex ws-items-center ws-justify-center">

                                <i class="fa-brands fa-facebook ws-text-2xl ws-mr-2"></i>
                                <span class="ws-inline-block ws-relative ws-top-[-1px]"> Đăng nhập bằng Facebook</span>
                            </a>
                            <div class="el-divider el-divider--horizontal ws-font-medium" role="separator"
                                style="--el-border-style: solid;">
                                <div class="el-divider__text is-center">
                                    <span class="ws-text-zinc-500">hoặc</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ws-max-w-sm ws-mx-auto ws-text-zinc-700"
                        sso="U2FsdGVkX18AZOsW5WHoujovjEGxfhawwK3wxA14NrHkynt26IkcsdXM0aLZbtO1">
                        <form class="el-form el-form--default el-form--label-right">
                            <div class="el-form-item is-required asterisk-left">
                                <div class="el-form-item__content">
                                    <div class="el-input el-input--large">
                                        <div class="el-input__wrapper" tabindex="-1">
                                            <input class="el-input__inner" type="text" autocomplete="off" tabindex="0"
                                                placeholder="Tên tài khoản" id="username">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="el-form-item is-required asterisk-left">
                                <div class="el-form-item__content">
                                    <div class="el-input el-input--large el-input--suffix">
                                        <div class="el-input__wrapper" tabindex="-1">
                                            <input class="el-input__inner" type="password" autocomplete="off"
                                                tabindex="0" placeholder="Mật khẩu" id="password">
                                            <span class="el-input__suffix">
                                                <span class="el-input__suffix-inner"></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button aria-disabled="false" type="button" id="btn_login"
                                class="el-button el-button--primary el-button--large ws-w-full ws-font-extrabold">
                                Đăng nhập
                            </button>
                        </form>
                        <button aria-disabled="false" type="button" onclick="dangky()"
                            class="el-button el-button--large is-plain ws-w-full ws-mt-4 ws-font-extrabold">
                            <span class="">Đăng ký tài khoản</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="modal_dangky" class="el-overlay ws-notihomes" style="z-index: 2005; display: none;">
    <div role="dialog" aria-modal="false" aria-labelledby="el-id-1024-6" aria-describedby="el-id-1024-7"
        class="el-overlay-dialog">
        <div class="el-dialog" tabindex="-1">
            <div id="el-id-1024-2" class="el-dialog__body">
                <div class="ws-auth">
                    <button id="closeButtonAuth" aria-label="el.dialog.close" class="el-dialog__headerbtn" type="button"
                        onclick="closemodal_dangky()">
                        <i class="el-icon el-dialog__close">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1024 1024">
                                <path fill="currentColor"
                                    d="M764.288 214.592 512 466.88 259.712 214.592a31.936 31.936 0 0 0-45.12 45.12L466.752 512 214.528 764.224a31.936 31.936 0 1 0 45.12 45.184L512 557.184l252.288 252.288a31.936 31.936 0 0 0 45.12-45.12L557.12 512.064l252.288-252.352a31.936 31.936 0 1 0-45.12-45.184z">
                                </path>
                            </svg>
                        </i>
                    </button>
                    <div class="ws-max-w-sm ws-mx-auto">
                        <span
                            class="ws-mt-4 ws-mb-8 ws-text-center ws-block ws-font-semibold ws-text-black ws-text-lg">ĐĂNG KÝ TÀI KHOẢN</span>
                        <div>
                            <a href="/login-facebook"
                                class="ws-bg-blue-600 ws-text-white ws-relative ws-pl-8 ws-rounded ws-h-10 ws-px-3 ws-font-semibold ws-w-full ws-flex ws-items-center ws-justify-center">

                                <i class="fa-brands fa-facebook ws-text-2xl ws-mr-2"></i><span
                                    class="ws-inline-block ws-relative ws-top-[-1px]"> Đăng ký bằng Facebook</span>
                            </a>
                            <div class="el-divider el-divider--horizontal ws-font-medium" role="separator"
                                style="--el-border-style: solid;">
                                <div class="el-divider__text is-center">
                                    <span class="ws-text-zinc-500">hoặc</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ws-max-w-sm ws-mx-auto ws-text-zinc-700"
                        sso="U2FsdGVkX18AZOsW5WHoujovjEGxfhawwK3wxA14NrHkynt26IkcsdXM0aLZbtO1">
                        <form class="el-form el-form--default el-form--label-right">
                            <div class="el-form-item is-required asterisk-left">
                                <div class="el-form-item__content">
                                    <div class="el-input el-input--large">
                                        <div class="el-input__wrapper" tabindex="-1">
                                            <input class="el-input__inner" type="text" autocomplete="off" tabindex="0"
                                                placeholder="Tên tài khoản" id="username_reg">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="el-form-item is-required asterisk-left">
                                <div class="el-form-item__content">
                                    <div class="el-input el-input--large el-input--suffix">
                                        <div class="el-input__wrapper" tabindex="-1">
                                            <input class="el-input__inner" type="password" autocomplete="off"
                                                tabindex="0" placeholder="Mật khẩu" id="password_reg">
                                            <span class="el-input__suffix">
                                                <span class="el-input__suffix-inner"></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="el-form-item is-required asterisk-left">
                                <div class="el-form-item__content">
                                    <div class="el-input el-input--large el-input--suffix">
                                        <div class="el-input__wrapper" tabindex="-1">
                                            <input class="el-input__inner" type="password" autocomplete="off"
                                                tabindex="0" placeholder="Mật khẩu" id="repassword_reg">
                                            <span class="el-input__suffix">
                                                <span class="el-input__suffix-inner"></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="el-form-item is-required asterisk-left">
                                <div class="el-form-item__content">
                                    <div class="g-recaptcha" data-sitekey="<?=$site_key;?>"
                                        style="display: inline-block;"></div>
                                </div>
                            </div>
                            <button aria-disabled="false" type="button" id="btn_register"
                                class="el-button el-button--primary el-button--large ws-w-full ws-font-extrabold">
                                Đăng ký
                            </button>
                        </form>
                        <button aria-disabled="false" type="button" onclick="dangnhap()"
                            class="el-button el-button--large is-plain ws-w-full ws-mt-4 ws-font-extrabold">
                            <span class="">Đăng nhập tài khoản</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
function navbar_phone() {
    var modal_bar = document.getElementById("nav_bar");
    if (modal_bar.style.display === "block") {
        modal_bar.style.display = "none";
    } else {
        modal_bar.style.display = "block";
    }
}
</script>
<script>
function navbar() {
    var modal_bar = document.getElementById("nav_bar");
    if (modal_bar.style.display === "block") {
        modal_bar.style.display = "none";
    } else {
        modal_bar.style.display = "block";
    }
}
</script>

<script type="text/javascript">
$("#btn_login").on("click", function() {
    $('#btn_login').html(
        '<i class="fa fa-spinner fa-spin"></i> Đang xử lý...').prop(
        'disabled',
        true);
    $.ajax({
        url: "<?=BASE_URL('ajax/auth/login.php');?>",
        method: "POST",
        dataType: "JSON",
        data: {
            username: $("#username").val(),
            password: $("#password").val()
        },

        success: function(respone) {
            if (respone.status == 'success') {
                cuteToast({
                    type: "success",
                    message: respone.msg,
                    timer: 5000
                });
                setTimeout("location.href = '<?=$_SERVER['REQUEST_URI'];?>';", 500);
            } else {
                cuteToast({
                    type: "error",
                    message: respone.msg,
                    timer: 5000
                });
            }
            $('#btn_login').html(
                'Đăng Nhập'
            ).prop('disabled',
                false);
        },
        error: function() {
            cuteToast({
                type: "error",
                message: 'Không thể xử lý',
                timer: 5000
            });
            $('#btn_login').html(
                'Đăng Nhập'
            ).prop('disabled',
                false);
        }

    });
});
</script>
<script type="text/javascript">
$("#btn_register").on("click", function() {
    $('#btn_register').html(
        '<i class="fa fa-spinner fa-spin"></i> Đang xử lý...').prop(
        'disabled',
        true);
    $.ajax({
        url: "<?=BASE_URL('ajax/auth/register.php');?>",
        method: "POST",
        dataType: "JSON",
        data: {
            username: $("#username_reg").val(),
            password: $("#password_reg").val(),
            repassword: $("#repassword_reg").val(),
            recaptcha: grecaptcha.getResponse()
        },

        success: function(respone) {
            if (respone.status == 'success') {
                grecaptcha.reset();
                cuteToast({
                    type: "success",
                    message: respone.msg,
                    timer: 5000
                });
                setTimeout("location.href = '<?=$_SERVER['REQUEST_URI'];?>';", 500);
            } else {
                grecaptcha.reset();
                cuteToast({
                    type: "error",
                    message: respone.msg,
                    timer: 5000
                });
            }
            $('#btn_register').html(
                'Đăng Ký'
            ).prop('disabled',
                false);
        },
        error: function() {
            cuteToast({
                type: "error",
                message: 'Không thể xử lý',
                timer: 5000
            });
            $('#btn_register').html(
                'Đăng Ký'
            ).prop('disabled',
                false);
        }

    });
});
</script>
<script>
function modal_dangnhap() {
    var modal = document.getElementById("modal_dangnhap");
    modal.style.display = "block";
}

function closemodal_dangnhap() {
    var modal = document.getElementById("modal_dangnhap");
    modal.style.display = "none";
}
</script>
<script>
function dangky() {
    var modaldangnhap = document.getElementById("modal_dangnhap");
    var modaldangky = document.getElementById("modal_dangky");
    modaldangnhap.style.display = "none";
    modaldangky.style.display = "block";
}

function closemodal_dangky() {
    var modal = document.getElementById("modal_dangky");
    modal.style.display = "none";
}
</script>
<script>
function dangnhap() {
    var modaldangnhap = document.getElementById("modal_dangnhap");
    var modaldangky = document.getElementById("modal_dangky");
    modaldangky.style.display = "none";
    modaldangnhap.style.display = "block";
}
</script>
<script>
document.addEventListener("DOMContentLoaded", function() {

    var closeButtonAuth = document.querySelector('#closeButtonAuth');

    if (closeButtonAuth) {
        closeButtonAuth.addEventListener('click', function() {
            var overlayAuth = document.querySelector('.el-overlay.ws-notihomes');
            overlayAuth.style.display = 'none';
        });
    }

    var closeButtonNotification = document.querySelector('.el-dialog__headerbtn');

    if (closeButtonNotification) {
        closeButtonNotification.addEventListener('click', function() {
            var overlayNotification = document.querySelector('.el-overlay.ws-notihomes');
            overlayNotification.style.display = 'none';
        });
    }
});
</script>