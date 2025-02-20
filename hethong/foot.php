<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
<div>
    <a class="ws-z-index-[8888px] ws-fixed ws-right-[5%] lg:ws-right-[2%] ws-bottom-[20%]"
        href="<?=$bdtvl['fb_admin'];?>" target="_blank"><img src="/assets/img/mes.png" alt="img"
            class="ws-w-[3rem]"></a>
    <div class="ws-mt-5 ws-hidden md:ws-block ws-py-4 ws-bg-white">
        <div class="ws-px-2 ws-mx-auto ws-max-w-7xl ws-flex ws-items-center">
            <span class="ws-font-medium">Hỗ trợ các phương thức nạp:</span>
            <div onclick="napthecao()" class="ws-items-center ws-flex ws-text-sm ws-ml-4">
                <img src="/assets/img/card2.png" alt="card" class="ws-h-6 ws-mr-2">
                <span>Thẻ cào</span>
            </div>
            <div onclick="napbank()" class="ws-items-center ws-flex ws-text-sm ws-ml-4">
                <img src="/assets/img/bank.png" alt="bank" class="ws-h-6 ws-mr-2">
                <span>Ngân hàng</span>
            </div>
            <div onclick="napmomo()" class="ws-items-center ws-flex ws-text-sm ws-ml-4">
                <img src="/assets/img/momo.png" alt="momo" class="ws-h-6 ws-mr-2">
                <span>MoMo</span>
            </div>
        </div>
    </div>

</div>
<div class="ws-py-5 md:ws-py-8">
    <div class="ws-px-2 ws-mx-auto ws-max-w-7xl">
        <div class="ws-grid ws-grid-cols-12 ws-gap-3 md:ws-gap-5">
            <div
                class="ws-bg-white ws-text-center ws-col-span-6 md:ws-col-span-3 lg:ws-col-span-3 ws-rounded-lg ws-py-4 ws-px-2 md:ws-px-5 ws-text-sm">
                <div class="ws-text-center ws-mb-1">
                    <i
                        class="ws-text-[3rem] md:ws-text-[4rem] ws-block ws-mb-2 fa-solid fa-cart-shopping ws-bg-gradient-to-r ws-from-pink-500 ws-to-red-500 ws-bg-clip-text ws-text-transparent"></i>
                </div>
                <label class="ws-font-semibold ws-text-sm md:ws-text-lg ws-text-red-500 ws-block">Sản phẩm, dịch vụ đa dạng, cập nhật liên tục.</label>
            </div>
            <div
                class="ws-bg-white ws-text-center ws-col-span-6 md:ws-col-span-3 lg:ws-col-span-3 ws-rounded-lg ws-py-4 ws-px-2 md:ws-px-5 ws-text-sm">
                <div class="ws-text-center ws-mb-1"><i
                        class="ws-text-[3rem] md:ws-text-[4rem] ws-block ws-mb-2 fa-solid fa-circle-check ws-bg-gradient-to-r ws-from-pink-500 ws-to-red-500 ws-bg-clip-text ws-text-transparent"></i>
                </div>
                <label class="ws-font-semibold ws-text-sm md:ws-text-lg ws-text-red-500 ws-block">Hàng ngàn khách hàng tin tưởng, ủng hộ.</label>
            </div>
            <div
                class="ws-bg-white ws-text-center ws-col-span-6 md:ws-col-span-3 lg:ws-col-span-3 ws-rounded-lg ws-py-4 ws-px-2 md:ws-px-5 ws-text-sm">
                <div class="ws-text-center ws-mb-1"><i
                        class="ws-text-[3rem] md:ws-text-[4rem] ws-block ws-mb-2 fa-solid fa-phone ws-bg-gradient-to-r ws-from-pink-500 ws-to-red-500 ws-bg-clip-text ws-text-transparent"></i>
                </div>
                <label class="ws-font-semibold ws-text-sm md:ws-text-lg ws-text-red-500 ws-block">Trung tâm hỗ trợ nhanh chóng, tận tình 24/7.</label>
            </div>
            <div
                class="ws-bg-white ws-text-center ws-col-span-6 md:ws-col-span-3 lg:ws-col-span-3 ws-rounded-lg ws-py-4 ws-px-2 md:ws-px-5 ws-text-sm">
                <div class="ws-text-center ws-mb-1"><i
                        class="ws-text-[3rem] md:ws-text-[4rem] ws-block ws-mb-2 fa-regular fa-thumbs-up ws-bg-gradient-to-r ws-from-pink-500 ws-to-red-500 ws-bg-clip-text ws-text-transparent"></i>
                </div>
                <label class="ws-font-semibold ws-text-sm md:ws-text-lg ws-text-red-500 ws-block">Giá rẻ, uy tín, chất lượng nhất thị trường.</label>
            </div>
        </div>
    </div>
