<?php
include_once "../../app/config/db.php";
$users = selectAll();

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
            <main>
               <div class="pt-6 px-4">
                  <div class="mt-4 w-full grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
                     <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
                        <div class="flex items-center">
                           <div class="flex-shrink-0">
                              <span class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">2,340</span>
                              <h3 class="text-base font-normal text-gray-500">New products this week</h3>
                           </div>
                           <div class="ml-5 w-0 flex items-center justify-end flex-1 text-green-500 text-base font-bold">
                              14.6%
                              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                 <path fill-rule="evenodd" d="M5.293 7.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L6.707 7.707a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                              </svg>
                           </div>
                        </div>
                     </div>
                     <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
                        <div class="flex items-center">
                           <div class="flex-shrink-0">
                              <span class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">5,355</span>
                              <h3 class="text-base font-normal text-gray-500">Visitors this week</h3>
                           </div>
                           <div class="ml-5 w-0 flex items-center justify-end flex-1 text-green-500 text-base font-bold">
                              32.9%
                              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                 <path fill-rule="evenodd" d="M5.293 7.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L6.707 7.707a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                              </svg>
                           </div>
                        </div>
                     </div>
                     <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
                        <div class="flex items-center">
                           <div class="flex-shrink-0">
                              <span class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">385</span>
                              <h3 class="text-base font-normal text-gray-500">User signups this week</h3>
                           </div>
                           <div class="ml-5 w-0 flex items-center justify-end flex-1 text-red-500 text-base font-bold">
                              -2.7%
                              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                 <path fill-rule="evenodd" d="M14.707 12.293a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 111.414-1.414L9 14.586V3a1 1 0 012 0v11.586l2.293-2.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                              </svg>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="grid grid-cols-1 2xl:grid-cols-2 xl:gap-4 my-4">
                     <div class="bg-white shadow rounded-lg mb-4 p-4 sm:p-6 h-full">
                        <div class="flex items-center justify-between mb-4">
                           <h3 class="text-xl font-bold leading-none text-gray-900">Latest Customers</h3>
                           <a href="#" class="text-sm font-medium text-cyan-600 hover:bg-gray-100 rounded-lg inline-flex items-center p-2">
                              View all
                           </a>
                        </div>
                        <div class="flow-root">
                           <ul role="list" class="divide-y divide-gray-200">

                              <?php foreach ($users as $key => $user) : ?>

                                 <li class="py-3 sm:py-4">
                                    <div class="flex items-center space-x-4">
                                       <div class="flex-shrink-0">
                                          <img class="h-8 w-8 rounded-full" src="<?php echo $user['avatar']; ?>" alt="Neil image">
                                       </div>
                                       <div class="flex-1 min-w-0">
                                          <p class="text-sm font-medium text-gray-900 truncate">
                                             <?php echo $user['email']; ?>
                                          </p>
                                          <p class="text-sm text-gray-500 truncate">
                                             <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="17727a767e7b57607e7973646372653974787a">[email&#160;protected]</a>
                                          </p>
                                       </div>
                                       <div class="inline-flex items-center text-base font-semibold text-gray-900">
                                          <?php echo $user['role'] === 0 ? "user" : "admin"; ?>
                                       </div>
                                    </div>
                                 </li>
                              <?php endforeach; ?>
                           </ul>
                        </div>
                     </div>
                     <?php include_once "../../app/includes/admin_layout/overview.php"; ?>
                  </div>
               </div>
            </main>
            <?php include_once "../../app/includes/admin_layout/footer.php"; ?>
         </div>
      </div>
      <script async defer src="https://buttons.github.io/buttons.js"></script>
      <script src="https://demo.themesberg.com/windster/app.bundle.js"></script>
   </div>
</body>

</html>