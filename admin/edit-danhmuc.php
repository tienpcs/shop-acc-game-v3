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
    $toz_bank =  $ketnoi->query("SELECT * FROM `danh_muc_tai_khoan` WHERE `id` = '$id' ")->fetch_array();
}
?>
<?php
if (isset($_POST["submit"]))
{
  $create = mysqli_query($ketnoi,"UPDATE `danh_muc_tai_khoan` SET 
    `name` = '".$_POST['name']."',
    `noidung` = '".$_POST['noidung']."',
    `game` = '".$_POST['game']."',
    `type` = '".$_POST['type']."',
    `status` = '".$_POST['status']."' WHERE `id` = '".$id."' ");

  if($create)
  {
    echo '<script type="text/javascript">if(!alert("Cập nhật thành công !")){window.history.back().location.reload();}</script>';
  }
  else
  {
    echo '<script type="text/javascript">if(!alert("Có lỗi xảy ra !")){window.history.back().location.reload();}</script>'; 
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
                            <h1 class="m-0">Edit danh mục</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Edit danh mục</li>
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
                                    <h3 class="card-title">EDIT Danh Mục</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <form role="form" action="" method="post">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">NAME</label>
                                            <input type="text" class="form-control" name="name"
                                                value="<?=$toz_bank['name'];?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">NỘI DUNG</label>
                                            <input type="text" class="form-control" name="noidung"
                                                value="<?=$toz_bank['noidung'];?>" placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Game</label>
                                            <?php 
                    $game = $ketnoi->query("SELECT * FROM `list_game` WHERE `id` = '" . $toz_bank['game'] . "' ")->fetch_array();
?>
                                            <select class="form-control" name="game" onchange="handleChange(this)">
                                                <option value="<?=$toz_bank['game'];?>"><?=$game['name'];?>
                                                <option value="">Chọn loại game</option>
                                                <?php
                                                $result = mysqli_query($ketnoi, "SELECT * FROM `list_game` ");
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                ?>

                                                <option value="<?= $row['id']; ?>"><?= $row['name']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Type (hạn chế sửa tránh lỗi)</label>
                                            <select class="form-control" name="type">
                                                <option value="<?=$toz_bank['type'];?>"><?=$toz_bank['type'];?>
                                                </option>
                                                <option value="muanick">Mua Nick Game</option>
                                                <option value="random">Random</option>
                                                <option value="caythue">Cày Thuê</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Status</label>
                                            <select class="form-control" name="status">
                                                <option value="<?=$toz_bank['status'];?>"><?=$toz_bank['status'];?>
                                                </option>
                                                <option value="ON">Hiển Thị(ON)</option>
                                                <option value="OFF">Ẩn(OFF)</option>
                                            </select>
                                        </div>

                                        <button type="submit" name="submit" class="btn btn-primary">Lưu</button>
                                    </form>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer clearfix">
                                    <a href="danhmuc.php" class="btn btn-info">Về Danh Mục</a>
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