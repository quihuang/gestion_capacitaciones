<?php
require_once '../config/database.php';
require_once '../models/Verificacion.php';

$database = new Database();
$db = $database->getConnection();
$verificacion = new Verificacion($db);

$response = ["success" => false, "message" => "Operación fallida"];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['id']) && !empty($_POST['id'])) {
        // Actualizar verificación existente
        $verificacion->id = $_POST['id'];
        $verificacion->tema_id = $_POST['tema_id'];
        $verificacion->fecha_verificacion = $_POST['fecha_verificacion'];
        $verificacion->responsable_verificacion = $_POST['responsable_verificacion'];
        
        if ($verificacion->update()) {
            $response["success"] = true;
            $response["message"] = "Verificación actualizada exitosamente";
        } else {
            $response["message"] = "Error al actualizar la verificación";
        }
    } else {
        // Crear una nueva verificación
        $verificacion->tema_id = $_POST['tema_id'];
        $verificacion->fecha_verificacion = $_POST['fecha_verificacion'];
        $verificacion->responsable_verificacion = $_POST['responsable_verificacion'];
        
        if ($verificacion->create()) {
            $response["success"] = true;
            $response["message"] = "Verificación creada exitosamente";
        } else {
            $response["message"] = "Error al crear la verificación";
        }
    }
}

echo json_encode($response);
?>