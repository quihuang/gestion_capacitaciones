<?php

require_once '../config/database.php';
require_once '../controllers/TemaController.php';
require_once '../controllers/AsistenteController.php';
require_once '../controllers/VerificacionController.php';

$controller = isset($_GET['controller']) ? $_GET['controller'] : 'inicio';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

switch ($controller) {
    case 'inicio':
        include '../views/inicio.php';
        break;

    case 'tema':
        $temaController = new TemaController();
        if ($action === 'index') {
            $temas = $temaController->index();
        } elseif ($action === 'create') {
            $temas = $temaController->create();
        } elseif ($action === 'store') {
            $temaController->store($_POST);
        } elseif ($action === 'edit') {
            $temaController->edit($_GET['id']);
        } elseif ($action === 'update') {
            $temaController->update($_POST);
        } elseif ($action === 'delete') {
            $temaController->delete($_GET['id']);
        }
        break;

    case 'asistente':
        $asistenteController = new AsistenteController();
        if ($action === 'index') {
            $asistentes = $asistenteController->index();
        } elseif ($action === 'create') {
            $asistentes = $asistenteController->create();
        } elseif ($action === 'store') {
            $asistenteController->store($_POST);
        } elseif ($action === 'edit') {
            $asistenteController->edit($_GET['id']);
        } elseif ($action === 'update') {
            $asistenteController->update($_POST);
        } elseif ($action === 'delete') {
            $asistenteController->delete($_GET['id']);
        }
        break;

    case 'verificacion':
        $verificacionController = new VerificacionController();
        if ($action === 'index') {
            $verificaciones = $verificacionController->index();
        } elseif ($action === 'create') {
            $verificacionController->create();
        } elseif ($action === 'store') {
            $verificacionController->store($_POST);
        } elseif ($action === 'edit') {
            $verificacionController->edit($_GET['id']);
        } elseif ($action === 'update') {
            $verificacionController->update($_POST);
        } elseif ($action === 'delete') {
            $verificacionController->delete($_GET['id']);
        }
        break;

    default:
        echo "Controlador no encontrado.";
        break;
}
?>