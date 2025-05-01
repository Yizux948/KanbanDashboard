<?php
session_start();
require_once("database.php");
$conn = DDBB();

$data = [
    date("Y-m-d H:i:s"),
    $_POST["mod"],
    $_POST["tiem"],
    $_POST["tit"],
    $_POST["dsc"],
    $_POST["persona"]
];



$sql = "INSERT INTO t_prioritarias(f_h, modl, tiempo, tit, dsc, status, persona) VALUES ('$data[0]', '$data[1]', '$data[2]', '$data[3]', '$data[4]', '1', '$data[5]')";

if(mysqli_query($conn, $sql)){
    $_SESSION["check"] = true;
}else{
    $_SESSION["check"] = false;
}

header("Location: ../../index.php");

?>