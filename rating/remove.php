<?php
/*
* Project Name: Film Suggestion Database (FSDB)
* Developed by Meshu Deb Nath
*/
require '../dbconnection.php';

$rating_id = '';
if (isset($_GET['id'])) {
    $rating_id = $_GET['id'];
}

pg_query($db_handle, "SELECT remove_rating('{$rating_id}')");
header("Location: ../rating/");

?>
