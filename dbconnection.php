<?php
/*
* Project Name: Pizza House
* Developed by Fowzia Abida
*/
$host = "pgsql.hrz.tu-chemnitz.de";
$port = "5432"; 
$databaseName = "db_nmdb";
$userName = "db_nmdb_rw";
$password = "Aec0Mia7m";

$db_handle = pg_connect("host=" . $host . " port=" . $port . " dbname=" . $databaseName . " user=" . $userName . " password=" . $password) or die("Die Verbindung konnte nicht aufgebaut werden.");
// if(pg_connection_status($db_handle) === PGSQL_CONNECTION_OK)
// {
//   echo "The connection to the database has been established.<br/>\r\n";
//   var_dump($db_handle);
// }
?>