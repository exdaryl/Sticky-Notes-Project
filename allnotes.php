<?php
session_start();
if (!isset($_SESSION['is_logged_in'])) {
    $_SESSION['error'] = "Error: Unauthorised access. Please login.";
    header("Location: signin.php");
    exit;
}

require_once('include/header.php'); // To include the header in the page

require_once('database.php');

$limit = 10; // Number of notes per page
$page = isset($_GET['page']) ? $_GET['page'] : 1; // Current page number, default is 1
$start = ($page - 1) * $limit; // Calculate the starting index for the query

$mysqli = open_database();

$notes = get_notes_page($mysqli, $_SESSION['user_id'], $start, $limit); // To call the function from database.php

$total_notes = count_notes($mysqli, $_SESSION['user_id']);

$total_pages = ceil($total_notes / $limit);

close_database($mysqli);
?>
<!-- This is the All Notes page where all the notes that the user saved will be showned here -->
<div class="container-lg">
    <table class="table table-hover table align-middle table-primary mt-3 caption-top table-bordered mt-5 mb-5">
        <caption class="mt-3">List of all notes.</caption>
        <thead>
            <tr class="table-primary text">
                <td class="text-center fw-bold">No.</td>
                <td class="text-center fw-bold">Content</td>
                <td class="text-center fw-bold">Created</td>
                <td colspan="3" class="text-center fw-bold">Modify</td>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php
            $count = ($page - 1) * $limit + 1;
            foreach ($notes as $note) {
                echo "<tr>";
                echo "<td class='text-center'>" . $count . "</td>";
                echo "<td>{$note['content']}</td>";
                echo "<td class='text-center'>" . date('g:i A d/m/Y ', strtotime($note['timestamp'])) . "</td>";
                echo "<td class='text-center'><a href='updatenote.php?id={$note['id']}' class='btn btn-primary btn-sm'>Edit</a></td>";
                echo "<td class='text-center'><a href=\"delete_note.php?id={$note['id']}\" class=\"btn btn-danger btn-sm\">Delete</a></td>";
                echo "<td class='text-center'>";
                echo "<div class='btn-group' role='group'>";
                echo "<button type='button' class='btn btn-success btn-sm dropdown-toggle' data-bs-toggle='dropdown' aria-expanded='false'>";
                echo "Export";
                echo "</button>";
                echo "<ul class='dropdown-menu'>";
                echo "<li><a class='dropdown-item' href='export_note.php?id={$note['id']}&format=csv'>CSV (Comma-Separated Values)</a></li>";
                echo "<li><a class='dropdown-item' href='export_note.php?id={$note['id']}&format=txt'>TXT (Plain Text)</a></li>";
                echo "</ul>";
                echo "</div>";
                echo "</td>";
                echo "</tr>";
                $count++; // To increment the number of notes
            }
            ?>
        </tbody>
    </table>

    <!-- This is pagination for the All Notes page -->
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item <?php if ($page <= 1) echo 'disabled'; ?>">
                <a class="page-link" href="<?php if ($page > 1) echo 'allnotes.php?page=' . ($page - 1); ?>" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
                <li class="page-item <?php if ($page == $i) echo 'active'; ?>"><a class="page-link" href="allnotes.php?page=<?= $i; ?>"><?= $i; ?></a></li>
            <?php } ?>
            <li class="page-item <?php if ($page >= $total_pages) echo 'disabled'; ?>">
                <a class="page-link" href="<?php if ($page < $total_pages) echo 'allnotes.php?page=' . ($page + 1); ?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
</div>
<?php
require_once('include/footer.php'); // To include the footer in the page
?>