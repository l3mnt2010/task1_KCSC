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
    $post_create_by_admin = createPostForAdmin(
      intval($_POST['user_add_id']),
      intval($_POST['topic_add_id']),
      intval($_POST['title_edit']),
      $_POST['image_add_ad'],
      $_POST['body_add_ad'],
      $_POST['introduce_add_ad'],
      intval($_POST['publish_add_ad'])
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


<dialog id="addDialog" class='w-1/2 h-max-content bg-gray-800 mx-auto z-10 rounded-xl'>
  <div class="w-full h-full p-5">
    <form method="POST" action="manage_post.php" class="">
      <div class="">
        <div class="text-2xl  font-semibold mb-2">
          Now, you new post
        </div>

      </div>

      <div class="mt-4 w-4/6 space-y-4">
        <div class="text-left">
          <label for="user_add_id" class="block text-gray-500 text-sm font-semibold uppercase">user_add_id<span class="text-red-500"></span></label>
          <input type="number" required="true" name="user_add_id" id="user_add_id" class="block w-full py-2 px-3 border text-white border-gray-700 bg-gray-600 rounded focus:border-blue-500 focus:outline-none transition duration-200" />
          <i class="uil uil-at"></i>
        </div>

        <div class="mt-4 text-left">
          <label for="topic_add_id" class="block text-gray-500 text-sm font-semibold uppercase">topic_add_id<span class="text-red-500"></span></label>
          <input type="number" required="true" name="topic_add_id" id="topic_add_id" class="block w-full py-2 px-3 border text-white border-gray-700 bg-gray-600 rounded focus:border-blue-500 focus:outline-none transition duration-200" />
          <i class="uil uil-lock-alt"></i>
        </div>
        <div class="mt-4 space-y-4">
          <div class="text-left">
            <label for="title_edit" class="block text-gray-500 text-sm font-semibold uppercase">title_edit<span class="text-red-500"></span></label>
            <input type="text" required="true" name="title_edit" id="title_edit" class="block w-full py-2 px-3 border text-white border-gray-700 bg-gray-600 rounded focus:border-blue-500 focus:outline-none transition duration-200" />
            <i class="uil uil-at"></i>
          </div>
          <div class="mt-4  space-y-4">
            <div class="text-left">
              <label for="publish_add_ad" class="block text-gray-500 text-sm font-semibold uppercase">publish_add_ad<span class="text-red-500"></span></label>
              <input type="number" required="true" name="publish_add_ad" id="publish_add_ad" class="block w-full py-2 px-3 border text-white border-gray-700 bg-gray-600 rounded focus:border-blue-500 focus:outline-none transition duration-200" />
              <i class="uil uil-at"></i>
            </div>
            <div class="mt-4 space-y-4">
              <div class="text-left">
                <label for="body_add_ad" class="block text-gray-500 text-sm font-semibold uppercase">body_add_ad<span class="text-red-500"></span></label>
                <input type="text" required="true" name="body_add_ad" id="body_add_ad" class="block w-full py-2 px-3 border text-white border-gray-700 bg-gray-600 rounded focus:border-blue-500 focus:outline-none transition duration-200" />
                <i class="uil uil-at"></i>
              </div>
              <div class="text-left">
                <label for="introduce_add_ad" class="block text-gray-500 text-sm font-semibold uppercase">introduce_add_ad<span class="text-red-500"></span></label>
                <input type="text" required="true" name="introduce_add_ad" id="introduce_add_ad" class="block w-full py-2 px-3 border text-white border-gray-700 bg-gray-600 rounded focus:border-blue-500 focus:outline-none transition duration-200" />
                <i class="uil uil-at"></i>
              </div>
              <div class="text-left">
                <label for="image_add_ad" class="block text-gray-500 text-sm font-semibold uppercase">Image_add_ad<span class="text-red-500"></span></label>
                <input type="text" required="true" name="image_add_ad" id="introduce_add_ad" class="block w-full py-2 px-3 border text-white border-gray-700 bg-gray-600 rounded focus:border-blue-500 focus:outline-none transition duration-200" />
                <i class="uil uil-at"></i>
              </div>
            </div>

            <div class="mt-4 flex">
              <input type="submit" name="edit_post_ad_btn" class="btn bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium uppercase py-2 px-4 rounded transition duration-200 mr-5" value="Edit" />
              <button class="btn bg-red-600 hover:bg-red-700 text-white text-sm font-medium uppercase py-2 px-4 rounded transition duration-200" onclick="close_Add_Dialog()">Close</button>
            </div>
    </form>
  </div>

</dialog>

<script>
  function open_Add_Dialog() {
    var dialog = document.getElementById('addDialog');
    dialog.showModal();
  }

  function close_Add_Dialog() {
    var dialog = document.getElementById('addDialog');
    dialog.close();
  }
</script>