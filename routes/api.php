<?php

require_once './connection/connection.php';
require_once './controllers/MovieController.php';
require_once './controllers/UserController.php';
require_once './controllers/AdminController.php';
require_once './controllers/SnackController.php';
require_once './controllers/SnackOrderController.php';
require_once './controllers/BookingController.php';
require_once './controllers/PaymentController.php'

$movieController = new MovieController($mysqli);
$userController = new UserController($mysqli);
$adminController = new AdminController($mysqli);
$snackController = new SnackController($mysqli);
$snackOrderController = new SnackOrderController($mysqli)
$bookingController = new BookingController($mysqli);
$paymentController = new PaymentController($mysqli);

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

if ($_SERVER['REQUEST_METHOD'] === 'GET' && $route === 'snacks') {
    $snackController->getAllSnacks();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $route === 'snacks') {
    $snackController->addSnack();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $route === 'snack-order') {
    $snackOrderController->addSnackOrder();
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && $route === 'snack-orders') {
    $snackOrderController->getUserOrders();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $route === 'bookings') {
    $bookingController->createBooking();
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && $route === 'bookings') {
    $bookingController->getUserBookings();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $route === 'bookings') {
    $paymentController->createPayment();