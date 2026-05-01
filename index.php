<?php
include_once "controllers/HotelController.php";
$controller = new HotelController();

if(isset($_GET['hapus'])) {
    $controller->model->delete($_GET['hapus']);
    header("Location: index.php");
}

include_once "views/list.php";
?>