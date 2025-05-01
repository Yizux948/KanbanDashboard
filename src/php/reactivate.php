<?php
session_start();
require_once("database.php");
$conn = DDBB();


$id = $_GET["id"];

$sql2 = "UPDATE t_prioritarias SET status=1 WHERE id_priori = '$id'";
$sql = "DELETE FROM t_espera WHERE id_tarea = $id";


if(mysqli_query($conn, $sql) && mysqli_query($conn, $sql2)){
    $_SESSION["check"] = true;
}else{
    $_SESSION["check"] = false;
}



header("Location: ../../index.php");

?>