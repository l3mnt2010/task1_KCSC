<?php
include_once "../../app/config/db.php";
include_once "../../app/controllers/posts.php";
include_once "../../middleware.php";
// adminOnly();
?>

<?php
if (isset($_GET['edit_id_ad'])) {
  $post = getOnePost($_GET['edit_id_ad']);
  if ($post === null) {
    header("Location : manage_post.php");
  }
}
?>

<?php

if (isset($_POST['edit_post_ad_btn'])) {
  unset($_POST['edit_post_ad_btn']);
  if (
    isset($_POST['user_edit_id']) &&
    isset($_POST['topic_edit_id']) &&
    isset($_POST['title_edit']) &&
    isset($_POST['publish_edit_ad']) &&
    isset($_POST['body_edit_ad']) &&
    isset($_POST['introduce_edit_ad']) &&
    isset($_POST['image_edit_ad'])
  ) {
    var_dump($_POST);
    $post_create_by_admin = editPostForAdmin(
      intval($_GET['edit_id_ad']),
      intval($_POST['user_edit_id']),
      intval($_POST['topic_edit_id']),
      intval($_POST['title_edit']),
      $_POST['image_edit_ad'],
      $_POST['body_edit_ad'],
      $_POST['introduce_edit_ad'],
      intval($_POST['publish_edit_ad'])
    );

    if ($post_create_by_admin !== false) {
      $_SESSION['type'] = "success";
      $_SESSION['message'] = "Post updated successfully";
      header("Location: manage_post.php");
      exit();
    } else {
      $_SESSION['type'] = "fail";
      $_SESSION['message'] = "Post update failed";
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
          <form method="POST" action="edit_post.php?edit_id_ad=<?php echo $_GET['edit_id_ad']  ?>" class="">
            <div class="">
              <div class="text-2xl  font-semibold mb-2">
                Now, you editing post have id <?php echo $_GET['edit_id_ad']  ?>
              </div>

            </div>

            <div class="mt-4 w-4/6 space-y-4">
              <div class="text-left">
                <label for="user_edit_id" class="block text-gray-500 text-sm font-semibold uppercase">user_edit_id<span class="text-red-500"></span></label>
                <input type="number" value="<?php echo $post['user_id']; ?>" required="true" name="user_edit_id" id="user_edit_id" class="block w-full py-2 px-3 border text-white border-gray-700 bg-gray-600 rounded focus:border-blue-500 focus:outline-none transition duration-200" />
                <i class="uil uil-at"></i>
              </div>

              <div class="mt-4 text-left">
                <label for="topic_edit_id" class="block text-gray-500 text-sm font-semibold uppercase">topic_edit_id<span class="text-red-500"></span></label>
                <input type="number" value="<?php echo $post['topic_id']; ?>" required="true" name="topic_edit_id" id="topic_edit_id" class="block w-full py-2 px-3 border text-white border-gray-700 bg-gray-600 rounded focus:border-blue-500 focus:outline-none transition duration-200" />
                <i class="uil uil-lock-alt"></i>
              </div>
              <div class="mt-4 space-y-4">
                <div class="text-left">
                  <label for="title_edit" class="block text-gray-500 text-sm font-semibold uppercase">title_edit<span class="text-red-500"></span></label>
                  <input type="text" value="<?php echo $post['tittle']; ?>" required="true" name="title_edit" id="title_edit" class="block w-full py-2 px-3 border text-white border-gray-700 bg-gray-600 rounded focus:border-blue-500 focus:outline-none transition duration-200" />
                  <i class="uil uil-at"></i>
                </div>
                <div class="mt-4  space-y-4">
                  <div class="text-left">
                    <label for="publish_edit_ad" class="block text-gray-500 text-sm font-semibold uppercase">publish_edit_ad<span class="text-red-500"></span></label>
                    <input value="<?php echo $post['published']; ?>" type="number" required="true" name="publish_edit_ad" id="publish_edit_ad" class="block w-full py-2 px-3 border text-white border-gray-700 bg-gray-600 rounded focus:border-blue-500 focus:outline-none transition duration-200" />
                    <i class="uil uil-at"></i>
                  </div>
                  <div class="mt-4 space-y-4">
                    <div class="text-left">
                      <label for="body_edit_ad" class="block text-gray-500 text-sm font-semibold uppercase">body_edit_ad<span class="text-red-500"></span></label>
                      <input type="text" value="<?php echo $post['body']; ?>" required="true" name="body_edit_ad" id="body_edit_ad" class="block w-full py-2 px-3 border text-white border-gray-700 bg-gray-600 rounded focus:border-blue-500 focus:outline-none transition duration-200" />
                      <i class="uil uil-at"></i>
                    </div>
                    <div class="text-left">
                      <label for="introduce_edit_ad" class="block text-gray-500 text-sm font-semibold uppercase">introduce_edit_ad<span class="text-red-500"></span></label>
                      <input type="text" value="<?php echo $post['introduce']; ?>" required="true" name="introduce_edit_ad" id="introduce_edit_ad" class="block w-full py-2 px-3 border text-white border-gray-700 bg-gray-600 rounded focus:border-blue-500 focus:outline-none transition duration-200" />
                      <i class="uil uil-at"></i>
                    </div>
                    <div class="text-left">
                      <label for="image_edit_ad" class="block text-gray-500 text-sm font-semibold uppercase">Image_edit_ad<span class="text-red-500"></span></label>
                      <input type="text" value="<?php echo $post['image']; ?>" required="true" name="image_edit_ad" id="introduce_edit_ad" class="block w-full py-2 px-3 border text-white border-gray-700 bg-gray-600 rounded focus:border-blue-500 focus:outline-none transition duration-200" />
                      <i class="uil uil-at"></i>
                    </div>
                  </div>

                  <div class="mt-4 flex">
                    <input type="submit" name="edit_post_ad_btn" class="btn bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium uppercase py-2 px-4 rounded transition duration-200 mr-5" value="Edit" />
                    <a class="btn bg-red-600 hover:bg-red-700 text-white text-sm font-medium uppercase py-2 px-4 rounded transition duration-200" href="manage_post.php">Close</a>
                  </div>
          </form>
        </main>
      </div>
    </div>

    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="https://demo.themesberg.com/windster/app.bundle.js"></script>
</body>

</html>