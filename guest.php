<?php

$page = isset($_GET['page']) ? $_GET['page'] : 'app/includes/guest/guest_premium.php';

if ($page !== "") {
                                        $filePath = $page;
                                        if (file_exists($filePath)) {

                                                                                include($filePath);
                                        } else {
                                                                                echo 'File not found.';
                                        }
} else {
                                        echo 'Invalid page parameter.';
}
