

<!-- The dialog itself -->
<dialog id="myDialog" class ='w-1/2 h-max-content bg-gray-800 mx-auto z-10 rounded-xl'>
<div class="w-full h-full p-5">
         <form class="">
          <div class="">
            <div class="text-2xl text-white font-semibold mb-2">
              Now, you editting user have id
            </div>
          </div>

          <div class="mt-4 w-4/6 space-y-4">
            <div class="text-left">
              <label
                for="email"
                class="block text-gray-500 text-sm font-semibold uppercase"
                >Email<span class="text-red-500"></span
              ></label>
              <input
                type="email"
                required="true"
                name="email"
                id="email"
                class="block w-full py-2 px-3 border text-white border-gray-700 bg-gray-600 rounded focus:border-blue-500 focus:outline-none transition duration-200"
              />
              <i class="uil uil-at"></i>
            </div>

            <div class="mt-4 text-left">
              <label
                for="password"
                class="block text-gray-500 text-sm font-semibold uppercase"
                >Password<span class="text-red-500"></span
              ></label>
              <input
                type="password"
                required="true"
                name="password"
                id="password"
                class="block w-full py-2 px-3 border text-white border-gray-700 bg-gray-600 rounded focus:border-blue-500 focus:outline-none transition duration-200"
              />
              <i class="uil uil-lock-alt"></i>
            </div>
            <div class="text-left">
              <label
                for="email"
                class="block text-gray-500 text-sm font-semibold uppercase"
                >Avatar<span class="text-red-500"></span
              ></label>
              <input
                type="email"
                required="true"
                name="avatar"
                id="avatar"
                class="block w-full py-2 px-3 border text-white border-gray-700 bg-gray-600 rounded focus:border-blue-500 focus:outline-none transition duration-200"
              />
              <i class="uil uil-at"></i>
            </div>

          
          </div>


          <div class="mt-4 flex">
            <input
              type="submit"
              class="btn bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium uppercase py-2 px-4 rounded transition duration-200 mr-5"
              value="Edit"
            />
            <button class="btn bg-red-600 hover:bg-red-700 text-white text-sm font-medium uppercase py-2 px-4 rounded transition duration-200" onclick="closeDialog()">Close</button>
          </div>
          </form>
        </div>

</dialog>

<script>

  function openDialog() {
    var dialog = document.getElementById('myDialog');
    dialog.showModal();
    var userId = dialog.dataset.userId;
    console.log(userId);
    
    // Sử dụng Ajax để gửi yêu cầu đến server và nhận dữ liệu
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
      if (xhr.readyState == 4 && xhr.status == 200) {
        var userData = JSON.parse(xhr.responseText);
        
        // Đặt giá trị nhận được vào các ô input trong form
        document.getElementById('email').value = userData.email;
        document.getElementById('password').value = userData.password;
        document.getElementById('avatar').value = userData.avatar;
      }
    };
    
    // Gửi yêu cầu đến server để lấy dữ liệu
    xhr.open('GET', 'manage_user.php?edit_id=' + userId, true);
    xhr.send();
  }

  function closeDialog() {
    var dialog = document.getElementById('myDialog');
    dialog.close();
  }
</script>

