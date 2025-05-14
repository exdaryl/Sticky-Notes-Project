<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'your_db_username');
define('DB_PASS', 'your_db_password');
define('DB_NAME', 'stickynotes');

mysqli_report(MYSQLI_REPORT_OFF);

function open_database()
{
  return @new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
}

function close_database($mysqli)
{
  if ($mysqli->connect_error) {
    return;
  }
  $mysqli->close();
}

// This function is to add users into the database 
function add_users($mysqli, $first_name, $last_name, $email, $password)
{
  $is_added = FALSE;
  $sql = "INSERT INTO `users`(`first_name`, `last_name`, `email`, `password`) VALUES (?, ?, ?, ?)";

  $stmt = $mysqli->prepare($sql);
  $stmt->bind_param('ssss', $first_name, $last_name, $email, $password);
  $stmt->execute();
  $is_added = $stmt->affected_rows > 0;
  $stmt->close();

  return $is_added;
}

function add_note($mysqli, $user_id, $content)
{
  $is_added = FALSE;
  $sql = "INSERT INTO `notes`(`user_id`, `content`, `timestamp`) VALUES (?, ?, NOW())";

  $stmt = $mysqli->prepare($sql);
  $stmt->bind_param('is', $user_id, $content);
  $stmt->execute();
  $is_added = $stmt->affected_rows > 0;
  $stmt->close();

  return $is_added;
}

function get_user($mysqli, $email, $password)
{
  $sql = "SELECT `id`, `email`, `password`, `first_name`, `last_name` FROM `users` WHERE `email` = ? AND `password` = ?";

  $stmt = $mysqli->prepare($sql);
  $stmt->bind_param('ss', $email, $password);
  $stmt->execute();
  $result = $stmt->get_result();
  $user = $result->fetch_all(MYSQLI_ASSOC);
  $result->free();
  $stmt->close();

  return $user;
}

function get_notes($mysqli, $user_id)
{
  $sql = "SELECT `id`, `user_id`, `content`, `timestamp` FROM `notes` WHERE `user_id` = ? ORDER BY `id` DESC";

  $stmt  = mysqli_prepare($mysqli, $sql);

  $stmt->bind_param('i', $user_id);
  $stmt->execute();
  $result = $stmt->get_result();
  $notes = $result->fetch_all(MYSQLI_ASSOC);
  $result->free();
  $stmt->close();

  return $notes;
}

function delete_note($mysqli, $id)
{
  $sql = "DELETE FROM `notes` WHERE `id` = ?";
  $stmt = $mysqli->prepare($sql);
  $stmt->bind_param('i', $id);
  $stmt->execute();
  $stmt->close();
}

function update_note($mysqli, $user_id, $content, $note_id)
{
  $sql = "UPDATE `notes` SET `content` = ? WHERE `user_id` = ? AND `id` = ?";
  $stmt = mysqli_prepare($mysqli, $sql);
  $stmt->bind_param('sii', $content, $user_id, $note_id);
  $stmt->execute();
  $stmt->close();
}

function get_note_by_id($mysqli, $note_id)
{
  $sql = "SELECT `id`, `user_id`, `content`, `timestamp` FROM `notes` WHERE `id` = ?";

  $stmt = mysqli_prepare($mysqli, $sql);
  $stmt->bind_param('i', $note_id);
  $stmt->execute();
  $result = $stmt->get_result();
  $note = $result->fetch_assoc();
  $stmt->close();

  return $note;
}

function update_pass($mysqli, $password, $id)
{
  $sql = "UPDATE `users` SET `password` = ? WHERE `id` = ?";

  $stmt = mysqli_prepare($mysqli, $sql);
  $stmt->bind_param('si', $password, $id);
  $stmt->execute();
  $stmt->close();
}

function get_pass_by_id($mysqli, $id)
{
  $sql = "SELECT `password` FROM `users` WHERE `id` = ?";

  $stmt = mysqli_prepare($mysqli, $sql);
  $stmt->bind_param('i', $id);
  $stmt->execute();
  $result = $stmt->get_result();
  $note = $result->fetch_assoc();
  $stmt->close();

  return $note;
}

// This function is to export the notes that the user has created
function array_to_csv($array, $filename = "export.csv", $delimiter = ",")
{
  header('Content-Type: application/csv');
  header('Content-Disposition: attachment; filename="' . $filename . '";');

  $fp = fopen('php://output', 'w');
  foreach ($array as $row) {
    fputcsv($fp, $row, $delimiter);
  }
  fclose($fp);
}

function get_notes_page($mysqli, $user_id, $start, $limit)
{
  $sql = "SELECT * FROM `notes` WHERE `user_id` = ? ORDER BY `timestamp` DESC LIMIT ?, ?";
  $stmt = mysqli_prepare($mysqli, $sql);
  $stmt->bind_param('iii', $user_id, $start, $limit);
  $stmt->execute();
  $result = $stmt->get_result();
  $notes = [];
  while ($row = $result->fetch_assoc()) {
    $notes[] = $row;
  }
  $stmt->close();
  return $notes;
}

function count_notes($mysqli, $user_id)
{
  $sql = "SELECT COUNT(*) as count FROM `notes` WHERE `user_id` = ?";

  $stmt = mysqli_prepare($mysqli, $sql);
  $stmt->bind_param('i', $user_id);
  $stmt->execute();
  $result = $stmt->get_result();
  $count = $result->fetch_assoc()['count'];
  $stmt->close();

  return $count;
}
