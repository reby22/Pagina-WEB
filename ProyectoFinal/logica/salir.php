<?php
    session_start();
    session_destroy();
    header("Location: http://localhost/EjerciciosPHP/ProyectoFinal/Login.php");
?>