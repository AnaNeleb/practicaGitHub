<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF8">
        <title>Crear Libro</title>
    </head>
    <body>
        <form action="../controller/controller.php">
            <input type="hidden" value="guardar" name="opcion">
            Codigo:<input type="text" name="codigo"><br>
            Titulo:<input type="text" name="titulo"><br>
            Anio:<input type="text" name="año"><br>
            Autor:<input type="text" name="autor"><br>
            Paginas:<input type="text" name="paginas"><br>
            <input type="submit" value="Crear">
        </form>
        <footer>
            <p>Esta Página fue creada para el registro de libros de la Biblioteca Nacional, está bajo
            copyright de Universidad UTN  ©2017</p>
        </footer>
    </body>
</html>
