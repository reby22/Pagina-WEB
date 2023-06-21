<?php 
    session_start();
    if(isset($_SESSION['user']) && isset($_SESSION['rol'])){
        header("Location: http://localhost/EjerciciosPHP/ProyectoFinal/Login.php");
        return;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style4.css">
</head>
<body>
    <div class="contenedorPrincipal">
        <div class="Encabezado">
            <div class="titulo">
                <h1><a href="./PaginaPrincipal.php">MANGA AT HAND</a></h1>
            </div>
        </div>
        <br>
        <br>
        <br>
        <form action="./logica/login.php" target="" method="POST" name="Ingresar">
            <label for="user">Nombre de Usuario</label>
            <input type="text" name="user" id="user" placeholder="Escribe tu nombre" required/>
            <br>
            <label for="contraseña">Contraseña</label>
            <input type ="password" name="contraseña" id="contraseña" placeholder="Escribe tu contraseña" required/>
            <br>
            <button type ="submit">Ingresar</button>
            <br>
            <button type="submit" onclick="window.location.href='./Register.php'" >Registrarse</button>
            <br>
            <?php
                if(isset($_GET['error'])){
                    echo "<span>". $_GET['error']."</span>";
                }
            ?>
        </form>
        </div>
    </div>
</body>
</html>