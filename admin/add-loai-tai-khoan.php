<!DOCTYPE html>
<html lang="vi">

<head>
    <?php require_once('head.php');?>
    <title>Thêm loại tài khoản</title>
    <?php require_once('nav.php');?>
</head>
<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $loai =  $ketnoi->query("SELECT * FROM `loai_tai_khoan` WHERE `id` = '$id' ")->fetch_array();
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
                            <h1 class="m-0">Add Loại Tài Khoản</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Add Loại Tài Khoản</li>
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
                                    <h3 class="card-title">Add Loại Tài Khoản</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <form enctype="multipart/form-data" action="" method="post">

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">DANH MỤC</label>
                                            <select class="form-control" name="danhmuc">
                                                <option value="">Chọn loại danh mục</option>
                                                <?php
        $result = mysqli_query($ketnoi, "SELECT * FROM `danh_muc_tai_khoan` ");
        while ($row = mysqli_fetch_assoc($result)) {
            $game = $ketnoi->query("SELECT * FROM `list_game` WHERE `id` = '" . $row['game'] . "' ")->fetch_array();
        ?>
                                                <option value="<?= $row['id']; ?>">Game <?= $game['name']; ?> -
                                                    <?= $row['name']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">TÊN LOẠI TÀI KHOẢN</label>
                                            <input type="text" class="form-control" name="name">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">NỘI DUNG GIỚI THIỆU</label>
                                            <h6 for="exampleInputEmail1">Nếu danh mục là mua nick thì nội dung là lời
                                                giới thiệu, còn nếu là random acc thì nội dung sẽ là giá tiền của nick
                                                toàn bộ nick</h6>
                                            <input type="text" class="form-control" name="noidung">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">IMG</label>
                                            <input type="file" name="img">

                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">STATUS</label>
                                            <select class="form-control" name="status">
                                                <option value="ON">ON</option>
                                                <option value="OFF">OFF</option>
                                            </select>
                                        </div>
                                        <button type="submit" name="submit" class="btn btn-primary">Lưu</button>

                                        <?php
if (isset($_POST["submit"])) {
    // Đường dẫn đến thư mục 'img'
    $target_dir = __DIR__ . "/img/";

    // Lưu ảnh đại diện vào hệ thống và lấy đường dẫn
    $img = $_FILES['img'];
    $img_name = uniqid() . '_' . $img['name'];
    $imgname = 'loaitaikhoan'.rand(1, 999) . $img_name;
    $img_path = $target_dir . $imgname;
    if (move_uploaded_file($img['tmp_name'], $img_path)) {
        $url_img = '/admin/img/' . $imgname;
        $create = mysqli_query($ketnoi, "INSERT INTO `loai_tai_khoan` SET 
        `name` = '" . $_POST['name'] . "',
        `img` = '" . $url_img . "',
        `danhmuc` = '" . $_POST['danhmuc'] . "',
        `noidung` = '" . $_POST['noidung'] . "',
        `view` = '0',
        `buy` = '0',
        `status` = '" . $_POST['status'] . "'");
        if ($create) {
            echo '<script type="text/javascript">if(!alert("Cập nhật thành công !")){window.history.back().location.reload();}</script>';
        } else {
            echo '<script type="text/javascript">if(!alert("Có lỗi xảy ra !")){window.history.back().location.reload();}</script>';
        }
    } else {
        echo "Có lỗi khi lưu ảnh";
    }
}
?>

                                    </form>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer clearfix">
                                    <a href="loaitaikhoan.php" class="btn btn-info">Về Loại Tài Khoản</a>
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