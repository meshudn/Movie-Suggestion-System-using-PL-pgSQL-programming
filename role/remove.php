<?php
/*
* Project Name: Film Suggestion Database (FSDB)
* Developed by Meshu Deb Nath
*/
require '../dbconnection.php';

$role_id = '';
if (isset($_GET['id'])) {
    $role_id = $_GET['id'];
}
pg_query($db_handle, "SELECT remove_role('{$role_id}')");
header("Location: ../role/");

?>
