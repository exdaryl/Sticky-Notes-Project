<?php
session_start();
if (!isset($_SESSION['is_logged_in'])) {
    $_SESSION['error'] = "Error: Unauthorised access. Please login.";
    header("Location: signin.php");
    exit;
}

require_once('database.php');
$mysqli = open_database();


if (isset($_POST['note_id'], $_POST['content'])) {
    $note_id = $_POST['note_id'];
    $content = $_POST['content'];

    $user_id = $_SESSION['user_id'];

    // Get the note from the database
    $note = get_note_by_id($mysqli, $note_id);

    // Check if the note exists and the user is the owner of the note
    if ($note && $note['user_id'] == $_SESSION['user_id']) {
        // Update the note in the database
        update_note($mysqli, $user_id, $content, $note_id);
        $_SESSION['success'] = "Note updated successfully.";
        header("Location: allnotes.php");
        exit;
    } else {
        $_SESSION['error'] = "Error: Note not found or you do not have permission to edit this note.";
        header("Location: allnotes.php");
        exit;
    }
} else {
    $_SESSION['error'] = "Error: Invalid request.";
    header("Location: allnotes.php");
    exit;
}

close_database($mysqli);
