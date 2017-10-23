<?php

include 'Database.php';
include 'Libro.php';

class LibroModel {

    public function getLibros($orden) {
//obtenemos la informacion de la bdd:
        $pdo = Database::connect();

        //verificamos el ordenamiento asc o desc:
        if ($orden == true)//asc
            $sql = "select * from libro order by autor";
        else //desc
            $sql = "select * from libro order by autor desc";

        $resultado = $pdo->query($sql);
        
        
//transformamos los registros en objetos de tipo Biblioteca:
        $listado = array();
        foreach ($resultado as $res) {
            $libro = new libro();
            $libro->setCodigo($res['codigo']);
            $libro->setTitulo($res['titulo']);
            $libro->setAnio($res['anio']);
            $libro->setAutor($res['autor']);
            $libro->setPaginas($res['paginas']);
            array_push($listado, $libro);
        }
        Database::disconnect();
//retornamos el listado resultante:
        return $listado;
    }

    
    
    /**
     * Obtiene un libro especifico.
     * @param type $codigo El codigo del libro a buscar.
     * @return \Biblioteca
     */
    public function getLibro($codigo) {
//Obtenemos la informacion del libro especifico:
        $pdo = Database::connect();
//Utilizamos parametros para la consulta:
        $sql = "select * from libro where codigo=?";
        $consulta = $pdo->prepare($sql);
//Ejecutamos y pasamos los parametros para la consulta:
        $consulta->execute(array($codigo));
//Extraemos el registro especifico:
        $dato = $consulta->fetch(PDO::FETCH_ASSOC);
//Transformamos el registro obtenido a objeto:
        $libro = new libro();
        $libro->setCodigo($dato['codigo']);
        $libro->setTitulo($dato['titulo']);
        $libro->setAnio($dato['anio']);
        $libro->setAutor($dato['autor']);
        $libro->setPaginas($dato['paginas']);
        Database::disconnect();
        return $libro;
    }

    /**
     * Crea un nuevo libro en la base de datos.
     * @param type $codigo
     * @param type $titulo
     * @param type $anio
     * @param type $autor
     * @param type $paginas
     */
    public function crearLibro($codigo, $titulo, $anio, $autor, $paginas) {
//Preparamos la conexion a la bdd:
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//Preparamos la sentencia con parametros:
        $sql = "insert into libro (codigo,titulo,anio,autor,paginas) values(?,?,?,?,?)";
        $consulta = $pdo->prepare($sql);
//Ejecutamos y pasamos los parametros:
        
        try {
            $consulta->execute(array($codigo, $titulo, $anio, $autor, $paginas));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }

        Database::disconnect();
    }

    /**
     * Elimina un libro especifico de la bdd.
     * @param type $codigo
     */
    public function eliminarLibro($codigo) {
//Preparamos la conexion a la bdd:
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "delete from libro where codigo=?";
        $consulta = $pdo->prepare($sql);
//Ejecutamos la sentencia incluyendo a los parametros:
        $consulta->execute(array($codigo));
        Database::disconnect();
    }

    /**
     * Actualiza un libro existente.
     * @param type $codigo
     * @param type $titulo
     * @param type $anio
     * @param type $autor
     * @param type $paginas
     */
    public function actualizarLibro($codigo, $titulo, $anio, $autor, $paginas) {
//Preparamos la conexión a la bdd:
        $pdo = Database::connect();
        $sql = "update libro set titulo=?,anio=?,autor=?,paginas=? where codigo=?";
        $consulta = $pdo->prepare($sql);
//Ejecutamos la sentencia incluyendo a los parametros:
        $consulta->execute(array($titulo, $anio, $autor, $paginas, $codigo));
        Database::disconnect();
    }

}
