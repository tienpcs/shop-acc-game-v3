<!DOCTYPE html>
<html lang="vi">

<head>
    <?php require_once('head.php');?>
    <title>Thêm nick</title>
    <?php require_once('nav.php');?>
</head>



<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Add Acc Game</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Add Acc Game</li>
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
                                    <h3 class="card-title">Add Acc Game</h3>
                                </div>
                                <?php
if (isset($_GET['loai'])) {
    $id_loai = ($_GET['loai']);
    $loai = $ketnoi->query("SELECT * FROM `loai_tai_khoan` WHERE `id` = '" . $id_loai . "' ")->fetch_array();
    $danhmuc = $ketnoi->query("SELECT * FROM `danh_muc_tai_khoan` WHERE `id` = '" . $loai['danhmuc'] . "' ")->fetch_array();
    $game = $ketnoi->query("SELECT * FROM `list_game` WHERE `id` = '" . $danhmuc['game'] . "' ")->fetch_array();
}
?>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <form role="form" action="" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">LOẠI GAME</label>
                                            <select class="form-control" name="loai" onchange="handleChange(this)">
                                                <?php if (isset($game)) { ?>
                                                <option value="<?= $loai['id']; ?>"><?= $game['name']; ?> -
                                                    <?= $danhmuc['name']; ?> - <?= $loai['name']; ?></option>
                                                <?php } ?>

                                                <option value="">Chọn loại game</option>

                                                <?php
                $result = mysqli_query($ketnoi, "SELECT * FROM `loai_tai_khoan` ");
                while ($row = mysqli_fetch_assoc($result)) {
                    $danhmuc = $ketnoi->query("SELECT * FROM `danh_muc_tai_khoan` WHERE `id` = '" . $row['danhmuc'] . "'  ")->fetch_array();
                    $game = $ketnoi->query("SELECT * FROM `list_game` WHERE `id` = '" . $danhmuc['game'] . "' ")->fetch_array();
                    ?>
                                                <?php if ($danhmuc['type'] == 'muanick') { ?>
                                                <option value="<?= $row['id']; ?>"><?= $game['name']; ?> -
                                                    <?= $danhmuc['name']; ?> - <?= $row['name']; ?></option>
                                                <?php } ?>
                                                <?php } ?>
                                            </select>
                                            <script>
                                            function handleChange(selectElement) {
                                                var selectedValue = selectElement.value;
                                                window.location.href = window.location.pathname + "?loai=" +
                                                    selectedValue;
                                            }
                                            </script>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">IMG</label>
                                            <input type="file" class="form-control" name="img">
                                        </div>
                                        <div class="form-group">
                                            <div class="label-container">
                                                <label for="exampleInputEmail1">
                                                    LIST IMG
                                                </label>
                                            </div>
                                            <div class="input-container">
                                                <input type="file" class="form-control" name="list_img[]" multiple>
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
                                                    placeholder="Định dạng tài khoản | password" rows="2"></textarea>
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
                                            if (isset($loai)) {
                                                $lines = explode("\n", $game['list_thong_tin']);
                                                if (!empty($lines)) {
                                                    foreach ($lines as $line) { ?>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text"> <?= trim($line); ?></span>
                                                    <input type="text" name='thongtin<?=$i++;?>' class="form-control"
                                                        placeholder="Nhập thông tin">
                                                </div>
                                                <?php
                        }
                    }
                }
                ?>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">GIÁ TÀI KHOẢN</label>
                                            <input type="text" class="form-control" name="gia"
                                                placeholder="Nhập giá tài khoản">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">LOGIN</label>
                                            <input type="text" class="form-control" name="login" value=""
                                                placeholder="Facaebook, Google, Garena,..">
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
        
        // Chuyển đổi mảng thành chuỗi bằng implode
        $list_thong_tin = implode("\n", $list_thong_tin_array);
        
        // Đường dẫn đến thư mục 'img'
        $target_dir = __DIR__ . "/img/";

        // Lưu ảnh đại diện vào hệ thống và lấy đường dẫn
        $img = $_FILES['img'];
        $img_name = uniqid() . '_' . $img['name'];
        $imgname = rand(1,999999).$img_name;
        $img_path = $target_dir . $imgname;
        if (move_uploaded_file($img['tmp_name'], $img_path)) {
            // Lưu các ảnh khác vào hệ thống và lấy đường dẫn
            $list_img_paths = [];
            if (!empty($_FILES['list_img']['name'])) {
                foreach ($_FILES['list_img']['tmp_name'] as $key => $tmp_name) {
                    $file_name = $_FILES['list_img']['name'][$key];
                    $filename =  rand(1,999999) . $file_name;
                    $file_path = $target_dir . $filename;
                    if (move_uploaded_file($tmp_name, $file_path)) {
                        $url_listanh = "/admin/img/".$filename;
                        $list_img_paths[] = $url_listanh;
                    } else {
                        echo "Có lỗi khi lưu ảnh thứ " . ($key + 1);
                    }
                }
            }

            $list_img = implode("\n", $list_img_paths);
            $url_img = '/admin/img/'. $imgname;
            $create = mysqli_query($ketnoi, "INSERT INTO `list_acc_game` SET 
            `img` = '$url_img',
            `list_img` = '$list_img',
            `thong_tin` = '" . $_POST['thong_tin'] . "',
            `list_thong_tin` = '$list_thong_tin',
            `loai` = '" . $_POST['loai'] . "',
            `gia` = '" . $_POST['gia'] . "',
            `date` = '$time',
            `login` = '" . $_POST['login'] . "'");

            if ($create) {
                echo '<script type="text/javascript">if(!alert("Cập nhật thành công !")){window.history.back().location.reload();}</script>';
            } else {
                echo '<script type="text/javascript">if(!alert("Có lỗi xảy ra !")){window.history.back().location.reload();}</script>';
            }
        } else {
            echo "Có lỗi khi lưu ảnh đại diện";
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