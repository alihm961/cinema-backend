<?php
require_once "../models/Showtime.php";
require_once "../connection/connection.php";

$admin_id = $_POST["admin_id"] ?? "";
if (!$admin_id) {
    http_response_code(403);
    echo json_encode(["status" => 403, "message" => "Admin ID required"]);
    exit;
}

$showtime = new Showtime($_POST);
$showtime->save($mysqli);
echo json_encode(["status" => 200, "message" => "Showtime added"]);