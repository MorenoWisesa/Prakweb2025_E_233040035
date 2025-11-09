<?php
// Simple MVC untuk router tugas/mvc

require_once __DIR__ . '/Controllers/Produk.php';

$controller = new ProdukController();
$action = $_GET['action'] ?? 'index';

switch ($action) {
    case 'index':
        $controller->index();
        break;
    case 'create':
        $controller->create();
        break;
    case 'store':
        $controller->store();
        break;
    case 'edit':
        $controller->edit($_GET['id'] ?? null);
        break;
    case 'update':
        $controller->update();
        break;
    case 'delete':
        $controller->delete($_GET['id'] ?? null);
        break;
    default:
        echo "Unknown action";
}

?>