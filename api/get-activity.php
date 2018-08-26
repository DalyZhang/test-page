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
        "id" => 100,
        "publisher" => "201720172222",
        "registered" => false,
        "type" => 0,
        "title" => "Some Fun",
        "details" => "Help the lazy dog jump over the quick brown fox.",
        "action_time" => "2018-09-26 00:00:00",
        "member" => 80,
        "current_member" => 39
    ],
    [
        "id" => 99,
        "publisher" => "201720171111",
        "registered" => false,
        "type" => 1,
        "title" => "Ticket",
        "details" => "None.",
        "book_time" => "2018-09-25 19:00:00",
        "award" => 40,
        "current_member" => 0,
        "is_department_full" => false
    ],
    [
        "id" => 71,
        "publisher" => "201720171111",
        "registered" => true,
        "type" => 0,
        "title" => "Some Fun",
        "details" => "Help the lazy dog jump over the quick brown fox.",
        "action_time" => "2018-09-16 00:00:00",
        "member" => 80,
        "current_member" => 80
    ],
    [
        "id" => 60,
        "publisher" => "201720172222",
        "registered" => false,
        "type" => 1,
        "title" => "Ticket",
        "details" => "None.",
        "book_time" => "2018-09-10 19:00:00",
        "award" => 40,
        "current_member" => 0,
        "is_department_full" => false
    ],
    [
        "id" => 57,
        "publisher" => "201720171111",
        "registered" => false,
        "type" => 0,
        "title" => "Some Fun",
        "details" => "Help the lazy dog jump over the quick brown fox.",
        "action_time" => "2018-09-01 00:00:00",
        "member" => 80,
        "current_member" => 10
    ],
    [
        "id" => 55,
        "publisher" => "201720172222",
        "registered" => false,
        "type" => 1,
        "title" => "Ticket",
        "details" => "None.",
        "book_time" => "2018-08-22 21:00:00",
        "award" => 40,
        "current_member" => 23,
        "is_department_full" => false
    ],
    [
        "id" => 51,
        "publisher" => "201720171111",
        "registered" => false,
        "type" => 0,
        "title" => "Some Fun",
        "details" => "Help the lazy dog jump over the quick brown fox.",
        "action_time" => "2018-08-10 00:00:00",
        "member" => 80,
        "current_member" => 80
    ],
    [
        "id" => 50,
        "publisher" => "201720172222",
        "registered" => true,
        "type" => 1,
        "title" => "A Ticket",
        "details" => "Tickets.",
        "book_time" => "2018-08-09 06:00:00",
        "award" => 80,
        "current_member" => 77,
        "is_department_full" => true
    ]
];

$start = $rev["start_id"];
if ($start === 0) {
    $start = $db[0]["id"];
}
$length = count($db);
$rtn = [
    "err_code" => 0,
    "data" => [
        "is_end" => true,
        "activities" => []
    ]
];
for ($i = 0, $j = 0; $i <= $rev["number"] && $j < $length; $j++) {
    if ($db[$j]["id"] <= $start) {
        if ($i === $rev["number"]) {
            $rtn["data"]["is_end"] = false;
            break;
        } else {
            $rtn["data"]["activities"][$i] = $db[$j];
            $rtn["data"]["activities"][$i]["is_publisher"] =
                $db[$j]["publisher"] === $_SESSION["sid"];
            unset($rtn["data"]["activities"][$i]["publisher"]);
            $i++;
        }
    }
}
echo json_encode($rtn);