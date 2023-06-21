<?php
    require 'conexion.php';
    session_start();
    if(isset($_SESSION['user']) && isset($_SESSION['rol'])){
        $user = $_SESSION['user'];
        $rol = $_SESSION['rol'];
    }

    $id_manga = $_POST['id_M'];
    $nombre_M =  $_POST['nombre_M'];
    $resumen =  $_POST['resumen'];
    $imagen =  $_FILES['imagen']['name']; 
    $imagen_path =  $_FILES['imagen']['tmp_name']; 

    $insert = "INSERT INTO catalogo (id_manga, resumen, Nombre, imagen) VALUES(".$id_manga.",'".$resumen."','".$nombre_M."','".$imagen."')";
    try{
        $query = mysqli_query($conexion, $insert);
        move_uploaded_file($imagen_path,"../assets/".$imagen);
        header("Location: http://localhost/EjerciciosPHP/ProyectoFinal/IngresarCapitulos.php?msg2=Se inserto Correctamente");
    }catch(Exception $e){
        header("Location: http://localhost/EjerciciosPHP/ProyectoFinal/IngresarCapitulos.php?msg2=Ocurrio un error");
    }
?>