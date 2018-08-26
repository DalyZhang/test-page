<?php

session_start();
if (isset($_SESSION["sid"])) {
    switch ($_SESSION["sid"]) {
        case "201720171111":
        echo json_encode([
            "err_code" => 0,
            "data" => [
                "logined" => true,
                "student_id" => "201720171111",
                "name" => "张三",
                "is_manager" => true
            ]
        ]);
        break;
        case "201720172222":
        echo json_encode([
            "err_code" => 0,
            "data" => [
                "logined" => true,
                "student_id" => "201720172222",
                "name" => "李四",
                "is_manager" => true
            ]
        ]);
        break;
        case "201720173333":
        echo json_encode([
            "err_code" => 0,
            "data" => [
                "logined" => true,
                "student_id" => "201720173333",
                "name" => "王五",
                "is_manager" => false
            ]
        ]);
        break;
        default:
        echo json_encode([
            "err_code" => 0,
            "data" => [
                "logined" => false
            ]
        ]);
        break;
    }
} else {
    echo json_encode([
        "err_code" => 0,
        "data" => [
            "logined" => false
        ]
    ]);
}