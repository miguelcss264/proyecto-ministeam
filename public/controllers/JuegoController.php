<?php
require_once __DIR__ . '/../config/db.php';

class JuegoController {
    private $db;

    public function __construct() {
        $this->db = DB::getInstance()->getConnection();
    }

    public function index() {
        $stmt = $this->db->query("SELECT * FROM juegos");
        $juegos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        include __DIR__ . '/../views/juegos/index.php';
    }

    public function create() {
        $this->requireAdmin();
        $juego = null;
        include __DIR__ . '/../views/juegos/form.php';
    }

    public function store() {
        $this->requireAdmin();
        $stmt = $this->db->prepare("INSERT INTO juegos (titulo, descripcion, precio) VALUES (?, ?, ?)");
        $stmt->execute([$_POST['titulo'], $_POST['descripcion'], $_POST['precio']]);
        header("Location: index.php?controller=juego&action=index");
        exit;
    }

    public function edit() {
        $this->requireAdmin();
        $stmt = $this->db->prepare("SELECT * FROM juegos WHERE id = ?");
        $stmt->execute([$_GET['id']]);
        $juego = $stmt->fetch(PDO::FETCH_ASSOC);
        include __DIR__ . '/../views/juegos/form.php';
    }

    public function update() {
        $this->requireAdmin();
        $stmt = $this->db->prepare("UPDATE juegos SET titulo=?, descripcion=?, precio=? WHERE id=?");
        $stmt->execute([$_POST['titulo'], $_POST['descripcion'], $_POST['precio'], $_POST['id']]);
        header("Location: index.php?controller=juego&action=index");
        exit;
    }

    public function delete() {
        $this->requireAdmin();
        $stmt = $this->db->prepare("DELETE FROM juegos WHERE id = ?");
        $stmt->execute([$_GET['id']]);
        header("Location: index.php?controller=juego&action=index");
        exit;
    }

    public function addToLibrary() {
        if (!isset($_SESSION['usuario'])) {
            header("Location: index.php?controller=usuario&action=showLogin");
            exit;
        }

        $stmt = $this->db->prepare("INSERT IGNORE INTO biblioteca (usuario_id, juego_id) VALUES (?, ?)");
        $stmt->execute([$_SESSION['usuario']['id'], $_GET['id']]);
        header("Location: index.php?controller=usuario&action=biblioteca");
        exit;
    }

    private function requireAdmin() {
        if (!isset($_SESSION['usuario']) || $_SESSION['usuario']['rol'] !== 'admin') {
            header("Location: index.php");
            exit;
        }
    }
}