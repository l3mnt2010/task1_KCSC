<?php
include("app/classes/User.php");
include("app/classes/Utils.php");
?>

<?php

// function userOnly($redirect =  'index.php')
// {
//                                         if (empty($_SESSION['id'])) {
//                                                                                 $_SESSION['message'] = 'You must to login first';
//                                                                                 $_SESSION['type'] = 'error';
//                                                                                 header("Location: " . $redirect);
//                                                                                 exit(0);
//                                         }
// }


// function adminOnly($redirect = 'index.php')
// {
//                                         if (empty($_SESSION['id']) || empty($_SESSION['admin'])) {
//                                                                                 $_SESSION['message'] = 'You are not authorization';
//                                                                                 $_SESSION['type'] = 'error';
//                                                                                 header("Location: " . $redirect);
//                                                                                 exit(0);
//                                         }
// }

// function guestOnly($redirect = 'index.php')
// {
//                                         if (empty($_SESSION['id']) || empty($_SESSION['admin'])) {
//                                                                                 $_SESSION['message'] = 'You are not authorization';
//                                                                                 $_SESSION['type'] = 'error';
//                                                                                 header("Location: " . $redirect);
//                                                                                 exit(0);
//                                         }
// }




if (isset($_COOKIE["user_remember"])) {
                                        $base64Encoded = $_COOKIE["user_remember"];
                                        $serializedUser = base64_decode($base64Encoded);
                                        $user_remember = unserialize($serializedUser);
                                        if (is_object($user_remember)) {
                                                                                $_SESSION['id'] = $user_remember->getId();;
                                                                                $_SESSION['email'] = $user_remember->getEmail();
                                                                                $_SESSION['username'] = $user_remember->getName();
                                                                                $_SESSION['admin'] = $user_remember->getRole();

                                                                                if (null !== $user_remember->getRole()) {
                                                                                                                        $title_user = "Welcome back";
                                                                                                                        $msg_user = "Hello, " . $user_remember->getName();
                                                                                                                        header("Location: ../../index.php");
                                                                                                                        exit();
                                                                                } else {
                                                                                                                        $title = "Don't hack me";
                                                                                                                        $msg = "Access denied. You are not a user.";
                                                                                }
                                        } else {
                                                                                $title = "Invalid user object";
                                                                                $msg = "The user object retrieved from the cookie is not valid.";
                                        }
} else {
                                        $title = "Something's wrong!!!";
                                        $msg = "No remember data found";
}