</div>
<div style="background:rgb(29, 24, 24);" class="ws-text-white ws-py-10">
    <div class="ws-px-4 md:ws-px-2 ws-mx-auto ws-max-w-7xl">
        <div class="ws-grid ws-grid-cols-12 ws-gap-6">
            <div class="ws-col-span-12 md:ws-col-span-4 lg:ws-col-span-3">
                <div class="ws-overflow-hidden ws-select-none ws-h-12 ws-mb-3" style="aspect-ratio:10 / 3;">
                    <img src="<?=$bdtvl['logo'];?>" onerror="this.setAttribute(&#39;data-error&#39;, 1)" alt=""
                        loading="eager" data-nuxt-img class="ws-select-none ws-rounded-lg ws-w-full ws-h-12 ws-mb-3">
                    <div class="el-skeleton" style="width:100%;">
                        <div class="el-skeleton__item el-skeleton__image ws-h-12 ws-mb-3" style="width:100%;">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1024 1024">
                                <path fill="currentColor" d="M96 896a32 32 0 0 1-32-32V160a32 32 0 0 1 32-32h832a32 32 0 0 1 32 32v704a32 32 0 0 1-32 32zm315.52-228.48-68.928-68.928a32 32 0 0 0-45.248 0L128 768.064h778.688l-242.112-290.56a32 32 0 0 0-49.216 0L458.752 665.408a32 32 0 0 1-47.232 2.112M256 384a96 96 0 1 0 192.064-.064A96 96 0 0 0 256 384">
                                </path>
                            </svg>
                        </div>
                    </div>
                </div>
                <p class="ws-font-medium ws-text-sm ws-leading-6 ws-mb-3">
                    Shop acc game liên quân uy tín giá rẻ, bảo hành trọn đời, nhiều minigame event hấp dẫn, 
                    rút quân huy tự động, hỗ trợ 24/24.</p>
                <div class="ws-text-sm ws-text-red-500 ws-font-bold ws-my-1"> 
                HỆ THỐNG BÁN ACC TỰ ĐỘNG ĐẢM BẢO UY TÍN VÀ CHẤT LƯỢNG. </div>
                <p class="ws-text-sm ws-text-zinc-300 ws-mb-3 ws-leading-6"> 
                Chúng tôi luôn lấy uy tín đặt trên hàng đầu đối với khách hàng, 
                hy vọng chúng tôi sẽ được phục vụ các bạn. Cám ơn! </p>
                <p class="ws-leading-7">
                    <a href="/policy.html" class="ws-block ws-text-sm ws-mb-1" target="_blank">
                        <i class="fa-solid fa-angle-right"></i> Privacy Policy</a>
                    <a href="/terms.html" class="ws-block ws-text-sm" target="_blank">
                        <i class="fa-solid fa-angle-right"></i> Terms of Service</a></p>
            </div>
            <div class="ws-col-span-12 md:ws-col-span-3">
                <label class="ws-block ws-font-semibold ws-text-xl ws-block ws-mb-3">
                    THÔNG TIN CHUNG</label>
                <div class="ws-py-2 ws-px-3 ws-bg-zinc-800 ws-text-sm ws-rounded ws-mb-2">
                    <p class="ws-pb-2"><a href="/bai-viet/ve-chung-toi" class="hover:ws-text-red-500 ws-transition ws-duration-200">
                         › <span class="ws-ml-1">Về chúng tôi</span></a></p>
                    <p class="ws-pb-2"><a href="/bai-viet/chinh-sach-ban-hang" class="hover:ws-text-red-500 ws-transition ws-duration-200">
                         › <span class="ws-ml-1">Chính sách bán hàng</span></a></p>
                    <p class="ws-pb-2"><a href="/bai-viet/chinh-sach-doi-tra" class="hover:ws-text-red-500 ws-transition ws-duration-200">
                         › <span class="ws-ml-1">Chính sách đổi trả</span></a></p>
                    <p class=""><a href="/bai-viet/huong-dan-nap-tien" class="hover:ws-text-red-500 ws-transition ws-duration-200">
                         › <span class="ws-ml-1">Hướng dẫn nạp tiền</span></a></p>
                </div><br>
                <p><b class="ws-block ws-mb-1">THỜI GIAN HỖ TRỢ:</b>
                <span class="ws-text-zinc-300 ws-text-sm"> Sáng: 8h00 -&gt; 11h30 | Chiều: 13h00 -&gt; 21h00 </span></p>
            </div>
            <div class="ws-col-span-12 md:ws-col-span-3">
                <label class="ws-block ws-font-semibold ws-text-xl ws-block ws-mb-3">SẢN PHẨM</label>
                <div class="ws-py-2 ws-px-3 ws-bg-zinc-800 ws-text-sm ws-rounded">
                    <p class="ws-pb-2"><a href="/kham-pha/tai-khoan-lien-quan-tuy-chon"
                            class="hover:ws-text-red-500 ws-transition ws-duration-200">
                         › <span class="ws-ml-1">Sale Liên Quân Tháng 4</span></a></p>
                    <p class="ws-pb-2"><a href="/kham-pha/kham-pha-thu-van-may-tai-khoan-lien-quan"
                            class="hover:ws-text-red-500 ws-transition ws-duration-200">
                         › <span class="ws-ml-1">Thử Vận May Tài Khoản</span></a></p>
                    <p class="ws-pb-2"><a href="/tai-khoan/sieu-giam-gia-hang-ngay"
                            class="hover:ws-text-red-500 ws-transition ws-duration-200">
                         › <span class="ws-ml-1">Siêu Giảm Giá Hàng Ngày</span></a></p>
                    <p class="ws-pb-2"><a href="/tai-khoan/nick-lien-quan-sale-gia-re"
                            class="hover:ws-text-red-500 ws-transition ws-duration-200">
                         › <span class="ws-ml-1">Tài Khoản Giá Rẻ</span></a></p>
                    <p class=""><a href="/tai-khoan/nick-lien-quan-gia-tot"
                            class="hover:ws-text-red-500 ws-transition ws-duration-200">
                         › <span class="ws-ml-1">Nick Liên Quân Giá Tốt</span></a></p>
                    <!--]-->
                </div>
            </div>
            <div class="ws-col-span-12 md:ws-col-span-3 lg:ws-col-span-3"><label
                    class="ws-block ws-text-xl ws-font-semibold ws-mb-3">HỖ TRỢ KHÁCH HÀNG</label>
                <div>
                    <div class="ws-text-sm ws-text-red-500 ws-font-bold">
                        <a href="<?=$bdtvl['fb_admin'];?>" target="_blank">
                            <img src="/assets/img/messenger-01.png" alt="img" class="ws-w-[15rem]"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--2<div style="background:rgb(29, 24, 24);" class="ws-text-white ws-py-2">
    <div class="ws-mt-4 ws-border-t ws-border-zinc-800 ws-pt-2 ws-text-center">
        <span class="ws-text-sm">© Copyright <span style="color:rgb(2,132,199);">
            <strong><a href="<?=$bdtvl['fb_admin'];?>" target="_blank">Duy Nam</a></strong></span>
        </span>
        <p><b class="ws-text-xs">Operated by 
        <span class="ws-text-red-600"></span>, All Rights Reserved</b></p>
    </div>
