<?php
session_start();
$email            = trim($_POST['email']);
$first_name       = trim($_POST['first_name']);
$last_name        = trim($_POST['last_name']);
$password         = trim($_POST['password']);
$confirmPassword  = trim($_POST['confirmPassword']);

if (empty($email) || empty($first_name) || empty($last_name) || empty($password) || empty($confirmPassword)) { // This is to validate the data to not be able to submit empty fields
  $_SESSION['error'] = "Please fill up all the fields";
  header('Location: signup.php');
  exit;
}

if (strlen($password) < 8) {
  $_SESSION['error'] = "Password must be at least 8 characters long.";
  header('Location: signup.php');
  exit;
}

if ($password !== $confirmPassword) {
  $_SESSION['error'] = "Password did not match!";
  header('Location: signup.php');
  exit;
}

require_once('database.php');
$mysqli = open_database();
if (add_users($mysqli, $first_name, $last_name, $email, $password)) {
  header('Location: signin.php');
  exit;
} else {
  $_SESSION['error'] = "Failed to register!";
  header('Location: signup.php');
  exit;
}
close_database($mysqli);
