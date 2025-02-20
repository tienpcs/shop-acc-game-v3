<!DOCTYPE html>
<html lang="vi">

<head>
    <?php require_once('head.php');?>
    <title>Setting</title>
    <?php require_once('nav.php');?>
</head>
<?php
    if (isset($_POST["submit"]) && isset($_SESSION['admin'])) {
       
      $create = $ketnoi->query("UPDATE `setting` SET
        `ten_web` = '".$_POST['ten_web']."',
        `logo` = '".$_POST['logo']."',
        `favicon` = '".$_POST['favicon']."',
        `banner_web` = '".$_POST['banner_web']."',
        `mo_ta` = '".$_POST['mo_ta']."',
        `email` = '".$_POST['email']."',
        `fb_admin` = '".$_POST['fb_admin']."',
        `sdt_admin` = '".$_POST['sdt_admin']."' ");

      if ($create) {
        echo '<script type="text/javascript">if(!alert("Cập nhật thành công !")){window.history.back().location.reload();}</script>'; 
        die;
      } else {
        echo '<script type="text/javascript">if(!alert("Có lỗi xảy ra !")){window.history.back().location.reload();}</script>'; 
        die;
      }
    }
?>
<?php
    if (isset($_POST["submit2"]) && isset($_SESSION['admin'])) {
       
      $create = $ketnoi->query("UPDATE `setting` SET
        `partner_id` = '".$_POST['partner_id']."',
        `chiet_khau_card` = '".$_POST['chiet_khau_card']."',
        `partner_key` = '".$_POST['partner_key']."',
        `web_gach_the` = '".$_POST['web_gach_the']."' ");

      if ($create) {
        echo '<script type="text/javascript">if(!alert("Cập nhật thành công !")){window.history.back().location.reload();}</script>'; 
        die;
      } else {
        echo '<script type="text/javascript">if(!alert("Có lỗi xảy ra !")){window.history.back().location.reload();}</script>'; 
        die;
      }
    }

?>
<?php
    if (isset($_POST["submit_token"]) && isset($_SESSION['admin'])) {
       
      $create = $ketnoi->query("UPDATE `setting` SET
        `token_mm` = '".$_POST['token_mm']."',
        `token_mb` = '".$_POST['token_mb']."' ");

      if ($create) {
        echo '<script type="text/javascript">if(!alert("Cập nhật thành công !")){window.history.back().location.reload();}</script>'; 
        die;
      } else {
        echo '<script type="text/javascript">if(!alert("Có lỗi xảy ra !")){window.history.back().location.reload();}</script>'; 
        die;
      }
    }
?>
<?php
    if (isset($_POST["submit_smtp"]) && isset($_SESSION['admin'])) {
       
      $create = $ketnoi->query("UPDATE `setting` SET
        `smtp` = '".$_POST['smtp']."',
        `port_smtp` = '".$_POST['port_smtp']."',
        `email_auto` = '".$_POST['email_auto']."',
        `pass_mail_auto` = '".$_POST['pass_mail_auto']."' ");

      if ($create) {
        echo '<script type="text/javascript">if(!alert("Cập nhật thành công !")){window.history.back().location.reload();}</script>'; 
        die;
      } else {
        echo '<script type="text/javascript">if(!alert("Có lỗi xảy ra !")){window.history.back().location.reload();}</script>'; 
        die;
      }
    }

?>
<?php
    if (isset($_POST["submit3"]) && isset($_SESSION['admin'])) {
       
      $create = $ketnoi->query("UPDATE `setting` SET
        `thongbao` = '".$_POST['thongbao']."' ");

      if ($create) {
        echo '<script type="text/javascript">if(!alert("Cập nhật thành công !")){window.history.back().location.reload();}</script>'; 
        die;
      } else {
        echo '<script type="text/javascript">if(!alert("Có lỗi xảy ra !")){window.history.back().location.reload();}</script>'; 
        die;
      }
    }

?>
<?php
    if (isset($_POST["submit_js"]) && isset($_SESSION['admin'])) {
       
      $create = $ketnoi->query("UPDATE `setting` SET
        `js_web` = '".$_POST['js_web']."' ");

      if ($create) {
        echo '<script type="text/javascript">if(!alert("Cập nhật thành công !")){window.history.back().location.reload();}</script>'; 
        die;
      } else {
        echo '<script type="text/javascript">if(!alert("Có lỗi xảy ra !")){window.history.back().location.reload();}</script>'; 
        die;
      }
    }

?>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Settings</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Settings</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <form class="form-horizontal" enctype="multipart/form-data" action="" method="post">
                                    <div class="card-header">
                                        <h3 class="text-center">Thông Tin</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">TÊN WEBSITE</label>
                                                    <input type="text" class="form-control" name="ten_web"
                                                        placeholder="" value="<?=$bdtvl['ten_web'];?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">LINK ẢNH LOGO</label>
                                                    <input type="text" class="form-control" name="logo" placeholder=""
                                                        value="<?=$bdtvl['logo'];?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">ẢNH FAVICON WEBSITE</label>
                                                    <input type="text" class="form-control" name="favicon"
                                                        placeholder="" value="<?=$bdtvl['favicon'];?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">ẢNH BÌA WEBSITE</label>
                                                    <input type="text" class="form-control" name="favicon"
                                                        placeholder="" value="<?=$bdtvl['banner_web'];?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">MÔ TẢ WEBSITE</label>
                                                    <input type="text" class="form-control" name="mo_ta" placeholder=""
                                                        value="<?=$bdtvl['mo_ta'];?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">SDT ZALO ADMIN</label>
                                                    <input type="number" class="form-control" name="sdt_admin"
                                                        placeholder="" value="<?=$bdtvl['sdt_admin'];?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">LINK FB ADMIN</label>
                                                    <input type="url" class="form-control" name="fb_admin"
                                                        placeholder="" value="<?=$bdtvl['fb_admin'];?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Email</label>
                                                    <input type="email" class="form-control" name="email" placeholder=""
                                                        value="<?=$bdtvl['email'];?>">
                                                </div>
                                            </div>
                                        </div>
                                        <button name="submit" type="submit" class="btn btn-info btn-block">Lưu Ngay</button>
                                </form>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <form class="form-horizontal" enctype="multipart/form-data" action="" method="post">
                            <div class="card-header">
                                <h3 class="text-center">Cấu Hình Token API.SIEUTHICODE.NET</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">TOKEN MOMO ( API DVD )</label>
                                            <i>Treo Cron Auto : domain/cron/momo.php</i>
                                            <input type="text" class="form-control" name="token_mm"
                                                value="<?=$bdtvl['token_mm'];?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">TOKEN MBBANK</label>
                                            <i>Treo Cron Auto : domain/cron/mbbank.php</i>
                                            <input type="text" class="form-control" name="token_mb"
                                                value="<?=$bdtvl['token_mb'];?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">TOKEN VIETCOMBANK</label>
                                            <i>Treo Cron Auto : domain/cron/vietcombank.php</i>
                                            <input type="text" class="form-control" name="token_vcb"
                                                value="<?=$bdtvl['token_vcb'];?>">
                                        </div>
                                    </div>
                                </div>
                                <button name="submit_token" type="submit" class="btn btn-info btn-block">
                                    Lưu Ngay
                                </button>
                        </form>
                    </div>
                </div>
                <div class="row lg-12">
                    <section class="col-lg-6 connectedSortable">
                        <form action="" method="POST">
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="fas fa-cogs mr-1"></i>
                                        CẤU HÌNH NẠP THẺ
                                    </h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn bg-success btn-sm" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn bg-warning btn-sm"
                                            data-card-widget="maximize"><i class="fas fa-expand"></i>
                                        </button>
                                        <button type="button" class="btn bg-danger btn-sm" data-card-widget="remove">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Link Web ( THEVN.NET )</label>
                                        <input type="text" name="web_gach_the" value="<?=$bdtvl['web_gach_the'];?>"
                                            class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Partner ID </label>
                                        <input type="text" name="partner_id" value="<?=$bdtvl['partner_id'];?>"
                                            class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Partner Key</label>
                                        <input type="text" name="partner_key" value="<?=$bdtvl['partner_key'];?>"
                                            class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Ck Nạp Thẻ (Tiền lời thêm khi nạp thẻ)</label>
                                        <input type="text" class="form-control" name="chiet_khau_card"
                                            value="<?=$bdtvl['chiet_khau_card'];?>"
                                            placeholder="Nhập ck nạp thẻ nếu cần">

                                    </div>

                                    <div class="card-footer clearfix">
                                        <button name="submit2" class="btn btn-info btn-icon-left m-b-10"
                                            type="submit"><i class="fas fa-save mr-1"></i>Lưu Ngay</button>
                                    </div>
                                </div>
                        </form>
                    </section>
                    <section class="col-lg-6 connectedSortable">
                        <form action="" method="POST">
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="fas fa-cogs mr-1"></i>
                                        CẤU HÌNH GỬI MAIL AUTO
                                    </h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn bg-success btn-sm" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn bg-warning btn-sm"
                                            data-card-widget="maximize"><i class="fas fa-expand"></i>
                                        </button>
                                        <button type="button" class="btn bg-danger btn-sm" data-card-widget="remove">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Máy chủ SMTP </label>
                                        <input type="text" name="smtp" value="<?=$bdtvl['smtp'];?>"
                                            class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Port ( 587 )</label>
                                        <input type="text" name="port_smtp" value="<?=$bdtvl['port_smtp'];?>"
                                            class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Email auto</label>
                                        <input type="text" name="email_auto" value="<?=$bdtvl['email_auto'];?>"
                                            class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Pass mail auto</label>
                                        <input type="text" name="pass_mail_auto" value="<?=$bdtvl['pass_mail_auto'];?>"
                                            class="form-control">
                                    </div>
                                    <div class="card-footer clearfix">
                                        <button name="submit_smtp" class="btn btn-info btn-icon-left m-b-10"
                                            type="submit"><i class="fas fa-save mr-1"></i>Lưu Ngay</button>
                                    </div>
                                </div>
                        </form>
                    </section>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <form class="form-horizontal" enctype="multipart/form-data" action="" method="post">
                                <div class="card-header">
                                    <h3 class="text-center">Cấu Hình Thông Báo</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1"> CẤU HÌNH THÔNG BÁO:</label>
                                        <textarea class="textarea" name="thongbao" placeholder="Place some text here"
                                            style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?=$bdtvl['thongbao'];?></textarea>
                                    </div>

                                </div>
                                <button name="submit3" type="submit" class="btn btn-info btn-block">Lưu Ngay</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <form class="form-horizontal" enctype="multipart/form-data" action="" method="post">
                                <div class="card-header">
                                    <h3 class="text-center">Cấu Hình JS Web</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1"> CẤU HÌNH JS WEB:</label>
                                        <textarea class="textarea" name="js_web" placeholder="Place some text here"
                                            style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?=$bdtvl['js_web'];?></textarea>
                                    </div>

                                </div>
                                <button name="submit_js" type="submit" class="btn btn-info btn-block">Lưu Ngay</button>
                            </form>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    <!-- /.row -->
    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <?php require_once('foot.php');?>
</body>

</html>