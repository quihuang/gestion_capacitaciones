<?php
class Tema {
    private $conn;
    private $table_name = "temas";

    public $id;
    public $nombre;
    public $tipo;
    public $objetivo;
    public $facilitador_nombre;
    public $facilitador_cargo;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function index() {
        $temas = $this->tema->readAll();
        return $temas;
    }    

    public function create() {
        $query = "INSERT INTO " . $this->table_name . " SET nombre=:nombre, tipo=:tipo, objetivo=:objetivo, facilitador_nombre=:facilitador_nombre, facilitador_cargo=:facilitador_cargo";
        $stmt = $this->conn->prepare($query);
        
        $stmt->bindParam(":nombre", $this->nombre);
        $stmt->bindParam(":tipo", $this->tipo);
        $stmt->bindParam(":objetivo", $this->objetivo);
        $stmt->bindParam(":facilitador_nombre", $this->facilitador_nombre);
        $stmt->bindParam(":facilitador_cargo", $this->facilitador_cargo);

        return $stmt->execute();
    }
    
    public function getById($id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = :id LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
    
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } 

    public function update() {
        $query = "UPDATE " . $this->table_name . " SET nombre=:nombre, tipo=:tipo, objetivo=:objetivo, facilitador_nombre=:facilitador_nombre, facilitador_cargo=:facilitador_cargo WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        
        $stmt->bindParam(":nombre", $this->nombre);
        $stmt->bindParam(":tipo", $this->tipo);
        $stmt->bindParam(":objetivo", $this->objetivo);
        $stmt->bindParam(":facilitador_nombre", $this->facilitador_nombre);
        $stmt->bindParam(":facilitador_cargo", $this->facilitador_cargo);
        $stmt->bindParam(":id", $this->id);

        return $stmt->execute();
    }

    public function readAll() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function delete($id) {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }
}
?>