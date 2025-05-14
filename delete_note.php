<?php // This will delete a note in All Note page
$id = $_GET['id'];

require_once('database.php');
$mysqli = open_database();
delete_note($mysqli, $id);
close_database($mysqli);

header('Location: allnotes.php');
exit;
