<?php
// Show PHP version
echo "Current PHP version: " . phpversion() . "\r\n";
// Connect to database
$connection = mysqli_connect("localhost","librarian","Today123","LibraryDB") or die("Error " . mysqli_error($connection));
// SQL query
$sql = "SELECT A.ISBN, A.Title,
A.Year, B.FullName
FROM BooksTBL A JOIN AuthorsTBL B
ON A.AuthorID = B.AuthorID;";
$result = mysqli_query($connection, $sql) or die("Error " . mysqli_error($connection));
// Populate an array with the query results
$libraryarray = array();
while($row = mysqli_fetch_assoc($result))
{
$libraryarray[] = $row;
}
// Convert to JSON
echo json_encode($libraryarray);
?>