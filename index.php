<?php

require_once "controllers/MainController.php";

try {
    $student = new MainController();
    echo $student->run();
} catch (Exception $e) {
    echo json_encode(Array('error' => $e->getMessage()));
}
