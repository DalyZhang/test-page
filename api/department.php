<?php

session_start();
if (!isset($_SESSION["sid"])) {
    exit(json_encode([
        "err_code" => 1,
        "err_msg" => "请先登录"
    ]));
}

$rev = json_decode(file_get_contents("php://input"), true);

$db = [
    100 => [
        "current_member_list" => [1, 5, 10, 7, 0, 8, 1, 2, 0, 5]
    ],
    99 => [
        "member_list" => [8, 8, 8, 8, 8, 8, 8, 8, 8, 8],
        "current_member_list" => [0, 0, 0, 0, 0, 0, 0, 0, 0, 0]
    ],
    71 => [
        "current_member_list" => [8, 7, 10, 8, 4, 8, 9, 7, 9, 10]
    ],
    60 => [
        "member_list" => [10, 10, 10, 10, 10, 10, 10, 10, 10, 10],
        "current_member_list" => [0, 0, 0, 0, 0, 0, 0, 0, 0, 0]
    ],
    57 => [
        "current_member_list" => [1, 0, 1, 3, 0, 1, 1, 1, 0, 2]
    ],
    55 => [
        "member_list" => [10, 10, 10, 10, 10, 10, 10, 10, 10, 10],
        "current_member_list" => [3, 4, 4, 1, 5, 1, 0, 4, 0, 1]
    ],
    51 => [
        "current_member_list" => [10, 9, 7, 9, 8, 7, 10, 5, 10, 5]
    ],
    50 => [
        "member_list" => [15, 15, 15, 15, 15, 15, 15, 15, 15, 15],
        "current_member_list" => [8, 8, 9, 7, 4, 11, 9, 8, 8, 7]
    ]
];

if (isset($db[$rev["id"]])) {
    echo json_encode([
        "err_code" => 0,
        "data" => $db[$rev["id"]]
    ]);
} else {
    echo json_encode([
        "err_code" => 1,
        "err_msg" => "该活动不存在"
    ]);
}