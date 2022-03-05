<?php
/*
* Project Name: Film Suggestion Database (FSDB)
* Developed by Meshu Deb Nath
*/
require '../dbconnection.php';

$user_id = '';
if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];
}
pg_query($db_handle, "SELECT remove_user('{$user_id}')");
header("Location: ../user/");

?>
