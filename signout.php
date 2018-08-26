<?php

session_start();

if (isset($_SESSION["sid"])) {
    unset($_SESSION["sid"]);
}

echo json_encode([
    "err_code" => 0
]);