<?php
session_start();
require_once('database.php');
// This is to save a note
if (isset($_POST['content'])) {
    $user_id = $_SESSION['user_id'];
    $content = $_POST['content'];

    if (empty($content)) { // This is to not allow to the user to save an empty note.
        $_SESSION['error'] = "Error: Please type something before saving.";
        header('Location: dashboard.php');
        exit;
    }

    $db = open_database();
    if ($db->connect_error || !add_note($db, $user_id, $content)) {
        $_SESSION['error'] = "Error: Failed to save note, please try again.";
        header('Location: dashboard.php');
        exit;
    }
    close_database($db);

    header("Location: dashboard.php");
    exit;
}
