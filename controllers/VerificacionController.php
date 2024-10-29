<?php
require_once '../config/database.php';
require_once '../models/Verificacion.php';
require_once '../models/Tema.php';

class VerificacionController {
    private $db;
    private $verificacion;
    private $tema;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->verificacion = new Verificacion($this->db);
        $this->tema = new Tema($this->db);
    }

    public function index() {
        $verificaciones = $this->verificacion->readAll();
        include '../views/verificaciones/index.php';
    }

    public function create() {
        $temas = $this->tema->readAll();
        include '../views/verificaciones/create.php';
    }

    public function store($data) {
        $this->verificacion->tema_id = $data['tema_id'];
        $this->verificacion->fecha_verificacion = $data['fecha_verificacion'];
        $this->verificacion->responsable_verificacion = $data['responsable_verificacion'];
        $this->verificacion->create();
        header("Location: index.php?controller=verificacion&action=index");
    }

    public function edit($id) {
        $this->verificacion->id = $id;
        $verificacion = $this->verificacion->getById($id);
        $temas = $this->tema->readAll();
        include '../views/verificaciones/edit.php';
    }

    public function update($data) {
        $this->verificacion->id = $data['id'];
        $this->verificacion->tema_id = $data['tema_id'];
        $this->verificacion->fecha_verificacion = $data['fecha_verificacion'];
        $this->verificacion->responsable_verificacion = $data['responsable_verificacion'];
        $this->verificacion->update();
        header("Location: index.php?controller=verificacion&action=index");
    }

    public function delete($id) {
        $this->verificacion->delete($id);
        header("Location: index.php?controller=verificacion&action=index");
    }
}
?>