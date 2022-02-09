<?php


session_start(); 


require_once("database/database.php");
require_once("utils/funzioni.php");  
$dbh = new DatabaseHelper("localhost", "root", "", "squola", 3307); 


define("UPLOAD_DIR", "./upload/");

?>