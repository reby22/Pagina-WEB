<?php 
    require "./logica/conexion.php";
    session_start();
    if(isset($_SESSION['user']) && isset($_SESSION['rol'])){
        $user = $_SESSION['user'];
        $rol = $_SESSION['rol'];
    }else{
        header("Location: http://localhost/EjerciciosPHP/ProyectoFinal/Login.php");
        return;
    }
    if(isset($_GET['id'])){
        $consulta = "SELECT * FROM catalogo WHERE id_manga =".$_GET['id'];
        $query = mysqli_query($conexion, $consulta);
        $row = mysqli_fetch_array($query);
        $consulta2 = "SELECT * FROM capitulos WHERE id_manga =".$_GET['id'];
        $query2 = mysqli_query($conexion, $consulta2);
    }

    $consulta3 = "SELECT * FROM usuarios WHERE usuario ='".$user."'";
    $query3 = mysqli_query($conexion, $consulta3);
    $row3 = mysqli_fetch_array($query3);

    $consulta4 = "SELECT COUNT(*) FROM favoritos WHERE id =".$row3['id']." AND id_Manga =".$_GET['id'];
    $query4 = mysqli_query($conexion, $consulta4);
    $row4 = mysqli_fetch_array($query4);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style2.css">
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
        <div class="imagen"><img src="./assets/<?php echo $row['imagen']?>"></div>
    </div>
    <div class="Separacion"></div>
    <div class="contenido">
        <div class="reviewManga">
            <h3 id="Titulos">
                <?php
                    echo $row['Nombre']; 
                ?>
            </h3>
            <p id="Texto">
                <?php
                    echo $row['resumen']; 
                ?>
            </p>
        </div>
        <div class="botonesDeSeguimiento">
        <?php if(isset($_SESSION['user']) && isset($_SESSION['rol'])){
             if($rol == 'usuario') {?>
            <?php if ($row4[0] == '1'){ ?>
                <button class="BotonNoMeGusta"> <a href="./logica/eliminaFavoritos.php?id_M=<?php echo $row['id_manga'];?>">No me gusta</a></button>
            <?php } else{ ?>
                <button class="BotonMeGusta"> <a href="./logica/insertaFavoritos.php?id_M=<?php echo $row['id_manga'];?>">Me gusta</a></button>
            <?php } ?>
            <?php } }?>
        </div>
        <br>
        <div class="capitulosManga">
            <h3 id="Titulos">Capitulos</h3>
            <table class="capitulos">
                <!-- head -->
                <thead>
                <tr>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <!-- row 1 -->
                <tr>
                <?php while ($row2 = mysqli_fetch_array($query2)) {?>
                    <td><a id="tituloCap" href="./VisordePDF.php?id=<?php echo $row2['id_capitulo']?>"><?php echo $row2['tituloCap'] ?></a></td>
                </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>