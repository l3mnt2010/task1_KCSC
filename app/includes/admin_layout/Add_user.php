<?php

if (isset($_POST['add_post_ad_btn'])) {
  unset($_POST['edit_post_ad_btn']);
  if (
    isset($_POST['user_add_id']) &&
    isset($_POST['topic_add_id']) &&
    isset($_POST['title_edit']) &&
    isset($_POST['publish_add_ad']) &&
    isset($_POST['body_add_ad']) &&
    isset($_POST['introduce_add_ad']) &&
    isset($_POST['image_add_ad'])
  ) {
    var_dump($_POST);
    $post_create_by_admin = createUserForAdmin(
      $_POST['user_add_id'],
      $_POST['topic_add_id'],
      $_POST['title_edit'],
      $_POST['image_add_ad'],
      $_POST['role_add_ad'],
    );

    if ($post_create_by_admin !== false) {
      $_SESSION['type'] = "success";
      $_SESSION['message'] = "Post updated successfully";
      header("Location: manage_post.php");
      exit();
    } else {
      $_SESSION['type'] = "fail";
      $_SESSION['message'] = "Post add failed";
    }
  }
}

?>
<dialog id="userDialog" class='w-1/2 h-max-content bg-gray-800 mx-auto z-10 rounded-xl'>
  <div class="w-full h-full p-5">
    <form action="manage_user.php" method="post" class="">
      <div class="">
        <div class="text-2xl text-white font-semibold mb-2">
          Now, you adding new user
        </div>
      </div>
      <div class="mt-4 w-4/6 space-y-4">
        <div class="text-left">
          <label for="username_ad" class="block text-gray-500 text-sm font-semibold uppercase">Username<span class="text-red-500"></span></label>
          <input type="text" required="true" name="username_ad" id="username_ad" class="block w-full py-2 px-3 border text-white border-gray-700 bg-gray-600 rounded focus:border-blue-500 focus:outline-none transition duration-200" />
          <i class="uil uil-lock-alt"></i>
        </div>
        <div class="text-left">
          <label for="email_ad" class="block text-gray-500 text-sm font-semibold uppercase">Email<span class="text-red-500"></span></label>
          <input type="email" required="true" name="email_ad" id="email_id" class="block w-full py-2 px-3 border text-white border-gray-700 bg-gray-600 rounded focus:border-blue-500 focus:outline-none transition duration-200" />
          <i class="uil uil-at"></i>
        </div>

        <div class="mt-4 text-left">
          <label for="password_ad" class="block text-gray-500 text-sm font-semibold uppercase">Password<span class="text-red-500"></span></label>
          <input type="password" required="true" name="password_ad" id="password_ad" class="block w-full py-2 px-3 border text-white border-gray-700 bg-gray-600 rounded focus:border-blue-500 focus:outline-none transition duration-200" />
          <i class="uil uil-lock-alt"></i>
        </div>
        <div class="text-left">
          <label for="avatar" class="block text-gray-500 text-sm font-semibold uppercase">Avatar<span class="text-red-500"></span></label>
          <input type="text" required="true" name="avatar_ad" id="avatar_ad" value="https://flowbite.com/docs/images/people/profile-picture-2.jpg	" class="block w-full py-2 px-3 border text-white border-gray-700 bg-gray-600 rounded focus:border-blue-500 focus:outline-none transition duration-200" />
          <i class="uil uil-at"></i>
        </div>
        <label for="role_ad" class="block text-gray-500 text-sm font-semibold uppercase">IsAdmin<span class="text-red-500"></span></label>
        <input type="checkbox" name="role_ad" value="1">
      </div>
      <div class="mt-4 flex">
        <input type="submit" name="add_user_ad_btn" class="btn bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium uppercase py-2 px-4 rounded transition duration-200 mr-5" value="Add" />
        <button class="btn bg-red-600 hover:bg-red-700 text-white text-sm font-medium uppercase py-2 px-4 rounded transition duration-200" onclick="close_admin_Dialog()">Close</button>
      </div>
    </form>
  </div>

</dialog>

<script>
  function open_admin_Dialog() {
    var dialog = document.getElementById('userDialog');
    dialog.showModal();
  }

  function close_admin_Dialog() {
    var dialog = document.getElementById('userDialog');
    dialog.close();
  }
</script>