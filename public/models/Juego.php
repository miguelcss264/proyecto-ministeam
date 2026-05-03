<?php
class Juego {
    private $id;
    private $titulo;
    private $descripcion;
    private $precio;

    public function __construct($id, $titulo, $descripcion, $precio) {
        $this->id = $id;
        $this->titulo = $titulo;
        $this->descripcion = $descripcion;
        $this->precio = $precio;
    }

    public function getId() { return $this->id; }
    public function getTitulo() { return $this->titulo; }
    public function getDescripcion() { return $this->descripcion; }
    public function getPrecio() { return $this->precio; }
}