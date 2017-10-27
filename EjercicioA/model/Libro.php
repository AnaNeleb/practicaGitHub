<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Libro
 *
 * @author sistemaABC
 */
class Libro {

    private $codigo;
    private $titulo;
    private $anio;
    private $autor;
    private $paginas;
    private $editorial;

   function getEditorial() {
        return $this->editorial;
    }
  function setEditorial($editorial) {
        $this->editorial = $editorial;
    }

    function getCodigo() {
        return $this->codigo;
    }

    function getTitulo() {
        return $this->titulo;
    }

    function getAnio() {
        return $this->anio;
    }

    function getAutor() {
        return $this->autor;
    }

    function getPaginas() {
        return $this->paginas;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    function setAnio($anio) {
        $this->anio = $anio;
    }

    function setAutor($autor) {
        $this->autor = $autor;
    }

    function setPaginas($paginas) {
        $this->paginas = $paginas;
    }


}

