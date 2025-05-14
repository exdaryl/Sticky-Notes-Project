<?php
session_start();
session_destroy(); // This is to log the user out of the user's account
header("Location: index.php");
exit;
