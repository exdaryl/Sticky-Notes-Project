<?php
session_start();
require_once('database.php');
$mysqli = open_database();

$allowed_formats = ['csv', 'txt'];
$format = isset($_GET['format']) ? $_GET['format'] : null;

if (!in_array($format, $allowed_formats)) {
    echo 'Invalid format';
    exit;
}

$note_id = isset($_GET['id']) ? $_GET['id'] : null;
if (!$note_id) {
    echo 'Note ID not provided';
    exit;
}

$note = get_note_by_id($mysqli, $note_id);

if (!$note) {
    echo 'Note not found';
    exit;
}

switch ($format) {
    case 'csv': // This is to export to CSV
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="note_' . $note_id . '.csv"');
        $output = fopen('php://output', 'w');
        fputcsv($output, array('Content', 'Timestamp'));
        fputcsv($output, array($note['content'], $note['timestamp']));
        fclose($output);
        break;
    case 'txt': // This is to export to TXT file
        header('Content-Type: text/plain');
        header('Content-Disposition: attachment; filename="note_' . $note_id . '.txt"');
        $output = "Content: {$note['content']}\nTimestamp: {$note['timestamp']}\n\n";
        echo $output;
        break;
    default:
        echo 'Invalid format';
        break;
}

close_database($mysqli);
