<?php
    require 'conexion.php';
    $user =  $_POST['user'];
    $contraseña =  $_POST['contraseña'];
    $contraseña2 = $_POST['contraseña2'];

    $aux2 = 'false';
    $id = '0';

    while ($aux2 == 'false') {
        $consulta = "SELECT COUNT(*) FROM usuarios WHERE id =".$id;
        $query = mysqli_query($conexion, $consulta);
        $row = mysqli_fetch_array($query);
        if ($row[0] == 0){
            $aux2 = 'true';
        }else{
            $id = $id + 1;
        }
    }
    
    $rol = 'usuario';
    if($contraseña == $contraseña2){
        $insert = "INSERT INTO usuarios (id, usuario, contraseña, rol) VALUES(".$id.",'".$user."','".$contraseña."','".$rol."')";
        try{
            $query = mysqli_query($conexion, $insert);
            header("Location: http://localhost/EjerciciosPHP/ProyectoFinal/Login.php");
        }catch(Exception $e){
            header("Location: http://localhost/EjerciciosPHP/ProyectoFinal/Register.php?error=Nombre de usuario ocupado");
        }
    }else{
        header("Location: http://localhost/EjerciciosPHP/ProyectoFinal/Register.php?error=Las contraseñas no coinciden");
    }
    
?>