<div class="ws-hidden md:ws-block ws-col-span-12 md:ws-col-span-3" style="">
    <div class="ws-my-1 md:ws-px-3 md:ws-bg-transparent ws-rounded-none md:ws-rounded">
        <div class="ws-bg-white md:ws-bg-transparent ws-px-3 md:ws-px-0 ws-py-2 md:ws-py-0 ws-flex ws-mb-4">
            <img src="/assets/img/avatar.jpeg" class="ws-h-12 ws-rounded-full">
            <div class="ws-ml-2">
                <p><?=$user['username'];?></p>
                <p class="ws-text-sm"><b>ID: <?=$user['id'];?></b></p>
            </div>
        </div>
        <div class="sidebar ws-text-sm ws-text-zinc-700">
            <div class="ws-bg-white ws-mb-4 md:ws-rounded">
                <a aria-current="page" href="/customer/profile"
                    class="ws-border-b ws-block ws-relative ws-px-3 ws-py-3.5 md:ws-py-3 ws-transition ws-duration-200"><i
                        class="ws-absolute ws-left-[12px] ws-top-[12px] md:ws-top-[10px] ws-text-2xl fa-solid fa-user ws-bg-gradient-to-r ws-from-pink-500 ws-to-red-600 ws-bg-clip-text ws-text-transparent"></i><span
                        class="ws-ml-10 ws-inline-block">Thông tin tài khoản</span>
                    <!---->
                </a>
                <a href="/customer/notifications"
                    class="ws-border-b ws-block ws-relative ws-px-3 ws-py-3.5 md:ws-py-3 ws-transition ws-duration-200"><i
                        class="ws-absolute ws-left-[12px] ws-top-[12px] md:ws-top-[10px] ws-text-2xl fa-solid fa-bell ws-bg-gradient-to-r ws-from-pink-500 ws-to-red-600 ws-bg-clip-text ws-text-transparent"></i><span
                        class="ws-ml-10 ws-inline-block">Thông báo</span>
                </a>
                <a onclick="naptien()"
                    class="ws-text-zinc-800 ws-border-b ws-block ws-cursor-pointer ws-relative ws-px-3 ws-py-3.5 md:ws-py-3 ws-rounded-b ws-transition ws-duration-200"><i
                        class="ws-absolute ws-left-[12px] ws-top-[12px] md:ws-top-[10px] ws-text-2xl fa-solid fa-money-bill ws-bg-gradient-to-r ws-from-pink-500 ws-to-red-600 ws-bg-clip-text ws-text-transparent"></i><span
                        class="ws-ml-10 ws-inline-block">Nạp tiền (Tự động)</span>
                    <!---->
                </a>
                <a href="/customer/transactions"
                    class="ws-text-zinc-800 ws-border-b ws-block ws-cursor-pointer ws-relative ws-px-3 ws-py-3.5 md:ws-py-3 ws-rounded-b ws-transition ws-duration-200"><i
                        class="ws-absolute ws-left-[12px] ws-top-[12px] md:ws-top-[10px] ws-text-2xl fa-solid fa-money-bill-transfer ws-bg-gradient-to-r ws-from-pink-500 ws-to-red-600 ws-bg-clip-text ws-text-transparent"></i><span
                        class="ws-ml-10 ws-inline-block">Nạp tiền nạp thẻ</span>
                    <!---->
                </a>
                <a href="/customer/transactions/bank"
                    class="ws-block ws-relative ws-px-3 ws-py-3.5 md:ws-py-3 ws-rounded-b ws-transition ws-duration-200"><i
                        class="ws-absolute ws-left-[12px] ws-top-[12px] md:ws-top-[10px] ws-text-2xl fa-solid fa-money-bill-transfer ws-bg-gradient-to-r ws-from-pink-500 ws-to-red-600 ws-bg-clip-text ws-text-transparent"></i><span
                        class="ws-ml-10 ws-inline-block">Lịch sử nạp bank/ Momo</span>
                    <!---->
                </a>
            </div>
            <div class="ws-bg-white ws-mb-4 md:ws-rounded">
                <a href="/customer/nicks"
                    class="ws-border-b ws-block ws-relative ws-px-3 ws-py-3.5 md:ws-py-3 ws-transition ws-duration-200"><i
                        class="ws-absolute ws-left-[12px] ws-top-[12px] md:ws-top-[10px] ws-text-2xl fa-solid fa-cart-shopping ws-bg-gradient-to-r ws-from-pink-500 ws-to-red-600 ws-bg-clip-text ws-text-transparent"></i><span
                        class="ws-ml-10 ws-inline-block">Tài khoản đã mua</span>
                    <!---->
                </a>
            </div>
             <div class="ws-bg-white ws-mb-4 md:ws-rounded">
                <a href="/customer/caythue"
                    class="ws-border-b ws-block ws-relative ws-px-3 ws-py-3.5 md:ws-py-3 ws-transition ws-duration-200"><i
                        class="ws-absolute ws-left-[12px] ws-top-[12px] md:ws-top-[10px] ws-text-2xl fa-solid fa-cart-shopping ws-bg-gradient-to-r ws-from-pink-500 ws-to-red-600 ws-bg-clip-text ws-text-transparent"></i><span
                        class="ws-ml-10 ws-inline-block">Lịch Sử Cày Thuê</span>
                    <!---->
                </a>
            </div>
            <?php if($user['level']==9){ ?>
                <div class="ws-bg-white ws-mb-4 md:ws-rounded">
                <a href="/admin"
                    class="ws-border-b ws-block ws-relative ws-px-3 ws-py-3.5 md:ws-py-3 ws-transition ws-duration-200"><i
                        class="ws-absolute ws-left-[12px] ws-top-[12px] md:ws-top-[10px] ws-text-2xl fa-solid fa-cart-shopping ws-bg-gradient-to-r ws-from-pink-500 ws-to-red-600 ws-bg-clip-text ws-text-transparent"></i><span
                        class="ws-ml-10 ws-inline-block">Trang Quản Trị</span>
                    <!---->
                </a>
            </div>
            <?php } ?>
            <?php if($user['level']==3){ ?>
                <div class="ws-bg-white ws-mb-4 md:ws-rounded">
                <a href="/ctv"
                    class="ws-border-b ws-block ws-relative ws-px-3 ws-py-3.5 md:ws-py-3 ws-transition ws-duration-200"><i
                        class="ws-absolute ws-left-[12px] ws-top-[12px] md:ws-top-[10px] ws-text-2xl fa-solid fa-cart-shopping ws-bg-gradient-to-r ws-from-pink-500 ws-to-red-600 ws-bg-clip-text ws-text-transparent"></i><span
                        class="ws-ml-10 ws-inline-block">Trang CTV</span>
                    <!---->
                </a>
            </div>
            <?php } ?>
            <div class="ws-mt-6 ws-px-4 md:ws-hidden"><button ariadisabled="false" type="button"
                    class="el-button el-button--primary el-button--large ws-w-full" style="">
                    <!--v-if--><span class="">
                        <!--[-->Đăng xuất
                        <!--]-->
                    </span>
                </button></div>
        </div>
    </div>
</div>