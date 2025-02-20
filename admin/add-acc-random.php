<!DOCTYPE html>
<html lang="vi">

<head>
    <?php require_once('head.php');?>
    <title>Thêm tài khoản random</title>
    <?php require_once('nav.php');?>
</head>
<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $bdtvl_bank =  $ketnoi->query("SELECT * FROM `danh_muc_tai_khoan` WHERE `id` = '$id' ")->fetch_array();
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
                            <h1 class="m-0">Add Random Acc </h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Add Random Acc </li>
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
                                    <h3 class="card-title">ADD Acc Random</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <form role="form" action="" method="post">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Loại tài khoản</label>
                                            <select class="form-control" name="loai">
                                                <option value="">Chọn loại tài khoản</option>
                                                <?php
                $result = mysqli_query($ketnoi, "SELECT * FROM `loai_tai_khoan` ");
                while ($row = mysqli_fetch_assoc($result)) {
                    $danhmuc = $ketnoi->query("SELECT * FROM `danh_muc_tai_khoan` WHERE `id` = '" . $row['danhmuc'] . "'  ")->fetch_array();
                    $game = $ketnoi->query("SELECT * FROM `list_game` WHERE `id` = '" . $danhmuc['game'] . "' ")->fetch_array();
                    ?>
                                                <?php if ($danhmuc['type'] == 'random') { ?>
                                                <option value="<?= $row['id']; ?>"><?= $game['name']; ?> -
                                                    <?= $danhmuc['name']; ?> - <?= $row['name']; ?></option>
                                                <?php } ?>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <div class="label-container">
                                                <label for="exampleInputEmail1">
                                                    THÔNG TIN TÀI KHOẢN
                                                </label>
                                            </div>
                                            <div class="input-container">
                                                <textarea class="form-control" name="thong_tin"
                                                    placeholder="Mỗi tài khoản một dòng, định dạng taikhoan | matkhau"
                                                    rows="5"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Login</label>
                                            <input type="text" class="form-control" readonly=""
                                                 placeholder="Facebook, Google, Garena,...">
                                        </div>
                                        <button type="submit" name="submit" class="btn btn-primary">Lưu</button>
                                        
                                        <?php
    if (isset($_POST["submit"]))
    {
        $lines = explode("\n", $_POST['thong_tin']); 
        foreach ($lines as $line) { 
            $thong_tin = trim($line);
            $create = mysqli_query($ketnoi,"INSERT INTO `list_acc_game` SET 
            `loai` = '".$_POST['loai']."',
            `login` = '".$_POST['login']."',
            `date` = '".$time."',
            `gia` = '',
            `status` = '',
            `thong_tin` = '".$thong_tin."'");
        }
        if($create)
        {
            echo '<script type="text/javascript">if(!alert("Thêm acc thành công !")){window.history.back().location.reload();}</script>';
        }
        else
        {
            echo '<script type="text/javascript">if(!alert("Có lỗi xảy ra !")){window.history.back().location.reload();}</script>'; 
        }
}

?>
                                    </form>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer clearfix">
                                    <a href="randomacc.php" class="btn btn-info">Về RanDom Acc</a>
                                </div>
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