</div>-->
<div style="z-index:9999;"
    class="md:ws-hidden ws-border-t ws-bg-white ws-sticky ws-bottom-0 ws-flex ws-justify-between ws-bottom-0 ws-left-0 ws-right-0 ws-items-center ws-py-2 ws-px-1">
    <a href="/"
        class="ws-text-red-600 ws-inline-flex ws-flex-col ws-justify-center ws-text-center ws-px-2 ws-rounded ws-relative">
        <i class="ws-text-2xl fa-solid fa-house ws-absolute ws-left-[8px] ws-top-0 ws-w-[3.7rem]"></i>
        <span class="ws-font-bold ws-text-sm ws-block ws-mt-6">
            <small><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">Trang chủ</small>
        </span>
    </a>
    <span onclick="modal_timkiemdt()"
        class="ws-inline-flex ws-flex-col ws-justify-center ws-text-center ws-px-2 ws-rounded ws-text-zinc-700 ws-relative el-tooltip__trigger el-tooltip__trigger"><i
            class="ws-text-2xl fa-solid fa-magnifying-glass ws-absolute ws-left-[3px] ws-top-0 ws-w-[3.7rem]"></i><span
            class="ws-font-bold ws-text-sm ws-block ws-mt-6">
            <small>Tìm kiếm</small>
        </span>
    </span>
    <span <?php if(empty($_SESSION['session'])) { ?> onclick="modal_dangnhap_phone()" <?php }else{ ?>
        onclick="naptien()" <?php } ?>
        class="ws-cursor-pointer ws-inline-flex ws-flex-col ws-justify-center ws-text-center ws-px-2 ws-rounded ws-text-zinc-700 ws-relative"><i
            class="ws-text-2xl fa-solid fa-money-bill-transfer ws-absolute ws-left-[3px] ws-top-0 ws-w-[3.7rem]"></i><span
            class="ws-font-bold ws-text-sm ws-block ws-mt-6">
            <small>Nạp tiền</small>
        </span>
    </span>
    <a <?php if(empty($_SESSION['session'])) { ?> onclick="modal_dangnhap_phone()" <?php }else{ ?>
        href="/customer/profile" <?php } ?> class="ws-text-zinc-700 ws-cursor-pointer ws-px-2 ws-rounded ws-relative">
        <span class="ws-inline-flex ws-flex-col ws-justify-center ws-text-center">
            <i class="ws-text-2xl fa-regular fa-user ws-absolute ws-left-[6px] ws-top-0 ws-w-[3.7rem]"></i><span
                class="ws-font-bold ws-text-sm ws-block ws-mt-6">
                <small>Tài khoản</small>
            </span>
        </span>
    </a>
