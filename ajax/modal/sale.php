<?php
require $_SERVER['DOCUMENT_ROOT'].'/hethong/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['id'])) {
        $id = antixss($_POST['id']);

        $result = $ketnoi->query("SELECT * FROM `list_acc_game` WHERE `id` = '$id'");
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            
            echo '
            <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Mã Số</label>
                        <input type="text" class="form-control" id="id" name="id" value="'.$row['id'].'" placeholder="VD: 1 , 3, 4" disabled>
                    </div>
                    <div class="form-group">
                        <label for="xt">Chọn Sale</label>
                        <select name="sale" id="sale" class="form-control">
                            <option value="0" ' . ($row['sale'] == '0' ? 'selected' : '') . '>OFF SALE</option>
                            <option value="1" ' . ($row['sale'] == '1' ? 'selected' : '') . '>ON SALE</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Chiết Khấu Giảm:</label>
                        <input type="text" class="form-control" id="ck" name="ck" value="'.$row['ck'].'" placeholder="VD: 1 , 3, 4">
                    </div>
                    <div class="form-group">
                        <label for="xt">Chọn Time Sale</label>
                        <select name="gio" id="gio" class="form-control">';
                        
                        $result1 = $ketnoi->query("SELECT * FROM `sale` WHERE `status` = '1'");
                        while ($row1 = $result1->fetch_assoc()) {
                            echo '<option value="'.$row1['batdau'].'" ' . ($row1['batdau'] == $row['gio'] ? 'selected' : '') . '>'.$row1['batdau'].':00 - '.$row1['ketthuc'].':00</option>';
                        }
                        
            echo '  </select>
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
                url: "'. BASE_URL('ajax/modal/update.php') .'",
                type: "POST",
                dataType: "json",
                data: {
                  id: $("#id").val(),
                  sale: $("#sale").val(),
                  ck: $("#ck").val(),
                  gio: $("#gio").val()
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
