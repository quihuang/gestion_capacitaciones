<?php
class Asistente {
    private $conn;
    private $table_name = "asistentes";

    public $id;
    public $tema_id;
    public $nombre;
    public $cargo;
    public $firma;
    public $tema_nombre;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function index() {
        $asistentes = $this->asistente->readAll();
        return $temas;
    }  

    public function create() {
        $query = "INSERT INTO " . $this->table_name . " SET tema_id=:tema_id, nombre=:nombre, cargo=:cargo, firma=:firma";
        $stmt = $this->conn->prepare($query);
        
        $stmt->bindParam(":tema_id", $this->tema_id);
        $stmt->bindParam(":nombre", $this->nombre);
        $stmt->bindParam(":cargo", $this->cargo);
        $stmt->bindParam(":firma", $this->firma);

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
        $query = "UPDATE " . $this->table_name . " SET tema_id=:tema_id, nombre=:nombre, cargo=:cargo, firma=:firma WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        
        $stmt->bindParam(":tema_id", $this->tema_id);
        $stmt->bindParam(":nombre", $this->nombre);
        $stmt->bindParam(":cargo", $this->cargo);
        $stmt->bindParam(":firma", $this->firma);
        $stmt->bindParam(":id", $this->id);

        return $stmt->execute();
    }

    public function readAll() {
        $query = "SELECT ".  $this->table_name . ".*, temas.nombre AS tema_nombre
                  FROM " . $this->table_name . "
                  INNER JOIN temas ON " . $this->table_name . ".tema_id = temas.id";
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