</div>
<?php if($username!="") { ?>
<div id="nav_phone" role="dialog" aria-modal="false" aria-labelledby="el-id-1024-6" aria-describedby="el-id-1024-7"
    class="el-overlay ws-notihomes" style="display:none;">
    <div role="dialog" aria-modal="false" class="el-overlay-dialog">
        <!--[-->
        <div class="el-dialog" tabindex="-1">
            <div class="el-dialog__body">
                <header class="el-dialog__header">
                    <div class="ws-flex ws-items-center ws-justify-between">
                        <div class="ws-relative ws-leading-9">
                            <!---->
                            <p class="ws-text-sm"><?=$username;?></p>
                            <p class="ws-text-sm"><b>Số dư: </b><span
                                    class="ws-text-red-600 ws-font-bold"><?= isset($user) ? tien($user['money']) : tien(0) ?>
                                    <small>đ</small></span></p>
                            <p class="ws-text-sm"><b>Coin: </b><span class="ws-text-red-600 ws-font-bold">0</span>
                            </p>
                        </div>
                        <button onclick="navbar_phone()"><i class="fa-solid fa-circle-xmark fa-xl"></i></button>
                    </div>
                </header>

                <div class="ws--mx-2 ws-max-w-xs">
                    <a href="/customer/profile"
                        class="ws-py-2 ws-px-2 ws-block hover:ws-bg-zinc-100 ws-rounded ws-font-medium">
                        Quản lý tài khoản</a>
                    <label class="ws-mt-2 ws-block ws-text-xs ws-font-bold ws-text-red-600 ws-px-2">
                        <small>LỊCH SỬ</small>
                    </label>
                    <a href="/customer/transactions"
                        class="ws-py-2 ws-px-2 ws-block hover:ws-bg-zinc-100 ws-rounded ws-font-medium"><i
                            class="fa-solid fa-angle-right"></i> Lịch sử nạp tiền</a>
                    <a href="/customer/transactions/bank"
                        class="ws-py-2 ws-px-2 ws-block hover:ws-bg-zinc-100 ws-rounded ws-font-medium"><i
                            class="fa-solid fa-angle-right"></i> Lịch sử nạp bank/ MoMo</a>
                    <a href="/customer/nicks"
                        class="ws-py-2 ws-px-2 ws-block hover:ws-bg-zinc-100 ws-rounded ws-font-medium">
                        <i class="fa-solid fa-angle-right"></i> Mua tài khoản (nick)</a>
                        <a href="/customer/caythue"
                        class="ws-py-2 ws-px-2 ws-block hover:ws-bg-zinc-100 ws-rounded ws-font-medium">
                        <i class="fa-solid fa-angle-right"></i> Lịch Sử Cày Thuê</a>
                    <a href="/customer/items"
                        class="ws-py-2 ws-px-2 ws-block hover:ws-bg-zinc-100 ws-rounded ws-font-medium">
                        <i class="fa-solid fa-angle-right"></i> Mua hòm vật phẩm</a>
                    <label class="ws-mt-2 ws-block ws-text-xs ws-font-bold ws-text-red-600 ws-px-2">
                        <small>TÀI KHOẢN</small>
                    </label>
                    <a href="/Auth/Logout"
                        class="ws-cursor-pointer ws-py-2 ws-px-2 ws-block hover:ws-bg-zinc-100 ws-rounded ws-font-medium">
                        <i class="fa-solid fa-angle-right"></i> Đăng xuất</a>
                </div>
            </div>
        </div>
    </div>

</div>
<?php } ?>
<?php if(isset($_SESSION['session'])){ ?>
<!-- nạp tiền -->
<div id="modal_naptien" role="dialog" class="el-overlay ws-notihomes" style="display: none; " aria-modal="true"
    aria-label="Chọn phương thức nạp tiền" aria-describedby="el-id-1024-5" class="el-overlay-dialog" style="">
    <!--[-->
    <div class="el-dialog" tabindex="-1">
        <header class="el-dialog__header"><span role="heading" aria-level="2" class="el-dialog__title">Chọn phương thức
                nạp tiền</span>
            <button onclick="naptien()" aria-label="el.dialog.close" class="el-dialog__headerbtn" type="button">
                <i class="el-icon el-dialog__close"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1024 1024">
                        <path fill="currentColor"
                            d="M764.288 214.592 512 466.88 259.712 214.592a31.936 31.936 0 0 0-45.12 45.12L466.752 512 214.528 764.224a31.936 31.936 0 1 0 45.12 45.184L512 557.184l252.288 252.288a31.936 31.936 0 0 0 45.12-45.12L557.12 512.064l252.288-252.352a31.936 31.936 0 1 0-45.12-45.184z">
                        </path>
                    </svg></i>
            </button>
        </header>
        <div id="el-id-1024-5" class="el-dialog__body">
            <div>
                <div>
                    <div>
                        <div onclick="napthecao()"
                            class="ws-py-3 ws-px-2 ws-cursor-pointer hover:ws-bg-zinc-100 ws-rounded">
                            <div class="ws-flex ws-items-center">
                                <img src="/assets/img/card2.png" class="ws-h-12 ws-mr-3">
                                <div>
                                    <label class="ws-font-bold ws-text-black ws-text-base">Nạp tiền (Card)</label>
                                    <p class="ws-text-sm">Viettel, Vinaphone, Mobifone.</p>
                                </div>
                            </div>
                        </div>
                        <div class="ws-border-b ws-border-dashed ws-my-1"></div>
                        <div onclick="napbank()"
                            class="ws-py-3 ws-px-2 ws-cursor-pointer hover:ws-bg-zinc-100 ws-rounded">
                            <div class="ws-flex ws-items-center">
                                <img src="/assets/img//bank.png" class="ws-h-12 ws-mr-3">
                                <div>
                                    <label class="ws-font-bold ws-text-black ws-text-base">Ngân hàng (Bank ATM) - Tự
                                        động</label>
                                    <p class="ws-text-sm">Khuyến mãi 12% khi nạp.</p>
                                </div>
                            </div>
                        </div>
                        <div class="ws-border-b ws-border-dashed ws-my-1"></div>
                        <div onclick="napmomo()"
                            class="ws-py-3 ws-px-2 ws-cursor-pointer hover:ws-bg-zinc-100 ws-rounded">
                            <div class="ws-flex ws-items-center">
                                <img src="/assets/img/momo.png" class="ws-h-12 ws-mr-3">
                                <div>
                                    <label class="ws-font-bold ws-text-black ws-text-base">Thẻ Siêu Rẻ - Tự
                                        động</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--v-if-->
    </div>
    <!--]-->
</div>
<div id="modal_nap_the" class="el-overlay ws-recharge-modal" style="z-index: 2012; display : none;">
    <!--[-->
    <div role="dialog" aria-modal="true" aria-label="Nạp tiền" aria-describedby="el-id-1024-5" class="el-overlay-dialog"
        style="">
        <!--[-->
        <div class="el-dialog" tabindex="-1">
            <header class="el-dialog__header"><span role="heading" aria-level="2" class="el-dialog__title">Nạp thẻ
                    cào</span><button onclick="napthecao()" aria-label="el.dialog.close" class="el-dialog__headerbtn"
                    type="button"><i class="el-icon el-dialog__close"><svg xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 1024 1024">
                            <path fill="currentColor"
                                d="M764.288 214.592 512 466.88 259.712 214.592a31.936 31.936 0 0 0-45.12 45.12L466.752 512 214.528 764.224a31.936 31.936 0 1 0 45.12 45.184L512 557.184l252.288 252.288a31.936 31.936 0 0 0 45.12-45.12L557.12 512.064l252.288-252.352a31.936 31.936 0 1 0-45.12-45.184z">
                            </path>
                        </svg></i></button></header>
            <div id="el-id-1024-5" class="el-dialog__body">
                <div>
                    <div>
                        <div>
                            <div>
                                <form class="el-form el-form--default el-form--label-right">
                                    <div class="el-form-item is-required asterisk-left">
                                        <!--v-if-->
                                        <div class="el-form-item__content"><label for="telco"
                                                class="ws-font-semibold ws-text-black">Nhà mạng (Ưu tiên Viettel,
                                                Vinaphone)</label>
                                            <div class="el-input el-input--large">
                                                <div class="el-input__wrapper" tabindex="-1">
                                                    <select class="el-input__inner" id="type_the">
                                                        <option value="VIETTEL">Thẻ Viettel</option>
                                                        <option value="VINAPHONE">Thẻ Vinaphone</option>
                                                        <option value="MOBIFONE">Thẻ Mobifone</option>
                                                        <option value="GATE">Thẻ Gate</option>
                                                        <option value="ZING">Thẻ Zing</option>
                                                        <option value="VNMOBI">Thẻ Vnmobi</option>
                                                        <option value="VCOIN">Thẻ Vcoin</option>
                                                    </select>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="el-form-item is-success is-required asterisk-left">
                                        <!--v-if-->
                                        <div class="el-form-item__content">
                                            <label for="amount" class="ws-font-semibold ws-text-black">Mệnh giá</label>
                                            <div class="el-input el-input--large">
                                                <div class="el-input__wrapper" tabindex="-1">
                                                    <select class="el-input__inner" id="menh_gia">
                                                        <option value="10000">10.000đ</option>
                                                        <option value="20000">20.000đ</option>
                                                        <option value="30000">30.000đ</option>
                                                        <option value="50000">50.000đ</option>
                                                        <option value="100000">100.000đ</option>
                                                        <option value="200000">200.000đ</option>
                                                        <option value="300000">300.000đ</option>
                                                    </select>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ws-grid ws-grid-cols-12 md:ws-gap-4">
                                        <div class="ws-col-span-12 md:ws-col-span-6">
                                            <div class="el-form-item is-required asterisk-left">
                                                <!--v-if-->
                                                <div class="el-form-item__content"><label for="seri"
                                                        class="ws-font-semibold ws-text-black">Seri</label>
                                                    <div class="el-input el-input--large">
                                                        <!-- input -->
                                                        <!-- prepend slot -->
                                                        <!--v-if-->
                                                        <div class="el-input__wrapper" tabindex="-1">
                                                            <!-- prefix slot -->
                                                            <!--v-if--><input class="el-input__inner" type="text"
                                                                autocomplete="off" tabindex="0" placeholder=""
                                                                id="seri_the" required="required"><!-- suffix slot -->
                                                            <!--v-if-->
                                                        </div><!-- append slot -->
                                                        <!--v-if-->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ws-col-span-12 md:ws-col-span-6">
                                            <div class="el-form-item is-required asterisk-left">
                                                <!--v-if-->
                                                <div class="el-form-item__content"><label for="code"
                                                        class="ws-font-semibold ws-text-black">Mã thẻ</label>
                                                    <div class="el-input el-input--large">
                                                        <!-- input -->
                                                        <!-- prepend slot -->
                                                        <!--v-if-->
                                                        <div class="el-input__wrapper" tabindex="-1">
                                                            <!-- prefix slot -->
                                                            <!--v-if--><input class="el-input__inner" type="text"
                                                                autocomplete="off" tabindex="0" placeholder=""
                                                                id="ma_the" required="required"><!-- suffix slot -->
                                                            <!--v-if-->
                                                        </div><!-- append slot -->
                                                        <!--v-if-->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <br><button id="btn_napthe" aria-disabled="false" type="button"
                                        class="el-button el-button--primary el-button--large ws-w-[10rem] ws-font-extrabold">
                                        <!--v-if--><span class="">Nạp tiền</span>
                                    </button>
                                    <script type="text/javascript">
                                    $("#btn_napthe").on("click", function() {
                                        $('#btn_napthe').html(
                                                '<i class="fa fa-spinner fa-spin"></i> Đang xử lý...'
                                            )
                                            .prop(
                                                'disabled',
                                                true);
                                        $.ajax({
                                            url: "<?=BASE_URL('ajax/naptien/napthe.php');?>",
                                            method: "POST",
                                            dataType: "JSON",
                                            data: {
                                                type_the: $("#type_the").val(),
                                                menh_gia: $("#menh_gia").val(),
                                                ma_the: $("#ma_the").val(),
                                                seri_the: $("#seri_the").val()
                                            },

                                            success: function(respone) {
                                                if (respone.status == 'success') {
                                                    cuteToast({
                                                        type: "success",
                                                        message: respone.msg,
                                                        timer: 5000
                                                    });
                                                    setTimeout("location.href = '';",
                                                        500);
                                                } else {
                                                    cuteToast({
                                                        type: "error",
                                                        message: respone.msg,
                                                        timer: 5000
                                                    });
                                                }
                                                $('#btn_napthe').html(
                                                    'Nạp tiền'
                                                ).prop('disabled',
                                                    false);
                                            },
                                            error: function() {
                                                cuteToast({
                                                    type: "error",
                                                    message: 'Không thể xử lý',
                                                    timer: 5000
                                                });
                                                $('#btn_napthe').html(
                                                    'Nạp tiền'
                                                ).prop('disabled',
                                                    false);
                                            }

                                        });
                                    });
                                    </script>
                                </form>
                                <p class="ws-mt-2"><i>Xem danh sách nạp thẻ <a href="/customer/transactions?type=1"><b
                                                class="ws-text-red-600">tại đây</b> (click)</a></i></p>
                                <p class="ws-mt-2 ws-text-red-600 ws-font-semibold"> Lưu ý: Theo quy định của nhà mạng,
                                    nạp sai mệnh giá sẽ bị mất thẻ. </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--v-if-->
        </div>
        <!--]-->
    </div>
    <!--]-->
</div>
<div id="modal_bank" role="dialog" aria-modal="true" aria-label="Ngân hàng (Bank ATM) - Tự động"
    aria-describedby="el-id-1024-5" class="el-overlay ws-recharge-modal" style="display:none;">
    <!--[-->
    <div class="el-dialog" tabindex="-1">
        <header class="el-dialog__header"><span role="heading" aria-level="2" class="el-dialog__title">Ngân hàng (Bank
                ATM) - Tự động</span>
            <button onclick="napbank()" aria-label="el.dialog.close" class="el-dialog__headerbtn" type="button"><i
                    class="el-icon el-dialog__close"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1024 1024">
                        <path fill="currentColor"
                            d="M764.288 214.592 512 466.88 259.712 214.592a31.936 31.936 0 0 0-45.12 45.12L466.752 512 214.528 764.224a31.936 31.936 0 1 0 45.12 45.184L512 557.184l252.288 252.288a31.936 31.936 0 0 0 45.12-45.12L557.12 512.064l252.288-252.352a31.936 31.936 0 1 0-45.12-45.184z">
                        </path>
                    </svg></i>
            </button>
        </header>
        <div id="el-id-1024-5" class="el-dialog__body">
            <div>
                <div>
                    <div class="ws-mt-2 md:ws-mt-1">
                        <div>
                            <div>
                                <div class="ws-grid ws-grid-cols-12 ws-gap-3 ws-shadow-lg md:ws--mx-8 ws--mx-2 ws-bg-white ws-border ws-px-3 ws-py-2 ws-rounded"
                                    style="background-image: url(/assets/img/hero@75.b2469a49.jpg); background-size: 40rem;">
                                    <div class="ws-col-span-12 md:ws-col-span-8 md:ws-border-r ws-text-black">
                                        <div class="ws-leading-6">
                                            <p style="margin-left:0px;"><span style="color:rgb(0,0,0);"><strong>THÔNG
                                                        TIN NGÂN HÀNG</strong></span></p>
                                            <p style="margin-left:0px;">&nbsp;</p>
                                            <p style="margin-left:0px;"><span style="color:hsl(0,75%,60%);"><strong>CHỦ
                                                        TÀI KHOẢN: <?=thongtinbank('bank','ctk');?></strong></span></p>
                                            <p style="margin-left:0px;"><span style="color:hsl(0,75%,60%);"><strong>NGÂN
                                                        HÀNG : <?=thongtinbank('bank','loai');?></strong></span></p>
                                            <p style="margin-left:0px;"><span style="color:hsl(0,75%,60%);"><strong>SỐ
                                                        TÀI KHOẢN : <?=thongtinbank('bank','stk');?></strong></span></p>
                                        </div>
                                        <button type="button" onclick="saochep('<?=thongtinbank('bank','stk');?>')"
                                            class="ws-mt-1 focus:ws-outline-none ws-px-2 ws-h-6 ws-bg-zinc-900 hover:ws-bg-zinc-600 ws-rounded ws-text-xs ws-font-bold ws-text-white ws-uppercase">
                                            Copy số tài khoản </button>
                                    </div>
                                    <div class="ws-col-span-12 md:ws-col-span-4"><img
                                            src="<?=thongtinbank('bank','img');?>" class="ws-w-full ws-rounded"></div>
                                </div>
                                <div class="ws-my-4 ws-border-b md:ws-hidden"></div>
                                <div class="ws-my-3">
                                    <p class="ws-font-semibold ws-text-sm ws-mb-1"> Nội dung chuyển khoản: </p>
                                    <div class="ws-relative"><input value="<?=$bdtvl['noi_dung_nap'].$user['id'];?>"
                                            class="ws-h-10 ws-px-3 ws-border-2 ws-border-red-500 ws-text-lg ws-border-dashed ws-rounded ws-w-full ws-text-red-600 ws-font-extrabold focus:ws-outline-none"
                                            readonly="">
                                        <button onclick="saochep('<?=$bdtvl['noi_dung_nap'].$user['id'];?>')"
                                            class="ws-bg-red-600 hover:ws-bg-red-500 ws-px-4 ws-h-6 ws-text-white ws-flex ws-items-center ws-py-1 ws-absolute ws-text-sm ws-font-semibold ws-rounded"
                                            style="top: 8px; right: 8px;"> COPY NỘI DUNG </button>
                                    </div>
                                    <div class="ws-mt-2 ws-font-semibold ws-text-sm ws-leading-6"><i
                                            class="ws-ml-3 fa-solid fa-circle-info"></i> Khi chuyển khoản qua Ngân hàng
                                        (ATM) bạn
                                        cần ghi nội dung <b
                                            class="ws-mx-1 ws-text-red-600"><?=$bdtvl['noi_dung_nap'].$user['id'];?></b>
                                        bên trên.
                                    </div>
                                    <div class="ws-mt-1 ws-text-sm ws-font-semibold ws-text-red-600 ws-leading-6"> Lưu
                                        ý: <br>- Sau khi chuyển khoản xong, hãy chờ "vài phút" hệ thống sẽ tự động xử lý
                                        giao dịch. <br>- Giao dịch chuyển sai "Nội dung chuyển khoản" sẽ không được xử
                                        lý tự động. Hãy liên hệ Fanpage để được hỗ trợ. </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--v-if-->
    </div>
    <!--]-->
</div>
<div id="modal_momo" role="dialog" aria-modal="true" aria-label="Thẻ Siêu rẻ - Tự động"
    aria-describedby="el-id-1024-5" class="el-overlay-dialog" style="display:none;">
    <!--[-->
    <div class="el-dialog" tabindex="-1">
        <header class="el-dialog__header">
            <span role="heading" aria-level="2" class="el-dialog__title">Chuyển khoản
            </span>
            <button aria-label="el.dialog.close" class="el-dialog__headerbtn" type="button">
                <i onclick="napmomo()" class="el-icon el-dialog__close"><svg xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 1024 1024">
                        <path fill="currentColor"
                            d="M764.288 214.592 512 466.88 259.712 214.592a31.936 31.936 0 0 0-45.12 45.12L466.752 512 214.528 764.224a31.936 31.936 0 1 0 45.12 45.184L512 557.184l252.288 252.288a31.936 31.936 0 0 0 45.12-45.12L557.12 512.064l252.288-252.352a31.936 31.936 0 1 0-45.12-45.184z">
                        </path>
                    </svg>
                </i>
            </button>
        </header>
        <div id="el-id-1024-5" class="el-dialog__body">
            <div>
                <div>
                    <div class="ws-mt-2 md:ws-mt-1">
                        <div>
                            <div>
                                <div class="ws-grid ws-grid-cols-12 ws-gap-3 ws-shadow-lg md:ws--mx-8 ws--mx-2 ws-bg-white ws-border ws-px-3 ws-py-2 ws-rounded"
                                    style="background-image: url(/assets/img/hero@75.b2469a49.jpg); background-size: 40rem;">
                                    <div class="ws-col-span-12 md:ws-col-span-8 md:ws-border-r ws-text-black">
                                        <div class="ws-leading-6">
                                            <p style="margin-left:0px;"><span class="text-small"><strong>Thông Tin Ngân Hàng Khác</strong></span></p>
                                            <p style="margin-left:0px;">&nbsp;</p>
                                            <p style="margin-left:0px;"><span style="color:hsl(0,75%,60%);"><strong>CHỦ
                                                        TÀI KHOẢN: <?=thongtinbank('momo','ctk');?></strong></span></p>
                                            <p style="margin-left:0px;"><span style="color:hsl(0,75%,60%);"><strong>SỐ
                                                        TÀI KHOẢN : <?=thongtinbank('momo','stk');?></strong></span></p>
                                        </div>
                                        <button type="button" onclick="saochep('<?=thongtinbank('bank','stk');?>')"
                                            class="ws-mt-1 focus:ws-outline-none ws-px-2 ws-h-6 ws-bg-zinc-900 hover:ws-bg-zinc-600 ws-rounded ws-text-xs ws-font-bold ws-text-white ws-uppercase">
                                            Copy số tài khoản </button>
                                    </div>
                                    <div class="ws-col-span-12 md:ws-col-span-4"><img
                                            src="<?=thongtinbank('momo','img');?>" class="ws-w-full ws-rounded"></div>
                                </div>

                                <div class="ws-my-4 ws-border-b md:ws-hidden"></div>
                                <div class="ws-my-4 ws-border-b md:ws-hidden"></div>
                                <div class="ws-bg-pink-700 ws-text-white ws-p-2 ws-rounded-b"> Chú ý: Quét QR trên
                                    từ Ther siêu rẻ sẽ ra giao diện là STK Ngân hàng của shop, bạn chỉ cần điền số tiền cần
                                    nạp. Sau đó xác nhận chuyển như bình thường. Xin cám ơn! </div>
                                <div class="ws-my-3">
                                    <p class="ws-font-semibold ws-text-sm ws-mb-1"> Nội dung chuyển khoản: </p>
                                    <div class="ws-relative"><input value="<?=$bdtvl['noi_dung_nap'].$user['id'];?>"
                                            class="ws-h-10 ws-px-3 ws-border-2 ws-border-red-500 ws-text-lg ws-border-dashed ws-rounded ws-w-full ws-text-red-600 ws-font-extrabold focus:ws-outline-none"
                                            readonly="">
                                        <button onclick="saochep('<?=$bdtvl['noi_dung_nap'].$user['id'];?>')"
                                            class="ws-bg-red-600 hover:ws-bg-red-500 ws-px-4 ws-h-6 ws-text-white ws-flex ws-items-center ws-py-1 ws-absolute ws-text-sm ws-font-semibold ws-rounded"
                                            style="top: 8px; right: 8px;"> COPY NỘI DUNG </button>
                                    </div>
                                    <div class="ws-mt-2 ws-font-semibold ws-text-sm ws-leading-6"><i
                                            class="ws-ml-3 fa-solid fa-circle-info"></i> Khi chuyển khoản qua Thẻ siêu rẻ
                                        bạn cần
                                        ghi nội dung lời nhắn <b
                                            class="ws-mx-1 ws-text-pink-700"><?=$bdtvl['noi_dung_nap'].$user['id'];?></b>
                                        bên
                                        trên. </div>
                                    <div class="ws-mt-1 ws-font-semibold ws-text-sm ws-text-red-600 ws-leading-6">
                                        <p> Lưu ý: <br>- Nếu quá 15 phút không nhận được tiền nạp hoặc Chuyển khoản
                                            nhưng sai "Nội dung lời nhắn". Hãy liên hệ Fanpage để được hỗ trợ. </p>
                                        <div class="ws-mt-1 ws-font-semibold ws-text-sm ws-text-blue-600 ws-leading-6">
                                            <i></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="ws-border-b ws-border-gray-200 ws-my-3"></div>
                                <div class="ws-mt-1">
                                    <p class="ws-font-semibold ws-text-sm ws-mb-1"> Vui lòng chuyển trên 1.000đ để
                                        được xử lý tự động. </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php } ?>




<script>
function napthecao() {
    var modal_naptien = document.getElementById("modal_naptien");
    var modal_nap_the = document.getElementById("modal_nap_the");
    modal_naptien.style.display = "none";
    if (modal_nap_the.style.display === "block") {
        modal_nap_the.style.display = "none";
    } else {
        modal_nap_the.style.display = "block";
    }
}
</script>
<script>
function napbank() {
    var modal_naptien = document.getElementById("modal_naptien");
    var modal_bank = document.getElementById("modal_bank");
    modal_naptien.style.display = "none";
    if (modal_bank.style.display === "block") {
        modal_bank.style.display = "none";
    } else {
        modal_bank.style.display = "block";
    }
}
</script>
<script>
function napmomo() {
    var modal_naptien = document.getElementById("modal_naptien");
    var modal_momo = document.getElementById("modal_momo");
    modal_naptien.style.display = "none";
    if (modal_momo.style.display === "block") {
        modal_momo.style.display = "none";
    } else {
        modal_momo.style.display = "block";
    }
}
</script>
<script>
function modal_dangnhap_phone() {
    var modal_dn_phone = document.getElementById("modal_dangnhap");
    if (modal_dn_phone.style.display === "block") {
        modal_dn_phone.style.display = "none";
    } else {
        modal_dn_phone.style.display = "block";
    }
}
</script>
<script>
function modal_timkiemdt() {
    var modal_timkiemdt = document.getElementById("modal_timkiemdt");
    if (modal_timkiemdt.style.display === "block") {
        modal_timkiemdt.style.display = "none";
    } else {
        modal_timkiemdt.style.display = "block";
    }
}
</script>
<script>
function navbar_phone() {
    var modal_bar = document.getElementById("nav_phone");
    if (modal_bar.style.display === "block") {
        modal_bar.style.display = "none";
    } else {
        modal_bar.style.display = "block";
    }
}
</script>
<script>
function naptien() {
    var modal_naptien = document.getElementById("modal_naptien");
    if (modal_naptien.style.display === "block") {
        modal_naptien.style.display = "none";
    } else {
        modal_naptien.style.display = "block";
    }
}
</script>
<script>
function saochep(text) {
    const tempInput = document.createElement("input");
    tempInput.value = text;
    document.body.appendChild(tempInput);

    tempInput.select();

    document.execCommand("copy");

    document.body.removeChild(tempInput);

    cuteToast({
        type: "success",
        message: `Copy "${text}" thành công`,
        timer: 5000
    });
}
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var swiper = new Swiper('.myswiper2', {
            slidesPerView: 5,
            spaceBetween: 10,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            breakpoints: {
                300: {
                    slidesPerView: 2,
                    spaceBetween: 10,
                },
                1024: {
                    slidesPerView: 5,
                    spaceBetween: 10,
                }
            }
        });
    });
</script>

<script>
    $(function() {
        $("img.lazyLoad").lazyload({
            effect: "fadeIn"
        });
    });
</script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<?=$bdtvl['js_web'];?>