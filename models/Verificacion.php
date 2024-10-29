<?php
class Verificacion {
    private $conn;
    private $table_name = "verificaciones";

    public $id;
    public $tema_id;
    public $fecha_verificacion;
    public $responsable_verificacion;
    public $tema_nombre;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table_name . " SET tema_id=:tema_id, fecha_verificacion=:fecha_verificacion, responsable_verificacion=:responsable_verificacion";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":tema_id", $this->tema_id);
        $stmt->bindParam(":fecha_verificacion", $this->fecha_verificacion);
        $stmt->bindParam(":responsable_verificacion", $this->responsable_verificacion);

        return $stmt->execute();
    }

    public function update() {
        $query = "UPDATE " . $this->table_name . " SET tema_id=:tema_id, fecha_verificacion=:fecha_verificacion, responsable_verificacion=:responsable_verificacion WHERE id=:id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":tema_id", $this->tema_id);
        $stmt->bindParam(":fecha_verificacion", $this->fecha_verificacion);
        $stmt->bindParam(":responsable_verificacion", $this->responsable_verificacion);
        $stmt->bindParam(":id", $this->id);

        return $stmt->execute();
    }

    public function getById($id) {

        $query = "SELECT * FROM " . $this->table_name . " WHERE id = :id LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
    
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function readAll() {
        $query = "SELECT " .  $this->table_name . ".*, temas.nombre AS tema_nombre
                  FROM " . $this->table_name . "
                  INNER JOIN temas ON " .  $this->table_name . ".tema_id = temas.id";
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