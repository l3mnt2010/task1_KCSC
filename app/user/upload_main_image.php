<?php
include '../../config.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
                                        <meta charset="UTF-8">
                                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                                        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
</head>



<?php
$is_upload = false;
$msg = null;
if (isset($_POST['submit'])) {
                                        if (file_exists(UPLOAD_PATH)) {
                                                                                if (isset($_POST['upload_name'])) {
                                                                                                                        if ($_POST['upload_name'] === "default") {
                                                                                                                                                                $_POST['upload_name'] = '';
                                                                                                                        }
                                                                                                                        $temp_file = $_FILES['upload_file']['tmp_name'];
                                                                                                                        $img_path = UPLOAD_PATH . '/' . $_POST["upload_name"] . $_FILES['upload_file']['name'];
                                                                                                                        echo $img_path;

                                                                                                                        if (move_uploaded_file($temp_file, $img_path)) {

                                                                                                                                                                // cmd injection                        
                                                                                                                                                                exec("convert $img_path -resize 400x400 $img_path");
                                                                                                                                                                // echo "Success resize";
                                                                                                                                                                $is_upload = true;
                                                                                                                        } else {
                                                                                                                                                                $msg = 'Lỗi！';
                                                                                                                        }
                                                                                } else {
                                                                                                                        $temp_file = $_FILES['upload_file']['tmp_name'];
                                                                                                                        $img_path = UPLOAD_PATH . '/' . $_FILES['upload_file']['name'];


                                                                                                                        if (move_uploaded_file($temp_file, $img_path)) {

                                                                                                                                                                // cmd injection                        
                                                                                                                                                                exec("convert $img_path -resize 400x400 $img_path");
                                                                                                                                                                // echo "Success resize";
                                                                                                                                                                $is_upload = true;
                                                                                                                        } else {
                                                                                                                                                                $msg = 'Lỗi！';
                                                                                                                        }
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
                                                                                                                                                                <input class="hidden" type="text" name="upload_name" value="default" />
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

</html>
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