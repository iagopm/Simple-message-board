<?php
$database_username = "root";
$database_password = "";
$database_info = "mysql:host=localhost;dbname=db";
try
{
    $PDO = new PDO($database_info, $database_username, $database_password);
}
catch(PDOException $e)
{
}
?>