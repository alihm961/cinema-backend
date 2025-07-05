<?php

require_once './connection/connection.php';
require_once './controllers/MovieController.php';

$movieController = new MovieController($mysqli);

$route = $_GET['route'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && $route === 'movies') {
    $movieController->getAllMovies();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $route === 'movies') {
    $movieController->addMovie();
}