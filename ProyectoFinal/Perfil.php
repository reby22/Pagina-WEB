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
    $consulta = "SELECT * FROM usuarios WHERE usuario='".$user."'";
    $query = mysqli_query($conexion, $consulta);
    $row = mysqli_fetch_array($query);

    $consulta2 = "SELECT * FROM favoritos WHERE id=".$row['id'];
    $query2 = mysqli_query($conexion, $consulta2);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style6.css">
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
            <h3 id="Titulos">Tus mangas favoritos</h3>
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
                <?php while ($row2 = mysqli_fetch_array($query2)) {
                    $consulta3 = "SELECT * FROM catalogo WHERE id_manga=".$row2['id_Manga'];
                    $query3 = mysqli_query($conexion, $consulta3);
                    $row3 = mysqli_fetch_array($query3);
                    ?>
                    <td> <a id="tituloCap" href="./MangaDorohedoro.php?id=<?php echo $row3['id_manga'];?>"> <?php echo $row3['Nombre']; ?></a> </td>
                </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
        <br>
        <button onclick="salir()" class="BotonEliminarCuenta"> <a href="#">Eliminar Cuenta</a></button>
        <script>
            function salir(){
                var salir = confirm("Estas seguro de eliminar tu cuenta?")
                if(salir){
                    window.location.href="./logica/eliminaUsuario.php";
                    alert("Cuenta Eliminda");
                }else{
                    alert("Sigue con nosotros <3");
                }
            }
        </script>
    </div>
    </div>
</body>
</html>