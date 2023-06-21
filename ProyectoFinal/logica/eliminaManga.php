<?php
    require 'conexion.php';
    session_start();
    if(isset($_SESSION['user']) && isset($_SESSION['rol'])){
        $user = $_SESSION['user'];
        $rol = $_SESSION['rol'];
    }

    if(isset($_GET['id_C'])){
        $delete = "DELETE FROM catalogo WHERE id_manga =".$_GET['id_C'];
        try{
            $query = mysqli_query($conexion, $delete);
            header("Location: http://localhost/EjerciciosPHP/ProyectoFinal/VerMangas.php?Simon");
        }catch(Exception $e){
            header("Location: http://localhost/EjerciciosPHP/ProyectoFinal/VerMangas.php?Nosepudo");
        }
    }
    
?>