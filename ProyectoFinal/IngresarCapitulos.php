<?php 
    session_start();
    if(isset($_SESSION['user']) && isset($_SESSION['rol'])){
        $user = $_SESSION['user'];
        $rol = $_SESSION['rol'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style5.css">
</head>
<body>
    <div class="contenedorPrincipal">
        <div class="Encabezado">
            <div class="titulo">
                <h1><a href="./PaginaPrincipal.php">MANGA AT HAND</a></h1>
            </div>
        </div>
        <h3>Bievenido <?php echo $user ?>!</h3>
        <h3 id="titulo">Insertar Capitulos</h3>
        <br>
        <form action="./logica/InsertaCapitulos.php" target="" method="POST" name="Ingresar">
            <label for="id_M">Id del Manga</label>
            <input type="text" name="id_M" id="id_M" placeholder="Ingresa el id del Manga" required/>
            <br>
            <label for="id">Id del Capitulo</label>
            <input type="text" name="id" id="id" placeholder="Ingresa el id del Capitulo" required/>
            <br>
            <label for="nombre">Nombre del Capitulo</label>
            <input type ="text" name="nombre" id="nombre" placeholder="Ingresa el nombre del Capitulo" required/>
            <br>
            <label for="pdf">Nombre del PDF</label>
            <input type ="text" name="pdf" id="pdf" placeholder="Ingresa el nombre del PDF" required/>
            <br>
            <button type ="submit">Insertar</button>
            <br>
            <?php
                if(isset($_GET['msg'])){
                    echo "<span>". $_GET['msg']."</span>";
                }
            ?>
            <br>
            <button class="Ver Capitulos"> <a href="./VerCapitulos.php">Ver Capitulos</a></button>
        </form>
        <hr/>
        <h3 id="titulo">Insertar Mangas</h3>
        <br>
        <form action="./logica/insertaMangas.php" target="" method="POST" name="Ingresar" enctype="multipart/form-data">
            <label for="id_M">Id del Manga</label>
            <input type="text" name="id_M" id="id_M" placeholder="Ingresa el id del Manga" required/>
            <br>
            <label for="nombre_M">Nombre del Manga</label>
            <input type="text" name="nombre_M" id="nombre_M" placeholder="Ingresa el Nombre del Capitulo" required/>
            <br>
            <label for="resumen">Resumen</label>
            <textarea name="resumen" id="resumen" rows="10" cols="50" placeholder="Ingresa un breve resumen (max. 800 Letras)"></textarea>
            <br>
            <label for="imagen">Imagen</label>
            <input type ="file" name="imagen" id="imagen" required/>
            <br>
            <button type ="submit">Insertar</button>
            <br>
            <?php
                if(isset($_GET['msg2'])){
                    echo "<span>". $_GET['msg2']."</span>";
                }
            ?>
        <button class="Ver Mangas"> <a href="./VerMangas.php">Ver Mangas</a></button>
        </form>
        
    </div>
</body>
</html>