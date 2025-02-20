<!DOCTYPE html>
<html lang="vi">

<head>
    <?php require_once('head.php');?>
    <title>Thêm game</title>
    <?php require_once('nav.php');?>
</head>
<?php
if (isset($_POST["submit"]))
{
  $create = mysqli_query($ketnoi,"INSERT INTO `list_game` SET 
    `name` = '".$_POST['name']."',
    `list_thong_tin` = '".$_POST['list_thong_tin']."',
    `status` = '".$_POST['status']."'");

  if($create)
  {
    echo '<script type="text/javascript">if(!alert("Thêm game thành công !")){window.history.back().location.reload();}</script>';
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
                            <h1 class="m-0">Add GAME</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Add GAME</li>
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
                                    <h3 class="card-title">Add GAME</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <form role="form" action="" method="post">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">TÊN GAME</label>
                                            <input type="text" class="form-control" name="name">
                                        </div>
                                        <style>
                                        .form-group {
                                            overflow: hidden;
                                            /* Đảm bảo các phần tử con không tràn ra khỏi phần tử cha */
                                        }

                                        .label-container {
                                            float: left;
                                            /* Đưa phần tử chứa chữ "LIST IMG" sang trái */
                                            width: 30%;
                                            /* Chiều rộng của phần tử chứa chữ "LIST IMG" */
                                        }

                                        .input-container {
                                            float: right;
                                            /* Đưa textarea sang phải */
                                            width: 70%;
                                            /* Chiều rộng của textarea */
                                        }
                                        </style>

                                        <div class="form-group">
                                            <div class="label-container">
                                                <label for="exampleInputEmail1">
                                                    THÔNG TIN
                                                </label>
                                            </div>
                                            <div class="input-container">
                                                <textarea class="form-control" name="list_thong_tin"
                                                    placeholder="Mỗi thông tin 1 dòng, Vd: Tướng " rows="6"></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">STATUS</label>
                                            <select class="form-control" name="status">
                                                <option value="ON">ON</option>
                                                <option value="OFF">OFF</option>
                                            </select>
                                        </div>
                                        <button type="submit" name="submit" class="btn btn-primary">Lưu</button>
                                    </form>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer clearfix">
                                    <a href="listgame.php" class="btn btn-info">Về List GAME</a>
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