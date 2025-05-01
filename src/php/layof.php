<?php
session_start();
require_once("database.php");
$conn = DDBB();

$id = $_POST["id"];
$motivo = $_POST["moti"];
$f_h = date("Y-m-d H:i:s");
$persona = $_POST["persona"];

$sql2 = "UPDATE t_prioritarias SET status=0 WHERE id_priori = '$id'";
$sql = "INSERT INTO t_espera(id_tarea, motivo, f_h_e, persona_esp) VALUES ('$id', '$motivo', '$f_h', '$persona')";


if(mysqli_query($conn, $sql) && mysqli_query($conn, $sql2)){
    $_SESSION["check"] = true;
}else{
    $_SESSION["check"] = false;
}



header("Location: ../../index.php");

?>