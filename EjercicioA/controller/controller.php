<?php

///////////////////////////////////////////////////////////////////////
//Componente controller que verifica la opcion seleccionada
//por el usuario, ejecuta el modelo y enruta la navegacion de paginas.
///////////////////////////////////////////////////////////////////////


require_once '../model/LibroModel.php';
session_start();
$libroModel = new LibroModel();
$opcion = $_REQUEST['opcion'];

//limpiamos cualquier mensaje previo:
unset($_SESSION['mensaje']);

switch ($opcion) {
    case "listar":
//obtenemos la lista de libros:
        $listado = $libroModel->getLibros(true);
//y los guardamos en sesion:
        $_SESSION['listado'] = serialize($listado);
        header('Location: ../index.php');
        break;

    case "listar_desc":
//obtenemos la lista de productos:
        $listado = $libroModel->getLibros(false);
//y los guardamos en sesion:
        $_SESSION['listado'] = serialize($listado);
        header('Location: ../index.php');
        break;

    case "crear":
//navegamos a la pagina de creacion:
        header('Location: ../view/crear.php');
        break;
    case "guardar":
//obtenemos los valores ingresados por el usuario en el formulario:
        $codigo = $_REQUEST['codigo'];
        $titulo = $_REQUEST['titulo'];
        $anio = $_REQUEST['anio'];
        $autor = $_REQUEST['autor'];
        $paginas = $_REQUEST['paginas'];
//creamos un nuevo libro:
        try {
              $libroModel->crearLibro($codigo, $titulo, $anio, $autor, $paginas);
        } catch (Exception $e) {
//colocamos el mensaje de la excepcion en sesion:
            $_SESSION['mensaje'] = $e-> getMessage();
        }


      
//actualizamos la lista de libros para grabar en sesion:
        $listado = $libroModel->getLibros();
        $_SESSION['listado'] = serialize($listado);
        header('Location: ../index.php');
        break;
    case "eliminar":
//obtenemos el codigo del libro a eliminar:
        $codigo = $_REQUEST['codigo'];
//eliminamos el libro:
        $libroModel->eliminarLibro($codigo);
//actualizamos la lista de libro para grabar en sesion:
        $listado = $libroModel->getLibros();
        $_SESSION['listado'] = serialize($listado);
        header('Location: ../index.php');
        break;
    case "cargar":
//para permitirle actualizar un libro al usuario primero
//obtenemos los datos completos de ese libro:
        $codigo = $_REQUEST['codigo'];
        $libro = $libroModel->getLibro($codigo);
//guardamos en sesion el libro para posteriormente visualizarlo
//en un formulario para permitirle al usuario editar los valores:
        $_SESSION['libro'] = $libro;
        header('Location: ../view/actualizar.php');
        break;
    case "actualizar":
//obtenemos los datos modificados por el usuario:
        $codigo = $_REQUEST['codigo'];
        $titulo = $_REQUEST['titulo'];
        $anio = $_REQUEST['anio'];
        $autor = $_REQUEST['autor'];
        $paginas = $_REQUEST['paginas'];
//actualizamos los datos del libro:
        $libroModel->actualizarLibro($codigo, $titulo, $anio, $autor, $paginas);
//actualizamos la lista de libros para grabar en sesion:
        $listado = $libroModel->getLibros();
        $_SESSION['listado'] = serialize($listado);
        header('Location: ../index.php');
        break;
    default:
//si no existe la opcion recibida por el controlador, siempre
//redirigimos la navegacion a la pagina index:
        header('Location: ../index.php');
}

