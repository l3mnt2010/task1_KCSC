<!DOCTYPE html>
<html lang="en">

<head>
                                        <meta charset="UTF-8">
                                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                                        <title>Document</title>
                                        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
                                        <?php
                                        if (isset($_POST['username']) && $_POST['message']) {
                                                                                $user_say = new User($_POST['username'], $_POST['message']);
                                                                                $user_say->say();
                                        }
                                        ?>
                                        <form action="template_funny.php" method="POST" class="max-w-md mx-auto mt-8">
                                                                                <div class="grid grid-cols-1 gap-6">
                                                                                                                        <label for="username" class="block text-sm font-medium text-gray-700">Your Username:</label>
                                                                                                                        <input name="username" type="text" id="username" class="mt-1 p-2 border rounded-md w-full">

                                                                                                                        <label for="message" class="block text-sm font-medium text-gray-700">Phone:</label>
                                                                                                                        <input name="message" type="text" id="message" class="mt-1 p-2 border rounded-md w-full">

                                                                                                                        <button type="submit" class="bg-blue-500 text-white p-2 rounded-md">Submit</button>
                                                                                </div>
                                        </form>
</body>

</html>

<?php

class getFileSystem
{
                                        public function __wakeup()
                                        {
                                                                                include("flag.php");
                                                                                echo $flag;
                                        }
}

class User
{
                                        public $username;
                                        public $message;
                                        public function __construct($u, $m)
                                        {
                                                                                $this->username = $u;
                                                                                $this->message = $m;
                                        }
                                        public function say()
                                        {
                                                                                echo $this->username . " say: " . $this->message;
                                        }
                                        public function __destruct()
                                        {
                                                                                if ($this->message == "Nonono") {
                                                                                                                        echo "đã gọi";
                                                                                                                        unserialize(base64_decode($this->username));
                                                                                }
                                        }
}
?>