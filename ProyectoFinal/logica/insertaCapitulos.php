<?php
    require 'conexion.php';
    session_start();
    if(isset($_SESSION['user']) && isset($_SESSION['rol'])){
        $user = $_SESSION['user'];
        $rol = $_SESSION['rol'];
    }

    $id_manga = $_POST['id_M'];
    $id_cap =  $_POST['id'];
    $nombre =  $_POST['nombre'];
    $pdf =  $_POST['pdf']; 

    $insert = "INSERT INTO capitulos (id_manga, nombre_cap, tituloCap, id_capitulo) VALUES(".$id_manga.",'".$pdf."','".$nombre."',".$id_cap.")";
    try{
        $query = mysqli_query($conexion, $insert);
        header("Location: http://localhost/EjerciciosPHP/ProyectoFinal/IngresarCapitulos.php?msg=Se inserto Correctamente");
    }catch(Exception $e){
        header("Location: http://localhost/EjerciciosPHP/ProyectoFinal/IngresarCapitulos.php?msg=Ocurrio un error");
    }
?>