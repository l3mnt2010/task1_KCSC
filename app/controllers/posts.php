<?php

function editPostForAdmin($id, $user_id, $topic_id, $tittle, $image, $body, $introduce, $published)
{
  global $conn;
  $stmt = $conn->prepare("UPDATE users SET user_id = ?, topic_id = ?, tittle = ?, image = ?, body = ? introduce = ? published = ? WHERE id = ?");
  if ($stmt) {
    $stmt->bind_param("iissssii", $user_id, $topic_id, $tittle, $image, $body, $introduce, $published, $id);
    $stmt->execute();
    $id = $stmt->insert_id;
    $stmt->close();
    return $id;
  } else {
    return false;
  }
}

function createPostForAdmin($user_id, $topic_id, $tittle, $image, $body, $introduce, $published)
{
  global $conn;
  $stmt = $conn->prepare("INSERT INTO posts (user_id , topic_id, tittle , image , body ,introduce ,published ) VALUES (?, ?, ?, ?, ?,?, ?)");
  if ($stmt) {
    $stmt->bind_param("iissssi", $user_id, $topic_id, $tittle, $image, $body, $introduce, $published);
    $stmt->execute();
    $id = $stmt->insert_id;
    $stmt->close();
    return $id;
  } else {
    return false;
  }
}

function selectAllPost()
{
  global $conn;

  $sql = "SELECT * FROM posts";
  $stmt = $conn->prepare($sql);

  if (!$stmt) {
    die("Prepare failed: " . $conn->error);
  }

  $stmt->execute();


  $result = $stmt->get_result();

  if ($result) {

    $records = $result->fetch_all(MYSQLI_ASSOC);

    $stmt->close();

    return $records;
  } else {
    die("Execute failed: " . $stmt->error);
  }
}

function getOnePost($id)
{
  global $conn;

  $stmt = $conn->prepare("SELECT * FROM posts WHERE id = ?");
  $stmt->bind_param("i", $id);
  $stmt->execute();

  $result = $stmt->get_result();
  $user = $result->fetch_assoc();

  $stmt->close();

  return $user;
}



$posts = selectAllPost();
