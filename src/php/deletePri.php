<?php
session_start();
require_once("database.php");
$conn = DDBB();

$id = $_GET["id"];


$sql = "DELETE FROM t_prioritarias WHERE id_priori = '$id'";

if(mysqli_query($conn, $sql)){
    $_SESSION["check"] = true;
}else{
    $_SESSION["check"] = false;
}

header("Location: ../../index.php");

?>