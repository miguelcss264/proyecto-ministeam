<?php
require_once __DIR__ . '/Usuario.php';

class Cliente extends Usuario {
    private $biblioteca = [];

    public function setBiblioteca($biblio) {
        $this->biblioteca = $biblio;
    }

    public function getBiblioteca() {
        return $this->biblioteca;
    }
}