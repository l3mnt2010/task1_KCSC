<?php
include '../../config.php';
include_once "../../app/helpers/middleware.php";
// userOnly();
?>
<?php
$is_upload = false;
$msg = null;
if (isset($_POST['submit'])) {
                                        if (file_exists(UPLOAD_PATH)) {
                                                                                $temp_file = $_FILES['upload_file']['tmp_name'];
                                                                                $img_path = UPLOAD_PATH . '/' . $_FILES['upload_file']['name'];
                                                                                if (move_uploaded_file($temp_file, $img_path)) {

                                                                                                                        // cmd injection                        
                                                                                                                        exec("convert $img_path -resize 400x400 $img_path");
                                                                                                                        echo "Success resize";
                                                                                                                        $is_upload = true;
                                                                                } else {
                                                                                                                        $msg = 'Lỗi！';
                                                                                }
                                        } else {
                                                                                $msg = UPLOAD_PATH . ' thư mục không tồn tại, vui lòng tạo thủ công!';
                                        }
}
?>

<div id="upload_panel">
                                        <ol>
                                                                                <li>
                                                                                                                        <p>Tải lên hình đại diện của bạn</p>
                                                                                </li>
                                                                                <li>
                                                                                                                        <form enctype="multipart/form-data" method="post" onsubmit="return checkFile()">
                                                                                                                                                                <p>Chọn ảnh nền của bạn：</p>
                                                                                                                                                                <input class="input_file" type="file" name="upload_file" />
                                                                                                                                                                <input class="button" type="submit" name="submit" value="Tải lên" />
                                                                                                                        </form>
                                                                                                                        <div id="msg">
                                                                                                                                                                <?php
                                                                                                                                                                if ($msg != null) {
                                                                                                                                                                                                        echo "Lời nhắc：" . $msg;
                                                                                                                                                                }
                                                                                                                                                                ?>
                                                                                                                        </div>
                                                                                                                        <div id="img">
                                                                                                                                                                <?php
                                                                                                                                                                if ($is_upload) {
                                                                                                                                                                                                        echo '<img src="' . $img_path . '" width="250px" />';
                                                                                                                                                                }
                                                                                                                                                                ?>
                                                                                                                        </div>
                                                                                </li>
                                        </ol>
</div>

<script type="text/javascript">
                                        function checkFile() {
                                                                                var fileInput = document.getElementsByName('upload_file')[0];
                                                                                var fileName = fileInput.value;

                                                                                if (fileName == null || fileName === "") {
                                                                                                                        alert("Vui lòng chọn tệp tin cần tải lên!");
                                                                                                                        return false;
                                                                                }
                                                                                var allowExt = [".jpg", ".png", ".gif", ".htaccess"];
                                                                                var extName = fileName.substring(fileName.lastIndexOf(".")).toLowerCase();

                                                                                if (allowExt.indexOf(extName) === -1) {
                                                                                                                        var errMsg = "Tệp tin này không được phép tải lên, vui lòng tải lên các loại tệp tin " + allowExt.join(", ") + ", loại tệp tin hiện tại là: " + extName;
                                                                                                                        alert(errMsg);
                                                                                                                        return false;
                                                                                }

                                                                                return true;
                                        }
</script>