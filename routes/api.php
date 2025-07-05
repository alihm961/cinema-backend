<?php

require_once './connection/connection.php';
require_once './controllers/MovieController.php';
require_once './controllers/UserController.php';
require_once './controllers/AdminController.php';

$movieController = new MovieController($mysqli);
$userController = new UserController($mysqli);
$adminController = new AdminController($mysqli);

$route = $_GET['route'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && $route === 'movies') {
    $movieController->getAllMovies();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $route === 'movies') {
    $movieController->addMovie();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $route === 'register') {
    $userController->registerUser();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $route === 'login') {
    $userController->loginUser();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $route === 'admin_login') {
    $adminController->loginAdmin();
}