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

        $consulta = "SELECT * FROM capitulos WHERE id_capitulo =".$_GET['id'];
        $query = mysqli_query($conexion, $consulta);
        $row = mysqli_fetch_array($query);

        $consulta2 = "SELECT * FROM catalogo WHERE id_manga =".$row['id_manga'];
        $query2 = mysqli_query($conexion, $consulta2);
        $row2 = mysqli_fetch_array($query2);

    }

    $izq = $row['id_capitulo'] - 1;
    $der = $row['id_capitulo'] + 1;
    
    $consulta3 = "SELECT COUNT(*) FROM capitulos WHERE id_capitulo =".$izq;
    $query3 = mysqli_query($conexion, $consulta3);
    $row3 = mysqli_fetch_array($query3);

    $consulta4 = "SELECT COUNT(*) FROM capitulos WHERE id_capitulo =".$der;
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
    <link rel="stylesheet" href="./css/style3.css">
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
                    <button class="BotonIngresar"><a id="admin" href="#"><?php echo $user ?></a></button>
                    <button class="BotonIngresar"><a href="./logica/salir.php">Salir</a></button>
            <?php }} else { ?>
            <button class="BotonIngresar"><a href="./Login.php">Ingresar</a></button>
            <button class="BotonIngresar"><a href="./Register.php">Registrarse</a></button>
            <?php }  ?>
        </div>
    </div>
    <div class="Separacion"></div>
    <div class="contenido">
        <div class="Navegar">
            <?php if ($row3[0] == '1'){ ?>
            <button class="Anterior"><a href="./VisordePDF.php?id=<?php  echo $row['id_capitulo'] - 1; ?>">Anterior</a></button>
            <?php } ?>
            <button class="Dorohedoro"><a href="./MangaDorohedoro.php?id=<?php  echo $row['id_manga']; ?>"><?php echo $row2['Nombre']; ?></a></button>
            <?php if ($row4[0] == '1'){ ?>
            <button class="Siguiente"><a href="./VisordePDF.php?id=<?php  echo $row['id_capitulo'] + 1; ?>">Siguiente</a></button>
            <?php } ?>
        </div>
        <div class="Lector">
            <embed src="./assets/Dorohedoro/<?php echo $row['nombre_cap']; ?>" type="application/pdf" width="100%", height="100%">
        </div>
    </div>
    
</div>

</body>
</html>