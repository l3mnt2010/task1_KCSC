<?php
include_once "app/config/db.php";
include_once "app/classes/User.php";
?>

<?php
if (isset($_POST['login_btn'])) {
  unset($_POST['login_btn']);
  $errors = array();
  if (empty($_POST['email_login'])) {
    array_push($errors, "Email is required");
  }
  if (empty($_POST['password_login'])) {
    array_push($errors, "Password is required");
  }
  if (count($errors) === 0) {
    $user_login = getUserByEmail($_POST['email_login']);
    if (isset($user_login)) {
      $_POST['password_login'] = hash('sha256', $_POST['password_login']);
      if ($_POST['password_login'] === $user_login['password']) {
        $_SESSION['id'] = $user_login['id'];
        $_SESSION['email'] = $user_login['email'];
        $_SESSION['username'] = $user_login['username'];
        $_SESSION['admin'] = $user_login['role'];
        $_SESSION['messages'] = "You are now logged in";
        $_SESSION['type'] = "success";
        if (isset($_POST['remember']) && $_POST['remember'] === 'remember') {
          $user_remember = new User_remember($user_login['id'], $user_login['username'], $user_login['email'], $user_login['role']);
          $serializedUser = serialize($user_remember);
          $base64Encoded = base64_encode($serializedUser);
          setcookie("user_remember", $base64Encoded, time() + 3600);
          unset($user_remember);
        }
        unset($user_login);
        header("Location: index.php");
      } else {
        array_push($errors, "Password incorrect");
      }
    } else {
      array_push($errors, "User not exist");
    }
  };
}
