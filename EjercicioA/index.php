<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF8">
        <title>CRUD Biblioteca</title>
    </head>
    <body>
        <table>
            <tr><td>
                    <form action="controller/controller.php">
                        <input type="hidden" value="listar" name="opcion">
                        <input type="submit" value="Consultar listado">
                    </form>
                </td>
                <td>
                    <form action="controller/controller.php">
                        <input type="hidden" value="listar_desc" name="opcion">
                        <input type="submit" value="Consultar listado descendente">
                    </form>
                </td>
                <td>
                    <form action="controller/controller.php">
                        <input type="hidden" value="crear" name="opcion">
                        <input type="submit" value="Crear Libro">
                    </form>
                </td></tr>
        </table>
        <table border="1">
            <tr>
                <th>CODIGO</th>
                <th>TITULO</th>
                <th>AÑO</th>
                <th>AUTOR</th>
                <th>PAGINAS</th>
                <th>ELIMINAR</th>
                <th>ACTUALIZAR</th>
            </tr>
            <?php
            session_start();
            include './model/Libro.php';
//verificamos si existe en sesion el listado de libros:
            if (isset($_SESSION['listado'])) {
                $listado = unserialize($_SESSION['listado']);
                foreach ($listado as $libr) {
                    echo "<tr>";
                    echo "<td>" . $libr->getCodigo() . "</td>";
                    echo "<td>" . $libr->getTitulo() . "</td>";
                    echo "<td>" . $libr->getAnio() . "</td>";
                    echo "<td>" . $libr->getAutor() . "</td>";
                    echo "<td>" . $libr->getPaginas() . "</td>";
//opciones para invocar al controlador indicando la opcion eliminar o cargar
//y la fila que selecciono el usuario (con el codigo del libro):
                    echo "<td><a href='controller/controller.php?opcion=eliminar&codigo=" . $libr->getCodigo() . "'>eliminar</a></td>";
                    echo "<td><a href='controller/controller.php?opcion=cargar&codigo=" . $libr->getCodigo() . "'>actualizar</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "No se han cargado datos.";
            }
            ?>
        </table>
        <?php
        if (isset($_SESSION['mensaje'])) {
            echo "<br>MENSAJE DEL SISTEMA: <font color='red'>" . $_SESSION['mensaje'] . "</font><br>";
        }
        ?>
    </body>
</html>