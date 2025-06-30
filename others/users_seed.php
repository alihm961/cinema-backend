<?php
require_once (__DIR__ . '/../connection/connection.php');

$sql = "INSERT INTO users (name, email, password, phone, is_adult, is_admin) VALUES
    ('Admin ', 'admin@mail.com', 'admin123', '1234567890', 1, 1),
    ('Ali ', 'ali@gmail.com',  'ali12345', '0987654321', 1, 0)";
$mysqli->query($sql);
echo "Users seeded successfully.";
?>