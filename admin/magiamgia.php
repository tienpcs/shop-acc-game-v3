<!DOCTYPE html>
<html lang="vi">

<head>
    <?php require_once('head.php');?>
    <title>AdminLTE 3 | Dashboard</title>
    <?php require_once('nav.php');?>
</head>
<?php
if (isset($_GET['del'])) {
    $del = $_GET['del'];
    echo '<script> if (confirm("Bạn có chắc muốn xoá nick này")) {
        window.location="?delete='.$del.'";
    } else {
        alert("Đã huỷ");
        window.location="?ok";
    }
    </script>';
}
?>

<?php
if (isset($_GET['delete'])) 
{
    $delete = $_GET['delete'];

    $create = mysqli_query($ketnoi,"DELETE FROM `ma_giam_gia` WHERE `id` = '".$delete."'");

    if ($create)
    {
      echo '<script type="text/javascript">if(!alert("Cập nhật thành công !")){window.history.back().location.reload();}</script>'; 
    }
    else
    {
      echo '<script type="text/javascript">if(!alert("Có lỗi xảy ra !")){window.history.back().location.reload();}</script>'; 
    }
}
?>
<?php
    if (isset($_GET['on'])) {
          $create = mysqli_query($ketnoi,"UPDATE `ma_giam_gia` SET 
            `status` = 'ON' WHERE `id` = '".$_GET['on']."' ");
          if ($create) {
            echo '<script type="text/javascript">if(!alert("Cập nhật thành công !")){window.history.back().location.reload();}</script>'; 
          } else {
            echo '<script type="text/javascript">if(!alert("Có lỗi xảy ra !")){window.history.back().location.reload();}</script>'; 
          }
    }
    
    
    if (isset($_GET['off'])) {
          $create = mysqli_query($ketnoi,"UPDATE `ma_giam_gia` SET 
            `status` = 'OFF' WHERE `id` = '".$_GET['off']."' ");
          if ($create) {
            echo '<script type="text/javascript">if(!alert("Cập nhật thành công !")){window.history.back().location.reload();}</script>'; 
          } else {
            echo '<script type="text/javascript">if(!alert("Có lỗi xảy ra !")){window.history.back().location.reload();}</script>'; 
          }
    }
?>
<?php
if (isset($_POST["submit"]))
{
  $create = mysqli_query($ketnoi,"INSERT INTO `ma_giam_gia` SET `magiamgia` = 
  '".$_POST['magiamgia']."',
  `giamgia` = '".$_POST['giamgia']."',
  `type` = '".$_POST['type']."',
  `theo` = '".$_POST['theo']."',
  `batdau` = '".strtotime($_POST['batdau'])."',
  `ketthuc` = '".strtotime($_POST['ketthuc'])."',
  `soluong` = '".$_POST['soluong']."',
  `status` = 'ON'  ");

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
                            <h1 class="m-0">Mã Giảm Giá</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Mã Giảm Giá</li>
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
                                    <h3 class="card-title">Danh sách Mã Giảm Giá</h3>
                                    <div class="text-right">
                                       <a type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-default"
                        class="btn btn-info">TẠO MÃ GIẢM GIÁ</a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <style>
                                        .pagination-container {
                                            text-align: right;
                                            margin-top: 10px;
                                        }

                                        #datatable1 {
                                            margin-bottom: 20px;
                                        }
                                        </style>

                                        <table id="datatable1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th style="width: 10px">ID</th>
                                                    <th>Mã Giảm Giá</th>
                                                    <th>% Giảm</th>
                                                     <th>Type</th>
                                                     <th>Time Bắt Đầu</th>
                                                    <th>Time Kết Thúc</th>
                                                    <th>Số Lượng</th>
                                                     <th>Trạng Thái</th>
                                                    <th>THAO TÁC</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $result = mysqli_query($ketnoi,"SELECT * FROM `ma_giam_gia`");
                                                while($row = mysqli_fetch_assoc($result))
                                                {
                                                ?>
                                                <tr>
                                                    <td><?=$row['id'];?></td>
                                                    <td>
                                                   <?=$row['magiamgia'];?></td>
                                                   
                                                    <td>
                                                      <?=($row['giamgia']);?>
                                                    </td>
                                                     <td>
                                                      <?=$row['type'];?> - <?=$row['theo'];?>
                                                    </td>
                                                    <td>
                                                      <?=date("Y-m-d H:i:s", $row['batdau']);?>
                                                    </td>
                                                    <td>
                                                      <?=date("Y-m-d H:i:s", $row['ketthuc']);?>
                                                    </td>
                                                    <td>
                                                      <?=$row['soluong'];?>
                                                    </td>


                                                      <td class="text-center">
                        <?php if($row['status'] == "ON") { ?><span class="badge badge-success mb-2">Đang Hoạt Động</span> <a href="?off=<?=$row['id'];?>" class="btn btn-danger">
                          <i class="fas fa-times" aria-hidden="true"></i>
                        </a><?php } else { ?><span class="badge badge-danger mb-2">Đang Tạm Dừng</span> <a href="?on=<?=$row['id'];?>" class="btn btn-success">
                          <i class="fa fa-check" aria-hidden="true"></i>
                        </a><?php } ?>
                                                    
                                                    <td>
                                                        <a href="?del=<?=$row['id'];?>" class="btn btn-default">
                                                            <i class="fas fa-trash"></i> Delete
                                                        </a>
                                                    </td>
                                                </tr>
                                                <?php }?>
                                            </tbody>
                                        </table>

                                        <div id="pagination-container" class="pagination-container"></div>

                                        <script>
                                        $(document).ready(function() {
                                            var $table = $('#datatable1');
                                            var $rows = $table.find('tbody tr');
                                            var $paginationContainer = $('#pagination-container');

                                            var limitPerPage = 10;
                                            var totalPages = Math.ceil($rows.length / limitPerPage);

                                            // Tạo chuyển trang
                                            if (totalPages > 1) {
                                                var pagination = '<ul class="pagination">';

                                                for (var i = 1; i <= totalPages; i++) {
                                                    pagination +=
                                                        '<li class="page-item"><a class="page-link" href="javascript:void(0);">' +
                                                        i + '</a></li>';
                                                }

                                                pagination += '</ul>';

                                                $paginationContainer.html(pagination).show();

                                                // Ẩn các bảng không ở trang hiện tại
                                                $rows.hide().slice(0, limitPerPage).show();

                                                // Sự kiện chuyển trang
                                                $paginationContainer.on('click', '.page-link', function() {
                                                    var currentPage = $(this).text();
                                                    var start = (currentPage - 1) * limitPerPage;
                                                    var end = start + limitPerPage;

                                                    $rows.hide().slice(start, end).show();

                                                    $paginationContainer.find('.page-link').removeClass(
                                                        'active');
                                                    $(this).addClass('active');
                                                });
                                            }
                                        });
                                        </script>
                                    </div>
                                    <!-- /.row -->
                                </div><!-- /.container-fluid -->
                            </div><!-- /.container-fluid -->
                        </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
    </div>
    </div>
    <!-- /.content-wrapper -->
<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">TẠO Mã Giảm Giá</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" action="" method="post">
                    
                 <div class="form-group">
                        <label for="exampleInputEmail1">TÊN Mã:</label>
                        <input type="text" class="form-control" name="magiamgia" placeholder="VD : DICHVURIGHT">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">% Giảm:</label>
                        <input type="text" class="form-control" name="giamgia" placeholder="VD : 10">
                    </div>
                   <div class="form-group">
              <label for="exampleInputEmail1">TYPE</label>
            <select class="custom-select" name="type">
                                    <option value="muanick">Mua Tài Khoản</option>
                                    <option value="random">Bán Random</option>
                                    </select>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">theo loại gì</label>
            <select class="custom-select" name="type">
                                    <option value="sotien">Tính Theo %</option>
                                    <option value="phantram">Tính Theo Số Tiền</option>
                                    </select>
            </div>
                <div class="form-group">
                        <label for="exampleInputEmail1">Time Bắt Đầu</label>
                        <input type="datetime-local" class="form-control" name="batdau">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Time Kết Thúc</label>
                        <input type="datetime-local" class="form-control" name="ketthuc">
                    </div>
            <div class="form-group">
                        <label for="exampleInputEmail1">Số Lượng:</label>
                        <input type="text" class="form-control" name="soluong" placeholder="VD : 10">
                    </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">ĐÓNG</button>
                <button type="submit" name="submit" class="btn btn-primary">TẠO NGAY</button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

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