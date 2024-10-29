<?php
require_once '../config/database.php';
require_once '../models/Asistente.php';
require_once '../models/Tema.php';

class AsistenteController {
    private $db;
    private $asistente;
    private $tema;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->asistente = new Asistente($this->db);
        $this->tema = new Tema($this->db);
    }

    public function index() {
        $asistentes = $this->asistente->readAll();
        include '../views/asistentes/index.php';
    }

    public function create() {
        $temas = $this->tema->readAll();
        include '../views/asistentes/create.php';
    }

    public function store($data) {
        $this->asistente->tema_id = $data['tema_id'];
        $this->asistente->nombre = $data['nombre'];
        $this->asistente->cargo = $data['cargo'];
        $this->asistente->firma = $data['firma'];
        $this->asistente->create();
        header("Location: index.php?controller=asistente&action=index&tema_id=" . $data['tema_id']);
    }

    public function edit($id) {
        $this->asistente->id = $id;
        $asistente = $this->asistente->getById($id);
        $temas = $this->tema->readAll();
        include '../views/asistentes/edit.php';
    }

    public function update($data) {
        $this->asistente->tema_id = $data['tema_id'];
        $this->asistente->id = $data['id'];
        $this->asistente->nombre = $data['nombre'];
        $this->asistente->cargo = $data['cargo'];
        $this->asistente->firma = $data['firma'];
        $this->asistente->update();
        header("Location: index.php?controller=asistente&action=index&tema_id=" . $this->asistente->tema_id);
    }

    public function delete($id) {
        $this->asistente->delete($id);
        header("Location: index.php?controller=asistente&action=index");
    }
}
?>
