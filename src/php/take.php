<?php
session_start();
require_once("database.php");
$conn = DDBB();


$id = $_GET["id"];
$f_h = date("Y-m-d H:i:s");
$persona = $_GET["persona"];

$sql = "UPDATE t_prioritarias SET status=2 WHERE id_priori = '$id'";
$sql2= "INSERT INTO t_pro(id_pro, f_h_p, persona_pro) VALUES ('$id', '$f_h', '$persona')";


if(mysqli_query($conn, $sql) && mysqli_query($conn, $sql2)){
    $_SESSION["check"] = true;
}else{
    $_SESSION["check"] = false;
}



header("Location: ../../index.php");
?>