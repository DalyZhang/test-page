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
    [
        "student_id" => "201720182019",
        "name" => "用户1",
        "department" => "综合管理部",
        "tele" => "13110111011"
    ],
    [
        "student_id" => "201720182020",
        "name" => "用户2",
        "department" => "策划推广部",
        "tele" => "13111111011"
    ],
    [
        "student_id" => "201720182021",
        "name" => "用户3",
        "department" => "视觉设计部",
        "tele" => "13112111011"
    ],
    [
        "student_id" => "201720182022",
        "name" => "用户4",
        "department" => "编辑部",
        "tele" => "13113111011"
    ],
    [
        "student_id" => "201720182023",
        "name" => "用户5",
        "department" => "外联部",
        "tele" => "13114111011"
    ],
    [
        "student_id" => "201720182024",
        "name" => "用户6",
        "department" => "综合管理部",
        "tele" => "13115111011"
    ],
    [
        "student_id" => "201720182025",
        "name" => "用户7",
        "department" => "策划推广部",
        "tele" => "13116111011"
    ],
    [
        "student_id" => "201720182026",
        "name" => "用户8",
        "department" => "视觉设计部",
        "tele" => "13117111011"
    ],
    [
        "student_id" => "201720182027",
        "name" => "用户9",
        "department" => "编辑部",
        "tele" => "13118111011"
    ],
    [
        "student_id" => "201720182028",
        "name" => "用户10",
        "department" => "外联部",
        "tele" => "13119111011"
    ]
];

$isEnd = false;
$users = [];

$k = count($db);
for ($i = $rev["start_ord"], $j = 0; $j <= $rev["number"] && $i <= $k; $i++, $j++) {
    if ($i === $k) {
        $isEnd = true;
    } else {
        if ($j !== $rev["number"]) {
            $users[] = $db[$i];
        }
    }
}

echo json_encode([
    "err_code" => 0,
    "data" => [
        "is_end" => $isEnd,
        "users" => $users
    ]
]);