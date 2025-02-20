<?php
require $_SERVER['DOCUMENT_ROOT'].'/hethong/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['id'])) {
        $id = antixss($_POST['id']);

        $result = $ketnoi->query("SELECT * FROM `don_caythue` WHERE `id` = '$id'");
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            
            echo '
            <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Mã Số</label>
                        <input type="text" class="form-control" id="id" name="id" value="'.$row['id'].'" placeholder="VD: 1 , 3, 4" disabled>
                    </div>
                    <div class="form-group">
                        <label for="xt">Trạng Thái Đơn</label>
                        <select name="status" id="status" class="form-control">
                            <option value="xuly" ' . ($row['status'] == 'xuly' ? 'selected' : '') . '>Đang Chờ Admin Duyệt</option>
                            <option value="daduyet" ' . ($row['status'] == 'daduyet' ? 'selected' : '') . '>Duyệt Đơn</option>
                            <option value="hoantat" ' . ($row['status'] == 'hoantat' ? 'selected' : '') . '>Hoàn Thành Đơn</option>
                            <option value="thatbai" ' . ($row['status'] == 'thatbai' ? 'selected' : '') . '>Hủy Đơn</option>
                        </select>
                    </div>
                   
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">ĐÓNG</button>
                        <button name="btn_submit" id="btn_submit" class="btn btn-primary">Cập Nhật</button>
                    </div>
            </div>
             <script type="text/javascript">
          $("#btn_submit").click(function() {
              $("#btn_submit").html("<i class=\'fa fa-spinner fa-spin\'></i> Loading...").prop("disabled", true);

              $.ajax({
                url: "'. BASE_URL('ajax/caythe/update.php') .'",
                type: "POST",
                dataType: "json",
                data: {
                  id: $("#id").val(),
                  status: $("#status").val()
                },
                success: function(res) {
                  if (res.status == "success") {
                     cuteToast({
                              type: "success",
                                message: res.msg,
                             timer: 5000
                                    });
                    setTimeout(function() {
                      window.location = ""
                    }, 1000);
                  } else {
                     cuteToast({
                                        type: "error",
                                        message: res
                                            .msg,
                                        timer: 5000
                                    });
                  }
                  $("#btnGiaHan").html("Cập Nhật").prop("disabled", false);
                }
              });
            });

      ';
        } else {
            echo "Không tìm thấy thông tin!";
        }
    }  
} else {
    die('The Request Not Found');
}
?>
