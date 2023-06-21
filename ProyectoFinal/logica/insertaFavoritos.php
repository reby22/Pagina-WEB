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

    if(isset($_GET['id_M'])){
        
        $insert = "INSERT INTO favoritos (id, id_Manga) VALUES(".$row1['id'].",".$_GET['id_M'].")";
        try{
            $query = mysqli_query($conexion, $insert);
            header("Location: http://localhost/EjerciciosPHP/ProyectoFinal/MangaDorohedoro.php?id=".$_GET['id_M']);
        }catch(Exception $e){
            header("Location: http://localhost/EjerciciosPHP/ProyectoFinal/MangaDorohedoro.php?error=No se pudo");
        }
    }
    
?>