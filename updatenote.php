<?php
session_start();
if (!isset($_SESSION['is_logged_in'])) {
    $_SESSION['error'] = "Error: Unauthorized access. Please login.";
    header("Location: signin.php");
    exit;
}
include_once("include/header.php");

require_once('database.php');
$mysqli = open_database();

if (isset($_GET['id'])) { // This is to update the notes
    $note_id = $_GET['id'];
    $note = get_note_by_id($mysqli, $note_id);

    if ($note && $note['user_id'] == $_SESSION['user_id']) {

        // This is the Update Note page.
        echo "<div class='container-lg'>";
        echo "<div class='row justify-content-center mt-5'>";
        echo "<div class='col-5'>";
        echo "<div class='card mt-5'>";
        echo "<div class='card-body'>";
        echo "<form method='POST' action='doupdatenote.php'>";
        echo "<input type='hidden' name='note_id' value='{$note['id']}'>";
        echo "<label for='exampleFormControlTextarea1' class='form-label note-title' data-label='1'>Edit Note</label>";
        echo "<textarea data-textarea='1' class='form-control' name='content' id='content' rows='5'>{$note['content']}</textarea>";
        echo "<div id='count'>";
        echo "<span id='current_count'>0</span> / <span id='maximum_count'>150</span> characters";
        echo "</div>";
        echo "<button type='submit' class='btn btn-primary btn-sm my-2'>Save</button>";
        echo "</form>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
    } else {
        echo "Error: Note not found or you do not have permission to edit this note.";
    }
} else {
    echo "Error: Invalid request.";
}

close_database($mysqli);
require_once('include/footer.php');
