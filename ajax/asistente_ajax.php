<?php
require_once '../config/database.php';
require_once '../models/Asistente.php';

$database = new Database();
$db = $database->getConnection();
$asistente = new Asistente($db);

$response = ["success" => false, "message" => "Operación fallida"];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['id']) && !empty($_POST['id'])) {
        // Actualizar asistente existente
        $asistente->id = $_POST['id'];
        $asistente->tema_id = $_POST['tema_id'];
        $asistente->nombre = $_POST['nombre'];
        $asistente->cargo = $_POST['cargo'];
        $asistente->firma = $_POST['firma'];
        
        if ($asistente->update()) {
            $response["success"] = true;
            $response["message"] = "Asistente actualizado exitosamente";
        } else {
            $response["message"] = "Error al actualizar el asistente";
        }
    } else {
        // Crear un nuevo asistente
        $asistente->tema_id = $_POST['tema_id'];
        $asistente->nombre = $_POST['nombre'];
        $asistente->cargo = $_POST['cargo'];
        $asistente->firma = $_POST['firma'];
        
        if ($asistente->create()) {
            $response["success"] = true;
            $response["message"] = "Asistente creado exitosamente";
        } else {
            $response["message"] = "Error al crear el asistente";
        }
    }
}

echo json_encode($response);
?>