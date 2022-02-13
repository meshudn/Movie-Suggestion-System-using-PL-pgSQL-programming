<?php
/*
* Project Name: Film Suggestion Database (FSDB)
* Developed by Meshu Deb Nath
*/
require '../dbconnection.php';

$person_id = '';
$person_name = '';
if (isset($_GET['id'])) {
    $person_id = $_GET['id'];
}
if (isset($_GET['name'])) {
    $person_name = $_GET['name'];
}

pg_query($db_handle, "SELECT remove_film_person('{$person_id}','{$person_name}')");
header("Location: ../film-person/");

?>
