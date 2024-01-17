<?php
if (isset($_POST['add-topic'])){
  unset($_POST['add-topic']);
//  $topic_id = create("");
 $_SESSION['messages'] = "Topics created successfully";
 $_SESSION['type'] = "success";
 header("Location: /app/admin/dashboard.php");
 exit();
}









?>