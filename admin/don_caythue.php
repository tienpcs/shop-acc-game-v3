<!DOCTYPE html>
<html lang="vi">

<head>
    <?php require_once('head.php'); ?>
    <title>AdminLTE 3 | Dashboard</title>
    <?php require_once('nav.php'); ?>
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

    $create = mysqli_query($ketnoi,"DELETE FROM `don_caythue` WHERE `id` = '".$delete."'");

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


<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Danh sách Đơn Cày Thuê</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Đơn Cày Thuê</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Danh sách Đơn Cày Thuê</h3>
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
                                                    <th>TÀI KHOẢN</th>
                                                    <th>MẬT KHẨU</th>
                                                    <th>2FA</th>
                                                     <th>GHI CHÚ</th>
                                                     <th>TRẠNG THÁI</th>
                                                    <th>GIÁ TIỀN</th>
                                                    <th>THAO TÁC</th>
                                                </tr>
                                            <tbody>
                                            </thead>
                                                <?php
                                                $result = $ketnoi->query("SELECT * FROM `don_caythue`");
                                                while ($row = $result->fetch_assoc()) {
                                                    ?>
                                                    <tr>
                                                        <td><?= htmlspecialchars($row['id']); ?></td>
                                                        <td><?= htmlspecialchars($row['taikhoan']); ?></td>
                                                        <td><?= htmlspecialchars($row['matkhau']); ?></td>
                                                        <td><?= htmlspecialchars($row['2fa']); ?></td>
                                                        <td><?= htmlspecialchars($row['ghichu']); ?></td>
                                                        <td><?= status_caythue($row['status']); ?></td>
                                                        <td><?= htmlspecialchars(tien(getdon($row['loai'], 'gia'))); ?>đ</td>
                                                        <td>
                                                            <a href="?del=<?= htmlspecialchars($row['id']); ?>" class="btn btn-default">
                                                                <i class="fas fa-trash"></i> Delete
                                                            </a>
                                                            <button type="button" onclick="modalsale(<?= $row['id']; ?>)" class="btn btn-success">
                                                                Trạng Thái
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <?php 
                                                } 
                                                ?>
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
                                                        pagination += '<li class="page-item"><a class="page-link" href="javascript:void(0);">' + i + '</a></li>';
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

                                                        $paginationContainer.find('.page-link').removeClass('active');
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
    <!-- /.content-wrapper -->

    <div class="modal fade" id="salemodal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Trạng Thái</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
               <div id="showsale"></div>
               
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
<script type="text/javascript">
        function modalsale(id) {
            $("#salemodal").modal('show');
            $.ajax({
            url: "/ajax/caythe/modal.php", method: "POST", data: { id: id }
            , success: function (data) { $("#showsale").html(data); }, error: function () {
                 toastr.error('Không thể xử lý', '', { timeOut: 5000 }); 
            }
        });
 }
</script>
    <script type="text/javascript">

        function confirmDeletion(del) {
            if (confirm("Bạn có chắc muốn xoá nick này")) {
                window.location = "?delete=" + del;
            } else {
                alert("Đã huỷ");
                window.location = "?ok";
            }
        }
    </script>

    <?php require_once('foot.php'); ?>
</body>

</html>
