<?php
require_once '../config/database.php';
require_once '../models/Tema.php';

$database = new Database();
$db = $database->getConnection();
$tema = new Tema($db);

$response = ["success" => false, "message" => "Operación fallida"];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['id']) && !empty($_POST['id'])) {
        // Actualizar tema existente
        $tema->id = $_POST['id'];
        $tema->nombre = $_POST['nombre'];
        $tema->tipo = $_POST['tipo'];
        $tema->objetivo = $_POST['objetivo'];
        $tema->facilitador_nombre = $_POST['facilitador_nombre'];
        $tema->facilitador_cargo = $_POST['facilitador_cargo'];
        if ($tema->update()) {
            $response["success"] = true;
            $response["message"] = "Tema actualizado exitosamente";
        }
    } else {
        // Crear un nuevo tema
        $tema->nombre = $_POST['nombre'];
        $tema->tipo = $_POST['tipo'];
        $tema->objetivo = $_POST['objetivo'];
        $tema->facilitador_nombre = $_POST['facilitador_nombre'];
        $tema->facilitador_cargo = $_POST['facilitador_cargo'];
        if ($tema->create()) {
            $response["success"] = true;
            $response["message"] = "Tema creado exitosamente";
        }
    }
}

echo json_encode($response);
?>
