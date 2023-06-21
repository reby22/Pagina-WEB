<?php 
    require './logica/conexion.php';
    session_start();
    if(isset($_SESSION['user']) && isset($_SESSION['rol'])){
        $user = $_SESSION['user'];
        $rol = $_SESSION['rol'];
    }
    $consulta = "SELECT * FROM catalogo";
    $query = mysqli_query($conexion, $consulta);
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style1.css">
</head>
<body>

<div class="contenedorPrincipal">
    <div class="Encabezado">
        <div class="titulo">
            <h1><a id="logo" href="./PaginaPrincipal.php">MANGA AT HAND</a></h1>
        </div>
        <div class="botonesIngresar">
            <?php if(isset($_SESSION['user']) && isset($_SESSION['rol'])){
                if($rol == 'usuario') {?>
                    <button class="BotonIngresar"><a href="./Perfil.php"><?php echo $user ?></a></button>
                    <button class="BotonIngresar"><a href="./logica/salir.php">Salir</a></button>
                    <?php } else if($rol == 'administrador'){ ?>
                    <button class="BotonIngresar"><a id="admin" href="IngresarCapitulos.php"><?php echo $user ?></a></button>
                    <button class="BotonIngresar"><a href="./logica/salir.php">Salir</a></button>
            <?php }} else { ?>
            <button class="BotonIngresar"><a href="./Login.php">Ingresar</a></button>
            <button class="BotonIngresar"><a href="./Register.php">Registrarse</a></button>
            <?php }  ?>
        </div>
    </div>
    <div class="Separacion"></div>
    <div class="Navegacion">
        <div class="imagen"><img src="./assets/fondo.jpg"></div>
    </div>
    <div class="Separacion"></div>
    <div class="contenido">
        <?php while($row = mysqli_fetch_array($query)) {?>
            <div class="manga">
                <div class="mangaDentro">
                <h3><?php echo $row['Nombre'] ?></h3>
                <br>
                <p>
                <?php echo $row['resumen'] ?>
                </p>
                <br>
                <button class="BotonLeer"> <a href="./MangaDorohedoro.php?id=<?php echo $row['id_manga'];?>">Leer</a></button>
            </div>
        </div>
        <?php }?>
        <br>
        <br>
        <br>
        <div class="Review">
            <h1 class="contacto">Contáctanos</h1>
            <button id="contactar" type="button"><a href="https://chat.whatsapp.com/FjTm6AbAmlt02WgJ7SL7Ki"><img src="./assets/WhatsApp.png" height ="90" width="90" /></a></button>
            <button id="contactar" type="button"><a href="https://www.facebook.com/rebeca.mendoza.733"><img src="./assets/Facebook.png" height ="85" width="85" /></a></button>
            <button id="contactar" type="button"><a href="https://www.instagram.com/mendoza.aby/"><img src="./assets/Instagram.png" height ="90" width="90" /></a></button>
        </div>
    </div>
</div>
<script>
</script>
</body>
</html>