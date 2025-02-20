<!DOCTYPE html>
<html style="overflow-x: hidden;" class="ws-bg-zinc-100">

<!DOCTYPE html>
<html style="overflow-x: hidden;">

<?php require $_SERVER['DOCUMENT_ROOT'].'/hethong/head.php';?>
<title>Tài khoản đã mua</title>
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
                                                                <table class="el-table__header" 
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
                                                                                <div class="cell">TÀI KHOẢN
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
                                                                                    $result = mysqli_query($ketnoi, "SELECT * FROM `list_acc_game` where `username`= '$username' ");
                                                                                    while ($row = mysqli_fetch_assoc($result)) { ?>
                                                                                    <?php
                                                                                    $loai = $ketnoi->query("SELECT * FROM `loai_tai_khoan` WHERE `id` = '".$row['loai']."' ")->fetch_array();
                                                                                    ?>
                                                                                    <tr class="el-table__row">
                                                                                        <td class="el-table_1_column_1 el-table__cell"
                                                                                            rowspan="1" colspan="1">
                                                                                            <div class="cell">
                                                                                                <!---->
                                                                                                <div>
                                                                                                    <p
                                                                                                        class="ws-uppercase ws-font-semibold ws-text-red-500">
                                                                                                        <?=$loai['name'];?>
                                                                                                    </p>
                                                                                                    <div
                                                                                                        class="ws-border-b ws-border-dashed ws-w-20 ws-my-2">
                                                                                                    </div>
                                                                                                    <p
                                                                                                        class="ws-text-xs">
                                                                                                        ID ACC:
                                                                                                        <?=$row['id'];?>
                                                                                                    </p>
                                                                                                </div>
                                                                                            </div>
                                                                                        </td>
                                                                                        <td class="el-table_1_column_2 el-table__cell"
                                                                                            rowspan="1" colspan="1">
                                                                                            <div class="cell">
                                                                                                <!---->
                                                                                                <div>
                                                                                                    <div>
                                                                                                        Đăng nhập
                                                                                                        <?=$row['login'];?>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="ws-border-b ws-border-dashed ws-w-20 ws-my-2">
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="ws-leading-5">
                                                                                                        <p
                                                                                                            class="ws-font-medium ws-text-black">
                                                                                                            <?=($row['thong_tin']);?>
                                                                                                        </p>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="ws-border-b ws-border-dashed ws-w-20 ws-my-2">
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="ws-leading-5">
                                                                                                        <p
                                                                                                            class="ws-font-medium ws-text-black">
                                                                                                            <?=ngay($row['ngaymua']);?>
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