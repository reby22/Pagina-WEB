<?php 
    require "./logica/conexion.php";
    session_start();
    if(isset($_SESSION['user']) && isset($_SESSION['rol'])){
        $user = $_SESSION['user'];
        $rol = $_SESSION['rol'];
    }else{
        header("Location: http://localhost/EjerciciosPHP/ProyectoFinal/PaginaPrincipal.php");
        return;
    }
    $consulta1 = "SELECT * FROM capitulos";
    $query1 = mysqli_query($conexion, $consulta1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style7.css">
</head>
<body>
    <div class="contenedorPrincipal">
        <div class="Encabezado">
            <div class="titulo">
                <h1><a href="./PaginaPrincipal.php">MANGA AT HAND</a></h1>
            </div>
        </div>
    <div class="perfil">
        <br>
        <h3>Bievenido <?php echo $user ?>!</h3>
        <br>
        <div class="capitulosManga">
            <h3 id="Titulos">Capitulos</h3>
            <table class="capitulos">
                <!-- head -->
                <thead>
                <tr>
                    <th>Id Manga</th>
                    <th>Nombre</th>
                    <th>Nombre PDF</th>
                    <th>Id Capitulo</th>
                    <th>Eliminar</th>
                </tr>
                </thead>
                <tbody>
                <!-- row 1 -->
                <tr>
                <?php while ($row1 = mysqli_fetch_array($query1)) {
                    ?>
                    <td> <?php echo $row1['id_manga']; ?></a> </td>
                    <td> <?php echo $row1['tituloCap']; ?></a> </td>
                    <td> <?php echo $row1['nombre_cap']; ?></a> </td>
                    <td> <?php echo $row1['id_capitulo']; ?></a> </td>
                    <td><button><a href="./logica/eliminaCapitulo.php?id_C= <?php echo $row1['id_capitulo'];?>">Eliminar</a></button></td>
                </tr>
                <?php } ?>
                </tbody>
            </table>
            <br>
            <button id="Botonsito"> <a href="./IngresarCapitulos.php">Regresar</a></button>
        </div>
        <br>
    </div>
    </div>
</body>
</html>