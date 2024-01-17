<?php
include_once "../../app/config/db.php";
?>
<?php
function createUser($username, $password, $email)
{
    global $conn;

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (username, password, email) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $hashedPassword, $email);

    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
    $stmt->close();
}

function updateUser($userID, $newUsername, $newEmail)
{
    global $conn;

    $stmt = $conn->prepare("UPDATE users SET username = ?, email = ? WHERE id = ?");
    $stmt->bind_param("ssi", $newUsername, $newEmail, $userID);

    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
    $stmt->close();
}

function deleteUser($userID)
{
    global $conn;

    $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
    $stmt->bind_param("i", $userID);

    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
    $stmt->close();
}
if (isset($_GET['delete_id'])) {
    $count = deleteUser($_GET['delete_id']);
    $_SESSION['type'] = "success";
    header("Location: manage_user.php");
}
if (isset($_GET['edit_id'])) {
    $count = getUserById($_GET['edit_id']);
    header('Content-Type: application/json');
    echo json_encode($count);
    return $count;
}
?>
