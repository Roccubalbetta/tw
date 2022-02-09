<?php
session_start();
unset($_SESSION["idvenditore"]);
unset($_SESSION["passvenditore"]);
unset($_SESSION["uservenditore"]);
unset($_SESSION["idutente"]);
unset($_SESSION["passutente"]);
unset($_SESSION["userutente"]);
header("location: index.php");
?>