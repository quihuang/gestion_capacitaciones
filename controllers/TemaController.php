<?php
require_once '../config/database.php';
require_once '../models/Tema.php';

class TemaController {
    private $db;
    private $tema;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->tema = new Tema($this->db);
    }

    public function index() {
        $temas = $this->tema->readAll();
        include '../views/temas/index.php';
    }

    public function create() {
        include '../views/temas/create.php';
    }

    public function store($data) {
        $this->tema->nombre = $data['nombre'];
        $this->tema->tipo = $data['tipo'];
        $this->tema->objetivo = $data['objetivo'];
        $this->tema->facilitador_nombre = $data['facilitador_nombre'];
        $this->tema->facilitador_cargo = $data['facilitador_cargo'];
        $this->tema->create();
        header("Location: index.php?controller=tema&action=index");
    }  

    public function edit($id) {
        $this->tema->id = $id;
        $tema = $this->tema->getById($id);
        include '../views/temas/edit.php';
    }

    public function update($data) {
        $this->tema->id = $data['id'];
        $this->tema->nombre = $data['nombre'];
        $this->tema->tipo = $data['tipo'];
        $this->tema->objetivo = $data['objetivo'];
        $this->tema->facilitador_nombre = $data['facilitador_nombre'];
        $this->tema->facilitador_cargo = $data['facilitador_cargo'];
        $this->tema->update();
        header("Location: index.php?controller=tema&action=index");
    }

    public function delete($id) {
        $this->tema->delete($id);
        header("Location: index.php?controller=tema&action=index");
    }
}
?>
