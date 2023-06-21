
<?php
    require "./conexion.php";

    $user = $_POST['user'];
    $pass = $_POST['contraseña'];
    
    $consulta = "SELECT COUNT(*) as login , rol FROM usuarios WHERE usuario='". $user."' AND contraseña='". $pass ."'";
    $query= mysqli_query($conexion,$consulta);
    $row = mysqli_fetch_array($query);

    session_start();

    if($row['login'] > 0){
        $_SESSION['user'] = $user;
        $_SESSION['rol'] = $row['rol'];
        header("Location: http://localhost/EjerciciosPHP/ProyectoFinal/PaginaPrincipal.php");
    }else{
        header("Location: http://localhost/EjerciciosPHP/ProyectoFinal/Login.php?error=Datos Incorrectos");
    }
?>