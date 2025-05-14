<?php // This shows a message if the user click "Proceed" to forget password
session_start();
if (isset($_POST['email'])) {
  $_SESSION['success'] = 'A confirmation link to reset your password has been sent to your email.';
  header('Location: forgotpass.php');
  exit;
}
