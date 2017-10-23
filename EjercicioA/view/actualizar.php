<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Actualizar Libro</title>
    </head>
    <body>
        <?php
        include '../model/Libro.php';
//obtenemos los datos de sesion:
        session_start();
        $libro = $_SESSION['libro'];
        ?>
        <form action="../controller/controller.php">
            <input type="hidden" value="actualizar" name="opcion">
            <!Utilizamos
                pequeños scripts PHP para obtener los valores del libro: >
            <input type="hidden" value="<?php echo $libro >
        getCodigo();
        ?>" name="codigo">
            Codigo:<b><?php echo $libro >
                   getCodigo();
        ?></b><br>
            Titulo:<input type="text" name="titulo" value="<?php echo $libro >
                   getTitulo();
        ?>"><br>
            Anio:<input type="text" name="anio" value="<?php echo $libro >
                          getAnio();
        ?>"><br>
            Autor:<input type="text" name="autor" value="<?php echo $libro >
                          getAutor();
        ?>"><br>
            Paginas:<input type="text" name="paginas" value="<?php echo $libro >
                          getPaginas();
        ?>"><br>
            <input type="submit" value="Modificar">
        </form>
    </body>
</html>
