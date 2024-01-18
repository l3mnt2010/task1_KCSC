<?php
include_once "../../app/config/db.php";
include_once "../../app/controllers/crud_user.php";

$users = selectAll();
?>

<?php
if (isset($_POST['add_user_ad_btn'])) {
   unset($_POST['add_user_ad_btn']);
   $role_id = isset($_POST['role_ad']) ? intval($_POST['role_ad']) : 0;
   if (isset($_POST['username_ad']) && isset($_POST['password_ad']) && isset($_POST['email_ad']) && isset($_POST['avatar_ad'])) {
      var_dump($_POST);
      $user_create_by_admin = createUserForAdmin($_POST['username_ad'], $_POST['password_ad'], $_POST['email_ad'], $role_id, $_POST['avatar_ad']);
      if ($user_create_by_admin !== false) {
         $_SESSION['type'] = "success";
         $_SESSION['message'] = "User created successfully";
         header("Location: manage_user.php");
      } else {
         $_SESSION['type'] = "fail";
         $_SESSION['message'] = "User created failed";
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
   <?php if ((isset($_SESSION['type']) && isset($_SESSION['message']))) : ?>
      <div class="p-2 mb-1 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="success">
         <span class="font-medium"><?php echo  $_SESSION['messages']; ?></span>

      </div>
      <?php unset($_SESSION['type']);
      unset($_SESSION['message']);
      ?>
   <?php endif; ?>
   <div>
      <?php include_once "../../app/includes/admin_layout/navbar.php"; ?>
      <div class="flex overflow-hidden bg-white pt-16">
         <?php include_once "../../app/includes/admin_layout/sidebar.php"; ?>
         <div class="bg-gray-900 opacity-50 hidden fixed inset-0 z-10" id="sidebarBackdrop"></div>
         <div id="main-content" class="h-full w-full bg-gray-50 relative overflow-y-auto lg:ml-64">

            <main>
               <div class="pt-6 px-4">
                  <?php include_once "../../app/includes/admin_layout/Add_user.php"; ?>
                  <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
                     <div class="flex justify-between">
                        <h3 class="text-xl leading-none font-bold text-gray-900 mb-10">Overview user</h3>
                        <button class="btn bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium uppercase py-2 px-4 rounded transition duration-200" onclick="open_admin_Dialog()"> Add users</button>
                     </div>

                     <div class="block w-full overflow-x-auto">
                        <table class="items-center w-full bg-transparent border-collapse">
                           <thead>
                              <tr>
                                 <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Email</th>
                                 <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Role</th>
                                 <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap min-w-140-px">Avatar</th>
                                 <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap min-w-140-px">Edit</th>
                                 <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap min-w-140-px">Delete</th>
                              </tr>
                           </thead>
                           <tbody class="divide-y divide-gray-100">
                              <?php foreach ($users as $key => $user) : ?>
                                 <tr class="text-gray-500">
                                    <th class="border-t-0 align-middle text-sm font-normal whitespace-nowrap p-4 pb-0 text-left"> <?php echo $user['email']; ?></th>
                                    <td class="border-t-0 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4 pb-0"><?php echo $user['role'] === 0 ? "user" : "admin"; ?></td>
                                    <td class="border-t-0 align-middle text-xs whitespace-nowrap p-4 pb-0">
                                       <?php echo $user['avatar']; ?>
                                    </td>
                                    <td class="border-t-0 align-middle text-xs whitespace-nowrap p-4 pb-0">
                                       <a class="btn bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium uppercase py-2 px-4 rounded transition duration-200" href="edit_user.php?edit_user_id_ad=<?php echo $user['id']; ?>"> Edit</a>
                                       <?php include_once "../../app/includes/admin_layout/Dialog.php"; ?>
                                    </td>
                                    <td class="border-t-0 align-middle text-xs whitespace-nowrap p-4 pb-0">
                                       <button class="btn bg-red-600 hover:bg-red-700 text-white text-sm font-medium uppercase py-2 px-4 rounded transition duration-200"> <a href="manage_user.php?delete_id=<?php echo $user['id']; ?>">Delete</a></button>

                                    </td>
                                 </tr>

                              <?php endforeach; ?>

                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </main>

         </div>
      </div>
      <script async defer src="https://buttons.github.io/buttons.js"></script>
      <script src="https://demo.themesberg.com/windster/app.bundle.js"></script>
   </div>
</body>

</html>