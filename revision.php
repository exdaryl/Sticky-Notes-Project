<?php
//1-92154874455
// Question 1
// List all books less than 200 pages.
// $sql = "SELECT * FROM `books` WHERE `pages` < 200";

// Question 2
// List number of books published every month in year 2020.
// SELECT MONTH(published), COUNT(*) FROM `books` WHERE YEAR(published) = 2020;

// Question 3
// $sql = "SELECT `title` `price` * 15 FROM `books`";
// $stmt = $mysqli->prepare($sql);
// $stmt->execute();
// $result = $stmt->get_result();
// $books = $result->fetch_all(MYSQLI_ASSOC);

// echo "<table>";
// foreach ($books as $book) {
//   echo "<tr><td>", $book["title"], "</td><td>", $book['price'], "</tr>";
// }

?>

<!-- <table>
  <tr>
    <td></td>
  </tr>
</table> -->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <form action="filename.php" method="POST">
    <label for="title">Title</label>
    <input name="title" type="text" id="title">
    <label for="published">Published</label>
    <input name="published" type="text" id="published">
    <label for="year">Year</label>
    <input name="year" type="text" id="year">
    <button type="submit">Submit</button>
  </form>

</body>

</html>

<?php
// filename.php
$title      = $_POST["title"];
$published  = $_POST["published"];
$year       = $_POST["year"];

$sql = "INSERT INTO `books`(`title`, `published`, `year`) VALUES (?, ?, ?)";

$stmt = $mysqli->prepare($sql);
$stmt->bind_param('ssi', $title, $published, $year);
$stmt->execute();

?>

<?php 

$sql = "SELECT `title`, `price` * 1.5 FROM `books`";

?>




<?php
// $sql = "SELECT * FROM `books` WHERE `pages` < 200";
// $stmt = $sqli->prepare($sql);
// $stmt->execute();
// $result = $stmt->get_result();
// $books = $result->fetch_all(MYSQLI_ASSOC);







// $sql = "";
// $stmt = $mysqli->prepare($sql);
?>