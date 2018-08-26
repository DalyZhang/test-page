<?php

$data = json_decode(file_get_contents("php://input"), true);
session_start();
if ($data["student_id"] === "201720171111" && $data["password"] === "1") {
    $_SESSION["sid"] = "201720171111";
    echo json_encode([
        "err_code" => 0,
        "data" => [
            "name" => "张三",
            "is_manager" => true
        ]
    ]);
} else if ($data["student_id"] === "201720172222" && $data["password"] === "2") {
    $_SESSION["sid"] = "201720172222";
    echo json_encode([
        "err_code" => 0,
        "data" => [
            "name" => "李四",
            "is_manager" => true
        ]
    ]);
} else if ($data["student_id"] === "201720173333" && $data["password"] === "3") {
    $_SESSION["sid"] = "201720173333";
    echo json_encode([
        "err_code" => 0,
        "data" => [
            "name" => "王五",
            "is_manager" => false
        ]
    ]);
} else if ($data["student_id"] === "201720174444" && $data["password"] === "4") {
    echo json_encode([
        "err_code" => -1,
        "err_msg" => "很抱歉，你的个人信息没有填写完整，先到人员管理系统完善它吧"
    ]);
} else {
    echo json_encode([
        "err_code" => 1,
        "err_msg" => "用户名或密码错误"
    ]);
}