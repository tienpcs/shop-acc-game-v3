<!DOCTYPE html>
<html lang="vi">

<head>
    <?php require_once('head.php');?>
    <title>AdminLTE 3 | Dashboard</title>
    <?php require_once('nav.php');?>
</head>
<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $acc =  $ketnoi->query("SELECT * FROM `list_acc_game` WHERE `id` = '$id' ")->fetch_array();
    $loai =  $ketnoi->query("SELECT * FROM `loai_tai_khoan` WHERE `id` = '".$acc['loai']."' ")->fetch_array();
    $danhmuc =  $ketnoi->query("SELECT * FROM `danh_muc_tai_khoan` WHERE `id` = '".$loai['danhmuc']."' ")->fetch_array();
    $game =  $ketnoi->query("SELECT * FROM `list_game` WHERE `id` = '".$danhmuc['game']."' ")->fetch_array();
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
                            <h1 class="m-0">Edit Acc Game</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Edit Acc Game</li>
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
                                <div class="card-header">
                                    <h3 class="card-title">Edit Acc Game</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <form role="form" action="" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">IMG</label>
                                            <input type="text" class="form-control" value="<?=$acc['img'];?>"
                                                name="img">
                                        </div>
                                        <div class="form-group">
                                            <div class="label-container">
                                                <label for="exampleInputEmail1">
                                                    LIST IMG
                                                </label>
                                            </div>
                                            <div class="input-container">
                                                <textarea type="text" class="form-control"
                                                    name="list_img"rows="5"><?=$acc['list_img'];?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="label-container">
                                                <label for="exampleInputEmail1">
                                                    THÔNG TIN ĐĂNG NHẬP
                                                </label>
                                            </div>
                                            <div class="input-container">
                                                <textarea class="form-control" name="thong_tin"
                                                    placeholder="Định dạng tài khoản | password"
                                                    rows="2"><?=$acc['thong_tin'];?></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="label-container">
                                                <label for="exampleInputEmail1">
                                                    THÔNG TIN TÀI KHOẢN
                                                </label>
                                                </br>
                                                <?php
                                                $i =1;
                                                    $lines = explode("\n", $game['list_thong_tin']);
                                                    $lines2 = explode("\n", $acc['list_thong_tin']);
                                                    if (!empty($lines)) {
                                                        foreach ($lines as $index => $line) { ?>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text"> <?= trim($line); ?>:</span>

                                                    <input type="text" name='thongtin<?=$i++;?>' class="form-control"
                                                        placeholder="Nhập thông tin"
                                                        value="<?= isset($lines2[$index]) ? trim($lines2[$index]) : ''; ?>">

                                                </div>
                                                <?php }
                                                    }?>

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">GIÁ TÀI KHOẢN</label>
                                            <input type="text" class="form-control" name="gia"
                                                placeholder="Nhập giá tài khoản" value="<?=$acc['gia'];?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">LOGIN</label>
                                            <input type="text" class="form-control" name="login"
                                                placeholder="Facaebook, Google, Garena,.." value="<?=$acc['login'];?>">
                                        </div>
                                        <button type="submit" name="submit" class="btn btn-primary">Lưu</button>
                                    </form>
                                    <?php
    if (isset($_POST["submit"])) {
        $now = time();
        $list_thong_tin_array = array();
        $i = 1;
        if (isset($loai)) {
            $lines = explode("\n", $game['list_thong_tin']);
            if (!empty($lines)) {
                foreach ($lines as $line) { 
                    // Lấy giá trị của input và thêm vào mảng
                    $list_thong_tin_array[] = $_POST['thongtin'.$i++];
                }
            }
        }
            $create = mysqli_query($ketnoi, "UPDATE `list_acc_game` SET 
            `img` = '" . $_POST['img'] . "',
            `list_img` = '" . $_POST['list_img'] . "',
            `thong_tin` = '" . $_POST['thong_tin'] . "',
            `list_thong_tin` = '$list_thong_tin',
            `gia` = '" . $_POST['gia'] . "',
            `login` = '" . $_POST['login'] . "' WHERE `id` = '".$id."' ");

            if ($create) {
                echo '<script type="text/javascript">if(!alert("Cập nhật thành công !")){window.history.back().location.reload();}</script>';
            } else {
                echo '<script type="text/javascript">if(!alert("Có lỗi xảy ra !")){window.history.back().location.reload();}</script>';
            }
        }
    ?>
                                </div>

                                </form>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer clearfix">
                                <a href="listnick.php" class="btn btn-info">Về DS Acc Game</a>
                            </div>
                            <!-- /end.card-body -->
                        </div>
                        <!-- /.card -->
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