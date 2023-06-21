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
                <h1><a id="logo" href="./PaginaPrincipal.php">MANGA AT HAND</a></h1>
            </div>
        </div>
        <div class="form">
            <br>
            <br>
            <br>
            <form action="./logica/insertaUsuario.php" target="" method="POST" name="Registro">

                <label for="user">Nombre de Usuario</label>
                <input type="text" name="user" id="user" placeholder="Escribe tu nombre de usuario" required/>
                <br>
                <label for="contraseña">Contraseña</label>
                <input type="password" name="contraseña" id="contraseña" placeholder="Escribe tu contraseña" required />
                <br>
                <label for="contraseña2">Repite Contraseña</label>
                <input type ="password" name="contraseña2" id="contraseña2" placeholder="Escribe tu contraseña" required/>
                <br>
                <button type ="submit">Registrase</button>
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