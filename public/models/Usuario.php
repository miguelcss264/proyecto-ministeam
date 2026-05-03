<?php
class Usuario {
    protected $id;
    protected $email;
    protected $rol;

    public function __construct($id, $email, $rol) {
        $this->id = $id;
        $this->email = $email;
        $this->rol = $rol;
    }

    public function getId() { return $this->id; }
    public function getEmail() { return $this->email; }
    public function getRol() { return $this->rol; }
}