<?php
/*
* Project Name: Film Suggestion Database (FSDB)
* Developed by Meshu Deb Nath
*/
require '../dbconnection.php';

$sub_film_id = '';
if (isset($_GET['id'])) {
    $sub_film_id = $_GET['id'];
}
pg_query($db_handle, "SELECT remove_subordinate_film('{$sub_film_id}')");
header("Location: ../subordinate-film/");

?>
