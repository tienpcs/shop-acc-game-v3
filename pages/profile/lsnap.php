<!DOCTYPE html>
<html style="overflow-x: hidden;" class="ws-bg-zinc-100">

<!DOCTYPE html>
<html style="overflow-x: hidden;">

<?php require $_SERVER['DOCUMENT_ROOT'].'/hethong/head.php';?>
<title>Lịch sử nạp thẻ</title>
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
                            <div class="el-tabs el-tabs--top demo-tabs ws-px-2 ws--mx-2">
                                <div class="el-tabs__header is-top">
                                    <!---->
                                    <div class="el-tabs__nav-wrap is-top">
                                        <!---->
                                        <div class="el-tabs__nav-scroll">
                                            <div class="el-tabs__nav is-top" style="transform:translateX(-0px);"
                                                role="tablist">
                                                <div class="el-tabs__active-bar is-top" style=""></div>
                                                <!--[-->
                                                <!--]-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="el-tabs__content">
                                    <!--[-->
                                    <div id="pane-first" class="el-tab-pane" role="tabpanel" aria-hidden="false"
                                        aria-labelledby="tab-first">
                                        <!--[-->
                                        <div>
                                            <div class="ws-mb-3 ws-border-b ws-pb-4">
                                                <p class="ws-text-sm ws-font-medium ws-text-zinc-800 ws-mb-2"> Lọc thời
                                                    gian nạp </p>
                                                <div class="ws-grid ws-grid-cols-12 ws-gap-4">
                                                    <div class="ws-col-span-12 md:ws-col-span-6">
                                                        <!--[-->
                                                        <div class="el-date-editor el-date-editor--daterange el-input__wrapper el-range-editor el-range-editor--large el-tooltip__trigger el-tooltip__trigger"
                                                            style="width:100%;" aria-controls="el-id-1024-1"
                                                            aria-expanded="false" aria-haspopup="dialog"><i
                                                                class="el-icon el-input__icon el-range__icon" style="">
                                                                <!--[--><svg xmlns="http://www.w3.org/2000/svg"
                                                                    viewBox="0 0 1024 1024">
                                                                    <path fill="currentColor"
                                                                        d="M128 384v512h768V192H768v32a32 32 0 1 1-64 0v-32H320v32a32 32 0 0 1-64 0v-32H128v128h768v64zm192-256h384V96a32 32 0 1 1 64 0v32h160a32 32 0 0 1 32 32v768a32 32 0 0 1-32 32H96a32 32 0 0 1-32-32V160a32 32 0 0 1 32-32h160V96a32 32 0 0 1 64 0zm-32 384h64a32 32 0 0 1 0 64h-64a32 32 0 0 1 0-64m0 192h64a32 32 0 1 1 0 64h-64a32 32 0 1 1 0-64m192-192h64a32 32 0 0 1 0 64h-64a32 32 0 0 1 0-64m0 192h64a32 32 0 1 1 0 64h-64a32 32 0 1 1 0-64m192-192h64a32 32 0 1 1 0 64h-64a32 32 0 1 1 0-64m0 192h64a32 32 0 1 1 0 64h-64a32 32 0 1 1 0-64">
                                                                    </path>
                                                                </svg>
                                                                <!--]-->
                                                            </i><input autocomplete="off" name placeholder="Bắt đầu"
                                                                value class="el-range-input">
                                                            <!--[--><span class="el-range-separator">»</span>
                                                            <!--]--><input autocomplete="off" name
                                                                placeholder="Kết thúc" value class="el-range-input"><i
                                                                class="el-icon el-input__icon el-range__close-icon el-range__close-icon--hidden"
                                                                style="">
                                                                <!--[--><svg xmlns="http://www.w3.org/2000/svg"
                                                                    viewBox="0 0 1024 1024">
                                                                    <path fill="currentColor"
                                                                        d="m466.752 512-90.496-90.496a32 32 0 0 1 45.248-45.248L512 466.752l90.496-90.496a32 32 0 1 1 45.248 45.248L557.248 512l90.496 90.496a32 32 0 1 1-45.248 45.248L512 557.248l-90.496 90.496a32 32 0 0 1-45.248-45.248z">
                                                                    </path>
                                                                    <path fill="currentColor"
                                                                        d="M512 896a384 384 0 1 0 0-768 384 384 0 0 0 0 768m0 64a448 448 0 1 1 0-896 448 448 0 0 1 0 896">
                                                                    </path>
                                                                </svg>
                                                                <!--]-->
                                                            </i>
                                                        </div>
                                                        <!--teleport start-->
                                                        <!--teleport end-->
                                                        <!--]-->
                                                    </div>
                                                    <div class="ws-col-span-12 md:ws-col-span-6"><button
                                                            ariadisabled="false" type="button"
                                                            class="el-button el-button--primary el-button--large"
                                                            style="">
                                                            <!--v-if--><span class="">
                                                                <!--[-->Tìm kiếm
                                                                <!--]-->
                                                            </span>
                                                        </button></div>
                                                </div>
                                            </div>
                                            <div
                                                class="ws-bg-white ws-my-1 ws-pb-2 md:ws-py-4 md:ws-px-4 ws-rounded-none md:ws-rounded ws-relative">
                                                <!---->
                                                <div>
                                                    <div class="el-table--fit el-table--enable-row-hover el-table--enable-row-transition el-table el-table--layout-fixed is-scrolling-none"
                                                        data-prefix="el" style="width: 100%;">
                                                        <div class="el-table__inner-wrapper">
                                                            <div class="hidden-columns">
                                                                <div></div>
                                                                <div></div>
                                                            </div>
                                                            <div class="el-table__header-wrapper">
                                                                <table class="el-table__header" border="0"
                                                                    cellpadding="0" cellspacing="0"
                                                                    style="width: 384px;">
                                                                    <colgroup>
                                                                        <col name="el-table_1_column_1" width="192">
                                                                        <col name="el-table_1_column_2" width="192">
                                                                    </colgroup>
                                                                    <thead class="">
                                                                        <tr class="">
                                                                            <th class="el-table_1_column_1 is-leaf el-table__cell"
                                                                                colspan="1" rowspan="1">
                                                                                <div class="cell">THẺ CÀO
                                                                                    <!---->
                                                                                    <!---->
                                                                                </div>
                                                                            </th>
                                                                            <th class="el-table_1_column_2 is-leaf el-table__cell"
                                                                                colspan="1" rowspan="1">
                                                                                <div class="cell">THÔNG TIN
                                                                                    <!---->
                                                                                    <!---->
                                                                                </div>
                                                                            </th>
                                                                        </tr>
                                                                    </thead>
                                                                </table>
                                                            </div>
                                                            <div class="el-table__body-wrapper">
                                                                <div class="el-scrollbar">
                                                                    <div
                                                                        class="el-scrollbar__wrap el-scrollbar__wrap--hidden-default">
                                                                        <div class="el-scrollbar__view"
                                                                            style="display: inline-block; vertical-align: middle;">
                                                                            <table class="el-table__body"
                                                                                cellspacing="0" cellpadding="0"
                                                                                border="0"
                                                                                style="table-layout: fixed; width: 384px;">
                                                                                <colgroup>
                                                                                    <col name="el-table_1_column_1"
                                                                                        width="192">
                                                                                    <col name="el-table_1_column_2"
                                                                                        width="192">
                                                                                </colgroup>
                                                                                <!--v-if-->
                                                                                <tbody tabindex="-1">
                                                                                    <?php
                                    $i = 1;
                                    $result = mysqli_query($ketnoi, "SELECT * FROM `history_nap_the` where `username`= '$username' ");
                                    while ($row = mysqli_fetch_assoc($result)) { ?>
                                                                                    <tr class="el-table__row">
                                                                                        <td class="el-table_1_column_1 el-table__cell"
                                                                                            rowspan="1" colspan="1">
                                                                                            <div class="cell">
                                                                                                <!---->
                                                                                                <div>
                                                                                                    <p
                                                                                                        class="ws-uppercase ws-font-semibold ws-text-red-500">
                                                                                                        <?=$row['loaithe'];?>
                                                                                                    </p>
                                                                                                    <p
                                                                                                        class="ws-text-xs">
                                                                                                        <?=$row['time'];?>
                                                                                                    </p>
                                                                                                    <div
                                                                                                        class="ws-border-b ws-border-dashed ws-w-20 ws-my-2">
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="ws-text-xs ws-leading-5">
                                                                                                        <p
                                                                                                            class="ws-font-medium">
                                                                                                            SERI: <span
                                                                                                                class="ws-text-zinc-900"><?=$row['seri'];?></span>
                                                                                                        </p>
                                                                                                        <p
                                                                                                            class="ws-font-medium">
                                                                                                            M.THẺ: <span
                                                                                                                class="ws-text-zinc-900"><?=$row['pin'];?></span>
                                                                                                        </p>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </td>
                                                                                        <td class="el-table_1_column_2 el-table__cell"
                                                                                            rowspan="1" colspan="1">
                                                                                            <div class="cell">
                                                                                                <!---->
                                                                                                <div>
                                                                                                    <div>
                                                                                                        <?=napthe($row['status']);?>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="ws-border-b ws-border-dashed ws-w-20 ws-my-2">
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="ws-leading-5">
                                                                                                        <p
                                                                                                            class="ws-font-medium ws-text-black">
                                                                                                            <i
                                                                                                                class="fa-solid fa-money-bill"></i>
                                                                                                            Giá gửi:
                                                                                                            <?=tien($row['menhgia']);?>
                                                                                                        </p>
                                                                                                        <p
                                                                                                            class="ws-font-medium">
                                                                                                            <i
                                                                                                                class="fa-solid fa-money-bill"></i>
                                                                                                            Nhận:
                                                                                                            <?php if($row['status']=="hoantat"){ echo tien($row['thucnhan']);}else{ echo 0;}?>đ
                                                                                                        </p>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <?php } ?>
                                                                                </tbody>
                                                                                <!--v-if-->
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                    <div class="el-scrollbar__bar is-horizontal"
                                                                        style="display: none;">
                                                                        <div class="el-scrollbar__thumb"
                                                                            style="transform: translateX(0%);"></div>
                                                                    </div>
                                                                    <div class="el-scrollbar__bar is-vertical"
                                                                        style="display: none;">
                                                                        <div class="el-scrollbar__thumb"
                                                                            style="transform: translateY(0%);"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--v-if-->
                                                            <!--v-if-->
                                                        </div>
                                                        <div class="el-table__column-resize-proxy"
                                                            style="display: none;"></div>
                                                    </div>
                                                </div>
                                                <!---->
                                                <!---->
                                            </div>
                                            <!---->
                                        </div>
                                        <!--]-->
                                    </div>
                                    <div id="pane-second" class="el-tab-pane" role="tabpanel" aria-hidden="true"
                                        aria-labelledby="tab-second" style="display:none;">
                                        <!--[-->
                                        <!--]-->
                                    </div>
                                    <!--]-->
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