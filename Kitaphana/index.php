<?php

require_once 'app/controllers/cbooks.php';

$action = isset($_GET['action']) ? $_GET['action'] : '';
$id = isset($_GET['id']) ? $_GET['id'] : '';

$bookController = new BookController();

switch ($action) {
    case 'create':
        $bookController->create();
        break;
    case 'edit':
        $bookController->edit($id);
        break;
    case 'show':
        $bookController->show($id);
        break;
    case 'delete':
        $bookController->delete($id);
        break;
    default:
        $bookController->index();
        break;
}

?>
