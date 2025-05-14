<?php
session_start();
require_once('database.php');

$id = $_SESSION['user_id'];
$oldpassword = $_POST['oldpassword'];
$newpassword = $_POST['newpassword'];
$conpassword = $_POST['conpassword'];

$mysqli = open_database();

$dbpass = get_pass_by_id($mysqli, $id);

if (strlen($newpassword) < 8) { // This to validate the password length.
  $_SESSION['error'] = "Password must be at least 8 characters long.";
  header('Location: changepassword.php');
  exit;
}

if (empty($oldpassword) || empty($newpassword) || empty($conpassword)) { // This is to validate if the fields are not empty
  $_SESSION['error'] = "Please fill up all the fields";
  header('Location: changepassword.php');
  exit;
}

if (trim($oldpassword) == trim($dbpass['password'])) { // This is to trim the password entered and to confirm whether the confirm password
  if ($newpassword == $conpassword) {                  // matches the both fields
    $updatepass = update_pass($mysqli, $newpassword, $id); // This is to update the password
    if ($updatepass !== false) {
      $_SESSION['is_logged_in'] = true;
      $_SESSION['user_id'] = $id;
      $_SESSION['success'] = 'Password has been changed successfully.';
      header('Location: changepassword.php');
      exit;
    } else {
      $_SESSION['error'] = 'Change password failed'; // This will show if the password change fails
      header('Location: changepassword.php');
      exit;
    }
  } else {
    $_SESSION['error'] = 'Error: New password did not match. Please try again'; // This will show that the new password did not match
    header('Location: changepassword.php');
    exit;
  }
} else {
  $_SESSION['error'] = 'Error: Old password is incorrect.'; // This will show an error if the old password doesn't match in the database
  header('Location: changepassword.php');
  exit;
}
close_database($mysqli);
