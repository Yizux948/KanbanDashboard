<?php
    function DDBB(){
        $servername = "localhost";
        $database = "kanban";
        $username = "root";
        $password = "";
        // Crear conexion
        $conn = mysqli_connect($servername, $username, $password, $database);
        // Checkear conexion

        //devolver variable        
        return $conn;
    }
?>