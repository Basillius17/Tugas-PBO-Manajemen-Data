<?php
include_once dirname(__DIR__) . "/config/Database.php";
include_once dirname(__DIR__) . "/models/Hotel.php";

class HotelController {
    public $model;

    public function __construct() {
        $database    = new Database();
        $db          = $database->connect();
        $this->model = new Hotel($db);
    }
}
?>