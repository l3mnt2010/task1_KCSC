<?php
session_start();
include_once "./app/controllers/login.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="./assets/css/login.css" />
  <link rel="stylesheet" href="./assets/css/candles.css" />
  <title>Discord Clone</title>
</head>

<body class="bg-no-repeat font-whitney h-screen w-screen text-optimizeLegibility select-none">
  <canvas id="svgBlob" class="absolute top-0 w-full h-full bg-transparent transition duration-1000" style="pointer-events: none"></canvas>
  <div class="flex items-center justify-center h-screen w-screen">
    <form action="login.php" method="POST" class="w-1/2 h-1/2 bg-gray-800 bg-opacity-90 rounded-md flex p-5">
      <div class="w-1/2 h-full">
        <div class="text-center">
          <div class="text-white text-4xl font-semibold mb-2">
            Welcome back!
          </div>
          <div class="text-gray-400 text-lg">
            We're so excited to see you again!
          </div>
        </div>

        <div class="mt-8 space-y-4">
          <div class="text-left">
            <label for="email_login" class="block text-gray-500 text-sm font-semibold uppercase">Email<span class="text-red-500"></span></label>
            <input type="email" name="email_login" id="email_login" class="block w-full py-2 px-3 border text-white border-gray-700 bg-gray-600 rounded focus:border-blue-500 focus:outline-none transition duration-200" />
            <i class="uil uil-at"></i>
          </div>

          <div class="mt-4 text-left">
            <label for="password_login" class="block text-gray-500 text-sm font-semibold uppercase">Password<span class="text-red-500"></span></label>
            <input type="password_login" name="password_login" id="password_login" class="block w-full py-2 px-3 border text-white border-gray-700 bg-gray-600 rounded focus:border-blue-500 focus:outline-none transition duration-200" />
            <i class="uil uil-lock-alt"></i>
          </div>

        </div>
        <div class="mt-4">
          <input type="checkbox" name="remember" value="remember" /><span class="text-blue-500 ml-2">Remember me</span>
        </div>
        <div class="mt-4">
          <a href="#" class="text-blue-500">Forgot your password?</a>
        </div>
        <?php if (isset($errors) && count($errors) > 0) : ?>
          <div class="p-2 mb-1 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
            <ul class="list-disc list-inside">
              <?php foreach ($errors as $errorMsg) : ?>
                <li><?= htmlspecialchars($errorMsg); ?></li>
              <?php endforeach; ?>
              <?php
              unset($errors);
              ?>
            </ul>
          </div>
        <?php endif; ?>

        <div class="mt-4">
          <input type="submit" name="login_btn" class="btn bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium uppercase py-2 px-4 rounded transition duration-200" value="Login" />
        </div>
      </div>

      <div class="w-1/2 relative h-full">
        <div id="candle_body" class="w-full h-[100%]">
          <div class="wrapper">
            <div class="candles">
              <div class="light__wave"></div>
              <div class="candle1">
                <div class="candle1__body">
                  <div class="candle1__eyes">
                    <span class="candle1__eyes-one"></span>
                    <span class="candle1__eyes-two"></span>
                  </div>
                  <div class="candle1__mouth"></div>
                </div>
                <div class="candle1__stick"></div>
              </div>

              <div class="candle2">
                <div class="candle2__body">
                  <div class="candle2__eyes">
                    <div class="candle2__eyes-one"></div>
                    <div class="candle2__eyes-two"></div>
                  </div>
                </div>
                <div class="candle2__stick"></div>
              </div>
              <div class="candle2__fire"></div>
              <div class="sparkles-one"></div>
              <div class="sparkles-two"></div>
              <div class="candle__smoke-one"></div>
              <div class="candle__smoke-two"></div>
            </div>
            <div class="floor"></div>
          </div>
        </div>
        <div class="absolute text-white bottom-0 left-1/4">
          Not have account ?
          <span class="text-blue-500"><a href="register.php">Register</a></span>
        </div>
      </div>
    </form>
  </div>
</body>

<script src="./assets/js/candle.js"></script>

</html>