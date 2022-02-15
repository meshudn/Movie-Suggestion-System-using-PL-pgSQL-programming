<?php
/*
* Project Name: Film Suggestion Database (FSDB)
* Developed by Meshu Deb Nath
*/
require '../dbconnection.php';

$genre_id = '';
if (isset($_GET['id'])) {
    $genre_id = $_GET['id'];
}
pg_query($db_handle, "SELECT remove_genre('{$genre_id}')");
header("Location: ../genre/");

?>
