<!DOCTYPE html>
<html lang="vi">

<head>
    <?php require_once('head.php');?>
    <title>Danh mục</title>
    <?php require_once('nav.php');?>
</head>
<?php
if (isset($_GET['del'])) {
    $del = $_GET['del'];
    echo '<script> if (confirm("Bạn có chắc muốn xoá game này")) {
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

    $create = mysqli_query($ketnoi,"DELETE FROM `danh_muc_tai_khoan` WHERE `id` = '".$delete."' ");

    if ($create)
    {
      echo '<script type="text/javascript">swal("Thành Công","Xóa thành công","success");setTimeout(function(){ location.href = "chuyen-muc.php" },500);</script>'; 
    }
    else
    {
      echo '<script type="text/javascript">swal("Lỗi","Lỗi máy chủ","error");setTimeout(function(){ location.href = "chuyen-muc.php" },1000);</script>'; 
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
                            <h1 class="m-0">Danh sách danh mục</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Game</li>
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
                                    <h3 class="card-title">Danh sách danh mục</h3>
                                    <div class="text-right">
                                        <a class="btn btn-primary btn-icon-left m-b-10" href="add-danhmuc.php"
                                            type="button"><i class="fas fa-plus-circle mr-1"></i>Thêm danh mục</a>
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
                                                    <th>DANH MỤC</th>
                                                    <th>GAME</th>
                                                    <th>STATUS</th>
                                                    <th>THAO TÁC</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $result = mysqli_query($ketnoi,"SELECT * FROM `danh_muc_tai_khoan` ");
                                                while($row = mysqli_fetch_assoc($result))
                                                {
                                                $game = $ketnoi->query("SELECT * FROM `list_game` WHERE `id` = '" . $row['game'] . "' ")->fetch_array();
                                                ?>
                                                <tr>
                                                    <td><?=$row['id'];?></td>
                                                    <td><?=$row['name'];?></td>
                                                    <td><?=$game['name'];?></td>
                                                    <td><?=$row['status'];?></td>
                                                    <td>
                                                        <a href="edit-danhmuc.php?id=<?=$row['id'];?>"
                                                            class="btn btn-default">
                                                            <i class="fas fa-edit"></i> Edit
                                                        </a>
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