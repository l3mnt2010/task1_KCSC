<?php
include_once "../../app/config/db.php";

?>

<?php
if (isset($_GET['edit_user_id_ad'])) {
  $user = getUserById(intval($_GET['edit_user_id_ad']));
  if ($user === null) {
    header("Location : manage_user.php");
  }
}
?>

<?php

if (isset($_POST['edit_user_ad_btn'])) {
  unset($_POST['edit_user_ad_btn']);
  if (
    isset($_POST['user_edit_username']) &&
    isset($_POST['user_edit_password']) &&
    isset($_POST['user_edit_email']) &&
    isset($_POST['user_edit_role']) &&
    isset($_POST['user_edit_avatar'])
  ) {
    $user_create_by_admin = editUserForAdmin(
      intval($_GET['edit_user_id_ad']),
      $_POST['user_edit_username'],
      $_POST['user_edit_password'],
      $_POST['user_edit_email'],
      intval($_POST['user_edit_role']),
      $_POST['user_edit_avatar'],

    );

    if ($user_create_by_admin !== false) {
      $_SESSION['type'] = "success";
      $_SESSION['message'] = "User updated successfully";
      header("Location: manage_user.php");
      exit();
    } else {
      $_SESSION['type'] = "fail";
      $_SESSION['message'] = "User update failed";
    }
  }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <script type="module" src="https://cdn.jsdelivr.net/npm/tw-elements"></script>
  <title>Dashboard</title>
</head>

<body>
  <div>
    <?php include_once "../../app/includes/admin_layout/navbar.php"; ?>
    <div class="flex overflow-hidden bg-white pt-16">
      <?php include_once "../../app/includes/admin_layout/sidebar.php"; ?>
      <div class="bg-gray-900 opacity-50 hidden fixed inset-0 z-10" id="sidebarBackdrop"></div>
      <div id="main-content" class="h-full w-full bg-gray-50 relative overflow-y-auto lg:ml-64">
        <main class="ml-10 mt-10">
          <form method="POST" action="edit_user.php?edit_user_id_ad=<?php echo $_GET['edit_user_id_ad']; ?>" class="">
            <div class="">
              <div class="text-2xl  font-semibold mb-2">
                Now, you editing post have id <?php echo $_GET['edit_user_id_ad']  ?>
              </div>

            </div>

            <div class="mt-4 w-4/6 space-y-4">
              <div class="text-left">
                <label for="user_edit_username" class="block text-gray-500 text-sm font-semibold uppercase">user_edit_username<span class="text-red-500"></span></label>
                <input type="text" value="<?php echo $user['username']; ?>" required="true" name="user_edit_username" id="user_edit_username" class="block w-full py-2 px-3 border text-white border-gray-700 bg-gray-600 rounded focus:border-blue-500 focus:outline-none transition duration-200" />
                <i class="uil uil-at"></i>
              </div>

              <div class="mt-4 text-left">
                <label for="user_edit_password" class="block text-gray-500 text-sm font-semibold uppercase">user_edit_password<span class="text-red-500"></span></label>
                <input type="text" value="<?php echo $user['password']; ?>" required="true" name="user_edit_password" id="user_edit_password" class="block w-full py-2 px-3 border text-white border-gray-700 bg-gray-600 rounded focus:border-blue-500 focus:outline-none transition duration-200" />
                <i class="uil uil-lock-alt"></i>
              </div>
              <div class="mt-4 space-y-4">
                <div class="text-left">
                  <label for="user_edit_email" class="block text-gray-500 text-sm font-semibold uppercase">user_edit_email<span class="text-red-500"></span></label>
                  <input type="email" value="<?php echo $user['email']; ?>" required="true" name="user_edit_email" id="user_edit_email" class="block w-full py-2 px-3 border text-white border-gray-700 bg-gray-600 rounded focus:border-blue-500 focus:outline-none transition duration-200" />
                  <i class="uil uil-at"></i>
                </div>
                <div class="mt-4  space-y-4">
                  <div class="text-left">
                    <label for="user_edit_role" class="block text-gray-500 text-sm font-semibold uppercase">user_edit_role<span class="text-red-500"></span></label>
                    <input value="<?php echo $user['role']; ?>" type="number" required="true" name="user_edit_role" id="user_edit_role" class="block w-full py-2 px-3 border text-white border-gray-700 bg-gray-600 rounded focus:border-blue-500 focus:outline-none transition duration-200" />
                    <i class="uil uil-at"></i>
                  </div>
                  <div class="mt-4 space-y-4">
                    <div class="text-left">
                      <label for="user_edit_avatar" class="block text-gray-500 text-sm font-semibold uppercase">user_edit_avatar<span class="text-red-500"></span></label>
                      <input type="text" value="<?php echo $user['avatar']; ?>" required="true" name="user_edit_avatar" id="user_edit_avatar" class="block w-full py-2 px-3 border text-white border-gray-700 bg-gray-600 rounded focus:border-blue-500 focus:outline-none transition duration-200" />
                      <i class="uil uil-at"></i>
                    </div>
                  </div>

                  <div class="mt-4 flex">
                    <input type="submit" name="edit_user_ad_btn" class="btn bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium uppercase py-2 px-4 rounded transition duration-200 mr-5" value="Edit" />
                    <a class="btn bg-red-600 hover:bg-red-700 text-white text-sm font-medium uppercase py-2 px-4 rounded transition duration-200" href="manage_user.php">Close</a>
                  </div>
          </form>
        </main>
      </div>
    </div>

    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="https://demo.themesberg.com/windster/app.bundle.js"></script>
</body>

</html>