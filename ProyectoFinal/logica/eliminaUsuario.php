<?php
    require 'conexion.php';
    session_start();
    if(isset($_SESSION['user']) && isset($_SESSION['rol'])){
        $user = $_SESSION['user'];
        $rol = $_SESSION['rol'];
    }

    $consulta1 = "SELECT * FROM usuarios WHERE usuario ='".$user."'";
    $query1 = mysqli_query($conexion, $consulta1);
    $row1 = mysqli_fetch_array($query1);


    $delete = "DELETE FROM usuarios WHERE usuario ='".$user."'";
    $delete2 = "DELETE FROM favoritos WHERE id = ".$row1['id'];
    try{
        $query = mysqli_query($conexion, $delete);
        $query = mysqli_query($conexion, $delete2);
        header("Location: http://localhost/EjerciciosPHP/ProyectoFinal/PaginaPrincipal.php");
    }catch(Exception $e){
        header("Location: http://localhost/EjerciciosPHP/ProyectoFinal/PaginaPrincipal.php?error=No se pudo");
    }
    session_destroy();
?>