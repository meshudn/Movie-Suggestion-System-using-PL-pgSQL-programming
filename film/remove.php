<?php
/*
* Project Name: Film Suggestion Database (FSDB)
* Developed by Meshu Deb Nath
*/
require '../dbconnection.php';

$film_title = '';
$release_year = '';
if (isset($_GET['title'])) {
    $film_title = $_GET['title'];
}
if (isset($_GET['year'])) {
    $release_year = $_GET['year'];
}

pg_query($db_handle, "SELECT remove_film('{$film_title}','{$release_year}')");
header("Location: ../film/");

?>
