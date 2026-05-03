<?php
class DB {
    private static $instancia = null;
    private $conexion;

    private function __construct() {
        $this->conexion = new PDO(
    "mysql:host=db;dbname=ministeam;charset=utf8mb4",
    "root",
    "test"
);
        $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public static function getInstance() {
        if (self::$instancia === null) {
            self::$instancia = new DB();
        }
        return self::$instancia;
    }

    public function getConnection() {
        return $this->conexion;
    }
}